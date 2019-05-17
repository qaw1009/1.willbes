<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoods extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regGoods','product/on/lecture');
    protected $helpers = array();

    protected $_groupCcd = [];

    protected $applyType;
    protected $applyArea1;
    protected $applyArea2;
    protected $addPoint;
    protected $applyType_on;
    protected $applyType_off;
    protected $acceptStatus;

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
        $this->_groupCcd = $this->regGoodsModel->_groupCcd;
    }

    /**
     * 메인
     */
    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['675']);

        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->acceptStatus]);

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/reg/goods/index', [
//            'siteCodeDef' => $cateD1[0]['SiteCode'],
            //            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[5]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'applyType' => $codes[$this->applyType],
            'accept_ccd' => $codes[$this->acceptStatus],
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
            $searchdate1 = '(PD.SaleStartDatm > "';
            $searchdate2 = date('Y-m-d H:i:s') . '")';
        } else if($s_type == 2) {
            $searchdate1 = '(PD.SaleStartDatm < "';
            $searchdate2 = date('Y-m-d H:i:s') . '" AND PD.SaleEndDatm > "' . date('Y-m-d H:i:s') . '")';
        } else {
            $searchdate1 = '1';
            $searchdate2 = '1';
        }

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'PC.CateCode' => $this->input->post('search_cateD1'),
                'MP.MockYear' => $this->input->post('search_year'),
                'MP.MockRotationNo' => $this->input->post('search_round'),
                //'MP.AcceptStatusCcd' => $this->input->post('search_AcceptStatus'),
                'MP.TakeType' => $this->input->post('search_TakeType'),
                'PD.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->input->post('search_cateD2'),
                'MP.TakeFormsCcd' => $this->input->post('search_TakeFormsCcd'),
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
            'RAW' => [ $searchdate1 => $searchdate2 ],
        ];
        list($data, $count) = $this->regGoodsModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 데이터 복사
     */
    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGoodsModel->copyData($this->input->post('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }


    /**
     * 등록폼
     */
    public function create()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->applyArea1, $this->applyArea2, $this->addPoint, $this->acceptStatus]);
        $csTel = $this->siteModel->getSiteArray(false, 'CsTel');

        $cateD2Json = array();
        foreach ($cateD2 as $it) {
            $cateD2Json[ $it['ParentCateCode'] ][ $it['CateCode'] ] = $it['CateName'];
        }

        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $data_memo = array();
        $data_autocoupon = array();

        $this->load->view('mocktest/reg/goods/create', [
            'method' => 'POST',
            'siteCodeDef' => '',
            'cateD1' => $cateD1,
            'cateD2' => json_encode($cateD2Json),
            'applyType' => $codes[$this->applyType],
            'applyArea1' => $codes[$this->applyArea1],
            'applyArea2' => $codes[$this->applyArea2],
            'addPoint' => $codes[$this->addPoint],
            'data_autocoupon'=>$data_autocoupon,
            'data_memo'=>$data_memo,
            'csTel' => json_encode($csTel),
            'cateD2_sel' => json_encode(array()),
            'applyType_on' => $this->applyType_on,
            'accept_ccd' => $codes[$this->acceptStatus],
            'arr_send_callback_ccd' => $arr_send_callback_ccd
        ]);
    }

    /**
     * 등록폼
     */
    public function fakeCreate($param = [])
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->applyArea1, $this->applyArea2, $this->addPoint,$this->acceptStatus]);
        $csTel = $this->siteModel->getSiteArray(false, 'CsTel');

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $mode = element('mode',$arr_input);

        if(!$mode) $mode = 'single';

        $cateD2Json = array();
        foreach ($cateD2 as $it) {
            $cateD2Json[ $it['ParentCateCode'] ][ $it['CateCode'] ] = $it['CateName'];
        }


        list($data, $sData) = $this->regGoodsModel->getGoods($param[0]);
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        $this->load->view('mocktest/reg/goods/fake', [
            'method' => 'PUT',
            'siteCodeDef' => $data['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => json_encode($cateD2Json),
            'applyType' => $codes[$this->applyType],
            'applyArea1' => $codes[$this->applyArea1],
            'applyArea2' => $codes[$this->applyArea2],
            'addPoint' => $codes[$this->addPoint],
            'csTel' => json_encode($csTel),
            'applyType_on' => $this->applyType_on,
            'accept_ccd' => $codes[$this->acceptStatus],

            'data' => $data,
            'sData' => $sData,
            'cateD2_sel' => json_encode($data['MockPart']),
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'prodidx' => $param[0],
            'mode' => $mode
        ]);
    }

    function fakeInsert(){
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $condition = $arr_input;
        $this->regGoodsModel->saveFake($condition);
    }

    function fakeInsert2(){
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $idx = element('idx',$arr_input);
        $TakeFormsCcd = element('TakeFormsCcd',$arr_input);
        $MpIdx1 = element('MpIdx1',$arr_input);
        $MpIdx2 = element('MpIdx2',$arr_input);
        $SMpIdx1 = element('SMpIdx1',$arr_input);
        $SMpIdx2 = element('SMpIdx2',$arr_input);
        $AddPointCcds = element('AddPointCcds',$arr_input);
        $people = element('people',$arr_input);
        $cate = element('cate',$arr_input);
        $mode = element('mode',$arr_input);

        $this->regGoodsModel->saveFake2($idx,$TakeFormsCcd,$MpIdx1,$MpIdx2,$SMpIdx1,$SMpIdx2,$AddPointCcds,$people,$cate,$mode);
    }

    /**
     * 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakePart', 'label' => '응시분야', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD2[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'TakeFormsCcd', 'label' => '응시형태', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeAreas1CCds[]', 'label' => 'Off(학원)응시지역1', 'rules' => 'trim|is_natural_no_zero'],
            //['field' => 'TakeAreas2Ccds[]', 'label' => 'Off(학원)응시지역2', 'rules' => 'trim|is_natural_no_zero'],
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

            ['field' => 'ClosingPerson', 'label' => '접수마감인원', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'IsRegister', 'label' => '접수상태', 'rules' => 'trim'],
            //['field' => 'TakeType', 'label' => '응시가능타입', 'rules' => 'trim|required|in_list[A,L]'],
            ['field' => 'TakeStartDatm_d', 'label' => '응시시작일', 'rules' => 'trim'],
            ['field' => 'TakeStartDatm_h', 'label' => '응시시작(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeStartDatm_m', 'label' => '응시시작(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_d', 'label' => '응시마감일', 'rules' => 'trim'],
            ['field' => 'TakeEndDatm_h', 'label' => '응시마감(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_m', 'label' => '응시마감(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeTime', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'MpIdx[]', 'label' => '과목선택', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockType[]', 'label' => '과목선택', 'rules' => 'trim|required|in_list[E,S]'],
            ['field' => 'OrderNum[]', 'label' => '과목정렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'IsSms', 'label' => '문자사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'Memo', 'label' => '문자내용', 'rules' => 'trim'],
            //['field' => 'SendTel', 'label' => '문자발신번호', 'rules' => 'trim'],

            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;


        // 날짜체크
        $SaleStartDatm = $this->input->post('SaleStartDatm_d') .' '. $this->input->post('SaleStartDatm_h') .':'. $this->input->post('SaleStartDatm_m') .':00';
        $SaleEndDatm = $this->input->post('SaleEndDatm_d') .' '. $this->input->post('SaleEndDatm_h') .':'. $this->input->post('SaleEndDatm_m') .':59';
        $TakeStartDatm = $this->input->post('TakeStartDatm_d') .' '. $this->input->post('TakeStartDatm_h') .':'. $this->input->post('TakeStartDatm_m') .':00';
        $TakeEndDatm = $this->input->post('TakeEndDatm_d') .' '. $this->input->post('TakeEndDatm_h') .':'. $this->input->post('TakeEndDatm_m') .':59';

        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleStartDatm_d']) ) {
            $this->json_error('접수시작시간이 잘못되었습니다.');
            return;
        }
        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleEndDatm_d']) ) {
            $this->json_error('접수마감시간이 잘못되었습니다.');
            return;
        }
        if( (strtotime($SaleEndDatm) - strtotime($SaleStartDatm)) <= 0 ) {
            $this->json_error('접수마감일이 접수시작일보다 빠릅니다.');
            return;
        }
        if( $this->input->post('TakeType') == 'L' ) { // 기간제한이 있는 경우
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $this->input->post('TakeStartDatm_d')) || empty($_POST['TakeStartDatm_h']) || empty($_POST['TakeStartDatm_m'])) {
                $this->json_error('응시시작시간이 잘못되었습니다.');
                return;
            }
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $this->input->post('TakeEndDatm_d')) || empty($_POST['TakeEndDatm_h']) || empty($_POST['TakeEndDatm_m'])) {
                $this->json_error('응시마감시간이 잘못되었습니다.');
                return;
            }
            if( (strtotime($TakeEndDatm) - strtotime($TakeStartDatm)) <= 0 ) {
                $this->json_error('응시마감일이 응시시작일보다 빠릅니다.');
                return;
            }
        }

        // 응시형태 OFF 포함인 경우 응시지역, 접수마감인원 필수
        //if( in_array($this->applyType_off, $this->input->post('TakeFormsCcd')) ) {
        if( $this->applyType_off == $this->input->post('TakeFormsCcd') ) {
            if( !$this->input->post('TakeAreas1CCds') || !$this->input->post('ClosingPerson') ) {
                $this->json_error('응시형태 OFF(학원)선택시 응시지역, 접수마감인원은 필수입니다.');
                return;
            }
        }

        // 문자
        if( $_POST['IsSms'] == 'Y' && empty($_POST['Memo']) ) {
            $this->json_error('문자내용을 입력해 주세요.');
            return;
        }
        /*
        if( !preg_match('/^[0-9\-]{3,}$/', $_POST['SendTel']) ) {
            $this->json_error('발신번호가 잘못되었습니다.');
            return;
        }*/

        // 정렬번호 체크
        $orderE = $orderS = [];
        foreach ($_POST['MockType'] as $k => $v) {
            if($v == 'E') $orderE[] = $_POST['OrderNum'][$k];
            else if($v == 'S') $orderS[] = $_POST['OrderNum'][$k];
        }
        /*
        if( count($orderE) == 0 || count($orderS) == 0 ) {
            $this->json_error('과목을 선택해 주세요.');
            return;
        }
        */
        if( count($orderE) == 0 ) {     //필수과목만 적용 (선태과목 없을 수 있음)
            $this->json_error('과목을 선택해 주세요.');
            return;
        }

        if( count($orderE) != count(array_unique($orderE)) || count($orderE) != count(array_unique($orderE)) ) {
            $this->json_error('과목 정렬번호가 중복되어 있습니다.');
            return;
        }
        if( count($_POST['MpIdx']) != count(array_unique($_POST['MpIdx'])) ) {
            $this->json_error('선택한 과목이 중복되어 있습니다.');
            return;
        }

        $result = $this->regGoodsModel->store($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm);
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 수정폼
     */
    public function edit($param = [])
    {
        $prodcode = $param[0];
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->applyArea1, $this->applyArea2, $this->addPoint,$this->acceptStatus]);
        $csTel = $this->siteModel->getSiteArray(false, 'CsTel');

        $cateD2Json = array();
        foreach ($cateD2 as $it) {
            $cateD2Json[ $it['ParentCateCode'] ][ $it['CateCode'] ] = $it['CateName'];
        }


        list($data, $sData) = $this->regGoodsModel->getGoods($prodcode);
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $data_autocoupon = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
        $data_memo = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_memo');

        $this->load->view('mocktest/reg/goods/create', [
            'method' => 'PUT',
            'siteCodeDef' => $data['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => json_encode($cateD2Json),
            'applyType' => $codes[$this->applyType],
            'applyArea1' => $codes[$this->applyArea1],
            'applyArea2' => $codes[$this->applyArea2],
            'addPoint' => $codes[$this->addPoint],
            'csTel' => json_encode($csTel),
            'applyType_on' => $this->applyType_on,
            'accept_ccd' => $codes[$this->acceptStatus],
            'data_autocoupon'=>$data_autocoupon,
            'data_memo'=>$data_memo,
            'data' => $data,
            'sData' => $sData,
            'cateD2_sel' => json_encode($data['MockPart']),
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'arr_send_callback_ccd' => $arr_send_callback_ccd
        ]);
    }


    /**
     * 수정
     */
    public function update()
    {
        $Info = @json_decode($this->input->post('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'TakeFormsCcd[]', 'label' => '응시형태', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeAreas1CCds[]', 'label' => 'Off(학원)응시지역1', 'rules' => 'trim|is_natural_no_zero'],
            //['field' => 'TakeAreas2Ccds[]', 'label' => 'Off(학원)응시지역2', 'rules' => 'trim|is_natural_no_zero'],
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

            ['field' => 'ClosingPerson', 'label' => '접수마감인원', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'AcceptStatusCcd', 'label' => '접수상태', 'rules' => 'trim'],
            //['field' => 'TakeType', 'label' => '응시가능타입', 'rules' => 'trim|required|in_list[A,L]'],
            ['field' => 'TakeStartDatm_d', 'label' => '응시시작일', 'rules' => 'trim'],
            ['field' => 'TakeStartDatm_h', 'label' => '응시시작(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeStartDatm_m', 'label' => '응시시작(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_d', 'label' => '응시마감일', 'rules' => 'trim|required'],
            ['field' => 'TakeEndDatm_h', 'label' => '응시마감(시)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeEndDatm_m', 'label' => '응시마감(분)', 'rules' => 'trim|numeric'],
            ['field' => 'TakeTime', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'MpIdx[]', 'label' => '과목선택', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockType[]', 'label' => '과목선택', 'rules' => 'trim|required|in_list[E,S]'],
            ['field' => 'OrderNum[]', 'label' => '과목정렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'IsSms', 'label' => '문자사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'Memo', 'label' => '문자내용', 'rules' => 'trim'],
            //['field' => 'SendTel', 'label' => '문자발신번호', 'rules' => 'trim'],

            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],

            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;


        // 날짜체크
        $SaleStartDatm = $this->input->post('SaleStartDatm_d') .' '. $this->input->post('SaleStartDatm_h') .':'. $this->input->post('SaleStartDatm_m') .':00';
        $SaleEndDatm = $this->input->post('SaleEndDatm_d') .' '. $this->input->post('SaleEndDatm_h') .':'. $this->input->post('SaleEndDatm_m') .':59';
        $TakeStartDatm = $this->input->post('TakeStartDatm_d') .' '. $this->input->post('TakeStartDatm_h') .':'. $this->input->post('TakeStartDatm_m') .':00';
        $TakeEndDatm = $this->input->post('TakeEndDatm_d') .' '. $this->input->post('TakeEndDatm_h') .':'. $this->input->post('TakeEndDatm_m') .':59';

        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleStartDatm_d']) ) {
            $this->json_error('접수시작시간이 잘못되었습니다.');
            return;
        }
        if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['SaleEndDatm_d']) ) {
            $this->json_error('접수마감시간이 잘못되었습니다.');
            return;
        }
        if( (strtotime($SaleEndDatm) - strtotime($SaleStartDatm)) <= 0 ) {
            $this->json_error('접수마감일이 접수시작일보다 빠릅니다.');
            return;
        }
        if( $this->input->post('TakeType') == 'L' ) { // 기간제한이 있는 경우
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $this->input->post('TakeStartDatm_d')) || empty($_POST['TakeStartDatm_h']) || empty($_POST['TakeStartDatm_m'])) {
                $this->json_error('응시시작시간이 잘못되었습니다.');
                return;
            }
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $this->input->post('TakeEndDatm_d')) || empty($_POST['TakeEndDatm_h']) || empty($_POST['TakeEndDatm_m'])) {
                $this->json_error('응시마감시간이 잘못되었습니다.');
                return;
            }
            if( (strtotime($TakeEndDatm) - strtotime($TakeStartDatm)) <= 0 ) {
                $this->json_error('응시마감일이 응시시작일보다 빠릅니다.');
                return;
            }
        }

        // 응시형태 OFF 포함인 경우 응시지역, 접수마감인원 필수
        //if( in_array($this->applyType_off, $this->input->post('TakeFormsCcd')) ) {
        if( $this->applyType_off == $this->input->post('TakeFormsCcd') ) {
            if( !$this->input->post('TakeAreas1CCds') || !$this->input->post('ClosingPerson') ) {
                $this->json_error('응시형태 OFF(학원)선택시 응시지역, 접수마감인원은 필수입니다.');
                return;
            }
        }

        // 문자
        if( $_POST['IsSms'] == 'Y' && empty($_POST['Memo']) ) {
            $this->json_error('문자내용을 입력해 주세요.');
            return;
        }
        /*
        if( !preg_match('/^[0-9\-]{3,}$/', $_POST['SendTel']) ) {
            $this->json_error('발신번호가 잘못되었습니다.');
            return;
        }*/

        // 정렬번호 체크
        $orderE = $orderS = [];
        foreach ($_POST['MockType'] as $k => $v) {
            if($v == 'E') $orderE[] = $_POST['OrderNum'][$k];
            else if($v == 'S') $orderS[] = $_POST['OrderNum'][$k];
        }
        /*
        if( count($orderE) == 0 || count($orderS) == 0 ) {
            $this->json_error('과목을 선택해 주세요.');
            return;
        }
        */
        if( count($orderE) == 0 ) {     //필수과목만 적용 (선태과목 없을 수 있음)
            $this->json_error('과목을 선택해 주세요.');
            return;
        }


        if( count($orderE) != count(array_unique($orderE)) || count($orderE) != count(array_unique($orderE)) ) {
            $this->json_error('과목 정렬번호가 중복되어 있습니다.');
            return;
        }
        if( count($_POST['MpIdx']) != count(array_unique($_POST['MpIdx'])) ) {
            $this->json_error('선택한 과목이 중복되어 있습니다.');
            return;
        }

        $result = $this->regGoodsModel->update($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm);
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 과목검색창 오픈
     */
    public function searchExam()
    {
        $siteCodeDef = $this->input->get('siteCode');
        $cateD1Def = $this->input->get('cateD1');
        $suType = $this->input->get('suType');

        if ( empty($siteCodeDef) || !preg_match('/^[0-9]+$/', $siteCodeDef) ||
            empty($cateD1Def) || !preg_match('/^[0-9]+$/', $cateD1Def) ||
            empty($suType) || !preg_match('/^(E|S)$/', $suType) ) {
            return false;
        }

        $this->load->view('mocktest/reg/goods/searchExam', [
            'siteCodeDef' => $siteCodeDef,
            'cateD1Def' => $cateD1Def,
            'suType' => $suType,
            'cateD1' => $this->categoryModel->getCategoryArray('', '', '', 1),
            'cateD2' => $this->mockCommonModel->getMockKind(),
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
        ]);
    }


    /**
     * 과목검색창 팝업리스트
     */
    public function searchExamList()
    {
        $rules = [
            ['field' => 'sc_siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sc_cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sc_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_subject', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_professor', 'label' => '교수', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_questionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],

            ['field' => 'sc_suType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'EB.SiteCode' => $this->input->post('sc_siteCode'),
                'MB.CateCode' => $this->input->post('sc_cateD1'),
                'MB.Ccd' => $this->input->post('sc_cateD2'),
                'EB.Year' => $this->input->post('sc_year'),
                'EB.RotationNo' => $this->input->post('sc_round'),
                'MS.SubjectIdx' => $this->input->post('sc_subject'),
                'EB.ProfIdx' => $this->input->post('sc_professor'),
                'EB.QuestionOption' => $this->input->post('sc_questionOption'),

                'MS.SubjectType' => $this->input->post('sc_suType'),
            ],
            'ORG' => [
                'LKB' => [
                    'EB.PapaerName' => $this->input->post('sc_fi', true),
                    'C1.CateName' => $this->input->post('sc_fi', true),
                    'SC.CcdName' => $this->input->post('sc_fi', true),
                    'SJ.SubjectName' => $this->input->post('sc_fi', true),
                    'PMS.wProfName' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regGoodsModel->searchExamList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 과목검색 정렬변경
     */
    public function searchExamSort()
    {
        $sorting = @json_decode($this->input->post('sorting'));
        if(!is_object($sorting)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['tmp_key'] = array_keys((array) $sorting);
            $_POST['tmp_val'] = array_values((array) $sorting);
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'tmp_key[]', 'label' => '정렬번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'tmp_val[]', 'label' => '정렬번호', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        if( count($_POST['tmp_val']) != count(array_unique($_POST['tmp_val'])) ) {
            $this->json_error('정렬번호가 중복되어 있습니다.');
            return;
        }

        $result = $this->regGoodsModel->searchExamSort($sorting);
        if($result === true)
            $this->json_result($result, '정렬되었습니다.', $result);
        else
            $this->json_error('정렬에 실패했습니다.');
    }
}
