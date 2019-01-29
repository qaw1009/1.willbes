<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewer extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
    private $_css_classes = array('ERROR' => 'danger', 'DEBUG' => 'warning', 'INFO'  => 'info');

    public function __construct()
    {
        parent::__construct();

        $this->load->library('logViewer');
    }

    /**
     * 로그뷰어 인덱스
     */
    public function index()
    {
        $log_type = get_var($this->_reqG('log_type'), 'willbes');
        $log_pattern = get_var($this->_reqG('log_pattern'), 'log');
        $log_level = get_var($this->_reqG('log_level'), 'ERROR');
        $log_date = get_var($this->_reqG('log_date'), date('Y-m-d'));

        $log_data = $this->logviewer->getLogData($log_date, $log_level, $log_pattern, $log_type);

        dd($log_data);

        $this->load->view('logs/viewer', [
            'log_type' => $log_type,
            'log_pattern' => $log_pattern,
            'log_level' => $log_level,
            'log_date' => $log_date,
            'log_data' => $log_data,
            'css_classes' => $this->_css_classes
        ], false);
    }
}
