<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class OffLecture extends CommonLecture
{
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
            'arr_professor' => $this->professorModel->getProfessorArray('','',['wProfName_order_by' => 'asc', 'WP.wProfName' => 'asc']),
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
        $arr_condition = $this->_setCondition();
        $list = [];
        $count = $this->offLectureModel->listLecture(true, $arr_condition,null,null,[]);

        if ($count > 0) {
            $list = $this->offLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 강좌목록 엑셀 변환
     * @return CI_Output
     */
    public function listExcel()
    {
        /* 권한 체크 */
        if (check_menu_perm('excel') !== true) {
            return null;
        }

        $arr_condition = $this->_setCondition();
        $other_column = '
                        Ab.SiteName, A.ProdCode, A.ProdName, E.wProfName_String, Ca.CateName, Ba.CourseName, Bb.SubjectName, B.SchoolYear
                        ,B.FixNumber
                        ,B.StudyStartDate,B.StudyEndDate,B.Amount
                        ,Bg.CcdName as CampusCcd_Name
                        ,concat(B.SchoolStartYear , \'/\', B.SchoolStartMonth) as SchoolStartYearMonth
                        ,A.SaleStartDatm, A.SaleEndDatm
                        ,format(D.SalePrice,0) as SalePrice, D.SaleRate, format(D.RealSalePrice,0) as RealSalePrice
                        ,if(B.IsLecOpen = \'Y\', "개설", "폐강") as IsLecOpen_Name
                        ,A.IsUse, A.RegDatm, Z.wAdminName';

        $list = $this->offLectureModel->listLecture(false, $arr_condition, null, null, ['A.ProdCode' => 'desc'], $other_column);

        $headers = [
            '사이트명', '상품코드', '상품명', '강사명', '카테고리', '과정', '과목', '대비학년도'
            ,'정원'
            ,'개강일', '종강일', '회차'
            ,'캠퍼스'
            ,'개강년/월'
            ,'접수시작일', '접수종료일'
            ,'정가', '할인' ,' 판매가'
            ,'개설여부'
            ,'사용여부', '등록일', '등록자'
        ];

        $file_name = '[학원]단과반상품_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d");

        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
        // download log
        $last_query = $this->offLectureModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);
        $arr_site_code_on = $this->siteModel->getGroupOtherSite(array_keys($arr_site_code));

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['610','653','654','613','675','731']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.SubjectName' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');
        //마스터강의실정보
        $lecture_room_info['master'] = $this->lectureRoomRegistModel->listLectureRoom();
        //회차정보
        $lecture_room_info['unit'] = $this->lectureRoomRegistModel->listLectureRoomUnit();

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
        $data_supplecture = null;

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

            $data_product_lecture_room = $this->lectureRoomRegistModel->findProductLectureRoom($prodcode);

            /* 보강동영상 온라인 강좌 정보 추출*/
            if(empty($data['SuppProdCode']) !== true) {
                $data_supplecture = $this->lectureModel->listLecture(false, ['EQ' => ['A.ProdCode' => $data['SuppProdCode']]])[0];
            }
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
            ,'correct_optionccd' => $codes['731'] //첨삭사용여부
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
            ,'arr_site_code_on' => $arr_site_code_on
            ,'data_supplecture' => $data_supplecture
        ]);
    }

    /**
     * 처리 프로세스
     */
    public function store()
    {
        /* 권한 체크 */
        if (check_menu_perm('write') !== true) {
            return null;
        }

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

    /**
     * 검색 조건
     * @return array
     */
    private function _setCondition()
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
                'B.LecSaleType' => $this->_reqP('search_lec_sale_type'),
                'A.IsDisp' =>$this->_reqP('search_is_disp'),
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


        // 시작일
        if (!empty($this->_reqP('search_sdate'))) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'GTE' => [
                    $this->_reqP('search_date_type') => $this->_reqP('search_sdate')
                ],
            ]);
        }

        // 종료일
        if (!empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'LTE' => [
                    $this->_reqP('search_date_type') => $this->_reqP('search_edate')
                ],
            ]);
        }

        // 시작일2
        if (!empty($this->_reqP('search_sdate2'))) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'GTE' => [
                    $this->_reqP('search_date_type2') => $this->_reqP('search_sdate2')
                ],
            ]);
        }

        // 종료일2
        if (!empty($this->_reqP('search_edate2'))) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'LTE' => [
                    $this->_reqP('search_date_type2') => $this->_reqP('search_edate2')
                ],
            ]);
        }

        // 정산여부
        if( $this->_req('search_calc') == 'Y') {
            $arr_condition = array_merge_recursive($arr_condition,[
                'GTE' => [
                    'F.DivisionCount' => '1'
                ],
            ]);
        } else if( $this->_req('search_calc') == 'N') {
            $arr_condition = array_merge_recursive($arr_condition,[
                'RAW' => ['F.DivisionCount is' => ' null']
            ]);
        }

        return $arr_condition;
    }
}