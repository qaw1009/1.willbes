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
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MAP.*, PD.ProdName, MP.MockYear, MP.MockRotationNo
        ";
        $from = "
            FROM {$this->_table['mockApply']} AS MAP
            JOIN {$this->_table['mockProduct']} AS MP ON MAP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MAP.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MAP.MrIdx DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }
}
