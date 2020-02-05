<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Goods extends BaseMocktest
{
    protected $temp_models = array('sys/site', 'common/searchProfessor', 'mocktestNew/regGoods', 'product/on/lecture');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $codes = $this->codeModel->getCcdInArray([$this->mockCommonModel->_groupCcd['applyType'], $this->mockCommonModel->_groupCcd['acceptStatus']]);

        $this->load->view('mocktestNew/reg/goods/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'applyType' => $codes[$this->mockCommonModel->_groupCcd['applyType']],
            'accept_ccd' => $codes[$this->mockCommonModel->_groupCcd['acceptStatus']],
        ]);
    }

    public function listAjax()
    {
        $accept_status_where = '';
        if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_expected']){
            $search_date1 = '(PD.SaleStartDatm > "';
            $search_date2 = date('Y-m-d H:i:s') . '")';
        } else if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_available']) {
            $search_date1 = '(PD.SaleStartDatm <= "';
            $search_date2 = date('Y-m-d H:i:s') . '" AND PD.SaleEndDatm > "' . date('Y-m-d H:i:s') . '")';
            $accept_status_where = '>';
        } else if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_end']) {
            $search_date1 = '(PD.SaleEndDatm <= "';
            $search_date2 = date('Y-m-d H:i:s') . '")';
            $accept_status_where = '<=';
        } else {
            $search_date1 = '';
            $search_date2 = '';
        }

        $arr_condition = [
            'EQ' => [
                'PD.IsStatus' => 'Y',
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'PC.CateCode' => $this->_reqP('search_cateD1'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                //'MP.AcceptStatusCcd' => $this->_reqP('search_AcceptStatus'),
                'PD.IsUse' => $this->_reqP('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->_reqP('search_cateD2'),
                'MP.TakeFormsCcd' => $this->_reqP('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdCode' => $this->_reqP('search_fi'),
                    'PD.ProdName' => $this->_reqP('search_fi'),
                    'A.wAdminName' => $this->_reqP('search_fi'),
                    'PD.SaleStartDatm' => $this->_reqP('search_fi'),
                    'PD.SaleEndDatm' => $this->_reqP('search_fi'),
                    'PS.RealSalePrice' => $this->_reqP('search_fi'),
                ]
            ],
            'RAW' => [ $search_date1 => $search_date2 ],
        ];

        //응시형태(오프라인) + 접수진행중, 접수마감 조건
        if ($this->_reqP('search_TakeFormsCcd') == $this->mockCommonModel->_ccd['applyType_off'] && empty($accept_status_where) === false) {
            $arr_condition['ORG2']['RAW'] = [
                "select COUNT(mr4.MemIdx) FROM lms_mock_register mr4
                    OIN lms_order_product op4 ON mr4.OrderProdIdx = op4.OrderProdIdx
                    JOIN lms_order o4 ON op4.OrderIdx = o4.OrderIdx 
                    JOIN lms_sys_code sc4 ON mr4.TakeForm = sc4.Ccd
                    WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' AND op4.PayStatusCcd = '{$this->mockCommonModel->_ccd['paid_pay_status']}'
                )" => " {$accept_status_where}
                 ( select
                    COUNT(mr2.MemIdx) FROM lms_mock_register mr2
                    JOIN lms_order_product op2 ON mr2.OrderProdIdx = op2.OrderProdIdx
                    JOIN lms_order o2 ON op2.OrderIdx = o2.OrderIdx 
                    JOIN lms_sys_code sc2 ON mr2.TakeForm = sc2.Ccd
                    WHERE mr2.IsStatus = 'Y' AND mr2.IsTake = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' AND op2.PayStatusCcd = '{$this->mockCommonModel->_ccd['paid_pay_status']}'
                "
            ];
        }

        $data = [];
        $count = $this->regGoodsModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $data = $this->regGoodsModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

            // 데이터 가공
            $mockKindCode = $this->mockCommonModel->_groupCcd['sysCode_kind'];    //직렬 운영코드값
            $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

            $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
            $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];

            foreach ($data as &$it) {
                $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
                $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
                $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

                if($it['SaleStartDatm'] > date('Y-m-d H:i:s')){
                    $dres = "접수예정";
                } else if($it['SaleStartDatm'] <= date('Y-m-d H:i:s') && $it['SaleEndDatm'] > date('Y-m-d H:i:s')) {
                    $dres = "접수중";
                } else if($it['SaleEndDatm'] <= date('Y-m-d H:i:s')) {
                    $dres = "접수마감";
                } else {
                    $dres = "접수기간 미설정";
                }
                $it['AcceptStatusCcd_Name'] = $dres;
                $mockPart = explode(',', $it['MockPart']);
                foreach ($mockPart as $mp) {
                    if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }
        }
        
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    public function create($params = [])
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);
        $arr_base['csTel'] = json_encode($this->siteModel->getSiteArray(false, 'CsTel'));
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $codes = $this->codeModel->getCcdInArray([
            $this->mockCommonModel->_groupCcd['applyType'],
            $this->mockCommonModel->_groupCcd['applyArea1'],
            $this->mockCommonModel->_groupCcd['applyArea2'],
            $this->mockCommonModel->_groupCcd['addPoint'],
            $this->mockCommonModel->_groupCcd['acceptStatus']
        ]);
        $arr_base['applyType_on'] = $this->mockCommonModel->_ccd['applyType_on'];
        $arr_base['applyType_off'] = $this->mockCommonModel->_ccd['applyType_off'];
        $arr_base['apply_type'] = $codes[$this->mockCommonModel->_groupCcd['applyType']];
        $arr_base['apply_area1'] = $codes[$this->mockCommonModel->_groupCcd['applyArea1']];
        $arr_base['apply_area2'] = $codes[$this->mockCommonModel->_groupCcd['applyArea2']];
        $arr_base['add_point'] = $codes[$this->mockCommonModel->_groupCcd['addPoint']];
        $arr_base['acceptStatus'] = $codes[$this->mockCommonModel->_groupCcd['acceptStatus']];
        $arr_base['send_callback_ccd'] = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $data = $sData = $prod_code = null;
        $data_memo = $data_auto_coupon = [];

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            $prod_code = $params[0];
            $data_auto_coupon = $this->lectureModel->_findProductEtcModify($prod_code,'lms_product_r_autocoupon');
            $data_memo = $this->lectureModel->_findProductEtcModify($prod_code,'lms_product_memo');

            $arr_condition = ([
                'EQ'=>[
                    'MP.ProdCode' => $prod_code,
                ]
            ]);
            $data = $this->regGoodsModel->findGoods($arr_condition);
            $sData = $this->regGoodsModel->listGoodsForSubject($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('mocktestNew/reg/goods/create', [
            'method' => $method,
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'prod_code' => $prod_code,
            'data' => $data,
            'sData' => $sData,
            'data_auto_coupon'=>$data_auto_coupon,
            'data_memo'=>$data_memo,
        ]);
    }

    /**
     * 모의고사 상품 등록/수정
     */
    public function store()
    {
        $Info = @json_decode($this->_reqP('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        } else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'TakeFormsCcd[]', 'label' => '응시형태', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPointCcds[]', 'label' => '가산점', 'rules' => 'trim|required|is_natural'],
            ['field' => 'MockYear', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockRotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProdName', 'label' => '모의고사명', 'rules' => 'trim|required'],

            ['field' => 'SalePrice', 'label' => '판매 정상가', 'rules' => 'trim|required|is_natural'],
            ['field' => 'SaleRate', 'label' => '판매 할인', 'rules' => 'trim|required|is_natural'],
            ['field' => 'SaleDiscType', 'label' => '판매 할인타입', 'rules' => 'trim|required|in_list[R,P]'],
            ['field' => 'RealSalePrice', 'label' => '판매가', 'rules' => 'trim|required|is_natural'],

            ['field' => 'SaleStartDatm_d', 'label' => '접수시작일', 'rules' => 'trim|required'],
            ['field' => 'SaleStartDatm_h', 'label' => '접수시작(시)', 'rules' => 'trim|required|numeric'],
            ['field' => 'SaleStartDatm_m', 'label' => '접수시작(분)', 'rules' => 'trim|required|numeric'],
            ['field' => 'SaleEndDatm_d', 'label' => '접수마감일', 'rules' => 'trim|required'],
            ['field' => 'SaleEndDatm_h', 'label' => '접수마감(시)', 'rules' => 'trim|required|numeric'],
            ['field' => 'SaleEndDatm_m', 'label' => '접수마감(분)', 'rules' => 'trim|required|numeric'],
            ['field' => 'AcceptStatusCcd', 'label' => '접수상태', 'rules' => 'trim|required|numeric'],

            ['field' => 'AcceptStatusCcd', 'label' => '접수상태', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeStartDatm_d', 'label' => '응시시작일', 'rules' => 'trim'],
            ['field' => 'TakeStartDatm_h', 'label' => '응시시작(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeStartDatm_m', 'label' => '응시시작(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_d', 'label' => '응시마감일', 'rules' => 'trim'],
            ['field' => 'TakeEndDatm_h', 'label' => '응시마감(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_m', 'label' => '응시마감(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeTime', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PaperType', 'label' => '시험지제공형태', 'rules' => 'trim|required|in_list[I,P]'],

            ['field' => 'MpIdx[]', 'label' => '과목선택', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockType[]', 'label' => '과목선택', 'rules' => 'trim|required|in_list[E,S]'],
            ['field' => 'OrderNum[]', 'label' => '과목정렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'IsSms', 'label' => '문자사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'Memo', 'label' => '문자내용', 'rules' => 'trim|callback_validateRequiredIf[IsSms,Y]'],
            ['field' => 'SendTel', 'label' => '문자발신번호', 'rules' => 'callback_validateRequiredIf[IsSms,Y]'],
            ['field' => 'grade_open_is_use', 'label' => '성적오픈일여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GradeOpenDatm_d', 'label' => '성적조회오픈일', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'GradeOpenDatm_h', 'label' => '성적조회오픈일(시)', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'GradeOpenDatm_m', 'label' => '성적조회오픈일(분)', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],

            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero']
        ];

        if (empty($this->_reqP('TakeFormsCcd[]')) === false && in_array($this->mockCommonModel->_ccd['applyType_off'], $this->_reqP('TakeFormsCcd[]')) === true) {
            $rules = array_merge($rules, [
                ['field' => 'TakeAreas1CCds[]', 'label' => 'Off(학원)응시지역1', 'rules' => 'trim|required|is_natural_no_zero'],
                /*['field' => 'ClosingPerson', 'label' => '접수마감인원', 'rules' => 'trim|required|is_natural_no_zero'],*/
            ]);
        }
        if ($this->validate($rules) === false) return;

        if ($this->_reqP('_method') == 'POST') {
            $method = 'add';
            $rules = [
                ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'cate_code', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'TakePart', 'label' => '응시분야', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'mock_part[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ];
        } else {
            $method = 'modify';
            $rules = [
                ['field' => 'prod_code', 'label' => '모의고사상품코드', 'rules' => 'trim|required|is_natural_no_zero']
            ];
        }
        if ($this->validate($rules) === false) return;

        $validate_result = $this->_validateForStore($this->_reqP(null));
        if ($validate_result !== true) {
            $this->json_error($validate_result);
            return;
        }

        $result = $this->regGoodsModel->{$method . 'Goods'}($this->_reqP(null, false));
        /*$result = true;*/
        $this->json_result($result, '저장되었습니다.', $result);
    }

    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGoodsModel->copyData($this->_reqP('prod_code'));
        $this->json_result($result, '복사되었습니다.', $result);
    }

    /**
     * 모의고사 데이터 검수
     * @param $form_data
     * @return bool|string
     */
    private function _validateForStore($form_data)
    {
        try {
            // 날짜체크
            $SaleStartDatm = element('SaleStartDatm_d', $form_data) .' '. element('SaleStartDatm_h', $form_data) .':'. element('SaleStartDatm_m', $form_data) .':00';
            $SaleEndDatm = element('SaleEndDatm_d', $form_data) .' '. element('SaleEndDatm_h', $form_data) .':'. element('SaleEndDatm_m', $form_data) .':59';
            $TakeStartDatm = element('TakeStartDatm_d', $form_data) .' '. element('TakeStartDatm_h', $form_data) .':'. element('TakeStartDatm_m', $form_data) .':00';
            $TakeEndDatm = element('TakeEndDatm_d', $form_data) .' '. element('TakeEndDatm_h', $form_data) .':'. element('TakeEndDatm_m', $form_data) .':59';

            if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('SaleStartDatm_d', $form_data)) ) {
                throw new \Exception('접수시작시간이 잘못되었습니다.');
            }
            if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('SaleEndDatm_d', $form_data)) ) {
                throw new \Exception('접수마감시간이 잘못되었습니다.');
            }
            if( (strtotime($SaleEndDatm) - strtotime($SaleStartDatm)) <= 0 ) {
                throw new \Exception('접수마감일이 접수시작일보다 빠릅니다.');
            }

            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('TakeStartDatm_d', $form_data)) || empty(element('TakeStartDatm_h', $form_data)) || empty(element('TakeStartDatm_m', $form_data))) {
                throw new \Exception('응시시작시간이 잘못되었습니다.');
            }
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('TakeEndDatm_d', $form_data)) || empty(element('TakeEndDatm_h', $form_data)) || empty(element('TakeEndDatm_m', $form_data))) {
                throw new \Exception('응시마감시간이 잘못되었습니다.');
            }
            if( (strtotime($TakeEndDatm) - strtotime($TakeStartDatm)) <= 0 ) {
                throw new \Exception('응시마감일이 응시시작일보다 빠릅니다.');
            }

            // 정렬번호 체크
            $orderE = $orderS = [];
            foreach (element('MockType', $form_data) as $k => $v) {
                if($v == 'E') $orderE[] = element('OrderNum', $form_data)[$k];
                else if($v == 'S') $orderS[] = element('OrderNum', $form_data)[$k];
            }

            if( count($orderE) == 0 ) {     //필수과목만 적용 (선택과목 없을 수 있음)
                throw new \Exception('과목을 선택해 주세요.');
            }

            if( count($orderE) != count(array_unique($orderE)) || count($orderE) != count(array_unique($orderE)) ) {
                throw new \Exception('과목 정렬번호가 중복되어 있습니다.');
            }
            if( count(element('MpIdx', $form_data)) != count(array_unique(element('MpIdx', $form_data))) ) {
                throw new \Exception('선택한 과목이 중복되어 있습니다.');
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}