<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Gradeprocessing extends \app\controllers\BaseController
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

        //합격예측 기본정보호출
        $productList = $this->predictModel->getProductALL();
        $serialList = $this->predictModel->getSerialAll();

        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');

        $areaList = $this->predictModel->getArea($sysCode_Area);

        $this->load->view('predict/gradeprocess/index', [
            'productList' => $productList,
            'serialList' => $serialList,
            'areaList' => $areaList,
        ]);
    }

    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_ProdCode', 'label' => '코드', 'rules' => 'trim|is_natural_no_zero']
        ];

        if ($this->validate($rules) === false) return;

        $ProdCode = $this->input->post('search_ProdCode');

        $condition = [
            'EQ' => [
                'pg.TakeMockPart' => $this->input->post('search_TakeMockPart'),
                'pg.TakeArea' => $this->input->post('search_TakeArea'),
            ],
        ];

        if(empty($ProdCode) === true) {
            $ProdCode = "100000";
        }

        list($data, $count) = $this->predictModel->statisticsList($ProdCode, $condition);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 원점수입력
     * @return object|string
     */
    public function scoreMakeStep1Ajax()
    {
        $formData = $this->_reqP(null, false);
        $ProdCode = element('ProdCode', $formData);
        $TakeMockPart = element('TakeMockPart', $formData);

        $result = $this->predictModel->scoreMakeStep1($ProdCode,'web',$TakeMockPart);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 조정점수입력
     * @return object|string
     */
    public function scoreMakeStep2Ajax()
    {
        $formData = $this->_reqP(null, false);
        $ProdCode = element('ProdCode', $formData);
        $TakeMockPart = element('TakeMockPart', $formData);

        $result = $this->predictModel->scoreMakeStep2($ProdCode,'web',$TakeMockPart);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 조정점수입력
     * @return object|string
     */
    public function scoreMakeStep3Ajax()
    {
        $formData = $this->_reqP(null, false);
        $ProdCode = element('ProdCode', $formData);
        $TakeMockPart = element('TakeMockPart', $formData);

        $result = $this->predictModel->scoreProcess($ProdCode,'web',$TakeMockPart);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

}