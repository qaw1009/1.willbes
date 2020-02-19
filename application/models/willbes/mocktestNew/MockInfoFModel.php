<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockInfoFModel extends WB_Model
{
    private $_table = [
        'mock_product' => 'vw_product_mocktest',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_register_print_log' => 'lms_mock_register_print_log',

        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product_subject' => 'lms_product_subject',

        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'sys_code' => 'lms_sys_code',

        'board' => 'lms_board',
        'member' => 'lms_Member',
        'product_r_category' => 'lms_product_r_category',
        'lms_sys_category' => 'lms_sys_category',
    ];
    public $arr_payment_status_ccd = ['676001', '676006'];

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
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'M.MpIdx, M.MockType, M.PapaerName, sj.SubjectIdx, sj.SubjectName';
        $from ="
            FROM (
                SELECT b.MpIdx, b.MockType, mp.PapaerName, mprc.MrcIdx
                FROM vw_product_mocktest AS pm
                INNER JOIN lms_product_mock_r_paper AS b ON pm.ProdCode = b.ProdCode AND b.IsStatus='Y'
                INNER JOIN lms_mock_paper_new AS mp ON b.MpIdx = mp.MpIdx AND mp.IsStatus='Y' AND mp.IsUse='Y'
                INNER JOIN lms_mock_paper_r_category AS mprc ON mp.MpIdx = mprc.MpIdx AND mprc.IsStatus = 'Y'
                {$where} GROUP BY mp.MpIdx
            ) AS M
            INNER JOIN lms_mock_r_category AS mrc ON M.MrcIdx = mrc.MrcIdx AND mrc.IsStatus='Y'
            INNER JOIN lms_mock_r_subject AS mrs ON mrc.MrsIdx = mrs.MrsIdx AND mrs.IsStatus='Y'
            INNER JOIN lms_product_subject AS SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
        ";

        return $this->_conn->query('select ' . $column . $from)->result_array();
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
            INNER JOIN {$this->_table['mock_register']} mr ON pm.ProdCode = mr.ProdCode
            INNER JOIN {$this->_table['order_product']} op ON op.OrderProdIdx = mr.OrderProdIdx
            INNER JOIN {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
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

    /**
     * 모의고사 주문내역 조회
     * @param string $query_type
     * @param bool $is_count
     * @param array $arr_condition_main
     * @param array $arr_condition_sub
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findRegisterByOrderProdIdx($query_type = 'classroom', $is_count = false, $arr_condition_main = [], $arr_condition_sub = [], $limit = null, $offset = null, $order_by = [])
    {
        $where_main = $this->_conn->makeWhere($arr_condition_main);
        $where_main = $where_main->getMakeWhere(false);

        $column = "
            op.ProdCode, op.RealPayPrice, op.IsUseCoupon, op.PayStatusCcd, o.OrderIdx, o.CompleteDatm
            ,A.MrIdx, A.OrderProdIdx, A.TakeMockPart, A.TakeForm, A.TakeArea, A.AddPoint, A.IsStatus, A.TakeNumber
            ,pm.ProdName,pm.CateName,pm.TakeStartDatm,pm.TakeEndDatm
            ,fn_ccd_name(op.PayStatusCcd) AS PayStatusCcd_Name
            ,fn_ccd_name(o.PayRouteCcd) AS PayRouteCcd_Name
            ,fn_ccd_name(o.PayMethodCcd) AS PayMethodCcd_Name
            ,fn_ccd_name(A.TakeMockPart) AS TakeMockPart_Name
            ,fn_ccd_name(A.TakeArea) AS TakeArea_Name
            ,fn_ccd_name(A.TakeForm) AS TakeForm_Name
            ,A.subject_names
        ";

        $from = "
            FROM (
                SELECT mr.ProdCode, mr.OrderProdIdx, mr.MemIdx, GROUP_CONCAT(CONCAT(pmp.MockType,'|',ps.SubjectName)) AS subject_names
	            ,mr.MrIdx, mr.TakeMockPart, mr.TakeForm, mr.TakeArea, IFNULL(mr.AddPoint,'0') AS AddPoint, mr.IsStatus, mr.TakeNumber
                FROM {$this->_table['mock_register']} AS mr
                JOIN {$this->_table['mock_register_r_paper']} AS mrp ON mr.MrIdx = mrp.MrIdx
                JOIN {$this->_table['product_mock_r_paper']} AS pmp ON mrp.ProdCode = pmp.ProdCode AND mrp.MpIdx = pmp.MpIdx
                JOIN {$this->_table['product_subject']} AS ps ON mrp.SubjectIdx = ps.SubjectIdx
                {$where_main}
                GROUP BY mr.ProdCode, mr.MrIdx
            ) AS A
            INNER JOIN {$this->_table['order_product']} AS op on A.OrderProdIdx = op.OrderProdIdx AND op.MemIdx = '{$this->session->userdata('mem_idx')}'
            INNER JOIN {$this->_table['order']} AS o on op.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['mock_product']} AS pm on A.ProdCode = pm.ProdCode
        ";

        return $this->{'_findRegistReturn_' . $query_type}($column, $from, $arr_condition_sub, $is_count, $limit, $offset, $order_by);
    }

    //모의고사 주문내역 조회 [사용처 : 사이트]
    private function _findRegistReturn_site($column, $from)
    {
        return $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from)->row_array();
    }

    private function _findRegistReturn_classroom($column, $from, $arr_condition_sub = [], $is_count = false, $limit = null, $offset = null, $order_by = [])
    {
        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(false);

        if ($is_count === true) {
            $column = ' COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $column .= "
            ,pm.ProdName, pm.SiteCode, pm.MockYear, pm.MockRotationNo, pm.TakeStartDatm, pm.TakeEndDatm, pm.RegDatm AS PDReg, LENGTH(U.MemId) AS IdLength
            , OP.IsUseCoupon, OP.OrderPrice, O.CompleteDatm
            , fn_day_name(pm.TakeStartDatm,'') AS day_name
            ,C1.CateName, U.MemId, U.MemName, fn_dec(U.PhoneEnc) AS MemPhone
            ,o.OrderIdx, o.OrderNo, o.RealPayPrice, o.CompleteDatm, op.PayStatusCcd, o.CompleteDatm
            ,(
                SELECT COUNT(*) 
                FROM {$this->_table['mock_register_print_log']} AS mrpl
                WHERE mrpl.MrIdx = A.MrIdx
            ) AS PrintCnt
            ,(
                SELECT GROUP_CONCAT(SJ.SubjectName)
                FROM {$this->_table['mock_register_r_paper']} AS MAS
                JOIN {$this->_table['product_subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
                WHERE A.MrIdx = MAS.MrIdx
            ) AS SubjectNameList
            ,(
                SELECT GROUP_CONCAT(ps.SubjectName)
                FROM {$this->_table['mock_register_r_paper']} as mrp
                JOIN {$this->_table['product_mock_r_paper']} as pmp ON mrp.ProdCode = pmp.ProdCode AND mrp.MpIdx = pmp.MpIdx AND pmp.IsStatus='Y'
                JOIN {$this->_table['mock_paper']} as mp on pmp.MpIdx = mp.MpIdx and mp.IsStatus='Y' and mp.IsUse='Y'
                JOIN {$this->_table['mock_paper_r_category']} as mprc ON mp.MpIdx = mprc.MpIdx AND mprc.IsStatus = 'Y'
                JOIN {$this->_table['mock_r_category']} as mrc ON mprc.MrcIdx = mrc.MrcIdx AND mrc.IsStatus='Y'
                JOIN {$this->_table['mock_r_subject']} as mrs ON  mrc.MrsIdx = mrs.MrsIdx AND mrs.IsStatus='Y'
                JOIN {$this->_table['product_subject']} as ps ON mrs.SubjectIdx = ps.SubjectIdx 
                WHERE pmp.MockType='E' AND mrp.MrIdx = A.MrIdx 
            ) AS SubjectNameList_Ess
            ,(
                SELECT GROUP_CONCAT(ps.SubjectName)
                FROM {$this->_table['mock_register_r_paper']} as mrp 
                JOIN {$this->_table['product_mock_r_paper']} as pmp ON mrp.ProdCode = pmp.ProdCode AND mrp.MpIdx = pmp.MpIdx AND pmp.IsStatus='Y'                
                JOIN {$this->_table['mock_paper']} as mp on pmp.MpIdx = mp.MpIdx and mp.IsStatus='Y' and mp.IsUse='Y'
                JOIN {$this->_table['mock_paper_r_category']} as mprc ON mp.MpIdx = mprc.MpIdx AND mprc.IsStatus = 'Y'
                JOIN {$this->_table['mock_r_category']} as mrc ON mprc.MrcIdx = mrc.MrcIdx AND mrc.IsStatus='Y'
                JOIN {$this->_table['mock_r_subject']} as mrs ON  mrc.MrsIdx = mrs.MrsIdx AND mrs.IsStatus='Y'
                JOIN {$this->_table['product_subject']} as ps ON mrs.SubjectIdx = ps.SubjectIdx
                WHERE pmp.MockType='S' AND mrp.MrIdx = A.MrIdx
                ORDER BY mrp.MrrpIdx 
            ) AS SubjectNameList_Sub
        ";

        $from .= "
            JOIN {$this->_table['member']} AS U ON A.MemIdx = U.MemIdx AND U.IsStatus = 'Y'
            JOIN {$this->_table['product_r_category']} AS PC ON pm.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['lms_sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where_sub . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}