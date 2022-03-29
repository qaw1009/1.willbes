<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdTypeStats extends \app\controllers\BaseController
{
    protected $models = array('pay/orderSales', 'sys/site', 'sys/category', 'sys/code', 'sys/excelDownLog');
    protected $helpers = array();
    private $_group_ccd = array();
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderSalesModel->_group_ccd;
    }

    /**
     * 상품구분별 매출현황 인덱스
     */
    public function index()
    {
        $arr_site_code = get_auth_site_codes(true);
        $def_site_code = key($arr_site_code);
        $arr_code = [];

        $category_data = $this->categoryModel->getCategoryArray();
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'lg' : 'md';
            $arr_code['arr_' . $arr_key . '_category'][] = $row;
        }

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['ProdType', 'LearnPattern', 'PayChannel', 'PayRoute', 'PayMethod']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        foreach ($arr_target_group_ccd as $key => $group_ccd) {
            $arr_code['arr_' . snake_case($key) . '_ccd'] = $codes[$group_ccd];
        }

        // 결제루트공통코드 필터링 (0원결제, 무료, 보강0원결제 제외)
        if (empty($arr_code['arr_pay_route_ccd']) === false) {
            $arr_code['arr_pay_route_ccd'] = array_unset($arr_code['arr_pay_route_ccd'], array_filter_keys($this->orderSalesModel->_pay_route_ccd, ['zero', 'free', 'bogang_zero']));
        }

        $this->load->view('sales/prod_stats_index', array_merge([
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
        ], $arr_code));
    }

    /**
     * 상품구분별 매출현황 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_site_code = $this->_reqP('search_site_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition = $this->_getListConditions();
            $list = $this->_getList($this->orderSalesModel->listProdTypeStatsOrder($search_start_date, $search_end_date, 'all', false, $arr_condition, null, null, $this->_getListOrderBy()));
            $count = count($list);

            if ($count > 0) {
                // 합계
                $sum_data = element('0', $this->orderSalesModel->listProdTypeStatsOrder($search_start_date, $search_end_date, 'all', 'sum', $arr_condition));
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
     * 상품구분별 매출현황 데이터 가공 (상품구분별 합계 추가)
     * @param array $list [원본데이터]
     * @param bool $is_excel [엑셀다운로드여부]
     * @return array
     */
    private function _getList($list, $is_excel = false)
    {
        $data = [];
        $div_key = '';
        $div_sum = ['tRealPayPrice' => 0, 'tOrderProdCnt' => 0, 'tRefundPrice' => 0,'tRefundCnt' => 0, 'tRemainPrice' => 0, 'tRealPayCnt' => 0];
        $add_cols = ['LearnPatternCcdName' => '합계', 'PayChannelCcdName' => '', 'PayRouteCcdName' => ''];
        $extra_cols = ['LearnPatternCcd' => '', 'PayChannelCcd' => '', 'PayRouteCcd' => ''];
        $last_idx = count($list) - 1;

        foreach ($list as $idx => $row) {
            if ($div_key != $row['ProdTypeCcdName']) {
                if ($idx != 0) {
                    $add_row = array_merge(['ProdTypeCcdName' => $div_key], $add_cols, $div_sum);
                    if ($is_excel === false) {
                        $add_row = array_merge($add_row, ['ProdTypeCcd' => $list[$idx-1]['ProdTypeCcd']], $extra_cols);
                    }
                    $data[] = $add_row;
                }
                $div_sum = [
                    'tRealPayPrice' => $row['tRealPayPrice'], 'tOrderProdCnt' => $row['tOrderProdCnt'],
                    'tRefundPrice' => $row['tRefundPrice'],'tRefundCnt' => $row['tRefundCnt'],
                    'tRemainPrice' => $row['tRemainPrice'], 'tRealPayCnt' => $row['tRealPayCnt']
                ];
            } else {
                $div_sum['tRealPayPrice'] += $row['tRealPayPrice'];
                $div_sum['tOrderProdCnt'] += $row['tOrderProdCnt'];
                $div_sum['tRefundPrice'] += $row['tRefundPrice'];
                $div_sum['tRefundCnt'] += $row['tRefundCnt'];
                $div_sum['tRemainPrice'] += $row['tRemainPrice'];
                $div_sum['tRealPayCnt'] += $row['tRealPayCnt'];
            }

            $div_key = $row['ProdTypeCcdName'];
            $data[] = $row;

            if ($idx == $last_idx) {
                $add_row = array_merge(['ProdTypeCcdName' => $div_key], $add_cols, $div_sum);
                if ($is_excel === false) {
                    $add_row = array_merge($add_row, ['ProdTypeCcd' => $row['ProdTypeCcd']], $extra_cols);
                }
                $data[] = $add_row;
            }
        }

        return $data;
    }

    /**
     * 상품구분별 매출현황 조회조건 리턴
     * @return array
     */
    private function _getListConditions($params = [])
    {
        $arr_condition = [
            'EQ' => [
                'BO.SiteCode' => get_var($this->_reqP('search_site_code'), element('site_code', $params)),
                'BO.PayChannelCcd' => get_var($this->_reqP('search_pay_channel_ccd'), element('pay_channel_ccd', $params)),
                'BO.PayRouteCcd' => get_var($this->_reqP('search_pay_route_ccd'), element('pay_route_ccd', $params)),
                'BO.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'P.ProdTypeCcd' => get_var($this->_reqP('search_prod_type_ccd'), element('prod_type_ccd', $params)),
                'PL.LearnPatternCcd' => get_var($this->_reqP('search_learn_pattern_ccd'), element('learn_pattern_ccd', $params)),
                'SC.GroupCateCode' => $this->_reqP('search_lg_cate_code'),
                'SC.CateCode' => $this->_reqP('search_md_cate_code')
            ],
            'IN' => [
                'BO.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ],
        ];

        // 결제상태 조건
        if (empty($this->_reqP('search_pay_status_ccd')) === false) {
            if ($this->_reqP('search_pay_status_ccd') == $this->orderSalesModel->_pay_status_ccd['paid']) {
                $arr_condition['RAW']['BO.RefundDatm is'] = 'null';   // 결제완료
            } else {
                $arr_condition['RAW']['BO.RefundDatm is'] = 'not null';   // 환불완료
            }
        }

        return $arr_condition;
    }

    /**
     * 상품구분별 매출현황 정렬기준 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['ProdTypeCcd' => 'asc', 'LearnPatternCcd' => 'asc', 'PayChannelCcd' => 'asc', 'PayRouteCcd' => 'asc'];
    }

    /**
     * 상품구분별 매출현황 엑셀다운로드
     */
    public function excel()
    {
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['상품구분', '강좌구분', '결제채널', '결제루트', '결제금액', '결제건수', '환불금액', '환불건수', '매출금액', '매출건수'];
        $column = 'ProdTypeCcdName, LearnPatternCcdName, PayChannelCcdName, PayRouteCcdName, tRealPayPrice, tOrderProdCnt, tRefundPrice, tRefundCnt, tRemainPrice, tRealPayCnt';

        $arr_condition = $this->_getListConditions();
        $list = $this->_getList($this->orderSalesModel->listProdTypeStatsOrder($search_start_date, $search_end_date, 'all', $column, $arr_condition, null, null, $this->_getListOrderBy()), true);
        $file_name = '상품구분별매출현황_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 상품구분별 매출현황 상세
     * @param array $params [상품타입공통코드]
     */
    public function show($params = [])
    {
        $arr_input = array_merge(array_unset($this->_reqG(null), 'q'), ['prod_type_ccd' => element('0', $params)]);
        $prod_type_ccd = element('prod_type_ccd', $arr_input);
        $site_code = element('site_code', $arr_input);
        $start_date = element('start_date', $arr_input);
        $end_date = element('end_date', $arr_input);
        $arr_code = [];

        if (empty($prod_type_ccd) === true || empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상품구분별 매출통계 조회
        $arr_condition = $this->_getListConditions($arr_input);
        $data = $this->orderSalesModel->listProdTypeStatsOrder($start_date, $end_date, 'all', false, $arr_condition);
        if (empty($data) === true) {
            show_alert('전체매출정보가 없습니다.', 'back');
        }

        if (count($data) > 1) {
            // 상품구분별 전체일 경우 합계 계산
            $data = [
                'tRealPayPrice' => array_sum(array_pluck($data, 'tRealPayPrice')), 'tRefundPrice' => array_sum(array_pluck($data, 'tRefundPrice')),
                'tRemainPrice' => array_sum(array_pluck($data, 'tRemainPrice')), 'tOrderProdCnt' => array_sum(array_pluck($data, 'tOrderProdCnt')),
                'tRealPayCnt' => array_sum(array_pluck($data, 'tRealPayCnt')), 'tRefundCnt' => array_sum(array_pluck($data, 'tRefundCnt')),
                'SiteCode' => $data[0]['SiteCode'], 'ProdTypeCcd' => $data[0]['ProdTypeCcd'], 'LearnPatternCcd' => '', 'PayChannelCcd' => '', 'PayRouteCcd' => '',
                'ProdTypeCcdName' => $data[0]['ProdTypeCcdName'], 'LearnPatternCcdName' => '', 'PayChannelCcdName' => '', 'PayRouteCcdName' => ''
            ];
        } else {
            $data = array_get($data, '0');
        }

        // 운영사이트 추가
        $data['SiteName'] = element($site_code, get_auth_site_codes(true));

        // 카테고리 조회
        $category_data = $this->categoryModel->getCategoryRouteArray($site_code);
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'lg' : 'md';
            $arr_code['arr_' . $arr_key . '_category'][] = $row;
        }

        // 사용하는 코드값 조회
        $arr_used_ccd = ['PayMethod', 'PayStatus'];
        if (empty($data['PayRouteCcd']) === true) {
            // 상품구분별 전체일 경우 사용공통코드 추가
            $arr_used_ccd = array_merge($arr_used_ccd, ['PayChannel', 'PayRoute']);
            if (in_array($data['ProdTypeCcd'], [$this->orderSalesModel->_prod_type_ccd['on_lecture'], $this->orderSalesModel->_prod_type_ccd['off_lecture']]) === true) {
                array_push($arr_used_ccd, 'LearnPattern');  // 강좌상품일 경우만 학습형태공통코드 추가
            }
        }
        $arr_target_ccd = array_filter_keys($this->_group_ccd, $arr_used_ccd);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_ccd));

        foreach ($arr_target_ccd as $key => $group_ccd) {
            $arr_code['arr_' . snake_case($key) . '_ccd'] = $codes[$group_ccd];
        }

        // 결제루트공통코드 필터링 (0원결제, 무료, 보강0원결제 제외)
        if (empty($arr_code['arr_pay_route_ccd']) === false) {
            $arr_code['arr_pay_route_ccd'] = array_unset($arr_code['arr_pay_route_ccd'], array_filter_keys($this->orderSalesModel->_pay_route_ccd, ['zero', 'free', 'bogang_zero']));
        }

        // 결제상태공통코드 필터링 (결제완료, 환불완료)
        if (empty($arr_code['arr_pay_status_ccd']) === false) {
            $arr_code['arr_pay_status_ccd'] = array_filter_keys($arr_code['arr_pay_status_ccd'], array_filter_keys($this->orderSalesModel->_pay_status_ccd, ['paid', 'refund']));
        }

        $this->load->view('sales/prod_stats_show', array_merge([
            'arr_input' => $arr_input,
            'data' => $data
        ], $arr_code));
    }

    /**
     * 상품구분별 매출현황 상세 주문목록
     * @return CI_Output
     */
    public function orderListAjax()
    {
        $prod_type_ccd = $this->_reqP('prod_type_ccd');
        $site_code = $this->_reqP('site_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($prod_type_ccd) === false && empty($site_code) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition = $this->_getOrderListConditions();
            $count = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', true, $arr_condition);

            if ($count > 0) {
                $list = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getOrderListOrderBy());
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
     * 상품구분별 매출현황 상세 주문목록 조회조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'BO.SiteCode' => $this->_reqP('site_code'),
                'BO.PayChannelCcd' => get_var($this->_reqP('search_pay_channel_ccd'), $this->_reqP('pay_channel_ccd')),
                'BO.PayRouteCcd' => get_var($this->_reqP('search_pay_route_ccd'), $this->_reqP('pay_route_ccd')),
                'BO.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('prod_type_ccd'),
                'PL.LearnPatternCcd' => get_var($this->_reqP('search_learn_pattern_ccd'), $this->_reqP('learn_pattern_ccd')),
                'SC.GroupCateCode' => $this->_reqP('search_lg_cate_code'),
                'SC.CateCode' => $this->_reqP('search_md_cate_code')
            ],
            'IN' => [
                'BO.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
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
                    'OOI.CertNo' => $this->_reqP('search_prod_value'),
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

        return $arr_condition;
    }

    /**
     * 상품구분별 매출현황 상세 주문목록 정렬조건 리턴
     * @return string[]
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }

    /**
     * 상품구분별 매출현황 상세 주문목록 엑셀다운로드
     */
    public function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $prod_type_ccd = $this->_reqP('prod_type_ccd');
        $site_code = $this->_reqP('site_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($prod_type_ccd) === true || empty($site_code) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = [
            '주문번호', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '캠퍼스', '학습형태', '상품명',
            '결제금액', '수수료율', '수수료', '결제완료일', '환불금액', '환불완료일', '결제상태'
        ];
        $numerics = ['RealPayPrice', 'RefundPrice', 'PgFeePrice'];    // 숫자형 변환 대상 컬럼

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', 'excel', $arr_condition, null, null, $this->_getOrderListOrderBy());
        $last_query = $this->orderSalesModel->getLastQuery();
        $file_name = '상품구분별매출현황상세_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

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
