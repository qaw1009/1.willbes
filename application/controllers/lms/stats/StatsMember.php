<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsMember extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['718']);
        $this->load->view('stats/member/index',[
            'arr_site_code' => get_auth_site_codes(true),
            'code_interest' => $codes['718'],
        ]);
    }

    public function member($params=[])
    {
        $get_type = empty($params[0]) === true ? 'Count': $params[0];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $data = $this->statsMemberModel->{'getMember'.$get_type}($arr_input);
        return $this->response([
            'data' => $data
        ]);
    }
}