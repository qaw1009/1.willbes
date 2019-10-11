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
        $oa_idx = (int)element('oa_idx', $input);
        //on air play 검증
        $arr_condition = [
            'RAW' => [
                'O.OaIdx = ' => (empty($oa_idx) === true) ? '\'\'' : '\''.$oa_idx.'\''
            ]
        ];
        $data = $this->onAirFModel->getLiveOnAir($this->_site_code, $arr_condition);
        if (empty($data) === true) {
            show_alert('온에어 정보가 없습니다.', 'close');
        }
        $arrOnAirData = $data[0];

        if ($arrOnAirData['LoginType'] == 'Y') {
            $arr_condition = [ 'EQ' => [ 'MemIdx' => $this->session->userdata('mem_idx') ] ];
        } else {
            $arr_condition = [ 'EQ' => [ 'UserIp' => $this->input->ip_address() ] ];
        }
        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => [
                'OaIdx' => $arrOnAirData['OaIdx'],
                'PlayDate' => date('Y-m-d')
            ]
        ]);

        //유저별 동영상 재생횟수
        $setUserCount = $this->_getMemberPlayCount($arr_condition);

        //동영상플레이 검증
        $validate = $this->_playValidate($arrOnAirData, $setUserCount);
        if ($validate !== true) {
            show_alert($validate, 'close');
        }

        //유저정보저장
        if ($setUserCount <= 0) {
            //저장
            $set_input_data = $this->_addInputData($arrOnAirData);
            $result = $this->onAirFModel->addUserPlay($set_input_data);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }
        } else {
            //업데이트
            if ($arrOnAirData['LoginType'] == 'Y') {
                $arr_condition = [ 'MemIdx' => $this->session->userdata('mem_idx') ];
            } else {
                $arr_condition = [ 'UserIp' => $this->input->ip_address() ];
            }
            $arr_condition = array_merge($arr_condition, [
                'OaIdx' => $arrOnAirData['OaIdx'],
                'PlayDate' => date('Y-m-d')
            ]);
            $this->onAirFModel->updateUserPlay($arr_condition);
        }

        $this->load->view('site/on_air/play_video_popup', [
            'video_route' => $arrOnAirData['LiveVideoRoute'],
            'video_play_time' => $arrOnAirData['VideoPlayTime']
        ]);
    }

    /**
     * 유저별 동영상 재생횟수
     * @param $arr_condition
     * @return int
     */
    private function _getMemberPlayCount($arr_condition)
    {
        $UserData = $this->onAirFModel->getUserPlayCount($arr_condition);
        if (empty($UserData) === true) {
            $setUserCount = 0;
        } else {
            $setUserCount = $UserData['PlayCount'];
        }

        return $setUserCount;
    }

    /**
     * 동영상플레이 검증
     * @param $arrOnAirData
     * @param $setUserCount
     * @return bool|string
     */
    private function _playValidate($arrOnAirData, $setUserCount)
    {
        //print_r($arrOnAirData);
        //로그인 체크
        if ($arrOnAirData['LoginType'] == 'Y') {
            if ($this->isLogin() !== true) {
                return '로그인 후 이용해 주세요.';
            }
        }

        if ($arrOnAirData['VideoPlayCount'] <= $setUserCount) {
            return '1일 '.$arrOnAirData['VideoPlayCount'].'회까지만 재생할 수 있습니다.';
        }
        return true;
    }

    /**
     * 등록데이터 셋팅
     * @param $arrOnAirData
     * @return array
     */
    private function _addInputData($arrOnAirData)
    {
        if ($arrOnAirData['LoginType'] == 'Y') {
            $input_data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
            ];
        } else {
            $input_data = [
                'UserIp' => $this->input->ip_address()
            ];
        }

        $input_data = array_merge($input_data, [
            'OaIdx' => $arrOnAirData['OaIdx'],
            'PlayDate' => date('Y-m-d'),
            'PlayCount' => '1'
        ]);

        return $input_data;
    }
}