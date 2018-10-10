<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderModel extends BaseOrderModel
{
    /**
     * TODO : 환불, 배송정보 추가 필요
     * 주문 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'O.OrderIdx, O.OrderNo, O.SiteCode, S.SiteName, O.MemIdx, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                    , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice
                    , O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice
                    , O.DiscPrice as tDiscPrice, O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint, O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
                    , O.VBankCcd, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                    , O.IsEscrow, O.IsDelivery, O.CompleteDatm, O.OrderDatm
                    , P.ProdTypeCcd, P.ProdName, PL.LearnPatternCcd
                    , OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice, OP.CardPayPrice, OP.CashPayPrice, OP.DiscPrice
                    , if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate, OP.DiscReason
                    , OP.UsePoint, OP.SavePoint, OP.IsUseCoupon, OP.UserCouponIdx
                    , CPG.CcdEtc as PgDriver, CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName
                    , CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, CPS.CcdName as PayStatusCcdName';
            }
        } else {
            $column = $is_count;
        }

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                left join ' . $this->_table['site'] . ' as S
                    on O.SiteCode = S.SiteCode and S.IsStatus = "Y"		
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on P.ProdCode = PL.ProdCode
                left join ' . $this->_table['member'] . ' as M
                    on O.MemIdx = M.MemIdx
                left join ' . $this->_table['code'] . ' as CPG
                    on O.PgCcd = CPG.Ccd and CPG.IsStatus = "Y"                    
                left join ' . $this->_table['code'] . ' as CPC
                    on O.PayChannelCcd = CPC.Ccd and CPC.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPR
                    on O.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPM
                    on O.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"	
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPS
                    on OP.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"	            
        ';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
