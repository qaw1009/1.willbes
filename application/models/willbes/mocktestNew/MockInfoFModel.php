<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockInfoFModel extends WB_Model
{
    protected $_table = [
        'mock_product' => 'vw_product_mocktest',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'mock_register' => 'lms_mock_register',

        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product_subject' => 'lms_product_subject',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'sys_code' => 'lms_sys_code',

        'board' => 'lms_board',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사 상품 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $add_column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listMockTest($is_count, $arr_condition=[], $add_column = null, $limit = null, $offset = null, $order_by = [])
    {
        if($is_count===true) {
            $column = true;
        } else {
            $column = '';
            if(empty($add_column) == false) {
                $column = $add_column . ',';
            }
            $column .= "
                pm.*
                ,(
                    SELECT count(*)
                    FROM {$this->_table['order_product']} AS op
                    INNER JOIN {$this->_table['order']} AS o on op.OrderIdx = o.OrderIdx
                    WHERE op.PayStatusCcd='676001' AND ProdCode = pm.ProdCode
                ) AS AllPayCnt
            ";
            //본인 결제한 내역 추출
            if(empty($this->session->userdata('mem_idx')) === true) {
                $column .= ", '0' as OrderProdIdx ";
            } else {
                $column .= "
                    ,(SELECT IFNULL(max(OrderProdIdx),0)
                        FROM {$this->_table['order_product']} AS op
                        INNER JOIN {$this->_table['order']} AS o on op.OrderIdx = o.OrderIdx 
                        WHERE op.PayStatusCcd='676001' AND ProdCode = pm.ProdCode AND op.MemIdx = '".$this->session->userdata('mem_idx')."'
                    ) AS OrderProdIdx
                ";
            }
        }
        return $this->_conn->getListResult($this->_table['mock_product'].' AS pm', $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 모의고사 상품 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findMockTest($arr_condition = [])
    {
        $column = "
            pm.*
            ,(
                SELECT count(*)
                FROM {$this->_table['order_product']} AS op
                INNER JOIN {$this->_table['order']} AS o on op.OrderIdx = o.OrderIdx
                WHERE op.PayStatusCcd='676001' AND ProdCode = pm.ProdCode
            ) AS AllPayCnt
        ";
        if(empty($this->session->userdata('mem_idx')) === true) {
            $column .= ", '0' as OrderProdIdx ";
        } else {
            $column .= "
                ,(SELECT IFNULL(max(OrderProdIdx),0)
                    FROM {$this->_table['order_product']} AS op
                    INNER JOIN {$this->_table['order']} AS o on op.OrderIdx = o.OrderIdx 
                    WHERE op.PayStatusCcd='676001' AND ProdCode = pm.ProdCode AND op.MemIdx = '".$this->session->userdata('mem_idx')."'
                ) AS OrderProdIdx
            ";
        }

        $from = "
            FROM {$this->_table['mock_product']} AS pm
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 응시직렬 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestMockPart($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'b.IsUse' => 'Y'
            ]
        ];

        $column = 'straight_join b.Ccd,b.CcdName';
        $from = "
            from {$this->_table['mock_product']} AS pm
            inner join {$this->_table['sys_code']} b on find_in_set(b.Ccd, pm.MockPart)
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['b.OrderNum' => 'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 응시지역 추출 (응시지역 1 + 응시지역 2)
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestArea($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = '*';
        $from = "
            from (
                select straight_join b.Ccd,b.CcdName
                from {$this->_table['mock_product']} as pm
                inner join {$this->_table['sys_code']} b on find_in_set(b.Ccd, pm.TakeAreas1CCds)
                {$where}
                union all
                select straight_join b.Ccd,b.CcdName
                from {$this->_table['mock_product']} as pm
                inner join {$this->_table['sys_code']} b on find_in_set(b.Ccd, pm.TakeAreas2CCds)
                {$where}
            ) mm
        ";
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * 모의고사 상품 필수과목, 선택과목 추출6
     * @param $prod_code
     * @param $mock_type
     * @return mixed
     */
    public function listMockTestSubject($prod_code, $mock_type)
    {
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'b.MockType' => $mock_type,
                'pm.IsUse' => 'Y'
            ]
        ];

        $column = 'b.MpIdx, b.MockType, mp.PapaerName, sj.SubjectIdx, sj.SubjectName';
        $from ="
            from {$this->_table['mock_product']} as pm
            inner join {$this->_table['product_mock_r_paper']} as b on pm.ProdCode = b.ProdCode and b.IsStatus='Y'
            inner join {$this->_table['mock_paper']} as mp on b.MpIdx = mp.MpIdx and mp.IsStatus='Y' and mp.IsUse='Y'
            inner join {$this->_table['mock_paper_r_category']} as mprc ON mp.MpIdx = mprc.MpIdx AND mprc.IsStatus = 'Y'
            inner join {$this->_table['mock_r_category']} as mrc ON mprc.MrcIdx = mrc.MrcIdx AND mrc.IsStatus='Y'
            inner join {$this->_table['mock_r_subject']} as mrs on mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus='Y'
            inner join {$this->_table['product_subject']} as SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from. $where)->result_array();
    }

    /**
     * 가산점 항목 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestAddPoint($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'b.IsUse' => 'Y'
            ]
        ];

        $column = 'straight_join b.Ccd,b.CcdName,b.CcdValue';
        $from = "
            from {$this->_table['mock_product']} as pm
            inner join {$this->_table['sys_code']} b on find_in_set(b.Ccd, pm.AddPointCcds)
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['b.OrderNum' => 'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 이의제기/정오표 게시판 : 모의고사 상품 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMockTestForBoard($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['mock_product']} AS pm
            LEFT OUTER JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = pm.ProdCode
            
            LEFT OUTER JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '96' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD2 ON BD2.ProdCode = pm.ProdCode
            
            JOIN (
                SELECT ProdCode
                FROM {$this->_table['mock_register']}
                WHERE MemIdx = '{$this->session->userdata('mem_idx')}'
            ) AS BD3 ON BD3.ProdCode = pm.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 이의제기/정오표 게시판 : 모의고사 상세 정보
     * @param array $arr_condition
     * @return mixed
     */
    public function findMockTestForBoard($arr_condition=[])
    {
        $column = "
                pm.*, IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS noticeCnt
            ";

        $from = "
            FROM {$this->_table['mock_product']} as pm
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = pm.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '96' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD2 ON BD2.ProdCode = pm.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $result = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from. $where)->row_array();
        return $result;
    }

    public function findRegistForBoard($arr_condition=[])
    {
        $column = '
                pm.*, mr.IsTake, mr.TakeMockPart, fn_ccd_name(mr.TakeMockPart) AS TakeMockPart_Name,
                IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS noticeCnt
            ';

        $from = "
            FROM {$this->_table['mock_product']} as pm
            INNER JOIN {$this->_table['mock_register']} mr ON pm.ProdCode = mr.ProdCode
            INNER JOIN {$this->_table['order_product']} op ON op.OrderProdIdx = mr.OrderProdIdx
            INNER JOIN {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = pm.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '96' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD2 ON BD2.ProdCode = pm.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $result = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from. $where)->row_array();
        return $result;
    }
}