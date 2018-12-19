<?php
/**
 * ======================================================================
 * 교수검색
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProfessorModel extends WB_Model
{
    private $_table = [
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }


    /**
     * 교수검색 리스트
     */
    public function professorList($conditionAdd='', $limit='', $offset='', $useCount=true, $isUseChk=true)
    {
        $condition = [ 'IN' => ['P.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        // $isUseChk=false : 수정화면에서 사용중지된 교수정보도 불러오기 위해
        $pms_isUse = ($isUseChk) ? "AND PMS.wIsUse = 'Y'" : "";
        $p_isUse = ($isUseChk) ? "AND P.IsUse = 'Y'" : "";


        $select = "
            SELECT P.ProfIdx, P.wProfIdx, P.SiteCode, P.ProfNickName, P.IsUse, P.RegDatm, P.RegAdminIdx,
            PMS.wProfName, PMS.wProfId, S.SiteName, A.wAdminName,
            IF(P.IsUse = 'N' OR PMS.wIsUse = 'N' OR S.IsUse = 'N', 'N', 'Y') AS BaseIsUse";
        $selectCount = "SELECT COUNT(*) AS cnt";

        $from = "
            FROM {$this->_table['professor']} AS P
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y' $pms_isUse
            JOIN {$this->_table['site']} AS S ON P.Sitecode = S.SiteCode
            LEFT JOIN {$this->_table['admin']} AS A ON P.RegAdminIdx = A.wAdminIdx
        ";
        $where = "WHERE P.IsStatus = 'Y' $p_isUse";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY PMS.wProfName\n";


        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        if($useCount) $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        if($useCount) return array($data, $count);
        else return $data;
    }
}