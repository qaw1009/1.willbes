<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/support/BaseSupportFModel.php';

class SupportBoardFModel extends BaseSupportFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 게시판 글 목록 추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listBoard($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        $column = ($is_count === true) ? $is_count :  $column;
        $result = $this->_conn->getListResult($this->_table['board'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 게시글 조회
     * @param $board_idx
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findBoard($board_idx,$arr_condition=[],$column='*',$limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);
        $result = $this->_conn->getListResult($this->_table['board'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();exit;
        return element('0', $result, []);
    }

    /**
     * 사이트 그룹에 속한 게시판 글 목록
     * @param $is_count
     * @param $site_code
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForSiteGroup($is_count, $site_code, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['board']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 사이트 그룹에 속한 게시글 조회
     * @param $site_code
     * @param $board_idx
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findBoardForSiteGroup($site_code, $board_idx, $arr_condition=[], $column='*', $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $from = "
            FROM {$this->_table['board']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }
}