<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends \app\controllers\RestController
{
    protected $models = array('_willbes/product/productF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 학습형태별 조회
     * @example /product/products/index/{[on_lecture|pass_lecture]}/?site_code={value}&cate_code={value}&course_idx={value}&subject_idx={value}&prof_idx={value}&school_year={value}&is_best={Y/N}&is_new={Y/N}&is_count={Y/N}&limit={value}&offset={value}&order_by={value}&order_dir={asc/desc}
     * @param string $learn_pattern
     * @param null|string $prod_code
     */
    public function index_get($learn_pattern = '', $prod_code = null)
    {
        if (empty($learn_pattern) === true) {
            return $this->api_param_error();
        }

        // 조회조건
        $arr_condition = [
            'EQ' => [
                'ProdCode' => $prod_code,
                'SiteCode' => $this->_req('site_code'),
                'CourseIdx' => $this->_req('course_idx'),
                'SubjectIdx' => $this->_req('subject_idx'),
                'ProfIdx' => $this->_req('prof_idx'),
                'SchoolYear' => $this->_req('school_year'),
                'IsBest' => $this->_req('is_best'),
                'IsNew' => $this->_req('is_new')
            ],
            'LKR' => [
                'CateCode' => $this->_req('cate_code')
            ],
            'LKB' => [
                'ProdName' => $this->_req('prod_name')
            ]
        ];

        // 조회 구분
        $is_count = $this->_req('is_count') == 'Y' ? true : false;

        // 정렬순서
        $arr_order_by = ['ProdCode' => 'desc'];
        $order_by = $this->_req('order_by');
        $order_dir = $this->_req('order_dir');

        if (empty($order_by) === false && empty($order_dir) === false) {
            $arr_order_by = [$order_by => $order_dir];
        }

        // 데이터 조회
        $data = $this->productFModel->listSalesProduct($learn_pattern, $is_count, $arr_condition, $this->_req('limit'), $this->_req('offset'), $arr_order_by);

        if (empty($prod_code) === false) {
            $data = element('0', $data, []);
        }

        return $this->api_success(null, $data);
    }

    /**
     * 상품 컨텐츠 조회
     * @example /product/products/contents/{[on_lecture|pass_lecture]}/{prod_code}
     * @param string $learn_pattern
     * @param string $prod_code
     */
    public function contents_get($learn_pattern = '', $prod_code = '')
    {
        if (empty($learn_pattern) === true || empty($prod_code) === true) {
            return $this->api_param_error();
        }

        // 데이터 조회
        $data = $this->productFModel->findProductContents($prod_code);

        return $this->api_success(null, $data);
    }

    /**
     * 상품 구매교재 조회
     * @example /product/products/salebooks/{[on_lecture|pass_lecture]}/{prod_code}
     * @param string $learn_pattern
     * @param string $prod_code
     */
    public function salebooks_get($learn_pattern = '', $prod_code = '')
    {
        if (empty($learn_pattern) === true || empty($prod_code) === true) {
            return $this->api_param_error();
        }

        // 데이터 조회
        $data = $this->productFModel->findProductSaleBooks($prod_code);

        return $this->api_success(null, $data);
    }

    /**
     * 상품 강의 목록 조회
     * @example /product/products/lectureUnits/{[on_lecture|pass_lecture]}/{prod_code}
     * @param string $learn_pattern
     * @param string $prod_code
     */
    public function lectureUnits_get($learn_pattern = '', $prod_code = '')
    {
        if (empty($learn_pattern) === true || empty($prod_code) === true) {
            return $this->api_param_error();
        }

        // 데이터 조회
        $data = $this->productFModel->findProductLectureUnits($prod_code);

        return $this->api_success(null, $data);
    }
}
