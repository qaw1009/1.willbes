<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /*// memcached
        $this->load->driver('cache', ['adapter' => 'memcached']);
        $this->cache->save('foo', 'bar', 10);
        echo $this->cache->get('foo') . '<br/>';*/

        $this->load->view('main');
    }
}
