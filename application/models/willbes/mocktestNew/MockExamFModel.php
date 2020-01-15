<?php
/**
 * ======================================================================
 * 모의고사관리 > 온라인모의고사응시
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MockExamFModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_Product',
        'product_mock' => 'lms_product_mock',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'mock_register' => 'lms_mock_register',
        'mock_group_r_product' => 'lms_mock_group_r_product',
        'mock_group' => 'lms_mock_group',
        'order_product' => 'lms_order_product',
        'order' => 'lms_order',
        'category' => 'lms_sys_category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listExam($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['product_mock']} AS MP
                JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' AND TakeFormsCcd = '690001' -- 온라인응시자
                LEFT JOIN {$this->_table['mock_group_r_product']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mock_group']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
				LEFT JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx
				LEFT JOIN {$this->_table['order']} AS O ON O.OrderIdx = OP.OrderIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}