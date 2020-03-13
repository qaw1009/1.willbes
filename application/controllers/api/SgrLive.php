<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SgrLive extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
//    protected $auth_controller = false;
//    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('restClient');
//        $this->restclient->ssl(false);
    }

    public function index()
    {
        var_dump('unit test controller method');
    }

    public function get()
    {
        $data = $this->restclient->get('sample/server/index', ['id' => 'foo'], 'json');
        $this->restclient->debug();
        var_dump($data);
    }

    public function post()
    {
        //$data = $this->restclient->post('sample/server/index', ['id' => 'foo'], 'json');
        $data = $this->restclient->post('https://api.sgrsoft.com/v1/post/list?type=live&client_id=6200947261b84a6ebbf340d88f4840f6', [], 'json');


        $this->restclient->debug();
        var_dump($data);
    }
}
