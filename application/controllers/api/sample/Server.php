<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * REST API Server Sample
 */
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

        $this->api_success(null, $data);
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

        $this->api_success(null, $data);
    }
}