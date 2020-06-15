<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends WB_Model
{
    private $_table =  [
        'sys_organization' => 'wbs_sys_organization',
        'sys_code' => 'gw_sys_code',
        'task' => 'gw_task',
        'task_attach' => 'gw_task_attach',
        'task_comment' => 'gw_task_comment',
        'task_project' => 'gw_task_project',
        'task_project_r_organization' => 'gw_task_project_r_organization',
        'task_read_log' => 'gw_task_read_log'
    ];

    public function __construct()
    {
        parent::__construct('groupware');
    }

    /**
     * 업무프로젝트 정보 조회
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return mixed
     */
    public function listTaskProject($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                TP.*,
                fn_admin_name(TP.RegAdminIdx) AS RegAdminName,
                fn_admin_name(TP.UpdAdminIdx) AS UpdAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table['task_project']} as TP
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 업무프로젝트 정보 상세 조회
     * @param $idx
     * @return mixed
     */
    public function findTaskProject($idx = null)
    {
        $return_data = null;
        $arr_condition = [
            'EQ' => [
                'TP.IsStatus' => 'Y'
            ]
        ];
        if(empty($idx) === false) $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['TP.TpIdx' => $idx]);

        $column = '
            TP.*,
            fn_admin_name(TP.RegAdminIdx) AS RegAdminName,
            fn_admin_name(TP.UpdAdminIdx) AS UpdAdminName
        ';
        $from = "
            FROM {$this->_table['task_project']} as TP
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        $return_data = $query->row_array();

        if(empty($return_data) === false) {
            // 프로젝트 조직연결 조회
            $org_data = $this->listTaskProjectRelationOrganization(['EQ' => ['TP.TpIdx' => $return_data['TpIdx']]]);
            $return_data['org_data'] = $org_data;
        }

        return $return_data;
    }

    /**
     * 업무프로젝트 등록
     * @param $input_data
     * @return mixed
     */
    public function addTaskProject($input_data = []){
        $this->_conn->trans_begin();
        try {
            $add_data = [
                'TprojectName' => element('TprojectName', $input_data),
                'TprojectDesc' => element('TprojectDesc', $input_data),
                'IsUse' => element('IsUse', $input_data),
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];
            if ($this->_conn->set($add_data)->insert($this->_table['task_project']) === false) {
                throw new \Exception('업무프로젝트 등록을 실패했습니다.');
            }
            $tp_idx = $this->_conn->insert_id();

            // 업무프로젝트 조직연결 저장
            if(empty($input_data) === false && empty($input_data['OrgCode']) === false) {
                foreach($input_data['OrgCode'] as $row) {
                    $org_result = $this->addTaskProjectRelationOrganization([
                        'TpIdx' => $tp_idx,
                        'wOrgCode' => $row,
                        'IsStatus' => 'Y',
                        'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                        'RegIp' => $this->input->ip_address()
                    ]);
                    if ($org_result !== true) {
                        throw new \Exception('업무프로젝트 수정을 실패했습니다.');
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
     * 업무프로젝트 수정
     * @param $input_data
     * @param $idx
     * @return mixed
     */
    public function modifyTaskProject($input_data = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $modify_data = [
                'TprojectName' => element('TprojectName', $input_data),
                'TprojectDesc' => element('TprojectDesc', $input_data),
                'IsUse' => element('IsUse', $input_data),
                'UpdAdminIdx'=> $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];

            $this->_conn->set($modify_data)->where('TpIdx', $idx);
            if ($this->_conn->update($this->_table['task_project']) === false) {
                throw new \Exception('업무프로젝트 수정을 실패했습니다.');
            }

            // 업무프로젝트 조직연결 정보 수정(삭제/저장)
            if(empty($input_data) === false && empty($input_data['OrgCode']) === false) {
                if ($this->removeTaskProjectRelationOrganization($idx) !== true) {
                    throw new \Exception('업무프로젝트 수정을 실패했습니다.');
                }
                foreach($input_data['OrgCode'] as $row) {
                    $org_result = $this->addTaskProjectRelationOrganization([
                        'TpIdx' => $idx,
                        'wOrgCode' => $row,
                        'IsStatus' => 'Y',
                        'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                        'RegIp' => $this->input->ip_address()
                    ]);
                    if ($org_result !== true) {
                        throw new \Exception('업무프로젝트 수정을 실패했습니다.');
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
     * 업무프로젝트 삭제
     * @param $tp_idx
     * @return mixed
     * @throws Exception
     */
    public function removeTaskProject($tp_idx)
    {
        if(empty($tp_idx) === true) {
            throw new \Exception('필수파라미터 누락 오류');
        }

        $this->_conn->trans_begin();
        try {
            $input_data = [
                'IsStatus'=> 'N',
                'UpdAdminIdx'=> $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];

            $this->_conn->set($input_data)->where('TpIdx', $tp_idx);
            if ($this->_conn->update($this->_table['task_project']) === false) {
                throw new \Exception('업무프로젝트 삭제를 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 업무프로젝트 조직연결정보 조회
     * @param $p_arr_condition
     * @return mixed
     */
    public function listTaskProjectRelationOrganization($p_arr_condition = [])
    {
        $column = '
	        SO.wOrgIdx, SO.wOrgCode, SO.wOrgName, SO.wOrgDesc, SO.wOrderNum, SO.wIsUse, SO.wIsStatus
        ';
        $from = "
            FROM {$this->_table['task_project']} AS TP
            INNER JOIN {$this->_table['task_project_r_organization']} AS TPRO ON TP.TpIdx = TPRO.TpIdx AND TPRO.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_organization']} AS SO ON TPRO.wOrgCode = SO.wOrgCode AND SO.wIsStatus = 'Y'
        ";

        $arr_condition = ['EQ' => ['TPRO.IsStatus' => 'Y']];
        if (empty($p_arr_condition) === false && is_array($p_arr_condition) === true) {
            $arr_condition = array_merge_recursive($arr_condition, $p_arr_condition);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['TP.TpIdx' => 'ASC'])->getMakeOrderBy();

        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 업무프로젝트 조직연결정보 삭제
     * @param $tp_idx
     * @return mixed
     * @throws Exception
     */
    public function removeTaskProjectRelationOrganization($tp_idx)
    {
        if(empty($tp_idx) === true) {
            throw new \Exception('필수파라미터 누락 오류');
        }
        try {
            $input_data = [
                'IsStatus'=> 'N',
                'UpdAdminIdx'=> $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];

            $this->_conn->set($input_data)->where('TpIdx', $tp_idx);
            if ($this->_conn->update($this->_table['task_project_r_organization']) === false) {
                throw new \Exception('업무프로젝트 조직연결정보 삭제를 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 업무프로젝트 조직연결정보 등록
     * @param $input_data
     * @return mixed
     */
    public function addTaskProjectRelationOrganization($input_data = []){
        try {
            $input_data = array_merge($input_data,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            if ($this->_conn->set($input_data)->insert($this->_table['task_project_r_organization']) === false) {
                throw new \Exception('업무프로젝트 조직연결정보 등록을 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

}