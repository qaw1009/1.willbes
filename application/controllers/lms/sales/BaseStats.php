<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStats extends \app\controllers\BaseController
{
    protected $models = array('pay/orderSales', 'product/base/course', 'product/base/subject', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code'
        , '_wbs/bms/publisher', '_wbs/bms/author');
    protected $helpers = array();
    protected $_stats_type = '';
    protected $_stats_name = '';
    protected $_prod_type = '';
    protected $_learn_pattern = '';
    protected $_search_column = [];
    protected $_group_ccd = ['lec_type_ccd' => '607', 'pack_type_ccd' => '648', 'pack_period_ccd' => '650', 'study_pattern_ccd' => '653'];
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct($stats_type, $stats_name, $prod_type, $learn_pattern, $search_column)
    {
        parent::__construct();

        $this->_stats_type = $stats_type;
        $this->_stats_name = $stats_name;
        $this->_prod_type = $prod_type;
        $this->_learn_pattern = $learn_pattern;
        $this->_search_column = $search_column;
    }

    /**
     * 매출통계 인덱스
     */
    protected function index()
    {
        $arr_code = [];
        $arr_code['arr_site_code'] = [];
        $def_site_code = element('0', get_auth_site_codes());

        // 1차 카테고리 조회
        if (in_array('cate_code', $this->_search_column) === true) {
            $arr_code['arr_category'] = $this->categoryModel->getCategoryArray('', '', '', 1);
        }
        // 캠퍼스
        if (in_array('campus_ccd', $this->_search_column) === true) {
            $arr_code['arr_site_code'] = $this->siteModel->getOffLineSiteArray('');
            $arr_code['arr_campus'] = $this->siteModel->getSiteCampusArray('');
            $def_site_code = key($arr_code['arr_site_code']);
        }
        // 과정
        if (in_array('course_idx', $this->_search_column) === true) {
            $arr_code['arr_course'] = $this->courseModel->getCourseArray();
        }
        // 과목
        if (in_array('subject_idx', $this->_search_column) === true) {
            $arr_code['arr_subject'] = $this->subjectModel->getSubjectArray();
        }
        // 교수
        if (in_array('prof_idx', $this->_search_column) === true) {
            $arr_code['arr_professor'] = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);
        }
        // 출판사
        if (in_array('publ_idx', $this->_search_column) === true) {
            $arr_code['arr_publisher'] = $this->publisherModel->getPublisherArray();
        }
        // 저자
        if (in_array('author_idx', $this->_search_column) === true) {
            $arr_code['arr_author'] = $this->authorModel->getAuthorArray();
        }

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, $this->_search_column);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        foreach ($arr_target_group_ccd as $key => $group_ccd) {
            $arr_code['arr_' . $key] = $codes[$group_ccd];
        }

        $this->load->view('sales/stats_index', array_merge([
            'stats_type' => $this->_stats_type,
            'stats_name' => $this->_stats_name,
            'search_column' => $this->_search_column,
            'def_site_code' => $def_site_code
        ], $arr_code));
    }

    /**
     * 매출통계 목록 조회
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

            $count = $this->orderSalesModel->listStatsOrder($this->_learn_pattern, $search_start_date, $search_end_date, 'all', true, $arr_condition, null, null, []);

            if ($count > 0) {
                $list = $this->orderSalesModel->listStatsOrder($this->_learn_pattern, $search_start_date, $search_end_date, 'all', false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());

                // 합계
                $sum_data = element('0', $this->orderSalesModel->listStatsOrder($this->_learn_pattern, $search_start_date, $search_end_date, 'all', 'sum', $arr_condition));
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
     * 매출통계 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'SU.SiteCode' => $this->_reqP('search_site_code'),
                'SU.ProdCode' => $this->_reqP('prod_code'),
                'SC.GroupCateCode' => $this->_reqP('search_cate_code'),
                'PL.SchoolYear' => $this->_reqP('search_school_year'),
                'PL.LecTypeCcd' => $this->_reqP('search_lec_type_ccd'),
                'PL.CourseIdx' => $this->_reqP('search_course_idx'),
                'PL.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'PL.PackTypeCcd' => $this->_reqP('search_pack_type_ccd'),
                'PL.StudyPeriod' => $this->_reqP('search_pack_period_ccd'),
                'PL.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'PL.StudyPatternCcd' => $this->_reqP('search_study_pattern_ccd'),
            ],
            'IN' => [
                'SU.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ],
            'LKB' => [
                'VPP.ProfIdx_String' => $this->_reqP('search_prof_idx')
            ],
            'ORG1' => [
                'EQ' => [
                    'SU.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ]
            ],
        ];

        // 학원강좌일 경우 캠퍼스 권한 추가
        if ($this->_prod_type == 'off_lecture') {
            $arr_site_campus_ccd = empty($this->_reqP('search_site_code')) === false ? get_auth_campus_ccds($this->_reqP('search_site_code')) : [];
            $arr_condition['IN']['PL.CampusCcd'] = empty($arr_site_campus_ccd) === false ? $arr_site_campus_ccd : ['000000'];
        }

        return $arr_condition;
    }

    /**
     * 매출통계 목록 정렬조건 리턴
     * @param bool $is_excel [엑셀다운로드 여부]
     * @return array
     */
    private function _getListOrderBy($is_excel = false)
    {
        $prefix = $is_excel === false ? 'SU.' : '';
        return ['tRemainPrice' => 'desc', $prefix . 'ProdCode' => 'asc'];
    }

    /**
     * 매출통계 목록 엑셀다운로드
     * @param array $headers
     */
    protected function _excel($headers)
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = array_merge(['대분류', '상품코드', '상품명'], $headers, ['매출현황']);

        $arr_condition = $this->_getListConditions();
        $list = $this->orderSalesModel->listStatsOrder($this->_learn_pattern, $search_start_date, $search_end_date, 'all', 'excel', $arr_condition, null, null, $this->_getListOrderBy(true));
        $file_name = $this->_stats_name . '_매출통계리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 매출통계 상세보기
     * @param array $params
     */
    protected function show($params = [])
    {
        $prod_code = $params[0];
        $site_code = $params[1];
        $start_date = $params[2];
        $end_date = $params[3];

        if (empty($prod_code) === true || empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상품코드별 매출현황 파라미터 셋팅
        $arr_input = [
            'prod_code' => $prod_code,
            'site_code' => $site_code,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        // 상품코드별 매출통계 조회
        $arr_condition = ['EQ' => ['SU.SiteCode' => $site_code, 'SU.ProdCode' => $prod_code]];
        $data = element('0', $this->orderSalesModel->listStatsOrder($this->_learn_pattern, $start_date, $end_date, 'all', false, $arr_condition));
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // 운영사이트 추가
        $data['SiteName'] = element($site_code, get_auth_site_codes(true));

        // 사용하는 코드값 조회
        $group_ccd = $this->orderSalesModel->_group_ccd;
        $arr_target_group_ccd = array_filter_keys($group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 제휴사결제, 온라인0원결제, 관리자유료결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$group_ccd['PayRoute']], array_filter_keys($this->orderSalesModel->_pay_route_ccd, ['pg', 'visit', 'alliance', 'on_zero', 'admin_pay']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$group_ccd['PayStatus']], array_filter_keys($this->orderSalesModel->_pay_status_ccd, ['paid', 'refund']));

        $this->load->view('sales/stats_show', [
            'stats_type' => $this->_stats_type,
            'stats_name' => $this->_stats_name,
            'arr_pay_channel_ccd' => $codes[$group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $arr_pay_route_ccd,
            'arr_pay_method_ccd' => $codes[$group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_input' => $arr_input,
            'data' => $data
        ]);
    }

    /**
     * 매출통계 상세보기 매출목록 조회
     * @return CI_Output
     */
    protected function orderListAjax()
    {
        $site_code = $this->_reqP('site_code');
        $prod_code = $this->_reqP('prod_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($site_code) === false && empty($prod_code) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition = $this->_getOrderListConditions();

            $count = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', true, $arr_condition, null, null, []);

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
     * 매출통계 상세보기 매출목록 조회 조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'BO.SiteCode' => $this->_reqP('site_code'),
                'BO.ProdCode' => $this->_reqP('prod_code'),
                'BO.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'BO.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'BO.PayMethodCcd' => $this->_reqP('search_pay_method_ccd')
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
                    'BO.OrderNo' => $this->_reqP('search_prod_value')
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

        // 학원강좌일 경우 캠퍼스 권한 추가
        if ($this->_prod_type == 'off_lecture') {
            $arr_site_campus_ccd = empty($this->_reqP('site_code')) === false ? get_auth_campus_ccds($this->_reqP('site_code')) : [];
            $arr_condition['IN']['PL.CampusCcd'] = empty($arr_site_campus_ccd) === false ? $arr_site_campus_ccd : ['000000'];
        }

        return $arr_condition;
    }

    /**
     * 매출통계 상세보기 매출목록 정렬조건 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }

    /**
     * 매출통계 상세보기 매출목록 엑셀다운로드
     */
    protected function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $site_code = $this->_reqP('site_code');
        $prod_code = $this->_reqP('prod_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($site_code) === true || empty($prod_code) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['주문번호', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '직종구분', '상품구분', '캠퍼스', '학습형태', '상품명'
            , '결제금액', '수수료율', '수수료', '결제완료일', '환불금액', '환불완료일', '결제상태'];
        $numerics = ['RealPayPrice', 'RefundPrice', 'PgFeePrice'];    // 숫자형 변환 대상 컬럼

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->orderSalesModel->listSalesOrder($search_start_date, $search_end_date, 'all', 'excel', $arr_condition, null, null, $this->_getOrderListOrderBy());
        $last_query = $this->orderSalesModel->getLastQuery();
        $file_name = $this->_stats_name . '_매출통계상세_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

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
