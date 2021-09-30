<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLog extends \app\controllers\BaseController
{
    protected $models = array('sys/wCode', 'sys/role', 'sys/loginLog');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값
    private $_ccd = [
        'LoginLog' => '117'
    ];

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
        $codes = $this->wCodeModel->getCcdInArray(array_values($this->_ccd));

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/login_log/index', [
            'arr_login_log_ccd' => $codes[$this->_ccd['LoginLog']],
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
            $list = $this->loginLogModel->listLoginLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['LogIdx' => 'desc']);
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
                'AR.RoleIdx' => $this->_reqP('search_role_idx'),
                'L.LoginLogCcd' => $this->_reqP('search_login_log_ccd'),
                'A.wIsUse' => $this->_reqP('search_is_use')
            ],
            'BDT' => [
                'L.LoginDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-d')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-d'))
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'L.wAdminId' => $this->_reqP('search_value'),
                    'L.LoginIp' => $this->_reqP('search_value'),
                ]
            ]
        ];
    }

    /**
     * 운영자 접속관리 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        if (is_sys_admin() !== true) {
            show_alert('접근 권한이 없습니다.', 'back');
        }

        if (empty($this->_reqP('search_start_date')) === true || empty($this->_reqP('search_end_date')) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $column = 'wAdminId, wAdminName, wAdminDeptCcdName, wAdminPositionCcdName, RoleName, wIsUse, LoginLogCcdName, LoginIp, LoginDatm';
        $arr_condition = $this->_getListConditions();
        $list = $this->loginLogModel->listLoginLog($column, $arr_condition, null, null, ['LogIdx' => 'desc']);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        $headers = ['아이디', '이름', '소속', '직급', '권한유형', '활동여부', '로그유형', '접속IP', '접속일'];
        $file_name = '운영자접속관리_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
