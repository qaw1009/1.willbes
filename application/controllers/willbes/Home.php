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
        //$this->caching->site_menu->delete();
        //$this->caching->site_menu->save();
        //var_dump($this->caching->site_menu->get());

        $this->load->view('main');
    }

    public function cache()
    {
        unset($this->caching);
        dd($this->getCacheItem('site_subject_professor'), $this->getCacheItem('site'), $this->getCacheItem('site_menu'));
    }

    public function save_cache($param)
    {
        unset($this->caching);
        $this->load->driver('caching');
        $this->caching->{$param[0]}->delete();
        $this->caching->{$param[0]}->save();
    }

    /**
     * 뷰 페이지 확인
     */
    public function html()
    {
        $view_file = explode('/', uri_string(), 3)[2];
        $view_file = 'html/' . $view_file;

        $this->load->view($view_file, [], false);
    }
}
