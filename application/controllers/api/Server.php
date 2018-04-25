<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends \app\controllers\RestController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $rules = [
            ['field' => 'id', 'label' => '아이디', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $data = [
            'name' => '홍길동'
        ];

        $this->response($data, _HTTP_OK);
    }

    public function index_post()
    {
        $rules = [
            ['field' => 'id', 'label' => '아이디', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $data = [
            'name' => '홍길동POST'
        ];

        $this->response($data, _HTTP_OK);
    }
}