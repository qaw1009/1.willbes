<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class AdminAuthService
{
    protected $_CI;
    /**
     * @var \CI_DB_query_builder
     */
    protected $_db;

    public function __construct($database = null)
    {
        $this->_CI = &get_instance();
        $this->_db = $this->_CI->load->database($database, true);
    }

    public function __destruct()
    {
        $this->_db->close();
    }

    /**
     * 로그인한 관리자의 권한유형에 맞는 메뉴 목록 조회
     * @param int $role_idx
     * @param string $role_type
     * @return mixed
     */
    abstract protected function getAuthMenu($role_idx, $role_type = '');

    /**
     * 관리자 환경설정 정보 조회
     * @param array $menus
     * @return array
     */
    abstract protected function getAdminSettings($menus = []);

    /**
     * 관리자별 권한유형 정보 조회
     * @return array
     */
    abstract protected function getAdminRole();

    /**
     * LCMS 전환 로그인 로그 저장, 접속 사이트 세션 갱신
     * @return void
     */
    abstract protected function setTransLogin();

    /**
     * 현재 URL에 대한 메뉴 권한 체크 및 현재 MenuIdx, GroupMenuIdx 리턴
     * @param array $menus
     * @param string $uri_str
     * @param array $uri_get_params
     * @return array|bool
     */
    public function getCurrentMenuInfo($menus = [], $uri_str, $uri_get_params = [])
    {
        foreach ((array) $menus as $row) {
            if(empty($row['MenuUrl']) === false) {
                $_menu_urls = explode('?', $row['MenuUrl']);

                if (starts_with($uri_str, $_menu_urls[0]) === true) {
                    $is_perm = false;
                    if (isset($_menu_urls[1]) === false) {
                        $is_perm = true;
                    } else if (isset($_menu_urls[1]) === true) {
                        $_menu_qs = query_string_to_array($_menu_urls[1]);
                        if (count(array_intersect_assoc($_menu_qs, $uri_get_params)) == count($_menu_qs)) {
                            $is_perm = true;
                        }
                    }

                    if ($is_perm === true) {
                        return [
                            'MenuIdx' => $row['MenuIdx'],
                            'GroupMenuIdx' => $row['GroupMenuIdx'],
                            'UrlRouteName' => $this->_toHtmlUrlRouteName($row['UrlRouteName']),
                            'MenuName' => $row['MenuName']
                        ];
                    }
                }
            }
        }

        return false;
    }

    /**
     * 뷰 페이지에서 사용할 GNB, LNB 메뉴 리턴
     * @param array $menus
     * @param $current_group_menu_idx
     * @return array
     */
    public function getViewAuthMenu($menus = [], $current_group_menu_idx)
    {
        if (count($menus) < 1) {
            return [];
        }

        $_menus = [];
        foreach ($menus as $row) {
            $data = [
                'MenuName' => $row['MenuName'],
                'MenuUrl' => $row['MenuUrl'],
                'UrlType' => $row['UrlType'],
                'UrlTarget' => $row['UrlTarget'],
                'IconClassName' => $row['IconClassName'],
                'TreeNum' => $row['TreeNum'],
                'UrlRouteName' => $row['UrlRouteName'],
            ];

            switch ($row['MenuDepth']) {
                case 1:
                    $_menus['GNB'][$row['GroupMenuIdx']] = $data;
                    break;
                case 2:
                    $_menus['GNB'][$row['GroupMenuIdx']]['Children'][$row['MenuIdx']] = $data;
                    break;
                default :
                    $_menus['GNB'][$row['GroupMenuIdx']]['Children'][$row['ParentMenuIdx']]['Children'][$row['MenuIdx']] = $data;
                    break;
            }
        }

        $_menus['LNB'] = element($current_group_menu_idx, $_menus['GNB'], []);

        return $_menus;
    }

    /**
     * 운영자 권한 세션 설정
     * @param array $auth_data
     */
    public function setSessionAdminAuthData($auth_data = [])
    {
        $sess_admin_auth = $this->_CI->session->userdata('admin_auth_data');

        if (empty($sess_admin_auth) === true || serialize($sess_admin_auth) != serialize($auth_data)) {
            $this->_CI->session->set_userdata('admin_auth_data', $auth_data);
        }
    }

    /**
     * LCMS 접근 사이트 서브 도메인 세션 설정
     */
    public function setSessionAdminConnSites()
    {
        $sess_admin_conn_sites = $this->_CI->session->userdata('admin_conn_sites');

        array_push($sess_admin_conn_sites, APP_NAME);
        $this->_CI->session->set_userdata('admin_conn_sites', $sess_admin_conn_sites);
    }

    /**
     * URL 경로를 HTML 형태로 변환
     * @param $url_route_name
     * @return string
     */
    private function _toHtmlUrlRouteName($url_route_name)
    {
        $pos = strrpos($url_route_name, '>');

        if ($pos === false) {
            $html = '<span class="blue">' . $url_route_name . '</span>';
        } else {
            $html = str_replace('>', ' <i class="fa fa-angle-right"></i> ', substr($url_route_name, 0, $pos + 1));
            $html .= '<span class="blue">' . substr($url_route_name, $pos + 1) . '</span>';
        }

        return $html;
    }
}
