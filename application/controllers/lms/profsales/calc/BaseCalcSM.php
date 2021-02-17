<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCalcSM extends \app\controllers\BaseController
{
    protected $models = array('pay/ssamCalc', 'product/base/professor', 'sys/code');
    protected $helpers = array();
    protected $_calc_type = '';
    protected $_calc_name = '';
    protected $_is_off_site = 'N';                  // 학원사이트여부
    protected $_is_student = 'N';                   // 수강생메뉴여부
    protected $_is_tzone = false;                   // 티존접근여부
    protected $_sess_tzone_prof_idxs = null;        // 티존교수식별자
    protected $_limit_start_date = '2020-12-01';    // 검색제한일자
    protected $_limit_year_month = '2021-01';       // 검색제한년월 (배당현황만 사용)
    protected $_limit_search_days = 124;            // 검색제한일수 (수강생현황만 사용, 4개월 * 31)
    protected $_memory_limit_size = '512M';         // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct($calc_type, $calc_name)
    {
        parent::__construct();

        $this->_calc_type = $calc_type;
        $this->_calc_name = $calc_name;
        $this->_is_off_site = starts_with($this->_calc_type, 'off') === true ? 'Y' : 'N';
        $this->_is_student = strpos($this->_calc_type, 'Stud') !== false ? 'Y' : 'N';
        $this->_is_tzone = SUB_DOMAIN == 'tzone';
        $this->_sess_tzone_prof_idxs = $this->session->userdata('admin_prof_idxs');

        if ($this->_is_tzone === true && empty($this->_sess_tzone_prof_idxs) === true) {
            show_alert('연결된 교수정보가 없습니다.', '/');
        }
    }

    /**
     * 임용배당현황 인덱스
     */
    protected function index()
    {
        $arr_code = [];
        $arr_code['arr_site_code'] = array_filter_keys(get_auth_on_off_site_codes($this->_is_off_site, true), ['2017', '2018']);  // 임용사이트만 노출
        if (empty($arr_code['arr_site_code']) === true) {
            show_alert('임용 사이트 권한이 없습니다.', '/');
        }

        $def_site_code = key($arr_code['arr_site_code']);   // 디폴트 사이트코드
        $def_wprof_name = '';   // 디폴트 교수명

        // 교수
        if ($this->_is_tzone === true) {
            $def_wprof_name = $this->session->userdata('admin_name');
        } else {
            $arr_code['arr_professor'] = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);
        }

        // 디폴트 년도/전월/전전월
        $def_curr_year = date('Y');
        $def_curr_month = date('n');
        $def_prev1_month = date_compute(date('Ymd'), '-1 month', 'n');
        $def_prev2_month = date_compute(date('Ymd'), '-2 month', 'n');

        // 뷰 파일명 구분값
        $view_name = ($this->_is_student == 'Y' ? 'student' : 'index') . '_sm';

        $this->load->view('profsales/calc/' . $view_name, array_merge([
            'calc_type' => $this->_calc_type,
            'calc_name' => $this->_calc_name,
            'is_tzone' => $this->_is_tzone,
            'is_off_site' => $this->_is_off_site,
            'def_site_code' => $def_site_code,
            'def_wprof_name' => $def_wprof_name,
            'def_curr_year' => $def_curr_year,
            'def_curr_month' => $def_curr_month,
            'def_prev1_month' => $def_prev1_month,
            'def_prev2_month' => $def_prev2_month,
            'limit_year_month' => $this->_limit_year_month,
            'limit_start_date' => $this->_limit_start_date,
            'limit_search_days' => $this->_limit_search_days
        ], $arr_code));
    }

    /**
     * 임용배당현황 수강신청현황 조회
     * @return CI_Output
     */
    protected function calcListAjax()
    {
        $search_year = $this->_reqP('search_year');
        $search_month = $this->_reqP('search_month');
        $search_site_code = $this->_reqP('search_site_code');
        $search_prof_idx = $this->_getProfIdx();
        $prev1_count = 0;
        $prev1_data = [];
        $total = null;      // 총배당금액 데이터
        $is_search = false;  // 검색여부

        if (empty($search_year) === false && empty($search_month) === false && empty($search_site_code) === false && empty($search_prof_idx) === false) {
            // 정월 정산현황 조회
            $arr_prev1_date = $this->_getSearchDate($search_year, $search_month, 1);

            // 임용통합 이후의 조회일자일 경우만 조회
            if ($arr_prev1_date[0] >= $this->_limit_start_date) {
                $arr_condition = $this->_getListConditions();

                $prev1_data = $this->ssamCalcModel->listProfCalc($this->_calc_type, $search_prof_idx, $search_site_code, $arr_prev1_date[0], $arr_prev1_date[1], false, $arr_condition);
                $prev1_count = count($prev1_data);

                if ($this->_is_off_site == 'Y') {
                    // 전전월 정산금액 합계 조회
                    $arr_prev2_date = $this->_getSearchDate($search_year, $search_month, 2);
                    $prev2_data = $this->ssamCalcModel->listProfCalc($this->_calc_type, $search_prof_idx, $search_site_code, $arr_prev2_date[0], $arr_prev2_date[1], 'TOTAL', $arr_condition);

                    $total = $this->_getFinalCalcPrice($prev1_data, $prev2_data);
                } else {
                    $total = $this->_getFinalCalcPrice($prev1_data);
                }
            }

            $is_search = true;
        }

        return $this->response([
            'recordsTotal' => $prev1_count,
            'recordsFiltered' => $prev1_count,
            'data' => $prev1_data,
            'total' => $total,
            'is_search' => $is_search
        ]);
    }

    /**
     * 임용배당현황 환불현황 조회
     * @return CI_Output
     */
    protected function refundListAjax()
    {
        $search_year = $this->_reqP('search_year');
        $search_month = $this->_reqP('search_month');
        $search_site_code = $this->_reqP('search_site_code');
        $search_prof_idx = $this->_getProfIdx();
        $count = 0;
        $list = [];

        if (empty($search_year) === false && empty($search_month) === false && empty($search_site_code) === false && empty($search_prof_idx) === false) {
            // 전월 환불현황 조회
            $arr_prev1_date = $this->_getSearchDate($search_year, $search_month, 1);

            // 임용통합 이후의 조회일자일 경우만 조회
            if ($arr_prev1_date[0] >= $this->_limit_start_date) {
                $arr_condition = $this->_getListConditions('refund');

                $list = $this->ssamCalcModel->listProfCalc($this->_calc_type, $search_prof_idx, $search_site_code, $arr_prev1_date[0], $arr_prev1_date[1], false, $arr_condition);
                $count = count($list);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 임용수강생현황 조회
     * @return CI_Output
     */
    protected function studListAjax()
    {
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_site_code = $this->_reqP('search_site_code');
        $search_prof_idx = $this->_getProfIdx();
        $count = 0;
        $list = [];
        $is_search = false;  // 검색여부

        if (empty($search_start_date) === false && empty($search_end_date) === false && empty($search_site_code) === false && empty($search_prof_idx) === false) {
            // 해당년도 수강생현황 조회
            $arr_search_date = $this->_getSearchDate($search_start_date, $search_end_date);

            // 검색일수
            $diff_search_days = diff_days($search_end_date, $search_start_date) + 1;

            // 임용통합 이후의 조회일자일 경우만 조회 and 검색제한일수 미만일 경우만 조회
            if ($arr_search_date[0] >= $this->_limit_start_date && $diff_search_days <= $this->_limit_search_days) {
                $arr_condition = $this->_getListConditions('paid');

                $list = $this->ssamCalcModel->listProfStudent($this->_calc_type, $search_prof_idx, $search_site_code, $arr_search_date[0], $arr_search_date[1], false, $arr_condition);
                $count = count($list);
            }

            $is_search = true;
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'is_search' => $is_search
        ]);
    }

    /**
     * 임용배당현황 총배당금액 리턴 (실지급액)
     * @param array $prev1_data [전월정산데이터]
     * @param null|array $prev2_data [전전월정산금액합계]
     * @return array
     */
    private function _getFinalCalcPrice($prev1_data, $prev2_data = null)
    {
        $tax_rate = 0.033;  // 갑근세 비율
        $prev1_calc_rate_price = array_get(array_pluck($prev1_data, 'tDivisionCalcRatePrice', 'ProdCodeSub'), 'TOTAL', 0);  // 전월 정산금액

        if ($this->_is_off_site == 'Y') {
            $prev2_calc_rate_price = array_get($prev2_data[0], 'tDivisionCalcRatePrice', 0);    // 전전월 정산금액
            $final_set_price1 = round(($prev2_calc_rate_price * 0.5) - ($prev2_calc_rate_price * 0.5 * $tax_rate)); // 전전월 정산금액 * 0.5 - 갑근세
            $final_set_price2 = round(($prev1_calc_rate_price * 0.5) - ($prev1_calc_rate_price * 0.5 * $tax_rate)); // 전월 정산금액 * 0.5 - 갑근세
            $final_calc_price = $final_set_price1 + $final_set_price2;  // 전전월 정산금액 절반 + 전월 정산금액 절반
        } else {
            $final_set_price1 = $prev1_calc_rate_price;     // 전월 정산금액 
            $final_set_price2 = round($prev1_calc_rate_price * $tax_rate);   // 갑근세
            $final_calc_price = $final_set_price1 - $final_set_price2;      // 전월 정산금액 - 갑근세
        }

        return [
            'tFinalSetPrice1' => $final_set_price1,
            'tFinalSetPrice2' => $final_set_price2,
            'tFinalCalcPrice' => $final_calc_price
        ];
    }

    /**
     * 임용배당현황 조회일자 리턴
     * @param string $search_date_param1 [조회일자 파라미터1 (배당현황: 년도, 수강생현황: )]
     * @param null|string $search_date_param2 [조회일자 파라미터2 (배당현황: 월, 수강생현황: )]
     * @param null|int $prev_type [전월, 전전월 구분 (1, 2) (배당현황만 사용)]
     * @return string[]
     */
    private function _getSearchDate($search_date_param1, $search_date_param2 = null, $prev_type = null)
    {
        if ($this->_is_student == 'Y') {
            $search_start_date = $search_date_param1;
            $search_end_date = $search_date_param2;
        } else {
            $base_date = $search_date_param1 . '-' . str_pad($search_date_param2, 2, '0', STR_PAD_LEFT) . '-01';
            $prev_year_month = date_compute($base_date, '-' . $prev_type . ' month', 'Y-m');
            $search_start_date = $prev_year_month . '-01';
            $search_end_date = $prev_year_month . '-31';
        }

        return [$search_start_date, $search_end_date];
    }

    /**
     * 임용배당현황 강사식별자 리턴 (tzone일 경우 로그인 세션값 리턴)
     * @return mixed
     */
    private function _getProfIdx()
    {
        return $this->_is_tzone === true ? $this->_sess_tzone_prof_idxs : $this->_reqP('search_prof_idx');
    }

    /**
     * 임용배당현황 조회조건 리턴
     * @param string $pay_status [결제상태]
     * @param bool $is_show [상세페이지여부]
     * @return array
     */
    private function _getListConditions($pay_status = null, $is_show = false)
    {
        $arr_condition = [
            'EQ' => [
                'TA.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'TA.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ]
        ];

        // 목록/상세 페이지별 조회조건
        if ($is_show === true) {
            $arr_condition['EQ']['TA.ProdCodeSub'] = $this->_reqP('search_prod_code_sub');  // 상품코드서브

            // 회원
            $arr_condition['ORG1'] = [
                'EQ' => [
                    'M.MemIdx' => $this->_reqP('search_value'),
                    'M.MemId' => $this->_reqP('search_value'),
                    'M.MemName' => $this->_reqP('search_value')
                ]
            ];

            // 강좌구분 (단과/패키지)
            if (empty($this->_reqP('search_lec_pack_type')) === false) {
                if ($this->_reqP('search_lec_pack_type') == 'lecture') {
                    $arr_condition['RAW']['TA.ProdCode ='] = ' TA.ProdCodeSub';
                } else {
                    $arr_condition['RAW']['TA.ProdCode !='] = ' TA.ProdCodeSub';
                }
            }

            // 결제상태 (전체/결제완료/환불완료)
            if (empty($this->_reqP('search_pay_status')) === false) {
                if ($this->_reqP('search_pay_status') == 'refund') {
                    $arr_condition['RAW']['TA.RefundDatm is'] = ' not null';
                } else {
                    $arr_condition['RAW']['TA.RefundDatm is'] = ' null';
                }
            }
        } else {
            // 상품
            $arr_condition['ORG1'] = [
                'EQ' => [
                    'TA.ProdCodeSub' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'SP.ProdName' => $this->_reqP('search_prod_value')
                ]
            ];
        }

        // 결제상태별 조건
        if ($pay_status == 'refund') {
            $arr_condition['RAW']['TA.RefundDatm is'] = ' not null';    // 환불완료 주문상품건만 조회
        } elseif ($pay_status == 'paid') {
            $arr_condition['RAW']['TA.RefundDatm is'] = ' null';        // 결제완료 주문상품건만 조회
        }

        return $arr_condition;
    }

    /**
     * 수강생현황/환불현황 레이어 팝업
     * @return mixed
     */
    protected function show()
    {
        $search_type = $this->_req('search_type');
        $search_date_param1 = $this->_req('search_date_param1');
        $search_date_param2 = $this->_req('search_date_param2');
        $search_site_code = $this->_req('search_site_code');
        $search_prof_idx = $this->_req('search_prof_idx');
        $search_prod_code_sub = $this->_req('search_prod_code_sub');
        $search_prod_name_sub = $this->_req('search_prod_name_sub');

        if (empty($search_type) === true || empty($search_date_param1) === true || empty($search_date_param2) === true || empty($search_site_code) === true
            || empty($search_prof_idx) === true || empty($search_prod_code_sub) === true || empty($search_prod_name_sub) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        return $this->load->view('profsales/calc/show_sm', [
            'calc_type' => $this->_calc_type,
            'is_tzone' => $this->_is_tzone,
            'search_type' => $search_type,
            'search_date_param1' => $search_date_param1,
            'search_date_param2' => $search_date_param2,
            'search_site_code' => $search_site_code,
            'search_prof_idx' => $search_prof_idx,
            'search_prod_code_sub' => $search_prod_code_sub,
            'search_prod_name_sub' => base64_decode($search_prod_name_sub)
        ]);
    }

    /**
     * 수강생현황/환불현황 주문내역 조회
     * @return CI_Output
     */
    protected function orderListAjax()
    {
        $search_type = $this->_req('search_type');
        $search_date_param1 = $this->_req('search_date_param1');
        $search_date_param2 = $this->_req('search_date_param2');
        $search_site_code = $this->_req('search_site_code');
        $search_prof_idx = $this->_req('search_prof_idx');
        $search_prod_code_sub = $this->_req('search_prod_code_sub');
        $count = 0;
        $list = [];

        if (empty($search_type) === true || empty($search_date_param1) === true || empty($search_date_param2) === true || empty($search_site_code) === true
            || empty($search_prof_idx) === true || empty($search_prod_code_sub) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 주문내역 조회 (배당현황: 전월, 수강생현황: 조회기간)
        $arr_search_date = $this->_getSearchDate($search_date_param1, $search_date_param2, 1);
        $arr_condition = $this->_getListConditions($search_type, true);
        $order_by = $this->_getOrderListOrderBy();

        // 임용통합 이후의 조회일자일 경우만 조회
        if ($arr_search_date[0] >= $this->_limit_start_date) {
            $count = $this->ssamCalcModel->listProfOrder($this->_calc_type, $search_prof_idx, $search_site_code, $arr_search_date[0], $arr_search_date[1], true, $arr_condition);
            if ($count > 0) {
                $list = $this->ssamCalcModel->listProfOrder($this->_calc_type, $search_prof_idx, $search_site_code, $arr_search_date[0], $arr_search_date[1], false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
            }
        }
        
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 수강생현황/환불현황 주문내역 엑셀다운로드
     */
    protected function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_type = $this->_req('search_type');
        $search_date_param1 = $this->_req('search_date_param1');
        $search_date_param2 = $this->_req('search_date_param2');
        $search_site_code = $this->_req('search_site_code');
        $search_prof_idx = $this->_req('search_prof_idx');
        $search_prod_code_sub = $this->_req('search_prod_code_sub');

        if (empty($search_type) === true || empty($search_date_param1) === true || empty($search_date_param2) === true || empty($search_site_code) === true
            || empty($search_prof_idx) === true || empty($search_prod_code_sub) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 주문내역 조회 (배당현황: 전월, 수강생현황: 조회기간)
        $arr_search_date = $this->_getSearchDate($search_date_param1, $search_date_param2, 1);
        $arr_condition = $this->_getListConditions($search_type, true);
        $order_by = $this->_getOrderListOrderBy();
        $column = 'OrderNo, MemName, MemId, MemPhone, LecPackTypeName, SalePatternCcdName, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, RealPayPrice, CompleteDatm, RefundPrice, RefundDatm, PayStatusName';

        // 임용통합 이후의 조회일자일 경우만 조회
        if ($arr_search_date[0] < $this->_limit_start_date) {
            show_alert($this->_limit_start_date . ' 이후 주문내역만 조회 가능합니다.', 'back');
        }

        $list = $this->ssamCalcModel->listProfOrder($this->_calc_type, $search_prof_idx, $search_site_code, $arr_search_date[0], $arr_search_date[1], $column, $arr_condition, null, null, $order_by);
        $last_query = $this->ssamCalcModel->getLastQuery();

        // 엑셀파일설정
        $file_name = $this->_calc_name . ($this->_is_student == 'Y' ? '수강생현황' : '배당현황');
        $file_name .= '_' . ($search_type == 'refund' ? '환불현황' : '수강생현황') . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');
        $headers = ['주문번호', '회원명', '회원아이디', '휴대폰번호', '강좌구분', '상품구분', '결제채널', '결제루트', '결제수단', '결제금액', '결제완료일', '환불금액', '환불완료일', '결제상태'];
        $numerics = ['RealPayPrice', 'RefundPrice'];    // 숫자형 변환 대상 컬럼

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

    /**
     * 수강생현황/환불현황 주문내역 정렬조건 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }
}
