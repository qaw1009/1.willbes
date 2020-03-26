<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/BaseStatsModel.php';

class StatsMemberModel extends BaseStatsModel
{

    /**
     * 회원 가입 / 탈퇴 추출
     * @param array $arr_input
     * @return mixed
     */
    public function getMemberCount($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $join_date = 'DATE_FORMAT(m.JoinDate, \''.$get_condition['search_date_type'].'\')';
        $out_date = 'DATE_FORMAT(l.OutDatm, \''.$get_condition['search_date_type'].'\')';

        $base_condition['BDT'] = ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]];
        $join_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'Y']
            ]
        );
        $out_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['l.OutDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'N']
            ]
        );

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $join_where = $this->_conn->makeWhere($join_condition)->getMakeWhere(true);
        $out_where = $this->_conn->makeWhere($out_condition)->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_join.join_count,0) as join_count
                        ,ifnull(temp_out.out_count,0) as out_count ';

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
                            SELECT 
                                \'Join\' as mem_status
                                ,'. $join_date .' as result_date
                                ,COUNT(*) AS join_count  
                            FROM '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            WHERE 1=1
                                '. $join_where .'
                            GROUP BY result_date
                        ) temp_join on temp_date.base_date = temp_join.result_date
                            
                        left join
                        (
                            SELECT 
                                \'Out\' as mem_status
                                ,'. $out_date .' AS result_date
                                , COUNT(*) AS out_count  
                            FROM '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            WHERE 1=1
                                and l.MemIdx is not null
                                '. $out_where .'  
                            GROUP BY result_date
                        ) temp_out on temp_date.base_date = temp_out.result_date
        ';

        $order_by = ' order by base_date asc';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 회원연령대
     * @param array $arr_input
     * @return mixed
     */
    public function getMemberAge($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);


        $join_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'Y']
            ]
        );
        $out_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['l.OutDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'N']
            ]
        );

        $join_where = $this->_conn->makeWhere($join_condition)->getMakeWhere(true);
        $out_where = $this->_conn->makeWhere($out_condition)->getMakeWhere(true);

        $column = ' * ';

        $from = '
                    from
                        (
                            select
                                \'가입\' as mem_status,
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 10 and 19 , 1, 0)),0) as \'10s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 20 and 29 , 1, 0)),0) as \'20s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 30 and 39 , 1, 0)),0) as \'30s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 40 and 49 , 1, 0)),0) as \'40s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 50 and 59 , 1, 0)),0) as \'50s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 60 and 69 , 1, 0)),0) as \'60s\',
                                ifnull(
                                    (
                                        sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) < 10, 1, 0))
                                        +
                                        sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) > 69, 1, 0))
                                    ) ,0)as \'etc\'
                            from '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            where 1=1
                                       '. $join_where .'
                            
                            union all
                                    
                            select
                                \'탈퇴\' as mem_status,
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 10 and 19 , 1, 0)),0) as \'10s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 20 and 29 , 1, 0)),0) as \'20s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 30 and 39 , 1, 0)),0) as \'30s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 40 and 49 , 1, 0)),0) as \'40s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 50 and 59 , 1, 0)),0) as \'50s\',
                                ifnull(sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) between 60 and 69 , 1, 0)),0) as \'60s\',
                                ifnull(
                                    (
                                        sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) < 10, 1, 0))
                                        +
                                        sum(if(date_format(now(),\'%Y\')-substring(BirthDay,1,4) > 69, 1, 0))
                                    ) ,0)as \'etc\'
                            from '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            where   1=1
                                        and l.MemIdx is not null
                                        '. $out_where .'  
                        ) tmp
        ';

        $order_by = '';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 회원 성별
     * @param array $arr_input
     * @return mixed
     */
    public function getMemberSex($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $join_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'Y'],
            ]
        );
        $out_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['l.OutDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //과검시점 'EQ' => ['m.IsStatus' => 'N']
            ]
        );

        $join_where = $this->_conn->makeWhere($join_condition)->getMakeWhere(true);
        $out_where = $this->_conn->makeWhere($out_condition)->getMakeWhere(true);

        $column = ' * ';

        $from = '
                    from
                        (
                            select
                                \'가입\' as mem_status,
                                ifnull(sum(if(m.Sex =\'M\', 1, 0)),0) as \'m\',
                                ifnull(sum(if(m.Sex =\'F\', 1, 0)),0) as \'f\',
                                ifnull(sum(if( (m.Sex != \'M\' and m.Sex != \'F\'), 1, 0)),0) as \'not\'
                            from '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            where 1=1
                                       '. $join_where .'
                            
                            union all
                                    
                            select
                                \'탈퇴\' as mem_status,
                                ifnull(sum(if(m.Sex =\'M\', 1, 0)),0) as \'m\',
                                ifnull(sum(if(m.Sex =\'F\', 1, 0)),0) as \'f\',
                                ifnull(sum(if( (m.Sex != \'M\' and m.Sex != \'F\'), 1, 0)),0) as \'not\'
                            from '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    LEFT JOIN '. $this->_table['member_out'] .' AS l ON m.MemIdx = l.MemIdx 
                            where   1=1
                                        and l.MemIdx is not null
                                        '. $out_where .'  
                        ) tmp
        ';

        $order_by = '';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 회원관심항목
     * @param array $arr_input
     * @return mixed
     */
    public function getMemberInterest($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $join_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['m.JoinDate' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                //전체회원으로 'EQ' => ['m.IsStatus' => 'Y'],
            ]
        );

        $join_where = $this->_conn->makeWhere($join_condition)->getMakeWhere(true);

        $column = 'ifnull(mo.InterestCode,\'100000\') as interest_code, ifnull(sc.CcdName,\'없음\') as interest_name, count(*) as count';

        $from = '
                    from
                        '. $this->_table['member'] .' AS m
                            JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                            LEFT JOIN '. $this->_table['code'] .' AS sc on mo.InterestCode = sc.Ccd
                    where 1=1
        ';

        $group_by = ' group by mo.InterestCode ';

        return $this->_conn->query('select ' . $column . $from .$join_where .$group_by)->result_array();
    }


    /**
     * 회원 로그인 이력
     * @param array $arr_input
     * @return mixed
     */
    public function getMemberLogin($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(a.base_date, \''. $get_condition['search_date_type'] .'\')';
        $login_date = 'DATE_FORMAT(l.LoginDatm, \''. $get_condition['search_date_type'] .'\')';

        $base_condition['BDT'] = ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]];

        $login_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['l.LoginDatm' => [$get_condition['search_start_date'], $get_condition['search_end_date']]],
                'EQ' => ['l.IsLogin' => 'Y'],
            ]
        );

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $login_where = $this->_conn->makeWhere($login_condition)->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_login.login_count,0) as login_count';

        $from = ' from
                        (
                            select '. $base_date .' as base_date
                                from '. $this->_table['base_date'] .' a
                                where 1=1 ' . $base_where .' 
                            group by  '. $base_date .'
                        ) temp_date
                        
                        left Join
                        (
                            SELECT 
                               '. $login_date .' as result_date
                                ,COUNT(*) AS login_count  
                            FROM '. $this->_table['member'] .' AS m
                                    JOIN '. $this->_table['member_other'] .' AS mo ON m.MemIdx = mo.MemIdx
                                    JOIN '. $this->_table['member_login'] .' AS l ON m.MemIdx = l.MemIdx 
                            WHERE 1=1
                                '. $login_where .'
                            GROUP BY result_date
                        ) temp_login on temp_date.base_date = temp_login.result_date
                   ';

        $order_by = ' order by base_date asc';

        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }


    function _setCondition($arr_input=[])
    {
        $set_condition = [];
        $set_condition['search_end_date'] = element('search_end_date', $arr_input, date("Y-m-d"));
        $set_condition['search_start_date'] =  element('search_start_date', $arr_input, date('Y-m-d', strtotime($set_condition['search_end_date'] . ' -14 days')));
        $set_condition['search_date_type'] = element('search_date_type', $arr_input, '%Y-%m-%d');

        $set_condition['comm_condition'] = [
            'EQ' => [
                'm.Sex' => element('search_sex', $arr_input),
                'mo.InterestCode' => element('search_interest', $arr_input)
            ],
        ];
        if (empty(element('search_site_code', $arr_input))) {
            $set_condition['comm_condition']['IN']['m.SiteCode'] = ['100'];    //get_auth_site_codes(); 검색 설정된 사이트 코드가 존재하지 않을시 임의의 코드로 세팅
        } else {
            $set_condition['comm_condition']['IN']['m.SiteCode'] =  (array) element('search_site_code', $arr_input);
        }

        switch (element('search_age', $arr_input)) {
            case "10":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [10, 19]];
                break;
            case "20":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [20, 29]];
                break;
            case "30":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [30, 39]];
                break;
            case "40":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [40, 49]];
                break;
            case "50":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [50, 59]];
                break;
            case "60":
                $set_condition['comm_condition']['BET'] = ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> [60, 69]];
                break;
            case "etc":
                $set_condition['comm_condition']['ORG1'] = [
                    'LTE' => ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> 9],
                    'GTE' => ['date_format(now(),\'%Y\')-substring(m.BirthDay,1,4)'=> 70]
                ];
                break;
        }
        return $set_condition;
    }

}