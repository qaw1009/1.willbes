<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassroomFModel extends WB_Model
{
    protected $_table = [
        'mylec' => 'lms_my_lecture',
        'lec_unit' => 'vw_unit_mylecture',
        'mylecture' => 'vw_on_mylecture',
        'myofflecture' => 'vw_off_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture',
        'start_log' => 'lms_my_lecture_history',
        'admin' => 'wbs_sys_admin',
        'pause_log' => 'lms_lecture_pause_history',
        'extend' => 'lms_lecture_extend',
        'down_log' => 'lms_lecture_data_download_log',
        'order_product' => 'lms_order_product',
        'booklist' => 'vw_product_salebook',
        'on_lecture' => 'vw_product_on_lecture',
        'device' => 'lms_member_device',
        'bookmark' => 'lms_my_lecture_bookmark'
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
        $columns = " SiteCode, SiteName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /**
     * 사이트그룹리스트
     * @return array
     */
    public function getSiteGroupList($cond = [], $isoff = false)
    {
        $columns = " SiteGroupCode, SiteGroupName ";
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
    public function getLecture($cond = [], $order = [], $isCount = false, $isoff = false, $limit = null, $offset = null)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
            $order_by_offset_limit = '';

        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        if($isoff == true){
            $query .= " FROM {$this->_table['myofflecture']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture']} ";
        }


        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query.$order_by_offset_limit);
        return ($isCount == true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackage($cond = [], $order = [], $isCount = false)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums  ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        $query .= " FROM {$this->_table['mylecture_pkg']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
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

    /** 단과강의리스트
     * @param array $cond_arr
     * @return array
     */
    public function getLectureBookmark($cond = [], $order = [])
    {
        $query = "SELECT MST.* FROM ( 
            SELECT L.*
            , TO_DAYS(L.RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            , (SELECT COUNT(*) FROM {$this->_table['bookmark']} AS B WHERE B.MemIdx = L.MemIdx AND B.ProdCode = L.ProdCode AND B.ProdCodeSub = L.ProdCodeSub ) AS bookmark 
            ";

        $query .= " FROM {$this->_table['mylecture']} AS L ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $query .= " ) AS MST WHERE MST.bookmark > 0 ";
        $result = $this->_conn->query($query);

        return $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackageBookmark($cond = [], $order = [])
    {
        $query = "SELECT MST.* FROM (
            SELECT L.*
            , TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            , (SELECT COUNT(*) FROM {$this->_table['bookmark']} AS B WHERE B.MemIdx = L.MemIdx AND B.ProdCode = L.ProdCode) AS bookmark
            ";

        $query .= " FROM {$this->_table['mylecture_pkg']} AS L ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $query .= " ) AS MST WHERE MST.bookmark > 0 ";
        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     *  강의 커리뮬럼
     * @param $wLecIdx
     * @param bool $isCount
     * @return mixed
     */
    public function getCurriculumBookmark($cond = [])
    {
        $query = "SELECT STRAIGHT_JOIN * ";

        $query .= " FROM {$this->_table['lec_unit']} AS U
         JOIN {$this->_table['bookmark']} AS B ON U.ProdCode = B.ProdCode AND  U.ProdCodeSub = B.ProdCodeSub AND U.wLecIdx = B.wLecIdx AND U.wUnitIdx = B.wUnitIdx
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY U.wOrderNum ASC, B.RegDatm ASC ";

        $result = $this->_conn->query($query);

        return $result->result_array();
    }


    /**
     * 북마크 삭제
     * @param $cond
     * @return bool
     */
    public function deleteBookmark($cond)
    {
        if($this->_conn->
            makeWhere($cond)->
            delete($this->_table['bookmark']) == false){
            return false;
        }
        return true;        
    }


    /**
     * 북마크 내용 업데이트
     * @param $cond
     * @param $data
     * @return bool
     */
    public function updateBookmark($cond, $data)
    {
        if($this->_conn->
            set('Title', element('memo', $data))->
            makeWhere($cond)->
            update($this->_table['bookmark']) == false){
            return false;
        }
        
        return true;
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
            return false;
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
     * 재구매 목록
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getRebuyLog($cond, $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * ";
        }

        $query .= " FROM {$this->_table['mylecture']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY OrderDate DESC ";

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


    /**
     * 기간제패키지 강좌추가
     * @param $input
     * @return bool
     */
    public function addPassLecture($input)
    {
        try {
            if($this->_conn->set($input)->insert($this->_table['mylec']) == false){
                throw new \Exception('강좌추가에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * 기간제패키지 즐겨찾기/숨기기
     * @param $input
     * @param $cond
     * @return bool
     */
    public function setLikeHide($input, $cond)
    {
        $this->_conn->trans_begin();
        try{
            $data = [
                'OrderIdx' => $cond['OrderIdx'],
                'OrderProdIdx' => $cond['OrderProdIdx'],
                'ProdCode' => $cond['ProdCode']
            ];

            foreach($cond['ProdCodeSub'] as $key => $value){
                if(empty($value) == false){
                    if($this->_conn->set($input)->where(array_merge($data, [
                            'ProdCodeSub' => $value
                        ]))->update($this->_table['mylec']) == false){
                        throw new \Exception('업데이트 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 해당강의 교재 리스트 읽어오기
     * @param $cond
     * @return mixed
     */
    public function getBooklist($cond)
    {
        $query = "SELECT * FROM {$this->_table['booklist']} ";
        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= " ORDER BY BookProvisionCcd ASC ";

        $result = $this->_conn->query($query);
        return $result->result_array();
    }


    /**
     * 기잔제패키지 들을수 있는 강좌리스트
     * @param $arr_condition
     * @param string $col
     * @return mixed
     */
    public function getPassSubLecture($arr_condition, $col = '', $subarr, $notake = false)
    {
        if(empty($arr_condition) == true){
            return [];
        }

        if(empty($col) == true){
            $column =  "A.ProdCode As Parent_ProdCode, B.IsEssential, B.SubGroupName, B.OrderNum, C.* , 
                 if(D.ProdCode is null, 'N', 'Y') AS IsTake 
            ";
        } else {
            $column = $col;
        }

        $subwhere = $this->_conn->makeWhere($subarr)->getMakeWhere(true);

        $from = " 
            FROM
                vw_product_periodpack_lecture A
                JOIN lms_product_r_sublecture B on A.ProdCode = B.ProdCode AND B.IsStatus = 'Y'
                JOIN {$this->_table['on_lecture']} C on B.ProdCodeSub = C.ProdCode AND C.wIsUse = 'Y'
                LEFT JOIN {$this->_table['mylec']} D ON A.ProdCode = D.ProdCode AND C.ProdCode = D.ProdCodeSub ".$subwhere ;

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        if($notake){
            $where = $where . " AND D.ProdCode IS NULL ";
        }

        $orderby = " ORDER BY B.PsIdx DESC ";

        return $this->_conn->query('SELECT straight_join '. $column. $from. $where. $orderby)->result_array();
    }

    /**
     *  등록된 디바이스 목록
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getMyDevice($isCount, $cond, $limit = 5, $offset = 0)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
            $limitoffset = '';

        } else {
            $query = "SELECT * , ifnull(DelAdminIdx, '') AS DelName ";
            $limitoffset = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $query .= " FROM {$this->_table['device']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= " ORDER BY MdIdx DESC ";
        $query .= $limitoffset;

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     *  등록된 디바이스 사용자 삭제
     * @param $mdidx
     * @param $memidx
     * @return bool
     */
    public function delMyDevice($mdidx, $memidx)
    {
        try {
            if($this->_conn->
                set('IsUse', 'N')->
                set('DelDatm', 'NOW()', false)->
                where('MdIdx', $mdidx)->
                where('MemIdx', $memidx)->
                update($this->_table['device']) == false){
                throw new \Exception('업데이트 실패했습니다.');
            }

        } catch (\Exception $e) {
            return false;
        }

        return true;
    }


    /**
     * 강좌 첨부파일 다운로드 횟수 읽어오기
     * @param $cond
     * @param bool $iscount
     * @return mixed
     */
    public function getDownLog($cond, $iscount = true)
    {
        if($iscount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * ";
        }

        $query .= " FROM {$this->_table['down_log']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query);

        return ($iscount === true) ? $result->row(0)->rownums : $result->result_array();
    }

}