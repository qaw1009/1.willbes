<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPackage extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = 'userpack_lecture';  //사용자 패키지

    /**
     * 패키지 상세 보기
     * @param array $params
     */
    public function show($params = [])
    {

        $lidx = element('lidx', $params);
        $prod_code = element('prod-code',$params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input,[
            'lidx' => $lidx
            ,'prod-code'=>$prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }

        $order_by=[];

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);  //상품 정보 추출
        $data['PackSaleData'] = json_decode($data['PackSaleData'], true);
        $data_sublist = $this->packageFModel->subListProduct($this->_learn_pattern,$prod_code,[],null,null,$order_by);   //패키지 하위 강좌 목록
        $selected_subjects = array_pluck($data_sublist, 'SubjectName', 'SubjectIdx');

        $data_landing = $this->packageFModel->findProductLanding($lidx);

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
            'data_landing' => $data_landing
        ]);
    }

}
