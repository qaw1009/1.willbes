<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CondDiscModel extends WB_Model
{
    private $_table = [
        'product_cond_disc' => 'lms_product_cond_disc',
        'product_cond_disc_r_product' => 'lms_product_cond_disc_r_product',
        'product' => 'lms_product',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 조건할인율 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function listCondDisc($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'CD.DiscIdx, CD.DiscTitle, CD.SiteCode, CD.IsUse, CD.RegAdminIdx, CD.RegDatm
                , S.SiteName, A.wAdminName as RegAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['product_cond_disc'] . ' as CD
                left join ' . $this->_table['site'] . ' as S
                    on CD.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on CD.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where CD.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 조건할인율 정보 수정 폼에 필요한 데이터 조회
     * @param int $disc_idx
     * @param bool $is_admin_info
     * @return mixed
     */
    public function findCondDiscByDiscIdx($disc_idx, $is_admin_info = false)
    {
        $column = 'CD.DiscIdx, CD.DiscTitle, CD.SiteCode, CD.IsUse, CD.RegAdminIdx, CD.RegDatm, CD.UpdDatm, CD.UpdAdminIdx';

        if ($is_admin_info === true) {
            $column .= ', (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = CD.RegAdminIdx and wIsStatus = "Y") as RegAdminName
            , if(CD.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = CD.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';
        }

        $from = '
            from ' . $this->_table['product_cond_disc'] . ' as CD
                left join ' . $this->_table['site'] . ' as S
                    on CD.SiteCode = S.SiteCode and S.IsStatus = "Y"
        ';

        $where = 'where CD.DiscIdx = ? and CD.IsStatus = "Y"';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where, [$disc_idx])->row_array();
    }

    /**
     * 조건할인율 신청강좌 연결상품 조회
     * @param int $disc_idx
     * @return array
     */
    public function findCondProductByDiscIdx($disc_idx)
    {
        $column = 'CDP.DiscProdIdx, CDP.DiscIdx, CDP.ProdCode, P.ProdName';
        $arr_condition = [
            'EQ' => [
                'CDP.DiscIdx' => get_var($disc_idx, '0'),
                'CDP.CondType' => 'C',
                'CDP.IsStatus' => 'Y'
            ]
        ];
        $order_by = ['CDP.DiscProdIdx' => 'asc'];

        return $this->_conn->getJoinListResult($this->_table['product_cond_disc_r_product'] . ' as CDP', 'inner', $this->_table['product'] . ' as P'
            , 'CDP.ProdCode = P.ProdCode'
            , $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 조건할인율 할인강좌 연결상품 조회
     * @param int $disc_idx
     * @return array
     */
    public function findDiscProductByDiscIdx($disc_idx)
    {
        $column = 'TA.DiscProdIdx, TA.DiscIdx, TA.ProdCode, TA.DiscRate, TA.DiscType
            , TA.ProdName, TA.RealSalePrice
            , (case TA.DiscType 
                when "P" then TA.RealSalePrice - TA.DiscRate
                when "R" then ceiling(TA.RealSalePrice * ((100 - TA.DiscRate) / 100))
                else TA.RealSalePrice
              end) as RealPayPrice';

        $from = '
            from (
                select CDP.DiscProdIdx, CDP.DiscIdx, CDP.ProdCode, CDP.DiscRate, CDP.DiscType
                    , P.ProdName
                    , fn_product_saletype_price(CDP.ProdCode, "613001", "RealSalePrice") as RealSalePrice
                from ' . $this->_table['product_cond_disc_r_product'] . ' as CDP
                    inner join ' . $this->_table['product'] . ' as P
                        on CDP.ProdCode = P.ProdCode		
                where CDP.DiscIdx = ?
                    and CDP.CondType = "D"
                    and CDP.IsStatus = "Y"
            ) as TA	
        ';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from, [$disc_idx])->result_array();
    }

    /**
     * 조건할인율 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addCondDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $site_code = element('site_code', $input);
            $arr_disc_rate = element('disc_rate', $input);
            $arr_disc_type = element('disc_type', $input);
            $arr_prod_code_disc = array_values(array_unique(element('prod_code_disc', $input)));
            $arr_prod_code_cond = array_values(array_unique(element('prod_code_cond', $input)));

            // 데이터 저장
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'SiteCode' => $site_code,
                'DiscProdCnt' => count($arr_prod_code_disc),
                'IsUse' => element('is_use', $input, 'Y'),
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_cond_disc']) === false) {
                throw new \Exception('조건할인율 정보 등록에 실패했습니다.');
            }

            $disc_idx = $this->_conn->insert_id();  // 할인식별자

            // 조건할인율 할인강좌 연결상품 등록
            if (empty($arr_prod_code_disc) === false) {
                foreach ($arr_prod_code_disc as $prod_idx => $prod_code) {
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'CondType' => 'D',
                        'DiscRate' => array_get($arr_disc_rate, $prod_idx, '0'),
                        'DiscType' => array_get($arr_disc_type, $prod_idx, 'R'),
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_cond_disc_r_product']) === false) {
                        throw new \Exception('조건할인율 할인강좌 연결상품 등록에 실패했습니다.');
                    }
                }
            }

            // 조건할인율 신청강좌 연결상품 등록
            if (empty($arr_prod_code_cond) === false) {
                foreach ($arr_prod_code_cond as $prod_code) {
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'CondType' => 'C',
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_cond_disc_r_product']) === false) {
                        throw new \Exception('조건할인율 신청강좌 연결상품 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 조건할인율 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCondDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $disc_idx = element('idx', $input);
            $arr_disc_rate = element('disc_rate', $input);
            $arr_disc_type = element('disc_type', $input);
            $arr_prod_code_disc = array_values(array_unique(element('prod_code_disc', $input)));
            $arr_prod_code_cond = array_values(array_unique(element('prod_code_cond', $input)));

            // 조건할인율 정보 조회
            $row = $this->findCondDiscByDiscIdx($disc_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 조건할인율 정보 수정
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'DiscProdCnt' => count($arr_prod_code_disc),
                'IsUse' => element('is_use', $input, 'Y'),
                'UpdAdminIdx' => $sess_admin_idx
            ];

            if ($this->_conn->set($data)->where('DiscIdx', $disc_idx)->update($this->_table['product_cond_disc']) === false) {
                throw new \Exception('조건할인율 정보 수정에 실패했습니다.');
            }

            // 조건할인율 할인강좌 연결상품 등록/수정
            if (empty($arr_prod_code_disc) === false) {
                $prod_disc_data_old = [];

                // 기존 조건할인율 할인강좌 연결상품 조회
                $prod_disc_rows = $this->findDiscProductByDiscIdx($disc_idx);

                if (empty($prod_disc_rows) === false) {
                    // 기존 데이터 가공 (상품코드 => 할인율, 할인구분)
                    $prod_disc_data_old = array_data_pluck($prod_disc_rows, ['DiscRate', 'DiscType'], 'ProdCode');

                    // 기존 데이터와 비교하여 상품코드가 없을 경우 삭제 처리
                    $arr_delete_prod_code = array_diff(array_keys($prod_disc_data_old), $arr_prod_code_disc);
                    if (empty($arr_delete_prod_code) === false) {
                        $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                            ->where('DiscIdx', $disc_idx)->where_in('ProdCode', $arr_delete_prod_code)->where('CondType', 'D')
                            ->update($this->_table['product_cond_disc_r_product']);

                        if ($is_update === false) {
                            throw new \Exception('조건할인율 할인강좌 연결상품 수정에 실패했습니다.[1]');
                        }
                    }
                }

                foreach ($arr_prod_code_disc as $prod_idx => $prod_code) {
                    $disc_rate = array_get($arr_disc_rate, $prod_idx, '0');
                    $disc_type = array_get($arr_disc_type, $prod_idx, 'R');

                    if (empty($prod_disc_data_old[$prod_code]) === false) {
                        // 기존 상품코드별 할인정보가 있을 경우
                        $input_val = $disc_rate . '::' . $disc_type;

                        // 기존 데이터와 입력 데이터 비교 (변경사항이 없을 경우 등록 안함)
                        if (strcmp($prod_disc_data_old[$prod_code], $input_val) == 0) {
                            continue;
                        }

                        // 기 등록된 연결상품 데이터 삭제 처리
                        $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                            ->where('DiscIdx', $disc_idx)->where('ProdCode', $prod_code)->where('CondType', 'D')
                            ->update($this->_table['product_cond_disc_r_product']);

                        if ($is_update === false) {
                            throw new \Exception('조건할인율 할인강좌 연결상품 수정에 실패했습니다.[2]');
                        }
                    }

                    // 신규 등록
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'CondType' => 'D',
                        'DiscRate' => $disc_rate,
                        'DiscType' => $disc_type,
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_cond_disc_r_product']) === false) {
                        throw new \Exception('조건할인율 할인강좌 연결상품 등록에 실패했습니다.');
                    }
                }
            }

            // 조건할인율 신청강좌 연결상품 등록/수정
            if (empty($arr_prod_code_cond) === false) {
                $arr_prod_code_cond_old = [];

                // 기존 조건할인율 신청강좌 연결상품 조회
                $prod_cond_rows = $this->findCondProductByDiscIdx($disc_idx);
                
                if (empty($prod_cond_rows) === false) {
                    $arr_prod_code_cond_old = array_pluck($prod_cond_rows, 'ProdCode', 'DiscProdIdx');

                    // 기 등록된 연결상품 데이터 삭제 처리 (전달된 상품코드 중에 기 등록된 상품코드가 없다면 삭제 처리)
                    $arr_delete_prod_code = array_diff($arr_prod_code_cond_old, $arr_prod_code_cond);
                    if (empty($arr_delete_prod_code) === false) {
                        $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                            ->where('DiscIdx', $disc_idx)->where_in('DiscProdIdx', array_keys($arr_delete_prod_code))
                            ->update($this->_table['product_cond_disc_r_product']);

                        if ($is_update === false) {
                            throw new \Exception('조건할인율 신청강좌 연결상품 수정에 실패했습니다.');
                        }
                    }
                }

                // 신규 등록 (기 등록된 상품코드 중에 전달된 상품코드가 없다면 등록 처리)
                $arr_insert_prod_code = array_diff($arr_prod_code_cond, $arr_prod_code_cond_old);
                foreach ($arr_insert_prod_code as $prod_code) {
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'CondType' => 'C',
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_cond_disc_r_product']) === false) {
                        throw new \Exception('조건할인율 신청강좌 연결상품 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }    
}
