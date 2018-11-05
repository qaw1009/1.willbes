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
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'mockProduct' => 'lms_Product_Mock',
        'product' => 'lms_Product',
        'productCate' => 'lms_Product_R_Category',

        'mockGroup' => 'lms_Mock_Group',
        'mockGroupR' => 'lms_Mock_R_Group',
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
        $condition = [ 'IN' => ['S.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MG.*, A.wAdminName, S.SiteCode
        ";
        $from = "
            FROM {$this->_table['mockGroup']} AS MG
            JOIN {$this->_table['site']} AS S ON MG.SiteGroupCode = S.SiteGroupCode
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
                'SiteGroupCode' => $_POST['SiteGroupCode'][0],
                'GroupName' => $this->input->post('GroupName', true),
                'IsDup' => $this->input->post('IsDup'),
                'GroupDesc' => $this->input->post('GroupDesc', true),
                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockGroup'], $data);

            $nowMaIdx = $this->_conn->insert_id();

            // lms_Mock_R_Group
            foreach ($this->input->post('ProdCode') as $it) {
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
                'SiteGroupCode' => $_POST['SiteGroupCode'][0],
                'GroupName' => $this->input->post('GroupName', true),
                'IsDup' => $this->input->post('IsDup'),
                'GroupDesc' => $this->input->post('GroupDesc', true),
                'IsUse' => $this->input->post('IsUse'),
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
        $sql = "
            SELECT MGR.MrgIdx, MP.*, PD.ProdName, S.SiteName, C1.CateName
            FROM {$this->_table['mockGroupR']} AS MGR
            JOIN {$this->_table['mockProduct']} AS MP ON MGR.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['productCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            WHERE MGR.IsStatus = 'Y' AND MGR.MgIdx = '$idx'
            ORDER BY MGR.MrgIdx ASC
        ";
        $mData = $this->_conn->query($sql)->result_array();

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);


        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($mData as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcds']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $mData);
    }


    /**
     * 모의고사상품 검색
     */
    public function searchGoodsList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MP.*, PD.ProdName, S.SiteName, S.SiteGroupCode, C1.CateName
        ";
        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y' AND PD.IsUse = 'Y'
            JOIN {$this->_table['productCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode AND S.IsStatus = 'Y' AND S.IsUse = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MP.IsStatus = 'Y' AND MP.IsUse = 'Y' AND MP.TakePart IS NOT NULL";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MP.ProdCode DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;


        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);


        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcds']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }


    /**
     * 모의고사상품 삭제
     */
    public function searchGoodsDel()
    {
        $data = array(
            'IsStatus' => 'N',
            'UpdDatm' => date("Y-m-d H:i:s"),
            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
        );
        $where = array('MrgIdx' => $this->input->post('idx'));

        $this->_conn->update($this->_table['mockGroupR'], $data, $where);
        if ($this->_conn->affected_rows()) return true;
        else return false;
    }
}
