<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskOrganizationModel extends WB_Model
{
    private $_table = [
        'gw_code' => 'gw_sys_code',
        'gw_org' => 'gw_sys_organization',
        'gw_org_admin' => 'gw_sys_organization_r_admin',
        'vw_org' => 'vw_sys_organization',
    ];

    public function __construct()
    {
        parent::__construct('groupware');
    }

    /**
     * 조직 목록 조회
     * @param null $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array
     */
    public function listOrganization($is_count = false, $arr_condition=[], $limit = null, $offset = null, $order_by = [])
    {
        //$query = $this->_conn->query('call sp_organization(?,?,?)', [$is_count, $limit, $offset]);
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = ' From '. $this->_table['vw_org'].' where 1=1';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 조직 등록
     * @param array $input
     * @return array|bool
     */
    public function addOrganization($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'OrgName' => element('org_name', $input),
                'OrgDesc' => element('org_desc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if(element('org_type', $input) === 'group') { //최상위그룹등록
                $order_num = $this->_conn
                    ->query('select ifnull(max(OrderNum)+1,1) as order_num '.' from '. $this->_table['gw_org'] .' where ParentIdx = 0')
                    ->row(0)->order_num;

            } elseif(element('org_type', $input) === 'sub') {  //하위등록
                $order_num = $this->_conn
                    ->query('select ifnull(max(OrderNum)+1,1) as order_num '.' from '. $this->_table['gw_org'] .' where ParentIdx = ?', [element('parent_idx', $input)])
                    ->row(0)->order_num;
            }
            $data = array_merge_recursive($data, [
                'ParentIdx' => element('parent_idx', $input),
                'OrderNum' => $order_num,
            ]);

            // 조직 등록
            if ($this->_conn->set($data)->insert($this->_table['gw_org']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 조직 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyOrganization($input = [])
    {

        $this->_conn->trans_begin();

        try {
            $org_idx = element('org_idx', $input);

            $data = [
                'OrgName' => element('org_name', $input),
                'OrderNum' => element('order_num', $input),
                'OrgDesc' => element('org_desc', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($data)->where('OrgIdx', $org_idx);
            if ($this->_conn->update($this->_table['gw_org']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 조직 삭제
     * @param array $input
     * @return array|bool
     */
    public function removeOrganization($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($data)->where('OrgIdx', element('org_idx', $input));
            if($this->_conn->update($this->_table['gw_org']) === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 조직 관리자 연결 등록
     * @param array $input
     * @return array|bool
     */
    public function addAdminRelationOrganization($input = [])
    {
        try {

            if(empty(element('OrgIdx', $input)) || empty(element('wAdminIdx', $input))) {
                throw new \Exception('조직 또는 관리자식별자가 존재하지 않습니다.');
            }

            $data = [
                'wAdminIdx' => element('wAdminIdx', $input),
                'OrgIdx' => element('OrgIdx', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 조직 관리자 연결 등록
            if ($this->_conn->set($data)->insert($this->_table['gw_org_admin']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 조직 관리자 연결 삭제
     * @param array $input
     * @return array|bool
     */
    public function removeAdminRelationOrganization($input = [])
    {
        try {
            if(empty(element('wAdminIdx', $input)) === true) {
                throw new \Exception('조직 수정시 관리자식별자는 필수입니다.');
            }
            $where = [ 'wAdminIdx' => element('wAdminIdx', $input), 'IsStatus'=>'Y'];

            $data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 조직 관리자 연결 삭제
            if ($this->_conn->set($data)->where($where)->update($this->_table['gw_org_admin']) === false) {
                throw new \Exception('조직 정보 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 조직 관리자 연결 리스트 조회
     * @param null $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array
     */
    public function listAdminRelationOrganization($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                B.OrgIdx, B.OrgName, B.IsUse, B.PathName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['gw_org_admin']} A
                JOIN {$this->_table['vw_org']} B ON A.OrgIdx = B.OrgIdx
            Where A.IsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}