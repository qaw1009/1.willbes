<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Faq extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $board_name = 'faq';
    private $site_code = '';
    private $bm_idx;
    private $_groupCcd = [
        'faq_group_type_ccd' => ['623','624','625','626','627','628','629'],
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * FAQ 게시판 인덱스 (리스트페이지)
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

        $faq_group_ccd = $this->_getCcdInArray($this->_groupCcd['faq_group_type_ccd']);
        //print_r($faq_group_ccd);

        $this->load->view("board/{$this->board_name}/index", [
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'boardName' => $this->board_name,
            'faq_group_ccd' => $faq_group_ccd,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}",
        ]);
    }

    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];
        $is_best_type = ($this->_reqP('search_chk_hot_display') == 1) ? '1' : '0';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'N',
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
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
        ';

        $best_count = 0;
        $best_list = [];
        if ($is_best_type == 0) {
            $best_data = $this->_bestBoardData($column);
            $best_count = $best_data['count'];
            $best_list = $best_data['data'];
        }

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'desc'], $column);
        }

        if ($best_count > 0) {
            $count = $count + $best_count;
            $list = array_merge($best_list, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * FAQ 게시판 등록/수정 폼
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

    public function read($params = [])
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
     * FAQ 정렬 변경
     */
    public function createOrderByModal()
    {
        //faq 구분
        $faqGroupTypeCcd = [
            '1' => '회원관리',
            '2' => '결제관리',
            '3' => '강의관련',
            '4' => '환불관련',
            '5' => '교재관련',
            '6' => '모바일관련',
            '7' => '기타',
        ];

        $method = 'POST';
        $data = null;

        $this->load->view("board/{$this->boardName}/create_orderby_modal",[
            'boardName' => $this->boardName,
            'method' => $method,
            'campusOnOff' => $this->campusOnOff,
            'faqGroupTypeCcd' => $faqGroupTypeCcd,
            'data' => $data
        ]);
    }

    /**
     * 게시판 BEST 정보 조회
     * @param $column
     * @return array
     */
    private function _bestBoardData($column)
    {
        $arr_best_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'Y',
                'LB.SiteCode' => $this->site_code,
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $best_list = $this->boardModel->listAllBoard($this->board_name,false, $arr_best_condition, $sub_query_condition, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        $datas = [
            'count' => count($best_list),
            'data' => $best_list
        ];

        return $datas;
    }
}