<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Main extends BaseBoard
{
    private $bm_idx;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $this->load->view("board/mocktest/main/index", [
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
        ]);
    }
}