<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\FrontController
{
    protected $models = array('siteF', 'categoryF', 'product/baseProductF', 'product/lectureF', 'product/packageF', 'product/professorF', 'support/supportBoardF', 'support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_def_cate_code = '';     // 기본 카테고리 코드
    protected $_bm_idx = '63';       //bmidx : 강사게시판 : 공지사항
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();

        // 학원사이트일 경우 `cate_code` 파라미터 셋팅
        $this->_def_cate_code = get_var($this->_cate_code, $this->_reqG('cate_code'));
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
        
        // 학원사이트일 경우
        if ($this->_is_pass_site === true) {
            $learn_pattern = 'off_lecture'; // 학습형태

            // 카테고리 조회
            $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

            // 카테고리 코드가 없을 경우 기본값 셋팅
            empty($this->_def_cate_code) === true && $this->_def_cate_code = array_get($arr_base['category'], '0.CateCode', '');
        } else {
            $learn_pattern = 'on_lecture';  // 학습형태

            if ($this->_site_code == '2003') {
                // 공무원사이트일 경우 카테고별 직렬, 직렬별 과목 조회
                $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_def_cate_code);
                $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_def_cate_code, element('series_ccd', $arr_input));
            } else {
                // 카테고리별 과목 조회
                $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $this->_def_cate_code);
            }

            // 신규강좌 조회 (온라인사이트만 조회)
            $arr_base['product'] = $this->lectureFModel->listSalesProduct($learn_pattern, false
                , ['EQ' => ['SiteCode' => $this->_site_code, 'IsNew' => 'Y'], 'LKR' => ['CateCode' => $this->_def_cate_code]]
                , 5, 0, ['ProdCode' => 'desc']);
        }

        // 전체 교수 조회
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, ['ProfReferData', 'ProfEventData', 'IsNew'], $this->_def_cate_code);

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

        // 교수 정보 조회
        $data = $this->professorFModel->findProfessorByProfIdx($prof_idx);
        if (empty($data) === true) {
            show_alert('해당하는 교수정보가 없습니다.', 'back');
        }

        // 학습형태
        $learn_pattern = $this->_is_pass_site === true ? 'off_lecture' : 'on_lecture';

        // 전체 교수 조회
        $arr_professor = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, $this->_def_cate_code);

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'ProfNickName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 교수 참조 정보
        $data['ProfReferData'] = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);

        // 교수 배너 정보
        $data['ProfBnrData'] = $this->professorFModel->listProfessorBanner($prof_idx);

        // 베스트강좌 상품 조회
        $arr_condition = [
            'EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $this->_site_code, 'SubjectIdx' => element('subject_idx', $arr_input), 'IsBest' => 'Y'],
            'LKR' => ['CateCode' => $this->_def_cate_code]
        ];

        $best_product = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, 4, 0, ['ProdCode' => 'desc']);
        $best_product = array_map(function ($arr) {
            $arr['ProdPriceData'] = json_decode($arr['ProdPriceData'], true);
            $arr['LectureSampleData'] = empty($arr['LectureSampleData']) === false ? json_decode($arr['LectureSampleData'], true) : [];
            return $arr;
        }, $best_product);

        // 선택된 탭에 맞는 정보 조회
        $is_tab_select = isset($arr_input['tab']);
        $arr_input['tab'] = element('tab', $arr_input, 'home');
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($prof_idx, $data['wProfIdx'], $arr_input,$data['OnLecViewCcd']);

        // 게시판 사용 유무에 탭 버튼 개수 설정
        $temp_UseBoardJson = array($data['IsNoticeBoard'], $data['IsQnaBoard'], $data['IsDataBoard'], $data['IsTpassBoard'], $data['IsTccBoard']);
        $tabUseCount = 3;
        foreach ($temp_UseBoardJson as $key => $val) {
            if ($val == 'Y') {
                $tabUseCount += 1;
            }
        }
        $data['tabUseCount'] = $tabUseCount;

        // 게시판식별자 초기화
        unset($arr_input['board_idx']);
        
        $this->load->view('site/professor/show', [
            'arr_input' => $arr_input,
            'arr_subject2professors' => $arr_subject2professor,
            'def_cate_code' => $this->_def_cate_code,
            'prof_idx' => $prof_idx,
            'data' => $data,
            'best_product' => $best_product,
            'tab_data' => $tab_data,
            'is_tab_select' => $is_tab_select
        ]);
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
        // 학습형태
        $learn_pattern = $this->_is_pass_site === true ? 'off_lecture' : 'on_lecture';

        // 게시판 기본 조건
        $arr_condition = [
            'EQ' => [
                'b.IsUse' => 'Y'
            ]
        ];
        // 공지사항 조회
        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['b.BmIdx' => '63']]);
        $data['notice'] = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', 'b.BoardIdx, b.Title', 2, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);
        
        // 학습자료실 조회
        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['b.BmIdx' => '69']]);
        $data['material'] = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', 'b.BoardIdx, b.Title', 2, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);
        
        // 신규강좌 조회
        $arr_condition = [
            'EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $this->_site_code, 'SubjectIdx' => element('subject_idx', $arr_input), 'IsNew' => 'Y'],
            'LKR' => ['CateCode' => $this->_def_cate_code]
        ];

        $data['new_product'] = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, 2, 0, ['ProdCode' => 'desc']);

        // 수강후기 조회
        $data['study_comment'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_def_cate_code, element('subject_idx', $arr_input), 2);
        $data['study_comment'] = $data['study_comment'] != 'N' ? json_decode($data['study_comment'], true) : [];

        return [
            'notice' => element('notice', $data, []),
            'material' => element('material', $data, []),
            'new_product' => element('new_product', $data, []),
            'study_comment' => element('study_comment', $data, []),
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
    private function _tab_open_lecture($prof_idx, $wprof_idx, $arr_input = [], $on_lec_view_ccd='719001')
    {
        $site_group_code = config_app('SiteGroupCode');     // 사이트그룹 코드

        // 온라인, 학원 사이트 코드 조회 (온라인 : on => 2001, 학원 : off => 2002)
        $arr_site_code = $this->siteFModel->getSiteCodeByGroupCode($site_group_code);

        // 온라인, 학원 교수식별자 조회 (온라인 : on => 50004, 학원 : off => 50079)
        $arr_prof_idx = $this->professorFModel->getProfIdxBySiteGroupCode($wprof_idx, $site_group_code);

        // 온라인 과정 조회
        if ($this->_is_pass_site === true) {
            // 학원사이트일 경우 등록된 과정 조회
            $data['on_course'] = $this->baseProductFModel->listCourse($arr_site_code['on']);
        } else {
            // 온라인사이트일 경우 과정 소트매핑 조회
            $data['on_course'] = $this->baseProductFModel->listCourseCategoryMapping($arr_site_code['on'], $this->_def_cate_code);
        }

        $on_subjects = [];
        if (empty($arr_prof_idx['on']) === false) {

            if($on_lec_view_ccd == '719002') {  //과목별 노출형태일 경우
                //해당강사 모든 강좌의 과목연결 직렬 추출
                $data['setting_series'] = $this->_getOnLectureSeries($arr_site_code['on'],$arr_prof_idx['on']);
                //강좌상품을 추출하기 위한 결과삽입
                $arr_input['setting_series'] = $data['setting_series'];

                // 온라인 단강좌 조회
                $list = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);

                //추출된 단강좌의 과목 추출
                $on_subjects = array_pluck($this->baseProductFModel->listSubject($arr_site_code['on'], array_unique(array_pluck($list, 'SubjectIdx'))), 'SubjectName', 'SubjectIdx');

                foreach ($list as $idx => $row) {
                    $data['on_lecture'][$row['SubjectIdx']][] = $row;
                }
            } else {
                // 온라인 단강좌 조회
                $data['on_lecture'] = $this->_getOnLectureData('on_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }

            // 온라인 패키지 조회
            $adminpack_lecture_type_ccd = ['on_pack_normal' => '648001', 'on_pack_choice' => '648002'];
            foreach ($adminpack_lecture_type_ccd as $key => $code) {
                $data[$key] = $this->_getOnPackageData('adminpack_lecture', $code, $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
            }
        }

        if (empty($arr_prof_idx['off']) === false) {
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
            'on_lecture' => element('on_lecture', $data, []),
            'on_pack_normal' => element('on_pack_normal', $data, []),
            'on_pack_choice' => element('on_pack_choice', $data, []),
            'off_lecture' => element('off_lecture', $data, []),
            'off_pack_lecture' => element('off_pack_lecture', $data, []),
            'study_comment' => element('study_comment', $data, []),
            'series' => element('setting_series', $data, []),
            'on_subject' => $on_subjects
        ];
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
        //기본 직렬
        $setting_series = element('setting_series', $arr_input);

        //선택한 직렬
        $series = element('series', $arr_input);

        //선택한 직렬의 과목값
        $series_subjectidx = [];

        //선택한 직렬코드가 존재할 경우 해당 직렬의 과목코드를 추출하여 강좌 상품을 추출
        if( empty($series) != true) {
            if(empty($setting_series) != true) {
                foreach ( $setting_series as $row ) {
                    if($row['ChildCcd'] == $series) {
                        $series_subjectidx = explode(',',$row['subject_arr']);
                    }
                }
            }
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

        //선택한 직렬의 과목
        if(empty($series_subjectidx) != true) {
            $arr_condition ['IN']['SubjectIdx'] = $series_subjectidx;
        }

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
     * @param $adminpack_lecture_type_ccd
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_input
     * @return array
     */
    private function _getOnPackageData($learn_pattern, $adminpack_lecture_type_ccd, $site_code, $prof_idx, $arr_input = [])
    {
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
            'EQ' => ['SiteCode' => $site_code],
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

        $data = $this->lectureFModel->listSalesProduct($learn_pattern, false, $arr_condition, null, null, ['ProdCode' => 'desc']);

        // 상품 json 데이터 decode
        $data = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            return $row;
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
        $add_condition = [
            'EQ' => [
                'A.SiteCode' => $site_code
                ,'A.ProfIdx' => $prof_idx
            ]
            ,'LKR' => [
                'A.CateCode' => $this->_def_cate_code
            ]
        ];
        $order = [
            'B.ChildCcd' => 'ASC'
        ];
        $data = $this->lectureFModel->findProductSubjectSeries($add_condition, $order);
        return $data;
    }



    private function _getOnLectureSeriesSubject($learn_pattern, $site_code, $prof_idx, $arr_input = [])
    {
        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $site_code, 'CourseIdx' => element('course_idx', $arr_input)]];
        if ($this->_is_pass_site === false) {
            // 온라인 사이트일 경우 카테고리 조건 추가
            $arr_condition['LKR']['CateCode'] = $this->_def_cate_code;
        }

        if ($learn_pattern == 'on_free_lecture') {
            // 보강동영상 제외
            $arr_condition['EQ']['FreeLecTypeCcd'] = $this->lectureFModel->_free_lec_type_ccd['normal'];
        }

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

        $data['on_free_lecture'] = [];
        if (empty($arr_prof_idx['on']) === false) {
            $data['on_free_lecture'] = $this->_getOnLectureData('on_free_lecture', $arr_site_code['on'], $arr_prof_idx['on'], $arr_input);
        }

        // 온라인 사이트일 경우만 수강후기 조회
        $data['study_comment'] = [];
        if ($this->_is_pass_site === false) {
            $data['study_comment'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_def_cate_code, element('subject_idx', $arr_input), 3);
            $data['study_comment'] = $data['study_comment'] != 'N' ? json_decode($data['study_comment'], true) : [];
        }

        return [
            'on_free_lecture' => element('on_free_lecture', $data, []),
            'study_comment' => element('study_comment', $data, []),
        ];
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
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);
        $frame_params .= '&view_type=prof';

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
        $frame_params = 's_cate_code='.$this->_def_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.element('subject_idx',$arr_input);

        // iframe list, show 분기 처리
        if (empty(element('board_idx', $arr_input)) === false) {
            $frame_path = '/prof/material/show';
            $frame_params .= '&view_type=prof'.'&board_idx='.element('board_idx', $arr_input);
        } else {
            $frame_path = '/prof/material/index';
        }
        $frame_params .= '&view_type=prof';
        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
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

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
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

        $data = [
            'frame_path' => $frame_path,
            'frame_params' => $frame_params
        ];
        return $data;
    }
}
