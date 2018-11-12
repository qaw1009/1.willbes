<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Tpass extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array('download','file');

    private $board_name = 'tpass';
    private $site_code = '';
    private $bm_idx;

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/professor/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 강사게시판 - T-pass 자료실
     */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        echo $this->bm_idx;

        /*$this->load->view("board/professor/{$this->board_name}/mainList", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
        ]);*/
    }
}