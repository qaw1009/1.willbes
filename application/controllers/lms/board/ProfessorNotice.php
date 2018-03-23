<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class ProfessorNotice extends BaseBoard
{
    private $boardName = 'professorNotice';
    private $bmIdx;
    private $subMenu;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect(site_url('/board/professorNotice/mainList?bm_idx=33'));
    }

    /**
     * 강사게시판 - 메인 공지사항
    */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        $data = [];

        $this->load->view("board/{$this->boardName}/mainList", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx,
            'data' => $data
        ]);
    }

    /**
     * 강사게시판 - 강사별 공지사항
     * @param array $params
     */
    public function detailList($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        $data = [];

        $this->load->view("board/{$this->boardName}/detailList", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx,
            'data' => $data
        ]);
    }

    /**
     * 강사게시판 - 강사별 공지사항 등록/수정 폼
     * @param array $params
     */
    public function create_detail($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        $getSiteArray = $this->_getSiteArray();

        $this->load->view("board/{$this->boardName}/create_detail", [
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
     * 강사게시판 - 강사별 공지사항 뷰 페이지
     */
    public function read_detail($params = [])
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
}