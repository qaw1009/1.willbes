<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchOffLecture extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/off/offLecture','sys/category','product/base/course','product/base/subject');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['653']);
        $arr_lg_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        $this->load->view('common/search_off_lecture',[
            'site_code' => $this->_req('site_code')
            ,'LearnPatternCcd' => $this->_req('LearnPatternCcd')
            ,'ProdCode' => $this->_req('ProdCode')
            ,'locationid' => $this->_req('locationid')
            ,'wLecIdx' =>  $this->_req('wLecIdx')
            ,'cate_code' => $this->_req('cate_code')
            ,'CampusCcd' => $this->_req('CampusCcd')
            ,'arr_lg_category' => $arr_lg_category
            ,'arr_subject' => $this->subjectModel->getSubjectArray()
            ,'arr_course' => $this->courseModel->getCourseArray()
            ,'studypattern_ccd' => $codes['653']
        ]);
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {

        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $this->_reqP('LearnPatternCcd'),
                'A.SiteCode' => $this->_reqP('site_code'),
                'C.CateCode' => $this->_reqP('search_md_cate_code'),    //현재 미사용
                'B.CampusCcd' => $this->_reqP('CampusCcd'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'B.StudyPatternCcd' =>$this->_reqP('search_studypattern_ccd'),
                'B.SchoolYear' => $this->_reqP('search_schoolyear'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
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
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);


        $list = [];
        $count = $this->offLectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->offLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
