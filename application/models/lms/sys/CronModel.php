<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CronModel extends WB_Model
{
    private $_table = [
        'cron_exec_log' => 'lms_cron_exec_log',
        'admin' => 'wbs_sys_admin'
    ];
    public $_task_type = ['MPE' => '회원포인트소멸', 'VSR' => '방문자통계집계'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 작업스케줄러 실행로그 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function listRunSchedulerLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = $is_count;

        if ($is_count === false) {
            $column = 'CL.ExecIdx, CL.TaskType, CL.ExecDate, CL.RunTime, CL.ResultCode, CL.ResultMsg, CL.RegDatm, CL.RegAdminIdx
                , (case CL.TaskType 
                    when "MPE" then "' . $this->_task_type['MPE'] . '"
                    when "VSR" then "' . $this->_task_type['VSR'] . '"
                    else "기타"
                  end) as TaskTypeName  
                , A.wAdminName as RegAdminName';
        }

        return $this->_conn->getJoinListResult($this->_table['cron_exec_log'] . ' as CL', 'left', $this->_table['admin'] . ' as A'
            , 'CL.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"'
            , $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 금일 작업스케줄러 실행로그
     * @return array
     */
    public function listTodayRunSchedulerLog()
    {
        $column = 'TaskType, RunTime, ResultMsg
            , (case TaskType 
                when "MPE" then "' . $this->_task_type['MPE'] . '"
                when "VSR" then "' . $this->_task_type['VSR'] . '"
                else "기타"
              end) as TaskTypeName            
        ';
        $arr_condition = ['EQ' => ['ExecDate' => date('Ymd')]];

        return $this->_conn->getListResult($this->_table['cron_exec_log'], $column, $arr_condition, null, null, ['ExecIdx' => 'asc']);
    }

    /**
     * 작업스케줄러 실행
     * @return array|bool
     */
    public function runScheduler()
    {
        try {
            $today = date('Ymd');
            $task_types = array_keys($this->_task_type);

            // 이미 실행된 작업 조회
            $arr_condition = [
                'EQ' => ['ExecDate' => $today],
                'IN' => ['TaskType' => $task_types]
            ];
            $chk_tasks = array_pluck($this->_conn->getListResult($this->_table['cron_exec_log'], 'TaskType', $arr_condition), 'TaskType');

            // 실행할 작업
            $exec_tasks = array_diff($task_types, $chk_tasks);
            if (empty($exec_tasks) === true) {
                return null;    // 실행할 작업없음
            }

            // 작업 실행
            foreach ($exec_tasks as $task_type) {
                $results = null;
                $time_start = microtime(true);

                switch ($task_type) {
                    case 'MPE' :
                        $results = $this->_taskMemberPointExpire();
                        break;
                    case 'VSR' :
                        $results = $this->_taskVisitorStatsRegist();
                        break;
                }
                
                $run_time = round(microtime(true) - $time_start, 2);   // 실행시간

                // 작업실행로그 저장
                if (empty($results) === false) {
                    $data = [
                        'TaskType' => $task_type,
                        'ExecDate' => $today,
                        'RunTime' => $run_time,
                        'ResultCode' => ($results['ret_cd'] === true ? 'Y' : 'N'),
                        'ResultMsg' => $results['ret_msg'],
                        'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['cron_exec_log']) === false) {
                        throw new \Exception('작업실행로그 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 회원포인트소멸 프로시저 실행
     * @return array
     */
    private function _taskMemberPointExpire()
    {
        try {
            $query = $this->_conn->query('call sp_member_point_expire');
            if ($query === false) {
                throw new \Exception('회원포인트소멸 작업 중 오류가 발생했습니다.');
            }

            $result = $query->row(0);
            $ret_msg = $result->ReturnMsg . '(' . $result->ReturnCnt . ')';

            return ['ret_cd' => true, 'ret_msg' => $ret_msg];
        } catch (\Exception $e) {
            return ['ret_cd' => false, 'ret_msg' => $e->getMessage()];
        }
    }

    /**
     * 방문자통계집계 프로시저 실행
     * @return array
     */
    private function _taskVisitorStatsRegist()
    {
        try {
            $query = $this->_conn->query('call sp_visitor_stats_insert("", "")');
            if ($query === false) {
                throw new \Exception('방문자통계집계 작업 중 오류가 발생했습니다.');
            }

            $result = $query->row(0);
            $ret_msg = $result->ReturnMsg . '(' . $result->StartDate . ' ~ ' . $result->EndDate . ' : ' . $result->ReturnCnt . ')';

            return ['ret_cd' => true, 'ret_msg' => $ret_msg];
        } catch (\Exception $e) {
            return ['ret_cd' => false, 'ret_msg' => $e->getMessage()];
        }
    }
}
