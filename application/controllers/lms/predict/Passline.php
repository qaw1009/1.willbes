<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Passline extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict' , 'mocktest/mockCommon');
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
     * 등록폼
     */
    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $PredictIdx = element('PredictIdx',$arr_input);

        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        list($arr_base['productList'], $count) = $this->predictModel->mainList($condition);
        if(empty($PredictIdx)) $PredictIdx = (empty($arr_base['productList'][0]['PredictIdx']) === false ? $arr_base['productList'][0]['PredictIdx'] : '');

        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = empty($arr_input['SiteCode']) === false ? $arr_input['SiteCode'] : key($arr_site_code);

        $arr_base['serialList'] = $this->predictModel->getSerialAll();
        $area_code = $this->config->item('sysCode_Area', 'predict');
        $arr_base['areaList'] = $this->predictModel->getArea($area_code);
        $arr_condition = [
            'EQ' => [
                'A.TakeMockPart' => element('TakeMockPart', $arr_input),
                'A.TakeArea' => element('TakeArea', $arr_input),
            ]
        ];
        $list = $this->predictModel->listGradesLine($PredictIdx, $arr_condition);

        $this->load->view('predict/passline/index', [
            'arr_input' => $arr_input,
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'PredictIdx' => $PredictIdx,
            'arr_base' => $arr_base,
            'list' => $list
        ]);
    }

    /**
     * 직렬별 예상합격선 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'PredictIdx', 'label' => '합격예측명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeMockPart[]', 'label' => '직렬', 'rules' => 'trim|required'],
            ['field' => 'TakeArea[]', 'label' => '지역', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->storeLine($this->_reqP(null));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /*
     *  기대권 / 유력권 / 안정권
     */
    public function calculateAjax(){
        $PredictIdx = $this->_req("PredictIdx");
        $TakeMockPart = $this->_req("TakeMockPart");
        $TakeArea = $this->_req("TakeArea");
        $Per1 = $this->_req("Per1");
        $Per2 = $this->_req("Per2");
        $Per3 = $this->_req("Per3");

        $data = $this->predictModel->calculate($PredictIdx, $TakeMockPart, $TakeArea, $Per1, $Per2, $Per3);
        return $this->response([
            'data' => $data
        ]);
    }

}