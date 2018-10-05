<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 과목별문제영역
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRangeModel extends WB_Model
{
    private $_table = [
        'mockArea' => 'lms_mock_area',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockAreaList' => 'lms_mock_area_list',
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
//        $in = "('". implode("', '", array_values(get_auth_site_codes())) ."')"; // 사이트 접근권한
//        $sql = "
//            SELECT M.*, S.SiteName,
//                   C1.CateCode AS gCateCode, C1.CateName AS gCateName, C1.CateDepth AS gCateDepth, C1.OrderNum AS gOrderNum, C1.IsUse AS gIsUse,
//                   C2.CateCode AS mCateCode, C2.CateName AS mCateName, C2.CateDepth AS mCateDepth, C2.OrderNum AS mOrderNum, C2.IsUse AS mIsUse,
//                   GREATEST(C1.CateDepth, IFNULL(C2.CateDepth, 0)) as LastCateDepth
//            FROM {$this->_table['site']} AS S
//            JOIN {$this->_table['category']} AS C1 ON S.SiteCode = C1.SiteCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
//            LEFT JOIN {$this->_table['category']} AS C2 ON C2.GroupCateCode = C1.CateCode AND C2.CateDepth = 2 AND C2.IsStatus = 'Y' AND C2.IsUse = 'Y'
//            RIGHT JOIN {$this->_table['mockBase']} AS M ON M.CateCode = C2.CateCode  AND M.IsStatus = 'Y'
//            WHERE S.IsStatus = 'Y' AND S.SiteCode IN $in
//            ORDER BY C1.SiteCode ASC, C1.OrderNum ASC, C2.OrderNum ASC";

        $sql = "
            SELECT B.*, COUNT(*) AS ListCnt
            FROM {$this->_table['mockArea']} AS B
            JOIN {$this->_table['mockAreaList']} AS L ON B.MaIdx = L.MaIdx AND L.IsStatus = 'Y'
            WHERE B.IsStatus = 'Y'
            GROUP BY B.MaIdx
        ";
        return $this->_conn->query($sql)->result_array();
    }


    /**
     * 문제영역 기본정보 등록 (lms_Mock_Area, lms_Mock_R_Category)
     */
    public function store()
    {
        try {
            $this->_conn->trans_start();

            // 과목 기본정보 저장 (lms_Mock_Area)
            $data = array(
                'SiteCode' => $this->input->post('siteCode'),
                'QuestionArea' => $this->input->post('questionArea', true),
                'IsUse' => $this->input->post('isUse'),
                'RegIp' => $this->input->ip_address(),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockArea'], $data);

            $nowMaIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_Mock_R_Category)
            $mCate = array_filter($this->input->post('mCate'));
            foreach ($mCate as $it) {
                $data = array(
                    'MrsIdx' => $it,
                    'MaIdx' => $nowMaIdx,
                    'RegIp' => $this->input->ip_address(),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                );
                $this->_conn->insert($this->_table['mockAreaCate'], $data);
            }

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }


    /**
     * 문제영역 기본정보 수정 (lms_Mock_Area)
     */
    public function update()
    {
        try {
            $data = array(
                'QuestionArea' => $this->input->post('questionArea', true),
                'IsUse' => $this->input->post('isUse'),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('MaIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockArea'], $data, $where);

            if ( !$this->_conn->affected_rows() ) {
                throw new Exception('변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }


    /**
     * 문제영역, 출제챕터 조회
     */
    public function getMockArea($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $data = $this->_conn->get_where($this->_table['mockArea'], array('MaIdx' => $idx))->row_array();
        if(empty($data)) return false;

        $cData = $this->_conn->order_by('OrderNum ASC')->get_where($this->_table['mockAreaList'], array('MaIdx' => $idx))->result_array();

        return array($data, $cData);
    }


    /**
     * 문제영역 출제챕터 등록,수정
     */
    public function storeChapter()
    {
        $dataReg = $dataMod = $dataDel = array();

        if( !empty($this->input->post('chapterIdx')) ) {
            foreach ($this->input->post('chapterIdx') as $k => $v) {
                if (!$v) { // 신규등록 데이터
                    $dataReg[] = array(
                        'MaIdx' => $this->input->post('idx'),
                        'AreaName' => $this->security->xss_clean($_POST['areaName'][$k]),
                        'OrderNum' => $_POST['orderNum'][$k],
                        'IsUse' => $_POST['isUse'][$k],
                        'RegIp' => $this->input->ip_address(),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                } else { // 수정 데이터
                    $dataMod[] = array(
                        'MalIdx' => $v,
                        'AreaName' => $this->security->xss_clean($_POST['areaName'][$k]),
                        'OrderNum' => $_POST['orderNum'][$k],
                        'IsUse' => $_POST['isUse'][$k],
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }
        }

        // 삭제 데이터 (IsStatus Update)
        if( !empty($this->input->post('chapterDel')) ) {
            foreach ($this->input->post('chapterDel') as $k => $v) {
                $dataDel[] = array(
                    'MalIdx' => $v,
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                );
            }
        }


        try {
            $this->_conn->trans_start();

            if($dataReg) $this->_conn->insert_batch($this->_table['mockAreaList'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mockAreaList'], $dataMod, 'MalIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['mockAreaList'], $dataDel, 'MalIdx');

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

}
