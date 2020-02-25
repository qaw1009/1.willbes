<?php
namespace app\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

trait QueryBuilder
{
    /**
     * where 조건 생성 쿼리 빌더
     * @param array $conditions
     * @param bool $is_and
     * @param $is_escape
     * @return \CI_DB_query_builder|$this
     */
    public function makeWhere($conditions = [], $is_and = true, $is_escape = true)
    {
        if (is_array($conditions) === true && empty($conditions) === false) {
            foreach ($conditions as $key => $arr) {
                if (substr($key, 0 ,3) == 'ORG') {
                    // or 조건이 있는 그룹
                    $this->group_start();
                    $this->makeWhere($arr, false, $is_escape);
                    $this->where('1', 1);
                    $this->group_end();
                } else {
                    if (is_array($arr) && count($arr) > 0) {
                        foreach ($arr as $col => $val) {
                            if ($key == 'IN') {
                                $this->makeWhereIn($col, $val, false, $is_and, $is_escape);
                            } elseif ($key == 'NOTIN') {
                                $this->makeWhereIn($col, $val, true, $is_and, $is_escape);
                            } elseif ($key == 'BET' || $key == 'BDT') {
                                $this->makeWhereBetween($col, $val, $key, $is_and, $is_escape);
                            } elseif ($key == 'RAW') {
                                $this->makeWhereRaw($col, $val, $is_and);
                            } else {
                                if (substr($key, 0 ,2) == 'LK') {
                                    $this->makeWhereLike($col, $val, $key, $is_and, $is_escape);
                                } else {
                                    $this->makeWhereOperator($col, $val, $key, $is_and, $is_escape);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this;
    }

    /**
     * 연산자 조건 생성
     * @param string $column
     * @param string $value
     * @param string $type
     * @param bool $is_and
     * @param bool $is_escape
     * @return $this
     */
    public function makeWhereOperator($column, $value, $type = 'EQ', $is_and = true, $is_escape = true)
    {
        $operators = ['EQ' => '=', 'NOT' => '!=', 'GT' => '>', 'GTE' => '>=', 'LT' => '<', 'LTE' => '<='];

        if (is_null($value) === false && strlen($value) > 0 && isset($operators[$type]) === true) {
            $method = ($is_and === true) ? 'where' : 'or_where';
            $this->{$method}($column . $operators[$type], $value, $is_escape);
        }

        return $this;
    }

    /**
     * between 조건 생성
     * @param string $column
     * @param array $values
     * @param string $type
     * @param bool $is_and
     * @param bool $is_escape
     * @return $this
     */
    public function makeWhereBetween($column, $values = [], $type = 'BET', $is_and = true, $is_escape = true)
    {
        if (is_array($values) === true && count($values) == 2 && empty($values[0]) === false && empty($values[1]) === false) {
            if ($type == 'BDT') {
                $values[0] = $values[0] . ' 00:00:00';
                $values[1] = $values[1] . ' 23:59:59';
            }

            $is_and === false && $this->or_group_start();   // between 조건이 2개 이상 or 조건으로 연결될 경우
            $this->makeWhereOperator($column, $values[0], 'GTE', true, $is_escape);
            $this->makeWhereOperator($column, $values[1], 'LTE', true, $is_escape);
            $is_and === false && $this->group_end();
        }

        return $this;
    }

    /**
     * in 조건 생성
     * @param string $column
     * @param array $values
     * @param bool $is_not
     * @param bool $is_and
     * @param bool $is_escape
     * @return $this
     */
    public function makeWhereIn($column, $values = [], $is_not = false, $is_and = true, $is_escape = true)
    {
        if (is_array($values) && count($values) > 0) {
            if ($is_not === true) {
                $method = ($is_and === true) ? 'where_not_in' : 'or_where_not_in';
            } else {
                $method = ($is_and === true) ? 'where_in' : 'or_where_in';
            }
            $this->{$method}($column, $values, $is_escape);
        }

        return $this;
    }

    /**
     * like 조건 생성
     * @param string $column
     * @param string $value
     * @param string $type
     * @param bool $is_and
     * @param bool $is_escape
     * @return $this
     */
    public function makeWhereLike($column, $value, $type = 'LKB', $is_and = true, $is_escape = true)
    {
        $sides = ['LKL' => 'before', 'LKR' => 'after', 'LKB' => 'both'];

        if (is_null($value) === false && strlen($value) > 0 && isset($sides[$type]) === true) {
            $method = ($is_and === true) ? 'like' : 'or_like';
            $this->{$method}($column, $value, $sides[$type], $is_escape);
        }

        return $this;
    }

    /**
     * 쿼리 형식으로 조회 조건 생성 (escape 처리 안함), ex) ['RAW' => ['col = ' => 'value']]
     * @param string $column [컬럼명과 연산 기호를 같이 지정, ex) col =, col in, col like, col is ...]
     * @param string $value [연산 기회 뒤의 값, ex) 1, ('1', '2', '3'), '1%', not null ...]
     * @param bool $is_and
     * @return $this
     */
    public function makeWhereRaw($column, $value, $is_and = true)
    {
        if (is_null($value) === false && strlen($value) > 0) {
            $method = ($is_and === true) ? 'where' : 'or_where';
            $this->{$method}($column, $value, false);
        }

        return $this;
    }

    /**
     * order by 쿼리 빌더
     * @param array $order_by
     * @return \CI_DB_query_builder|$this
     */    
    public function makeOrderBy($order_by = [])
    {
        if(is_array($order_by) && count($order_by) > 0) {
            foreach($order_by as $orderby => $direction){
                $this->order_by($orderby, $direction);
            }
        }        
        
        return $this;
    }

    /**
     * limit, offset 쿼리 빌더
     * @param null|int $limit
     * @param null|int $offset
     * @return $this
     */
    public function makeLimitOffset($limit = null, $offset = null)
    {
        if(is_null($limit) === false) {
            $this->limit($limit);
        }

        if(is_null($offset) === false) {
            $this->offset($offset);
        }

        return $this;
    }

    /**
     * select 쿼리 빌더
     * @param string $table
     * @param string $column
     * @param array $conditions
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param null|bool $escape
     * @return \CI_DB_query_builder
     */
    public function makeQuery($table, $column = '*', $conditions = [], $limit = null, $offset = null, $order_by = [], $escape = null)
    {
        $query = $this->makeWhere($conditions);
        $query = $query->from($table);

        if(is_bool($column) === true) {
            $column = ($column === true) ? 'count(*) AS numrows' : '*';
        }

        $query = $query->makeOrderBy($order_by);

        if(is_null($limit) === false) {
            $query = $query->limit($limit);
        }

        if(is_null($offset) === false) {
            $query = $query->offset($offset);
        }

        return $query->select($column, $escape);
    }

    /**
     * join select 쿼리 빌더
     * @param string $table
     * @param string $join_type
     * @param string $join_table
     * @param string $join_condition
     * @param string $column
     * @param array $conditions
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function makeJoinQuery($table, $join_type = 'inner', $join_table, $join_condition, $column = '*', $conditions = [], $limit = null, $offset = null, $order_by = [])
    {
        $query = $this->makeWhere($conditions);
        $query = $query->from($table);
        $query = $query->join($join_table, $join_condition, $join_type);

        if(is_bool($column) === true) {
            $column = ($column === true) ? 'count(*) AS numrows' : '*';
        }

        $query = $query->makeOrderBy($order_by);

        if(is_null($limit) === false) {
            $query = $query->limit($limit);
        }

        if(is_null($offset) === false) {
            $query = $query->offset($offset);
        }

        return $query->select($column);
    }

    /**
     * PDO를 사용하여 PreparedStatement 쿼리 실행 (쿼리 로그가 남지 않음)
     * @param $query
     * @param array $binds
     * @return \PDOStatement
     */
    public function bindQuery($query, $binds = [])
    {
        $stmt = $this->conn_id->prepare($query);
        $stmt->execute($binds);

        return $stmt;
    }

    /**
     * makeWhere로 생성되는 where 조건 쿼리 스트링 리턴
     * @param bool $is_and
     * @return string	SQL statement
     */
    public function getMakeWhere($is_and = false)
    {
        $query = $this->_compile_wh('qb_where');

        // $is_and가 true일 경우 `\nWHERE` 제거
        $query = (empty($query) === false && $is_and === true) ? ' and ' . substr($query, 7) : $query;
        $this->qb_where = array();

        return $query;
    }

    /**
     * makeOrderBy로 생성되는 order by 쿼리 스트링 리턴
     * @return string	SQL statement
     */
    public function getMakeOrderBy()
    {
        $query = $this->_compile_order_by();
        $this->qb_orderby = array();

        return $query;
    }

    /**
     * makeLimitOffset으로 생성되는 limit, offset 쿼리 스트링 리턴
     * @return string	SQL statement
     */
    public function getMakeLimitOffset()
    {
        $query = '';
        if ($this->qb_limit !== false) {
            $query = $this->_limit('');
            $this->qb_limit = false;
            $this->qb_offset = false;
        }

        return $query;
    }

    /**
     * select 다수 행 조회 결과 리턴 (목록)
     * @param string $table 테이블명
     * @param string|boolean [$column 값이 true 인 경우 count 쿼리 실행]
     * @param array $conditions [query builder의 makeWhere 메소드에서 사용하는 배열]
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param null|bool $escape
     * @return array|int
     */
    public function getListResult($table, $column = '*', $conditions = [], $limit = null, $offset = null, $order_by = [], $escape = null)
    {
        $query = $this->makeQuery($table, $column, $conditions, $limit, $offset, $order_by, $escape);

        return ($column === true) ? $query->get()->row(0)->numrows : $query->get()->result_array();
    }

    /**
     * join select 다수 행 조회 결과 리턴 (목록)
     * @param string $table [메인 테이블명]
     * @param string $join_type [조인방법 : inner, left, right ...]
     * @param string $join_table [조인 테이블명]
     * @param string $join_condition [조인 조건 : ON 구문]
     * @param string|boolean $column [$column 값이 true 인 경우 count 쿼리 실행]
     * @param array $conditions [query builder의 makeWhere 메소드에서 사용하는 배열]
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function getJoinListResult($table, $join_type = 'inner', $join_table, $join_condition, $column = '*', $conditions = [], $limit = null, $offset = null, $order_by = [])
    {
        $query = $this->makeJoinQuery($table, $join_type, $join_table, $join_condition, $column, $conditions, $limit, $offset, $order_by);

        return ($column === true) ? $query->get()->row(0)->numrows : $query->get()->result_array();
    }

    /**
     * select 단일 행 조회 결과 리턴
     * @param string $table 테이블명
     * @param string|boolean [$column 값이 true 인 경우 count 쿼리 실행]
     * @param array $conditions [query builder의 makeWhere 메소드에서 사용하는 배열]
     * @param null|bool $escape
     * @return array
     */
    public function getFindResult($table, $column = '*', $conditions = [], $escape = null)
    {
        $query = $this->makeQuery($table, $column, $conditions, null, null, [], $escape);

        return ($column === true) ? $query->get()->row(0)->numrows : $query->get()->row_array();
    }

    /**
     * join select 단일 행 조회 결과 리턴
     * @param string $table [메인 테이블명]
     * @param string $join_type [조인방법 : inner, left, right ...]
     * @param string $join_table [조인 테이블명]
     * @param string $join_condition [조인 조건 : ON 구문]
     * @param string|boolean $column [$column 값이 true 인 경우 count 쿼리 실행]
     * @param array $conditions [query builder의 makeWhere 메소드에서 사용하는 배열]
     * @return mixed
     */
    public function getJoinFindResult($table, $join_type = 'inner', $join_table, $join_condition, $column = '*', $conditions = [])
    {
        $query = $this->makeJoinQuery($table, $join_type, $join_table, $join_condition, $column, $conditions, null, null, []);

        return ($column === true) ? $query->get()->row(0)->numrows : $query->get()->row_array();
    }
}