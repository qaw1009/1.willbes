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

        //룰렛 부가정보 조회
        $data_info['roulette_data_otherinfo'] = $this->rouletteFModel->listRouletteOtherInfo($roulette_code);
        if (empty($data_info['roulette_data_otherinfo']) === true) {
            $this->_err_data['ret_msg'] = '조회된 룰렛 부가상품이 없습니다.';
            return $this->json_result(false, '', $this->_err_data);
        }

        //룰렛 상품 총 당첨수
        $data_member_info['list_used_total_count'] = $this->rouletteFModel->getUsedTotalCount($roulette_code);

        //회원 당첨 총횟수
        $data_member_info['used_total_member_count'] = $this->rouletteFModel->getUsedMemberCount();

        //금일 회원 당첨 횟수
        $data_member_info['used_today_member_count'] = $this->rouletteFModel->getUsedMemberCount('today');

        //룰렛참여 가능여부 체크
        $result = $this->_rouletteDataValidate($data_info, $data_member_info);
        if ($result['ret_cd'] === false) {
            $this->_err_data['ret_msg'] = $result['ret_msg'];
            return $this->json_result(false, '', $this->_err_data);
        }

        //당첨상품리턴
        $result_data = $this->_roulettePlay($data_info);
        if (empty($result_data) === true) {
            $this->_err_data['ret_msg'] = '추출된 상품이 없습니다. 관리자에게 문의해 주세요.';
            return $this->json_result(false, '', $this->_err_data);
        }

        //당첨된상품 저장
        $roulette_result = $this->rouletteFModel->addMemberRoulette($result_data['result_rro_idx']);
        if ($roulette_result !== true) {
            $this->_err_data['ret_msg'] = $roulette_result;
            return $this->json_result(false, '', $this->_err_data);
        }

        return $this->json_result(true, '당첨', [], $result_data['result']);
    }

    /**
     * 룰렛 참여 가능여부 체크
     * @param $data_info
     * @param $data_member_info
     * @return array
     */
    private function _rouletteDataValidate($data_info, $data_member_info)
    {
        $result = ['ret_cd' => true, 'ret_msg' => ''];

        //잔여상품 상품별 체크
        $chk_true_count = 0;
        foreach ($data_info['roulette_data_otherinfo'] as $row) {
            if ($row['ProdQty'] > 0) {
                if (empty($data_member_info['list_used_total_count'][$row['RroIdx']]) === true) {
                    $chk_true_count = $chk_true_count + 1;
                } else {
                    if ($row['ProdQty'] > $data_member_info['list_used_total_count'][$row['RroIdx']]) {
                        $chk_true_count = $chk_true_count + 1;
                    }
                }
            }
        }
        if ($chk_true_count < 1) {
            $result = ['ret_cd' => false, 'ret_msg' => '잔여 상품이 없습니다.'];
        }

        //총참여횟수 체크
        if ($data_info['roulette_data']['MaxLimitCount'] <= $data_member_info['used_total_member_count']['UsedMemberCount']) {
            $result = ['ret_cd' => false, 'ret_msg' => '룰렛 참여 횟수가 모두 소진되어 더 이상 참여할 수 없습니다.'];
        }

        //상품일일참여횟수 체크
        if ($data_info['roulette_data']['DayLimitCount'] <= $data_member_info['used_today_member_count']['UsedMemberCount']) {
            $result = ['ret_cd' => false, 'ret_msg' => '금일 룰렛 참여 횟수가 모두 소진되었습니다. 내일 다시 참여해 주세요.'];
        }

        return $result;
    }

    /**
     * 랜덤/설정 값 및 미사용수 기준으로 룰렛 상품 리턴
     * 리턴 값 : 룰렛상품번호(상품수 + 랜덤 index 값), 상품식별자(저장용)
     * @param $data_info
     * @return array
     */
    private function _roulettePlay($data_info)
    {
        $result = [];
        $set_prod_data = [];
        $prod_qty = 0;

        foreach ($data_info['roulette_data_otherinfo'] as $row) {
            if (empty($row['unUsedCount']) === true || $row['unUsedCount'] < 1) {
                $prod_qty = $prod_qty + 0;
            } else {
                $prod_qty = $prod_qty + $row['unUsedCount'];
            }
        }

        /**
         * 확률값 셋팅
         * 1:자동
         * 2:수동(설정된 확률 값), 남은 수량이 없을 경우 확률은 0으로 셋팅
         */
        if ($data_info['roulette_data']['ProbabilityType'] == 1) {
            foreach ($data_info['roulette_data_otherinfo'] as $row) {
                $set_prod_data['rro_idx'][] = $row['RroIdx'];
                if (empty($row['unUsedCount']) === true || $row['unUsedCount'] < 1 || $prod_qty < 1) {
                    $set_prod_data['probability'][] = 0;
                } else {
                    $set_prod_data['probability'][] = ceil(($row['unUsedCount'] / $prod_qty) * 100);
                }
            }
        } else {
            foreach ($data_info['roulette_data_otherinfo'] as $row) {
                $set_prod_data['rro_idx'][] = $row['RroIdx'];
                $set_prod_data['probability'][] = (empty($row['unUsedCount']) === true || $row['unUsedCount'] < 1) ? 0 : $row['ProdProbability'];
            }
        }

        if (empty($set_prod_data) === false) {
            $index = $this->_weighted_random($set_prod_data['probability']);
            $random_rro_idx = $set_prod_data['rro_idx'][$index];
            $roulette_num = $index + 1;

            $result = [
                'result' => $roulette_num,
                'result_rro_idx' => $random_rro_idx
            ];
        }
        return $result;
    }

    /**
     * 랜덤값 리턴
     * @param $weights
     * @return bool|int
     */
    private function _weighted_random($weights) {
        $r = rand(1, array_sum($weights));
        for($i=0; $i<count($weights); $i++) {
            $r -= $weights[$i];
            if($r < 1) return $i;
        }
        return false;
    }

    /**
     * 상품개수기준 랜덤 값 추출
     * @param int $prod_num
     * @return int
     */
    private function _prod_randum($prod_num = 1)
    {
        return mt_rand(1, $prod_num);
    }
}