<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agreement extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {
        $this->load->view('site/terms/agreement/index',[
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
     * 약관동의 등록
     */
    public function create()
    {
        $method = 'POST';
        $data = null;
        $l_idx = null;

        $this->load->view("site/terms/agreement/create", [
            'method' => $method,
            'data' => $data,
            'l_idx' => $l_idx
        ]);
    }
}