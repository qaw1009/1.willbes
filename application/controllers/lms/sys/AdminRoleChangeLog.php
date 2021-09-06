<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRoleChangeLog extends \app\controllers\BaseController
{
    protected $models = array('sys/sysLog');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자권한변경로그 인덱스
     */
    public function index()
    {
        $this->load->view('sys/admin_role_change_log/index');
    }

    /**
     * 운영자권한변경로그 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->sysLogModel->listAdminRoleChangeLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->sysLogModel->listAdminRoleChangeLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['ArIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자권한변경로그 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'BDT' => [
                'AR.RegDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-01')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-t'))
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'AR.wAdminIdx' => $this->_reqP('search_value'),
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'A.wAdminId' => $this->_reqP('search_value')
                ]
            ]
        ];
    }

    /**
     * 운영자권한변경로그 엑셀다운로드
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

        $column = 'wAdminId, wAdminName, RoleName, IsActive, RegAdminName, RegDatm, UpdAdminName, UpdDatm';
        $arr_condition = $this->_getListConditions();
        $list = $this->sysLogModel->listAdminRoleChangeLog($column, $arr_condition, null, null, ['ArIdx' => 'desc']);
        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        $headers = ['이름', '아이디', '권한유형', '활성여부', '등록자', '등록일시', '수정자', '수정일시'];
        $file_name = '운영자권한변경로그_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
