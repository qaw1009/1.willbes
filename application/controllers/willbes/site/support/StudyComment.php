<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudyComment extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = 85;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));

        if ($this->_site_code == '2004') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_cate_code);
            /*$arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_cate_code, element('series_ccd', $arr_input));*/
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, element('cate_code', $arr_input));
        }

        $this->load->view('site/professor/study_comment_index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
        ]);
    }

    public function ajaxProfInfo()
    {
        $data = [];
        $arr_input = array_merge($this->_reqP(null));

        if (empty(element('cate_code', $arr_input)) === false && empty(element('subject_idx', $arr_input)) === false) {
            $data = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, element('cate_code', $arr_input), element('subject_idx', $arr_input));
        }

        $this->json_result(true, '', [], array_pluck($data, 'wProfName', 'ProfIdx'));
    }
}