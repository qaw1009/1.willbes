<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProgram extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $program_ccd = $this->supportBoardFModel->listProgramCcd();

        $this->load->view('support/program', [
            'program_ccd' => $program_ccd,
        ]);
    }
}