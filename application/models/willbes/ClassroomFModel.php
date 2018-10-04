<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassroomFModel extends WB_Model
{
    private $_table = [
        'mylec' => 'lms_my_lecture',
        'lec_unit' => 'vw_unit_mylecture',
        'mylecture' => 'vw_on_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture',
        'start_log' => 'lms_my_lecture_history',
        'admin' => 'wbs_sys_admin'
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

        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
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
    public function getLecture($cond = [], $isCount = false)
    {
        if($isCount == true)
        {
            $query = "SELECT STRAIGHT_JOIN COUNT(*) ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *,
            TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        $query .= " FROM {$this->_table['mylecture']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);
        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackage($cond = [], $isCount = false)
    {
        if($isCount == true)
        {
            $query = "SELECT STRAIGHT_JOIN COUNT(*) ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *,
                TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        $query .= " FROM {$this->_table['mylecture_pkg']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     * 기간제패키지 PASS 강좌 리스트
     */
    public function getPass($cond = [], $isCount = false)
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

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 수강시작일 변경 레이어팝업
     * @param array $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getStartDateLog($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(UpdAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['start_log']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY MlhIdx ASC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     * 수강시작일 변경
     */
    public function setStartDate($cond, $startdate)
    {

        $where = $this->_conn->makeWhere([
            'EQ' => [
                'OrderIdx' => element('OrderIdx', $cond),
                'ProdCode' => element('ProdCode', $cond),
                'ProdCodeSub' => element('ProdCodeSub', $cond)
            ]
        ]);
        $where = $where->getMakeWhere(false);

        $query = "SELECT LecStartDate, LecExpireDay, LecEndDate, RealLecExpireDay, RealLecEndDate FROM {$this->_table['mylec']} " . $where . " LIMIT 1 ";

        $result = $this->_conn->query($query);

        if(empty($result) === true){
            return false;
        }

        $result = $result->row(0);

        $ori_startdate = $result->LecStartDate;
        $ori_expday = $result->LecExpireDay -1;
        $ori_enddate = $result->LecEndDate;
        $ori_realexpday = $result->RealLecExpireDay -1;
        $ori_realenddate = $result->RealLecEndDate;

        $this->_conn->trans_begin();

        try {

            if(empty(element('ProdCodeSub', $cond)) === true){
                if($this->_conn->
                    set('LecStartDate', $startdate)->
                    set('LecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_expday.'day')))->
                    set('RealLecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')))->
                    where('OrderIdx', element('OrderIdx', $cond))->
                    where('ProdCode', element('ProdCode', $cond))->
                    where('OrderProdIdx', element('OrderProdIdx', $cond))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('LecStartDate', $startdate)->
                    set('LecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_expday.'day')))->
                    set('RealLecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')))->
                    where('OrderIdx', element('OrderIdx', $cond))->
                    where('ProdCode', element('ProdCode', $cond))->
                    where('ProdCodeSub', element('ProdCodeSub', $cond))->
                    where('OrderProdIdx', element('OrderProdIdx', $cond))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }


            $input = [
                'MemIdx' => element('MemIdx', $cond),
                'OrderIdx' => element('OrderIdx', $cond),
                'OrderProdIdx' => element('OrderProdIdx', $cond),
                'ProdCode' => element('ProdCode', $cond),
                'ProdCodeSub' => element('ProdCodeSub', $cond),
                'BeforeStartDate' => $ori_startdate,
                'BeforeEndDate' => $ori_realenddate,
                'UpdStudyStartDate' => $startdate,
                'UpdStudyEndDate' => date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')),
                'UpdIp' => $this->input->ip_address(),
                'Memo' => '사용자가 시작일 변경'
            ];

            if($this->_conn->set($input)->insert($this->_table['start_log']) === false){
                throw new \Exception('로그기록에 실패했습니다.');
            }
            
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

}