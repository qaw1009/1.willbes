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
        // 엑셀파일 체크
        $this->_checkReadExcel($file_path);

        // 엑셀파일 읽기
        $inputFileType = IOFactory::identify($file_path);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($file_path);

        // pRow : start number, pNumRows : remove count
        $spreadsheet->getActiveSheet()->removeRow(1, 1);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        return $sheetData;
    }

    /**
     * export 대용량 엑셀 데이터 리턴 by box/spout library
     * @param $file_path
     * @return array
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function readHugeExcel($file_path)
    {
        // 엑셀파일 체크
        $this->_checkReadExcel($file_path);

        // 엑셀파일 읽기
        $reader = Box\Spout\Reader\ReaderFactory::create(Box\Spout\Common\Type::XLSX);
        $reader->open($file_path);
        $sheet_data = [];

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $idx => $row) {
                if ($idx > 1) {
                    $sheet_data[] = $row;   // row별 컬럼 인덱스는 0부터 시작
                }
            }
            break;
        }

        $reader->close();

        return $sheet_data;
    }

    /**
     * 엑셀파일 체크
     * @param $file_path
     * @throws Exception
     */
    private function _checkReadExcel($file_path)
    {
        try {
            if (@is_file($file_path) === false || ($file_size = @filesize($file_path)) === false) {
                throw new \Exception('선택된 파일이 없습니다.');
            }

            $max_file_size = 2097152;   // 2MB (2 * 1024 * 1024 바이트)
            if ($max_file_size < $file_size) {
                throw new \Exception('허용된 엑셀파일 용량(2MB)을 초과하였습니다.');
            }
        } catch (\Exception $e) {
            log_message('ERROR', '[Excel] ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * export 엑셀파일
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
            $sheet->setTitle('Sheet1'); // $file_name => Sheet1 (시트명이 31자를 초과하면 에러 발생)
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
