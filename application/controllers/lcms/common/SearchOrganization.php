<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchOrganization extends \app\controllers\BaseController
{
    protected $models = array('_wbs/sys/code', '_wbs/sys/organization');
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
                    'ORG.wOrgCode' => $this->_reqP('search_value'),
                    'ORG.wOrgName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->organizationModel->listOrganization(true, $arr_condition);
        if ($count > 0) {
            $list = $this->organizationModel->listOrganization(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['ParentOrgCode' => 'ASC', 'ORG.wOrderNum' => 'ASC']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}