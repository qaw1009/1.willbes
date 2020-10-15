<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array('landing/landingF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function show($params = [])
    {
        $data = [];
        $data['Content'] = $this->_reqP('preview_content');
        $data['Preview'] = ( empty(element('preview',$params)) ? $this->_reqP('preview') : element('preview',$params) );

        $l_code = element('lcode',$params);
        if($data['Preview'] === 'Y') {
            if (empty($l_code) === false) {
                $data = $this->landingFModel->findLandingByLCode($l_code);
            }
        } else {
            if (empty($l_code) === false) {
                $data = $this->landingFModel->findLandingByLCode($l_code,['EQ' => ['mm.IsUse'=>'Y']]);
            }
        }
        $this->load->view('site/landing/show',[
            'data' => $data
        ]);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}