<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrder extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
    protected $_order_type = '';
    protected $_group_ccd = array();
    protected $_write_perm_methods = array();
    protected $_excel_perm_methods = array();
    private $_is_refund = false;
    private $_is_refund_proc = false;
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_order_type = strtolower($this->router->class);
        $this->_group_ccd = $this->orderListModel->_group_ccd;
        $this->_is_refund = starts_with($this->_order_type, 'refund');
        $this->_is_refund_proc = $this->_order_type == 'refundproc';
    }

    /**
     * 주문메뉴 쓰기, 엑셀다운로드 권한체크 후 해당 메소드 실행
     * @param string $method [메소드명]
     * @param array $params [전달파라미터]
     * @return mixed|void
     */
    public function _remap($method, $params = array())
    {
        if (in_array($method, $this->_write_perm_methods) === true) {
            // 쓰기권한 체크
            if (check_menu_perm('write') !== true) {
                return null;
            }
        } elseif (in_array($method, $this->_excel_perm_methods) === true) {
            // 엑셀다운로드 권한 체크
            if (check_menu_perm('excel') !== true) {
                return null;
            }
        }

        parent::_remap($method, $params);
    }

    /**
     * 주문내역 보기
     * @param array $params
     */
    protected function show($params = [])
    {
        // add join array
        $_show_add_join = ['delivery_info', 'refund', 'refund_proc', 'my_lecture', 'subproduct', 'visit_card', 'category', 'delivery_address', 'unpaid_info'];
        if (in_array($this->_order_type, ['order', 'visit']) === true) {
            $_show_add_join[] = 'campus_all';

            if ($this->_order_type == 'visit') {
                $_show_add_join[] = 'lectureroom_seat';
            }
        } elseif (in_array($this->_order_type, ['offvisitpackage', 'offprofassign']) === true) {
            $_show_add_join[] = 'campus';
        }

        // url segment 에서 숫자 값 리턴
        $order_idx = current(array_filter($params, function ($val) {
            return is_numeric($val);
        }));

        if (empty($order_idx) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 주문 조회
        $data = $this->orderListModel->listAllOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, [], $_show_add_join);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $order_data = element('0', $data, []);

        // PG사 결제완료일 경우 결제로그 조회
        if ($order_data['PayRouteCcd'] === $this->orderListModel->_pay_route_ccd['pg'] && empty($order_data['CompleteDatm']) === false) {
            // 결제완료 로그 데이터 조회
            $pay_log_data = $this->orderListModel->getPaidOrderPaymentData($order_data['OrderNo'], $order_data['PgCcd'], $order_data['PayMethodCcd']);

            // 영수증 출력 URL
            $order_data['ReceiptUrl'] = element('PgReceiptUrl', $pay_log_data);

            // 결제승인 신용카드명 조회
            if ($order_data['PayMethodCcd'] == $this->orderListModel->_pay_method_ccd['card']) {
                $order_data['PgPayDetailCodeName'] = element('PayDetailCodeName', $pay_log_data);
            }
        }

        // N잡 수강인증코드
        if ($order_data['SiteCode'] == '2014') {
            // 주문상품식별자 + 회원식별자 뒷3자리
            $order_data['CertAuthCode'] = $order_data['OrderProdIdx'] . '' . substr($order_data['MemIdx'], -3);
        }

        // 회원정보
        $mem_data = $this->manageMemberModel->getMember($order_data['MemIdx']);

        // 회원포인트 조회
        $point_data = $this->pointModel->getMemberPoint($order_data['MemIdx']);

        // 환불, 관리자결제 정보 조회
        $is_refund_data = false;
        $refund_data = [];
        $admin_pay_data = [];
        $delivery_addr = [];

        // 환불요청내역 노출여부
        $is_show_refund_req = in_array($this->_order_type, ['cart', 'delivery', 'free', 'vbank']) === false;

        // 상품 부가정보 대상 상품타입공통코드 (온라인/학원강좌만)
        $arr_lec_prod_type_ccd = array_filter_keys($this->orderListModel->_prod_type_ccd, ['on_lecture', 'off_lecture']);

        foreach ($data as $idx => $row) {
            // 상품 부가정보 컬럼 추가 (온라인/학원강좌만)
            $data[$idx]['ProdAddInfo'] = '';

            if (in_array($row['ProdTypeCcd'], $arr_lec_prod_type_ccd) === true) {
                $data[$idx]['ProdAddInfo'] = $row['CateName'];    // 카테고리명
                empty($row['LecTypeCcdName']) === false && $data[$idx]['ProdAddInfo'] .= ' | ' . $row['LecTypeCcdName'];  // 강좌유형(직장인재학생반)
                empty($row['StudyPatternCcdName']) === false && $data[$idx]['ProdAddInfo'] .= ' | ' . $row['StudyPatternCcdName'];  // 수강형태(학원)
            }

            if ($row['PayStatusCcd'] == $this->orderListModel->_pay_status_ccd['refund']) {
                // 환불내역 데이터 가공 (환불 관련 메뉴에서만 사용) ==> 전체주문내역 노출
                //if ($this->_is_refund === true) {
                if ($is_show_refund_req === true) {
                    $refund_data[$row['RefundReqIdx']]['ProdTypeCcdName'][] = $row['ProdTypeCcdName'];
                    $refund_data[$row['RefundReqIdx']]['LearnPatternCcdName'][] = $row['LearnPatternCcdName'];
                    $refund_data[$row['RefundReqIdx']]['ProdName'][] = $row['ProdName'];
                    $refund_data[$row['RefundReqIdx']]['RefundPrice'][] = $row['RefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CardRefundPrice'][] = $row['CardRefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CashRefundPrice'][] = $row['CashRefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['ProdAddInfo'][] = $data[$idx]['ProdAddInfo'];

                    $refund_data[$row['RefundReqIdx']] = array_merge($refund_data[$row['RefundReqIdx']], [
                        'RefundDatm' => $row['RefundDatm'], 'PayStatusCcdName' => $row['PayStatusCcdName'], 'IsApproval' => $row['IsApproval'], 'RefundType' => $row['RefundType'],
                        'RefundReason' => $row['RefundReason'], 'RefundAdminName' => $row['RefundAdminName']
                    ]);
                }

                // 환불 데이터 존재 여부
                if ($is_refund_data === false) {
                    $is_refund_data = true;
                }
            }

            // 환불산출금액이 0보다 작을 경우 0으로 셋팅
            if ($this->_is_refund_proc === true) {
                $row['CalcCardRefundPrice'] < 0 && $data[$idx]['CalcCardRefundPrice'] = 0;
            }

            // 관리자결제 상품 데이터 셋팅 (보강0원결제 추가)
            if (empty($admin_pay_data) === true) {
                if (in_array(array_search($order_data['PayRouteCcd'], $this->orderListModel->_pay_route_ccd), ['zero', 'alliance', 'admin_pay', 'bogang_zero']) === true
                        && $row['ProdTypeCcd'] != $this->orderListModel->_prod_type_ccd['delivery_price']) {
                    $admin_pay_data = $row;
                    $admin_pay_data['ProdAddInfo'] = $data[$idx]['ProdAddInfo'];    // 상품 부가정보 컬럼 추가
                }
            }

            // 주문상품서브 데이터 셋팅
            if (empty($row['OrderSubProdData']) === false) {
                $arr_order_sub_prod_data = json_decode($row['OrderSubProdData'], true);
                $data[$idx]['OrderSubProdList'] = '';

                if (empty($arr_order_sub_prod_data) === false) {
                    foreach ($arr_order_sub_prod_data as $sub_prod_row) {
                        $data[$idx]['OrderSubProdList'] .= '[' . $sub_prod_row['ProdCode'] . '] ' . $sub_prod_row['ProdName'];  // 상품코드, 상품명
                        if (empty($sub_prod_row['StudyPatternCcdName']) === false) {
                            $data[$idx]['OrderSubProdList'] .= ' <span class=\'blue no-line-height\'>(' . $sub_prod_row['StudyPatternCcdName'] . ')</span>';    // 단과반 수강형태
                        }
                        $data[$idx]['OrderSubProdList'] .= '<br/>';
                    }
                }
            }
        }

        // 관리자결제 정보 조회
        if (empty($admin_pay_data) === false) {
            if ($order_data['IsDelivery'] == 'Y') {
                // 배송주소 조회
                $delivery_addr = $this->orderListModel->findOrderDeliveryAddressByOrderIdx($order_data['OrderIdx']);

                // 배송료 관련 메모 조회
                $this->load->loadModels(['pay/orderMemo']);
                $delivery_addr['OrderMemo'] = array_get($this->orderMemoModel->listOrderMemo('OM.OrderMemo', [
                    'EQ' => ['OM.OrderIdx' => $order_data['OrderIdx'], 'OM.MemoTypeCcd' => $this->orderMemoModel->_order_memo_type_ccd['delivery_price']]
                ], 1, 0, ['OM.OrderMemoIdx' => 'desc']), '0.OrderMemo');
            }
            
            // 나의 강좌정보 조회
            empty($admin_pay_data['MyLecData']) === false && $admin_pay_data['MyLecData'] = element('0', json_decode($admin_pay_data['MyLecData'], true));

            // 회차정보 조회
            if (empty($admin_pay_data['MyLecData']['wUnitIdxs']) === false) {
                $this->load->loadModels(['pay/salesProduct']);
                $admin_pay_data['MyLecData']['wUnitData'] = $this->salesProductModel->findLectureUnitByUnitIdx(explode(',', $admin_pay_data['MyLecData']['wUnitIdxs']));
            }
        }

        $this->load->view('pay/order/show', [
            'idx' => $order_idx,
            'data' => [
                'order' => $order_data,
                'order_prod' => $data,
                'refund_prod' => $refund_data,
                'admin_prod' => $admin_pay_data,
                'delivery_addr' => $delivery_addr,
                'mem' => $mem_data,
                'mem_point' => $point_data
            ],
            '_order_type' => $this->_order_type,
            '_is_refund' => $this->_is_refund,
            '_is_refund_proc' => $this->_is_refund_proc,
            '_is_refund_data' => $is_refund_data,
            '_prod_type_ccd' => $this->orderListModel->_prod_type_ccd,
            '_learn_pattern_ccd' => $this->orderListModel->_learn_pattern_ccd,
            '_pay_route_ccd' => $this->orderListModel->_pay_route_ccd,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 주문 취소
     * @param array $params
     */
    protected function cancel($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        
        switch ($params[0]) {
            case 'vbank' :
                $result = $this->orderModel->cancelVbankOrder($this->_reqP('order_idx'));
                break;
            default :
                show_error('잘못된 접근 입니다.');
                break;
        }

        $this->json_result($result, '취소 되었습니다.', $result);
    }

    /**
     * 목록 회원검색 조건 리턴
     * @param string $search_keyword [검색키워드 (컬럼명)]
     * @param string $search_value [검색어]
     * @return mixed
     */
    protected function _getListMemConditions($search_keyword, $search_value = '')
    {
        $arr_condition = [];
        $arr_alias = ['MemIdx' => 'M', 'MemId' => 'M', 'MemName' => 'M', 'Phone3' => 'M', 'PhoneEnc' => 'M', 'wAdminId' => 'A', 'wAdminName' => 'A', 'Receiver' => 'ODA'];

        if (strlen($search_value) > 0 && array_key_exists($search_keyword, $arr_alias) === true) {
            // 휴대폰번호 길이 체크 (10자리 이상일 경우 전체 휴대폰번호 조회)
            if ($search_keyword == 'Phone3' && strlen($search_value) > 9) {
                $search_keyword = 'PhoneEnc';
                $search_value = $this->orderListModel->getEncString($search_value);
            }

            $column = $arr_alias[$search_keyword] . '.' . $search_keyword;
            $arr_condition['LKR'][$column] = $search_value;
        }

        return $arr_condition;
    }

    /**
     * 목록 상품검색 조건 리턴
     * @param string $search_keyword [검색키워드 (컬럼명)]
     * @param string $search_value [검색어]
     * @return array
     */
    protected function _getListProdConditions($search_keyword, $search_value = '')
    {
        $arr_condition = [];
        $arr_alias = ['OrderIdx' => 'O', 'OrderNo' => 'O', 'ProdCode' => 'P', 'ProdName' => 'P', 'CertNo' => 'OOI', 'InvoiceNo' => 'OPD', 'wIsbn' => 'WB'];
        $arr_operator = ['OrderIdx' => 'EQ', 'OrderNo' => 'EQ', 'ProdCode' => 'EQ', 'ProdName' => 'LKB', 'CertNo' => 'EQ', 'InvoiceNo' => 'EQ', 'wIsbn' => 'EQ'];

        if (strlen($search_value) > 0 && array_key_exists($search_keyword, $arr_alias) === true) {
            $column = $arr_alias[$search_keyword] . '.' . $search_keyword;
            $operator = $arr_operator[$search_keyword];
            $arr_condition[$operator][$column] = $search_value;
        }

        return $arr_condition;
    }

    /**
     * 목록 order by 배열 리턴
     * @return array
     */
    protected function _getListOrderBy()
    {
        return ['OrderIdx' => 'desc'];
    }

    /**
     * 엑셀다운로드 실행
     * @param string $file_name [확장자를 제외한 생성파일명]
     * @param array $list [엑셀내용]
     * @param array $headers [엑셀헤더]
     * @param bool $is_huge [대용량 다운로드 메소드 사용여부]
     * @param string $query [엑셀다운로드 쿼리]
     * @param array $numerics [숫자형 변환 대상 컬럼명 배열]
     */
    protected function _makeExcel($file_name, $list, $headers, $is_huge = true, $query = '', $numerics = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 파일명 가공
        $file_name = $file_name . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');

        if ($is_huge === true) {
            $result = $this->excel->exportHugeExcel($file_name, $list, $headers, $numerics);
        } else {
            $result = $this->excel->exportExcel($file_name, $list, $headers);
        }

        if ($result !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 사용자쿠폰 정보 조회
     * @return CI_Output
     */
    protected function showUserCouponInfo()
    {
        $user_coupon_idx = $this->_reqG('user_coupon_idx');

        if (empty($user_coupon_idx) === true || is_numeric($user_coupon_idx) === false) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $this->load->loadModels(['service/couponRegist']);  // 쿠폰등록 모델 로드
        $data = $this->couponRegistModel->findCouponByCdIdx($user_coupon_idx);

        return $this->response($data);
    }
}
