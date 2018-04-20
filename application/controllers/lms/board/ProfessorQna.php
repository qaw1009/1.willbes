<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class ProfessorQna extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board', 'product/base/professor', 'product/base/subject');
    protected $helpers = array();

    private $board_name = 'professorQna';
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
        'type_group_ccd' => '622' //유형 그룹 코드 = 질문유형
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
        $this->site_code = $board_params['site_code'];

        redirect(site_url("/board/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 강사게시판 - 메인 학습Q&A
     */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];

        $this->load->view("board/{$this->board_name}/mainList", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}",
        ]);
    }

    public function mainListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];

        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $this->_reqP('search_site_code'),
            ],
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->_reqP('search_value'),
                    //'P.wProfId' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->professorModel->listProfessorSubjectMappingForBoard(true, $arr_condition, $this->bm_idx, $this->_Ccd['reply']['unAnswered']);

        if ($count > 0) {
            $list = $this->professorModel->listProfessorSubjectMappingForBoard(false, $arr_condition, $this->bm_idx, $this->_Ccd['reply']['unAnswered']);
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
        $this->site_code = $board_params['site_code'];
        $prof_idx = $this->_req('prof_idx');

        $arr_category = [];
        if (!empty($this->site_code)) {
            //사이트카테고리
            $arr_category = $this->_getCategoryArray($this->site_code);
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->professorModel->findProfessor('ProfNickName', ['EQ' => ['ProfIdx' => $prof_idx]]);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        //상담유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        //답변상태
        $arr_reply = $this->_getCcdArray($this->_groupCcd['reply']);

        //과목
        $arr_subject = $this->professorModel->getProfessorSubjectArray($prof_idx);

        $this->load->view("board/{$this->board_name}/detailList", [
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'arr_reply' => $arr_reply,
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}&prof_idx={$prof_idx}",
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
        $this->site_code = $board_params['site_code'];
        $prof_idx = $this->_req('prof_idx');
        $is_notice_type = ($this->_reqP('search_chk_notice_display') == 1) ? '1' : '0';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.RegType' => $this->_reg_type['user'],
                'LB.SiteCode' => $this->site_code,
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
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LBC.CateCode,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName, MEM.Hp1, MEM.Hp2, MEM.Hp3,
            LB.IsPublic, LB.VocCcd, LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName
        ';

        //공지사항
        $notice_count = 0;
        $notice_list = [];
        if ($is_notice_type == 0) {
            $notice_data = $this->_noticeBoardData($column);
            $notice_count = $notice_data['count'];
            $notice_list = $notice_data['data'];
        }

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'desc'], $column);
        }

        if ($notice_count > 0) {
            $count = $count + $notice_count;
            $list = array_merge($notice_list, $list);
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
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        $getSiteArray = $this->_getSiteArray();

        $this->load->view("board/{$this->boardName}/create_Detail", [
            'boardName' => $this->boardName,
            'bmIdx' => $this->bmIdx,
            'getSiteArray' => $getSiteArray,
            'campusOnOff' => $this->campusOnOff,
            'method' => $method,
            'data' => $data,
            'bn_idx' => $bnidx,
            //'attach_img_cnt' => $this->professorModel->_attach_img_cnt
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 공지사항 뷰 페이지
     */
    public function readDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }

        $data = null;
        $this->load->view("board/{$this->boardName}/read_detail",[
            'boardName' => $this->boardName,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 답변 view 페이지
     */
    public function readQnaReply()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        $boardIdx = 1;
        $method = 'POST';
        $data = null;

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }

        $this->load->view("board/{$this->boardName}/read_qna_reply", [
            'boardName' => $this->boardName,
            'boardIdx' => $boardIdx,
            'method' => $method,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data,
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 강사게시판 - 강사별 학습Q&A 답변 등록 페이지
     */
    public function createQnaReply()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        $boardIdx = 1;
        $method = 'POST';
        $data = null;

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }

        $this->load->view("board/{$this->boardName}/create_qna_reply", [
            'boardName' => $this->boardName,
            'boardIdx' => $boardIdx,
            'method' => $method,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data,
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 상담게시판 공지사항 정보 조회
     * @param $column
     * @return array
     */
    private function _noticeBoardData($column)
    {
        $arr_best_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => $this->_reg_type['admin'],
                'LB.SiteCode' => $this->site_code,
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $notice_list = $this->boardModel->listAllBoard($this->board_name,false, $arr_best_condition, $sub_query_condition, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        $datas = [
            'count' => count($notice_list),
            'data' => $notice_list
        ];

        return $datas;
    }
}