<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/bookF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'book';     // 학습형태 (교재)
    private $_disp_type_ccds = ['619001', '619003'];    // 노출위치 공통코드 (강의+서점DP, 서점DP)

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재구매 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 카테고리 코드가 없을 경우 디폴트 설정
        if (isset($arr_input['cate_code']) === false) {
            $arr_input['cate_code'] = get_var($this->_cate_code, array_get($arr_base['category'], '0.CateCode'));
        }
        $cate_code = element('cate_code', $arr_input, $this->_cate_code);

        // 과목 조회
        if (config_app('SiteGroupCode') == '1002') {
            // 사이트그룹이 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $cate_code);
            $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $cate_code, element('series_ccd', $arr_input));

            // 온라인공무원일 경우 과목 디폴트 설정 (0번째 과목)
            if ($this->_site_code == '2003' && isset($arr_input['subject_idx']) === false) {
                $arr_input['subject_idx'] = array_get($arr_base['subject'], '0.SubjectIdx');
            }
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
        }

        // 과목이 선택된 경우 해당 교수 조회
        if (empty(element('subject_idx', $arr_input)) === false) {
            $arr_base['professor'] = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, $cate_code, element('subject_idx', $arr_input));
        }

        // 상품 조회 조건
        // 검색어
        $search_column = '';
        $search_value = '';
        if (empty(element('search_text', $arr_input)) === false) {
            $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);
            $search_column = 'P.' . $arr_search_text[0];
            $search_value = element('1', $arr_search_text);
        }

        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $this->_site_code,
            ],
            'IN' => [
                'P.DispTypeCcd' => $this->_disp_type_ccds
            ],
            'LKR' => [
                'P.CateCode' => $cate_code,
            ],
            'LKB' => [
                'P.SubjectIdx' => element('subject_idx', $arr_input),
                'P.ProfIdx' => element('prof_idx', $arr_input),
                $search_column => $search_value
            ]
        ];

        // 정렬순서
        if (element('search_order', $arr_input) == 'name') {
            $arr_order_by = ['P.ProdName' => 'asc'];
        } else {
            $arr_order_by = ['P.ProdCode' => 'desc'];
        }

        // 상품 조회 (수강생교재 제외를 위해 별도 메소드 사용)
        $list = $this->bookFModel->listSalesProductBook(false, $arr_condition, null, null, $arr_order_by);
        $selected_list = [];
        foreach ($list as  $idx => $row) {
            $arr_price_data = $row['ProdPriceData'] != 'N' ? element('0', json_decode($row['ProdPriceData'], true)) : [];

            if (empty($arr_price_data) === false && $arr_price_data['RealSalePrice'] > 0) {
                $selected_list[] = array_merge($row, $arr_price_data);
            }
        }

        $this->load->view('site/book/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'data' => [
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 교재정보 조회 (ajax)
     * @param array $params
     * @return mixed
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 교재정보 조회
        $data = $this->bookFModel->findProductBookInfo($prod_code);
        $data = array_merge($data, element('0', json_decode($data['ProdPriceData'], true)));

        return $this->load->view('site/book/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }

    /**
     * 해당 교재와 연관된 온라인 단강좌 조회
     * @param array $params
     * @return CI_Output
     */
    public function lectureInfo($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 조회 조건
        $arr_condition = [
            'EQ' => ['LP.SiteCode' => $this->_site_code],
            'LKR' => ['LP.CateCode' => $this->_reqG('cate_code')]
        ];

        // 연관된 온라인 단강좌 조회
        $data = $this->bookFModel->findSalesProductLectureToBook($prod_code, $arr_condition);

        return $this->json_result(true, '', [], $data);
    }
}
