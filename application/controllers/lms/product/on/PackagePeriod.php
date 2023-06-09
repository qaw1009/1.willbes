<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class PackagePeriod extends CommonLecture
{
    /*
   * CommonLecture 로 이관
   protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/on/packagePeriod','sys/btob');
   protected $helpers = array('download');
    */
   protected $prodtypeccd = '636001';               //온라인강좌
   protected $learnpatternccd = '615004';           //기간제 패키지
   protected $copy_prodtype = 'packageperiod';  //복사 타입

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

       $this->load->view('product/on/packageperiod/index',[
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
        $arr_condition = $this->_setCondition();
        $list = [];
        $count = $this->packagePeriodModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->packagePeriodModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
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
        /* 권한 체크 */
        if (check_menu_perm('excel') !== true) {
            return null;
        }

        $arr_condition = $this->_setCondition();
        $other_column = '
                    Ab.SiteName, A.ProdCode, A.ProdName, Ca.CateName, B.SchoolYear
                    ,Bd.CcdName as PackTypeCcd_Name
                    ,B.StudyStartDate,B.StudyPeriod
                    ,A.SaleStartDatm, A.SaleEndDatm
                    ,Aa.CcdName as SaleStatusCcd_Name
                    ,format(D.SalePrice,0) as SalePrice, D.SaleRate, format(D.RealSalePrice,0) as RealSalePrice
                    ,if(B.MultipleApply = \'1\', \'배수제한없음\', B.MultipleApply) as MultipleApply
                    ,A.IsUse, A.RegDatm, Z.wAdminName';

        $list = $this->packagePeriodModel->listLecture(false, $arr_condition, null, null, ['A.ProdCode' => 'desc'], $other_column);

        $headers = [
            '사이트명', '상품코드', '상품명', '카테고리',  '대비학년도', '패키지유형', '개강일', '수강기간',  '접수시작일', '접수종료일'
            ,'판매상태', '정가', '할인' ,' 판매가', '배수적용', '사용여부', '등록일', '등록자'
        ];

        $file_name = '[온라인]기간제패키지상품_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d");

        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
        // download log
        $last_query = $this->packagePeriodModel->getLastQuery();
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
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['609','611','612','613','616','617','618','648','649','650','651','635']);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        $arr_btob = $this->btobModel->getCompanyArray();    //btob목록

        $prodcode = null;
        $data = null;
        $data_sale = [];
        $data_memo = [];
        $data_content = [];
        $data_sms = null;
        $data_autolec = [];
        $data_autocoupon = [];
        $data_autofreebie = [];
        $data_sublecture = [];
        $data_btob = null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];
            $data = $this->packagePeriodModel->_findProductForModify($prodcode);
            $data_sale = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_memo = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_sms');
            $data_autolec = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');
            $data_autocoupon = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
            $data_btob =  $this->packagePeriodModel->_findProductEtcModify($prodcode,'lms_product_r_btob');
        }

        $this->load->view('product/on/packageperiod/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'lecprovision_ccd'=>$codes['613']          //강좌제공구분
            ,'contentprovision_ccd'=>$codes['609']   //강좌제공방식
            ,'multiplelimit_ccd'=>$codes['611'] //수강배수
            ,'multipleapply_ccd'=>$codes['612'] //수강배수적용구분
            ,'salestype_ccd'=>$codes['613'] //상품판매구분
            ,'studyterm_ccd'=>$codes['616'] //수강기간설정구분
            ,'vodtype_ccd'=>$codes['617'] //VOD구분
            ,'sales_ccd'=>$codes['618'] //판매상태
            ,'packtype_ccd'=>$codes['648'] //패키지유형
            ,'packcate_ccd'=>$codes['649'] //패키지분류
            ,'packperiod_ccd'=>$codes['650'] //기간제 패키지 수강기간
            ,'packautostudyexten_ccd'=>$codes['651'] //기간제패키지 자동수강연장
            ,'pointapply_ccd' => $codes['635']  //포인트적립타입
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd'=>$arr_send_callback_ccd
            ,'arr_btob'=>$arr_btob      //btob 목록
            ,'data'=>$data
            ,'data_sale'=>$data_sale
            ,'data_memo'=>$data_memo
            ,'data_content'=>$data_content
            ,'data_sms'=>$data_sms
            ,'data_autolec'=>$data_autolec
            ,'data_autocoupon'=>$data_autocoupon
            ,'data_autofreebie'=>$data_autofreebie
            ,'data_sublecture'=>$data_sublecture
            ,'data_btob' => empty($data_btob) ? null : $data_btob[0]
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
            ['field'=>'ProdName', 'label' => '기간제패키지명', 'rules' => 'trim|required'],
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

        $result = $this->packagePeriodModel->{$method.'Product'}($this->_reqP(null));
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
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'B.PackTypeCcd' =>$this->_reqP('search_packtype_ccd'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
        ];

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);

        // 시작일
        if (!empty($this->_reqP('search_sdate'))) {
            $arr_condition = array_merge($arr_condition, [
                'GTE' => [
                    'A.RegDatm' => $this->_reqP('search_sdate')
                ],
            ]);
        }

        // 종료일
        if (!empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'LTE' => [
                    'A.RegDatm' => $this->_reqP('search_edate')
                ],
            ]);
        }

        return $arr_condition;
    }
}