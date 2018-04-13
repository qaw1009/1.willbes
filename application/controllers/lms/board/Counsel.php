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
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_Ccd = [
        'reply' => '621001',    //미답변 코드
        'voc' => '620003'       //강성클레임 코드
    ];
    private $_groupCcd = [
        'reply' => '621',       //답변상태
        'counsel_type' => '622' //상담유형
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
        //상담유형
        $arr_counsel_type = $this->_getCcdArray($this->_groupCcd['counsel_type']);
        //답변상태
        $arr_reply = $this->_getCcdArray($this->_groupCcd['reply']);

        //미답변현황
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->bm_idx,
                'RegType' => $this->_reg_type['user'],
                'ReplyStatusCcd' => $this->_Ccd['reply']
            ]
        ];
        $arr_unAnswered = $this->_getUnAnserArray($arr_condition);
        $this->load->view("board/{$this->board_name}/index", [
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'boardName' => $this->board_name,
            'arr_unAnswered' => $arr_unAnswered,
            'arr_counsel_type' => $arr_counsel_type,
            'arr_reply' => $arr_reply,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}"
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
        $this->site_code = $board_params['site_code'];
        $is_notice_type = ($this->_reqP('search_chk_notice_display') == 1) ? '1' : '0';

        //상담글 조건
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                /*'LB.IsStatus' => ($this->_reqP('search_chk_delete_value') == 1) ? 'N' : 'Y',*/
                'LB.RegType' => $this->_reg_type['user'],
                'LB.SiteCode' => $this->site_code,
                'LB.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'LB.TypeCcd' => $this->_reqP('search_counsel_type'),
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

        if ($this->_req('search_chk_delete_value') == '1') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsStatus' => 'N']);
        }

        if ($this->_req('search_chk_vod_value') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.VocCcd' => $this->_Ccd['voc']]);
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
     * 상담게시판 공지 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];

        $method = 'POST';
        $data = null;
        $board_idx = null;

        //권한유형별 운영사이트 목록 조회
        $get_site_array = $this->_getSiteArray();
        $first_site_key = key($get_site_array);
        $site_code = $first_site_key;

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsPublic, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
            ';
            $method = 'PUT';
            $board_idx = $params[0];
            $data = $this->boardModel->findBoardForModify($board_idx, $column);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
            $site_code = $data['SiteCode'];
            $data['arr_cate_code'] = explode(',', $data['CateCode']);
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        }

        //사이트카테고리 (구분)
        if (empty($params[0]) === true) {
            if (empty($this->site_code) === false) {
                $site_code = $this->site_code;
            }
        }
        $get_category_array = $this->_getCategoryArray($site_code);

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'site_code' => $site_code,
            'getSiteArray' => $get_site_array,
            'getCategoryArray' => $get_category_array,
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

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'site_category[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
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
     * 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxCampusInfo($params = [])
    {
        $result_site_array = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($result_site_array as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        $result['campus'] = $this->_getCampusArray($params[0]);
        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];
        $this->json_result(true, '', [], $result);
    }

    /**
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxSiteCategoryInfo($params = [])
    {
        $result = $this->_getSiteCategoryInfo($params);
        /*$resultSiteArray = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($resultSiteArray as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        //사이트카테고리
        $result['category'] = $this->_getCategoryArray($params[0]);
        //캠퍼스
        $result['campus'] = $this->_getCampusArray($params[0]);

        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];*/
        $this->json_result(true, '', [], $result);
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

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => (element('is_public', $input) == 'Y') ? 'Y' : 'N',
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('site_category', $input)
            ]
        ];

        return$input_data;
    }
}