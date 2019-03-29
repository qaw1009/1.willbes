<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLog extends \app\controllers\BaseController
{
    protected $models = array('sys/payLog');
    protected $helpers = array();
    private $_codes = [
        'pay' => [
            'PayType' => ['PA' => '결제요청', 'RP' => '부분환불', 'CA' => '결제취소', 'NC' => '망취소']
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
            'BDT' => ['RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]],
            'EQ' => [
                'PgMid' => $this->_reqP('search_pg_mid'),
                'PayType' => $this->_reqP('search_pay_type'),
                $this->_reqP('search_keyword') => $this->_reqP('search_value')
            ],
            'LKL' => [
                'PayMethod' => $this->_reqP('search_pay_method')
            ]
        ];
        
        // 연동오류만 보기 선택
        $search_is_result = $this->_reqP('search_is_result');
        if (empty($search_is_result) === false) {
            if ($search_is_result == 'Y') {
                if ($log_type == 'pay') {
                    $arr_condition['IN'] = ['ResultCode' => ['0000', '00']];
                } elseif ($log_type == 'deposit') {
                    $arr_condition['RAW'] = ['ErrorMsg is ' => 'null'];
                }
            } else {
                if ($log_type == 'pay') {
                    $arr_condition['NOTIN'] = ['ResultCode' => ['0000', '00']];
                } elseif ($log_type == 'deposit') {
                    $arr_condition['RAW'] = ['ErrorMsg is ' => 'not null'];
                }
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