<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfo extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'site/examTakeInfo');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['733','734','735']);

        $this->load->view('site/exam_take_info/index',[
            'exam_subject_ccd' => $codes['733'],
            'exam_area_ccd' => $codes['734'],
            'target_year_ccd' => $codes['735'],
            'arr_input' => [],
        ]);
    }

    public function listAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $order_by = ['A.EtiIdx' => 'DESC', 'A.YearTarget' => 'DESC', 'A.TakeType' => 'DESC'];

        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => element('search_site_code', $arr_input),
                'A.YearTarget' => element('search_year_target', $arr_input),
                'A.SubjectCcd' => element('search_subject_ccd', $arr_input),
                'A.AreaCcd' => element('search_area_ccd', $arr_input),
                'A.TakeType' => element('search_take_type', $arr_input),
            ]
        ];


        $list = [];
        $count = $this->examTakeInfoModel->listExamTakeInfo(true, $arr_condition, null, null, []);

        if($count > 0) {
            $list = $this->examTakeInfoModel->listExamTakeInfo(false, $arr_condition, element('length', $arr_input), element('start', $arr_input), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function create($params=[])
    {
        $method = 'POST';
        $data = null;
        $idx = null;

        if(empty($params[0]) === false) {
            $method = "PUT";
            $idx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'A.EtiIdx' => $idx
                ],
            ];
            $data = $this->examTakeInfoModel->findExamTakeInfo($arr_condition);
            if(empty($data)) {
                $this->json_result(true,'등록된 데이터가 존재하지 않습니다.'. true);
            }
        }

        $codes = $this->codeModel->getCcdInArray(['733','734']);

        $this->load->view('site/exam_take_info/create_modal',[
            'method' => $method,
            'exam_subject_ccd' => $codes['733'],
            'exam_area_ccd' => $codes['734'],
            'data' => $data,
            'idx' => $idx
        ]);
    }

    public function store()
    {
        $method = 'add';
        $rules = [
            ['filed' => 'YearTarget', 'label' => '학년도',  'rules' => 'trim|required'],
            ['filed' => 'TakeType', 'label' => '시험구분',  'rules' => 'trim|required'],
            ['field' => 'SubjectCcd', 'label' => '과목', 'rules' => 'trim|required|integer'],
            ['field' => 'AreaCcd', 'label' => '지역', 'rules' => 'trim|required|integer'],
            ['field' => 'NoticeNumber', 'label' => '모집인원', 'rules' => 'trim|required|integer'],
            ['field' => 'TakeNumber', 'label' => '지원인원', 'rules' => 'trim|required|integer'],
            ['field' => 'PassLine', 'label' => '합격선', 'rules' => 'trim|required'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required'],
        ];
        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('idx',false))===false) {
            $method = 'modify';
        }

        $result = $this->examTakeInfoModel->{$method.'ExamTakeInfo'}($this->_reqP(null));

        if($result === true) {
            $this->json_result(true,'저장 되었습니다.'. $result);
        } else {
            $this->json_result(false,'',$result);
        }
    }

    public function dataStore()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required|integer'],
            ['field' => 'target_year', 'label' => '기준년도', 'rules' => 'trim|required|integer|min_length[4]|max_length[4]']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->examTakeInfoModel->addExamTakeData($this->_reqP(null));
        $this->json_result($result,'저정 되었습니다.',$result);
    }

    /**
     * 과목세부항목설정팝업 (추시설정)
     */
    public function modifySubjectCcd()
    {
        $data = $this->codeModel->listAllCode(['EQ' => ['GroupCcd' => '733','IsUse' => 'Y', 'IsStatus' => 'Y']]);
        $this->load->view('site/exam_take_info/modify_subject_ccd_modal',[
            'data' => $data
        ]);
    }

    /**
     * 과목세부항목설정 (추시설정)
     */
    public function storeSubjectCcd()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'ccd', 'label' => '과목코드', 'rules' => 'trim|required|integer'],
            ['field' => 'desc_type', 'label' => '설정타입', 'rules' => 'trim|required|in_list[Y,N]'],
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->examTakeInfoModel->modifySubjectCcd($this->_reqP(null));
        $this->json_result($result,'정상 처리 되었습니다.',$result);
    }
}