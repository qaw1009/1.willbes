<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockInfoFModel extends WB_Model
{
    protected $_table = [
        'mock_product' => 'vw_product_mocktest',
        'board' => 'lms_board',
        'cart' => 'lms_cart',

        'mockExamQuestion' => 'lms_mock_questions',
        'mockSubject' => 'lms_mock_r_subject',
        'mockAreaCate' => 'lms_mock_r_category',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockBase' => 'lms_mock',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'site' => 'lms_site',

        'mockPrint' => 'lms_mock_register_print_log',
        'member' => 'lms_Member',
        'order' => 'lms_order',
        'orderProduct' => 'lms_Order_Product',
        'mockExamBase' => 'lms_mock_paper',


        'mockProduct' => 'lms_product_mock',
        'mockProductExam' => 'lms_product_mock_r_paper',
        'mockRegisterR' => 'lms_mock_register_r_paper',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_product_r_category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'mockRegister' => 'lms_mock_register',

        'mockAnswerTemp' => 'lms_mock_answertemp',
        'mockAnswerPaper' => 'lms_mock_answerpaper',
        'mockLog' => 'lms_mock_log',
        'mockGrades' => 'lms_mock_grades',
        'answerNote' => 'lms_mock_wronganswernote',
        'mockGroupRProduct' => 'lms_mock_group_r_product',
        'mockGroup' => 'lms_mock_group'
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
            $column .= "    pm.*
                        , (
                            select
                                count(*)
                            from
                                {$this->_table['orderProduct']} op 
                                join {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
                            where op.PayStatusCcd='676001' and ProdCode = pm.ProdCode 
                        ) as AllPayCnt
            ";
            //본인 결제한 내역 추출
            if(empty($this->session->userdata('mem_idx'))) {
                $column .= ", '0' as OrderProdIdx ";
            } else {
                $column .= ", (
                            select
                                IFNULL(max(OrderProdIdx),0)
                            from
                                {$this->_table['orderProduct']} op 
                                join {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
                            where op.PayStatusCcd='676001' and ProdCode = pm.ProdCode and op.MemIdx = '".$this->session->userdata('mem_idx')."'
                        ) as OrderProdIdx" ;
            }

        }
   
        $result = $this->_conn->getListResult($this->_table['mock_product'].' AS pm', $column, $arr_condition, $limit, $offset, $order_by);
        //echo "<!--".$this->_conn->last_query() .'//-->';
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

        $from ="
                    from
                        {$this->_table['mock_product']} A
                        join {$this->_table['mockProductExam']} b on A.ProdCode = b.ProdCode and b.IsStatus='Y'
                        join {$this->_table['mockExamBase']} mp on b.MpIdx = mp.MpIdx and mp.IsStatus='Y' and mp.IsUse='Y'
                        join {$this->_table['mockAreaCate']} mrc on mp.MrcIdx = mrc.MrcIdx and mrc.IsStatus='Y'
                        join {$this->_table['mockSubject']} mrs on mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus='Y'
                        JOIN {$this->_table['subject']} AS SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                        ";
        $where = " where A.IsUse ='Y' ";
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
        $select = "Select straight_join b.Ccd,b.CcdName ";

        $from = "
                    from 
                        {$this->_table['mock_product']} a 
                        join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.MockPart)";
        $where = " where b.IsUse='Y' ";
        
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

        $from = "from 
                    (
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            {$this->_table['mock_product']} a 
                            join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.TakeAreas1CCds)
                        where a.ProdCode ='".$prod_code."' 
                        
                        union all
                        
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            {$this->_table['mock_product']} a 
                            join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.TakeAreas2CCds)
                        where a.ProdCode ='".$prod_code."' 
                    ) mm ";

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
        $select = "Select straight_join b.Ccd,b.CcdName,b.CcdValue ";

        $from = "
                    from 
                        {$this->_table['mock_product']} a 
                        join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.AddPointCcds)";
        $where = " where b.IsUse='Y' ";

        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);

        $order_by = "order by b.OrderNum";
 
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
        $select = "Select * ";

        $from = "
                    from 
                        {$this->_table['cart']} c
                    ";
        $where = " where c.IsStatus='Y' ";

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

        $select = "
                        select 
                            op.ProdCode,op.RealPayPrice,op.IsUseCoupon,op.PayStatusCcd
                            ,sc1.CcdName as PayStatusCcd_Name 
                            ,o.OrderIdx,o.CompleteDatm
                            ,sc2.CcdName as PayRouteCcd_Name
                            ,sc3.CcdName as PayMethodCcd_Name
                            ,mr.MrIdx,mr.TakeMockPart,mr.TakeForm,mr.TakeArea,Ifnull(mr.AddPoint,'0') as AddPoint,mr.IsStatus,mr.TakeNumber
                            ,sc4.CcdName as TakeMockPart_Name
                            ,sc5.CcdName as TakeArea_Name
                            ,sc6.CcdName as TakeForm_Name
                            ,pm.ProdName,pm.CateName,pm.TakeStartDatm,pm.TakeEndDatm
        ";

        $from = "
                    from
                        {$this->_table['orderProduct']} op 
                        join {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
                        join {$this->_table['sysCode']} sc1 on op.PayStatusCcd = sc1.Ccd
                        join {$this->_table['sysCode']} sc2 on o.PayRouteCcd = sc2.Ccd
                        join {$this->_table['sysCode']} sc3 on o.PayMethodCcd = sc3.Ccd
                        join {$this->_table['mockRegister']} mr on op.OrderProdIdx = mr.OrderProdIdx
                        join {$this->_table['sysCode']} sc4 on mr.TakeMockPart = sc4.Ccd
                        left outer join {$this->_table['sysCode']} sc5 on mr.TakeArea = sc5.Ccd
                        join {$this->_table['sysCode']} sc6 on mr.TakeForm = sc6.Ccd
                        join {$this->_table['mock_product']} pm on mr.ProdCode = pm.ProdCode";

        $where = "
                    where op.MemIdx=".$this->session->userdata('mem_idx');

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
            $select = "select
                            pmp.MockType
                            ,group_concat(ps.SubjectName,'') as subject_names ";
            $from = " from
                            {$this->_table['mockRegister']} mr
                            join {$this->_table['mockRegisterR']} mrp on mr.MrIdx = mrp.MrIdx 
                            join {$this->_table['mockProductExam']} pmp on mrp.ProdCode = pmp.ProdCode and mrp.MpIdx = pmp.MpIdx 
                            join {$this->_table['subject']} ps on mrp.SubjectIdx = ps.SubjectIdx ";
            $where = " where 1=1 ";//pmp.MockType='E'

            $group_by = "group by pmp.MockType";

            $order = " order by mrp.MrrpIdx";

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
            FROM {$this->_table['mock_product']} AS pm
            JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table['board']}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = pm.ProdCode
            
            JOIN (
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
            INNER JOIN {$this->_table['mockRegister']} mr ON pm.ProdCode = mr.ProdCode
            INNER JOIN {$this->_table['orderProduct']} op ON op.OrderProdIdx = mr.OrderProdIdx
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