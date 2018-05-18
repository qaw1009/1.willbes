<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 사이트 메뉴 정보
 */
class Caching_site_menu extends CI_Driver
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
    public $_key = 'lms@site_menu';

    /**
     * cache life time (second), 0일 경우 자동 소멸없이 데이터 유지됨
     * @var int
     */
    public $_ttl = 0;

    /**
     * get cache save data
     * @return array
     */
    public function _getSaveData()
    {
        $_table = [
            'site' => 'lms_site',
            'site_group' => 'lms_site_group',
            'site_menu' => 'lms_site_menu'
        ];

        $column = '
            S.SiteCode, S.SiteGroupCode, S.SiteUrl, SM.MenuIdx, SM.MenuName, SM.ParentMenuIdx, SM.GroupMenuIdx, SM.MenuDepth, SM.MenuUrl, SM.UrlType, SM.UrlTarget
            , fn_site_menu_connect_by_type(SM.MenuIdx, "both") as UrlRouteBoth
        ';

        $from = '
            from ' . $_table['site_group'] . ' as SG 
                inner join ' . $_table['site'] . ' as S
                    on SG.SiteGroupCode = S.SiteGroupCode
                inner join ' . $_table['site_menu'] . ' as SM
                    on S.SiteCode = SM.SiteCode
            where SG.IsUse = "Y" and SG.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SM.IsUse= "Y" and SM.IsStatus = "Y"                              
        ';

        $order_by = ' order by S.OrderNum asc, SM.GroupOrderNum asc, SM.OrderNum asc';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from . $order_by)->result_array();

        $data = [];
        foreach ($result as $idx => $row) {
            // sub domain
            $key1 = strtolower(str_first_pos_before($row['SiteUrl'], '.'));
            // sub domain + ?pass
            $key2 = $key1 . strtolower((starts_with(str_first_pos_after($row['SiteUrl'], '/'), 'pass') === true) ? 'pass' : '');

            list($url_route_idx, $url_route_name) = explode('::', $row['UrlRouteBoth']);
            $arr_menu = [
                'MenuName' => $row['MenuName'],
                'MenuUrl' => $row['MenuUrl'],
                'UrlType' => $row['UrlType'],
                'UrlTarget' => $row['UrlTarget'],
                'UrlRouteIdx' => $url_route_idx,
                'UrlRouteName' => $url_route_name
            ];

            if ($row['MenuDepth'] > 1) {
                // $data 배열에 삽입되는 배열 키 생성
                $child_key = $key1 . '.' . $key2;
                foreach (explode('>', $url_route_idx, -1) as $menu_idx) {
                    $child_key .= '.' . $menu_idx . '.Children';
                }
                $child_key .= '.' . $row['MenuIdx'];
                
                // 생성된 배열 키로 값 설정
                array_set($data, $child_key, $arr_menu);
            } else {
                $data[$key1][$key2][$row['MenuIdx']] = $arr_menu;
            }
        }

        return $data;
    }
}
