<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganizationModel extends WB_Model
{
    private $_table = [
        'organization' => 'wbs_sys_organization'
    ];

    public function __construct()
    {
        parent::__construct('wbs');
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
    public function listOrganization($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                ORZ.*,
                FLOOR(CHAR_LENGTH(ORZ.wOrzCode) / 2) AS Depth,
                LEFT(ORZ.wOrzCode, CHAR_LENGTH(ORZ.wOrzCode)-2) AS ParentOrzCode
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['organization']} ORZ
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 다음 조직 정렬순서값 조회
     * @param $parent_orz_code
     * @return int
     */
    public function getNewOrzCode($parent_orz_code)
    {
        $column = "
            IFNULL(MAX(LPAD((ORZ.wOrzCode+1), CHAR_LENGTH(ORZ.wOrzCode), '0')), CONCAT('{$parent_orz_code}', '01')) AS NewOrzCode,
            IFNULL(MAX(ORZ.wOrderNum)+1, '1') AS NewOrderNum
        ";
        $from = "
            FROM {$this->_table['organization']} ORZ
        ";
        $arr_condition = ['RAW' => ["CHAR_LENGTH(ORZ.wOrzCode) " => " (CHAR_LENGTH('{$parent_orz_code}') + 2)"], 'LKR' => ['ORZ.wOrzCode' => $parent_orz_code]];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy()->getMakeOrderBy();

        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return $query->row_array();
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
            $admin_idx = $this->session->userdata('admin_idx');
            $data = [
                'wOrzCode' => element('orz_code', $input),
                'wOrzName' => element('orz_name', $input),
                'wOrzDesc' => element('orz_desc', $input),
                'wOrderNum' => element('order_num', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $admin_idx
            ];

            // 조직 등록
            if ($this->_conn->set($data)->insert($this->_table['organization']) === false) {
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
            $orz_idx = element('orz_idx', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'wOrzCode' => element('orz_code', $input),
                'wOrzName' => element('orz_name', $input),
                'wOrzDesc' => element('orz_desc', $input),
                'wOrderNum' => element('order_num', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $admin_idx
            ];

            $this->_conn->set($data)->where('wOrzIdx', $orz_idx);
            if ($this->_conn->update($this->_table['organization']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}