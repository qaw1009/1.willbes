<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 설정 검색어 캐쉬 생성 클래스
 * Class Caching_search_word_auto
 */
class Caching_search_word_setup extends CI_Driver
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
    public $_key = 'lms@search_word_setup';

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
            'search_word_setup' => 'lms_search_word_setup',
            'site' => 'lms_site',
            'sys_cate' => 'lms_sys_category'
        ];

        $column = '
            	sw.SwIdx,sw.SiteCode,sw.CateCode,sw.SearchWord,sw.StartDate,sw.EndDate,sw.TargetType,sw.TargetUrl,sw.TargetOpen,sw.OrderNum
	            ,s.SiteName
	            ,ifnull(sc.CateName,\'전체\') as CateName
	        ';
        $table = ''
                . $_table['search_word_setup'] . ' as sw 
                inner join ' . $_table['site'] . ' as s on sw.SiteCode=s.SiteCode and s.IsStatus=\'Y\' and s.IsUse=\'Y\' and s.IsFrontUse=\'Y\'
                left join ' . $_table['sys_cate'] . ' sc on sw.CateCode = sc.CateCode and sc.IsStatus=\'Y\' and sc.IsUse=\'Y\'
        ';

        $order_by = ' order by s.OrderNum asc, sw.OrderNum desc, sw.SwIdx desc';

        $arr_condition = [
            'EQ'=> [
                'sw.IsStatus' => 'Y',
                'sw.IsUse' => 'Y',
                'sw.SiteCode' => (empty($skey) ? null : $skey)
            ],
            'RAW' => [
                'date_format(now(),\'%Y-%m-%d\')  between ' => 'sw.StartDate and sw.EndDate'
            ]
        ];

        $where = $this->_db->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_db->query('select ' . $column . ' from ' . $table . 'where 1=1 '. $where . $order_by)->result_array();

        $data = [];
        foreach ($result as $row) {
            $data[$row['SiteCode']][$row['CateCode']][] = $row;
        }

        $this->_db->set('sw.LastCacheDatm', 'NOW()', false)
            ->set('sw.LastCacheAdminIdx', $this->_CI->session->userdata('admin_idx'))
            ->where('1=1'. $where)
            ->update($table);

        return $data;
    }
}
