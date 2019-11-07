<?php
/**
 * ======================================================================
 * 모의고사 공통 라이브러리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MockCommonModel extends WB_Model
{
    protected $_table = [
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
        'mock_base' => 'lms_mock',
        'subject' => 'lms_product_subject',
        'mock_subject' => 'lms_mock_r_subject',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    public function getMockKind($isUseChk = true)
    {
        $order_by = $this->_conn->makeOrderBy(['SC.OrderNum' => 'ASC', 'SC.CcdName' => 'ASC'])->getMakeOrderBy();
        $arr_condition = ['EQ' => ['M.IsStatus' => 'Y']];

        if (empty($isUseChk) === true) {
            $arr_condition['EQ']['M.IsUse'] = 'Y';
            $isUse_SC = "AND SC.IsUse = 'Y'";
        } else {
            $isUse_SC = "";
        }

        $column = 'M.SiteCode, M.CateCode AS ParentCateCode, SC.Ccd AS CateCode, SC.CcdName AS CateName';
        $from = "
            FROM {$this->_table['mock_base']} AS M
            JOIN {$this->_table['sys_code']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y' $isUse_SC
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);

        return $query->result_array();
    }

    /**
     * 그룹 과목조회
     * @return mixed
     */
    public function getSubjectGroupForMockBaseCode()
    {
        $group_by = 'GROUP BY SJ.MmIdx, SJ.SubjectType ASC';
        $order_by = $this->_conn->makeOrderBy(['SJ.MmIdx' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'SJ.IsStatus' => 'Y',
                'SJ.IsUse' => 'Y'
            ]
        ];

        $column = '
            SJ.MmIdx, SJ.SubjectType, GROUP_CONCAT(SJ.SubjectIdx) AS SubjectIdxs,
            GROUP_CONCAT(IF(PS.IsUse = \'Y\', PS.SubjectName, CONCAT(PS.SubjectName, \'미사용\')) SEPARATOR \', \') AS SubjectNames
        ';
        $from = "
            FROM {$this->_table['mock_subject']} AS SJ
            JOIN {$this->_table['subject']} AS PS ON SJ.SubjectIdx = PS.SubjectIdx AND PS.IsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by);
        return $query->result_array();
    }

    /**
     * @param $arr_condition
     * @param $arr_condition_sub
     * @return mixed
     */
    public function getSubjectForMockBaseCode($arr_condition, $arr_condition_sub)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(true);

        $order_by = $this->_conn->makeOrderBy(['S.SiteCode' => 'ASC', 'S.OrderNum' => 'ASC'])->getMakeOrderBy();
        $column = 'S.SiteCode AS sSiteCode, S.SubjectIdx AS sSubjectIdx, S.SubjectName AS sSubjectName, S.IsUse AS sIsUse, MS.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['subject']} AS S
            LEFT JOIN {$this->_table['mock_subject']} AS MS ON S.SubjectIdx = MS.SubjectIdx {$where_sub}
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MS.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MS.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }
}