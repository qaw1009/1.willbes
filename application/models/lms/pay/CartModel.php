<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pay/BaseOrderModel.php';

class CartModel extends BaseOrderModel
{
    /**
     * 현재 유효한 장바구니 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listValidCart($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'CA.CartIdx, CA.MemIdx, CA.SiteCode, CA.ProdCode, CA.ParentProdCode, CA.RegDatm
                    , if(CA.RegAdminIdx is not null, "Y", "N") as IsRegAdmin, CA.AdminRegReason, CA.RegAdminIdx, A.wAdminName as RegAdminName
                    , M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, PS.RealSalePrice	
                    , S.SiteName, CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName';
            }
        } else {
            $column = $is_count;
        }

        $from = $this->_getListFrom();

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 현재 유효한 장바구니 엑셀 다운로드
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listExcelValidCart($arr_condition, $order_by = [])
    {
        $column = 'S.SiteName, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
            , CPT.CcdName as ProdTypeCcdName, concat("[", ifnull(CLP.CcdName, CPT.CcdName), "] ", P.ProdName) as ProdName, PS.RealSalePrice           
            , if(CA.RegAdminIdx is not null, concat(A.wAdminName, "(운)"), M.MemName) as RegName, CA.RegDatm, CA.AdminRegReason';

        $from = $from = $this->_getListFrom();

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행 및 결과값 리턴
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    /**
     * 현재 유효한 장바구니 조회 from절 리턴
     * @return string
     */
    private function _getListFrom()
    {
        return '
            from ' . $this->_table['cart'] . ' as CA
                inner join ' . $this->_table['member'] . ' as M
                    on CA.MemIdx = M.MemIdx
                inner join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode
                inner join ' . $this->_table['product_sale'] . ' as PS
                    on CA.ProdCode = PS.ProdCode and CA.SaleTypeCcd = PS.SaleTypeCcd
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on CA.ProdCode = PL.ProdCode 
                left join ' . $this->_table['product_book'] . ' as PB
                    on CA.ProdCode = PB.ProdCode
                left join ' . $this->_table['bms_book'] . ' as WB
                    on PB.wBookIdx = WB.wBookIdx and WB.wIsUse = "Y" and WB.wIsStatus = "Y"
                left join ' . $this->_table['site'] . ' as S	
                    on CA.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"		
                left join ' . $this->_table['admin'] . ' as A
                    on CA.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where CA.ExpireDatm > NOW()
                and CA.ConnOrderIdx is null
                and CA.IsDirectPay = "N"
                and CA.IsVisitPay = "N"
                and CA.IsStatus = "Y"
                and P.IsUse = "Y"
                and P.IsStatus = "Y"	
                and P.SaleStatusCcd = "' . $this->_available_sale_status_ccd['product'] . '"
                and P.IsSaleEnd = "N"    
                and NOW() between P.SaleStartDatm and P.SaleEndDatm
                and (P.ProdTypeCcd != "' . $this->_prod_type_ccd['book'] . '" or (P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book'] . '"))
                and PS.IsStatus = "Y" and PS.SalePriceIsUse = "Y"                	            
        ';
    }
}
