<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffLectureHL extends \app\controllers\BaseController
{
    protected $models = array('pay/hanlimCalc', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code', 'sys/excelDownLog');
    protected $helpers = array();
    private $_group_ccd = array();
    private $_target_site_code = array();       // 학원사이트코드
    private $_memory_limit_size = '512M';       // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->hanlimCalcModel->_group_ccd;
        $this->_target_site_code = get_auth_on_off_site_codes('Y', true);
    }

    /**
     * 한림전용 학원 강사료정산 인덱스
     */
    public function index()
    {
        // 경찰, 공무원학원 사이트코드 제외
        $arr_site_code = array_filter($this->_target_site_code, function($key) {
            return !in_array($key, ['2002', '2004']);
        }, ARRAY_FILTER_USE_KEY);

        // 디폴트 사이트코드
        $def_site_code = key($arr_site_code);

        // 상품 구분
        $prod_type = get_var($this->_reqG('prod_type'), 'OL');

        // 1차 카테고리 조회
        $arr_lg_category = $this->categoryModel->getCategoryArray('', '', '', 1);
        
        // 교수 조회
        $arr_professor = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view('business/calc/hanlim_index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'prod_type' => $prod_type,
            'arr_lg_category' => $arr_lg_category,
            'arr_professor' => $arr_professor,
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 한림전용 학원 강사료정산 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_site_code = $this->_reqP('search_site_code');
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_prod_type = $this->_reqP('prod_type');
        $arr_condition = $this->_getListConditions($search_site_code);
        $count = 0;
        $list = [];

        if (empty($search_site_code) === false && empty($search_date_type) === false && empty($search_start_date) === false && empty($search_end_date) === false && empty($search_prod_type) === false && empty($arr_condition) === false) {
            $order_by = $this->_getListOrderBy();
            $list = $this->hanlimCalcModel->listCalcHist($search_date_type, $search_start_date, $search_end_date, $search_prod_type, $search_site_code, false, $arr_condition, null, null, $order_by);
            $count = count($list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 한림전용 학원 강사료정산 조회조건 리턴
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
                'P.SiteCode' => $arr_site_code,             // 학원 사이트 권한 추가
                'PL.CampusCcd' => $arr_site_campus_ccd,     // 학원 캠퍼스 권한 추가
            ],
            'EQ' => [
                'TA.ProfIdx' => $this->_reqP('search_prof_idx'),
                'PL.CampusCcd' => $this->_reqP('search_campus_ccd')
            ],
            'LKR' => [
                'PC.CateCode' => $this->_req('search_lg_cate_code')
            ],
            'ORG' => [
                'EQ' => [
                    'TA.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ]
            ]
        ];
    }

    /**
     * 한림전용 학원 강사료정산 정렬기준 리턴
     * @param bool $is_excel
     * @return array
     */
    private function _getListOrderBy($is_excel = false)
    {
        $sd_prefix = $is_excel === false ? 'PL.' : '';
        $ta_prefix = $is_excel === false ? 'TA.' : '';

        return [$sd_prefix . 'StudyStartDate' => 'desc', $ta_prefix . 'ProfIdx' => 'asc', $ta_prefix . 'ProdCode' => 'asc'];
    }

    /**
     * 학원 강사료정산 엑셀다운로드
     */
    public function excel()
    {
        $search_site_code = $this->_reqP('search_site_code');
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_prod_type = $this->_reqP('prod_type');
        $arr_condition = $this->_getListConditions($search_site_code);

        if (empty($search_site_code) === true || empty($search_date_type) === true || empty($search_start_date) === true || empty($search_end_date) === true || empty($search_prod_type) === true || empty($arr_condition) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 정산 데이터 조회
        $order_by = $this->_getListOrderBy(true);
        $results = $this->hanlimCalcModel->listCalcHist($search_date_type, $search_start_date, $search_end_date, $search_prod_type, $search_site_code, 'excel', $arr_condition, null, null, $order_by);

        // 엑셀 설정
        $last_query = $this->hanlimCalcModel->getLastQuery();
        $file_name = '한림전용_학원강사료정산_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        if ($search_prod_type == 'CP') {
            $headers = ['정산일자', '강사명', '대분류', '캠퍼스', '상품코드', '단과반명', '개강일', '종강일', '횟수', '수강인원'
                , '수수료공제전수강총액', '수수료공제후수강총액', '추가공제액', '강사료정산대상금액', '강사료비율', '강사료', '원천세', '기타추가공제액', '강사료지급액'];
        } else {
            $headers = ['정산일자', '강사명', '대분류', '캠퍼스', '상품코드', '단과반명', '개강일', '종강일', '횟수', '단과반수강인원', '종합반수강인원', '총수강인원'
                , '수수료공제전수강총액', '수수료공제후수강총액', '추가공제액', '강사료정산대상금액', '단과반강사료비율', '종합반강사료비율', '강사료', '원천세', '기타추가공제액', '강사료지급액'];
        }

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
     * 한림전용 학원 강사료정산 상세보기
     * @param array $params [전달파라미터 (교수식별자/상품코드/강사료정산이력식별자)
     */
    public function show($params = [])
    {
        $prof_idx = element('0', $params);
        $prod_code = element('1', $params);
        $prod_type = element('2', $params);
        $pch_idx = element('3', $params);

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($prod_type) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 정산 이력 조회
        $data = $this->hanlimCalcModel->findCalcHist($prof_idx, $prod_code, $prod_type, $pch_idx);

        // 정산이력 여부
        $is_calc_hist = empty($data['PchIdx']) === false ? true : false;

        // 공제내역 조회
        if ($is_calc_hist === true) {
            $deduct_data = $this->hanlimCalcModel->getCalcDeduct($data['PchIdx']);
            $data['DeductData'] = element('N', $deduct_data);
            $data['EtcDeductData'] = element('E', $deduct_data);
        }

        // 정산대상 주문조회
        $order_data = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type);

        // 정산대상 주문 합계금액 조회
        $sum_data = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type, true);

        // 정산대상 기준 결제일시 (최종 결제일시)
        $base_datm = array_get($order_data, '0.CompleteDatm');

        $this->load->view('business/calc/hanlim_show', [
            'data' => $data,
            'order_data' => $order_data,
            'sum_data' => $sum_data,
            'prof_idx' => $prof_idx,
            'prod_code' => $prod_code,
            'prod_type' => $prod_type,
            'pch_idx' => $pch_idx,
            'base_datm' => $base_datm,
            'is_calc_hist' => $is_calc_hist
        ]);
    }

    /**
     * 한림전용 학원 강사료정산 주문목록 엑셀다운로드
     */
    public function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 필수 파라미터
        $prof_idx = $this->_reqP('prof_idx');
        $prod_code = $this->_reqP('prod_code');
        $prod_type = $this->_reqP('prod_type');
        $base_datm = $this->_reqP('base_datm');

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($prod_type) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        if (empty($base_datm) === true) {
            show_alert('정산대상이 없습니다.', 'back');
        }

        // 정산대상 주문조회
        $results = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type, false, true, $base_datm);
        $last_query = $this->hanlimCalcModel->getLastQuery();

        if ($prod_type == 'OL') {
            // 정산대상 합계조회
            $sum_data = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type, true, false, $base_datm);

            // 정산대상 합계추가
            $results[] = [
                'OrderNo' => '합계', 'CompleteDatm' => '', 'MemName' => '', 'MemId' => '', 'MemPhone' => '', 'PreCardPrice' => $sum_data['tPreCardPrice'], 'PreCashPrice' => $sum_data['tPreCashPrice'],
                'PreBankPrice' => $sum_data['tPreBankPrice'], 'PreVBankPrice' => $sum_data['tPreVBankPrice'], 'PayRouteCcdName' => '', 'PgFee' => '', 'DivisionPgFeePrice' => $sum_data['tPgFeePrice'],
                'DivisionRefundPrice' => '', 'RefundDatm' => '', 'RemainPrice' => $sum_data['tRemainPrice'], 'LearnPatternCcdName' => '', 'PackTypeCcdName' => '', 'ProdName' => '',
                'OrderMemo' => '', 'DiscRateUnit' => '', 'Remark' => ''
            ];
        }

        // 엑셀 설정
        $file_name = '한림전용_학원강사료정산_주문목록_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        if ($prod_type == 'CP') {
            $headers = ['주문번호', '결제일', '회원명', '회원아이디', '연락처', '신용카드', '현금', '실시간계좌이체', '무통장입금', '결제루트', '결제수수료율', '결제수수료'
                , '환불금액', '환불완료일', '합계', '종합반수강번호', '종합반명', '비고', '추가할인'];
        } else {
            $headers = ['주문번호', '결제일', '회원명', '회원아이디', '연락처', '신용카드', '현금', '실시간계좌이체', '무통장입금', '결제루트', '결제수수료율', '결제수수료'
                , '환불금액', '환불완료일', '합계', '상품구분', '종합반구분', '종합반명', '비고', '추가할인', '세트할인'];
        }

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
     * 한림전용 학원 강사료정산 이력 저장
     * @return CI_Output|null
     */
    public function store()
    {
        $rules = [
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_type', 'label' => '상품구분', 'rules' => 'trim|required|in_list[OL,CP]'],
            ['field' => 'base_datm', 'label' => '기준일시', 'rules' => 'trim|required'],
            ['field' => 'mem_cnt', 'label' => '수강생수', 'rules' => 'trim|required|integer'],
            ['field' => 'pre_price', 'label' => '수수료공제전수강총액', 'rules' => 'trim|required'],
            ['field' => 'lec_remain_price', 'label' => '단과반수수료공제후수강총액', 'rules' => 'trim|required'],
            ['field' => 'pack_remain_price', 'label' => '종합반수수료공제후수강총액', 'rules' => 'trim|required'],
            ['field' => 'lec_deduct_price', 'label' => '단과반추가공제액', 'rules' => 'trim|required|integer'],
            ['field' => 'pack_deduct_price', 'label' => '종합반추가공제액', 'rules' => 'trim|required|integer'],
            ['field' => 'lec_target_price', 'label' => '단과반강사료산정대상금액', 'rules' => 'trim|required|integer'],
            ['field' => 'pack_target_price', 'label' => '종합반강사료산정대상금액', 'rules' => 'trim|required|integer'],
            ['field' => 'lec_calc_rate', 'label' => '단과반강사료비율', 'rules' => 'trim|required'],
            ['field' => 'pack_calc_rate', 'label' => '종합반강사료비율', 'rules' => 'trim|required'],
            ['field' => 'lec_calc_price', 'label' => '단과반정산기준계산금액', 'rules' => 'trim|required|integer'],
            ['field' => 'pack_calc_price', 'label' => '종합반정산기준계산금액', 'rules' => 'trim|required|integer'],
            ['field' => 'tax_rate', 'label' => '원천세율', 'rules' => 'trim|required|numeric'],
            ['field' => 'tax_price', 'label' => '원천세', 'rules' => 'trim|required'],
            ['field' => 'etc_deduct_price', 'label' => '기타추가공제액', 'rules' => 'trim|required|integer'],
            ['field' => 'final_calc_price', 'label' => '강사료지급액', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        if (strip_comma($this->_reqP('pre_price')) < 1) {
            return $this->json_error('수수료공제전수강총액은 0원보다 커야 합니다.', _HTTP_VALIDATION_ERROR);
        }

        if ($this->_reqP('prod_type') == 'CP' && strip_comma($this->_reqP('pack_remain_price')) < 1) {
            return $this->json_error('수수료공제후수강총액은 0원보다 커야 합니다.', _HTTP_VALIDATION_ERROR);
        }

        $result = $this->hanlimCalcModel->addCalcHist($this->_reqP(null, false));

        return $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 한림전용 학원 강사료정산 산출 데이터 엑셀다운로드
     */
    public function calcExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 필수 파라미터
        $prof_idx = $this->_reqP('prof_idx');
        $prod_code = $this->_reqP('prod_code');
        $prod_type = $this->_reqP('prod_type');
        $pch_idx = $this->_reqP('pch_idx');

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($prod_type) === true || empty($pch_idx) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 정산 이력 조회
        $data = $this->hanlimCalcModel->findCalcHist($prof_idx, $prod_code, $prod_type, $pch_idx);
        if (empty($data) === true) {
            show_alert('강사료정산 이력 데이터가 없습니다.', 'back');
        }
        $last_query = $this->hanlimCalcModel->getLastQuery();   // 엑셀다운로드 로그 데이터

        // 정산대상 주문조회
        $order_data = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type, false, false, $data['BaseDatm']);
        if (empty($order_data) === true) {
            show_alert('강사료정산 주문 데이터가 없습니다.', 'back');
        }

        // 공제내역 조회
        $deduct_data = $this->hanlimCalcModel->getCalcDeduct($data['PchIdx']);
        $data['DeductData'] = element('N', $deduct_data, []);
        $data['EtcDeductData'] = element('E', $deduct_data, []);

        // export excel
        $file_name = '한림전용_학원강사료정산_강사료산출_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        try {
            $price_format = '#,##0';
            $gray_color = 'EFEFEF';
            $red_color = 'FF0000';
            $order_cnt = count($order_data);
            $deduct_cnt = count($data['DeductData']);
            $etc_deduct_cnt = count($data['EtcDeductData']);
            $arr_calc_type = ['R' => '비율(%)', 'T' => '시급(원)', 'P' => '월정액(원)'];
            $last_col = $prod_type == 'CP' ? 'R' : 'S';

            // style
            $style_bg_gray = ['fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => $gray_color]]];
            $style_red = ['font' => ['color' => ['rgb' => $red_color]]];
            $style_bold = ['font' => ['bold' => true]];
            $style_left = ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]];
            $style_middle = ['alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER]];
            $style_border = ['borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];

            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
            $spreadsheet->getDefaultStyle()->getFont()->setSize(10);

            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('강사료');
            $sheet->getDefaultColumnDimension()->setWidth('15');
            $sheet->getColumnDimension('A')->setWidth('20');
            $sheet->getColumnDimension('B')->setWidth('10');    // No
            $sheet->getColumnDimension('C')->setWidth('25');    // 주문번호
            $sheet->getColumnDimension('M')->setWidth('20');    // 환불완료일
            $sheet->getColumnDimension('P')->setWidth('30');    // 종합반명
            $sheet->getColumnDimension('Q')->setWidth('30');    // 비고
            $sheet->getColumnDimension('S')->setWidth('30');    // 세트할인

            // 강사명 ~ 수강생수
            $sheet->setCellValue('A1', '강사명')->setCellValue('B1', $data['wProfName'])->mergeCells('B1:' . $last_col . '1');
            $sheet->setCellValue('A2', '기간')->setCellValue('B2', $data['StudyStartDate'] . ' ~ ' . $data['StudyEndDate'])->mergeCells('B2:' . $last_col . '2');
            $sheet->setCellValue('A3', '횟수')->setCellValue('B3', $data['Amount'])->mergeCells('B3:' . $last_col . '3');
            $sheet->setCellValue('A4', '강의')->setCellValue('B4', $data['ProdName'])->mergeCells('B4:' . $last_col . '4');
            $cell_value = number_format($data['MemCnt']) . '명';
            if ($prod_type == 'OL') {
                $cell_value .= ' = 단과반 (' . number_format($data['LecMemCnt']) . '명) + 종합반 (' . number_format($data['PackMemCnt']) . '명)';
            }
            $sheet->setCellValue('A5', '수강생수')->setCellValue('B5', $cell_value)->mergeCells('B5:' . $last_col . '5');
            $sheet->getStyle('B1:' . $last_col . '5')->applyFromArray($style_bg_gray)->applyFromArray($style_left);

            // 수강내역 타이틀
            $merge_cell = 'A6:A' . ($order_cnt + 6 + 1);
            $sheet->setCellValue('A6', '수강내역')->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_middle);
            $sheet->setCellValue('B6', 'No')->mergeCells('B6:B7');
            $sheet->setCellValue('C6', '주문번호')->mergeCells('C6:C7');
            $sheet->setCellValue('D6', '결제일')->mergeCells('D6:D7');
            $sheet->setCellValue('E6', '회원명')->mergeCells('E6:E7');
            $sheet->setCellValue('F6', '연락처')->mergeCells('F6:F7');
            $sheet->setCellValue('G6', '결제금액(수강료)')->mergeCells('G6:N6');
            $sheet->setCellValue('G7', '신용카드');
            $sheet->setCellValue('H7', '현금');
            $sheet->setCellValue('I7', '실시간계좌이체');
            $sheet->setCellValue('J7', '무통장입금');
            $sheet->setCellValue('K7', '결제수수료');
            $sheet->setCellValue('L7', '환불금액');
            $sheet->setCellValue('M7', '환불완료일');
            $sheet->setCellValue('N7', '합계');
            $sheet->setCellValue('P6', '종합반명')->mergeCells('P6:P7');
            $sheet->setCellValue('Q6', '비고')->mergeCells('Q6:Q7');
            $sheet->setCellValue('R6', '추가할인')->mergeCells('R6:R7');

            if ($prod_type == 'CP') {
                $sheet->setCellValue('O6', '종합반수강번호')->mergeCells('O6:O7');
            } else {
                $sheet->setCellValue('O6', '상품구분')->mergeCells('O6:O7');
                $sheet->setCellValue('S6', '세트할인')->mergeCells('S6:S7');
            }

            $sheet->getStyle('B6:' . $last_col . '7')->applyFromArray($style_bg_gray)->applyFromArray($style_middle);

            // 수강내역 목록
            $sr_num = 8;
            $first_sr_num = $sr_num;
            $last_sr_num = $first_sr_num + $order_cnt - 1;
            $no = $order_cnt;

            foreach ($order_data as $idx => $row) {
                $sheet->setCellValue('B' . $sr_num, $no);
                $sheet->setCellValue('C' . $sr_num, $row['OrderNo']);
                $sheet->setCellValue('D' . $sr_num, substr($row['CompleteDatm'], 0, 10));
                $sheet->setCellValue('E' . $sr_num, $row['MemName']);
                $sheet->setCellValue('F' . $sr_num, $row['MemPhone']);
                $sheet->setCellValue('G' . $sr_num, $row['PreCardPrice']);
                $sheet->setCellValue('H' . $sr_num, $row['PreCashPrice']);
                $sheet->setCellValue('I' . $sr_num, $row['PreBankPrice']);
                $sheet->setCellValue('J' . $sr_num, $row['PreVBankPrice']);
                $sheet->setCellValue('K' . $sr_num, $row['DivisionPgFeePrice']);
                $sheet->setCellValue('L' . $sr_num, (empty($row['DivisionRefundPrice']) === false ? ($row['DivisionRefundPrice'] * -1) : ''));
                $sheet->setCellValue('M' . $sr_num, substr($row['RefundDatm'], 0, 16));
                $sheet->setCellValue('N' . $sr_num, $row['RemainPrice']);
                $sheet->setCellValue('P' . $sr_num, $row['ProdName']);
                $sheet->setCellValue('Q' . $sr_num, $row['OrderMemo']);
                $sheet->setCellValue('R' . $sr_num, $row['DiscRateUnit']);

                if ($prod_type == 'CP') {
                    $sheet->setCellValue('O' . $sr_num, $row['PackCertNo']);
                } else {
                    $sheet->setCellValue('O' . $sr_num, str_replace('[학원]', '', $row['LearnPatternCcdName']));
                    $sheet->setCellValue('S' . $sr_num, $row['Remark']);
                }

                if (empty($row['RefundDatm']) === false) {
                    $sheet->getStyle('B' . $sr_num . ':' . $last_col . $sr_num)->applyFromArray($style_red);
                }

                $no--;
                $sr_num = $sr_num + 1;
            }

            $sheet->getStyle('G' . $first_sr_num . ':L' . $last_sr_num)->getNumberFormat()->setFormatCode($price_format);
            $sheet->getStyle('N' . $first_sr_num . ':N' . $last_sr_num)->getNumberFormat()->setFormatCode($price_format);

            // 수수료공제전금액
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $cell_value = number_format($data['PrePrice']) . '원';
            $sheet->setCellValue('A' . $sr_num, '수수료공제전금액')->setCellValue('B' . $sr_num, $cell_value);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left);

            // 총합계금액
            $sr_num = $sr_num + 1;
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $cell_value = number_format($data['RemainPrice']) . '원';
            if ($prod_type == 'OL') {
                $cell_value .= ' = 단과반 (' . number_format($data['LecRemainPrice']) . '원) + 종합반 (' . number_format($data['PackRemainPrice']) . '원)';
            }
            $sheet->setCellValue('A' . $sr_num, '총합계금액')->setCellValue('B' . $sr_num, $cell_value);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left);

            // 추가공제액
            $sr_num = $sr_num + 1;
            if (empty($data['DeductData']) === false) {
                $merge_cell = 'A' . $sr_num . ':A' . ($sr_num + $deduct_cnt - 1);
                $sheet->setCellValue('A' . $sr_num, '추가공제액')->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_middle);

                foreach ($data['DeductData'] as $row) {
                    $merge_cell = 'B' . $sr_num . ':F' . $sr_num;
                    $sheet->setCellValue('B' . $sr_num, $row['DeductName'])->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
                    $sheet->setCellValue('G' . $sr_num, $row['DeductPrice'])->getStyle('G' . $sr_num)->applyFromArray($style_bg_gray)->getNumberFormat()->setFormatCode($price_format);
                    if ($prod_type == 'OL') {
                        $sheet->setCellValue('H' . $sr_num, ($row['DeductLecType'] == 'L' ? '단과반 공제' : '종합반 공제'))->getStyle('H' . $sr_num)->applyFromArray($style_bg_gray);
                    }
                    $sr_num = $sr_num + 1;
                }
            } else {
                $sheet->setCellValue('A' . $sr_num, '추가공제액');
                $merge_cell = 'B' . $sr_num . ':F' . $sr_num;
                $sheet->setCellValue('B' . $sr_num, '')->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
                $sheet->setCellValue('G' . $sr_num, '')->getStyle('G' . $sr_num)->applyFromArray($style_bg_gray);
                $sheet->setCellValue('H' . $sr_num, '')->getStyle('H' . $sr_num)->applyFromArray($style_bg_gray);
                $sr_num = $sr_num + 1;
            }

            // 대상금액
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $cell_value = number_format($data['TargetPrice']) . '원';
            $sheet->setCellValue('A' . $sr_num, '대상금액')->setCellValue('B' . $sr_num, $cell_value);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left);

            // 정산기준
            $sr_num = $sr_num + 1;
            $sheet->setCellValue('A' . $sr_num, '정산기준');

            if ($prod_type == 'CP') {
                $cell_value = $arr_calc_type[$data['PackCalcType']];
            } else {
                $merge_cell = 'A' . $sr_num . ':A' . ($sr_num + 1);
                $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_middle);

                $merge_cell = 'B' . $sr_num . ':C' . $sr_num;
                $cell_value = '단과반 : ' . $arr_calc_type[$data['LecCalcType']];
                $sheet->setCellValue('B' . $sr_num, $cell_value)->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
                $sheet->setCellValue('D' . $sr_num, $data['LecCalcRate'])->getStyle('D' . $sr_num)->applyFromArray($style_bg_gray)->getNumberFormat()->setFormatCode($price_format);

                $sr_num = $sr_num + 1;
                $cell_value = '종합반 : ' . $arr_calc_type[$data['PackCalcType']];
            }

            $merge_cell = 'B' . $sr_num . ':C' . $sr_num;
            $sheet->setCellValue('B' . $sr_num, $cell_value)->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
            $sheet->setCellValue('D' . $sr_num, $data['PackCalcRate'])->getStyle('D' . $sr_num)->applyFromArray($style_bg_gray)->getNumberFormat()->setFormatCode($price_format);

            // 정산기준 계산금액
            $sr_num = $sr_num + 1;
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $cell_value = number_format($data['CalcPrice']) . '원';
            if ($prod_type == 'OL') {
                $cell_value .= ' = 단과반 (' . number_format($data['LecCalcPrice']) . '원) + 종합반 (' . number_format($data['PackCalcPrice']) . '원)';
            }
            $sheet->setCellValue('A' . $sr_num, '정산기준 계산금액')->setCellValue('B' . $sr_num, $cell_value);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left);
            
            // 원천세
            $sr_num = $sr_num + 1;
            $sheet->setCellValue('A' . $sr_num, '원천세');
            $sheet->setCellValue('B' . $sr_num, $data['TaxRate'] . '%')->getStyle('B' . $sr_num)->applyFromArray($style_bg_gray);
            $sheet->setCellValue('C' . $sr_num, $data['TaxPrice'])->getStyle('C' . $sr_num)->applyFromArray($style_bg_gray)->getNumberFormat()->setFormatCode($price_format);

            // 기타추가공제액
            $sr_num = $sr_num + 1;
            if (empty($data['EtcDeductData']) === false) {
                $merge_cell = 'A' . $sr_num . ':A' . ($sr_num + $etc_deduct_cnt - 1);
                $sheet->setCellValue('A' . $sr_num, '기타추가공제액')->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_middle);

                foreach ($data['EtcDeductData'] as $row) {
                    $merge_cell = 'B' . $sr_num . ':F' . $sr_num;
                    $sheet->setCellValue('B' . $sr_num, $row['DeductName'])->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
                    $sheet->setCellValue('G' . $sr_num, $row['DeductPrice'])->getStyle('G' . $sr_num)->applyFromArray($style_bg_gray)->getNumberFormat()->setFormatCode($price_format);
                    $sheet->setCellValue('H' . $sr_num, '')->getStyle('H' . $sr_num)->applyFromArray($style_bg_gray);
                    $sr_num = $sr_num + 1;
                }
            } else {
                $sheet->setCellValue('A' . $sr_num, '기타추가공제액');
                $merge_cell = 'B' . $sr_num . ':F' . $sr_num;
                $sheet->setCellValue('B' . $sr_num, '')->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray);
                $sheet->setCellValue('G' . $sr_num, '')->getStyle('G' . $sr_num)->applyFromArray($style_bg_gray);
                $sheet->setCellValue('H' . $sr_num, '')->getStyle('H' . $sr_num)->applyFromArray($style_bg_gray);
                $sr_num = $sr_num + 1;
            }

            // 강사료지급액
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $cell_value = number_format($data['FinalCalcPrice']) . '원';
            $sheet->setCellValue('A' . $sr_num, '강사료지급액')->setCellValue('B' . $sr_num, $cell_value);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left);

            // 최근정산일자
            $sr_num = $sr_num + 1;
            $merge_cell = 'B' . $sr_num . ':' . $last_col . $sr_num;
            $sheet->setCellValue('A' . $sr_num, '최근정산일자')->setCellValue('B' . $sr_num, $data['RegDatm']);
            $sheet->mergeCells($merge_cell)->getStyle($merge_cell)->applyFromArray($style_bg_gray)->applyFromArray($style_left)->applyFromArray($style_red)->applyFromArray($style_bold);

            // border
            $sheet->getStyle('A1:' . $last_col . $sheet->getHighestRow())->applyFromArray($style_border);

            // download log
            $this->load->library('approval');
            if($this->approval->SysDownLog($last_query, $file_name, $order_cnt) !== true) {
                show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
            }

            ob_end_clean();
            header('Content-type: application/vnd.ms-excel'); // xls
            header('Content-Disposition: attachment; filename="' . iconv('UTF-8','EUC-KR', $file_name).'.xls"');
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: private, no-transform, no-store, must-revalidate');

            $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        } catch (\Exception $e) {
            logger($e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage() . ' => ' . $file_name, null, 'error');
            show_alert('강사료정산내역 엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
