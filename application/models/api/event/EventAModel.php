<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventAModel extends WB_Model
{
    private $_table = [
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'member' => 'lms_member',
        'code' => 'lms_sys_code',
        'my_lecture' => 'lms_my_lecture'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상품주문 식별자 조회
     * @param int|array $prod_code [상품코드]
     * @param int|array $cert_code [이벤트 수강인증코드]
     * @param array $arr_condition [추가조회 조건]
     * @return mixed
     */
    public function findOrderByCertCode($prod_code, $cert_code, $arr_condition = [])
    {
        // 수강인증코드 분리
        if(empty($cert_code) === false) {
            return false;
        }
        $order_prod_idx = substr($cert_code, 0, mb_strlen($cert_code, 'utf-8') - 3);
        $mem_idx = '%'.substr($cert_code, -3, 3);

        $column = '
            ML.LecStartDate,
            ML.RealLecEndDate
        ';
        $from = "
            FROM {$this->_table['order']} O
            LEFT OUTER JOIN {$this->_table['order_product']} OP ON O.OrderIdx = OP.OrderIdx
            LEFT OUTER JOIN {$this->_table['my_lecture']} ML ON ML.OrderProdIdx = OP.OrderProdIdx
            WHERE OP.OrderProdIdx = ?
            AND OP.ProdCode IN ?
            AND OP.MemIdx LIKE ?
        ";

        $where = '';
        if (empty($arr_condition) === false) {
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        }

        $query = $this->_conn->query('SELECT ' . $column . $from . $where, [$order_prod_idx, (array) $prod_code, $mem_idx]);

        return $query->row_array();
    }

}
