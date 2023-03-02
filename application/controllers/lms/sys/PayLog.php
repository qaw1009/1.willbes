<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLog extends \app\controllers\BaseController
{
    protected $models = array('sys/payLog', 'sys/pgKey');
    protected $helpers = array();
    private $_grp_codes = [
        'pay' => ['PgDriver', 'PgMid', 'PayType', 'PayMethod'],
        'deposit' => ['PgDriver', 'PgMid', 'DepositType'],
        'escrow' => ['PgDriver', 'PgBookMid'],
        'method' => ['PgDriver', 'PgMid', 'PayType2'],
        'stats' => ['PgMid', 'PayDepositMethod'],
        'pay_stats' => ['PgMid', 'PayDepositMethod'],
        'cancel_stats' => ['PgMid', 'CancelType'],
    ];
    private $_codes = [
        'PgDriver' => ['inisis' => '이니시스', 'toss' => '토스'],
        'PgMid' => [
            'willbes015' => '동영상(willbes015)', 'willbes515' => '교재(willbes515)', 'willbes018' => '임용동영상(willbes018)', 'willbes518' => '임용교재(willbes518)',
            'willbes006' => '인천학원(willbes006)'
        ],
        'PgBookMid' => [
            'willbes515' => '교재(willbes515)', 'willbes518' => '임용교재(willbes518)', 'willbes107' => '윌스토리(교재)(willbes107)'
        ],
        'PayType' => ['PA' => '결제요청', 'CA' => '결제취소', 'NC' => '망취소', 'RP' => '부분환불', 'MP' => '결제요청(모바일)'],
        'PayType2' => ['WA' => '입금대기', 'PA' => '결제완료', 'CA' => '결제취소', 'NC' => '망취소', 'RP' => '부분환불'],
        'CancelType' => ['CA' => '결제취소', 'NC' => '망취소', 'RP' => '부분환불'],
        'DepositType' => ['PC' => 'PC', 'MO' => '모바일'],
        'PayMethod' => ['Card' => '신용카드', 'DirectBank' => '실시간계좌이체', 'VBank' => '가상계좌(무통장입금)'],
        'PayDepositMethod' => ['Card' => '신용카드', 'DirectBank' => '실시간계좌이체', 'VBank' => '가상계좌(무통장입금)', 'VDeposit' => '가상계좌(입금통보)'],
    ];
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

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
            'codes' => $this->_getLogTypeCodes($log_type)
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
        $order_column = 'PL.' . ucfirst($log_type) . 'Idx';
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
            'codes' => $this->_getLogTypeCodes($log_type, false)
        ]);
    }

    /**
     * 결제방법별 결제로그 인덱스
     * @param array $params [결제방법 (card, bank, vbank)]
     */
    public function method($params = [])
    {
        $log_type = element('0', $params, 'card');
        $view_type = $log_type == 'vbank' ? 'vbank' : 'normal';

        $this->load->view('sys/pay_log/method_' . $view_type . '_index', [
            'log_type' => $log_type,
            'log_name' => $this->_getMethodNameByLogType($log_type),
            'codes' => $this->_getLogTypeCodes('method')
        ]);
    }

    /**
     * 결제방법별 결제로그 목록 조회
     * @param array $params [결제방법 (card, bank, vbank)]
     * @return CI_Output
     */
    public function methodAjax($params = [])
    {
        $log_type = element('0', $params, 'card');
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));

        $arr_condition = $this->_getMethodConditions();
        $count = $this->payLogModel->listPayMethodLog($log_type, $search_start_date, $search_end_date, true, $arr_condition);
        $list = [];
        $sum_data = null;

        if ($count > 0) {
            $list = $this->payLogModel->listPayMethodLog($log_type, $search_start_date, $search_end_date, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

            // 합계
            $sum_data = element('0', $this->payLogModel->listPayMethodLog($log_type, $search_start_date, $search_end_date, 'sum', $arr_condition));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data,
            'codes' => $this->_getLogTypeCodes('method', false)
        ]);
    }

    /**
     * 결제방법별 상점아이디별 통계
     * @param array $params [결제방법 (card, bank, vbank)]
     */
    public function methodStats($params = [])
    {
        $log_type = element('0', $params, 'card');
        $search_start_date = get_var($this->_req('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_req('search_end_date'), date('Y-m-d'));

        $arr_condition = $this->_getMethodConditions();
        $list = $this->payLogModel->listPayMethodLog($log_type, $search_start_date, $search_end_date, 'group_sum', $arr_condition);

        $this->load->view('sys/pay_log/method_stats_modal', [
            'log_type' => $log_type,
            'log_name' => $this->_getMethodNameByLogType($log_type),
            'search_start_date' => $search_start_date,
            'search_end_date' => $search_end_date,
            'data' => $list
        ]);
    }

    /**
     * 결제방법별 결제로그 엑셀다운로드
     * @param array $params [결제방법 (card, bank, vbank)]
     */
    public function methodExcel($params = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $log_type = element('0', $params, 'card');
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));

        $arr_condition = $this->_getMethodConditions();
        $list = $this->payLogModel->listPayMethodLog($log_type, $search_start_date, $search_end_date, 'excel', $arr_condition);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        $headers = ['주문번호', 'PG구분', '결제구분', '상점아이디', 'TID', '결제상세코드'];
        if ($log_type == 'vbank') {
            $headers = array_merge($headers, ['신청금액', '신청일시', '입금액', '입금일시', '취소금액', '취소일시']);
        } else {
            $headers = array_merge($headers, ['결제금액', '결제일시', '취소금액', '취소일시']);
        }
        $numerics = ['ReqPayPrice', 'CancelPrice', 'DepositPrice'];    // 숫자형 변환 대상 컬럼
        $file_name = $this->_getMethodNameByLogType($log_type) . '_결제로그_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers, $numerics) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 결제방법별 결제로그 결제방법명 리턴
     * @param string $log_type [로그구분 (card, bank, vbank)]
     * @return string
     */
    private function _getMethodNameByLogType($log_type)
    {
        switch ($log_type) {
            case 'card' : $log_name = '신용카드'; break;
            case 'bank' : $log_name = '계좌이체'; break;
            case 'vbank' : $log_name = '가상계좌'; break;
            default : $log_name = ''; break;
        }

        return $log_name;
    }

    /**
     * 결제방법별 결제로그 검색조건 리턴
     * @return array
     */
    private function _getMethodConditions()
    {
        $arr_condition = [
            'EQ' => [
                'TA.PgMid' => $this->_req('search_pg_mid'), 'TA.PgDriver' => $this->_req('search_pg_driver'),
                'TA.PayType' => $this->_req('search_pay_type')
            ]
        ];

        // 검색어
        $search_value = $this->_req('search_value');
        if (empty($search_value) === false) {
            $arr_condition['LKB']['TA.' . $this->_req('search_keyword')] = $search_value;
        }

        return $arr_condition;
    }

    /**
     * 승인완료/취소 통계 인덱스
     * @param array $params [로그구분 (date, mid, method)]
     */
    public function stats($params = [])
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $log_type = element('0', $params, 'date');

        $this->load->view('sys/pay_log/stats_index', [
            'log_type' => $log_type,
            'codes' => $this->_getLogTypeCodes('stats'),
            'arr_input' => $arr_input,
        ]);
    }

    /**
     * 승인완료/취소 통계 목록 조회
     * @param array $params [로그구분 (date, mid, method)]
     * @return CI_Output
     */
    public function statsAjax($params = [])
    {
        $log_type = element('0', $params, 'date');
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-d'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-d'));

        $arr_condition = [
            'EQ' => [
                'PgMid' => $this->_reqP('search_pg_mid'),
                'PayMethod' => $this->_reqP('search_pay_method'),
            ]
        ];
        $list = $this->payLogModel->listPayCancelStats($log_type, $search_start_date, $search_end_date, $arr_condition);
        $count = count($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'codes' => $this->_getLogTypeCodes('stats', false)
        ]);
    }

    /**
     * 승인완료 통계 인덱스
     * @param array $params
     */
    public function payStats($params = [])
    {
        $this->load->view('sys/pay_log/pay_stats_index', [
            'codes' => $this->_getLogTypeCodes('pay_stats')
        ]);
    }

    /**
     * 승인완료 통계 조회
     * @param array $params
     * @return CI_Output
     */
    public function payStatsAjax($params = [])
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
            'codes' => $this->_getLogTypeCodes('pay_stats', false)
        ]);
    }

    /**
     * 결제취소 통계 인덱스
     * @param array $params
     */
    public function cancelStats($params = [])
    {
        $this->load->view('sys/pay_log/cancel_stats_index', [
            'codes' => $this->_getLogTypeCodes('cancel_stats')
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
            'codes' => $this->_getLogTypeCodes('cancel_stats', false)
        ]);
    }

    /**
     * 로그타입별 사용하는 코드 리턴
     * @param string $log_type [로그타입]
     * @param bool $is_add_code [코드추가여부]
     * @return array
     */
    private function _getLogTypeCodes($log_type, $is_add_code = true)
    {
        // 로그타입별 사용하는 코드 조회
        $codes = array_filter_keys($this->_codes, $this->_grp_codes[$log_type]);

        if ($is_add_code === true) {
            // 상점아이디를 사용하는 경우 PG키 데이터 추가
            if (in_array('PgMid', $this->_grp_codes[$log_type]) === true) {
                $arr_condition = [
                    'EQ' => ['PgDriver' => 'toss'],
                    'LKR' => ['PgMid' => 'willbes']
                ];
                $data = $this->pgKeyModel->listPgKey($arr_condition, null, null, ['PgKeyIdx' => 'asc']);

                if (empty($data) === false) {
                    $arr_pg_mid = [];
                    foreach ($data as $row) {
                        $arr_pg_mid[$row['PgMid']] = $row['PgMName'] . '(' . $row['PgMid'] . ')';
                    }
                    $codes['PgMid'] = array_merge($arr_pg_mid, ['divider' => '-------------------------'], $codes['PgMid']);
                }
            }
        }

        return $codes;
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
