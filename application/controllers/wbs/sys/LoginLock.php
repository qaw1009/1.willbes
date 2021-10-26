<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLock extends \app\controllers\BaseController
{
    protected $models = array('sys/loginLock', 'sys/role');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 계정잠금관리 인덱스
     */
    public function index()
    {
        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/login_lock/index', [
            'roles' => $roles
        ]);
    }

    /**
     * 운영자 계정잠금관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->loginLockModel->listLoginLock(true, $arr_condition);

        if ($count > 0) {
            $list = $this->loginLockModel->listLoginLock(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['wLockIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자 계정잠금관리 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'EQ' => [
                'A.wRoleIdx' => $this->_reqP('search_role_idx'),
                'A.wIsUse' => $this->_reqP('search_is_use')
            ],
            'BDT' => [
                'L.wLockDatm' => [
                    get_var($this->_reqP('search_lock_start_date'), date('Y-m-d')),
                    get_var($this->_reqP('search_lock_end_date'), date('Y-m-d'))
                ],
                'L.wUnLockDatm' => [
                    $this->_reqP('search_unlock_start_date'),
                    $this->_reqP('search_unlock_end_date')
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'L.wAdminId' => $this->_reqP('search_value')
                ]
            ]
        ];
    }

    /**
     * 운영자 계정잠금관리 엑셀다운로드
     */
    public function excel()
    {
        if (empty($this->_reqP('search_lock_start_date')) === true || empty($this->_reqP('search_lock_end_date')) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['아이디', '이름', '권한유형', '활동여부', '접근도메인', '잠금일', '잠금IP', '해제일', '해제자'];
        $column = 'wAdminId, wAdminName, wRoleName, wIsUse, wLockSubDomain, wLockDatm, wLockIp, wUnLockDatm, wUnLockAdminName';
        $file_name = '운영자계정잠금_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->loginLockModel->listLoginLock($column, $arr_condition, null, null, ['wLockIdx' => 'desc']);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 운영자 계정잠금관리 잠금해제
     */
    public function unlock()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_id', 'label' => '관리자아이디', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->loginLockModel->modifyLoginUnLock($this->_reqP('admin_id'), $this->_reqP('idx'));

        $this->json_result($result, '잠금해제 되었습니다.', $result);
    }
}
