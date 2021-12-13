<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStats extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code'
                                        , 'stats/statsMember', 'stats/statsOrder', 'stats/statsBanner', 'stats/statsSearch', 'stats/statsGateway', 'stats/statsVisitor'
                                        , 'stats/gatherStatsMember'
                                        , 'stats/gatherStatsSearch'
                                        , 'stats/gatherStatsBanner'
                                        , 'stats/gatherStatsOrder'
                                        );

    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return;
    }

    public function getData($params=[])
    {
        $get_type = empty($params[0]) === true ? 'Member': $params[0];
        $get_method = empty($params[1]) === true ? 'Count': $params[1];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $model_prefix = element('search_stats_type', $arr_input) === 'gather' ? 'gatherStats' : 'stats';
        $data = $this->{$model_prefix.$get_type.'Model'}->{'get'.$get_type.$get_method}($arr_input);
        return $this->response([
            'data' => $data
        ]);
    }
}