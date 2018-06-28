<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends WB_Model
{
    private $_colname = [
        'MemId'

    ];

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

    public function getMember($MemIdx)
    {

    }

    public function setMember($MemIdx)
    {

    }

    public function newMember($data)
    {

    }

    public function outMember($MemIdx)
    {

    }

    public function listDevice($MemIdx, $onlyActive = true)
    {

    }

    public function getDevice($MemIdx, $deviceID)
    {

    }

    public function newDevice($MemIdx, $deviceType, $deviceID){

    }
}
