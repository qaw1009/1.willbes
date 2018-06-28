<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->library('restClient');
    }

    /**
     * 단강좌 신청 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // 과정, 카테고리+과목 맵핑 정보 조회
        $arr_base = $this->api_get_data(
            $this->restclient->getsDataJson([
                ['name' => 'course', 'uri' => 'product/bases/course/' . $this->_site_code, 'params' => []],
                ['name' => 'subject2category', 'uri' => 'product/bases/subject2category/' . $this->_site_code, 'params' => ['cate_code' => $this->_cate_code]],
            ])
        );

        // 과목이 선택된 경우 해당 교수 조회
        if (empty($this->_req('subject_idx')) === false) {
            $arr_base['subject2professor'] = $this->api_get_data(
                $this->restclient->getDataJson('product/bases/subject2professor/' . $this->_site_code, [
                    'cate_code' => $this->_cate_code,
                    'subject_idx' => $this->_req('subject_idx'),
                ])
            );
        }

        // 상품 조회
        $list = $this->api_get_data(
            $this->restclient->getDataJson('product/products/apply/on_lecture/' . $this->_site_code, [
                'cate_code' => $this->_cate_code,
                'course_idx' => $this->_req('course_idx'),
                'subject_idx' => $this->_req('subject_idx'),
                'prof_idx' => $this->_req('prof_idx'),
                'school_year' => $this->_req('school_year'),
            ])
        );

        $this->load->view('site/lecture/index' . $this->_pass_site_val, [
            'data' => $list
        ]);
    }

    public function show($params = [])
    {
        $this->load->view('site/lecture/show' . $this->_pass_site_val);
    }    
}