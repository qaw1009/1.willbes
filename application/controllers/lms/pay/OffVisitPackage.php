<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class OffVisitPackage extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'pay/salesProduct', 'member/manageMember', 'service/point', 'sys/site', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('refund', 'campus', 'print_cert_log', 'unpaid_info');
    private $_target_site_code = array();       // 학원사이트코드
    private $_target_pack_type_ccd = array();   // 사용하는 패키지유형공통코드
    private $_target_pay_status_ccd = array();   // 사용하는 결제상태공통코드

    public function __construct()
    {
        parent::__construct();

        $this->_target_site_code = get_auth_on_off_site_codes('Y', true);
        $this->_target_pack_type_ccd = array_filter_keys($this->orderListModel->_adminpack_lecture_type_ccd, ['normal', 'choice_prof']);
        $this->_target_pay_status_ccd = array_filter_keys($this->orderListModel->_pay_status_ccd, ['receipt_wait', 'paid', 'refund']);
    }

    /**
     * 종합반수강접수 인덱스
     */
    public function index()
    {
        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PackType', 'PayMethod', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 패키지유형 공통코드에서 일반/선택형(강사배정) 코드만 필터링
        $arr_pack_type_ccd = array_filter_keys($codes[$this->_group_ccd['PackType']], $this->_target_pack_type_ccd);

        // 결제상태 공통코드에서 결제완료/환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], $this->_target_pay_status_ccd);

        $this->load->view('pay/visit_pkg/index', [
            'def_site_code' => key($this->_target_site_code),
            'arr_site_code' => $this->_target_site_code,
            'arr_campus' => $arr_campus,
            'arr_pack_type_ccd' => $arr_pack_type_ccd,
            'chk_pack_type_ccd' => $this->_target_pack_type_ccd,
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'chk_pay_status_ccd' => $this->_target_pay_status_ccd
        ]);
    }

    /**
     * 종합반수강접수 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_type = get_var($this->_req('search_type'), 'list');
        $arr_condition = $this->_getListConditions($search_type);

        $count = 0;
        $list = [];

        if (empty($arr_condition) === false) {
            $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

            if ($count > 0) {
                $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 종합반수강접수 조회 조건 리턴
     * @param string $search_type [조회 구분, list : 목록 페이지, mem_idx : 회원식별자 기준)
     * @return array
     */
    private function _getListConditions($search_type = 'list')
    {
        $arr_site_code = array_keys($this->_target_site_code);
        $site_code = $this->_reqP('search_site_code');
        $arr_site_campus_ccd = empty($site_code) === false ? get_auth_campus_ccds($site_code) : [];

        if (empty($arr_site_code) === true || empty($site_code) === true || empty($arr_site_campus_ccd) === true) {
            return [];
        }
        
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $site_code,
                'O.PayRouteCcd' => $this->orderListModel->_pay_route_ccd['visit'],  // 학원방문결제
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd['off_lecture'],    // 학원강좌
                'PL.LearnPatternCcd' => $this->orderListModel->_learn_pattern_ccd['off_pack_lecture'],  // 종합반
                'PL.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'PL.PackTypeCcd' => $this->_reqP('search_pack_type_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd')
            ],
            'IN' => [
                'O.SiteCode' => $arr_site_code,     // 학원 사이트 권한 추가
                'PL.CampusCcd' => $arr_site_campus_ccd,     // 학원 캠퍼스 권한 추가
                'PL.PackTypeCcd' => array_values($this->_target_pack_type_ccd),    // 일반/선택형(강사배정) 유형만 조회
                'OP.PayStatusCcd' => array_values($this->_target_pay_status_ccd)    // 접수대기/결제완료/환불완료만 조회
            ],
            'RAW' => [
                // 일반형일 경우 관리자 등록건만 조회, 선택형(강사배정)일 경우는 전체 주문건 조회
                '(PL.PackTypeCcd =' => ' "' . $this->_target_pack_type_ccd['choice_prof'] . '" or (PL.PackTypeCcd = "' . $this->_target_pack_type_ccd['normal'] . '" and O.RegAdminIdx is not null))'
            ],
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'O.OrderIdx' => $this->_reqP('search_prod_value'),
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'P.ProdCode' => $this->_reqP('search_prod_value'),
                    'OOI.CertNo' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],
        ];

        // 미수금여부 조건
        if (empty($this->_reqP('search_is_unpaid')) === false) {
            if ($this->_reqP('search_is_unpaid') == 'Y') {
                $arr_condition['RAW']['OUH.OrderIdx is'] = ' not null';
            } else {
                $arr_condition['RAW']['OUH.OrderIdx is'] = ' null';
            }
        }

        // 날짜 검색
        if ($search_type == 'list') {
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
        }

        // 회원식별자 검색
        if ($search_type == 'mem_idx') {
            $arr_condition['EQ']['O.MemIdx'] = get_var($this->_reqP('mem_idx'), 0);
        }

        return $arr_condition;
    }

    /**
     * 종합반수강접수 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '수강증번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제수단', '결제완료일', '접수신청일', '총 실결제금액', '총 환불금액', '총 남은금액'
            , '상품구분', '캠퍼스', '종합반유형', '상품명', '결제금액', '환불금액', '결제상태', '환불완료일', '환불완료자', '환불사유', '미수금여부'];

        $column = 'OrderNo, CertNo, SiteName, MemName, MemId, MemPhone, PayMethodCcdName, CompleteDatm, OrderDatm, tRealPayPrice, tRefundPrice
            , (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice, ProdTypeCcdName, CampusCcdName, PackTypeCcdName, ProdName, RealPayPrice, RefundPrice, PayStatusCcdName
            , RefundDatm, RefundAdminName, RefundReason, IsUnPaid';

        $list = [];
        $arr_condition = $this->_getListConditions();
        $last_query = '';

        if (empty($arr_condition) === false) {
            $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
            $last_query = $this->orderListModel->getLastQuery();
        }

        // export excel
        $this->_makeExcel('종합반수강접수리스트', $list, $headers, true, $last_query);
    }

    /**
     * 종합반수강접수 주문 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $order_idx = element('0', $params);
        $unpaid_idx = element('1', $params);
        $prod_code = element('2', $params);
        $mem_idx = element('3', $params);
        $is_unpaid = empty($unpaid_idx) === false ? true : false;   // 미수금여부
        $is_order = $is_unpaid === false && empty($order_idx) === false ? true : false;     // 프런트 방문결제 주문여부 (접수대기상태)
        $order_idx = $is_order === true ? $order_idx : null;    // 접수대기 주문건만 주문식별자 설정
        $method = 'POST';
        $data = null;

        if ($is_unpaid === true) {
            // 주문미수금이력 조회
            $data['list'] = $this->orderListModel->findOrderUnPaidHist($prod_code, $mem_idx, $unpaid_idx);
            if (empty($data['list']) === true) {
                show_alert('미수금정보 조회에 실패했습니다.', 'back');
            }

            // 상품정보
            $data['prod'] = element('0', $data['list']);
            $data['prod']['tRealPayPrice'] = array_sum(array_pluck($data['list'], 'RealPayPrice')); // 총기결제금액
            $data['prod']['tRefundPrice'] = array_sum(array_pluck($data['list'], 'RefundPrice'));   // 총기환불금액
            $data['prod']['tRealUnPaidPrice'] = $data['prod']['OrgPayPrice'] - ($data['prod']['tRealPayPrice'] - $data['prod']['tRefundPrice']);    // 최종미납금액

            // 상품 부가정보
            $data['prod']['ProdAddInfo'] = $data['prod']['CateName'];
            empty($data['prod']['StudyPatternCcdName']) === false && $data['prod']['ProdAddInfo'] .= ' | ' . $data['prod']['StudyPatternCcdName'];

            // 회원정보
            $data['mem'] = $this->manageMemberModel->getMember($mem_idx);
        } elseif ($is_order === true) {
            // 방문결제 데이터 조회
            $method = 'PUT';

            // 주문상품 정보
            $arr_condition = ['EQ' => ['O.OrderIdx' => $order_idx, 'PL.LearnPatternCcd' => $this->orderListModel->_learn_pattern_ccd['off_pack_lecture']]];
            $column = 'O.OrderNo, O.SiteCode, O.MemIdx, OP.OrderProdIdx, OP.ProdCode, OP.OrderPrice as OrgOrderPrice, OP.RealPayPrice as OrgPayPrice
                , P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, CLP.CcdName as LearnPatternCcdName, CCA.CcdName as CampusCcdName
                , substring_index(fn_category_connect_by_type(PC.CateCode, "name"), ">", -1) as CateName
                , fn_ccd_name(PL.StudyPatternCcd) as StudyPatternCcdName';
            $data['prod'] = $this->orderListModel->findOrderProduct($arr_condition, $column);
            if (empty($data['prod']) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 상품정보
            $data['prod'] = element('0', $data['prod']);

            // 상품 부가정보
            $data['prod']['ProdAddInfo'] = $data['prod']['CateName'];
            empty($data['prod']['StudyPatternCcdName']) === false && $data['prod']['ProdAddInfo'] .= ' | ' . $data['prod']['StudyPatternCcdName'];

            // 회원정보
            $data['mem'] = $this->manageMemberModel->getMember($data['prod']['MemIdx']);
        }

        // 카드사 공통코드 조회
        $arr_card_ccd = $this->codeModel->getCcd($this->_group_ccd['Card']);

        $this->load->view('pay/visit_pkg/create', [
            'method' => $method,
            'idx' => $order_idx,
            'unpaid_idx' => $unpaid_idx,
            'is_unpaid' => $is_unpaid,
            'data' => $data,
            'def_site_code' => key($this->_target_site_code),
            'arr_site_code' => $this->_target_site_code,
            'arr_card_ccd' => $arr_card_ccd,
            'chk_pay_method_ccd' => $this->orderListModel->_pay_method_ccd,
            'chk_pay_status_ccd' => $this->_target_pay_status_ccd,
            'search_learn_pattern_ccd' => $this->orderListModel->_learn_pattern_ccd['off_pack_lecture']
        ]);
    }

    /**
     * 종합반수강접수 주문 저장
     * @return CI_Output|null
     */
    public function store()
    {
        $method = '';
        $rules = [
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required'],
            ['field' => 'order_price', 'label' => '주문금액', 'rules' => 'trim|required'],
            ['field' => 'disc_rate', 'label' => '할인율', 'rules' => 'trim|required|integer'],
            ['field' => 'disc_type', 'label' => '할인구분', 'rules' => 'trim|required|in_list[R,P]'],
            ['field' => 'org_pay_price', 'label' => '총주문금액', 'rules' => 'trim|required'],
            ['field' => 'card_pay_price', 'label' => '카드금액', 'rules' => 'trim|required|integer'],
            ['field' => 'cash_pay_price', 'label' => '현금금액', 'rules' => 'trim|required|integer'],
            ['field' => 'pay_method_ccd', 'label' => '결제수단', 'rules' => 'trim|required'],
            ['field' => 'card_ccd', 'label' => '카드선택', 'rules' => 'callback_validateRequiredIf[pay_method_ccd,' . $this->orderListModel->_pay_method_ccd['visit_card']. ',' . $this->orderListModel->_pay_method_ccd['visit_card_cash'] . ']']
        ];

        if (empty($this->_reqP('unpaid_idx')) === false) {
            $rules[] = ['field' => 'is_unpaid', 'label' => '미수금액납부여부', 'rules' => 'trim|required|in_list[Y]'];
        }

        if ($this->_reqP('is_unpaid') == 'Y') {
            $rules[] = ['field' => 'real_pay_price', 'label' => '결제금액', 'rules' => 'trim|required|integer|less_than[' . $this->_reqP('org_pay_price') . ']'];
        } else {
            $rules[] = ['field' => 'real_pay_price', 'label' => '결제금액', 'rules' => 'trim|required|integer|matches[org_pay_price]'];
        }

        if (empty($this->_reqP('order_idx')) === true) {
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]']
            ]);
        } else {
            $method = 'Complete';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'order_prod_idx', 'label' => '주문상품식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->orderModel->{'procVisitPackageOrder' . $method}($this->_reqP(null, false));

        return $this->json_result($result, '수강 등록 되었습니다.', $result);
    }

    /**
     * 주문미수금 정보 존재여부 체크 (상품코드, 회원식별자 기준)
     * @return mixed
     */
    public function checkUnPaidOrder()
    {
        $unpaid_idx = null;
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 주문미수금 정보 조회
        $data = $this->orderListModel->findFirstOrderUnPaidInfo($this->_reqP('prod_code'), $this->_reqP('mem_idx'));

        if (empty($data) === false) {
            $unpaid_idx = $data['UnPaidIdx'];
            $order_idx = $data['OrderIdx'];
        }

        return $this->json_result(true, '', [], ['unpaid_idx' => $unpaid_idx, 'order_idx' => $order_idx]);
    }

    /**
     * 종합반수강번호 수정
     * @return mixed
     */
    public function modifyPackCertNo()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'order_idx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'pack_cert_no', 'label' => '종합반수강번호', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 종합반수강번호 수정
        $result = $this->orderModel->replacePackCertNoInOrderOtherInfo($this->_reqP('order_idx'), $this->_reqP('pack_cert_no'));

        return $this->json_result($result, '수정 되었습니다.', $result);
    }
}
