<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/BaseStatsModel.php';

class StatsGatewayModel extends BaseStatsModel
{
    /**
     * 기간별 광고접속현황
     * @param array $arr_input
     * @return mixed
     */
    public function getGatewayCount($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $gateway_date = 'DATE_FORMAT(gal.RegDatm, \''.$get_condition['search_date_type'].'\')';
        $member_date = 'DATE_FORMAT(m.JoinDate, \''.$get_condition['search_date_type'].'\')';
        $order_date = 'DATE_FORMAT(O.CompleteDatm, \''.$get_condition['search_date_type'].'\')';

        $base_condition['BDT'] = ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]];
        $gateway_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['gal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );
        $member_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
            ]
        );
        $order_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['O.CompleteDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'IN' => [
                        'OP.PayStatusCcd' => ["676001", "676006"]
                        ,'OP.SalePatternCcd' => ["694001", "694003", "694002"]
                ],
                'NOTIN' => [
                    'O.PayRouteCcd' => ["670003", "670004"]
                ],
            ]
        );

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $gateway_where = $this->_conn->makeWhere($gateway_condition)->getMakeWhere(true);
        $member_where = $this->_conn->makeWhere($member_condition)->getMakeWhere(true);
        $order_where = $this->_conn->makeWhere($order_condition)->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_gateway.gateway_count,0) as gateway_count
                        ,ifnull(temp_member.member_count,0) as member_count
                        ,ifnull(temp_order.order_count,0) as order_count
                        ,ifnull(temp_order.order_pay,0) as order_pay';

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
                            select '. $gateway_date .' as result_date
                                ,COUNT(gal.GwalIdx) AS gateway_count
                            from 
                                '. $this->_table['gateway_log'] .' gal
                                join '. $this->_table['gateway'] .' g on gal.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                join '. $this->_table['gateway_cont'] .' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\'
                            where 
                                1=1
                                '. $gateway_where .'
                            group by result_date
                        ) as temp_gateway on temp_date.base_date = temp_gateway.result_date
                        
                        left join
                        (
                            select '. $member_date .' as result_date
                                ,COUNT(m.MemIdx) AS member_count
                            from 
                                '. $this->_table['member'] .' m
                                join '. $this->_table['member_other'] .' mo on m.MemIdx=mo.MemIdx
                                join '. $this->_table['gateway'] .' g on mo.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                join '. $this->_table['gateway_cont'] .' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\' 
                            where 
                                1=1
                                '. $member_where .'
                            group by result_date
                        ) temp_member on temp_date.base_date = temp_member.result_date
                        
                        left join
                        (
                            select '. $order_date .' as result_date
                                  ,COUNT(OP.OrderProdIdx) AS order_count
                                  ,sum(OP.RealPayPrice) as order_pay	
                            from '. $this->_table['order'] .' as O
                                inner join '. $this->_table['order_product'] .' as OP on O.OrderIdx = OP.OrderIdx
                                join  '. $this->_table['gateway'] .' g on O.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                join  '. $this->_table['gateway_cont'] .' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\' 
                            where 
                                1=1
                                '. $order_where .'
                            group by result_date
                        ) temp_order on temp_date.base_date = temp_order.result_date
        ';

        $order_by = ' order by base_date asc';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 사이트별 광고
     * @param array $arr_input
     * @return mixed
     */
    public function getGatewaySite($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $gateway_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['gal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );
        $member_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
            ]
        );
        $order_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['O.CompleteDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'IN' => [
                    'OP.PayStatusCcd' => ["676001", "676006"]
                    ,'OP.SalePatternCcd' => ["694001", "694003", "694002"]
                ],
                'NOTIN' => [
                    'O.PayRouteCcd' => ["670003", "670004"]
                ],
            ]
        );
        $refund_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['OPR.RefundDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'IN' => [
                    'OP.PayStatusCcd' => ["676006"]
                    ,'OP.SalePatternCcd' => ["694001", "694003", "694002"]
                ],
                'NOTIN' => [
                    'O.PayRouteCcd' => ["670003", "670004"]
                ],
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $gateway_where = $this->_conn->makeWhere($gateway_condition)->getMakeWhere(true);
        $member_where = $this->_conn->makeWhere($member_condition)->getMakeWhere(true);
        $order_where = $this->_conn->makeWhere($order_condition)->getMakeWhere(true);
        $refund_where = $this->_conn->makeWhere($refund_condition)->getMakeWhere(true);

        $column = '
                        S.SiteCode,S.SiteName
                        ,Ifnull(temp_gateway.gateway_count,0) as gateway_count
                        ,Ifnull(temp_member.member_count,0) as member_count
                        ,ifnull(temp_order.order_count,0) as order_count
                        ,ifnull(temp_order.order_pay,0) as order_pay
                        ,Ifnull(temp_refund.refund_count,0) as refund_count
                        ,Ifnull(temp_refund.refund_pay,0) as refund_pay
                       ';
        $from = '   from
                            '. $this->_table['site'] .' S
                            join '. $this->_table['site_group'] .' SG on S.SiteGroupCode = SG.SiteGroupCode
                            left join 
                            (
                                select g.SiteCode
                                    ,COUNT(gal.GwalIdx) AS gateway_count
                                from 
                                    '. $this->_table['gateway_log'] .' gal
                                    join '. $this->_table['gateway'] .' g on gal.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                    join '. $this->_table['gateway_cont'] .' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\'
                                where 
                                    1=1
                                     '. $gateway_where .'
                                group by g.SiteCode
                            ) as temp_gateway on S.SiteCode = temp_gateway.SiteCode
                            
                            left join
                            (
                                select g.SiteCode
                                    ,COUNT(m.MemIdx) AS member_count
                                from 
                                    '. $this->_table['member'].' m
                                    join '. $this->_table['member_other'].' mo on m.MemIdx=mo.MemIdx
                                    join '. $this->_table['gateway'].' g on mo.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                    join '. $this->_table['gateway_cont'].' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\' 
                                where 
                                    1=1
                                    '. $member_where .'
                                group by g.SiteCode
                            ) temp_member on S.SiteCode = temp_member.SiteCode
                                
                            left join 
                            (
                                select
                                     g.SiteCode,Count(*) as order_count, Sum(OP.RealPayPrice) as order_pay
                                from 
                                    '. $this->_table['order'].' as O
                                    join '. $this->_table['order_product'].' as OP on O.OrderIdx = OP.OrderIdx
                                    join '. $this->_table['gateway'].' g on O.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                    join '. $this->_table['gateway_cont'].' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\'
                                where 
                                    1=1
                                    '. $order_where .'
                                group by g.SiteCode
                            ) temp_order on S.Sitecode = temp_order.SiteCode
                            left join 
                            (
                                select
                                     g.SiteCode,Count(*) as refund_count, Sum(OPR.RefundPrice) as refund_pay
                                from 
                                    '. $this->_table['order_refund'] .' as OPR
                                    join '. $this->_table['order'] .' as O on OPR.OrderIdx = O.OrderIdx
                                    join '. $this->_table['order_product'] .' as OP on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                                    join '. $this->_table['gateway'] .' g on O.GwIdx = g.GwIdx and g.IsStatus=\'Y\' 
                                    join '. $this->_table['gateway_cont'] .' gc on g.ContIdx = gc.ContIdx and gc.IsStatus=\'Y\'
                                where 
                                    1=1
                                    '. $refund_where .'
                                group by g.SiteCode
                            ) temp_refund on S.Sitecode = temp_refund.SiteCode
                        where 1=1
                         '. $base_where .'
        ';
        $order_by = ' order by SG.SiteGroupCode, S.SiteCode ';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 사용자 접속환경
     * @param array $arr_input
     * @return mixed
     */
    public function getSearchPlatform($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $search_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => [
                    'sl.RegDatm' => [
                        $get_condition['search_start_date'] , $get_condition['search_end_date']
                    ]
                ]
            ]
        );

        $search_where = $this->_conn->makeWhere($search_condition)->getMakeWhere(true);

        $column = '
                        if(left(sl.UserPlatform,7)=\'Unknown\',\'기타\', if(left(sl.UserPlatform,7)=\'\',\'검색엔진\', left(sl.UserPlatform,7))) AS user_platform
                        #if(sl.UserPlatform =\'Unknown Platform\',\'기타\', if(sl.UserPlatform =\'\',\'검색엔진\', sl.UserPlatform)) AS user_platform
                        ,COUNT(*) AS search_count
                        ,sum(ResultCount) as search_result_sum
                       ';

        $from = '   from
                            '. $this->_table['search_log'] .' sl
                        where 1=1
                         '. $search_where .'
        ';
        $group_by = ' group by user_platform ';
        $order_by = ' order by user_platform ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by)->result_array();
    }

    /**
     * 검색어 클라우드
     * @param array $arr_input
     * @return mixed
     */
    public function getSearchCloud($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $search_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => [
                    'sl.RegDatm' => [
                        $get_condition['search_start_date'] , $get_condition['search_end_date']
                    ]
                ]
            ]
        );

        $search_where = $this->_conn->makeWhere($search_condition)->getMakeWhere(true);

        $column = 'sl.SearchWord as text, COUNT(*) AS weight';

        $from = '   from
                            '. $this->_table['search_log'] .' sl
                        where 1=1
                         '. $search_where .'
        ';
        $group_by = ' group by text ';
        $order_by = ' order by  count(*) Desc ';
        $limit = ' limit 100 ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by .$limit)->result_array();
    }



    /**
     * 사이트별 검색어
     * @param array $arr_input
     * @return mixed
     */
    public function getSearchSiteWord($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $search_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => [
                    'sl.RegDatm' => [
                        $get_condition['search_start_date'] , $get_condition['search_end_date']
                    ]
                ]
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y','S.IsCampus' => 'N'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $search_where = $this->_conn->makeWhere($search_condition)->getMakeWhere(true);

        $column = 's.SiteName, sl.SearchWord, count(*) as search_count, sum(sl.ResultCount) as search_result_sum';

        $from = '   from
                            '. $this->_table['search_log'] .' sl
                            join '. $this->_table['site'] .' S on S.SiteCode = sl.SiteCode
                            join '. $this->_table['site_group'] .' SG on S.SiteGroupCode = SG.SiteGroupCode
                        where 1=1
                         '. $base_where .'
                         '. $search_where .'
        ';

        $group_by = ' group by s.SiteName,sl.SearchWord ';
        $order_by = ' order by count(*) DESC, SearchWord ASC' ;
        $limit = ' limit 20 ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by .$limit)->result_array();
    }

    /**
     * 검색어
     * @param array $arr_input
     * @return mixed
     */
    public function getSearchWord($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $search_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => [
                    'sl.RegDatm' => [
                        $get_condition['search_start_date'] , $get_condition['search_end_date']
                    ]
                ]
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y','S.IsCampus' => 'N'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $search_where = $this->_conn->makeWhere($search_condition)->getMakeWhere(true);

        $column = 'sl.SearchWord, count(*) as search_count, sum(sl.ResultCount) as search_result_sum';

        $from = '   from
                            '. $this->_table['search_log'] .' sl
                            join '. $this->_table['site'] .' S on S.SiteCode = sl.SiteCode
                            join '. $this->_table['site_group'] .' SG on S.SiteGroupCode = SG.SiteGroupCode
                        where 1=1
                         '. $base_where .'
                         '. $search_where .'
        ';

        $group_by = ' group by sl.SearchWord ';
        $order_by = ' order by count(*) DESC, SearchWord ASC' ;
        $limit = ' limit 20 ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by .$limit)->result_array();
    }

    /**
     * 검색 목록
     * @param $is_count
     * @param array $arr_input
     * @return mixed
     */
    public function getSearchHistoryList($is_count, $arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $search_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => [
                    'sl.RegDatm' => [
                        $get_condition['search_start_date'] , $get_condition['search_end_date']
                    ]
                ]
            ]
        );

        $search_where = $this->_conn->makeWhere($search_condition)->getMakeWhere(true);

        $order_by = ['sl.SlIdx' => 'DESC'];

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'sl.*,s.SiteGroupCode,s.SiteName,sc.CateName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset(element('length',$arr_input), element('start',$arr_input))->getMakeLimitOffset();
        }

        $from = '
                    from 
                        '. $this->_table['search_log'].' as sl
                        join '. $this->_table['site'].' as s on sl.SiteCode = s.SiteCode
                        left join '. $this->_table['category'].' as sc on sl.CateCode = sc.CateCode
                    where 1=1
                    '. $search_where .'
        ';

        $query = $this->_conn->query('select '. $column . $from . $order_by_offset_limit);

        return ($is_count===true) ? $query->row(0)->numrows : $query->result_array();
    }

    function _setCondition($arr_input=[])
    {
        $set_condition = [];
        $set_condition['search_end_date'] = empty(element('search_end_date', $arr_input)) ? date("Y-m-d") : $arr_input['search_end_date'];
        $set_condition['search_start_date'] =  empty(element('search_start_date', $arr_input)) ? date('Y-m-d', strtotime($set_condition['search_end_date'] . ' -1 14 days')) : $arr_input['search_start_date'];
        $set_condition['search_date_type'] = empty(element('search_date_type', $arr_input)) ? '%Y-%m-%d' : $arr_input['search_date_type'];


        if (empty(element('search_site_code', $arr_input))) {
            $set_condition['comm_condition']['IN']['g.SiteCode'] = ['100'];    //get_auth_site_codes(); 검색 설정된 사이트 코드가 존재하지 않을시 임의의 코드로 세팅
        } else {
            $set_condition['comm_condition']['IN']['g.SiteCode'] =  (array) element('search_site_code', $arr_input);
        }

        if(!empty(element('search_value', $arr_input))) {
            $set_condition['comm_condition'] = array_merge($set_condition['comm_condition'], [
                'ORG' => [
                    'LKB' => [
                        'sl.SearchWord' => $arr_input['search_value'],
                    ]
                ]
            ]);
        }

        if(!empty(element('search_except_will_ip',$arr_input))) {
            $set_condition['comm_condition']  = array_merge_recursive($set_condition['comm_condition'] ,[
                    'RAW' => ['gal.UserIp NOT IN ' => ' (Select Ip From '.$this->_table['willbes_ip'].')']
                ]
            );
        }

        return $set_condition;
    }

}