<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePromotion extends \app\controllers\FrontController
{
    protected $models = array('eventF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        if (empty((int)$params['code']) === true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $test_type = (int)element('type', $this->_reqG(null), '0');
        $promotion_code = (int)$params['code'];
        $data = $this->eventFModel->findEventForPromotion($promotion_code, $test_type);

        if (empty($data) === true) {
            show_alert('조회에 실패했습니다.', 'back');
        }

        // 접근 로그 저장
        if ($test_type != 1) {
            $this->eventFModel->saveLogPromotion($this->_site_code, $this->_cate_code, $promotion_code);
        }

        // 댓글사용영역 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));

        $view_file = 'willbes/pc/promotion/'.$this->_site_code.'/'.$promotion_code;
        $this->load->view($view_file, [
            'data' => $data
        ],false);
    }
}