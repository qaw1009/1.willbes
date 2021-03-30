<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLectureVariable extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/lecture','product/base/course','product/base/subject','sys/category');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = $this->_reqG(null);

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['618','648']);

        $arr_condition = [
            'EQ' => [
                'S.SiteCode' => element('site_code', $arr_input),
                'C.CateDepth' => element('cate_depth', $arr_input),
                'C.IsUse' => element('is_use', $arr_input)
            ],
            'IN' => ['S.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];

        //카테고리 목록 추출
        $cate_list = $this->categoryModel->listSearchCategory(false, $arr_condition, null, null, ['C.OrderNum' => 'ASC']);

        $this->load->view('common/search_lecture_variable',[
            'arr_input' => $arr_input
            ,'arr_subject' => $this->subjectModel->getSubjectArray()
            ,'arr_course' => $this->courseModel->getCourseArray()
            ,'sales_ccd' => $codes['618']
            ,'cate_list' => $cate_list
        ]);
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = $this->_reqP(null);
        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $this->_reqP('LearnPatternCcd'),
                'A.SiteCode' => $this->_reqP('site_code'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'C.CateCode' => $this->_reqP('cate_code'),
                'B.SchoolYear' => $this->_reqP('search_schoolyear'),
            ]
        ];

        $arr_condition = array_merge($arr_condition,[
            'NOT' => [
                'A.ProdCode' => $this->_req('ProdCode'),
            ]
        ]);

        if(empty($this->_req('wLecIdx')) !== true) {
            $arr_condition = array_merge_recursive($arr_condition,[
                'EQ' => [
                    'B.wLecIdx' => $this->_req('wLecIdx'),
                ]
            ]);
        }

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value'),
                    'E.wProfName_String' => $this->_reqP('search_professor')
                ]
            ],
        ]);

        $list = [];
        $count = $this->lectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
