<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRoulette extends \app\controllers\FrontController
{
    protected $models = array('rouletteF','memberF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store');
    private $_err_data = [
        'ret_cd' => false,
        'ret_msg' => '잘못된 접근입니다.',
        'ret_status' => _HTTP_ERROR
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 룰렛데이터 및 부가정보 조회
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $roulette_data = [];
        $other_list = [];

        //룰렛 데이터 조회
        $roulette_code = $params[0];
        $data_info = [];
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code,
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];
        $arr_condition['RAW'] = ['(RouletteStartDatm <= "' => date('Y-m-d H:i') . '" AND RouletteEndDatm >= "' . date('Y-m-d H:i') . '")'];
        $data_info['roulette_data'] = $this->rouletteFModel->findRoulette($arr_condition);
        if (empty($data_info['roulette_data']) === true) {
            $this->_err_data['ret_msg'] = '조회된 룰렛 상품이 없습니다.';
            return $this->json_result(false, '', $this->_err_data);
        }

        $defaultCondition = $this->_defaultCondition($data_info['roulette_data']['CountType']);

        if (empty($roulette_code) === false) {
            $data = $this->rouletteFModel->listRouletteInfo($roulette_code, $defaultCondition);
            if (empty($data) === false) {
                foreach ($data as $key => $val) {
                    $roulette_data['RouletteCode'] = $val['RouletteCode'];
                    $roulette_data['RouletteStartDatm'] = $val['RouletteStartDatm'];
                    $roulette_data['RouletteEndDatm'] = $val['RouletteEndDatm'];

                    if ($val['ProdQty'] <= $val['ProdUsedCnt']) {
                        if (empty($val['FinishFileFullPath']) === true) {
                            $other_list[$key]['image'] = $this->rouletteFModel->_finish_img_path;
                        } else {
                            $other_list[$key]['image'] = $val['FinishFileFullPath'];
                        }
                    } else {
                        $other_list[$key]['image'] = $val['FileFullPath'];
                    }
                    $other_list[$key]['text'] = $val['ProdName'];
                }
            }
        }

        $result = [
            'roulette_data' => $roulette_data,
            'other_list' => $other_list
        ];

        return $this->response([
            'data' => $result,
        ]);
    }

    /**
     * 룰렛 데이터 저장
     * @param array $params
     * @return CI_Output
     */
    public function store($params = [])
    {
        if (empty($params[0]) === true) {
            return $this->json_result(false, '', $this->_err_data);
        }

        //룰렛 데이터 조회
        $roulette_code = $params[0];
        $data_info = [];
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code,
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];
        $arr_condition['RAW'] = ['(RouletteStartDatm <= "' => date('Y-m-d H:i') . '" AND RouletteEndDatm >= "' . date('Y-m-d H:i') . '")'];
        $data_info['roulette_data'] = $this->rouletteFModel->findRoulette($arr_condition);
        if (empty($data_info['roulette_data']) === true) {
            $this->_err_data['ret_msg'] = '조회된 룰렛 상품이 없습니다.';
            return $this->json_result(false, '', $this->_err_data);
        }

        //신규회원체크
        if ($data_info['roulette_data']['NewMemberJoinType'] == 'Y') {
            $member_data = $this->memberFModel->getMemberForJoinDate($this->session->userdata('mem_idx'), $data_info['roulette_data']['NewMemberJoinStartDate'],$data_info['roulette_data']['NewMemberJoinEndDate']);
            if (empty($member_data) === true) {
                $this->_err_data['ret_msg'] = "{$data_info['roulette_data']['NewMemberJoinStartDate']} ~ {$data_info['roulette_data']['NewMemberJoinEndDate']}까지 신규가입한 회원만 참여할 수 있습니다.";
                return $this->json_result(false, '', $this->_err_data);
            }
        }

        $result = $this->rouletteFModel->{'storeRoulette_'.$data_info['roulette_data']['ProbabilityType']}($roulette_code, $data_info);
        if ($result['ret_cd'] === false) {
            $this->_err_data['ret_msg'] = $result['ret_msg'];
            return $this->json_result(false, '', $this->_err_data);
        } else {
            return $this->json_result($result['ret_cd'], '당첨', [], $result['ret_msg']);
        }
    }

    /**
     * 룰렛 정책 기준 조건 셋팅 (1일, 전체)
     * @param $count_type
     * @return array
     */
    private function _defaultCondition($count_type)
    {
        $arr_condition = [];

        if ($count_type == 'D') {
            $arr_condition = [
                'RAW' => [
                    'RegDatm > ' => 'CURRENT_DATE()'
                ]
            ];
        }
        return $arr_condition;
    }
}