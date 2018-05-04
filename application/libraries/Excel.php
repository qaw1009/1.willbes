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

}