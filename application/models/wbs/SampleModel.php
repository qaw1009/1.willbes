<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SampleModel extends WB_Model
{
    private $_table = 'sample';

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 샘플 목록 데이터 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSample($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = ($is_count === true) ? $is_count :  'idx, name, title, regi_date';

        //return $this->getListResult($this->_table, $column, $arr_condition, $limit, $offset, $order_by);
        return $this->_conn->getListResult($this->_table, $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 샘플 목록 데이터 조회 (makeWhere 활용)
     * @param array $arr_condition
     * @return array
     */
    public function listSampleByMakeWhere($arr_condition = [])
    {
        $query = $this->_conn->makeWhere($arr_condition)->from($this->_table)->select('idx, name, title, regi_date')->order_by('idx', 'desc');

        return $query->get()->result_array();
    }

    /**
     * 샘플 목록 데이터 조회 (bindQuery 활용)
     * @return mixed
     */
    public function listSampleByPDO()
    {
        $query = 'select idx, name, title, regi_date from ' . $this->_table . ' where regi_date between :start_date and :end_date';
        $params = [
            ':start_date' => '2018-01-01 00:00:00', ':end_date' => '2018-12-31 23:59:59'
        ];

        $stmt = $this->_conn->bindQuery($query, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 샘플 목록 데이터 조회 (makeQuery 활용)
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSampleByMakeQuery($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = ($is_count === true) ? $is_count :  'idx, name, title, regi_date';

        $query = $this->_conn->makeQuery($this->_table, $column, $arr_condition, $limit, $offset, $order_by);

        return ($column === true) ? $query->count_all_results() : $query->get()->result_array();
    }

    /**
     * 샘플 데이터 조회 by idx
     * @param $idx
     * @param string $column
     * @return array
     */
    public function findSampleByIdx($idx, $column = '')
    {
        $column = (empty($column) === true) ? 'idx, name, title, regi_date' : $column;

        return $this->_conn->getFindResult($this->_table, $column, [
            'EQ' => ['idx' => $idx]
        ]);
    }

    /**
     * 샘플 데이터 등록
     * @param array $input
     * @return bool|string
     */
    public function addSample($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'name' => element('name', $input),
                'title' => element('title', $input),
                'content' => element('content', $input)
            ];
            $this->_conn->set($data)->set('regi_date', 'NOW()', false);

            if ($this->_conn->insert($this->_table) === false) {
                throw new \Exception('데이터 등록에 실패했습니다.');
            }

            $this->load->library('upload');
            $results = $this->upload->uploadFile('img', ['attach_file', 'user_file'], [], SUB_DOMAIN . '/sample/' . date('Ymd'));
            if (is_array($results) === false) {
                throw new \Exception($results);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 샘플 데이터 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySample($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'name' => element('name', $input),
                'title' => element('title', $input),
                'content' => element('content', $input)
            ];
            $this->_conn->set($data)->set('upd_date', 'NOW()', false);
            $this->_conn->where('idx', element('idx', $input));

            if ($this->_conn->update($this->_table) === false) {
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
     * 샘플 데이터 삭제
     * @param $idx
     * @return array|bool
     */
    public function removeSample($idx)
    {
        $this->_conn->trans_begin();

        try {
            $data = $this->findSampleByIdx($idx);
            if (count($data) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', 404);
            }

            $is_delete = $this->_conn->delete($this->_table, ['idx' => $idx]);
            if ($is_delete !== true) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}