<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends WB_Model
{
    private $_colname = [ ];
    private $_table = [
        'member' => 'lms_Member',
        'info' => 'lms_Member_OtherInfo',
        'loginlog' => 'lms_Member_Login_Log',
        'infolog' => 'lms_Member_Change_Log',
        'outlog' => 'lms_Member_Out_Log',
        'device' => 'lms_member_device',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사용자 정보 읽어오기
     * @param boolean $is_count
     * @param array $arr_cond
     * @return int|array
     */
    public function getMember($is_count = false, $arr_cond = [])
    {
        if(empty($arr_cond) === true) {
            return ($is_count === true) ? 0 : [];
        }
        
        if($is_count === true){
            $column = ' COUNT(*) AS rownums ';

        } else {
            $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, 
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Mem.MailEnc) AS Mail, Info.MailRcvStatus,
            IFNULL(Mem.JoinDate, '') AS JoinDate, 
            IFNULL(Mem.IsChange, '') AS IsChange,
            IFNULL(Mem.ChangeDatm, '') AS ChangeDate,
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'P' AND IsUse='Y' ) AS PcCount,
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'M' AND IsUse='Y' ) AS MobileCount             
            ";
        }

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = $this->_conn->makeWhere($arr_cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 사용자 정보 수정
     * @param $MemIdx
     * @param array $data
     * @return bool
     */
    public function setMember($MemIdx, $data = [])
    {
        return true;
    }

    /**
     * 새로운 사용자 등록
     * @param array $data
     * @return int
     */
    public function newMember($data = [])
    {
        return 1234;
    }

    /**
     * 사용자 탈퇴처리
     * @param $MemIdx
     * @return bool
     */
    public function outMember($MemIdx)
    {
        return true;
    }

    /**
     * 사용자 등록된 디바이스 목록
     * @param $MemIdx
     * @param bool $onlyActive
     * @return array
     */
    public function listDevice($MemIdx, $onlyActive = true)
    {
        return [];
    }

    /**
     * 사용자 디바이스 정보
     * @param $MemIdx
     * @param $deviceID
     * @return array
     */
    public function getDevice($MemIdx, $deviceID)
    {
        return [];
    }

    /**
     * 사용자 새로운 디바이스 등록
     * @param $MemIdx
     * @param $deviceType
     * @param $deviceID
     * @return bool
     */
    public function newDevice($MemIdx, $deviceType, $deviceID)
    {
        return true;
    }

    /**
     * 인증메일 정보를 읽어온다.
     * @param $certKey
     * @param $mail
     */
    public function getMailAuth($certKey, $mail)
    {

    }

    /**
     * 인증메일정보 입력
     */
    public function setMailAuth($input = [])
    {

    }

    // 메일 인증 처리후 업데이트
    public function updMailAuth($input = [])
    {
        
    }

}
