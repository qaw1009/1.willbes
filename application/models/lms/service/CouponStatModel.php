<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponStatModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_detail' => 'lms_coupon_detail',
        'order_product' => 'lms_order_product'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사용자쿠폰 발급일자별 월별 통계
     * @param string $search_start_date
     * @param string $search_end_date
     * @param array $arr_condition
     * @return mixed
     */
    public function listStatIssueCoupon($search_start_date, $search_end_date, $arr_condition = [])
    {
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';

        $column = 'TA.BaseYm, count(0) as IssueCnt, ifnull(sum(if(TA.IsUse = "Y", 0, 1)), 0) as NoUseCnt
            , ifnull(sum(if(TA.IsUse = "Y", 1, 0)), 0) as UseCnt, ifnull(sum(TA.DiscPrice), 0) as UsePrice';

        $from = '
            from (
                select left(CD.IssueDatm, 7) as BaseYm, CD.IsUse, OP.DiscPrice
                from ' . $this->_table['coupon'] . ' as C
                    inner join ' . $this->_table['coupon_detail'] . ' as CD
                        on CD.CouponIdx = C.CouponIdx
                    left join ' . $this->_table['order_product'] . ' as OP
                        on CD.UseOrderProdIdx = OP.OrderProdIdx and CD.IsUse = "Y" and OP.IsUseCoupon = "Y"		
                where CD.IssueDatm between ? and ?
                ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(true) . '
            ) as TA
            group by TA.BaseYm
            order by TA.BaseYm desc
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$search_start_date, $search_end_date]);

        return $query->result_array();
    }

    /**
     * 사용자쿠폰 사용일자별 월별 통계
     * @param $search_start_date
     * @param $search_end_date
     * @param array $arr_condition
     * @return mixed
     */
    public function listStatUseCoupon($search_start_date, $search_end_date, $arr_condition = [])
    {
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';

        $column = 'TA.BaseYm, 0 as IssueCnt, 0 as NoUseCnt
            , count(0) as UseCnt, ifnull(sum(TA.DiscPrice), 0) as UsePrice';

        $from = '
            from (
                select left(CD.UseDatm, 7) as BaseYm, OP.DiscPrice
                from ' . $this->_table['coupon'] . ' as C
                    inner join ' . $this->_table['coupon_detail'] . ' as CD
                        on CD.CouponIdx = C.CouponIdx
                    left join ' . $this->_table['order_product'] . ' as OP
                        on CD.UseOrderProdIdx = OP.OrderProdIdx and OP.IsUseCoupon = "Y"		
                where CD.UseDatm between ? and ?
                     and CD.IsUse = "Y"
                ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(true) . '
            ) as TA
            group by TA.BaseYm
            order by TA.BaseYm desc
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$search_start_date, $search_end_date]);

        return $query->result_array();
    }
}
