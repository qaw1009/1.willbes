<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CsModel extends WB_Model
{
    private $_table = [
        'cs_tech_manual' => 'lms_cs_tech_manual',
        'sys_admin' => 'wbs_sys_admin'
    ];
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 목록 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listManageCs($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                CS.CtmIdx, CS.IssueDivisionCcd, CS.Title, CS.Content, CS.ReadCnt, CS.IsBest, CS.IsUse, CS.IsStatus, CS.RegDatm, CS.RegAdminIdx, CS.RegIp, CS.UpdDatm, CS.UpdAdminIdx,
                fn_ccd_name(CS.IssueDivisionCcd) AS IssueDivisionCcdName, ADMIN.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['cs_tech_manual']} as CS
            LEFT OUTER JOIN {$this->_table['sys_admin']} as ADMIN ON CS.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return mixed
     */
    public function findCsForModify($column = '*', $arr_condition = [])
    {
        $from = "
            FROM {$this->_table['cs_tech_manual']} as CS
            LEFT OUTER JOIN {$this->_table['sys_admin']} as ADMIN ON CS.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['sys_admin']} as ADMIN2 ON CS.UpdAdminIdx = ADMIN2.wAdminIdx AND ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }

    public function addCsManual($inputData = [])
    {
        $this->_conn->trans_begin();
        try {
            $inputData = array_merge($inputData,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table['cs_tech_manual']) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function modifyCsManual($inputData = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->findCsForModify('*', $idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            // board update
            $inputData = array_merge($inputData,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($inputData)->where('CtmIdx', $idx);
            if ($this->_conn->update($this->_table['cs_tech_manual']) === false) {
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
     * 조회수 업데이트
     * @param array $params
     * @return array|bool
     */
    public function updateReadCnt($params = [])
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->findCsForModify('*', element('idx', $params));
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $this->_conn->set('ReadCnt', 'ReadCnt+1',false)->where('CtmIdx', element('idx', $params));
            if ($this->_conn->update($this->_table['cs_tech_manual']) === false) {
                throw new \Exception('조회수 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}