<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO : 주의 요망
 * 방문신청 컨트롤러(VisitOffLecture)에서 확장 사용함. 수정시 주의 요망
  */
class OffLecture extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/lectureF', 'order/cartF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_learn_pattern = 'off_lecture';     // 학습형태 (학원단과)

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 단과 신청 목록  : 
     * @param array $params
     */
    public function index($params = [])
    {
        $class_type = strtolower($this->router->class);

        /*  온라인신청 과 방문신청 분기*/
        if($class_type === 'offlecture') {
            $_study_apply_ccds = ['654001','654002', '654003']; //온라인 접수, 방문+온라인  : TODO 방문접수 까지 추가 (2019.04.05 - 최진영 차장 요청)
            $_view_page = 'site/off_lecture/index';
        } else {    //OffVisitLecture
            $_study_apply_ccds = ['654001', '654003']; //방문접수, 방문+온라인
            $_view_page = 'site/off_visit/index';
        }

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 카테고리 코드가 없을 경우 디폴트 설정
        if (isset($arr_input['cate_code']) === false) {
            $arr_input['cate_code'] = array_get($arr_base['category'], '0.CateCode');;
        }

        $cate_code = element('cate_code', $arr_input, $this->_cate_code);

        // 캠퍼스 조회
        $arr_base['campus'] = [];
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }
        
        // 카테고리가 있을 경우에만 조회
        if (empty($cate_code) === false) {
            // 과정 조회
            $arr_base['course'] = $this->baseProductFModel->listCourseCategoryMapping($this->_site_code, $cate_code);

            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
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
            ],
            'IN' => ['StudyApplyCcd' => $_study_apply_ccds] // 접수방식
        ];

        // 상품조회
        $list = $this->lectureFModel->listSalesProduct($this->_learn_pattern, false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품조회 결과 배열 초기화
        $selected_subjects = [];
        $selected_list = [];

        if (empty($list) === false) {
            // 상품조회 결과에 존재하는 과목 정보
            $selected_subjects = array_pluck($this->baseProductFModel->listSubject($this->_site_code, array_unique(array_pluck($list, 'SubjectIdx'))), 'SubjectName', 'SubjectIdx');

            // 상품 조회결과 재정의
            foreach ($list as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);

                // 정렬방식이 과정순일 경우 배열키 재정의, 배열키 기준으로 재정렬하기 위해 필요 (OrderNumCourse + ProdCode)
                if (element('search_order', $arr_input) == 'course') {
                    $selected_list[$row['SubjectIdx']][str_pad($row['OrderNumCourse'], 3, '0', STR_PAD_LEFT) . $row['ProdCode']] = $row;
                } else {
                    $selected_list[$row['SubjectIdx']][] = $row;
                }
            }
        }

        $this->load->view($_view_page, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ],
            'class_type' => $class_type     //방문신청시 패키지 여부 확인 차
        ]);
    }

    /**
     * 단과반 콘텐츠 보기
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        /*
         * 수강대상, 강좌효과, 수강후기 추출
         * */
        $add_column = ', fn_product_content(ProdCode, "633005") as Content5
                                , fn_product_content(ProdCode, "633006") as Content6
                                , fn_product_content(ProdCode, "633007") as Content7
        ';

        $data = $this->lectureFModel->findProductByProdCode($this->_learn_pattern, $prod_code,$add_column);

        $this->load->view('site/off_lecture/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }
}
