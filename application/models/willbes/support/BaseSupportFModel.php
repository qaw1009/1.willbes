<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupportFModel extends WB_Model
{
    protected $_table = [
        'board' => 'vw_board'
        ,'board_qna' => 'vw_board_qna'
        ,'menu' => 'lms_site_menu'
        ,'code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

}