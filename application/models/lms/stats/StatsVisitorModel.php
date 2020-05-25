<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/stats/BaseStatsModel.php';

class StatsVisitorModel extends BaseStatsModel
{
    /**
     * 기간별 방문자수 조회
     * @param array $arr_input
     * @return mixed
     */
    public function getVisitorCount($arr_input = [])
    {
        $arr_search_date = $this->_getSearchDate($arr_input);
        $date_format = $this->_getDateFormat($arr_search_date['search_start_date'], $arr_search_date['search_start_date'], element('search_date_type', $arr_input));

        $arr_condition = $this->_getCondition($arr_input);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $arr_bind = [$arr_search_date['search_start_date'], $arr_search_date['search_end_date'], $arr_search_date['search_start_nd_date'], $arr_search_date['search_end_nd_date']];

        $column = 'A.BaseDate, ifnull(B.VisitorCnt, 0) as VisitorCnt, ifnull(B.MemCnt, 0) as MemCnt, ifnull(B.GuestCnt, 0) as GuestCnt
                , ifnull(B.PcCnt, 0) as PcCnt, ifnull(B.MobileCnt, 0) as MobileCnt, ifnull(B.AppCnt, 0) as AppCnt';
        $from = '
            from (
                select date_format(base_date, "' . $date_format . '") as BaseDate
                from ' . $this->_table['base_date'] . ' as A
                where base_date between ? and ?
                group by date_format(base_date, "' . $date_format . '")
            ) as A
                left join (
                    select TA.VisitDate
                        , sum(TA.VisitorCnt) as VisitorCnt
                        , sum(TA.MemCnt) as MemCnt
                        , sum(TA.GuestCnt) as GuestCnt
                        , sum(TA.PcCnt) as PcCnt
                        , sum(TA.MobileCnt) as MobileCnt
                        , sum(TA.AppCnt) as AppCnt
                    from (
                        select date_format(VisitDate, "' . $date_format . '") as VisitDate
                            , count(0) as VisitorCnt
                            , sum(if(MemIdx is null, 0, 1)) as MemCnt
                            , sum(if(MemIdx is null, 1, 0)) as GuestCnt
                            , sum(if(AccessDevice = "P", 1, 0)) as PcCnt
                            , sum(if(AccessDevice = "M", 1, 0)) as MobileCnt
                            , sum(if(AccessDevice = "A", 1, 0)) as AppCnt
                        from ' . $this->_table['visitor'] . '
                        where VisitDate between ? and ?
                        ' . $where . '
                        group by VisitDate
                    ) as TA
                    group by TA.VisitDate
                ) as B
                    on A.BaseDate = B.VisitDate
            order by A.BaseDate asc            
        ';

        return $this->_conn->query('select ' . $column . $from, $arr_bind)->result_array();
    }

    /**
     * 사이트별 방문자수 조회
     * @param array $arr_input
     * @return mixed
     */
    public function getVisitorSite($arr_input = [])
    {
        $arr_search_date = $this->_getSearchDate($arr_input);

        $arr_condition = $this->_getCondition($arr_input);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $arr_bind = [$arr_search_date['search_start_nd_date'], $arr_search_date['search_end_nd_date']];

        $arr_out_condition['IN']['S.SiteCode'] = get_auth_site_codes(false,true);
        $out_where = $this->_conn->makeWhere($arr_out_condition)->getMakeWhere(true);

        $column = 'S.SiteCode, S.SiteName, ifnull(TA.VisitCnt, 0) as VisitorCnt';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode
                left join (		
                    select SiteCode, sum(VisitCnt) as VisitCnt 
                    from ' . $this->_table['visitor_sum'] . '	
                    where VisitDate between ? and ?
                    ' . $where . '
                    group by SiteCode
                ) as TA
                    on S.SiteCode = TA.SiteCode
            where S.IsUse = "Y"
                and S.IsStatus = "Y"
                ' . $out_where . '
            order by S.SiteGroupCode asc, S.SiteCode asc          
        ';

        return $this->_conn->query('select ' . $column . $from, $arr_bind)->result_array();
    }

    /**
     * 사용자 접속환경별 방문자수 조회
     * @param array $arr_input
     * @return mixed
     */
    public function getVisitorPlatform($arr_input = [])
    {
        $arr_search_date = $this->_getSearchDate($arr_input);

        $arr_condition = $this->_getCondition($arr_input);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $arr_bind = [$arr_search_date['search_start_nd_date'], $arr_search_date['search_end_nd_date']];

        $column = 'if(TA.UserPlatform = "Unknown", "검색엔진/크롤러", if(TA.UserPlatform = "", "기타", TA.UserPlatform)) as UserPlatform, count(0) as VisitorCnt';
        $from = '
            from (
                select substring_index(UserPlatform, " ", 1) as UserPlatform
                from ' . $this->_table['visitor'] . '
                where VisitDate between ? and ?
                ' . $where . '
            ) as TA
            group by TA.UserPlatform
            order by 1 asc        
        ';

        return $this->_conn->query('select ' . $column . $from, $arr_bind)->result_array();
    }

    /**
     * 조회일자 리턴
     * @param array $arr_input
     * @return mixed
     */
    private function _getSearchDate($arr_input = [])
    {
        $arr_search_date['search_end_date'] = empty(element('search_end_date', $arr_input)) === true ? date('Y-m-d') : $arr_input['search_end_date'];
        $arr_search_date['search_start_date'] = empty(element('search_start_date', $arr_input)) === true ? date('Y-m-d', strtotime($arr_search_date['search_end_date'] . ' -14 day')) : $arr_input['search_start_date'];
        $arr_search_date['search_start_nd_date'] = str_replace('-', '', $arr_search_date['search_start_date']);
        $arr_search_date['search_end_nd_date'] = str_replace('-', '', $arr_search_date['search_end_date']);
        
        return $arr_search_date;
    }

    /**
     * 기본 조회일자 구분별 날짜 포맷 리턴
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @param string $search_date_type [조회일자구분]
     * @return string
     */
    private function _getDateFormat($search_start_date, $search_end_date, $search_date_type)
    {
        $format = $this->_setDateDiffCheck(['search_start_date' => $search_start_date, 'search_end_date' => $search_end_date]);

        if (is_null($format) === true) {
            switch ($search_date_type) {
                case 'year' : $format = '%Y'; break;
                case 'month' : $format = '%Y-%m'; break;
                default : $format = '%Y-%m-%d'; break;
            }
        }

        return $format;
    }

    /**
     * 기본 조회조건 리턴
     * @param array $arr_input
     * @return array
     */
    private function _getCondition($arr_input = [])
    {
        return [
            'IN' => ['SiteCode' => get_arr_var(element('search_site_code', $arr_input), '0')]
        ];
    }
}
