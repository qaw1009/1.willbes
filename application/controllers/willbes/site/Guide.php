<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수험정보 > 가이드, 초보합격전략
     * @param array $params
     */
    public function show($params = [])
    {
        if (empty($this->_is_pass_site) === true) {
            $view_type = $params['pattern'];
        } else {
            $view_type = $params[0];
        }

        switch ($view_type) {
            case "cop" :
            case "cop_success" :
            case "gosi" :
            case "gosi_success" :
            case "gpgosi" :
            case "gtelp" :
                $this->load->view('site/guide/'.$view_type.'_show',[]);
                break;
            default:
                show_alert('잘못된 접근 입니다.', '/');
                exit;
        }
    }
}