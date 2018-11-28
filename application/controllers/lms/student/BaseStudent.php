<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStudent extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor','student/student');
    protected $helpers = array();
    protected $LearnPattern = null;
    protected $ProdTypeCcd = null;
    protected $ProdType = [
        'lecture' => '636001',
        'userpkg' => '636001',
        'adminpkg' => '636001',
        'periodpkg' => '636001',
        'freelecture' => '636001',
        'offlecture' => '636002',
        'offpkg' => '636002',
    ];
    protected $LearnPatternCcd = [
        'lecture' => '615001',
        'userpkg' => '615002',
        'adminpkg' => '615003',
        'periodpkg' => '615004',
        'freelecture' => '615005',
        'offlecture' => '615006',
        'offpkg' => '615007',
    ];

    public function __construct($LearnPattern = 'lecture')
    {
        $this->LearnPattern = $LearnPattern;
        $this->ProdType = $this->ProdType[$LearnPattern];

        parent::__construct();
    }

    /**
     * 리스트페이지 레이아웃
     * @return object|string
     */
    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['607','611','618']);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        return $this->load->view('/student/list_'.$this->LearnPattern, [
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'LecType_ccd' => $codes['607'],
            'Multiple_ccd' => $codes['611'],
            'Sales_ccd' => $codes['618']
        ]);
    }


    /**
     * 리스트페이지 실제 리스트
     * @return CI_Output
     */
    public function listAjax()
    {
        // 관리자 검색
        $prof_idx = $this->_reqP('search_prof_idx');
        
        // tzone 로그인중이면 검색 강사를 고정
        if($this->session->userdata('is_prof') == true){
            $prof_idx = $this->session->userdata('prof_idx');
        }
        
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->ProdTypeCcd,
                'B.LearnPatternCcd' => $this->LearnPatternCcd[$this->LearnPattern],
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'C.CateCode' => $this->_reqP('search_md_cate_code'),
                'B.SchoolYear' => $this->_reqP('search_schoolyear'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'B.LecTypeCcd' =>$this->_reqP('search_lectype_ccd'),
                'B.MultipleApply' =>$this->_reqP('search_multiple'),
                'Be.wProgressCcd' =>$this->_reqP('search_wprogress_ccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];

        if($this->_reqP('search_type') === 'lec') {
            $arr_condition = array_merge($arr_condition,[
                'ORG1' => [
                    'LKB' => [
                        'A.ProdCode' => $this->_reqP('search_value'),
                        'A.ProdName' => $this->_reqP('search_value')
                    ]
                ],
            ]);
        } elseif ($this->_reqP('search_type') === 'wlec') {
            $arr_condition = array_merge($arr_condition,[
                'ORG2' => [
                    'LKB' => [
                        'Be.wLecIdx' => $this->_reqP('search_value'),
                        'Be.wLecName' => $this->_reqP('search_value')
                    ]
                ],
            ]);
        }

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'A.RegDatm' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        $list = [];
        $count = $this->studentModel->getListLecture(true, $arr_condition);

        if($count > 0){
            $list = $this->studentModel->getListLecture(false, $arr_condition);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 수강생보기 레이아웃
     * @return object|string
     */
    public function view()
    {
        return $this->load->view('/student/view_'.$this->LearnPattern, [
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'LecType_ccd' => $codes['607'],
            'Multiple_ccd' => $codes['611'],
            'Sales_ccd' => $codes['618']
        ]);
    }


    /**
     * 수강생보기 리스트
     * @return CI_Output
     */
    public function viewAjax()
    {
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

}