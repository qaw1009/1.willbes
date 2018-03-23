<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Notice extends BaseBoard
{
    private $boardName = 'notice';
    private $bmIdx;
    private $subMenu;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 공지게시판 인덱스 (리스트페이지)
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

        $this->load->view("board/{$this->boardName}/index", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'campusInfos' => $campusInfos,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx.'&sub_menu='.$this->subMenu,
            'data' => $data
        ]);
    }

    /**
     * 공지게시판 등록/수정 폼
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
}