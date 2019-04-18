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

    public function __destruct()
    {
        // db close
        $this->_conn->close();
    }

    /**
     * DB Connection 로드
     * @param $databases
     */
    private function _loadDatabase($databases)
    {
        $_CI =& get_instance();

        foreach ($databases as $database) {
            // 동일한 이름의 DB 커넥션이 있다면 기존 연결된 커넥션 사용
            if (isset($_CI->{$database}) === false || is_object($_CI->{$database}) === false || empty($_CI->{$database}->conn_id) === true) {
                $_CI->{$database} = $this->load->database($database, true);
            }

            $this->{$database} = $_CI->{$database};
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

        $sql = /** @lang text */
            "CREATE TEMPORARY TABLE IF NOT EXISTS {$temp_table_name} (
                  tempIdx INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                  tempData VARCHAR(520) NOT NULL,
                  tempData2 VARCHAR(20) NULL,
                  PRIMARY KEY (tempIdx)
            )";

        return $this->_conn->query($sql);
    }

    /**
     * 임시테이블 삭제
     * @param string $temp_table_name
     */
    public function dropTampTable($temp_table_name = '_lms_temp_table')
    {
        $sql = /** @lang text */ "DROP TEMPORARY TABLE {$temp_table_name}";
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
                $sql = /** @lang text */ "INSERT INTO {$temp_table_name} (tempData, tempData2) SELECT fn_enc('{$val}'), '{$tempData2}'";

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

    /**
     * 문자열 암호화 함수
     * DB를 통해서 문자열을 암호화함
     * @param string $str
     * @return string
     */
    public function getEncString($str)
    {
        if($str == ''){ return ''; }
        else { return $this->_conn->query("SELECT fn_enc(?) AS enc", [$str])->row(0)->enc; }
    }

    /**
     * 마지막 실행 쿼리문 리턴
     * @return string
     */
    public function getLastQuery()
    {
        if (is_object($this->_conn->result_id) === true && isset($this->_conn->result_id->queryString) === true) {
            return $this->_conn->result_id->queryString;
        } else {
            return $this->_conn->last_query();
        }
    }
}
