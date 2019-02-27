<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogQueryHook
{
    protected $_CI;

    public function __construct()
    {
        $this->_CI =& get_instance();
    }

    /**
     * 쿼리 로거
     */
    public function logQueries()
    {
        if(config_item('sql_log_queries') === false) {
            return;
        }

        $output = $slow_output = '';
        $idx = 0;

        foreach (get_object_vars($this->_CI) as $name => $object) {
            if (is_object($object)) {
                if ($object instanceof CI_DB === true) {
                    $exec_times = $object->query_times;

                    foreach($object->queries as $key => $query) {
                        // DB 세션 관련 쿼리 제외
                        if (strpos($query, 'ci_session_lock') === false && strpos($query, 'wb_sessions') === false) {
                            $output .= $this->_makeLogData($idx, $query, $exec_times[$key]);

                            if($this->_checkSlowQuery($exec_times[$key]) === true) {
                                $slow_output .= $this->_makeLogData($idx, $query, $exec_times[$key]);
                            }

                            $idx++;
                        }
                    }
                }
            }
        }

        $this->_writeLogFile(array('query' => $output, 'slow-query' => $slow_output));
    }

    /**
     * 로그 내용 생성
     * @param $idx
     * @param $query
     * @param $exec_time
     * @return string
     */
    private function _makeLogData($idx, $query, $exec_time)
    {
        $output = '/* Query ' . $idx . ' - ' . date('Y-m-d H:i:s') . ' [URI: ' . SUB_DOMAIN . '/' . uri_string() . '] [Execution Time: ' . round(doubleval($exec_time), 5) . '.s] */' . PHP_EOL;
        $output .= $query . PHP_EOL;
        $output .= '/*==================================================*/' . PHP_EOL;

        return $output;
    }

    /**
     * 슬로우 쿼리 체크
     * @param $exec_time
     * @return bool
     */
    private function _checkSlowQuery($exec_time)
    {
        return config_item('sql_log_slow_queries') && $exec_time >= config_item('sql_log_slow_min_exec_second');
    }

    /**
     * 로그 파일 저장
     * @param $log_data
     */
    private function _writeLogFile($log_data = array())
    {
        $this->_CI->load->helper('file');

        // create sql log directory
        if (is_dir(config_item('sql_log_path')) === false) {
            if (mkdir(config_item('sql_log_path'), 0707) === false) {
                log_message('error', 'Unable to create query the log directory');
            }
        }

        // write sql log file
        foreach($log_data as $name => $data) {
            if(empty($data) === false) {
                $sql_log_path = config_item('sql_log_path') . $name . '-log-' . date('Y-m-d') . '.sql';

                if(write_file($sql_log_path, $data, 'a+') === false) {
                    log_message('debug', 'Unable to write query the log file');
                }
            }
        }
    }
}