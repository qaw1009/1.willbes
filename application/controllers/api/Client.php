<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('restClient');
    }

    public function index()
    {
        //$keys = $this->restclient->put('key', []);
        //$this->restclient->api_key($keys->key);

        //$this->restclient->initialize(['format' => 'xml']);
        //$this->restclient->api_key('cs0gwcck480owk04scksow8o88cws0kskc04cw88');
        //$data = $this->restclient->post('server/index/format/xml', '<xml><id>foo</id></xml>', 'xml');
        $data = $this->restclient->post('server', ['id' => 'foo'], 'json');
        $this->restclient->debug();

        //var_dump($this->restclient->status());
        var_dump($data);
        //var_dump($data->name);

/*        $this->load->library('curl');
        $this->curl->get('http://lapi.willbes.net/sample/index');

        if ($this->curl->error) {
            echo 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
        } else {
            echo 'Response:' . "\n";
            var_dump(get_object_vars($this->curl->response));
        }*/
    }
}