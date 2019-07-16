<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffLectureSD extends \app\controllers\BaseController
{
    protected $models = array('pay/orderCalc', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code', 'sys/excelDownLog');
    protected $helpers = array();
    protected $_group_ccd = [];
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderCalcModel->_group_ccd;
    }

    /**
     * 학원 강사료정산 인덱스
     */
    public function index()
    {
        // 사이트탭 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);

        // 교수 조회
        $arr_professor = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view('business/calc/off_index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_professor' => $arr_professor,
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 학원 강사료정산 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_prof_idx = $this->_reqP('search_prof_idx');
        $search_study_date_type = $this->_reqP('search_study_date_type');
        $search_study_start_date = $this->_reqP('search_study_start_date');
        $search_study_end_date = $this->_reqP('search_study_end_date');
        $sum_type = 'sum';
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($search_prof_idx) === false && empty($search_study_start_date) === false && empty($search_study_end_date) === false) {
            // 정산 데이터 조회
            $arr_condition = ['EQ' => ['TA.SiteCode' => $this->_reqP('search_site_code'), 'TA.CampusCcd' => $this->_reqP('search_campus_ccd')]];
            $list = $this->orderCalcModel->listCalcOffLecture($search_prof_idx, $search_study_date_type, $search_study_start_date, $search_study_end_date, $sum_type, $arr_condition);
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
     * 학원 강사료정산 엑셀다운로드
     */
    public function excel()
    {
        $search_prof_idx = $this->_reqP('search_prof_idx');
        $search_study_date_type = $this->_reqP('search_study_date_type');
        $search_study_start_date = $this->_reqP('search_study_start_date');
        $search_study_end_date = $this->_reqP('search_study_end_date');
        $sum_type = 'sum';
        $sum_data = null;
        $results = [];

        if (empty($search_prof_idx) === true || empty($search_study_start_date) === true || empty($search_study_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 정산 데이터 조회
        $arr_condition = ['EQ' => ['TA.SiteCode' => $this->_reqP('search_site_code'), 'TA.CampusCcd' => $this->_reqP('search_campus_ccd')]];
        $list = $this->orderCalcModel->listCalcOffLecture($search_prof_idx, $search_study_date_type, $search_study_start_date, $search_study_end_date, $sum_type, $arr_condition);
        $sum_data = $this->_getTotalSum($list);

        // 엑셀 설정
        $last_query = $this->orderCalcModel->getLastQuery();
        $file_name = '학원강사료정산리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');
        $headers = ['교수명', '상품구분', '상품명', '캠퍼스', '단과반명', '개강일', '종강일', '인원', '매출금액(C)', '환불금액(D)', '결제수수료(E)', '순매출(F)'
            , '정산금액(H)', '소득세(I)', '주민세(J)', '지급액'];

        foreach ($list as $idx => $row) {
            $results[$idx]['wProfName'] = $row['wProfName'];
            $results[$idx]['LearnPatternCcdName'] = $row['LearnPatternCcdName'] . (empty($row['PackTypeCcdName']) === false ? '(' . $row['PackTypeCcdName'] . ')' : '');
            $results[$idx]['ProdName'] = empty($row['ProdName']) === false ? '[' . $row['ProdCode'] . '] ' . $row['ProdName'] : '';
            $results[$idx]['CampusCcdName'] = $row['CampusCcdName'];
            $results[$idx]['ProdNameSub'] = '[' . $row['ProdCodeSub'] . '] ' . $row['ProdNameSub'];
            $results[$idx]['StudyStartDate'] = $row['StudyStartDate'];
            $results[$idx]['StudyEndDate'] = $row['StudyEndDate'];
            $results[$idx]['tRemainPayCnt'] = $row['tRemainPayCnt'];
            $results[$idx]['tDivisionPayPrice'] = $row['tDivisionPayPrice'];
            $results[$idx]['tDivisionRefundPrice'] = $row['tDivisionRefundPrice'];
            $results[$idx]['tDivisionPgFeePrice'] = $row['tDivisionPgFeePrice'];
            $results[$idx]['tDivisionRemainPrice'] = $row['tDivisionRemainPrice'];
            $results[$idx]['tDivisionCalcPrice'] = $row['tDivisionCalcPrice'];
            $results[$idx]['tDivisionIncomeTax'] = $row['tDivisionIncomeTax'];
            $results[$idx]['tDivisionResidentTax'] = $row['tDivisionResidentTax'];
            $results[$idx]['tFinalCalcPrice'] = $row['tFinalCalcPrice'];
        }

        // 전체합계 추가
        $results[] = [
            'wProfName' => '합계', 'LearnPatternCcdName' => '', 'ProdName' => '', 'CampusCcdName' => '', 'ProdNameSub' => '', 'StudyStartDate' => '', 'StudyEndDate' => '',
            'tRemainPayCnt' => $sum_data['tRemainPayCnt'], 'tDivisionPayPrice' => $sum_data['tDivisionPayPrice'],
            'tDivisionRefundPrice' => $sum_data['tDivisionRefundPrice'], 'tDivisionPgFeePrice' => $sum_data['tDivisionPgFeePrice'],
            'tDivisionRemainPrice' => $sum_data['tDivisionRemainPrice'], 'tDivisionCalcPrice' => $sum_data['tDivisionCalcPrice'],
            'tDivisionIncomeTax' => $sum_data['tDivisionIncomeTax'], 'tDivisionResidentTax' => $sum_data['tDivisionResidentTax'], 'tFinalCalcPrice' => $sum_data['tFinalCalcPrice']
        ];

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 학원 강사료 정산 상세보기
     * @param array $params [사이트코드/교수식별자/개강,종강일구분/조회시작일/조회종료일/상품코드/단과반상품코드]
     */
    public function show($params = [])
    {
        // 필수 파라미터
        $arr_input = [
            'site_code' => element('0', $params), 'prof_idx' => element('1', $params), 'study_date_type' => element('2', $params),
            'study_start_date' => element('3', $params), 'study_end_date' => element('4', $params),
            'prod_code' => element('5', $params), 'prod_code_sub' => element('6', $params)
        ];

        if (empty($arr_input['prof_idx']) === true || empty($arr_input['site_code']) === true || empty($arr_input['study_date_type']) === true
            || empty($arr_input['study_start_date']) === true || empty($arr_input['study_end_date']) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 해당 상품 정산 데이터 조회
        $sum_type = 'sum';
        $arr_condition = ['EQ' => ['TA.SiteCode' => $arr_input['site_code'], 'TA.ProdCode' => $arr_input['prod_code'], 'TA.ProdCodeSub' => $arr_input['prod_code_sub']]];
        $data = $this->orderCalcModel->listCalcOffLecture($arr_input['prof_idx'], $arr_input['study_date_type'], $arr_input['study_start_date'], $arr_input['study_end_date'], $sum_type, $arr_condition);
        $count = count($data);

        if ($count < 1) {
            show_alert('정산 데이터가 없습니다.', 'back');
        } else {
            // 조회 건수가 1보다 크다면 해당 교수 전체 정산 데이터 합산
            $data = $count > 1 ? array_merge(['wProfName' => array_get($data, '0.wProfName')], $this->_getTotalSum($data)) : element('0', $data, []);
        }

        // 주문목록 조회 검색 필드 공통코드 조회
        // 1차 카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray($arr_input['site_code'], '', '', 1);

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus', 'LearnPattern']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 0원결제, 제휴사결제, 온라인0원결제, 관리자유료결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$this->_group_ccd['PayRoute']], array_filter_keys($this->orderCalcModel->_pay_route_ccd, ['pg', 'visit', 'zero', 'alliance', 'on_zero', 'admin_pay', 'on_zero']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderCalcModel->_pay_status_ccd, ['paid', 'refund']));

        // 학습형태 공통코드에서 학원강좌 코드만 필터링
        $arr_learn_pattern_ccd = array_filter_keys($codes[$this->_group_ccd['LearnPattern']], array_filter_keys($this->orderCalcModel->_learn_pattern_ccd, ['off_lecture', 'off_pack_lecture']));

        $this->load->view('business/calc/off_show', [
            'arr_input' => $arr_input,
            'arr_category' => $arr_category,
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $arr_pay_route_ccd,
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_learn_pattern_ccd' => $arr_learn_pattern_ccd,
            'data' => $data
        ]);
    }

    /**
     * 학원 강사료정산 주문목록 조회
     * @return CI_Output
     */
    public function orderListAjax()
    {
        // 필수 파라미터
        $arr_input = $this->_reqP(null);
        $list = [];
        $sum_data = null;

        if (empty($arr_input['prof_idx']) === true || empty($arr_input['site_code']) === true || empty($arr_input['study_date_type']) === true
            || empty($arr_input['study_start_date']) === true || empty($arr_input['study_end_date']) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 주문목록 조회
        $arr_condition = ['EQ' => ['TA.SiteCode' => $arr_input['site_code'], 'TA.ProdCode' => $arr_input['prod_code'], 'TA.ProdCodeSub' => $arr_input['prod_code_sub']]];
        $arr_condition = array_merge_recursive($arr_condition, $this->_getOrderListConditions());

        $count = $this->orderCalcModel->listCalcOffLecture($arr_input['prof_idx'], $arr_input['study_date_type'], $arr_input['study_start_date'], $arr_input['study_end_date'], true, $arr_condition);

        if ($count > 0) {
            $list = $this->orderCalcModel->listCalcOffLecture($arr_input['prof_idx'], $arr_input['study_date_type'], $arr_input['study_start_date'], $arr_input['study_end_date'], false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

            // 주문목록 정산금액 합계
            $sum_data = $this->orderCalcModel->listCalcOffLecture($arr_input['prof_idx'], $arr_input['study_date_type'], $arr_input['study_start_date'], $arr_input['study_end_date'], 'tSum', $arr_condition);
            $sum_data = element('0', $sum_data);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 학원 강사료정산 주문목록 엑셀다운로드
     */
    public function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 필수 파라미터
        $arr_input = $this->_reqP(null);

        if (empty($arr_input['prof_idx']) === true || empty($arr_input['site_code']) === true || empty($arr_input['study_date_type']) === true
            || empty($arr_input['study_start_date']) === true || empty($arr_input['study_end_date']) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 주문목록 조회
        $arr_condition = ['EQ' => ['TA.SiteCode' => $arr_input['site_code'], 'TA.ProdCode' => $arr_input['prod_code'], 'TA.ProdCodeSub' => $arr_input['prod_code_sub']]];
        $arr_condition = array_merge_recursive($arr_condition, $this->_getOrderListConditions());
        $results = $this->orderCalcModel->listCalcOffLecture($arr_input['prof_idx'], $arr_input['study_date_type'], $arr_input['study_start_date'], $arr_input['study_end_date'], 'excel', $arr_condition);

        // 엑셀 설정
        $last_query = $this->orderCalcModel->getLastQuery();
        $file_name = '학원강사료정산상세리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');
        $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '결제금액(A)', '결제일', '환불금액(D1)', '환불완료일', '결제수수료율(E2)', '결제수수료(E1)', '결제상태'
            , '직종', '상품구분', '상품상세구분', '상품코드', '상품명', '과정', '단과반코드', '단과반명', '과목', '교수명'
            , '안분율(B)', '안분매출(C)', '안분환불(D)', '안분수수료(E)', '순매출(F)', '정산율(G)', '정산금액(H)'];

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 학원 강사료정산 주문목록 조회조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'TA.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd')
            ],
            'LKR' => [
                'PC.CateCode' => $this->_reqP('search_cate_code')
            ],
            'ORG' => [
                'EQ' => [
                    'O.OrderIdx' => $this->_reqP('search_prod_value'),
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'TA.ProdCode' => $this->_reqP('search_prod_value'),
                    'TA.ProdCodeSub' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'TA.ProdName' => $this->_reqP('search_prod_value'),
                    'TA.ProdNameSub' => $this->_reqP('search_prod_value')
                ]
            ]
        ];

        // 결제일/환불일
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            switch ($this->_reqP('search_date_type')) {
                case 'paid' :
                    $arr_condition['BDT'] = ['O.CompleteDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
                    break;
                case 'refund' :
                    $arr_condition['BDT'] = ['OPR.RefundDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
                    break;
            }
        }

        return $arr_condition;
    }

    /**
     * 학원강사료 정산금액 전체합계
     * @param array $data
     * @return mixed
     */
    private function _getTotalSum($data)
    {
        $sum_data['tRemainPayCnt'] = array_sum(array_pluck($data, 'tRemainPayCnt'));
        $sum_data['tDivisionPayPrice'] = array_sum(array_pluck($data, 'tDivisionPayPrice'));
        $sum_data['tDivisionPgFeePrice'] = array_sum(array_pluck($data, 'tDivisionPgFeePrice'));
        $sum_data['tDivisionRefundPrice'] = array_sum(array_pluck($data, 'tDivisionRefundPrice'));
        $sum_data['tDivisionRemainPrice'] = array_sum(array_pluck($data, 'tDivisionRemainPrice'));
        $sum_data['tDivisionCalcPrice'] = array_sum(array_pluck($data, 'tDivisionCalcPrice'));
        $sum_data['tDivisionIncomeTax'] = array_sum(array_pluck($data, 'tDivisionIncomeTax'));
        $sum_data['tDivisionResidentTax'] = array_sum(array_pluck($data, 'tDivisionResidentTax'));
        $sum_data['tFinalCalcPrice'] = array_sum(array_pluck($data, 'tFinalCalcPrice'));

        return $sum_data;
    }
}
