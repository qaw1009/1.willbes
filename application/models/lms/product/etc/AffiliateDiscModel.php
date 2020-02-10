<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AffiliateDiscModel extends WB_Model
{
    private $_table = [
        'product_affiliate_disc_info' => 'lms_product_affiliate_disc_info',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public $_group_ccd = ['AffType' => '725', 'ApplyType' => '726'];   // 공통그룹코드 => 제휴구분, 적용상품구분

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴할인율 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAffiliateDisc($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'ADC.AffIdx, ADC.AffTypeCcd, ADC.AffName, ADC.SiteCode, ADC.ApplyTypeCcds, ADC.DiscRate, ADC.DiscType
                , if(ADC.DiscType = "R", "%", "원") as DiscRateUnit, ADC.IsUse, ADC.RegAdminIdx, ADC.RegDatm
                , S.SiteName, CAT.CcdName as AffTypeCcdName, A.wAdminName as RegAdminName
                , (select group_concat(CcdName) 
                    from ' . $this->_table['code'] . ' 
                    where GroupCcd = "' . $this->_group_ccd['ApplyType'] . '" 
                        and find_in_set(Ccd, ADC.ApplyTypeCcds)
                        and IsStatus = "Y"
                  ) as ApplyTypeCcdNames';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['product_affiliate_disc_info'] . ' as ADC
                left join ' . $this->_table['site'] . ' as S
                    on ADC.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CAT
                    on ADC.AffTypeCcd = CAT.Ccd and CAT.GroupCcd = "' . $this->_group_ccd['AffType'] . '" and CAT.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on ADC.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where ADC.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 제휴할인율 정보 수정 폼에 필요한 데이터 조회
     * @param $aff_idx
     * @param bool $is_admin_info
     * @return mixed
     */
    public function findAffiliateDiscByAffIdx($aff_idx, $is_admin_info = false)
    {
        $column = 'ADC.AffIdx, ADC.AffTypeCcd, ADC.AffName, ADC.SiteCode, ADC.ApplyTypeCcds, ADC.DiscRate, ADC.DiscType, ADC.IsUse, ADC.RegAdminIdx, ADC.RegDatm
            , ADC.UpdDatm, ADC.UpdAdminIdx';

        if ($is_admin_info === true) {
            $column .= ', (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = ADC.RegAdminIdx and wIsStatus = "Y") as RegAdminName
            , if(ADC.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = ADC.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';
        }

        $arr_condition['EQ'] = ['ADC.AffIdx' => get_var($aff_idx, 0), 'ADC.IsStatus' => 'Y'];

        return $this->_conn->getFindResult($this->_table['product_affiliate_disc_info'] . ' as ADC', $column, $arr_condition);
    }

    /**
     * 제휴할인율 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addAffiliateDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 데이터 저장
            $data = [
                'AffTypeCcd' => element('aff_type_ccd', $input),
                'AffName' => element('aff_name', $input),
                'SiteCode' => element('site_code', $input),
                'ApplyTypeCcds' => implode(',', element('apply_type_ccd', $input, '')),
                'DiscRate' => element('disc_rate', $input),
                'DiscType' => element('disc_type', $input, 'R'),
                'IsUse' => element('is_use', $input, 'Y'),
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_affiliate_disc_info']) === false) {
                throw new \Exception('제휴할인율 정보 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 제휴할인율 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyAffiliateDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $aff_idx = element('idx', $input);

            // 제휴할인율 정보 조회
            $row = $this->findAffiliateDiscByAffIdx($aff_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 데이터 수정
            $data = [
                'AffTypeCcd' => element('aff_type_ccd', $input),
                'AffName' => element('aff_name', $input),
                'ApplyTypeCcds' => implode(',', element('apply_type_ccd', $input, '')),
                'DiscRate' => element('disc_rate', $input),
                'DiscType' => element('disc_type', $input, 'R'),
                'IsUse' => element('is_use', $input, 'Y'),
                'UpdAdminIdx' => $sess_admin_idx
            ];

            if ($this->_conn->set($data)->where('AffIdx', $aff_idx)->update($this->_table['product_affiliate_disc_info']) === false) {
                throw new \Exception('제휴할인율 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }    
}
