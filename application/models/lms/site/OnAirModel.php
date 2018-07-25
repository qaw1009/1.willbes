<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAirModel extends WB_Model
{
    private $_table = [
        'onair' => 'lms_onair',
        'onair_date' => 'lms_onair_date',
        'onair_r_category' => 'lms_onair_r_category',
        'onair_title' => 'lms_onair_title',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function addOnAir($input = [])
    {
        print_r($input);
        exit;
    }
}