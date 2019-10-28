<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 모바일 사이트 메뉴 정보
 */
class Caching_mobile_menu extends CI_Driver
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
    public $_key = 'lms@mobile_menu';

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
        // 모바일 사이트 구분값
        $mobile_site_prefix = config_item('app_mobile_site_prefix');

        $_table = [
            'site' => 'lms_site',
            'site_group' => 'lms_site_group',
            'site_menu' => 'lms_site_menu'
        ];

        $column = '
            S.SiteCode, S.SiteUrl, SM.MenuIdx, SM.MenuType, SM.MenuName, SM.ParentMenuIdx, SM.GroupMenuIdx, SM.MenuDepth, trim(SM.MenuUrl) as MenuUrl
            , SM.UrlType, SM.UrlTarget, SM.MenuIcon, SM.MenuEtc, fn_site_menu_connect_by_type(SM.MenuIdx, "both") as UrlRouteBoth, left(SM.MenuType, 1) as MenuTypeOrder
        ';
        $from = '
            from ' . $_table['site_group'] . ' as SG 
                inner join ' . $_table['site'] . ' as S
                    on SG.SiteGroupCode = S.SiteGroupCode
                inner join ' . $_table['site_menu'] . ' as SM
                    on S.SiteCode = SM.SiteCode
            where SG.IsUse = "Y" and SG.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SM.IsUse = "Y" and SM.IsStatus = "Y"
                and SM.MenuType = "XN"                             
        ';
        $order_by = ' order by S.OrderNum asc, MenuTypeOrder asc, SM.GroupOrderNum asc, SM.OrderNum asc';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from . $order_by)->result_array();

        $data = [];

        foreach ($result as $idx => $row) {
            // make tree menu
            $menu_url = $row['MenuUrl'];

            if ($row['SiteCode'] == config_item('app_intg_site_code')) {
                $key_group = 'GNB';
                $arr_parse_url = parse_url($row['MenuUrl']);
                if (empty($arr_parse_url['host']) === true) {
                    $menu_url = '//' . $row['SiteUrl'] . '/' . $mobile_site_prefix . $row['MenuUrl'];
                }
            } else {
                $key_group = $row['SiteCode'];
                $menu_url = '//' . parse_url('//' . $row['SiteUrl'], PHP_URL_HOST) . '/' . $mobile_site_prefix . $row['MenuUrl'];
            }

            // URL값이 없을 경우 초기화
            if (empty($row['MenuUrl']) === true) {
                $menu_url = '';
            }

            // tree menu base key
            $base_key = 'TreeMenus.' . $key_group;

            // 개발환경에 맞게 URL 변환
            if ($row['UrlType'] == 'route' && empty($menu_url) === false) {
                $menu_url = app_to_env_url($menu_url);
            }

            // 외부경로일 경우 URL 초기화
            if ($row['UrlType'] == 'link') {
                $menu_url = $row['MenuUrl'];
            }

            list($url_route_idx, $url_route_name) = explode('::', $row['UrlRouteBoth']);
            $arr_menu = [
                //'MenuIdx' => $row['MenuIdx'],
                //'MenuType' => $row['MenuType'],
                'MenuName' => $row['MenuName'],
                'MenuUrl' => $menu_url,
                //'MenuOrgUrl' => $row['MenuUrl'],
                //'MenuIcon' => $row['MenuIcon'],
                //'UrlType' => $row['UrlType'],
                'UrlTarget' => $row['UrlTarget'],
                //'UrlRouteIdx' => $url_route_idx,
                'UrlRouteName' => str_replace('>', ' > ', $url_route_name),
                //'UrlSubDomain' => $url_sub_domain
            ];

            if ($row['MenuDepth'] > 1) {
                // $data 배열에 삽입되는 배열 키 생성
                $child_key = $base_key;
                foreach (explode('>', $url_route_idx, -1) as $menu_idx) {
                    $child_key .= '.' . $menu_idx . '.Children';
                }
                $child_key .= '.' . $row['MenuIdx'];

                // 생성된 배열 키로 값 설정
                array_set($data, $child_key, $arr_menu);
            } else {
                array_set($data, $base_key . '.' . $row['MenuIdx'], $arr_menu);
            }

            // make menu url array
            $data['MenuUrls'][$key_group][$key_group . '.' . str_replace('>', '.Children.', $url_route_idx)] = $menu_url;
        }

        return $data;
    }
}
