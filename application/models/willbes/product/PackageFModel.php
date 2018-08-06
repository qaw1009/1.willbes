<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/product/ProductFModel.php';

class PackageFModel extends ProductFModel
{
    private $_table = [
    ];

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 패키지 연결 하위 강위 목록 추출
     * @param $prod_code
     */
    public function subListProduct($prod_code,$arr_condition=[],$limit = null, $offset = null, $order_by = [])
    {
        $column =  'B.IsEssential, B.SubGroupName, C.*';

        $arr_condition = array_merge_recursive($arr_condition,[
            //'EQ' => ['A.ProdCode'=>$prod_code, 'A.IsSaleEnd' => 'N', 'A.IsUse' => 'Y', 'B.IsStatus'=>'Y', 'C.wIsUse'=>'Y'],
            //'RAW' => ['NOW() between ' => 'A.SaleStartDatm and A.SaleEndDatm']
            'EQ' => ['A.ProdCode'=>$prod_code, 'B.IsStatus'=>'Y', 'C.wIsUse'=>'Y'],         //패키지 하위 과정이므로 특정 조건을 제외하고 상품에 관계 없이 노출
        ]);

        $from = ' 
                    from
                        vw_product_adminpack_lecture A
	                    join lms_product_r_sublecture B on A.ProdCode = B.ProdCode	
	                    join vw_product_on_lecture C on B.ProdCodeSub = C.ProdCode ';

        $order_by = array_merge($order_by,[
            'B.OrderNum'=>'ASC'
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        return $this->_conn->query('Select straight_join '. $column. $from. $where .$order_by)->result_array();

    }
}
