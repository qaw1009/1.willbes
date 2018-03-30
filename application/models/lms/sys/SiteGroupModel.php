<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteGroupModel extends WB_Model
{
    private $_table = [
        'site_group' => 'lms_site_group',
        'admin' => 'wbs_sys_admin'
    ];
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 그룹 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSiteGroup($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $colum = 'S.SiteGroupCode, S.SiteGroupName, S.SiteGroupDesc, S.IsUse, S.RegDatm, S.RegAdminIdx';
        $colum .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['site_group'] . ' as S', $colum, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사이트 그룹 코드 목록 조회
     * @return array
     */
    public function getSiteGroupArray()
    {
        $data = $this->_conn->getListResult($this->_table['site_group'], 'SiteGroupCode, SiteGroupName', [
            'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']
        ], null, null, [
            'SiteGroupCode' => 'asc'
        ]);

        return array_pluck($data, 'SiteGroupName', 'SiteGroupCode');
    }

    /**
     * 사이트 그룹 데이터 조회
     * @param string $colum
     * @param array $arr_condition
     * @return array
     */
    public function findSiteGroup($colum = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['site_group'], $colum, $arr_condition);
    }

    /**
     * 사이트 그룹 수정 폼을 위한 데이터 조회
     * @param $site_group_code
     * @return array
     */
    public function findSiteGroupForModify($site_group_code)
    {
        $colum = 'S.SiteGroupCode, S.SiteGroupName, S.SiteGroupDesc, S.IsUse, S.RegDatm, S.RegAdminIdx, S.UpdDatm, S.UpdAdminIdx';
        $colum .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.RegAdminIdx) as RegAdminName';
        $colum .= ' , if(S.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['site_group'] . ' as S', $colum, [
            'EQ' => ['S.SiteGroupCode' => $site_group_code]
        ]);
    }

    /**
     * 사이트 그룹 등록
     * @param array $input
     * @return array|bool
     */
    public function addSiteGroup($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 등록될 사이트그룹 코드 조회
            $row = $this->_conn->getFindResult($this->_table['site_group'], 'ifnull(max(SiteGroupCode) + 1, 1001) as SiteGroupCode');

            // 데이터 저장
            $data = [
                'SiteGroupCode' => $row['SiteGroupCode'],
                'SiteGroupName' => element('site_group_name', $input),
                'SiteGroupDesc' => element('site_group_desc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['site_group']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사이트 그룹 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySiteGroup($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 사이트 그룹 코드
            $site_group_code = element('idx', $input);

            // 데이터 수정
            $data = [
                'SiteGroupName' => element('site_group_name', $input),
                'SiteGroupDesc' => element('site_group_desc', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($data)->where('SiteGroupCode', $site_group_code);

            if ($this->_conn->update($this->_table['site_group']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
