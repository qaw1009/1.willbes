<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/BaseStatsModel.php';

class StatsBannerModel extends BaseStatsModel
{
    /**
     * 기간별 클릭현황
     * @param array $arr_input
     * @return mixed
     */
    public function getBannerCount($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $base_date = 'DATE_FORMAT(a.base_date, \''.$get_condition['search_date_type'].'\')';
        $sub_date = 'DATE_FORMAT(bal.RegDatm, \''.$get_condition['search_date_type'].'\')';

        $base_condition['BDT'] = ['a.base_date' => [$get_condition['search_start_date'], $get_condition['search_end_date']]];
        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $column = ' temp_date.base_date
                        ,ifnull(temp_login.click_count,0) as click_count
	                    ,ifnull(temp_not.not_click_count,0) as not_click_count';
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
                            select straight_join '. $sub_date .' as result_date
                                ,COUNT(*) AS click_count
                            from 
                                '. $this->_table['banner_log'] .' bal 
                                join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                            where 
                                1=1
                                and bal.MemIdx is not null
                                '. $sub_where .'
                            group by result_date
                        ) as temp_login on temp_date.base_date = temp_login.result_date
                        
                        left join
                        (
                             select straight_join '. $sub_date .' as result_date
                                ,COUNT(*) AS not_click_count
                            from 
                                '. $this->_table['banner_log'] .' bal 
                                join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                            where 
                                1=1
                                and bal.MemIdx is null
                                '. $sub_where .'
                            group by result_date
                        ) temp_not on temp_date.base_date = temp_not.result_date
        ';

        $order_by = ' order by base_date asc';

