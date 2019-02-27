<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMockTestModel extends WB_Model
{
    private $_table = [
        'mockProduct' => 'lms_Product_Mock',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'category' => 'lms_sys_category',
        'ProductSale' => 'lms_Product_Sale',
        'admin' => 'wbs_sys_admin',
        'sysCode' => 'lms_sys_code',
        'site' => 'lms_site',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listMockTest($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PD.IsCoupon, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate
                ,SC1.CcdName As AcceptStatusCcd_Name
                ,S.SiteName
                ,SC2.CcdName As TakeFormCcd_Name
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y' AND PS.SaleTypeCcd='613001'
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC2 ON MP.TakeFormsCcd = SC2.Ccd
                JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode
            where PD.IsStatus = 'Y'
        ";

        $arr_condition['IN']['PD.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
