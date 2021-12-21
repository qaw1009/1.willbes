<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/GatherBaseStatsModel.php';

class GatherStatsGatewayModel extends GatherBaseStatsModel
{
    /**
     * 일별 광고 접속통계
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getGatewayCount($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(base_date, \'' . $get_condition['search_date_type'] . '\')';
        $stats_date = 'DATE_FORMAT(StatsDate, \'' . $get_condition['search_date_type'] . '\')';

        $base_where = $this->_conn->makeWhere(['BDT' => ['base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]]])->getMakeWhere();
        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'temp_date.base_date
                        ,ifnull(temp.gateway_count,0) as gateway_count
                        ,ifnull(temp.member_count,0) as member_count
                        ,ifnull(temp.order_count,0) as order_count
                        ,ifnull(temp.order_pay,0) as order_pay
                        ,(Ifnull(temp.refund_count,0)*-1) as refund_count
                        ,(Ifnull(temp.refund_pay,0)*-1) as refund_pay';
        $from = '
                    from
                        (
                            select ' . $base_date . ' as base_date
                            from ' . $this->_table['base_date'] . $base_where . ' 
                            group by  ' . $base_date . '
                        ) temp_date
                
                        left join
                        (
                            select ' . $stats_date . ' as StatsDate
                                ,sum(GatewayCount) as gateway_count
                                ,sum(MemberCount) as member_count 
                                ,sum(OrderCount) as order_count
                                ,sum(OrderPay) as order_pay
                                ,sum(RefundCount) as refund_count
                                ,sum(RefundPay) as refund_pay
                            from ' . $this->_table['gateway'] . $where.' 
                            group by ' . $stats_date . '
                        ) temp on temp_date.base_date = temp.StatsDate
        ';
        $order_by = $this->_conn->makeOrderBy(['base_date' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 사이트별 광고 접속통계
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getGatewaySite($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_condition = [
            'IN' => ['S.SiteCode' => get_auth_site_codes(false, true)],
            'EQ' => ['S.IsUse' => 'Y']
        ];
        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere();

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'S.SiteCode,S.SiteName 
                        ,ifnull(temp.gateway_count,0) as gateway_count
                        ,ifnull(temp.member_count,0) as member_count
                        ,ifnull(temp.order_count,0) as order_count
                        ,ifnull(temp.order_pay,0) as order_pay
                        ,(Ifnull(temp.refund_count,0)*-1) as refund_count
                        ,(Ifnull(temp.refund_pay,0)*-1) as refund_pay';
        $from = '
                    from
                        '. $this->_table['site'] .' S
                        left join
                        (
                            select SiteCode
                                ,sum(GatewayCount) as gateway_count
                                ,sum(MemberCount) as member_count 
                                ,sum(OrderCount) as order_count
                                ,sum(OrderPay) as order_pay
                                ,sum(RefundCount) as refund_count
                                ,sum(RefundPay) as refund_pay
                            from ' . $this->_table['gateway'] . $where.' 
                            group by SiteCode
                        ) temp on S.SiteCode = temp.SiteCode
        ';
        $order_by = $this->_conn->makeOrderBy(['S.SiteGroupCode' => 'ASC', 'S.SiteCode' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $base_where .  $order_by)->result_array();
    }

    /**
     * 접속 목록 : 집계통계시 필요없는 항목으로 빈 메소드 생성
     * @param $is_count
     * @param array $arr_input
     * @return int
     */
    public function getGatewayHistoryList($is_count, $arr_input = [])
    {
        return 0;
    }
}