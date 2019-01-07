<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAir extends \app\controllers\FrontController
{
    protected $models = array('onAirF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function onAirPlay()
    {
        $input = $this->_reqG(null);
        
        
        //on air play 검증
        
        $result = true;
        
        if($result === false) {
            show_alert('온에어정보가 없습니다.', 'back');
        }
        
        
        $this->load->view('site/on_air/popup_video', [
            'oa_idx' => element('oa_idx', $input)
        ]);
    }

    public function winPopup()
    {
        $input = $this->_reqG(null);

        $this->load->view('site/on_air/play_video', [
            'video_route' => 'rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop4022'
        ]);
    }
}