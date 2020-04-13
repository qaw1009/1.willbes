<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsSearch extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true, true);
        $def_site_code = key($arr_site_code);
        $this->load->view('stats/search/index',[
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
        ]);
    }

    public function listAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $count = $this->statsSearchModel->getSearchHistoryList(true, $arr_input);

        if($count > 0) {
            $list = $this->statsSearchModel->getSearchHistoryList(false, $arr_input);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}