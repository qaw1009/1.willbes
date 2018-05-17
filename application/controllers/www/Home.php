<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // web cache
        //$this->output->cache(5);

        // memcached
        //$this->load->driver('cache', ['adapter' => 'memcached', 'backup' => 'file']);
        //$this->load->driver('cache');
        //$this->cache->delete('lms@site');
        //dd($this->cache->get('lms@site'));

        // caching
        //$this->load->driver('caching', ['driver' => 'site']);
        //$this->caching->delete();
        //$this->caching->save();
        //var_dump($this->caching->get());

        //$this->load->driver('caching');
        //$this->caching->delete('lms@site');
        //$this->caching->save('site');
        //var_dump($this->caching->get('lms@site'));

        //$this->load->driver('caching');
        //$this->caching->site->delete();
        //$this->caching->site->save();
        //var_dump($this->caching->site->get());

        $this->load->view('main');
    }

    /**
     * 뷰 페이지 확인
     * @param $param
     */
    public function html($param)
    {
        $view_file = implode('/', $param);

        $this->load->view($view_file);
    }
}
