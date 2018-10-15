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
        'mockCate' => 'lms_mock_r_category',
        'mockArea' => 'lms_mock_area',
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
        $db = $this->_conn->select('wAdminIdx, wAdminName')->get($this->_table['admin'])->result_array();

        return array_column($db, 'wAdminName', 'wAdminIdx');
    }


    /**
     * 모의고사카테고리 검색
     */
    public function moCateList($conditionAdd='', $limit='', $offset='', $useCount=true, $isReg=false)
    {
        $condition = [ 'IN' => ['S.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, C2.CateCode AS CateCode2,
                   CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', C2.CateName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $from = "
            FROM {$this->_table['mockSubject']} AS MS
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
            JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode
            JOIN {$this->_table['category']} AS C2 ON MB.CateCode = C2.CateCode AND C2.IsStatus = 'Y' AND C2.IsUse = 'Y'
            JOIN {$this->_table['category']} AS C1 ON C2.GroupCateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
        ";
        $where = "WHERE MS.IsStatus = 'Y' AND MS.IsUse = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, C2.OrderNum ASC, SJ.OrderNum ASC, MS.SubjectType ASC\n";

        if($isReg) { // 모의고사등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $from .= "
                JOIN {$this->_table['mockCate']} AS MC ON MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y'
                JOIN {$this->_table['mockArea']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            ";
        }

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        if($useCount) $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        if($useCount) return array($data, $count);
        else return $data;
    }


    /**
     * 모의고사카테고리 검색 (IsUse 여부에 상관없이 전체 로드)
     */
    public function moCateListAll($conditionAdd='', $limit='', $offset='', $useCount=true, $isReg=false)
    {
        $condition = [ 'IN' => ['S.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, C2.CateCode AS CateCode2,
                   CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', C2.CateName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName";
        $selectAdd = ", IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C2.IsUse = 'N' OR C1.IsUse = 'N', 'N', 'Y') AS BaseIsUse";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $from = "
            FROM {$this->_table['mockSubject']} AS MS
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode
            JOIN {$this->_table['category']} AS C2 ON MB.CateCode = C2.CateCode AND C2.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON C2.GroupCateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
        ";
        $where = "WHERE MS.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, C2.OrderNum ASC, SJ.OrderNum ASC, MS.SubjectType ASC\n";


        if($isReg) { // 모의고사등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $selectAdd = ", IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C2.IsUse = 'N' OR C1.IsUse = 'N' OR MA.IsUse = 'N', 'N', 'Y') AS BaseIsUse";
            $from .= "
                JOIN {$this->_table['mockCate']} AS MC ON MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y'
                JOIN {$this->_table['mockArea']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y'
            ";
        }

        $data = $this->_conn->query($select . $selectAdd . $from . $where . $order . $offset_limit)->result_array();
        if($useCount) $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        if($useCount) return array($data, $count);
        else return $data;
    }
}