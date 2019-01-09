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


    /**
     * IP 등록 폼
     * @param array $params
     */
    public function createIp($params=[])
    {

        $method='POST';
        $btobidx = $params[0];

        $this->load->view('sys/btob/create_ip_modal',[
            'method' => $method
            ,'btobidx' => $btobidx
       ]);

    }

    /**
     * ip 등록 처리
     */
    public function storeIp()
    {
        $rules = [
            ['field' => 'btobidx', 'label' => '제휴사식별자', 'rules' => 'trim|required'],
            ['field' => 'ApprovalIp', 'label' => 'IP주소', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobModel->addIp($this->_reqP(null));
        //echo var_dump($result);exit;
        $this->json_result($result,'저장 되었습니다.',$result);
    }


    /**
     * ip 목록추출
     * @return CI_Output
     */
    public function listIp()
    {

        $arr_condition = [
            'EQ' => [
                'A.BtoBIdx' => $this->_reqP('btobidx'),
            ]
        ];
        $order_by =  ['A.BiIdx'=>'desc'];

        $list = [];
        $count = $this->btobModel->listIp(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobModel->listIp(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }


    public function deleteIp()
    {
        $result = $this->btobModel->deleteIp($this->_reqP(null));

        return $this->json_result($result, '', $result);

    }
}
