<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouletteModel extends WB_Model
{
    private $_table = [
        'roulette' => 'lms_roulette',
        'roulette_r_otherinfo' => 'lms_roulette_r_otherinfo',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAllRoulette($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.RouletteCode, a.Title, a.DayLimitCount, a.MaxLimitCount, a.RouletteStartDatm, a.RouletteEndDatm, a.ProbabilityType, a.IsUse, a.IsStatus, a.Memo, a.RegDatm, a.RegAdminIdx
                ,b.wAdminName AS RegAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['roulette']} AS a
            INNER JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx AND b.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS c ON a.UpdAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 단일 데이터 검색
     * @param array $arr_condition
     * @return mixed
     */
    public function findRouletteForModify($arr_condition = [])
    {
        $column = '
                a.RouletteCode, a.Title, a.DayLimitCount, a.MaxLimitCount, a.RouletteStartDatm, a.RouletteEndDatm, a.ProbabilityType, a.IsUse, a.IsStatus, a.Memo, a.RegDatm, a.RegAdminIdx, a.UpdDatm
                ,DATE_FORMAT(A.RouletteStartDatm, \'%Y-%m-%d\') AS RouletteStartDay, DATE_FORMAT(A.RouletteStartDatm, \'%H\') AS RouletteStartHour, DATE_FORMAT(A.RouletteStartDatm, \'%i\') AS RouletteStartMin
                ,DATE_FORMAT(A.RouletteEndDatm, \'%Y-%m-%d\') AS RouletteEndDay, DATE_FORMAT(A.RouletteEndDatm, \'%H\') AS RouletteEndHour, DATE_FORMAT(A.RouletteEndDatm, \'%i\') AS RouletteEndMin
                ,b.wAdminName AS RegAdminName, c.wAdminName AS UpdAdminName
            ';

        $from = "
            FROM {$this->_table['roulette']} AS a
            INNER JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx AND b.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS c ON a.UpdAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 룰렛 부가정보 데이터 [리스트]
     * @param $roulette_code
     * @return mixed
     */
    public function listRouletteOtherInfo($roulette_code)
    {
        $column = 'RroIdx, RouletteCode, ProdName, ProdQty, ProdProbability, ProdCount, IsUse';
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code
            ]
        ];

        $from = " FROM {$this->_table['roulette_r_otherinfo']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->result_array();
    }

    /**
     * 룰렛 등록
     * @param array $input
     * @return array|bool
     */
    public function addRoulette($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $rouletteCode = $this->_setRouletteCode();

            if (empty(element('roulette_start_datm', $input)) === true) {
                $roulette_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $roulette_start_datm = element('roulette_start_datm', $input) . ' ' . element('roulette_start_hour', $input) . ':' . element('roulette_start_min', $input) . ':00';
            }
            if (empty(element('roulette_end_datm', $input)) === true) {
                $roulette_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $roulette_end_datm = element('roulette_end_datm', $input) . ' ' . element('roulette_end_hour', $input) . ':' . element('roulette_end_min', $input) . ':00';
            }

            $data = [
                'RouletteCode' => $rouletteCode,
                'Title' => element('roulette_title', $input),
                'DayLimitCount' => element('day_limit_count', $input),
                'MaxLimitCount' => element('max_limit_count', $input),
                'RouletteStartDatm' => $roulette_start_datm,
                'RouletteEndDatm' => $roulette_end_datm,
                'ProbabilityType' => element('probability_type', $input),
                'IsUse' => element('is_use', $input),
                'Memo' => element('roulette_memo', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['roulette']) === false) {
                throw new \Exception('룰렛 등록에 실패했습니다.');
            }

            $set_roulette_product = [];
            foreach (element('roulette_prod_name', $input) as $key => $val) {
                if (empty($val) === false) {
                    $set_roulette_product[$key]['RouletteCode'] = $rouletteCode;
                    $set_roulette_product[$key]['ProdName'] = $val;
                    $set_roulette_product[$key]['ProdQty'] = element('roulette_prod_qty', $input)[$key];
                    $set_roulette_product[$key]['ProdProbability'] = element('roulette_prod_probability', $input)[$key];
                    $set_roulette_product[$key]['ProdCount'] = element('roulette_prod_count', $input)[$key];
                    $set_roulette_product[$key]['RegIp'] = $this->input->ip_address();
                }
            }

            //부가정보저장
            if ($this->_addRouletteOtherInfo($set_roulette_product) === false) {
                throw new \Exception('부가정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 룰렛 수정
     * @param array $input
     * @param bool $code_modify_type
     * @return array|bool
     */
    public function modifyRoulette($input = [], $code_modify_type = false)
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $roulette_code = element('roulette_code', $input);

            //정보 조회
            $row = $this->findRoulette('RouletteCode', ['EQ' => ['RouletteCode' => $roulette_code]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            if (empty(element('roulette_start_datm', $input)) === true) {
                $roulette_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $roulette_start_datm = element('roulette_start_datm', $input) . ' ' . element('roulette_start_hour', $input) . ':' . element('roulette_start_min', $input) . ':00';
            }
            if (empty(element('roulette_end_datm', $input)) === true) {
                $roulette_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $roulette_end_datm = element('roulette_end_datm', $input) . ' ' . element('roulette_end_hour', $input) . ':' . element('roulette_end_min', $input) . ':00';
            }

            $data = [
                'Title' => element('roulette_title', $input),
                'DayLimitCount' => element('day_limit_count', $input),
                'MaxLimitCount' => element('max_limit_count', $input),
                'RouletteStartDatm' => $roulette_start_datm,
                'RouletteEndDatm' => $roulette_end_datm,
                'ProbabilityType' => element('probability_type', $input),
                /*'rouletteProductJson' => $roulette_product_json,*/
                'IsUse' => element('is_use', $input),
                'Memo' => element('roulette_memo', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($code_modify_type === true) {
                $data['RouletteCode'] = element('up_roulette_code', $input);
            }

            if ($this->_conn->set($data)->where('RouletteCode', $roulette_code)->update($this->_table['roulette']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            //부가정보수정
            if ($this->_modifyRouletteOtherInfo($input) === false) {
                throw new \Exception('부가정보 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 단일검색
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findRoulette($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['roulette'], $column, $arr_condition);
    }

    /**
     * 룰렛 부가정보 여부사용값 수정
     * @param $rro_idx
     * @param $is_use
     * @return array|bool
     */
    public function updateOtherInfoIsUse($rro_idx, $is_use)
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'IsUse' => $is_use,
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('RroIdx', $rro_idx)->update($this->_table['roulette_r_otherinfo']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 부가정보저장
     * @param $set_roulette_product
     * @return array|bool
     */
    private function _addRouletteOtherInfo($set_roulette_product)
    {
        try {
            if ($this->_conn->insert_batch($this->_table['roulette_r_otherinfo'], $set_roulette_product) === false) {
                throw new \Exception('부가정보 저장에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    private function _modifyRouletteOtherInfo($input)
    {
        try {
            foreach ($input['rro_idx'] as $key => $val) {
                $inputData['RouletteCode'] = element('up_roulette_code', $input);
                $inputData['ProdName'] = (empty($input['roulette_prod_name'][$key]) === false) ? $input['roulette_prod_name'][$key] : null;
                $inputData['ProdQty'] = (empty($input['roulette_prod_qty'][$key]) === false) ? $input['roulette_prod_qty'][$key] : null;
                $inputData['ProdProbability'] = (empty($input['roulette_prod_probability'][$key]) === false) ? $input['roulette_prod_probability'][$key] : null;
                $inputData['ProdCount'] = (empty($input['roulette_prod_count'][$key]) === false) ? $input['roulette_prod_count'][$key] : null;

                if (empty($val) === true) {
                    $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    if ($this->_conn->set($inputData)->insert($this->_table['roulette_r_otherinfo']) === false) {
                        throw new \Exception('부가정보 추가에 실패했습니다.');
                    }
                } else {
                    $inputData['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                    if ($this->_conn->set($inputData)->where('RroIdx', $val)->update($this->_table['roulette_r_otherinfo']) === false) {
                        throw new \Exception('부가정보 수정에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 룰렛 코드 생성
     * @return mixed
     */
    private function _setRouletteCode()
    {
        $row = $this->_conn->getFindResult($this->_table['roulette'], 'ifnull(max(RouletteCode) + 1, 1001) as RouletteCode');
        return $row['RouletteCode'];
    }
}