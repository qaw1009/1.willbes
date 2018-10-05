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
            $column = 'O.OrderIdx, O.OrderNo, O.SiteCode, O.ReprProdName, O.PayRouteCcd, CPR.CcdName as PayRouteCcdName
                , O.PayMethodCcd, CPM.CcdName as PayMethodCcdName, O.PgCcd, O.PgMid, O.PgTid
                , O.RealPayPrice, O.OrderPrice, O.OrderProdPrice, O.DiscPrice, O.UseLecPoint, O.UseBookPoint, (O.UseLecPoint + O.UseBookPoint) as UsePoint
                , O.SaveLecPoint, O.SaveBookPoint, O.DeliveryPrice, O.DeliveryAddPrice, O.IsDelivery, O.CompleteDatm, O.OrderDatm
                , O.VBankCcd, ifnull(CBC.CcdName, O.VBankCcd) as VBankName, O.VBankAccountNo, O.VBankDepositName, O.VBankExpireDatm, O.VBankCancelDatm
                , json_value(CBC.CcdEtc, concat("$.", O.PgCcd)) as VBankPgCode, if(O.PayMethodCcd = "' . $this->_pay_method_ccd['vbank'] . '", "Y", "N") as IsVBank
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
            $column = 'OP.OrderProdIdx, OP.PayStatusCcd, CPS.CcdName as PayStatusCcdName, OP.RealPayPrice, OP.OrderPrice, OP.DiscPrice, OP.UsePoint, OP.SavePoint
                            , if(OP.IsUseCoupon = "Y", concat(OP.DiscRate, if(OP.DiscType = "R", "%", "원"), " 할인권"), "") as UseCoupon
                            , P.ProdName
                            , ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate), "")) as StudyPeriod
                            , case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" then "on_lecture" 
                                 when PL.LearnPatternCcd in ("' . implode('","', $this->_on_pack_lecture_pattern_ccd) . '") then "on_pack_lecture"
                                 when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" then "off_lecture"
                                 when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" then "off_pack_lecture"
                                 when P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" then "book"
                                 when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_price'] . '" then "delivery_price"
                                 when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_add_price'] . '" then "delivery_add_price"
                                 else "etc" 
                          end as OrderProdType';
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
                left join ' . $this->_table['code'] . ' as CPS
                    on OP.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
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
                    left join ' . $this->_table['order_sub_product'] . ' as OSP
                        on OP.OrderProdIdx = OSP.OrderProdIdx
                where OP.MemIdx = ?
                    and OSP.ProdCodeSub is not null	
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
}
