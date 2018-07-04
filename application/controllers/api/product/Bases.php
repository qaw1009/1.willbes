<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bases extends \app\controllers\RestController
{
    protected $models = array('_willbes/product/baseProductF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상품 기본정보 조회 (카테고리+과목 연결, 카테고리+직렬+과목 연결, 교수+과목 연결, 과정)
     * @example /product/bases/index/{[subject2category|subject2series|series2category|professor2subject|course]}/{2001}/?cate_code={value}&series_ccd={value}&subject_idx={value}
     * @param string $item_type
     * @param string $site_code
     */
    public function index_get($item_type = '', $site_code = '')
    {
        if (empty($item_type) === true || empty($site_code) === true) {
            return $this->api_param_error();
        }

        switch ($item_type) {
            case 'subject2category' :   // 카테고리별 과목
                $data = $this->baseProductFModel->listSubjectCategoryMapping($site_code, $this->_req('cate_code'));
                break;
            case 'subject2series' :       // 직렬별 과목
                $data = $this->baseProductFModel->listSubjectSeriesMapping($site_code, $this->_req('cate_code'), $this->_req('series_ccd'));
                break;
            case 'series2category' :    // 카테고리별 직렬
                $data = $this->baseProductFModel->listSeriesCategoryMapping($site_code, $this->_req('cate_code'));
                break;
            case 'professor2subject' :  // 과목별 교수
                $data = $this->baseProductFModel->listProfessorSubjectMapping($site_code, false, $this->_req('cate_code'), $this->_req('subject_idx'));
                break;
            case 'professor-in-refer2subject' :  // 과목별 교수
                $data = $this->baseProductFModel->listProfessorSubjectMapping($site_code, true, $this->_req('cate_code'), $this->_req('subject_idx'));
                break;
            default :
                $data = $this->baseProductFModel->{'list' . ucfirst($item_type)}($site_code);
                break;
        }

        return $this->api_success(null, $data);
    }
}