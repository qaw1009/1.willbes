<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = 'adminpack_lecture';  //운영자패키지(추천, 선택 패키지) 공통

    /**
     * 패키지 목록
     * @param array $params
     */
    public function index($params = [])
    {

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        //사이트별 과정 조회
        $arr_base['course'] = $this->baseProductFModel->listCourse($this->_site_code);

        $pack = element('pack', $params);

        switch ($pack) {
            case '648001':
                $title = '추천패키지';
                break;
            case '648002':
                $title = '선택패키지';
                break;
            default:
                $title = "";
                break;
        }

        $arr_condition = [
            'EQ' => [
              'SiteCode' => $this->_site_code
              ,'PackTypeCcd' => $pack
              ,'CourseIdx' => element('course_idx',$arr_input)
              ,'SchoolYear' => element('school_year',$arr_input)
            ],
            'LKR' => [
                'CateCode'=>$this->_cate_code
            ],
            'LKB' => [
                'ProdName' => $this->_req('prod_name')
            ]
        ];

        $list = $this->packageFModel->listSalesProduct($this->_learn_pattern,false,$arr_condition,null,null,['ProdCode'=>'desc']);

        //$prod_codes = array_pluck($list,'ProdCode');        //추출목록 중 상품코드만 재 추출
        //$contents = $this->packageFModel->findProductContents($prod_codes); //상품 컨텐츠 추출  : info() 로 대체

        $selected_list=[];
        foreach ($list as  $idx => $row) {
            $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            $selected_list[] = $row;
        }

        $this->load->view('site/package/index',[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'pack' => $pack,
            'title' => $title,
            'data' => [
                'list' => $selected_list
                //,'contents' => $contents
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

        $data['lecture'] = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);
        $data['contents'] = $this->packageFModel->findProductContents($prod_code); //상품 컨텐츠 추출

        $this->load->view('site/package/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }

    /**
     * 패키지 상세 보기
     * @param array $params
     */
    public function show($params = [])
    {

        $pack = element('pack', $params);
        $prod_code = element('prod-code',$params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input,[
            'pack' => $pack
            ,'prod-code'=>$prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }

        $order_by=[];

        switch ($pack) {
            case '648001':
                $view_page = 'show_normal';
                break;
            case '648002':
                $view_page = 'show_choice';
                $order_by = ['B.IsEssential'=>'DESC', 'B.SubGroupName'=>'ASC'];
                break;
        }


        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);  //상품 정보 추출
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        $data['contents'] = $this->packageFModel->findProductContents($prod_code); //상품 컨텐츠 추출
        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true); //상품 가격 정보 치환

        $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,$order_by);   //패키지 하위 강좌 목록

        foreach ($data_sublist as $idx => $row) {
            $data_sublist[$idx]['ProdBookData'] = json_decode($row['ProdBookData'], true);
            $data_sublist[$idx]['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
            $data_sublist[$idx]['ProfReferData'] = json_decode($row['ProfReferData'], true);
            $data_sublist[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
        }

        $this->load->view('site/package/'.$view_page,[
            'arr_input' => $arr_input,
            'data' => $data,
            'data_sublist' => $data_sublist
        ]);
    }

}
