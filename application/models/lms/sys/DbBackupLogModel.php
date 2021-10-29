<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbBackupLogModel extends WB_Model
{

    private $_table = [
        'backup' => 'lms_sys_table_backup_data',
        'admin' => 'wbs_sys_admin',
        'table_schema' => 'information_schema.tables',
        'column_schema' => 'information_schema.columns'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 테이블명, 클래스명 추출
     * @param string $type
     * @return mixed
     */
    public function listSearchCondition($type = '')
    {
        if($type === 'table') {
            $column = 'tbd.TableName, sch.TABLE_COMMENT';
            $order_by = ' order by tbd.TableName';
        } else {
            $column = 'tbd.ExecClass';
            $order_by = ' order by tbd.ExecClass';
        }

        $group_by = ' group by ' . $column;

        $from = '
                from 
                    '. $this->_table['backup'].' tbd
                    left join '. $this->_table['table_schema'] .' sch on tbd.TableName = sch.TABLE_NAME
            ';
        return $this->_conn->query('select ' . $column . $from . $group_by . $order_by)->result_array();
    }

    /**
     * 백업데이터 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBackupLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = null;
        } else {
            $column = 'tbd.*
                            ,(SELECT sch.TABLE_COMMENT FROM '. $this->_table['table_schema'] .' sch WHERE tbd.TableName = sch.TABLE_NAME ) AS TableComment
                            ,wsa.wAdminId as RegId, wsa.wAdminName as RegAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                from 
                    '. $this->_table['backup'].' tbd
                    left join '. $this->_table['admin'] .' wsa on tbd.RegAdminIdx = wsa.wAdminIdx
            ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from .$where . $order_by_offset_limit);
        return ($is_count) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 백업데이터 상세
     * @param $arr_condition
     * @return mixed
     */
    public function findBackupLog($arr_condition)
    {
        $result = $this->listBackupLog(false, $arr_condition);
        return empty($result) ? $result : $result[0];
    }

    /**
     * 컬럼명 추출
     * @param $table_name
     * @return array
     */
    public function listColumnNameComment($table_name)
    {
        $result = $this->_conn->query('select '.' Column_name, Column_comment from '. $this->_table['column_schema'].' where  TABLE_NAME = "'. $table_name.'"')->result_array();
        return array_pluck($result, 'Column_comment', 'Column_name');
    }

    /**
     * 관리자명 추출
     * @param array $arr_condition
     * @return array
     */
    public function listAdminName($arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $result = $this->_conn->query('select '.'wAdminIdx, wAdminName from '.$this->_table['admin'] . ' where wIsStatus="Y" '. $where)->result_array();
        return array_pluck($result, 'wAdminName', 'wAdminIdx');
    }

}