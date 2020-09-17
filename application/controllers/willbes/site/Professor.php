<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\FrontController
{
    protected $models = array('siteF', 'categoryF', 'product/baseProductF', 'product/lectureF', 'product/packageF', 'product/bookF', 'product/professorF', 'support/supportBoardF', 'support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_def_cate_code = '';     // 기본 카테고리 코드
    protected $_def_prod_type = '';     // 기본 상품타입
    protected $_view_type = '';         // 뷰 타입
    protected $_view_postfix = '';      // 뷰 파일 후위첨자
    protected $_bm_idx = '63';          // bmidx : 강사게시판 : 공지사항
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_order_by_regist_default = ['2003', '2005', '2006'];  // 등록순 디폴트 정렬 사이트 코드

    public function __construct()
    {
        parent::__construct();

        $this->_def_cate_code = get_var($this->_cate_code, $this->_reqG('cate_code'));      // 학원 사이트일 경우 `cate_code` 파라미터 셋팅
        $this->_def_prod_type = $this->_is_pass_site === true ? 'off_lecture' : 'on_lecture';       // 기본 상품타입 설정
        $this->_view_type = in_array($this->_site_code, ['2017', '2018']) === true ? 'v2' : 'v1';   // 뷰 타입 설정 (임용)
        $this->_view_postfix = $this->_view_type == 'v1' ? '' : '_' . $this->_view_type;            // 뷰 파일 후위첨자 (임용 : _v2)
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

        // 학원 사이트 || `cate` 값이 없을 경우
        if ($this->_is_pass_site === true || empty($this->_cate_code) === true) {
            // 카테고리 조회
            $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

            // 카테고리 코드가 없을 경우 기본값 셋팅
            empty($this->_def_cate_code) === true && $this->_def_cate_code = array_get($arr_base['category'], '0.CateCode', '');
        }

        // 온라인 사이트 && v1 뷰 타입
        if ($this->_is_pass_site === false && $this->_view_type == 'v1') {
            if ($this->_site_code == '2003') {
                // 공무원사이트일 경우 카테고별 직렬, 직렬별 과목 조회
                $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_def_cate_code);
                $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_def_cate_code, element('series_ccd', $arr_input), true);
            } else {
                // 카테고리별 과목 조회
                $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $this->_def_cate_code, true);
            }

            // 베스트강좌 조회 (온라인사이트만 조회)
            $arr_base['product'] = $this->lectureFModel->listSalesProduct('on_lecture', false
                , ['EQ' => ['SiteCode' => $this->_site_code, 'IsBest' => 'Y'], 'LKR' => ['CateCode' => $this->_def_cate_code]]
                , 5, 0, 'random');
        }

        // 전체 교수 조회
        $arr_add_condition = ['EQ' => ['P.IsDispIntro' => 'Y']];    // 교수진소개 노출여부
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, ['ProfReferData', 'ProfEventData', 'IsNew'], $this->_def_cate_code, null, true, $arr_add_condition);

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'ProfNickName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 선택된 과목에 맞는 교수 정보
        $arr_base['professor'] = current(element($subject_idx, $arr_subject2professor, []));

        // 교수 조회결과 재정의
        $selected_list = $selected_subjects = [];
        foreach ($arr_professor as $idx => $row) {
            if (empty($subject_idx) === true || $subject_idx == $row['SubjectIdx']) {
                $row['ProfReferData'] = $row['ProfReferData'] == 'N' ? [] : json_decode($row['ProfReferData'], true);
                $row['ProfEventData'] = $row['ProfEventData'] == 'N' ? [] : element('0', json_decode($row['ProfEventData'], true));

                $selected_subjects[$row['SubjectIdx']] = $row['SubjectName'];
                $selected_list[$row['SubjectIdx']][] = $row;
            }
        }

        $this->load->view('site/professor/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'arr_subject2professors' => $arr_subject2professor,
            'def_cate_code' => $this->_def_cate_code,
            'view_type' => $this->_view_type,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 교수 프로필 보기 (ajax)
     * @param array $params
     * @return mixed
     */
    public function profile($params = [])
    {
        $prof_idx = element('prof-idx', $params);
        if (empty($prof_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data = $this->professorFModel->findProfessorByProfIdx($prof_idx);

        return $this->load->view('site/professor/profile_modal', [
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

        // 교수 정보 조회
        $data = $this->professorFModel->findProfessorByProfIdx($prof_idx);
        if (empty($data) === true) {
            show_alert('해당하는 교수정보가 없습니다.', 'back');
        }

        // 전체 교수 조회
        $arr_add_condition = ['EQ' => ['P.IsDispIntro' => 'Y']];    // 교수진소개 노출여부
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, $this->_def_cate_code, null, true, $arr_add_condition);

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'ProfNickName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 과목명 파라미터가 없을 경우 LNB 메뉴용 전체 교수 정보에서 과목명 추출
        if (empty($arr_input['subject_idx']) === false && isset($arr_input['subject_name']) === false) {
            $arr_input['subject_name'] = array_key_first(element($arr_input['subject_idx'], $arr_subject2professor, []));
        }

        // 교수 참조 정보
        $data['ProfReferData'] = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);

        // 과목별 교수 참조 정보 조회
        $refer_data = $this->professorFModel->findProfessorReferData($prof_idx, ['sample_url1', 'sample_url2', 'sample_url3', 'yt_url1', 'yt_url2', 'yt_url3'], element('subject_idx', $arr_input), true);

        // 과목별 맛보기 설정, 유튜브 URL 설정
        $data['ProfReferData']['sample_url_type'] = 'S1';
        $data['ProfReferData']['sample_url'] = array_get($data['ProfReferData'], 'sample_url1');
        if (empty($refer_data['sample_url']) === false) {
            $data['ProfReferData']['sample_url_type'] = 'S' . array_key_first($refer_data['sample_url']);
            $data['ProfReferData']['sample_url'] = array_value_first($refer_data['sample_url']);
        }

        // 과목별 유튜브 URL 설정
        $data['ProfReferData']['yt_url'] = array_get($data['ProfReferData'], 'yt_url1');
        if (empty($refer_data['yt_url']) === false) {
            $data['ProfReferData']['yt_url'] = array_value_first($refer_data['yt_url']);
        }

        // 뷰 타입별 추가 데이터 조회
        $this->_getShowAddData($data, $prof_idx, $arr_input);

        // 선택된 탭에 맞는 정보 조회 및 디폴트 탭 설정
        $is_tab_select = isset($arr_input['tab']);
        $arr_input['tab'] = $this->_getShowTabId(element('tab', $arr_input), $data['IntroDefTabId']);
        if (!method_exists($this,'_tab_' . $arr_input['tab'])) {
            show_alert('잘못된 접근입니다.', 'back');
        }
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($prof_idx, $data['wProfIdx'], $arr_input, $data['OnLecViewCcd']);

        // 미선택 디폴트값 설정
        $arr_input['search_order'] = get_var(element('search_order', $arr_input), element('selected_search_order', $tab_data, ''));   // 정렬순서
        $arr_input['series'] = get_var(element('series', $arr_input), element('selected_series', $tab_data, ''));   // 직렬공통코드
        $arr_input['campus_ccd'] = get_var(element('campus_ccd', $arr_input), element('selected_campus_ccd', $tab_data, ''));   // 캠퍼스공통코드

        // 게시판식별자 초기화
        unset($arr_input['board_idx']);

        $this->load->view('site/professor/show' . $this->_view_postfix, [
            'arr_input' => $arr_input,
            'arr_subject2professors' => $arr_subject2professor,
            'def_cate_code' => $this->_def_cate_code,
            'prof_idx' => $prof_idx,
            'data' => $data,
            'tab_data' => $tab_data,
            'is_tab_select' => $is_tab_select
        ]);
    }

    /**
     * 교수진소개 상세 데이터 추가 조회
     * @param array $prof_data [교수데이터]*
     * @param int $prof_idx [교수식별자]
     * @param array $arr_input [전달파라미터]  
     */
    private function _getShowAddData(&$prof_data, $prof_idx, $arr_input = [])
    {
        // 교수 배너 정보
        if (APP_DEVICE == 'pc') {
            $prof_data['ProfBnrData'] = $this->professorFModel->listProfessorBanner($prof_idx);
        }

        if ($this->_view_type == 'v2') {
            // 공지사항 조회
            $arr_condition = ['EQ' => ['b.BmIdx' => '63', 'b.IsUse' => 'Y']];
            $prof_data['ProfNotice'] = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', 'b.BoardIdx, b.Title, b.IsBest', 2, 0, ['m.IsBest' => 'desc', 'm.BoardIdx' => 'desc']);
            
            // 강의업데이트 조회
        } else {
            if (APP_DEVICE == 'pc') {
                // 베스트강좌 상품 조회
                $prof_data['BestProduct'] = $this->_getProfBestNewProductData($prof_idx, $this->_def_prod_type, 'Best', 4, ['ProdCode' => 'desc'], $arr_input);
                $prof_data['BestProduct'] = array_map(function ($arr) {
                    $arr['ProdPriceData'] = json_decode($arr['ProdPriceData'], true);
                    $arr['LectureSampleData'] = empty($arr['LectureSampleData']) === false ? json_decode($arr['LectureSampleData'], true) : [];
                    return $arr;
                }, $prof_data['BestProduct']);

                // 게시판 사용 유무에 탭 버튼 개수 설정
                $arr_use_board_json = array($prof_data['IsNoticeBoard'], $prof_data['IsQnaBoard'], $prof_data['IsDataBoard'], $prof_data['IsTpassBoard'], $prof_data['IsTccBoard'], $prof_data['IsAnonymousBoard']);
                $prof_data['tabUseCount'] = array_get(array_count_values($arr_use_board_json), 'Y', 0) + 3;
            }
        }
    }

    /**
     * 교수진소개 상세 탭 아이디 리턴
     * @param string $tab_id
     * @param null|string $def_tab_id
     * @return mixed|string
     */
    private function _getShowTabId($tab_id, $def_tab_id = null)
    {
        if (empty($tab_id) === true) {
            if ($this->_view_type == 'v2') {
                $tab_id = get_var($def_tab_id, 'pack_lecture');
            } else {
                if ($this->_is_mobile === true) {
                    $tab_id = $this->_def_prod_type;
                } else {
                    $tab_id = get_var($def_tab_id, 'home');
                }
            }
        }

        return $tab_id;
    }

    /**
     * 사이트그룹코드별 온라인/학원 사이트코드, 교수식별자 배열 리턴
     * @param int $wprof_idx [WBS 교수식별자]
     * @return array
     */
    private function _getOnOffSiteCodeProfIdx($wprof_idx)
    {
        $site_group_code = config_app('SiteGroupCode');     // 사이트그룹 코드

        // 온라인, 학원 사이트코드, 교수식별자 조회 (온라인 : on => 2001, 50004 / 학원 : off => 2002, 50079)
        return [
            'SiteCode' => $this->siteFModel->getSiteCodeByGroupCode($site_group_code),
            'ProfIdx' => $this->professorFModel->getProfIdxBySiteGroupCode($wprof_idx, $site_group_code)
        ];
    }

    /**
     * 교수님홈 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_home($prof_idx, $wprof_idx, $arr_input = [])
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅

        // 게시판 기본 조건
        $arr_condition = ['EQ' => ['b.IsUse' => 'Y']];

        // 공지사항 조회
        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['b.BmIdx' => '63']]);
        $data['notice'] = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', 'b.BoardIdx, b.Title, b.IsBest', 2, 0, ['m.IsBest' => 'desc', 'm.BoardIdx' => 'desc']);

        // 학습자료실 조회
        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['b.BmIdx' => '69']]);
        $data['material'] = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', 'b.BoardIdx, b.Title, b.IsBest', 2, 0, ['m.IsBest' => 'desc', 'm.BoardIdx' => 'desc']);
        
        // 신규강좌 조회
        $data['new_product'] = $this->_getProfBestNewProductData($prof_idx, $this->_def_prod_type, 'New', 8, ['ProdCode' => 'desc'], $arr_input);

        // 무료강좌 조회
        if (empty($arr_prof_idx['on']) === false) {
            $data['free_lecture'] = $this->_getOnLectureData('on_free_lecture', $arr_site_code['on'], $arr_prof_idx['on'], [], 4);
        }

        // 수강후기 조회
        $data['study_comment'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_def_cate_code, element('subject_idx', $arr_input), 4);
        $data['study_comment'] = $data['study_comment'] != 'N' ? json_decode($data['study_comment'], true) : [];

        // 교재 조회 (온라인 사이트만)
        if ($this->_is_pass_site === false) {
            $data['book'] = $this->_getBookData($this->_site_code, $prof_idx, $arr_input, 4);
        }

        return [
            'notice' => element('notice', $data, []),
            'material' => element('material', $data, []),
            'new_product' => element('new_product', $data, []),
            'free_lecture' => element('free_lecture', $data, []),
            'study_comment' => element('study_comment', $data, []),
            'book' => element('book', $data, []),
        ];
    }

    /**
     * 개설강좌 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @param $on_lec_view_ccd [온라인강좌 노출형태 구분]
     * @return mixed
     */
    private function _tab_open_lecture($prof_idx, $wprof_idx, $arr_input = [], $on_lec_view_ccd = '719001')
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅

        // 온라인 과정 조회
        if ($this->_is_pass_site === true) {
            // 학원사이트일 경우 등록된 과정 조회
            $data['on_course'] = $this->baseProductFModel->listCourse($arr_site_code['on']);
        } else {
            // 온라인사이트일 경우 과정 소트매핑 조회
            $data['on_course'] = $this->baseProductFModel->listCourseCategoryMapping($arr_site_code['on'], $this->_def_cate_code);
        }

        // 온라인사이트일 경우만 조회
        if ($this->_is_pass_site === false && empty($arr_prof_idx['on']) === false) {
            if (empty(element('search_order', $arr_input)) === true) {
                // 등록일 디폴트 정렬
                if (in_array($this->_site_code, $this->_order_by_regist_default) === true) {
                    $arr_input['search_order'] = 'regist';
                } else {
                    $arr_input['search_order'] = 'course';
                }
            }

            if($on_lec_view_ccd == '719002') {  // 과목별 노출형태일 경우
                // 해당강사 모든 강좌의 과목연결 직렬 추출
                $data['setting_series'] = $this->_getOnLectureSeries($arr_site_code['on'], $arr_prof_idx['on']);

                // 강좌상품을 추출하기 위한 결과삽입
                $arr_input['setting_series'] = $data['setting_series'];

                // 선택한 직렬이 없을 경우 1번째 직렬 삽입
                if (empty($data['setting_series']) === false && empty(element('series', $arr_input)) === true) {
                    $arr_input['series'] = array_get($data['setting_series'], '0.ChildCcd');
                }

                // 온라인 단강좌 조회
                $list = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);

                // 추출된 단강좌의 과목 추출
                $data['on_subject'] = array_pluck($this->baseProductFModel->listSubject($arr_site_code['on'], array_unique(array_pluck($list, 'SubjectIdx'))), 'SubjectName', 'SubjectIdx');

                foreach ($list as $idx => $row) {
                    $data['on_lecture'][$row['SubjectIdx']][] = $row;
                }
            } else {
                // 온라인 단강좌 조회
                $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }

            // 온라인 패키지 조회
            $arr_adminpack_lecture_type = ['on_pack_normal', 'on_pack_choice'];
            foreach ($arr_adminpack_lecture_type as $idx => $type) {
                $data[$type] = $this->_getOnPackageData('adminpack_lecture', $type, $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
        }

        if (empty($arr_prof_idx['off']) === false) {
            // 학원 캠퍼스 조회
            $data['off_campus'] = $this->siteFModel->getSiteCampusArray($arr_site_code['off']);
            
            // 선택된 캠퍼스가 없을 경우 1번째 캠퍼스 디폴트 선택
            if (empty($data['off_campus']) === false && empty(element('campus_ccd', $arr_input)) === true) {
                $arr_input['campus_ccd'] = (string) array_key_first($data['off_campus']);
            }

            // 학원 단과 조회
            $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);

            // 학원 종합반 조회
            $data['off_pack_lecture'] = $this->_getOffLectureData('off_pack_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
        }

        // 온라인 사이트일 경우만 수강후기 조회
        $data['study_comment'] = [];
        if ($this->_is_pass_site === false) {
            $data['study_comment'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_def_cate_code, element('subject_idx', $arr_input), 3);
            $data['study_comment'] = $data['study_comment'] != 'N' ? json_decode($data['study_comment'], true) : [];
        }

        return [
            'on_course' => element('on_course', $data, []),
            'on_subject' => element('on_subject', $data, []),
            'on_lecture' => element('on_lecture', $data, []),
            'on_pack_normal' => element('on_pack_normal', $data, []),
            'on_pack_choice' => element('on_pack_choice', $data, []),
            'off_campus' => element('off_campus', $data, []),
            'off_lecture' => element('off_lecture', $data, []),
            'off_pack_lecture' => element('off_pack_lecture', $data, []),
            'study_comment' => element('study_comment', $data, []),
            'setting_series' => element('setting_series', $data, []),
            'selected_search_order' =>  element('search_order', $arr_input),
            'selected_series' =>  element('series', $arr_input),
            'selected_campus_ccd' =>  element('campus_ccd', $arr_input)
        ];
    }

    /**
     * 동영상수강신청 탭 (모바일 전용)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_on_lecture($prof_idx, $wprof_idx, $arr_input = [])
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 온라인강좌 조회
        if (empty($arr_prof_idx['on']) === false) {
            // 디폴트 과정순 정렬 적용
            if (empty(element('search_order', $arr_input)) === true) {
                $arr_input['search_order'] = 'course';
            }

            // 온라인 단강좌 조회
            $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);

            // 온라인 패키지 조회
            $arr_adminpack_lecture_type = ['on_pack_normal', 'on_pack_choice'];
            foreach ($arr_adminpack_lecture_type as $idx => $type) {
                $data[$type] = $this->_getOnPackageData('adminpack_lecture', $type, $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
        }

        return [
            'on_lecture' => element('on_lecture', $data, []),
            'on_pack_normal' => element('on_pack_normal', $data, []),
            'on_pack_choice' => element('on_pack_choice', $data, [])
        ];
    }

    /**
     * 학원수강신청 탭 (모바일 전용)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_off_lecture($prof_idx, $wprof_idx, $arr_input = [])
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        if (empty($arr_prof_idx['off']) === false) {
            // 학원 단과 조회
            $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);

            // 학원 종합반 조회
            $data['off_pack_lecture'] = $this->_getOffLectureData('off_pack_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
        }

        return [
            'off_lecture' => element('off_lecture', $data, []),
            'off_pack_lecture' => element('off_pack_lecture', $data, [])
        ];
    }

    /**
     * 무료강좌 탭 (PC/모바일 공통)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return mixed
     */
    private function _tab_free_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅

        $data['on_free_lecture'] = [];
        if (empty($arr_prof_idx['on']) === false) {
            $data['on_free_lecture'] = $this->_getOnLectureData('on_free_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
        }

        // 온라인 사이트일 경우만 수강후기 조회 (PC 사이트일 경우만 조회)
        $data['study_comment'] = [];
        if (APP_DEVICE == 'pc' && $this->_is_pass_site === false) {
            $data['study_comment'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_def_cate_code, element('subject_idx', $arr_input), 3);
            $data['study_comment'] = $data['study_comment'] != 'N' ? json_decode($data['study_comment'], true) : [];
        }

        return [
            'on_free_lecture' => element('on_free_lecture', $data, []),
            'study_comment' => element('study_comment', $data, []),
        ];
    }

    /**
     * 패키지강의 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_pack_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 온라인 패키지 조회
        if (empty($arr_prof_idx['on']) === false) {
            $arr_adminpack_lecture_type = ['on_pack_normal', 'on_pack_choice'];
            foreach ($arr_adminpack_lecture_type as $idx => $type) {
                $data[$type] = $this->_getOnPackageData('adminpack_lecture', $type, $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
        }

        // 학원 종합반 조회
        if (empty($arr_prof_idx['off']) === false) {
            $data['off_pack_lecture'] = $this->_getOffLectureData('off_pack_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
        }

        return [
            'on_pack_normal' => element('on_pack_normal', $data, []),
            'on_pack_choice' => element('on_pack_choice', $data, []),
            'off_pack_lecture' => element('off_pack_lecture', $data, [])
        ];
    }

    /**
     * 단과강의 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_only_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 온라인 단강좌 조회
        if (empty($arr_prof_idx['on']) === false) {
            $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
        }

        // 학원 단과 조회
        if (empty($arr_prof_idx['off']) === false) {
            $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
        }

        return [
            'on_lecture' => element('on_lecture', $data, []),
            'off_lecture' => element('off_lecture', $data, [])
        ];
    }

    /**
     * 전국라이브영상반 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_live_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 수강형태가 라이브인 학원 단과 조회
        if (empty($arr_prof_idx['off']) === false) {
            $arr_input['study_pattern_ccd'] = '653002';     // 수강형태 : 라이브
            $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
        }

        return [
            'off_lecture' => element('off_lecture', $data, [])
        ];
    }

    /**
     * 특강 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_special_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 사이트별 특강 과정식별자
        $arr_special_course_idx = ['2017' => '1216', '2018' => '1225'];

        // 특강반 온라인 단강좌 조회
        if (empty($arr_prof_idx['on']) === false) {
            $arr_input['course_idx'] = array_get($arr_special_course_idx, $arr_site_code['on']);

            if (empty($arr_input['course_idx']) === false) {
                $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
            unset($arr_input['course_idx']);
        }

        // 특강반 학원 단과 조회
        if (empty($arr_prof_idx['off']) === false) {
            $arr_input['course_idx'] = array_get($arr_special_course_idx, $arr_site_code['off']);

            if (empty($arr_input['course_idx']) === false) {
                $data['off_lecture'] = $this->_getOffLectureData('off_lecture', $arr_site_code['off'], $arr_prof_idx['off'], $arr_input);
            }
            unset($arr_input['course_idx']);
        }

        return [
            'on_lecture' => element('on_lecture', $data, []),
            'off_lecture' => element('off_lecture', $data, [])
        ];
    }

    /**
     * 수강생전용 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_before_lecture($prof_idx, $wprof_idx, $arr_input)
    {
        // 온라인, 학원 사이트코드, 교수식별자 조회
        $arr_on_off_code = $this->_getOnOffSiteCodeProfIdx($wprof_idx);
        $arr_site_code = $arr_on_off_code['SiteCode'];  // 온라인, 학원 사이트코드 셋팅
        $arr_prof_idx = $arr_on_off_code['ProfIdx'];    // 온라인, 학원 교수식별자 셋팅
        $data = [];

        // 온라인 선수강좌 조회
        if (empty($arr_prof_idx['on']) === false) {

        }

        return [
            'on_before_lecture' => element('on_before_lecture', $data, []),
        ];
    }

    /**
     * 교재 탭 (v2)
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_book($prof_idx, $wprof_idx, $arr_input)
    {
        $data = $this->_getBookData($this->_site_code, $prof_idx, $arr_input);

        return [
            'book' => $data
        ];
    }

    /**
     * 교수별 베스트/신규강좌 조회
     * @param int $prof_idx [교수식별자]
     * @param string $prod_type [상품구분 (온라인강좌 : on_lecture, 학원강좌 : off_lecture)
     * @param string $is_best_new [베스트/신규강좌 구분 (베스트강좌 : Best, 신규 : New)
     * @param int $limit_cnt [조회건수]
     * @param array $order_by [정렬조건]
     * @param array $arr_input [추가파라미터]
     * @return array|int
     */
    private function _getProfBestNewProductData($prof_idx, $prod_type, $is_best_new, $limit_cnt, $order_by = [], $arr_input = [])
    {
        // 기본조건
        $arr_condition = [
            'EQ' => ['SiteCode' => $this->_site_code, 'Is' . ucfirst($is_best_new) => 'Y'],
            'LKR' => ['CateCode' => $this->_def_cate_code]
        ];

        // 단강좌/단과반 조건
        $arr_lecture_condition = array_merge_recursive($arr_condition, ['EQ' => ['ProfIdx' => $prof_idx, 'SubjectIdx' => element('subject_idx', $arr_input)]]);

        if ($prod_type == 'on_lecture') {
            // 단강좌만 조회
            $data = $this->lectureFModel->listSalesProduct('on_lecture', false, $arr_lecture_condition, $limit_cnt, 0, $order_by);
            $data = array_data_fill($data, ['LearnPattern' => 'on_lecture']);
        } else {
            // 단과반 조회
            $lecture_data = $this->lectureFModel->listSalesProduct('off_lecture', false, $arr_lecture_condition, $limit_cnt, 0, $order_by);
            $lecture_data = array_data_fill($lecture_data, ['LearnPattern' => 'off_lecture']);

            // 종합반 조회
            $arr_pack_condition = array_merge_recursive($arr_condition, ['LKB' => ['ProfIdx_String' => $prof_idx]]);
            $pack_data = $this->lectureFModel->listSalesProduct('off_pack_lecture', false, $arr_pack_condition, $limit_cnt, 0, $order_by);
            $pack_data = array_data_fill($pack_data, ['LearnPattern' => 'off_pack_lecture']);

            // 단과반/종합반 데이터 병합 후 내림차순 정렬
            $data = array_merge($lecture_data, $pack_data);
            usort($data, function($arr1, $arr2) {
                return ($arr1['ProdCode'] < $arr2['ProdCode']) ? 1 : -1;
            });

            // limit_cnt 만큼 데이터 자름 
            $data = array_slice($data, 0, $limit_cnt);
        }

        return $data;
    }

    /**
     * 온라인 단강좌, 무료강좌 데이터 조회
     * @param $learn_pattern
     * @param $site_code
     * @param $prof_idx
     * @param $arr_input
     * @param $limit_cnt
     * @return mixed
     */
    private function _getOnLectureData($learn_pattern, $site_code, $prof_idx, $arr_input = [], $limit_cnt = null)
    {
        // 기본 직렬
        $setting_series = element('setting_series', $arr_input);

        // 선택 직렬
        $series = element('series', $arr_input);

        // 전체일 경우
        if ($series == 'all') {
            $series = '';
        }

        // 선택 직렬의 과목값
        $series_subjectidx = [];

        // 선택한 직렬코드가 존재할 경우 해당 직렬의 과목코드를 추출하여 강좌상품 추출
        if (empty($setting_series) === false && empty($series) === false) {
            $series_subjectidx = explode(',', array_get(array_pluck($setting_series, 'subject_arr', 'ChildCcd'), $series, ''));
        }

        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $site_code, 'CourseIdx' => element('course_idx', $arr_input)]];
        if ($this->_is_pass_site === false) {
            // 온라인 사이트일 경우 카테고리 조건 추가
            $arr_condition['LKR']['CateCode'] = $this->_def_cate_code;
        }

        if ($learn_pattern == 'on_free_lecture') {
            // 보강동영상 제외
            $arr_condition['EQ']['FreeLecTypeCcd'] = $this->lectureFModel->_free_lec_type_ccd['normal'];
        }

        // 선택 직렬의 과목
        if (empty($series_subjectidx) === false) {
            $arr_condition ['IN']['SubjectIdx'] = $series_subjectidx;
        }

        // 상품 검색조건 추가
        $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);  // 검색어
        $arr_condition = array_merge_recursive($arr_condition, [
            'LKB' => [
                $arr_search_text[0] => element('1', $arr_search_text),
            ]
        ]);

        $limit = empty($limit_cnt) === true ? null : $limit_cnt;
        $offset = empty($limit_cnt) === true ? null : 0;
        $order_by = element('search_order', $arr_input) == 'course' ? ['OrderNumCourse' => 'asc', 'ProdCode' => 'desc'] : ['ProdCode' => 'desc'];

        $data = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, $limit, $offset, $order_by);

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
     * @param $adminpack_lecture_type
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @return array
     */
    private function _getOnPackageData($learn_pattern, $adminpack_lecture_type, $site_code, $prof_idx, $arr_input = [])
    {
        // 패키지구분 공통코드 셋팅
        $arr_adminpack_lecture_type_ccd = ['on_pack_normal' => '648001', 'on_pack_choice' => '648002'];
        $adminpack_lecture_type_ccd = array_get($arr_adminpack_lecture_type_ccd, $adminpack_lecture_type);
        
        $arr_condition = ['EQ' => ['SiteCode' => $site_code, 'PackTypeCcd' => $adminpack_lecture_type_ccd], 'LKB' => ['ProfIdx_String' => $prof_idx]];
        if ($this->_is_pass_site === false) {
            // 온라인 사이트일 경우 카테고리 조건 추가
            $arr_condition['LKR']['CateCode'] = $this->_def_cate_code;
        }

        $data = $this->packageFModel->listSalesProduct($learn_pattern,false, $arr_condition,null,null, ['ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            return $row;
        }, $data);

        return $data;
    }

    /**
     * 학원 단과, 종합반 조회
     * @param $learn_pattern
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @return array|int
     */
    private function _getOffLectureData($learn_pattern, $site_code, $prof_idx, $arr_input = [])
    {
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $site_code, 'CampusCcd' => element('campus_ccd', $arr_input),
                'StudyPatternCcd' => element('study_pattern_ccd', $arr_input), 'CourseIdx' => element('course_idx', $arr_input)
            ],
            'IN' => ['StudyApplyCcd' => ['654002', '654003']] // 온라인 접수, 방문+온라인
        ];

        if ($this->_is_pass_site === true) {
            // 학원 사이트일 경우 카테고리 조건 추가
            $arr_condition['LKR']['CateCode'] = $this->_def_cate_code;
        }        

        if ($learn_pattern === 'off_lecture') {
            $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['ProfIdx' => $prof_idx]]);
        } else {
            $arr_condition = array_replace_recursive($arr_condition, ['LKB' => ['ProfIdx_String' => $prof_idx]]);
        }

        $data = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, null, null, ['OrderNum' => 'desc', 'ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] =  (empty(element('ProdBookData',$row,[])) ?  null : json_decode($row['ProdBookData'], true));
            return $row;
        }, $data);

        return $data;
    }

    /**
     * 교재 조회
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @param null $limit_cnt
     * @return array
     */
    private function _getBookData($site_code, $prof_idx, $arr_input = [], $limit_cnt = null)
    {
        $arr_condition = [
            'EQ' => ['P.SiteCode' => $site_code, 'P.CateCode' => $this->_def_cate_code, 'P.IsSalesAble' => 'Y'],
            'LKB' => ['P.ProfIdx' => $prof_idx, 'P.SubjectIdx' => element('subject_idx', $arr_input)],
            'IN' => ['P.DispTypeCcd' => ['619001', '619003']]   // 노출위치 공통코드 (강의+서점DP, 서점DP)
        ];

        $limit = empty($limit_cnt) === true ? null : $limit_cnt;
        $offset = empty($limit_cnt) === true ? null : 0;
        $order_by = empty($limit_cnt) === true ? ['P.ProdCode' => 'desc'] : ['P.IsBest' => 'desc', 'P.ProdCode' => 'desc'];

        $data = $this->bookFModel->listSalesProductBook(false, $arr_condition, $limit, $offset, $order_by);
        $data = array_map(function ($arr) {
            $arr['ProdPriceData'] = $arr['ProdPriceData'] != 'N' ? element('0', json_decode($arr['ProdPriceData'], true)) : [];
            return $arr;
        }, $data);

        return $data;
    }

    /**
     * 교수 단강좌 상품의 직렬 추출하기
     * @param $site_code
     * @param $prof_idx
     * @return mixed
     */
    private function _getOnLectureSeries($site_code, $prof_idx)
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $site_code
                ,'A.ProfIdx' => $prof_idx
            ]
            ,'LKR' => [
                'A.CateCode' => $this->_def_cate_code
            ]
        ];
        $order_by = ['B.ChildCcd' => 'asc'];

        return $this->lectureFModel->findProductSubjectSeries($arr_condition, $order_by);
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
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);

        // iframe list, show 분기 처리
        if (empty(element('board_idx', $arr_input)) === false) {
            $frame_path = '/prof/notice/show';
            $frame_params .= '&view_type=prof'.'&board_idx='.element('board_idx', $arr_input);
        } else {
            $frame_path = '/prof/notice/index';
        }
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
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
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
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
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);

        // iframe list, show 분기 처리
        if (empty(element('board_idx', $arr_input)) === false) {
            $frame_path = '/prof/material/show';
            $frame_params .= '&view_type=prof'.'&board_idx='.element('board_idx', $arr_input);
        } else {
            $frame_path = '/prof/material/index';
        }
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
    }

    /**
     * T-pass 자료실 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_tpass($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_path = '/prof/tpass/index';
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
    }

    /**
     * TCC 동영상 탭
     * @param $prof_idx
     * @param $wprof_idx
     * @param $arr_input
     * @return array
     */
    private function _tab_tcc($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_path = '/prof/tcc/index';
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
    }

    /**
     * 익명 자유게시판 탭
     * @param int $prof_idx [교수식별자]
     * @param int $wprof_idx [WBS 교수식별자]
     * @param array $arr_input
     * @return array
     */
    private function _tab_anonymous($prof_idx, $wprof_idx, $arr_input)
    {
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);

        // iframe list, show 분기 처리
        if (empty(element('board_idx', $arr_input)) === false) {
            $frame_path = '/prof/anonymous/show';
            $frame_params .= '&view_type=prof'.'&board_idx='.element('board_idx', $arr_input);
        } else {
            $frame_path = '/prof/anonymous/index';
        }
        $frame_params .= '&view_type=prof';

        return [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
    }
}
