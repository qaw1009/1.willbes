<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class PackageUser extends CommonLecture
{
    /*
   * CommonLecture 로 이관
   protected $models = array('sys/wCode', 'sys/site', 'sys/code', 'sys/category', 'product/on/packageUser');
   protected $helpers = array('download');
    */
   protected $prodtypeccd = '636001';  //온라인강좌
   protected $learnpatternccd = '615002'; //사용자 패키지
   protected $copy_prodtype = 'packageuser';  //복사 타입

   public function __construct()
   {
       parent::__construct();
   }

   public function index()
   {
       //공통코드      - 판매여부
       $codes = $this->codeModel->getCcdInArray(['618']);

       $category_data = $this->categoryModel->getCategoryArray();
       $arr_category = [];
       foreach ($category_data as $row) {
           $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
           $arr_category[$arr_key][] = $row;
       }

       $this->load->view('product/on/packageuser/index',[
           'arr_lg_category' => element('LG', $arr_category, []),
           'arr_md_category' => element('MD', $arr_category, []),
           'Sales_ccd' => $codes['618'],
       ]);
   }

   /**
    * 강좌목록
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
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
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

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'A.RegDatm' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        //var_dump($arr_condition);
        $list = [];
        $count = $this->packageUserModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->packageUserModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 패키지 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['611','612','618','635']); // 수강배수,수강배수적용구분,판매상태
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회

        $prodcode = null;
        $data = null;
        $data_memo = [];
        $data_sms = null;
        $data_autolec = [];
        $data_autocoupon = [];
        $data_autofreebie = [];
        $data_sublecture = [];
        $data_packsaleinfo = [];

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->packageUserModel->_findProductForModify($prodcode);
            $data_memo = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_sms = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_sms');

            $data_autolec = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_r_product','636001');
            $data_autofreebie = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_r_product','636004');

            $data_autocoupon = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_sublecture = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
            $data_packsaleinfo = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_pack_saleinfo');
        }

        $this->load->view('product/on/packageuser/create',[
            'method'=>$method
            ,'prodtypeccd' => $this->prodtypeccd
            ,'learnpatternccd' => $this->learnpatternccd
            ,'multiplelimit_ccd'=>$codes['611'] //수강배수
            ,'multipleapply_ccd'=>$codes['612'] //수강배수적용구분
            ,'sales_ccd'=>$codes['618'] //판매상태
            ,'pointapply_ccd' => $codes['635']  //포인트적립타입
            ,'prodcode' => $prodcode
            ,'arr_send_callback_ccd' =>$arr_send_callback_ccd
            ,'data'=>$data
            ,'data_memo'=>$data_memo
            ,'data_sms'=>$data_sms
            ,'data_autolec'=>$data_autolec
            ,'data_autocoupon'=>$data_autocoupon
            ,'data_autofreebie'=>$data_autofreebie
            ,'data_sublecture'=>$data_sublecture
            ,'data_packsaleinfo'=>$data_packsaleinfo
        ]);
    }

    /**
     * 처리 프로세스
     */
    public function store() {
        $method = 'add';

        $rules = [
            ['field'=>'ProdName', 'label' => '사용자패키지명', 'rules' => 'trim|required'],
            ['field'=>'SchoolYear', 'label' => '대비학년도', 'rules' => 'trim|required'],
        ];

        if(empty($this->_reqP('ProdCode',false))===true) {

            $rules = array_merge($rules,[
                ['field'=>'cate_code','label'=>'카테고리', 'rules'=>'trim|required'],
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

        $result = $this->packageUserModel->{$method.'Product'}($this->_reqP(null),'packageuser');
        $this->json_result($result, '저장 되었습니다.', $result);
    }

//    /**
//     * 강좌복사
//     */
//    public function copy()
//    {
//        $rules = [
//            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
//            ['field' => 'prodCode', 'label' => '상품코드', 'rules' => 'trim|required']
//        ];
//
//        if ($this->validate($rules) === false) {
//            return;
//        }
//
//        $prodcode = $this->_reqP('prodCode');
//
//        $result = $this->packageUserModel->_prodCopy($prodcode,'packageuser');
//        //var_dump($result);exit;
//        $this->json_result($result,'복사 되었습니다.',$result);
//    }

}