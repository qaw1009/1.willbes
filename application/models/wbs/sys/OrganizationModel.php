<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganizationModel extends WB_Model
{
    private $_table = [
        'organization' => 'wbs_sys_organization',
        'admin_r_organization' => 'wbs_sys_admin_r_organization'
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
            // TODO: 트리 루트명 가져오기 Depth4까지 고정. 추후 더 좋은 방법 있으면 개선 필요.
            $column = "
                ORG.*,
                FLOOR(CHAR_LENGTH(ORG.wOrgCode) / 2) AS Depth,
                LEFT(ORG.wOrgCode, CHAR_LENGTH(ORG.wOrgCode)-2) AS ParentOrgCode,
                CONCAT(
                    IF(DEP4.wOrgCode IS NULL, '', CONCAT(DEP4.wOrgName, ' > ')),
                    IF(DEP3.wOrgCode IS NULL, '', CONCAT(DEP3.wOrgName, ' > ')),
                    IF(DEP2.wOrgCode IS NULL, '', CONCAT(DEP2.wOrgName, ' > ')),
                    IF(DEP1.wOrgCode IS NULL, '', CONCAT(DEP1.wOrgName, ' > ')),
                    ORG.wOrgName
                ) AS OrgRouteName                
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table['organization']} ORG
            LEFT OUTER JOIN {$this->_table['organization']} DEP1 ON LEFT(ORG.wOrgCode, CHAR_LENGTH(ORG.wOrgCode)-2) = DEP1.wOrgCode AND DEP1.wIsUse = 'Y' AND DEP1.wIsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['organization']} DEP2 ON LEFT(DEP1.wOrgCode, CHAR_LENGTH(DEP1.wOrgCode)-2) = DEP2.wOrgCode AND DEP2.wIsUse = 'Y' AND DEP2.wIsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['organization']} DEP3 ON LEFT(DEP2.wOrgCode, CHAR_LENGTH(DEP2.wOrgCode)-2) = DEP3.wOrgCode AND DEP3.wIsUse = 'Y' AND DEP3.wIsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['organization']} DEP4 ON LEFT(DEP3.wOrgCode, CHAR_LENGTH(DEP3.wOrgCode)-2) = DEP4.wOrgCode AND DEP4.wIsUse = 'Y' AND DEP4.wIsStatus = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 다음 조직 정렬순서값 조회
     * @param $parent_org_code
     * @return int
     */
    public function getNewOrgCode($parent_org_code)
    {
        $column = "
            IFNULL(MAX(LPAD((ORG.wOrgCode+1), CHAR_LENGTH(ORG.wOrgCode), '0')), CONCAT('{$parent_org_code}', '01')) AS NewOrgCode,
            IFNULL(MAX(ORG.wOrderNum)+1, '1') AS NewOrderNum
        ";
        $from = "
            FROM {$this->_table['organization']} ORG
        ";
        $arr_condition = ['RAW' => ["CHAR_LENGTH(ORG.wOrgCode) " => " (CHAR_LENGTH('{$parent_org_code}') + 2)"], 'LKR' => ['ORG.wOrgCode' => $parent_org_code]];
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
                'wOrgCode' => element('org_code', $input),
                'wOrgName' => element('org_name', $input),
                'wOrgDesc' => element('org_desc', $input),
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
            $org_idx = element('org_idx', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'wOrgCode' => element('org_code', $input),
                'wOrgName' => element('org_name', $input),
                'wOrgDesc' => element('org_desc', $input),
                'wOrderNum' => element('order_num', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $admin_idx
            ];

            $this->_conn->set($data)->where('wOrgIdx', $org_idx);
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

    /**
     * 조직 관리자 연결 등록
     * @param array $input
     * @return array|bool
     */
    public function addAdminRelationOrganization($input = [])
    {
        try {
            $data = [
                'wAdminIdx' => element('wAdminIdx', $input),
                'wOrgCode' => element('wOrgCode', $input),
                'wIsStatus' => 'Y'
            ];

            // 조직 관리자 연결 등록
            if ($this->_conn->set($data)->insert($this->_table['admin_r_organization']) === false) {
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
            $where = [];
            if(empty(element('wArgIdx', $input)) === false) {
                $where = array_merge($where, ['wArgIdx' => element('wArgIdx', $input)]);
            }
            if(empty(element('wAdminIdx', $input)) === false) {
                $where = array_merge($where, ['wAdminIdx' => element('wAdminIdx', $input)]);
            }
            if(empty($where) === true) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            // 조직 관리자 연결 삭제
            if ($this->_conn->set('wIsStatus', 'N')->where($where)->update($this->_table['admin_r_organization']) === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
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
                ORG.*,
                FLOOR(CHAR_LENGTH(ORG.wOrgCode) / 2) AS Depth,
                LEFT(ORG.wOrgCode, CHAR_LENGTH(ORG.wOrgCode)-2) AS ParentOrgCode
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
        
            FROM {$this->_table['admin_r_organization']} ARO
            LEFT OUTER JOIN {$this->_table['organization']} ORG ON ARO.wOrgCode = ORG.wOrgCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}