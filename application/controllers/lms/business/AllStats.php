<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllStats extends \app\controllers\BaseController
{
    protected $models = array('pay/orderSales', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

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
        $arr_prod_type_ccd = $this->codeModel->getCcd($this->orderSalesModel->_group_ccd['ProdType']);

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
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $list = [];
        $sum_data = null;

        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            $arr_condition = $this->_getListConditions();
            $list = $this->orderSalesModel->listAllStatsOrder($search_start_date, $search_end_date, 'real_pay', $arr_condition);

            if (count($list) > 0) {
                $sum_data = end($list);
                array_splice($list, -1, 1);
            }
        }

        return $this->response([
            'data' => $list,
            'sum_data' => $sum_data
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
                'BO.SiteCode' => $this->_reqP('search_site_code'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'SC.GroupCateCode' => $this->_reqP('search_cate_code')
            ],
            'IN' => [
                'BO.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 윌비스전체매출현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $data = [];
        $headers = ['사이트', '상품구분', '직종', '매출'];
        $arr_condition = $this->_getListConditions();
        $list = $this->orderSalesModel->listAllStatsOrder($search_start_date, $search_end_date, 'real_pay', $arr_condition);
        $file_name = '윌비스전체매출현황리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        if (empty($list) === false) {
            foreach ($list as $row) {
                if ($row['SiteCode'] != '9999' && $row['ProdTypeCcd'] != '999999' && $row['LgCateCode'] == '9999') {
                    $row['LgCateName'] = '강좌 소계';
                } elseif ($row['SiteCode'] != '9999' && $row['ProdTypeCcd'] == '999999' && $row['LgCateCode'] == '9999') {
                    $row['SiteName'] = $row['SiteName'] . ' - 총 합계';
                } elseif ($row['SiteCode'] == '9999' && $row['ProdTypeCcd'] == '999999' && $row['LgCateCode'] == '9999') {
                    $row['SiteName'] = '총 합계';
                }

                $data[] = [$row['SiteName'], $row['ProdTypeCcdName'], $row['LgCateName'], $row['tRemainPrice']];
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
        $start_date = $params[3];
        $end_date = $params[4];

        if (empty($site_code) === true || empty($prod_type_ccd) === true || empty($cate_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 사이트 조회
        $arr_site_code = get_auth_site_codes(true);

        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray($site_code, '', '', 1);

        // 상품타입공통코드 조회
        $arr_prod_type_ccd = $this->codeModel->getCcd($this->orderSalesModel->_group_ccd['ProdType']);

        // 사이트코드, 상품타입, 대분류 카테고리 매출현황 파라미터 셋팅
        $arr_input = [
            'site_code' => $site_code,
            'prod_type_ccd' => $prod_type_ccd == '999999' ? '' : $prod_type_ccd,
            'cate_code' => $cate_code == '0000' || $cate_code == '9999' ? '' : $cate_code,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        $this->load->view('business/stats/show', [
            'site_name' => element($site_code, $arr_site_code),
            'cate_name' => element($cate_code, $arr_category, '전체'),
            'prod_type_name' => element($prod_type_ccd, $arr_prod_type_ccd, '전체'),
            'arr_input' => $arr_input
        ]);
    }

    /**
     * 윌비스전체매출현황 상세보기 매출목록 조회
     * @return CI_Output
     */
    public function orderListAjax()
    {
        $site_code = $this->_reqP('site_code');
        $start_date = $this->_reqP('start_date');
        $end_date = $this->_reqP('end_date');
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($site_code) === false && empty($start_date) === false && empty($end_date) === false) {
            $arr_condition = $this->_getOrderListConditions();

            $count = $this->orderSalesModel->listSalesOrder($start_date, $end_date, 'real_pay', true, $arr_condition, null, null, []);

            if ($count > 0) {
                $list = $this->orderSalesModel->listSalesOrder($start_date, $end_date, 'real_pay', false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getOrderListOrderBy());

                // 합계
                $sum_data = element('0', $this->orderSalesModel->listSalesOrder($start_date, $end_date, 'real_pay', 'sum', $arr_condition));
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
     * 윌비스전체매출현황 상세보기 매출목록 조회 조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'BO.SiteCode' => $this->_reqP('site_code'),
                'P.ProdTypeCcd' => $this->_reqP('prod_type_ccd'),
                'SC.GroupCateCode' => $this->_reqP('cate_code')
            ],
            'IN' => [
                'BO.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 윌비스전체매출현황 상세보기 매출목록 정렬조건 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }

    /**
     * 윌비스전체매출현황 상세보기 매출목록 엑셀다운로드
     */
    public function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $site_code = $this->_reqP('site_code');
        $start_date = $this->_reqP('start_date');
        $end_date = $this->_reqP('end_date');

        if (empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['주문번호', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '학습형태', '상품명', '결제금액', '수수료', '결제완료일', '환불금액', '환불완료일', '결제상태'];
        $numerics = ['RealPayPrice', 'RefundPrice'];    // 숫자형 변환 대상 컬럼

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->orderSalesModel->listSalesOrder($start_date, $end_date, 'real_pay', 'excel', $arr_condition, null, null, $this->_getOrderListOrderBy());
        $last_query = $this->orderSalesModel->getLastQuery();
        $file_name = '윌비스전체매출현황상세리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

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
