<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderListModel extends BaseOrderModel
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
    public function listAllOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'O.OrderIdx, O.OrderNo, O.SiteCode, S.SiteName, O.MemIdx, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                    , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, 0 as tRefundPrice, (O.RealPayPrice - 0) as tRemainPrice
                    , O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice
                    , O.DiscPrice as tDiscPrice, O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint, O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
                    , O.VBankCcd, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                    , if(O.VBankAccountNo is not null, O.OrderDatm, NULL) as VBankOrderDatm
                    , if(O.VBankAccountNo is not null, "Y", "N") as IsVBank
                    , if(O.VBankAccountNo is not null,
                        case 
                            when O.CompleteDatm is not null then "P"        # 결제완료
                            when O.VBankCancelDatm is not null then "C"     # 계좌취소     
                            when O.VBankExpireDatm < NOW() then "E"     # 입금기한만료
                            else "O"    # 주문완료(계좌신청)
                        end, NULL			
                      ) as VBankStatus                    
                    , O.IsEscrow, O.IsDelivery, O.IsVisitPay, O.CompleteDatm, O.OrderDatm
                    , P.ProdTypeCcd, P.ProdName, PL.LearnPatternCcd
                    , OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice, OP.CardPayPrice, OP.CashPayPrice, OP.DiscPrice, 0 as RefundPrice
                    , if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate, OP.DiscReason
                    , OP.UsePoint, OP.SavePoint, OP.IsUseCoupon, OP.UserCouponIdx
                    , CPG.CcdEtc as PgDriver, CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CVB.CcdName as VBankCcdName
                    , CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, CPS.CcdName as PayStatusCcdName
                    , null as DeliveryStatusCcd, null as DeliveryStatusCcdName, null as DeliverySendDatm, null as InvoiceNo';
            }
        } else {
            $column = $is_count;
        }

        $from = $this->_getListFrom();

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * TODO : 환불, 배송정보 추가 필요
     * 주문목록 엑셀 다운로드
     * @param string $column
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listExcelAllOrder($column, $arr_condition, $order_by = [])
    {
        $in_column = 'if(O.OrderIdx != @LastOrderIdx, O.OrderNo, "") as OrderNo
            , if(O.OrderIdx != @LastOrderIdx, S.SiteName, "") as SiteName
            , if(O.OrderIdx != @LastOrderIdx, M.MemName, "") as MemName
            , if(O.OrderIdx != @LastOrderIdx, M.MemId, "") as MemId
            , if(O.OrderIdx != @LastOrderIdx, fn_dec(M.PhoneEnc), "") as MemPhone
            , if(O.OrderIdx != @LastOrderIdx, CPC.CcdName, "") as PayChannelCcdName
            , if(O.OrderIdx != @LastOrderIdx, CPR.CcdName, "") as PayRouteCcdName
            , if(O.OrderIdx != @LastOrderIdx, CPM.CcdName, "") as PayMethodCcdName            
            , if(O.OrderIdx != @LastOrderIdx, CVB.CcdName, "") as VBankCcdName
            , if(O.OrderIdx != @LastOrderIdx, concat(O.VBankAccountNo, " "), "") as VBankAccountNo      # 엑셀파일에서 텍스트 형태로 표기하기 위해 공백 삽입
            , if(O.OrderIdx != @LastOrderIdx, O.VBankDepositName, "") as VBankDepositName
            , if(O.OrderIdx != @LastOrderIdx, O.VBankExpireDatm, "") as VBankExpireDatm
            , if(O.OrderIdx != @LastOrderIdx, O.VBankCancelDatm, "") as VBankCancelDatm            
            , if(O.OrderIdx != @LastOrderIdx, if(O.VBankAccountNo is not null, O.OrderDatm, ""), "") as VBankOrderDatm            
            , if(O.OrderIdx != @LastOrderIdx, O.CompleteDatm, "") as CompleteDatm
            , if(O.OrderIdx != @LastOrderIdx, O.OrderDatm, "") as OrderDatm
            , if(O.OrderIdx != @LastOrderIdx, O.RealPayPrice, "") as tRealPayPrice
            , if(O.OrderIdx != @LastOrderIdx, O.UseLecPoint, "") as tUseLecPoint
            , if(O.OrderIdx != @LastOrderIdx, O.UseBookPoint, "") as tUseBookPoint
            , if(O.OrderIdx != @LastOrderIdx, 0, "") as tRefundPrice
            , if(O.OrderIdx != @LastOrderIdx, O.RealPayPrice - 0, "") as tRemainPrice
            , CPT.CcdName as ProdTypeCcdName
            , concat("[", ifnull(CLP.CcdName, CPT.CcdName), "] ", P.ProdName) as ProdName
            , OP.RealPayPrice
            , 0 as RefundPrice
            , CPS.CcdName as PayStatusCcdName
            , "" as DeliveryStatusCcdName
            , if(OP.IsUseCoupon = "Y", if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), ""), "") as DiscRate
            , @LastOrderIdx := O.OrderIdx';

        $from = $from = $this->_getListFrom() . ', (select @LastOrderIdx := 0) as SqlVars';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행 및 결과값 리턴
        return $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . $order_by_offset_limit . ') U')->result_array();
    }

    /**
     * 주문목록 조회 from절 리턴
     * @return string
     */
    private function _getListFrom()
    {
        return '
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
                left join ' . $this->_table['code'] . ' as CVB
                    on O.VBankCcd = CVB.Ccd and CVB.IsStatus = "Y"         
                left join ' . $this->_table['code'] . ' as CPS
                    on OP.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"                                  	
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"                 	            
        ';
    }

    /**
     * 주문 조회
     * @param array $arr_condition
     * @param string $column
     * @return array
     */
    public function findOrder($arr_condition = [], $column = '')
    {
        if (empty($column) === true) {
            $column = 'O.OrderIdx, O.OrderNo, O.SiteCode, O.MemIdx, O.ReprProdName, O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice
                , O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice, O.DiscPrice as tDiscPrice, O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint
                , O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
                , O.VBankCcd, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                , if(O.VBankAccountNo is not null, O.OrderDatm, NULL) as VBankOrderDatm
                , if(O.VBankAccountNo is not null, "Y", "N") as IsVBank
                , if(O.VBankAccountNo is not null,
                    case 
                        when O.CompleteDatm is not null then "P"        # 결제완료
                        when O.VBankCancelDatm is not null then "C"     # 계좌취소     
                        when O.VBankExpireDatm < NOW() then "E"     # 입금기한만료
                        else "O"    # 주문완료(계좌신청)
                    end, NULL			
                  ) as VBankStatus
                , O.IsEscrow, O.IsDelivery, O.IsVisitPay, O.CompleteDatm, O.OrderDatm                
            ';
        }

        return $this->_conn->getFindResult($this->_table['order'] . ' as O', $column, $arr_condition);
    }

    /**
     * 주문 조회 by 주문식별자
     * @param int $order_idx
     * @param string $column
     * @return array
     */
    public function findOrderByOrderIdx($order_idx, $column = '')
    {
        return $this->findOrder(['EQ' => ['O.OrderIdx' => $order_idx]], $column);
    }
}
