<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Prerequest extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $this->applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $this->addPoint = $this->config->item('sysCode_addPoint', 'mock');
        $this->applyType_on = $this->config->item('sysCode_applyType_on', 'mock');
        $this->applyType_off = $this->config->item('sysCode_applyType_off', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');

        // 공통코드 셋팅
        //$this->_groupCcd = $this->regGoodsModel->_groupCcd;
    }

    /**
     * 메인
     */
    public function index()
    {
//        $paymentStatus = $this->config->item('sysCode_paymentStatus', 'mock');
//        $applyType = $this->config->item('sysCode_applyType', 'mock');
//        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
//        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
//
          $siteCode = get_auth_site_codes();
          //$codes = $this->codeModel->getCcdInArray([$paymentStatus, $applyType, $applyArea1, $applyArea2]);
//
//        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
//        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
//        $applyArea = $applyAreaTmp1 + $applyAreaTmp2;
//
//        /*모의고사별 접수현황 메뉴에서 검색조건 달고 페이지 접근*/
//        $search_PayStatusCcd = $this->_req('search_PayStatusCcd');
//        $search_IsTake = $this->_req('search_IsTake');
//        $search_fi = $this->_req('search_fi', true);
        $search_site_code = $this->_req('search_site_code', true);
//
        if($search_site_code){
            $scode = $search_site_code;
        } else {
            $scode = $siteCode[0];
        }
//
//        $arrsite = ['2001' => '온라인 경찰', '2003' => '온라인 공무원'];
//        $arrtab = array();

        $this->load->view('predict/prerequest/index', [
              'siteCodeDef' => $scode,
//            'paymentStatus' => $codes[$paymentStatus],
//            'applyType' => $codes[$applyType],
//            'applyArea' => $applyArea,
//            'search_PayStatusCcd'=>$search_PayStatusCcd,
//            'search_IsTake'=>$search_IsTake,
//            'search_fi'=>$search_fi,
//            'arrsite' => $arrsite,
//            'arrtab' => $arrtab
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
//                'O.SiteCode' => $this->_req('search_site_code'),
//                'OP.PayStatusCcd' => $this->_req('search_PayStatusCcd'),
//                'MR.TakeForm' => $this->_req('search_TakeForm'),
//                'MR.TakeArea' => $this->_req('search_TakeArea'),
//                'MR.IsTake' => $this->_req('search_IsTake'),
            ],
            'ORG' => [
                'LKB' => [
//                    'U.MemName' => $this->_req('search_fi', true),
//                    'U.MemId' => $this->_req('search_fi', true),
//                    'U.Phone3' => $this->_req('search_fi', true),
//                    'PD.ProdName' => $this->_req('search_fi', true),
//                    'MR.ProdCode' => $this->_req('search_fi', true),
//                    'MR.TakeNumber' => $this->_req('search_fi', true),
//                    'O.OrderNo' => $this->_req('search_fi', true),
                ]
            ],
        ];


        list($data, $count) = $this->predictModel->predictRegistList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);

    }

}