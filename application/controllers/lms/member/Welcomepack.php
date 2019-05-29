<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomepack extends \app\controllers\BaseController
{
    protected $models = array('member/welcomePack', 'sys/code');
    protected $helpers = array();
    private $_ccd = [
        'interest' => '718'
    ];

    public function __construct()
    {
        parent::__construct();

    }


    /**
     */
    public function index()
    {
        $this->load->view('member/welcomepack/list', [
            'wInterestCode' => $this->codeModel->getCcd($this->_ccd['interest'])
        ]);
    }


    /**
     * 리스트 읽어오기
     * @return CI_Output
     */
    public function ajaxList()
    {
        $cond_arr = [
            'EQ' => [
                'w.wInterestCode' => $this->_req("wInterestCode"),
                'w.wType' => $this->_req("wType")
            ]
        ];

        if(empty($this->_req("search_value")) == false){
            $cond_arr = array_merge($cond_arr, [
                'ORG' => [
                    'LKB' => [
                        'w.wDesc' => $this->_req("search_value"),
                        'p.ProdName' => $this->_req("search_value"),
                        'c.CouponName' => $this->_req("search_value")
                    ]
                ]
            ]);
        }

        $count = $this->welcomePackModel->getList($cond_arr, $this->_req('length'), $this->_req('start'), true);
        $list = $this->welcomePackModel->getList($cond_arr, $this->_req('length'), $this->_req('start'), false);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }


    /**
     * 신규 페이지
     * @return object|string
     */
    public function create()
    {
        return $this->load->view('member/welcomepack/create', [
            'wInterestCode' => $this->codeModel->getCcd($this->_ccd['interest'])
        ]);
    }


    /**
     * 신규저장
     * @return CI_Output
     */
    public function store()
    {
        $wInterestCode = $this->_req('wInterestCode');
        $wType = $this->_req('wType');
        $wDesc = $this->_req('wDesc');

        $CouponIdx = $this->_req('CouponIdx[]');
        $prod_code = $this->_req('prod_code[]');

        $data = [
            'wInterestCode' => $wInterestCode,
            'wType' => $wType,
            'wDesc' => $wDesc
        ];

        if($wType == 'C'){
            if(count($CouponIdx) == 1){
                $wCode = $CouponIdx[0];
            } else {
                return $this->json_error('쿠폰은 1개만 적용 가능합니다.');
            }
        } else if($wType == 'L'){
            if(count($prod_code) == 1){
                $wCode = $prod_code[0];
            } else {
                return $this->json_error('강좌는 1개만 적용 가능합니다.');
            }
        } else {
            return $this->json_error('분류가 잘못되었습니다.');
        }

        $predata = $this->welcomePackModel->getList([
            'EQ' => [
                'wInterestCode' => $wInterestCode,
                'wType' => $wType,
                'wCode' => $wCode
            ]
        ]);

        if(count($predata) > 0){
            return $this->json_error('이미 등록되어있는 상품입니다.');
        }

        $data = array_merge($data, [
            'wCode' => $wCode
        ]);

        if($this->welcomePackModel->storeItem($data) == false){
            return $this->json_error('등록에 오류가 발생했습니다.');
        }

        return $this->json_result(true, '등록되었습니다.');
    }


    /**
     * 상세보기
     * @param array $param
     * @return object|string
     */
    public function detail($param = [])
    {
        if(empty($param[0]) == true){
            show_alert('조회할 번호를 선택해주십시요.', 'back');
        }

        $wIdx = $param[0];

        $data = $this->welcomePackModel->getList([
            'EQ' => [
                'wIdx' => $wIdx
            ]
        ]);

        if(count($data) != 1){
            show_alert('조회할 데이터가 없습니다.', 'back');
        }

        $data = $data[0];

        return $this->load->view('member/welcomepack/view', [
            'data' => $data
        ]);
    }


    /**
     * 정보변경
     * @return CI_Output
     */
    public function set()
    {
        $wIdx = $this->_req('wIdx');
        $IsStatus = $this->_req('IsStatus');
        $wDesc = $this->_req('wDesc');

        $data = $this->welcomePackModel->getList([
            'EQ' => [
                'wIdx' => $wIdx
            ]
        ]);

        if(count($data) != 1){
            return $this->json_error('변경할 데이터가 없습니다.');
        }

        if( $this->welcomePackModel->setItem([
                'wIdx' => $wIdx,
                'IsStatus' => $IsStatus,
                'wDesc' => $wDesc
            ]) == false){
            return $this->json_error('정보 변경에 실패했습니다.');
        }

        return $this->json_result(true, '변경되었습니다.');
    }
}