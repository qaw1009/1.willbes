<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSales extends \app\controllers\BaseController
{
    protected $models = array('pay/orderSales', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_sales_type = '';
    protected $_sales_name = '';
    protected $_group_ccd = [];
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct($sales_type, $sales_name)
    {
        parent::__construct();

        $this->_sales_type = $sales_type;
        $this->_sales_name = $sales_name;
        $this->_group_ccd = $this->orderSalesModel->_group_ccd;
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
        $arr_pay_route_ccd = array_filter_keys($codes[$this->_group_ccd['PayRoute']], array_filter_keys($this->orderSalesModel->_pay_route_ccd, ['pg', 'visit', 'alliance', 'on_zero', 'admin_pay']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderSalesModel->_pay_status_ccd, ['paid', 'refund']));

        // 메뉴별 공통코드 설정
        $arr_sale_pattern_ccd = [];
        $arr_learn_pattern_ccd = [];

        if ($this->_sales_type == 'all') {
            /* 전체매출현황 */
            // 상품구분 공통코드 (사은품 제외)
            unset($codes[$this->_group_ccd['ProdType']][$this->orderSalesModel->_prod_type_ccd['freebie']]);
            $arr_prod_type_ccd = $codes[$this->_group_ccd['ProdType']];

            // 학습형태 공통코드에서 무료강좌 제외
            unset($codes[$this->_group_ccd['LearnPattern']][$this->orderSalesModel->_learn_pattern_ccd['on_free_lecture']]);
            $arr_learn_pattern_ccd = $codes[$this->_group_ccd['LearnPattern']];

            // 판매형태 공통코드에서 일반, 수강연장, 재수강 코드만 필터링
            $arr_sale_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['SalePattern']], array_filter_keys($this->orderSalesModel->_sale_pattern_ccd, ['normal', 'extend', 'retake']));
        } else {
            /* 교재 */
            // 상품구분 공통코드 (교재, 배송료, 추가배송료 코드만 필터링)
            $arr_prod_type_ccd = array_filter_keys($codes[$this->_group_ccd['ProdType']], array_filter_keys($this->orderSalesModel->_prod_type_ccd, ['book', 'delivery_price', 'delivery_add_price']));
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
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition = $this->_getListConditions();

            $count = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', true, $arr_condition, null, null, []);

            if ($count > 0) {
                $list = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());

                // 합계
                $sum_data = element('0', $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', 'sum', $arr_condition));
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 매출현황 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_search_prod_type_ccd = array_filter(explode(',', $this->_reqP('search_chk_prod_type_ccd')));

        // 교재일 경우 기본 조건
        if ($this->_sales_type == 'book' && empty($arr_search_prod_type_ccd) === true) {
            $arr_search_prod_type_ccd = array_values(array_filter_keys($this->orderSalesModel->_prod_type_ccd, ['book', 'delivery_price', 'delivery_add_price']));
        }

        $arr_condition = [
            'EQ' => [
                'BO.SiteCode' => $this->_reqP('search_site_code'),
                'BO.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'BO.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'BO.PayMethodCcd' => $this->_reqP('search_pay_method_ccd')
            ],
            'IN' => [
                'BO.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
                'SC.GroupCateCode' => array_filter(explode(',', $this->_reqP('search_chk_cate_code'))),
                'P.ProdTypeCcd' => $arr_search_prod_type_ccd,
                'PL.LearnPatternCcd' => array_filter(explode(',', $this->_reqP('search_chk_learn_pattern_ccd'))),
                'BO.SalePatternCcd' => array_filter(explode(',', $this->_reqP('search_chk_sale_pattern_ccd')))
            ],
            'ORG1' => [
                'LKR' => [
                    'BO.MemIdx' => $this->_reqP('search_member_value'),
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'BO.OrderIdx' => $this->_reqP('search_prod_value'),
                    'BO.OrderNo' => $this->_reqP('search_prod_value'),
                    'BO.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ]
            ],
        ];

        // 결제상태 조건
        if (empty($this->_reqP('search_pay_status_ccd')) === false) {
            if ($this->_reqP('search_pay_status_ccd') == $this->orderSalesModel->_pay_status_ccd['paid']) {
                $arr_condition['RAW']['BO.RefundPrice is'] = ' null';   // 결제완료
            } else {
                $arr_condition['RAW']['BO.RefundPrice is'] = ' not null';   // 환불완료
            }
        }

        /*// 교재일 경우 추가 조건
        if ($this->_sales_type == 'book') {
            // 교재상품이 포함된 주문만 조회
            $raw_query = 'select 1 from ' . $this->orderSalesModel->_table['order_product'] . ' as WOP
                    inner join ' . $this->orderSalesModel->_table['product'] . ' as WP
                        on WOP.ProdCode = WP.ProdCode
                where WOP.OrderIdx = BO.OrderIdx and WP.ProdTypeCcd = "' . $this->orderSalesModel->_prod_type_ccd['book'] . '"';
            $arr_condition['RAW']['EXISTS ('] = $raw_query . ')';
        }*/

        return $arr_condition;
    }

    /**
     * 매출현황 목록 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }

    /**
     * 매출현황 목록 엑셀다운로드
     */
    protected function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['주문번호', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '학습형태', '상품명'
            , '결제금액', '수수료율', '수수료', '결제완료일', '환불금액', '환불완료일', '결제상태'];
        $numerics = ['RealPayPrice', 'RefundPrice', 'PgFeePrice'];    // 숫자형 변환 대상 컬럼

        $arr_condition = $this->_getListConditions();
        $list = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', 'excel', $arr_condition, null, null, $this->_getListOrderBy());
        $last_query = $this->orderSalesModel->getLastQuery();
        $file_name = $this->_sales_name . '_매출현황리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers, $numerics) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
