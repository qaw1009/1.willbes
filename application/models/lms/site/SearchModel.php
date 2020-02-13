<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel  extends WB_Model
{
    private $_table = [
        'search_log' => 'lms_search_log',
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'member' => 'lms_member',
        'willbes_ip' => 'lms_willbes_ip'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getGroupByData($arr_condition=[], $get_type, $order_by=['count(*)' => 'DESC'], $add_condition=[])
    {

        $column = 'count(*) as cnt';
        $group_by = '';
        $limit = '';

        switch ($get_type) {
            case 'cate' :
                $column .= ',sc.CateName';
                $group_by .= (empty($group_by) ? '':',').'sc.CateName';

            case 'site' :
                $column .= ', s.SiteName';
                $group_by .= (empty($group_by) ? '':',').'s.SiteName';

            case 'word' :
                $column .= ', sl.SearchWord';
                $group_by .= (empty($group_by) ? '':',').'sl.SearchWord';
                $limit = ' limit 10';
                $order_by = array_merge($order_by,[ 'SearchWord' =>'ASC']);
                break;

            case 'cloud' :
                $column .= ', sl.SearchWord';
                $group_by .= (empty($group_by) ? '':',').'sl.SearchWord';
                $limit = ' limit 50';
                break;

            case 'os' :
                $column .=  ', if(left(sl.UserPlatform,7)=\'Unknown\',\'기타\',left(sl.UserPlatform,7)) AS UserPlatform ';
                $group_by = 'left(sl.UserPlatform,6)';
                $order_by=['UserPlatform' => 'ASC'];
                $limit = ' limit 6';
                break;
        }

        $from = '
                    from
                        '.$this->_table['search_log'].' as sl
                        join '.$this->_table['site'].' as s on sl.SiteCode = s.SiteCode
                        left join '.$this->_table['category'].' as sc on sl.CateCode = sc.CateCode
                    where 1=1
        ';

        $arr_condition['IN']['s.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        if(!empty(element('search_except_will_ip',$add_condition))) {
            $where .= ' and sl.UserIp NOT IN (Select Ip From '.$this->_table['willbes_ip'].')';
        }

        $query = $this->_conn->query('select '.$column .$from .$where .' group by '.$group_by .$order_by .$limit);
        return $query->result_array();
    }

    public function listSearch($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by=[], $add_condition=[])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'sl.*,s.SiteGroupCode,s.SiteName,sc.CateName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        '. $this->_table['search_log'].' as sl
                        join '. $this->_table['site'].' as s on sl.SiteCode = s.SiteCode
                        left join '. $this->_table['category'].' as sc on sl.CateCode = sc.CateCode
                    where 1=1
        ';

        $arr_condition['IN']['s.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        if(!empty(element('search_except_will_ip',$add_condition))) {
            $where .= ' and sl.UserIp NOT IN (Select Ip From '.$this->_table['willbes_ip'].')';
        }

        $query = $this->_conn->query('select '. $column . $from . $where . $order_by_offset_limit);
        return ($is_count===true) ? $query->row(0)->numrows : $query->result_array();
    }
}