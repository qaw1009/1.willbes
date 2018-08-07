<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends \app\controllers\BaseController
{
    protected $models = array('pass/consult', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상담일정관리
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("pass/consult/schedule/index", [
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();
        $arr_condition_category = [
            'EQ' => [
                'tA.CateCode' => $this->_reqP('search_category')
            ],
        ];

        $list = [];
        $count = $this->consultModel->listAllConsultSchedule(true, $arr_condition, $arr_condition_category);
        if ($count > 0) {
            $list = $this->consultModel->listAllConsultSchedule(false, $arr_condition, $arr_condition_category, $this->_reqP('length'), $this->_reqP('start'), ['A.ConsultDate' => 'desc', 'A.CsIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 일정등록
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $cs_idx = null;
        $data = null;
        $time_list = null;
        $yoil = array("일","월","화","수","목","금","토");

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $cs_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.CsIdx' => $cs_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);
            $data = $this->consultModel->findConsultScheduleForModify($arr_condition);
            $time_list = $this->consultModel->findConsultScheduleTimeForModify($arr_condition);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $arr_cate_code = $this->consultModel->listConsultScheduleCategory($cs_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        }

        $this->load->view('pass/consult/schedule/create', [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'cs_idx' => $cs_idx,
            'data' => $data,
            'time_list' => json_encode($time_list),
            'yoil' => $yoil
        ]);
    }

    public function store()
    {
        if(empty($this->_reqP('cs_idx',false))===true) {
            $method = 'add';
            $rules = [
                ['field'=>'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
                ['field'=>'cate_code[]', 'label'=>'카테고리', 'rules'=>'trim|required'],
                ['field'=>'campus_ccd', 'label'=>'캠퍼스', 'rules'=>'trim|required'],
                ['field'=>'is_use', 'label'=>'사용여부', 'rules'=>'trim|required|in_list[Y,N]'],
                ['field'=>'schedule_start_date', 'label'=>'상담시작일정', 'rules'=>'trim|required'],
                ['field'=>'schedule_end_date', 'label'=>'상담종료일정', 'rules'=>'trim|required'],
                ['field'=>'week[]', 'label'=>'요일', 'rules'=>'trim|required'],
                ['field'=>'schedule_start_hour', 'label'=>'상담가능시작시간', 'rules'=>'trim|required'],
                ['field'=>'schedule_start_min', 'label'=>'상담가능시작분', 'rules'=>'trim|required'],
                ['field'=>'schedule_end_hour', 'label'=>'상담가능종료시간', 'rules'=>'trim|required'],
                ['field'=>'schedule_end_min', 'label'=>'상담가능종료분', 'rules'=>'trim|required'],
                ['field'=>'lunch_start_hour', 'label'=>'점심시작시간', 'rules'=>'trim|required'],
                ['field'=>'lunch_start_min', 'label'=>'점심시작분', 'rules'=>'trim|required'],
                ['field'=>'lunch_end_hour', 'label'=>'점심종료시간', 'rules'=>'trim|required'],
                ['field'=>'lunch_end_min', 'label'=>'점심종료분', 'rules'=>'trim|required'],
                ['field'=>'consult_person_count', 'label'=>'1회상담인원', 'rules'=>'trim|required'],
                ['field'=>'consult_time', 'label'=>'1회상담시간', 'rules'=>'trim|required'],
                ['field'=>'break_time', 'label'=>'쉬는시간', 'rules'=>'trim|required'],
                ['field'=>'add_person_count[]', 'label'=>'시간표 상담인원', 'rules'=>'trim|required'],
                ['field'=>'add_target_type[]', 'label'=>'시간표 상담대상', 'rules'=>'trim|required'],
                ['field'=>'add_is_use[]', 'label'=>'시간표 사용여부', 'rules'=>'trim|required']
            ];
        } else {
            $method = 'modify';
            $rules = [
                ['field'=>'is_use', 'label'=>'사용여부', 'rules'=>'trim|required|in_list[Y,N]'],
                ['field'=>'add_schedule_idx[]', 'label'=>'시간표 식별자', 'rules'=>'trim|required'],
                ['field'=>'add_person_count[]', 'label'=>'시간표 상담인원', 'rules'=>'trim|required'],
                ['field'=>'add_target_type[]', 'label'=>'시간표 상담대상', 'rules'=>'trim|required'],
                ['field'=>'add_is_use[]', 'label'=>'시간표 사용여부', 'rules'=>'trim|required']
            ];
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->consultModel->{$method.'ConsultSchedule'}($this->_reqP(null));
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
                'A.IsUse' => $this->_reqP('search_is_use'),
                'A.CampusCcd' => $this->_reqP('search_campus_ccd'),
            ]
        ];

        if ($this->_reqP('search_consult_type') == 'I') {
            $arr_condition['RAW'] = ['D.totalConsult > ' => 'E.memCount'];
        } else if ($this->_reqP('search_consult_type') == 'E') {
            $arr_condition['RAW'] = ['D.totalConsult = ' => 'E.memCount'];
        }

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 접수일
            $arr_condition['BDT'] = ['A.ConsultDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        } else if($this->_reqP('search_date_type') == 'R') {
            // 등록일
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}