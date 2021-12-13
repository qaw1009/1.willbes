<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/GatherBaseStatsModel.php';

class GatherStatsBannerModel extends GatherBaseStatsModel
{
    /**
     * 일별 클릭수 : 로긴/비로그인
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getBannerCount($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);
        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $stats_date = 'DATE_FORMAT(StatsDate, \''.$get_condition['search_date_type'].'\')';

        // 기준 일자
        $base_where = $this->_conn->makeWhere(['BDT' => ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]]])->getMakeWhere();

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_login.click_count,0) as click_count
	                    ,ifnull(temp_not.not_click_count,0) as not_click_count';
        $from = '
                    from
                        (
                            select '. $base_date .' as base_date
                                from '. $this->_table['base_date'] .' a ' . $base_where .' 
                            group by  '. $base_date .'
                        ) temp_date
                        
                        left Join
                        (
                            select '. $stats_date .' as StatsDate, Sum(ClickCount) as click_count
                            from '. $this->_table['banner'] .'
                            where 
                                IsLogin=\'Y\' '. $where .' 
                            group by '. $stats_date .'
                       ) as temp_login on temp_date.base_date = temp_login.StatsDate
                            
                        left join
                        (                            
                            select '. $stats_date .' as StatsDate, Sum(ClickCount) as not_click_count
                            from  '. $this->_table['banner'] .'
                            where 
                                IsLogin=\'N\' '. $where .'
                            group by '. $stats_date .'
                        ) temp_not on temp_date.base_date = temp_not.StatsDate
        ';
        $order_by = $this->_conn->makeOrderBy(['base_date'=>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 사이트별 배너클릭수
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getBannerSite($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_condition = [
            'IN' => [
                'S.SiteCode' => get_auth_site_codes(false,true) // 기준 사이트 : 본인 권한 사이트
            ],
        ];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere();
        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'S.SiteCode,S.SiteName
                        ,ifnull(temp_site.click_count,0) as click_count
                       ';

        $from = '   from
                            '. $this->_table['site'] .' S
                            left join 
                            (
                                select SiteCode, sum(ClickCount) AS click_count 
                                from '. $this->_table['banner'] . $where .'
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
    public function getBannerPlatform($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'if(left(UserPlatform,7)=\'Unknown\',\'검색엔진/크롤러\', if(left(UserPlatform,7)=\'\',\'기타\', left(UserPlatform,7))) AS user_platform
                        , sum(ClickCount) click_count';
        $from = '   from '. $this->_table['banner'] . $where . ' group by user_platform';

        $order_by = $this->_conn->makeOrderBy(['user_platform' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 사이트별 배너 클릭 순위 - 상위
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getBannerSiteRank($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SB.');

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'SB.BIdx, B.BannerName, B.LinkUrl, B.BannerFullPath, B.BannerImgName, b.SiteCode, S.SiteName, sum(ClickCount) AS click_count';

        $from = '   from
                            '. $this->_table['banner'] .' SB
                            join '. $this->_table['site'] .' S on S.SiteCode = SB.SiteCode 
                            join '. $this->_table['banner_info'] . ' B on SB.BIdx = B.BIdx and B.IsStatus=\'Y\' 
                            '. $where . ' group by SB.BIdx, B.BannerName, B.LinkUrl, B.BannerFullPath, B.BannerImgName, B.SiteCode, S.SiteName';

        $order_by_limit = $this->_conn->makeOrderBy(['click_count' => 'DESC', 'S.SiteName' => 'ASC', 'SB.BIdx' => 'DESC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }

    /**
     * 사이트별 배너 클릭 순위 - 하위 (현시점 게시중인 배너)
     * @param array $arr_input
     * @return mixed
     * @throws Exception
     */
    public function getBannerSiteLowRank($arr_input = [])
    {
        $get_condition = $this->_setCondition($arr_input, 'SB.');

        $get_condition['comm_condition'] = array_merge_recursive($get_condition['comm_condition'], [
            // 사용중
            'EQ' => [
                'B.IsUse' => 'Y'
            ],
            // 현시점 게시중인 배너
            'RAW' => [
                'date_format(now(),\'%Y-%m-%d\') between ' =>  'date_format(B.DispStartDatm,\'%Y-%m-%d\') and date_format(b.DispEndDatm,\'%Y-%m-%d\')'
            ]
        ]);

        $where = $this->_conn->makeWhere($get_condition['comm_condition'])->getMakeWhere();

        $column = 'SB.BIdx, B.BannerName, B.LinkUrl, B.BannerFullPath, B.BannerImgName, b.SiteCode, S.SiteName, sum(ClickCount) AS click_count';

        $from = '   from
                            '. $this->_table['banner'] .' SB
                            join '. $this->_table['site'] .' S on S.SiteCode = SB.SiteCode 
                            join '. $this->_table['banner_info'] . ' B on SB.BIdx = B.BIdx and B.IsStatus=\'Y\' 
                            '. $where . ' group by SB.BIdx, B.BannerName, B.LinkUrl, B.BannerFullPath, B.BannerImgName, B.SiteCode, S.SiteName';

        $order_by_limit = $this->_conn->makeOrderBy(['click_count' => 'ASC', 'S.SiteName' => 'ASC', 'SB.BIdx' => 'DESC'])->getMakeOrderBy();
        $order_by_limit .= $this->_conn->makeLimitOffset('20')->getMakeLimitOffset();
        return $this->_conn->query('select ' . $column . $from . $order_by_limit)->result_array();
    }

    /**
     * 베너 클릭 이력 - 집계통계시 필요없는 항목으로 빈 메소드 생성
     * @param $is_count
     * @param array $arr_input
     * @return int
     */
    public function getBannerHistoryList($is_count, $arr_input=[])
    {
        return 0;
    }
}