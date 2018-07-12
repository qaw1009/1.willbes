<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/lectureF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 단강좌 신청 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if ($this->_site_code == '2004') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_cate_code);
            $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_cate_code, element('series_ccd', $arr_input));
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $this->_cate_code);
        }

        // 과정 조회
        $arr_base['course'] = $this->baseProductFModel->listCourse($this->_site_code);

        // 과목이 선택된 경우 해당 교수 조회
        if (empty(element('subject_idx', $arr_input)) === false) {
            $arr_base['professor'] = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, false, $this->_cate_code, element('subject_idx', $arr_input));
        }

        // 상품 조회
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'CourseIdx' => element('course_idx', $arr_input),
                'SubjectIdx' => element('subject_idx', $arr_input),
                'ProfIdx' => element('prof_idx', $arr_input),
                'SchoolYear' => element('school_year', $arr_input)
            ],
            'LKR' => [
                'CateCode' => $this->_cate_code,
            ],
            'LKB' => [
                'ProdName' => $this->_req('prod_name'),
            ]
        ];

        $list = $this->lectureFModel->listSalesProduct('on_lecture', false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품조회 결과에 존재하는 과목 정보
        $selected_subjects = array_pluck($list, 'SubjectName', 'SubjectIdx');
        // 상품조회 결과에 존재하는 교수 정보
        $selected_professor_names = array_data_pluck($list, ['wProfName', 'ProfSlogan'], ['SubjectIdx', 'ProfIdx']);
        $selected_professor_refers = array_map(function ($val) {
            return json_decode($val, true);
        }, array_pluck($list, 'ProfReferData', 'ProfIdx'));

        // 상품 조회결과 재정의
        $selected_list = [];
        foreach ($list as $idx => $row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            unset($row['ProfReferData']);

            $selected_list[$row['SubjectIdx']][$row['ProfIdx']][] = $row;
        }

        $this->load->view('site/lecture/index' . $this->_pass_site_val, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'data' => [
                'subjects' => $selected_subjects,
                'professor_names' => $selected_professor_names,
                'professor_refers' => $selected_professor_refers,
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 강좌상세정보 조회 (ajax)
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data['contents'] = $this->lectureFModel->findProductContents($prod_code);
        $data['salebooks'] = $this->lectureFModel->findProductSaleBooks($prod_code);

        $this->load->view('site/lecture/info_modal', [
            'arr_input' => $this->_reqG(null),
            'data' => $data
        ]);
    }

    /**
     * 강좌 보기
     * @param array $params
     */
    public function show($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code)) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상품 조회
        $data = $this->lectureFModel->findProductByProdCode('on_lecture', $prod_code);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }
        
        // 상품 데이터 가공
        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true);
        $data['ProdBookData'] = json_decode($data['ProdBookData'], true);
        $data['LectureSampleData'] = json_decode($data['LectureSampleData'], true);
        $data['LectureSampleUnitIdxs'] = array_pluck($data['LectureSampleData'], 'wUnitIdx');
        $data['ProfReferData'] = json_decode($data['ProfReferData'], true);

        // 상품 컨텐츠
        $data['ProdContents'] = $this->lectureFModel->findProductContents($prod_code);

        // 상품 판매교재
        $data['ProdSaleBooks'] = $this->lectureFModel->findProductSaleBooks($prod_code);

        // 상품 강의 목차
        $data['LectureUnits'] = $this->lectureFModel->findProductLectureUnits($prod_code);

        $this->load->view('site/lecture/show' . $this->_pass_site_val, [
            'data' => $data
        ]);
    }    
}