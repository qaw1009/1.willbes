<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class PackageAdmin extends CommonLecture
{
    /*
   * CommonLecture 로 이관
   protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/professor','product/on/packageAdmin');
   protected $helpers = array('download');
    */
   protected $prodtypeccd = '636001';              //온라인강좌
   protected $learnpatternccd = '615003';          //운영자 패키지
   protected $copy_prodtype = 'packageadmin';  //복사 타입

   public function __construct()
   {
       parent::__construct();
   }

   public function index()
   {
       $arr_site_code = get_auth_on_off_site_codes('N', true);
       $def_site_code = key($arr_site_code);

       //공통코드
       $codes = $this->codeModel->getCcdInArray(['618','648']);

       $category_data = $this->categoryModel->getCategoryArray();
       $arr_category = [];
       foreach ($category_data as $row) {
           $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
           $arr_category[$arr_key][] = $row;
       }

       $this->load->view('product/on/packageadmin/index',[
           'arr_lg_category' => element('LG', $arr_category, []),
           'arr_md_category' => element('MD', $arr_category, []),
           'Sales_ccd' => $codes['618'],
           'Packtype_ccd' => $codes['648'],
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
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'B.PackTypeCcd' =>$this->_reqP('search_packtype_ccd'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
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
        $count = $this->packageAdminModel->listLecture(true, $arr_condition,null,null,[],$arr_condition_add);

        if ($count > 0) {
            $list = $this->packageAdminModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc'],$arr_condition_add);
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
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['609','611','612','613','616','617','618','648','649','696','635']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회

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

            $data = $this->packageAdminModel->_findProductForModify($prodcode);
            $data_sale = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_division','packageadmin');
            $data_memo = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_autolec = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');

            $data_autocoupon = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->packageAdminModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
        }

        $this->load->view('product/on/packageadmin/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'lecprovision_ccd'=>$codes['613']          //상품판매구분
            ,'contentprovision_ccd'=>$codes['609']   //강좌제공방식
            ,'multiplelimit_ccd'=>$codes['611'] //수강배수
            ,'multipleapply_ccd'=>$codes['612'] //수강배수적용구분
            ,'salestype_ccd'=>$codes['613'] //상품판매구분
            ,'studyterm_ccd'=>$codes['616'] //수강기간설정구분
            ,'vodtype_ccd'=>$codes['617'] //VOD구분
            ,'sales_ccd'=>$codes['618'] //판매상태
            ,'packtype_ccd'=>$codes['648'] //패키지유형
            ,'packcate_ccd'=>$codes['649'] //패키지분류
            ,'extcorp_ccd'=>$codes['696'] //외부수강업체코드
            ,'pointapply_ccd' => $codes['635']  //포인트적립타입
            ,'courseList'=>$courseList      //과정
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
        $method = 'add';

        $rules = [
            ['field'=>'ProdName', 'label' => '운영자패키지명', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field'=>'StudyPeriod','label'=>'수강기간', 'rules'=>'trim|required'],
            ['field'=>'PcProvisionCcd', 'label' => 'PC제공구분', 'rules' => 'trim|required'],
            ['field'=>'MobileProvisionCcd', 'label' => '모바일제공구분', 'rules' => 'trim|required'],
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

        $result = $this->packageAdminModel->{$method.'Product'}($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}