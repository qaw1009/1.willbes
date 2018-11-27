<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel
{
    /**
     * 엑셀 데이터 리턴
     * @param $file_path
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function readExcel($file_path)
    {
        $inputFileType = IOFactory::identify($file_path);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($file_path);

        // pRow : start number, pNumRows : remove count
        $spreadsheet->getActiveSheet()->removeRow(1, 1);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        return $sheetData;
    }

    /**
     * export 엑셀 파일
     * @param string $file_name [확장자를 제외한 파일명]
     * @param array $data [데이터 배열]
     * @param array $headers [헤드 타이틀 배열]
     * @return bool
     */
    public function exportExcel($file_name, $data = [], $headers = [])
    {
        try {
            // 헤더와 데이터 배열 merge
            empty($headers) === false && $data = array_merge([$headers], $data);

            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            // set sheet name
            $sheet->setTitle($file_name);
            // put data
            $sheet->fromArray($data, null, 'A1');
            // set auto size
            foreach (range('A', $sheet->getHighestDataColumn()) as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }

            // export
            $writer = IOFactory::createWriter($spreadsheet, 'Xls');

            ob_end_clean();
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . iconv('UTF-8','EUC-KR',$file_name).'.xls"');
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: private, no-transform, no-store, must-revalidate');

            $writer->save('php://output');
        } catch (\Exception $e) {
            logger($e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage(), ['file_name' => $file_name], 'error');
            return false;
        }
        return true;
    }
}