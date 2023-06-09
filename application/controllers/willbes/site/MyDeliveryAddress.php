<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDeliveryAddress extends \app\controllers\FrontController
{
    protected $models = array('order/myDeliveryAddressF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 사용하는 그룹공통코드
    private $_tel1_ccd = '672';
    private $_phone1_ccd = '673';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 나의 배송주소록 목록
     */
    public function index()
    {
        $arr_condition = ['EQ' => ['MemIdx' => $this->session->userdata('mem_idx')]];
        $list = $this->myDeliveryAddressFModel->listMyDeliveryAddress(false, $arr_condition, 5, 0, ['AddrIdx' => 'asc']);

        // 지역번호, 휴대폰번호 공통코드 조회
        $codes = $this->codeModel->getCcdInArray([$this->_tel1_ccd, $this->_phone1_ccd]);

        $this->load->view('site/order/my_delivery_address_list', [
            'arr_tel1_ccd' => $codes[$this->_tel1_ccd],
            'arr_phone1_ccd' => $codes[$this->_phone1_ccd],
            'ele_id' => $this->_req('ele_id'),
            'results' => $list
        ]);
    }

    /**
     * 나의 배송주소록 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'addr_name', 'label' => '배송지', 'rules' => 'trim|required'],
            ['field' => 'receiver', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'zipcode', 'label' => '우편번호', 'rules' => 'trim|required|integer'],
            ['field' => 'addr1', 'label' => '기본주소', 'rules' => 'trim|required'],
            ['field' => 'addr2', 'label' => '상세주소', 'rules' => 'trim|required'],
            ['field' => 'receiver_phone', 'label' => '휴대폰번호', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver_phone1', 'label' => '휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver_phone2', 'label' => '휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver_phone3', 'label' => '휴대폰번호3', 'rules' => 'trim|required|integer']
        ];

        if (empty($this->_reqP('addr_idx')) === true) {
            $method = 'add';
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'addr_idx', 'label' => '주소 식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->myDeliveryAddressFModel->{$method . 'MyDeliveryAddress'}($this->_reqP(null, false));

        $this->json_result($result, '등록 되었습니다.', $result);
    }

    /**
     * 나의 배송주소록 삭제
     */
    public function destroy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'addr_idx', 'label' => '주소 식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->myDeliveryAddressFModel->removeMyDeliveryAddress($this->_reqP('addr_idx'));

        $this->json_result($result, '삭제 되었습니다.', $result);        
    }
}
