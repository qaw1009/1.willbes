<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bases extends \app\controllers\RestController
{
    protected $models = array('_lms/sys/code', '_willbes/product/baseProductF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상품 기본정보 조회 (카테고리+과목 연결, 카테고리+직렬+과목 연결, 교수+과목 연결, 과정)
     * @example /product/bases/index/{[subject2category|subject2complex|subject2professor|course]}/{2001}/?cate_code={value}&series_ccd={value}
     * @param string $item_type
     * @param string $site_code
     */
    public function index_get($item_type = '', $site_code = '')
    {
        if (empty($item_type) === true || empty($site_code) === true) {
            return $this->api_param_error();
        }

        if (starts_with($item_type, 'subject2') === true) {
            if ($item_type == 'subject2professor') {
                $data = $this->baseProductFModel->listProfessorSubjectMapping($site_code, $this->_req('cate_code'));
            } else {
                $data = $this->baseProductFModel->listCategorySubjectMapping($item_type, $site_code, $this->_req('cate_code'), $this->_req('series_ccd'));
            }
        } else {
            $data = $this->baseProductFModel->{'list' . ucfirst($item_type)}($site_code);
        }

        return $this->api_success(null, $data);
    }
}