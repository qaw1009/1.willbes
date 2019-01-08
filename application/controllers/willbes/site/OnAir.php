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
        $arr_condition = [
            'RAW' => [
                'O.OaIdx = ' => element('oa_idx', $input, '\'\'')
            ]
        ];
        $data = $this->onAirFModel->getLiveOnAir($this->_site_code, $arr_condition);
        if (empty($data) === true) {
            show_alert('온에어 정보가 없습니다.', 'close');
        }
        $arrOnAirData = $data[0];
        $result = $this->_playValidate($arrOnAirData);
        if ($result !== true) {
            show_alert('error msg~', 'close');
        }

        print_r($arrOnAirData);


        $this->load->view('site/on_air/play_video_popup', [
            'video_route' => 'rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop4022'
        ]);
    }

    /**
     * 동영상플레이 검증
     * @param $onAirData
     * @return bool
     */
    private function _playValidate($arrOnAirData)
    {


        return true;
    }

    private function _errorMsg($ret_code)
    {
        $arr_msg = [
            '1' => '로그인 후 이용해 주세요.',
            '2' => '로그인 후 이용해 주세요.',
        ];
        switch ($ret_code) {
            case "1" :
                $msg = '로그인 후 이용해 주세요.';
                break;
        }

        return $msg;
    }
}