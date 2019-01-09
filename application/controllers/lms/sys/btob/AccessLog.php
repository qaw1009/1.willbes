<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessLog extends \app\controllers\BaseController
{
    protected $models = array('sys/code','sys/btob');
    protected $helpers = array();



    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $arr_condition = [
        ];

        $list = $this->btobModel->listCompany(false,$arr_condition,null,null,['A.BtobIdx' => 'desc']);

        $this->load->view('sys/btob/accesslog_index', [
            'list_company' => $list
        ]);

    }

    /**
     * ip 목록추출
     * @return CI_Output
     */
    public function listAjax()
    {

        $arr_condition = [
            'EQ' => [
                'B.BtoBIdx' => $this->_reqP('btobidx'),
            ]
            , 'LKB' => [
                'A.RegIp' =>  $this->_reqP('search_value'),
            ],
        ];
        $order_by =  ['A.BalIdx'=>'desc'];

        $list = [];
        $count = $this->btobModel->listLog(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobModel->listLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
