<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderMemo extends \app\controllers\BaseController
{
    protected $models = array('pay/orderMemo');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 주문메모 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = ['EQ' => ['OM.OrderIdx' => $this->_reqP('order_idx')]];

        $list = [];
        $count = $this->orderMemoModel->listOrderMemo(true, $arr_condition);

        if($count > 0) {
            $list = $this->orderMemoModel->listOrderMemo(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['OM.OrderMemoIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 주문메모 등록
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'order_memo', 'label' => '메모', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->orderMemoModel->addOrderMemo($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
