<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class Lecture extends CommonLecture
{
    /*
     * CommonLecture 로 이관
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor','product/on/lecture');
    protected $helpers = array('download');
    */
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615001'; //단강좌

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['607','611','618','635']);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/on/lecture/index',[
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'LecType_ccd' => $codes['607'],
            'Multiple_ccd' => $codes['611'],
            'Sales_ccd' => $codes['618'],
            'PointApply_ccd' => $codes['635'],
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
                'B.LecTypeCcd' =>$this->_reqP('search_lectype_ccd'),
                'B.MultipleApply' =>$this->_reqP('search_multiple'),
                'Be.wProgressCcd' =>$this->_reqP('search_wprogress_ccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'Be.wIsUse'=>$this->_reqP('search_w_is_use'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ]
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

        $arr_condition_add = null;

        if( $this->_req('search_calc') == 'Y') {
            $arr_condition = array_merge_recursive($arr_condition,[
                'GTE' => [
                    'F.DivisionCount' => '1'
                ],
            ]);
        } else if( $this->_req('search_calc') == 'N') {
            $arr_condition_add = ' F.DivisionCount is null ';
        }

        $list = [];
        $count = $this->lectureModel->listLecture(true, $arr_condition,null,null,[],$arr_condition_add);

        if ($count > 0) {
            $list = $this->lectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc'],$arr_condition_add);
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

        $codes = $this->codeModel->getCcdInArray(['607','609','610','611','612','613','616','617','618','696','635']); // 강좌유형,강좌제공방식,교재제공구분,수강배수적용구분,강좌제공구분,수강기간설정구분,VOD구분,판매상태
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.SubjectName' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회

        $prodcode = null;
        $data = null;
        $data_sample = null;
        $data_sale = [];
        $data_division = [];
        $data_memo = [];
        $data_content = [];
        $data_sms = null;

        $data_book = [];
        $data_autolec = [];
        $data_autofreebie = [];

        $data_autocoupon = [];
        $data_sublecture = [];

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->lectureModel->_findProductForModify($prodcode);
            $data_sample = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_lecture_sample');
            $data_sale = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_division');
            $data_memo = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_book = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636003');
            $data_autolec = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');

            $data_autocoupon = $this->lectureModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->lectureModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
        }

        $this->load->view('product/on/lecture/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'lectype_ccd'=>$codes['607']       //강좌유형
            ,'lecprovision_ccd'=>$codes['613']          //강좌제공구분
            ,'contentprovision_ccd'=>$codes['609']   //강좌제공방식
            ,'bookprovision_ccd'=>$codes['610']  //교재제공구분
            ,'multiplelimit_ccd'=>$codes['611'] //수강배수
            ,'multipleapply_ccd'=>$codes['612'] //수강배수적용구분
            ,'salestype_ccd'=>$codes['613'] //강좌제공구분
            ,'studyterm_ccd'=>$codes['616'] //수강기간설정구분
            ,'vodtype_ccd'=>$codes['617'] //VOD구분
            ,'sales_ccd'=>$codes['618'] //판매상태
            ,'extcorp_ccd'=>$codes['696'] //외부수강업체코드
            ,'pointapply_ccd' => $codes['635']  //포인트적립타입
            ,'courseList'=>$courseList      //과정
            ,'subjectList'=>$subjectList    //과목
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd'=>$arr_send_callback_ccd
            ,'data'=>$data
            ,'data_sample'=>$data_sample
            ,'data_sale'=>$data_sale
            ,'data_division'=>$data_division
            ,'data_memo'=>$data_memo
            ,'data_content'=>$data_content
            ,'data_sms'=>$data_sms
            ,'data_book'=>$data_book
            ,'data_autolec'=>$data_autolec
            ,'data_autocoupon'=>$data_autocoupon
            ,'data_autofreebie'=>$data_autofreebie
            ,'data_sublecture'=>$data_sublecture
        ]);
    }

/*
    public function download()
    {
        $filename = urldecode($this->_req('filename', false));
        $filename_ori = urldecode($this->_req('filename_ori',false));
        public_download($filename, $filename_ori);
    }
*/

    /**
     * 처리 프로세스
     */
    public function store()
    {
        $method = 'add';

        $rules = [
            ['field'=>'ProdName', 'label' => '단강좌명', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field'=>'CourseIdx', 'label' => '과정', 'rules' => 'trim|required'],
            ['field'=>'SubjectIdx', 'label' => '과목', 'rules' => 'trim|required'],
            ['field'=>'LecTypeCcd', 'label' => '강좌유형', 'rules' => 'trim|required'],
            ['field'=>'PcProvisionCcd', 'label' => 'PC제공구분', 'rules' => 'trim|required'],
            ['field'=>'MobileProvisionCcd', 'label' => '모바일제공구분', 'rules' => 'trim|required'],
            ['field'=>'RealSalePrice[0]', 'label' => '수강료', 'rules' => 'trim|required'],
        ];

        $lectypeccd = $this->_reqP('LecTypeCcd',false);

        //일반강좌, 특강일 경우
        if( $lectypeccd ==='607001' || $lectypeccd ==='607002' ) {
            $rules = array_merge($rules,[
                ['field'=>'StudyPeriod','label'=>'수강기간', 'rules'=>'trim|required'],
            ]);
        } else {    // 직장인/재학생반
            $rules = array_merge($rules,[
                ['field'=>'WorkBaseStudyPeriod','label'=>'정상상수강기간', 'rules'=>'trim|required'],
                ['field'=>'WorkStudyPeriod','label'=>'배수적용수간기간', 'rules'=>'trim|required'],
            ]);
        }

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

        $result = $this->lectureModel->{$method.'Product'}($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}