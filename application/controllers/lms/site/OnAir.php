<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAir extends \app\controllers\BaseController
{
    protected $models = array('site/onAir', 'live/classRoom', 'sys/code', 'sys/site', 'sys/category', 'product/base/professor');
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
        //현재날짜
        $now_date = date('Ymd');

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view('site/onAir/index',[
            'now_date' => $now_date,
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

        $set_search_date = [
            'type' => $this->_reqP('search_date_type'),
            'start_date' => $this->_reqP('search_start_date'),
            'end_date' => $this->_reqP('search_end_date')
        ];

        $list = [];
        $count = $this->onAirModel->listAllOnAir(true, $arr_condition, $arr_condition_category, $set_search_date);
        if ($count > 0) {
            $list = $this->onAirModel->listAllOnAir(false, $arr_condition, $arr_condition_category, $set_search_date, $this->_reqP('length'), $this->_reqP('start'), ['OaIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 온에어 등록/수정 폼
     * @param array $params
     */
    public function create($params=[])
    {
        $method = 'POST';
        $data = null;
        $arr_onair_date = [];
        $oa_idx = '';
        $arr_title = [];

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        // 송출기간 -> 요일값 초기화
        $week_arr = explode(",",",,,,,,");

        //교수정보
        $arr_professor = $this->professorModel->getProfessorArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //강의실 조회
        $list_class_room = $this->classRoomModel->listClassRoom(['EQ' => ['A.IsUse' => 'Y']], null, null, ['CIdx' => 'asc']);

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $oa_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.OaIdx' => $oa_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->onAirModel->findOnAirForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            //송출기간조회
            $arr_onair_date = $this->onAirModel->listOnAirDate($oa_idx);

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->onAirModel->listOnAirCategory($oa_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $week_arr = explode(",",$data['WeekArray']);

            // 타이틀 조회
            $arr_title = $this->onAirModel->findOnAirTitleListForModify($oa_idx);
        }

        $this->load->view("site/onAir/create", [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'list_class_room' => $list_class_room,
            'data' => $data,
            'arr_onair_date' => $arr_onair_date,
            'oa_idx' => $oa_idx,
            'week_arr' => $week_arr,
            'arr_professor' => $arr_professor,
            'arr_title' => $arr_title
        ]);
    }

    /**
     * 온에어 등록
     */
    public function store()
    {
        $rules = [
            ['field'=>'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field'=>'cate_code[]', 'label'=>'카테고리', 'rules'=>'trim|required'],
            ['field'=>'campus_ccd', 'label'=>'캠퍼스', 'rules'=>'trim|required'],
            ['field'=>'study_start_date', 'label'=>'개강일', 'rules'=>'trim|required'],
            ['field'=>'on_air_num', 'label'=>'회차', 'rules'=>'trim|required'],
            ['field'=>'week[]', 'label'=>'요일', 'rules'=>'trim|required'],
            ['field'=>'on_air_start_type', 'label'=>'강의시간타입', 'rules'=>'trim|required|in_list[A,D]'],
            ['field'=>'on_air_name', 'label'=>'강좌명', 'rules'=>'trim|required'],
            ['field'=>'class_room_idx', 'label'=>'강의실', 'rules'=>'trim|required'],
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

        if(empty($this->_reqP('oa_idx',false))===true) {
            $method = 'add';

            if ($this->_reqP('left_exposure_type') == 'I' && empty($_FILES['attach_file']['size'][0]) === true) {
                $rules = array_merge($rules, [
                    ['field' => "left_file_name", 'label' => '이미지파일(좌)', 'rules' => "callback_validateFileRequired[left_file_name]"]
                ]);
            }

            if ($this->_reqP('right_exposure_type') == 'I' && empty($_FILES['attach_file']['size'][1]) === true) {
                $rules = array_merge($rules, [
                    ['field' => "right_file_name", 'label' => '이미지파일(우)', 'rules' => "callback_validateFileRequired[right_file_name]"]
                ]);
            }

        } else {
            $method = 'modify';
        }

        if (empty($this->_reqP('savDay[]')) === true) {
            $rules = array_merge($rules, [
                ['field'=>'savDay[]', 'label'=>'송출기간', 'rules'=>'trim|required']
            ]);
        } else {
            $c = 0;
            foreach ($this->_reqP('savDay[]') as $key => $val) {
                if (empty($val) === false) {
                    $c = $c + 1;
                }
            }

            if ($c <= 0) {
                $rules = array_merge($rules, [
                    ['field'=>'savDay[]', 'label'=>'송출기간', 'rules'=>'trim|required']
                ]);
            }
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->onAirModel->{$method.'OnAir'}($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 온에어 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'oa_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->onAirModel->onAirCopy($this->_reqP('oa_idx'));
        $this->json_result($result, '복사 되었습니다.', $result);
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

        //진행여부 검색
        if ($this->_reqP('search_onair_is_type') == 'Y') {
            $arr_condition['GT'] = ['K.OnAirLastDate' => date('Ymd')];
        } elseif ($this->_reqP('search_onair_is_type') == 'N') {
            $arr_condition['LTE'] = ['K.OnAirLastDate' => date('Ymd')];
        }

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'R') {
            // 등록일
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}