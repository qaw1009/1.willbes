<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardMockModel extends BoardModel
{
    private $_mock_table = [
        'mockProduct' => 'lms_Product_Mock',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'category' => 'lms_sys_category',
        'ProductSale' => 'lms_Product_Sale',
        'admin' => 'wbs_sys_admin',
        'sysCode' => 'lms_sys_code',
    ];

    public function mainList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate,
                SC1.CcdName As AcceptStatusCcd_Name,
                IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS qnaUnAnsweredCnt,
                IFNULL(BD3.cnt, 0) AS noticeCnt
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_mock_table['mockProduct']} AS MP
            JOIN {$this->_mock_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_mock_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_mock_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_mock_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_mock_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_mock_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = MP.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '95' AND RegType = '0' AND ReplyStatusCcd = '621001' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD2 ON BD2.ProdCode = MP.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '96' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD3 ON BD3.ProdCode = MP.ProdCode
        ";

        $arr_condition['IN']['PD.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}