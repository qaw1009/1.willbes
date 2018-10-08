<?php
/**
 * ======================================================================
 * 모의고사 공통 라이브러리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MockCommonModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'mockBase' => 'lms_mock',
        'mockSubject' => 'lms_mock_r_subject',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 관리자이름 배열 로딩
     * @param array $in : wAdminIdx
     * @return array('wAdminIdx' => 'wAdminName')
     */
    public function getAdminNames($in = array())
    {
        if ($in) $this->_conn->where_in('wAdminIdx', $in);
        $db = $this->_conn->select('wAdminIdx, wAdminName')->where(array('wIsUse' => 'Y', 'wIsStatus' => 'Y'))->get($this->_table['admin'])->result_array();

        return array_column($db, 'wAdminName', 'wAdminIdx');
    }


    /**
     * 모의고사카테고리 검색
     */
    public function moCateList($conditionAdd='', $limit='', $offset='', $useCount=true)
    {
        $condition = [ 'IN' => ['S.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(true);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "\nLIMIT $offset, $limit" : "";

        $select = "
            SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode, C2.CateCode,
                   S.SiteName, C1.CateName, C2.CateName, SJ.SubjectName,
                   CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', C2.CateName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $from = "
            FROM {$this->_table['mockSubject']} AS MS
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
            JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode
            JOIN {$this->_table['category']} AS C2 ON MB.CateCode = C2.CateCode AND C2.IsStatus = 'Y' AND C2.IsUse = 'Y'
            JOIN {$this->_table['category']} AS C1 ON C2.GroupCateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
            JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx AND A.wIsStatus = 'Y' AND A.wIsUse = 'Y'
            WHERE MS.IsStatus = 'Y' AND MS.IsUse = 'Y' $where
        ";
        $order = "ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, C2.OrderNum ASC, SJ.OrderNum ASC, MS.SubjectType ASC";

        $data = $this->_conn->query($select . $from . $order . $offset_limit)->result_array();
        if($useCount) $count = $this->_conn->query($selectCount . $from)->row()->cnt;

        if($useCount) return array($data, $count);
        else return $data;
    }
}