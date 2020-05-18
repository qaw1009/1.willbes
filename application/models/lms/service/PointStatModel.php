<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointStatModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상품코드별 적립/사용 월별 통계
     * @param array $arr_prod_code
     * @param string $search_start_date
     * @param string $search_end_date
     * @param array $arr_condition
     * @return mixed
     */
    public function listStatSaveUsePointByProdCode($arr_prod_code, $search_start_date, $search_end_date, $arr_condition = [])
    {
        $arr_prod_code = (array) $arr_prod_code;
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';

        $column = 'TA.ProdCode, P.ProdName, TA.RegYm
            , sum(TA.SavePoint) as SumSavePoint, sum(TA.SaveCnt) as SumSaveCnt, sum(TA.UsePoint) as SumUsePoint, sum(TA.UseCnt) as SumUseCnt';

        $from = '
            from (
                select PS.PointIdx, OP.ProdCode, PS.SavePoint, 0 as UsePoint, 1 as SaveCnt, 0 as UseCnt, left(PS.SaveDatm, 7) as RegYm
                from ' . $this->_table['point_save'] . ' as PS
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = PS.OrderProdIdx		
                where PS.SaveDatm between ? and ?
                    and OP.ProdCode in ?
                union all
                select PS.PointIdx, OP.ProdCode, 0 as SavePoint, PU.UsePoint, 0 as SaveCnt, 1 as UseCnt, left(PU.UseDatm, 7) as RegYm
                from ' . $this->_table['point_save'] . ' as PS
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = PS.OrderProdIdx
                    inner join ' . $this->_table['point_use'] . ' as PU
                        on PS.PointIdx = PU.PointIdx	
                where PS.SaveDatm between ? and ?
                    and OP.ProdCode in ?
                    and PU.UseDatm between ? and ?
            ) as TA
                inner join ' . $this->_table['product'] . ' as P
                    on TA.ProdCode = P.ProdCode            
        ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(false) . '
            group by TA.ProdCode, TA.RegYm
            order by TA.ProdCode, TA.RegYm               
        ';

        $binds = [$search_start_date, $search_end_date, $arr_prod_code
            , $search_start_date, $search_end_date, $arr_prod_code, $search_start_date, $search_end_date
        ];

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, $binds);

        return $query->result_array();
    }

    /**
     * 적립구분(회원/교재/강의)별 교재포인트 적립/사용 통계
     * @param string $save_start_date [적립시작일]
     * @param string $save_end_date [적립종료일]
     * @param string $use_start_date [사용시작일]
     * @param string $use_end_date [사용종료일]
     * @param array $arr_condition [적립포인트 기준 추가조회조건]
     * @return mixed
     */
    public function listStatBookSaveUsePoint($save_start_date, $save_end_date, $use_start_date, $use_end_date, $arr_condition = [])
    {
        $base_intg_datm = '2019-03-25 00:00:00';    // 통합기준일시
        $save_start_date = $save_start_date . ' 00:00:00';  // 적립시작일
        $save_end_date = $save_end_date . ' 23:59:59';      // 적립종료일
        $use_start_date = $use_start_date . ' 00:00:00';    // 사용시작일
        $use_end_date = $use_end_date . ' 23:59:59';        // 사용종료일

        // 통합이전 포인트 적립사유
        $arr_prev_save_etc_reason = [
            '도서포인트 적립', '윌비스 패밀리 이벤트 포인트 적립',
            '2019년 설이벤트 참여', '2019년 1월 학원_설명회 이벤트 포인트 추가지급', '제대군인 전용 프리패스(교재포함)  구매 이벤트',
            '평생0원PASS 첫런칭기념 이벤트', '2019년 1월 학원 수강생 포인트 적립 이벤트', '인천캠퍼스 신규등록 이벤트 포인트(240,000점) 지급'
        ];

        $column = 'U.BaseYm, U.SaveReason, sum(U.SumSavePoint) as SumSavePoint, sum(U.SumUsePoint) as SumUsePoint';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 적립포인트 (결제포인트, 회원가입 적립포인트만 조회 => 전체 적립포인트 조회)
        $save_from = /** @lang text */ '
            select PS.PointIdx, PS.SiteCode, PS.SavePoint, left(PS.SaveDatm, 7) as SaveYm
                , (select case PS.EtcReason
                    when "도서포인트 적립" then "book"
                    when "윌비스 패밀리 이벤트 포인트 적립" then "join"
                    else "lecture"
                  end) as SaveReason                
            from ' . $this->_table['point_save'] . ' as PS
            where PS.SaveDatm between ? and ?
                and PS.SaveDatm < "' . $base_intg_datm . '"
                and PS.EtcReason in ?
                and PS.PointType = "book"
            union all
            select PS.PointIdx, PS.SiteCode, PS.SavePoint, left(PS.SaveDatm, 7) as SaveYm
                , (select case 
                    when PS.ReasonCcd = "680006" then "join"
                    when PS.ReasonCcd = "680001" then if(P.ProdTypeCcd = "636003", "book", "lecture")
                    else "etc" 
                end) as SaveReason 
            from ' . $this->_table['point_save'] . ' as PS
                left join ' . $this->_table['order_product'] . ' as OP
                    on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = OP.OrderProdIdx and PS.ReasonCcd = "680001"
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode
            where PS.SaveDatm between ? and ?
                and PS.SaveDatm >= "' . $base_intg_datm . '"
                #and PS.ReasonCcd in ("680001", "680006")
                and PS.PointType = "book"            
        ';

        // 사용포인트
        $use_from = /** @lang text */ '
            select PS.PointIdx, PS.SiteCode, PU.UsePoint, left(PU.UseDatm, 7) as UseYm
                , if(PS.SaveDatm < "' . $base_intg_datm . '",
                    (select case PS.EtcReason
                        when "도서포인트 적립" then "book"
                        when "윌비스 패밀리 이벤트 포인트 적립" then "join"
                        else "lecture"
                    end),
                    (select case PS.ReasonCcd
                        when "680006" then "join"
                        when "680001" then if(P.ProdTypeCcd = "636003", "book", "lecture")
                        else "etc" 			
                    end)		
                  ) as SaveReason
            from ' . $this->_table['point_use'] . ' as PU
                inner join ' . $this->_table['point_save'] . ' as PS
                    on PU.PointIdx = PS.PointIdx 
                left join ' . $this->_table['order_product'] . ' as OP
                    on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = OP.OrderProdIdx and PS.ReasonCcd = "680001" and PS.SaveDatm >= "' . $base_intg_datm . '"
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode
            where PU.UseDatm between ? and ?
                and PU.ReasonCcd = "681001"
                and PS.PointType = "book"
                and (PS.SaveDatm >= "' . $base_intg_datm . '" or (PS.SaveDatm < "' . $base_intg_datm . '" and PS.EtcReason in ?))        
        ';

        $from = '
            from (
                select TA.SaveYm as BaseYm, TA.SaveReason, sum(TA.SavePoint) as SumSavePoint, 0 as SumUsePoint
	            from (
                    ' . $save_from . '
	            ) as TA	
	            where 1 = 1' . $where . '
                group by TA.SaveYm, TA.SaveReason
                union all
                select TA.UseYm as BaseYm, TA.SaveReason, 0 as SumSavePoint, sum(TA.UsePoint) as SumUsePoint
                from (
                    ' . $use_from . '		
                ) as TA
                where 1 = 1' . $where . '
                group by TA.UseYm, TA.SaveReason                    
            ) as U
            group by U.BaseYm, U.SaveReason
            order by U.BaseYm, U.SaveReason
        ';

        $binds = [
            $save_start_date, $save_end_date, $arr_prev_save_etc_reason, $save_start_date, $save_end_date,
            $use_start_date, $use_end_date, $arr_prev_save_etc_reason
        ];

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, $binds);

        return $query->result_array();
    }

    /**
     * 강좌/교재포인트 적립/사용통계
     * @param string $point_type [포인트타입, lecture : 강좌, book : 교재]
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @param null|int $site_code [사이트코드]
     * @return mixed
     */
    public function listStatSaveUsePoint($point_type, $search_start_date, $search_end_date, $site_code = null)
    {
        $search_start_date = $search_start_date . ' 00:00:00';
        $search_end_date = $search_end_date . ' 23:59:59';

        $column = 'U.BaseYm, U.ReasonCode, sum(U.SumSavePoint) as SumSavePoint, sum(U.SumUsePoint) as SumUsePoint';

        $arr_condition = ['EQ' => ['PS.SiteCode' => $site_code]];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $from = '
            from (
                select TA.SaveYm as BaseYm, TA.SaveReason as ReasonCode, sum(TA.SavePoint) as SumSavePoint, 0 as SumUsePoint
                from (
                    select PS.SiteCode, PS.SavePoint, left(PS.SaveDatm, 7) as SaveYm
                        , (select case
                            when PS.ReasonCcd = "680001" then "order"
                            when PS.ReasonCcd = "680006" then "join"
                            when PS.ReasonCcd in ("680007", "680008", "680009") then "event"
                            else "etc"
                          end) as SaveReason
                    from ' . $this->_table['point_save'] . ' as PS
                    where PS.SaveDatm between ? and ?
                        and PS.PointType = ?
                        ' . $where . '
                ) as TA
                group by TA.SaveYm, TA.SaveReason
                union all
                select TA.UseYm as BaseYm, TA.UseReason as ReasonCode, 0 as SumSavePoint, sum(TA.UsePoint) as SumUsePoint
                from (
                    select PS.SiteCode, PU.UsePoint, left(PU.UseDatm, 7) as UseYm
                        , (select case
                            when PU.ReasonCcd = "681001" then "order"
                            when PU.ReasonCcd = "681002" then "expire"
                            else "etc"
                          end) as UseReason
                    from ' . $this->_table['point_use'] . ' as PU
                        inner join ' . $this->_table['point_save'] . ' as PS
                            on PU.PointIdx = PS.PointIdx
                    where PU.UseDatm between ? and ?
                        and PS.PointType = ?
                        ' . $where . '
                ) as TA
                group by TA.UseYm, TA.UseReason            
            ) as U 
            group by U.BaseYm, U.ReasonCode
            order by U.BaseYm, U.ReasonCode                   
        ';

        $binds = [$search_start_date, $search_end_date, $point_type, $search_start_date, $search_end_date, $point_type];

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, $binds);

        return $query->result_array();
    }
}
