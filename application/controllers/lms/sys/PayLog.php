<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLog extends \app\controllers\BaseController
{
    protected $models = array('sys/payLog');
    protected $helpers = array();
    private $_grp_codes = [
        'pay' => ['PgDriver', 'PgMid', 'PayType', 'PayMethod'],
        'deposit' => ['PgDriver', 'PgMid', 'DepositType'],
        'escrow' => ['PgDriver', 'PgBookMid'],
        'stats' => ['PgMid', 'PayDepositMethod'],
        'cancel_stats' => ['PgMid', 'CancelType'],
    ];
    private $_codes = [
        'PgDriver' => ['inisis' => '이니시스', 'toss' => '토스'],
        'PgMid' => [
            'willbes015' => '동영상(willbes015)', 'willbes515' => '교재(willbes515)', 'willbes018' => '임용동영상(willbes018)', 'willbes518' => '임용교재(willbes518)',
            'willbes006' => '인천학원(willbes006)', 'INIpayTest' => '테스트(이니시스)', 'tvivarepublica' => '테스트(토스)'
        ],
        'PgBookMid' => [
            'willbes515' => '교재(willbes515)', 'willbes518' => '임용교재(willbes518)', 'INIpayTest' => '테스트(이니시스)', 'tvivarepublica' => '테스트(토스)'
        ],
        'PayType' => ['PA' => '결제요청', 'CA' => '결제취소', 'NC' => '망취소', 'RP' => '부분환불', 'MP' => '결제요청(모바일)'],
        'CancelType' => ['CA' => '결제취소', 'NC' => '망취소', 'RP' => '부분환불'],
        'DepositType' => ['PC' => 'PC', 'MO' => '모바일'],
        'PayMethod' => ['Card' => '신용카드', 'DirectBank' => '실시간계좌이체', 'VBank' => '가상계좌(무통장입금)'],
        'PayDepositMethod' => ['Card' => '신용카드', 'DirectBank' => '실시간계좌이체', 'VBank' => '가상계좌(무통장입금)', 'VDeposit' => '가상계좌(입금통보)'],
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
            'log_type' => $log_type,
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes[$log_type])
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
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));

        $arr_condition = [
            'BDT' => ['PL.RegDatm' => [$search_start_date, $search_end_date]],
            'EQ' => ['PL.PgMid' => $this->_reqP('search_pg_mid'), 'PL.PgDriver' => $this->_reqP('search_pg_driver')]
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
                if (in_array($log_type, ['pay', 'escrow']) === true) {
                    $arr_condition['IN']['PL.ResultCode'] = ['0000', '00'];
                } elseif ($log_type == 'deposit') {
                    $arr_condition['RAW']['PL.ErrorMsg is'] = ' null';
                }
            } else {
                if (in_array($log_type, ['pay', 'escrow']) === true) {
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
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes[$log_type])
        ]);
    }

    /**
     * 승인완료 통계 인덱스
     * @param array $params
     */
    public function stats($params = [])
    {
        $this->load->view('sys/pay_log/stats_index', [
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes['stats'])
        ]);
    }

    /**
     * 승인완료 통계 조회
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
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes['stats'])
        ]);
    }

    /**
     * 결제취소 통계 인덱스
     * @param array $params
     */
    public function cancelStats($params = [])
    {
        $this->load->view('sys/pay_log/cancel_stats_index', [
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes['cancel_stats'])
        ]);
    }

    /**
     * 결제취소 통계 조회
     * @param array $params
     * @return CI_Output
     */
    public function cancelStatsAjax($params = [])
    {
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));
        $arr_condition = [
            'EQ' => [
                'PgMid' => $this->_reqP('search_pg_mid'),
                'PayType' => $this->_reqP('search_pay_type'),
            ]
        ];

        // 통계 데이터 조회
        $list = $this->payLogModel->listCancelStats($search_start_date, $search_end_date, $arr_condition);
        $count = count($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'codes' => array_filter_keys($this->_codes, $this->_grp_codes['cancel_stats'])
        ]);
    }

    /**
     * 에스크로 배송등록 재전송
     * @return CI_Output
     */
    public function escrowResend()
    {
        $escrow_idx = $this->_reqP('idx');
        if (empty($escrow_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 에스크로 로그 조회
        $arr_condition = ['EQ' => ['EscrowIdx' => $escrow_idx]];
        $row = element('0', $this->payLogModel->listPayLog('escrow', false, $arr_condition, 1, 0));
        if (empty($row) === true) {
            return $this->json_error('에스크로 배송등록 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 에스크로 배송등록 재전송
        $this->load->driver('pg', ['driver' => $row['PgDriver']]);

        $escrow_resend_data[0] = [
            'order_no' => $row['OrderNo'],
            'mid' => $row['PgMid'],
            'delivery_comp_ccd' => $row['EscrowParam1'],
            'invoice_no' => $row['EscrowParam2'],
            'delivery_send_datm' => $row['EscrowDatm']
        ];

        $escrow_resend_result = $this->pg->escrowDeliveryRegist($escrow_resend_data);
        if ($escrow_resend_result === false) {
            return $this->json_error('에스크로 배송등록 연동 중 오류가 발생했습니다.');
        }

        // 에스크로 배송등록 재전송여부 업데이트
        $is_resend_update = $this->payLogModel->modifyEscrowIsResend($escrow_idx);
        if ($is_resend_update !== true) {
            return $this->json_error('에스크로 배송등록 정보 수정에 실패했습니다.');
        }

        return $this->json_result(true, '에스크로 배송등록 연동이 완료되었습니다.');
    }
}
