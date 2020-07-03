<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 검색어 자동 완성 데이터 캐쉬 생성 클래스
 * Class Caching_search_word_auto
 */
class Caching_search_word_auto extends CI_Driver
{
    /**
     * databse connection name
     * @var string
     */
    public $_database = 'lms';

    /**
     * cache key
     * @var string
     */
    public $_key = 'lms@search_word_auto';

    /**
     * cache life time (second), 0일 경우 자동 소멸없이 데이터 유지됨
     * @var int
     */
    public $_ttl = 0;

    /**
     * get cache save data
     * @return array
     */
    public function _getSaveData($skey = '')
    {

        $_table = [
            'search_log' => 'lms_search_log',
            'site' => 'lms_site',
            'word_auto' => 'lms_search_word_auto'
        ];

        $column =
            ((empty($skey) || $skey == '2000') ? '\'2000\'' : 'S.SiteCode'). ' AS SiteCode
            , left(sl.SearchWord,20) as SearchWord, count(*) as SearchCount, sum(sl.ResultCount) as SearchResultSum
        ';

        $from = '
            from ' . $_table['search_log'] . ' as sl 
                inner join ' . $_table['site'] . ' as s on sl.SiteCode=s.SiteCode and s.IsStatus=\'Y\' and s.IsUse=\'Y\'
            where 
            	1=1                        
        ';

        $group_order_by = ' group by S.SiteCode, s.SiteName, left(sl.SearchWord,20) order by count(*) DESC LIMIT 500';  //500개 제한

        $arr_condition = [
            'EQ' => [
                'sl.SiteCode' => (empty($skey) ? null : ($skey == '2000' ? null : $skey))   //통합사이트일 경우 모든 검색어를 추출
            ],
            'GT' => ['sl.ResultCount' => 0],
            'RAW' => [
                'date_format(sl.RegDatm,\'%Y-%m-%d\') between ' => 'date_format(date_add(now(),interval -1 year),\'%Y-%m-%d\') and date_format(now(),\'%Y-%m-%d\')'
            ]
        ];

        $where = $this->_db->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_db->query('select ' . $column . $from . $where . $group_order_by)->result_array();

        $data = $result;

        /* Table 저장 : 캐쉬외 확인용 데이터 저장*/
        $this->_db->set('IsStatus', 'N')
            ->set('UpdAdminIdx', $this->_CI->session->userdata('admin_idx'))
            ->where('SiteCode',$skey)->where('IsStatus', 'Y')
            ->update($_table['word_auto']);

        $save_query = 'insert into '. $_table['word_auto'].' (SiteCode,SearchWord,SearchCount,ResultSum,RegAdminIdx)';
        $save_query .= 'select ' . $column .','.$this->_CI->session->userdata('admin_idx'). $from . $where . $group_order_by;
        $this->_db->query($save_query);

        return $data;
    }
}
