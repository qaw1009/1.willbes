<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStats extends \app\controllers\BaseController
{
    protected $models = array('pay/orderStats', 'pay/orderList', 'product/base/course', 'product/base/subject', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code'
        , '_wbs/bms/publisher', '_wbs/bms/author');
    protected $helpers = array();
    protected $_stats_type = '';
    protected $_stats_name = '';
    protected $_prod_type = '';
    protected $_learn_pattern = '';
    protected $_search_column = [];
    protected $_group_ccd = ['lec_type_ccd' => '607', 'pack_type_ccd' => '648', 'pack_period_ccd' => '650', 'study_pattern_ccd' => '653'];
    protected $_order_list_add_join = array('refund');
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
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->orderStatsModel->listStatsOrder($this->_learn_pattern, true, $arr_condition, null, null, []);

        if ($count > 0) {
            $list = $this->orderStatsModel->listStatsOrder($this->_learn_pattern, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        // 합계
        $sum_column = 'ifnull(sum(SU.SumPayPrice), 0) as tSumPayPrice, ifnull(sum(SU.SumRefundPrice), 0) as tSumRefundPrice';
        $sum_data = $this->orderStatsModel->listStatsOrder($this->_learn_pattern, $sum_column, $arr_condition, null, null, []);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => element('0', $sum_data)
        ]);
    }

    /**
     * 매출통계 조회 조건 리턴
     * @param array $params [상세보기 파라미터]
     * @return mixed
     */
    private function _getListConditions($params = [])
    {
        // 매출합계 조건
        $arr_condition['SU'] = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'OP.ProdCode' => get_var($this->_reqP('prod_code'), element('prod_code', $params)),
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd[$this->_prod_type],
                'PL.LearnPatternCcd' => element($this->_learn_pattern, $this->orderListModel->_learn_pattern_ccd),
            ],
            'IN' => [
                'OP.PayStatusCcd' => array_values(array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund'])),
                'OP.SalePatternCcd' => array_values(array_filter_keys($this->orderListModel->_sale_pattern_ccd, ['normal', 'extend', 'retake']))
            ],
            'NOTIN' => [
                'O.PayRouteCcd' => array_values(array_filter_keys($this->orderListModel->_pay_route_ccd, ['zero', 'free'])),  // 0원결제, 무료결제 제외
            ],
        ];

        // 매출합계 날짜 조건
        $search_date_type = get_var($this->_reqP('search_date_type'), element('search_date_type', $params, 'paid'));
        $search_start_date = get_var($this->_reqP('search_start_date'), element('search_start_date', $params, date('Y-m-01')));
        $search_end_date = get_var($this->_reqP('search_end_date'), element('search_end_date', $params, date('Y-m-t')));

        switch ($search_date_type) {
            case 'refund' :
                $arr_condition['SU']['BDT'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['SU']['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        // 상품검색 조건
        $arr_condition['OUT'] = [
            'EQ' => [
                'SC.GroupCateCode' => $this->_reqP('search_cate_code'),
                'PL.SchoolYear' => $this->_reqP('search_school_year'),
                'PL.LecTypeCcd' => $this->_reqP('search_lec_type_ccd'),
                'PL.PackTypeCcd' => $this->_reqP('search_pack_type_ccd'),
                'PL.StudyPeriod' => $this->_reqP('search_pack_period_ccd'),
                'PL.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'PL.StudyPatternCcd' => $this->_reqP('search_study_pattern_ccd'),
            ],
            'GT' => [
                'SU.SumPayPrice' => 0
            ],
            'ORG1' => [
                'LKB' => [
                    'P.ProdCode' => $this->_reqP('search_prod_value'),
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ]
            ],
        ];

        if ($this->_prod_type == 'book') {
            $arr_condition['OUT']['EQ']['PB.CourseIdx'] = $this->_reqP('search_course_idx');
            $arr_condition['OUT']['LKB']['VPB.SubjectIdxs'] = $this->_reqP('search_subject_idx');
            $arr_condition['OUT']['LKB']['VPB.ProfIdxs'] = $this->_reqP('search_prof_idx');
            $arr_condition['OUT']['EQ']['VBB.wPublIdx'] = $this->_reqP('search_publ_idx');
            $arr_condition['OUT']['LKB']['VBB.wAuthorIdxs'] = $this->_reqP('search_author_idx');
        } else {
            $arr_condition['OUT']['EQ']['PL.CourseIdx'] = $this->_reqP('search_course_idx');
            $arr_condition['OUT']['EQ']['PL.SubjectIdx'] = $this->_reqP('search_subject_idx');
            $arr_condition['OUT']['LKB']['VPP.ProfIdx_String'] = $this->_reqP('search_prof_idx');
        }

        return $arr_condition;
    }

    /**
     * 매출통계 목록 order by 배열 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['SumRemainPrice' => 'desc'];
    }

    /**
     * 매출통계 목록 엑셀다운로드
     * @param array $headers
     * @param string $column
     */
    protected function _excel($headers, $column)
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = array_merge(['대분류', '상품코드', '상품명'], $headers, ['매출현황']);
        $column = 'GSC.CateName, SU.ProdCode, P.ProdName, ' . $column . ', (SU.SumPayPrice - SU.SumRefundPrice) as SumRemainPrice';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderStatsModel->listStatsOrder($this->_learn_pattern, $column, $arr_condition, null, null, $this->_getListOrderBy());

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($this->_stats_name . '매출통계리스트', $list, $headers) !== true) {
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
        // + 기호가 공백으로 처리되는 것에 대한 예외 처리 추가
        $qs = json_decode(base64_decode(str_replace(' ', '+', $this->_reqG('q'))), true);
        $site_code = element('search_site_code', $qs);

        if (empty($prod_code) === true || empty($site_code) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 상품코드별 매출현황 파라미터 셋팅
        $arr_input = [
            'prod_code' => $prod_code,
            'search_date_type' => element('search_date_type', $qs),
            'search_start_date' => element('search_start_date', $qs),
            'search_end_date' => element('search_end_date', $qs),
        ];

        $data = element('0', $this->orderStatsModel->listStatsOrder($this->_learn_pattern, false, $this->_getListConditions($arr_input)));
        if (empty($data) === true) {
            show_error('데이터가 없습니다.');
        }

        // 운영사이트 추가
        $data['SiteName'] = element($site_code, get_auth_site_codes(true));

        // 사용하는 코드값 조회
        $group_ccd = $this->orderListModel->_group_ccd;
        $arr_target_group_ccd = array_filter_keys($group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 제휴사결제, 온라인0원결제, 관리자유료결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$group_ccd['PayRoute']], array_filter_keys($this->orderListModel->_pay_route_ccd, ['pg', 'visit', 'alliance', 'on_zero', 'admin_pay']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$group_ccd['PayStatus']], array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund']));

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
     * 매출통계 상세보기 주문목록 조회
     * @return CI_Output
     */
    protected function orderListAjax()
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
     * 매출통계 상세보기 주문목록 조회 조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = element('SU', $this->_getListConditions());
        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => [
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
            ],
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                ]
            ]
        ]);

        return $arr_condition;
    }

    /**
     * 매출통계 상세보기 주문목록 order by 배열 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc'];
    }

    /**
     * 매출통계 상세보기 주문목록 엑셀다운로드
     */
    protected function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '상품구분', '상품명', '결제금액', '결제완료일', '환불금액', '환불완료일', '결제상태'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, ProdTypeCcdName, ProdName
            , RealPayPrice, CompleteDatm, RefundPrice, RefundDatm, PayStatusCcdName';

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getOrderListOrderBy(), $this->_order_list_add_join);

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($this->_stats_name . '매출통계상세보기리스트', $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
