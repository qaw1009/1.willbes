<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Counsel extends BaseBoard
{
    private $boardName = 'counsel';
    private $bmIdx;
    private $subMenu;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상담게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
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
}