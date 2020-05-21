<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'admin_role' => 'wbs_sys_admin_role',
        'admin_role_r_cp' => 'wbs_sys_admin_role_r_cp',
        'cp' => 'wbs_sys_cp'
    ];    

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 운영자 계정 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAdmin($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                A.wAdminIdx, A.wRoleIdx, A.wAdminId, A.wAdminName, A.wAdminPositionCcd, A.wAdminDeptCcd, A.wIsApproval, A.wIsUse, A.wRegDatm, A.wRegAdminIdx
                    , ifnull(R.wRoleName, "-") as wRoleName
                    , (case when A.wAdminIdx = A.wRegAdminIdx 
                            then A.wAdminName
                            else (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wRegAdminIdx and wIsStatus = "Y")
                      end) as wRegAdminName
                    , (case when A.wRoleIdx > 0
                            then (
                                select GROUP_CONCAT(C.wCpName separator ", ")
                                from ' . $this->_table['cp'] . ' as C 
                                    inner join ' . $this->_table['admin_role_r_cp'] . ' as RC
                                        on C.wCpIdx = RC.wCpIdx
                                where C.wIsStatus = "Y" 
                                    and RC.wIsStatus = "Y" and RC.wRoleIdx = A.wRoleIdx
                                group by RC.wRoleIdx
                            )
                            else ""
                      end) as wCpNameList            
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin'] . ' as A 
                left join ' . $this->_table['admin_role'] . ' as R 
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
            where A.wIsStatus = "Y"  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 운영자 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findAdmin($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['admin'], $column, $arr_condition);
    }

    /**
     * 운영자 수정 폼에 필요한 데이터 조회
     * @param $admin_idx
     * @return array
     */
    public function findAdminForModify($admin_idx)
    {
        $column = 'A.wAdminIdx, A.wAdminId, A.wAdminName, A.wAdminPhone1, A.wAdminPhone2, A.wAdminPhone3, A.wAdminMail, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wAdminDesc';
        $column .= ' , A.wIsApproval, A.wApprovalDatm, A.wApprovalAdminIdx, A.wIsUse, A.wRegDatm, A.wRegAdminIdx, A.wUpdDatm, A.wUpdAdminIdx';
        $column .= ' , if(A.wRoleIdx = 0, "", A.wRoleIdx) as wRoleIdx';
        $column .= ' , if(A.wRoleIdx = 0, "", (select wRoleName from ' . $this->_table['admin_role'] . ' where wRoleIdx = A.wRoleIdx and wIsStatus = "Y")) as wRoleName';
        $column .= ' , if(A.wApprovalAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wApprovalAdminIdx and wIsStatus = "Y")) as wApprovalAdminName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(A.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table['admin'] . ' as A', $column, [
            'EQ' => ['A.wAdminIdx' => $admin_idx, 'A.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 운영자 아이디 중복 여부 리턴
     * @param string $admin_id
     * @return bool true : 중복 / false : 중복된 아이디 없음
     */
    public function isDuplicateAdminId($admin_id)
    {
        $count = $this->_conn->getListResult($this->_table['admin'], true, [
            'EQ' => ['wAdminId' => $admin_id]
        ]);

        return ($count > 0) ? true : false;
    }

    /**
     * 운영자 등록
     * @param array $input
     * @param string $type 신청 : apply / 등록 : add
     * @return array|bool
     */
    public function addAdmin($input = [], $type = 'add')
    {
        $this->_conn->trans_begin();

        try {
            // 아이디 중복 체크
            if ($this->isDuplicateAdminId(element('admin_id', $input)) === true) {
                throw new \Exception('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
            }

            $data = [
                'wAdminId' => element('admin_id', $input),
                'wAdminPasswd' => element('admin_passwd', $input),
                'wAdminName' => element('admin_name', $input),
                'wAdminPhone1' => element('admin_phone1', $input),
                'wAdminPhone2' => element('admin_phone2', $input),
                'wAdminPhone3' => element('admin_phone3', $input),
                'wAdminMail' => element('admin_mail_id', $input) . '@' . element('admin_mail_domain', $input),
                'wAdminDeptCcd' => element('admin_dept_ccd', $input),
                'wAdminPositionCcd' => element('admin_position_ccd', $input),
                'wAdminDesc' => element('admin_desc', $input),
            ];

            if ($type == 'add') {
                $data = array_merge($data, [
                    'wIsUse' => element('is_use', $input),
                    'wIsApproval' => element('is_approval', $input),
                    'wRoleIdx' => element('role_idx', $input),
                ]);
            }

            if ($this->_addAdmin($data) !== true) {
                throw new \Exception('운영자 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;        
    }

    /**
     * 운영자 정보 등록
     * @param array $data
     * @return bool|string
     */
    public function _addAdmin($data = [])
    {
        try {
            // 등록 운영자 식별자
            $data['wRegAdminIdx'] = get_var($this->session->userdata('admin_idx'), 0);

            // 비밀번호
            $admin_passwd = get_var($data['wAdminPasswd'], '1111');
            unset($data['wAdminPasswd']);

            $this->_conn->set($data);
            $this->_conn->set('wAdminPasswd', 'fn_hash("' . $admin_passwd . '")', false);

            // 운영자 승인
            if (isset($data['wIsApproval']) === true && $data['wIsApproval'] == 'Y') {
                $this->_conn->set('wApprovalDatm', 'NOW()', false);
                $this->_conn->set('wApprovalAdminIdx', $this->session->userdata('admin_idx'));
            }

            // 데이터 등록
            if ($this->_conn->insert($this->_table['admin']) === false) {
                throw new \Exception('운영자 신청에 실패했습니다.');
            }

            if (empty($data['wRegAdminIdx']) === true) {
                // 운영자 신청일 경우 RegAdminIdx 컬럼을 신청자 등록 후 생성된 식별자로 업데이트
                $admin_idx = $this->_conn->insert_id();
                $is_update = $this->_conn->set(['wRegAdminIdx' => $admin_idx, 'wUpdAdminIdx' => $admin_idx])->where('wAdminIdx', $admin_idx)->update($this->_table['admin']);
                if ($is_update === false) {
                    throw new \Exception('운영자 신청정보 수정에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 운영자 수정
     * @param array $input
     * @param string $type  sys : 운영자 정보관리 / my : 개인정보 수정
     * @return array|bool
     */
    public function modifyAdmin($input = [], $type = 'sys')
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wAdminName' => element('admin_name', $input),
                'wAdminPasswd' => element('admin_passwd', $input),
                'wAdminPhone1' => element('admin_phone1', $input),
                'wAdminPhone2' => element('admin_phone2', $input),
                'wAdminPhone3' => element('admin_phone3', $input),
                'wAdminMail' => element('admin_mail_id', $input) . '@' . element('admin_mail_domain', $input),
                'wAdminDeptCcd' => element('admin_dept_ccd', $input),
                'wAdminPositionCcd' => element('admin_position_ccd', $input),
            ];

            if ($type == 'sys') {
                $admin_idx = element('idx', $input);

                $data = array_merge($data, [
                    'wAdminDesc' => element('admin_desc', $input),
                    'wIsUse' => element('is_use', $input),
                    'wIsApproval' => element('is_approval', $input),
                    'wRoleIdx' => element('role_idx', $input),
                ]);
            } else {
                $admin_idx = $this->session->userdata('admin_idx');
            }

            if($this->_modifyAdminByIdx($data, $admin_idx) !== true) {
                throw new \Exception('운영자 정보 수정에 실패했습니다.');
            }

            // 조직 정보 수정 (삭제/인서트)
            $this->load->loadModels(['_wbs/sys/organization']);
            $arr_org_code = element('org_code', $input);

            $org_result = $this->organizationModel->removeAdminRelationOrganization(['wAdminIdx' => $this->session->userdata('admin_idx')]);
            if($org_result !== true) {
                throw new \Exception('조직 정보 수정에 실패했습니다.');
            }

            if(empty($arr_org_code) === false){
                foreach($arr_org_code as $key => $row) {
                    $org_result = $this->organizationModel->addAdminRelationOrganization(['wOrgCode' => $row, 'wAdminIdx' => $this->session->userdata('admin_idx')]);
                    if($org_result !== true) {
                        throw new \Exception('조직 정보 수정에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 운영자 정보 업데이트
     * @param array $data
     * @param $admin_idx
     * @return bool|string
     */
    private function _modifyAdminByIdx($data = [], $admin_idx)
    {
        try {
            // 기존 운영자 데이터 조회
            $row = $this->_conn->getFindResult($this->_table['admin'], 'ifnull(wApprovalDatm, "") as wApprovalDatm', [
                'EQ' => ['wAdminIdx' => $admin_idx, 'wIsStatus' => 'Y']
            ]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 비밀번호
            if (empty($data['wAdminPasswd']) === false) {
                $this->_conn->set($data)->set('wAdminPasswd', 'fn_hash("' . $data['wAdminPasswd'] . '")', false);
            } else {
                unset($data['wAdminPasswd']);
                $this->_conn->set($data);
            }
            
            // 운영자 승인/미승인
            if (isset($data['wIsApproval']) === true) {
                if ($data['wIsApproval'] == 'Y' && empty($row['wApprovalDatm']) === true) {
                    $this->_conn->set('wApprovalDatm', 'NOW()', false);
                    $this->_conn->set('wApprovalAdminIdx', $this->session->userdata('admin_idx'));
                } elseif ($data['wIsApproval'] == 'N') {
                    $this->_conn->set('wApprovalDatm', 'NULL', false);
                    $this->_conn->set('wApprovalAdminIdx', 'NULL', false);
                }
            }

            // 수정 운영자 식별자
            $this->_conn->set('wUpdAdminIdx', $this->session->userdata('admin_idx'));

            // where 조건
            $this->_conn->where('wAdminIdx', $admin_idx);
            
            // 데이터 수정
            if ($this->_conn->update($this->_table['admin']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
