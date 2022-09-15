<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPwdChangeLog extends \app\controllers\BaseController
{
    protected $models = array('sys/role', 'sys/admin');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자비밀번호변경로그 인덱스
     */
    public function index()
    {
        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/admin_pwd_change_log/index', [
            'roles' => $roles
        ]);
    }

    /**
     * 운영자비밀번호변경로그 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->adminModel->listAdminPasswdChangeLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->adminModel->listAdminPasswdChangeLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['wApcIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자비밀번호변경로그 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.wRoleIdx' => $this->_reqP('search_role_idx'),
            ],
            'BDT' => [
                'PCL.wRegDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-01')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-t'))
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'PCL.wAdminIdx' => $this->_reqP('search_value'),
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'A.wAdminId' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 변경구분 검색조건
        $search_passwd_chg_route = $this->_reqP('search_passwd_chg_route');

        if (empty($search_passwd_chg_route) === false) {
            if (in_array($search_passwd_chg_route, ['PW', 'AU']) === true) {
                $arr_condition['EQ']['PCL.wPasswdChgRoute'] = $search_passwd_chg_route;
            } else {
                $arr_condition['EQ']['PCL.wPasswdChgRoute'] = substr($search_passwd_chg_route, 0, 1) . 'Y';

                if (ends_with($search_passwd_chg_route, 'R') === true) {
                    $arr_condition['RAW']['PCL.wPrevAdminPasswd is'] = ' null';
                } else {
                    $arr_condition['RAW']['PCL.wPrevAdminPasswd is'] = ' not null';
                }
            }
        }

        return $arr_condition;
    }

    /**
     * 운영자비밀번호변경로그 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        if (empty($this->_reqP('search_start_date')) === true || empty($this->_reqP('search_end_date')) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $column = 'wAdminId, wAdminName, wRoleName, wPasswdChgRouteName, wRegAdminName, wRegDatm, wRegIp';
        $arr_condition = $this->_getListConditions();
        $list = $this->adminModel->listAdminPasswdChangeLog($column, $arr_condition, null, null, ['wApcIdx' => 'desc']);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        $headers = ['이름', '아이디', '권한유형', '변경구분', '등록자', '등록일시', '등록IP'];
        $file_name = '운영자비밀번호변경로그(W)_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
