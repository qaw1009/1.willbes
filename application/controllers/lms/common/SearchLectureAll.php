<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLectureAll extends \app\controllers\BaseController
{
    protected $models = array('sys/code','sys/site','sys/category','product/base/course','product/base/subject','product/on/lecture','product/on/packageAdmin','product/on/packagePeriod','product/off/offLecture','product/off/offPackageAdmin');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $site_code = $this->_req('site_code');
        $prod_type = $this->_req('prod_type');
        $LearnPatternCcd = $this->_req('LearnPatternCcd');
        $prod_tabs = array_filter(explode(',', $this->_req('prod_tabs')));  // 노출되는 상품 탭
        $hide_tabs = array_filter(explode(',', $this->_req('hide_tabs')));  // 비노출되는 상품 탭
        $is_event = get_var($this->_req('is_event'), 'N');  // change 이벤트 발생 여부
        $is_single = get_var($this->_req('is_single'), '');  // 단일선택 여부
        $is_off_site = false;   // 학원 사이트 여부
        $is_package = false;    // 패키지 여부
        $arr_code = [];

        // 학습형태 디폴트값 설정
        if ($prod_type == 'on' && empty($LearnPatternCcd) === true) {
            $LearnPatternCcd = '615001';    // 단강좌
        } elseif ($prod_type == 'off' && empty($LearnPatternCcd) === true) {
            $LearnPatternCcd = '615006';    // 단과반
        }

        // 학원사이트 여부 (단과반/종합반일 경우)
        if (in_array($LearnPatternCcd, ['615006', '615007']) === true) {
            $is_off_site = true;
        }

        // 패키지 여부 (단강좌/단과반이 아닌 경우)
        if (in_array($LearnPatternCcd, ['615001', '615006']) === false) {
            $is_package = true;
        }
        
        if (empty($site_code) === false) {
            // 학원사이트일 경우만 조회
            if ($is_off_site === true) {
                $arr_code['arr_campus'] = $this->siteModel->getSiteCampusArray($site_code);
            }

            // 단강좌/단과반일 경우만 조회
            if ($is_package === false) {
                $arr_code['arr_course'] = $this->courseModel->getCourseArray($site_code);
                $arr_code['arr_subject'] = $this->subjectModel->getSubjectArray($site_code);
            }

            // 대분류 카테고리 조회
            $arr_code['arr_category'] = $this->categoryModel->getCategoryArray($site_code, '', '', '1');
        }

        $this->load->view('common/search_lecture_all', array_merge([
            'prod_type' => $prod_type,
            'prod_tabs' => $prod_tabs,
            'hide_tabs' => $hide_tabs,
            'is_event' => $is_event,
            'is_single' => $is_single,
            'site_code' => $site_code,
            'return_type' => $this->_req('return_type'),
            'target_id' => $this->_req('target_id'),
            'target_field' => $this->_req('target_field'),
            'LearnPatternCcd' => $LearnPatternCcd,
            'is_package' => $is_package
        ], $arr_code));
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $LearnPatternCcd = $this->_reqP('LearnPatternCcd');

        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $LearnPatternCcd,
                'B.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'A.SiteCode' => $this->_reqP('site_code'),
                'Ca.GroupCateCode' => $this->_reqP('search_lg_cate_code')
            ]
        ];

        if($this->_reqP('locationid') == 'tar') {
            $arr_condition = array_merge_recursive($arr_condition, [
                'EQ' => [
                    'B.LecSaleType' => 'B',
                ],
            ]);
        }

        $arr_condition = array_merge($arr_condition, [
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'E.ProfIdx_String' => $this->_reqP('search_prof_value'),
                    'E.wProfName_String' => $this->_reqP('search_prof_value'),
                    'Ba.CourseName' => $this->_reqP('search_prof_value')
                ]
            ],
        ]);

        if ($LearnPatternCcd == '615001') {
            $modelname = "lectureModel";
        } elseif ($LearnPatternCcd == '615003') {
            $modelname = "packageAdminModel";
        } elseif ($LearnPatternCcd == '615004') {
            $modelname = "packagePeriodModel";
        } elseif ($LearnPatternCcd == '615006') {
            $modelname = "offLectureModel";
        } elseif ($LearnPatternCcd == '615007') {
            $modelname = "offPackageAdminModel";
        }

        $list = [];
        $count = $this->{$modelname}->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->{$modelname}->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
