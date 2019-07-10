<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class OrderListFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 주문 목록 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'O.OrderIdx, O.OrderNo, O.MemIdx, O.SiteCode, O.ReprProdName, O.PayRouteCcd, CPR.CcdName as PayRouteCcdName
                , O.PayMethodCcd, CPM.CcdName as PayMethodCcdName, O.PgCcd, O.PgMid, O.PgTid
                , O.RealPayPrice, O.OrderPrice, O.OrderProdPrice, O.DiscPrice, O.UseLecPoint, O.UseBookPoint, (O.UseLecPoint + O.UseBookPoint) as UsePoint
                , O.SaveLecPoint, O.SaveBookPoint, O.DeliveryPrice, O.DeliveryAddPrice, O.IsDelivery, O.CompleteDatm, O.OrderDatm
                , O.VBankCcd, ifnull(CBC.CcdName, O.VBankCcd) as VBankName, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                , json_value(CBC.CcdEtc, concat("$.", O.PgCcd)) as VBankPgCode
                , if(O.VBankAccountNo is not null, "Y", "N") as IsVBank
                , if(O.VBankAccountNo is not null,
                    case 
                        when O.CompleteDatm is not null then "P"        # 결제완료
                        when O.VBankCancelDatm is not null then "C"     # 계좌취소     
                        when O.VBankExpireDatm < NOW() then "E"     # 입금기한만료
                        else "O"    # 주문완료(계좌신청)
                    end, NULL			
                  ) as VBankStatus
                , SG.SiteGroupName, S.SiteName, S.IsCampus, if(S.IsCampus = "N", "온라인", "학원") as SiteOnOffName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['order'] . ' as O
                left join ' . $this->_table['site'] . ' as S
                    on O.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode and SG.IsStatus = "Y"                    
                left join ' . $this->_table['code'] . ' as CPR
                    on O.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPM
                    on O.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CBC
                    on O.VBankCcd = CBC.Ccd and CBC.IsStatus = "Y"                
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 주문 정보 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findOrder($arr_condition = [])
    {
        $data = $this->listOrder(false, $arr_condition, null, null, []);

        return element('0', $data, []);
    }

    /**
     * 주문 정보 조회 by 주문식별자
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @return mixed
     */
    public function findOrderByOrderIdx($order_idx, $mem_idx)
    {
        return $this->findOrder(['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $mem_idx]]);
    }

    /**
     * 주문 정보 조회 by 주문번호
     * @param int $order_no [주문번호]
     * @param int $mem_idx [회원식별자]
     * @return mixed
     */
    public function findOrderByOrderNo($order_no, $mem_idx)
    {
        return $this->findOrder(['EQ' => ['O.OrderNo' => $order_no, 'O.MemIdx' => $mem_idx]]);
    }

    /**
     * 주문상품 목록 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOrderProduct($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'OP.OrderProdIdx, O.SiteCode, OP.ProdCode, OP.SaleTypeCcd, OP.PayStatusCcd, CPS.CcdName as PayStatusCcdName
                , OP.RealPayPrice, OP.OrderPrice, OP.DiscPrice, OP.UsePoint, OP.SavePoint, OP.SavePointType, OP.SalePatternCcd
                , if(OP.IsUseCoupon = "Y", concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원"), " 할인권"), "") as UseCoupon
                , concat(P.ProdName, if(OP.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", concat(" (", fn_ccd_name(OP.SalePatternCcd), ")"), "")) as ProdName
                , P.ProdTypeCcd, PL.LearnPatternCcd
                , ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate), "")) as StudyPeriod
                , case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" then "on_lecture" 
                     when PL.LearnPatternCcd in ("' . implode('","', $this->_on_pack_lecture_pattern_ccd) . '") then "on_pack_lecture"
                     when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" then "off_lecture"
                     when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" then "off_pack_lecture"
                     when P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" then "book"
                     when P.ProdTypeCcd = "' . $this->_prod_type_ccd['mock_exam'] . '" then "mock_exam"
                     when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_price'] . '" then "delivery_price"
                     when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_add_price'] . '" then "delivery_add_price"
                     when P.ProdTypeCcd = "' . $this->_prod_type_ccd['freebie'] . '" then "freebie"
                     else "etc" 
                  end as OrderProdType
                , OPD.DeliveryStatusCcd, CDS.CcdName as DeliveryStatusCcdName, replace(CDC.CcdEtc, "{{$invoice_no$}}", OPD.InvoiceNo) as DeliverySearchUrl
                , PS.SalePrice, PS.SaleRate, PS.SaleDiscType, if(PS.SaleDiscType = "R", "%", "원") as SaleRateUnit';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['order_product'] . ' as OP
                inner join ' . $this->_table['order'] . ' as O
                    on OP.OrderIdx = O.OrderIdx
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on P.ProdCode = PL.ProdCode
                left join ' . $this->_table['product_sale'] . ' as PS
                    on P.ProdCode = PS.ProdCode and OP.SaleTypeCcd = PS.SaleTypeCcd and PS.IsStatus = "Y" and PS.SalePriceIsUse = "Y"                 
                left join ' . $this->_table['order_product_delivery_info'] . ' as OPD		
                    on OP.OrderProdIdx = OPD.OrderProdIdx
                left join ' . $this->_table['code'] . ' as CPS
                    on OP.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"                                        
                left join ' . $this->_table['code'] . ' as CDS
                    on OPD.DeliveryStatusCcd = CDS.Ccd and CDS.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CDC
                    on OPD.DeliveryCompCcd = CDC.Ccd and CDC.IsStatus = "Y"                                        
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상품코드, 상품코드서브 기준 주문상품내역 조회 (최하위 단강좌 상품코드 기준으로 주문상품 내역 조회 가능)
     * @param array $arr_condition
     * @return mixed
     */
    public function findOrderProductByAllProdCode($arr_condition = [])
    {
        $column = 'OPU.*, P.SiteCode, P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd';
        $from = '
            from (
                select OP.OrderIdx, OP.OrderProdIdx, OP.MemIdx, OP.ProdCode, OP.SaleTypeCcd, OP.PayStatusCcd
                from ' . $this->_table['order_product'] . ' as OP
                union all
                select OP.OrderIdx, OP.OrderProdIdx, OP.MemIdx, OSP.ProdCodeSub as ProdCode, OP.SaleTypeCcd, OP.PayStatusCcd
                from ' . $this->_table['order_product'] . ' as OP
                    inner join ' . $this->_table['order_sub_product'] . ' as OSP
                        on OP.OrderProdIdx = OSP.OrderProdIdx			
            ) OPU 
                left join ' . $this->_table['product'] . ' as P
                    on OPU.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on OPU.ProdCode = PL.ProdCode            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 주문배송정보 목록 조회
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listOrderDeliveryAddress($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === false) {
            $column = 'OD.Receiver
            , OD.ReceiverTel1, if(length(OD.ReceiverTel2Enc) > 0, fn_dec(OD.ReceiverTel2Enc), "") as ReceiverTel2, OD.ReceiverTel3, if(length(OD.ReceiverTelEnc) > 0, fn_dec(OD.ReceiverTelEnc), "") as ReceiverTel
            , OD.ReceiverPhone1, fn_dec(OD.ReceiverPhone2Enc) as ReceiverPhone2, OD.ReceiverPhone3, fn_dec(OD.ReceiverPhoneEnc) as ReceiverPhone
            , OD.ZipCode, OD.Addr1, fn_dec(OD.Addr2Enc) as Addr2, OD.DeliveryMemo';
        }

        return $this->_conn->getJoinListResult($this->_table['order'] . ' as O', 'inner', $this->_table['order_delivery_address'] . ' as OD'
            , 'O.OrderIdx = OD.OrderIdx'
            , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 주문배송정보 정보 조회 by 주문식별자
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @return mixed
     */
    public function findOrderDeliveryAddressByOrderIdx($order_idx, $mem_idx)
    {
        $data = $this->listOrderDeliveryAddress(false, ['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $mem_idx]], null, null, []);

        return element('0', $data, []);
    }

    /**
     * 주문배송지 정보 수정가능 여부 리턴
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @return bool|string
     */
    public function checkModifiableOrderDeliveryAddress($order_idx, $mem_idx)
    {
        // 주문배송정보 조회 (송장번호등록, 발송여부 조회)
        $column = 'ifnull(sum(if(ifnull(OPD.InvoiceNo, "") = "", 0, 1)), -1) as InvoiceNoRegCnt
            , ifnull(sum(if(OPD.DeliveryStatusCcd = "' . $this->_delivery_status_ccd['complete'] . '", 1, 0)), -1) as DeliverySendCnt
            , count(0) as DeliveryCnt
            , ifnull(sum(if(OP.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '", 1, 0)), 0) as RefundCnt                
        ';
        $arr_condition = [
            'EQ' => ['OP.OrderIdx' => get_var($order_idx, -1), 'OP.MemIdx' => get_var($mem_idx, -1)]
        ];

        $chk_row = $this->_conn->getJoinFindResult($this->_table['order_product_delivery_info'] . ' as OPD', 'inner', $this->_table['order_product'] . ' as OP'
            , 'OPD.OrderProdIdx = OP.OrderProdIdx', $column, $arr_condition);

        if ($chk_row['DeliverySendCnt'] < 0 || $chk_row['InvoiceNoRegCnt'] < 0) {
            return '주문 배송정보가 없습니다.';
        } elseif ($chk_row['DeliveryCnt'] == $chk_row['RefundCnt']) {
            return '환불완료되어 배송지 수정이 불가능합니다.';
        } elseif ($chk_row['DeliverySendCnt'] > 0) {
            return '교재가 발송완료되어 배송지 수정이 불가능합니다.';
        } elseif ($chk_row['InvoiceNoRegCnt'] > 0) {
            return '송장번호가 이미 등록된 상태로 배송지 수정이 불가능합니다.';
        }

        return true;
    }

    /**
     * 회원이 구매한 상품코드 조회
     * @param string|array $pay_status_ccd
     * @param null|int $order_idx
     * @param null|int $order_prod_idx
     * @return mixed
     */
    public function getMemberOrderProdCodes($pay_status_ccd = [], $order_idx = null, $order_prod_idx = null)
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
        $column = 'distinct(ProdCode) as ProdCode';
        $from = '
            from (
                select OP.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OP.PayStatusCcd
                from ' . $this->_table['order_product'] . ' as OP
                where OP.MemIdx = ?
                union all
                select OP.OrderIdx, OP.OrderProdIdx, OSP.ProdCodeSub as ProdCode, OP.PayStatusCcd
                from ' . $this->_table['order_product'] . ' as OP
                    inner join ' . $this->_table['order_sub_product'] . ' as OSP
                        on OP.OrderProdIdx = OSP.OrderProdIdx
                where OP.MemIdx = ?	
            ) U	            
        ';

        // 추가 조건
        $arr_condition = [
            'EQ' => ['OrderIdx' => $order_idx, 'OrderProdIdx' => $order_prod_idx],
            'IN' => ['PayStatusCcd' => (array) $pay_status_ccd]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where, [$sess_mem_idx, $sess_mem_idx]);

        return $query->result_array();
    }

    /**
     * 회원이 구매한 내강의실 정보 조회 by ProdCodeSub (단강좌코드)
     * @param string|array $arr_prod_code_sub [상품코드서브 (단강좌코드)]
     * @return mixed
     */
    public function getMemberMyLectureByProdCodeSub($arr_prod_code_sub)
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
        $column = 'ML.MlIdx';
        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                inner join ' . $this->_table['my_lecture'] . ' as ML
                    on O.OrderIdx = ML.OrderIdx and OP.OrderProdIdx = ML.OrderProdIdx
            where O.MemIdx = ?
                and OP.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '"	
                and ML.ProdCodeSub in ?            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$sess_mem_idx, (array) $arr_prod_code_sub]);

        return $query->result_array();
    }

    /**
     * 주문상품 SMS 발송 메시지 조회
     * @param int $order_no [주문번호 or 주문식별자]
     * @param int $mem_idx [회원식별자]
     * @param string $idx_name [주문조회 조회 컬럼명, (OrderNo, OrderIdx)]
     * @return mixed
     */
    public function getOrderProductAutoSmsMsg($order_no, $mem_idx, $idx_name = 'OrderNo')
    {
        $column = 'PSM.SendTel as SendSmsTel, PSM.Memo as SendSmsMsg';
        $from = '
            from ' . $this->_table['order_product'] . ' as OP
                inner join ' . $this->_table['order'] . ' as O
                    on OP.OrderIdx = O.OrderIdx
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['product_sms'] . ' as PSM
                    on OP.ProdCode = PSM.ProdCode and PSM.IsStatus = "Y"
            where O.' . $idx_name . ' = ?
                and O.MemIdx = ? 
                and P.IsSms = "Y"                                                       
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$order_no, $mem_idx]);

        return $query->result_array();
    }
}
