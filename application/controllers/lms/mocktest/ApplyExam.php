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
            ['field' => 'search_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeFormsCcds', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_IsRegister', 'label' => '접수상태', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_TakeType', 'label' => '응시기간', 'rules' => 'trim|in_list[A,L]'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'PC.CateCode' => $this->input->post('search_cateD1'),
                'MP.MockYear' => $this->input->post('search_year'),
                'MP.MockRotationNo' => $this->input->post('search_round'),
                'MP.IsRegister' => $this->input->post('search_IsRegister'),
                'MP.TakeType' => $this->input->post('search_TakeType'),
                'MP.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->input->post('search_cateD2'),
                'MP.TakeFormsCcds' => $this->input->post('search_TakeFormsCcds'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'PD.SaleStartDatm' => $this->input->post('search_fi', true),
                    'PD.SaleEndDatm' => $this->input->post('search_fi', true),
                    'PS.RealSalePrice' => $this->input->post('search_fi', true),
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
