<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeptStats extends \app\controllers\BaseController
{
    protected $models = array('pay/misStatsOrder');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값
    private $_lg_group_name;    // 대분류명

    public function __construct()
    {
        parent::__construct();

        $this->_lg_group_name = $this->misStatsOrderModel->_lg_group_name;
    }

    /**
     * 경영정보 매출현황 조회 인덱스
     */
    protected function index()
    {
        $dept_code = get_var($this->_req('dept'), 'all');

        $this->load->view('business/mis/dept_stats_index', [
            'dept_code' => $dept_code
        ]);
    }

    /**
     * 경영정보 매출현황 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $search_dept_code = get_var($this->_reqP('search_dept_code'), 'all');
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        $count = 0;
        $list = [];
        $sum_data = null;
        $cht_data = $this->_getChartData($search_dept_code);

        if (empty($search_dept_code) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $list = $this->misStatsOrderModel->listDeptStats($search_dept_code, $search_start_date, $search_end_date);

            if (empty($list) === false) {
                $count = count($list);
                if ($search_dept_code != 'all') {
                    $sum_data = $this->_getTotalSum($list);
                }
                $cht_data = $this->_getChartData($search_dept_code, $list);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data,
            'cht_data' => $cht_data
        ]);
    }

    /**
     * 경영정보 매출현황 목록 엑셀다운로드
     */
    protected function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_dept_code = $this->_reqP('search_dept_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_dept_code) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 매출현황 조회
        $column = ($search_dept_code == 'all' ? 'LgGroupName, MdGroupName' : 'MdGroupName, SmGroupName') . ', RealPayPrice, RefundPrice, RemainPrice';
        $data = $this->misStatsOrderModel->listDeptStats($search_dept_code, $search_start_date, $search_end_date, $column);
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        if ($search_dept_code != 'all') {
            $data[] = array_merge(['합계', ''], $this->_getTotalSum($data));
        }

        // export excel
        $dept_name = array_get($this->_lg_group_name, $search_dept_code, '교육사업부');
        $file_name = '경영정보매출현황_' . $dept_name . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        try {
            $price_format = '#,##0';
            $head_color = 'dddddd';
            $s_sum_color = 'fcf8e3';
            $t_sum_color = 'd9edf7';
            $head_title = $dept_name . '(' . $search_start_date . '~' . $search_end_date . ')';
            $headers = ['대분류', '중분류', '결제', '환불', '매출'];

            // 대분류 merge 기준
            $merge_key_column = $search_dept_code == 'all' ? 'LgGroupName' : 'MdGroupName';
            $arr_merge_cnt = array_count_values(array_pluck($data, $merge_key_column));

            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
            $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
            $spreadsheet->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $spreadsheet->getDefaultStyle()->getNumberFormat()->setFormatCode($price_format);

            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle($head_title);
            $sheet->getDefaultColumnDimension()->setWidth('20');
            $sheet->getDefaultRowDimension()->setRowHeight('18');

            // head title
            $sheet->setCellValue('A1', $head_title)->mergeCells('A1:E1')->getRowDimension('1')->setRowHeight(28);
            $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(14);

            // header
            $sheet->fromArray($headers, null, 'A2');
            $sheet->getStyle('A2:E2')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($head_color);
            $sheet->getStyle('A2:E2')->getFont()->setBold(true);

            // data
            $start_row_num = 3;
            $sheet->fromArray($data, null, 'A' . $start_row_num);
            $last_row_num = $sheet->getHighestRow();

            // 대분류 merge
            $merge_start_num = $start_row_num;
            foreach ($arr_merge_cnt as $merge_key => $merge_cnt) {
                $merge_end_num = $merge_start_num + $merge_cnt - 1;
                $sheet->mergeCells('A' . $merge_start_num . ':A' . $merge_end_num);

                // 소계 row fill color and bold
                if ($search_dept_code == 'all') {
                    $sheet->getStyle('B' . $merge_end_num . ':E' . $merge_end_num)->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($s_sum_color);
                    $sheet->getStyle('B' . $merge_end_num . ':E' . $merge_end_num)->getFont()->setBold(true);
                }

                $merge_start_num = $merge_end_num + 1;
            }

            // 합계 row fill color and bold
            $sheet->getStyle('A' . $last_row_num . ':E' . $last_row_num)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($t_sum_color);
            $sheet->getStyle('A' . $last_row_num . ':E' . $last_row_num)->getFont()->setBold(true);

            // border
            $sheet->getStyle('A1:E' . $last_row_num)->getBorders()->getAllBorders()
                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

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

    /**
     * 경영정보 매출현황 결과값 합계
     * @param array $data
     * @return array
     */
    private function _getTotalSum($data)
    {
        $sum_data['tRealPayPrice'] = array_sum(array_pluck($data, 'RealPayPrice'));
        $sum_data['tRefundPrice'] = array_sum(array_pluck($data, 'RefundPrice'));
        $sum_data['tRemainPrice'] = array_sum(array_pluck($data, 'RemainPrice'));

        return $sum_data;
    }

    /**
     * 경영정보 매출현황 결과값 차트 데이터 리턴
     * @param string $dept_code
     * @param null|array $data
     * @return array
     */
    private function _getChartData($dept_code, $data = null)
    {
        // 차트 데이터 생성
        $arr_label = [];
        $arr_price = [];

        if ($dept_code == 'all') {
            if (empty($data) === true) {
                // 초기값
                foreach ($this->_lg_group_name as $code => $label) {
                    $arr_label[0][] = ['lg_code' => $code, 'label_name' => $label];
                    $arr_price[0][] = 0;
                }
            } else {
                // 대분류
                $lg_data = array_filter($data, function ($row) {
                    // 소계, 합계 데이터만 추출
                    return $row['MdGroupCode'] == '_MDT';
                });
                $lg_data = array_pluck($lg_data, 'RemainPrice', 'LgGroupCode');

                foreach ($this->_lg_group_name as $code => $label) {
                    $arr_label[0][] = ['lg_code' => $code, 'label_name' => $label];
                    $arr_price[0][] = array_get($lg_data, $code, 0);
                }

                // 중분류
                foreach ($data as $row) {
                    if ($row['LgGroupCode'] != '_LGT' && $row['MdGroupCode'] != '_MDT') {
                        $arr_label[1][$row['LgGroupCode']][] = ['label_name' => str_replace(['[', ']', ' '], '', $row['MdGroupName'])];
                        $arr_price[1][$row['LgGroupCode']][] = $row['RemainPrice'];
                    }
                }
            }
        } else {
            if (empty($data) === false) {
                // 소분류
                foreach ($data as $row) {
                    $label = $row['MdGroupName'] . '::' . $row['SmGroupName'];
                    $label = str_replace('::', ' > ', str_replace(['통합 ', '교재::', '::N잡', '::미분류', '미분류', '[', ']', ' '], '', $label));
                    $arr_label[0][] = ['label_name' => $label];
                    $arr_price[0][] = $row['RemainPrice'];
                }
            }
        }
        
        return [
            'labels' => json_encode($arr_label, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
            'data' => $arr_price,
            'total' => isset($arr_price[0]) === true ? array_sum($arr_price[0]) : 0
        ];
    }
}
