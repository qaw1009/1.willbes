<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class EduIfSalesMstTask extends \crontask\tasks\Task
{
    /**
     * @var \CI_DB_query_builder
     */
    private $_src_db;

    /**
     * @var \CI_DB_query_builder
     */
    private $_rem_db;

    private $_src_table = [
        'teacher' => 'if_teacher_mst_log',
        'order' => 'if_order_mst_log'
    ];

    private $_rem_table = [
        'teacher' => 'if_teacher_mst_rem',
        'order' => 'if_order_mst_rem'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->setLogId('ESM');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 매출관리시스템 인터페이스 데이터 등록
     * @return mixed|string
     */
    public function run()
    {
        $this->_src_db = $this->_CI->load->database('gathering', true);   // 소스DB
        $this->_rem_db = $this->_CI->load->database('gathering', true);   // 원격DB
        
        try {
            // 교수정보
            $teacher_result = $this->_runTeacherMst();
            if (is_numeric($teacher_result) === false) {
                throw new \Exception($teacher_result);
            }
            $ret_msg = 'Teacher : ' . $teacher_result;

            // 매출정보
            $order_result = $this->_runOrderMst();
            if (is_numeric($order_result) === false) {
                throw new \Exception($order_result);
            }
            $ret_msg .= ' / Order : ' . $order_result;

            $this->setOutput('EduIfSalesMstTask complete.');
            return 'Success(' . $ret_msg . ')';
        } catch (\Exception $e) {
            $this->setOutput('EduIfSalesMstTask error occured. [' . $e->getMessage() . ']');
            return 'Error(' . $e->getMessage() . ')';
        } finally {
            $this->_src_db->close();
            $this->_rem_db->close();
        }
    }

    /**
     * 교수정보 조회/등록
     * @return int|string
     */
    private function _runTeacherMst()
    {
        try {
            $ins_cnt = 0;
            $if_date = date('Y-m-d');

            // 교수정보 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, SEND_TIME, TEACHER_CD, TEACHER_NM, CONTRACT_FR, CONTRACT_TO, CONTRACT_PAY
                from ' . $this->_src_table['teacher'] . '
                where IF_DATE = ?
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, [$if_date])->result_array();

            // 교수정보 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['teacher']) === false) {
                        throw new \Exception('교수정보 등록에 실패했습니다.');
                    }
                    $ins_cnt++;
                }
            }

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 매출정보 조회/등록
     * @return int|string
     */
    private function _runOrderMst()
    {
        try {
            $ins_cnt = 0;
            $if_date = date('Y-m-d');

            // 매출정보 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, SEND_TIME, ORDER_NO, INOUT_CD, OUT_ABLE_CD, MEMBERSHIP_NO, MEMBERSHIP_NM
                    , IN_RT, IN_CH, IN_METHOD, CAMPUS, TEACHER_CD, P_CD, C_NM, C_DETAIL_NM, C_ON_FR_DATE, C_ON_TO_DATE, INOUT_DATE, TODAY_INOUT_AMT
                from ' . $this->_src_table['order'] . '
                where IF_DATE = ?
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, [$if_date])->result_array();

            // 매출정보 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['order']) === false) {
                        throw new \Exception('매출정보 등록에 실패했습니다.');
                    }
                    $ins_cnt++;
                }
            }

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
