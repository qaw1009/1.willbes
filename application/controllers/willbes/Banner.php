<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends \app\controllers\BaseController
{
    protected $models = array('bannerF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function show($params = [])
    {
        $params = array_pluck(array_chunk($params, 2), '1', '0');

        if (empty($params['site']) === true || empty($params['section']) === true || empty($params['location']) === true) {
            show_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST, '잘못된 접근');
        }

        // 데이터 조회
        $data = $this->bannerFModel->findBanners($params['section'], $params['location'], $params['site'], element('cate', $params));

        if (empty($data) === true) {
            //show_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND, '정보 없음');
        }

        $this->load->view('common/banner', [
            'data' => $data
        ]);
    }
}
