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
        'admin' => 'wbs_sys_admin',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockAreaCate' => 'lms_Mock_R_Category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메인리스트
     *
     * 영역수 : 사용,미사용 포함 전체갯수
     */
    public function list()
    {
        $sql = "
            SELECT MB.*, A.wAdminName, GROUP_CONCAT(MC.MrsIdx) AS moCateKey,
            (SELECT COUNT(*) FROM {$this->_table['mockAreaList']} AS ML WHERE MB.MaIdx = ML.MaIdx AND ML.IsStatus = 'Y') AS ListCnt
            FROM {$this->_table['mockArea']} AS MB
            LEFT JOIN {$this->_table['mockAreaCate']} AS MC ON MB.MaIdx = MC.MaIdx AND MC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MB.RegAdminIdx = A.wAdminIdx AND A.wIsStatus = 'Y' AND A.wIsUse = 'Y'
            WHERE MB.IsStatus = 'Y'
            GROUP BY MB.MaIdx
            ORDER BY MB.MaIdx DESC
        ";
        $list = $this->_conn->query($sql)->result_array();

        $moCate = $this->mockCommonModel->moCateList('', '', '', false);
        $moList = [];
        foreach ($moCate as $it) {
            $moList[ $it['MrsIdx'] ] = array(
                'cate1'   => $it['CateCode1'],
                'cate2'   => $it['CateCode2'],
                'subject' => $it['SubjectIdx'],
                'name'    => $it['CateRouteName'],
            );
        }

        return array($list, $moList);
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
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockArea'], $data);

            $nowMaIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_Mock_R_Category)
            $moLink = array_filter($this->input->post('moLink'));
            foreach ($moLink as $it) {
                $data = array(
                    'MrsIdx' => $it,
                    'MaIdx' => $nowMaIdx,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
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
            $this->_conn->trans_start();

            // 복사된 경우 카테고리 변경 (한번만)
            if($this->input->post('isCopy')) {
                $moLink_del = array_diff($this->input->post('moLink_be'), $this->input->post('moLink'));
                $moLink_add = array_diff($this->input->post('moLink'), $this->input->post('moLink_be'));

                foreach ($moLink_del as $it) {
                    $data = array('IsStatus' => 'N');
                    $where = array('MaIdx' => $this->input->post('idx'), 'MrsIdx' => $it);
                    $this->_conn->update($this->_table['mockAreaCate'], $data, $where);
                }
                foreach ($moLink_add as $it) {
                    $data = array(
                        'MrsIdx' => $it,
                        'MaIdx' => $this->input->post('idx'),
                        'RegIp' => $this->input->ip_address(),
                        'RegDatm' => date("Y-m-d H:i:s"),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                    $this->_conn->insert($this->_table['mockAreaCate'], $data);
                }
            }

            // lms_Mock_Area 데이터 변경
            $data = array(
                'QuestionArea' => $this->input->post('questionArea', true),
                'IsUse' => $this->input->post('isUse'),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('MaIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockArea'], $data, $where);

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
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
     *
     * (주의) lms_Mock_R_Category에 등록된 카테고리 상태가 Y라도 상위의 lms_Mock_R_Subject, lms_sys_Subject에서 사용불가상태일 경우 표시안됨
     */
    public function getMockArea($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $where = array('MaIdx' => $idx, 'IsStatus' => 'Y');

        // 기본정보
        $data = $this->_conn->get_where($this->_table['mockArea'], $where)->row_array();
        if(empty($data)) return false;

        // 챕터리스트
        $chData = $this->_conn->order_by('OrderNum ASC')->get_where($this->_table['mockAreaList'], $where)->result_array();

        // 등록된 모의고사 카테고리 로드
        $moCate = array();
        $moCateLink = $this->_conn->select('MrsIdx')->get_where($this->_table['mockAreaCate'], $where)->result_array();
        if($moCateLink) {
            $condition = [
                'IN' => ['MS.MrsIdx' => array_column($moCateLink, 'MrsIdx')]
            ];
            $moCate = $this->mockCommonModel->moCateList($condition, '', '', false);
            $moCate = array_column($moCate, 'CateRouteName', 'MrsIdx');
        }

        return array($data, $chData, $moCate);
    }


    /**
     * 문제영역 출제챕터 등록,수정
     */
    public function storeChapter()
    {
        $dataReg = $dataMod = $dataDel = array();

        if( !empty($this->input->post('chapterTotal')) ) {
            foreach ($this->input->post('chapterTotal') as $k => $v) {
                if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록 데이터
                    $dataReg[] = array(
                        'MaIdx' => $this->input->post('idx'),
                        'AreaName' => $this->security->xss_clean($_POST['areaName'][$k]),
                        'OrderNum' => $_POST['orderNum'][$k],
                        'IsUse' => $_POST['isUse'][$k],
                        'RegIp' => $this->input->ip_address(),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        'RegDate' => date("Y-m-d H:i:s"),
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
                    'IsUse' => 'N',
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


    /**
     * 데이터 복사
     */
    public function copyData($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $RegIp = $this->input->ip_address();
        $RegAdminIdx = $this->session->userdata('admin_idx');
        $RegDatm = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // lms_mock_area 복사
            $sql = "
                INSERT INTO {$this->_table['mockArea']} (SiteCode, QuestionArea, IsUse, RegIp, RegAdminIdx, RegDatm)
                SELECT SiteCode, CONCAT('복사-', QuestionArea), 'N', ?, ?, ?
                FROM {$this->_table['mockArea']}
                WHERE MaIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowMaIdx = $this->_conn->insert_id();

            // lms_mock_area_list 복사
            $sql = "
                INSERT INTO {$this->_table['mockAreaList']} (MaIdx, OrderNum, AreaName, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT ?, OrderNum, AreaName, IsUse, ?, ?, ?
                FROM {$this->_table['mockAreaList']}
                WHERE MaIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            // lms_Mock_R_Category 복사
            $sql = "
                INSERT INTO {$this->_table['mockAreaCate']} (MrsIdx, MaIdx, RegIp, RegAdminIdx, RegDatm)
                SELECT MrsIdx, ?, ?, ?, ?
                FROM {$this->_table['mockAreaCate']}
                WHERE MaIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }
}
