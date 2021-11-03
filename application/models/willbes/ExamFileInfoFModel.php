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

    public function fileList($arr_condition = [], $arr_sub_condition = [])
    {
        $column = '
            b.YearTarget,a.AreaCcd
            ,CONCAT("[",GROUP_CONCAT(JSON_OBJECT("FileType", a.FileType, "FilePath", a.FilePath, "FileName", a.FileName, "FileRealName", a.FileRealName) ORDER BY a.FileType ASC),"]")
            AS FileInfo
        ';
        $where_sub = $this->_conn->makeWhere($arr_sub_condition)->getMakeWhere(false);
        $from = "
            from {$this->_table['exam_file_info']} as a
            INNER JOIN (
                SELECT GroupCode,YearTarget FROM {$this->_table['exam_file_info']} {$where_sub}
                ORDER BY GroupCode DESC LIMIT 1
            ) AS b ON a.GroupCode = b.GroupCode
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . ' group by a.AreaCcd');
        return $query->result_array();
    }
}