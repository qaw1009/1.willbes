<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRangeModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mock_area' => 'lms_mock_area',
        'mock_area_list' => 'lms_mock_area_list',
        'mock_r_category' => 'lms_Mock_R_Category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 문제영역수
     * @return array
     */
    public function list()
    {
        $arr_condition = ['EQ' => ['MB.IsStatus' => 'Y']];
        $group_by = ' group by MB.MaIdx ';
        $order_by = $this->_conn->makeOrderBy(['MB.MaIdx' => 'ASC'])->getMakeOrderBy();

        $column = "
            MB.*, A.wAdminName, GROUP_CONCAT(MC.MrsIdx) AS moCateKey,
            (SELECT COUNT(*) FROM {$this->_table['mock_area_list']} AS ML WHERE MB.MaIdx = ML.MaIdx AND ML.IsStatus = 'Y') AS ListCnt
        ";

        $from = "
            FROM {$this->_table['mock_area']} AS MB
            LEFT JOIN {$this->_table['mock_r_category']} AS MC ON MB.MaIdx = MC.MaIdx AND MC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MB.RegAdminIdx = A.wAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by)->result_array();
    }

    /**
     * 기본정보
     * @param $idx
     * @return mixed
     */
    public function getMockArea($idx)
    {
        $column = 'Ma.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_area']} AS Ma
            LEFT JOIN {$this->_table['admin']} as ADMIN ON Ma.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON Ma.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where MaIdx = ? and IsStatus = "Y"';
        return $this->_conn->query('select ' . $column . $from . $where, [$idx])->row_array();
    }

    /**
     * 챕터리스트
     * @param $idx
     * @return mixed
     */
    public function getMockAreaList($idx)
    {
        $column = 'ML.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_area_list']} AS ML
            LEFT JOIN {$this->_table['admin']} as ADMIN ON ML.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON ML.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where MaIdx = ? and IsStatus = "Y"';
        $order_by = ' order by OrderNum ASC';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by, [$idx])->result_array();
    }

    /**
     * 등록된 모의고사 카테고리 로드
     * @param $idx
     * @return array
     */
    public function getMockAreaListForCate($idx)
    {
        $moCate_name = $moCate_isUse = [];
        $moCateLink = $this->_conn->select('MrsIdx')->get_where($this->_table['mock_r_category'], ['MaIdx' => $idx, 'IsStatus' => 'Y'])->result_array();
        if($moCateLink) {
            $column = "
                MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
            ";
            $condition = [
                'IN' => ['MS.MrsIdx' => array_column($moCateLink, 'MrsIdx')]
            ];
            $moCate = $this->mockCommonModel->moCateListAll($column, false, $condition);

            $moCate_name = array_column($moCate, 'CateRouteName', 'MrsIdx');
            $moCate_isUse = array_column($moCate, 'BaseIsUse', 'MrsIdx');
        }

        return array($moCate_name, $moCate_isUse);
    }
}