<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 모의고사별 현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyExamModel extends WB_Model
{
    private $_table = [
        'mockApply' => 'lms_Mock_Register',
        'mockApplySubject' => 'lms_Mock_Register_R_Paper',
        'mockProduct' => 'lms_Product_Mock',
        'mockProductExam' => 'lms_Product_Mock_R_Paper',
        'mockExamBase' => 'lms_mock_paper',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockSubject' => 'lms_mock_r_subject',
        'subject' => 'lms_product_subject',

        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'member' => 'lms_Member',
        'order' => 'lms_Order',
        'orderProduct' => 'lms_Order_Product',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사별 접수현황
     */
    public function mockList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['p.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        $where = "p.IsStatus='Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";

        $column = "
                        *
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o1
                                join {$this->_table['orderProduct']} op1 on o1.OrderIdx = op1.OrderIdx
                                join {$this->_table['mockApply']}  mr1 on mr1.OrderProdIdx = op1.OrderProdIdx
                            where op1.PayStatusCcd = '676001' and op1.ProdCode = mm.ProdCode and mr1.TakeArea = mm.TakeArea
                        ) as pay_count
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o2
                                join {$this->_table['orderProduct']} op2 on o2.OrderIdx = op2.OrderIdx
                                join {$this->_table['mockApply']}  mr2 on mr2.OrderProdIdx = op2.OrderProdIdx
                            where op2.PayStatusCcd = '676006' and op2.ProdCode = mm.ProdCode and mr2.TakeArea = mm.TakeArea
                        ) as refund_count
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o3
                                join {$this->_table['orderProduct']} op3 on o3.OrderIdx = op3.OrderIdx
                                join {$this->_table['mockApply']}  mr3 on mr3.OrderProdIdx = op3.OrderProdIdx
                            where mr3.IsTake = 'Y' and op3.ProdCode = mm.ProdCode and mr3.TakeArea = mm.TakeArea
                        ) as take_count
        ";

        $from = "
                    from
                    (
                        select
                        mr.TakeArea
                        ,p.ProdCode,p.ProdName
                        ,pm.MockYear,pm.MockRotationNo,pm.ClosingPerson
                        ,sc1.CcdName as TakeForm_Name
                        ,sc2.CcdName as TakeArea_Name
                        from
                            {$this->_table['mockApply']}  mr 
                            join {$this->_table['Product']} p on p.ProdCode = mr.ProdCode and mr.IsStatus='Y'
                            join {$this->_table['mockProduct']} pm on p.ProdCode = pm.ProdCode
                            join {$this->_table['orderProduct']} op on mr.OrderProdIdx = op.OrderProdIdx
                            join {$this->_table['sysCode']} sc1 on sc1.Ccd = mr.TakeForm and sc1.IsStatus='Y'
                            left outer join {$this->_table['sysCode']} sc2 on sc2.Ccd = mr.TakeArea and sc2.IsStatus='Y'
                        Where
                            {$where}  
                        group by p.ProdCode,TakeArea
                    ) mm
        ";

        $order = 'Order by ProdCode desc,TakeArea asc ';

        //echo 'Select '.$column . $from . $order . $offset_limit;

        $data = $this->_conn->query('Select '.$column . $from . $order . $offset_limit)->result_array();
        $count = $this->_conn->query('Select Count(*) As cnt ' . $from )->row()->cnt;

        return array($data, $count);
    }

    /**
     * 엑셀 출력
     * @param string $conditionAdd
     * @return mixed
     */
    public function mockListExcel($conditionAdd='')
    {
        $condition = [ 'IN' => ['p.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $where = "p.IsStatus='Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";

        $column = "
                        MockYear,MockRotationNo, CONCAT('[',ProdCode,']', ProdName)
                        ,TakeForm_Name,ClosingPerson,TakeArea_Name
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o1
                                join {$this->_table['orderProduct']} op1 on o1.OrderIdx = op1.OrderIdx
                                join {$this->_table['mockApply']}  mr1 on mr1.OrderProdIdx = op1.OrderProdIdx
                            where op1.PayStatusCcd = '676001' and op1.ProdCode = mm.ProdCode and mr1.TakeArea = mm.TakeArea
                        ) as pay_count
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o2
                                join {$this->_table['orderProduct']} op2 on o2.OrderIdx = op2.OrderIdx
                                join {$this->_table['mockApply']}  mr2 on mr2.OrderProdIdx = op2.OrderProdIdx
                            where op2.PayStatusCcd = '676006' and op2.ProdCode = mm.ProdCode and mr2.TakeArea = mm.TakeArea
                        ) as refund_count
                        ,
                        (
                            select count(*) from
                                {$this->_table['order']} o3
                                join {$this->_table['orderProduct']} op3 on o3.OrderIdx = op3.OrderIdx
                                join {$this->_table['mockApply']}  mr3 on mr3.OrderProdIdx = op3.OrderProdIdx
                            where mr3.IsTake = 'Y' and op3.ProdCode = mm.ProdCode and mr3.TakeArea = mm.TakeArea
                        ) as take_count
        ";

        $from = "
                    from
                    (
                        select
                        mr.TakeArea
                        ,p.ProdCode,p.ProdName
                        ,pm.MockYear,pm.MockRotationNo,pm.ClosingPerson
                        ,sc1.CcdName as TakeForm_Name
                        ,sc2.CcdName as TakeArea_Name
                        from
                            {$this->_table['mockApply']}  mr 
                            join {$this->_table['Product']} p on p.ProdCode = mr.ProdCode and mr.IsStatus='Y'
                            join {$this->_table['mockProduct']} pm on p.ProdCode = pm.ProdCode
                            join {$this->_table['orderProduct']} op on mr.OrderProdIdx = op.OrderProdIdx
                            join {$this->_table['sysCode']} sc1 on sc1.Ccd = mr.TakeForm and sc1.IsStatus='Y'
                            left outer join {$this->_table['sysCode']} sc2 on sc2.Ccd = mr.TakeArea and sc2.IsStatus='Y'
                        Where
                            {$where}  
                        group by p.ProdCode,TakeArea
                    ) mm
        ";

        $order = 'Order by ProdCode desc,TakeArea asc ';

        //echo 'Select '.$column . $from . $order;

        $data = $this->_conn->query('Select '.$column . $from . $order )->result_array();
        return $data;
    }



}
