<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class OffProfAssign extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'pay/salesProduct', 'member/manageMember', 'service/point', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('refund', 'campus', 'category', 'unpaid_info', 'assign_prof_log');
    private $_target_site_code = array();       // 학원사이트코드
    private $_target_pay_status_ccd = array();   // 사용하는 결제상태공통코드

    public function __construct()
    {
        parent::__construct();

        $this->_target_site_code = get_auth_on_off_site_codes('Y', true);
        $this->_target_pay_status_ccd = array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund']);
    }

    /**
     * 종합반강사배정 인덱스
     */
    public function index()
    {
        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 카테고리 조회
        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayMethod', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제상태 공통코드에서 결제완료/환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], $this->_target_pay_status_ccd);

        $this->load->view('pay/prof_assign/index', [
            'def_site_code' => key($this->_target_site_code),
            'arr_site_code' => $this->_target_site_code,
            'arr_campus' => $arr_campus,
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'chk_pay_status_ccd' => $this->_target_pay_status_ccd
        ]);
    }

    /**
     * 종합반강사배정 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

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
     * 종합반강사배정 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
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
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd['off_lecture'],    // 학원강좌
                'PL.LearnPatternCcd' => $this->orderListModel->_learn_pattern_ccd['off_pack_lecture'],  // 종합반
                'PL.PackTypeCcd' => $this->orderListModel->_adminpack_lecture_type_ccd['choice_prof'],    // 선택형(강사배정) 유형만 조회
                'PL.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'PC.CateCode' => $this->_reqP('search_md_cate_code'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd')
            ],
            'IN' => [
                'O.SiteCode' => $arr_site_code,     // 학원 사이트 권한 추가
                'PL.CampusCcd' => $arr_site_campus_ccd,     // 학원 캠퍼스 권한 추가
                'OP.PayStatusCcd' => array_values($this->_target_pay_status_ccd)    // 결제완료/환불완료만 조회
            ],
            'LKR' => [
                'PC.CateCode' => $this->_reqP('search_lg_cate_code')
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
        
        // 강사배정여부 조건
        if (empty($this->_reqP('search_is_prof_assign')) === false) {
            if ($this->_reqP('search_is_prof_assign') == 'Y') {
                $arr_condition['RAW']['LAP.OrderIdx is'] = ' not null';
            } else {
                $arr_condition['RAW']['LAP.OrderIdx is'] = ' null';
            }
        }

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'refund' :
                $arr_condition['BDT'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 종합반강사배정 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '대분류', '중분류', '캠퍼스', '종합반명'
            , '결제루트', '결제수단', '결제금액', '환불금액', '결제완료일', '환불완료일', '결제상태', '미수금여부', '강사배정여부'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, LgCateName, MdCateName, CampusCcdName, OnlyProdName
            , PayRouteCcdName, PayMethodCcdName, RealPayPrice, RefundPrice, CompleteDatm, RefundDatm, PayStatusCcdName, IsUnPaid, IsProfAssign';

        $list = [];
        $arr_condition = $this->_getListConditions();
        $last_query = '';

        if (empty($arr_condition) === false) {
            $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
            $last_query = $this->orderListModel->getLastQuery();
        }

        // export excel
        $this->_makeExcel('종합반강사배정리스트', $list, $headers, true, $last_query);
    }

    /**
     * 종합반강사배정 폼
     * @return CI_Output|object|string
     */
    public function assign()
    {
        $order_idx = $this->_reqG('order_idx');
        $order_prod_idx = $this->_reqG('order_prod_idx');
        $prod_code = $this->_reqG('prod_code');
        $sub_prod_data = null;
        $unpaid_data = null;
        $unpaid_hist = null;
        $unpaid_idx = null;

        if (empty($order_idx) === true || empty($order_prod_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 주문상품 조회
        $arr_condition = [
            'EQ' => [
                'O.OrderIdx' => $order_idx,
                'OP.OrderProdIdx' => $order_prod_idx,
                'OP.ProdCode' => $prod_code,
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd['off_lecture'],    // 학원강좌
                'PL.LearnPatternCcd' => $this->orderListModel->_learn_pattern_ccd['off_pack_lecture'],  // 종합반
                'PL.PackTypeCcd' => $this->orderListModel->_adminpack_lecture_type_ccd['choice_prof']    // 선택형(강사배정) 유형만 조회
            ],
            'IN' => [
                'O.SiteCode' => array_keys($this->_target_site_code)    // 학원 사이트 권한 추가
            ]
        ];

        $arr_add_join = ['campus', 'category', 'unpaid_info', 'subproduct'];
        $data = element('0', $this->orderListModel->listAllOrder(false, $arr_condition, 1, 0, [], $arr_add_join));
        if (empty($data) === true) {
            return $this->json_error('주문상품 데이터가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 서브상품코드 추출
        $data['OrderSubProdCodes'] = [];
        if (empty($data['OrderSubProdData']) === false) {
            $data['OrderSubProdCodes'] = array_pluck(json_decode($data['OrderSubProdData'], true), 'ProdCode');
        }

        // 학원종합반 서브강좌 목록 조회
        $sub_prod_rows = $this->orderListModel->getOffPackSubLectureForAssign($prod_code, $order_idx, $order_prod_idx);
        if (empty($sub_prod_rows) === true) {
            return $this->json_error('서브강좌 데이터가 없습니다.', _HTTP_NOT_FOUND);
        }

        foreach ($sub_prod_rows as $row) {
            $arr_key = $row['IsEssential'] == 'Y' ? 'ess' : 'choice';
            $sub_prod_data[$arr_key][] = $row;
        }

        // 미수금정보이력 조회
        if ($data['IsUnPaid'] == 'Y') {
            $unpaid_hist = $this->orderListModel->findOrderUnPaidHist($prod_code, $data['MemIdx'], $data['UnPaidIdx']);
            if (empty($unpaid_hist) === true) {
                return $this->json_error('미수금정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 상품정보
            $unpaid_data = element('0', $unpaid_hist);
            $unpaid_data['tRealPayPrice'] = array_sum(array_pluck($unpaid_hist, 'RealPayPrice')); // 총기결제금액
            $unpaid_data['tRefundPrice'] = array_sum(array_pluck($unpaid_hist, 'RefundPrice'));   // 총기환불금액
            $unpaid_data['tRealUnPaidPrice'] = $unpaid_data['OrgPayPrice'] - ($unpaid_data['tRealPayPrice'] - $unpaid_data['tRefundPrice']);    // 최종미납금액
            $unpaid_idx = $unpaid_data['UnPaidIdx'];
        }

        return $this->load->view('pay/prof_assign/assign', [
            'order_idx' => $order_idx,
            'order_prod_idx' => $order_prod_idx,
            'prod_code' => $prod_code,
            'data' => $data,
            'unpaid_idx' => $unpaid_idx,
            'unpaid_data' => $unpaid_data,
            'unpaid_hist' => $unpaid_hist,
            'sub_prod_data' => $sub_prod_data,
            'chk_pay_status_ccd' => $this->_target_pay_status_ccd
        ]);
    }

    /**
     * 종합반강사배정 선택 단과반 등록/삭제
     * @return CI_Output|null
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'order_prod_idx', 'label' => '주문상품식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code_sub', 'label' => '상품코드서브', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->orderModel->replaceOrderSubProduct('off_pack_lecture', $this->_reqP(null, false));

        return $this->json_result($result, '강사배정이 적용되었습니다.', $result);
    }
}
