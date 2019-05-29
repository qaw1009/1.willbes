<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomePackModel extends WB_Model
{
    private $_table = [
        'welcomepack' => 'lms_welcomepack',
        'admin' => 'wbs_sys_admin',
        'coupon' => 'lms_coupon',
        'product' => 'lms_product',
        'lecture' => 'lms_product_lecture',
        'code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getList($arr_condition, $limit = null, $offset = null, $is_count = false)
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = " 
                w.wIdx, sc.CcdName AS InterestName, w.wType, IF(w.wType = 'C', c.CouponName, p.ProdName) AS ProdName, w.wCode,
                w.IsStatus, w.RegDatm, a1.wAdminName AS RegAdminName, w.UpdDatm, a2.wAdminName AS UpdAdminName,
                w.wDesc, w.RegIp, w.UpdIp
            ";
            // $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table['welcomepack']} AS w 
                INNER JOIN {$this->_table['code']} AS sc ON w.wInterestCode = sc.Ccd
                LEFT JOIN {$this->_table['coupon']} AS c ON w.wCode = c.CouponIdx
                LEFT JOIN {$this->_table['product']} AS p ON w.wCode = p.ProdCode and p.ProdTypeCcd = '636001'
                LEFT JOIN {$this->_table['lecture']} AS pl ON p.ProdCode = pl.ProdCode
                LEFT JOIN {$this->_table['admin']} AS a1 ON w.RegAdmin = a1.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS a2 ON w.UpdAdmin = a2.wAdminIdx
            WHERE 1=1
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function storeItem($data)
    {
        $data = array_merge($data, [
            'RegAdmin' => $this->session->userdata('admin_idx'),
            'RegIp' => $this->input->ip_address()
        ]);

        try{
            if ($this->_conn->set($data)->insert($this->_table['welcomepack']) === false) {
                throw new \Exception('월컴팩 등록에 실패했습니다.');
            }
        } catch (\Exception $e){
            return error_result($e);
        }


        return true;
    }

    public function setItem($data)
    {
        try{
            if( $this->_conn->set([
                    'IsStatus' => element('IsStatus', $data),
                    'wDesc' => element('wDesc', $data),
                    'UpdAdmin' => $this->session->userdata('admin_idx'),
                    'UpdIp' => $this->input->ip_address()
                ])->
                set('UpdDatm', 'NOW()', false)->
                where('wIdx', element('wIdx', $data))->
                update($this->_table['welcomepack']) == false ) {
                throw new \Exception('변경에 실패했습니다.');
            }

        } catch(\Exception $e){
            return error_result($e);
        }

        return true;
    }
}