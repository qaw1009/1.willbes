<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends \app\controllers\FrontController
{
    protected $models = array('bannerF');
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
        $arr_base['arr_main_banner'] = $this->_banner('0', $campus_code);
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($campus_code);

        $this->load->view('site/campus/show', [
            'arr_input' => $arr_input,
            'campus_code' => $campus_code,
            'arr_base' => $arr_base,
            'tab_data' => $tab_data,
            'is_tab_select' => $is_tab_select
        ]);
    }

    private function _banner($cate_code, $campus_code)
    {
        $arr_banner_disp = ['캠퍼스_메인', '캠퍼스_서브1', '캠퍼스_서브2', '캠퍼스_서브3', '캠퍼스_서브4', '캠퍼스_서브5', '캠퍼스_서브6'];
        $result = $this->bannerFModel->findBanners($arr_banner_disp, $this->_site_code, $cate_code, $campus_code);

        $data = [];
        foreach ($result as $key => $row) {
            $data[$row['DispName']][] = $result[$key];
        }
        return $data;
    }

    /**
     * 공지사항 탭
     * @param $campus_code
     * @return array
     */
    private function _tab_notice($campus_code)
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

    /**
     * 1:1 상담 탭
     * @param $campus_code
     * @return array
     */
    private function _tab_qna($campus_code)
    {
        $frame_path = '/frame/qna/index';
        $frame_params = 's_campus='.$campus_code;
        $frame_params .= '&view_type=frame';

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }

    private function _tab_map($campus_code)
    {
        $data = [
            'campus_code' => $campus_code
        ];

        return $data;
    }
}