<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/lectureF', 'product/packageF', 'product/professorF', 'support/supportBoardF');
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
        $data['StudyCommentData'] = $this->professorFModel->findProfessorStudyCommentData($prof_idx, $this->_site_code, $this->_cate_code, $arr_input['subject_idx'], 3);

        // 상품정보 조회
        // 상품조회 기본조건
        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $this->_site_code, 'SubjectIdx' => $arr_input['subject_idx']],
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
        $tab_data = $this->{'_tab_' . $arr_input['tab']}($prof_idx, $arr_input);

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
     * @param $prof_idx
     * @param $arr_input
     * @return mixed
     */
    private function _tab_open_lecture($prof_idx, $arr_input)
    {
        // 과정, 단강좌 조회
        $data = $this->_getLectureData('on_lecture', $prof_idx, $arr_input);

        // 추천, 선택 운영자 패키지 조회
        $admin_package_type_ccd = ['on_pack_normal' => '648001', 'on_pack_choice' => '648002'];
        $arr_condition = ['EQ' => ['SiteCode' => $this->_site_code, 'CourseIdx' => element('course_idx',$arr_input)],
            'LKR' => ['CateCode'=>$this->_cate_code],
            'LKB' => ['ProfIdx_String' => $prof_idx]
        ];
        $order_by = ['ProdCode' => 'desc'];

        foreach ($admin_package_type_ccd as $key => $code) {
            $data[$key] = $this->packageFModel->listSalesProduct('adminpack_lecture',false
                , array_merge_recursive($arr_condition, ['EQ' => ['PackTypeCcd' => $code]]),null,null, $order_by);

            $data[$key] = array_map(function ($row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                return $row;
            }, $data[$key]);
        }

        return $data;
    }

    /**
     * 무료강좌 탭
     * @param $prof_idx
     * @param $arr_input
     * @return mixed
     */
    private function _tab_free_lecture($prof_idx, $arr_input)
    {
        return $this->_getLectureData('on_free_lecture', $prof_idx, $arr_input);
    }

    /**
     * 공지사항 탭
     * @param $prof_idx
     * @param $arr_input
     * @return array
     */
    private function _tab_notice_list($prof_idx, $arr_input)
    {
        $list = null;
        $get_params = '';

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'BmIdx' => $this->_bm_idx,
                'ProfIdx' => $prof_idx,
                'SubjectIdx' =>element('subject_idx',$arr_input)
            ],
            'LKB' => ['Category_String'=>$this->_cate_code]
        ];

        $column = 'BoardIdx, CampusCcd, TypeCcd, IsBest, AreaCcd
                   ,Title, (ReadCnt + SettingReadCnt) as TotalReadCnt
                   ,CampusCcd_Name, TypeCcd_Name, AreaCcd_Name
                   ,IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                   ,IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName
                   ,SiteGroupName
                   ,SubjectName, CourseName, AttachData, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition);
        $paging = $this->pagination('/support/qna/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $data = [
            'paging' => $paging,
            'list' => $list
        ];
        return $data;
    }

    /**
     * 단강좌, 무료강좌 데이터 조회
     * @param $learn_pattern
     * @param $prof_idx
     * @param $arr_input
     * @return mixed
     */
    private function _getLectureData($learn_pattern, $prof_idx, $arr_input)
    {
        // 과정 조회
        $data['on_course'] = $this->baseProductFModel->listCourse($this->_site_code);

        // 상품조회 기본조건
        $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'SiteCode' => $this->_site_code, 'SubjectIdx' => $arr_input['subject_idx']],
            'LKR' => ['CateCode' => $this->_cate_code]
        ];
        $order_by = ['ProdCode' => 'desc'];

        // 상품 조회
        $data['on_lecture'] = $this->lectureFModel->listSalesProduct($learn_pattern, false
            , array_merge_recursive($arr_condition, ['EQ' => ['CourseIdx' => element('course_idx', $arr_input)]]), null, null, $order_by);

        // 상품 json 데이터 decode
        $data['on_lecture'] = array_map(function ($row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            unset($row['ProfReferData']);

            return $row;
        }, $data['on_lecture']);

        return $data;
    }
}
