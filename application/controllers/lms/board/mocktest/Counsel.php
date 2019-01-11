<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Counsel extends BaseBoard
{
    protected $temp_models = array();
    protected $helpers = array('download','file');

    private $board_name = 'counsel';
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

        redirect(site_url("/board/mocktest/main?bm_idx={$this->bm_idx}"));
    }
}