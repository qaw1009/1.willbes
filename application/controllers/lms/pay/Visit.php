<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Visit extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'pay/salesProduct', 'member/manageMember', 'service/point', 'sys/site', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('refund', 'campus_all', 'print_cert_log');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 일반수강접수 인덱스
     */
    public function index()
    {
        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayRoute', 'PayMethod', 'ProdType', 'LearnPattern', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제상태 공통코드에서 방문결제용 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderListModel->_pay_status_ccd, ['receipt_wait', 'paid', 'refund']));

        $this->load->view('pay/visit/index', [
            'def_site_code' => element('0', array_keys($arr_site_code)),
            'arr_site_code' => $arr_site_code,
            'arr_campus' => $arr_campus,
            'arr_pay_route_ccd' => $codes[$this->_group_ccd['PayRoute']],
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_prod_type_ccd' => $codes[$this->_group_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_group_ccd['LearnPattern']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            '_prod_type_ccd' => $this->orderListModel->_prod_type_ccd,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 일반수강접수 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_type = get_var($this->_req('search_type'), 'list');
        $arr_condition = $this->_getListConditions($search_type);

        $count = 0;
        $list = [];

        if (empty($arr_condition) === false) {
            if ($search_type == 'list' || ($search_type != 'list' && empty($this->_reqP($search_type)) === false)) {
                $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

                if ($count > 0) {
                    $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);
                }
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 일반수강접수 조회 조건 리턴
     * @param string $search_type [조회 구분, list : 목록 페이지, mem_idx : 회원식별자 기준)
     * @return array
     */
    private function _getListConditions($search_type = 'list')
    {
        $arr_site_code = get_auth_on_off_site_codes('Y');
        $site_code = $this->_reqP('search_site_code');
        $arr_site_campus_ccd = empty($site_code) === false ? get_auth_campus_ccds($site_code) : [];

        if (empty($arr_site_code) === true || empty($site_code) === true || empty($arr_site_campus_ccd) === true) {
            return [];
        }

        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $site_code
            ],
            'IN' => [
                'O.SiteCode' => $arr_site_code,     // 학원 사이트 권한 추가
                'ifnull(PL.CampusCcd, ifnull(RRM.CampusCcd, RRS.CampusCcd))' => $arr_site_campus_ccd,     // 학원 캠퍼스 권한 추가
                'OP.PayStatusCcd' => array_values(array_filter_keys($this->orderListModel->_pay_status_ccd, ['receipt_wait', 'paid', 'refund']))    // 방문결제용 결제상태 코드만 조회
            ]
        ];

        if ($search_type == 'list') {
            $arr_condition = array_merge_recursive($arr_condition, [
                'EQ' => [
                    'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                    'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                    'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                    'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                    'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                    'ifnull(PL.CampusCcd, ifnull(RRM.CampusCcd, RRS.CampusCcd))' => $this->_reqP('search_campus_ccd')
                ],
                'ORG1' => [
                    'LKR' => [
                        'M.MemName' => $this->_reqP('search_member_value'),
                        'M.MemId' => $this->_reqP('search_member_value'),
                        'M.Phone3' => $this->_reqP('search_member_value'),
                    ]
                ],
                'ORG2' => [
                    'EQ' => [
                        'O.OrderIdx' => $this->_reqP('search_prod_value'),
                        'O.OrderNo' => $this->_reqP('search_prod_value'),
                        'P.ProdCode' => $this->_reqP('search_prod_value')
                    ],
                    'LKB' => [
                        'P.ProdName' => $this->_reqP('search_prod_value')
                    ],
                ],
            ]);

            // 수강증출력여부 조건
            if (empty($this->_reqP('search_is_print_cert')) === false) {
                if ($this->_reqP('search_is_print_cert') == 'Y') {
                    $arr_condition['RAW']['LPC.OrderIdx is'] = ' not null';
                } else {
                    $arr_condition['RAW']['LPC.OrderIdx is'] = ' null';
                }
            }

            // 날짜 검색
            $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
            $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

            switch ($this->_reqP('search_date_type')) {
                case 'order' :
                    $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                    break;
                default :
                    $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                    break;
            }
        } elseif ($search_type == 'mem_idx') {
            $arr_condition = array_merge_recursive($arr_condition, [
                'EQ' => [
                    'O.MemIdx' => $this->_reqP('mem_idx'),
                    'O.PayRouteCcd' => $this->orderListModel->_pay_route_ccd['visit']
                ]
            ]);
        }

        return $arr_condition;
    }

    /**
     * 일반수강접수 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제수단', '결제완료일', '접수신청일', '총 실결제금액', '총 환불금액', '총 남은금액'
            , '상품구분', '캠퍼스', '상품명', '결제금액', '환불금액', '결제상태', '환불완료일', '환불완료자'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayMethodCcdName, CompleteDatm, OrderDatm, tRealPayPrice, tRefundPrice
            , (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice, ProdTypeCcdName, CampusCcdName, ProdName, RealPayPrice, RefundPrice, PayStatusCcdName, RefundDatm, RefundAdminName';

        $list = [];
        $arr_condition = $this->_getListConditions();
        $last_query = '';

        if (empty($arr_condition) === false) {
            $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
            $last_query = $this->orderListModel->getLastQuery();
        }

        // export excel
        $this->_makeExcel('학원수강접수리스트', $list, $headers, true, $last_query);
    }

    /**
     * 일반수강접수 주문 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $order_idx = element('0', $params);
        $is_order = empty($order_idx) === false ? true : false;
        $target_order_idx = $this->_req('target_order_idx');
        $target_prod_code = $this->_req('target_prod_code');
        $method = 'POST';
        $regi_site_code = '';
        $arr_regi_site_code = [];
        $data = [];

        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);

        // 방문결제 데이터 조회
        if ($is_order === true) {
            $method = 'PUT';

            // 주문상품 정보
            $arr_condition = ['EQ' => ['O.OrderIdx' => $order_idx], 'NOT' => ['OP.SalePatternCcd' => $this->orderListModel->_sale_pattern_ccd['auto']]];
            $data['order_prod'] = $this->orderListModel->findOrderProduct($arr_condition);
            if (empty($data['order_prod']) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 주문정보
            $data['order'] = element('0', $data['order_prod'], []);

            // 회원정보
            $data['mem'] = $this->manageMemberModel->getMember($data['order']['MemIdx']);
        } else {
            // 접수할 학원사이트 코드 조회
            $arr_regi_site_code = $arr_site_code;

            // 연결 주문상품 정보 조회
            if (empty($target_order_idx) === false && empty($target_prod_code) === false) {
                $arr_condition = ['EQ' => ['O.OrderIdx' => $target_order_idx, 'OP.ProdCode' => $target_prod_code, 'OP.PayStatusCcd' => $this->orderListModel->_pay_status_ccd['paid']]];
                $column = 'O.OrderNo, O.MemIdx, O.SiteCode, OP.ProdCode, P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, CPT.CcdName as ProdTypeCcdName';
                $column .= ', CLP.CcdName as LearnPatternCcdName, CCA.CcdName as CampusCcdName, fn_product_saletype_price(OP.ProdCode, OP.SaleTypeCcd, "SalePrice") as SalePrice';
                $data['order_prod'] = $this->orderListModel->findOrderProduct($arr_condition, $column, 1, 0);
                if (empty($data['order_prod']) === true) {
                    show_error('데이터 조회에 실패했습니다.');
                }

                $data['order_prod'][0]['ProdType'] = $this->orderListModel->getLearnPattern($data['order_prod'][0]['ProdTypeCcd'], $data['order_prod'][0]['LearnPatternCcd']);
                $data['order_prod'][0]['TargetOrderIdx'] = $target_order_idx;

                // 회원정보
                $data['mem'] = $this->manageMemberModel->getMember($data['order_prod'][0]['MemIdx']);

                $regi_site_code = $data['order_prod'][0]['SiteCode'];
                $arr_regi_site_code = array_filter_keys($arr_regi_site_code, [$regi_site_code]);
            }
        }

        // 카드사 공통코드 조회
        $arr_card_ccd = $this->codeModel->getCcd($this->_group_ccd['Card']);

        $this->load->view('pay/visit/create', [
            'method' => $method,
            'idx' => $order_idx,
            'data' => $data,
            'def_site_code' => element('0', array_keys($arr_site_code)),
            'arr_site_code' => $arr_site_code,
            'regi_site_code' => $regi_site_code,
            'arr_regi_site_code' => $arr_regi_site_code,
            'arr_card_ccd' => $arr_card_ccd,
            '_is_order' => $is_order,
            '_pay_method_ccd' => $this->orderListModel->_pay_method_ccd,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 일반수강접수 주문 저장
     * @return CI_Output|null
     */
    public function store()
    {
        $method = '';
        $rules = [
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'order_price[]', 'label' => '주문금액', 'rules' => 'trim|required'],
            ['field' => 'disc_type[]', 'label' => '주문금액', 'rules' => 'trim|required'],
            ['field' => 'disc_rate[]', 'label' => '주문금액', 'rules' => 'trim|required'],
            ['field' => 'card_pay_price[]', 'label' => '카드금액', 'rules' => 'trim|required'],
            ['field' => 'cash_pay_price[]', 'label' => '현금금액', 'rules' => 'trim|required'],
            ['field' => 'real_pay_price[]', 'label' => '결제금액', 'rules' => 'trim|required'],
            ['field' => 'total_real_pay_price', 'label' => '총실결제금액', 'rules' => 'trim|required|integer'],
            ['field' => 'total_card_pay_price', 'label' => '총카드결제금액', 'rules' => 'trim|required|integer'],
            ['field' => 'total_cash_pay_price', 'label' => '총현금결제금액', 'rules' => 'trim|required|integer'],
            ['field' => 'sum_real_pay_price', 'label' => '총카드+현금결제금액', 'rules' => 'trim|required|integer|matches[total_real_pay_price]'],
            ['field' => 'pay_method_ccd', 'label' => '결제수단', 'rules' => 'trim|required'],
            ['field' => 'card_ccd', 'label' => '카드선택', 'rules' => 'callback_validateRequiredIf[pay_method_ccd,' . $this->orderListModel->_pay_method_ccd['visit_card']. ',' . $this->orderListModel->_pay_method_ccd['visit_card_cash'] . ']'],
        ];

        if (empty($this->_reqP('order_idx')) === true) {
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
                ['field' => 'prod_code[]', 'label' => '상품코드', 'rules' => 'trim|required']
            ]);
        } else {
            $method = 'Complete';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'order_prod_idx[]', 'label' => '주문상품식별자', 'rules' => 'trim|required']
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->orderModel->{'procVisitOrder' . $method}($this->_reqP(null, false));

        return $this->json_result($result, '수강 등록 되었습니다.', $result);
    }
}
