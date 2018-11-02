<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사그룹등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGroupModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mockExamBase' => 'lms_mock_paper',
        'mockExamQuestion' => 'lms_mock_questions',
        'mockSubject' => 'lms_mock_r_subject',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockBase' => 'lms_mock',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',

        'mockGroup' => 'lms_Mock_Group',
        'mockGroupR' => 'lms_Mock_R_Group',
        'mockProduct' => 'lms_Product_Mock',
        'product' => 'lms_Product',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MG.*, A.wAdminName, PD.SiteCode
        ";
        $from = "
            FROM {$this->_table['mockGroup']} AS MG
            JOIN {$this->_table['mockGroupR']} AS MGR ON MG.MgIdx = MGR.MgIdx AND MGR.IsStatus = 'Y'
            JOIN {$this->_table['mockProduct']} AS MP ON MGR.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MG.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MG.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MG.MgIdx DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }


    /**
     * 등록
     */
    public function store()
    {
        try {
            $this->_conn->trans_start();

            // lms_Mock_Group
            $data = array(
                'GroupName' => $this->input->post('GroupName', true),
                'IsDup' => $this->input->post('IsDup'),
                'GroupDesc' => $this->input->post('GroupDesc', true),
                'IsUse' => $this->input->post('isUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockGroup'], $data);

            $nowMaIdx = $this->_conn->insert_id();

            // lms_Mock_R_Group
            foreach ($moLink as $it) {
                $data = array(
                    'MgIdx' => $nowMaIdx,
                    'ProdCode' => $it,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                );
                $this->_conn->insert($this->_table['mockGroupR'], $data);
            }

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    /**
     * 수정
     */
    public function update()
    {
        try {
            $this->_conn->trans_start();

            // lms_Mock_Group
            $data = array(
                'GroupName' => $this->input->post('GroupName', true),
                'IsDup' => $this->input->post('IsDup'),
                'GroupDesc' => $this->input->post('GroupDesc', true),
                'IsUse' => $this->input->post('isUse'),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('MgIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockGroup'], $data, $where);

            // lms_Mock_R_Group
            $dataReg = $dataMod = array();
            if( !empty($this->input->post('chapterTotal')) ) {
                foreach ($this->input->post('chapterTotal') as $k => $v) {
                    if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록 데이터
                        $dataReg[] = array(
                            'MgIdx' => $this->input->post('idx'),
                            'ProdCode' => $_POST['ProdCode'][$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    } else { // 수정 데이터
                        $dataMod[] = array(
                            'MrgIdx' => $v,
                            'ProdCode' => $_POST['ProdCode'][$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    }
                }
            }
            if($dataReg) $this->_conn->insert_batch($this->_table['mockGroupR'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mockGroupR'], $dataMod, 'MrgIdx');


            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    /**
     * 등록정보 조회
     */
    public function getGroup($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $where = array('MgIdx' => $idx, 'IsStatus' => 'Y');

        // 기본정보
        $data = $this->_conn->get_where($this->_table['mockGroup'], $where)->row_array();
        if(empty($data)) return false;

        // 선택한 모의고사정보
        $mData = $this->_conn->get_where($this->_table['mockGroupR'], $where)->result_array();

        return array($data, $mData);
    }


    /**
     * 모의고사 상품검색
     */
    public function searchGoodsList($conditionAdd='', $limit='', $offset='', $useCount=true, $isReg=false)
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
}
