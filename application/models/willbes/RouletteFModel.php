<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouletteFModel extends WB_Model
{
    private $_table = [
        'roulette' => 'lms_roulette',
        'roulette_member' => 'lms_roulette_member',
        'roulette_otherinfo' => 'lms_roulette_otherinfo'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 룰렛 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findRoulette($arr_condition)
    {
        $column = 'RouletteCode, Title, DayLimitCount, MaxLimitCount, RouletteStartDatm, RouletteEndDatm, ProbabilityType';
        $from = " FROM {$this->_table['roulette']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 순번을 이용한 당첨상품 조회, 룰렛유형 : 수동
     * @param $roulette_code
     * @param $data_info
     * @return array|bool
     */
    public function storeRoulette_1($roulette_code, $data_info)
    {
        $this->_conn->trans_begin();
        try {
            $data_info['roulette_data_otherinfo'] = $this->_listRouletteOtherInfo($roulette_code);
            if (empty($data_info['roulette_data_otherinfo']) === true) {
                throw new \Exception('조회된 룰렛 부가상품이 없습니다.');
            }

            //룰렛 상품 총 당첨수
            $data_member_info['list_used_total_count'] = $this->_getUsedTotalCount($roulette_code);

            //회원 당첨 총횟수
            $data_member_info['used_total_member_count'] = $this->_getUsedMemberCount();

            //금일 회원 당첨 횟수
            $data_member_info['used_today_member_count'] = $this->_getUsedMemberCount('today');

            //룰렛참여 가능여부 체크
            $result = $this->_rouletteDataValidate($data_info, $data_member_info);
            if ($result !== true) {
                throw new \Exception($result['ret_msg']);
            }

            //당첨 테이블 회원 임시 저장
            $roulette_result = $this->_addMemberRoulette($roulette_code);
            if ($roulette_result !== true) {
                throw new \Exception($roulette_result['ret_msg']);
            }
            $ins_rm_idx = $this->_conn->insert_id();

            //순번 가져오기
            $arr_condition = ['EQ' => ['RouletteCode' => $roulette_code]];
            $arr_temp_member_data = $this->_findGetUsedCount($arr_condition);

            //순번에 해당되는 상품 조회 null -> 0으로된 상품 다시 조회
            $arr_condition = [
                'EQ' => [
                    'RouletteCode' => $roulette_code,
                    'IsUse' => 'Y'
                ]
            ];
            $str_condition = ' AND JSON_CONTAINS(ProdWinTurns, \'["'.$arr_temp_member_data['UsedCount'].'"]\')';
            $otherinfo_data = $this->_findRouletteOtherInfo($arr_condition, $str_condition);
            if (empty($otherinfo_data) === true) {
                $arr_condition = [
                    'EQ' => [
                        'RouletteCode' => $roulette_code,
                        'IsUse' => 'Y'
                    ],
                    'RAW' => [
                        'ProdWinTurns = ' => '"0"'
                    ]
                ];
                $otherinfo_data = $this->_findRouletteOtherInfo($arr_condition);
            }
            if (empty($otherinfo_data) === true) {
                throw new \Exception('조회된 룰렛 부가상품이 없습니다.');
            }

            //당첨된 상품수 조회
            $arr_condition = ['EQ' => ['RroIdx' => $otherinfo_data['RroIdx']]];
            $used_count = $this->_findGetUsedCount($arr_condition);
            if ($otherinfo_data['ProdQty'] <= $used_count['UsedCount']) {
                throw new \Exception('해당 상품의 당첨수가 초과되었습니다. 다시 시도해 주세요.');
            }

            //상품식별자 UPDATE
            $this->_conn->set('RroIdx', $otherinfo_data['RroIdx'])->where('RmIdx', $ins_rm_idx);
            if ($this->_conn->update($this->_table['roulette_member']) === false) {
                throw new \Exception('당첨 상품 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return array('ret_cd' => true, 'ret_msg' => $otherinfo_data['OrderNum']);
    }

    /**
     * 룰렛저장, 룰렛유형 : 자동
     * @param $roulette_code
     * @param $data_info
     * @return array|bool
     */
    public function storeRoulette_2($roulette_code, $data_info)
    {
        $this->_conn->trans_begin();
        try {
            $data_info['roulette_data_otherinfo'] = $this->_listRouletteOtherInfo($roulette_code);
            if (empty($data_info['roulette_data_otherinfo']) === true) {
                throw new \Exception('조회된 룰렛 부가상품이 없습니다.');
            }

            //룰렛 상품 총 당첨수
            $data_member_info['list_used_total_count'] = $this->_getUsedTotalCount($roulette_code);

            //회원 당첨 총횟수
            $data_member_info['used_total_member_count'] = $this->_getUsedMemberCount();

            //금일 회원 당첨 횟수
            $data_member_info['used_today_member_count'] = $this->_getUsedMemberCount('today');

            //룰렛참여 가능여부 체크
            $result = $this->_rouletteDataValidate($data_info, $data_member_info);
            if ($result !== true) {
                throw new \Exception($result['ret_msg']);
            }

            //당첨상품리턴
            $result_data = $this->_roulettePlay($data_info);
            if (empty($result_data) === true) {
                throw new \Exception('추출된 상품이 없습니다. 관리자에게 문의해 주세요.');
            }

            //당첨된상품 저장
            $roulette_result = $this->_addWinMemberRoulette($result_data['result_rro_idx']);
            if ($roulette_result !== true) {
                throw new \Exception($roulette_result['ret_msg']);
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return array('ret_cd' => true, 'ret_msg' => $result_data['result_win_num']);
    }



    /**
     * 룰렛 부가정보 및 미사용수 조회
     * @param $roulette_code
     * @return mixed
     */
    public function _listRouletteOtherInfo($roulette_code)
    {
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code,
                'IsUse' => 'Y'
            ]
        ];
        $column = '
            a.RroIdx, a.RouletteCode, a.ProdName, a.ProdQty, a.ProdProbability
            ,(cast(a.ProdQty as signed) - (SELECT COUNT(*) FROM lms_roulette_member WHERE RroIdx = a.RroIdx)) AS unUsedCount
        ';
        $from = " FROM {$this->_table['roulette_otherinfo']} AS a ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = ' order by a.OrderNum asc, a.RroIdx asc';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    /**
     * 룰렛 부가정보 조회
     * @param $arr_condition
     * @param string $str_condition
     * @return mixed
     */
    private function _findRouletteOtherInfo($arr_condition, $str_condition = '')
    {
        $column = 'RroIdx, RouletteCode, ProdName, ProdQty, ProdProbability, OrderNum';
        $from = " FROM {$this->_table['roulette_otherinfo']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        if (empty($str_condition) === false) {
            $where .= $str_condition;
        }
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 당첨 테이블 카운트
     * @param $arr_condition
     * @return mixed
     */
    private function _findGetUsedCount($arr_condition)
    {
        $column = 'COUNT(*) AS UsedCount';
        $from = " FROM {$this->_table['roulette_member']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 룰렛 상품 총 당첨수
     * @param $roulette_code
     * @return array
     */
    private function _getUsedTotalCount($roulette_code)
    {
        $this->_conn->select("RroIdx, COUNT(*) AS UsedTotalCount");
        $this->_conn->from($this->_table['roulette_member']);
        $this->_conn->where_in('RroIdx', "select RroIdx from {$this->_table['roulette_otherinfo']} where RouletteCode = '{$roulette_code}' AND IsUse = 'Y'", false);
        $this->_conn->group_by('RroIdx');
        $data = $this->_conn->get()->result_array();
        return array_pluck($data, 'UsedTotalCount', 'RroIdx');
    }

    /**
     * 회원 당첨 횟수
     * @param $to_day
     * @return mixed
     */
    private function _getUsedMemberCount($to_day = '')
    {
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        if ($to_day == 'today') {
            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'RegDatm > ' => 'CURRENT_DATE()'
                ]
            ]);
        }

        $column = 'COUNT(*) AS UsedMemberCount';
        $from = " FROM {$this->_table['roulette_member']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 룰렛 참여 가능여부 체크
     * @param $data_info
     * @param $data_member_info
     * @return array|bool
     */
    private function _rouletteDataValidate($data_info, $data_member_info)
    {
        try {
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
                throw new \Exception('잔여 상품이 없습니다.');
            }

            //총참여횟수 체크
            if ($data_info['roulette_data']['MaxLimitCount'] <= $data_member_info['used_total_member_count']['UsedMemberCount']) {
                throw new \Exception('룰렛 참여 횟수가 모두 소진되어 더 이상 참여할 수 없습니다.');
            }

            //상품일일참여횟수 체크
            if ($data_info['roulette_data']['DayLimitCount'] <= $data_member_info['used_today_member_count']['UsedMemberCount']) {
                throw new \Exception('금일 룰렛 참여 횟수가 모두 소진되었습니다. 내일 다시 참여해 주세요.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
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

        foreach ($data_info['roulette_data_otherinfo'] as $row) {
            $set_prod_data['rro_idx'][] = $row['RroIdx'];
            $set_prod_data['probability'][] = (empty($row['unUsedCount']) === true || $row['unUsedCount'] < 1) ? 0 : $row['ProdProbability'];
        }

        if (empty($set_prod_data) === false) {
            $index = $this->_weighted_random($set_prod_data['probability']);
            $random_rro_idx = $set_prod_data['rro_idx'][$index];
            $roulette_num = $index + 1;

            $result = [
                'result_win_num' => $roulette_num,
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
     * 당첨테이블 회원 정보 임시 저장
     * @param $roulette_code
     * @return array|bool
     */
    private function _addMemberRoulette($roulette_code)
    {
        try {
            //당첨 테이블 회원 임시 저장
            $data = [
                'RouletteCode' => $roulette_code,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['roulette_member']) === false) {
                throw new \Exception('룰렛 요청 정보 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 당첨데이터 저장
     * @param $rro_idx
     * @return array|bool
     */
    private function _addWinMemberRoulette($rro_idx)
    {
        try {
            //룰렛부가정보 조회
            $arr_condition = [
                'EQ' => [
                    'RroIdx' => $rro_idx,
                    'IsUse' => 'Y'
                ]
            ];
            $otherinfo_data = $this->_findRouletteOtherInfo($arr_condition);
            if (empty($otherinfo_data) === true) {
                throw new \Exception('조회된 부가정보가 없습니다. 다시 시도해 주세요');
            }

            //당첨된 상품수 조회
            $arr_condition = ['EQ' => ['RroIdx' => $rro_idx]];
            $used_count = $this->_findGetUsedCount($arr_condition);
            if ($otherinfo_data['ProdQty'] <= $used_count['UsedCount']) {
                throw new \Exception('해당 상품의 당첨수가 초과되었습니다. 다시 시도해 주세요.');
            }

            //당첨데이터 저장
            $data = [
                'RroIdx' => $rro_idx,
                'RouletteCode' => $otherinfo_data['RouletteCode'],
                'MemIdx' => $this->session->userdata('mem_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['roulette_member']) === false) {
                throw new \Exception('당첨상품 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
}