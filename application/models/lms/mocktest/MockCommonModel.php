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
        'sysCode' => 'lms_sys_code',
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
     * SYS CODE 값 로딩
     */
    public function getSysCode($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $where = array('GroupCcd' => $idx, 'IsStatus' => 'Y', 'IsUse' => 'Y');
        $db = $this->_conn->select('Ccd, CcdName')->where($where)->order_by('OrderNum ASC')->get($this->_table['sysCode'])->result_array();

        return array_column($db, 'CcdName', 'Ccd');
    }


    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     */
    public function getMockKind($isUseChk=true)
    {
        $isUse_M = ($isUseChk) ? "AND M.IsUse = 'Y'" : "";
        $isUse_SC = ($isUseChk) ? "AND SC.IsUse = 'Y'" : "";

        $sql = "
            SELECT M.SiteCode, M.CateCode AS ParentCateCode, SC.Ccd AS CateCode, SC.CcdName AS CateName
            FROM {$this->_table['mockBase']} AS M
            JOIN {$this->_table['sysCode']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y' $isUse_SC
            WHERE M.IsStatus = 'Y' $isUse_M
            ORDER BY SC.OrderNum ASC, SC.CcdName ASC";

        return $this->_conn->query($sql)->result_array();
    }


    /**
     * 모의고사카테고리 검색
     */
    public function moCateList($conditionAdd='', $limit='', $offset='', $useCount=true, $isReg=false)
    {
        $condition = [ 'IN' => ['S.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        if(!$isReg) {
            $select = "
                SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                       CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                       (SELECT COUNT(*) FROM {$this->_table['mockCate']} AS MC WHERE MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y') AS IsExist";
            $from = "
                FROM {$this->_table['mockSubject']} AS MS
                JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
                JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
                JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y' AND S.IsUse = 'Y'
                JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y' AND SC.IsUse = 'Y'
                LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
            ";
        }
        else {  // 모의고사등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $select = "
                SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                       CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), '] - ', MA.QuestionArea) AS CateRouteName,
                       MC.MrcIdx";
            $from = "
                FROM {$this->_table['mockSubject']} AS MS
                JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
                JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
                JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y' AND S.IsUse = 'Y'
                JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y' AND SC.IsUse = 'Y'
                JOIN {$this->_table['mockCate']} AS MC ON MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y'
                JOIN {$this->_table['mockArea']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
                LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
            ";
        }
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MS.IsStatus = 'Y' AND MS.IsUse = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, SC.OrderNum ASC, SJ.OrderNum ASC, MS.SubjectType ASC\n";


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


        if(!$isReg) {
            $select = "
                SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                       CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                       IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse";
            $from = "
                FROM {$this->_table['mockSubject']} AS MS
                JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
                JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
            ";
        }
        else { // 모의고사등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $select = "
                SELECT MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                       CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), '] - ', MA.QuestionArea) AS CateRouteName,
                       IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N' OR MA.IsUse = 'N', 'N', 'Y') AS BaseIsUse,
                       MC.MrcIdx";
            $from = "
                FROM {$this->_table['mockSubject']} AS MS
                JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
                JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                JOIN {$this->_table['mockCate']} AS MC ON MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y'
                JOIN {$this->_table['mockArea']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y'
                LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
            ";
        }
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MS.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, SC.OrderNum ASC, SJ.OrderNum ASC, MS.SubjectType ASC\n";


        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        if($useCount) $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        if($useCount) return array($data, $count);
        else return $data;
    }


    /**
     *  업로드시 저장될 파일명 생성
     */
    public function makeUploadFileName($in, $prefixLen=0)
    {
        $names = $_FILES;

        foreach ($names as $key => &$it) {
            if(in_array($key, $in)) {
                if (is_array($it['name'])) { // 업로드 배열로 받는 경우
                    $i = 1;
                    foreach ($it['name'] as $key_s => $it_s) {
                        $tmp = explode('.', $it['name'][$key_s]);
                        $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                        $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . $i . '_' : '';

                        $it['real'][] = $prefix . md5(uniqid(mt_rand())) . $ext;
                        $i++;
                    }
                }
                else {
                    $tmp = explode('.', $it['name']);
                    $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                    $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . '_' : '';

                    $it['real'] = $prefix . md5(uniqid(mt_rand())) . $ext;
                }
            }
        }

        return $names;
    }
}