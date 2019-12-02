<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRangeModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mock_area' => 'lms_mock_area',
        'mock_area_list' => 'lms_mock_area_list',
        'mock_r_category' => 'lms_Mock_R_Category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 문제영역 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function list($arr_condition = [])
    {
        $add_condition = [
            'EQ' => ['MB.IsStatus' => 'Y'],
            'IN' => ['MB.SiteCode' => get_auth_site_codes()]
        ];
        $condition = array_merge_recursive($arr_condition, $add_condition);
        $group_by = ' group by MB.MaIdx ';
        $order_by = $this->_conn->makeOrderBy(['MB.MaIdx' => 'ASC'])->getMakeOrderBy();

        $column = "
            MB.*, A.wAdminName, GROUP_CONCAT(MC.MrsIdx) AS moCateKey,
            (SELECT COUNT(*) FROM {$this->_table['mock_area_list']} AS ML WHERE MB.MaIdx = ML.MaIdx AND ML.IsStatus = 'Y') AS ListCnt
        ";

        $from = "
            FROM {$this->_table['mock_area']} AS MB
            LEFT JOIN {$this->_table['mock_r_category']} AS MC ON MB.MaIdx = MC.MaIdx AND MC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MB.RegAdminIdx = A.wAdminIdx
        ";
        $where = $this->_conn->makeWhere($condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by)->result_array();
    }

    /**
     * 기본정보
     * @param $idx
     * @return mixed
     */
    public function getMockArea($idx)
    {
        $column = 'Ma.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_area']} AS Ma
            LEFT JOIN {$this->_table['admin']} as ADMIN ON Ma.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON Ma.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where MaIdx = ? and IsStatus = "Y"';
        return $this->_conn->query('select ' . $column . $from . $where, [$idx])->row_array();
    }

    /**
     * 챕터리스트
     * @param $idx
     * @return mixed
     */
    public function getMockAreaList($idx)
    {
        $column = 'ML.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_area_list']} AS ML
            LEFT JOIN {$this->_table['admin']} as ADMIN ON ML.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON ML.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where MaIdx = ? and IsStatus = "Y"';
        $order_by = ' order by OrderNum ASC';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by, [$idx])->result_array();
    }

    /**
     * 등록된 모의고사 카테고리 로드
     * @param $idx
     * @return array
     */
    public function getMockAreaListForCate($idx)
    {
        $moCate_name = $moCate_isUse = [];
        $moCateLink = $this->_conn->select('MrsIdx')->get_where($this->_table['mock_r_category'], ['MaIdx' => $idx, 'IsStatus' => 'Y'])->result_array();
        if($moCateLink) {
            $column = "
                MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
            ";
            $condition = [
                'IN' => ['MS.MrsIdx' => array_column($moCateLink, 'MrsIdx')]
            ];
            $moCate = $this->mockCommonModel->moCateListAll($column, false, $condition);

            $moCate_name = array_column($moCate, 'CateRouteName', 'MrsIdx');
            $moCate_isUse = array_column($moCate, 'BaseIsUse', 'MrsIdx');
        }

        return array($moCate_name, $moCate_isUse);
    }

    /**
     * 문제영역 기본정보 등록 (lms_Mock_Area, lms_Mock_R_Category)
     * @param array $form_data
     * @return array|bool
     */
    public function addMockArea($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            // 과목 기본정보 저장 (lms_Mock_Area)
            $input_data = [
                'SiteCode' => element('siteCode', $form_data),
                'QuestionArea' => element('questionArea', $form_data),
                'IsUse' => element('isUse', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];
            if ($this->_conn->set($input_data)->insert($this->_table['mock_area']) === false) {
                throw new Exception('기본정보 저장에 실패했습니다.');
            }
            $nowMaIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_Mock_R_Category)
            $moLink = array_filter(element('moLink', $form_data));
            foreach ($moLink as $it) {
                $input_data = [
                    'MrsIdx' => $it,
                    'MaIdx' => $nowMaIdx,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['mock_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }

    /**
     * 문제영역 기본정보 수정 (lms_Mock_Area, lms_Mock_R_Category)
     * @param array $form_data
     * @return array|bool
     */
    public function modifyMockArea($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            // 복사된 경우 카테고리 변경 (한번만)
            $moLink_del = array_diff(element('moLink_be', $form_data), element('moLink', $form_data));
            $moLink_add = array_diff(element('moLink', $form_data), element('moLink_be', $form_data));

            foreach ($moLink_del as $it) {
                $input_data = [
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    'UpdDatm' => date('Y-m-d H:i:s')
                ];
                $this->_conn->set($input_data)->where(['MaIdx' => element('idx', $form_data), 'MrsIdx' => $it]);
                if ($this->_conn->update($this->_table['mock_r_category']) === false) {
                    throw new \Exception('카테고리 데이터 수정에 실패했습니다.');
                }
            }
            foreach ($moLink_add as $it) {
                $input_data = [
                    'MrsIdx' => $it,
                    'MaIdx' => element('idx', $form_data),
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['mock_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }

            // lms_Mock_Area 데이터 변경
            $input_data = [
                'QuestionArea' => element('questionArea', $form_data),
                'IsUse' => element('isUse', $form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];
            $this->_conn->set($input_data)->where(['MaIdx' => element('idx', $form_data)]);
            if ($this->_conn->update($this->_table['mock_area']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => element('idx', $form_data)]];
    }

    /**
     * 문제영역 출제챕터 등록,수정
     * @param $form_data
     * @return array|bool
     */
    public function storeChapter($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $dataReg = $dataMod = $dataDel = [];
            if(empty(element('chapterTotal', $form_data)) === false) {
                foreach (element('chapterTotal', $form_data) as $k => $v) {
                    if ( empty(element('chapterExist', $form_data)) || !in_array($v, element('chapterExist', $form_data)) ) { // 신규등록 데이터
                        $dataReg[] = [
                            'MaIdx' => element('idx', $form_data),
                            'AreaName' => $this->security->xss_clean(element('areaName', $form_data)[$k]),
                            'OrderNum' => element('orderNum', $form_data)[$k],
                            'IsUse' => element('isUse', $form_data)[$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                            'RegDate' => date("Y-m-d H:i:s"),
                        ];
                    } else { // 수정 데이터
                        $dataMod[] = [
                            'MalIdx' => $v,
                            'AreaName' => $this->security->xss_clean(element('areaName', $form_data)[$k]),
                            'OrderNum' => element('orderNum', $form_data)[$k],
                            'IsUse' => element('isUse', $form_data)[$k],
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                    }
                }
            }

            // 삭제 데이터 (IsStatus Update)
            if (empty(element('chapterDel', $form_data)) === false) {
                foreach (element('chapterDel', $form_data) as $k => $v) {
                    $dataDel[] = [
                        'MalIdx' => $v,
                        'IsUse' => 'N',
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    ];
                }
            }

            if($dataReg) $this->_conn->insert_batch($this->_table['mock_area_list'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mock_area_list'], $dataMod, 'MalIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['mock_area_list'], $dataDel, 'MalIdx');

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 데이터 복사
     * @param $idx
     * @return array|bool
     */
    public function copyData($idx)
    {
        $this->_conn->trans_begin();
        try {
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            // lms_mock_area 복사
            $sql = "{$this->_table['mock_area']} (SiteCode, QuestionArea, IsUse, RegIp, RegAdminIdx, RegDatm)
                SELECT SiteCode, CONCAT('복사-', QuestionArea), 'N', ?, ?, ?
                FROM {$this->_table['mock_area']}
                WHERE MaIdx = ? AND IsStatus = 'Y'
            ";
            $this->_conn->query('insert into ' . $sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));
            $nowMaIdx = $this->_conn->insert_id();

            // lms_mock_area_list 복사
            $sql = "{$this->_table['mock_area_list']} (MaIdx, OrderNum, AreaName, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT ?, OrderNum, AreaName, IsUse, ?, ?, ?
                FROM {$this->_table['mock_area_list']}
                WHERE MaIdx = ? AND IsStatus = 'Y'
            ";
            $this->_conn->query('insert into ' . $sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            // lms_Mock_R_Category 복사
            $sql = "{$this->_table['mock_r_category']} (MrsIdx, MaIdx, RegIp, RegAdminIdx, RegDatm)
                SELECT MrsIdx, ?, ?, ?, ?
                FROM {$this->_table['mock_r_category']}
                WHERE MaIdx = ? AND IsStatus = 'Y'
            ";
            $this->_conn->query('insert into ' . $sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }
}