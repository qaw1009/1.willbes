<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_Member',
        'info' => 'lms_Member_OtherInfo',
        'loginLog' => 'lms_Member_Login_Log',
        'changeLog' => 'lms_Member_Change_Log',
        'outLog' => 'lms_Member_Out_Log',
        'device' => 'lms_member_device',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
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
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
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
            IFNULL(Mem.JoinDate, '') AS JoinDate, IFNULL(Mem.IsChange, '') AS IsChange, 
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
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

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $inQuery . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 회원 상세정보 조회
     * @param int $memIdx
     * @return array
     */
    public function detail($memIdx)
    {
        $rows = [];

        $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, Mem.BirthDay, Mem.Sex, 
            Info.ZipCode, Info.Addr1, fn_dec(Info.Addr2Enc) AS Addr2,
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Info.MailEnc) AS Mail, Info.MailRcvStatus,
            IFNULL(Mem.JoinDate, '') AS JoinDate, IFNULL(Mem.IsChange, '') AS IsChange, 
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
            0 AS PcCount,
            0 AS MobileCount             
            ";

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = " WHERE Mem.MemIdx = {$memIdx} ";

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where );

        return $rows->row_array();
    }

    /**
     * 정보변경로그
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function infologList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = "MemIdx, IFNULL(code.CcdName, '') AS UpdType, UpdMemo, ReferFileRoute, 
                ReferFile, UpdIp, UpdDatm, UpdAdminIdx, IFNULL(admin.wAdminName, ''), adminName ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['changeLog']} AS log 
            LEFT JOIN {$this->_table['admin']} AS admin ON admin.wAdminIdx = log.UpdAdminIdx 
            LEFT JOIN {$this->_table['code']} AS code ON code.Ccd = log.UpdTypeCcd AND GroupCcd='656'
            ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 로그인 로그
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function loginlogList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = "MemIdx, IsLogin, LoginIp, LoginDatm ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['loginLog']} AS log ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 사용자 기기등록정보
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function deviceList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = "MemIdx, IsLogin, LoginIp, LoginDatm ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['loginLog']} AS log ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }
}