<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professors extends \app\controllers\RestController
{
    protected $models = array('_willbes/product/professorF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수식별자 기준 교수 정보 조회
     * @example /product/professors/index/?prof_idx[]={value}&site_code={value}&is_refer={Y/N}
     * @return mixed
     */
    public function index_get()
    {
        $rules = [
            ['field' => 'prof_idx[]', 'label' => '교수식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $prof_idx = $this->_req('prof_idx');
        $is_refer = $this->_req('is_refer') == 'Y' ? true : false;

        $data = $this->professorFModel->findProfessors($prof_idx, $is_refer, $this->_req('site_code'));

        return $this->api_success(null, $data);
    }
}
