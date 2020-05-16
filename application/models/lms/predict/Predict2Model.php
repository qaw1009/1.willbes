<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predict2Model extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'sys_category' => 'lms_sys_category',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
        'product_subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'lms_member' => 'lms_member',

        'predict2_code' => 'lms_predict2_code',
        'predict2_r_subject' => 'lms_predict2_r_subject',
        'predict2_r_category' => 'lms_predict2_r_category',
        'predict2_area' => 'lms_predict2_area',
        'predict2_area_list' => 'lms_predict2_area_list',
        'predict2_paper' => 'lms_predict2_paper',
        'predict2_paper_r_category' => 'lms_predict2_paper_r_category',
        'predict2_questions' => 'lms_predict2_questions',
        'product_predict2' => 'lms_product_predict2',
        'product_predict2_r_paper' => 'lms_product_predict2_r_paper',
        'predict2_register' => 'lms_predict2_register',
        'predict2_register_r_paper' => 'lms_predict2_register_r_paper',
        'predict2_grades_origin' => 'lms_predict2_grades_origin',
        'predict2_answerpaper' => 'lms_predict2_answerpaper',
    ];

    private $upload_path;            // 업로드 기본경로
    private $upload_path_predict2;       // 통파일 저장경로: ~/mocktest/{idx}/
    private $upload_path_predict2Q;      // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    private $upload_path_predict2Backup; // 백업파일 저장경로 {$uploadPath_mock}/bak_{date}/

    public $_groupCcd = [];

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->config('upload');
        $this->upload_path = $this->config->item('upload_path');
        $this->upload_path_predict2 = $this->config->item('upload_path_predict2', 'predict2');
        $this->upload_path_predict2Q = $this->config->item('upload_path_predict2Q', 'predict2');
        $this->upload_path_predict2Backup = $this->config->item('upload_path_predict2Backup', 'predict2');

        $this->_groupCcd = [
            'sysCode_kind' => $this->config->item('sysCode_kind', 'mock'),
        ];
    }

    public function codeList()
    {
        $order_by = $this->_conn->makeOrderBy(['C1.SiteCode' => 'ASC', 'C1.OrderNum' => 'ASC', 'SC.OrderNum' => 'ASC'])->getMakeOrderBy();
        $arr_condition['IN']['S.SiteCode'] = get_auth_site_codes();

        $column = '
            M.*, S.SiteName, A.wAdminName,
            C1.CateCode AS gCateCode, C1.CateName AS gCateName, C1.IsUse AS gIsUse,
            SC.Ccd AS mCateCode, SC.CcdName AS mCateName, SC.IsUse AS mIsUse
        ';
        $from = "
            FROM {$this->_table['site']} AS S
            JOIN {$this->_table['sys_category']} AS C1 ON S.SiteCode = C1.SiteCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            RIGHT JOIN {$this->_table['predict2_code']} AS M ON M.CateCode = C1.CateCode AND M.IsStatus = 'Y'
            JOIN {$this->_table['sys_code']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON M.RegAdminIdx = A.wAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);

        return $query->result_array();
    }

    /**
     * 직렬 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findMockData($arr_condition)
    {
        $column = '*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['predict2_code']} AS MB
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MB.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MB.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 카테고리에 매핑된 직렬 로딩
     * @param bool $isUseChk
     * @return mixed
     */
    public function getTakeMockPart($isUseChk = true)
    {
        $order_by = $this->_conn->makeOrderBy(['SC.OrderNum' => 'ASC', 'SC.CcdName' => 'ASC'])->getMakeOrderBy();
        $arr_condition = ['EQ' => ['M.IsStatus' => 'Y']];

        if (empty($isUseChk) === true) {
            $arr_condition['EQ']['M.IsUse'] = 'Y';
            $isUse_SC = "AND SC.IsUse = 'Y'";
        } else {
            $isUse_SC = "";
        }

        $column = 'M.SiteCode, M.CateCode AS ParentCateCode, SC.Ccd AS CateCode, SC.CcdName AS CateName';
        $from = "
            FROM {$this->_table['predict2_code']} AS M
            JOIN {$this->_table['sys_code']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y' $isUse_SC
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 등록된상품기준 과목정보 조회
     * @return mixed
     */
    public function getRegPaper()
    {
        $column = 'PRP.PredictIdx2, PRP.PpIdx, PP.PapaerName';
        $from = "
            FROM {$this->_table['product_predict2_r_paper']} AS PRP
            INNER JOIN {$this->_table['predict2_paper']} AS PP ON PRP.PpIdx = PP.PpIdx
        ";
        return $this->_conn->query('select '. $column . $from)->result_array();
    }

    /**
     * 직렬(운영코드) 전체 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    public function getTakeMockPartAll($isUseChk = true)
    {
        $sysCode_kind = $this->config->item('sysCode_kind', 'mock');
        $arr_condition = [
            'EQ' => [
                'GroupCcd' => $sysCode_kind,
                'IsStatus' => 'Y'
            ]
        ];

        if (empty($isUseChk) === true) {
            $arr_condition['EQ']['IsUse'] = 'Y';
        }

        $column = 'Ccd, CcdName';
        $from = " FROM {$this->_table['sys_code']}";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->result_array();
    }

    /**
     * 그룹 과목조회
     * @return mixed
     */
    public function getSubjectGroupForMockBaseCode()
    {
        $group_by = 'GROUP BY SJ.PcIdx, SJ.SubjectType ASC';
        $order_by = $this->_conn->makeOrderBy(['SJ.PcIdx' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'SJ.IsStatus' => 'Y',
                'SJ.IsUse' => 'Y'
            ]
        ];

        $column = '
            SJ.PcIdx, SJ.SubjectType, GROUP_CONCAT(SJ.SubjectIdx) AS SubjectIdxs,
            GROUP_CONCAT(IF(PS.IsUse = \'Y\', PS.SubjectName, CONCAT(PS.SubjectName, \'미사용\')) SEPARATOR \', \') AS SubjectNames
        ';
        $from = "
            FROM {$this->_table['predict2_r_subject']} AS SJ
            JOIN {$this->_table['product_subject']} AS PS ON SJ.SubjectIdx = PS.SubjectIdx AND PS.IsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by);
        return $query->result_array();
    }

    /**
     * 직렬 등록
     * @param $input
     * @return array|bool
     */
    public function storeKind($input)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = array(
                'SiteCode' => element('site',$input),
                'CateCode' => element('cateD1',$input),
                'Ccd' => element('cateD2',$input),
                'OrderNum' => element('orderNum',$input),
                'IsUse' => element('isUse',$input),
                'RegAdminIdx' => element('admin_idx',$input),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s")
            );

            $table = $this->_table['predict2_code'];
            $keys = "`". implode("`, `", array_keys($input_data)) ."`";
            $values = "'". implode("', '", $this->_conn->escape_str(array_values($input_data))) ."'";
            $exist_where = "`CateCode` = '". $this->_conn->escape_str($input_data['CateCode']) ."' AND `Ccd` = '". $this->_conn->escape_str($input_data['Ccd']) ."'";

            $sql = "INSERT INTO $table ($keys) SELECT $values FROM DUAL
					WHERE NOT EXISTS (SELECT * FROM $table WHERE $exist_where)";
            $this->_conn->query($sql);
            if ($this->_conn->affected_rows() < 1) {
                throw new Exception('이미 존재하는 직렬입니다. 정보변경을 해 주세요.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 직렬 수정
     * @param $input_data
     * @return array|bool
     */
    public function updateKind($input_data)
    {
        $this->_conn->trans_begin();
        try {
            $input = [
                'OrderNum' => element('orderNum',$input_data),
                'IsUse' => element('isUse',$input_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['PcIdx' => element('idx', $input_data)];
            $this->_conn->set($input)->where($where);
            if ($this->_conn->update($this->_table['predict2_code']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 직렬 사용,미사용 전환
     * @param $input_data
     * @return bool
     */
    public function useToggle($input_data)
    {
        $this->_conn->trans_begin();
        try {
            $input = [
                'IsUse' => (element('isUse', $input_data) == 'Y') ? 'N' : 'Y',
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['PcIdx' => element('idx', $input_data)];
            $this->_conn->set($input)->where($where);
            if ($this->_conn->update($this->_table['predict2_code']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * @param $arr_condition
     * @param $arr_condition_sub
     * @return mixed
     */
    public function getSubjectForMockBaseCode($arr_condition, $arr_condition_sub)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(true);

        $order_by = $this->_conn->makeOrderBy(['S.SiteCode' => 'ASC', 'S.OrderNum' => 'ASC'])->getMakeOrderBy();
        $column = 'S.SiteCode AS sSiteCode, S.SubjectIdx AS sSubjectIdx, S.SubjectName AS sSubjectName, S.IsUse AS sIsUse, MS.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['product_subject']} AS S
            LEFT JOIN {$this->_table['predict2_r_subject']} AS MS ON S.SubjectIdx = MS.SubjectIdx {$where_sub}
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MS.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MS.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 과목 저장/수정
     * @param $input_data
     * @return array|bool
     */
    public function storeSubject($input_data)
    {
        $this->_conn->trans_begin();
        try {
            // 저장되어 있지 않은 과목 저장
            $result = [];
            if (empty(element('subjectIdx',$input_data)) === false) {
                foreach ($this->input->post('subjectIdx') as $key => $it) {
                    $data = [
                        'PcIdx' => element('idx',$input_data),
                        'SubjectIdx' => $it,
                        'SubjectType' => element('sjType',$input_data),
                        'IsUse' => 'Y',
                        'RegIp' => $this->input->ip_address(),
                        'RegDatm' => date("Y-m-d H:i:s"),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    ];

                    $keys = "`" . implode("`, `", array_keys($data)) . "`";
                    $values = "'" . implode("', '", $this->_conn->escape_str(array_values($data))) . "'";
                    $exist_where = "`PcIdx` = '" . $this->_conn->escape_str(element('idx',$input_data)) . "'";
                    $exist_where .= " AND `SubjectIdx` = '" . $this->_conn->escape_str($it) . "'";
                    $exist_where .= " AND `SubjectType` = '" . $this->_conn->escape_str(element('sjType',$input_data)) . "'";
                    $sql = "INSERT INTO {$this->_table['predict2_r_subject']} ($keys) SELECT $values FROM DUAL
					        WHERE NOT EXISTS (SELECT * FROM {$this->_table['predict2_r_subject']} WHERE $exist_where)";
                    $result[$key] = $this->_conn->query($sql);
                }
            }
            foreach ($result as $key => $val) {
                if ($val === false) {
                    throw new Exception('과목 저장에 실패했습니다.');
                }
            }

            // IsUse 모두 미사용으로 Update
            $data = array(
                'IsUse' => 'N',
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = ['PcIdx' => element('idx', $input_data), 'SubjectType' => element('sjType', $input_data)];
            $this->_conn->update($this->_table['predict2_r_subject'], $data, $where);

            // 체크된 항목 IsUse 사용으로 Update
            if (empty(element('subjectIdx', $input_data)) === false) {
                $data = [
                    'IsUse' => 'Y',
                    'UpdDatm' => date("Y-m-d H:i:s"),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                $where = ['PcIdx' => element('idx', $input_data), 'SubjectType' => element('sjType', $input_data)];
                $result = $this->_conn->where($where)
                    ->where_in('SubjectIdx', element('subjectIdx', $input_data))
                    ->update($this->_table['predict2_r_subject'], $data);
            }
            if ($result === false) {
                throw new Exception('과목 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 문제영역 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function areaRangeList($arr_condition = [])
    {
        $add_condition = [
            'EQ' => ['MB.IsStatus' => 'Y'],
            'IN' => ['MB.SiteCode' => get_auth_site_codes()]
        ];
        $condition = array_merge_recursive($arr_condition, $add_condition);
        $group_by = ' group by MB.PaIdx ';
        $order_by = $this->_conn->makeOrderBy(['MB.PaIdx' => 'ASC'])->getMakeOrderBy();

        $column = "
            MB.*, A.wAdminName, GROUP_CONCAT(MC.PrsIdx) AS moCateKey,
            (SELECT COUNT(*) FROM {$this->_table['predict2_area_list']} AS ML WHERE MB.PaIdx = ML.PaIdx AND ML.IsStatus = 'Y') AS ListCnt
        ";

        $from = "
            FROM {$this->_table['predict2_area']} AS MB
            LEFT JOIN {$this->_table['predict2_r_category']} AS MC ON MB.PaIdx = MC.PaIdx AND MC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MB.RegAdminIdx = A.wAdminIdx
        ";
        $where = $this->_conn->makeWhere($condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by)->result_array();
    }

    /**
     * 문제영역 기본정보
     * @param $idx
     * @return mixed
     */
    public function getMockArea($idx)
    {
        $column = 'Ma.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['predict2_area']} AS Ma
            LEFT JOIN {$this->_table['admin']} as ADMIN ON Ma.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON Ma.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where PaIdx = ? and IsStatus = "Y"';
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
            FROM {$this->_table['predict2_area_list']} AS ML
            LEFT JOIN {$this->_table['admin']} as ADMIN ON ML.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} as ADMIN2 ON ML.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = ' where PaIdx = ? and IsStatus = "Y"';
        $order_by = ' order by OrderNum ASC';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by, [$idx])->result_array();
    }

    /**
     * 등록된 카테고리 로드
     * @param $idx
     * @return array
     */
    public function getMockAreaListForCate($idx)
    {
        $moCate_name = $moCate_isUse = [];
        $moCateLink = $this->_conn->select('PrsIdx')->get_where($this->_table['predict2_r_category'], ['PaIdx' => $idx, 'IsStatus' => 'Y'])->result_array();
        if($moCateLink) {
            $column = "
                MB.PcIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
            ";
            $condition = [
                'IN' => ['MS.PrsIdx' => array_column($moCateLink, 'PrsIdx')]
            ];
            $moCate = $this->moCateListAll($column, false, $condition);

            $moCate_name = array_column($moCate, 'CateRouteName', 'PrsIdx');
            $moCate_isUse = array_column($moCate, 'BaseIsUse', 'PrsIdx');
        }

        return array($moCate_name, $moCate_isUse);
    }

    /**
     * 카테고리 검색
     * @param string $column
     * @param bool $is_count
     * @param array $conditionAdd
     * @param bool $isUse
     * @param string $isReg
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function moCateListAll($column = '*', $is_count = false, $conditionAdd = [], $isUse = false, $isReg = '', $limit = null, $offset = null)
    {
        if(empty($isReg) === true) {
            $from = " FROM {$this->_table['predict2_r_subject']} AS MS";
            $from .= " JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'" . (($isUse === true) ? " AND SJ.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['predict2_code']} AS MB ON MS.PcIdx = MB.PcIdx AND MB.IsStatus = 'Y'" . (($isUse === true) ? " AND MB.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'" . (($isUse === true) ? " AND S.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'" . (($isUse === true) ? " AND C1.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'" . (($isUse === true) ? " AND SC.IsUse = 'Y'" : "");
            $from .= " LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx";

        } else { // 서비스등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $from = " FROM {$this->_table['predict2_r_subject']} AS MS";
            $from .= " JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'" . (($isUse === true) ? " AND SJ.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['predict2_code']} AS MB ON MS.PcIdx = MB.PcIdx AND MB.IsStatus = 'Y'" . (($isUse === true) ? " AND MB.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'" . (($isUse === true) ? " AND S.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'" . (($isUse === true) ? " AND C1.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'" . (($isUse === true) ? " AND SC.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['predict2_r_category']} AS MC ON MS.PrsIdx = MC.PrsIdx AND MC.IsStatus = 'Y'";
            $from .= " JOIN {$this->_table['predict2_area']} AS MA ON MC.PaIdx = MA.PaIdx AND MA.IsStatus = 'Y'" . (($isUse === true) ? " AND MA.IsUse = 'Y'" : "");
            $from .= " LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx";
        }

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['C1.SiteCode' => 'ASC', 'C1.OrderNum' => 'ASC', 'SC.OrderNum' => 'ASC', 'SJ.OrderNum' => 'ASC', 'MS.SubjectType' => 'ASC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $condition = [
            'EQ' => ['MS.IsStatus' => 'Y'],
            'IN' => ['S.SiteCode' => get_auth_site_codes()]
        ];
        $condition = array_merge_recursive($condition, $conditionAdd);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 문제영역 기본정보 등록 (lms_predict2_area, lms_predict2_r_category)
     * @param array $form_data
     * @return array|bool
     */
    public function addMockArea($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            // 과목 기본정보 저장 (lms_predict2_area)
            $input_data = [
                'SiteCode' => element('siteCode', $form_data),
                'QuestionArea' => element('questionArea', $form_data),
                'IsUse' => element('isUse', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];
            if ($this->_conn->set($input_data)->insert($this->_table['predict2_area']) === false) {
                throw new Exception('기본정보 저장에 실패했습니다.');
            }
            $nowPaIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_predict2_r_category)
            $moLink = array_filter(element('moLink', $form_data));
            foreach ($moLink as $it) {
                $input_data = [
                    'PrsIdx' => $it,
                    'PaIdx' => $nowPaIdx,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['predict2_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowPaIdx]];
    }

    /**
     * 문제영역 기본정보 수정 (lms_predict2_area, lms_predict2_r_category)
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
                $this->_conn->set($input_data)->where(['PaIdx' => element('idx', $form_data), 'PrsIdx' => $it]);
                if ($this->_conn->update($this->_table['predict2_r_category']) === false) {
                    throw new \Exception('카테고리 데이터 수정에 실패했습니다.');
                }
            }
            foreach ($moLink_add as $it) {
                $input_data = [
                    'PrsIdx' => $it,
                    'PaIdx' => element('idx', $form_data),
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['predict2_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }

            // lms_predict2_area 데이터 변경
            $input_data = [
                'QuestionArea' => element('questionArea', $form_data),
                'IsUse' => element('isUse', $form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];
            $this->_conn->set($input_data)->where(['PaIdx' => element('idx', $form_data)]);
            if ($this->_conn->update($this->_table['predict2_area']) === false) {
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
                            'PaIdx' => element('idx', $form_data),
                            'AreaName' => $this->security->xss_clean(element('areaName', $form_data)[$k]),
                            'OrderNum' => element('orderNum', $form_data)[$k],
                            'IsUse' => element('isUse', $form_data)[$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                            'RegDate' => date("Y-m-d H:i:s"),
                        ];
                    } else { // 수정 데이터
                        $dataMod[] = [
                            'PalIdx' => $v,
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
                        'PalIdx' => $v,
                        'IsUse' => 'N',
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    ];
                }
            }

            if($dataReg) $this->_conn->insert_batch($this->_table['predict2_area_list'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['predict2_area_list'], $dataMod, 'PalIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['predict2_area_list'], $dataDel, 'PalIdx');

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
     * 문제지 등록
     * @param $form_data
     * @return array|bool
     */
    public function addExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $names = $this->_makeUploadFileName(['QuestionFile','FrontQuestionFile','ExplanFile'], 1);

            // 데이터 저장
            $input_data = [
                'SiteCode' => element('siteCode', $form_data),
                'PaIdx' => element('area_code', $form_data),
                'ProfIdx' => element('ProfIdx', $form_data),
                'PapaerName' => element('PapaerName', $form_data),
                'Year' => element('Year', $form_data),
                'RotationNo' => element('RotationNo', $form_data),
                'QuestionOption' => element('QuestionOption', $form_data),
                'AnswerNum' => element('AnswerNum', $form_data),
                'TotalScore' => element('TotalScore', $form_data),
                'QuestionFile' => $names['QuestionFile']['name'],
                'RealQuestionFile' => $names['QuestionFile']['real'],
                'FrontQuestionFile' => $names['FrontQuestionFile']['name'],
                'FrontRealQuestionFile' => $names['FrontQuestionFile']['real'],
                'ExplanFile' => $names['ExplanFile']['name'],
                'RealExplanFile' => $names['ExplanFile']['real'],
                'IsUse' => element('IsUse', $form_data),
                'IsAvg' => element('IsAvg', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($input_data)->insert($this->_table['predict2_paper']) === false) {
                throw new Exception('기본정보 저장에 실패했습니다.');
            }
            $nowIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_predict2_paper_r_category)
            $moLink = array_filter(element('moLink', $form_data));
            foreach ($moLink as $it) {
                $input_data = [
                    'PpIdx' => $nowIdx,
                    'PrcIdx' => $it,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['predict2_paper_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }

            // 파일 업로드
            $uploadSubPath = $this->upload_path_predict2 . $nowIdx;
            $isSave = $this->_uploadFileSave($uploadSubPath, $names);
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            // 데이터 수정
            $input_data = [
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/"
            ];
            $this->_conn->set($input_data)->where(['PpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['predict2_paper']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowIdx]];
    }

    /**
     * 문제지 수정
     * @param $form_data
     * @return array|bool
     */
    public function modifyExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $filePath = $this->upload_path . $this->upload_path_predict2 . element('idx', $form_data) . '/';
            $names = $this->_makeUploadFileName(['QuestionFile','FrontQuestionFile','ExplanFile'], 1);
            $uploadSubPath = $this->upload_path_predict2 . $this->input->post('idx', $form_data);

            // 기존데이터 첨부파일 이름 추출
            $fileBackup = [];
            $beforeDB = $this->_conn->select('RealQuestionFile, FrontRealQuestionFile, RealExplanFile')
                ->where(['PpIdx' => element('idx', $form_data), 'IsStatus' => 'Y'])
                ->get($this->_table['predict2_paper'])->row_array();

            // 데이터 수정
            $input_data = [
                'PaIdx' => element('area_code', $form_data),
                'ProfIdx' => element('ProfIdx', $form_data),
                'PapaerName' => element('PapaerName', $form_data),
                'Year' => element('Year', $form_data),
                'RotationNo' => element('RotationNo', $form_data),
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/",
                'IsUse' => element('IsUse', $form_data),
                'IsAvg' => element('IsAvg', $form_data),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if(element('QuestionOption', $form_data)) $input_data['QuestionOption'] = element('QuestionOption', $form_data);
            if(element('AnswerNum', $form_data))      $input_data['AnswerNum'] = element('AnswerNum', $form_data);
            if(element('TotalScore', $form_data))     $input_data['TotalScore'] = element('TotalScore', $form_data);
            if( isset($names['QuestionFile']['error']) && $names['QuestionFile']['error'] === UPLOAD_ERR_OK && $names['QuestionFile']['size'] > 0 ) {
                $input_data['QuestionFile'] = $names['QuestionFile']['name'];
                $input_data['RealQuestionFile'] = $names['QuestionFile']['real'];
                if( !empty($beforeDB['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB['RealQuestionFile'];
            }
            if( isset($names['FrontQuestionFile']['error']) && $names['FrontQuestionFile']['error'] === UPLOAD_ERR_OK && $names['FrontQuestionFile']['size'] > 0 ) {
                $input_data['FrontQuestionFile'] = $names['FrontQuestionFile']['name'];
                $input_data['FrontRealQuestionFile'] = $names['FrontQuestionFile']['real'];
                if( !empty($beforeDB['FrontRealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB['FrontRealQuestionFile'];
            }
            if( isset($names['ExplanFile']['error']) && $names['ExplanFile']['error'] === UPLOAD_ERR_OK && $names['ExplanFile']['size'] > 0 ) {
                $input_data['ExplanFile'] = $names['ExplanFile']['name'];
                $input_data['RealExplanFile'] = $names['ExplanFile']['real'];
                if( !empty($beforeDB['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB['RealExplanFile'];
            }

            $this->_conn->set($input_data)->where(['PpIdx' => element('idx', $form_data)]);
            if ($this->_conn->update($this->_table['predict2_paper']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 파일 업로드 (업로드파일이 있으면)
            if($fileBackup) {
                $isSave = $this->_uploadFileSave($uploadSubPath, $names, $fileBackup);
                if ($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => element('idx', $form_data)]];
    }

    public function callData($form_data)
    {
        $arr_condition = [
            'EQ' => [
                'EB.siteCode' => element('siteCode', $form_data),
                'EB.PaIdx' => element('area_code', $form_data),
                'EB.ProfIdx' => element('ProfIdx', $form_data),
                'EB.Year' => element('qu_year', $form_data),
                'EB.RotationNo' => element('qu_round', $form_data),
                'EQ.QuestionNO' => element('qu_no', $form_data),
            ],
            'NOT' => [
                'EB.PpIdx' => element('nowIdx', $form_data)
            ],
        ];
        $column = "
            EQ.*, MA.AreaName, EB.QuestionOption AS EB_QuestionOption, EB.AnswerNum AS EB_AnswerNum, A.wAdminName
        ";
        $from = "
            FROM {$this->_table['predict2_paper']} AS EB
            JOIN {$this->_table['predict2_questions']} AS EQ ON EB.PpIdx = EQ.PpIdx AND EQ.IsStatus = 'Y'
            JOIN {$this->_table['predict2_area_list']} AS MA ON EQ.PalIdx = MA.PalIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON EQ.RegAdminIdx = A.wAdminIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $data = $this->_conn->query('select ' . $column . $from . $where)->row_array();

        /*if($data) {
            $data->upImgUrlQ = $this->config->item('upload_url_mock', 'mock') . $data->PpIdx . $this->config->item('upload_path_predict2Q', 'mock');
            $data->optSame = ($data->EB_AnswerNum == $this->input->post('AnswerNum')) ? 1 : 0;
        }*/

        if($data) {
            $data['upImgUrlQ'] = $this->config->item('upload_path_predict2', 'predict2') . $data['PpIdx'] . $this->config->item('upload_path_predict2Q', 'predict2');
            $data['optSame'] = ($data['EB_AnswerNum'] == element('AnswerNum', $form_data)) ? 1 : 0;
        }
        return ['ret_cd' => true, 'dt' => $data];
    }

    /**
     * 과목별문제 데이터 리스트
     * @param bool $is_count
     * @param array $add_condition
     * @param string $limit
     * @param string $offset
     * @return mixed
     */
    public function mainExamList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS cnt';
            $order_by_offset_limit = '';
        } else {
            /**
             * TODO : 컬럼 미비
             */
            /*$column = "
                MP.*, A.wAdminName, PMS.wProfName, IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor, SJ.SubjectName,
                (SELECT COUNT(MemIdx) 
                    FROM {$this->_table['mock_register']} AS MR
                    JOIN {$this->_table['mock_register_r_paper']} AS RR ON MR.MrIdx = RR.MrIdx
                WHERE IsStatus = 'Y' AND IsTake = 'Y' AND PpIdx = MP.PpIdx AND TakeForm = (SELECT Ccd FROM {$this->_table['lms_sys_code']} WHERE CcdName = 'online')) AS OnlineCnt,
                (SELECT COUNT(MemIdx) 
                    FROM {$this->_table['mock_register']} AS MR
                    JOIN {$this->_table['mock_register_r_paper']} AS RR ON MR.MrIdx = RR.MrIdx 
                WHERE IsStatus = 'Y' AND IsTake = 'Y' AND PpIdx = MP.PpIdx AND TakeForm = (SELECT Ccd FROM {$this->_table['lms_sys_code']} WHERE CcdName = 'off(학원)')) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['predict2_questions']} AS EQ WHERE MP.PpIdx = EQ.PpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
                (
                    SELECT GROUP_CONCAT(CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']')) AS CateRouteName
                    FROM {$this->_table['predict2_paper_r_category']} AS MPRC
                    INNER JOIN {$this->_table['mock_r_category']} AS MC ON MPRC.PrcIdx = MC.PrcIdx AND MC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['predict2_r_subject']} AS MS ON MC.PrsIdx = MS.PrsIdx AND MS.IsStatus = 'Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_base']} AS MB ON MS.PcIdx = MB.PcIdx AND MB.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                    WHERE MP.PpIdx = MPRC.PpIdx AND MPRC.IsStatus = 'Y'
                    GROUP BY MPRC.PpIdx
                ) AS CateRouteName
            ";*/
            $column = "
                MP.*, A.wAdminName, PMS.wProfName, IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor, SJ.SubjectName,
                '0' AS OnlineCnt,
                '0' AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['predict2_questions']} AS EQ WHERE MP.PpIdx = EQ.PpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
                (
                    SELECT GROUP_CONCAT(CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']')) AS CateRouteName
                    FROM {$this->_table['predict2_paper_r_category']} AS MPRC
                    INNER JOIN {$this->_table['predict2_r_category']} AS MC ON MPRC.PrcIdx = MC.PrcIdx AND MC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['predict2_r_subject']} AS MS ON MC.PrsIdx = MS.PrsIdx AND MS.IsStatus = 'Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    INNER JOIN {$this->_table['predict2_code']} AS MB ON MS.PcIdx = MB.PcIdx AND MB.IsStatus = 'Y'
                    INNER JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
                    INNER JOIN {$this->_table['sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                    INNER JOIN {$this->_table['sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                    WHERE MP.PpIdx = MPRC.PpIdx AND MPRC.IsStatus = 'Y'
                    GROUP BY MPRC.PpIdx
                ) AS CateRouteName
            ";
            $arr_order_by = ['MP.PpIdx' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $condition = [ 'IN' => ['MP.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['predict2_paper']} AS MP
            INNER JOIN {$this->_table['predict2_paper_r_category']} AS MPC ON MP.PpIdx = MPC.PpIdx AND MPC.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict2_r_category']} AS MC ON MC.PrcIdx = MPC.PrcIdx AND MC.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict2_r_subject']} AS MS ON MC.PrsIdx = MS.PrsIdx AND MS.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict2_code']} AS MB ON MS.PcIdx = MB.PcIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON MP.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";
        $group_by = ' GROUP BY MP.PpIdx';
        $query_string = 'SELECT '. (($is_count === true) ? 'COUNT(M.cnt) AS numrows ' : 'M.* ') . 'FROM (SELECT ' . $column . $from . $where . $group_by . $order_by_offset_limit . ') AS M';
        $query = $this->_conn->query($query_string);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 문제지 데이터 복사
     * @param $idx
     * @return array|bool
     */
    public function copyExamData($idx)
    {
        $this->_conn->trans_begin();
        try {
            if (!preg_match('/^[0-9]+$/', $idx)) {
                throw new Exception('잘못된 식별자 입니다.');
            }

            $result = $this->_copyDataStep1($idx);
            if ($result['ret_cd'] === false || empty($result['nowIdx']) === true) {
                throw new \Exception('데이터 복사에 실패했습니다.(1)');
            }

            if ($this->_copyDataStep2($result['nowIdx'], $idx) === false) {
                throw new Exception('데이터 복사에 실패했습니다.(2)');
            }

            if ($this->_copyDataStep3($result['nowIdx'], $idx) === false) {
                throw new Exception('데이터 복사에 실패했습니다.(3)');
            }

            if ($this->_copyDataStep4($result['nowIdx'], $idx) === false) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 문제지 데이터 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findExamData($arr_condition = [])
    {
        $column = "
            MP.*
            , MA.QuestionArea, MA.IsUse AS AreaIsUse
            ,(SELECT GROUP_CONCAT(MPRC.PrcIdx) FROM {$this->_table['predict2_paper_r_category']} AS MPRC WHERE MPRC.PpIdx = MP.PpIdx) AS PrcIdxs
            , ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName
        ";
        $from = "
            FROM {$this->_table['predict2_paper']} AS MP
            INNER JOIN {$this->_table['predict2_area']} AS MA ON MP.PaIdx = MA.PaIdx AND MA.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MP.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MP.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 문항리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listExamQuestions($arr_condition = [])
    {
        $column = '*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['predict2_questions']} AS MQ
            LEFT JOIN {$this->_table['predict2_area_list']} AS MAL ON MQ.PalIdx = MAL.PalIdx AND MAL.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MQ.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MQ.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 문제영역 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getAreaList($arr_condition)
    {
        $column = 'ML.*';
        $from = "
            FROM {$this->_table['predict2_area']} AS MA
            JOIN {$this->_table['predict2_area_list']} AS ML ON MA.PaIdx = ML.PaIdx AND ML.IsStatus = 'Y' AND ML.IsUse = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 문항정보 등록,수정
     * (주의) 저장파일에 Q1_~ 로 번호 붙으나 삭제를 하게 되면 index가 변경됨으로 번호가 안 맞을 수도 있음 (중복은 안됨)
     * @param $form_data
     * @return array|bool
     */
    public function storeQuestion($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $filePath = $this->upload_path . $this->upload_path_predict2 . element('idx', $form_data) . $this->upload_path_predict2Q;
            $names = $this->_makeUploadFileName(['QuestionFile','ExplanFile'], 1);

            // 기존데이터 첨부파일 이름 추출
            $beforeDB = $fileBackup = $fileCopy = [];
            if( element('chapterExist', $form_data) || element('chapterDel', $form_data) ) {
                $beforeIn = array_unique(array_merge(element('chapterExist', $form_data), element('chapterDel', $form_data)));
                $bDB = $this->_conn->select('PqIdx,RealQuestionFile,RealExplanFile')
                    ->where_in($beforeIn)
                    ->get($this->_table['predict2_questions'])->result_array();

                foreach ($bDB as $it) {
                    $beforeDB[$it['PqIdx']] = $it;
                }
                unset($bDB);
            }

            $dataReg = $dataMod = $dataDel = [];
            if(empty(element('chapterTotal', $form_data)) === false) {
                foreach (element('chapterTotal', $form_data) as $k => $v) {
                    if (empty(element('chapterExist', $form_data)) || !in_array($v, element('chapterExist', $form_data))) { // 신규등록
                        $dataReg[$k] = [
                            'PpIdx' => element('idx', $form_data),
                            'PalIdx' => element('PalIdx', $form_data)[$k],
                            'QuestionNO' => element('QuestionNO', $form_data)[$k],
                            'QuestionOption' => element('QuestionOption', $form_data)[$k],
                            'FilePath' => $this->upload->_upload_url . $this->upload_path_predict2 . element('idx', $form_data) . $this->upload_path_predict2Q,
                            'RightAnswer' => element('RightAnswer', $form_data)[$k],
                            'RightAnswerRate' => 0,
                            'Scoring' => element('Scoring', $form_data)[$k],
                            'Difficulty' => element('Difficulty', $form_data)[$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                        if(element('regKind', $form_data)[$k] == 'call') { // 호출한 경우
                            $index = $k + 1;
                            $callRealQuestionFile = 'Q'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', element('callRealQuestionFile', $form_data)[$k]);
                            $callRealExplanFile = 'E'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', element('callRealExplanFile', $form_data)[$k]);

                            $dataReg[$k]['QuestionFile'] = element('callQuestionFile', $form_data)[$k];
                            $dataReg[$k]['RealQuestionFile'] = $callRealQuestionFile;
                            $dataReg[$k]['ExplanFile'] = element('callExplanFile', $form_data)[$k];
                            $dataReg[$k]['RealExplanFile'] = $callRealExplanFile;

                            // 복사할 파일
                            $src = element('callIdx', $form_data)[$k] . $this->upload_path_predict2Q;
                            $dest = element('idx', $form_data) . $this->upload_path_predict2Q;

                            $fileCopy[] = ['src' => $src . element('callRealQuestionFile', $form_data)[$k], 'dest' => $dest . $callRealQuestionFile];
                            $fileCopy[] = ['src' => $src . element('callRealExplanFile', $form_data)[$k], 'dest' => $dest . $callRealExplanFile];
                        } else {
                            if ( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                                $dataReg[$k]['QuestionFile'] = $names['QuestionFile']['name'][$k];
                                $dataReg[$k]['RealQuestionFile'] = $names['QuestionFile']['real'][$k];
                            }
                            if ( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                                $dataReg[$k]['ExplanFile'] = $names['ExplanFile']['name'][$k];
                                $dataReg[$k]['RealExplanFile'] = $names['ExplanFile']['real'][$k];
                            }
                        }
                    } else { // 수정
                        $dataMod[$k] = [
                            'PqIdx' => $v,
                            'PalIdx' => element('PalIdx', $form_data)[$k],
                            'QuestionNO' => element('QuestionNO', $form_data)[$k],
                            'QuestionOption' => element('QuestionOption', $form_data)[$k],
                            'FilePath' => $this->upload->_upload_url . $this->upload_path_predict2 . element('idx', $form_data) . $this->upload_path_predict2Q,
                            'RightAnswer' => element('RightAnswer', $form_data)[$k],
                            'Scoring' => element('Scoring', $form_data)[$k],
                            'Difficulty' => element('Difficulty', $form_data)[$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                        if( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                            $dataMod[$k]['QuestionFile'] = $names['QuestionFile']['name'][$k];
                            $dataMod[$k]['RealQuestionFile'] = $names['QuestionFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                        }
                        if( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                            $dataMod[$k]['ExplanFile'] = $names['ExplanFile']['name'][$k];
                            $dataMod[$k]['RealExplanFile'] = $names['ExplanFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                        }
                    }
                }
            }

            // 삭제 (IsStatus Update)
            if(empty(element('chapterDel', $form_data)) === false) {
                foreach (element('chapterDel', $form_data) as $k => $v) {
                    $dataDel[] = [
                        'PqIdx' => $v,
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    ];

                    if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                    if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                }
            }

            if($dataReg) $this->_conn->insert_batch($this->_table['predict2_questions'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['predict2_questions'], $dataMod, 'PqIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['predict2_questions'], $dataDel, 'PqIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            // 파일 복사 (호출한 경우)
            if($fileCopy) {
                if ($this->_uploadFileCopy($fileCopy) !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            // 파일 업로드 & 백업이동
            $uploadSubPath = $this->upload_path_predict2 . element('idx', $form_data) . $this->upload_path_predict2Q;
            $isSave = $this->_uploadFileSave($uploadSubPath, $names, $fileBackup, 'img');
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
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
     * 서비스상품 리스트
     * @param bool $is_count
     * @param array $add_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function goodsMainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['PP.PredictIdx2' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                PP.*, A.wAdminName, SC.CateName,
                '' AS OnlineCnt,
                '' AS OfflineCnt,
                '' AS OnlineRegCnt,
                '' AS OfflineRegCnt,
                '' AS GradeCNT
            ";

            /**
             * TODO : 쿼리 미비
             */
            /*$column .= "
                (
                    SELECT COUNT(mr1.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr1
                        join {$this->_table['order_product']} op1 on mr1.OrderProdIdx = op1.OrderProdIdx
                        join {$this->_table['order']} o1 on op1.OrderIdx = o1.OrderIdx
                        join {$this->_table['sys_code']} sc1 on mr1.TakeForm = sc1.Ccd
                        WHERE mr1.IsStatus = 'Y' AND mr1.IsTake = 'Y' AND mr1.ProdCode = MP.ProdCode AND mr1.TakeForm = '{$this->mockCommonModel->_ccd['applyType_on']}' and op1.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OnlineCnt,
                (
                    SELECT COUNT(mr2.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr2
                        join {$this->_table['order_product']} op2 on mr2.OrderProdIdx = op2.OrderProdIdx
                        join {$this->_table['order']} o2 on op2.OrderIdx = o2.OrderIdx 
                        join {$this->_table['sys_code']} sc2 on mr2.TakeForm = sc2.Ccd
                    WHERE mr2.IsStatus = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' and op2.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OfflineCnt,
                (
                    SELECT COUNT(mr3.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr3
                        join {$this->_table['order_product']} op3 on mr3.OrderProdIdx = op3.OrderProdIdx
                        join {$this->_table['order']} o3 on op3.OrderIdx = o3.OrderIdx
                        join {$this->_table['sys_code']} sc3 on mr3.TakeForm = sc3.Ccd
                    WHERE mr3.IsStatus = 'Y' AND mr3.ProdCode = MP.ProdCode AND mr3.TakeForm = '{$this->mockCommonModel->_ccd['applyType_on']}' and op3.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OnlineRegCnt,
                (
                    SELECT COUNT(mr4.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr4
                        join {$this->_table['order_product']} op4 on mr4.OrderProdIdx = op4.OrderProdIdx
                        join {$this->_table['order']} o4 on op4.OrderIdx = o4.OrderIdx 
                        join {$this->_table['sys_code']} sc4 on mr4.TakeForm = sc4.Ccd
                    WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' and op4.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OfflineRegCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_answerpaper']} WHERE ProdCode = PD.ProdCode) AS GradeCNT
            ";*/
        }

        $condition = [ 'IN' => ['PP.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['product_predict2']} AS PP
            INNER JOIN {$this->_table['sys_category']} AS SC ON PP.TakePart = SC.CateCode
            LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 등록된 서비스상품리스트
     * @return mixed
     */
    public function getGoodsList()
    {
        $add_condition = [
            'EQ' => [
                'PP.IsStatus' => 'Y'
            ]
        ];
        $condition = [ 'IN' => ['PP.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $column = "
            PP.PredictIdx2, PP.SiteCode, PP.Predict2Name, PP.TakePart, PP.MockPart
            , PP.Research1StartDatm, PP.Research1EndDatm, PP.Research2StartDatm, PP.Research2EndDatm, PP.GradeOpenIsUse, PP.GradeOpenDatm, PP.SubjectSViewCount
        ";
        $from = "
            FROM {$this->_table['product_predict2']} AS PP
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 서비스 상품 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addGoods($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $column = "IFNULL(MAX(PredictIdx2), 100000) + 1 AS PredictIdx2";
            $from = " FROM {$this->_table['product_predict2']} ";
            $last_data = $this->_conn->query('select ' . $column . $from)->row_array();
            $predictIdx2 = $last_data['PredictIdx2'];

            $data = [
                'PredictIdx2' => $predictIdx2,
                'SiteCode' => element('siteCode', $form_data),
                'Predict2Name' => element('predict2_name', $form_data),
                'TakePart' => element('TakePart', $form_data),
                'MockPart' => implode(',', element('mock_part', $form_data)),
                'Research1StartDatm' => element('Research1StartDatm_d', $form_data) .' '. element('Research1StartDatm_h', $form_data) .':'. element('Research1StartDatm_m', $form_data) .':00',
                'Research1EndDatm' => element('Research1EndDatm_d', $form_data) .' '. element('Research1EndDatm_h', $form_data) .':'. element('Research1EndDatm_m', $form_data) .':59',
                'IsResearch1' => element('is_research1', $form_data),
                'Research2StartDatm' => element('Research2StartDatm_d', $form_data) .' '. element('Research2StartDatm_h', $form_data) .':'. element('Research2StartDatm_m', $form_data) .':00',
                'Research2EndDatm' => element('Research2EndDatm_d', $form_data) .' '. element('Research2EndDatm_h', $form_data) .':'. element('Research2EndDatm_m', $form_data) .':59',
                'GradeOpenIsUse' => element('grade_open_is_use', $form_data),
                'GradeOpenDatm' => (empty(element('GradeOpenDatm_d', $form_data)) === false) ? element('GradeOpenDatm_d', $form_data) .' '. element('GradeOpenDatm_h', $form_data) .':'. element('GradeOpenDatm_m', $form_data) .':00' : null,
                'IsResearch2' => element('is_research2', $form_data),
                'SubjectSViewCount' => element('subject_s_view_count', $form_data, '2'),
                'IsUse' => element('is_use', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->insert($this->_table['product_predict2'], $data) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            }

            if ($this->_storeProductPredict2RPaper($form_data, $predictIdx2) === false) {
                throw new \Exception('상품 과목 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 모의고사 상품 수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyGoods($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $predict_idx2 = element('predict_idx2', $form_data);

            $data = [
                'Predict2Name' => element('predict2_name', $form_data),
                'MockPart' => implode(',', element('mock_part', $form_data)),
                'Research1StartDatm' => element('Research1StartDatm_d', $form_data) .' '. element('Research1StartDatm_h', $form_data) .':'. element('Research1StartDatm_m', $form_data) .':00',
                'Research1EndDatm' => element('Research1EndDatm_d', $form_data) .' '. element('Research1EndDatm_h', $form_data) .':'. element('Research1EndDatm_m', $form_data) .':59',
                'IsResearch1' => element('is_research1', $form_data),
                'Research2StartDatm' => element('Research2StartDatm_d', $form_data) .' '. element('Research2StartDatm_h', $form_data) .':'. element('Research2StartDatm_m', $form_data) .':00',
                'Research2EndDatm' => element('Research2EndDatm_d', $form_data) .' '. element('Research2EndDatm_h', $form_data) .':'. element('Research2EndDatm_m', $form_data) .':59',
                'IsResearch2' => element('is_research2', $form_data),
                'GradeOpenIsUse' => element('grade_open_is_use', $form_data),
                'GradeOpenDatm' => (empty(element('GradeOpenDatm_d', $form_data)) === false) ? element('GradeOpenDatm_d', $form_data) .' '. element('GradeOpenDatm_h', $form_data) .':'. element('GradeOpenDatm_m', $form_data) .':00' : null,
                'SubjectSViewCount' => element('subject_s_view_count', $form_data, '2'),
                'IsUse' => element('is_use', $form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            $this->_conn->set($data)->where('PredictIdx2', $predict_idx2);
            if($this->_conn->update($this->_table['product_predict2'])=== false) {
                throw new \Exception('fail');
            }

            if ($this->_storeProductPredict2RPaper($form_data, $predict_idx2) === false) {
                throw new \Exception('서비스 상품 과목 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 서비스 상품 데이터 조회
     * @param $arr_condition
     * @return bool
     */
    public function findGoods($arr_condition)
    {
        $column = '
            MP.*, SC.CateName, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName
        ';
        $from = "
            FROM {$this->_table['product_predict2']} AS MP
            JOIN {$this->_table['sys_category']} AS SC ON MP.TakePart = SC.CateCode AND SC.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MP.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MP.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => ['MP.IsStatus' => 'Y']
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $data = $this->_conn->query('select '.$column .$from .$where)->row_array();

        if (empty($data) === true) {
            return false;
        }
        $data['arr_mock_part'] = explode(',', $data['MockPart']);
        return $data;
    }

    /**
     * 서비스 상품의 과목 목록 조회
     * @param $arr_condition
     * @return mixed
     */
    public function listGoodsForSubject($arr_condition)
    {
        $column = 'MPE.*, EB.Year, EB.RotationNo, EB.PapaerName, SJ.SubjectName, PMS.wProfName';

        $from = "
            FROM {$this->_table['product_predict2']} AS MP
            JOIN {$this->_table['product_predict2_r_paper']} AS MPE ON MP.PredictIdx2 = MPE.PredictIdx2 AND MPE.IsStatus = 'Y'
            JOIN {$this->_table['predict2_paper']} AS EB ON MPE.PpIdx = EB.PpIdx AND EB.IsStatus = 'Y'
            JOIN {$this->_table['predict2_paper_r_category']} AS MPRC ON EB.PpIdx = MPRC.PpIdx AND MPRC.IsStatus = 'Y'
            JOIN {$this->_table['predict2_r_category']} AS MC ON MPRC.PrcIdx = MC.PrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['predict2_r_subject']} AS MS ON MC.PrsIdx = MS.PrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' group by EB.PpIdx';
        $order_by = ' order by MPE.OrderNum';
        return $this->_conn->query('select '.$column .$from .$where . $group_by . $order_by)->result_array();
    }

    /**
     * 과목별문제 데이터 리스트
     * @param bool $is_count
     * @param array $add_condition
     * @param string $limit
     * @param string $offset
     * @return mixed
     */
    public function mainOriginList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'M.*';
            $arr_order_by = ['R.PrIdx' => 'DESC'];
            if ($is_count == 'excel') {
                /*$column = "MockYear, MockRotationNo, CONCAT('[',ProdCode,']', ProdName) ,TakeForm_Name, ClosingPerson, TakeArea_Name,";*/
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            } else {
                /*$column = "mm.*,";*/
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }
        }

        $condition = [ 'IN' => ['PR.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM (
                SELECT
                    R.PrIdx, R.TaKeNumber, R.MemName, R.MemIdx, R.MemId, R.Phone, R.Mail
                    ,R.TakeMockPart, R.TakeCount, R.CutPoint, R.RegDatm
                    ,(GROUP_CONCAT(CONCAT('-',R.PapaerName,':',R.OrgPoint))) AS OPOINT
                    ,(CONCAT(R.TakeLevelPpIdx1Name,':',R.TakeLevel1,',',R.TakeLevelPpIdx2Name,':',R.TakeLevel2,',',R.TakeLevelPpIdx3Name,':',R.TakeLevel3,',',R.TakeLevelPpIdx4Name,':',R.TakeLevel4)) AS TakeLevel
                FROM (
                    SELECT
                        R.PrIdx, R.TaKeNumber, R.MemName, R.MemIdx, R.MemId, R.Phone, R.Mail, R.PapaerName, R.OrgPoint
                        ,R.TakeMockPart, R.TakeCount, R.CutPoint, R.RegDatm
                        ,TakeLevelPpIdx1,TakeLevelPpIdx2,TakeLevelPpIdx3,TakeLevelPpIdx4
                        ,PP1.PapaerName AS TakeLevelPpIdx1Name
                        ,PP2.PapaerName AS TakeLevelPpIdx2Name
                        ,PP3.PapaerName AS TakeLevelPpIdx3Name
                        ,PP4.PapaerName AS TakeLevelPpIdx4Name
                        ,IF(TakeLevel1 = 'H', '상', IF(TakeLevel1 = 'M', '중', '하')) AS TakeLevel1
                        ,IF(TakeLevel2 = 'H', '상', IF(TakeLevel1 = 'M', '중', '하')) AS TakeLevel2
                        ,IF(TakeLevel3 = 'H', '상', IF(TakeLevel1 = 'M', '중', '하')) AS TakeLevel3
                        ,IF(TakeLevel4 = 'H', '상', IF(TakeLevel1 = 'M', '중', '하')) AS TakeLevel4
                    FROM (
                        SELECT 
                            PR.PrIdx, PP.PpIdx, M.MemName, PR.MemIdx,MemId,fn_dec(PR.UserTelEnc) AS Phone,fn_dec(PR.UserMailEnc) AS Mail,
                            fn_ccd_name(PR.TakeMockPart) AS TakeMockPart, TaKeNumber, CutPoint,
                            IF(TakeCount = 1, '1회', IF(TakeCount = 2, '2회', IF(TakeCount = 3, '3회', '4회이상'))) AS TakeCount,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',1),'|',1) AS TakeLevelPpIdx1,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',-3),'|',1) AS TakeLevelPpIdx2,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',-2),'|',1) AS TakeLevelPpIdx3,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',-1),'|',1) AS TakeLevelPpIdx4,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',1),'|',-1) AS TakeLevel1,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',2),'|',-1) AS TakeLevel2,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',3),'|',-1) AS TakeLevel3,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(PR.TakeLevel,',',4),'|',-1) AS TakeLevel4,
                            PP.PapaerName, PG.OrgPoint, RegDatm
                        FROM {$this->_table['predict2_register']} AS PR
                        JOIN {$this->_table['lms_member']} AS M ON PR.MemIdx = M.MemIdx
                        INNER JOIN {$this->_table['predict2_grades_origin']} AS PG ON PR.PrIdx = PG.PrIdx
                        INNER JOIN {$this->_table['predict2_paper']} AS PP ON PP.PpIdx = PG.PpIdx
                        {$where}
                        ORDER BY PR.PrIdx DESC, PP.PpIdx ASC
                    ) AS R
                    INNER JOIN {$this->_table['predict2_paper']} AS PP1 ON PP1.PpIdx = R.TakeLevelPpIdx1
                    INNER JOIN {$this->_table['predict2_paper']} AS PP2 ON PP2.PpIdx = R.TakeLevelPpIdx2
                    INNER JOIN {$this->_table['predict2_paper']} AS PP3 ON PP3.PpIdx = R.TakeLevelPpIdx3
                    INNER JOIN {$this->_table['predict2_paper']} AS PP4 ON PP4.PpIdx = R.TakeLevelPpIdx4
                    ORDER BY R.PrIdx DESC, R.PpIdx ASC
                ) AS R
                GROUP BY R.PrIdx
                $order_by_offset_limit
            ) AS M
        ";
        /*$query_string = 'SELECT '. (($is_count === true) ? 'COUNT(M.cnt) AS numrows ' : 'M.* ') . 'FROM (SELECT ' . $column . $from . $where . $group_by . $order_by_offset_limit . ') AS M';*/
        $query_string = 'SELECT '. $column . $from;
        $query = $this->_conn->query($query_string);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 등록된 답안정보 엑셀변환
     * @param array $arr_condition
     * @param array $arr_condition_sub
     * @return mixed
     */
    /*public function answerPaperForExcel($arr_condition = [])
    {
        $condition = [ 'IN' => ['PR.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $arr_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $column = "
            PR.MemIdx, M.MemName, M.MemId, M.BirthDay, fn_dec(PR.UserTelEnc) AS Phone,fn_dec(PR.UserMailEnc) AS Mail
            ,fn_ccd_name(PR.TakeMockPart) AS TakeMockPart, TaKeNumber, PA.RegDatm
            ,PP.PapaerName, PQ.QuestionNo, PA.Answer
        ";
        $from = "
            FROM {$this->_table['predict2_answerpaper']} AS PA
            INNER JOIN {$this->_table['predict2_register']} AS PR ON PA.PrIdx = PR.PrIdx
            INNER JOIN {$this->_table['predict2_paper']} AS PP ON PA.PpIdx = PP.PpIdx
            INNER JOIN {$this->_table['lms_member']} AS M ON PA.MemIdx = M.MemIdx
            LEFT JOIN lms_predict2_questions AS PQ ON PA.PqIdx = PQ.PqIdx
            {$where}
            ORDER BY PA.PapIdx ASC, PP.PpIdx ASC, PQ.QuestionNo
        ";

        return $this->_conn->query('select '.$column .$from)->result_array();
    }*/
    public function answerPaperForExcel($arr_condition = [], $arr_condition_sub = [])
    {
        $condition = [ 'IN' => ['PR.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $arr_condition);
        $where_sub = $this->_conn->makeWhere($arr_condition_sub)->getMakeWhere(false);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $column = "
            M.MemId, M.MemName, M.BirthDay, fn_dec(PR.UserTelEnc) AS Phone,fn_dec(PR.UserMailEnc) AS Mail
	        ,fn_ccd_name(PR.TakeMockPart) AS TakeMockPart, TaKeNumber, PA.RegDatm, PA.PpIdx, PA.PqIdxs, PA.Answers
        ";
        $from = "
            FROM (
                SELECT
                    M.MemIdx, M.PredictIdx2, M.PrIdx, M.PpIdx, M.RegDatm
                    ,GROUP_CONCAT(M.PqIdx ORDER BY M.PqIdx ASC) AS PqIdxs
                    ,GROUP_CONCAT(M.Answer ORDER BY M.PqIdx ASC) AS Answers
                FROM (
                    SELECT
                    MemIdx, PredictIdx2, PrIdx, PpIdx, RegDatm, PqIdx, Answer
                    FROM {$this->_table['predict2_answerpaper']}
                    {$where_sub}
                    ORDER BY PrIdx, PpIdx, PqIdx ASC
                ) AS M
                GROUP BY M.PrIdx, M.PpIdx
                ORDER BY M.PrIdx ASC
            ) AS PA
            INNER JOIN {$this->_table['predict2_register']} AS PR ON PA.PrIdx = PR.PrIdx
            INNER JOIN {$this->_table['lms_member']} AS M ON PA.MemIdx = M.MemIdx
        ";
        return $this->_conn->query('select '.$column .$from. $where)->result_array();
    }

    /**
     * 상품 과목 저장/수정
     * @param $form_data
     * @param $predictIdx2
     * @return bool
     */
    private function _storeProductPredict2RPaper($form_data, $predictIdx2)
    {
        try {
            $dataReg = $dataMod = $dataDel = [];

            if(empty(element('chapterTotal', $form_data)) === false) {
                foreach (element('chapterTotal', $form_data) as $k => $v) {
                    if (empty(element('chapterExist', $form_data)) === true || in_array($v, element('chapterExist', $form_data)) === false) { // 신규등록 데이터
                        $dataReg[] = array(
                            'PredictIdx2'    => $predictIdx2,
                            'PpIdx'       => element('PpIdx', $form_data)[$k],
                            'MockType'    => element('MockType', $form_data)[$k],
                            'OrderNum'    => element('OrderNum', $form_data)[$k],
                            'RegIp'       => $this->input->ip_address(),
                            'RegDatm'     => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    } else { // 수정 데이터
                        $dataMod[] = array(
                            'PprpIdx' => $v,
                            'PpIdx'       => element('PpIdx', $form_data)[$k],
                            'MockType'    => element('MockType', $form_data)[$k],
                            'OrderNum'    => element('OrderNum', $form_data)[$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    }
                }
            }

            // 삭제 데이터 (IsStatus Update)
            if( !empty(element('chapterDel', $form_data)) ) {
                foreach (element('chapterDel', $form_data) as $k => $v) {
                    $dataDel[] = array(
                        'PprpIdx' => $v,
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }

            if($dataReg) {
                if ($this->_conn->insert_batch($this->_table['product_predict2_r_paper'], $dataReg) === false) {
                    throw new \Exception('fail');
                }
            }
            if($dataMod) {
                if ($this->_conn->update_batch($this->_table['product_predict2_r_paper'], $dataMod, 'PprpIdx') === false) {
                    throw new \Exception('fail');
                }
            }
            if($dataDel) {
                if ($this->_conn->update_batch($this->_table['product_predict2_r_paper'], $dataDel, 'PprpIdx') === false) {
                    throw new \Exception('fail');
                }
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일저장 및 수정
     * @param $uploadSubPath
     * @param $names
     * @param array $fileBackup
     * @param string $type
     * @return bool|string
     */
    private function _uploadFileSave($uploadSubPath, $names, $fileBackup = [], $type = 'file')
    {
        try {
            /*$this->load->library('upload');*/
            if (empty($uploadSubPath) === true) {
                throw new Exception('파라메타 오류');
            }

            $realFileNames = [];
            foreach ($names as $name) {
                if( is_array($name['real']) )
                    $realFileNames = array_merge($realFileNames, $name['real']);
                else
                    $realFileNames[] = $name['real'];
            }

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile($type, array_keys($names), $realFileNames, $uploadSubPath);
            if (is_array($uploaded) === false) {
                throw new Exception($uploaded);
            }

            // 수정, 삭제시 이미지 백업
            if(empty($fileBackup) === false) {
                $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($fileBackup), false, $this->upload_path_predict2Backup);
                if ($is_bak_uploaded_file !== true) {
                    throw new Exception($is_bak_uploaded_file);
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 업로드시 저장될 파일명 생성
     * @param $in
     * @param int $prefixLen
     * @return mixed
     */
    private function _makeUploadFileName($in, $prefixLen=0)
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
                } else {
                    $tmp = explode('.', $it['name']);
                    $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                    $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . '_' : '';
                    $it['real'] = $prefix . md5(uniqid(mt_rand())) . $ext;
                }
            }
        }
        return $names;
    }

    /**
     * 파일복사
     * @param $fileCopy
     * @return bool|string
     */
    private function _uploadFileCopy($fileCopy) {
        $mainPath = $this->upload_path . $this->upload_path_predict2;
        $destPath = $mainPath . dirname($fileCopy[0]['dest']) . '/';

        try {
            if ( !is_dir($destPath) ) {
                if ( !mkdir($destPath, 0707, true) ) {
                    throw new Exception('디렉토리 생성에 실패했습니다.');
                }
            }

            foreach ($fileCopy as $it) {
                if ( !file_exists($mainPath . $it['src']) || !copy($mainPath . $it['src'], $mainPath . $it['dest']) ) {
                    throw new Exception('파일 복사에 실패했습니다.');
                }
            }
        }
        catch (Exception $e) {
            foreach ($fileCopy as $it) { // 롤백
                if ( file_exists($mainPath . $it['dest']) ) {
                    unlink($mainPath . $it['dest']);
                }
            }
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 문제지 복사
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep1($idx)
    {
        try {
            $this->load->library('upload');
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['predict2_paper']}
                    (SiteCode, PaIdx, ProfIdx, PapaerName, Year, RotationNo, QuestionOption, AnswerNum, TotalScore, 
                     QuestionFile, RealQuestionFile, FrontQuestionFile, FrontRealQuestionFile, ExplanFile, RealExplanFile, IsUse, IsAvg, RegIp, RegAdminIdx, RegDate)
                SELECT SiteCode, PaIdx, ProfIdx, CONCAT('복사-', PapaerName), Year, RotationNo, QuestionOption, AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, FrontQuestionFile, FrontRealQuestionFile, ExplanFile, RealExplanFile, 'N', IsAvg, ?, ?, ?
                FROM {$this->_table['predict2_paper']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, [$RegIp, $RegAdminIdx, $RegDatm, $idx]);
            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(1)');
            }
            $nowIdx = $this->_conn->insert_id();
            $uploadSubPath = $this->upload_path_predict2 . $nowIdx;

            //복사 데이터 수정
            $addData = [
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/"
            ];
            $this->_conn->set($addData)->where(['PpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['predict2_paper']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
        } catch (Exception $e) {
            return error_result($e);
        }
        return ['ret_cd' => true, 'nowIdx' => $nowIdx];
    }

    /**
     * 문제지 매핑 카테고리 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep2($nowIdx, $idx)
    {
        try {
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['predict2_paper_r_category']}
                    (PpIdx, PrcIdx, IsStatus, RegIp, RegDatm, RegAdminIdx)
                SELECT ?, PrcIdx, IsStatus, ?, ?, ?
                FROM {$this->_table['predict2_paper_r_category']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(2)');
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 문제항목 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep3($nowIdx, $idx)
    {
        try {
            $this->load->library('upload');
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['predict2_questions']}
                    (PpIdx, PalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                     RightAnswer, Scoring, Difficulty, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, PalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                       RightAnswer, Scoring, Difficulty, ?, ?, ?
                FROM {$this->_table['predict2_questions']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(3)');
            }

            // 데이터 수정
            $addData = ['FilePath' => $this->upload->_upload_url . $this->upload_path_predict2 . $nowIdx . $this->upload_path_predict2Q];
            $this->_conn->set($addData)->where(['PpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['predict2_questions']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 파일 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep4($nowIdx, $idx)
    {
        try {
            $src = $this->upload_path . $this->upload_path_predict2 . $idx . "/";
            $dest = $this->upload_path . $this->upload_path_predict2 . $nowIdx . "/";

            if(is_dir($src) === true) {
                exec("cp -rf $src $dest");
                if(is_dir($dest) === false) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }
}