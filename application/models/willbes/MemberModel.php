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
     * @param array $data
     * @return array
     */
    public function getMember($data = [])
    {
        return [];
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
}
