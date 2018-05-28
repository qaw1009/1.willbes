<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Model extends CI_Model
{
    /**
     * @var CI_DB_query_builder
     */
    protected $_conn;

    public function __construct($_conn_id = 'wbs')
    {
        parent::__construct();

        //
        $databases = (array) $_conn_id;

        // DB Connection 로드
        $this->_loadDatabase($databases);

        // default connection 설정
        $this->setDefaultConnection(element(0, $databases));
    }

    /**
     * DB Connection 로드
     * @param $databases
     */
    private function _loadDatabase($databases)
    {
        foreach ($databases as $database) {
            $this->{$database} = $this->load->database($database, true);
        }
    }

    /**
     * 디폴트 커넥션 설정
     * @param null|string $conn_id
     */
    public function setDefaultConnection($conn_id = null)
    {
        (is_null($conn_id) === false) && $this->_conn = $this->{$conn_id};
    }

    /**
     * 백업 데이터 등록
     * @param string $table_name 원본 테이블 명
     * @param array $arr_condition 원본 테이블 조회 where equal 조건 [필드 => 값, 필드 => 값 ....]
     */
    public function addBakData($table_name, $arr_condition)
    {
        $table_where = $this->_conn->makeWhere(['EQ' => $arr_condition]);
        $table_where = substr($table_where->getMakeWhere(true), 5); // and 삭제

        $this->_conn->query('CALL sp_bak_data_insert(?, ?, ?, ?)', [
            $table_name, $table_where, $this->input->ip_address(), $this->session->userdata('admin_idx')
        ]);
    }


    /**
     * 임시테이블 생성
     * @param string $temp_table_name
     * @return mixed
     */
    public function createTampTable($temp_table_name = '_lms_temp_table')
    {
        $sql = "DROP TEMPORARY TABLE {$temp_table_name}";
        $this->_conn->query($sql);

        $sql = "
                CREATE TEMPORARY TABLE IF NOT EXISTS {$temp_table_name} (
                  tempIdx INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                  tempData VARCHAR(520) NOT NULL,
                  tempData2 VARCHAR(20) NULL,
                  PRIMARY KEY (tempIdx)
                )
            ";

        return $this->_conn->query($sql);
    }

    /**
     * 임시테이블 삭제
     * @param string $temp_table_name
     */
    public function dropTampTable($temp_table_name = '_lms_temp_table')
    {
        $sql = "DROP TEMPORARY TABLE {$temp_table_name}";
        $this->_conn->query($sql);
    }

    /**
     * 임시테이블 데이터 저장
     * @param string $temp_table_name
     * @param array $input_data     필수 값
     * @param array $input_data2    참조 값
     * @return bool
     */
    public function insertTampTable($temp_table_name = '_lms_temp_table', $input_data = [], $input_data2 = [])
    {
        $result = [];

        if (empty($input_data) === false) {
            foreach ($input_data as $key => $val) {
                $tempData2 = (empty($input_data2[$key]) === false) ? $input_data2[$key] : '';
                $sql = "
                  INSERT INTO {$temp_table_name} (tempData, tempData2)
                  SELECT fn_enc('{$val}'), '{$tempData2}'
                ";

                $result[$key] = $this->_conn->query($sql);
            }
        }

        foreach ($result as $key => $val) {
            if ($val === false) {
                return false;
            }
        }

        return true;
    }
}