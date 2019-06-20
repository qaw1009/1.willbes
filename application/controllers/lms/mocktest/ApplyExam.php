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

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/apply/exam/index', [
            'siteCodeDef' => $siteCode[0],
            'applyArea' => $applyArea,
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 리스트
     */
    public function list($params=[])
    {

        if(empty($params) == false) {
            $excel = $params[0];
        } else {
            $excel = '';
        }

        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_takeArea', 'label' => '응시지역', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
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


        if($excel === 'Y') {

            $data  = $this->applyExamModel->mockListExcel($condition);

            $headers = ['연도', '회차', '모의고사명', '응시형태', 'off 마감인원', '응시지역', '결제완료', '환불완료', '응시인원'];

            $this->load->library('excel');
            $this->excel->exportExcel('모의고사-모의고사별접수현황('.date("Y-m-d").')', $data, $headers);

        } else {

            list($data, $count) = $this->applyExamModel->mockList($condition, $this->input->post('length'), $this->input->post('start'));
            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $data,
            ]);

        }
    }

}
