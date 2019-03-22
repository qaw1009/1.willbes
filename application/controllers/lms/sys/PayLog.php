<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLog extends \app\controllers\BaseController
{
    protected $models = array('sys/payLog');
    protected $helpers = array();
    private $_codes = [
        'pay' => [
            'PayType' => ['PA' => '결제완료', 'RP' => '부분환불', 'CA' => '결제취소', 'NC' => '망취소']
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 결제로그 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $log_type = element('0', $params, 'pay');
        
        $this->load->view('sys/pay_log/' . $log_type . '_index', [
            'log_type' => $log_type
        ]);
    }

    /**
     * 결제로그 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $log_type = element('0', $params, 'pay');
        $order_column = ucfirst($log_type) . 'Idx';

        $arr_condition = [
            'BDT' => ['RegDatm' => [$this->input->post('search_start_date'), $this->input->post('search_end_date')]],
            'EQ' => ['OrderNo' => $this->_reqP('search_value')]
        ];
        
        // 연동오류만 보기 선택
        if ($this->_reqP('search_chk_is_error') === 'Y') {
            if ($log_type == 'pay') {
                $arr_condition['NOTIN'] = ['ResultCode' => ['0000', '00']];
            } elseif ($log_type == 'deposit') {
                $arr_condition['RAW'] = ['ErrorMsg is ' => 'not null'];
            }
        }

        $list = [];
        $count = $this->payLogModel->listPayLog($log_type, true, $arr_condition);

        if ($count > 0) {
            $list = $this->payLogModel->listPayLog($log_type, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), [$order_column => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'codes' => element($log_type, $this->_codes, [])
        ]);
    }
}