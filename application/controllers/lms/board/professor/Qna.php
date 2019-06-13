<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Qna extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board', 'product/base/professor', 'product/base/subject');
    protected $helpers = array('download','file');

    private $board_name = 'qna';
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
    private $_Ccd = [
        'reply' => [
            'unAnswered' => '621001',   //미답변 코드
            'finish' => '621004'        //답변완료
        ]
    ];
    private $_groupCcd = [
        'voc' => '620',
        'reply' => '621',       //답변상태
        'type_group_ccd' => '702' //유형 그룹 코드 = 질문유형
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/professor/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 강사게시판 - 메인 학습Q&A
     */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $this->load->view("board/professor/{$this->board_name}/mainList", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
        ]);
    }

    public function mainListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->_reqP('search_value'),
                    //'P.wProfId' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        //교수관리자로 로그인 했을 경우 (T-zone)
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == $this->lms_prof_role_idx) {
            $arr_condition = array_merge($arr_condition,[
                'IN' => [
                    'P.ProfIdx' => $this->session->userdata('admin_prof_idxs')
                ]
            ]);
        }

        if (empty($this->_reqP('search_site_code')) === false) {
            $arr_condition['EQ']['P.SiteCode'] = $this->_reqP('search_site_code');
        } else {
            $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        }

        $list = [];
        $count = $this->professorModel->listProfessorSubjectMappingForBoard(true, $arr_condition, $this->bm_idx, $this->_Ccd['reply']['unAnswered']);

        if ($count > 0) {
            $list = $this->professorModel->listProfessorSubjectMappingForBoard(false, $arr_condition, $this->bm_idx, $this->_Ccd['reply']['unAnswered'], $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강사게시판 - 강사별 공지사항
     */
    public function detailList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        //상담유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        //과목
        $arr_subject = $this->professorModel->getProfessorSubjectArray($prof_idx);

        $this->load->view("board/professor/{$this->board_name}/detailList", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $arr_subject,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}",
        ]);
    }

    /**
     * 강사게시판 - 강사별 공지사항
     * @param array $params
     * @return CI_Output
     */
    public function detailListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');
        $prof_idx = $this->_req('prof_idx');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.SubjectIdx' => $this->_reqP('search_subject'),
                'LB.TypeCcd' => $this->_reqP('search_type_group_ccd'),
                'LB.ReplyStatusCcd' => $this->_reqP('search_reply_type'),
                'LB.isPublic' => $this->_reqP('search_is_public'),
                'LB.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                    'LB.ReplyContent' => $this->_reqP('search_replay_value'),
                    'MEM.MemId' => $this->_reqP('search_member_value'),
                    'MEM.MemName' => $this->_reqP('search_member_value'),
                    'MEM.Phone3' => $this->_reqP('search_member_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_chk_reply_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.ReplyStatusCcd' => '621001']);
        }

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

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

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName, MEM.MemId AS RegMemId,
            LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.SubjectIdx, PS.SubjectName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName,
            LB.MdCateCode, MdSysCate.CateName as MdCateName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 공지사항 등록/수정 폼
     * @param array $params
     */
    public function createDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        $method = 'POST';
        $data = null;
        $board_idx = null;

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }
        $arr_prof_info['arr_prof_cate_code'] = explode(',', $arr_prof_info['CateCode']);
        $arr_prof_info['arr_prof_cate_name'] = explode(',', $arr_prof_info['CateName']);

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsPublic, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
            LB.SubjectIdx, PS.SubjectName
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

        //과목
        $arr_subject = $this->professorModel->getProfessorSubjectArray($prof_idx);

        $this->load->view("board/professor/{$this->board_name}/create_detail", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'arr_prof_info' => $arr_prof_info,
            'arr_subject' => $arr_subject,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'subject_idx', 'label' => '과목', 'rules' => 'trim|required|integer'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false), $prof_idx);

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 답변 등록
     */
    public function storeReply()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $rules = [
            ['field' => 'reply_contents', 'label' => '답변 내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === true) {
            return $this->json_error('식별자가 없습니다.', _HTTP_NOT_FOUND);
        } else {
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setReplyInputData($this->_reqP(null, false));

        $result = $this->boardModel->replyAddBoard($inputData, $idx, $this->bm_idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 공지사항 뷰 페이지
     */
    public function readDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName
            ';

        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, '', $prof_idx);
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $this->load->view("board/professor/{$this->board_name}/read_detail",[
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 답변 등록 페이지
     * @param array $params
     */
    public function createQnaReply($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.VocCcd, LB.ReplyStatusCcd, LB.ReplyContent,
            LB.SubjectIdx, PS.SubjectName,
            LB.MdCateCode, MdSysCate.CateName as MdCateName
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.RegType' => $this->_reg_type['user']
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['user'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_reply_attach_file_idx'] = explode(',', $data['reply_AttachFileIdx']);
        $data['arr_reply_attach_file_path'] = explode(',', $data['reply_AttachFilePath']);
        $data['arr_reply_attach_file_name'] = explode(',', $data['reply_AttachFileName']);
        $data['arr_reply_attach_file_real_name'] = explode(',', $data['reply_AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $arr_reply_code = $this->_getCcdArray($this->_groupCcd['reply']);
        unset($arr_reply_code[$this->_Ccd['reply']['unAnswered']]);     //미답변코드 제거
        $data['arr_reply_code'] = $arr_reply_code;

        $arr_voc_code = $this->_getCcdArray($this->_groupCcd['voc']);
        $data['arr_voc_code'] = $arr_voc_code;

        $this->load->view("board/professor/{$this->board_name}/create_qna_reply", [
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 답변 view 페이지
     * @param array $params
     */
    public function readQnaReply($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.ReplyStatusCcd, LB.ReplyContent,
            qnaAdmin.wAdminName AS qnaAdminName, qnaAdmin2.wAdminName AS qnaUpdAdminName,
            LB.ReplyRegDatm, LB.ReplyUpdDatm,
            LB.SubjectIdx, PS.SubjectName,
            LB.MdCateCode, MdSysCate.CateName as MdCateName
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.RegType' => $this->_reg_type['user'],
                'LB.ProfIdx' => $prof_idx,
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['user'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['reply_AttachFilePath'], $data['reply_AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, '', $prof_idx);
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        //메모
        $memo_data = $this->boardModel->getMemoListAll($board_idx);

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_reply_attach_file_idx'] = explode(',', $data['reply_AttachFileIdx']);
        $data['arr_reply_attach_file_path'] = explode(',', $data['reply_AttachFilePath']);
        $data['arr_reply_attach_file_name'] = explode(',', $data['reply_AttachFileName']);
        $data['arr_reply_attach_file_real_name'] = explode(',', $data['reply_AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $arr_reply_code = $this->_getCcdArray($this->_groupCcd['reply']);
        $data['reply_status'] = (empty($arr_reply_code[$data['ReplyStatusCcd']])) ? '' : $arr_reply_code[$data['ReplyStatusCcd']];

        $this->load->view("board/professor/{$this->board_name}/read_qna_reply", [
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
            'memo_data' => $memo_data
        ]);
    }

    /**
     * 게시판 삭제
     * @param array $params
     */
    public function deleteDetail($params = [])
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

    private function _setInputData($input, $prof_idx){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'RegType' => element('reg_type', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'ProfIdx' => $prof_idx,
                'SubjectIdx' => element('subject_idx', $input),
                'Title' => element('title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => (empty(element('is_public', $input)) === true) ? 'Y' : element('is_public', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input)) === true) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }

    private function _setReplyInputData($input)
    {
        $input_data = [
            'ReplyContent' => element('reply_contents', $input),
            'ReplyStatusCcd' => $this->_Ccd['reply']['finish']
        ];

        return $input_data;
    }
}