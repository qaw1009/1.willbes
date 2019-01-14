<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/mocktest/Main.php';

class Notice extends Main
{
    protected $temp_models = array();
    protected $helpers = array('download','file');

    public $board_name = 'mocktest/notice';
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

        redirect(site_url("/board/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }
}