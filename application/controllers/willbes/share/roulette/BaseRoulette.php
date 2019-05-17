<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRoulette extends \app\controllers\FrontController
{
    protected $models = array('rouletteF');
    protected $helpers = array();
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
     * 룰렛 데이터 저장
     * @param array $params
     * @return CI_Output
     */
    public function store($params = [])
    {
        if (empty($params[0]) === true) {
            return $this->json_result(false, '', $this->_err_data);
        }

        if ($this->isLogin() !== true) {
            $this->_err_data['ret_msg'] = '로그인 후 이용해 주세요.';
            return $this->json_result(false, '', $this->_err_data);
        }

        $roulette_code = $params[0];
        $data_info = [];

        //룰렛 데이터 조회
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

        $result = $this->rouletteFModel->{'storeRoulette_'.$data_info['roulette_data']['ProbabilityType']}($roulette_code, $data_info);
        if ($result['ret_cd'] === false) {
            $this->_err_data['ret_msg'] = $result['ret_msg'];
            return $this->json_result(false, '', $this->_err_data);
        } else {
            return $this->json_result($result['ret_cd'], '당첨', [], $result['ret_msg']);
        }
    }
}