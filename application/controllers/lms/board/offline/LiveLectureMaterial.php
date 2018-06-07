<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class LiveLectureMaterial extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'sys/Site', 'board/board', 'product/base/subject', 'product/base/course', 'product/base/professor');
    protected $helpers = array();

    private $board_name = 'LiveLectureMaterial';
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

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 공지게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->boardModel->getOffLineSiteArray();

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        //과목조회


        //과정조회

        //교수조회

        $this->load->view("board/offline/{$this->board_name}/index", [
            'bm_idx' => $this->bm_idx,
            'offLineSite_list' => $offLineSite_list,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}"
        ]);
    }

    /**
     * 공지사항 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');
        $is_best_type = ($this->_reqP('search_chk_hot_display') == 1) ? '1' : '0';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'N',
                'LB.SiteCode' => $this->site_code,
                'LB.CampusCcd' => $this->_reqP('search_campus_ccd'),

                'LB.SubjectIdx' => $this->_reqP('search_subject'),
                'LB.CourseIdx' => $this->_reqP('search_course'),
                'LB.ProfIdx' => $this->_reqP('search_prof'),

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
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title,LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LB.SubjectIdx, PS.SubjectName, LB.CourseIdx, PRODUCT_COURSE.CourseName, LB.ProfIdx, PROFESSOR.ProfNickName
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