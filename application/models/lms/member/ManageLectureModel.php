<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageLectureModel extends WB_Model
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
        'device' => 'lms_member_device',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 단강좌리스트
     * @param $is_count
     * @param $cond
     * @param bool $is_off
     * @return mixed
     */
    public function getLecture($is_count, $cond, $is_off = false)
    {
        if($is_count == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        if($is_off == true){
            $query .= " FROM {$this->_table['myofflecture']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture']} ";
        }

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= ' ORDER BY OrderIdx DESC ';
        $result = $this->_conn->query($query);
        return ($is_count == true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     * 종합반 리스트
     * @param array $cond
     * @param array $order
     * @param bool $isCount
     * @return array
     */
    public function getPackage($isCount, $cond)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        $query .= " FROM {$this->_table['mylecture_pkg']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= " ORDER BY OrderIdx DESC ";
        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     * 수강회차정보
     * @param $cond
     * @return mixed
     */
    public function getCurriculum($cond)
    {
        $query = "SELECT STRAIGHT_JOIN * ";
        $query .= " FROM {$this->_table['lec_unit']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY wOrderNum ASC ";

        $result = $this->_conn->query($query);

        return $result->result_array();
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
            $query = "SELECT L.* , IFNULL(A.wAdminName, '') AS adminName 
              ";
        }

        $query .= " FROM {$this->_table['start_log']} AS L
        LEFT JOIN {$this->_table['admin']} AS A ON A.wAdminIdx = L.UpdAdminIdx
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
                'Memo' => '관리자가 시작일 변경',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
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
            $query = "SELECT L.*
            , IFNULL(A.wAdminName, '') AS PauseAdminName 
            , IFNULL(A2.wAdminName, '') AS DelAdminName
              ";
        }

        $query .= " FROM {$this->_table['pause_log']} AS L
        LEFT JOIN {$this->_table['admin']} AS A ON A.wAdminIdx = L.PauseAdminIdx
        LEFT JOIN {$this->_table['admin']} AS A2 ON A2.wAdminIdx = L.DelAdminIdx
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
                'Memo' => '관리자가 일시중지 등록',
                'PauseAdminIdx' => $this->session->userdata('admin_idx')
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
     * 일시중지 취소
     * @param $input
     * @return array|bool
     */
    public function cancelPause($input)
    {
        $lecstartdate = element('lecstartdate', $input);
        $realecexpireday = element('realecexpireday', $input);

        $today = date("Y-m-d", time());

        // 해당 주문 강의의 일시정지 번호를 읽어온다.
        $query = "SELECT * ";
        $query .= " FROM {$this->_table['pause_log']} ";

        $cond = [
            'EQ' => [
                'LphIdx' => element('LphIdx', $input),
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
                    ->set('Memo', $row['Memo'].' / 관리자가 일시정지 취소')
                    ->set('DelAdminIdx', $this->session->userdata('admin_idx'))
                    ->where('LphIdx', $row['LphIdx'])
                    ->update($this->_table['pause_log']) == false){
                throw new \Exception('업데이트 실패했습니다.');
            }

            // 실제 수강일은 이전 수강일 - 취소한 일시정지일
            $realecexpireday = $realecexpireday - $row['PauseDays'];

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
            $query = "SELECT L.* , IFNULL(A.wAdminName, '') AS adminName 
              ";
        }

        $query .= " FROM {$this->_table['extend']} AS L
            LEFT JOIN {$this->_table['admin']} AS A ON A.wAdminIdx = L.RegAdminIdx
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY L.MlIdx DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 강의 연장처리
     * @param $input
     * @return bool
     */
    public function storeExtend($input)
    {
        $this->_conn->trans_begin();

        try {
            // 일시정지 정보 삭제
            if( $this->_conn->set('MemIdx', element('MemIdx', $input))
                    ->set('TargetOrderIdx', element('OrderIdx', $input))
                    ->set('TargetProdCode', element('ProdCode', $input))
                    ->set('TargetProdCodeSub', element('ProdCodeSub', $input))
                    ->set('ExtenType', element('ExtenType', $input))
                    ->set('ExtenDay', element('ExtenDay', $input))
                    ->set('RegDatm', 'NOW()', false)
                    ->set('RegIp', $this->input->ip_address())
                    ->set('ExtenMemo', element('ExtenMemo', $input))
                    ->set('RegAdminIdx', $this->session->userdata('admin_idx'))
                    ->insert($this->_table['extend']) == false){
                throw new \Exception('연장데이터 추가에 실패했습니다.');
            }

            // 실제 수강일은 이전 수강일 - 취소한 일시정지일
            $realecexpireday = element('RealLecExpireDay', $input) + element('ExtenDay', $input);
            $lecstartdate = element('LecStartDate', $input);

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

    public function setRate($input)
    {
        try{
            if($this->_conn->
                set('StudyRatePrint', element('Rate', $input))->
                where('OrderIdx', element('OrderIdx', $input))->
                where('ProdCode', element('ProdCode', $input))->
                where('ProdCodeSub', element('ProdCodeSub', $input))->
                update($this->_table['mylec']) === false) {
                throw new \Exception('업데이트 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function getDownLog($cond, $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * ";
        }

        $query .= " FROM {$this->_table['down_log']} AS L ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }
}