<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamFileInfoFModel extends WB_Model
{
    private $_table = [
        'exam_file_info' => 'lms_exam_file_info',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getYearTarget($arr_condition = [])
    {
        $column = 'GroupCode,YearTarget';
        $from = " from {$this->_table['exam_file_info']}";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . 'ORDER BY GroupCode DESC');
        return $query->result_array();
    }

    public function fileList($arr_condition = [])
    {
        $column = '
            DataType, GroupCode, AreaCcd
            ,CONCAT("[",GROUP_CONCAT(JSON_OBJECT("FileType", FileType, "FilePath", FilePath, "FileName", FileName, "FileRealName", FileRealName) ORDER BY FileType ASC),"]") AS FileInfo
        ';
        $from = " from {$this->_table['exam_file_info']}";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . ' group by AreaCcd');
        return $query->result_array();
    }
}