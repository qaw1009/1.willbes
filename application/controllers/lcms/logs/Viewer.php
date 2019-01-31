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
        $sort_idx = get_var($this->_reqG('sort_idx'), 0);
        $sort_dir = get_var($this->_reqG('sort_dir'), 'asc');

        $log_data = $this->logviewer->getLogData($log_date, $log_level, $log_pattern, $log_type);

        $this->load->view('lcms/logs/viewer', [
            'log_type' => $log_type,
            'log_pattern' => $log_pattern,
            'log_level' => $log_level,
            'log_date' => $log_date,
            'log_data' => $log_data,
            'sort_idx' => $sort_idx,
            'sort_dir' => $sort_dir,
            'css_classes' => $this->_css_classes
        ], false);
    }

    /**
     * 로그파일 다운로드
     */
    public function download()
    {
        $log_type = get_var($this->_reqP('log_type'), 'willbes');
        $log_pattern = get_var($this->_reqP('log_pattern'), 'log');
        $log_date = get_var($this->_reqP('log_date'), date('Y-m-d'));

        $log_path = $this->logviewer->getLogPath($log_date, $log_pattern, $log_type);

        if (file_exists($log_path)) {
            $this->load->helper('download');
            force_download($log_path, null);
        } else {
            show_alert('로그파일이 없습니다.', 'back');
        }
    }
}
