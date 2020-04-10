<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sample extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/cert', 'site/certApply');
    protected $helpers = array('download','file');
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값1

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_site_codes(true);
        $def_site_code = '';//key($arr_site_code);
        $this->load->view('stats/sample_index',[
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
        ]);
    }
}