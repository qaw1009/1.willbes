<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyUserModel extends WB_Model
{
    private $_table = [
        'mock_register' => 'lms_Mock_Register',
        'mock_register_r_paper' => 'lms_Mock_Register_R_Paper',
        'mock_answertemp' => 'lms_mock_answertemp',
        'product_mock' => 'lms_Product_Mock',
        'product' => 'lms_Product',
        'product_r_category' => 'lms_Product_R_Category',
        'product_sms' => 'lms_Product_Sms',
        'product_subject' => 'lms_product_subject',
        'order_product' => 'lms_Order_Product',
        'order' => 'lms_Order',
        'member' => 'lms_Member',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'mock_register_print_log' => 'lms_mock_register_print_log',
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
            $arr_order_by = ['MR.MrIdx' => 'DESC'];

            if ($is_count == 'excel') {
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();

                $column = "
                    Straight_join
                    O.OrderNo, U.MemId, U.MemName, fn_dec(U.PhoneEnc) AS MemPhone, O.CompleteDatm, O.RealPayPrice, SC4.CcdName as PayStatusCcd_Name, SC5.CcdName as PayMethodCcd_Name
                    ,concat('[',PD.ProdCode,'] ', PD.ProdName) as prodName, MP.MockYear, MP.MockRotationNo
                    ,SC2.CcdName as TakeForm_Name ,MR.TakeNumber, C1.CateName ,SC1.CcdName as TakeMockPart_Name ,SC3.CcdName as TakeArea_Name
                    ,(
                        SELECT GROUP_CONCAT(SJ.SubjectName)
                        FROM {$this->_table['mock_register_r_paper']} AS MAS
                        JOIN {$this->_table['product_subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
                        WHERE MR.MrIdx = MAS.MrIdx
                    ) AS SubjectNameList
                    ,case MR.IsTake when 'Y' then '응시' else '미응시' end AS IsTake
                ";
            } else {
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

                $column = "
                    Straight_join
                    MR.*, PD.ProdName, PD.SiteCode, MP.MockYear, MP.MockRotationNo, MP.TakeStartDatm, MP.TakeEndDatm
                    ,fn_day_name(MP.TakeStartDatm,'') as day_name
                    ,C1.CateName ,U.MemId, U.MemName, fn_dec(U.PhoneEnc) AS MemPhone
                    ,O.OrderIdx, O.OrderNo, O.RealPayPrice, O.CompleteDatm, OP.PayStatusCcd
                    ,SC1.CcdName as TakeMockPart_Name ,SC2.CcdName as TakeForm_Name ,SC3.CcdName as TakeArea_Name ,SC4.CcdName as PayStatusCcd_Name ,SC5.CcdName as PayMethodCcd_Name
                    ,(
                        SELECT count(*) 
                        FROM {$this->_table['mock_register_print_log']} mrpl
                        WHERE mrpl.MrIdx = Mr.MrIdx
                    ) as PrintCnt
                    ,(
                        SELECT GROUP_CONCAT(SJ.SubjectName)
                        FROM {$this->_table['mock_register_r_paper']} AS MAS
                        JOIN {$this->_table['product_subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
                        WHERE MR.MrIdx = MAS.MrIdx
                    ) AS SubjectNameList
                    ,IFNULL((
                        SELECT COUNT(*) AS tempCnt
                        FROM {$this->_table['mock_answertemp']} WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx
                        GROUP BY ProdCode
                    ),0) AS answerTempCnt
                ";
            }
        }

        $condition = [ 'IN' => ['O.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_register']} AS MR
            JOIN {$this->_table['member']} AS U ON MR.MemIdx = U.MemIdx AND U.IsStatus = 'Y'
            JOIN {$this->_table['order_product']} AS OP ON OP.OrderProdIdx = MR.OrderProdIdx
            JOIN {$this->_table['order']} AS O ON OP.OrderIdx = O.OrderIdx
            JOIN {$this->_table['product_mock']} AS MP ON MR.ProdCode = MP.ProdCode
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sms']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['sys_code']} AS SC1 ON MR.TakeMockPart = SC1.Ccd AND SC1.IsStatus = 'Y'
            JOIN {$this->_table['sys_code']} AS SC2 ON MR.TakeForm = SC2.Ccd AND SC2.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['sys_code']} AS SC3 ON MR.TakeArea = SC3.Ccd AND SC3.IsStatus = 'Y'
            JOIN {$this->_table['sys_code']} AS SC4 ON OP.PayStatusCcd = SC4.Ccd AND SC4.IsStatus = 'Y'
            LEFT JOIN {$this->_table['sys_code']} AS SC5 ON O.PayMethodCcd = SC5.Ccd AND SC5.IsStatus = 'Y'
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}