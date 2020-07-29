<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends \app\controllers\BaseController
{
    protected $models = array('correct/btobCorrect');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
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

        $result = $this->btobCorrectModel->listCorrectUnit(false, $arr_condition, null, null, ['CU.CorrectIdx' => 'desc']);
        $data = array_pluck($result,'Title', 'CorrectIdx');
        return $this->response($data);
    }
}