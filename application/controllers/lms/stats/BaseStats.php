<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStats extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'stats/statsMember', 'stats/statsOrder', 'stats/statsBanner', 'stats/statsSearch');
    protected $helpers = array();
    //protected $_arr_site_code = array();

    public function __construct()
    {
        parent::__construct();
        //$this->_arr_site_code = get_auth_site_codes(true);
    }

    public function index()
    {
        return;
    }
}