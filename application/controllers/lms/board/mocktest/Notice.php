<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/mocktest/Main.php';

class Notice extends Main
{
    protected $temp_models = array();
    protected $helpers = array('download','file');

    public $boardName = 'mocktest/notice';
    private $bm_idx;

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 메인 리스트 페이지 리턴
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/{$this->boardName}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 메인페이지
     */
    public function mainList()
    {
        return $this->_mainList();
    }

    /**
     * 메인페이지 ajax
     * @return CI_Output
     */
    public function mainListAjax()
    {
        return $this->_mainListAjax();
    }

    /**
     * 모의고사별 공지사항 목록
     */
    public function detailList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');

        //모의고사 상품 조회
        $prod_data = $this->_prodData($prod_code);

        //공통코드
        $cateD1 = $this->categoryModel->getCategoryArray($prod_data['SiteCode'], '', '', 1);

        $this->load->view("board/{$this->boardName}/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->boardName,
            'prod_code' => $prod_code,
            'prod_data' => $prod_data,
            'cateD1' => $cateD1,
            'arr_ccd_reply' => $this->_Ccd['reply'],
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prod_code={$prod_data['ProdCode']}&site_code={$prod_data['SiteCode']}",
        ]);
    }
}