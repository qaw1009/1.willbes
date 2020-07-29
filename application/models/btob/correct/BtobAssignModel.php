<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobAssignModel extends WB_Model
{
    private $_table = [
        'lms_product' => 'lms_product',
        'lms_correct_unit' => 'lms_correct_unit',
        'lms_correct_unit_assignment' => 'lms_correct_unit_assignment',
        'lms_btob_admin' => 'lms_btob_admin',
        'lms_correct_assign' => 'lms_correct_assign',
        'lms_correct_assign_detail' => 'lms_correct_assign_detail',
        'lms_member' => 'lms_member'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 채점자 추출
     * @return mixed
     */
    public function listAssignAdmin($is_authority = true)
    {
        $column = 'AdminIdx, AdminId, AdminName';
        $arr_condition = [
            'EQ' => [
                'BtobIdx' => $this->session->userdata('btob.btob_idx'),
                'RoleIdx' => '6005',
                'IsApproval' => 'Y',
                'IsStatus' => 'Y',
                'IsUse' => 'Y',
            ]
        ];

        if ($is_authority === false) {
            $arr_condition['EQ']['AdminIdx'] = $this->session->userdata('btob.admin_idx');
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = " FROM {$this->_table['lms_btob_admin']}";
        return $this->_conn->query('select ' . $column .$from .$where)->result_array();
    }

    /**
     * 배정목록
     */
    public function assignList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                cu.CorrectIdx,cu.SiteCode,p.ProdName,cu.Title,ca.MemCnt,ca.RegDatm,ca.RegAdminName
                ,(select count(*) as unitCount from {$this->_table['lms_correct_unit_assignment']} where CorrectIdx = cu.CorrectIdx) as UnitCount
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lms_correct_unit']} AS cu
            INNER JOIN {$this->_table['lms_product']} AS p ON cu.ProdCode = p.ProdCode
            INNER JOIN (
                SELECT 
                cu.CorrectIdx, GROUP_CONCAT(cu.MemCnt) AS MemCnt, GROUP_CONCAT(cu.RegDatm) AS RegDatm
                , GROUP_CONCAT(b.AdminName) AS RegAdminName
                FROM {$this->_table['lms_correct_assign']} AS cu
                INNER JOIN {$this->_table['lms_btob_admin']} AS b ON cu.RegAdminIdx = b.AdminIdx
                {$where}
                GROUP BY cu.CorrectIdx
            ) AS ca ON cu.CorrectIdx = ca.CorrectIdx
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원배정 처리
     * @param array $input
     * @return array|bool
     */
    public function addAssign($input=[])
    {
        $this->_conn->trans_begin();
        try {
            $memList = $this->btobCorrectModel->getUnitMember(false, element('search_correct_idx', $input));

            if (empty($memList) === true) {
                throw new \Exception('배정할 회원이 존재하지 않습니다.');
            }

            $MemCnt = element('MemCnt',$input,0);
            $wAdminIdx = element('wAdminIdx',$input);
            $eachCnt = element('eachCnt',$input);

            //tm 배정 테이블
            $tm_data = [
                'ProdCode' => element('search_prod_code',$input),
                'CorrectIdx' => element('search_correct_idx',$input),
                'MemCnt' => $MemCnt,
                'RegAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($tm_data)->insert($this->_table['lms_correct_assign']) === false) {
                throw new \Exception('회원 배정 등록에 실패했습니다.');
            }

            $CaIdx = $this->_conn->insert_id();

            //echo var_dump($memList);exit;

            $total_cnt = $MemCnt;
            $start_cnt = 0;
            for($i=0;$i<count($wAdminIdx);++$i){

                $input_data = [
                    'CaIdx' => $CaIdx,
                    'AssignAdminIdx' => $wAdminIdx[$i],
                ];

                $start_cnt = $MemCnt - $total_cnt;
                $end_cnt = $start_cnt + $eachCnt[$i];

                for($k=$start_cnt;$k<$end_cnt;$k++) {
                    $input_data = array_merge($input_data,[
                        'CuaIdx' => $memList[$k]['CuaIdx']
                    ]);

                    if($this->_conn->set($input_data)->insert($this->_table['lms_correct_assign_detail']) === false) {
                        throw new \Exception("회원 배정시 오류가 발생되었습니다.");
                    }
                    $total_cnt -= 1;
                    //echo $this->_conn->last_query().'\n\n';
                }
            }
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $CaIdx];
    }

    /**
     * 배정내역
     * @param string $column
     * @param string $correct_idx
     * @param array $order_by
     * @return mixed
     */
    public function findCorrectAssign($column = '*', $correct_idx = '', $order_by = [])
    {
        $arr_condition = [
            'EQ' => [
                'ca.CorrectIdx' => $correct_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $from = "
            FROM {$this->_table['lms_correct_assign']} AS ca
            INNER JOIN {$this->_table['lms_btob_admin']} AS a ON ca.RegAdminIdx = a.AdminIdx
        ";

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 배정상세내역
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCorrectAssign($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                p.ProdName, cu.Title, m.MemName, m.MemId, CONCAT(m.Phone1,'****',m.Phone3) AS Phone, a.AdminName, a.RegDatm
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lms_correct_assign']} AS ca
            INNER JOIN {$this->_table['lms_correct_assign_detail']} AS cad ON ca.CaIdx = cad.CaIdx
            INNER JOIN {$this->_table['lms_correct_unit_assignment']} AS cua ON cad.CuaIdx = cua.CuaIdx
            INNER JOIN {$this->_table['lms_correct_unit']} AS cu ON ca.CorrectIdx = cu.CorrectIdx
            INNER JOIN {$this->_table['lms_product']} AS p ON ca.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['lms_member']} AS m ON cua.MemIdx = m.MemIdx
            INNER JOIN {$this->_table['lms_btob_admin']} AS a ON cad.AssignAdminIdx = a.AdminIdx
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function deleteForAssignment($idx)
    {
        $this->_conn->trans_begin();
        try {
            $cua_idx = $idx;
            $admin_idx = $this->session->userdata('btob.admin_idx');
            $result = $this->_findUnitAssignMentData($cua_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $is_update = $this->_conn->set([
                'IsReply' => 'N',
                'IsStatus' => 'N',
                'UpdAdminIdx' => $admin_idx,
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ])->where('CuaIdx', $cua_idx)->where('IsStatus', 'Y')->where('AssignmentStatusCcd', '698002')->update($this->_table['lms_correct_unit_assignment']);

            if ($is_update === false) {
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
     * 단일 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findUnitAssignMentData($idx)
    {
        $column = 'CuaIdx';
        $from = "
            FROM {$this->_table['lms_correct_unit_assignment']}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'CuaIdx' => $idx,
                'AssignmentStatusCcd' => '698002',
                'IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }
}