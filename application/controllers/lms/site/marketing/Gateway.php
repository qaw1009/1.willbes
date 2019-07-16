<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gateway extends \app\controllers\BaseController
{
    protected $models = array('sys/code','site/marketing/contract','site/marketing/gateway');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['663']);
        $this->load->view('site/marketing/gateway/index',[
            'adType_ccd' => $codes['663'],
        ]);

    }

    public function listAjax($params=[])
    {
        $search_value = $this->_req('search_value');
        $search_date_type = $this->_req('search_date_type');
        $search_sdate= $this->_req('search_sdate');
        $search_edate= $this->_req('search_edate');
        $search_gwtype_ccd = $this->_req('search_gwtype_ccd');
        $search_site_code = $this -> _req('search_site_code');

        $arr_condition = [
            'EQ' => [
                'g.GwTypeCcd' => $search_gwtype_ccd,
                'g.SiteCode' => $search_site_code
            ],
            'ORG' => [
                'LKB' => [
                    'gc.ContName' => $search_value,
                    'g.GwName' => $search_value,
                    'g.MoveUrl' => $search_value,
                    'g.TargetLocation' => $search_value
                ]
            ]
        ];

        if(!empty($search_sdate) && !empty($search_edate)) {
            $arr_condition = array_merge($arr_condition,[
                'BDT' => [
                    $search_date_type => [$search_sdate, $search_edate]
                ],
            ]);
        }

        $list = [];
        $count = $this->gatewayModel->listGateway(true, $arr_condition, null, null);

        if($count > 0) {
            $list = $this->gatewayModel->listGateway(false,$arr_condition, $this->_req('length'),$this->_req('start'),['gc.ContIdx'=> 'desc','g.GwIdx' => 'desc'] );
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function create($params=[])
    {
        $codes = $this->codeModel->getCcdInArray(['663']);

        $method='POST';
        $GwIdx=null;
        $data=null;

        $contract_list = $this->contractModel->listContract(false,[],null,null,['gc.ContIdx' => 'desc']);

        if(empty($params[0]) === false) {
            $method='PUT';
            $GwIdx=$params[0];
            $arr_condition = [
                'EQ' => ['g.GwIdx' => $GwIdx]
            ];

            $data = $this->gatewayModel->listGateway(false,$arr_condition);
        }

        $this->load->view('site/marketing/gateway/create_modal',[
            'method' => $method,
            'GwIdx' => $GwIdx,
            'adType_ccd' => $codes['663'],
            'contract_list' => $contract_list,
            'data' => empty($data) == true ? null : $data[0]
        ]);
    }

    public function store()
    {
        $method='add';

        $rules = [
            ['field'=>'ContIdx', 'label' => '광고계약건', 'rules' => 'trim|required'],
            ['field'=>'GwName', 'label' => '광고명', 'rules' => 'trim|required'],
            ['field'=>'GwTypeCcd', 'label' => '광고형태', 'rules' => 'trim|required'],
            ['field' => 'ExecutePrice', 'label' => '집행금액', 'rules' => 'trim|required|integer'],
            ['field' => 'MoveUrl', 'label' => '이동URL', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('GwIdx',false)) === false) {
            $method='modify';
        }
        $result = $this->gatewayModel->{$method.'Gateway'}($this->_reqP(null));

        $this->json_result($result,'저정 되었습니다.',$result);
    }
}