        return $this->_conn->query('select ' . $column . $from .$order_by)->result_array();
    }

    /**
     * 사이트별 배너클릭수
     * @param array $arr_input
     * @return mixed
     */
    public function getBannerSite($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $column = '
                        S.SiteCode,S.SiteName
                        ,ifnull(temp_data.click_count,0) as click_count
                       ';

        $from = '   from
                            '. $this->_table['site'] .' S
                            join '. $this->_table['site_group'] .' SG on S.SiteGroupCode = SG.SiteGroupCode
                            left join 
                            (
                                select 
                                    straight_join
                                    b.SiteCode
                                    ,COUNT(*) AS click_count
                                from 
                                    '. $this->_table['banner_log'] .' bal 
                                    join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                                where 
                                    1=1
                                    '. $sub_where .'
                                group by b.SiteCode
                            ) temp_data on S.SiteCode = temp_data.SiteCode
                                                
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
    public function getBannerPlatform($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $column = ' Straight_join
                        if(left(bal.UserPlatform,7)=\'Unknown\',\'기타\', if(left(bal.UserPlatform,7)=\'\',\'검색엔진\', left(bal.UserPlatform,7))) AS user_platform
                        ,COUNT(*) AS click_count
                       ';

        $from = '   from
                          '. $this->_table['banner_log'] .' bal 
                          join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                        where 1=1
                         '. $sub_where .'
        ';
        $group_by = ' group by user_platform ';
        $order_by = ' order by user_platform ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by)->result_array();
    }

    /**
     * 사이트별 배너 클릭 순위
     * @param array $arr_input
     * @return mixed
     */
    public function getBannerSiteRank($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $column = ' straight_join b.BIdx, b.BannerName, b.LinkUrl, b.BannerFullPath, b.BannerImgName, b.SiteCode, S.SiteName,COUNT(*) AS click_count';

        $from = '   from
                            '. $this->_table['banner_log'] .' bal 
                            join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                            join '. $this->_table['site'] .' S on b.SiteCode = S.SiteCode
                        where 1=1
                         '. $base_where .'
                         '. $sub_where .'
        ';

        $group_by = ' group by b.BIdx, b.BannerName, b.LinkUrl, b.BannerFullPath, b.BannerImgName, b.SiteCode, S.SiteName ';
        $order_by = ' order by count(*) DESC, SiteName ASC' ;
        $limit = ' limit 20 ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by .$limit)->result_array();
    }

    /**
     * 사이트별 배너 클릭 순위
     * @param array $arr_input
     * @return mixed
     */
    public function getBannerRank($arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $base_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);    //; 기준사이트
        $base_condition['EQ'] = ['S.IsStatus' => 'Y','S.IsUse' => 'Y'];

        $base_where = $this->_conn->makeWhere($base_condition)->getMakeWhere(true);
        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $column = ' straight_join b.BIdx, b.BannerName, b.LinkUrl, b.BannerFullPath, b.BannerImgName, COUNT(*) AS click_count';

        $from = '   from
                            '. $this->_table['banner_log'] .' bal 
                            join '. $this->_table['banner'] .' b on bal.BIdx = b.BIdx
                            join '. $this->_table['site'] .' S on b.SiteCode = S.SiteCode
                        where 1=1
                         '. $base_where .'
                         '. $sub_where .'
        ';

        $group_by = ' group by b.BIdx, b.BannerName, b.LinkUrl, b.BannerFullPath, b.BannerImgName ';
        $order_by = ' order by count(*) DESC, BannerName ASC' ;
        $limit = ' limit 20 ';

        return $this->_conn->query('select ' . $column . $from .$group_by .$order_by .$limit)->result_array();
    }

    /**
     * 배너 클릭 목록
     * @param $is_count
     * @param array $arr_input
     * @return mixed
     */
    public function getBannerHistotyList($is_count, $arr_input=[])
    {
        $get_condition = $this->_setCondition($arr_input);

        $sub_condition = array_merge_recursive($get_condition['comm_condition'],[
                'BDT' => ['bal.RegDatm' => [$get_condition['search_start_date'] , $get_condition['search_end_date']]]
            ]
        );

        $sub_where = $this->_conn->makeWhere($sub_condition)->getMakeWhere(true);

        $order_by = ['bal.BaIdx' => 'DESC'];

        if ($is_count === true) {
            $column = ' straight_join count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' straight_join bal.*,b.BannerName,b.BannerFullPath,b.BannerImgName, s.SiteName, sc.CateName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset(element('length',$arr_input), element('start',$arr_input))->getMakeLimitOffset();
        }

        $from = '
                    from 
                        '. $this->_table['banner_log'].' as bal
                        join '. $this->_table['banner'].' as b on bal.BIdx = b.BIdx
                        join '. $this->_table['site'].' as s on b.SiteCode = s.SiteCode
                        left join '. $this->_table['category'].' as sc on b.CateCode = sc.CateCode
                    where 1=1
                    '. $sub_where .'
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

        $date_diff = $this->_setDateDiffCheck($arr_input);
        $date_diff !== null ? $set_condition['search_date_type'] = $date_diff : null;

        if (empty(element('search_site_code', $arr_input))) {
            $set_condition['comm_condition']['IN']['b.SiteCode'] = ['100'];    //get_auth_site_codes(); 검색 설정된 사이트 코드가 존재하지 않을시 임의의 코드로 세팅
        } else {
            $set_condition['comm_condition']['IN']['b.SiteCode'] =  (array) element('search_site_code', $arr_input);
        }

        if(!empty(element('search_value', $arr_input))) {
            $set_condition['comm_condition'] = array_merge($set_condition['comm_condition'], [
                'ORG' => [
                    'LKB' => [
                        'b.BannerName' => $arr_input['search_value'],
                    ]
                ]
            ]);
        }

        if(!empty(element('search_except_will_ip',$arr_input))) {
            $set_condition['comm_condition']  = array_merge_recursive($set_condition['comm_condition'] ,[
                    'RAW' => ['bal.RegIp NOT IN ' => ' (Select Ip From '.$this->_table['willbes_ip'].')']
                ]
            );
        }

        return $set_condition;
    }

}