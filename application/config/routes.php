<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = APP_NAME . '/home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 서브 도메인 예외 처리
$route['(lcms)/(.*)'] = '$1/$2';

// 서브 도메인별 컨트롤러 디렉토리 분리
$__app_mobile_site_prefix = config_item('app_mobile_site_prefix');
$__app_pass_site_prefix = config_item('app_pass_site_prefix');
$__app_except_config = config_item('app_except_config');

if (array_key_exists(SUB_DOMAIN, $__app_except_config) === true && empty($__app_except_config[SUB_DOMAIN]['route_add_path']) === false) {
    // 사이트 라우터 예외 처리
    $route['(' . $__app_mobile_site_prefix . '\/)?(\/?' . $__app_pass_site_prefix . '\/)?(.*)'] = APP_NAME . $__app_except_config[SUB_DOMAIN]['route_add_path'] . '/$3';

    if (empty($this->uri->uri_string) === true) {
        // 사이트 디폴트 컨트롤러 설정
        $route['default_controller'] = APP_NAME . $__app_except_config[SUB_DOMAIN]['route_add_path'] . '/home/index';
    }
} else {
    // 디폴트 라우터
    $route['(.*)'] = APP_NAME . '/$1';
}
