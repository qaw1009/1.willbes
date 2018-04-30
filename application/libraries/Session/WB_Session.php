<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Session extends CI_Session
{
    private $_db;
    private $_table;

    public function __construct(array $params = array())
    {
        parent::__construct($params);

        // 세션 드라이버가 데이터베이스 일 경우만
        if ($this->_driver == 'database') {
            // load database
            $_CI =& get_instance();
            isset($_CI->db) OR $_CI->load->database();
            $this->_db = $_CI->db;

            // 사용 테이블
            $this->_table = [
                'session' => $this->_config['save_path'],
                'session_login' => $this->_config['save_path'] . '_login'
            ];

            // 자동 재생성되는 세션 아이디 업데이트
            $this->_setAutoRegenerateId();
        }
    }

    /**
     * 로그인 성공시 session login 테이블에 이력 저장
     * @param $user_idx
     * @param $app_type
     */
    public function addSessionLogin($user_idx, $app_type)
    {
        $data = [
            'id' => session_id(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'app_type' => $app_type,
            'user_idx' => $user_idx,
            'timestamp' => time(),
        ];

        if ($this->_db->set($data)->insert($this->_table['session_login']) === false) {
            log_message('error', 'Session: `' . $this->_table['session_login'] . '` table insert failed!');
        }
    }

    /**
     * 이전 세션 데이터 삭제 (중복 로그인 방지, 최종 로그인만 허용, 직전 로그인 세션 삭제)
     * @param $user_idx
     * @param $app_type
     */
    public function removePrevSession($user_idx, $app_type)
    {
        // 이전 로그인 세션 아이디 조회
        $this->_db->select('id, ip_address')->from($this->_table['session_login']);
        $this->_db->where('user_idx', $user_idx)->where('app_type', $app_type);
        $this->_db->order_by('timestamp', 'desc')->limit(1);
        $row = $this->_db->get()->row_array();

        if (empty($row) === false) {
            // 이전 세션 데이터 삭제
            $this->_db->where('id', $row['id']);
            if ($this->_config['match_ip']) {
                $this->_db->where('ip_address', $row['ip_address']);
            }

            if ($this->_db->delete($this->_config['save_path']) === false) {
                log_message('error', 'Session: previous `' . $this->_config['save_path'] . '` table session data deletion failed!');
            }
        }
    }

    /**
     * 자동 재생성되는 세션 아이디를 session login 테이블에 반영
     */
    private function _setAutoRegenerateId()
    {
        $session_id = session_id();

        if (isset($_SESSION['__ci_last_regenerate']) && empty($this->_old_session_id) === false && $this->_old_session_id != $session_id) {
            // session login 테이블 id 컬럼 업데이트
            $this->_db->set('id', $session_id)->where('id', $this->_old_session_id);
            if ($this->_config['match_ip']) {
                $this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
            }

            if ($this->_db->update($this->_table['session_login']) === false) {
                log_message('error', 'Session: `' . $this->_table['session_login'] . '` table `id` column update failed!');
            }
        }
    }
}