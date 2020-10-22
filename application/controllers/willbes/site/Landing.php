<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array('landing/landingF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function show($params = [])
    {
        $data = [];
        if(APP_DEVICE == 'pc'){
            $data['Content'] =  $this->_reqP('preview_content');
        }else{
            $data['ContentM'] =  $this->_reqP('preview_content');
        }
        $data['Preview'] = ( empty(element('preview',$params)) ? $this->_reqP('preview') : element('preview',$params) );
        $file_type = element('file_type', $this->_reqG(null));

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
        $this->load->view('site/landing/' . $file_type . 'show',[
            'data' => $data
        ]);
    }

    public function download()
    {
        $file_path = urldecode($this->_reqG('path',false));
        $file_name = urldecode($this->_reqG('fname',false));

        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'back');
    }
}