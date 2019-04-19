<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllStats extends \app\controllers\BaseController
{
    protected $models = array('pay/orderStats', 'pay/orderList', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_order_list_add_join = array('refund', 'category');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 윌비스전체매출현황 인덱스
     */
    public function index()
    {
        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        // 상품타입공통코드 조회
        $arr_prod_type_ccd = $this->codeModel->getCcd($this->orderStatsModel->_group_ccd['ProdType']);

        $this->load->view('business/stats/index', [
            'arr_category' => $arr_category,
            'arr_prod_type_ccd' => $arr_prod_type_ccd
        ]);
    }

    /**
     * 윌비스전체매출현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $sum_data = ['SumPayPrice' => 0, 'SumRefundPrice' => 0];
        $is_searching = false;

        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            $arr_condition = $this->_getListConditions();
            $is_searching = true;

            $list = $this->orderStatsModel->listAllStatsOrder($arr_condition);

            if (count($list) > 0) {
                $sum_data = $list[0];
                array_splice($list, 0, 1);
            }
        }

        return $this->response([
            'data' => $list,
            'sum_data' => $sum_data,
            'is_searching' => $is_searching
        ]);
    }

    /**
     * 윌비스전체매출현황 목록 조회 조건 리턴
     * @return mixed
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'SC.GroupCateCode' => $this->_reqP('search_cate_code')
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ]
        ];

        // 매출합계 날짜 조건
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        switch ($search_date_type) {
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
     * 윌비스전체매출현황 목록 엑셀다운로드
     */
    public function excel()
    {
        if (empty($this->_reqP('search_start_date')) === true || empty($this->_reqP('search_end_date')) === true) {
            show_alert('검색 후 엑셀다운로드를 실행해 주세요.', 'back');
        }

        $data = [];
        $headers = ['사이트', '상품구분', '직종', '매출'];
        $arr_condition = $this->_getListConditions();
        $list = $this->orderStatsModel->listAllStatsOrder($arr_condition);
        $file_name = '윌비스전체매출현황리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        if (empty($list) === false) {
            array_splice($list, 0, 1);

            foreach ($list as $row) {
                $data[] = [$row['SiteName'], $row['ProdTypeCcdName'], $row['LgCateName'], $row['SumRemainPrice']];
            }
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $data, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 윌비스전체매출현황 상세보기
     * @param array $params
     */
    public function show($params = [])
    {
        $site_code = $params[0];
        $prod_type_ccd = $params[1];
        $cate_code = $params[2];
        $qs = json_decode(base64_decode($this->_reqG('q')), true);

        if (empty($site_code) === true || empty($prod_type_ccd) === true || empty($cate_code) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 사이트 조회
        $arr_site_code = get_auth_site_codes(true);

        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray($site_code, '', '', 1);

        // 상품타입공통코드 조회
        $arr_prod_type_ccd = $this->codeModel->getCcd($this->orderStatsModel->_group_ccd['ProdType']);

        // 사이트코드, 상품타입, 대분류 카테고리 매출현황 파라미터 셋팅
        $arr_input = [
            'site_code' => $site_code,
            'prod_type_ccd' => $prod_type_ccd == '999999' ? '' : $prod_type_ccd,
            'cate_code' => $cate_code == '0000' || $cate_code == '9999' ? '' : $cate_code,
            'search_date_type' => element('search_date_type', $qs),
            'search_start_date' => element('search_start_date', $qs),
            'search_end_date' => element('search_end_date', $qs),
        ];

        $this->load->view('business/stats/show', [
            'site_name' => element($site_code, $arr_site_code),
            'cate_name' => element($cate_code, $arr_category, '전체'),
            'prod_type_name' => element($prod_type_ccd, $arr_prod_type_ccd, '전체'),
            'arr_input' => $arr_input
        ]);
    }

    /**
     * 윌비스전체매출현황 상세보기 주문목록 조회
     * @return CI_Output
     */
    public function orderListAjax()
    {
        $arr_condition = $this->_getOrderListConditions();

        $list = [];
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_order_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getOrderListOrderBy(), $this->_order_list_add_join);
        }

        // 합계
        $sum_column = 'ifnull(sum(OP.RealPayPrice), 0) as SumPayPrice, ifnull(sum(OPR.RefundPrice), 0) as SumRefundPrice';
        $sum_data = $this->orderListModel->listAllOrder($sum_column, $arr_condition, null, null, [], $this->_order_list_add_join, false);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => element('0', $sum_data)
        ]);
    }

    /**
     * 윌비스전체매출현황 상세보기 주문목록 조회 조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('site_code'),
                'P.ProdTypeCcd' => $this->_reqP('prod_type_ccd'),
                'SC.GroupCateCode' => $this->_reqP('cate_code')
            ],
            'GT' => [
                'OP.RealPayPrice' => 0
            ],
            'IN' => [
                'OP.PayStatusCcd' => array_values(array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund'])),
                'OP.SalePatternCcd' => array_values(array_filter_keys($this->orderListModel->_sale_pattern_ccd, ['normal', 'extend', 'retake']))
            ]
        ];

        // 매출합계 날짜 조건
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        switch ($search_date_type) {
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
     * 윌비스전체매출현황 상세보기 주문목록 order by 배열 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc'];
    }

    /**
     * 윌비스전체매출현황 상세보기 주문목록 엑셀다운로드
     */
    public function orderListExcel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '상품명', '결제금액', '결제완료일', '환불금액', '환불완료일', '결제상태'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, LgCateName
            , ProdTypeCcdName, ProdName, RealPayPrice, CompleteDatm, RefundPrice, RefundDatm, PayStatusCcdName';

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getOrderListOrderBy(), $this->_order_list_add_join);
        $last_query = $this->orderListModel->getLastQuery();
        $file_name = '윌비스전체매출현황상세리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
