<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends \app\controllers\BaseController
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
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);

        $arrsite = ['2001' => '온라인 경찰', '2003' => '온라인 공무원'];
        $arrtab = array();

        $this->load->view('predict/request/index', [
            'siteCodeDef' => $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
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
            ['field' => 'search_TakeFormsCcd', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_AcceptStatus', 'label' => '접수상태', 'rules' => 'trim|is_natural_no_zero'],
            //['field' => 'search_TakeType', 'label' => '응시기간', 'rules' => 'trim|in_list[A,L]'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $s_type = $this->input->post('search_AcceptStatus');

        if($s_type == 1){
            $searchdate1 = '(PP.TakeStartDatm > "';
            $searchdate2 = date('Y-m-d H:i:s') . '")';
        } else if($s_type == 2) {
            $searchdate1 = '(PP.TakeStartDatm < "';
            $searchdate2 = date('Y-m-d H:i:s') . '" AND PP.TakeEndDatm > "' . date('Y-m-d H:i:s') . '")';
        } else {
            $searchdate1 = '1';
            $searchdate2 = '1';
        }

        $condition = [
            'EQ' => [
                'PP.SiteCode' => $this->input->post('search_site_code'),
                'PP.CateCode' => $this->input->post('search_cateD1'),
                'PP.MockYear' => $this->input->post('search_year'),
                'PP.MockRotationNo' => $this->input->post('search_round'),
                'PP.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'PP.MockPart' => $this->input->post('search_cateD2'),
                'PP.TakeFormsCcd' => $this->input->post('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PP.ProdName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'PP.TakeStartDatm' => $this->input->post('search_fi', true),
                    'PP.TakeEndDatm' => $this->input->post('search_fi', true),
                ]
            ],
            'RAW' => [ $searchdate1 => $searchdate2 ],
        ];
        list($data, $count) = $this->predictModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 등록폼
     */
    public function create($param)
    {
        if($param) $ProdCode = $param[0];

        if(empty($ProdCode) === true){
            $method = "CREATE";
            $data = array();
            $data['SiteCode'] = '2001';
            $data['MockPart'] = '';
        } else {
            $method = "PUT";
            $data = $this->predictModel->getProduct($ProdCode);
        }
        
        $this->load->view('predict/request/request_create', [
            'method' => $method,
            'siteCodeDef' => '',
            'data' => $data
        ]);
    }

    /**
 * 등록
 */
    public function store()
    {
        $rules = [
            ['field' => 'SiteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProdName', 'label' => '서비스명', 'rules' => 'trim|required'],
            ['field' => 'MockYear', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockRotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockPart[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'PreServiceSDatm_d', 'label' => '사전예약시작일시', 'rules' => 'trim'],
            ['field' => 'PreServiceSDatm_h', 'label' => '사전예약시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceSDatm_m', 'label' => '사전예약시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceEDatm_d', 'label' => '사전종료시작일시', 'rules' => 'trim'],
            ['field' => 'PreServiceEDatm_h', 'label' => '사전종료시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceEDatm_m', 'label' => '사전종료시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceSDatm_d', 'label' => '본서비스시작일시', 'rules' => 'trim'],
            ['field' => 'ServiceSDatm_h', 'label' => '본서비스시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceSDatm_m', 'label' => '본서비스시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceEDatm_d', 'label' => '본서비스종료일시', 'rules' => 'trim'],
            ['field' => 'ServiceEDatm_h', 'label' => '본서비스종료일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceEDatm_m', 'label' => '본서비스종료일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceSDatm_d', 'label' => '최종서비스시작일시', 'rules' => 'trim'],
            ['field' => 'LastServiceSDatm_h', 'label' => '최종서비스시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceSDatm_m', 'label' => '최종서비스시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceEDatm_d', 'label' => '최종서비스종료일시', 'rules' => 'trim'],
            ['field' => 'LastServiceEDatm_h', 'label' => '최종서비스종료일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceEDatm_m', 'label' => '최종서비스종료일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceIsUse', 'label' => '사전예약사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'ServiceIsUse', 'label' => '본서비스사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'LastServiceIsUse', 'label' => '최종서비스사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'ExplainLectureIsUse', 'label' => '해설강의사용여부', 'rules' => 'trim|required|in_list[Y,N]'],

            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'SiteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProdName', 'label' => '서비스명', 'rules' => 'trim|required'],
            ['field' => 'MockYear', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockRotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockPart[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'PreServiceSDatm_d', 'label' => '사전예약시작일시', 'rules' => 'trim'],
            ['field' => 'PreServiceSDatm_h', 'label' => '사전예약시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceSDatm_m', 'label' => '사전예약시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceEDatm_d', 'label' => '사전종료시작일시', 'rules' => 'trim'],
            ['field' => 'PreServiceEDatm_h', 'label' => '사전종료시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceEDatm_m', 'label' => '사전종료시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceSDatm_d', 'label' => '본서비스시작일시', 'rules' => 'trim'],
            ['field' => 'ServiceSDatm_h', 'label' => '본서비스시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceSDatm_m', 'label' => '본서비스시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceEDatm_d', 'label' => '본서비스종료일시', 'rules' => 'trim'],
            ['field' => 'ServiceEDatm_h', 'label' => '본서비스종료일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'ServiceEDatm_m', 'label' => '본서비스종료일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceSDatm_d', 'label' => '최종서비스시작일시', 'rules' => 'trim'],
            ['field' => 'LastServiceSDatm_h', 'label' => '최종서비스시작일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceSDatm_m', 'label' => '최종서비스시작일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceEDatm_d', 'label' => '최종서비스종료일시', 'rules' => 'trim'],
            ['field' => 'LastServiceEDatm_h', 'label' => '최종서비스종료일시(시)', 'rules' => 'trim|numeric'],
            ['field' => 'LastServiceEDatm_m', 'label' => '최종서비스종료일시(분)', 'rules' => 'trim|numeric'],
            ['field' => 'PreServiceIsUse', 'label' => '사전예약사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'ServiceIsUse', 'label' => '본서비스사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'LastServiceIsUse', 'label' => '최종서비스사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'ExplainLectureIsUse', 'label' => '해설강의사용여부', 'rules' => 'trim|required|in_list[Y,N]'],

            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->update();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 영역선택 ajax
     * @return object|string
     */
    public function getSerialAjax()
    {

        $GroupCcd = $this->_req("GroupCcd");

        $list = $this->predictModel->getSerial($GroupCcd);

        return $this->response([
            'data' => $list
        ]);

    }


}