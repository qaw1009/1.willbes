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
            A.BdIdx, A.SiteCode, A.CateCode, A.DispName, A.DispTypeCcd, A.DispRollingTypeCcd, A.DispRollingTime, A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx,
            B.SiteName, IFNULL(C.CateName,"전체카테고리") AS CateName, D.CcdName as DispTypeCcdName, G.CcdName as DispRollingTypeCcdName,
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
            LEFT JOIN {$this->_table['sys_code']} AS G ON A.DispRollingTypeCcd = G.Ccd
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

    public function findBannerDisp($column = '*', $arr_condition = [])
    {
        return $this->_conn->getFindResult($this->_table['banner_disp'], $column, $arr_condition);
    }

    public function findBannerDispForModify($arr_condition)
    {
        $column = "
            A.BdIdx, A.SiteCode, A.CateCode, A.DispName, A.DispTypeCcd, A.DispRollingTypeCcd, A.DispRollingTime, A.Desc, A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm,
            B.SiteName, C.CateName, D.CcdName,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['banner_disp']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            LEFT JOIN {$this->_table['sys_category']} AS C ON A.CateCode = C.CateCode AND C.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_code']} AS D ON A.DispTypeCcd = D.Ccd            
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 배너노출섹션데이터 조회
     * @param $column
     * @return mixed
     */
    public function getBannerDispList($column)
    {
        $from = " 
            FROM {$this->_table['banner_disp']} A
            LEFT OUTER JOIN {$this->_table['sys_category']} B ON A.CateCode = B.CateCode
        ";
        $arr_condition['EQ']['A.IsUse'] = 'Y';
        $arr_condition['EQ']['A.IsStatus'] = 'Y';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.BdIdx' => 'DESC'])->getMakeOrderBy();

        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return $query->result_array();
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

            // 기존 배너정보 조회
            $arr_condition['EQ']['DispName'] = element('disp_name', $input);
            $arr_condition['EQ']['SiteCode'] = $site_code;
            $arr_condition['EQ']['CateCode'] = element('cate_code', $input, 0);

            $row = $this->findBannerDisp('BdIdx', $arr_condition);
            if (empty($row) === false) {
                throw new \Exception('중복된 노출섹션명이 있습니다.');
            }

            $data = [
                'SiteCode' => $site_code,
                'CateCode' => element('cate_code', $input),
                'DispName' => element('disp_name', $input),
                'DispTypeCcd' => element('disp_type', $input),
                'DispRollingTypeCcd' => element('disp_rolling_type', $input),
                'DispRollingTime' => element('disp_rolling_time', $input),
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

    /**
     * 배너 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyBannerDisp($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $bd_idx = element('bd_idx', $input);

            // 기존 배너 기본정보 조회
            $row = $this->findBannerDisp('BdIdx, SiteCode', ['EQ' => ['BdIdx' => $bd_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 기존 배너정보 조회
            $arr_condition['EQ']['DispName'] = element('disp_name', $input);
            $arr_condition['EQ']['SiteCode'] = $row['SiteCode'];
            $arr_condition['EQ']['CateCode'] = element('cate_code', $input, 0);
            $arr_condition['NOT']['BdIdx'] = $bd_idx;
            $row = $this->findBannerDisp('BdIdx', $arr_condition);
            if (empty($row) === false) {
                throw new \Exception('중복된 노출섹션명이 있습니다.');
            }

            $data = [
                'DispName' => element('disp_name', $input),
                'DispTypeCcd' => element('disp_type', $input),
                'DispRollingTypeCcd' => element('disp_rolling_type', $input),
                'DispRollingTime' => element('disp_rolling_time', $input),
                'Desc' => element('desc', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('BdIdx', $bd_idx)->update($this->_table['banner_disp']) === false) {
                throw new \Exception('배너 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}