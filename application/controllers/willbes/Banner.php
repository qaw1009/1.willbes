<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends \app\controllers\BaseController
{
    protected $models = array('bannerF');
    protected $helpers = array();

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
        $data = $this->bannerFModel->findBanners($arr_input['section'], $arr_input['site_code'], element('cate_code', $arr_input, 0));
        if (empty($data) === true) {
            return '';
        }

        // 롤링타입코드명
        $rolling_type_name = element($data[0]['DispRollingTypeCcd'], $this->_rolling_type, '');
            
        if (APP_DEVICE == 'pc') {
            if (strpos($rolling_type_name, 'Slider') === false) {
                return '';
            }
        } else {
            if (strpos($rolling_type_name, 'Slider') > -1) {
                return '';
            }            
        }

        // 노출섹션 정보 추출
        $disp_data = [
            'BdIdx' => $data[0]['BdIdx'], 'DispTypeCcd' => $data[0]['DispTypeCcd'], 'DispRollingTime' => $data[0]['DispRollingTime'],
            'DispRollingTypeCcd' => $data[0]['DispRollingTypeCcd'], 'DispRollingTypeName' => $rolling_type_name,
        ];

        logger('banner1', $data);
        logger('banner2', $disp_data);

        // 랜덤 노출일 경우
        if ($disp_data['DispTypeCcd'] == '664003') {
            shuffle($data);
        }

        return $this->load->view('common/banner', [
            'disp' => $disp_data,
            'data' => $data,
            'css_class' => $arr_input['css_class']
        ]);
    }
}
