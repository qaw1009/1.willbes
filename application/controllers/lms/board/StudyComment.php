<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class StudyComment extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'sys/site', 'board/board', 'product/base/subject', 'product/base/professor', 'product/on/lecture');
    protected $helpers = array('download','file');

    private $board_name = 'studyComment';
    private $site_code = '';
    private $bm_idx;
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];
    private $_prodType_group_ccs = '636';   //강좌적용구분
    private $_prodType_ccds = [     //강좌적용구분 : 온라인강좌, 학원강좌, 수기등록
        '636001' => 'on',
        '636002' => 'off',
        '636011' => 'create'
    ];

    private $_memory_limit_size = '512M';

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 수강후기관리 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        //사이트카테고리 중분류 조회
        $arr_m_category = $this->categoryModel->getCategoryArray('', '', '', '2');

        //과목조회
        $arr_subject = $this->_getSubjectArray();

        //교수조회
        $arr_professor = $this->professorModel->getProfessorArray('','',['wProfName_order_by' => 'asc', 'WP.wProfName' => 'asc']);

        $this->load->view("board/{$this->board_name}/index", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_category' => $arr_category,
            'arr_m_category' => $arr_m_category,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}"
        ]);
    }

    /**
     * 수강후기 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');

        $arr_condition = $this->_getListConditions();
        $sub_query_condition = $this->_getListSubConditions();

        $column = '
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.IsStatus, LB.ReviewRegDate,
            IF(LB.RegType = 1, LB.RegMemId, MEM.MemId) AS RegMemId,
            IF(LB.RegType = 1, LB.RegMemName, MEM.MemName) AS RegMemName, 
            IF(LB.RegType = 1, ADMIN.wAdminName,"") AS AdmMemName,
            LB.ProdCode, ifnull(LB.ProdName, lms_product.ProdName) as ProdName, LSC4.CcdName AS ProdApplyTypeName,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.UpdMemIdx, LB.UpdAdminIdx
            ,(
                SELECT CONCAT(b.CateName,\'[\',a.CateCode,\']\') AS CateCode
                FROM lms_product_r_category AS a
                INNER JOIN lms_sys_category AS b ON a.CateCode = b.CateCode AND b.IsUse = \'Y\' AND b.IsStatus = \'Y\'
                WHERE a.ProdCode = LB.ProdCode AND a.IsStatus = \'Y\'
            ) AS ProdCateName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name, true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name, false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * BEST 적용
     */
    public function storeIsBest()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardIsBest(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 라이브강의자료실 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $method = 'POST';
        $data = null;
        $board_idx = null;

        //과목조회
        $arr_subject = $this->_getSubjectArray();

        //교수조회
        //$arr_professor = $this->_getProfessorArray();
        $arr_professor = $this->professorModel->getProfessorArray(null,null,['wProfName_order_by' => 'asc', 'WP.wProfName' => 'asc']);

        //상품타입
        $arr_prodType_ccds = [];
        $codes = $this->codeModel->getCcd($this->_prodType_group_ccs);
        foreach ($this->_prodType_ccds as $key => $val) {
            if (empty($codes[$key]) === false) {
                $arr_prodType_ccds[$key][] = $codes[$key];
                $arr_prodType_ccds[$key][] = $val;
            }
        }

        if (empty($params[0]) === false) {
            $column = '
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.ReviewRegDate, 
            IF(LB.RegType = 1, LB.RegMemId, MEM.MemId) AS RegMemId,
            IF(LB.RegType = 1, LB.RegMemName, MEM.MemName) AS RegMemName,
            LB.ProdApplyTypeCcd, LB.ProdCode, ifnull(LB.ProdName, lms_product.ProdName) as ProdName , LSC4.CcdName AS ProdApplyTypeName,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
            ';
            $method = 'PUT';
            $board_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'LB.BoardIdx' => $board_idx,
                    'LB.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'reg_type' => $this->_reg_type['admin'],
                'attach_file_type' => $this->_attach_reg_type['default']
            ];
            $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        }

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'arr_prodType_ccd' => $arr_prodType_ccds,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 게시판 글 등록
     */
    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'subject_idx', 'label' => '과목명', 'rules' => 'trim|required'],
            ['field' => 'prof_idx', 'label' => '교수명', 'rules' => 'trim|required'],
            ['field' => 'prod_type_ccd', 'label' => '강좌적용구분', 'rules' => 'trim|required'],
            //['field' => 'prod_code[]', 'label' => '강좌명', 'rules' => 'trim|required'],
            ['field' => 'lec_score', 'label' => '평점', 'rules' => 'trim|required'],
            ['field' => 'reg_mem_name', 'label' => '회원명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 수강후기관리 Read 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }

        $column = '
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.ProdCode, ifnull(LB.ProdName, lms_product.ProdName) as ProdName, LSC4.CcdName AS ProdApplyTypeName,
            IF(LB.RegType = 1, LB.RegMemId, MEM.MemId) AS RegMemId,
            IF(LB.RegType = 1, LB.RegMemName, MEM.MemName) AS RegMemName
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                /*'LB.IsStatus' => 'Y'*/
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, '', element('search_professor', $search_datas, ''));
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $this->load->view("board/{$this->board_name}/read",[
            'boardName' => $this->board_name,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 수강후기관리 강좌데이터 기준 Read 페이지
     */
    public function readLecture($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $params[0];

        if (empty($params[0]) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }

        // 강좌데이터 조회
        $product_data = $this->findProductForStudyBoard(
            [
                'EQ' => [
                    'lms_product.ProdCode' => $prod_code,
                    'lms_product.IsStatus' => 'Y'
                ]
            ],
            'lms_site.SiteName, lms_product.ProdName, lms_sys_category.CateName,lms_product_subject.SubjectName,
            vw_product_r_professor_concat.wProfName_String, lms_product_lecture.LearnPatternCcd, fn_ccd_name(lms_product_lecture.LearnPatternCcd) AS LearnPatternCcdName'
        );

        if (empty($product_data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }

        $this->load->view("board/{$this->board_name}/readLecture",[
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}"
        ]);
    }

    /**
     * 강좌코드기준 수강후기데이터 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjaxLectureForBoard($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $params[0];

        $arr_condition = ([
            'EQ'=>[
                'lms_board.BmIdx' => $this->bm_idx,
                'lms_board.ProdCode' => $prod_code,
                'lms_board.IsStatus' => 'Y'
            ]
        ]);
        $column = '
            lms_board.BoardIdx, lms_board.RegType, lms_board.Title, lms_board.Content, lms_board.LecScore, lms_board.IsUse,
            lms_board.RegDatm,
            IF(lms_board.RegType = 1, lms_board.RegMemId, MEM.MemId) AS RegMemId,
            IF(lms_board.RegType = 1, lms_board.RegMemName, MEM.MemName) AS RegMemName,
            lms_board.UpdDatm, lms_board.UpdMemName, lms_board.UpdMemId, lms_board.UpdAdminIdx, wbs_sys_admin.wAdminName AS UpdAdminName
        ';

        $list = [];
        $count = $this->boardModel->listOnlyBoard($arr_condition,true, $column);

        if ($count > 0) {
            $list = $this->boardModel->listOnlyBoard($arr_condition, false, $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 게시글 사용/미사용
     * @param array $params
     */
    public function boardIsUse($params = [])
    {
        $is_use_val = $params[0];

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rul es' => 'trim|required|in_list[PUT]'],
            ['field' => 'target', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardIsUse($is_use_val, json_decode($this->_req('target'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 게시판 삭제
     * @param array $params
     */
    public function delete($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->_delete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download($fileinfo = [])
    {
        $this->_download();
    }

    private function _setInputData($input){
        $prod_type_ccd = element('prod_type_ccd', $input);
        if($prod_type_ccd == '636011'){
            $prod_code = null;
            $prod_name = element('prod_name', $input);
            $review_reg_date = element('review_reg_date', $input);
        }else{
            $prod_code = element('prod_code', $input)[0];
            $prod_name = null;
            $review_reg_date = null;
        }

        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => element('bm_idx', $input, $this->bm_idx),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'ProdApplyTypeCcd' => $prod_type_ccd,
                'ProdCode' => $prod_code,
                'ProdName' => $prod_name,
                'ReviewRegDate' => $review_reg_date,
                'LecScore' => element('lec_score', $input),
                'RegMemName' => element('reg_mem_name', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return $input_data;
    }

    /**
     * 조회조건 가져오기
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                //'LB.IsStatus' => 'Y',
                'LB.SubjectIdx' => $this->_reqP('search_subject'),
                'LB.ProfIdx' => $this->_reqP('search_professor'),
                'LB.IsUse' => $this->_reqP('search_is_use'),
                'LB.ProdApplyTypeCcd' => $this->_reqP('search_prod_type_ccd'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                    'MEM.MemId' => $this->_reqP('search_member_value'),
                    'MEM.MemName' => $this->_reqP('search_member_value')
                ]
            ]
        ];

        if ($this->_reqP('search_chk_create_by_admin') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'LB.RegType' => '1'
            ]);
        }

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        return $arr_condition;
    }

    /**
     * 서브 조회조건 가져오기
     */
    private function _getListSubConditions()
    {
        $sub_query_condition = [];
        if (empty($this->_reqP('search_category')) === false) {
            $sub_query_condition = [
                'EQ' => [
                    'subLBrC.IsStatus' => 'Y',
                    'subLBrC.CateCode' => $this->_reqP('search_md_cate_code')
                ],
                'LKR' => [
                    'subLBrC.CateCode' => $this->_reqP('search_category')
                ]
            ];
        }
        return $sub_query_condition;
    }

    /**
     * 리스트 엑셀 다운로드
     */
    public function excel()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);
        $site_code = empty($this->_reqP('search_site_code')) === false ? $this->_reqP('search_site_code') : '';

        $file_name = '수강후기_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['운영사이트', '카테고리', '과목', '교수명', '제목', '강좌명', '평점', '등록자이름', '등록자아이디', '등록일', 'HOT', '사용', '조회수'];

        $arr_condition = $this->_getListConditions();
        $sub_query_condition = $this->_getListSubConditions();

        $column = "
            LS.SiteName, IFNULL(FN_BOARD_CATECODE_DATA_LMS(LB.BoardIdx),'N') AS CateCode,
            PS.SubjectName, PROFESSOR.ProfNickName, LB.Title, lms_product.ProdName, LB.LecScore, 
            IF(LB.RegType = 1, LB.RegMemName, MEM.MemName) AS RegMemName,
            IF(LB.RegType = 1, LB.RegMemId, MEM.MemId) AS RegMemId,
            LB.RegDatm, IF(LB.IsBest = 1, 'HOT', '') AS IsBest, LB.IsUse, LB.ReadCnt
        ";

        $list = $this->boardModel->listAllBoard($this->board_name, false, $arr_condition, $sub_query_condition, $site_code, null, null, ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column, false);

        $download_query = $this->boardModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 수강후기 엑셀 업로드
     */
    public function excelUpload()
    {
        $result = null;
        $input = [];
        $arr_excel_key = [];

        $rules = [
            ['field' => 'excel_file', 'label' => '업로드파일', 'rules' => 'callback_validateFileRequired[excel_file]']
        ];
        if ($this->validate($rules) === false) return;

        $excel_data = $this->_getExcelData();

        if(empty($excel_data) === false){
            foreach ($excel_data as $num => $data){
                if(empty($data) === false){
                    if($num == 1){ // 배열 키 생성
                        foreach ($data as $key => $val){
                            if(empty($val) === false){
                                $arr_excel_key[$val] = $key;
                            }
                        }
                    }else{ // 배열 담기
                        foreach ($arr_excel_key as $k => $v){
                            if($k == 'review_reg_date'){
                                if(strpos($data[$v],'/') !== false){
                                    $date = explode('/',$data[$v]);
                                    $data[$v] = $date[2] . '-' . $date[0] . '-' . $date[1];
                                }
                            }

                            if($k == 'cate_code'){
                                if(strpos($data[$v],',') !== false){
                                    $data[$v] = explode(',',$data[$v]);
                                }else{
                                    $data[$v] = [$data[$v]];
                                }
                            }

                            $input[$k] = $data[$v];
                        }
                        $inputData = $this->_setInputData($input);
                        $result = $this->_addBoard('add', $inputData);
                    }
                }
            }
        }

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 엑셀데이터 파일 정보 추출
     * @return array|bool
     */
    private function _getExcelData()
    {
        try {
            $this->load->library('excel');
            $data = $this->excel->readExcel($_FILES['excel_file']['tmp_name']);
        } catch (\Exception $e) {
            return false;
        }

        return $data;
    }
}