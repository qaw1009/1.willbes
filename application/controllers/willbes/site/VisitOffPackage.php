<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitOffPackage extends \app\controllers\FrontController
{
    protected $models = array('categoryF','product/baseProductF', 'product/packageF');
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $cate_code = element('cate_code', $arr_input, $this->_cate_code);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 캠퍼스 조회
        $arr_base['campus'] = array_map(function($var) {
            $tmp_arr = explode(':', $var);
            return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
        }, explode(',', config_app('CampusCcdArr')));

        // 과정 조회
        $arr_base['course'] = $this->baseProductFModel->listCourse($this->_site_code);

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
            'IN' => ['StudyApplyCcd' => ['654001', '654003'] ] // 방문 접수, 방문+온라인
        ];

        $list= $this->packageFModel->listSalesProduct($this->_learn_pattern,false,$arr_condition,null,null,['ProdCode'=>'desc']);
        //var_dump($list);

        foreach ($list as $idx => $row) {
            $list[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'] , true);
        }

        $this->load->view('site/visit_pay/index',[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'data' => [
                'list' => $list
            ]
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
        $prod_code = element('prod-code',$params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input,[
            'prod-code'=>$prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);  //상품 정보 추출
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true); //상품 가격 정보 치환

        $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,[]);   //패키지 하위 강좌 목록

        foreach ($data_sublist as $idx => $row) {
            $data_sublist[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
        }

        $this->load->view('site/off_pack_lecture/show',[
            'arr_input' => $arr_input,
            'learn_pattern' => $this->_learn_pattern,
            'data' => $data,
            'data_sublist' => $data_sublist
        ]);
    }
}
