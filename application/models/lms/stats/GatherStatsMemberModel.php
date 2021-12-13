<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/GatherBaseStatsModel.php';

class GatherStatsMemberModel extends GatherBaseStatsModel
{
    /**
     * 회원 일자별 통계
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getMemberCount($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $stats_date = 'DATE_FORMAT(StatsDate, \''.$get_condition['search_date_type'].'\')';

        // 기준 일자
        $base_where = $this->_conn->makeWhere(['BDT' => ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]]])->getMakeWhere();

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = 'base_date, ifnull(join_count,0) as join_count, ifnull(out_count,0) as out_count ';
        $from = '
                    from
                        (
                            select '. $base_date .' as base_date
                                from '. $this->_table['base_date'] .' a ' . $base_where .' 
                            group by  '. $base_date .'
                        ) temp_date
                        
                        left Join
                        (
                            select 
                                 ' . $stats_date . ' as StatsDate, sum(MemCount) as join_count
                            from 
                                '. $this->_table['member'] .'
                            where  
                                MemType=\'가입\' '. $where .'
                            group by '. $stats_date .'
                        ) temp_join on temp_date.base_date = temp_join.StatsDate
                        
                        left join 
                        (
                            select 
                                 ' . $stats_date . ' as StatsDate, sum(MemCount) as out_count
                            from 
                                '. $this->_table['member'] .'
                            where  
                                MemType=\'탈퇴\' '. $where .'
                            group by '. $stats_date .'
                        ) temp_out on temp_date.base_date = temp_out.StatsDate
        ';

        $order_by = $this->_conn->makeOrderBy(['base_date'=>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 회원 연령별
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getMemberAge($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $query = '/** @lang text */
                    select
                    *
                    from
                    (
                        select \'가입\' as mem_status
                            , ifnull(sum(Age10s),0) as 10s
                            , ifnull(sum(Age20s),0) as 20s
                            , ifnull(sum(Age30s),0) as 30s
                            , ifnull(sum(Age40s),0) as 40s
                            , ifnull(sum(Age50s),0) as 50s
                            , ifnull(sum(Age60s),0) as 60s
                            , ifnull(sum(AgeEtc),0) as etc
	                    from '. $this->_table['member_age'] .'
	                    where MemType=\'가입\' '. $where .'
	                    
	                    union all
	                    
	                    select \'탈퇴\' as mem_status
	                        , ifnull(sum(Age10s),0) as 10s
                            , ifnull(sum(Age20s),0) as 20s
                            , ifnull(sum(Age30s),0) as 30s
                            , ifnull(sum(Age40s),0) as 40s
                            , ifnull(sum(Age50s),0) as 50s
                            , ifnull(sum(Age60s),0) as 60s
                            , ifnull(sum(AgeEtc),0) as etc
	                    from '. $this->_table['member_age'] .'
	                    where MemType=\'탈퇴\' '. $where .'
                    ) temp
        ';

        return $this->_conn->query($query)->result_array();
    }

    /**
     * 회원 성별
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getMemberSex($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $query = '/** @lang text */
                    select
                    *
                    from
                    (
                        select \'가입\' as mem_status
                            , ifnull(sum(if(Sex =\'m\', MemCount, 0)),0) as m
                            , ifnull(sum(if(Sex =\'f\', MemCount, 0)),0) as f
                            , ifnull(sum(if(Sex =\'not\', MemCount, 0)),0) as \'not\'
                        from 
                            '. $this->_table['member'] .'
                        where 
                                MemType=\'가입\' '. $where .'
                                
                        union all 
                        
                        select \'탈퇴\' as mem_status
                            , ifnull(sum(if(Sex =\'m\', MemCount, 0)),0) as m
                            , ifnull(sum(if(Sex =\'f\', MemCount, 0)),0) as f
                            , ifnull(sum(if(Sex =\'not\', MemCount, 0)),0) as \'not\'
                        from 
                             '. $this->_table['member'] .'
                        where 
                                MemType=\'탈퇴\' '. $where .'
                    ) temp
        ';
        return $this->_conn->query($query)->result_array();
    }

    /**
     * 회원 관심분야별
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getMemberInterest($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SM.');

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = ' InterestCcd as interest_code, ifnull(SC.CcdName, \'없음\') as interest_name , sum(MemCount) as count ';

        $from = '
                from         
                    '. $this->_table['member'].' as SM 
                    left join '. $this->_table['code'] .' as SC on SM.InterestCcd = SC.Ccd 
                where
                        SM.MemType=\'가입\' '. $where .'
                    group by SM.InterestCcd
        ';
        $order_by = $this->_conn->makeOrderBy(['InterestCcd' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 회원 일자별 로그인
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getMemberLogin($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        unset($get_condition['comm_condition']['IN']['SiteCode']);
        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $stats_date = 'DATE_FORMAT(StatsDate, \''.$get_condition['search_date_type'].'\')';

        $column = $stats_date.' as base_date, ifnull(sum(LoginCount),0) as login_count ';
        $from = ' from '. $this->_table['member_login'];
        $group_by = 'group by '.$stats_date;
        $order_by = $this->_conn->makeOrderBy(['StatsDate' => 'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
    }
}