<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/GatherBaseStatsModel.php';

class GatherStatsOrderModel extends GatherBaseStatsModel
{
    /**
     * 일별 주문수/금액
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getOrderCount($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], $this->_condition($arr_input));

        $base_date = 'DATE_FORMAT(base_date, \'' . $get_condition['search_date_type'] . '\')';
        $stats_date = 'DATE_FORMAT(StatsDate, \'' . $get_condition['search_date_type'] . '\')';

        $base_where = $this->_conn->makeWhere(['BDT' => ['base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]]])->getMakeWhere();
        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = 'temp_date.base_date
                        ,ifnull(temp_order.order_count,0) as order_count
                        ,(ifnull(temp_refund.refund_count,0)*-1) as refund_count
                        ,ifnull(temp_order.order_pay,0) as order_pay
                        ,(ifnull(temp_refund.refund_pay,0)*-1) as refund_pay
                        ,(ifnull(temp_order.order_count,0) - ifnull(temp_refund.refund_count,0)) as real_count 
                        ,(ifnull(temp_order.order_pay,0) - ifnull(temp_refund.refund_pay,0)) as real_pay';
        $from = '
                    from
                        (
                            select ' . $base_date . ' as base_date
                            from ' . $this->_table['base_date'] . $base_where . ' 
                            group by  ' . $base_date . '
                        ) temp_date
                
                        left join
                        (
                            select ' . $stats_date . ' as StatsDate, sum(PayCount) order_count , sum(PayPrice) order_pay
                            from ' . $this->_table['order'] . ' 
                            where 
                                OrderType=\'결제\' ' . $where . '
                            group by ' . $stats_date . '
                        ) temp_order on temp_date.base_date = temp_order.StatsDate
                        
                        left join
                        (
                            select ' . $stats_date . ' as StatsDate, sum(PayCount) refund_count , sum(PayPrice) refund_pay
                            from ' . $this->_table['order'] . ' 
                            where 
                                OrderType=\'환불\' ' . $where . ' 
                            group by ' . $stats_date . '
                        ) temp_refund on temp_date.base_date = temp_refund.StatsDate
        ';
        $order_by = $this->_conn->makeOrderBy(['base_date' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 성별 결제/환불
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getOrderSex($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], $this->_condition($arr_input));

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);
        $column = ' * ';
        $from = '
                    from (
                            select 
                                OrderType as order_status
                                , ifnull(sum(if(Sex =\'m\', PayCount, 0)),0) as \'m\'
                                , ifnull(sum(if(Sex =\'m\', PayPrice, 0)),0) as \'m_pay\'
                                , ifnull(sum(if(Sex =\'f\', PayCount, 0)),0) as \'f\'
                                , ifnull(sum(if(Sex =\'f\', PayPrice, 0)),0) as \'f_pay\'
                                , ifnull(sum(if(Sex = \'not\', PayCount, 0)),0) as \'not\'
                                , ifnull(sum(if(Sex = \'not\', PayPrice, 0)),0) as \'not_pay\'
                            from ' . $this->_table['order'] . '
                            where 
                                OrderType = \'결제\' ' . $where . '
                        
                            union all 
                        
                            select 
                                OrderType
                                , (ifnull(sum(if(Sex =\'m\', PayCount, 0)),0)*-1) as \'m\'
                                , (ifnull(sum(if(Sex =\'m\', PayPrice, 0)),0)*-1) as \'m_pay\'
                                , (ifnull(sum(if(Sex =\'f\', PayCount, 0)),0)*-1) as \'f\'
                                , (ifnull(sum(if(Sex =\'f\', PayPrice, 0)),0)*-1) as \'f_pay\'
                                , (ifnull(sum(if(Sex = \'not\', PayCount, 0)),0)*-1) as \'not\'
                                , (ifnull(sum(if(Sex = \'not\', PayPrice, 0)),0)*-1) as \'not_pay\'
                            from ' . $this->_table['order'] . '
                            where 
                                OrderType = \'환불\' ' . $where . '
                    ) temp
        ';
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * 사이트별 결제/환불
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getOrderSite($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], $this->_condition($arr_input));

        $base_condition = [
            'IN' => ['S.SiteCode' => get_auth_site_codes()],
            'EQ' => ['S.IsUse' => 'Y']
        ];
        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere();

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = '
                S.SiteCode,S.SiteName 
                ,Ifnull(temp_order.order_count,0) as order_count 
                ,Ifnull(temp_order.order_pay,0) as order_pay 
                ,(Ifnull(temp_refund.refund_count,0)*-1) as refund_count 
                ,(Ifnull(temp_refund.refund_pay,0)*-1) as refund_pay 
                ,(ifnull(temp_order.order_count,0) - ifnull(temp_refund.refund_count,0)) as real_count 
                ,(ifnull(temp_order.order_pay,0) - ifnull(temp_refund.refund_pay,0)) as real_pay
        ';
        $from = '
                from
                    vw_lms_site S
                    left join
                    (
                        select 
                            SiteCode, Sum(PayCount) as order_count, sum(PayPrice) as order_pay
                        from ' . $this->_table['order'] . '
                        where 
                            OrderType = \'결제\' ' . $where . '
                        group by SiteCode 
                    ) temp_order on S.SiteCode = temp_order.SiteCode
                    
                    left join
                    (
                        select 
                            SiteCode, Sum(PayCount) as refund_count, sum(PayPrice) as refund_pay
                        from ' . $this->_table['order'] . '
                        where 
                            OrderType = \'환불\' ' . $where . '
                        group by SiteCode 
                    ) temp_refund on S.SiteCode = temp_refund.SiteCode
        ';

        $order_by = $this->_conn->makeOrderBy(['S.SiteGroupCode' => 'ASC', 'S.SiteCode' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $base_where . $order_by)->result_array();
    }

    /**
     * 결제채널별 결제정보
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getOrderChannel($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], $this->_condition($arr_input));

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = 'O.PayChannelCcd, SC.CcdName, Sum(O.PayCount) as order_count, Sum(O.PayPrice) as order_pay';
        $from = '
                from 
                    ' . $this->_table['order'] . ' O
	                left join ' . $this->_table['code'] . ' SC on O.PayChannelCcd = SC.Ccd
	            where  
	                O.OrderType = \'결제\' ' . $where . '
	            group by PayChannelCcd
        ';

        $order_by = $this->_conn->makeOrderBy(['SC.OrderNum' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 결제수단별 결제정보
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getOrderMethod($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], $this->_condition($arr_input));

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = 'if(O.PayMethodCcd = \'\', \'600000\', O.PayMethodCcd) as PayMethodCcd, Ifnull(SC.CcdName,\'기타무료결제\') as CcdName
                        , Sum(O.PayCount) as order_count, Sum(O.PayPrice) as order_pay';
        $from = '
                from 
                    ' . $this->_table['order'] . ' O
	                left join ' . $this->_table['code'] . ' SC on O.PayMethodCcd = SC.Ccd
	            where  
	                O.OrderType = \'결제\' ' . $where . '
	            group by PayMethodCcd
        ';

        $order_by = $this->_conn->makeOrderBy(['SC.OrderNum' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 검색조건
     * @param array $arr_input
     */
    private function _condition($arr_input = [])
    {
        $condition = [
            'EQ' => [
                'PayChannelCcd' => element('search_pay_channel', $arr_input),
                'PayMethodCcd' => element('search_pay_method', $arr_input),
            ]
        ];
        return $condition;
    }

}