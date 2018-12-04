<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardTpassModel extends BoardModel
{
    private $_table_board_tpass_member_authority = 'lms_board_tpass_member_authority';

    /**
     * 자료실권한부여 회원 목록
     * @param $is_count
     * @param array $target_condition
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return mixed
     */
    public function listAllBoardForTpassMemberAuthority($is_count, $target_condition = [], $arr_condition = [], $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if ($is_count === true) {
            $column = 'STRAIGHT_JOIN count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $target_query_where = $this->_conn->makeWhere($target_condition);
        $target_query_where = $target_query_where->getMakeWhere(false);

        $from = "
        FROM (
            SELECT BtmaIdx, MemIdx, ValidStartDate, ValidEndDate, ValidDay, ValidReason, IsValid, RegDatm, RegAdminIdx, RetireDatm, RetireAdminIdx
            FROM {$this->_table_board_tpass_member_authority}
            {$target_query_where}
        ) AS a
        INNER JOIN {$this->_table_member} AS b ON a.MemIdx = b.MemIdx
        INNER JOIN {$this->_table_sys_admin} AS c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        LEFT OUTER JOIN {$this->_table_sys_admin} AS d ON a.RetireAdminIdx = d.wAdminIdx AND d.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원 부여된 권한 목록
     * @param array $arr_condition
     * @param $column
     * @return mixed
     */
    public function listAuthorityMember($arr_condition = [], $column)
    {
        $from = "
            FROM {$this->_table_board_tpass_member_authority} AS a
            INNER JOIN {$this->_table_member} AS b ON a.MemIdx = b.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    public function addMemberAuthority($input, $prod_code)
    {
        $this->_conn->trans_begin();
        try {
            $up_data_count = 0;
            $arr_intersect_member = [];
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $arr_condition = [
                'EQ' => [
                    'a.SiteCode' => element('site_code', $input),
                    'a.ProdCode' => $prod_code,
                    'a.ProfIdx' => element('prof_idx', $input),
                    'a.IsValid' => 'Y',
                    'a.IsStatus' => 'Y'
                ],
                'IN' => [
                    'a.MemIdx' => element('mem_idx', $input)
                ]
            ];
            $chk_member_list = $this->listAuthorityMember($arr_condition, 'a.MemIdx, b.MemName');
            $arr_chk_member_list = array_pluck($chk_member_list, 'MemName', 'MemIdx');

            $arr_mem_idx = array_flip(element('mem_idx', $input, []));

            $set_mem_idx = array_diff_key($arr_mem_idx, $arr_chk_member_list);  //등록된회원정보제거
            $up_data_count = count($set_mem_idx);   //등록할회원수
            $arr_intersect_member = array_intersect_key($arr_chk_member_list, $arr_mem_idx);   //제거된회원정보 memidx, memname

            if ($up_data_count <= 0) {
                throw new \Exception('권한부여할 회원이 없습니다. 다시 시도해주세요.');
            }

            foreach ($set_mem_idx as $key => $val) {
                //insert
                $data = [
                    'SiteCode' => element('site_code', $input),
                    'ProdCode' => $prod_code,
                    'ProfIdx' => element('prof_idx', $input),
                    'MemIdx' => $key,
                    'ValidStartDate' => element('valid_start_date', $input),
                    'ValidDay' => element('valid_days', $input),
                    'ValidReason' => element('valid_reason', $input),
                    'RegAdminIdx' => $sess_admin_idx,
                    'RegIp' => $reg_ip
                ];
                $this->_conn->set($data)->set('ValidEndDate', 'date_add("'.element('valid_start_date', $input).'", interval '.element('valid_days', $input).' - 1 day)', false);
                if ($this->_conn->insert($this->_table_board_tpass_member_authority) === false) {
                    throw new \Exception('권한부여 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return array(error_result($e), $up_data_count, $arr_intersect_member);
        }

        return array(true, $up_data_count, $arr_intersect_member);
    }

    /**
     * 회원 권한 수정
     * @param $input
     * @return array|bool
     */
    public function modifyMemberAuthority($input)
    {
        $this->_conn->trans_begin();
        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $arr_target_id = json_decode(element('params', $input));

            $set_data = [
                'IsValid' => element('is_authority', $input),
                'RetireDatm' => date('Y-m-d H:i:s'),
                'RetireAdminIdx' => $sess_admin_idx
            ];

            $this->_conn-> set($set_data)->where_in('BtmaIdx',$arr_target_id);

            if($this->_conn->update($this->_table_board_tpass_member_authority)=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return array(error_result($e));
        }

        return true;
    }
}