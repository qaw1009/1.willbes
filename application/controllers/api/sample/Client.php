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
        $data = $this->restclient->get('sample/server/index', ['id' => 'foo'], 'json');
        $this->restclient->debug();
        var_dump($data, $data->data->name, get_object_vars($data->data));
    }

    public function post()
    {
        $data = $this->restclient->post('sample/server/index', ['id' => 'foo'], 'json');
        $this->restclient->debug();
        var_dump($data, $data->data->name);
    }
}