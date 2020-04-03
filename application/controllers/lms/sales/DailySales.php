<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailySales extends \app\controllers\BaseController
{
    protected $models = array('pay/orderSales', 'sys/site', 'sys/category', 'sys/code', 'sys/excelDownLog');
    protected $helpers = array();
    private $_group_ccd = array();
    private $_target_site_code = array();       // 학원사이트코드
    private $_target_prod_type_ccd = array();   // 조회대상 상품구분공통코드
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderSalesModel->_group_ccd;
        $this->_target_site_code = get_auth_on_off_site_codes('Y', true);
        $this->_target_prod_type_ccd = array_filter_keys($this->orderSalesModel->_prod_type_ccd, ['off_lecture', 'reading_room', 'locker', 'deposit']);
    }

    /**
     * 학원 매출일계표 인덱스
     */
    public function index()
    {
        // 경찰, 공무원학원 사이트코드 제외
        $arr_site_code = array_filter($this->_target_site_code, function($key) {
            return !in_array($key, ['2002', '2004']);
        }, ARRAY_FILTER_USE_KEY);

        // 디폴트 사이트코드
        $def_site_code = key($arr_site_code);

        // 1차 카테고리 조회
        $arr_lg_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 공통코드 조회
        $codes = $this->codeModel->getCcdInArray([$this->_group_ccd['ProdType'], $this->_group_ccd['LearnPattern']]);

        // 상품구분 공통코드
        $arr_prod_type_ccd = array_filter_keys($codes[$this->_group_ccd['ProdType']], array_filter_keys($this->orderSalesModel->_prod_type_ccd, ['reading_room', 'locker', 'deposit']));
        $arr_learn_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['LearnPattern']], array_filter_keys($this->orderSalesModel->_learn_pattern_ccd, ['off_lecture', 'off_pack_lecture']));
        $arr_learn_prod_type_ccd = $arr_learn_pattern_ccd + $arr_prod_type_ccd;

        $this->load->view('sales/daily_index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_lg_category' => $arr_lg_category,
            'arr_learn_prod_type_ccd' => $arr_learn_prod_type_ccd,
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 학원 매출일계표 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_site_code = $this->_reqP('search_site_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_start_hour = get_var($this->_reqP('search_start_hour'), '00');
        $search_end_hour = get_var($this->_reqP('search_end_hour'), '23');
        $arr_condition = $this->_getListConditions($search_site_code);
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($search_site_code) === false && empty($search_start_date) === false && empty($search_end_date) === false && empty($arr_condition) === false) {
            $search_start_date = $search_start_date . ' ' . $search_start_hour . ':00:00';
            $search_end_date = $search_end_date . ' ' . $search_end_hour . ':59:59';
            $order_by = $this->_getListOrderBy();

            $count = $this->orderSalesModel->listDailySalesOrder($search_start_date, $search_end_date, $search_site_code, true, $arr_condition);

            if ($count > 0) {
                $list = $this->orderSalesModel->listDailySalesOrder($search_start_date, $search_end_date, $search_site_code, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);

                // 합계
                $sum_data = $this->orderSalesModel->listDailySalesOrder($search_start_date, $search_end_date, $search_site_code, 'sum', $arr_condition);
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
     * 학원 매출일계표 조회조건 리턴
     * @param int $site_code [사이트코드]
     * @return array
     */
    private function _getListConditions($site_code)
    {
        $arr_site_code = array_keys($this->_target_site_code);
        $arr_site_campus_ccd = empty($site_code) === false ? get_auth_campus_ccds($site_code) : [];

        if (empty($site_code) === true || empty($arr_site_code) === true || empty($arr_site_campus_ccd) === true) {
            return [];
        }

        return [
            'IN' => [
                'U.SiteCode' => $arr_site_code,                     // 학원 사이트 권한 추가
                'U.CampusCcd' => $arr_site_campus_ccd,              // 학원 캠퍼스 권한 추가
                'U.ProdTypeCcd' => $this->_target_prod_type_ccd     // 학원강좌, 독서실, 사물함, 예치금 상품만 조회
            ],
            'EQ' => [
                'U.LearnProdTypeCcd' => $this->_reqP('search_learn_prod_type_ccd'),
                'U.LgCateCode' => $this->_reqP('search_lg_cate_code'),
                'U.CampusCcd' => $this->_reqP('search_campus_ccd')
            ],
            'ORG' => [
                'EQ' => [
                    'U.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'U.ProdName' => $this->_reqP('search_prod_value')
                ]
            ]
        ];
    }

    /**
     * 학원 매출일계표 정렬기준 리턴
     * @param bool $is_excel
     * @return array
     */
    private function _getListOrderBy($is_excel = false)
    {
        $prefix = $is_excel === false ? 'U.' : '';

        return [$prefix . 'TrcDatm' => 'desc'];
    }

    /**
     * 학원 매출일계표 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_site_code = $this->_reqP('search_site_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_start_hour = get_var($this->_reqP('search_start_hour'), '00');
        $search_end_hour = get_var($this->_reqP('search_end_hour'), '23');
        $arr_condition = $this->_getListConditions($search_site_code);

        if (empty($search_site_code) === true || empty($search_start_date) === true || empty($search_end_date) === true || empty($arr_condition) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 매출 데이터 조회
        $search_start_date = $search_start_date . ' ' . $search_start_hour . ':00:00';
        $search_end_date = $search_end_date . ' ' . $search_end_hour . ':59:59';
        $excel_column = 'OrderNo, CertNo, left(TrcDatm, 10) as TrcDate, right(TrcDatm, 8) as TrcTime, LearnProdTypeCcdName, LgCateName, CampusCcdName, ProdCode, ProdName
            , MemName, MemId, MemPhone, PayRouteCcdName, CardTrcPrice, CashTrcPrice, BankTrcPrice, VBankTrcPrice, TrcPrice';
        $order_by = $this->_getListOrderBy(true);
        $results = $this->orderSalesModel->listDailySalesOrder($search_start_date, $search_end_date, $search_site_code, 'excel', $arr_condition, null, null, $order_by, $excel_column);
        $last_query = $this->orderSalesModel->getLastQuery();
        
        // 매출 합계 조회
        $sum_data = $this->orderSalesModel->listDailySalesOrder($search_start_date, $search_end_date, $search_site_code, 'sum', $arr_condition);

        // 매출 합계 추가
        $results[] = [
            'OrderNo' => '합계', 'CertNo' => '', 'TrcDate' => '', 'TrcTime' => '', 'LearnProdTypeCcdName' => '', 'LgCateName' => '', 'CampusCcdName' => '', 'ProdCode' => '', 'ProdName' => '',
            'MemName' => '', 'MemId' => '', 'MemPhone' => '', 'PayRouteCcdName' => '', 'CardTrcPrice' => $sum_data['tCardTrcPrice'], 'CashTrcPrice' => $sum_data['tCashTrcPrice'],
            'BankTrcPrice' => $sum_data['tBankTrcPrice'], 'VBankTrcPrice' => $sum_data['tVBankTrcPrice'], 'TrcPrice' => $sum_data['tTrcPrice']
        ];

        // 엑셀 설정
        $file_name = '학원매출일계표_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');
        $headers = ['주문번호', '수강번호', '발생일자', '발생시간', '상품구분', '대분류', '캠퍼스', '상품코드', '상품명', '회원명', '회원아이디', '연락처', '결제루트'
            , '신용카드', '현금', '실시간계좌이체', '무통장입금', '합계'];
        $numerics = ['CardTrcPrice', 'CashTrcPrice', 'BankTrcPrice', 'VBankTrcPrice', 'TrcPrice'];    // 숫자형 변환 대상 컬럼

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $results, $headers, $numerics) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
