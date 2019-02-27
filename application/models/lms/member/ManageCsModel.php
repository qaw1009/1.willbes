<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCsModel extends WB_Model
{
    private $_table = [
        'member_cs' => 'lms_member_cs',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function list($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['member_cs']} AS a
            INNER JOIN {$this->_table['site']} as b ON a.SiteCode = b.SiteCode
            INNER JOIN {$this->_table['sys_admin']} as c ON a.RegAdminIdx = c.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sys_admin']} as d ON a.UpdAdminIdx = d.wAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * CS 상담 내용 저장
     * @param $input_data
     * @return array|bool
     */
    public function addMemberCs($input_data)
    {
        $this->_conn->trans_begin();
        try {
            $inputData = [
                'MemIdx' => element('regi_memIdx', $input_data),
                'SiteCode' => element('regi_site_code', $input_data),
                'CsGroupCcd' => element('regi_group_cs_ccd', $input_data),
                'CsCcd' => element('regi_cs_ccd', $input_data),
                'IsSuccess' => element('regi_is_success', $input_data),
                'Content' => element('regi_content', $input_data),
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($inputData)->insert($this->_table['member_cs']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * CS 상담 내용 수정
     * @param array $input_data
     * @param $idx
     * @return array|bool
     */
    public function modifyMemberCs($input_data = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $inputData = [
                'SiteCode' => element('regi_site_code', $input_data),
                'CsGroupCcd' => element('regi_group_cs_ccd', $input_data),
                'CsCcd' => element('regi_cs_ccd', $input_data),
                'IsSuccess' => element('regi_is_success', $input_data),
                'Content' => element('regi_content', $input_data),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];

            $result = $this->_findMemberCsData($idx);
            if (empty($result)) {
                throw new \Exception('조회된 데이터가 없습니다.');
            }

            // update
            $this->_conn->set($inputData)->where('CsIdx', $idx);
            if ($this->_conn->update($this->_table['member_cs']) === false) {
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
     * @param $idx
     * @return mixed
     */
    private function _findMemberCsData($idx)
    {
        $column = 'CsIdx';
        $from = "
            FROM {$this->_table['member_cs']}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'CsIdx' => $idx
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }
}