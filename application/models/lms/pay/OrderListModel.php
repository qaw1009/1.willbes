<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderListModel extends BaseOrderModel
{
    /**
     * 주문 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param array $arr_add_join
     * @return mixed
     */
    public function listAllOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_add_join = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $in_column = 'count(*) AS numrows';
                $column = 'numrows';
            } else {
                $in_column = 'O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, O.OrderNo, O.SiteCode, S.SiteName, O.MemIdx, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                    , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, null, "refund") as tRefundPrice
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
                    , OP.SalePatternCcd, OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice, OP.CardPayPrice, OP.CashPayPrice, OP.DiscPrice
                    , OP.CardPayPrice as CalcCardRefundPrice, OP.CashPayPrice as CalcCashRefundPrice    # TODO : 임시 환불산출금액 (로직 추가 필요)
                    , if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate, OP.DiscReason
                    , OP.UsePoint, OP.SavePoint, OP.IsUseCoupon, OP.UserCouponIdx, OP.UpdDatm
                    , P.ProdTypeCcd, PL.LearnPatternCcd, P.ProdName, if(OP.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", CSP.CcdName, "") as SalePatternCcdName                                        
                    , CPG.CcdEtc as PgDriver, CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CVB.CcdName as VBankCcdName
                    , CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, CPS.CcdName as PayStatusCcdName';

                $in_column .= $this->_getAddListQuery('column', $arr_add_join);
                $column = '*, (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice';
            }
        } else {
            $in_column = $is_count;
            $column = '*';
        }

        $from = $this->_getListFrom($arr_add_join);

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 주문목록 엑셀 다운로드
     * @param string $column
     * @param array $arr_condition
     * @param array $order_by
     * @param array $arr_add_join
     * @return mixed
     */
    public function listExcelAllOrder($column, $arr_condition, $order_by = [], $arr_add_join = [])
    {
        $in_column = 'O.OrderIdx, OP.OrderProdIdx, O.OrderNo, S.SiteName, M.MemName, M.MemId, fn_dec(M.PhoneEnc) as MemPhone
            , O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, null, "refund") as tRefundPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice
            , O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint                 
            , concat(O.VBankAccountNo, " ") as VBankAccountNo # 엑셀파일에서 텍스트 형태로 표기하기 위해 공백 삽입
            , O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm, if(O.VBankAccountNo is not null, O.OrderDatm, "") as VBankOrderDatm
            , O.CompleteDatm, O.OrderDatm
            , OP.RealPayPrice, OP.IsUseCoupon, OP.UpdDatm, if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate                       
            , concat("[", ifnull(CLP.CcdName, CPT.CcdName), "] ", P.ProdName, if(OP.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", concat(" (", CSP.CcdName, ")"), "")) as ProdName                       
            , P.ProdName as OnlyProdName                                    
            , CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CVB.CcdName as VBankCcdName
            , CPT.CcdName as ProdTypeCcdName, CPS.CcdName as PayStatusCcdName';
        $in_column .= $this->_getAddListQuery('excel_column', $arr_add_join);

        $from = $from = $this->_getListFrom($arr_add_join);

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        if (empty($order_by) === false) {
            foreach ($order_by as $key => $val) {
                $_order_by[str_first_pos_after($key, '.')] = $val;
            }
            $order_by_offset_limit = $this->_conn->makeOrderBy($_order_by)->getMakeOrderBy();
        }

        // 쿼리 실행 및 결과값 리턴
        return $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit)->result_array();
    }

    /**
     * 주문목록 조회 from절 리턴
     * @param array $arr_add_join
     * @return string
     */
    private function _getListFrom($arr_add_join = [])
    {
        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                left join ' . $this->_table['site'] . ' as S
                    on O.SiteCode = S.SiteCode and S.IsStatus = "Y"		
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on OP.ProdCode = PL.ProdCode
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
                left join ' . $this->_table['code'] . ' as CSP
                    on OP.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y"                                                      	
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"';

        return $from . $this->_getAddListQuery('from', $arr_add_join);
    }

    /**
     * 추가 조인 테이블에 따른 쿼리 리턴
     * @param string $add_type [리턴할 쿼리 구분 : from, column, excel_column (엑셀다운로드용 컬럼)]
     * @param array $arr_add_join [추가할 조인 테이블 구분 : category (카테고리), subject (과목), professor (교수), delivery_address (배송지), delivery_info (배송정보), member_info (회원정보), refund (환불정보)]
     * @return mixed
     */
    private function _getAddListQuery($add_type, $arr_add_join = [])
    {
        $from = '';
        $column = '';
        $excel_column = '';

        if (empty($arr_add_join) === false) {
            // 카테고리 정보 추가
            if (in_array('category', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['product_r_category'] . ' as PC	    
                        on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                    left join ' . $this->_table['category'] . ' as SC
                        on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['category'] . ' as SPC
                        on SC.ParentCateCode = SPC.CateCode and SPC.IsStatus = "Y"';
                $column .= ', PC.CateCode, SC.CateName, ifnull(SPC.CateName, SC.CateName) as LgCateName, if(SPC.CateCode is not null, SC.CateName, "") as MdCateName';
                $excel_column .= ', SC.CateName, ifnull(SPC.CateName, SC.CateName) as LgCateName, if(SPC.CateCode is not null, SC.CateName, "") as MdCateName';
            }

            // 과목 정보 추가
            if (in_array('subject', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['subject'] . ' as PS
                        on PL.SubjectIdx = PS.SubjectIdx and PS.IsStatus = "Y"';
                $column .= ', PL.SubjectIdx, PS.SubjectName';
                $excel_column .= ', PS.SubjectName';
            }

            // 교수 정보 추가
            if (in_array('professor', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['product_professor_concat'] . ' as PPC
                        on OP.ProdCode = PPC.ProdCode';
                $column .= ', PPC.ProfIdx_String, PPC.wProfName_String, PPC.ReprProfIdx, PPC.ReprWProfName';
                $excel_column .= ', PPC.wProfName_String, PPC.ReprWProfName';
            }

            // 배송지 추가
            if (in_array('delivery_address', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['order_delivery_address'] . ' as ODA
                        on O.OrderIdx = ODA.OrderIdx';
                $column .= ', ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, fn_dec(ODA.ReceiverTelEnc) as ReceiverTel
                    , ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo';
                $excel_column .= ', ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, fn_dec(ODA.ReceiverTelEnc) as ReceiverTel
                    , ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo';
            }

            // 배송정보 추가
            if (in_array('delivery_info', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['order_product_delivery_info'] . ' as OPD		
                        on OP.OrderProdIdx = OPD.OrderProdIdx
                    left join ' . $this->_table['code'] . ' as CDS
                        on OPD.DeliveryStatusCcd = CDS.Ccd and CDS.IsStatus = "Y"
                    left join ' . $this->_table['admin'] . ' as AIR
                        on OPD.InvoiceRegAdminIdx = AIR.wAdminIdx and AIR.wIsStatus = "Y"
                    left join ' . $this->_table['admin'] . ' as AIU
                        on OPD.InvoiceUpdAdminIdx = AIU.wAdminIdx and AIU.wIsStatus = "Y"
                    left join ' . $this->_table['admin'] . ' as ADS
                        on OPD.DeliverySendAdminIdx = ADS.wAdminIdx and ADS.wIsStatus = "Y"
                    left join ' . $this->_table['admin'] . ' as ASU
                        on OPD.StatusUpdAdminIdx = ASU.wAdminIdx and ASU.wIsStatus = "Y"';
                $column .= ', OPD.DeliveryStatusCcd, CDS.CcdName as DeliveryStatusCcdName, ifnull(OPD.InvoiceNo, "") as InvoiceNo
                    , OPD.InvoiceRegDatm, OPD.InvoiceUpdDatm, OPD.DeliverySendDatm, OPD.StatusUpdDatm
                    , AIR.wAdminName as InvoiceRegAdminName, AIU.wAdminName as InvoiceUpdAdminName
                    , ADS.wAdminName as DeliverySendAdminName, ASU.wAdminName as StatusUpdAdminName                
                ';
                $excel_column .= ', CDS.CcdName as DeliveryStatusCcdName, ifnull(OPD.InvoiceNo, "") as InvoiceNo
                    , OPD.InvoiceRegDatm, OPD.InvoiceUpdDatm, OPD.DeliverySendDatm, OPD.StatusUpdDatm
                    , AIR.wAdminName as InvoiceRegAdminName, AIU.wAdminName as InvoiceUpdAdminName
                    , ADS.wAdminName as DeliverySendAdminName, ASU.wAdminName as StatusUpdAdminName                
                ';
            }

            // 회원정보 추가
            if (in_array('member_info', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['member_info'] . ' as MI		
                        on M.MemIdx = MI.MemIdx';
                $column .= ', M.BirthDay as MemBirthDay, M.Sex as MemSex, fn_dec(M.MailEnc) as MemMail, MI.ZipCode as MemZipCode, MI.Addr1 as MemAddr1, fn_dec(MI.Addr2Enc) as MemAddr2';
                $excel_column .= ', M.BirthDay as MemBirthDay, M.Sex as MemSex, fn_dec(M.MailEnc) as MemMail, MI.ZipCode as MemZipCode, MI.Addr1 as MemAddr1, fn_dec(MI.Addr2Enc) as MemAddr2';
            }

            // 환불정보 추가
            if (in_array('refund', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['order_product_refund'] . ' as OPR		
                        on OP.OrderProdIdx = OPR.OrderProdIdx
                    left join ' . $this->_table['order_refund_request'] . ' as ORR		
                        on OPR.RefundReqIdx = ORR.RefundReqIdx
                    left join ' . $this->_table['admin'] . ' as AR
                        on OPR.RefundAdminIdx = AR.wAdminIdx and AR.wIsStatus = "Y"';
                $column .= ', OPR.RefundReqIdx, ifnull(OPR.RefundPrice, 0) as RefundPrice, ifnull(OPR.CardRefundPrice, 0) as CardRefundPrice, ifnull(OPR.CashRefundPrice, 0) as CashRefundPrice 
                    , OPR.IsPointRefund, OPR.RecoPointIdx, OPR.IsCouponRefund, OPR.RecoCouponIdx
                    , OPR.RefundDatm, AR.wAdminName as RefundAdminName, ORR.RefundReason, ORR.IsApproval, ORR.IsBankRefund';
                $excel_column .= ', OPR.RefundPrice';
            }
        }

        return ${$add_type};
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
                , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, null, "refund") as tRefundPrice
                , O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice, O.DiscPrice as tDiscPrice
                , O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint, O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
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
