<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function show($params = [])
    {
        $campus_code = element('code', $params);

        if (empty($campus_code)) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $is_tab_select = isset($arr_input['tab']);
        $arr_input['tab'] = element('tab', $arr_input, 'notice');
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($campus_code, $arr_input);

        $this->load->view('site/campus/show', [
            'arr_input' => $arr_input,
            'campus_code' => $campus_code,
            'tab_data' => $tab_data,
            'is_tab_select' => $is_tab_select
        ]);
    }

    private function _tab_notice($campus_code, $arr_input)
    {
        $frame_path = '/frame/notice/index';
        $frame_params = 's_campus='.$campus_code;
        $frame_params .= '&view_type=frame';

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }

    private function _tab_counsel()
    {

    }
}