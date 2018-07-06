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
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if ($this->_site_id == 'gosi') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base = $this->api_get_data(
                $this->restclient->getsDataJson([
                    ['name' => 'series', 'uri' => 'product/bases/series2category/' . $this->_site_code, 'params' => ['cate_code' => $this->_cate_code]],
                    ['name' => 'subject', 'uri' => 'product/bases/subject2series/' . $this->_site_code, 'params' => ['cate_code' => $this->_cate_code, 'series_ccd' => element('series_ccd', $arr_input)]],
                ])
            );
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->api_get_data(
                $this->restclient->getDataJson('product/bases/subject2category/' . $this->_site_code, [
                    'cate_code' => $this->_cate_code
                ])
            );            
        }

        // 과정 조회
        $arr_base['course'] = $this->api_get_data(
            $this->restclient->getDataJson('product/bases/course/' . $this->_site_code)
        );

        // 과목이 선택된 경우 해당 교수 조회
        if (empty(element('subject_idx', $arr_input)) === false) {
            $arr_base['professor'] = $this->api_get_data(
                $this->restclient->getDataJson('product/bases/professor2subject/' . $this->_site_code, [
                    'cate_code' => $this->_cate_code,
                    'subject_idx' => element('subject_idx', $arr_input),
                ])
            );
        }

        // 상품 조회
        $list = $this->api_get_data(
            $this->restclient->getDataJson('product/products/index/on_lecture/all', [
                'site_code' => $this->_site_code,
                'cate_code' => $this->_cate_code,
                'course_idx' => element('course_idx', $arr_input),
                'subject_idx' => element('subject_idx', $arr_input),
                'prof_idx' => element('prof_idx', $arr_input),
                'school_year' => element('school_year', $arr_input),
            ])
        );

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
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            unset($row['ProfReferData']);

            $selected_list[$row['SubjectIdx']][$row['ProfIdx']][] = $row;
        }

        $this->load->view('site/lecture/index' . $this->_pass_site_val, [
            'arr_param' => $params,
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
        if (empty($prod_code)) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data = $this->api_get_data(
            $this->restclient->getsDataJson([
                ['name' => 'contents', 'uri' => 'product/products/contents/on_lecture/' . $prod_code, 'params' => []],
                ['name' => 'salebooks', 'uri' => 'product/products/salebooks/on_lecture/' . $prod_code, 'params' => []],
            ])
        );

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
            show_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST, '잘못된 접근');
        }

        // 상품 기본정보, 컨텐츠, 교재정보 조회
        $data = $this->api_get_data(
            $this->restclient->getsDataJson([
                ['name' => 'base', 'uri' => 'product/products/index/on_lecture/all/' . $prod_code, 'params' => []],
                ['name' => 'contents', 'uri' => 'product/products/contents/on_lecture/' . $prod_code, 'params' => []],
                ['name' => 'salebooks', 'uri' => 'product/products/salebooks/on_lecture/' . $prod_code, 'params' => []],
            ])
        );

        $data['base']['ProdBookData'] = json_decode($data['base']['ProdBookData'], true);
        $data['base']['LectureSampleData'] = json_decode($data['base']['LectureSampleData'], true);
        $data['base']['ProfReferData'] = json_decode($data['base']['ProfReferData'], true);

        $this->load->view('site/lecture/show' . $this->_pass_site_val, [
            'arr_param' => $params,
            'data' => $data['base'],
            'contents' => $data['contents'],
            'salebooks' => $data['salebooks']
        ]);
    }    
}