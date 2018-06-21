<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_member',
        'info' => 'lms_member_otherinfo',
        'loginLog' => 'lms_member_login_log',
        'changeLog' => 'lms_member_change_log',
        'outLog' => 'lms_member_out_log',
        'device' => 'lms_member_device'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원 목록 조회
     * @param boolean $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function list($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $inQuery = '')
    {
        if($is_count === true) {
            $column = 'COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            /*
             * 회원번호, 회원명, 아이디, 휴대전화, 수신여부, 이메일, 수신여부
             * 가입일, 통합여부, 마지막로그인일, 최종정보변경일, 비밀번호변경일, 탈퇴일
             * 블랙컨슈머여부, 기기등록정보,
             */
            $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, 
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Info.MailEnc) AS Mail, Info.MailRcvStatus,
            Mem.JoinDate, Mem.IsChange, 
            '' AS LoginDate,
            '' AS InfoUpdDate,
            '' AS PwdUpdDate,
            (SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1) AS OutDate,
            Mem.IsBlackList, 
            0 AS PcCount,
            0 AS MobileCount             
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('SELECT ' . $column . $from . $inQuery . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->rownums : $query->result_array();
    }

    /**
     * 회원 상세정보 조회
     * @param int $memIdx
     * @return array
     */
    public function detail($memIdx)
    {
        $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, Mem.BirthDay, Mem.Sex, 
            Info.ZipCode, Info.Addr1, fn_dec(Info.Addr2Enc) AS Addr2,
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Info.MailEnc) AS Mail, Info.MailRcvStatus,
            Mem.JoinDate, Mem.IsChange, 
            '' AS LoginDate,
            '' AS InfoUpdDate,
            '' AS PwdUpdDate,
            (SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1) AS OutDate,
            Mem.IsBlackList, 
            0 AS PcCount,
            0 AS MobileCount             
            ";

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = " WHERE Mem.MemIdx = {$memIdx} ";

        return $this->_conn->query('SELECT ' . $column . $from . $where )->row_array();
    }
}