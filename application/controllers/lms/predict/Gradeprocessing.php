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
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict' , 'predict/predictCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 등록폼
     */
    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        //합격예측 기본정보호출
        $productList = $this->predictModel->getProductALL();
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');

        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart();
        $areaList = $this->predictModel->getArea($sysCode_Area);

        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        list($data, $count) = $this->predictModel->mainList($condition);

        $this->load->view('predict/gradeprocess/index', [
            'productList' => $data,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'areaList' => $areaList
        ]);
    }

    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_PredictIdx', 'label' => '코드', 'rules' => 'trim|is_natural_no_zero']
        ];

        if ($this->validate($rules) === false) return;

        $PredictIdx = $this->input->post('search_PredictIdx');

        $condition = [
            'EQ' => [
                'pg.TakeMockPart' => $this->input->post('search_TakeMockPart'),
                'pg.TakeArea' => $this->input->post('search_TakeArea'),
            ],
        ];

        if(empty($PredictIdx) === true) {
            $PredictIdx = "100000";
        }

        list($data, $count) = $this->predictModel->statisticsList($PredictIdx, $condition);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 채점하기
     */
    public function editGradePaperAjax()
    {
        $formData = $this->_reqP(null, false);
        $PredictIdx = element('PredictIdx', $formData);
        $result = $this->predictModel->updateForGradePaper($PredictIdx);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 원점수입력
     * @return object|string
     */
    public function scoreMakeStep1Ajax()
    {
        $rules = [
            ['field' => 'PredictIdx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictModel->scoreMakeStep1($this->_reqP(null));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 조정점수입력
     * @return object|string
     */
    public function scoreMakeStep2Ajax()
    {
        $formData = $this->_reqP(null, false);
        $PredictIdx = element('PredictIdx', $formData);
        $TakeMockPart = element('TakeMockPart', $formData);

        $result = $this->predictModel->scoreMakeStep2($PredictIdx,'web',$TakeMockPart);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 시험통계처리
     * @return object|string
     */
    public function scoreMakeStep3Ajax()
    {
        $formData = $this->_reqP(null, false);
        $PredictIdx = element('PredictIdx', $formData);
        $TakeMockPart = element('TakeMockPart', $formData);

        $result = $this->predictModel->scoreProcess($PredictIdx,'web',$TakeMockPart);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

}