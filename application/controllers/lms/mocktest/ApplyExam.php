<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 모의고사별 현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyExam extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'mocktest/mockCommon', 'mocktest/applyExam');
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     */
    public function index()
    {
        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');

        $siteCode = get_auth_site_codes();
        $codes = $this->codeModel->getCcdInArray([$applyArea1, $applyArea2]);

        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
        $applyArea = $applyAreaTmp1 + $applyAreaTmp2;

        $this->load->view('mocktest/apply/exam/index', [
            'siteCodeDef' => $siteCode[0],
            'applyArea' => $applyArea,
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_takeArea', 'label' => '응시지역', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_startDate', 'label' => '기간시작일', 'rules' => 'trim|alpha_dash'],
            ['field' => 'search_endDate', 'label' => '기간종료일', 'rules' => 'trim|alpha_dash'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $search_startDate = $search_endDate = null;
        if($this->input->post('search_startDate') && $this->input->post('search_endDate')) {
            $search_startDate = $this->input->post('search_startDate').'00:00:00';
            $search_endDate = $this->input->post('search_startDate').'23:59:59';
        }

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'MP.MockYear' => $this->input->post('search_year'),
                'MP.MockRotationNo' => $this->input->post('search_round'),
                'MAP.TakeArea' => $this->input->post('search_TakeArea'),
            ],
            'BET' => [
                'PD.SaleStartDatm' => [$search_startDate, $search_endDate]
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->input->post('search_fi', true),
                    'MAP.ProdCode' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->applyExamModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

}
