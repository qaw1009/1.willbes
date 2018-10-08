<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCodeModel extends WB_Model
{
    private $_table = [
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
     * 메인리스트
     */
    public function list()
    {
        // 리스트
        $in = "('". implode("', '", array_values(get_auth_site_codes())) ."')"; // 사이트 접근권한
        $sql = "
            SELECT M.*, S.SiteName,
                   C1.CateCode AS gCateCode, C1.CateName AS gCateName, C1.CateDepth AS gCateDepth, C1.OrderNum AS gOrderNum, C1.IsUse AS gIsUse,
                   C2.CateCode AS mCateCode, C2.CateName AS mCateName, C2.CateDepth AS mCateDepth, C2.OrderNum AS mOrderNum, C2.IsUse AS mIsUse,
                   GREATEST(C1.CateDepth, IFNULL(C2.CateDepth, 0)) as LastCateDepth
            FROM {$this->_table['site']} AS S
            JOIN {$this->_table['category']} AS C1 ON S.SiteCode = C1.SiteCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
            LEFT JOIN {$this->_table['category']} AS C2 ON C2.GroupCateCode = C1.CateCode AND C2.CateDepth = 2 AND C2.IsStatus = 'Y' AND C2.IsUse = 'Y'
            RIGHT JOIN {$this->_table['mockBase']} AS M ON M.CateCode = C2.CateCode  AND M.IsStatus = 'Y'
            WHERE S.IsStatus = 'Y' AND S.SiteCode IN $in
            ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, C2.OrderNum ASC";

        $listDB = $this->_conn->query($sql)->result_array();

        // 과목
        $sql = "
            SELECT CONCAT(SJ.MmIdx,'-',SJ.SubjectType) AS SubjectKey, GROUP_CONCAT(SJ.SubjectIdx) AS SubjectIdxs, GROUP_CONCAT(PS.SubjectName SEPARATOR ', ') AS SubjectNames
            FROM {$this->_table['mockSubject']} AS SJ
            JOIN {$this->_table['subject']} AS PS ON SJ.SubjectIdx = PS.SubjectIdx AND PS.IsStatus = 'Y' AND PS.IsUse = 'Y'
            WHERE SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
            GROUP BY SJ.MmIdx, SJ.SubjectType
            ORDER BY PS.SiteCode ASC, PS.OrderNum ASC";

        $subjectDB = $this->_conn->query($sql)->result_array();
        $subjectNames = array_column($subjectDB, 'SubjectNames', 'SubjectKey');
        $subjectIdxs = array_column($subjectDB, 'SubjectIdxs', 'SubjectKey');

        return array($listDB, $subjectNames, $subjectIdxs);
    }


    /**
     * 직렬 조회 (1건)
     */
    public function getKind($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $db = $this->_conn->get_where($this->_table['mockBase'], array('MmIdx' => $idx))->row_array();
        if(empty($db)) return false;
        else return $db;
    }


    /**
     * 직렬 등록
     */
    public function storeKind()
    {
        try {
            $data = array(
                'SiteCode' => $this->input->post('site'),
                'CateCode' => $this->input->post('cateD2'),
                'OrderNum' => $this->input->post('orderNum'),
                'IsUse' => $this->input->post('isUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );

            $table = $this->_table['mockBase'];
            $keys = "`". implode("`, `", array_keys($data)) ."`";
            $values = "'". implode("', '", $this->_conn->escape_str(array_values($data))) ."'";
            $exist_where = "`CateCode` = '". $this->_conn->escape_str($data['CateCode']) ."'";

            $sql = "INSERT INTO $table ($keys) SELECT $values FROM DUAL
					WHERE NOT EXISTS (SELECT * FROM $table WHERE $exist_where)";

            $this->_conn->query($sql);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('이미 존재하는 직렬입니다. 정보변경을 해 주세요.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }


    /**
     * 직렬 수정
     */
    public function updateKind()
    {
        $data = array(
            'OrderNum' => $this->input->post('orderNum'),
            'IsUse' => $this->input->post('isUse'),
            'UpdDatm' => date("Y-m-d H:i:s"),
            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
        );
        $where = array('MmIdx' => $this->input->post('idx'));

        $this->_conn->update($this->_table['mockBase'], $data, $where);
        if ($this->_conn->affected_rows()) return true;
        else return false;
    }


    /**
     * 과목정보 로드
     * @param number $MmIdx (lms_mock의 idx)
     * @param string $SubjectType E:필수, S:선택
     * @return array
     *
     */
    public function getSubject($MmIdx, $SubjectType)
    {
        $baseDB = $this->getKind($MmIdx);
        if(empty($baseDB)) return false;

        $sql = "
            SELECT S.SiteCode AS sSiteCode, S.SubjectIdx AS sSubjectIdx, S.SubjectName AS sSubjectName, MS.*
            FROM {$this->_table['subject']} AS S
            LEFT JOIN {$this->_table['mockSubject']} AS MS ON S.SubjectIdx = MS.SubjectIdx AND MS.MmIdx = ? AND MS.SubjectType = ? AND MS.IsStatus = 'Y'
            WHERE S.SiteCode = ? AND S.IsStatus = 'Y' AND S.IsUse = 'Y'
            ORDER BY S.SiteCode ASC, S.OrderNum ASC
        ";
        $subjectDB = $this->_conn->query($sql, array($MmIdx, $SubjectType, $baseDB['SiteCode']))->result_array();
        if(empty($subjectDB)) return false;

        $adminNames = $this->mockCommonModel->getAdminNames();
        $adminInfo = array('RegDatm' => '', 'RegAdminIdx' => '','UpdDatm' => '', 'UpdAdminIdx' => '');
        foreach ($subjectDB as $it) {
            if($it['MrsIdx']) {
                $adminInfo = array(
                    'RegDatm'     => $it['RegDatm'],
                    'RegAdminIdx' => @$adminNames[$it['RegAdminIdx']],
                    'UpdDatm'     => $it['UpdDatm'],
                    'UpdAdminIdx' => @$adminNames[$it['UpdAdminIdx']],
                );
                break;
            }
        }
        return array($baseDB, $subjectDB, $adminInfo);
    }


    /**
     * 과목 등록,수정
     *
     * MmIdx + SubjectIdx + SubjectType 이 중복되지 않게 유니크하게 처리
     * IsUse 값으로 사용여부 표시
     * SubjectType - E:필수, S:선택
     */
    public function storeSubject()
    {
        $table = $this->_table['mockSubject'];

        try {
            $this->_conn->trans_start();

            // 저장되어 있지 않은 과목 저장
            if( !empty($this->input->post('subjectIdx')) ) {
                foreach ($this->input->post('subjectIdx') as $it) {
                    $data = array(
                        'MmIdx' => $this->input->post('idx'),
                        'SubjectIdx' => $it,
                        'SubjectType' => $this->input->post('sjType'),
                        'IsUse' => 'Y',
                        'RegIp' => $this->input->ip_address(),
                        'RegDatm' => date("Y-m-d H:i:s"),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );

                    $keys = "`" . implode("`, `", array_keys($data)) . "`";
                    $values = "'" . implode("', '", $this->_conn->escape_str(array_values($data))) . "'";
                    $exist_where = "`MmIdx` = '" . $this->_conn->escape_str($this->input->post('idx')) . "'";
                    $exist_where .= "AND `SubjectIdx` = '" . $this->_conn->escape_str($it) . "'";
                    $exist_where .= "AND `SubjectType` = '" . $this->_conn->escape_str($this->input->post('sjType')) . "'";

                    $sql = "INSERT INTO $table ($keys) SELECT $values FROM DUAL
					        WHERE NOT EXISTS (SELECT * FROM $table WHERE $exist_where)";
                    $this->_conn->query($sql);
                }
            }

            // IsUse 모두 미사용으로 Update
            $data = array(
                'IsUse' => 'N',
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('MmIdx' => $this->input->post('idx'), 'SubjectType' => $this->input->post('sjType'));
            $this->_conn->update($table, $data, $where);

            // 체크된 항목 IsUse 사용으로 Update
            if( !empty($this->input->post('subjectIdx')) ) {
                $data = array(
                    'IsUse' => 'Y',
                    'UpdDatm' => date("Y-m-d H:i:s"),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                );
                $where = array('MmIdx' => $this->input->post('idx'), 'SubjectType' => $this->input->post('sjType'));
                $this->_conn->where($where)
                            ->where_in('SubjectIdx', $this->input->post('subjectIdx'))
                            ->update($table, $data);
            }

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('과목 저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }


    /**
     * 사용,미사용 전환
     */
    public function useToggle()
    {
        $data = array(
            'IsUse' => ($this->input->post('isUse') == 'Y') ? 'N' : 'Y',
            'UpdDatm' => date("Y-m-d H:i:s"),
            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
        );
        $where = array('MmIdx' => $this->input->post('idx'));

        $this->_conn->update($this->_table['mockBase'], $data, $where);
        if ($this->_conn->affected_rows()) return true;
        else return false;
    }
}
