<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/lectureF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'on_lecture';     // 학습형태 (단강좌, 무료강좌 구분값)
    private $_pattern_name = ['only' => '단강좌', 'free' => '무료강좌'];
    private $_pattern_banner_section = ['1003' => ['only' => '동영상수강신청_퀵배너', 'free' => '동영상수강신청_퀵배너'],   // 고등고시 
                                        '1004' => ['only' => '동영상수강신청_퀵배너', 'free' => '동영상수강신청_퀵배너'],   // 자격증
                                        '1006' => ['only' => '동영상수강신청_퀵배너', 'free' => '동영상수강신청_퀵배너'],   // 경찰간부
                                        'default' => ['only' => '수강신청_우측퀵', 'free' => '수강신청_우측퀵']];

    private $_order_by_regist_default = ['2003', '2005', '2006'];  //등록순 디폴트 정렬 사이트 코드

    public function __construct()
    {
        parent::__construct();

        if (element('pattern', $this->uri->ruri_to_assoc()) == 'free') {
            $this->_learn_pattern = 'on_free_lecture';
        }
    }

    /**
     * 단강좌 신청 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        //디폴트 적용
        if (empty(element('search_order', $arr_input))) {
            //등록일 디폴트 정렬
            if(in_array($this->_site_code, $this->_order_by_regist_default)) {
                $arr_input['search_order'] = 'regist';
            } else {
                $arr_input['search_order'] = 'course';
            }
        }

        // 카테고리 셋팅 => 모바일의 경우 select box로 카테고리 전달
        $cate_code = !(empty($this->_cate_code)) ? $this->_cate_code : element('cate_code', $arr_input);
        $cate_code_top = element('cate_code_top', $arr_input);

        // 카테고리 조회 : 모바일에서 카테고리 select box 사용
        $arr_base['category'] = [];
        $arr_base['category_top'] = [];
        $arr_base['category_default'] = $cate_code;
        $arr_base['category_top_default'] = $cate_code_top;

        if($this->_site_code === '2006') { // 자격증의 경우 2depth로 기본 카테고리 지정
            $result_list = $this->categoryFModel->listSiteCategory($this->_site_code,'2');
            if(empty($result_list) === false) {
                foreach ($result_list as $row) {
                    if($row['CateDepth'] === '2') {
                        $arr_base['category'][] = $row;
                    } else if($row['CateDepth'] === '1') {
                        $arr_base['category_top'][] = $row;
                    }
                }
            }
        } else {
            $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);
        }

        // 지정된 카테고리가 없을 경우
        if (empty($cate_code) === true) {
            $cate_code = element('cate_code', $arr_input, get_var(config_app('DefCateCode'), array_get($arr_base['category'], '0.CateCode')));
            $arr_base['category_default'] = $cate_code;
        }
        // 지정된 대분류 카테고리가 없을 경우
        if(empty($cate_code_top) === true) {
            $arr_base['category_top_default'] = substr($arr_base['category_default'], 0, 4);
        }

        // 사이트별 과목 조회
        if (config_app('SiteGroupCode') == '1002') {
            // 사이트그룹이 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $cate_code);

            if (empty($arr_base['series']) === true) {
                // 복합연결 데이터가 없을 경우 카테고리별 과목 조회
                $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
            } else {
                $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $cate_code, element('series_ccd', $arr_input));
            }

            // 온라인공무원 단강좌일 경우 과목 디폴트 설정 (0번째 과목)
            if ($this->_site_code == '2003' && $this->_learn_pattern == 'on_lecture' && isset($arr_input['subject_idx']) === false) {
                $arr_input['subject_idx'] = array_get($arr_base['subject'], '0.SubjectIdx');
            }            
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
        }

        // 과목이 선택된 경우 해당 교수 조회
        if (empty(element('subject_idx', $arr_input)) === false) {
            $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, ['StudyCommentData'], $cate_code, element('subject_idx', $arr_input));
            $arr_base['professor'] = $arr_professor;
        } else {
            $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, ['StudyCommentData'], $cate_code);
        }

        // 상품 기본조회 조건
        $arr_condition = ['EQ' => ['SiteCode' => $this->_site_code], 'LKR' => ['CateCode' => $cate_code]];

        // 과정 조회
        if ($this->_learn_pattern == 'on_lecture') {
            // 단강좌 (카테고리 소트매핑된 과정 조회)
            $arr_base['course'] = $this->baseProductFModel->listCourseCategoryMapping($this->_site_code, $cate_code);
        } else {
            // 무료강좌 (상품에 설정된 과정 조회)
            $arr_base['course'] = $this->lectureFModel->listSalesProduct($this->_learn_pattern, 'distinct(CourseIdx), CourseName', $arr_condition, null, null, ['OrderNumCourse' => 'asc']);
        }

        // 상품 검색조건 추가
        $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);  // 검색어
        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => [
                'CourseIdx' => element('course_idx', $arr_input),
                'SubjectIdx' => element('subject_idx', $arr_input),
                'ProfIdx' => element('prof_idx', $arr_input),
                'SchoolYear' => element('school_year', $arr_input)
            ],
            'LKB' => [
                $arr_search_text[0] => element('1', $arr_search_text),
            ]
        ]);

        // 수강후기 게시판 자료 추가 => 수강후기 데이터 조회 변경 (상품정보 => 교수정보)
        //$add_column = ', ifnull(fn_professor_study_comment_data(ProfIdx, SiteCode, CateCode, SubjectIdx, 3), "N") as StudyCommentData';

        // 상품 조회
        $list = $this->lectureFModel->listSalesProduct($this->_learn_pattern, false, $arr_condition, null, null, ['OrderNum' => 'desc', 'ProdCode' => 'desc']);


        // 상품조회 결과 배열 초기화
        $selected_subjects = [];
        $selected_professor_names = [];
        $selected_professor_refers = [];
        $selected_professor_study_comments = [];
        $selected_list = [];

        if (empty($list) === false) {
            // 상품조회 결과에 존재하는 과목 정보
            $selected_subjects = array_pluck($this->baseProductFModel->listSubject($this->_site_code, array_unique(array_pluck($list, 'SubjectIdx'))), 'SubjectName', 'SubjectIdx');


            // 교수정보 추출
            // 상품조회 결과에서 교수정보 추출 (교수명::슬로건)
            $selected_prod_professor_names = array_data_pluck($list, ['ProfNickNameAppellation', 'ProfSlogan'], ['SubjectIdx', 'ProfIdx']);

            // 과목별 교수맵핑 결과에서 교수정보 추출 (교수명::슬로건, 사이트 > 카테고리 > 과목별 교수 정렬값 사용)
            $selected_professor_names = array_data_pluck($arr_professor, ['ProfNickNameAppellation', 'ProfSlogan'], ['SubjectIdx', 'ProfIdx']);

            // 교수정보 병합 (과목별 교수맵핑 교수정보 기준으로 상품조회 결과에만 존재하는 교수정보 추가)
            foreach ($selected_prod_professor_names as $ord_subject_idx => $ord_prof_rows) {
                foreach ($ord_prof_rows as $ord_prof_idx => $ord_prof_info) {
                    if (isset($selected_professor_names[$ord_subject_idx][$ord_prof_idx]) === false) {
                        $selected_professor_names[$ord_subject_idx][$ord_prof_idx] = $ord_prof_info;
                    }
                }
            }

            // 상품조회 결과에 존재하는 교수 참조정보 추출
            $selected_professor_refers = array_map(function ($val) {
                return json_decode($val, true);
            }, array_pluck($list, 'ProfReferData', 'ProfIdx'));

            // 수강후기 데이터 조회 변경 (상품정보 => 교수정보)
            //$selected_professor_study_comments = array_data_pluck($list, 'StudyCommentData', ['SubjectIdx', 'ProfIdx']);    // 수강후기
            $selected_professor_study_comments = array_data_pluck($arr_professor, 'StudyCommentData', ['SubjectIdx', 'ProfIdx']);    // 수강후기

            // 상품 조회결과 재정의
            foreach ($list as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                unset($row['ProfReferData']);

                // 정렬방식이 과정순일 경우 배열키 재정의, 배열키 기준으로 재정렬하기 위해 필요 (OrderNumCourse + ProdCode)
                if (element('search_order', $arr_input) == 'course') {
                    //$selected_list[$row['SubjectIdx']][$row['ProfIdx']][str_pad($row['OrderNumCourse'], 3, '0', STR_PAD_LEFT) . $row['ProdCode']] = $row;
                    $selected_list[$row['SubjectIdx']][$row['ProfIdx']][str_pad($row['OrderNumCourse'], 3, '0', STR_PAD_LEFT) . str_pad((999 - $row['OrderNum']), 3, '0', STR_PAD_LEFT) . (300000 - $row['ProdCode'])] = $row;
                } else {
                    $selected_list[$row['SubjectIdx']][$row['ProfIdx']][] = $row;
                }
            }
        }

        // 우측 퀵 배너 섹션
        $pattern_banner_section = element(config_app('SiteGroupCode'), $this->_pattern_banner_section, $this->_pattern_banner_section['default']);

        $this->load->view('site/lecture/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'pattern' => element('pattern', $params, 'only'),
            'pattern_name' => element(element('pattern', $params, 'only'), $this->_pattern_name, '단강좌'),
            'pattern_banner_section' => element(element('pattern', $params), $pattern_banner_section),
            'data' => [
                'subjects' => $selected_subjects,
                'professor_names' => $selected_professor_names,
                'professor_refers' => $selected_professor_refers,
                'professor_study_comments' => $selected_professor_study_comments,
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 강좌상세정보 조회 (ajax)
     * @param array $params
     * @return mixed
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data['lecture'] = $this->lectureFModel->findProductByProdCode($this->_learn_pattern, $prod_code);
        $data['contents'] = $this->lectureFModel->findProductContents($prod_code);
        $data['salebooks'] = $this->lectureFModel->findProductSaleBooks($prod_code);

        return $this->load->view('site/lecture/info_modal', [
            'ele_id' => $this->_req('ele_id'),
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
        if (empty($prod_code) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상품 조회
        $data = $this->lectureFModel->findProductByProdCode($this->_learn_pattern, $prod_code, '', ['EQ' => ['IsUse' => 'Y']]);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        // 보강동영상일 경우 비밀번호 확인완료 세션 체크
        if ($this->_learn_pattern == 'on_free_lecture' && $data['FreeLecTypeCcd'] == $this->lectureFModel->_free_lec_type_ccd['bogang']) {
            if (in_array($prod_code, (array) $this->session->userdata('free_bogang_prod_codes')) === false) {
                show_alert('접근 권한이 없습니다.', 'back');
            }
        }

        // 비로그인상태 동영상일 경우 접수기간 체크
        if ($this->_learn_pattern == 'on_free_lecture' && $data['FreeLecTypeCcd'] == $this->lectureFModel->_free_lec_type_ccd['logout']) {
            if (strtotime($data['SaleStartDatm']) > strtotime(date("Y-m-d H:i:s")) || strtotime($data['SaleEndDatm']) < strtotime(date("Y-m-d H:i:s"))) {
                show_alert('접근 권한이 없습니다.', 'back');
            }
        }

        // 판매가격 정보 확인
        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true);
        if (empty($data['ProdPriceData']) === true) {
            show_alert('판매가격 정보가 없습니다.', 'back');
        }

        // 상품 데이터 가공
        $data['ProdBookData'] = json_decode($data['ProdBookData'], true);
        $data['LectureSampleData'] = json_decode($data['LectureSampleData'], true);
        $data['LectureSampleUnitIdxs'] = is_null($data['LectureSampleData']) === true ? [] : array_pluck($data['LectureSampleData'], 'wUnitIdx');
        $data['ProfReferData'] = json_decode($data['ProfReferData'], true);

        // 상품 컨텐츠
        $data['ProdContents'] = $this->lectureFModel->findProductContents($prod_code);

        // 상품 판매교재
        $data['ProdSaleBooks'] = $this->lectureFModel->findProductSaleBooks($prod_code);

        // 상품 강의 목차
        $data['LectureUnits'] = $this->lectureFModel->findProductLectureUnits($prod_code);

        // 자동지급 강좌상품
        $data['ProdAutoLectures'] = $this->lectureFModel->findProductToProduct($prod_code, 'on_lecture');

        // 우측 퀵 배너 섹션
        $pattern_banner_section = element(config_app('SiteGroupCode'), $this->_pattern_banner_section, $this->_pattern_banner_section['default']);

        $this->load->view('site/lecture/show', [
            'learn_pattern' => $data['LecSaleType'] === 'B' ? 'on_lecture_before' : $this->_learn_pattern,
            'pattern' => element('pattern', $params, 'only'),
            'pattern_name' => element(element('pattern', $params, 'only'), $this->_pattern_name, '단강좌'),
            'pattern_banner_section' => element(element('pattern', $params), $pattern_banner_section),
            'data' => $data
        ]);
    }

    /**
     * 보강동영상 비밀번호 체크
     * @param array $params
     * @return CI_Output
     */
    public function checkFreeLecPasswd($params = [])
    {
        $prod_code = element('prod-code', $params);
        $free_lec_passwd = trim($this->_reqP('free_lec_passwd'));
        $free_lec_check = trim($this->_reqP('free_lec_check'));
        
        // 필수 파라미터 체크
        if (empty($prod_code) === true) {
            return $this->json_error('필수 입력값 오류입니다.', _HTTP_BAD_REQUEST);
        }
        if ($free_lec_check !=="p" && empty($free_lec_passwd) === true) {
            return $this->json_error('비밀번호가 입력되지 않았습니다.', _HTTP_BAD_REQUEST);
        }

        // 상품 조회
        $data = $this->lectureFModel->findProductByProdCode('on_free_lecture', $prod_code, ', fn_dec(FreeLecPasswd) as FreeLecPasswdDec', ['EQ' => ['IsUse' => 'Y']]);
        if (empty($data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 보강동영상 여부 확인
        if ($data['FreeLecTypeCcd'] != $this->lectureFModel->_free_lec_type_ccd['bogang']) {
            return $this->json_error('해당 무료강좌는 보강동영상이 아닙니다.', _HTTP_NOT_FOUND);
        }

        // 비밀번호 비교
        if ($data['FreeLecPasswdDec'] != $free_lec_passwd) {
            return $this->json_error('비밀번호가 일치하지 않습니다.', _HTTP_NO_PERMISSION);
        }

        // 보강동영상 비밀번호 확인완료 세션 생성
        $sess_free_bogang_prod_codes = (array) $this->session->userdata('free_bogang_prod_codes');
        array_push($sess_free_bogang_prod_codes, $prod_code);
        $this->session->set_userdata('free_bogang_prod_codes', array_unique(array_filter($sess_free_bogang_prod_codes)));

        return $this->json_result(true, '', []);
    }

    /**
     * 강좌 연결 첨부파일 다운로드
     */
    public function download()
    {
        $filename = urldecode($this->_req('filename', false));
        $filename_ori = urldecode($this->_req('filename_ori',false));
        public_download($filename, $filename_ori);
    }
}
