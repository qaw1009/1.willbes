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
            ob_end_clean();
            header('Content-type: application/vnd.ms-excel'); // xls
            //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');  // xlsx
            header('Content-Disposition: attachment; filename="' . iconv('UTF-8','EUC-KR', $file_name).'.xls"');
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: private, no-transform, no-store, must-revalidate');

            $writer = IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        } catch (\Exception $e) {
            logger($e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage(), ['file_name' => $file_name], 'error');
            return false;
        }
        return true;
    }

    /**
     * export 대용량 엑셀파일 by box/spout library
     * @param string $file_name [확장자를 제외한 파일명]
     * @param array $data [데이터 배열]
     * @param array $headers [헤드 타이틀 배열]
     * @param array $numerics [문자열 값을 숫자 값으로 변환할 대상 컬럼명 배열]
     * @return bool
     */
    public function exportHugeExcel($file_name, $data = [], $headers = [], $numerics = [])
    {
        try {
            $writer = Box\Spout\Writer\WriterFactory::create(Box\Spout\Common\Type::XLSX);
            //$writer->setTempFolder(STORAGEPATH . 'tmp/');
            //$writer->openToFile('php://output');
            $writer->openToBrowser($file_name . '.xlsx');
            $writer->addRow($headers);

            foreach ($data as $idx => $row) {
                // convert numeric to string
                if (empty($numerics) === false) {
                    foreach ($numerics as $column) {
                        if (isset($row[$column]) === true && is_null($row[$column]) === false) {
                            $row[$column] = $row[$column] + 0;
                        }
                    }
                }

                $writer->addRow($row);

                ob_flush();
                flush();
            }

            ob_end_clean();
            /* output download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . iconv('UTF-8','EUC-KR', $file_name).'.xlsx"');
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: private, no-transform, no-store, must-revalidate');*/

            $writer->close();
        } catch (\Exception $e) {
            logger($e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage(), ['file_name' => $file_name], 'error');
            return false;
        }
        return true;
    }
}
