<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/GatherBaseStatsModel.php';

class GatherStatsSearchModel extends GatherBaseStatsModel
{
    /**
     * 일자별 검색 통계
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchCount($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $stats_date = 'DATE_FORMAT(StatsDate, \''.$get_condition['search_date_type'].'\')';

        // 기준 일자
        $base_where = $this->_conn->makeWhere(['BDT' => ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]]])->getMakeWhere();

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = 'base_date 
                        ,ifnull(temp_login_search.login_search_count,0) as login_search_count
                        ,ifnull(temp_login_search.login_search_result_sum,0) as login_search_result_sum
                        ,ifnull(temp_not_search.not_search_count,0) as not_search_count
                        ,ifnull(temp_not_search.not_search_result_sum,0) as not_search_result_sum
        ';

        $from = '
                    from
                        (
                            select '. $base_date .' as base_date
                                from '. $this->_table['base_date'] .' a ' . $base_where .' 
                            group by  '. $base_date .'
                        ) temp_date
                        
                        left Join
                        (
                            select '. $stats_date .' as StatsDate, Sum(SearchCount) as login_search_count, sum(SearchSum) as login_search_result_sum
                            from '. $this->_table['search'] .'
                            where 
                                IsLogin=\'Y\' '. $where .' 
                            group by '. $stats_date .'
                       ) as temp_login_search on temp_date.base_date = temp_login_search.StatsDate
                            
                        left join
                        (                            
                            select '. $stats_date .' as StatsDate, Sum(SearchCount) as not_search_count, sum(SearchSum) as not_search_result_sum
                            from  '. $this->_table['search'] .'
                            where 
                                IsLogin=\'N\' '. $where .'
                            group by '. $stats_date .'
                        ) temp_not_search on temp_date.base_date = temp_not_search.StatsDate
        ';

        $order_by = $this->_conn->makeOrderBy(['base_date'=>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 사이트별 검색건수
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchSite($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_condition = [
            'IN' => [
                'S.SiteCode' => get_auth_site_codes(false,true) // 기준 사이트 : 본인 권한 사이트
            ],
            'EQ' => [
                'S.IsCampus' => 'N'
            ]
        ];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere();
        $where  = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'S.SiteCode,S.SiteName
                        ,ifnull(temp_site.search_count,0) as search_count
                        ,ifnull(temp_site.search_result_sum,0) as search_result_sum
                       ';

        $from = '   from
                            '. $this->_table['site'] .' S
                            left join 
                            (
                                select SiteCode, sum(SearchCount) AS search_count ,sum(SearchSum) as search_result_sum 
                                from '. $this->_table['search'] . $where .'
                                group by SiteCode 
                            ) temp_site on S.SiteCode = temp_site.SiteCode
                    '. $base_where;

        $order_by = $this->_conn->makeOrderBy(['S.SiteGroupCode' => 'ASC', 'S.SiteCode' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 사용자 접속환경
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchPlatform($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'if(left(UserPlatform,7)=\'Unknown\',\'검색엔진/크롤러\', if(left(UserPlatform,7)=\'\',\'기타\', left(UserPlatform,7))) AS user_platform
                        , sum(SearchCount) search_count 
                        , sum(SearchSum) as search_result_sum';
        $from = '   from '. $this->_table['search'] . $where . ' group by user_platform';

        $order_by = $this->_conn->makeOrderBy(['user_platform' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 검색어 클라우드
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchCloud($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'SearchWord as text, sum(SearchCount) AS weight';
        $from = '   from '. $this->_table['search'] . $where . ' group by text';

        $order_by_limit = $this->_conn->makeOrderBy(['weight' => 'DESC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('200')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }

    /**
     * 사이트별 검색어 통계 - 검색건수 많은 수
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchSiteWord($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SL.');

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'S.SiteName, REPLACE(SL.SearchWord, \' \', \'&nbsp;\') as SearchWord, sum(SL.SearchCount) as search_count, sum(SL.SearchSum) as search_result_sum';

        $from = '   from
                            '. $this->_table['search'] .' SL
                            join '. $this->_table['site'] .' S on S.SiteCode = SL.SiteCode '. $where . ' group by S.SiteName, SL.SearchWord';

        $order_by_limit = $this->_conn->makeOrderBy(['search_count' => 'DESC', 'search_result_sum' => 'DESC',  'S.SiteCode' => 'ASC', 'SearchWord' => 'ASC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }

    /**
     * 검색어 통계 - 검색건수 많은 수
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchWord($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SL.');

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'REPLACE(SL.SearchWord, \' \', \'&nbsp;\') as SearchWord, sum(SL.SearchCount) as search_count, sum(SL.SearchSum) as search_result_sum';

        $from = '   from
                            '. $this->_table['search'] .' SL '.  $where . ' group by SL.SearchWord';

        $order_by_limit = $this->_conn->makeOrderBy(['search_count' => 'DESC', 'search_result_sum' => 'DESC', 'SearchWord' => 'ASC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }

    /**
     * 사이트별 검색어 통계 - 검색결과 없는 검색어
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchSiteWordNoResult($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input, 'SL.');
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'],[
               'EQ' => ['SL.SearchSum' => '0']
            ]
        );
        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'S.SiteName, REPLACE(SL.SearchWord, \' \', \'&nbsp;\') as SearchWord, sum(SL.SearchCount) as search_count, sum(SL.SearchSum) as search_result_sum';

        $from = '   from
                            '. $this->_table['search'] .' SL
                            join '. $this->_table['site'] .' S on S.SiteCode = SL.SiteCode '. $where . ' group by S.SiteName, SL.SearchWord';

        $order_by_limit = $this->_conn->makeOrderBy(['search_count' => 'DESC', 'search_result_sum' => 'DESC',  'S.SiteCode' => 'ASC', 'SearchWord' => 'ASC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }


    /**
     * 검색어 통계 - 검색결과 없는 검색어
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getSearchWordNoResult($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SL.');
        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'],[
                'EQ' => ['SL.SearchSum' => '0']
            ]
        );

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'REPLACE(SL.SearchWord, \' \', \'&nbsp;\') as SearchWord, sum(SL.SearchCount) as search_count, sum(SL.SearchSum) as search_result_sum';

        $from = '   from
                            '. $this->_table['search'] .' SL '.  $where . ' group by SL.SearchWord';

        $order_by_limit = $this->_conn->makeOrderBy(['search_count' => 'DESC', 'search_result_sum' => 'DESC', 'SearchWord' => 'ASC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from .$order_by_limit)->result_array();
    }


    /**
     * 검색 목록 : 집계통계시 필요없는 항목으로 빈 메소드 생성
     * @param $is_count
     * @param array $arr_input
     * @return null
     */
    public function getSearchHistoryList($is_count, $arr_input=[])
    {
        return 0;
    }
}