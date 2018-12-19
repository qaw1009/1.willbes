<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthorModel extends WB_Model
{
    private $_table = [
        'author' => 'wbs_bms_author',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 저자 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAuthor($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'AU.wAuthorIdx, AU.wAuthorName, AU.wAuthorDesc, AU.wIsUse, AU.wRegDatm, AU.wRegAdminIdx, A.wAdminName as wRegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['author'] . ' as AU
                left join ' . $this->_table['admin'] . ' as A 
                    on AU.wRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y" 
            where AU.wIsStatus = "Y"  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 저자 코드 목록 조회
     * @return array
     */
    public function getAuthorArray()
    {
        $data = $this->_conn->getListResult($this->_table['author'], 'wAuthorIdx, wAuthorName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wAuthorName' => 'asc'
        ]);

        return array_pluck($data, 'wAuthorName', 'wAuthorIdx');
    }

    /**
     * 저자 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findAuthor($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['author'], $column, $arr_condition);
    }

    /**
     * 저자 수정 폼에 필요한 데이터 조회
     * @param $author_idx
     * @return array
     */
    public function findAuthorForModify($author_idx)
    {
        $column = 'AU.wAuthorIdx, AU.wAuthorName, AU.wAuthorDesc, AU.wIsUse, AU.wRegDatm, AU.wRegAdminIdx, AU.wUpdDatm, AU.wUpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = AU.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(AU.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = AU.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table['author'] . ' as AU', $column, [
            'EQ' => ['AU.wAuthorIdx' => $author_idx, 'AU.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 저자 등록
     * @param array $input
     * @return array|bool
     */
    public function addAuthor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wAuthorName' => element('author_name', $input),
                'wAuthorDesc' => element('author_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['author']) === false) {
                throw new \Exception('저자 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;        
    }

    /**
     * 저자 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyAuthor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $author_idx = element('idx', $input);

            // 기존 저자 정보 조회
            $row = $this->findAuthorForModify($author_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 백업 데이터 등록
            $this->addBakData($this->_table['author'], ['wAuthorIdx' => $author_idx]);

            // 데이터 등록
            $data = [
                'wAuthorName' => element('author_name', $input),
                'wAuthorDesc' => element('author_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->set($data)->where('wAuthorIdx', $author_idx)->update($this->_table['author']) === false) {
                throw new \Exception('저자 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
