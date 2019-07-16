<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends \app\controllers\BaseController
{
    protected $models=array('sys/code','site/marketing/contract');
    protected $helpers=array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('site/marketing/contract/index',[
        ]);
    }

    /**
     * 계약목록
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params=[])
    {
        $search_value = $this->_req('search_value');
        $search_date_type = $this->_req('search_date_type');
        $search_sdate= $this->_req('search_sdate');
        $search_edate= $this->_req('search_edate');

        $arr_condition = [
            'EQ' => [
            ],
            'ORG' => [
                'LKB' => [
                    'gc.ContName' => $search_value,
                    'gc.CompInfo' => $search_value,
                    'gc.CompPerson' => $search_value,
                    'gc.Content' => $search_value
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
        $count = $this->contractModel->listContract(true, $arr_condition, null, null);

        if($count > 0) {
            $list = $this->contractModel->listContract(false,$arr_condition, $this->_req('length'),$this->_req('start'),['gc.ContIdx' => 'desc'] );
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 등록/수정폼
     * @param array $params1
     */
    public function create($params=[])
    {
        $method='POST';
        $ContIdx=null;
        $data=null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $ContIdx=$params[0];
            $arr_condition = [
              'EQ' => ['gc.ContIdx' => $ContIdx]
            ];

            $data = $this->contractModel->listContract(false,$arr_condition);
        }

        $this->load->view('site/marketing/contract/create_modal',[
            'method' => $method,
            'ContIdx' => $ContIdx,
            'data' => empty($data) == true ? null : $data[0]
        ]);
    }

    /**
     * 처리프로세스
     */
    public function store()
    {
        $method='add';

        $rules = [
            ['field'=>'ContName', 'label' => '계약명', 'rules' => 'trim|required'],
            ['field'=>'StartDate', 'label' => '계약일', 'rules' => 'trim|required'],
            ['field'=>'EndDate', 'label' => '계약일', 'rules' => 'trim|required'],
            ['field' => 'ExecutePrice', 'label' => '집행금액', 'rules' => 'trim|required|integer'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('ContIdx',false)) === false) {
            $method='modify';
        }
        $result = $this->contractModel->{$method.'Contract'}($this->_reqP(null));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

}
