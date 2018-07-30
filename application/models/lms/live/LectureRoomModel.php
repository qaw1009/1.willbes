<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureRoomModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'live_video' => 'lms_live_video',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }


}