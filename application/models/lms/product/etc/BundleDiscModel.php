<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BundleDiscModel extends WB_Model
{
    private $_table = [
        'product_bundle_disc' => 'lms_product_bundle_disc',
        'product_bundle_disc_info' => 'lms_product_bundle_disc_info',
        'product_bundle_disc_r_product' => 'lms_product_bundle_disc_r_product',
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
     * 묶음할인율 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function listBundleDisc($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'BD.DiscIdx, BD.DiscTitle, BD.SiteCode, BD.IsUse, BD.RegAdminIdx, BD.RegDatm
                , S.SiteName, A.wAdminName as RegAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['product_bundle_disc'] . ' as BD
                left join ' . $this->_table['site'] . ' as S
                    on BD.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on BD.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where BD.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 묶음할인율 정보 수정 폼에 필요한 데이터 조회
     * @param int $disc_idx
     * @param bool $is_admin_info
     * @return mixed
     */
    public function findBundleDiscByDiscIdx($disc_idx, $is_admin_info = false)
    {
        $column = 'BD.DiscIdx, BD.DiscTitle, BD.SiteCode, BD.IsUse, BD.RegAdminIdx, BD.RegDatm, BD.UpdDatm, BD.UpdAdminIdx';

        if ($is_admin_info === true) {
            $column .= ', (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = BD.RegAdminIdx and wIsStatus = "Y") as RegAdminName
            , if(BD.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = BD.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';
        }

        $from = '
            from ' . $this->_table['product_bundle_disc'] . ' as BD
                left join ' . $this->_table['site'] . ' as S
                    on BD.SiteCode = S.SiteCode and S.IsStatus = "Y"
        ';

        $where = 'where BD.DiscIdx = ? and BD.IsStatus = "Y"';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where, [$disc_idx])->row_array();
    }

    /**
     * 묶음할인율 상세정보 조회
     * @param int $disc_idx
     * @return array|int
     */
    public function findBundleDiscInfoByDiscIdx($disc_idx)
    {
        $column = 'DiscInfoIdx, DiscIdx, IsApply, DiscNum, DiscRate';
        $arr_condition['EQ']['DiscIdx'] = get_var($disc_idx, '0');
        $arr_condition['EQ']['IsStatus'] = 'Y';
        $order_by = ['DiscIdx' => 'desc', 'DiscNum' => 'asc'];

        return $this->_conn->getListResult($this->_table['product_bundle_disc_info'], $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 묶음할인율 연결상품 조회
     * @param int $disc_idx
     * @return array
     */
    public function findBundelDiscProductByDiscIdx($disc_idx)
    {
        $column = 'BDP.DiscProdIdx, BDP.DiscIdx, BDP.ProdCode, P.ProdName';
        $arr_condition['EQ']['BDP.DiscIdx'] = get_var($disc_idx, '0');
        $arr_condition['EQ']['BDP.IsStatus'] = 'Y';
        $order_by = ['BDP.DiscProdIdx' => 'asc'];

        return $this->_conn->getJoinListResult($this->_table['product_bundle_disc_r_product'] . ' as BDP', 'inner', $this->_table['product'] . ' as P'
            , 'BDP.ProdCode = P.ProdCode'
            , $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 묶음할인율 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addBundleDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $site_code = element('site_code', $input);
            $arr_is_apply = element('is_apply', $input);
            $arr_disc_num = element('disc_num', $input);
            $arr_disc_rate = element('disc_rate', $input);
            $arr_prod_code = array_values(array_unique(element('prod_code', $input)));

            // 데이터 저장
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'SiteCode' => $site_code,
                'IsUse' => element('is_use', $input, 'Y'),
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_bundle_disc']) === false) {
                throw new \Exception('묶음할인율 정보 등록에 실패했습니다.');
            }

            $disc_idx = $this->_conn->insert_id();  // 할인식별자

            // 묶음할인율 상세정보 등록
            if (empty($arr_disc_rate) === false) {
                foreach ($arr_disc_rate as $idx => $disc_rate) {
                    if (empty($disc_rate) === false) {
                        $data = [
                            'DiscIdx' => $disc_idx,
                            'IsApply' => array_get($arr_is_apply, $idx, 'N'),
                            'DiscNum' => $arr_disc_num[$idx],
                            'DiscRate' => $disc_rate,
                            'RegAdminIdx' => $sess_admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['product_bundle_disc_info']) === false) {
                            throw new \Exception('묶음할인율 상세정보 등록에 실패했습니다.');
                        }
                    }
                }
            }

            // 묶음할인율 연결상품 등록
            if (empty($arr_prod_code) === false) {
                foreach ($arr_prod_code as $prod_code) {
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_bundle_disc_r_product']) === false) {
                        throw new \Exception('묶음할인율 연결상품 등록에 실패했습니다.');
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
     * 묶음할인율 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyBundleDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $disc_idx = element('idx', $input);
            $arr_is_apply = element('is_apply', $input);
            $arr_disc_num = element('disc_num', $input);
            $arr_disc_rate = element('disc_rate', $input);
            $arr_prod_code = array_values(array_unique(element('prod_code', $input)));
            
            // 묶음할인율 정보 조회
            $row = $this->findBundleDiscByDiscIdx($disc_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 데이터 수정
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'IsUse' => element('is_use', $input, 'Y'),
                'UpdAdminIdx' => $sess_admin_idx
            ];

            if ($this->_conn->set($data)->where('DiscIdx', $disc_idx)->update($this->_table['product_bundle_disc']) === false) {
                throw new \Exception('묶음할인율 정보 수정에 실패했습니다.');
            }

            // 묶음할인율 상세정보 등록/수정
            if (empty($arr_disc_rate) === false) {
                // 기존 묶음할인율 상세정보 조회
                $info_rows = $this->findBundleDiscInfoByDiscIdx($disc_idx);

                foreach ($arr_disc_rate as $idx => $disc_rate) {
                    if (empty($disc_rate) === false) {
                        $is_apply = array_get($arr_is_apply, $idx, 'N');
                        $disc_num = $arr_disc_num[$idx];
                        $is_regist = true;

                        foreach ($info_rows as $info_row) {
                            if ($disc_num == $info_row['DiscNum']) {
                                if ($is_apply == $info_row['IsApply'] && $disc_rate == $info_row['DiscRate']) {
                                    // 묶음할인율 상세정보가 기존정보와 동일하다면 등록안함
                                    $is_regist = false;
                                } else {
                                    // 기존 묶음할인율 상세정보 상태변경
                                    $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                                        ->where('DiscIdx', $disc_idx)->where('DiscInfoIdx', $info_row['DiscInfoIdx'])
                                        ->update($this->_table['product_bundle_disc_info']);
                                    if ($is_update === false) {
                                        throw new \Exception('기존 묶음할인율 상세정보 수정에 실패했습니다.');
                                    }
                                }

                                break;
                            }
                        }

                        // 묶음할인율 상세정보 등록
                        if ($is_regist === true) {
                            $data = [
                                'DiscIdx' => $disc_idx,
                                'IsApply' => $is_apply,
                                'DiscNum' => $disc_num,
                                'DiscRate' => $disc_rate,
                                'RegAdminIdx' => $sess_admin_idx,
                                'RegIp' => $reg_ip
                            ];

                            if ($this->_conn->set($data)->insert($this->_table['product_bundle_disc_info']) === false) {
                                throw new \Exception('묶음할인율 상세정보 저장에 실패했습니다.');
                            }
                        }
                    }
                }
            }

            // 묶음할인율 연결상품 등록/수정
            if (empty($arr_prod_code) === false) {
                // 기존 묶음할인율 연결상품 조회
                $arr_old_prod_codes = [];

                $prod_rows = $this->findBundelDiscProductByDiscIdx($disc_idx);
                if (empty($prod_rows) === false) {
                    $arr_old_prod_codes = array_pluck($prod_rows, 'ProdCode', 'DiscProdIdx');

                    // 기 등록된 연결상품 데이터 삭제 처리 (전달된 상품코드 중에 기 등록된 상품코드가 없다면 삭제 처리)
                    $arr_delete_prod_code = array_diff($arr_old_prod_codes, $arr_prod_code);
                    if (count($arr_delete_prod_code) > 0) {
                        $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                            ->where('DiscIdx', $disc_idx)->where_in('DiscProdIdx', array_keys($arr_delete_prod_code))
                            ->update($this->_table['product_bundle_disc_r_product']);

                        if ($is_update === false) {
                            throw new \Exception('묶음할인율 연결상품 수정에 실패했습니다.');
                        }
                    }
                }

                // 신규 등록 (기 등록된 상품코드 중에 전달된 상품코드가 없다면 등록 처리)
                $arr_insert_prod_code = array_diff($arr_prod_code, $arr_old_prod_codes);
                foreach ($arr_insert_prod_code as $prod_code) {
                    $data = [
                        'DiscIdx' => $disc_idx,
                        'ProdCode' => $prod_code,
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product_bundle_disc_r_product']) === false) {
                        throw new \Exception('묶음할인율 연결상품 등록에 실패했습니다.');
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
