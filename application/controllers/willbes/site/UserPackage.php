<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPackage extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $pack_type_view = ['743001' => '', '743002' => '_fix'];        //패키지 유형에 따른 뷰페이지

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
        $pack = element('pack', $params, '743001');

        /*모바일 사용을 위한 카테고리 설정*/
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);
        $cate_code = !(empty($this->_cate_code)) ? $this->_cate_code : element('cate_code', $arr_input);
        $arr_base['category_default'] = $cate_code;

        if (empty($cate_code) === true) {
            $cate_code = element('cate_code', $arr_input, get_var(config_app('DefCateCode'), array_get($arr_base['category'], '0.CateCode')));
            $arr_base['category_default'] = $cate_code;
        }

        // 상품 기본조회 조건
        $arr_condition = ['EQ' => ['SiteCode' => $this->_site_code, 'PackTypeCcd' => $pack], 'LKR' => ['CateCode' => $cate_code]];

        // 사이트별 과정 조회 (상품에 설정된 과정 조회)
        $arr_base['course'] = $this->packageFModel->listSalesProduct($this->_learn_pattern, 'distinct(CourseIdx), CourseName', $arr_condition, null, null, ['OrderNumCourse' => 'asc']);
        
        // 상품 추가 조건
        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => [
                'CourseIdx' => element('course_idx', $arr_input),
                'SchoolYear' => element('school_year', $arr_input)
            ],
        ]);

        //정렬
        $order_by = ['ProdCode'=>'desc'];

        // 상품 조회
        $list = $this->packageFModel->listSalesProduct($this->_learn_pattern, false, $arr_condition, null, null, $order_by);

        foreach ($list as $idx => $row) {
            $list[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
        }
        $arr_base['course'] = array_unique($arr_base['course'],SORT_REGULAR);

        $this->load->view('site/userpackage/index'.$this->pack_type_view[$pack],[
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

        $pack = element('PackTypeCcd', $data, '743001');

        $order_by=[];
        $selected_list = [];
        $selected_subjects = [];
        $data_sublist = [];
        
        // 일반형
        if($pack === '743001') {

            // 판매가격 정보 확인
            $data['PackSaleData'] = json_decode($data['PackSaleData'], true);
            if (empty($data['PackSaleData']) === true) {
                show_alert('판매가격 정보가 없습니다.', 'back');
            }

            // 패키지 하위강좌 목록
            $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,$order_by);
            // 일반형 과목별 그룹핑
            $selected_subjects = array_pluck($data_sublist, 'SubjectName', 'SubjectIdx');

        // 고정형
        } elseif($pack === '743002') {

            // 판매가격 정보 확인
            $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true); //상품 가격 정보 치환
            if (empty($data['ProdPriceData']) === true) {
                show_alert('판매가격 정보가 없습니다.', 'back');
            }

            // 패키지 하위강좌 목록
            $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern, $prod_code, [],null,null,$order_by);
        }

        //상품 컨텐츠 추출 : 유의사항
        $data['contents'] = $this->packageFModel->findProductContents($prod_code, ['633001']);
        $data['contents'] = (empty($data['contents']) ? [] : $data['contents'][0]);

        foreach ($data_sublist as $idx => $row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            ($pack === '743001' ? $selected_list[$row['SubjectIdx']][] = $row: $selected_list[] = $row)   ;
        }

        $this->load->view('site/userpackage/show'.$this->pack_type_view[$pack],[
            'arr_input' => $arr_input,
            'data' => $data,
            'data_subjects' => $selected_subjects,
            'list' => $selected_list,
        ]);
    }
}
