<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLog extends \app\controllers\BaseController
{
    protected $models = array('sys/loginLog', 'sys/role', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 접속관리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['117']);

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/login_log/index', [
            'arr_login_log_ccd' => $codes['117'],
            'roles' => $roles
        ]);
    }

    /**
     * 운영자 접속관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->loginLogModel->listLoginLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->loginLogModel->listLoginLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['wLogIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자 접속관리 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'EQ' => [
                'A.wRoleIdx' => $this->_reqP('search_role_idx'),
                'L.wLoginLogCcd' => $this->_reqP('search_login_log_ccd'),
                'A.wIsUse' => $this->_reqP('search_is_use')
            ],
            'BDT' => [
                'L.wLoginDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-d')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-d'))
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'L.wAdminId' => $this->_reqP('search_value'),
                    'L.wLoginIp' => $this->_reqP('search_value'),
                ]
            ]
        ];
    }

    /**
     * 운영자 접속관리 엑셀다운로드
     */
    public function excel()
    {
        if (empty($this->_reqP('search_start_date')) === true || empty($this->_reqP('search_end_date')) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['아이디', '이름', '소속', '직급', '권한유형', '활동여부', '로그유형', '접속IP', '접속일'];
        $column = 'wAdminId, wAdminName, wAdminDeptCcdName, wAdminPositionCcdName, wRoleName, wIsUse, wLoginLogCcdName, wLoginIp, wLoginDatm';
        $file_name = '운영자접속관리(WBS)_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->loginLogModel->listLoginLog($column, $arr_condition, null, null, ['wLogIdx' => 'desc']);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
