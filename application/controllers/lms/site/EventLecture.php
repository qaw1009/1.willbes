<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLecture extends \app\controllers\BaseController
{
    protected $models = array('site/eventLecture', 'sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'product/base/professor');
    protected $helpers = array();

    protected $_groupCcd = [];

    public function __construct()
    {
        parent::__construct();

        // 공통코드 셋팅
        $this->_groupCcd = $this->eventLectureModel->_groupCcd;
    }

    /**
     * 이벤트/설명회/특강관리 인텍스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("site/event_lecture/index", [
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 이벤트/설명회/특강관리 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $el_idx = null;

        //관리옵션
        $optoins_keys = [];
        $arr_options = $this->codeModel->getCcd($this->_groupCcd['option']);
        foreach ($arr_options as $key => $val) {
            $optoins_keys[] = $key;
        }

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //과목조회
        $arr_subject = $this->subjectModel->getSubjectArray();

        //교수조회
        $arr_professor = $this->professorModel->getProfessorArray();

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $el_idx = $params[0];
        }

        $this->load->view("site/event_lecture/create", [
            'arr_options' => $arr_options,
            'optoins_keys' => $optoins_keys,
            'method' => $method,
            'data' => $data,
            'el_idx' => $el_idx,
            'arr_campus' => $arr_campus,
            'offLineSite_list' => $offLineSite_list,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
        ]);
    }

    public function store()
    {
        $method = 'add';
        $el_idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required|integer'],
            ['field' => 'requst_type', 'label' => '신청유형', 'rules' => 'trim|required|integer'],
            ['field' => 'register_start_date', 'label' => '접수기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'register_end_date', 'label' => '접수기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'content_type', 'label' => '내용옵션', 'rules' => 'trim|required|in_list[I,E]'],
            ['field' => "attach_file_S", 'label' => '리스트썸네일', 'rules' => "callback_validateFileRequired[attach_file_S]"],
            ['field' => 'option_ccds[]', 'label' => '관리옵션', 'rules' => 'trim|required'],
        ];

        //상태 값에 따른 rules 적용 (일반적 rules 적용 불가)
        $content_type = $this->_reqP('content_type');       //내용타입
        $option_ccds = $this->_reqP('option_ccds[]');       //관리옵션
        $limit_type = $this->_reqP('limit_type');           //정원제한타입

        if ($content_type == 'I') {
            $rules = array_merge($rules, [
                ['field' => "attach_file_C", 'label' => '이미지내용', 'rules' => "callback_validateFileRequired[attach_file_C]"]
            ]);
        } else if ($content_type == 'E') {
            $rules = array_merge($rules, [
                ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required']
            ]);
        }

        if (count($option_ccds) > 0) {
            foreach ($option_ccds as $key => $val) {
                switch ($val) {
                    case $this->eventLectureModel->_event_lecture_option_ccds[0] :
                        $rules = array_merge($rules, [
                            ['field' => 'limit_type', 'label' => '정원제한', 'rules' => 'trim|required|in_list[S,M]']
                        ]);

                        if ($limit_type == 'S') {
                            $rules = array_merge($rules, [
                                ['field' => 'person_limit_type', 'label' => '인원제한타입', 'rules' => 'callback_validateRequiredIf[limit_type,S]|in_list[L,N]'],
                                ['field' => 'person_limit', 'label' => '정원수', 'rules' => 'callback_validateRequiredIf[person_limit_type,L]|integer'],
                            ]);
                        } else if ($limit_type == 'M') {
                            $rules = array_merge($rules, [
                                ['field' => 'event_register_parson_limit_type[]', 'label' => '단일,다중선택', 'rules' => 'trim|required'],
                                ['field' => 'event_register_name[]', 'label' => '특강명', 'rules' => 'trim|required']
                            ]);
                        }
                        break;
                }
            }
        }

        /*if ($this->validate($rules) === false) {
            return;
        }*/

        if (empty($this->_reqP('el_idx')) === false) {
            $method = 'modify';
            $el_idx = $this->_reqP('el_idx');
        }

        $result = $this->eventLectureModel->{$method . 'eventLecture'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}