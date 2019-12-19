<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyExamModel extends WB_Model
{
    private $_table = [
        'order' => 'lms_Order',
        'order_product' => 'lms_Order_Product',
        'mock_register' => 'lms_Mock_Register',
        'product' => 'lms_Product',
        'product_mock' => 'lms_Product_Mock',
        'sys_code' => 'lms_sys_code',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['ProdCode' => 'DESC', 'TakeArea' => 'ASC'];

            if ($is_count == 'excel') {
                $column = "MockYear, MockRotationNo, CONCAT('[',ProdCode,']', ProdName) ,TakeForm_Name, ClosingPerson, TakeArea_Name,";
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            } else {
                $column = "mm.*,";
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }

            $column .= "
                (
                    select count(*) from
                        {$this->_table['order']} o1
                        join {$this->_table['order_product']} op1 on o1.OrderIdx = op1.OrderIdx
                        join {$this->_table['mock_register']} mr1 on mr1.OrderProdIdx = op1.OrderProdIdx
                    where op1.PayStatusCcd = '{$this->mockCommonModel->_ccd['paid_pay_status']}' and op1.ProdCode = mm.ProdCode and mr1.TakeArea = mm.TakeArea
                ) as pay_count
                ,
                (
                    select count(*) from
                        {$this->_table['order']} o2
                        join {$this->_table['order_product']} op2 on o2.OrderIdx = op2.OrderIdx
                        join {$this->_table['mock_register']} mr2 on mr2.OrderProdIdx = op2.OrderProdIdx
                    where op2.PayStatusCcd = '{$this->mockCommonModel->_ccd['refund_pay_status']}' and op2.ProdCode = mm.ProdCode and mr2.TakeArea = mm.TakeArea
                ) as refund_count
                ,
                (
                    select count(*) from
                        {$this->_table['order']} o3
                        join {$this->_table['order_product']} op3 on o3.OrderIdx = op3.OrderIdx
                        join {$this->_table['mock_register']} mr3 on mr3.OrderProdIdx = op3.OrderProdIdx
                    where mr3.IsTake = 'Y' and op3.ProdCode = mm.ProdCode and mr3.TakeArea = mm.TakeArea
                ) as take_count
            ";
        }

        $condition = [ 'IN' => ['p.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $query_string = "
            {$column}
            FROM (
                SELECT mr.TakeArea ,p.ProdCode,p.ProdName ,pm.MockYear,pm.MockRotationNo,pm.ClosingPerson ,sc1.CcdName as TakeForm_Name ,sc2.CcdName as TakeArea_Name
                FROM {$this->_table['mock_register']}  mr 
                    join {$this->_table['product']} p on p.ProdCode = mr.ProdCode and mr.IsStatus='Y'
                    join {$this->_table['product_mock']} pm on p.ProdCode = pm.ProdCode
                    join {$this->_table['order_product']} op on mr.OrderProdIdx = op.OrderProdIdx
                    join {$this->_table['sys_code']} sc1 on sc1.Ccd = mr.TakeForm and sc1.IsStatus='Y'
                    left outer join {$this->_table['sys_code']} sc2 on sc2.Ccd = mr.TakeArea and sc2.IsStatus='Y'
                {$where}
                GROUP BY p.ProdCode, TakeArea
            ) AS mm
        ";

        $query = $this->_conn->query('select ' . $query_string . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}