<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기본페이지?
     */
    public function index()
    {
        $this->load->view('/player/normal', [

        ]);
    }

    /**
     * 샘플강의 보기
     * @param array $params
     */
    public function sample($params = [])
    {
        $this->load->view('/player/sample', [
            'data' => [
                'isIntro' => false,
                'url' => 'http://hd.willbes.gscdn.com/Noryangjin/2018_06/bubwon/leehyunna_korean_dk/lhn44_11_0726_korean_dk_1.mp4'
            ]
        ]);
    }

    /**
     * 무료강의 보기
     * @param array $params
     */
    public function free($params = [])
    {
        $this->load->view('/player/free', [

        ]);
    }

    /**
     * 강좌 상세목록
     */
    public function listCurriculum($params = [])
    {
        
    }

    /**
     * 북마크
     */
    public function listBookmark($params = [])
    {

    }

    public function storeBookmark()
    {

    }

    public function deleteBookmark()
    {

    }

}