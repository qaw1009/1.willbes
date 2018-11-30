<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends \app\controllers\BaseController
{
    protected $models = array('sys/wCode', 'sys/role', 'sys/admin');
    protected $helpers = array();
    private $_ccd = [
        'Dept' => '109',
        'Position' => '110'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 정보관리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $codes = $this->wCodeModel->getCcdInArray(array_values($this->_ccd));

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/admin/index', [
            'dept_ccd' => element($this->_ccd['Dept'], $codes),
            'position_ccd' => element($this->_ccd['Position'], $codes),
            'roles' => $roles
        ]);
    }

    /**
     * 운영자 정보관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'wAdminDeptCcd' => $this->_reqP('search_dept_ccd'),
                'wAdminPositionCcd' => $this->_reqP('search_position_ccd'),
                'RoleIdx' => $this->_reqP('search_role_idx'),
                'wIsUse' => $this->_reqP('search_is_use'),
                'IsSiteCampus' => $this->_reqP('search_chk_no_site_campus'),
            ],
            'ORG' => [
                'LKB' => [
                    'wAdminId' => $this->_reqP('search_value'),
                    'wAdminName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->adminModel->listAdmin(true, $arr_condition);

        if ($count > 0) {
            $list = $this->adminModel->listAdmin(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['wAdminIdx' => 'desc']);

            // 사용하는 코드값 조회
            $codes = $this->wCodeModel->getCcdInArray(array_values($this->_ccd));

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wAdminDeptCcdName' => ['wAdminDeptCcd' => element($this->_ccd['Dept'], $codes)],
                'wAdminPositionCcdName' => ['wAdminPositionCcd' => element($this->_ccd['Position'], $codes)]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자 정보 수정 폼
     * @param array $params
     */
    public function edit($params = [])
    {
        $admin_idx = $params[0];

        // 운영자 정보 조회
        $data = $this->adminModel->findAdminForModify($admin_idx);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        // 사용하는 코드값 조회
        $codes = $this->wCodeModel->getCcdInArray(array_values($this->_ccd));

        // 소속 / 직급명
        $data['wAdminDeptCcdName'] = element(element('wAdminDeptCcd', $data), element($this->_ccd['Dept'], $codes));
        $data['wAdminPositionCcdName'] = element(element('wAdminPositionCcd', $data), element($this->_ccd['Position'], $codes));

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        // 운영자별 사이트, 캠퍼스 권한 부여 목록
        $arr_site_campus = $this->adminModel->listAdminSiteCampus($admin_idx);

        foreach ($arr_site_campus as $idx => $row) {
            if (empty($row['CampusCcds']) === false) {
                $arr_campus = explode(',', $row['CampusCcds']);
                // 기존 조회 데이터 삭제
                unset($arr_site_campus[$idx]['CampusCcds']);

                foreach ($arr_campus as $sidx => $campus) {
                    $arr_site_campus[$idx]['CampusCcds'][] = explode('::', $campus);
                }
            }
        }

        $this->load->view('sys/admin/edit', [
            'idx' => $admin_idx,
            'data' => $data,
            'roles' => $roles,
            'arr_site_campus' => $arr_site_campus
        ]);
    }

    /**
     * 운영자 권한유형, 사이트, 캠퍼스 권한 변경
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminModel->modifyAdmin($this->_reqP(null, false));

        $this->json_result($result, '변경 되었습니다.', $result);
    }

    /**
     * 운영자 권한유형 변경
     */
    public function rerole()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminModel->replaceAdminRole($this->_reqP('role_idx'), $this->_reqP('idx'));

        $this->json_result($result, '변경 되었습니다.', $result);
    }
}