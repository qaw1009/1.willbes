<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 모의고사별 현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class TransferData extends \app\controllers\BaseController
{
    protected $models = array('mocktest/regGrade');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('mocktest/reg/transfer_data/index', [
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'mem_id', 'label' => '회원아이디', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required'],
            ['field' => 'refund_take_num', 'label' => '환불된 수험번호', 'rules' => 'trim|required'],
            ['field' => 'refund_order_no', 'label' => '환불된 주문번호', 'rules' => 'trim|required'],
            ['field' => 'take_num', 'label' => '이관할 대상 수험번호', 'rules' => 'trim|required'],
            ['field' => 'order_no', 'label' => '이괄할 대상 주문번호', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGradeModel->MemberTransferData($this->_reqP(null));
        $this->json_result($result, '정상 처리되었습니다.', $result);
    }
}