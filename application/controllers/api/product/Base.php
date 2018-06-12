<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends \app\controllers\RestController
{
    protected $models = array('_lms/sys/code', '_front/product/baseProduct');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상품 기본정보 조회 (카테고리+과목 연결, 카테고리+직렬+과목 연결, 교수+과목 연결, 과정)
     * @example /product/base/items/{[subject2category|subject2complex|subject2professor|course]}/{2001}
     * @param string $item_type
     * @param string $site_code
     * @param null|string $cate_code
     * @param null|string $child_ccd
     */
    public function items_get($item_type = '', $site_code = '', $cate_code = null, $child_ccd = null)
    {
        if (empty($item_type) === true || empty($site_code) === true) {
            return $this->api_param_error();
        }

        if (starts_with($item_type, 'subject2') === true) {
            if ($item_type == 'subject2professor') {
                $data = $this->baseProductModel->listProfessorSubjectMapping($site_code, $cate_code);
            } else {
                $data = $this->baseProductModel->listCategorySubjectMapping($item_type, $site_code, $cate_code, $child_ccd);
            }
        } else {
            $data = $this->baseProductModel->{'list' . ucfirst($item_type)}($site_code);
        }

        return $this->api_success(null, $data);
    }
}