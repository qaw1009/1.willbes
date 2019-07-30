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
        $offLineSite_def_code = key($offLineSite_list);

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("pass/consult/schedule/index", [
            'offLineSite_list' => $offLineSite_list,
            'offLineSite_def_code' => $offLineSite_def_code,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'yoil' => $this->consultModel->yoil
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
            'data' => $list
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
        $arr_schedule_list = null;

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
            $arr_schedule_list = $this->consultModel->findConsultScheduleTimeForModify($arr_condition);

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
            'arr_schedule_list' => json_encode($arr_schedule_list),
            'yoil' => $this->consultModel->yoil
        ]);
    }

    /**
     * 상담예약관리 등록/수정
     */
    public function store()
    {
        if(empty($this->_reqP('cs_idx',false))===true) {
            $method = 'add';
            $rules = [
                ['field'=>'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
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
                ['field'=>'add_schedule_time[]', 'label'=>'시간표 시간', 'rules'=>'trim|required'],
                ['field'=>'add_target_type[]', 'label'=>'시간표 상담대상', 'rules'=>'trim|required'],
                ['field'=>'add_is_use[]', 'label'=>'시간표 사용여부', 'rules'=>'trim|required']
            ];
        } else {
            $method = 'modify';
            $rules = [
                ['field'=>'is_use', 'label'=>'사용여부', 'rules'=>'trim|required|in_list[Y,N]'],
                ['field'=>'add_schedule_idx[]', 'label'=>'시간표 식별자', 'rules'=>'trim|required'],
                ['field'=>'add_schedule_time[]', 'label'=>'시간표 시간', 'rules'=>'trim|required'],
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
     * 상담일정관리 read 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $cs_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'A.CsIdx' => $cs_idx,
                'A.IsStatus' => 'Y'
            ]
        ]);

        //상담예약관리 정보 조회
        $data = $this->consultModel->findConsultScheduleForModify($arr_condition);
        $arr_cate_code = $this->consultModel->listConsultScheduleCategory($cs_idx);
        $data['CateCodes'] = $arr_cate_code;
        $data['CateNames'] = implode(', ', array_values($arr_cate_code));

        //상담예약시간관리 정보 조회
        $arr_schedule_list = $this->consultModel->findConsultScheduleTimeForModify($arr_condition);

        //특정시간표읠 회원 정보 조회
        $join_type = 'LEFT';
        $arr_schedule_member_list = $this->consultModel->findConsultScheduleTimeForMember($cs_idx, $join_type);

        $this->load->view("pass/consult/schedule/read",[
            'cs_idx' => $cs_idx,
            'data' => $data,
            'arr_schedule_list' => json_encode($arr_schedule_list),
            'arr_schedule_member_list' => json_encode($arr_schedule_member_list),
            'yoil' => $this->consultModel->yoil
        ]);
    }

    public function delete($params = [])
    {
        if (empty($params[0]) === true) {
            $rules = [
                ['field'=>'cs_idx', 'label' => '상담예약관리식별자', 'rules' => 'trim|required']
            ];

            if($this->validate($rules) === false) {
                return;
            }
        }

        $result = $this->consultModel->deleteConsultSchedule($params[0]);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 특정 시간대의 회원 상담정보 조회
     * @param array $params
     */
    public function detailMemberModal($params = [])
    {
        $data = null;
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $csm_idx = $params[0];
        $advertise_placeholder = "상담 코멘트를 남겨주세요..";
        $advertise_placeholder .= "&#13;&#10;Ex) 상담종료 후 단과반 등록, 7월부터 수강 예정으로 강좌 할인쿠폰 지급함.";

        $arr_condition = ([
            'EQ'=>[
                'A.CsmIdx' => $csm_idx
            ]
        ]);
        $data = $this->consultModel->findConsultScheduleDetailForMember($arr_condition);
        $arr_cate_code = $this->consultModel->listConsultScheduleCategory($data['CsIdx']);
        $data['CateCodes'] = $arr_cate_code;
        $data['CateNames'] = implode(', ', array_values($arr_cate_code));

        $serial_data = $this->consultModel->findConsultScheduleDetailForMember_R_Ccd($csm_idx, '666');
        if (empty($serial_data) === true) {
            $serial_data = $this->consultModel->findConsultScheduleDetailForMember_R_Ccd($csm_idx, '614');
        }
        $study_data = $this->consultModel->findConsultScheduleDetailForMember_R_Ccd($csm_idx, '668');

        $data['SerialName'] = implode(', ', array_values($serial_data));
        $data['StudyName'] = implode(', ', array_values($study_data));

        $this->load->view("pass/consult/schedule/detail_member_modal",[
            'csm_idx' => $csm_idx,
            'method' => 'PUT',
            'data' => $data,
            'yoil' => $this->consultModel->yoil,
            'advertise_placeholder' => $advertise_placeholder
        ]);
    }

    /**
     * 상담정보 수정
     * @param array $params
     */
    public function storeDetailMember()
    {
        $rules = [
            ['field'=>'csm_idx', 'label' => '상담정보식별자', 'rules' => 'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->consultModel->modifyDetailConsultMember($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '수정 되었습니다.', $result);
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