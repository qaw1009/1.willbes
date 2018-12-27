<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobInfo extends \app\controllers\BaseController
{
    protected $models = array('sys/code','sys/btob');
    protected $helpers = array();
    private $_ccd = ['672','673','674','699'];


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_condition = [
        ];

        $list = $this->btobModel->listCompany(false,$arr_condition,null,null,['A.BtobIdx' => 'desc']);

        $this->load->view('sys/btob/index', [
            'data' => $list
        ]);

    }


    public function create($params=[])
    {

        $codes = $this->codeModel->getCcdInArray($this->_ccd);

        $method='POST';
        $btobidx = null;
        $data = null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $btobidx = $params[0];
            $data = $this->btobModel->findCompanyForModify($btobidx);
        }

        $this->load->view('sys/btob/create_modal',[
            'method' => $method
            ,'tel'=>$codes['672']
            ,'hp'=>$codes['673']
            ,'control'=>$codes['699']
            ,'btobidx' => $btobidx
            ,'data' => $data
        ]);

    }


    public function store()
    {
        $rules = [
            ['field' => 'BtobName', 'label' => '제휴사명', 'rules' => 'trim|required'],
        ];

        if(empty($this->_reqP('btobidx')) === true){
            $method = 'add';
        } else {
            $method = 'modify';
            $rules = array_merge($rules,[
                ['field' => 'btobidx', 'label' => '식별자', 'rules' => 'trim|required'],
            ]);
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobModel->{$method.'Company'}($this->_reqP(null));

        //var_dump($result);exit;

        $this->json_result($result,'저장 되었습니다.',$result);
    }

}