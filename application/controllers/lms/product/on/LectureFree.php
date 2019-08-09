<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class LectureFree extends CommonLecture
{
    /*
     * CommonLecture 로 이관
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor','product/on/lectureFree');
    protected $helpers = array('download');
    */
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615005'; //무료강좌

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['652','618']);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/on/lecturefree/index',[
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'FreeLecType_ccd' => $codes['652'],
            'Sales_ccd' => $codes['618'],
        ]);
    }

    /**
     * 강좌목록 추출
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'C.CateCode' => $this->_reqP('search_md_cate_code'),
                'B.SchoolYear' => $this->_reqP('search_schoolyear'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'B.FreeLecTypeCcd' =>$this->_reqP('search_freelectype_ccd'),
                'Be.wProgressCcd' =>$this->_reqP('search_wprogress_ccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
        ];

        //교수 관리자의 경우 본인의 과정만 추출
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == $this->config->item('prof_role_idx')) {
            if(empty($this->session->userdata("admin_wprof_idx")) === false) {
                $arr_condition = array_merge_recursive($arr_condition,[
                    'EQ' => [
                        'E.wProfIdx' => $this->session->userdata("admin_wprof_idx")
                    ]
                ]);
            }

        } else {
            $arr_condition = array_merge($arr_condition,[
                'LKB' => [
                    'E.ProfIdx_String' => $this->_reqP('search_prof_idx'),
                ]
            ]);
        }

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

        //var_dump($arr_condition);

        $list = [];
        $count = $this->lectureFreeModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureFreeModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['609','610','613','616','617','618','652']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.SubjectName' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회

        $prodcode = null;
        $data = null;
        $data_sample = null;
        $data_division = [];
        $data_memo = [];
        $data_content = [];
        $data_sms = null;
        $data_book = [];
        $data_sublecture = [];


        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->lectureFreeModel->_findProductForModify($prodcode);
            $data_sample = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_lecture_sample');
            $data_division = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_division');
            $data_memo = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_book = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_product_r_product','636003');

            $data_sublecture = $this->lectureFreeModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
        }

        $this->load->view('product/on/lecturefree/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'freelectype_ccd'=>$codes['652']       //강좌유형
            ,'lecprovision_ccd'=>$codes['613']          //강좌제공구분
            ,'contentprovision_ccd'=>$codes['609']   //강좌제공방식
            ,'bookprovision_ccd'=>$codes['610']  //교재제공구분
            ,'salestype_ccd'=>$codes['613'] //강좌제공구분
            ,'studyterm_ccd'=>$codes['616'] //수강기간설정구분
            ,'vodtype_ccd'=>$codes['617'] //VOD구분
            ,'sales_ccd'=>$codes['618'] //판매상태
            ,'courseList'=>$courseList      //과정
            ,'subjectList'=>$subjectList    //과목
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd'=>$arr_send_callback_ccd
            ,'data'=>$data
            ,'data_sample'=>$data_sample
            ,'data_division'=>$data_division
            ,'data_memo'=>$data_memo
            ,'data_content'=>$data_content
            ,'data_sms'=>$data_sms
            ,'data_book'=>$data_book
            ,'data_sublecture'=>$data_sublecture
        ]);
    }

    /**
     * 마스터강의 첨부파일 다운로드
     * @param array $fileinfo
     */
    /*
    public function download($fileinfo=[])
    {
        public_download($fileinfo[0],$fileinfo[1]);
    }
    */

    /**
     * 처리 프로세스
     */
    public function store()
    {
        $method = 'add';

        $rules = [

            ['field'=>'ProdName', 'label' => '무료단강좌명', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field'=>'CourseIdx', 'label' => '과정', 'rules' => 'trim|required'],
            ['field'=>'SubjectIdx', 'label' => '과목', 'rules' => 'trim|required'],
            ['field'=>'FreeLecTypeCcd', 'label' => '무료강좌유형', 'rules' => 'trim|required'],
            ['field'=>'PcProvisionCcd', 'label' => 'PC제공구분', 'rules' => 'trim|required'],
            ['field'=>'MobileProvisionCcd', 'label' => '모바일제공구분', 'rules' => 'trim|required'],
            ['field'=>'StudyPeriod','label'=>'수강기간', 'rules'=>'trim|required'],
        ];


        if(empty($this->_reqP('ProdCode',false))===true) {

            $rules = array_merge($rules,[
                ['field'=>'cate_code','label'=>'카테고리', 'rules'=>'trim|required'],
                ['field'=>'ProdTypeCcd','label'=>'상품타입', 'rules'=>'trim|required'],
                ['field'=>'LearnPatternCcd','label'=>'학습형태', 'rules'=>'trim|required'],
                ['field'=>'site_code','label'=>'운영사이트', 'rules'=>'trim|required'],
                ['field'=>'wLecIdx','label'=>'마스터강좌', 'rules'=>'trim|required'],
            ]);

        } else {
            $rules = array_merge($rules,[
                ['field'=>'ProdCode','label'=>'상품코드', 'rules'=>'trim|required'],
            ]);
            $method='modify';
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureFreeModel->{$method.'Product'}($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

}