<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbTableBackup
{
    protected $_CI;
    /**
     * @var \CI_DB_query_builder
     */
    protected $_db;

    public function __construct($db_object = [])
    {
        $this->_CI = &get_instance();
        if(empty($db_object) === false) {
            $this->_db = $db_object[0];
        } else {
            $this->_db = $this->_CI->load->database('lms', true);
        }
    }

    public function __destruct()
    {
        $this->_db->close();
    }

    /**
     * 테이블 백업 실행
     * @param $table_name
     * @param $idx_name
     * @param $idx
     * @param string $add_condition
     * @param string $process_group
     * @param string $backup_type
     * @return bool|string
     */
    public function execTableBackup($table_name, $idx_name, $idx, $add_condition = [], $process_group = '', $exec_location = '')
    {

        try {
            if ( empty($table_name) || empty($idx_name) || empty($idx)) {
                throw new \Exception('백업 처리 오류 - 필수 데이터가 존재하지 않습니다. [ 테이블명, 식별자명, 식별자 ]');
            }

            $admin_idx = $this->_CI->session->userdata('admin_idx');
            $reg_ip = $this->_CI->input->ip_address();

            $add_condition = str_replace(' and ', '', ($this->_db->makeWhere($add_condition)->getMakeWhere(true)));
            $add_condition = str_replace('\'', '"', $add_condition);

            $exec_location = explode('/', $exec_location);
            $exec_class = $exec_location[0];
            $exec_method = $exec_location[1];

            $this->_db ->query(/** @lang text */'select NOW() from dual');
            $data = [$process_group, $exec_class, $exec_method, $table_name, $idx_name, $idx, $add_condition, $admin_idx, $reg_ip];
            $query = $this->_db->query("call sp_table_backup(?, ?, ?, ?, ?, ?, ?, ?, ?)", $data);

            if ($query === false) {
                throw new \Exception('백업 처리 오류 - 처리 중 오류가 발생했습니다.');
            }
            $result = $query->row(0)->ReturnResult;
            if($result !== 'success') {
                throw new \Exception('백업 처리 오류 - '. $result);
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}