<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class ProfessorMaterial extends BaseBoard
{
    private $boardName = 'professorMaterial';
    private $bmIdx = 39;
    private $subMenu;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect(site_url("/board/{$this->boardName}/mainList?bm_idx={$this->bmIdx}"));
    }

    /**
     * 강사게시판 - 메인 학습자료실
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
     * 강사게시판 - 강사별 학습자료실
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
     * 강사게시판 - 강사별 학습자료실 등록/수정 폼
     * @param array $params
     */
    public function createDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        $getSiteArray = $this->_getSiteArray();

        $this->load->view("board/{$this->boardName}/create_Detail", [
            'boardName' => $this->boardName,
            'bmIdx' => $this->bmIdx,
            'getSiteArray' => $getSiteArray,
            'campusOnOff' => $this->campusOnOff,
            'method' => $method,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx,
            'data' => $data,
            'bn_idx' => $bnidx,
            //'attach_img_cnt' => $this->professorModel->_attach_img_cnt
            'attach_img_cnt' => 2
        ]);
    }

    /**
     * 단강좌정보
     */
    public function lecListModal()
    {
        $method = 'POST';
        $data = null;

        $this->load->view("board/{$this->boardName}/lecList_modal",[
            'boardName' => $this->boardName,
            'method' => $method,
            'data' => $data
        ]);
    }

    /**
     * 단강좌정보
     */
    public function lecListAjax()
    {

    }
}