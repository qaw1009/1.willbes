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
     * @param string $skey
     * @return array
     */
    public function _getSaveData($skey = '')
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
                and SM.MenuType in ("XN", "YN", "YM")                             
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
            $key_prefix = $key_group . '.' . (starts_with($row['MenuType'], 'X') === true ? 'LNB' : 'GNB');
            $base_key = 'TreeMenus.' . $key_prefix;

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
                'MenuIcon' => $row['MenuIcon'],
                //'UrlType' => $row['UrlType'],
                'UrlTarget' => $row['UrlTarget'],
                //'UrlRouteIdx' => $url_route_idx,
                'UrlRouteName' => str_replace('>', ' > ', $url_route_name),
                //'UrlSubDomain' => $url_sub_domain
            ];

            // 모바일GNB (전체보기) 맵핑코드 설정
            if ($key_group != 'GNB' && ends_with($row['MenuType'], 'M') === true) {
                $arr_menu['MenuSubType'] = strtolower(trim($row['MenuEtc']));
            }

            if ($row['MenuDepth'] > 1) {
                // $data 배열에 삽입되는 배열 키 생성
                $child_key = $base_key;
                foreach (explode('>', $url_route_idx, -1) as $menu_idx) {
                    $child_key .= '.' . $menu_idx . '.Children';
                }
                $child_key .= '.' . $row['MenuIdx'];

                // 생성된 배열 키로 값 설정
                array_set($data, $child_key, $arr_menu);

                // 모바일GNB (전체보기) > 전체메뉴 유형일 경우 하위 메뉴 설정
                if (isset($arr_menu['MenuSubType']) === true) {
                    // 전체메뉴(1차카테고리)
                    if (in_array($arr_menu['MenuSubType'], ['sort_mapping', 'category1']) === true) {
                        $sub_type_menu_data = $this->{'_get_' . $arr_menu['MenuSubType'] . '_data'}($row['SiteCode'], $menu_url, $arr_menu['UrlRouteName']);
                        array_set($data, $child_key . '.Children', $sub_type_menu_data);
                    }
                }
            } else {
                array_set($data, $base_key . '.' . $row['MenuIdx'], $arr_menu);
            }

            // make menu url array
            $data['MenuUrls'][$key_group][$key_prefix . '.' . str_replace('>', '.Children.', $url_route_idx)] = $menu_url;
        }

        return $data;
    }

    /**
     * 사이트별 1차 카테고리 데이터 조회
     * @param int $site_code [사이트코드]
     * @param string $base_url [기준URL]
     * @param string $base_url_route_name [기준URL라우트명]
     * @return array
     */
    private function _get_category1_data($site_code, $base_url, $base_url_route_name = '')
    {
        $results = [];
        $_table = ['category' => 'lms_sys_category'];
        $base_url = array_get(explode('?', $base_url), '0', $base_url);     // 쿼리스트링 제거
        if (empty($base_url_route_name) === false) {
            $base_url_route_name .= ' > ';
        }

        // 1차 카테고리 정보 조회
        $column = 'CateCode, CateName';
        $from = '
            from ' . $_table['category'] . '
            where SiteCode = ?
                and CateDepth = "1"
                and IsUse = "Y"
                and IsFrontUse = "Y"
                and IsDisp = "Y"                    
                and IsStatus = "Y"
            order by OrderNum asc
        ';

        $category_data = $this->_db->query('select ' . $column . $from, [$site_code])->result_array();

        // 1차 카테고리 메뉴 셋팅
        foreach ($category_data as $idx => $row) {
            $menu_url = $base_url . '?cate_code=' . $row['CateCode'];
            $arr_menu = [
                'MenuName' => $row['CateName'],
                'MenuUrl' => $menu_url,
                'MenuIcon' => null,
                'UrlTarget' => 'self',
                'UrlRouteName' => $base_url_route_name . $row['CateName']
            ];

            array_set($results, $row['CateCode'], $arr_menu);
        }

        return $results;
    }

    /**
     * 사이트별 소트매핑 데이터 조회 (모바일 사용안함)
     * @param int $site_code [사이트코드]
     * @param string $base_url [기준URL]
     * @param string $base_url_route_name [기준URL라우트명]
     * @return array
     */
    private function _get_sort_mapping_data($site_code, $base_url, $base_url_route_name = '')
    {
        return [];
    }
}
