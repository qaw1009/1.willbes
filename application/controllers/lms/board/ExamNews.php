<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class ExamNews extends BaseBoard
{
    private $boardName = 'examNews';
    private $bmIdx;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 시험공고 게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        $data = [];

        $this->load->view("board/{$this->boardName}/index", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx,
            'data' => $data
        ]);
    }

    /**
     * 시험공고 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        $getSiteArray = $this->_getSiteArray();

        $this->load->view("board/{$this->boardName}/create", [
            'boardName' => $this->boardName,
            'bmIdx' => $this->bmIdx,
            'getSiteArray' => $getSiteArray,
            'method' => $method,
            'data' => $data,
            'bn_idx' => $bnidx,
            //'attach_img_cnt' => $this->professorModel->_attach_img_cnt
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 시험공고 뷰 페이지
     * @param array $params
     */
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