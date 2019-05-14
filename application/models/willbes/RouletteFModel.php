<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouletteFModel extends WB_Model
{
    private $_table = [
        'roulette' => 'lms_roulette',
        'roulette_member' => 'lms_roulette_member',
        'roulette_r_otherinfo' => 'lms_roulette_r_otherinfo'
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
     * 룰렛 부가정보 조회
     * @param $rro_idx
     * @return mixed
     */
    public function findRouletteOtherInfo($rro_idx)
    {
        $arr_condition = [
            'EQ' => [
                'RroIdx' => $rro_idx,
                'IsUse' => 'Y'
            ]
        ];

        $column = 'RroIdx, RouletteCode, ProdName, ProdQty, ProdProbability, ProdCount';
        $from = " FROM {$this->_table['roulette_r_otherinfo']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 룰렛 부가정보 및 미사용수 조회
     * @param $roulette_code
     * @return mixed
     */
    public function listRouletteOtherInfo($roulette_code)
    {
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code,
                'IsUse' => 'Y'
            ]
        ];
        $column = '
            a.RroIdx, a.RouletteCode, a.ProdName, a.ProdQty, a.ProdProbability, a.ProdCount
            ,(cast(a.ProdQty as signed) - (SELECT COUNT(*) FROM lms_roulette_member WHERE RroIdx = a.RroIdx)) AS unUsedCount
        ';
        $from = " FROM {$this->_table['roulette_r_otherinfo']} AS a ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    public function findGetUsedCount($rro_idx)
    {
        $arr_condition = ['EQ' => ['RroIdx' => $rro_idx]];
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
    public function getUsedTotalCount($roulette_code)
    {
        $this->_conn->select("RroIdx, COUNT(*) AS UsedTotalCount");
        $this->_conn->from($this->_table['roulette_member']);
        $this->_conn->where_in('RroIdx', "select RroIdx from {$this->_table['roulette_r_otherinfo']} where RouletteCode = '{$roulette_code}' AND IsUse = 'Y'", false);
        $this->_conn->group_by('RroIdx');
        $data = $this->_conn->get()->result_array();
        return array_pluck($data, 'UsedTotalCount', 'RroIdx');
    }

    /**
     * 회원 당첨 횟수
     * @param $to_day
     * @return mixed
     */
    public function getUsedMemberCount($to_day = '')
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
     * 당첨데이터 저장
     * @param $rro_idx
     * @return array|bool
     */
    public function addMemberRoulette($rro_idx)
    {
        $this->_conn->trans_begin();
        try {
            //룰렛부가정보 조회
            $order_info_data = $this->findRouletteOtherInfo($rro_idx);
            if (empty($order_info_data) === true) {
                throw new \Exception('조회된 부가정보가 없습니다. 다시 시도해 주세요');
            }

            //당첨된 상품수 조회
            $used_count = $this->findGetUsedCount($rro_idx);
            if ($order_info_data['ProdQty'] <= $used_count['UsedCount']) {
                throw new \Exception('해당 상품의 당첨수가 초과되었습니다. 다시 시도해 주세요.');
            }

            //당첨데이터 저장
            $data = [
                'RroIdx' => $rro_idx,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'RegIp' => $this->input->ip_address()
            ];
            if ($this->_conn->set($data)->insert($this->_table['roulette_member']) === false) {
                throw new \Exception('당첨데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}