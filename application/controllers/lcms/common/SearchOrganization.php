<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchOrganization extends \app\controllers\BaseController
{
    protected $models = array('_lms/task/taskOrganization');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 조직검색 팝업
     * @param array $params
     */
    public function index($params = [])
    {
        $arr_param = array_pluck(array_chunk($params, 2), '1', '0');

        $this->load->view('lcms/common/search_organization', [
            'arr_param' => $arr_param
        ], false);
    }

    /**
     * 조직검색 팝업 AJAX
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'OrgIdx' => $this->_reqP('search_value'),
                    'OrgName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->taskOrganizationModel->listOrganization(true, $arr_condition);
        if ($count > 0) {
            $list = $this->taskOrganizationModel->listOrganization(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), []);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}