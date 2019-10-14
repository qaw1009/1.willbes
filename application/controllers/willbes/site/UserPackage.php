<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPackage extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = 'userpack_lecture';  //사용자 패키지

    /**
     * 패키지 상품 목록
     * @param array $params
     */
    public function index($params = [])
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        /*모바일 사용을 위한 카테고리 설정*/
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);
        $cate_code = !(empty($this->_cate_code)) ? $this->_cate_code : element('cate_code', $arr_input);

        /*
        if (empty($cate_code) === true) {
            $cate_code = element('cate_code', $arr_input, get_var(config_app('DefCateCode'), array_get($arr_base['category'], '0.CateCode')));
        }
        */

        // 상품 기본조회 조건
        $arr_condition = [
                'EQ' => [
                    'SiteCode' => $this->_site_code,
                    'SchoolYear' => element('school_year', $arr_input)
                ]
        ];

        if(empty($cate_code) == false) {
            $arr_condition = array_merge($arr_condition,[
                'LKR' => ['CateCode' => $cate_code]
            ]);
        }

        //정렬
        $order_by = ['ProdCode'=>'desc'];

        // 상품 조회
        $list = $this->packageFModel->listSalesProduct($this->_learn_pattern, false, $arr_condition, null, null, $order_by);

        $this->load->view('site/userpackage/index',[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'data' => [
                'list' => $list
            ]
        ]);
    }

    /**
     * 패키지 상세 보기
     * @param array $params
     */
    public function show($params = [])
    {
        //$lidx = element('lidx', $params); 사용안함
        $prod_code = element('prod-code',$params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input,[
            'prod-code'=>$prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }

        $order_by=[];

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);  //상품 정보 추출
        if (empty($data)) {
            show_alert('상품정보가 존재하지 않습니다.', '/');
        }

        // 판매가격 정보 확인
        $data['PackSaleData'] = json_decode($data['PackSaleData'], true);
        if (empty($data['PackSaleData']) === true) {
            show_alert('판매가격 정보가 없습니다.', 'back');
        }

        $data['contents'] = $this->packageFModel->findProductContents($prod_code,'633001'); //상품 컨텐츠 추출

        $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,$order_by);   //패키지 하위 강좌 목록
        $selected_subjects = array_pluck($data_sublist, 'SubjectName', 'SubjectIdx');

        /*  현재 미사용으로 인해 제거 : 2019.10.10 조규호*/
        //$data_landing = $this->packageFModel->findProductLanding($lidx);

        foreach ($data_sublist as $idx => $row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            $selected_list[$row['SubjectIdx']][] = $row;
        }

        $this->load->view('site/userpackage/show',[
            'arr_input' => $arr_input,
            'data' => $data,
            'data_subjects' => $selected_subjects,
            'list' => $selected_list,
            //'data_landing' => $data_landing
        ]);
    }
}
