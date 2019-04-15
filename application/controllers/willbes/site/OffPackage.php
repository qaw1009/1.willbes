<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO : 주의 요망
 * 방문신청 컨트롤러(VisitOffPackage)에서 확장 사용함. 수정시 주의 요망
  */
class OffPackage extends \app\controllers\FrontController
{
    protected $models = array('categoryF','product/baseProductF', 'product/packageF', 'order/cartF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = 'off_pack_lecture';  //학원종합반

    /**
     * 종합반 목록
     * @param array $params
     */
    public function index($params = [])
    {
        $class_type = strtolower($this->router->class);

        /*  온라인신청 과 방문신청 분기*/
        if($class_type === 'offpackage') {
            $_study_apply_ccds = ['654001','654002', '654003']; //온라인 접수, 방문+온라인 : TODO 방문접수 까지 추가 (2019.04.05 - 최진영 차장 요청)
            $_view_page = 'site/off_pack_lecture/index';
        } else {    //OffVisitPackage
            $_study_apply_ccds = ['654001', '654003']; //방문접수, 방문+온라인
            $_view_page = 'site/off_visit/package_index';
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 카테고리 코드가 없을 경우 디폴트 설정
        if (isset($arr_input['cate_code']) === false) {
            $arr_input['cate_code'] = array_get($arr_base['category'], '0.CateCode');
        }

        $cate_code = element('cate_code', $arr_input, $this->_cate_code);

        // 캠퍼스 조회
        $arr_base['campus'] = [];
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function ($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }

        // 카테고리가 있을 경우에만 조회
        if (empty($cate_code) === false) {
            // 과정 조회
            $arr_base['course'] = $this->baseProductFModel->listCourseCategoryMapping($this->_site_code, $cate_code);
        }

        // 상품 조회
        $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);  // 검색어

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'CampusCcd' => element('campus_ccd', $arr_input),
                'CourseIdx' => element('course_idx', $arr_input),
            ],
            'LKR' => [
                'CateCode' => $cate_code,
            ],
            'LKB' => [
                $arr_search_text[0] => element('1', $arr_search_text),
            ],
            'IN' => ['StudyApplyCcd' => $_study_apply_ccds] // 접수방식
        ];

        if (element('search_order', $arr_input) == 'course') {
            $order_by = ['OrderNum'=>'Desc','OrderNumCourse'=>'desc'];
        } else {
            $order_by = ['OrderNum'=>'Desc','ProdCode'=>'desc'];
        }

        $list= $this->packageFModel->listSalesProduct($this->_learn_pattern,false,$arr_condition,null,null,$order_by);
        //var_dump($list);

        foreach ($list as $idx => $row) {
            $list[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'] , true);
        }

        $this->load->view($_view_page,[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'data' => [
                'list' => $list
            ],
            'class_type' => $class_type     //방문신청시 패키지 여부 확인 차
        ]);
    }

    /**
     * 패키지 콘텐츠 보기
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);

        $this->load->view('site/off_pack_lecture/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }

    public function show($params = [])
    {
        $class_type = strtolower($this->router->class);
        /*  온라인신청 과 방문신청 분기*/
        if($class_type === 'offpackage') {
            $_study_apply_ccds = ['654001','654002', '654003']; //온라인 접수, 방문+온라인 : TODO 방문접수 까지 추가 (2019.04.05 - 최진영 차장 요청)
            $_view_page = 'site/off_pack_lecture/show';
        } else {    //OffVisitPackage
            $_study_apply_ccds = ['654001', '654003']; //방문접수, 방문+온라인
            $_view_page = 'site/off_visit/package_show';
        }

        $prod_code = element('prod-code',$params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input,[
            'prod-code'=>$prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }


        $arr_condition = [
            'IN' => ['StudyApplyCcd' => $_study_apply_ccds] // 접수방식
        ];

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code, '',$arr_condition);  //상품 정보 추출
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        // 판매가격 정보 확인
        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true); //상품 가격 정보 치환
        if (empty($data['ProdPriceData']) === true) {
            show_alert('판매가격 정보가 없습니다.', 'back');
        }

        $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,[]);   //패키지 하위 강좌 목록

        foreach ($data_sublist as $idx => $row) {
            $data_sublist[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
        }

        $this->load->view($_view_page,[
            'arr_input' => $arr_input,
            'learn_pattern' => $this->_learn_pattern,
            'data' => $data,
            'data_sublist' => $data_sublist,
            'class_type' => $class_type     //방문신청시 패키지 여부 확인 차
        ]);
    }
}
