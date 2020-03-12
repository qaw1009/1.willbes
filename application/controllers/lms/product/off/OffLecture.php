<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class OffLecture extends CommonLecture
{
    /*
   * CommonLecture 로 이관
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor','product/off/offLecture');
    protected $helpers = array('download');
    */
    protected $prodtypeccd = '636002';      //학원강좌
    protected $learnpatternccd = '615006'; //단과반 [학원]

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['653','654','675']);

        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/off/offlecture/index',[
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'studypattern_ccd' => $codes['653'],
            'studyapply_ccd' => $codes['654'],
            'accept_ccd' => $codes['675'],
            'campusList' => $campusList,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
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
                'B.StudyPatternCcd' =>$this->_reqP('search_studypattern_ccd'),
                'B.StudyApplyCcd' =>$this->_reqP('search_studyapply_ccd'),
                'B.SchoolStartYear' =>$this->_reqP('search_schoolstartyear'),
                'B.SchoolStartMonth' =>$this->_reqP('search_schoolstartmonth'),
                'B.IsLecOpen' =>$this->_reqP('search_islecopen'),
                //'A.IsSaleEnd' =>$this->_reqP('search_issaleend'),
                'B.AcceptStatusCcd' =>$this->_reqP('search_acceptccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'B.CampusCcd' => $this->_reqP('search_campus_code'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
            'LKB' => [
                'E.ProfIdx_String' => $this->_reqP('search_prof_idx'),
            ]
        ];

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);

        $arr_condition = array_merge($arr_condition,[
            'ORG3' => [
                'LKB' => [
                    'E.ProfIdx_String' => $this->_reqP('search_prof_value'),
                    'E.wProfName_String' => $this->_reqP('search_prof_value')
                ]
            ]
        ]);

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    $this->_reqP('search_date_type') => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
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
        $count = $this->offLectureModel->listLecture(true, $arr_condition,null,null,[],$arr_condition_add);

        if ($count > 0) {
            $list = $this->offLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc'],$arr_condition_add);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,

        ]);
    }

    /**
     * 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['610','653','654','613','675']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.SubjectName' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');
        //마스터강의실정보
        $lecture_room_info['master'] = $this->lectureRoomModel->listLectureRoom();
        //회차정보
        $lecture_room_info['unit'] = $this->lectureRoomModel->listLectureRoomUnit();

        $prodcode = null;
        $data = null;
        $data_sale = [];
        $data_division = [];
        $data_memo = [];
        $data_content = [];
        $data_sms = null;

        $data_book = [];
        $data_autolec = [];
        $data_autocoupon = [];
        $data_autofreebie = [];
        $data_sublecture = [];
        $data_lecturedate = [];
        $data_product_lecture_room = null;    //강의실좌석 상품데이타

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->offLectureModel->_findProductForModify($prodcode);
            $data_sale = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_division');
            $data_memo = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_book = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636003');
            $data_autolec = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');

            $data_autocoupon = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->offLectureModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
            $data_lecturedate = $this->offLectureModel->findLectureDateListForModify($prodcode);

            $data_product_lecture_room = $this->lectureRoomModel->findProductLectureRoom($prodcode);
        }

        $this->load->view('product/off/offlecture/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'bookprovision_ccd'=>$codes['610']  //교재제공구분
            ,'studypattern_ccd'=>$codes['653']       //수강형태(학원) [653]
            ,'studyapply_ccd'=>$codes['654']          //수강신청구분(학원) [654]
            ,'salestype_ccd'=>$codes['613'] //강좌제공구분
            ,'accept_ccd' => $codes['675'] //접수상태
            ,'courseList'=>$courseList      //과정
            ,'subjectList'=>$subjectList    //과목
            ,'campusList' =>$campusList     //캠퍼스목록
            ,'lecture_room_info' => $lecture_room_info  //마스터 강의실 정보 및 상세
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd'=>$arr_send_callback_ccd
            ,'data'=>$data
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
            ,'data_lecturedate' =>$data_lecturedate
            ,'data_product_lecture_room' => $data_product_lecture_room
            ,'def_site_code' => $def_site_code
            ,'arr_site_code' => $arr_site_code
        ]);
    }

    /**
     * 처리 프로세스
     */
    public function store()
    {
        $method = 'add';

        $rules = [
            ['field'=>'ProdName', 'label' => '단과반명', 'rules' => 'trim|required'],
            //['field'=>'CampusCcd', 'label' => '캠퍼스', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field'=>'CourseIdx', 'label' => '과정', 'rules' => 'trim|required'],
            ['field'=>'SubjectIdx', 'label' => '과목', 'rules' => 'trim|required'],
            ['field'=>'FixNumber', 'label' => '정원', 'rules' => 'trim|required'],
            ['field'=>'RealSalePrice[0]', 'label' => '수강료', 'rules' => 'trim|required'],
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

        $result = $this->offLectureModel->{$method.'Product'}($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}