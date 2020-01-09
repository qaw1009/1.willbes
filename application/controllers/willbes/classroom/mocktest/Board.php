<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportMockTest.php';

class Board extends SupportMockTest
{
    protected $models = array('mocktestNew/mockInfoF', 'categoryF', '_lms/sys/code', 'support/supportBoardTwoWayF', 'support/supportBoardF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx_qna = '95';        //이의제기
    protected $_bm_idx_notice = '96';     //정오표
    protected $_default_path = 'classroom/mocktest/board';
    protected $_include_path = 'classroom.mocktestNew';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 이의제기/정오표 : 모의고사 리스트
     */
    public function index()
    {
        $this->_board();
    }

    /**
     * 모의고사 이의제기 목록
     */
    public function listQna()
    {
        $this->_listQna();
    }

    /**
     * 모의고사 이의제기 등록 폼
     */
    public function createQna()
    {
        $this->_createQna();
    }

    /**
     * 모의고사 이의제기 등록
     */
    public function boardQnaStore()
    {
        $this->_boardQnaStore();
    }

    public function showQna()
    {
        $this->_showQna();
    }

    /**
     * 모의고사 이의제기 게시물 삭제
     */
    public function deleteQna()
    {
        $this->_deleteQna();
    }

    /**
     * 모의고사 정오표 목록
     */
    public function listNotice()
    {
        $this->_listNotice();
    }

    public function showNotice()
    {
        $this->_showNotice();
    }
}