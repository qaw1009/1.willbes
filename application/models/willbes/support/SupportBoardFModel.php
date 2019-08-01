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
     * @param $cate_code
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoard($is_count, $arr_condition=[], $cate_code, $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                                'FileIdx', BoardFileIdx,				
                                'FileType', AttachFiletype,
                                'FilePath', AttachFilePath,
                                'FileName', AttachFileName,
                                'RealName', AttachRealFileName,
                                'Filesize', AttachFileSize
                            )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['board_2']}
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= $this->addDefWhereOfCampus();

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where;
        $set_query .= ') AS m ';
        $set_query .= $order_by_offset_limit;
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 사이트 그룹에 속한 게시판 글 목록
     * @param $is_count
     * @param $site_code
     * @param $cate_code
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForSiteGroup($is_count, $site_code, $cate_code, $arr_condition=[], $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                                'FileIdx', BoardFileIdx,				
                                'FileType', AttachFiletype,
                                'FilePath', AttachFilePath,
                                'FileName', AttachFileName,
                                'RealName', AttachRealFileName,
                                'Filesize', AttachFileSize
                            )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['board_2']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= $this->addDefWhereOfCampus();

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where;
        $set_query .= ') AS m ';
        $set_query .= $order_by_offset_limit;
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 캠퍼스별 게시판 목록
     * @param array $arr_condition
     * @param int $limit
     * @return mixed
     */
    public function listBoardByCampus($arr_condition = [], $limit = 2)
    {
        $column = 'ROW_NUMBER() OVER (PARTITION BY CampusCcd ORDER BY b.IsBest DESC, b.BoardIdx DESC) AS RowNum
            , b.BoardIdx, b.SiteCode, b.Title, b.IsBest, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') AS RegDatm
            , CampusCcd';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= $this->addDefWhereOfCampus();

        $query = /** @lang text */ '
            select * from (
                select ' . $column . ' from ' . $this->_table['board_2'] . $where . '
            ) U
            where RowNum < ? 
            ORDER BY IsBest DESC, BoardIdx DESC';

        // 쿼리 실행
        $query = $this->_conn->query($query, [$limit + 1]);

        return $query->result_array();
    }

    public function listBoardForProf($is_count, $site_code, $prof_idx, $arr_condition=[], $cate_code, $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                                'FileIdx', BoardFileIdx,				
                                'FileType', AttachFiletype,
                                'FilePath', AttachFilePath,
                                'FileName', AttachFileName,
                                'RealName', AttachRealFileName,
                                'Filesize', AttachFileSize
                            )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['board_2']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            
            INNER JOIN (
                SELECT ProfIdx
                FROM {$this->_table['lms_professor']}
                WHERE wProfIdx = (
                    SELECT wProfIdx
                    FROM {$this->_table['lms_professor']}
                    WHERE ProfIdx = '{$prof_idx}'
                )
            ) AS p ON b.ProfIdx = p.ProfIdx
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= $this->addDefWhereOfCampus();

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
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
        $column = $column . ',b.BoardIsComment';

        $result = $this->_conn->getListResult($this->_table['board_find'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();exit;
        return element('0', $result, []);
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
    public function findBoardForSiteGroup($site_code, $cate_code, $board_idx, $arr_condition=[], $column='*', $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $from = "
            FROM {$this->_table['board_find']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            LEFT JOIN lms_product AS p ON b.ProdCode = p.ProdCode
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }

    public function findBoardForProf($site_code, $prof_idx, $board_idx, $arr_condition=[], $column='*', $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $from = "
            FROM {$this->_table['board_find']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            
            INNER JOIN (
                SELECT ProfIdx
                FROM {$this->_table['lms_professor']}
                WHERE wProfIdx = (
                    SELECT wProfIdx
                    FROM {$this->_table['lms_professor']}
                    WHERE ProfIdx = '{$prof_idx}'
                )
            ) AS p ON b.ProfIdx = p.ProfIdx
            
            LEFT JOIN lms_product AS p ON b.ProdCode = p.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }

    public function listBoardForTpass($site_code, $cate_code, $is_count, $arr_condition_board = [], $arr_condition_pkg = [], $arr_condition_auth = [], $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                                'FileIdx', BoardFileIdx,				
                                'FileType', AttachFiletype,
                                'FilePath', AttachFilePath,
                                'FileName', AttachFileName,
                                'RealName', AttachRealFileName,
                                'Filesize', AttachFileSize
                            )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $query_string = $this->_makePackageQueryString($arr_condition_pkg, $arr_condition_auth);
        $from = "
            FROM {$this->_table['board_2']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            
            INNER JOIN (
                {$query_string}
            ) AS p ON b.ProdCode = p.ProdCode
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition_board = array_merge($arr_condition_board,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition_board);
        $where = $where->getMakeWhere(false);
        $where .= $this->addDefWhereOfCampus();

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findBoardForTpass($site_code, $board_idx, $arr_condition_board = [], $arr_condition_pkg = [], $arr_condition_auth = [], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition_board = array_merge_recursive($arr_condition_board,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $query_string = $this->_makePackageQueryString($arr_condition_pkg, $arr_condition_auth);

        $from = "
            FROM {$this->_table['board_find']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            
            INNER JOIN (
                {$query_string}
            ) AS p ON b.ProdCode = p.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition_board);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }

    /**
     * 수강중인 패키지 강좌
     * @param array $arr_condition
     * @param array $arr_condition_auth
     * @return array
     */
    public function getPackageArray($arr_condition = [], $arr_condition_auth = [])
    {
        $query_string = $this->_makePackageQueryString($arr_condition, $arr_condition_auth);
        $result = $this->_conn->query($query_string)->result_array();
        return array_pluck($result, 'ProdName', 'ProdCode');
    }

    /**
     * 수강중인강좌, 권한부여된 회원 정보
     * @param array $arr_condition
     * @param array $arr_condition_auth
     * @return string
     */
    private function _makePackageQueryString($arr_condition = [], $arr_condition_auth = [])
    {
        $where_mylecture = $this->_conn->makeWhere($arr_condition);
        $where_mylecture = $where_mylecture->getMakeWhere(false);

        $where_auth = $this->_conn->makeWhere($arr_condition_auth);
        $where_auth = $where_auth->getMakeWhere(false);

        $column = 'STRAIGHT_JOIN DISTINCT ProdCode, ProdName';
        $from = "
            FROM {$this->_table['mylecture_pkg']}
            {$where_mylecture}
            AND MemIdx = '{$this->session->userdata('mem_idx')}'
            AND IsTpass = 'Y'
            UNION
            SELECT a.ProdCode, b.ProdName
            FROM {$this->_table['board_tpass_member_authority']} AS a
            INNER JOIN lms_product AS b ON a.ProdCode = b.ProdCode
            {$where_auth}
            AND a.MemIdx = '{$this->session->userdata('mem_idx')}'
        ";

        return 'select '.$column . $from;
    }
}