<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class LiveLectureMaterial extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'sys/Site', 'board/board');
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

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

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
}