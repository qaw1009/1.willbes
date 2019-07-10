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
     * @param bool $is_all_from [true : 모든 테이블 조인, false : code, admin 테이블 조인 제외]
     * @return mixed
     */
    public function listAllOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_add_join = [], $is_all_from = true)
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $in_column = 'straight_join count(*) AS numrows';
                $column = 'numrows';
                $is_all_from = false;   // 강제 제외 처리
            } else {
                $in_column = 'O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, O.OrderNo, O.SiteCode, S.SiteName, O.MemIdx, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                    , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, 0, "refund") as tRefundPrice
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
                    , O.IsEscrow, O.IsDelivery, O.IsVisitPay, O.AdminReasonCcd, O.AdminEtcReason, O.RegAdminIdx, if(O.RegAdminIdx is not null, fn_admin_name(O.RegAdminIdx), null) as RegAdminName
                    , O.CompleteDatm, O.OrderDatm
                    , OP.SalePatternCcd, OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice, OP.CardPayPrice, OP.CashPayPrice, OP.DiscPrice
                    , if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate, OP.DiscReason
                    , OP.UsePoint, OP.SavePoint, OP.SavePointType, OP.IsUseCoupon, OP.UserCouponIdx, OP.UpdDatm 
                    , P.ProdTypeCcd, PL.LearnPatternCcd, P.ProdName, if(OP.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", CSP.CcdName, "") as SalePatternCcdName                                        
                    , CPG.CcdEtc as PgDriver, CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CVB.CcdName as VBankCcdName
                    , CAR.CcdName as AdminReasonCcdName, CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, CPS.CcdName as PayStatusCcdName';

                $in_column .= $this->_getAddListQuery('column', $arr_add_join);
                $column = 'straight_join *, (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice';
            }
        } else {
            $in_column = $is_count;
            $column = 'straight_join *';
        }

        $from = $this->_getListFrom($arr_add_join, $is_all_from);

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
            , O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, 0, "refund") as tRefundPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice
            , O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint                 
            , concat(O.VBankAccountNo, " ") as VBankAccountNo # 엑셀파일에서 텍스트 형태로 표기하기 위해 공백 삽입
            , O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm, if(O.VBankAccountNo is not null, O.OrderDatm, "") as VBankOrderDatm
            , O.AdminEtcReason, O.CompleteDatm, O.OrderDatm
            , OP.RealPayPrice, OP.IsUseCoupon, if(OP.DiscRate > 0, concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원")), "") as DiscRate
            , OP.UpdDatm                       
            , concat("[", ifnull(CLP.CcdName, CPT.CcdName), "] ", P.ProdName, if(OP.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", concat(" (", CSP.CcdName, ")"), "")) as ProdName                       
            , P.ProdName as OnlyProdName                                    
            , CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CVB.CcdName as VBankCcdName
            , CAR.CcdName as AdminReasonCcdName, CPT.CcdName as ProdTypeCcdName, CPS.CcdName as PayStatusCcdName
            , json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee';
        $in_column .= $this->_getAddListQuery('excel_column', $arr_add_join);

        $from = $this->_getListFrom($arr_add_join);

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        if (empty($order_by) === false) {
            $_order_by = [];
            foreach ($order_by as $key => $val) {
                $_order_by[str_first_pos_after($key, '.')] = $val;
            }
            $order_by_offset_limit = $this->_conn->makeOrderBy($_order_by)->getMakeOrderBy();
        }

        // 쿼리 실행 및 결과값 리턴
        return $this->_conn->query('select straight_join ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit)->result_array();
    }

    /**
     * 주문목록 조회 from절 리턴
     * @param array $arr_add_join
     * @param bool $is_all_from [true : 모든 테이블 조인, false : code, admin 테이블 조인 제외]
     * @return string
     */
    private function _getListFrom($arr_add_join = [], $is_all_from = true)
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
                    on O.MemIdx = M.MemIdx';

        if ($is_all_from === true) {
            $from .= '                                
                left join ' . $this->_table['code'] . ' as CPG
                    on O.PgCcd = CPG.Ccd and CPG.IsStatus = "Y" and CPG.GroupCcd = "' . $this->_group_ccd['Pg'] . '"                   
                left join ' . $this->_table['code'] . ' as CPC
                    on O.PayChannelCcd = CPC.Ccd and CPC.IsStatus = "Y" and CPC.GroupCcd = "' . $this->_group_ccd['PayChannel'] . '"
                left join ' . $this->_table['code'] . ' as CPR
                    on O.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y" and CPR.GroupCcd = "' . $this->_group_ccd['PayRoute'] . '"
                left join ' . $this->_table['code'] . ' as CPM
                    on O.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y" and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '"
                left join ' . $this->_table['code'] . ' as CVB
                    on O.VBankCcd = CVB.Ccd and CVB.IsStatus = "Y" and CVB.GroupCcd = "' . $this->_group_ccd['Bank'] . '"         
                left join ' . $this->_table['code'] . ' as CAR
                    on O.AdminReasonCcd = CAR.Ccd and CAR.IsStatus = "Y" and CAR.GroupCcd = "' . $this->_group_ccd['AdminReason'] . '"                    
                left join ' . $this->_table['code'] . ' as CPS
                    on OP.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y" and CPS.GroupCcd = "' . $this->_group_ccd['PayStatus'] . '"
                left join ' . $this->_table['code'] . ' as CSP
                    on OP.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y" and CSP.GroupCcd = "' . $this->_group_ccd['SalePattern'] . '"                                                      	
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y" and CPT.GroupCcd = "' . $this->_group_ccd['ProdType'] . '"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y" and CLP.GroupCcd = "' . $this->_group_ccd['LearnPattern'] . '"';
        }

        return $from . $this->_getAddListQuery('from', $arr_add_join, $is_all_from);
    }

    /**
     * 추가 조인 테이블에 따른 쿼리 리턴
     * @param string $add_type [리턴할 쿼리 구분 : from, column, excel_column (엑셀다운로드용 컬럼)]
     * @param array $arr_add_join [추가할 조인 테이블 구분 : category (카테고리), subject (과목), professor (교수), delivery_address (배송지), delivery_info (배송정보)
     *  , member_info (회원정보), refund (환불정보), my_lecture (나의강좌), sublecture (패키지 서브강좌)]
     * @param bool $is_all_from [true : 모든 테이블 조인, false : code, admin 테이블 조인 제외]
     * @return mixed
     */
    private function _getAddListQuery($add_type, $arr_add_join = [], $is_all_from = true)
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

            // 캠퍼스 정보 추가 (강좌상품)
            if (in_array('campus', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['code'] . ' as CCA
                        on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y" and CCA.GroupCcd = "' . $this->_group_ccd['Campus'] . '"';
                $column .= ', PL.CampusCcd, CCA.CcdName as CampusCcdName';
                $excel_column .= ', CCA.CcdName as CampusCcdName';
            }

            // 캠퍼스 정보 추가 (독서실, 사물함, 예치금이 포함된 전체상품)
            if (in_array('campus_all', $arr_add_join) === true) {
                $from .= '
                    left join ' . $this->_table['readingroom'] . ' as RRM
                        on OP.ProdCode = RRM.ProdCode	        
                    left join ' . $this->_table['readingroom'] . ' as RRS
                        on OP.ProdCode = RRS.SubProdCode                
                    left join ' . $this->_table['code'] . ' as CCA
                        on CCA.Ccd = ifnull(PL.CampusCcd, ifnull(RRM.CampusCcd, RRS.CampusCcd)) and CCA.IsStatus = "Y" and CCA.GroupCcd = "' . $this->_group_ccd['Campus'] . '"';
                $column .= ', ifnull(PL.CampusCcd, ifnull(RRM.CampusCcd, RRS.CampusCcd)) as CampusCcd, CCA.CcdName as CampusCcdName';
                $excel_column .= ', CCA.CcdName as CampusCcdName';
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
                    left join ' . $this->_table['product_professor_concat_repr'] . ' as PPC
                        on OP.ProdCode = PPC.ProdCode';
                /* vw_product_r_professor_concat 테이블 사용
                $column .= ', PPC.ProfIdx_String, PPC.wProfName_String, PPC.ReprProfIdx, PPC.ReprWProfName';
                $excel_column .= ', PPC.wProfName_String, PPC.ReprWProfName';
                */
                $column .= ', PPC.ProfIdx_String, PPC.wProfName_String';
                $excel_column .= ', PPC.wProfName_String';
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
                        on OP.OrderProdIdx = OPD.OrderProdIdx';
                if ($is_all_from === true) {
                    $from .= '                        
                        left join ' . $this->_table['code'] . ' as CDS
                            on OPD.DeliveryStatusCcd = CDS.Ccd and CDS.IsStatus = "Y" and CDS.GroupCcd = "' . $this->_group_ccd['DeliveryStatus'] . '"
                        left join ' . $this->_table['admin'] . ' as AIR
                            on OPD.InvoiceRegAdminIdx = AIR.wAdminIdx and AIR.wIsStatus = "Y"
                        left join ' . $this->_table['admin'] . ' as AIU
                            on OPD.InvoiceUpdAdminIdx = AIU.wAdminIdx and AIU.wIsStatus = "Y"
                        left join ' . $this->_table['admin'] . ' as ADS
                            on OPD.DeliverySendAdminIdx = ADS.wAdminIdx and ADS.wIsStatus = "Y"
                        left join ' . $this->_table['admin'] . ' as ASU
                            on OPD.StatusUpdAdminIdx = ASU.wAdminIdx and ASU.wIsStatus = "Y"';
                }
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
                        on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                    left join ' . $this->_table['order_refund_request'] . ' as ORR		
                        on OPR.RefundReqIdx = ORR.RefundReqIdx';
                if ($is_all_from === true) {
                    $from .= '                
                        left join ' . $this->_table['admin'] . ' as AR
                            on OPR.RefundAdminIdx = AR.wAdminIdx and AR.wIsStatus = "Y"';
                }
                $column .= ', OPR.RefundIdx, OPR.RefundReqIdx, ifnull(OPR.RefundPrice, 0) as RefundPrice, ifnull(OPR.CardRefundPrice, 0) as CardRefundPrice, ifnull(OPR.CashRefundPrice, 0) as CashRefundPrice 
                    , OPR.IsPointRefund, OPR.RecoPointIdx, OPR.IsCouponRefund, OPR.RecoCouponIdx
                    , OPR.RefundDatm, AR.wAdminName as RefundAdminName, ORR.RefundReason, ORR.IsApproval, ORR.RefundType';
                $excel_column .= ', OPR.RefundPrice, OPR.RefundDatm, AR.wAdminName as RefundAdminName';
            }

            // 환불산출금액 정보 추가
            if (in_array('refund_proc', $arr_add_join) === true) {
                $from .= '';
                $column .= ', if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" and OP.CardPayPrice > 0
                    , OP.CardPayPrice - fn_order_refund_deduct_price(O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OP.ProdCode, OP.SaleTypeCcd, PL.LearnPatternCcd)
                    , OP.CardPayPrice) as CalcCardRefundPrice, OP.CashPayPrice as CalcCashRefundPrice';
                $excel_column .= '';
            }

            // 나의 강좌정보 추가
            if (in_array('my_lecture', $arr_add_join) === true) {
                $from .= '';
                $column .= ', fn_order_my_lecture_data(O.OrderIdx, OP.OrderProdIdx, 0, 0, 1) as MyLecData';
                $excel_column .= ', fn_order_my_lecture_data(O.OrderIdx, OP.OrderProdIdx, 0, 0, 1) as MyLecData';
            }

            // 주문상품서브 정보 추가
            if (in_array('subproduct', $arr_add_join) === true) {
                $from .= '';
                $column .= ', fn_order_sub_product_data(OP.OrderProdIdx) as OrderSubProdData';
                $excel_column .= '';
            }

            // 패키지상품 서브강좌 정보 추가
            if (in_array('sublecture', $arr_add_join) === true) {
                $from .= '';
                $column .= ', fn_product_sublecture_data(OP.ProdCode) as ProdSubLectureData';
                $excel_column .= '';
            }

            // 카드결제(방문) 결제카드명 추가
            if (in_array('visit_card', $arr_add_join) === true) {
                $from .= '';
                $column .= ', if(O.VisitPayCardCcd is not null, fn_ccd_name(O.VisitPayCardCcd), "") as VisitPayCardCcdName';
                $excel_column .= '';
            }

            // 학원접수 수강증출력 로그 추가
            if (in_array('print_cert_log', $arr_add_join) === true) {
                $from .= '
                    left join (
                        select OrderIdx, OrderProdIdx, "Y" as IsPrintCert
                        from ' . $this->_table['order_product_activity_log'] . '
                        where ActType = "PrintCert"
                        group by OrderIdx, OrderProdIdx                         
                    ) as LPC
                        on O.OrderIdx = LPC.OrderIdx and OP.OrderProdIdx = LPC.OrderProdIdx';
                $column .= ', LPC.IsPrintCert';
                $excel_column .= '';
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
                , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice, fn_order_refund_price(O.OrderIdx, 0, "refund") as tRefundPrice
                , O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice, O.DiscPrice as tDiscPrice
                , O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint, O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
                , O.VBankCcd, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                , if(O.VBankAccountNo is not null, O.OrderDatm, NULL) as VBankOrderDatm
                , if(O.VBankAccountNo is not null, "Y", "N") as IsVBank
                , if(O.VBankAccountNo is not null,
                    (case 
                        when O.CompleteDatm is not null then "P"        # 결제완료
                        when O.VBankCancelDatm is not null then "C"     # 계좌취소     
                        when O.VBankExpireDatm < NOW() then "E"     # 입금기한만료
                        else "O"    # 주문완료(계좌신청)
                    end), NULL			
                  ) as VBankStatus
                , O.IsEscrow, O.IsDelivery, O.IsVisitPay, O.CompleteDatm, O.OrderDatm
                , if(O.PgCcd != "", (select CcdEtc from ' . $this->_table['code'] . ' where Ccd = O.PgCcd and GroupCcd = "' . $this->_group_ccd['Pg'] . '"), "") as PgDriver               
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

    /**
     * 주문상품 조회
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findOrderProduct($arr_condition = [], $column = '', $limit = null, $offset = null, $order_by = [])
    {
        if (empty($column) === true) {
            $column = 'O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, O.OrderNo, O.SiteCode, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, O.PgCcd, O.PgMid, O.PgTid
                , O.OrderPrice as tOrderPrice, O.OrderProdPrice as tOrderProdPrice, O.RealPayPrice as tRealPayPrice
                , O.CardPayPrice as tCardPayPrice, O.CashPayPrice as tCashPayPrice, O.DeliveryPrice as tDeliveryPrice, O.DeliveryAddPrice as tDeliveryAddPrice, O.DiscPrice as tDiscPrice
                , O.UseLecPoint as tUseLecPoint, O.UseBookPoint as tUseBookPoint, O.SaveLecPoint as tSaveLecPoint, O.SaveBookPoint as tSaveBookPoint
                , O.VBankCcd, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                , O.IsEscrow, O.IsDelivery, O.IsVisitPay, O.CompleteDatm, O.OrderDatm 
                , OP.SalePatternCcd, OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice, OP.CardPayPrice, OP.CashPayPrice, OP.DiscPrice           
                , OP.DiscRate, OP.DiscType, OP.DiscReason
                , OP.UsePoint, OP.SavePoint, OP.SavePointType, OP.IsUseCoupon, OP.UserCouponIdx, OP.UpdDatm
                , P.ProdTypeCcd, P.ProdName, PL.LearnPatternCcd, PL.CampusCcd
                , CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, CCA.CcdName as CampusCcdName';
        }

        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx	
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on OP.ProdCode = PL.ProdCode
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y" and CPT.GroupCcd = "' . $this->_group_ccd['ProdType'] . '"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y" and CLP.GroupCcd = "' . $this->_group_ccd['LearnPattern'] . '"
                left join ' . $this->_table['code'] . ' as CCA
                    on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y" and CCA.GroupCcd = "' . $this->_group_ccd['Campus'] . '"';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 주문상품서브 조회
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findOrderSubProduct($arr_condition = [], $column = '', $limit = null, $offset = null, $order_by = [])
    {
        if (empty($column) === true) {
            $column = 'OP.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OSP.OrderProdSubIdx, OSP.ProdCodeSub, P.ProdName as ProdNameSub
                , OSP.RealPayPrice, OSP.RealPayPrice as CardPayPrice, 0 as CashPayPrice
                , OSP.RealPayPrice - fn_order_refund_deduct_price(OP.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OSP.ProdCodeSub, OP.SaleTypeCcd, null) as CalcCardRefundPrice
                , 0 as CalcCashRefundPrice';
        }

        $from = '
            from ' . $this->_table['order_product'] . ' as OP
                inner join ' . $this->_table['order_sub_product'] . ' as OSP
                    on OP.OrderProdIdx = OSP.OrderProdIdx
                left join ' . $this->_table['product'] . ' as P
                    on OSP.ProdCodeSub = P.ProdCode and P.IsStatus = "Y"';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 주문 배송주소 조회 by 주문식별자
     * @param int $order_idx
     * @return array
     */
    public function findOrderDeliveryAddressByOrderIdx($order_idx)
    {
        $column = 'Receiver
            , ReceiverTel1, if(length(ReceiverTel2Enc) > 0, fn_dec(ReceiverTel2Enc), "") as ReceiverTel2, ReceiverTel3, if(length(ReceiverTelEnc) > 0, fn_dec(ReceiverTelEnc), "") as ReceiverTel
            , ReceiverPhone1, fn_dec(ReceiverPhone2Enc) as ReceiverPhone2, ReceiverPhone3, fn_dec(ReceiverPhoneEnc) as ReceiverPhone
            , ZipCode, Addr1, fn_dec(Addr2Enc) as Addr2, DeliveryMemo';
        $arr_condition = ['EQ' => ['OrderIdx' => $order_idx]];

        return $this->_conn->getFindResult($this->_table['order_delivery_address'], $column, $arr_condition);
    }

    /**
     * 주문상품 배송정보, 배송지 정보 조회
     * @param int $order_prod_idx
     * @return mixed
     */
    public function findOrderProductDeliveryInfo($order_prod_idx)
    {
        $column = 'OP.OrderProdIdx, OP.OrderIdx, OP.MemIdx, OP.PayStatusCcd, OP.OrderPrice, OP.RealPayPrice
            , OPD.OrderProdDeliveryIdx, OPD.DeliveryCompCcd, OPD.DeliveryStatusCcd, OPD.InvoiceNo
            , ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo
            , CDC.CcdName as DeliveryCompCcdName, CDS.CcdName as DeliveryStatusCcdName';
        $from = '
            from ' . $this->_table['order_product'] . ' as OP
                inner join ' . $this->_table['order_product_delivery_info'] . ' as OPD
                    on OP.OrderProdIdx = OPD.OrderProdIdx
                inner join ' . $this->_table['order_delivery_address'] . ' as ODA
                    on OP.OrderIdx = ODA.OrderIdx
                left join ' . $this->_table['code'] . ' as CDC
                    on OPD.DeliveryCompCcd = CDC.Ccd and CDC.GroupCcd = "' . $this->_group_ccd['DeliveryComp'] . '" and CDC.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CDS
                    on OPD.DeliveryStatusCcd = CDS.Ccd and CDS.GroupCcd = "' . $this->_group_ccd['DeliveryStatus'] . '" and CDS.IsStatus = "Y"		
            where OP.OrderProdIdx = ?        
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$order_prod_idx]);

        return $query->row_array();
    }

    /**
     * 주문환불요청 정보 조회
     * @param $order_idx
     * @param $refund_req_idx
     * @return mixed
     */
    public function findOrderRefundRequest($order_idx, $refund_req_idx)
    {
        $column = 'ORR.RefundReqIdx, ORR.RefundType, ORR.RefundBankCcd, ORR.RefundAccountNo, ORR.RefundDepositName, ORR.RefundReason, ORR.RefundMemo
            , ORR.IsApproval, ORR.RefundReqDatm, ORR.RefundReqUpdDatm
            , ARR.wAdminName as RefundReqAdminName, ARRU.wAdminName as RefundReqUpdAdminName';

        $from = '
            from ' . $this->_table['order_refund_request'] . ' as ORR
                left join ' . $this->_table['admin'] . ' as ARR
                    on ORR.RefundReqAdminIdx = ARR.wAdminIdx and ARR.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as ARRU
                    on ORR.RefundReqUpdAdminIdx = ARRU.wAdminIdx and ARRU.wIsStatus = "Y"
            where ORR.RefundReqIdx = ? and ORR.OrderIdx = ?';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$refund_req_idx, $order_idx]);

        return $query->row_array();
    }

    /**
     * 학원수강증 출력 데이터 조회
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @param int $site_code [사이트코드]
     * @return array|string
     */
    public function getPrintCertData($order_idx, $order_prod_idx, $site_code)
    {
        if (empty($order_idx) === true || empty($order_prod_idx) === true || empty($site_code) === true) {
            return '필수 파라미터 오류입니다.';
        }

        $data = [];
        $add_data = [];

        if ($site_code == '2002') {
            // 경찰학원
            $arr_prod_code = [];
            $prof_name = '';

            // 주문상품 조회
            $arr_condition = ['EQ' => ['O.OrderIdx' => $order_idx, 'OP.OrderProdIdx' => $order_prod_idx, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]];
            $data = $this->listAllOrder(false, $arr_condition, null, null, []);
            if (empty($data) === true) {
                return '데이터 조회에 실패했습니다.';
            }
            $data = element('0', $data);

            // 단과반, 종합반 상품코드 조회
            if ($data['LearnPatternCcd'] == $this->_learn_pattern_ccd['off_lecture']) {
                $arr_prod_code[] = $data['ProdCode'];
            } else {
                // 주문서브상품 상품코드 조회
                $arr_prod_code = $this->_conn->getListResult($this->_table['order_sub_product'], 'ProdCodeSub', [
                    'EQ' => ['OrderProdIdx' => $order_prod_idx]
                ]);
                if (empty($arr_prod_code) === true) {
                    return '종합반 상품의 단과 상품 정보가 없습니다.';
                }
                $arr_prod_code = array_pluck($arr_prod_code, 'ProdCodeSub');

                /*// 선택형 종합반 선택된 상품 교수명 조회 (추후 데이터 보정 후 반영)
                $prof_name = $this->getChoicePackSelectedProfName($order_prod_idx, $data['ProdCode']);
                $prof_name = empty($prof_name) === false ? ' (' . mb_substr($prof_name['wProfName'], 0, 1) . ')' : '';*/
            }

            /*// 나의 강좌정보 (my_lecture) 최소 강좌시작일자, 최대 강좌종료일자 조회 (사용안함) ==> 상품정보에서 조회로 변경
            $add_data = $this->_conn->getFindResult($this->_table['my_lecture'], 'min(LecStartDate) as MinLecStartDate, max(LecEndDate) as MaxLecEndDate', [
                'EQ' => ['OrderIdx' => $order_idx, 'OrderProdIdx' => $order_prod_idx]]);*/

            // 상품정보의 최소 개강일, 최대 종강일 조회
            $add_data = $this->_conn->getFindResult($this->_table['product_lecture'], 'min(StudyStartDate) as MinLecStartDate, max(StudyEndDate) as MaxLecEndDate', [
                'IN' => ['ProdCode' => $arr_prod_code]]);

            // 상품명 길이 조정
            $this->load->helper('text');
            $data['ProdName'] = ellipsize($data['ProdName'], 14, 1, '') . $prof_name;

            $add_data['MinLecStartDate'] = date('m/d', strtotime($add_data['MinLecStartDate']));
            $add_data['MaxLecEndDate'] = date('m/d', strtotime($add_data['MaxLecEndDate']));

            // 결제방법 공통코드명 가공
            $data['PayMethodCcdName'] = str_replace('결제(방문)', '', $data['PayMethodCcdName']);
            $data['ViewType'] = 'C';
        } elseif ($site_code == '2004') {
            // 공무원학원
            // 주문상품 조회
            $arr_condition = ['EQ' => ['O.OrderIdx' => $order_idx, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]];
            $data = $this->listAllOrder('O.OrderNo, M.MemName, P.ProdName', $arr_condition, null, null, []);
            if (empty($data) === true) {
                return '데이터 조회에 실패했습니다.';
            }

            // 주문상품명 추출
            $add_data['OrderProdNameData'] = array_pluck($data, 'ProdName');
            
            // 주문정보 추출
            $data = element('0', $data);
            $data['ViewType'] = 'G';
        }

        // 데이터 병합
        $data = array_merge($data, $add_data);

        return $data;
    }

    /**
     * 주문환불요청 날짜별 건수 조회
     * @param string $req_start_date [조회시작일자]
     * @param string $req_end_date [조회종료일자]
     * @return mixed
     */
    public function getOrderRefundReqCntPerSite($req_start_date, $req_end_date)
    {
        $req_start_date = $req_start_date . ' 00:00:00';
        $req_end_date = $req_end_date . ' 23:59:59';

        $column = 'S.SiteCode, S.SiteName, S.IsCampus, ifnull(RR.RefundReqCnt, 0) as RefundReqCnt';
        $from = '
            from ' . $this->_table['site'] . ' as S
                left join (
                    select
                        O.SiteCode, count(ORR.RefundReqIdx) as RefundReqCnt
                    from ' . $this->_table['order_refund_request'] . ' as ORR
                        inner join ' . $this->_table['order'] . ' as O
                            on ORR.OrderIdx = O.OrderIdx
                    where ORR.RefundReqDatm between ? and ?
                        and O.CompleteDatm is not null	
                    group by O.SiteCode
                ) as RR
                    on S.SiteCode = RR.SiteCode
            where S.SiteCode != ' . config_item('app_intg_site_code') . ' 
                and S.IsUse = "Y"	            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$req_start_date, $req_end_date]);

        return $query->result_array();
    }

    /**
     * 운영자 선택형 패키지 선택상품 교수명 1건 조회
     * @param $order_prod_idx
     * @param $prod_code
     * @return mixed
     */
    public function getChoicePackSelectedProfName($order_prod_idx, $prod_code)
    {
        $column = 'VWP.wProfName_String as wProfName';
        $from = '
            from ' . $this->_table['order_sub_product'] . ' as OSP
                inner join ' . $this->_table['product_r_sublecture'] . ' as PRS
                    on OSP.ProdCodeSub = PRS.ProdCodeSub
                inner join ' . $this->_table['product_professor_concat_repr'] . ' as VWP
                    on OSP.ProdCodeSub = VWP.ProdCode
            where OSP.OrderProdIdx = ?
                and PRS.ProdCode = ?
                and PRS.IsStatus = "Y" and PRS.IsEssential = "N"                
            order by OSP.OrderProdSubIdx desc limit 1
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$order_prod_idx, $prod_code]);

        return $query->row_array();
    }

    /**
     * 주문상품 관련 활동로그 저장
     * @param string $act_type [활동타입, PrintCert : 수강증출력]
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @param null|string $act_content [활동내용]
     * @return bool|string
     */
    public function addActivityLog($act_type, $order_idx, $order_prod_idx, $act_content = null)
    {
        if (empty($act_type) === true && empty($act_type) === true && empty($act_type) === true) {
            return '필수 파라미터 오류입니다.';
        }

        $data = [
            'ActType' => $act_type,
            'OrderIdx' => $order_idx,
            'OrderProdIdx' => $order_prod_idx,
            'ActContent' => $act_content,
            'RegAdminIdx' => $this->session->userdata('admin_idx'),
            'RegIp' => $this->input->ip_address()
        ];

        $is_add = $this->_conn->set($data)->insert($this->_table['order_product_activity_log']);
        if ($is_add !== true) {
            return '주문상품 활동로그 저장에 실패했습니다.';
        }

        return true;
    }
}
