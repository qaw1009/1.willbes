<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCalc extends \app\controllers\BaseController
{
    protected $models = array('pay/orderCalc', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_calc_type = '';
    protected $_calc_name = '';
    protected $_methods = ['LE' => 'Lecture', 'AC' => 'AdminPackChoice', 'PP' => 'PeriodPack', 'OL' => 'Lecture', 'OP' => 'AdminPackChoice'];
    protected $_search_name = ['LE' => '단강좌&사용자/운영자패키지(일반형)', 'AC' => '운영자패키지(선택형)', 'PP' => '기간제패키지', 'OL' => '단과반/종합반(일반형)', 'OP' => '종합반(선택형)'];
    protected $_group_ccd = [];

    public function __construct($calc_type, $calc_name)
    {
        parent::__construct();

        $this->_calc_type = $calc_type;
        $this->_calc_name = $calc_name;
        $this->_group_ccd = $this->orderCalcModel->_group_ccd;
    }

    /**
     * 강사료정산 과목/교수별 합계 조회
     */
    protected function index()
    {
        // 상품구분 파라미터
        $search_type = get_var($this->_reqG('search_type'), ($this->_calc_type == 'lecture' ? 'LE' : 'OL'));

        // 사이트탭 조회
        $arr_site = $this->siteModel->listSite('SiteCode, SiteName', [
            'EQ' => ['IsUse' => 'Y', 'IsCampus' => ($this->_calc_type == 'lecture' ? 'N' : 'Y')],
            'IN' => ['SiteCode' => get_auth_site_codes()]
        ]);
        $arr_site_code = array_pluck($arr_site, 'SiteName', 'SiteCode');
        $def_site_code = key($arr_site_code);

        // 교수 조회
        $arr_professor = $this->professorModel->getProfessorArray();
        
        $this->load->view('business/calc/index', [
            'calc_type' => $this->_calc_type,
            'calc_name' => $this->_calc_name,
            'search_type' => $search_type,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_professor' => $arr_professor
        ]);
    }

    /**
     * 강사료정산 과목/교수별 합계 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $search_type = $this->_reqP('search_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $sum_type = 'sum';
        $count = 0;
        $list = [];
        $sum_data = [];

        if (empty($search_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $method = $this->_methods[$search_type];
            $arr_search_date = [$search_start_date, $search_end_date];
            $arr_condition = $this->_getSumConditions($search_type, $this->_reqP(null));

            $list = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, $sum_type, $arr_condition);
            $count = count($list);
            $sum_data = $this->_getTotalSum($list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 강사료정산 과목/교수별 합계 엑셀다운로드
     */
    protected function excel()
    {
        $search_type = $this->_reqP('search_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $sum_type = 'sum';
        $results = [];

        if (empty($search_type) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $method = $this->_methods[$search_type];
        $arr_search_date = [$search_start_date, $search_end_date];
        $arr_condition = $this->_getSumConditions($search_type, $this->_reqP(null));
        $list = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, $sum_type, $arr_condition);
        $list[] = array_merge($this->_getTotalSum($list), ['wProfName' => '합계', 'SubjectName' => '']);

        if ($search_type == 'PP') {
            // 기간제패키지
            $headers = ['교수명', '과목명', '매출금액(C)', '결제수수료(D)', '환불금액(E)', '수강개월수(F1)', '월안분금액(F)', '정산금액(H)', '소득세(I)', '주민세(J)', '지급액'];
        } else {
            $headers = ['교수명', '과목명', '매출금액(C)', '결제수수료(D)', '환불금액(E)', '정산금액(H)', '소득세(I)', '주민세(J)', '지급액'];
        }

        foreach ($list as $idx => $row) {
            $results[$idx]['wProfName'] = $row['wProfName'];
            $results[$idx]['SubjectName'] = $row['SubjectName'];
            $results[$idx]['tDivisionPayPrice'] = number_format($row['tDivisionPayPrice'], 8, '.', '');
            $results[$idx]['tDivisionPgFeePrice'] = number_format($row['tDivisionPgFeePrice'], 8, '.', '');
            $results[$idx]['tDivisionRefundPrice'] = number_format($row['tDivisionRefundPrice'], 8, '.', '');

            if ($search_type == 'PP') {
                // 기간제패키지
                $results[$idx]['StudyPeriodMonth'] = $row['StudyPeriodMonth'];
                $results[$idx]['tDivisionMonthPrice'] = number_format($row['tDivisionMonthPrice'], 8, '.', '');
            }

            $results[$idx]['tDivisionCalcPrice'] = number_format($row['tDivisionCalcPrice'], 8, '.', '');
            $results[$idx]['tDivisionIncomeTax'] = number_format($row['tDivisionIncomeTax'], 8, '.', '');
            $results[$idx]['tDivisionResidentTax'] = number_format($row['tDivisionResidentTax'], 8, '.', '');
            $results[$idx]['tFinalCalcPrice'] = $row['tFinalCalcPrice'];
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('강사료정산리스트', $results, $headers);
    }

    /**
     * 강사료정산 상세보기
     * @param array $params
     */
    protected function show($params = [])
    {
        $prof_idx = element('0', $params);
        $subject_idx = element('1', $params);
        $study_period = element('2', $params);  // 기간제패키지 수강기간
        $qs = json_decode(base64_decode($this->_reqG('q')), true);
        $search_type = element('search_type', $qs);
        $search_site_code = element('search_site_code', $qs);
        $search_prof_idx = element('search_prof_idx', $qs);
        $search_start_date = element('search_start_date', $qs);
        $search_end_date = element('search_end_date', $qs);
        $sum_type = empty($prof_idx) === false ? 'sum' : 'tSum';

        if (empty($search_type) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 강사/과목별 매출현황 파라미터 셋팅
        $arr_input = [
            'prof_idx' => $prof_idx,
            'subject_idx' => $subject_idx,
            'study_period' => $study_period,
            'search_type' => $search_type,
            'search_site_code' => $search_site_code,
            'search_prof_idx' => $search_prof_idx,
            'search_start_date' => $search_start_date,
            'search_end_date' => $search_end_date,
        ];

        // 합계
        $method = $this->_methods[$search_type];
        $arr_search_date = [$search_start_date, $search_end_date];
        $arr_condition = $this->_getSumConditions($search_type, $arr_input, true);
        $data = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, $sum_type, $arr_condition);
        $data = array_merge($this->_getTotalSum($data), [
            'wProfName' => array_get($data, '0.wProfName'), 'SubjectName' => array_get($data, '0.SubjectName'), 'StudyPeriodMonth' => array_get($data, '0.StudyPeriodMonth')
        ]);

        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray($search_site_code, '', '', 1);

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus', 'LearnPattern', 'SalePattern']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 제휴사결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$this->_group_ccd['PayRoute']], array_filter_keys($this->orderCalcModel->_pay_route_ccd, ['pg', 'visit', 'alliance']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderCalcModel->_pay_status_ccd, ['paid', 'refund']));

        // 학습형태 공통코드에서 온라인/학원강좌 코드만 필터링
        if ($this->_calc_type == 'lecture') {
            $arr_learn_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['LearnPattern']], array_filter_keys($this->orderCalcModel->_learn_pattern_ccd, ['on_lecture', 'userpack_lecture', 'adminpack_lecture']));
        } else {
            $arr_learn_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['LearnPattern']], array_filter_keys($this->orderCalcModel->_learn_pattern_ccd, ['off_lecture', 'off_pack_lecture']));
        }

        // 판매형태 공통코드에서 일반, 재수강, 수강연장 코드만 필터링
        $arr_sale_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['SalePattern']], array_filter_keys($this->orderCalcModel->_sale_pattern_ccd, ['normal', 'retake', 'extend']));

        $this->load->view('business/calc/show', [
            'calc_type' => $this->_calc_type,
            'calc_name' => $this->_calc_name,
            'search_name' => $this->_search_name[$search_type],
            'arr_input' => $arr_input,
            'arr_category' => $arr_category,
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $arr_pay_route_ccd,
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_learn_pattern_ccd' => $arr_learn_pattern_ccd,
            'arr_sale_pattern_ccd' => $arr_sale_pattern_ccd,
            'data' => $data
        ]);
    }

    /**
     * 강사료정산 주문목록 상세조회
     * @return CI_Output
     */
    protected function orderListAjax()
    {
        $search_type = $this->_reqP('search_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $sum_type = empty($this->_reqP('prof_idx')) === false ? 'sum' : 'tSum';
        $count = 0;
        $list = [];
        $sum_data = [];

        if (empty($search_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $method = $this->_methods[$search_type];
            $arr_search_date = [$search_start_date, $search_end_date];
            $arr_condition = $this->_getSumConditions($search_type, $this->_reqP(null), true);
            $arr_condition = array_merge_recursive($arr_condition, $this->_getOrderListConditions($search_type, $this->_reqP(null)));

            $count = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, true, $arr_condition);

            if ($count > 0) {
                $list = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
            }

            // 합계
            $sum_data = $this->_getTotalSum($this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, $sum_type, $arr_condition));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 강사료정산 주문목록 엑셀다운로드
     */
    protected function orderListExcel()
    {
        $search_type = $this->_reqP('search_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_type) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $method = $this->_methods[$search_type];
        $arr_search_date = [$search_start_date, $search_end_date];
        $arr_condition = $this->_getSumConditions($search_type, $this->_reqP(null), true);
        $arr_condition = array_merge_recursive($arr_condition, $this->_getOrderListConditions($search_type, $this->_reqP(null)));

        $results = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, 'excel', $arr_condition);

        if ($search_type == 'PP') {
            // 기간제패키지
            $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '결제금액(A)', '결제수수료율(D2)', '결제수수료(D1)', '결제일', '환불금액(E1)', '환불완료일', '결제상태'
                , '직종', '상품구분', '상품상세구분', '상품코드', '상품명', '수강개월수(F1)', '과목', '교수명'
                , '기여도(B)', '기여도매출(C)', '기여도수수료(D)', '기여도환불(E)', '월안분(F)', '정산율(G)', '정산금액(H)', '소득세(I)', '주민세(J)', '지급액'];
        } else {
            $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '결제금액(A)', '결제수수료율(D2)', '결제수수료(D1)', '결제일', '환불금액(E1)', '환불완료일', '결제상태'
                , '직종', '상품구분', '상품상세구분', '상품코드', '상품명', '과정', '단강좌코드', '단강좌명', '과목', '교수명'
                , '안분율(B)', '안분매출(C)', '안분수수료(D)', '안분환불(E)', '정산율(G)', '정산금액(H)', '소득세(I)', '주민세(J)', '지급액'];
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel('강사료정산_주문목록리스트', $results, $headers);
    }

    /**
     * 강사료정산 과목/교수별 합계 조회조건 리턴
     * @param string $search_type [조회구분]
     * @param array $params [조회파라미터]
     * @param bool $is_show [조회페이지구분]
     * @return array
     */
    private function _getSumConditions($search_type, $params, $is_show = false)
    {
        $arr_condition = [];
        $search_prof_idx = get_var(element('search_prof_idx', $params), element('prof_idx', $params));
        $search_subject_idx = get_var(element('search_subject_idx', $params), element('subject_idx', $params));
        $search_study_period = get_var(element('search_study_period', $params), element('study_period', $params));

        switch ($search_type) {
            case 'LE' :
            case 'OL' :
                // 단강좌, 사용자패키지, 운영자일반형패키지, 단과반, 종합반일반형
                $arr_condition = [
                    'EQ' => [
                        'O.SiteCode' => element('search_site_code', $params),
                        'PD.ProfIdx' => $search_prof_idx,
                    ]
                ];
                if ($is_show === true) {
                    $arr_condition['ORG1']['EQ'] = [
                        'PL.SubjectIdx' => $search_subject_idx,
                        'SPL.SubjectIdx' => $search_subject_idx
                    ];
                }
                break;
            case 'AC' :
            case 'OP' :
                // 운영자선택형패키지, 종합반선택형
                $arr_condition = [
                    'EQ' => [
                        'O.SiteCode' => element('search_site_code', $params),
                        'SPD.ProfIdx' => $search_prof_idx,
                        'SPL.SubjectIdx' => $search_subject_idx
                    ]
                ];
                break;
            case 'PP' :
                // 기간제패키지
                $arr_condition = [
                    'EQ' => [
                        'O.SiteCode' => element('search_site_code', $params),
                        'OPP.ProfIdx' => $search_prof_idx,
                        'OPP.SubjectIdx' => $search_subject_idx,
                        'PL.StudyPeriod' => $search_study_period
                    ]
                ];
                break;
        }

        return $arr_condition;
    }

    /**
     * 강사료정산 주문목록 상세 조회조건 리턴
     * @param $search_type
     * @param $params
     * @return array
     */
    private function _getOrderListConditions($search_type, $params)
    {
        $arr_condition = [
            'EQ' => [
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'OP.SalePatternCcd' => $this->_reqP('search_sale_pattern_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
            ],
            'LKR' => [
                'PC.CateCode' => $this->_reqP('search_cate_code')
            ],
            'ORG2' => [
                'EQ' => [
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'P.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ]
        ];

        return $arr_condition;
    }

    /**
     * 강사료정산 과목/교수별 합계 데이터 전체합계
     * @param array $data
     * @return mixed
     */
    private function _getTotalSum($data)
    {
        $sum_data['tRealPayPrice'] = array_sum(array_pluck($data, 'tRealPayPrice'));
        $sum_data['tPgFeePrice'] = array_sum(array_pluck($data, 'tPgFeePrice'));
        $sum_data['tRefundPrice'] = array_sum(array_pluck($data, 'tRefundPrice'));
        $sum_data['tDivisionPayPrice'] = array_sum(array_pluck($data, 'tDivisionPayPrice'));
        $sum_data['tDivisionPgFeePrice'] = array_sum(array_pluck($data, 'tDivisionPgFeePrice'));
        $sum_data['tDivisionRefundPrice'] = array_sum(array_pluck($data, 'tDivisionRefundPrice'));
        $sum_data['tDivisionMonthPrice'] = array_sum(array_pluck($data, 'tDivisionMonthPrice'));  // 기간제패키지 월안분금액
        $sum_data['tDivisionCalcPrice'] = array_sum(array_pluck($data, 'tDivisionCalcPrice'));
        $sum_data['tDivisionIncomeTax'] = array_sum(array_pluck($data, 'tDivisionIncomeTax'));
        $sum_data['tDivisionResidentTax'] = array_sum(array_pluck($data, 'tDivisionResidentTax'));
        $sum_data['tFinalCalcPrice'] = array_sum(array_pluck($data, 'tFinalCalcPrice'));

        return $sum_data;
    }
}
