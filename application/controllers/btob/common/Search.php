<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends \app\controllers\BaseController
{
    protected $models = array('correct/btobCorrect');
    protected $helpers = array();
    public $_sess_btob_role_idx = null;
    private $_is_authority = true;

    public function __construct()
    {
        parent::__construct();
        $this->_sess_btob_role_idx = $this->session->userdata('btob.admin_auth_data')['Role']['RoleIdx'];
        if ($this->_sess_btob_role_idx == '6005') {
            $this->_is_authority = false;
        }
    }

    /**
     * 회차조회
     * @return CI_Output
     */
    public function correctUnitAjax()
    {
        $prod_code = $this->_reqP('prod_code');
        $arr_condition = [
            'EQ' => [
                'CU.SiteCode' => $this->session->userdata('btob.site_code'),
                'CU.ProdCode' => $prod_code,
                'CU.IsUse' => 'Y',
                'CU.IsStatus' => 'Y',
            ],
            'RAW' => [
                'CU.EndDate < ' => '\''.date('Y-m-d').'\''
            ]
        ];

        $arr_condition_authority = [
            'EQ' => [
                'a.ProdCode' => $prod_code,
                'b.AssignAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'a.IsStatus' => 'Y',
                'b.IsStatus' => 'Y',
            ],
        ];

        $result = $this->btobCorrectModel->listCorrectUnit(false, $arr_condition, null, null, ['CU.CorrectIdx' => 'desc'], $this->_is_authority, $arr_condition_authority);
        $data = array_pluck($result,'Title', 'CorrectIdx');
        return $this->response($data);
    }
}