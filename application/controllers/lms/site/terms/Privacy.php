<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 개인정보처리방침 인덱스
     */
    public function index()
    {
        $this->load->view('site/terms/privacy/index',[
        ]);
    }

    public function listAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 개인정보처리방침 등록
     */
    public function create()
    {
        $method = 'POST';
        $data = null;
        $l_idx = null;

        $this->load->view("site/terms/privacy/create", [
            'method' => $method,
            'data' => $data,
            'l_idx' => $l_idx
        ]);
    }
}