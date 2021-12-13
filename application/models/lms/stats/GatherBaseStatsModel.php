<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GatherBaseStatsModel extends WB_Model
{
    protected $_table = [

        /*공통*/
        'base_date' => 'vw_sys_base_date',
        'site' => 'vw_lms_site',
        'code' => 'vw_lms_sys_code',

        /*회원*/
        'member' => 'stats_member',
        'member_sex' => 'stats_member_sex',
        'member_age' => 'stats_member_age',
        'member_interest' => 'stats_member_interest',
        'member_login' => 'stats_member_login',

        /*검색어*/
        'search' => 'stats_search',
        
        /*배너*/
        'banner' => 'stats_banner',
        'banner_info' => 'vw_lms_banner',

        /*주문문*/
       'order' => 'stats_order',


    ];

    public function __construct()
    {
        parent::__construct('gathering');
    }

    /**
     * 날짜기간 비교 2년이상 일경우 '년', 3개월이상 '월' 로 통계 처리
     * @param $arr_input
     * @return string|null
     * @throws Exception
     */
    protected function _setDateDiffCheck($arr_input = [])
    {
        $start_date = new DateTime($arr_input['search_start_date']);
        $end_date = new DateTime($arr_input['search_end_date']);
        $interval = $start_date->diff($end_date);

        if (($interval->format('%y')) >= 2) {
            return '%Y';
        } else if (($interval->format('%m')) >= 3) {
            return '%Y-%m';
        } else {
            return null;
        }
    }

    /**
     * 기존조건
     * @param array $arr_input
     * @return array
     * @throws Exception
     */
    protected function _setCondition($arr_input = [], $alias = null)
    {
        $set_condition = [];
        $set_condition['search_end_date'] = empty(element('search_end_date', $arr_input)) ? date("Y-m-d") : $arr_input['search_end_date'];
        $set_condition['search_start_date'] =  empty(element('search_start_date', $arr_input)) ? date('Y-m-d', strtotime($set_condition['search_end_date'] . ' -1 months')) : $arr_input['search_start_date'];
        $set_condition['search_date_type'] = empty(element('search_date_type', $arr_input)) ? '%Y-%m-%d' : $arr_input['search_date_type'];

        $date_diff = $this->_setDateDiffCheck($arr_input);

        if($date_diff !== null ) {
            $set_condition['search_date_type'] = $date_diff;
        }
        //기본설정 : lms
        $set_condition['comm_condition']['EQ'] = [$alias.'SiteType' => 'lms'];
        //권한설정
        $set_condition['comm_condition']['IN'][$alias.'SiteCode'] = (empty(element('search_site_code', $arr_input)) ? ['100'] : array_values(array_intersect( (array) element('search_site_code', $arr_input), get_auth_site_codes(false,true) )));
        // 기간설정
        $set_condition['comm_condition']['BDT'] = [$alias.'StatsDate' => [$set_condition['search_start_date'], $set_condition['search_end_date']]];

        return $set_condition;
    }
}