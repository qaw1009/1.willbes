<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Counsel extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array('download','file');

    private $board_name = 'counsel';
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
        ],
        'voc' => '620003'       //강성클레임 코드
    ];
    private $_groupCcd = [
        'voc' => '620',
        'reply' => '621',       //답변상태
        'type_group_ccd' => '622' //유형 그룹 코드 = 상담유형
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 상담게시판 인덱스 (리스트페이지)
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
        /*print_r($arr_category);*/

        //사이트카테고리 중분류 조회
        $arr_m_category = $this->categoryModel->getCategoryArray('','','','2');

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

        //상담유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);
        //답변상태
        $arr_reply = $this->_getCcdArray($this->_groupCcd['reply']);

        //미답변현황
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->bm_idx,
                'IsStatus' => 'Y',
                'ReplyStatusCcd' => $this->_Ccd['reply']['unAnswered']
            ]
        ];
        $arr_unAnswered = $this->_getUnAnswerArray($arr_condition);
        $this->load->view("board/{$this->board_name}/index", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'arr_m_category' => $arr_m_category,
            'boardName' => $this->board_name,
            'arr_unAnswered' => $arr_unAnswered,
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'arr_reply' => $arr_reply,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}"
        ]);
    }

    /**
     * 상담게시판 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');

        //상담글 조건
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.CampusCcd' => $this->_reqP('search_campus_ccd'),
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

        if ($this->_req('search_chk_delete_value') == '1') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0', 'LB.IsStatus' => 'N']);
        } else {
            $arr_condition['ORG2']['RAW'] = ['LB.IsBest = ' => '0 OR (LB.IsBest = 1 AND LB.IsStatus = \'Y\')'];
        }

        if ($this->_req('search_chk_vod_value') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.VocCcd' => $this->_Ccd['voc']]);
        }

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        //등록일
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
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.MdCateCode, LB.CampusCcd, LSC.CcdName AS CampusName,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName, MEM.MemId AS RegMemId,
            LB.IsPublic, LB.VocCcd, LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName,
            MdSysCate.CateName as MdCateName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        /*if ($notice_count > 0) {
            $count = $count + $notice_count;
            $list = array_merge($notice_list, $list);
        }*/

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 상담게시판 공지 등록/수정 폼
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

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsPublic, LB.IsUse,
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
            'arr_campus' => $arr_campus,
            'campus_all_ccd' => $this->codeModel->campusAllCcd,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 상담게시판 글 등록
     */
    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $idx = '';

        //캠퍼스 Y 값 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|integer|callback_validateRequiredIf[site_code,' . implode(',', array_keys($offLineSite_list)) . ']'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        //사이트코드 통합코드가 아닐경우 카테고리 체크
        if ($this->_reqP('site_code') != config_item('app_intg_site_code')) {
            $rules = array_merge($rules, [
                ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required']
            ]);
        }

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
     * 상담게시판 Read 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';
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
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, $this->_Ccd['voc']);
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
     * 상담게시판 답변 등록/수정 폼
     * @param array $params
     */
    public function createCounselReply($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.VocCcd, LB.ReplyStatusCcd, LB.ReplyContent,
            MdSysCate.CateName as MdCateName
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

        if (empty($data['ReplyContent'])) {
            $reply_content = '안녕하세요. 윌비스입니다.<br>';
            $reply_content .= '문의해주신 내용 답변 드립니다.<br><br><br>';
            $reply_content .= '"당장 내 뜻대로 되지 않는다고 해서 쉽게 포기하지 마세요.<br>';
            $reply_content .= '"같은 환경, 같은 기회가 주어져도 성공의 계단은 어떤 상황에도 낙심하지 않는 사람,위기를 기회로 삼는 사람,<Br>';
            $reply_content .= '"신념과 인내를 갖고 준비하는 사람에게 찾아올 것입니다."<br><br>';
            $reply_content .= '"그럼 오늘도 파이팅 하세요^^';
        } else {
            $reply_content = $data['ReplyContent'];
        }
        $data['reply_content'] = $reply_content;
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

        $this->load->view("board/{$this->board_name}/create_counsel_reply", [
            'boardName' => $this->board_name,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 상담게시판 답변 등록
     */
    public function storeReply()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $rules = [
            ['field' => 'reply_status_ccd', 'label' => '답변상태', 'rules' => 'trim|required'],
            ['field' => 'voc_ccd', 'label' => 'VOC 강도', 'rules' => 'trim|required'],
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
     * 상담게시판 답변 view 페이지
     * @param array $params
     */
    public function readCounselReply($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.VocCcd, LB.ReplyStatusCcd, LB.ReplyContent,
            counselAdmin.wAdminName AS counselAdminName, counselAdmin2.wAdminName AS counselUpdAdminName,
            LB.ReplyRegDatm, LB.ReplyUpdDatm,
            MdSysCate.CateName as MdCateName
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
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['reply_AttachFilePath'], $data['reply_AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas);
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

        $arr_voc_code = $this->_getCcdArray($this->_groupCcd['voc']);
        $data['voc_value'] = (empty($arr_voc_code[$data['VocCcd']])) ? '' : $arr_voc_code[$data['VocCcd']];

        $this->load->view("board/{$this->board_name}/read_counsel_reply", [
            'boardName' => $this->board_name,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'voc_ccd_level3' => $this->_Ccd['voc'],
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
            'memo_data' => $memo_data
        ]);
    }

    /**
     * 메모 저장
     * @return CI_Output|void
     */
    public function storeMemo()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required'],
            ['field' => 'memo_contents', 'label' => '메모', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === true) {
            return $this->json_error('식별자가 없습니다.', _HTTP_NOT_FOUND);
        } else {
            $idx = $this->_reqP('idx');
        }

        $result = $this->boardModel->memoAddBoard($this->_reqP(null, false), $idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
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
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Title' => element('title', $input),
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

    private function _setReplyInputData($input)
    {
        $input_data = [
            'ReplyStatusCcd' => element('reply_status_ccd', $input),
            'VocCcd' => (empty(element('voc_ccd', $input))) ? $this->_Ccd['reply']['unAnswered'] : element('voc_ccd', $input),     //값을 없을 경우 미답변코드로 셋팅
            'ReplyContent' => element('reply_contents', $input)
        ];

        return $input_data;
    }
}