<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GatewayStat extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'site/marketing/contract', 'site/marketing/gateway', 'site/marketing/gatewayStat');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if(empty($arr_input)) {
            $arr_input['search_date_type'] = 'StartDate';
            $arr_input['search_sdate'] = date("Y-m-d", strtotime("-2 month", time()));
            $arr_input['search_edate'] = date("Y-m-d");
        }

        $arr_condition_contract = [];

        if(empty(element('search_value', $arr_input)) === false) {
            $arr_condition_contract = array_merge($arr_condition_contract, [
                'ORG' => [
                    'LKB' => [
                        'gc.ContName' => $arr_input['search_value'],
                        'g.GwName' => $arr_input['search_value'],
                        'g.MoveUrl' => $arr_input['search_value'],
                        'g.TargetLocation' => $arr_input['search_value']
                    ]
                ]
            ]);
        }
        if(!empty($arr_input['search_sdate'] ) && !empty($arr_input['search_edate'] )) {
            $arr_condition_contract = array_merge($arr_condition_contract, [
                'BDT' => [
                    $arr_input['search_date_type'] => [$arr_input['search_sdate'] , $arr_input['search_edate'] ]
                ],
            ]);
        }

        $contract_data = $this->gatewayStatModel->listContractStat($arr_condition_contract,['gc.ContIdx' => 'desc']);
        $gateway_data = $this->gatewayStatModel->listGatewayStat(null,['gc.ContIdx' => 'desc', 'gw.GwIdx' =>'asc']);
        $codes = $this->codeModel->getCcdInArray(['663']);
        $this->load->view('site/marketing/gatewayStat/index', [
            'adType_ccd' => $codes['663'],
            'contract_data' => $contract_data,
            'gateway_data' => $gateway_data,
            'arr_input' => $arr_input
        ]);
    }

    public function detail($params)
    {
        if(empty($params[0])) {
            return $this->json_error('계약코드가 존재하지 않습니다.');
        }

        $cont_idx = $params[0];

        $arr_condition = [
          'EQ' => ['gc.ContIdx' => $cont_idx]
        ];

        $contract_data = $this->gatewayStatModel->listContractStat($arr_condition,['gc.ContIdx' => 'desc']);
        $gateway_data = $this->gatewayStatModel->listGatewayStat($arr_condition,['gc.ContIdx' => 'desc', 'gw.GwIdx' =>'asc']);

        if(empty($contract_data)) {
            return $this->json_error('계약정보가 존재하지 않습니다.');
        }

        $this->load->view('site/marketing/gatewayStat/detail_modal', [
            'contract_data' => $contract_data[0],
            'gateway_data' => $gateway_data
        ]);
    }

}
