<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobAdminModel extends WB_Model
{
    private $_table = [
        'btob_admin' => 'lms_btob_admin',
        'btob_admin_role' => 'lms_btob_admin_role',
        'btob_code' => 'lms_btob_code',
        'admin' => 'wbs_sys_admin'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 운영자 목록 조회
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
            $column = 'A.AdminIdx, A.RoleIdx, A.AdminId, A.AdminName, A.AdminPhone1, A.AdminPhone2, A.AdminPhone3, A.AdminAreaCcd, A.AdminBranchCcd, A.IsUse, A.RegDatm, A.RegAdminIdx
                , ifnull(R.RoleName, "-") as RoleName, AC.CcdName as AdminAreaCcdName, BC.CcdName as AdminBranchCcdName, ifnull(RA.AdminName, "") as RegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['btob_admin'] . ' as A
                left join ' . $this->_table['btob_admin_role'] . ' as R
                    on A.RoleIdx = R.RoleIdx and R.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as AC
                    on A.AdminAreaCcd = AC.Ccd and AC.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as BC
                    on A.AdminBranchCcd = BC.Ccd and BC.IsStatus = "Y"		
                left join ' . $this->_table['btob_admin'] . ' as RA
                    on A.RegAdminIdx = RA.AdminIdx and RA.IsStatus = "Y"                     
            where A.IsStatus = "Y"        
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 제휴사 운영자 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findAdmin($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['btob_admin'], $column, $arr_condition);
    }

    /**
     * 제휴사 운영자 수정 폼에 필요한 데이터 조회
     * @param $admin_idx
     * @param $btob_idx
     * @return array
     */
    public function findAdminForModify($admin_idx, $btob_idx = null)
    {
        $column = 'A.AdminIdx, A.AdminId, A.AdminName, A.AdminPhone1, A.AdminPhone2, A.AdminPhone3, A.AdminMail, A.AdminAreaCcd, A.AdminBranchCcd';
        $column .= ' , A.AdminDesc, A.IsApproval, A.ApprovalDatm, A.ApprovalAdminIdx, A.IsUse, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx';
        $column .= ' , if(A.RoleIdx = 0, "", A.RoleIdx) as RoleIdx';
        $column .= ' , (select AdminName from ' . $this->_table['btob_admin'] . ' where AdminIdx = A.RegAdminIdx and IsStatus = "Y") as RegAdminName';
        $column .= ' , if(A.UpdAdminIdx is null, "", (select AdminName from ' . $this->_table['btob_admin'] . ' where AdminIdx = A.UpdAdminIdx and IsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['btob_admin'] . ' as A', $column, [
            'EQ' => ['A.AdminIdx' => $admin_idx, 'A.BtobIdx' => $btob_idx, 'A.IsStatus' => 'Y']
        ]);
    }

    /**
     * 제휴사 운영자 아이디 중복 여부 리턴
     * @param string $admin_id
     * @return bool [true: 중복 / false: 중복된 아이디 없음]
     */
    public function isDuplicateAdminId($admin_id)
    {
        // 제휴사 운영자
        $btob_count = $this->_conn->getListResult($this->_table['btob_admin'], true, [
            'EQ' => ['AdminId' => $admin_id]
        ]);

        // LMS 운영자
        $lms_count = $this->_conn->getListResult($this->_table['admin'], true, [
            'EQ' => ['wAdminId' => $admin_id]
        ]);

        return ($btob_count + $lms_count) > 0 ? true : false;
    }

    /**
     * 제휴사 운영자 등록
     * @param array $input
     * @param string $type [신청: apply / 등록: add]
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
                'AdminId' => element('admin_id', $input),
                'AdminPasswd' => element('admin_passwd', $input),
                'AdminName' => element('admin_name', $input),
                'AdminPhone1' => element('admin_phone1', $input),
                'AdminPhone2' => element('admin_phone2', $input),
                'AdminPhone3' => element('admin_phone3', $input),
                'AdminMail' => element('admin_mail_id', $input) . '@' . element('admin_mail_domain', $input)
            ];

            if ($type == 'add') {
                $data = array_merge($data, [
                    'AdminAreaCcd' => element('admin_area_ccd', $input),
                    'AdminBranchCcd' => element('admin_branch_ccd', $input),
                    'AdminDesc' => element('admin_desc', $input),
                    'IsUse' => element('is_use', $input),
                    'IsApproval' => element('is_approval', $input),
                    'RoleIdx' => element('role_idx', $input),
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
     * 제휴사 운영자 정보 등록
     * @param array $data
     * @return bool|string
     */
    public function _addAdmin($data = [])
    {
        try {
            $sess_btob_idx = $this->session->userdata('btob.btob_idx');  // 제휴사식별자
            $sess_btob_admin_idx = $this->session->userdata('btob.admin_idx');  // 제휴사운영자식별자

            $data['BtobIdx'] = get_var($sess_btob_idx, 0);
            $data['RegAdminIdx'] = get_var($sess_btob_admin_idx, 0);

            // 비밀번호
            $admin_passwd = get_var($data['AdminPasswd'], '1111');
            unset($data['AdminPasswd']);

            $this->_conn->set($data);
            $this->_conn->set('AdminPasswd', 'fn_hash("' . $admin_passwd . '")', false);

            // 운영자 승인
            if (isset($data['IsApproval']) === true && $data['IsApproval'] == 'Y') {
                $this->_conn->set('ApprovalDatm', 'NOW()', false);
                $this->_conn->set('ApprovalAdminIdx', $sess_btob_admin_idx);
            }

            // 데이터 등록
            if ($this->_conn->insert($this->_table['btob_admin']) === false) {
                throw new \Exception('운영자 신청에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 제휴사 운영자 수정
     * @param array $input
     * @param string $type [sys: 운영자 정보관리 / my: 개인정보 수정]
     * @return array|bool
     */
    public function modifyAdmin($input = [], $type = 'sys')
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'AdminName' => element('admin_name', $input),
                'AdminPasswd' => element('admin_passwd', $input),
                'AdminPhone1' => element('admin_phone1', $input),
                'AdminPhone2' => element('admin_phone2', $input),
                'AdminPhone3' => element('admin_phone3', $input),
                'AdminMail' => element('admin_mail_id', $input) . '@' . element('admin_mail_domain', $input)
            ];

            if ($type == 'sys') {
                $admin_idx = element('idx', $input);

                $data = array_merge($data, [
                    'AdminAreaCcd' => element('admin_area_ccd', $input),
                    'AdminBranchCcd' => element('admin_branch_ccd', $input),
                    'AdminDesc' => element('admin_desc', $input),
                    'IsUse' => element('is_use', $input),
                    'IsApproval' => element('is_approval', $input),
                    'RoleIdx' => element('role_idx', $input),
                ]);
            } else {
                $admin_idx = $this->session->userdata('btob.admin_idx');
            }

            if($this->_modifyAdminByIdx($data, $admin_idx) !== true) {
                throw new \Exception('운영자 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 제휴사 운영자 정보 업데이트
     * @param array $data
     * @param $admin_idx
     * @return bool|string
     */
    private function _modifyAdminByIdx($data, $admin_idx)
    {
        try {
            $sess_btob_idx = $this->session->userdata('btob.btob_idx');  // 제휴사식별자
            $sess_btob_admin_idx = $this->session->userdata('btob.admin_idx');  // 제휴사운영자식별자

            // 기존 운영자 데이터 조회
            $row = $this->_conn->getFindResult($this->_table['btob_admin'], 'ifnull(ApprovalDatm, "") as ApprovalDatm', [
                'EQ' => ['AdminIdx' => $admin_idx, 'BtobIdx' => $sess_btob_idx, 'IsStatus' => 'Y']
            ]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 비밀번호
            if (empty($data['AdminPasswd']) === false) {
                $this->_conn->set($data)->set('AdminPasswd', 'fn_hash("' . $data['AdminPasswd'] . '")', false);
            } else {
                unset($data['AdminPasswd']);
                $this->_conn->set($data);
            }
            
            // 운영자 승인/미승인
            if (isset($data['IsApproval']) === true) {
                if ($data['IsApproval'] == 'Y' && empty($row['ApprovalDatm']) === true) {
                    $this->_conn->set('ApprovalDatm', 'NOW()', false);
                    $this->_conn->set('ApprovalAdminIdx', $sess_btob_admin_idx);
                } elseif ($data['IsApproval'] == 'N') {
                    $this->_conn->set('ApprovalDatm', 'NULL', false);
                    $this->_conn->set('ApprovalAdminIdx', 'NULL', false);
                }
            }

            // 수정 운영자 식별자
            $this->_conn->set('UpdAdminIdx', $sess_btob_admin_idx);

            // where 조건
            $this->_conn->where('AdminIdx', $admin_idx);
            
            // 데이터 수정
            if ($this->_conn->update($this->_table['btob_admin']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
