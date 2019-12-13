<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoodsModel extends WB_Model
{
    private $_table = [
        'mock_product' => 'lms_Product_Mock',
        'product' => 'lms_Product',
        'product_cate' => 'lms_Product_R_Category',
        'product_sale' => 'lms_Product_Sale',

        'mock_register' => 'lms_mock_register',

        'order_product' => 'lms_order_product',
        'order' => 'lms_order',

        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
        'sys_code' => 'lms_sys_code',
    ];

    public $_groupCcd = [];
    public $_ccd = [];

    public function __construct()
    {
        parent::__construct('lms');

        $this->_groupCcd = [
            'option' => '660',
            'SerialCcd' => '666',
            'CandidateAreaCcd' => '631',
            'SmsSendCallBackNum' => '706',   //SMS 발송번호
            'applyType' => $this->config->item('sysCode_applyType', 'mock'),
            'applyArea1' => $this->config->item('sysCode_applyArea1', 'mock'),
            'applyArea2' => $this->config->item('sysCode_applyArea2', 'mock'),
            'addPoint' => $this->config->item('sysCode_addPoint', 'mock'),
            'acceptStatus' => $this->config->item('sysCode_acceptStatus', 'mock'),  //접수상태
            'sysCode_kind' => $this->config->item('sysCode_kind', 'mock')
        ];

        $this->_ccd = [
            'acceptStatus_expected' => '675001',    //접수예정
            'acceptStatus_available' => '675002',   //접수중
            'acceptStatus_end' => '675003',         //접수마감
            'sale_type' => '613001',        //상품판매구분 > PC+모바일
            'paid_pay_status' => '676001',  //결제완료 결제상태 공통코드
            'applyType_on' => $this->config->item('sysCode_applyType_on', 'mock'),      //응시형태 온라인
            'applyType_off' => $this->config->item('sysCode_applyType_off', 'mock')     //응시형태 오프라인
        ];
    }

    /**
     * @param bool $is_count
     * @param array $add_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['MP.ProdCode' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PD.IsCoupon, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate
                ,SC1.CcdName As AcceptStatusCcd_Name,
            ";
            $column .= "
                (
                    SELECT COUNT(mr1.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr1
                        join {$this->_table['order_product']} op1 on mr1.OrderProdIdx = op1.OrderProdIdx
                        join {$this->_table['order']} o1 on op1.OrderIdx = o1.OrderIdx
                        join {$this->_table['sys_code']} sc1 on mr1.TakeForm = sc1.Ccd
                        WHERE mr1.IsStatus = 'Y' AND mr1.IsTake = 'Y' AND mr1.ProdCode = MP.ProdCode AND mr1.TakeForm = '{$this->_ccd['applyType_on']}' and op1.PayStatusCcd='{$this->_ccd['paid_pay_status']}'
                ) AS OnlineCnt,
                (
                    SELECT COUNT(mr2.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr2
                        join {$this->_table['order_product']} op2 on mr2.OrderProdIdx = op2.OrderProdIdx
                        join {$this->_table['order']} o2 on op2.OrderIdx = o2.OrderIdx 
                        join {$this->_table['sys_code']} sc2 on mr2.TakeForm = sc2.Ccd
                    WHERE mr2.IsStatus = 'Y' AND mr2.IsTake = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '{$this->_ccd['applyType_off']}' and op2.PayStatusCcd='{$this->_ccd['paid_pay_status']}'
                ) AS OfflineCnt,
                (
                    SELECT COUNT(mr3.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr3
                        join {$this->_table['order_product']} op3 on mr3.OrderProdIdx = op3.OrderProdIdx
                        join {$this->_table['order']} o3 on op3.OrderIdx = o3.OrderIdx
                        join {$this->_table['sys_code']} sc3 on mr3.TakeForm = sc3.Ccd
                    WHERE mr3.IsStatus = 'Y' AND mr3.ProdCode = MP.ProdCode AND mr3.TakeForm = '{$this->_ccd['applyType_on']}' and op3.PayStatusCcd='{$this->_ccd['paid_pay_status']}'
                ) AS OnlineRegCnt,
                (
                    SELECT COUNT(mr4.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr4
                        join {$this->_table['order_product']} op4 on mr4.OrderProdIdx = op4.OrderProdIdx
                        join {$this->_table['order']} o4 on op4.OrderIdx = o4.OrderIdx 
                        join {$this->_table['sys_code']} sc4 on mr4.TakeForm = sc4.Ccd
                    WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '{$this->_ccd['applyType_off']}' and op4.PayStatusCcd='{$this->_ccd['paid_pay_status']}'
                ) AS OfflineRegCnt
            ";
        }

        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            INNER JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode
            INNER JOIN {$this->_table['product_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y' and PS.SaleTypeCcd='{$this->_ccd['sale_type']}'
            INNER JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}