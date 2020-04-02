<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class HanlimCalcModel extends BaseOrderModel
{
    // 강사료정산 테이블
    private $_calc_table = [
        'calc_hist' => 'lms_professor_calculate_hist',
        'calc_deduct' => 'lms_professor_calculate_deduct'
    ];

    private $_hour_rate = 10;   // 시급 비율 (시급 * 10)

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 한림전용 강사료정산 이력 목록
     * @param string $search_type [검색기준 (개강일: StudyStartDate, 종강일: StudyEndDate, 정산일: CalcDate, 교수식별자/상품코드지정 : FixedValue)]
     * @param string $search_param1 [검색시작일 (Y-m-d) || 교수식별자]
     * @param string $search_param2 [검색종료일 (Y-m-d) || 상품코드]
     * @param string $prod_type [상품구분 (단과반/종합반 일반형,선택형 : OL, 종합반 강사배정 : CP)]
     * @param null|int $site_code [사이트코드]
     * @param bool|string $is_count [조회구분 (true: 카운트, false: 목록, excel: 엑셀다운로드, sum: 합계)]
     * @param array $arr_condition [조회조건]
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCalcHist($search_type, $search_param1, $search_param2, $prod_type, $site_code = null, $is_count = false, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            $column = 'TA.ProfIdx, TA.ProdCode, TA.ProdType
                , P.ProdName, PL.StudyStartDate, PL.StudyEndDate, PL.CampusCcd, PL.Amount, PC.CateCode
                , PCH.PchIdx, PCH.PchSeq, PCH.BaseDatm, PCH.MemCnt, PCH.LecMemCnt, PCH.PackMemCnt, PCH.PayPrice, PCH.RefundPrice                    	
                , PCH.PrePrice, PCH.PgFeePrice, PCH.RemainPrice, PCH.LecRemainPrice, PCH.PackRemainPrice, PCH.DeductPrice, PCH.TargetPrice
                , PCH.LecCalcRate, PCH.LecCalcType, PCH.PackCalcRate, PCH.PackCalcType                    
                , PCH.CalcPrice, PCH.LecCalcPrice, PCH.PackCalcPrice, PCH.TaxRate, PCH.TaxPrice, PCH.EtcDeductPrice, PCH.FinalCalcPrice, PCH.RegDatm
                , if(TA.ProdType = "OL", (select count(0) 
                    from ' . $this->_table['order_product'] . ' 
                    where ProdCode = TA.ProdCode 
                        and PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '"), 0) as LecRealCnt
                , (select count(0)
                    from ' . $this->_table['order_sub_product'] . ' as A 
                        inner join ' . $this->_table['order_product'] . ' as B
                            on A.OrderProdIdx = B.OrderProdIdx
                        inner join ' . $this->_table['product_lecture'] . ' as C
                            on B.ProdCode = C.ProdCode
                        left join ' . $this->_table['order_unpaid_hist'] . ' as D  
                            on B.OrderIdx = D.OrderIdx                            
                    where A.ProdCodeSub = TA.ProdCode
                        and B.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '"
                        and C.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"
                        and C.PackTypeCcd ' . ($prod_type == 'CP' ? '' : 'not') . ' in ("' . $this->_adminpack_lecture_type_ccd['choice_prof'] . '")
                        ' . ($prod_type == 'CP' ? 'and (D.UnPaidIdx is null or D.UnPaidUnitNum = 1)' : '') . ') as PackRealCnt      
            ';

            if ($is_count != 'sum') {
                $column .= '
                    , left(PCH.RegDatm, 10) as CalcDate
                    , (select case PCH.LecCalcType when "R" then "%" when "P" then "(월)" when "T" then "(시)" else null end) as LecCalcRateUnit                    
                    , (select case PCH.PackCalcType when "R" then "%" when "P" then "(월)" when "T" then "(시)" else null end) as PackCalcRateUnit                    
                    , SC.CateName, WPF.wProfName, CCA.CcdName as CampusCcdName
                ';
            }
        }

        $query = /** @lang text */ '
            select ' . $column . '
            from (
                ' . $this->_getCalcHistBaseQuery($search_type, $search_param1, $search_param2, $prod_type, $site_code) . '
            ) as TA  
                inner join ' . $this->_table['product'] . ' as P
                    on TA.ProdCode = P.ProdCode
                inner join ' . $this->_table['product_lecture'] . ' as PL
                    on TA.ProdCode = PL.ProdCode
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on TA.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                left join ' . $this->_calc_table['calc_hist'] . ' as PCH
                    on TA.ProfIdx = PCH.ProfIdx and TA.ProdCode = PCH.ProdCode and TA.ProdType = PCH.ProdType and PCH.IsStatus = "Y"                                      
        ';

        if ($is_count === false || $is_count === 'excel') {
            $query .= '
                left join ' . $this->_table['professor'] . ' as PF
                    on TA.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"
                left join ' . $this->_table['pms_professor'] . ' as WPF
                    on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"
                left join ' . $this->_table['category'] . ' as SC
                    on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CCA
                    on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y" and CCA.GroupCcd = "' . $this->_group_ccd['Campus'] . '"                
            ';
        }

        // where 조건
        $query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        // 정렬 조건
        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 최종 쿼리
        if ($is_count === 'excel') {
            if ($prod_type == 'CP') {
                $out_column = 'CalcDate, wProfName, CateName, CampusCcdName, ProdCode, ProdName, StudyStartDate, StudyEndDate, Amount, (LecRealCnt + PackRealCnt) as RealCnt
                    , PrePrice, RemainPrice, DeductPrice, TargetPrice, concat(PackCalcRate, PackCalcRateUnit) as PackCalcRate
                    , CalcPrice, TaxPrice, EtcDeductPrice, FinalCalcPrice';
            } else {
                $out_column = 'CalcDate, wProfName, CateName, CampusCcdName, ProdCode, ProdName, StudyStartDate, StudyEndDate, Amount, LecRealCnt, PackRealCnt, (LecRealCnt + PackRealCnt) as RealCnt
                    , PrePrice, RemainPrice, DeductPrice, TargetPrice, concat(LecCalcRate, LecCalcRateUnit) as LecCalcRate, concat(PackCalcRate, PackCalcRateUnit) as PackCalcRate
                    , CalcPrice, TaxPrice, EtcDeductPrice, FinalCalcPrice';
            }
            $query = 'select ' . $out_column . ' from (' . $query . ') as U ' . $order_by_offset_limit;
        } elseif ($is_count === 'sum') {
            $out_column = 'sum(PayPrice) as tPayPrice, sum(RefundPrice) as tRefundPrice, sum(PrePrice) as tPrePrice, sum(PgFeePrice) as tPgFeePrice
                , sum(RemainPrice) as tRemainPrice, sum(DeductPrice) as tDeductPrice, sum(TargetPrice) as tTargetPrice, sum(CalcPrice) as tCalcPrice
                , sum(TaxPrice) as tTaxPrice, sum(EtcDeductPrice) as tEtcDeductPrice, sum(FinalCalcPrice) as tFinalCalcPrice
                , sum(LecRealCnt) as tLecRealCnt, sum(PackRealCnt) as tPackRealCnt';
            $query = 'select ' . $out_column . ' from (' . $query . ') as U';
        } elseif ($is_count === false) {
            $query .= $order_by_offset_limit;
        }

        // 쿼리 실행
        $result = $this->_conn->query($query);

        if ($is_count === true) {
            return $result->row(0)->numrows;
        } elseif ($is_count === 'sum') {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }

    /**
     * 한림전용 강사료정산 이력 조회
     * @param int $prof_idx [교수식별자]
     * @param int $prod_code [상품코드]
     * @param string $prod_type [상품구분 (단과반/종합반 일반형,선택형 : OL, 종합반 강사배정 : CP)]
     * @param null|int $pch_idx [강사료정산이력식별자]
     * @return mixed
     */
    public function findCalcHist($prof_idx, $prod_code, $prod_type, $pch_idx = null)
    {
        $arr_condition = ['EQ' => ['PCH.PchIdx' => $pch_idx]];
        $data = $this->listCalcHist('FixedValue', $prof_idx, $prod_code, $prod_type, null, false, $arr_condition, 1, 0);

        return element('0', $data);
    }

    /**
     * 한림전용 강사료정산 공제내역 리턴
     * @param int $pch_idx [강사료정산이력식별자]
     * @return array
     */
    public function getCalcDeduct($pch_idx)
    {
        $results = ['N' => [], 'E' => []];
        $column = 'PcdIdx, DeductType, DeductLecType, DeductName, DeductPrice';
        $arr_condition = ['EQ' => ['PchIdx' => get_var($pch_idx, '0'), 'IsStatus' => 'Y']];
        $data = $this->_conn->getListResult($this->_calc_table['calc_deduct'], $column, $arr_condition, null, null, ['PcdIdx' => 'asc']);

        if (empty($data) === false) {
            foreach ($data as $row) {
                $results[$row['DeductType']][] = $row;
            }
        }
        
        return $results;
    }    

    /**
     * 한림전용 강사료정산 이력 기본 쿼리 리턴
     * @param string $search_type [검색기준 (개강일: StudyStartDate, 종강일: StudyEndDate, 정산일: CalcDate, 교수식별자/상품코드지정 : FixedValue)]
     * @param string $search_param1 [검색시작일 (Y-m-d) || 교수식별자]
     * @param string $search_param2 [검색종료일 (Y-m-d) || 상품코드]
     * @param string $prod_type [상품구분 (단과반/종합반 일반형,선택형 : OL, 종합반 강사배정 : CP)]
     * @param null|int $site_code [사이트코드]
     * @return string
     */
    private function _getCalcHistBaseQuery($search_type, $search_param1, $search_param2, $prod_type, $site_code = null)
    {
        if ($search_type == 'CalcDate') {
            // 정산일 기준
            $search_start_date = $search_param1 . ' 00:00:00';
            $search_end_date = $search_param2 . ' 23:59:59';

            $query = /** @lang text */ '
                select PCH.ProfIdx, PCH.ProdCode, PCH.ProdType
                from ' . $this->_calc_table['calc_hist'] . ' as PCH
                    inner join ' . $this->_table['product'] . ' as P
                        on PCH.ProdCode = P.ProdCode
                where PCH.RegDatm between ' . $this->_conn->escape($search_start_date) . ' and ' . $this->_conn->escape($search_end_date) . '
                    and PCH.ProdType = ' . $this->_conn->escape($prod_type) . '
                    and PCH.IsStatus = "Y"
                    and P.SiteCode = ' . $this->_conn->escape($site_code) . '         
            ';
        } elseif ($search_type == 'FixedValue') {
            // 교수식별자/상품코드 지정
            $query = /** @lang text */ '
                select ' . $this->_conn->escape($search_param1) . ' as ProfIdx, ' . $this->_conn->escape($search_param2) . ' as ProdCode, ' . $this->_conn->escape($prod_type) . ' as ProdType
            ';
        } else {
            // 수강일/종강일 기준
            $query = /** @lang text */ '
                select TR.ProfIdx, TR.ProdCode, TR.ProdType
                from (
                    select PD.ProfIdx, P.ProdCode, "OL" as ProdType
                    from ' . $this->_table['product'] . ' as P
                        inner join ' . $this->_table['product_lecture'] . ' as PL
                            on PL.ProdCode = P.ProdCode
                        inner join ' . $this->_table['product_division'] . ' as PD
                            on PD.ProdCode = P.ProdCode and PD.ProdCodeSub = P.ProdCode and PD.IsStatus = "Y"
                    where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
                        and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '"	
                        and ' . $this->_conn->protect_identifiers('PL.' . $search_type) . ' between ' . $this->_conn->escape($search_param1) . ' and ' . $this->_conn->escape($search_param2) . '
                        and P.SiteCode = ' . $this->_conn->escape($site_code) . '
                    union
                    select SPD.ProfIdx, PRS.ProdCodeSub as ProdCode, if(PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice_prof'] . '", "CP", "OL") as ProdType
                    from ' . $this->_table['product'] . ' as P
                        inner join ' . $this->_table['product_lecture'] . ' as PL
                            on PL.ProdCode = P.ProdCode
                        inner join ' . $this->_table['product_r_sublecture'] . ' as PRS
                            on PRS.ProdCode = P.ProdCode and PRS.IsStatus = "Y"
                        inner join ' . $this->_table['product_lecture'] . ' as SPL
                            on SPL.ProdCode = PRS.ProdCodeSub
                        inner join ' . $this->_table['product_division'] . ' as SPD
                            on SPD.ProdCode = PRS.ProdCodeSub and SPD.ProdCodeSub = PRS.ProdCodeSub and SPD.IsStatus = "Y"
                    where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
                        and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"
                        and ' . $this->_conn->protect_identifiers('SPL.' . $search_type) . ' between ' . $this->_conn->escape($search_param1) . ' and ' . $this->_conn->escape($search_param2) . '
                        and P.SiteCode = ' . $this->_conn->escape($site_code) . '
                ) as TR  
                where TR.ProdType = ' . $this->_conn->escape($prod_type) . '                          
            ';
        }

        return $query;
    }

    /**
     * 한림전용 강사료정산 대상 주문 목록
     * @param int $prof_idx [교수식별자]
     * @param int $prod_code [단과반상품코드]
     * @param string $prod_type [상품구분 (단과반/종합반 일반형,선택형 : OL, 종합반 강사배정 : CP)]
     * @param bool $is_sum [합계조회여부]
     * @param bool $is_excel [엑셀다운로드여부]
     * @param string $base_datm [기준일시]
     * @return mixed
     */
    public function listCalcOrder($prof_idx, $prod_code, $prod_type, $is_sum = false, $is_excel = false, $base_datm = null)
    {
        if ($is_sum === true && $is_excel === false) {
            $column = 'ifnull(sum(U.DivisionPayPrice), 0) as tPayPrice
	            , ifnull(sum(U.DivisionRefundPrice), 0) as tRefundPrice
                , ifnull(sum(U.PrePrice), 0) as tPrePrice 
                , ifnull(sum(U.PreCardPrice), 0) as tPreCardPrice
                , ifnull(sum(U.PreCashPrice), 0) as tPreCashPrice
                , ifnull(sum(U.PreBankPrice), 0) as tPreBankPrice
                , ifnull(sum(U.PreVBankPrice), 0) as tPreVBankPrice
                , ifnull(sum(U.DivisionPgFeePrice), 0) as tPgFeePrice                
                , ifnull(sum(U.RemainPrice), 0) as tRemainPrice
                , ifnull(sum(U.LecRemainPrice), 0) as tLecRemainPrice
                , ifnull(sum(U.PackRemainPrice), 0) as tPackRemainPrice
                , count(U.OrderProdIdx) as tPayCnt	
                , sum(if(U.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '", 1, 0)) as tRefundCnt                	
                , sum(if(U.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tMemCnt
                , sum(if(U.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" and U.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tLecMemCnt
                , sum(if(U.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" and U.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tPackMemCnt
            ';
        } else {
            $column = 'U.*
                , if(U.DiscRate > 0, concat(U.DiscRate, if(U.DiscType = "R", "%", "원")), "") as DiscRateUnit
                , OOI.CertNo, OOI.PackCertNo
                , M.MemName, M.MemId, fn_dec(M.PhoneEnc) as MemPhone
                , SC.CateName
                , CPR.CcdName as PayRouteCcdName, CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName
                , concat(CLP.CcdName, if(U.PackTypeCcd is not null, concat("(", CPT.CcdName, ")"), "")) as LearnPackTypeName
                , (select OrderMemo from ' . $this->_table['order_memo'] . ' where OrderIdx = U.OrderIdx and IsStatus = "Y" order by OrderMemoIdx asc limit 1) as OrderMemo
            ';
        }

        $query = /** @lang text */ '
            select ' . $column . '
            from (
                ' . $this->_getCalcOrderBaseQuery($prof_idx, $prod_code, $prod_type) . '
            ) as U                             
        ';

        // 합계조회일 경우 부가정보 불필요
        if ($is_sum === false) {
            $query .= '
                left join ' . $this->_table['order_other_info'] . ' as OOI
                    on U.OrderIdx = OOI.OrderIdx            
                left join ' . $this->_table['member'] . ' as M
                    on U.MemIdx = M.MemIdx
                left join ' . $this->_table['category'] . ' as SC
                    on U.CateCode = SC.CateCode and SC.IsStatus = "Y"                    
                left join ' . $this->_table['code'] . ' as CPR
                    on U.PayRouteCcd = CPR.Ccd and CPR.GroupCcd = "' . $this->_group_ccd['PayRoute'] . '" and CPR.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on U.LearnPatternCcd = CLP.Ccd and CLP.GroupCcd = "' . $this->_group_ccd['LearnPattern'] . '" and CLP.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPT
                    on U.PackTypeCcd = CPT.Ccd and CPT.GroupCcd = "' . $this->_group_ccd['PackType'] . '" and CPT.IsStatus = "Y"             
            ';
        }

        // 기준일시보다 이전 결제건만 조회
        if (empty($base_datm) === false) {
            $query .= $this->_conn->makeWhere(['LTE' => ['U.CompleteDatm' => $base_datm]])->getMakeWhere(false);
        }

        if ($is_excel === true) {
            if ($prod_type == 'CP') {
                $excel_column = 'OrderNo, CompleteDatm, MemName, MemId, MemPhone, PreCardPrice, PreCashPrice, PreBankPrice, PreVBankPrice, PayRouteCcdName
                    , PgFee, DivisionPgFeePrice, DivisionRefundPrice, RefundDatm, RemainPrice, PackCertNo, ProdName, OrderMemo, DiscRateUnit';
            } else {
                $excel_column = 'OrderNo, CompleteDatm, MemName, MemId, MemPhone, PreCardPrice, PreCashPrice, PreBankPrice, PreVBankPrice, PayRouteCcdName
                    , PgFee, DivisionPgFeePrice, DivisionRefundPrice, RefundDatm, RemainPrice, LearnPatternCcdName, PackTypeCcdName, ProdName, OrderMemo, DiscRateUnit, Remark';
            }
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by CompleteDatm desc';
        } else {
            if ($is_sum === false) {
                $query .= ' order by U.CompleteDatm desc';
            }
        }

        // 쿼리 실행
        $result = $this->_conn->query($query);

        if ($is_sum === true && $is_excel === false) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }

    /**
     * 한림전용 강사료정산 주문 목록 기본 쿼리 리턴
     * @param int $prof_idx [교수식별자]
     * @param int $prod_code [단과반상품코드]
     * @param string $prod_type [상품구분 (단과반/종합반 일반형,선택형 : OL, 종합반 강사배정 : CP)]
     * @return string
     */
    private function _getCalcOrderBaseQuery($prof_idx, $prod_code, $prod_type)
    {
        $def_price = 0;
        $arr_price_column = [
            'RealPayPrice' => 'OP.RealPayPrice', 'CardPayPrice' => 'OP.CardPayPrice', 'CashPayPrice' => 'OP.CashPayPrice',
            'RefundPrice' => 'ifnull(OPR.RefundPrice, 0)', 'CardRefundPrice' => 'ifnull(OPR.CardRefundPrice, 0)', 'CashRefundPrice' => 'ifnull(OPR.CashRefundPrice, 0)'
        ];

        if ($prod_type == 'CP') {
            $def_price = 'null';
            $arr_price_column = [
                'RealPayPrice' => 'null', 'CardPayPrice' => 'null', 'CashPayPrice' => 'null',
                'RefundPrice' => 'null', 'CardRefundPrice' => 'null', 'CashRefundPrice' => 'null'
            ];
        }

        $query = /** @lang text */ '
            select RD.OrderIdx, RD.OrderProdIdx, RD.ProdCode, RD.ProdCodeSub
                , RD.PayStatusCcd, RD.OrderNo, RD.MemIdx, RD.PayRouteCcd, RD.PayMethodCcd, RD.CompleteDatm, RD.RefundDatm, RD.DiscRate, RD.DiscType, RD.Remark
                , RD.ProdName, RD.CateCode, RD.LearnPatternCcd, RD.PackTypeCcd, RD.ProdDivisionRate, RD.PgFee
                , RD.DivisionPayPrice, RD.DivisionCardPayPrice, RD.DivisionCashPayPrice, RD.DivisionRefundPrice, RD.DivisionCardRefundPrice, RD.DivisionCashRefundPrice, RD.DivisionPgFeePrice
                , (RD.DivisionPayPrice - RD.DivisionRefundPrice) as PrePrice
                , if(RD.PayMethodCcd in ("' . $this->_pay_method_ccd['card'] . '", "' . $this->_pay_method_ccd['visit_card'] . '", "' . $this->_pay_method_ccd['visit_card_cash'] . '", "' . $this->_pay_method_ccd['admin_pay'] . '", ""), RD.DivisionCardPayPrice - RD.DivisionCardRefundPrice, ' . $def_price . ') as PreCardPrice
                , if(RD.PayMethodCcd in ("' . $this->_pay_method_ccd['willbes_bank'] . '", "' . $this->_pay_method_ccd['visit_cash'] . '", "' . $this->_pay_method_ccd['visit_card_cash'] . '"), RD.DivisionCashPayPrice - RD.DivisionCashRefundPrice, ' . $def_price . ') as PreCashPrice
                , if(RD.PayMethodCcd in ("' . $this->_pay_method_ccd['direct_bank'] . '"), RD.DivisionCardPayPrice - RD.DivisionCardRefundPrice, ' . $def_price . ') as PreBankPrice
                , if(RD.PayMethodCcd in ("' . $this->_pay_method_ccd['vbank'] . '"), RD.DivisionCardPayPrice - RD.DivisionCardRefundPrice, ' . $def_price . ') as PreVBankPrice	
                , (RD.DivisionPayPrice - RD.DivisionRefundPrice - RD.DivisionPgFeePrice) as RemainPrice
                , if(RD.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '", RD.DivisionPayPrice - RD.DivisionRefundPrice - RD.DivisionPgFeePrice, ' . $def_price . ') as LecRemainPrice
                , if(RD.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '", RD.DivisionPayPrice - RD.DivisionRefundPrice - RD.DivisionPgFeePrice, ' . $def_price . ') as PackRemainPrice
            from (
                select TA.OrderIdx, TA.OrderProdIdx, TA.ProdCode, TA.ProdCodeSub
                    , TA.PayStatusCcd, TA.OrderNo, TA.MemIdx, TA.PayRouteCcd, TA.PayMethodCcd, TA.CompleteDatm, TA.RefundDatm, TA.DiscRate, TA.DiscType, TA.Remark
                    , TA.ProdName, TA.CateCode, TA.LearnPatternCcd, TA.PackTypeCcd, TA.ProdDivisionRate, TA.PgFee
                    , TRUNCATE(TA.RealPayPrice * TA.ProdDivisionRate, 0) as DivisionPayPrice		
                    , TRUNCATE(TA.CardPayPrice * TA.ProdDivisionRate, 0) as DivisionCardPayPrice
                    , TRUNCATE(TA.CashPayPrice * TA.ProdDivisionRate, 0) as DivisionCashPayPrice		
                    , TRUNCATE(TA.RefundPrice * TA.ProdDivisionRate, 0) as DivisionRefundPrice		
                    , TRUNCATE(TA.CardRefundPrice * TA.ProdDivisionRate, 0) as DivisionCardRefundPrice
                    , TRUNCATE(TA.CashRefundPrice * TA.ProdDivisionRate, 0) as DivisionCashRefundPrice
                    , TRUNCATE(if(TA.RefundPrice > 0, 0, if(TA.PgFee < 1, (TA.CardPayPrice * TA.ProdDivisionRate) * TA.PgFee, TA.PgFee)), 0) as DivisionPgFeePrice
                from (
        ';

        if ($prod_type == 'OL') {
            $query .= /** @lang text */ '
                    select OP.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OP.ProdCode as ProdCodeSub		
                        , OP.RealPayPrice
                        , OP.CardPayPrice
                        , OP.CashPayPrice
                        , ifnull(OPR.RefundPrice, 0) as RefundPrice
                        , ifnull(OPR.CardRefundPrice, 0) as CardRefundPrice
                        , ifnull(OPR.CashRefundPrice, 0) as CashRefundPrice
                        , OP.PayStatusCcd
                        , O.OrderNo
                        , O.MemIdx
                        , O.PayRouteCcd
                        , O.PayMethodCcd
                        , O.CompleteDatm
                        , OPR.RefundDatm
                        , OP.DiscRate
                        , OP.DiscType
                        , OP.Remark
                        , null as ProdName
                        , null as CateCode                        
                        , PL.LearnPatternCcd
                        , PL.PackTypeCcd
                        , PD.ProdDivisionRate
                        , json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee
                    from ' . $this->_table['order_product'] . ' as OP
                        inner join ' . $this->_table['order'] . ' as O
                            on OP.OrderIdx = O.OrderIdx
                        inner join ' . $this->_table['product_lecture'] . ' as PL
                            on OP.ProdCode = PL.ProdCode
                        inner join ' . $this->_table['product_division'] . ' as PD
                            on OP.ProdCode = PD.ProdCode and OP.ProdCode = PD.ProdCodeSub
                        left join ' . $this->_table['order_product_refund'] . ' as OPR
                            on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                        left join ' . $this->_table['code'] . ' as CPM
                            on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"				
                    where OP.ProdCode = ' . $this->_conn->escape($prod_code) . '
                        and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                        and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '"
                        and PD.ProfIdx = ' . $this->_conn->escape($prof_idx) . ' 
                        and PD.IsStatus = "Y"
                    union all
            ';
        }

        $query .= /** @lang text */ '
                    select OP.OrderIdx, OP.OrderProdIdx, OP.ProdCode, OSP.ProdCodeSub
                        , ' . $arr_price_column['RealPayPrice'] . ' as RealPayPrice
                        , ' . $arr_price_column['CardPayPrice'] . ' as CardPayPrice
                        , ' . $arr_price_column['CashPayPrice'] . ' as CashPayPrice
                        , ' . $arr_price_column['RefundPrice'] . ' as RefundPrice
                        , ' . $arr_price_column['CardRefundPrice'] . ' as CardRefundPrice
                        , ' . $arr_price_column['CashRefundPrice'] . ' as CashRefundPrice
                        , OP.PayStatusCcd
                        , O.OrderNo
                        , O.MemIdx
                        , O.PayRouteCcd				
                        , O.PayMethodCcd
                        , O.CompleteDatm
                        , OPR.RefundDatm
                        , OP.DiscRate
                        , OP.DiscType
                        , OP.Remark		
                        , P.ProdName
                        , PC.CateCode                        		
                        , PL.LearnPatternCcd
                        , PL.PackTypeCcd	
                        , (select case 		
                            when PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '" then ifnull(PD.ProdDivisionRate, 0)
                            when PL.PackTypeCcd in ("' . $this->_adminpack_lecture_type_ccd['choice'] . '", "' . $this->_adminpack_lecture_type_ccd['choice_prof'] . '") then ifnull(
                                SPS.SalePrice * SPD.ProdDivisionRate /
                                (select sum(B.SalePrice) 
                                    from ' . $this->_table['order_sub_product'] . ' as A 
                                        inner join ' . $this->_table['product_sale'] . ' as B 
                                            on A.ProdCodeSub = B.ProdCode and B.SaleTypeCcd = "613001" and B.IsStatus = "Y" 
                                    where A.OrderProdIdx = OP.OrderProdIdx)
                                , 0)
                            else 0 
                          end) as ProdDivisionRate
                        , json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee
                    from ' . $this->_table['order_sub_product'] . ' as OSP
                        inner join ' . $this->_table['order_product'] . ' as OP
                            on OSP.OrderProdIdx = OP.OrderProdIdx
                        inner join ' . $this->_table['order'] . ' as O
                            on OP.OrderIdx = O.OrderIdx
                        inner join ' . $this->_table['product'] . ' as P
                            on OP.ProdCode = P.ProdCode                            
                        inner join ' . $this->_table['product_lecture'] . ' as PL
                            on OP.ProdCode = PL.ProdCode
                        inner join ' . $this->_table['product_division'] . ' as SPD
                            on OSP.ProdCodeSub = SPD.ProdCode and OSP.ProdCodeSub = SPD.ProdCodeSub
                        left join ' . $this->_table['product_sale'] . ' as SPS
                            on OSP.ProdCodeSub = SPS.ProdCode and SPS.SaleTypeCcd = "613001" and SPS.IsStatus = "Y" 
                                and PL.PackTypeCcd in ("' . $this->_adminpack_lecture_type_ccd['choice'] . '", "' . $this->_adminpack_lecture_type_ccd['choice_prof'] . '")		
                        left join ' . $this->_table['product_division'] . ' as PD
                            on OP.ProdCode = PD.ProdCode and OSP.ProdCodeSub = PD.ProdCodeSub and PD.IsStatus = "Y" and PD.ProfIdx = ' . $this->_conn->escape($prof_idx) . '
                        left join ' . $this->_table['product_r_category'] . ' as PC
                            on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"                            
                        left join ' . $this->_table['order_product_refund'] . ' as OPR
                            on OPR.OrderIdx = OP.OrderIdx and OPR.OrderProdIdx = OP.OrderProdIdx
                        left join ' . $this->_table['order_unpaid_hist'] . ' as OUH
                            on OUH.OrderIdx = OP.OrderIdx                            
                        left join ' . $this->_table['code'] . ' as CPM
                            on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"				
                    where OSP.ProdCodeSub = ' . $this->_conn->escape($prod_code) . '
                        and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                        and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"
                        and SPD.ProfIdx = ' . $this->_conn->escape($prof_idx) . ' 
                        and SPD.IsStatus = "Y"
                        and PL.PackTypeCcd ' . ($prod_type == 'CP' ? '' : 'not') . ' in ("' . $this->_adminpack_lecture_type_ccd['choice_prof'] . '")
                        ' . ($prod_type == 'CP' ? 'and (OUH.UnPaidIdx is null or OUH.UnPaidUnitNum = 1)' : '') . '                       
                ) as TA		
            ) as RD	        
        ';

        return $query;
    }

    /**
     * 한림전용 강사료정산 이력 등록
     * @param array $input
     * @return array|bool
     */
    public function addCalcHist($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $prof_idx = element('prof_idx', $input);
            $prod_code = element('prod_code', $input);
            $prod_type = element('prod_type', $input);
            $base_datm = element('base_datm', $input);
            $mem_cnt = element('mem_cnt', $input, 0);
            $pre_price = strip_comma(element('pre_price', $input, 0));                  // 수수료공제전수강총액
            $lec_deduct_price = 0;      // 단과반 추가공제액
            $pack_deduct_price = 0;     // 종합반 추가공제액
            $etc_deduct_price = 0;      // 기타 추가공제액
            $deduct_data = [];          // 공제내역 입력 데이터

            if (empty($prof_idx) === true || empty($prod_code) === true || empty($prod_type) === true || empty($base_datm) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 정산대상 합계금액 조회
            $sum_data = $this->hanlimCalcModel->listCalcOrder($prof_idx, $prod_code, $prod_type, true, false, $base_datm);
            if (empty($sum_data) === true) {
                throw new \Exception('정산대상이 없습니다.', _HTTP_NOT_FOUND);
            }

            if ($sum_data['tMemCnt'] != $mem_cnt) {
                throw new \Exception('수강인원이 변경되었습니다. 다시 산출해 주십시오.', _HTTP_CONFLICT);
            }

            if ($prod_type == 'OL' && $sum_data['tPrePrice'] != $pre_price) {
                throw new \Exception('수강총액이 변경되었습니다. 다시 산출해 주십시오.', _HTTP_CONFLICT);
            }

            // 상품구분별 데이터 설정
            if ($prod_type == 'CP') {
                $pay_price = 0;
                $refund_price = 0;
                $lec_remain_price = 0;
                $pack_remain_price = strip_comma(element('pack_remain_price', $input, 0));
                $remain_price = $pack_remain_price;
                $pg_fee_price = $pre_price - $pack_remain_price;
            } else {
                $pay_price = $sum_data['tPayPrice'];
                $refund_price = $sum_data['tRefundPrice'];
                $lec_remain_price = $sum_data['tLecRemainPrice'];
                $pack_remain_price = $sum_data['tPackRemainPrice'];
                $remain_price = $sum_data['tRemainPrice'];
                $pg_fee_price = $sum_data['tPgFeePrice'];
            }

            // 추가공제액
            foreach (array_get($input, 'deduct_n_price', []) as $idx => $deduct_price) {
                if (empty($deduct_price) === false) {
                    $deduct_lec_type = array_get($input, 'deduct_n_lec_type.' . $idx, 'L');
                    $deduct_type = array_get($input, 'deduct_n_type.'. $idx, '-');
                    $deduct_price = strip_comma($deduct_price) * ($deduct_type == '+' ? 1 : -1);

                    if ($deduct_lec_type == 'L') {
                        $lec_deduct_price += $deduct_price;
                    } else {
                        $pack_deduct_price += $deduct_price;
                    }

                    // 공제내역 등록 데이터
                    $deduct_data[] = [
                        'DeductType' => 'N',
                        'DeductLecType' => $deduct_lec_type,
                        'DeductName' => array_get($input, 'deduct_n_name.'. $idx, ''),
                        'DeductPrice' => $deduct_price
                    ];
                }
            }

            // 강사료정산대상금액
            $lec_target_price = $lec_remain_price + $lec_deduct_price;
            $pack_target_price = $pack_remain_price + $pack_deduct_price;

            // 정산기준계산금액
            $lec_calc_type = element('lec_calc_type', $input, 'R');
            $lec_calc_rate = strip_comma(element('lec_calc_rate', $input, 0));
            $lec_calc_price = $this->_getCalcPrice($lec_target_price, $lec_calc_type, $lec_calc_rate);
            $pack_calc_type = element('pack_calc_type', $input, 'R');
            $pack_calc_rate = strip_comma(element('pack_calc_rate', $input, 0));
            $pack_calc_price = $this->_getCalcPrice($pack_target_price, $pack_calc_type, $pack_calc_rate);
            $calc_price = $lec_calc_price + $pack_calc_price;

            // 원천세
            $tax_rate = element('tax_rate', $input, 0);
            $tax_price = $calc_price * ($tax_rate / 100);
            $tax_price = floor($tax_price);

            // 기타추가공제액
            foreach (array_get($input, 'deduct_e_price', []) as $idx => $deduct_price) {
                if (empty($deduct_price) === false) {
                    $deduct_type = array_get($input, 'deduct_e_type.'. $idx, '-');
                    $deduct_price = strip_comma($deduct_price) * ($deduct_type == '+' ? 1 : -1);
                    $etc_deduct_price += $deduct_price;

                    // 공제내역 등록 데이터
                    $deduct_data[] = [
                        'DeductType' => 'E',
                        'DeductLecType' => 'E',
                        'DeductName' => array_get($input, 'deduct_e_name.'. $idx, ''),
                        'DeductPrice' => $deduct_price
                    ];
                }
            }

            // 최종 강사료지급액
            $final_calc_price = $calc_price - $tax_price + $etc_deduct_price;

            // 최종 강사료지급액 체크
            if ($final_calc_price != strip_comma(element('final_calc_price', $input, 0))) {
                throw new \Exception('최종 강사료지급액이 일치하지 않습니다. 다시 산출해 주십시오.', _HTTP_CONFLICT);
            }

            // 이전 강사료정산 이력 데이터 조회
            $arr_condition = ['EQ' => ['ProfIdx' => $prof_idx, 'ProdCode' => $prod_code, 'ProdType' => $prod_type]];
            $prev_data = $this->_conn->getListResult($this->_calc_table['calc_hist'], 'PchIdx, PchSeq', $arr_condition, 1, 0, ['PchIdx' => 'desc']);

            if (empty($prev_data) === true) {
                $pch_seq = 1;
            } else {
                $prev_pch_idx = array_get($prev_data, '0.PchIdx');
                $pch_seq = array_get($prev_data, '0.PchSeq') + 1;

                // 이전 강사료정산 이력 삭제 처리
                $is_hist_update = $this->_conn->set('IsStatus', 'N')
                    ->where('PchIdx', $prev_pch_idx)->where('ProfIdx', $prof_idx)->where('ProdCode', $prod_code)->where('ProdType', $prod_type)
                    ->where('IsStatus', 'Y')
                    ->update($this->_calc_table['calc_hist']);
                if ($is_hist_update === false) {
                    throw new \Exception('이전 강사료정산 이력 수정에 실패했습니다.');
                }

                // 이전 강사료정산 공제내역 삭제 처리
                $is_deduct_update = $this->_conn->set('IsStatus', 'N')
                    ->where('PchIdx', $prev_pch_idx)->where('IsStatus', 'Y')
                    ->update($this->_calc_table['calc_deduct']);
                if ($is_deduct_update === false) {
                    throw new \Exception('이전 강사료정산 공제내역 수정에 실패했습니다.');
                }
            }

            // 강사료정산 이력 등록
            $data = [
                'PchSeq' => $pch_seq,
                'ProfIdx' => $prof_idx,
                'ProdCode' => $prod_code,
                'ProdType' => $prod_type,
                'BaseDatm' => $base_datm,
                'PayCnt' => $sum_data['tPayCnt'],
                'RefundCnt' => $sum_data['tRefundCnt'],
                'MemCnt' => $sum_data['tMemCnt'],
                'LecMemCnt' => $sum_data['tLecMemCnt'],
                'PackMemCnt' => $sum_data['tPackMemCnt'],
                'PayPrice' => $pay_price,
                'RefundPrice' => $refund_price,
                'PrePrice' => $pre_price,
                'PgFeePrice' => $pg_fee_price,
                'RemainPrice' => $remain_price,
                'LecRemainPrice' => $lec_remain_price,
                'PackRemainPrice' => $pack_remain_price,
                'DeductPrice' => $lec_deduct_price + $pack_deduct_price,
                'LecDeductPrice' => $lec_deduct_price,
                'PackDeductPrice' => $pack_deduct_price,
                'TargetPrice' => $lec_target_price + $pack_target_price,
                'LecTargetPrice' => $lec_target_price,
                'PackTargetPrice' => $pack_target_price,
                'LecCalcRate' => $lec_calc_rate,
                'LecCalcType' => $lec_calc_type,
                'PackCalcRate' => $pack_calc_rate,
                'PackCalcType' => $pack_calc_type,
                'CalcPrice' => $lec_calc_price + $pack_calc_price,
                'LecCalcPrice' => $lec_calc_price,
                'PackCalcPrice' => $pack_calc_price,
                'TaxRate' => $tax_rate,
                'TaxPrice' => $tax_price,
                'EtcDeductPrice' => $etc_deduct_price,
                'FinalCalcPrice' => $final_calc_price,
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_calc_table['calc_hist']) === false) {
                throw new \Exception('강사료정산 이력 등록에 실패했습니다.');
            }

            // 신규등록 강사료정산 이력 식별자
            $pch_idx = $this->_conn->insert_id();
            
            // 강사료정산 공제내역 등록
            if (empty($deduct_data) === false) {
                foreach ($deduct_data as $idx => $input_data) {
                    $input_data['PchIdx'] = $pch_idx;

                    if ($this->_conn->set($input_data)->insert($this->_calc_table['calc_deduct']) === false) {
                        throw new \Exception('강사료정산 공제내역 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 정산기준계산금액 리턴 (강사료비율 적용)
     * @param int $target_price [강사료정산대상금액]
     * @param string $calc_type [강사료비율구분 (R: 비율, T: 시급, P: 월정액)
     * @param int $calc_rate [강사료비율]
     * @return int
     */
    private function _getCalcPrice($target_price, $calc_type, $calc_rate)
    {
        if ($calc_type == 'R') {
            $calc_price = $target_price * ($calc_rate / 100);  // 강사료비율 적용
            $calc_price = floor($calc_price);   // 소숫점 버림
        } else if ($calc_type === 'T') {
            $calc_price = $calc_rate * $this->_hour_rate;
        } else {
            $calc_price = $calc_rate;
        }

        return $calc_price;
    }
}
