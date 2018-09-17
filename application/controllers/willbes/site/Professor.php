<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\FrontController
{
    protected $models = array('siteF', 'categoryF', 'product/baseProductF', 'product/lectureF', 'product/packageF', 'product/professorF', 'support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '63';       //bmidx : 강사게시판 : 공지사항
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수진 소개 메인
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $subject_idx = element('subject_idx', $arr_input);

        if ($this->_site_code == '2004') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_cate_code);
            $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_cate_code, element('series_ccd', $arr_input));
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $this->_cate_code);
        }

        // 신규강좌 조회
        $arr_base['product'] = $this->lectureFModel->listSalesProduct('on_lecture', false
            , ['EQ' => ['SiteCode' => $this->_site_code, 'IsNew' => 'Y'], 'LKR' => ['CateCode' => $this->_cate_code]]
            , 5, 0, ['ProdCode' => 'desc']);

        // 전체 교수 조회
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, ['ProfReferData', 'ProfEventData', 'IsNew'], $this->_cate_code);

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'wProfName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 선택된 과목에 맞는 교수 정보
        $arr_base['professor'] = current(element($subject_idx, $arr_subject2professor, []));

        // 교수 조회결과 재정의
        $selected_list = $selected_subjects = [];
        foreach ($arr_professor as $idx => $row) {
            if (empty($subject_idx) === true || $subject_idx == $row['SubjectIdx']) {
                $row['ProfReferData'] = $row['ProfReferData'] == 'N' ? [] : json_decode($row['ProfReferData'], true);
                $row['ProfEventData'] = $row['ProfEventData'] == 'N' ? [] : json_decode($row['ProfEventData'], true);

                $selected_subjects[$row['SubjectIdx']] = $row['SubjectName'];
                $selected_list[$row['SubjectIdx']][] = $row;
            }
        }

        $this->load->view('site/professor/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'arr_subject2professors' => $arr_subject2professor,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 교수 프로필 보기 (ajax)
     * @param array $params
     * @return CI_Output
     */
    public function profile($params = [])
    {
        $prof_idx = element('prof-idx', $params);
        if (empty($prof_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data = $this->professorFModel->findProfessorByProfIdx($prof_idx);

        $this->load->view('site/professor/profile_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }

    /**
     * 교수 상세
     * @param array $params
     */
    public function show($params = [])
    {
        $prof_idx = element('prof-idx', $params);
        if (empty($prof_idx)) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 전체 교수 조회
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, $this->_cate_code);

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'wProfName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 교수 정보 조회
        $data = $this->professorFModel->findProfessorByProfIdx($prof_idx);

        // 교수 참조 정보
        $data['ProfReferData'] = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);

        // 수강후기 조회
        $data['StudyCommentData'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_cate_code, element('subject_idx',$arr_input), 3);

        // 상품정보 조회
        // 상품조회 기본조건
        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $this->_site_code, 'SubjectIdx' => element('subject_idx',$arr_input)],
            'LKR' => ['CateCode' => $this->_cate_code]
        ];
        $order_by = ['ProdCode' => 'desc'];

        // 베스트강좌 조회
        $products['best'] = $this->lectureFModel->listSalesProduct('on_lecture', false
            , array_merge_recursive($arr_condition, ['EQ' => ['IsBest' => 'Y']]), 4, 0, $order_by);

        $products['best'] = array_map(function ($arr) {
            $arr['ProdPriceData'] = json_decode($arr['ProdPriceData'], true);
            $arr['LectureSampleData'] = json_decode($arr['LectureSampleData'], true);
            return $arr;
        }, $products['best']);

        // 신규강좌 조회
        $products['new'] = $this->lectureFModel->listSalesProduct('on_lecture', false
            , array_merge_recursive($arr_condition, ['EQ' => ['IsNew' => 'Y']]), 2, 0, $order_by);

        // 선택된 탭에 맞는 정보 조회
        $is_tab_select = isset($arr_input['tab']);
        $arr_input['tab'] = element('tab', $arr_input, 'open_lecture');
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($prof_idx, $data['wProfIdx'], $arr_input);

        $this->load->view('site/professor/show' . $this->_pass_site_val, [
            'arr_input' => $arr_input,
            'arr_subject2professors' => $arr_subject2professor,
            'data' => $data,
            'products' => $products,
            'tab_data' => $tab_data,
            'is_tab_select' => $is_tab_select
        ]);
    }

    /**
     * 개설강좌 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return mixed
     */
    private function _tab_open_lecture($prof_idx, $wprof_idx, $arr_input = [])
    {
        $site_group_code = config_app('SiteGroupCode');     // 사이트그룹 코드

        // 온라인, 학원 사이트 코드 조회 (온라인 : on => 2001, 학원 : off => 2002)
        $arr_site_code = $this->siteFModel->getSiteCodeByGroupCode($site_group_code);

        // 온라인, 학원 교수식별자 조회 (온라인 : on => 50004, 학원 : off => 50079)
        $arr_prof_idx = $this->professorFModel->getProfIdxBySiteGroupCode($wprof_idx, $site_group_code);

        // 온라인 과정 조회
        $data['on_course'] = $this->baseProductFModel->listCourse($arr_site_code['on']);

        if (empty($arr_prof_idx['on']) === false) {
            // 온라인 단강좌 조회
            $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);

            // 온라인 패키지 조회
            $admin_package_type_ccd = ['on_pack_normal' => '648001', 'on_pack_choice' => '648002'];
            foreach ($admin_package_type_ccd as $key => $code) {
                $data[$key] = $this->_getOnPackageData('adminpack_lecture', $code, $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
        }

        if (empty($arr_prof_idx['off']) === false) {
            // 학원 단과 조회
            $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);

            // 학원 종합반 조회
            $data['off_pack_lecture'] = [];
        }

        return [
            'on_course' => element('on_course', $data, []),
            'on_lecture' => element('on_lecture', $data, []),
            'on_pack_normal' => element('on_pack_normal', $data, []),
            'on_pack_choice' => element('on_pack_choice', $data, []),
            'off_lecture' => element('off_lecture', $data, []),
            'off_pack_lecture' => element('off_pack_lecture', $data, []),
        ];
    }

    /**
     * 학원 단과 조회
     * @param $learn_pattern
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @return array|int
     */
    private function _getOffLectureData($learn_pattern, $site_code, $prof_idx, $arr_input = [])
    {
        $arr_condition = [
            'EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $site_code],
            'IN' => ['StudyApplyCcd' => ['654002', '654003']] // 온라인 접수, 방문+온라인
        ];

        $data = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            return $row;
        }, $data);

        return $data;
    }

    /**
     * 온라인 단강좌, 무료강좌 데이터 조회
     * @param $learn_pattern
     * @param $site_code
     * @param $prof_idx
     * @param $arr_input
     * @return mixed
     */
    private function _getOnLectureData($learn_pattern, $site_code, $prof_idx, $arr_input = [])
    {
        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $site_code, 'CourseIdx' => element('course_idx', $arr_input)]];

        $data = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            unset($row['ProfReferData']);
            return $row;
        }, $data);

        return $data;
    }

    /**
     * 온라인 패키지 데이터 조회
     * @param $learn_pattern
     * @param $admin_package_type_ccd
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @return array
     */
    private function _getOnPackageData($learn_pattern, $admin_package_type_ccd, $site_code, $prof_idx, $arr_input = [])
    {
        $arr_condition = ['EQ' => ['SiteCode' => $site_code, 'PackTypeCcd' => $admin_package_type_ccd], 'LKB' => ['ProfIdx_String' => $prof_idx]];

        $data = $this->packageFModel->listSalesProduct($learn_pattern,false, $arr_condition,null,null, ['ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            return $row;
        }, $data);

        return $data;
    }

    /**
     * 무료강좌 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return mixed
     */
    private function _tab_free_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        $site_group_code = config_app('SiteGroupCode');     // 사이트그룹 코드

        // 온라인, 학원 사이트 코드 조회 (온라인 : on => 2001, 학원 : off => 2002)
        $arr_site_code = $this->siteFModel->getSiteCodeByGroupCode($site_group_code);

        // 온라인, 학원 교수식별자 조회 (온라인 : on => 50004, 학원 : off => 50079)
        $arr_prof_idx = $this->professorFModel->getProfIdxBySiteGroupCode($wprof_idx, $site_group_code);

        $data = [];
        if (empty($arr_prof_idx['on']) === false) {
            $data = $this->_getOnLectureData('on_free_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
        }

        return $data;
    }

    /**
     * 공지사항 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_notice($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_path = '/prof/notice/index';
        $frame_params = 's_cate_code='.$this->_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=frame';

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }

    /**
     * Q&A 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_qna($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_path = '/prof/qna/index';
        $frame_params = 's_cate_code='.$this->_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=frame';

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }

    /**
     * 학습자료실 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_material($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_path = '/prof/material/index';
        $frame_params = 's_cate_code='.$this->_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=frame';

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }
}
