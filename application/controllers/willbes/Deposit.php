<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends \app\controllers\FrontController
{
    protected $models = array('order/orderF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
        
        // pg 라이브러리 로드
        $this->load->driver('pg', ['driver' => config_app('PgDriver', 'inisis')]);
    }

    /**
     * PG사 가상계좌 입금통보 결과 수신 후 결제완료 업데이트
     * @return mixed
     */
    public function results()
    {
        // 가상계좌 입금통보 결과 리턴
        $deposit_results = $this->pg->depositResult();

        if ($deposit_results['result'] === true) {
            // 가상계좌 결제완료 프로세스 진행
            $result = $this->orderFModel->procDepositComplete($deposit_results);

            if ($result['ret_cd'] === true) {
                return $this->pg->depositReturn(true);
            } else {
                return $this->pg->depositReturn(false, $result['ret_msg'], $deposit_results['log_idx']);
            }
        }

        return null;
    }

    /**
     * 입금통보 연동 테스트 폼
     * TODO : 추후 삭제 가능
     */
    public function form()
    {
        $this->load->loadModels(['order/orderListF']);

        $order_no = $this->_req('order_no');
        if (empty($order_no) === true) {
            die('주문번호가 없습니다.');
        }

        $data = $this->orderListFModel->findOrder(['EQ' => ['O.OrderNo' => $order_no]]);
        if (empty($data) === true) {
            die('주문내역이 없습니다.');
        }

        $this->load->view('pg/inisis/deposit_test_form', [
            'data' => $data
        ], false);
    }
}
