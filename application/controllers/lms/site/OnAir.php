<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAir extends \app\controllers\BaseController
{
    protected $models = array('site/onAir', 'sys/site', 'sys/category', 'product/base/professor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view('site/onAir/index',[
            'offLineSite_list' => $offLineSite_list,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();
        $arr_condition_category = [
            'EQ' => [
                'B.CateCode' => $this->_reqP('search_category')
            ],
        ];

        $list = [];
        $count = $this->onAirModel->listAllOnAir(true, $arr_condition, $arr_condition_category);
        if ($count > 0) {
            $list = $this->onAirModel->listAllOnAir(false, $arr_condition, $arr_condition_category, $this->_reqP('length'), $this->_reqP('start'), ['OaIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 온에어 등록/수정 폼
     */
    public function create()
    {
        $method = 'POST';
        $data = null;
        $week_arr = null;
        $oa_idx = '';

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        // 송출기간 -> 요일값 초기화
        if($method == 'POST') {
            $week_arr = explode(",",",,,,,,");
        }
        elseif($method == 'PUT') {
            $week_arr = explode(",",$data['WeekArray']);
        }

        //교수정보
        $arr_professor = $this->professorModel->getProfessorArray();

        $this->load->view("site/onAir/create", [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'data' => $data,
            'oa_idx' => $oa_idx,
            'week_arr' => $week_arr,
            'arr_professor' => $arr_professor
        ]);
    }

    public function store()
    {
        $method = 'add';

        $rules = [
            ['field'=>'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field'=>'cate_code[]', 'label'=>'카테고리', 'rules'=>'trim|required'],
            ['field'=>'study_start_date', 'label'=>'개강일', 'rules'=>'trim|required'],
            ['field'=>'on_air_num', 'label'=>'회차', 'rules'=>'trim|required'],
            ['field'=>'week[]', 'label'=>'요일', 'rules'=>'trim|required'],
            ['field'=>'on_air_start_type', 'label'=>'강의시간타입', 'rules'=>'trim|required|in_list[A,D]'],
            ['field'=>'on_air_name', 'label'=>'강좌명', 'rules'=>'trim|required'],
            ['field'=>'on_air_tab_name', 'label'=>'탭명칭', 'rules'=>'trim|required'],
            ['field'=>'is_use', 'label'=>'사용여부', 'rules'=>'trim|required|in_list[Y,N]'],
            ['field'=>'title[]', 'label'=>'타이틀', 'rules'=>'trim|required'],
            ['field'=>'prof_idx', 'label'=>'교수명', 'rules'=>'trim|required|integer'],
            ['field'=>'prof_title', 'label'=>'교수한마디', 'rules'=>'trim|required'],
            ['field'=>'left_exposure_type','label'=>'노출내용(좌)', 'rules'=>'trim|required|in_list[M,I]'],
            ['field' => 'left_link', 'label' => '노출링크(좌)', 'rules' => 'callback_validateRequiredIf[left_exposure_type,M]'],
            ['field'=>'right_exposure_type','label'=>'노출내용(우)', 'rules'=>'trim|required|in_list[M,I]'],
            ['field' => 'right_link', 'label' => '노출링크(우)', 'rules' => 'callback_validateRequiredIf[right_exposure_type,M]'],
        ];

        if ($this->_reqP('left_exposure_type') == 'I' && empty($_FILES['attach_file']['size'][0]) === true) {
            $rules = array_merge($rules, [
                ['field' => "left_file_name", 'label' => '영상파일(좌)', 'rules' => "callback_validateFileRequired[left_file_name]"]
            ]);
        }

        if ($this->_reqP('right_exposure_type') == 'I' && empty($_FILES['attach_file']['size'][1]) === true) {
            $rules = array_merge($rules, [
                ['field' => "right_file_name", 'label' => '영상파일(우)', 'rules' => "callback_validateFileRequired[right_file_name]"]
            ]);
        }

        $savDays = count($this->_reqP('savDay[]'));
        if ($savDays <= 0) {
            $rules = array_merge($rules, [
                ['field'=>'savDay[]', 'label'=>'송출기간', 'rules'=>'trim|required']
            ]);
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->onAirModel->{$method.'OnAir'}($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'R') {
            // 등록일
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        } elseif ($this->_reqP('search_date_type') == 'I') {
            // 수업일
            $arr_condition['BDT'] = ['A.StudyStartDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}