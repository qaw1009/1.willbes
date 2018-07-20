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
                $title = "aaa";
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

        $list = $this->packageFModel->listSalesProduct('adminpack_lecture',false,$arr_condition,null,null,['ProdCode'=>'desc']);

        $prod_codes = array_pluck($list,'ProdCode');        //추출목록 중 상품코드만 재 추출

        $contents = $this->packageFModel->findProductContents($prod_codes); //상품 컨텐츠 추출

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
                ,'contents' => $contents
            ]
        ]);

    }
}
