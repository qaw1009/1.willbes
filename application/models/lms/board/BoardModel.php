<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends WB_Model
{
    private $_table_master = 'lms_sys_board_master';
    protected $_table = 'lms_board';
    private $_table_r_category = 'lms_board_r_category';
    protected $_table_attach = 'lms_board_attach';
    private $_table_memo = 'lms_board_memo';
    private $_table_r_comment = 'lms_board_r_comment';
    private $_table_assignment_r_schedule = 'lms_board_assignment_r_schedule';
    private $_table_assignment_r_schedule_date = 'lms_board_assignment_r_schedule_date';
    private $_table_sys_site = 'lms_site';
    protected $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_code = 'lms_sys_code';
    private $_table_sys_category = 'lms_sys_category';
    protected $_table_member = 'lms_member';
    private $_table_product = 'lms_product';                    //상품관리테이블
    private $_table_product_subject = 'lms_product_subject';    //상품과목관리테이블
    private $_table_product_course = 'lms_product_course';      //상품과정관리테이블
    protected $_table_professor = 'lms_professor';                //교수관리테이블

    // 첨부 이미지 수
    public $_attach_img_cnt = 7;
    public $_attach_img_cnt_gallery = 50;

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->config('upload');
        $this->upload_path = $this->config->item('upload_path');
    }

    /**
     * 게시판리스트
     * @param $board_type
     * @param $is_count
     * @param array $arr_condition
     * @param array $sub_query_condition
     * @param string $site_code
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return mixed
     */
    public function listAllBoard($board_type, $is_count, $arr_condition = [], $sub_query_condition = [], $site_code = '', $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if ($is_count === true) {
            $master_column = '';
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $master_column = ' (SELECT COUNT(*) FROM lms_board_r_comment AS CT WHERE LB.BoardIdx = CT.BoardIdx AND CT.IsStatus = \'Y\') AS CommentCnt, ';
            $column .= '
                ,IFNULL(FN_BOARD_CATECODE_DATA_LMS(LB.BoardIdx),\'N\') AS CateCode
                ,IFNULL(fn_board_attach_data(LB.BoardIdx),NULL) AS AttachFileName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        /*$sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);
        $table_join_type = (empty($sub_query_condition['EQ']['subLBrC.CateCode']) === false) ? 'INNER' : 'LEFT';*/

        $from = "
            FROM {$this->_table} AS LB
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON LB.RegMemIdx = MEM.MemIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON LB.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        if (empty($sub_query_condition) === false) {
            $from .= "
                LEFT OUTER JOIN {$this->_table_r_category} AS subLBrC ON LB.BoardIdx = subLBrC.BoardIdx
            ";
            $arr_condition = array_merge_recursive($arr_condition, $sub_query_condition);
        }

        switch ($board_type) {
            case "notice" :
            case "offlineBoard" :
            case "gallery" :
            case "free" :
            case "mocktest/notice" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                ";
                break;
            case "counsel" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.TypeCcd = LSC2.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC3 ON LB.ReplyStatusCcd = LSC3.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN2 ON LB.ReplyAdminIdx = ADMIN2.wAdminIdx
                    LEFT OUTER JOIN {$this->_table_sys_category} as MdSysCate ON LB.MdCateCode = MdSysCate.CateCode AND LB.SiteCode = MdSysCate.SiteCode
                ";
                break;
            case "faq" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ1 ON LB.FaqGroupTypeCcd = LSC_FAQ1.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ2 ON LB.FaqTypeCcd = LSC_FAQ2.Ccd
                ";
                break;
            case "announcement" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC1 ON LB.TypeCcd = LSC1.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.AreaCcd = LSC2.Ccd
                ";
                break;
            case "question" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC1 ON LB.AreaCcd = LSC1.Ccd
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                ";
                break;
            case "professorNotice" :
            case "tcc" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                ";
                break;
            case "qna" :
            case "mocktest/qna" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.TypeCcd = LSC2.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC3 ON LB.ReplyStatusCcd = LSC3.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN2 ON LB.ReplyAdminIdx = ADMIN2.wAdminIdx
                    LEFT OUTER JOIN {$this->_table_sys_category} as MdSysCate ON LB.MdCateCode = MdSysCate.CateCode AND LB.SiteCode = MdSysCate.SiteCode
                    LEFT OUTER JOIN {$this->_table_professor} as PROFESSOR ON LB.ProfIdx = PROFESSOR.ProfIdx
                    LEFT OUTER JOIN (
                        select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                        from {$this->_table_attach}
                        where IsStatus = 'Y' and RegType = 0
                        GROUP BY BoardIdx
                    ) as LBA_1 ON LB.BoardIdx = LBA_1.BoardIdx
                ";
                break;
            case "material" :
            case "tpass" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC4 ON LB.ProdApplyTypeCcd = LSC4.Ccd
                    LEFT JOIN {$this->_table_product} as lms_product ON LB.ProdCode = lms_product.ProdCode
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.TypeCcd = LSC.Ccd
                ";
                break;
            case "liveLectureMaterial" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_product_course} as PRODUCT_COURSE ON LB.CourseIdx = PRODUCT_COURSE.CourseIdx
                    LEFT OUTER JOIN {$this->_table_professor} as PROFESSOR ON LB.ProfIdx = PROFESSOR.ProfIdx
                ";
                break;
            case "studyComment" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC4 ON LB.ProdApplyTypeCcd = LSC4.Ccd
                    LEFT JOIN {$this->_table_product} as lms_product ON LB.ProdCode = lms_product.ProdCode
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_professor} as PROFESSOR ON LB.ProfIdx = PROFESSOR.ProfIdx
                ";
                break;
        }

        if (empty($site_code) === false) {
            $arr_condition['EQ']['LB.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['LB.SiteCode'] = get_auth_site_codes(false, true);
        }

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // Q&A일경우 조건 설정
        $where_qna = '';
        if ($board_type == 'qna' || $board_type == 'mocktest/qna') {
            $where_qna = $this->_conn->group_start();
            $this->_conn->group_start();
            $where_qna->where('LB.RegType','1')->where('LB.IsStatus', 'Y');
            $where_qna->group_end();
            $where_qna->or_where('LB.RegType', '0');
            $where_qna->group_end();
            $where_qna = $where_qna->getMakeWhere(true);
        }

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('LB.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('LB.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('LB.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('LB.CampusCcd', "''", false);
        $where_campus->or_where('LB.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_qna . $where_campus;
        $query = $this->_conn->query('select STRAIGHT_JOIN '. $master_column . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 게시판 정보만 가져오기 : TABLE JOIN 필요 없을 경우
     * @param array $arr_condition
     * @param $is_count
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOnlyBoard($arr_condition = [], $is_count, $column = '*', $limit = null, $offset = null, $order_by = ['boardIdx' => 'DESC'])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as $this->_table
            LEFT OUTER JOIN {$this->_table_sys_admin} as {$this->_table_sys_admin} ON {$this->_table}.UpdAdminIdx = {$this->_table_sys_admin}.wAdminIdx and {$this->_table_sys_admin}.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 게시판 글 등록
     * @param $inputData
     * @return array|bool
     */
    public function addBoard($inputData = [])
    {
        $set_board_category_data = [];
        $set_board_attach_data = [];

        $board_data = $inputData['board'];
        $board_category_data = $inputData['board_r_category']['site_category'];

        $this->_conn->trans_begin();
        try {
            $board_data = array_merge($board_data,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($board_data)->insert($this->_table) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            if ($board_data['SiteCode'] != config_item('app_intg_site_code')) {
                foreach ($board_category_data as $key => $val) {
                    $set_board_category_data['BoardIdx'] = $board_idx;
                    $set_board_category_data['CateCode'] = $val;
                    $set_board_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBoardCategory($set_board_category_data) === false) {
                        throw new \Exception('게시판 등록에 실패했습니다.');
                    }
                }
            }

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $board_data['BmIdx'] . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx, $board_data['BmIdx']), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BoardIdx'] = $board_idx;
                    $set_board_attach_data['RegType'] = 1;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->_addBoardAttach($set_board_attach_data) === false) {
                        throw new \Exception('게시판 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 게시판 수정
     * @param $inputData
     * @return array|bool
     */
    public function modifyBoard($inputData = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $board_idx = $idx;
            $board_data = $inputData['board'];
            $board_category_data = $inputData['board_r_category']['site_category'];

            $result = $this->_findBoardData($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            // board update
            $board_data = array_merge($board_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($board_data)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 카테고리
            if ($board_data['SiteCode'] != config_item('app_intg_site_code')) {
                $is_category = $this->_modifyBoardCategory($board_idx, $board_category_data);
                if ($is_category !== true) {
                    throw new \Exception($is_category);
                }
            } else {
                // 카테고리삭제
                $up_cate_data['BoardIdx'] = $board_idx;
                if ($this->_updateBoardCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }

            // 파일 수정
            $reg_type = 1;              //0:일반유저등록, 1:관리자등록
            $attach_file_type = 0;      //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->_modifyBoardAttach($board_idx, $board_data, $reg_type, $attach_file_type);
            if ($is_attach !== true) {
                throw new \Exception($is_attach);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 게시글 복제
     * @param $board_idx
     * @return array|bool
     */
    public function boardCopy($board_idx)
    {
        $admin_idx = $this->session->userdata('admin_idx');
        $reg_ip = $this->input->ip_address();

        $this->_conn->trans_begin();
        try {
            $arr_board_category = $this->_getBoardCategoryArray($board_idx);

            $insert_column = '
                BmIdx, SiteCode, MdCateCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, DivisionCcd, ExamProblemYear, ProfIdx, SubjectIdx, CourseIdx, ProdApplyTypeCcd, ProdCode,
                Title, Content, ReadCnt, SettingReadCnt, OrderNum,
                IsUse,
                IsStatus, RegMemIdx, 
                RegAdminIdx,
                RegIp,
                UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $select_column = '
                BmIdx, SiteCode, MdCateCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, DivisionCcd, ExamProblemYear, ProfIdx, SubjectIdx, CourseIdx, ProdApplyTypeCcd, ProdCode,
                CONCAT("복사본-", IF(LEFT(Title,4)="복사본-", REPLACE(Title, LEFT(Title,4), ""), Title)) AS Title,
                Content, ReadCnt, SettingReadCnt, OrderNum, 
                CASE IsUse WHEN "Y" THEN "N" ELSE "N" END AS IsUse,
                IsStatus, RegMemIdx,
                REPLACE(RegAdminIdx, RegAdminIdx, "'.$admin_idx.'") AS RegAdminIdx,
                REPLACE(RegIp, RegIp, "'.$reg_ip.'") AS RegIp,
                UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $query = "insert into {$this->_table} ({$insert_column})
                select {$select_column} from {$this->_table}
                where BoardIdx = {$board_idx}";
            $result = $this->_conn->query($query);
            $insert_board_idx = $this->_conn->insert_id();

            if ($result === true) {
                foreach ($arr_board_category as $key => $val) {
                    $set_board_category_data['BoardIdx'] = $insert_board_idx;
                    $set_board_category_data['CateCode'] = $val;
                    $set_board_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBoardCategory($set_board_category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
                    }
                }
            } else {
                throw new \Exception('게시물 복사에 실패했습니다.');
            }

            //첨부파일DB복사
            $insert_column = '
                BoardIdx, BaIdx, RegType, AttachFileType, AttachFilePath, AttachFileName, AttachRealFileName, AttachFileSize, IsStatus, RegDatm, RegMemIdx, RegAdminIdx, RegIp, UpdDatm, UpdMemIdx, UpdAdminIdx
            ';
            $select_column =
                $insert_board_idx.', BaIdx, RegType, AttachFileType, AttachFilePath, AttachFileName, AttachRealFileName, AttachFileSize, IsStatus, RegDatm, RegMemIdx, RegAdminIdx, RegIp, UpdDatm, UpdMemIdx, UpdAdminIdx
            ';

            $query = "insert into {$this->_table_attach} ({$insert_column})
                select {$select_column} from {$this->_table_attach}
                where BoardIdx = {$board_idx}";
            //echo "<pre>$query</pre>";
            $result = $this->_conn->query($query);
            if ($result === false) {
                throw new Exception('첨부파일 DB입력에 실패했습니다.');
            }
            //기존파일경로
            $column = "
                AttachFilePath
            ";

            $from = "
                FROM
                    {$this->_table_attach}
            ";

            $obder_by = " 
                 ORDER BY RegDatm DESC
				 LIMIT 1";

            $where = " WHERE BoardIdx = " . $board_idx;

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $resPath = $query->row_array();

            //BMIDX추출
            $column = "
                BmIdx
            ";

            $from = "
                FROM
                    {$this->_table}
            ";

            $obder_by = " ";

            $where = " WHERE BoardIdx = " . $insert_board_idx;

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $resBmIdx = $query->row_array();

            //기존첨부파일이 있으면
            if($resPath['AttachFilePath']){
                // 기존파일경로

                $loadPath = $resPath['AttachFilePath'];
                $src = str_replace('/public/uploads/', $this->upload_path ,$loadPath);
                // 복사될 파일경로
                $mkdest = $this->upload_path . config_item('upload_prefix_dir') . '/board/' . $resBmIdx['BmIdx'] . '/';
                $dest = $this->upload_path . config_item('upload_prefix_dir') . '/board/' . $resBmIdx['BmIdx'] . '/' . date('Y') . '/' . date('md') . $insert_board_idx . "/";

                if(is_dir($mkdest) === false){
                    if (mkdir($mkdest, 0707, true) === false) {
                        throw new \Exception(sprintf('디렉토리 생성에 실패했습니다. (%s)', $mkdest));
                    }
                }

                exec("cp -rf $src $dest");

                if(is_dir($dest) === false) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }

                // 파일 복사후 파일경로 업데이트
                $addData = [
                    'AttachFilePath' => '/public/uploads/' . config_item('upload_prefix_dir') . '/board/' . $resBmIdx['BmIdx'] . '/' . date('Y') . '/' . date('md') . $insert_board_idx . "/"
                ];

                $this->_conn->set($addData)->where('BoardIdx', $insert_board_idx);
                if ($this->_conn->update($this->_table_attach) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }

            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 게시판 수정 폼을 위한 데이터 조회
     * @param $board_type   [게시판종류]
     * @param $column       [컬럼정보]
     * @param $arr_condition
     * @param $arr_condition_file
     * @return mixed
     */
    public function findBoardForModify($board_type, $column, $arr_condition, $arr_condition_file)
    {
        $master_column = "
            MST.BmTypeCcd, MST.OneWayOption, MST.TwoWayOption,
            IF ((CASE MST.BmTypeCcd WHEN '601001' THEN INSTR(MST.OneWayOption, 1) ELSE '0' END) > 0, 'Y', 'N') AS BoardIsLogin,
            IF ((CASE MST.BmTypeCcd WHEN '601001' THEN INSTR(MST.OneWayOption, 2) WHEN '601002' THEN INSTR(MST.TwoWayOption, 2) ELSE '0' END) > 0, 'Y', 'N') AS BoardIsComment,
            IF ((CASE MST.BmTypeCcd WHEN '601002' THEN INSTR(MST.TwoWayOption, 1) ELSE '0' END) > 0, 'Y', 'N') AS BoardIsQna,
        ";

        $from = "
            FROM {$this->_table} as LB
            INNER JOIN {$this->_table_master} as MST ON LB.BmIdx = MST.BmIdx AND MST.IsUse = 'Y' AND MST.IsStatus = 'Y'
            LEFT OUTER JOIN (
                select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                from {$this->_table_attach}
                where IsStatus = 'Y' ";
        if (isset($arr_condition_file['reg_type']) === true) {
            $from .= "and RegType = {$arr_condition_file['reg_type']} ";
        }
        if (isset($arr_condition_file['attach_file_type']) === true) {
            $from .= "and AttachFileType = {$arr_condition_file['attach_file_type']} ";
        }
        $from .= "GROUP BY BoardIdx
                ) as LBA ON LB.BoardIdx = LBA.BoardIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON LB.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN2 ON LB.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        switch ($board_type) {
            case "notice" :
            case "offlineBoard" :
            case "gallery" :
            case "free" :
            case "mocktest/notice" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                ";
                break;
            case "counsel" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_member} AS MEM ON LB.RegMemIdx = MEM.MemIdx
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.TypeCcd = LSC2.Ccd
                    LEFT OUTER JOIN (
                        select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                        from {$this->_table_attach}
                        where IsStatus = 'Y' and RegType = 1
                        GROUP BY BoardIdx
                    ) as LBA_1 ON LB.BoardIdx = LBA_1.BoardIdx
                    LEFT OUTER JOIN {$this->_table_sys_admin} as counselAdmin ON LB.ReplyAdminIdx = counselAdmin.wAdminIdx and counselAdmin.wIsStatus='Y'
                    LEFT OUTER JOIN {$this->_table_sys_admin} as counselAdmin2 ON LB.ReplyUpdAdminIdx = counselAdmin2.wAdminIdx and counselAdmin2.wIsStatus='Y'
                    LEFT OUTER JOIN {$this->_table_sys_category} as MdSysCate ON LB.MdCateCode = MdSysCate.CateCode AND LB.SiteCode = MdSysCate.SiteCode
                ";
                break;
            case "faq" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ1 ON LB.FaqGroupTypeCcd = LSC_FAQ1.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ2 ON LB.FaqTypeCcd = LSC_FAQ2.Ccd
                ";
                break;
            case "announcement" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC1 ON LB.TypeCcd = LSC1.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.AreaCcd = LSC2.Ccd
                ";
                break;
            case "question" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC1 ON LB.AreaCcd = LSC1.Ccd
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                ";
                break;
            case "professorNotice" :
            case "tcc" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                ";
                break;
            case "qna" :
            case "mocktest/qna" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC2 ON LB.TypeCcd = LSC2.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC3 ON LB.ReplyStatusCcd = LSC3.Ccd
                    LEFT OUTER JOIN {$this->_table_sys_admin} as profADMIN ON LB.ReplyAdminIdx = profADMIN.wAdminIdx
                    LEFT OUTER JOIN {$this->_table_member} AS MEM ON LB.RegMemIdx = MEM.MemIdx
                    LEFT OUTER JOIN (
                        select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                        from {$this->_table_attach}
                        where IsStatus = 'Y' and RegType = 1
                        GROUP BY BoardIdx
                    ) as LBA_1 ON LB.BoardIdx = LBA_1.BoardIdx
                    LEFT OUTER JOIN {$this->_table_sys_admin} as qnaAdmin ON LB.ReplyAdminIdx = qnaAdmin.wAdminIdx and qnaAdmin.wIsStatus='Y'
                    LEFT OUTER JOIN {$this->_table_sys_admin} as qnaAdmin2 ON LB.ReplyUpdAdminIdx = qnaAdmin2.wAdminIdx and qnaAdmin2.wIsStatus='Y'
                    LEFT OUTER JOIN {$this->_table_sys_category} as MdSysCate ON LB.MdCateCode = MdSysCate.CateCode AND LB.SiteCode = MdSysCate.SiteCode
                ";
                break;
            case "material" :
            case "tpass" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC4 ON LB.ProdApplyTypeCcd = LSC4.Ccd
                    LEFT JOIN {$this->_table_product} as lms_product ON LB.ProdCode = lms_product.ProdCode
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.TypeCcd = LSC.Ccd
                ";
                break;
            case "liveLectureMaterial" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_product_course} as PRODUCT_COURSE ON LB.CourseIdx = PRODUCT_COURSE.CourseIdx
                    LEFT OUTER JOIN {$this->_table_professor} as PROFESSOR ON LB.ProfIdx = PROFESSOR.ProfIdx
                ";
                break;
            case "studyComment" :
                $from = $from."
                    LEFT OUTER JOIN {$this->_table_sys_code} as LSC4 ON LB.ProdApplyTypeCcd = LSC4.Ccd
                    LEFT JOIN {$this->_table_product} as lms_product ON LB.ProdCode = lms_product.ProdCode
                    LEFT OUTER JOIN {$this->_table_product_subject} as PS ON LB.SubjectIdx = PS.SubjectIdx
                    LEFT OUTER JOIN {$this->_table_professor} as PROFESSOR ON LB.ProfIdx = PROFESSOR.ProfIdx
                ";
                break;
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select STRAIGHT_JOIN ' . $master_column . $column .$from .$where)->row_array();
    }

    /**
     * 게시판 이전글
     * @param $arr_condition
     * @param $sub_query_condition
     * @return mixed
     */
    public function findBoardPrevious($arr_condition, $sub_query_condition)
    {
        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $column = 'A.BoardIdx, A.Title';
        $from = "
            FROM {$this->_table} AS A
            LEFT JOIN (
                SELECT subLBrC.BoardIdx
                FROM {$this->_table_r_category} AS subLBrC
                LEFT OUTER JOIN {$this->_table_sys_category} AS subLSC ON subLBrC.CateCode = subLSC.CateCode
                {$sub_query_where}
                GROUP BY subLBrC.BoardIdx
            ) AS B ON A.BoardIdx = B.BoardIdx
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON A.RegMemIdx = MEM.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.BoardIdx'=>'DESC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1, 0)->getMakeLimitOffset();

        $query = $this->_conn->query('select '.$column . $from .$where . $order_by_offset_limit);
        return $query->row_array();
    }

    /**
     * 게시판 다음글
     * @param $arr_condition
     * @param $sub_query_condition
     * @return mixed
     */
    public function findBoardNext($arr_condition, $sub_query_condition)
    {
        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $column = 'A.BoardIdx, A.Title';
        $from = "
            FROM {$this->_table} AS A
            LEFT JOIN (
                SELECT subLBrC.BoardIdx
                FROM {$this->_table_r_category} AS subLBrC
                LEFT OUTER JOIN {$this->_table_sys_category} AS subLSC ON subLBrC.CateCode = subLSC.CateCode
                {$sub_query_where}
                GROUP BY subLBrC.BoardIdx
            ) AS B ON A.BoardIdx = B.BoardIdx
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON A.RegMemIdx = MEM.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.BoardIdx'=>'ASC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1, 0)->getMakeLimitOffset();

        $query = $this->_conn->query('select '.$column . $from .$where . $order_by_offset_limit);
        return $query->row_array();
    }

    public function listBoardCategory($board_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table_r_category . ' as CC
                inner join ' . $this->_table_sys_category . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table_sys_category . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.BoardIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.BoardIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$board_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * Best 상태 update
     * @param array $params
     * @return array|bool
     */
    public function boardIsBest($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $board_idx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('BoardIdx', $board_idx);

                if ($this->_conn->update($this->_table) === false) {
                    throw new \Exception('게시판 정보 수정에 실패했습니다.');
                }
                //echo $this->_conn->last_query();
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function boardIsUse($is_use_val, $target = [])
    {
        $this->_conn->trans_begin();

        try {
            if ($is_use_val != 'N' && $is_use_val != 'Y') {
                throw new \Exception('잘못된 데이터 입니다.');
            }

            if (count($target) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $set_data = ['IsUse' => $is_use_val];
            $str_board_idx = implode(',', array_keys($target));
            $str_board_idx = explode(',', $str_board_idx);
            $this->_conn-> set($set_data)->where_in('boardIdx',$str_board_idx);

            if($this->_conn->update($this->_table)=== false) {
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
     * 상담게시판 답글 등록
     * @param $inputData
     * @param $idx
     * @param $bm_idx
     * @return bool
     */
    public function replyAddBoard($inputData, $idx, $bm_idx)
    {
        $this->_conn->trans_begin();
        try {
            if (empty($bm_idx)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $board_idx = $idx;
            $result = $this->_findBoardDataAll($board_idx);
            if (empty($result)) {
                throw new \Exception('수정할 정보를 조회하지 못했습니다.');
            }

            if ($result['ReplyStatusCcd'] == '621004') {
                $inputData = array_merge($inputData,[
                    'ReplyUpdAdminIdx' => $this->session->userdata('admin_idx'),
                    'ReplyUpdDatm' => date('Y-m-d H:i:s')
                ]);
            } else {
                $inputData = array_merge($inputData,[
                    'ReplyAdminIdx' => $this->session->userdata('admin_idx'),
                    'ReplyRegDatm' => date('Y-m-d H:i:s'),
                    'ReplyRegIp' => $this->input->ip_address()
                ]);
            }

            $this->_conn->set($inputData)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 파일 수정
            $tmp_bm_idx['BmIdx'] = $bm_idx;     //파일수정을 위한 bm_idx 배열 선언
            $reg_type = 1;
            $attach_file_type = 1;              //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->_modifyBoardAttach($board_idx, $tmp_bm_idx, $reg_type, $attach_file_type);
            if ($is_attach !== true) {
                throw new \Exception($is_attach);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 단일 파일 삭제
     * @param $attach_idx
     * @return array|bool
     */
    public function removeFile($attach_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_data = $this->_findBoardAttach($attach_idx)[0];
            if (empty($arr_data) === true) {
                throw new \Exception('삭제할 데이터가 없습니다.');
            }

            $file_path = $arr_data['AttachFilePath'].$arr_data['AttachFileName'];
            $this->load->helper('file');
            $real_file_path = public_to_upload_path($file_path);
            /*if (@unlink($real_file_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }*/

            $data = ['IsStatus'=>'N'];
            $this->_conn->set($data)->where('BoardFileIdx', $attach_idx);

            if($this->_conn->update($this->_table_attach)=== false) {
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
     * 게시판 삭제
     * IsStatus 'N' 으로 Update
     * @param $idx
     * @return bool
     */
    public function boardDelete($idx)
    {
        $this->_conn->trans_begin();
        try {
            $board_idx = $idx;
            $admin_idx = $this->session->userdata('admin_idx');
            $result = $this->_findBoardData($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdAdminIdx' => $admin_idx,
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('BoardIdx', $board_idx)->where('IsStatus', 'Y')->update($this->_table);

            if ($is_update === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 사이트별 미답변 횟수
     * @param $arr_condition
     * @return array|bool
     */
    public function getUnAnswerArray($arr_condition)
    {
        if (empty($arr_condition)) {
            return false;
        }
        $from = "
            FROM {$this->_table}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['SiteCode'=>'ASC'])->getMakeOrderBy();

        $sql = 'select (SELECT "all") AS SiteCode, COUNT(BoardIdx) AS count ';
        $sql .= $from.' '.$where.' ';
        $sql .= 'UNION ALL ';
        $sql .= 'select SiteCode, COUNT(BoardIdx) AS count ';
        $sql .= $from.' '.$where.' ';
        $sql .= 'group by SiteCode ';
        $sql .= $order_by_offset_limit;
        $data = $this->_conn->query($sql)->result_array();
        $data = array_pluck($data, 'count', 'SiteCode');
        return $data;
    }

    /**
     * 메모 리스트
     * @param $board_idx
     * @return mixed
     */
    public function getMemoListAll($board_idx)
    {
        $column = 'BMM.BoardMemoIdx, BMM.BoardIdx, BMM.Memo, BMM.RegDatm, BMM.RegAdminIdx, ADMIN.wAdminName';

        $from = "
            FROM {$this->_table_memo} AS BMM
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON BMM.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
        ";

        $arr_condition = [
            'EQ' => ['BMM.BoardIdx' => $board_idx]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['BMM.BoardMemoIdx'=>'ASC'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 메모 저장
     * @param array $input
     * @param $board_idx
     * @return array|bool
     */
    public function memoAddBoard($input = [], $board_idx)
    {
        $this->_conn->trans_begin();
        try {
            $inputData['BoardIdx'] = $board_idx;
            $inputData['Memo'] = element('memo_contents', $input);
            $inputData['RegDatm'] = date('Y-m-d H:i:s');
            $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
            $inputData['RegIp'] = $this->input->ip_address();

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table_memo) === false) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * FAQ구분별 게시글 횟수
     * @param $bm_idx
     * @param array $groupCcd
     * @param array $site_code
     * @return array
     */
    public function getFaqBoardCcdCountList($bm_idx, $groupCcd = [], $site_code = null)
    {
        $this->_conn->select("{$this->_table_sys_code}.Ccd, COUNT({$this->_table}.BoardIdx) AS count");
        $this->_conn->from($this->_table_sys_code);
        $this->_conn->where($this->_table.'.BmIdx', $bm_idx);
        $this->_conn->where($this->_table.'.IsStatus', 'Y');
        $this->_conn->where($this->_table.'.IsUse', 'Y');
        $this->_conn->where_in($this->_table_sys_code.'.Ccd', $groupCcd);
        $this->_conn->where_in($this->_table.'.SiteCode', get_auth_site_codes(false, true));

        if (empty($site_code) === false) {
            $this->_conn->where($this->_table.'.SiteCode', $site_code);
        }

        $this->_conn->join($this->_table, "{$this->_table_sys_code}.Ccd = {$this->_table}.FaqGroupTypeCcd");
        $this->_conn->group_by($this->_table.'.FaqGroupTypeCcd');
        $data = $this->_conn->get()->result_array();
        $data = array_pluck($data, 'count', 'Ccd');
        return $data;
    }

    /**
     * 정렬변경 : Faq 에서만 사용
     * @param $arr_condition
     * @param $column
     * @return mixed
     */
    public function listFaqBoardForOrderBy($arr_condition, $column)
    {
        $from = "
            FROM {$this->_table} AS LB
            LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ1 ON LB.FaqGroupTypeCcd = LSC_FAQ1.Ccd
            LEFT OUTER JOIN {$this->_table_sys_code} as LSC_FAQ2 ON LB.FaqTypeCcd = LSC_FAQ2.Ccd
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['LB.FaqGroupTypeCcd'=>'ASC', 'LB.OrderNum'=>'ASC'])->getMakeOrderBy();

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * OrderValue Update
     * @param array $data
     * @return array|bool
     */
    public function modifyOrderByBoard($data = [])
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->_findBoardData($data['target_idx']);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $arr_condition = [
                'BmIdx' => $data['bm_idx'],
                'FaqGrouptypeCcd' => $data['faq_group_ccd'],
            ];

            // 해당 카테고리 외에 다른 카테고리 OrderValue 업데이트
            if($data['distance'] > 0) {
                // 순위를 올렸을 경우
                $is_update = $this->_conn->set('OrderNum', '`OrderNum` - 1', false);
                $is_update = $is_update->where($arr_condition);
                $is_update = $is_update->where(['OrderNum >' => $result['OrderNum']]);
                $is_update = $is_update->where(['OrderNum <=' => $result['OrderNum'] + $data['distance']]);
                $is_update = $is_update->update($this->_table);
            } else {
                // 순위를 내렸을 경우
                $is_update = $this->_conn->set('OrderNum', '`OrderNum` + 1', false);
                $is_update = $is_update->where($arr_condition);
                $is_update = $is_update->where(['OrderNum >=' => $result['OrderNum'] + $data['distance']]);
                $is_update = $is_update->where(['OrderNum <' => $result['OrderNum']]);
                $is_update = $is_update->update($this->_table);
            }

            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $is_update = $this->_conn->set('OrderNum', '`OrderNum` + ' . $data['distance'], false);
            $is_update = $is_update->where($arr_condition);
            $is_update = $is_update->where(['BoardIdx' => $data['target_idx']]);
            $is_update = $is_update->update($this->_table);

            if ($is_update === false) {
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
     * MAX 정렬 값 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getMaxOrderNumData($arr_condition = [])
    {
        $column = 'MAX(OrderNum) AS OrderNum';
        $from = "
            FROM {$this->_table}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 과제스케줄데이터 조회
     * @param $prod_code
     * @return mixed
     */
    public function getAssignmentSchedule($prod_code)
    {
        $column = 'StartDate, EndDate, WeekArray';
        $from = "
            FROM {$this->_table_assignment_r_schedule}
        ";
        $arr_condition = [
            'EQ' => ['ProdCode' => $prod_code]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 과제스케줄데이터 조회
     * @param $prod_code
     * @return mixed
     */
    public function getAssignmentScheduleDate($prod_code)
    {
        $column = 'ScheduleDate';
        $from = "
            FROM {$this->_table_assignment_r_schedule_date}
        ";
        $arr_condition = [
            'EQ' => ['ProdCode' => $prod_code]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 과제스케줄데이터 등록
     * @param $prod_code
     * @param $params_post
     * @return array|bool
     */
    public function addAssignmentSchedule($prod_code, $params_post)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $is_delete = $this->_conn->where('ProdCode', $prod_code)->delete($this->_table_assignment_r_schedule);
            if ($is_delete === false) {
                throw new \Exception('기존 등록된 강좌스케줄 삭제에 실패했습니다.');
            }

            $inputData = [
                'ProdCode' => $prod_code,
                'StartDate' => element('start_date', $params_post),
                'EndDate' => element('end_date', $params_post),
                'WeekArray' => element('week_str', $params_post),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $reg_ip
            ];
            if ($this->_conn->set($inputData)->insert($this->_table_assignment_r_schedule) === false) {
                throw new \Exception('강좌스케줄 등록에 실패했습니다.');
            }

            foreach (element('savDay', $params_post) as $key => $val) {
                if (empty($val) === false) {
                    $inputData = [
                        'ProdCode' => $prod_code,
                        'ScheduleDate' => date('Y-m-d', strtotime($val))
                    ];
                    if ($this->_conn->set($inputData)->insert($this->_table_assignment_r_schedule_date) === false) {
                        throw new \Exception('강좌스케줄 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 댓글 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return mixed
     */
    public function listAllBoardForComment($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table_r_comment} AS a
            INNER JOIN {$this->_table_member} AS b ON a.RegMemIdx = b.MemIdx
            LEFT JOIN {$this->_table_sys_admin} AS c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus = 'Y'
            LEFT JOIN {$this->_table_sys_admin} AS d ON a.UpdAdminIdx = d.wAdminIdx AND d.wIsStatus = 'Y'
        ";

        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function boardIsUseForComment($params = [], $is_use)
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $str_cmt_idx = implode(',', array_keys($params));
            $arr_cmt_idx = explode(',', $str_cmt_idx);

            $input = [
                'IsUse' => $is_use,
                'UpdAdminDatm' => date('Y-m-d H:i:s'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($input)->where_in('BoardCmtIdx',$arr_cmt_idx);
            if($this->_conn->update($this->_table_r_comment)=== false) {
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
     * 사이트별 1:1문의 게시판 미답변 현황 [메인페이지]
     */
    public function getCounselUnAnswerForMainArray()
    {
        $column = 'a.SiteGroupCode, g.SiteGroupName, a.SiteCode, a.IsCampus, a.IsCampus, IF(a.IsCampus = "N", "온라인", "학원") AS SiteOnOffName, IFNULL(b.CounselCnt, 0) AS CounselCnt';

        $arr_condition_sub = [
            'EQ' => [
                'BmIdx' => '48',
                'RegType' => '0',
                'ReplyStatusCcd' => '621001',
                'IsUse' => 'Y',
                'IsStatus' => 'Y',
            ]
        ];
        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(false);

        $arr_condition = [
            'NOT' => ['a.SiteCode' => config_item('app_intg_site_code')],
            'IN' => ['a.SiteCode' => get_auth_site_codes()],
            'EQ' => ['a.IsUse' => 'Y']
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table_sys_site} AS a
            INNER JOIN lms_site_group AS g ON a.SiteGroupCode = g.SiteGroupCode
            LEFT JOIN 
            (
                SELECT SiteCode, COUNT(*) AS CounselCnt
                FROM {$this->_table}
                {$where_sub}
                GROUP BY SiteCode
            ) AS b ON a.SiteCode = b.SiteCode
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);

        return $query->result_array();
    }

    /**
     * 파일명 배열 생성
     * @param $board_idx
     * @param string $bm_idx
     * @return array
     */
    protected function _getAttachImgNames($board_idx, $bm_idx = '')
    {
        if ($bm_idx == '90') {
            $file_max_cnt = $this->_attach_img_cnt_gallery;
        } else {
            $file_max_cnt = $this->_attach_img_cnt;
        }
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= $file_max_cnt; $i++) {
            $attach_file_names[] = 'board_' . $board_idx . '_0' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }

    /**
     * 게시판 카테고리 조회
     * @param $board_idx
     * @return array|int
     */
    private function _getBoardCategoryArray($board_idx)
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'BoardIdx' => $board_idx]];
        $data = $this->_conn->getListResult($this->_table_r_category, 'BoardSiteCateIdx, CateCode', $arr_condition, null, null, [
            'BoardSiteCateIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'CateCode', 'BoardSiteCateIdx');
        return $data;
    }

    /**
     * 카테고리 등록
     * @param $inputData
     * @return bool
     */
    private function _addBoardCategory($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_r_category) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 수정
     * @param $board_idx
     * @param $board_category_data
     * @return bool|string
     */
    private function _modifyBoardCategory($board_idx, $board_category_data)
    {
        try {
            // 기존 카테고리 조회
            $arr_board_category = array_values($this->_getBoardCategoryArray($board_idx));
            $up_arr_category_data = array_diff($arr_board_category, $board_category_data);     //N 업데이트
            $ins_arr_category_data = array_diff($board_category_data, $arr_board_category);     //insert

            $up_cate_data = [];
            foreach ($up_arr_category_data as $key => $val) {
                $up_cate_data['BoardIdx'] = $board_idx;
                $up_cate_data['CateCode'] = $val;
                if ($this->_updateBoardCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }

            $ins_cate_data = [];
            foreach ($ins_arr_category_data as $key => $val) {
                $ins_cate_data['BoardIdx'] = $board_idx;
                $ins_cate_data['CateCode'] = $val;
                $ins_cate_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $ins_cate_data['RegIp'] = $this->input->ip_address();
                if ($this->_addBoardCategory($ins_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 카테고리 업데이트
     * @param $whereData
     * @return bool
     */
    private function _updateBoardCategory($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table_r_category) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 등록
     * @param $inputData
     * @return bool
     */
    protected function _addBoardAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_attach) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 수정
     * 파일 등록 상태에 따른 DB insert, update 분기 처리
     * update 발생 시 파일 삭제 처리
     * @param $board_idx
     * @param $board_data
     * @param $reg_type
     * @param $attach_file_type
     * @return array|bool
     */
    private function _modifyBoardAttach($board_idx, $board_data, $reg_type, $attach_file_type)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['size'];
            $arr_board_attach = $this->_getBoardAttachArray($board_idx, $reg_type, $attach_file_type);
            $arr_board_attach_keys = array_keys($arr_board_attach);

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $board_data['BmIdx'] . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx, $board_data['BmIdx']), $upload_sub_dir);

            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($board_attach_data as $key => $val) {
                /*if (empty($val) === false && $val != 'blob') {*/
                if ($val > 0) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['BoardIdx'] = $board_idx;
                        $set_board_attach_data['RegType'] = $reg_type;
                        $set_board_attach_data['AttachFileType'] = $attach_file_type;
                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        $set_board_attach_data['RegIp'] = $this->input->ip_address();

                        if ($this->_addBoardAttach($set_board_attach_data) === false) {
                            throw new \Exception('파일 등록에 실패했습니다.');
                        }
                    } else {
                        //up, 기존 파일 삭제
                        $this->load->helper('file');
                        $real_img_path = public_to_upload_path($arr_board_attach[$arr_board_attach_keys[$key]]);
                        /*if (@unlink($real_img_path) === false) {
                            throw new \Exception('이미지 삭제에 실패했습니다.');
                        }*/

                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];

                        $whereData = [
                            'BoardFileIdx' => $arr_board_attach_keys[$key]
                        ];
                        $this->_updateBoardAttach($set_board_attach_data, $whereData);
                    }

                }

            }
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 파일 수정
     * @param $input
     * @param $whereData
     * @return bool
     */
    private function _updateBoardAttach($input, $whereData)
    {
        try {
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table_attach) === false) {
                throw new \Exception('파일 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 게시판 식별자 기준 파일 목록 조회
     * @param $board_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|int
     */
    private function _getBoardAttachArray($board_idx, $reg_type, $attach_file_type)
    {
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y',
                'BoardIdx' => $board_idx,
                'RegType' => $reg_type,
                'AttachFileType' => $attach_file_type,
            ]
        ];
        $data = $this->_conn->getListResult($this->_table_attach, 'BoardFileIdx, CONCAT(AttachFilePath, AttachFileName) AS FileInfo', $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'FileInfo', 'BoardFileIdx');

        return $data;
    }

    /**
     * 파일 식별자 기준 파일 목록 조회
     * @param $attach_idx
     * @return array|int
     */
    private function _findBoardAttach($attach_idx)
    {
        $column = 'BoardFileIdx, BoardIdx, AttachFilePath, AttachFileName, AttachFileSize';
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'BoardFileIdx' => $attach_idx]];
        $data = $this->_conn->getListResult($this->_table_attach, $column, $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);

        return $data;
    }

    /**
     * 단일 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findBoardData($idx)
    {
        $column = 'BoardIdx, OrderNum';
        $from = "
            FROM {$this->_table}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BoardIdx' => $idx,
                'IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }

    /**
     * IsStatus 무시, 단순 식별자 조건으로 조회
     * @param $idx
     * @return mixed
     */
    private function _findBoardDataAll($idx)
    {
        $column = 'BoardIdx, ReplyStatusCcd';
        $from = "
            FROM {$this->_table}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BoardIdx' => $idx
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }
}