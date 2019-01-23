<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockInfoFModel extends WB_Model
{
    protected $_table = [
        'mock_product' => 'vw_product_mocktest as pm',
        'board' => 'lms_board'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사 목록
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
            $column .= '    pm.*
                        , (
                            select
                                count(*)
                            from
                                lms_order_product op 
                                join lms_order o on op.OrderIdx = o.OrderIdx
                            where op.PayStatusCcd=\'676001\' and ProdCode = pm.ProdCode 
                        ) as AllPayCnt
            ';
            //본인 결제한 내역 추출
            if(empty($this->session->userdata('mem_idx'))) {
                $column .= ', \'0\' as OrderProdIdx ';
            } else {
                $column .= ', (
                            select
                                IFNULL(max(OrderProdIdx),0)
                            from
                                lms_order_product op 
                                join lms_order o on op.OrderIdx = o.OrderIdx
                            where op.PayStatusCcd=\'676001\' and ProdCode = pm.ProdCode and op.MemIdx = \''.$this->session->userdata('mem_idx').'\'
                        ) as OrderProdIdx' ;
            }

        }
        $result = $this->_conn->getListResult($this->_table['mock_product'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 모의고사 상품 필수과목, 선택과목 추출
     * @param $prod_code
     * @param $mock_type
     * @return mixed
     */
    public function listMockTestSubject($prod_code, $mock_type)
    {

        $select = 'Select b.MpIdx,b.MockType,mp.PapaerName,sj.SubjectIdx,sj.SubjectName';

        $from ='
                    from
                        vw_product_mocktest A
                        join lms_product_mock_r_paper b on A.ProdCode = b.ProdCode and b.IsStatus=\'Y\'
                        join lms_mock_paper mp on b.MpIdx = mp.MpIdx and mp.IsStatus=\'Y\' and mp.IsUse=\'Y\'
                        join lms_mock_r_category mrc on mp.MrcIdx = mrc.MrcIdx and mrc.IsStatus=\'Y\'
                        join lms_mock_r_subject mrs on mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus=\'Y\'
                        JOIN lms_product_subject AS SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = \'Y\'
                        ';
        $where = ' where A.IsUse =\'Y\' ';
        //$where .= $this->_conn->makeWhere(['A.ProdCode' => $prod_code, 'b.MockType'=>$mock_type])->getMakeWhere(true);
        $where .= $this->_conn->makeWhere(['EQ' => ['A.ProdCode'=>$prod_code, 'b.MockType' => $mock_type]])->getMakeWhere(true);
        $result = $this->_conn->query($select. $from. $where)->result_array();
        //echo $this->_conn->last_query();exit;
        return $result;
    }

    /**
     * 응시직렬 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestMockPart($prod_code)
    {
        $select = 'Select straight_join b.Ccd,b.CcdName ';

        $from = '
                    from 
                        vw_product_mocktest a 
                        join lms_sys_code b on find_in_set(b.Ccd, a.MockPart)';
        $where = ' where b.IsUse=\'Y\' ';
        
        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);
        
        $order_by = 'order by b.OrderNum';

        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 응시지역 추출 (응시지역 1 + 응시지역 2)
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestArea($prod_code)
    {

        $select = 'Select * ';

        $from = 'from 
                    (
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            vw_product_mocktest a 
                            join lms_sys_code b on find_in_set(b.Ccd, a.TakeAreas1CCds)
                        where a.ProdCode =\''.$prod_code.'\' 
                        
                        union all
                        
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            vw_product_mocktest a 
                            join lms_sys_code b on find_in_set(b.Ccd, a.TakeAreas2CCds)
                        where a.ProdCode =\''.$prod_code.'\' 
                    ) mm ';

        $result = $this->_conn->query($select. $from)->result_array();
        return $result;
    }

    /**
     * 가산점 항목 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestAddPoint($prod_code)
    {
        $select = 'Select straight_join b.Ccd,b.CcdName,b.CcdValue ';

        $from = '
                    from 
                        vw_product_mocktest a 
                        join lms_sys_code b on find_in_set(b.Ccd, a.AddPointCcds)';
        $where = ' where b.IsUse=\'Y\' ';

        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);

        $order_by = 'order by b.OrderNum';
 
        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 장바구니 내역 조회
     * @param $cart_idx
     * @return mixed
     */
    public function findCartByCartIdx($cart_idx)
    {
        $select = 'Select * ';

        $from = '
                    from 
                        lms_cart c
                    ';
        $where = ' where c.IsStatus=\'Y\' ';

        $where .= $this->_conn->makeWhere(['EQ'=>['c.CartIdx' => $cart_idx]])->getMakeWhere(true);

        $result = $this->_conn->query($select. $from. $where)->row_array();

        return $result;
    }

    /**
     * 모의고사 주문내역 조회
     * @param $prod_code
     * @return bool
     */
    public function findRegistByOrderProdIdx($order_prod_idx)
    {

        $select = '
                        select 
                            op.ProdCode,op.RealPayPrice,op.IsUseCoupon,op.PayStatusCcd
                            ,sc1.CcdName as PayStatusCcd_Name 
                            ,o.OrderIdx,o.CompleteDatm
                            ,sc2.CcdName as PayRouteCcd_Name
                            ,sc3.CcdName as PayMethodCcd_Name
                            ,mr.MrIdx,mr.TakeMockPart,mr.TakeForm,mr.TakeArea,Ifnull(mr.AddPoint,\'0\') as AddPoint,mr.IsStatus,mr.TakeNumber
                            ,sc4.CcdName as TakeMockPart_Name
                            ,sc5.CcdName as TakeArea_Name
                            ,sc6.CcdName as TakeForm_Name
                            ,pm.ProdName,pm.CateName,pm.TakeStartDatm,pm.TakeEndDatm
        ';

        $from = '
                    from
                        lms_order_product op 
                        join lms_order o on op.OrderIdx = o.OrderIdx
                        join lms_sys_code sc1 on op.PayStatusCcd = sc1.Ccd
                        join lms_sys_code sc2 on o.PayRouteCcd = sc2.Ccd
                        join lms_sys_code sc3 on o.PayMethodCcd = sc3.Ccd
                        join lms_mock_register mr on op.OrderProdIdx = mr.OrderProdIdx
                        join lms_sys_code sc4 on mr.TakeMockPart = sc4.Ccd
                        left outer join lms_sys_code sc5 on mr.TakeArea = sc5.Ccd
                        join lms_sys_code sc6 on mr.TakeForm = sc6.Ccd
                        join vw_product_mocktest pm on mr.ProdCode = pm.ProdCode';

        $where = '
                    where op.MemIdx=\''.$this->session->userdata('mem_idx').'\' ';

        $where .= $this->_conn->makeWhere(['EQ'=>['op.OrderProdIdx' => $order_prod_idx]])->getMakeWhere(true);

        $result = $this->_conn->query($select. $from. $where)->row_array();

        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 신청한 시험의 과목정보
     * @param $order_prod_idx
     * @return mixed
     */
    public function findRegistSubject($order_prod_idx)
    {
            $select = 'select
                            pmp.MockType
                            ,group_concat(ps.SubjectName,\'\') as subject_names ';
            $from = ' from
                            lms_mock_register mr
                            join lms_mock_register_r_paper mrp on mr.MrIdx = mrp.MrIdx 
                            join lms_product_mock_r_paper pmp on mrp.ProdCode = pmp.ProdCode and mrp.MpIdx = pmp.MpIdx 
                            join lms_product_subject ps on mrp.SubjectIdx = ps.SubjectIdx ';
            $where = ' where 1=1 ';//pmp.MockType='E'

            $group_by = 'group by pmp.MockType';

            $order = ' order by mrp.MrrpIdx';

            $where .= $this->_conn->makeWhere(['EQ'=>['mr.OrderProdIdx' => $order_prod_idx]])->getMakeWhere(true);

            $result = $this->_conn->query($select. $from. $where. $group_by, $order)->result_array();
            return $result;
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
            FROM {$this->_table['mock_product']}
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
        $column = '
                pm.*, IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS noticeCnt
            ';

        $from = "
            FROM {$this->_table['mock_product']}
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
            FROM {$this->_table['mock_product']}
            INNER JOIN lms_mock_register mr ON pm.ProdCode = mr.ProdCode
            INNER JOIN lms_order_product op ON op.OrderProdIdx = mr.OrderProdIdx
            INNER JOIN lms_order o on op.OrderIdx = o.OrderIdx
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