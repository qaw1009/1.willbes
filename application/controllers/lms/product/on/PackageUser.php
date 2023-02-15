<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/product/CommonLecture.php';

Class PackageUser extends CommonLecture
{
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615002'; //사용자 패키지
    protected $copy_prodtype = 'packageuser';  //복사 타입

   public function __construct()
   {
       parent::__construct();
   }

   public function index()
   {
       $arr_site_code = get_auth_on_off_site_codes('N', true);
       $def_site_code = key($arr_site_code);

       //공통코드      - 판매여부, 패키지유형
       $codes = $this->codeModel->getCcdInArray(['618','743']);

       $category_data = $this->categoryModel->getCategoryArray();
       $arr_category = [];
       foreach ($category_data as $row) {
           $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
           $arr_category[$arr_key][] = $row;
       }

       $this->load->view('product/on/packageuser/index',[
           'arr_lg_category' => element('LG', $arr_category, []),
           'arr_md_category' => element('MD', $arr_category, []),
           'sales_ccd' => $codes['618'],
           'pack_type_ccd' => $codes['743'],
           'def_site_code' => $def_site_code,
           'arr_site_code' => $arr_site_code
       ]);
   }

   /**
    * 강좌목록
    * @return CI_Output
    */
    public function listAjax()
    {
        $arr_condition = $this->_setCondition();
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
                    ,Bd.CcdName as PackTypeCcd_Name, D.CourseName
                    ,A.SaleStartDatm, A.SaleEndDatm
                    ,Aa.CcdName as SaleStatusCcd_Name
                    ,if(B.PackTypeCcd = \'743001\',"", format(E.SalePrice,0)) as SalePrice
                    ,if(B.PackTypeCcd = \'743001\',"", E.SaleRate) as SaleRate
                    ,if(B.PackTypeCcd = \'743001\',"", format(E.RealSalePrice,0)) as RealSalePrice
                    ,A.IsUse, A.RegDatm, Z.wAdminName';

        $list = $this->packageUserModel->listLecture(false, $arr_condition, null, null, ['A.ProdCode' => 'desc'], $other_column);

        $headers = [
            '사이트명', '상품코드', '상품명', '카테고리',  '대비학년도', '패키지유형', '과정', '접수시작일', '접수종료일'
            ,'판매상태', '정가', '할인' ,' 판매가', '사용여부', '등록일', '등록자'
        ];

        $file_name = '[온라인]사용자패키지상품_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d");

        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
        // download log
        $last_query = $this->packageUserModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 패키지 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['611','612','618','635','613','743']); // 수강배수,수강배수적용구분,판매상태,패키지형태(일반,고정)
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);

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
        $data_packsaleinfo = [];

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->packageUserModel->_findProductForModify($prodcode);
            $data_sale = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_memo = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->packageUserModel->_findProductEtcModify($prodcode,'lms_product_content');
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
            ,'data_sale'=>$data_sale
            ,'data_memo'=>$data_memo
            ,'data_content'=>$data_content
            ,'data_sms'=>$data_sms
            ,'data_autolec'=>$data_autolec
            ,'data_autocoupon'=>$data_autocoupon
            ,'data_autofreebie'=>$data_autofreebie
            ,'data_sublecture'=>$data_sublecture
            ,'data_packsaleinfo'=>$data_packsaleinfo
           	,'def_site_code' => $def_site_code
            ,'arr_site_code' => $arr_site_code
            ,'courseList'=>$courseList      //과정
            ,'salestype_ccd'=>$codes['613'] //상품판매구분
            ,'packtype_ccd'=>$codes['743'] //패키지유형
        ]);
    }

    /**
     * 처리 프로세스
     */
    public function store() {
        /* 권한 체크 */
        if (check_menu_perm('write') !== true) {
            return null;
        }
        
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
                'B.PackTypeCcd' => $this->_reqP('search_pack_type_ccd'),
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