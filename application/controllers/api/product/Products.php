<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends \app\controllers\RestController
{
    protected $models = array('_lms/sys/code', '_willbes/product/productF');
    protected $helpers = array();

    // 상품 판매상태 > 판매가능, 판매예정
    private $_sale_status_ccds = ['618001', '618002'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 학습형태별 조회
     * @example /product/products/apply/{[on_lecture|pass_lecture]}/?cate_code={value}&course_idx={value}&subject_idx={value}&prof_idx={value}&school_year={value}&is_count={Y/N}&limit={value}&offset={value}&order_by={value}&order_dir={asc/desc}
     * @param string $learn_pattern
     * @param string $site_code
     */
    public function apply_get($learn_pattern = '', $site_code = '')
    {
        if (empty($learn_pattern) === true || empty($site_code) === true) {
            return $this->api_param_error();
        }

        // 조회조건
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $site_code,
                'CourseIdx' => $this->_req('course_idx'),
                'SubjectIdx' => $this->_req('subject_idx'),
                'ProfIdx' => $this->_req('prof_idx'),
                'SchoolYear' => $this->_req('school_year'),
                'IsSaleEnd' => 'N'
            ],
            'LKR' => [
                'CateCode' => $this->_req('cate_code'),
            ],
            'IN' => [
                'SaleStatusCcd' => $this->_sale_status_ccds
            ],
            'RAW' => [
                'NOW() between ' => 'SaleStartDatm and SaleEndDatm'
            ]
        ];

        // 조회 구분
        $is_count = $this->_req('is_count') == 'Y' ? true : false;

        // 정렬순서
        $arr_order_by = [];
        $order_by = $this->_req('order_by');
        $order_dir = $this->_req('order_dir');

        if (empty($order_by) === false && empty($order_dir) === false) {
            $arr_order_by = [$order_by => $order_dir];
        }

        // 데이터 조회
        $data = $this->productFModel->listProduct($learn_pattern, $is_count, $arr_condition, $this->_req('limit'), $this->_req('offset'), $arr_order_by);

        return $this->api_success(null, $data);
    }
}
