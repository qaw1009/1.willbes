<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsGateway extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('stats/gateway/index',[
        ]);
    }

    public function listAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $model_prefix = element('search_stats_type', $arr_input) === 'gather' ? 'gatherStats' : 'stats';
        $count = $this->{$model_prefix.'GatewayModel'}->getGatewayHistoryList(true, $arr_input);
        if($count > 0) {
            $list = $this->{$model_prefix.'GatewayModel'}->getGatewayHistoryList(false, $arr_input);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}