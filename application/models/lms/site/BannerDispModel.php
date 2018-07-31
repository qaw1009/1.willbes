<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerDispModel extends WB_Model
{
    private $_table = [
        'banner_disp' => 'lms_banner_disp',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAllBannerDisp($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.BdIdx, A.SiteCode, A.CateCode, A.DispName, A.DispTypeCcd, A.Desc, A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.RegIp,
            B.SiteName, C.CateName, D.CcdName,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['banner_disp']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            LEFT JOIN {$this->_table['sys_category']} AS C ON A.CateCode = C.CateCode AND C.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_code']} AS D ON A.DispTypeCcd = D.Ccd            
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 배너노출섹션 등록
     * @param array $input
     * @return array|bool
     */
    public function addBannerDisp($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $site_code = element('site_code', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'CateCode' => element('cate_code', $input),
                'DispName' => element('disp_name', $input),
                'DispTypeCcd' => element('disp_type', $input),
                'Desc' => element('desc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['banner_disp']) === false) {
                throw new \Exception('배너 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}