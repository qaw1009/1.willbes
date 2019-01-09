<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportOffBoardInfo.php';

class BoardInfo extends SupportOffBoardInfo
{
    protected $_default_path = '/offinfo/boardInfo';

    public function __construct()
    {
        parent::__construct();
    }

}