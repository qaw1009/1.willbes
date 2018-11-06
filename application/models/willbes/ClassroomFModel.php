<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassroomFModel extends WB_Model
{
    private $_table = [
        'mylec' => 'lms_my_lecture',
        'lec_unit' => 'vw_unit_mylecture',
        'mylecture' => 'vw_on_mylecture',
        'myofflecture' => 'vw_off_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture',
        'start_log' => 'lms_my_lecture_history',
        'admin' => 'wbs_sys_admin',
        'pause_log' => 'lms_lecture_pause_history',
        'extend' => 'lms_lecture_extend',
        'down_log' => 'lms_lecture_data_download_log'
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
    private function getSelectList($columns, $cond, $isoff = false)
    {
        $query = "SELECT STRAIGHT_JOIN DISTINCT ".$columns;
        if($isoff == true){
            $query .= " FROM {$this->_table['myofflecture']}"; // WHERE LearnPatternCcd IN ('615001','615002','615003','615005') ";
        } else {
            $query .= " FROM {$this->_table['mylecture']}"; // WHERE LearnPatternCcd IN ('615001','615002','615003','615005') ";
        }

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     * 사이트리스트
     * @return array
     */
    public function getSiteList($cond = [], $isoff = false)
    {
        $columns = " SiteCode ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /**
     * 과정리스트
     * @return array
     */
    public function getCourseList($cond = [], $isoff = false)
    {
        $columns = " CourseIdx, CourseName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /** 과목리스트
     * @return array
     */
    public function getSubjectList($cond = [], $isoff = false)
    {
        $columns = " SubjectIdx, SubjectName ";
        return $this->getSelectList($columns, $cond, $isoff);

    }


    /** 강사리스트
     * @return array
     */
    public function getProfList($cond = [], $isoff = false)
    {
        $columns = " wProfIdx, wProfName ";
        return $this->getSelectList($columns, $cond, $isoff);

    }


    /** 단과강의리스트
     * @param array $cond_arr
     * @return array
     */
    public function getLecture($cond = [], $order = [], $isCount = false, $isoff = false)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *,
            TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        if($isoff == true){
            $query .= " FROM {$this->_table['myofflecture']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture']} ";
        }


        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $result = $this->_conn->query($query);
        return ($isCount == true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackage($cond = [], $order = [], $isCount = false)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *,
                TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        $query .= " FROM {$this->_table['mylecture_pkg']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
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
     * @param $cond
     * @param $startdate
     * @return array|bool
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


    /**
     * 일시중지 로그
     * @param array $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getPauseLog($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(PauseAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['pause_log']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY LphIdx DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 일시중지 처리
     * @param $input
     * @return array|bool
     */
    public function setPause($input)
    {
        $lecstartdate = element('lecstartdate', $input);
        $realecexpireday = element('realecexpireday', $input);

        $this->_conn->trans_begin();

        try{
            if(empty(element('ProdCodeSub', $input)) === true){
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('ProdCodeSub', element('ProdCodeSub', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }


            $input = [
                'MemIdx' => element('MemIdx', $input),
                'OrderIdx' => element('OrderIdx', $input),
                'OrderProdIdx' => element('OrderProdIdx', $input),
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'PauseStartDate' => element('pausestartdate', $input),
                'PauseEndDate' => element('pauseenddate', $input),
                'PauseDays' => element('pauseday', $input),
                'PauseRegIp' => $this->input->ip_address(),
                'Memo' => '사용자가 일시중지 등록'
            ];

            if($this->_conn->set($input)->insert($this->_table['pause_log']) === false){
                throw new \Exception('로그기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     * 일시중지 강의 재시작 설정
     * @param $input
     * @return array|bool
     */
    public function setRestartPause($input)
    {
        $lecstartdate = element('lecstartdate', $input);
        $realecexpireday = element('realecexpireday', $input);

        $today = date("Y-m-d", time());
        $enddate = date("Y-m-d", strtotime($today.'-1day'));

        // 해당 주문 강의의 일시정지 번호를 읽어온다.
        $query = "SELECT * ";
        $query .= " FROM {$this->_table['pause_log']} ";

        $cond = [
            'EQ' => [
                'MemIdx' => element('MemIdx', $input),
                'OrderIdx' => element('OrderIdx', $input),
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'OrderProdIdx' => element('OrderProdIdx', $input),
                'IsDel' => 'N'
            ]
        ];

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY LphIdx DESC LIMIT 1";

        $result = $this->_conn->query($query);
        $result = $result->result_array();;

        if(empty($result) == true){
            return false;
        }

        $row = $result[0];

        if($row['PauseEndDate'] < $today){
            return false;
        }

        $this->_conn->trans_begin();

        try {
            // 일시정지 정보 삭제
            if( $this->_conn->set('IsDel', 'Y')
                ->set('DelIp', $this->input->ip_address())
                ->set('DelDate', 'NOW()', false)
                ->set('Memo', $row['Memo'].' / 사용자가 일시정지 해제')
                ->where('LphIdx', $row['LphIdx'])
                ->update($this->_table['pause_log']) == false){
                throw new \Exception('업데이트 실패했습니다.');
            }

            // 일시정지 날짜가 오늘이면 새로운 정보를 입력하지 않는다.
            if($row['PauseStartDate'] < $today){
                // 날짜 계산
                $PauseDay = intval((strtotime($enddate)-strtotime($row['PauseStartDate']))/86400) +1;

                // 일시정지 날짜가 오늘 이전이면 새로운 일시정지 정보를 입력한다.
                $input = [
                    'MemIdx' => element('MemIdx', $input),
                    'OrderIdx' => element('OrderIdx', $input),
                    'OrderProdIdx' => element('OrderProdIdx', $input),
                    'ProdCode' => element('ProdCode', $input),
                    'ProdCodeSub' => element('ProdCodeSub', $input),
                    'PauseStartDate' => $row['PauseStartDate'],
                    'PauseEndDate' => $enddate,
                    'PauseDays' => $PauseDay,
                    'PauseRegIp' => $this->input->ip_address(),
                    'Memo' => '사용자가 일시중지 해제로 인해 재등록'
                ];

                if($this->_conn->set($input)->insert($this->_table['pause_log']) === false){
                    throw new \Exception('로그기록에 실패했습니다.');
                }
            } else {
                $PauseDay = 0;
            }

            // 실제 수강일은 이전 수강일 - 취소한 일시정지일 + 일시 정지일
            $realecexpireday = $realecexpireday - $row['PauseDays'] + $PauseDay;
            
            // 강의 수강기간을 업데이트한다.
            if(empty(element('ProdCodeSub', $input)) === true){
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('ProdCodeSub', element('ProdCodeSub', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 강의 연장 기록 로그 읽어오기
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getExtendLog($cond, $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(RegAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['extend']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY MlIdx DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     * 강의자료 다운로드 로그 기록
     * @param $input
     */
    public function storeDownloadLog($input)
    {
        $input = [
            'MemIdx' => element('MemIdx', $input),
            'OrderIdx' => element('OrderIdx', $input),
            'ProdCode' => element('ProdCode', $input),
            'ProdCodeSub' => element('ProdCodeSub', $input),
            'wLecIdx' => element('wLecIdx', $input),
            'wUnitIdx' => element('wUnitIdx', $input),
            'DownloadIp' => $this->input->ip_address()
        ];

        $this->_conn->set($input)->insert($this->_table['down_log']);
    }

}