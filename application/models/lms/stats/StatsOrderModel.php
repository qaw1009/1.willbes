<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/BaseStatsModel.php';

class StatsOrderModel extends BaseStatsModel
{

    public function getOrderCount($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $pay_date = 'DATE_FORMAT(O.CompleteDatm, \''.$get_condition['search_date_type'].'\')';
        $refund_date = 'DATE_FORMAT(OPR.RefundDatm, \''.$get_condition['search_date_type'].'\')';

        $base_condition['BDT'] = ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]];
        $pay_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['O.CompleteDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'IN' => ['OP.PayStatusCcd' => ["676001", "676006"]],
            ]
        );
        $refund_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['OPR.RefundDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'IN' => ['OP.PayStatusCcd' => ["676006"]],
            ]
        );

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $pay_where = $this->_conn->makeWhere($pay_condition)->getMakeWhere(true);
        $refund_where = $this->_conn->makeWhere($refund_condition)->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_pay.order_count,0) as order_count
                        ,ifnull(temp_refund.refund_count,0) as refund_count
                        ,ifnull(temp_pay.order_pay,0) as order_pay
                        ,ifnull(temp_refund.refund_pay,0) as refund_pay
                        ,(ifnull(temp_pay.order_count,0) - ifnull(temp_refund.refund_count,0)) as real_count
                        ,(ifnull(temp_pay.order_pay,0) - ifnull(temp_refund.refund_pay,0)) as real_pay';

        $from = '
                    from
                        (
                            select '. $base_date .' as base_date
                                from '. $this->_table['base_date'] .' a
                                where 1=1 ' . $base_where .' 
                            group by  '. $base_date .'
                        ) temp_date
                        
                        left Join
                        (
                            select '. $pay_date .' as order_result_date
                              ,COUNT(*) AS order_count
                              ,sum(OP.RealPayPrice) as order_pay	
                            from '. $this->_table['order'] .' as O
                                inner join '. $this->_table['order_product'] .' as OP
                                    on O.OrderIdx = OP.OrderIdx
                                left join '. $this->_table['order_refund'] .' as OPR        
                                    on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                            where 
                                1=1
                                '. $pay_where .'
                            group by order_result_date
                        ) temp_pay on temp_date.base_date = temp_pay.order_result_date
                        
                        left join
                        (
                            select '. $refund_date .' as refund_result_date
                                  ,COUNT(*) AS refund_count
                                  ,sum(OPR.RefundPrice) as refund_pay
                            from '. $this->_table['order_refund'] .' as OPR
                                inner join '. $this->_table['order'] .' as O
                                    on OPR.OrderIdx = O.OrderIdx
                                inner join '. $this->_table['order_product'] .' as OP
                                    on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                            where 
                                1=1
                                '. $refund_where .'
                            group by refund_result_date
                        ) temp_refund on temp_date.base_date = temp_refund.refund_result_date
        ';

        $order_by = ' order by base_date asc';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    function _setCondition($arr_input=[])
    {
        $set_condition = [];
        $set_condition['search_end_date'] = element('search_end_date', $arr_input, date("Y-m-d"));
        $set_condition['search_start_date'] =  element('search_start_date', $arr_input, date('Y-m-d', strtotime($set_condition['search_end_date'] . ' -14 days')));
        $set_condition['search_date_type'] = element('search_date_type', $arr_input, '%Y-%m-%d');

        $set_condition['comm_condition'] = [
            'EQ' => [
                'O.PayChannelCcd' => element('search_pay_channel', $arr_input),
                'O.PayRouteCcd' => element('search_pay_route', $arr_input),
                'O.PayMethodCcd' => element('search_pay_method', $arr_input),
            ],
            'IN' => [
                'OP.SalePatternCcd' => ["694001", "694003", "694002"]
            ],
            'NOTIN' => [
                'O.PayRouteCcd' => ["670003", "670004"]
            ],
        ];
        if (empty(element('search_site_code', $arr_input))) {
            $set_condition['comm_condition']['IN']['O.SiteCode'] = ['100'];    //get_auth_site_codes(); 검색 설정된 사이트 코드가 존재하지 않을시 임의의 코드로 세팅
        } else {
            $set_condition['comm_condition']['IN']['O.SiteCode'] =  (array) element('search_site_code', $arr_input);
        }

        return $set_condition;
    }

}