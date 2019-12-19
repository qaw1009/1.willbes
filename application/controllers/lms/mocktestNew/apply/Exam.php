<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Exam extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/applyExam');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);

        $applyArea1 = $this->mockCommonModel->_groupCcd['applyArea1'];
        $applyArea2 = $this->mockCommonModel->_groupCcd['applyArea2'];
        $codes = $this->codeModel->getCcdInArray([$applyArea1, $applyArea2]);
        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);

        $arr_base['applyArea'] = $applyAreaTmp1 + $applyAreaTmp2;
        $arr_base['pay_status'] = [ 'paid' => $this->mockCommonModel->_ccd['paid_pay_status'], 'refund' => $this->mockCommonModel->_ccd['refund_pay_status']];
        $this->load->view('mocktestNew/apply/exam/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'p.SiteCode' => $this->input->post('search_site_code'),
                'pm.MockYear' => $this->input->post('search_year'),
                'pm.MockRotationNo' => $this->input->post('search_round'),
                'mr.TakeArea' => $this->input->post('search_TakeArea'),
            ],
            'BET' => [
            ],
            'ORG' => [
                'LKB' => [
                    'p.ProdName' => $this->input->post('search_fi', true),
                    'p.ProdCode' => $this->input->post('search_fi', true),
                ]
            ],
        ];

        $list = [];
        $count = $this->applyExamModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->applyExamModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function excel()
    {
        $arr_condition = [
            'EQ' => [
                'p.IsStatus' => 'Y',
                'p.SiteCode' => $this->input->post('search_site_code'),
                'pm.MockYear' => $this->input->post('search_year'),
                'pm.MockRotationNo' => $this->input->post('search_round'),
                'mr.TakeArea' => $this->input->post('search_TakeArea'),
            ],
            'BET' => [
            ],
            'ORG' => [
                'LKB' => [
                    'p.ProdName' => $this->input->post('search_fi', true),
                    'p.ProdCode' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        $results = $this->applyExamModel->mainList('excel', $arr_condition);
        $file_name = '모의고사-모의고사별접수현황('.date("Y-m-d").')';
        $headers = ['연도', '회차', '모의고사명', '응시형태', 'off 마감인원', '응시지역', '결제완료', '환불완료', '응시인원'];

        $last_query = $this->applyExamModel->getLastQuery();
        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}