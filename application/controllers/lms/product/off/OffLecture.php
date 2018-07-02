<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class OffLecture extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor','product/off/offlecture');
    protected $helpers = array('download');
    protected $prodtypeccd = '636002';  //학원강좌
    protected $learnpatternccd = '615006'; //단과반 [학원]


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['653','654']);

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
            'campusList' => $campusList,
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
                'A.IsSaleEnd' =>$this->_reqP('search_issaleend'),
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

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    $this->_reqP('search_date_type') => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        if( strlen($this->_req('search_calc')) > 0) {
            $whereOper = $this->_req('search_calc') === '0' ? 'EQ' : 'GTE';
            $arr_condition = array_merge_recursive($arr_condition,[
                $whereOper => [
                    'F.DivisionCount' => $this->_req('search_calc')
                ],
            ]);
        }

        //var_dump($arr_condition);

        $list = [];
        $count = $this->offlectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->offlectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
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

        $codes = $this->codeModel->getCcdInArray(['653','654','613']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.OrderNum' => 'asc' ]);
        $siteList = $this->siteModel->getSiteArray(false,'CsTel');
        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');

        //var_dump($siteList);

        $prodcode = null;
        $data = null;
        $data_sale = [];
        $data_division = [];
        $data_memo = [];
        $data_content = [];
        $data_sms = null;
        $data_autolec = [];
        $data_autocoupon = [];
        $data_autofreebie = [];
        $data_sublecture = [];
        $data_lecturedate = [];

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->offlectureModel->_findProductForModify($prodcode);
            $data_sale = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_division');
            $data_memo = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_sms');
            $data_autolec = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_r_autolecture');
            $data_autocoupon = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_autofreebie = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_product_r_autofreebie');
            $data_sublecture = $this->offlectureModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
            $data_lecturedate = $this->offlectureModel->findLectureDateListForModify($prodcode);
        }

        $this->load->view('product/off/offlecture/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'studypattern_ccd'=>$codes['653']       //수강형태(학원) [653]
            ,'studyapply_ccd'=>$codes['654']          //수강신청구분(학원) [654]
            ,'salestype_ccd'=>$codes['613'] //강좌제공구분
            ,'courseList'=>$courseList      //과정
            ,'subjectList'=>$subjectList    //과목
            ,'siteList' =>$siteList           //사이트목록
            ,'campusList' =>$campusList     //캠퍼스목록
            ,'prodcode' => $prodcode
            ,'data'=>$data
            ,'data_sale'=>$data_sale
            ,'data_division'=>$data_division
            ,'data_memo'=>$data_memo
            ,'data_content'=>$data_content
            ,'data_sms'=>$data_sms
            ,'data_autolec'=>$data_autolec
            ,'data_autocoupon'=>$data_autocoupon
            ,'data_autofreebie'=>$data_autofreebie
            ,'data_sublecture'=>$data_sublecture
            ,'data_lecturedate' =>$data_lecturedate
        ]);
    }

    /**
     * 마스터강의 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download($fileinfo=[])
    {
        public_download($fileinfo[0],$fileinfo[1]);
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

        $result = $this->offlectureModel->{$method.'Product'}($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 강좌복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'prodCode', 'label' => '상품코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $prodcode = $this->_reqP('prodCode');

        $result = $this->offlectureModel->_prodCopy($prodcode);
        //var_dump($result);exit;
        $this->json_result($result,'저장 되었습니다.',$result);
    }


    /**
     * 강좌 개설/접수 변경
     */
    public function reoption()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->offlectureModel->_modifyOptionByColumn($this->_reqP('prodCode'), $this->_reqP('IsLecOpen'), $this->_reqP('IsSaleEnd'));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
    
}