<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Firewall extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 공통코드관리 인덱스 (리스트페이지)
     */
    public function index()
    {
        $result = [];
        exec('sudo firewall-cmd --list-all | grep \'80|443\'', $result);

        dd($result);
    }

    public function add()
    {

    }

    public function delete()
    {
        
    }

}
