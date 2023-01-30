<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class OffPackageAdmin extends CommonLecture
{
    /*
   * CommonLecture 로 이관
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/professor','product/off/offPackageAdmin');
    protected $helpers = array('download');
    */
    protected $prodtypeccd = '636002';                    //학원강좌
    protected $learnpatternccd = '615007';               //종합반 [학원]
    protected $copy_prodtype = 'offpackageadmin';   //복사 타입

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['648','653','654','675']);

        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/off/offpackageadmin/index',[
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'packtype_ccd'=>$codes['648'], //패키지유형
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
        $count = $this->offPackageAdminModel->listLecture(true, $arr_condition,null,null,[]);

        if ($count > 0) {
            $list = $this->offPackageAdminModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강좌목록 엑셀 변환
     * @return CI_Output
     */
    public function listExcel()
    {
        $arr_condition = $this->_setCondition();
        $other_column = '
                        Ab.SiteName, A.ProdCode, A.ProdName, Ca.CateName, Ba.CourseName, B.SchoolYear
                        ,Bi.CcdName as PackTypeCcd_Name
                        ,Bg.CcdName as CampusCcd_Name
                        ,Bd.CcdName as StudyPatternCcd_Name
                        ,concat(B.SchoolStartYear , \'/\', B.SchoolStartMonth) as SchoolStartYearMonth
                        ,A.SaleStartDatm, A.SaleEndDatm
                        ,format(D.SalePrice,0) as SalePrice, D.SaleRate, format(D.RealSalePrice,0) as RealSalePrice
                        ,if(B.IsLecOpen = \'Y\', "개설", "폐강") as IsLecOpen_Name
                        ,A.IsUse, A.RegDatm, Z.wAdminName';

        $list = $this->offPackageAdminModel->listLecture(false, $arr_condition, null, null, ['A.ProdCode' => 'desc'], $other_column);

        $headers = [
            '사이트명', '상품코드', '상품명', '카테고리', '과정',  '대비학년도'
            ,'패키지유형'
            ,'캠퍼스'
            ,'수강형태'
            ,'개강년/월'
            ,'접수시작일', '접수종료일'
            ,'정가', '할인' ,' 판매가'
            ,'개설여부'
            ,'사용여부', '등록일', '등록자'
        ];

        $file_name = '[학원]종합반상품_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d");

        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
        // download log
        $last_query = $this->offPackageAdminModel->getLastQuery();
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

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['653','654','613','648','649','675']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        //캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');

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

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->offPackageAdminModel->_findProductForModify($prodcode);
            $data_sale = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_division','offpackageadmin');
            $data_memo = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_autolec = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');

            $data_autocoupon = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->offPackageAdminModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
        }

        $this->load->view('product/off/offpackageadmin/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'studypattern_ccd'=>$codes['653']       //수강형태(학원) [653]
            ,'studyapply_ccd'=>$codes['654']          //수강신청구분(학원) [654]
            ,'salestype_ccd'=>$codes['613'] //강좌제공구분
            ,'packtype_ccd'=>$codes['648'] //패키지유형
            ,'packcate_ccd'=>$codes['649'] //패키지분류
            ,'accept_ccd' => $codes['675'] //접수상태
            ,'courseList'=>$courseList      //과정
            ,'campusList' =>$campusList     //캠퍼스목록
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd'=>$arr_send_callback_ccd
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
            ,'def_site_code' => $def_site_code
            ,'arr_site_code' => $arr_site_code
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
            ['field'=>'ProdName', 'label' => '종합반명', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field'=>'FixNumber', 'label' => '정원', 'rules' => 'trim|required'],
        ];

        if(empty($this->_reqP('ProdCode',false))===true) {

            $rules = array_merge($rules,[
                ['field'=>'cate_code','label'=>'카테고리', 'rules'=>'trim|required'],
                ['field'=>'ProdTypeCcd','label'=>'상품타입', 'rules'=>'trim|required'],
                ['field'=>'LearnPatternCcd','label'=>'학습형태', 'rules'=>'trim|required'],
                ['field'=>'site_code','label'=>'운영사이트', 'rules'=>'trim|required'],
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

        $result = $this->offPackageAdminModel->{$method.'Product'}($this->_reqP(null));
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
                'B.PackTypeCcd' =>$this->_reqP('search_packtype_ccd'),
                'B.StudyApplyCcd' =>$this->_reqP('search_studyapply_ccd'),
                'B.SchoolStartYear' =>$this->_reqP('search_schoolstartyear'),
                'B.SchoolStartMonth' =>$this->_reqP('search_schoolstartmonth'),
                'B.IsLecOpen' =>$this->_reqP('search_islecopen'),
                //'A.IsSaleEnd' =>$this->_reqP('search_issaleend'),
                'B.AcceptStatusCcd' =>$this->_reqP('search_acceptccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsDisp' =>$this->_reqP('search_is_disp'),
                'B.CampusCcd' => $this->_reqP('search_campus_code'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
            'LKB' => [
                'E.ProfIdx_String' => $this->_reqP('search_prof_idx'),
            ]
        ];

        if($this->_reqP('search_opt') === 'prod') {
            $arr_condition = array_merge($arr_condition,[
                'ORG1' => [
                    'LKB' => [
                        'A.ProdCode' => $this->_reqP('search_value'),
                        'A.ProdName' => $this->_reqP('search_value')
                    ]
                ],
            ]);
        } else if($this->_reqP('search_opt') === 'prof' && $this->_reqP('search_value') !== '') {
            $arr_condition = array_merge($arr_condition,[
                'ORG1' => [
                    'RAW' => [
                        'A.ProdCode IN ' => '(
                            select aa.ProdCode from
                                lms_product_r_sublecture aa
							    join lms_product_division bb on aa.ProdCodeSub = bb.ProdCode and bb.IsReprProf=\'Y\' and bb.IsStatus=\'Y\'
							    join lms_professor cc on bb.ProfIdx = cc.ProfIdx and cc.IsStatus =\'Y\'
							    join wbs_pms_professor dd on cc.wProfIdx = dd.wProfIdx and dd.wIsStatus=\'Y\'
							where aa.IsStatus=\'Y\'
							and dd.wProfName like \'%'. $this->_reqP('search_value') .'%\'  
                        )'
                    ]
                ],
            ]);
        }

        // 시작일
        if (!empty($this->_reqP('search_sdate'))) {
            if($this->_reqP('search_date_type') === 'SchoolStart') {  //개강년월 검색
                $arr_condition = array_merge_recursive($arr_condition, [
                    'GTE' => [
                        'concat(B.SchoolStartYear,B.SchoolStartMonth)'=> date("Ym", strtotime($this->_reqP('search_sdate')))
                    ],
                ]);
            } else {
                $arr_condition = array_merge_recursive($arr_condition, [
                    'GTE' => [
                        $this->_reqP('search_date_type') => $this->_reqP('search_sdate')
                    ],
                ]);
            }
        }

        // 종료일
        if (!empty($this->_reqP('search_edate'))) {
            if($this->_reqP('search_date_type') === 'SchoolStart') {    //개강년월 검색
                $arr_condition = array_merge_recursive($arr_condition, [
                    'LTE' => [
                        'concat(B.SchoolStartYear,B.SchoolStartMonth)'=> date("Ym", strtotime($this->_reqP('search_edate')))
                    ],
                ]);
            } else {
                $arr_condition = array_merge_recursive($arr_condition, [
                    'LTE' => [
                        $this->_reqP('search_date_type') => $this->_reqP('search_edate')
                    ],
                ]);
            }
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