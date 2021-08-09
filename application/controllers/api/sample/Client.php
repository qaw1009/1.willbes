<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * REST API Client Sample
 */
class Client extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('restClient');
    }

    public function get()
    {
        //$this->restclient->http_auth('digest');   // 개별 인증방식 설정
        $data = $this->restclient->get('/sample/server/index', ['id' => 'foo']);
        var_dump($data);
        $this->restclient->debug();
    }

    public function post()
    {
        $data = $this->restclient->post('/sample/server/index', ['id' => 'foo']);
        var_dump($data);
        $this->restclient->debug();
    }
}