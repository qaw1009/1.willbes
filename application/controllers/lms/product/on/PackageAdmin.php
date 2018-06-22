<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class PackageAdmin extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/professor','product/on/packageadmin');
    protected $helpers = array('download');
    protected $prodyypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615003'; //운영자 패키지


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
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
                'A.ProdTypeCcd' => $this->prodyypeccd,
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
        $count = $this->packageadminModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->packageadminModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
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

        $codes = $this->codeModel->getCcdInArray(['609','611','612','613','616','617','618','648','649']);
        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $siteList = $this->siteModel->getSiteArray(false,'CsTel');

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

        if(empty($params[0]) === false) {
            $method='PUT';
            $prodcode = $params[0];

            $data = $this->packageadminModel->_findProductForModify($prodcode);
            $data_sale = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_sale');
            $data_division = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_division','packageadmin');
            $data_memo = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_memo');
            $data_content = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_content');
            $data_sms = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_sms');
            $data_autolec = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_r_autolecture');
            $data_autocoupon = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_r_autocoupon');
            $data_autofreebie = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_product_r_autofreebie');
            $data_sublecture = $this->packageadminModel->_findProductEtcModify($prodcode,'lms_Product_R_SubLecture');
        }

        //var_dump($codes['613']['613001']);

        $this->load->view('product/on/packageadmin/create',[
            'method'=>$method
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
            ,'courseList'=>$courseList      //과정
            ,'siteList' =>$siteList         //사이트목록
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

        $result = $this->packageadminModel->{$method.'Product'}($this->_reqP(null));
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

        $result = $this->packageadminModel->_prodCopy($prodcode,'packageadmin');
        //var_dump($result);exit;
        $this->json_result($result,'저장 되었습니다.',$result);
    }

    /**
     * 강좌 신규/추천 수정
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->packageadminModel->_modifyLectureByColumn(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

}