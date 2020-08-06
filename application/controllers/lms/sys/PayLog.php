<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLog extends \app\controllers\BaseController
{
    protected $models = array('sys/payLog');
    protected $helpers = array();
    private $_codes = [
        'pay' => [
            'PayType' => ['PA' => '결제요청', 'RP' => '부분환불', 'CA' => '결제취소', 'NC' => '망취소', 'MP' => '결제요청(모바일)']
        ],
        'stats' => [
            'PayMethodName' => ['Card' => '신용카드', 'DirectBank' => '실시간계좌이체', 'VBank' => '가상계좌(무통장입금)', 'VDeposit' => '가상계좌(입금통보)']
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
        $order_column = 'PL.'.ucfirst($log_type) . 'Idx';

        $arr_condition = [
            'BDT' => ['PL.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]],
            'EQ' => ['PL.PgMid' => $this->_reqP('search_pg_mid')]
        ];

        // 검색어
        $search_value = $this->_reqP('search_value');
        if (empty($search_value) === false) {
            $arr_condition['LKB']['PL.' . $this->_reqP('search_keyword')] = $search_value;
        }

        // 연동구분
        $search_pay_type = $this->_reqP('search_pay_type');
        if (empty($search_pay_type) === false) {
            if ($log_type == 'pay') {
                $arr_condition['EQ']['PL.PayType'] = $search_pay_type;
            } elseif ($log_type == 'deposit') {
                if ($search_pay_type == 'PC') {
                    $arr_condition['RAW']['PL.MsgSeq not like'] = ' "M2%"';
                } elseif ($search_pay_type == 'MO') {
                    $arr_condition['RAW']['PL.MsgSeq like'] = ' "M2%"';
                }
            }
        }

        // 결제/취소 결제방법 조건
        $search_pay_method = $this->_reqP('search_pay_method');
        if (empty($search_pay_method) === false) {
            if ($search_pay_method == 'DirectBank') {
                $arr_condition['IN']['PL.PayMethod'] = ['DirectBank', 'BANK'];     // 실시간계좌이체
            } else {
                $arr_condition['LKL']['PL.PayMethod'] = $search_pay_method;
            }
        }
        
        // 연동성공여부 조건
        $search_is_result = $this->_reqP('search_is_result');
        if (empty($search_is_result) === false) {
            if ($search_is_result == 'Y') {
                if ($log_type == 'pay') {
                    $arr_condition['IN']['PL.ResultCode'] = ['0000', '00'];
                } elseif ($log_type == 'deposit') {
                    $arr_condition['RAW']['PL.ErrorMsg is'] = ' null';
                }
            } else {
                if ($log_type == 'pay') {
                    $arr_condition['NOTIN']['PL.ResultCode'] = ['0000', '00'];
                } elseif ($log_type == 'deposit') {
                    $arr_condition['RAW']['PL.ErrorMsg is'] = ' not null';
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

    /**
     * 결제통계 인덱스
     * @param array $params
     */
    public function stats($params = [])
    {
        $this->load->view('sys/pay_log/stats_index', []);
    }

    /**
     * 결제통계 조회
     * @param array $params
     * @return CI_Output
     */
    public function statsAjax($params = [])
    {
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));
        $arr_condition = [
            'EQ' => [
                'PgMid' => $this->_reqP('search_pg_mid'),
                'PayMethod' => $this->_reqP('search_pay_method'),
            ]
        ];

        // 통계 데이터 조회
        $list = $this->payLogModel->listPayStats($search_start_date, $search_end_date, $arr_condition);
        $count = count($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'codes' => element('stats', $this->_codes, [])
        ]);
    }
}
