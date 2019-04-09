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

        echo "???=".$method;
        $this->load->view('predict/request/request_create', [
            'method' => $method,
            'siteCodeDef' => '',
            'data' => $data
            /*
            'applyType' => $codes[$this->applyType],
            'applyArea1' => $codes[$this->applyArea1],
            'applyArea2' => $codes[$this->applyArea2],
            'addPoint' => $codes[$this->addPoint],
            'csTel' => json_encode($csTel),
            'cateD2_sel' => json_encode(array()),
            'applyType_on' => $this->applyType_on,
            'accept_ccd' => $codes[$this->acceptStatus],
            'arr_send_callback_ccd' => $arr_send_callback_ccd
            */
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

//            ['field' => 'TakeStartDatm_d', 'label' => '응시시작일', 'rules' => 'trim'],
//            ['field' => 'TakeStartDatm_h', 'label' => '응시시작(시)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeStartDatm_m', 'label' => '응시시작(분)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeEndDatm_d', 'label' => '응시마감일', 'rules' => 'trim'],
//            ['field' => 'TakeEndDatm_h', 'label' => '응시마감(시)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeEndDatm_m', 'label' => '응시마감(분)', 'rules' => 'trim|numeric'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;


        // 날짜체크
//        $SaleStartDatm = $this->input->post('SaleStartDatm_d') .' '. $this->input->post('SaleStartDatm_h') .':'. $this->input->post('SaleStartDatm_m') .':00';
//        $SaleEndDatm = $this->input->post('SaleEndDatm_d') .' '. $this->input->post('SaleEndDatm_h') .':'. $this->input->post('SaleEndDatm_m') .':59';
//        $TakeStartDatm = $this->input->post('TakeStartDatm_d') .' '. $this->input->post('TakeStartDatm_h') .':'. $this->input->post('TakeStartDatm_m') .':00';
//        $TakeEndDatm = $this->input->post('TakeEndDatm_d') .' '. $this->input->post('TakeEndDatm_h') .':'. $this->input->post('TakeEndDatm_m') .':59';

//        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleStartDatm_d']) ) {
//            $this->json_error('접수시작시간이 잘못되었습니다.');
//            return;
//        }
//        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleEndDatm_d']) ) {
//            $this->json_error('접수마감시간이 잘못되었습니다.');
//            return;
//        }
//        if( (strtotime($SaleEndDatm) - strtotime($SaleStartDatm)) <= 0 ) {
//            $this->json_error('접수마감일이 접수시작일보다 빠릅니다.');
//            return;
//        }

        $result = $this->predictModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'idx', 'label' => '인덱스값', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SiteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProdName', 'label' => '서비스명', 'rules' => 'trim|required'],
            ['field' => 'MockYear', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockRotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockPart[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],

//            ['field' => 'TakeStartDatm_d', 'label' => '응시시작일', 'rules' => 'trim'],
//            ['field' => 'TakeStartDatm_h', 'label' => '응시시작(시)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeStartDatm_m', 'label' => '응시시작(분)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeEndDatm_d', 'label' => '응시마감일', 'rules' => 'trim'],
//            ['field' => 'TakeEndDatm_h', 'label' => '응시마감(시)', 'rules' => 'trim|numeric'],
//            ['field' => 'TakeEndDatm_m', 'label' => '응시마감(분)', 'rules' => 'trim|numeric'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;


        // 날짜체크
//        $SaleStartDatm = $this->input->post('SaleStartDatm_d') .' '. $this->input->post('SaleStartDatm_h') .':'. $this->input->post('SaleStartDatm_m') .':00';
//        $SaleEndDatm = $this->input->post('SaleEndDatm_d') .' '. $this->input->post('SaleEndDatm_h') .':'. $this->input->post('SaleEndDatm_m') .':59';
//        $TakeStartDatm = $this->input->post('TakeStartDatm_d') .' '. $this->input->post('TakeStartDatm_h') .':'. $this->input->post('TakeStartDatm_m') .':00';
//        $TakeEndDatm = $this->input->post('TakeEndDatm_d') .' '. $this->input->post('TakeEndDatm_h') .':'. $this->input->post('TakeEndDatm_m') .':59';

//        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleStartDatm_d']) ) {
//            $this->json_error('접수시작시간이 잘못되었습니다.');
//            return;
//        }
//        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleEndDatm_d']) ) {
//            $this->json_error('접수마감시간이 잘못되었습니다.');
//            return;
//        }
//        if( (strtotime($SaleEndDatm) - strtotime($SaleStartDatm)) <= 0 ) {
//            $this->json_error('접수마감일이 접수시작일보다 빠릅니다.');
//            return;
//        }

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