<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('onAirF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // 온라인, 학원 분기처리
        if ($this->_is_pass_site === true) {
            $_view_path = 'pass_';
            $arr_base = $this->_getOffLineData();
        } else {
            $_view_path = 'main_';
            $arr_base = $this->_getOnLineData();
        }
        
        $this->load->view('site/'. $_view_path . SUB_DOMAIN, [
            'arr_base' => $arr_base,
        ]);
    }

    /**
     * 메인에 사용할 데이터 셋팅 [온라인]
     * @return mixed
     */
    private function _getOnLineData()
    {
        $data['notice'] = $this->_notice();
        return $data;
    }

    /**
     * 메인에 사용할 데이터 셋팅 [학원]
     * @return mixed
     */
    private function _getOffLineData()
    {
        $data['onAir'] = $this->_onAir();
        $data['notice'] = $this->_notice();
        return $data;
    }

    /**
     * OnAir 조회
     * @return array
     */
    private function _onAir()
    {
        $data = $this->onAirFModel->getLiveOnAir($this->_site_code, '');
        return $data;
    }

    /**
     * 게시판
     * @return array
     */
    private function _notice()
    {
        $data = [];
        return $data;
    }
}
