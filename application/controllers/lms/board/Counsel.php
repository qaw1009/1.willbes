<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Counsel extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $board_name = 'counsel';
    private $site_code = '';
    private $bm_idx;

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
        $this->site_code = $board_params['site_code'];

        //캠퍼스목록조회
        $arr_campus = [];
        $arr_category = [];
        if (!empty($this->site_code)) {
            //캠퍼스
            $arr_campus = $this->_getCampusArray($this->site_code);
            //사이트카테고리
            $arr_category = $this->_getCategoryArray($this->site_code);
        }

        $this->load->view("board/{$this->board_name}/index", [
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}",
        ]);

        /*$this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];
        $data = [];

        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }
        $campusInfos = $this->_getCampusArray();

        //미답변현황
        $unanswered_cop = '1';
        $unanswered_gosi = '3';
        $unanswered_teacher = '2';
        $unanswered_total = $unanswered_cop + $unanswered_gosi + $unanswered_teacher;

        $unanswered = [
            '1' => '('.$unanswered_cop.')',
            '2' => '('.$unanswered_gosi.')',
            '3' => '('.$unanswered_teacher.')',
            'total' => '('.$unanswered_total.')'
        ];

        $this->load->view("board/{$this->boardName}/index", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'campusInfos' => $campusInfos,
            'unanswered' => $unanswered,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx.'&sub_menu='.$this->subMenu,
            'data' => $data
        ]);*/
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
        $this->site_code = $board_params['site_code'];
        $is_notice_type = ($this->_reqP('search_chk_notice_display') == 1) ? '1' : '0';

        //상담글 조건
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => ($this->_reqP('search_chk_delete_value') == 1) ? 'N' : 'Y',
                'LB.RegType' => '0',
                'LB.SiteCode' => $this->site_code,
                'LB.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'LB.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        //강성 클레임 (makeQuery에 존재하지 않는 key, 반드시 직접 query 생성)
        if ($this->_reqP('search_chk_vod_value') == 1) {
            $arr_condition = array_merge($arr_condition, ['NotEmpty' => 'LB.VodCcd']);
        } else {
            $arr_condition = array_merge($arr_condition, ['Empty' => 'LB.VodCcd']);
        }

        //등록일
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
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName, MEM.Hp1, MEM.Hp2, MEM.Hp3,
            LB.IsPublic, LB.VocCcd, LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName
        ';

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
     * 상담게시판 공지 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        $getSiteArray = $this->_getSiteArray();

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }
        $campusInfos = $this->_getCampusArray();

        $this->load->view("board/{$this->boardName}/create", [
            'boardName' => $this->boardName,
            'bmIdx' => $this->bmIdx,
            'subMenu' => $this->subMenu,
            'getSiteArray' => $getSiteArray,
            'campusOnOff' => $this->campusOnOff,
            'campusInfos' => $campusInfos,
            'method' => $method,
            'data' => $data,
            'bn_idx' => $bnidx,
            //'attach_img_cnt' => $this->professorModel->_attach_img_cnt
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 상담게시판 공지 view페이지
     */
    public function read()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }

        $data = null;
        $this->load->view("board/{$this->boardName}/read",[
            'boardName' => $this->boardName,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data
        ]);
    }

    /**
     * 상담게시판 답변 등록/수정 폼
     */
    public function createCounselReply()
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

        $this->load->view("board/{$this->boardName}/create_counsel_reply", [
            'boardName' => $this->boardName,
            'boardIdx' => $boardIdx,
            'method' => $method,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data,
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 상담게시판 답변 view 페이지
     */
    public function readCounselReply()
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

        $this->load->view("board/{$this->boardName}/read_counsel_reply", [
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
                'LB.RegType' => '1',
                'LB.SiteCode' => $this->site_code,
            ]
        ];

        $notice_list = $this->boardModel->listAllBoard($this->board_name,false, $arr_best_condition, null, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        $datas = [
            'count' => count($notice_list),
            'data' => $notice_list
        ];

        return $datas;
    }
}