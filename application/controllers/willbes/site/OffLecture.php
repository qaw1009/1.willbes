<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffLecture extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/lectureF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'off_lecture';     // 학습형태 (학원단과)

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 단과 신청 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $cate_code = element('cate_code', $arr_input, $this->_cate_code);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 캠퍼스 조회
        $arr_base['campus'] = array_map(function($var) {
            $tmp_arr = explode(':', $var);
            return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
        }, explode(',', config_app('CampusCcdArr')));

        // 과정 조회
        $arr_base['course'] = $this->baseProductFModel->listCourse($this->_site_code);

        // 과목 조회
        if (empty($cate_code) === false) {
            if ($this->_site_code == '2004') {
                // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
                $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $cate_code);
                $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $cate_code, element('series_ccd', $arr_input));
            } else {
                // 카테고리별 과목 조회
                $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
            }
        }

        // 과목이 선택된 경우 해당 교수 조회
        if (empty(element('subject_idx', $arr_input)) === false) {
            $arr_base['professor'] = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, $cate_code, element('subject_idx', $arr_input));
        }

        // 상품 조회
        $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);  // 검색어

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'CampusCcd' => element('campus_ccd', $arr_input),
                'CourseIdx' => element('course_idx', $arr_input),
                'SubjectIdx' => element('subject_idx', $arr_input),
                'ProfIdx' => element('prof_idx', $arr_input)
            ],
            'LKR' => [
                'CateCode' => $cate_code,
            ],
            'LKB' => [
                $arr_search_text[0] => element('1', $arr_search_text),
            ]
        ];

        $list = $this->lectureFModel->listSalesProduct($this->_learn_pattern, false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품조회 결과에 존재하는 과목 정보
        $selected_subjects = array_pluck($list, 'SubjectName', 'SubjectIdx');

        // 상품 조회결과 재정의
        $selected_list = [];
        foreach ($list as $idx => $row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $selected_list[$row['SubjectIdx']][] = $row;
        }

        $this->load->view('site/off_lecture/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ]
        ]);
    }    
}
