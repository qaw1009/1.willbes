<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSales extends \app\controllers\BaseController
{
    protected $models = array('pay/orderList', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_sales_type = '';
    protected $_sales_name = '';
    protected $_group_ccd = [];
    protected $_list_add_join = array('category', 'refund');

    public function __construct($sales_type, $sales_name)
    {
        parent::__construct();

        $this->_sales_type = $sales_type;
        $this->_sales_name = $sales_name;
        $this->_group_ccd = $this->orderListModel->_group_ccd;
    }

    /**
     * 매출현황 인덱스
     */
    protected function index()
    {
        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus', 'ProdType', 'LearnPattern', 'SalePattern']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 제휴사결제, 온라인0원결제, 관리자유료결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$this->_group_ccd['PayRoute']], array_filter_keys($this->orderListModel->_pay_route_ccd, ['pg', 'visit', 'alliance', 'on_zero', 'admin_pay']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund']));

        // 메뉴별 공통코드 설정
        $arr_sale_pattern_ccd = [];
        $arr_learn_pattern_ccd = [];

        if ($this->_sales_type == 'all') {
            /* 전체매출현황 */
            // 상품구분 공통코드 (사은품 제외)
            unset($codes[$this->_group_ccd['ProdType']][$this->orderListModel->_prod_type_ccd['freebie']]);
            $arr_prod_type_ccd = $codes[$this->_group_ccd['ProdType']];

            // 판매형태 공통코드에서 일반, 수강연장, 재수강 코드만 필터링
            $arr_sale_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['SalePattern']], array_filter_keys($this->orderListModel->_sale_pattern_ccd, ['normal', 'extend', 'retake']));

            // 학습형태 공통코드에서 무료강좌 제외
            unset($codes[$this->_group_ccd['LearnPattern']][$this->orderListModel->_learn_pattern_ccd['on_free_lecture']]);
            $arr_learn_pattern_ccd = $codes[$this->_group_ccd['LearnPattern']];
        } else {
            /* 교재 */
            // 상품구분 공통코드 (재, 배송료, 추가배송료 코드만 필터링)
            $arr_prod_type_ccd = array_filter_keys($codes[$this->_group_ccd['ProdType']], array_filter_keys($this->orderListModel->_prod_type_ccd, ['book', 'delivery_price', 'delivery_add_price']));
        }

        $this->load->view('sales/sales_index', [
            'sales_type' => $this->_sales_type,
            'sales_name' => $this->_sales_name,
            'def_site_code' => element('0', get_auth_site_codes()),
            'arr_category' => $arr_category,
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $arr_pay_route_ccd,
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_prod_type_ccd' => $arr_prod_type_ccd,
            'arr_learn_pattern_ccd' => $arr_learn_pattern_ccd,
            'arr_sale_pattern_ccd' => $arr_sale_pattern_ccd,
        ]);
    }

    /**
     * 매출현황 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);
        }

        // 합계
        $sum_column = 'ifnull(sum(OP.RealPayPrice), 0) as SumPayPrice, ifnull(sum(OPR.RefundPrice), 0) as SumRefundPrice';
        $sum_data = $this->orderListModel->listAllOrder($sum_column, $arr_condition, null, null, [], $this->_list_add_join, false);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => element('0', $sum_data)
        ]);
    }

    /**
     * 매출현황 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        $arr_search_prod_type_ccd = array_filter(explode(',', $this->_reqP('search_chk_prod_type_ccd')));
        $arr_search_sale_pattern_ccd = array_filter(explode(',', $this->_reqP('search_chk_sale_pattern_ccd')));
        if ($this->_sales_type == 'all') {
            /* 전체매출현황 */
            empty($arr_search_sale_pattern_ccd) === true && $arr_search_sale_pattern_ccd = array_values(array_filter_keys($this->orderListModel->_sale_pattern_ccd, ['normal', 'extend', 'retake']));
        } else {
            /* 교재 */
            empty($arr_search_prod_type_ccd) === true && $arr_search_prod_type_ccd = array_values(array_filter_keys($this->orderListModel->_prod_type_ccd, ['book', 'delivery_price', 'delivery_add_price']));
        }

        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
                'OP.PayStatusCcd' => array_values(array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund'])),
                'SC.GroupCateCode' => array_filter(explode(',', $this->_reqP('search_chk_cate_code'))),
                'P.ProdTypeCcd' => $arr_search_prod_type_ccd,
                'PL.LearnPatternCcd' => array_filter(explode(',', $this->_reqP('search_chk_learn_pattern_ccd'))),
                'OP.SalePatternCcd' => $arr_search_sale_pattern_ccd,
            ],
            'NOTIN' => [
                'O.PayRouteCcd' => array_values(array_filter_keys($this->orderListModel->_pay_route_ccd, ['zero', 'free'])),  // 0원결제, 무료결제 제외
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
        ];

        // 교재일 경우 추가 조건
        if ($this->_sales_type == 'book') {
            // 교재상품이 포함된 주문만 조회
            $raw_query = /** @lang text */ 'select 1 from ' . $this->orderListModel->_table['order_product'] . ' as WOP
                    inner join ' . $this->orderListModel->_table['product'] . ' as WP
                        on WOP.ProdCode = WP.ProdCode
                where WOP.OrderIdx = O.OrderIdx and WP.ProdTypeCcd = "' . $this->orderListModel->_prod_type_ccd['book'] . '"';
            $arr_condition['RAW']['EXISTS ('] = $raw_query . ')';
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
     * 목록 order by 배열 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['OrderIdx' => 'desc'];
    }

    /**
     * 매출현황 목록 엑셀다운로드
     */
    protected function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '상품명', '결제금액', '결제완료일', '환불금액', '환불완료일', '결제상태'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, LgCateName
            , ProdTypeCcdName, ProdName, RealPayPrice, CompleteDatm, RefundPrice, RefundDatm, PayStatusCcdName';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel('매출현황리스트', $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
