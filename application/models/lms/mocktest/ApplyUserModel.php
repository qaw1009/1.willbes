<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 개별접수현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyUserModel extends WB_Model
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
        $condition = [ 'IN' => ['O.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $subQuery = "
            SELECT GROUP_CONCAT(SJ.SubjectName)
            FROM {$this->_table['mockApplySubject']} AS MAS
            JOIN {$this->_table['subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
            JOIN {$this->_table['mockProductExam']} AS MPE ON MAS.PmrpIdx = MPE.PmrpIdx
            WHERE MAP.MrIdx = MAS.MrIdx
            ORDER BY MPE.MockType ASC
        ";
        $select = "
            SELECT MAP.*, PD.ProdName, MP.MockYear, MP.MockRotationNo, C1.CateName, SC.CcdName,
            U.MemId, U.MemName, fn_enc(U.PhoneEnc) AS MemPhone,
            O.OrderNo, O.RealPayPrice, O.CompleteDatm, OP.PayStatusCcd,
            ($subQuery) AS SubjectNameList
        ";
        $from = "
            FROM {$this->_table['mockApply']} AS MAP
            JOIN {$this->_table['member']} AS U ON MAP.MemIdx = U.MemIdx AND U.IsStatus = 'Y'
            JOIN {$this->_table['order']} AS O ON MAP.OrderIdx = O.OrderIdx
            JOIN {$this->_table['orderProduct']} AS OP ON O.OrderIdx = OP.OrderIdx
            JOIN {$this->_table['mockProduct']} AS MP ON MAP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSMS']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON MAP.TakeMockPart = SC.Ccd AND SC.IsStatus = 'Y'
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
