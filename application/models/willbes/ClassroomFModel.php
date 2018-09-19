<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassroomFModel extends WB_Model
{
    private $_table = [
        'order' => 'lms_order',
        'order_prod' => 'lms_order_product',
        'order_sub_prod' => 'lms_order_sub_product',
        'product' => 'lms_product',
        'product_lec' => 'lms_product_lecture',
        'lecture' => 'vw_product_on_lecture',
        'mylec' => 'lms_my_lecture',
        'mst_lec' => '',
        'lec_unit' => 'vw_unit_mylecture',
        'mylec_unit' => 'lms_lecture_studyinfo',
        'mylechistory' => 'lms_my_lecture_history',
        'pause_history' => 'lms_lecture_pause_history',
        'mylecture' => 'vw_on_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture'
    ];


    public function __construct()
    {
        parent::__construct('lms');
    }


    /**
     *  강의리스트에서 셀렉트를 위해서
     * @param $columns
     * @param $cond
     * @return array
     */
    private function getSelectList($columns, $cond)
    {
        $query = "SELECT STRAIGHT_JOIN DISTINCT ".$columns;
        $query .= " FROM {$this->_table['mylecture']} WHERE LearnPatternCcd IN ('615001','615002','615003','615005') ";
        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(true);

        $rows = $this->_conn->query($query);

        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     * 과정리스트
     * @return array
     */
    public function getCourseList($cond = [])
    {
        $columns = " CourseIdx, CourseName ";
        return $this->getSelectList($columns, $cond);
    }


    /** 과목리스트
     * @return array
     */
    public function getSubjectList($cond = [])
    {
        $columns = " SubjectIdx, SubjectName ";
        return $this->getSelectList($columns, $cond);

    }


    /** 강사리스트
     * @return array
     */
    public function getProfList($cond = [])
    {
        $columns = " wProfIdx, wProfName ";
        return $this->getSelectList($columns, $cond);

    }


    /** 단과강의리스트
     * @param array $cond_arr
     * @return array
     */
    public function getLecture($cond = [])
    {
        $query = "SELECT STRAIGHT_JOIN *,
            TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
        ";
        $query .= " FROM {$this->_table['mylecture']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $rows = $this->_conn->query($query);
        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackage($cond = [])
    {
        $query = "SELECT STRAIGHT_JOIN *,
            TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
        ";
        $query .= " FROM {$this->_table['mylecture_pkg']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $rows = $this->_conn->query($query);

        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     * 기간제패키지 PASS 강좌 리스트
     */
    public function getPass($cond = [])
    {
        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     *  강의 커리뮬럼
     * @param $wLecIdx
     * @param bool $isCount
     * @return mixed
     */
    public function getCurriculum($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
        } else {
            $query = "SELECT STRAIGHT_JOIN * ";
        }

        $query .= " FROM {$this->_table['lec_unit']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY wOrderNum ASC ";

        $query = $this->_conn->query($query);

        return ($isCount === true) ? $query->row(0)->rownums : $query->result_array();
    }

}