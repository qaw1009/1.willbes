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
        'lec_unit' => 'wbs_cms_lecture_unit_combine',
        'mylec_unit' => 'lms_lecture_studyinfo',
        'mylechistory' => 'lms_my_lecture_history',
        'pause_history' => 'lms_lecture_pause_history',
        'mylecture' => 'vw_on_mylecture'
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
        $query = "SELECT DISTINCT ".$columns;
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
        $query = "SELECT *,
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


        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     * DIY 패키지 리스트
     */
    public function getDiyPackage($cond = [])
    {
        return empty($rows) === true ? [] : $rows->result_array();
    }


    /**
     * 패키지 서브강좌 리스트
     */
    public function getPackageSub($cond = [])
    {
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
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT 
                U.wUnitIdx, U.wLecIdx,
                U.wUnitNum, U.wUnitLectureNum,
                U.wUniName, U.wShootingDate, U.wBookPage, U.wRuntime,  
                U.wContentTypeCcd, U.wContentSiteCcd,
                U.wWD, U.wHD, U.wSD, 
                U.wUnitAttachFileReal, U.wUnitAttachFile
            ";
        }

        $query .= " FROM {$this->_table['lec_unit']} AS U
        LEFT JOIN {$this->_table['mylec_unit']} AS MU ON U.wLecIdx = MU.wLecIdx AND U.wUnitIdx = MU.wUnitIdx  
        ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(true);

        $query .= " ORDER BY U.wOrderNum ASC ";

        $query = $this->_conn->query( $query);

        return ($isCount === true) ? $query->row(0)->rownums : $query->row_array();
    }

}