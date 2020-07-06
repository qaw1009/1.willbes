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
     * @param string $skey
     * @return array
     */
    public function _getSaveData($skey = '')
    {
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
                and S.IsUse = "Y" and S.IsFrontUse = "Y" and S.IsStatus = "Y"
                and SM.IsUse = "Y" and SM.IsStatus = "Y" 
                and SM.MenuType not in ("XN", "YN", "YM")                            
        ';
        $order_by = ' order by S.OrderNum asc, MenuTypeOrder asc, SM.GroupOrderNum asc, SM.OrderNum asc';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from . $order_by)->result_array();

        $data = [];
        $key_etc = '';

        foreach ($result as $idx => $row) {
            // make tree menu
            $menu_url = $row['MenuUrl'];

            if ($row['SiteCode'] == config_item('app_intg_site_code')) {
                $key_group = 'GNB';
                $arr_parse_url = parse_url($row['MenuUrl']);
                if (empty($arr_parse_url['host']) === true) {
                    $menu_url = '//' . $row['SiteUrl'] . '' . $row['MenuUrl'];
                }
            } else {
                $key_group = $row['SiteCode'];
                $menu_url = '//' . parse_url('//' . $row['SiteUrl'], PHP_URL_HOST) . '' . $row['MenuUrl'];
            }

            $url_sub_domain = str_first_pos_before(parse_url($menu_url)['host'], '.');

            if ($row['MenuDepth'] == '1') {
                $key_etc = '';
                if (starts_with($row['MenuType'], 'P') === true) {
                    $key_etc = '.' . $row['MenuType'];
                }

                if ($key_group == 'GNB') {
                    if (starts_with($row['MenuType'], 'P') === true) {
                        $data[$key_group . 'GroupMenuIdxs'][$row['MenuType']] = $row['MenuIdx'];
                    } else {
                        $data[$key_group . 'GroupMenuIdxs'][$url_sub_domain] = $row['MenuIdx'];
                    }
                }
            }

            // tree menu base key
            $base_key = 'TreeMenus.' . $key_group . $key_etc;

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
                'MenuType' => $row['MenuType'],
                'MenuName' => $row['MenuName'],
                'MenuUrl' => $menu_url,
                //'MenuOrgUrl' => $row['MenuUrl'],
                //'MenuIcon' => $row['MenuIcon'],
                //'UrlType' => $row['UrlType'],
                'UrlTarget' => $row['UrlTarget'],
                //'UrlRouteIdx' => $url_route_idx,
                'UrlRouteName' => $url_route_name,
                //'UrlSubDomain' => $url_sub_domain
            ];

            if ($key_group == 'GNB' && $row['MenuDepth'] == 1) {
                $arr_menu['UrlSubDomain'] = $url_sub_domain;
            }

            // 일반메뉴(전체보기) 맵핑코드 설정
            if ($key_group != 'GNB' && $row['MenuType'] == 'GM') {
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

                // 일반메뉴(전체보기) > 전체메뉴(소트매핑) 메뉴일 경우 하위 메뉴 설정
                if (isset($arr_menu['MenuSubType']) === true && $arr_menu['MenuSubType'] == 'sort_mapping') {
                    $sort_mapping_data = $this->_getSortMappingData($row['SiteCode'], $menu_url);
                    array_set($data, $child_key . '.Children', $sort_mapping_data);
                }
            } else {
                array_set($data, $base_key . '.' . $row['MenuIdx'], $arr_menu);
            }

            // make menu url array
            $data['MenuUrls'][$key_group][$key_group . '' . $key_etc . '.' . str_replace('>', '.Children.', $url_route_idx)] = $menu_url;
        }

        return $data;
    }

    /**
     * 사이트별 소트매핑 데이터 조회
     * @param int $site_code [사이트코드]
     * @param string $base_url [기준URL]
     * @return array
     */
    public function _getSortMappingData($site_code, $base_url)
    {
        $results = [];
        $_table = [
            'category' => 'lms_sys_category',
            'subject_r_category' => 'lms_product_subject_r_category',
            'subject' => 'lms_product_subject'
        ];
        $base_url = array_get(explode('?', $base_url), '0', $base_url);     // 쿼리스트링 제거

        // 카테고리 정보 조회
        $column = 'CateCode, CateName, CateRouteIdx, CateRouteName';
        $from = '
            from (
                select SC.CateCode, SC.CateName
                    , if(PC.CateCode is null, SC.CateCode, concat(PC.CateCode, ">", SC.CateCode)) as CateRouteIdx
                    , if(PC.CateCode is null, SC.CateName, concat(PC.CateName, ">", SC.CateName)) as CateRouteName
                    , ifnull(PC.OrderNum, SC.OrderNum) as GroupOrderNum
                    , if(SC.CateDepth = 1, 0, SC.OrderNum) as OrderNum
                from ' . $_table['category'] . ' as SC
                    left join ' . $_table['category'] . ' as PC
                        on SC.ParentCateCode = PC.CateCode and PC.IsStatus = "Y"			
                where SC.SiteCode = ?
                    and SC.IsUse = "Y"
                    and SC.IsFrontUse = "Y"
                    and SC.IsStatus = "Y"
            ) as U
            order by GroupOrderNum asc, OrderNum asc   
        ';

        $category_data = $this->_db->query('select ' . $column . $from, $site_code)->result_array();

        // 카테고리별 과목 맵핑 데이터 조회
        $column = 'PSC.CateCode, PSC.SubjectIdx, PS.SubjectName';
        $from = '
            from ' . $_table['subject_r_category'] . ' as PSC
                inner join ' . $_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
                inner join ' . $_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx
            where PSC.SiteCode = ?
                and PSC.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsFrontUse = "Y" and SC.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"
            order by SC.OrderNum asc, PS.OrderNum asc, PSC.CsIdx asc        
        ';

        $subject_data = $this->_db->query('select ' . $column . $from, $site_code)->result_array();
        $subject_data = array_data_pluck($subject_data, 'SubjectName', ['CateCode', 'SubjectIdx']);     // [CateCode => [SubjectIdx => SubjectName]] 형태로 가공

        // 카테고리와 과목 맵핑 데이터 병합
        foreach ($category_data as $idx => $row) {
            $menu_url = $base_url . '?cate_code=' . $row['CateCode'];
            $arr_key = str_replace('>', '.Children.', $row['CateRouteIdx']);
            $arr_menu = [
                'MenuType' => 'GN',
                'MenuName' => $row['CateName'],
                'MenuUrl' => $menu_url,
                'UrlTarget' => 'self',
                'UrlRouteName' => $row['CateRouteName']
            ];

            // 카테고리 메뉴
            array_set($results, $arr_key, $arr_menu);

            // 과목 메뉴
            if (array_key_exists($row['CateCode'], $subject_data) === true) {
                // 2개 이상일 경우만 하위 메뉴 생성
                if (count($subject_data[$row['CateCode']]) > 1) {
                    foreach ($subject_data[$row['CateCode']] as $subject_idx => $subject_name) {
                        $arr_subject_key = $arr_key . '.Children.' . $subject_idx;
                        $arr_subject_menu = [
                            'MenuType' => 'GN',
                            'MenuName' => $subject_name,
                            'MenuUrl' => $menu_url . '&subject_idx=' . $subject_idx,
                            'UrlTarget' => 'self',
                            'UrlRouteName' => $row['CateRouteName'] . '>' . $subject_name
                        ];

                        array_set($results, $arr_subject_key, $arr_subject_menu);
                    }
                }
            }
        }

        return $results;
    }
}
