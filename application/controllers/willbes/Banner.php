<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends \app\controllers\BaseController
{
    protected $models = array('bannerF', 'access/accessF');
    protected $helpers = array();
    protected $sess_controller = false;  // 세션 사용안함
    protected $sess_methods = array('click');   // 세션 사용 메소드

    private $_rolling_type = ['665001' => 'bSlider',  '665002' => 'cSlider', '665003' => 'nSlider', '665004' => 'vSlider'
        , '665005' => '', '665006' => 'swiper-container-arrow', '665007' => 'swiper-container-page'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 배너 노출
     * @return mixed
     */
    public function show()
    {
        $arr_input = $this->_reqG(null);

        if (empty($arr_input['site_code']) === true || empty($arr_input['section']) === true) {
            return '';
        }

        // 데이터 조회
        $data = $this->bannerFModel->findBanners($arr_input['section'], $arr_input['site_code'], element('cate_code', $arr_input, 0), $arr_input['campus_code']);
        if (empty($data) === true) {
            return '';
        }

        // 롤링타입코드명
        $rolling_type_name = element($data[0]['DispRollingTypeCcd'], $this->_rolling_type, '');

        if (empty($rolling_type_name) === false) {
            if (APP_DEVICE == 'pc') {
                if (strpos($rolling_type_name, 'Slider') === false) {
                    return '';
                }
            } else {
                if (strpos($rolling_type_name, 'Slider') > -1) {
                    return '';
                }
            }
        }

        // 노출섹션 정보 추출
        $disp_data = [
            'BdIdx' => $data[0]['BdIdx'], 'DispTypeCcd' => $data[0]['DispTypeCcd'], 'DispRollingTime' => $data[0]['DispRollingTime'],
            'DispRollingTypeCcd' => $data[0]['DispRollingTypeCcd'], 'DispRollingTypeName' => $rolling_type_name,
        ];

        // 랜덤 노출일 경우
        if ($disp_data['DispTypeCcd'] == '664003') {
            shuffle($data);
        }

        return $this->load->view('common/banner', [
            'disp' => $disp_data,
            'data' => $data,
            'css_class' => $arr_input['css_class'],
            'set_class' => $arr_input['set_class']
        ]);
    }

    /**
     * 배너클릭 (접속로그 저장)
     */
    public function click()
    {
        $banner_idx = $this->_reqG('banner_idx');
        $return_url = $this->_reqG('return_url');
        $link_url_type = $this->_reqG('link_url_type'); //외부, 내부 링크 타입

        if(empty($banner_idx) === false && is_numeric($banner_idx) === true && empty($return_url) === false) {
            // 접속로그 저장
            $this->accessFModel->saveLog('banner', $banner_idx);

            if (empty($link_url_type) === true || $link_url_type == 'I') {
                $return_url = '//' . (strpos($return_url, config_item('base_domain')) === false ? $return_url : app_to_env_url($return_url));
            }
            redirect($return_url);
        } else {
            redirect(app_url('/home/index', 'www'));
        }
    }
}
