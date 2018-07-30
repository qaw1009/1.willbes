<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassRoomModel extends WB_Model
{
    private $_table = [
        'class_room' => 'lms_class_room',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }


}