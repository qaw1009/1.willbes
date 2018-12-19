<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 개별접수현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyUser extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'mocktest/mockCommon', 'mocktest/applyUser');
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
        $paymentStatus = $this->config->item('sysCode_paymentStatus', 'mock');
        $applyType = $this->config->item('sysCode_applyType', 'mock');
        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');

        $siteCode = get_auth_site_codes();
        $codes = $this->codeModel->getCcdInArray([$paymentStatus, $applyType, $applyArea1, $applyArea2]);

        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
        $applyArea = $applyAreaTmp1 + $applyAreaTmp2;

        $this->load->view('mocktest/apply/user/index', [
            'siteCodeDef' => $siteCode[0],
            'paymentStatus' => $codes[$paymentStatus],
            'applyType' => $codes[$applyType],
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
            ['field' => 'search_PayStatusCcd', 'label' => '결제상태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeForm', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeArea', 'label' => '응시지역', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_IsStatus', 'label' => '응시여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_IsTicketPrint', 'label' => '응시표출력', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'O.SiteCode' => $this->input->post('search_site_code'),
                'OP.PayStatusCcd' => $this->input->post('search_PayStatusCcd'),
                'MAP.TakeForm' => $this->input->post('search_TakeForm'),
                'MAP.TakeArea' => $this->input->post('search_TakeArea'),
                'MAP.IsStatus' => $this->input->post('search_IsStatus'),
                'MAP.IsTicketPrint' => $this->input->post('search_IsTicketPrint'),
            ],
            'ORG' => [
                'LKB' => [
                    'U.MemName' => $this->input->post('search_fi', true),
                    'U.MemId' => $this->input->post('search_fi', true),
                    'U.Phone3' => $this->input->post('search_fi', true),
                    'PD.ProdName' => $this->input->post('search_fi', true),
                    'MAP.ProdCode' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->applyUserModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}
