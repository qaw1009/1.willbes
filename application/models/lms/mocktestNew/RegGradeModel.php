<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGradeModel extends WB_Model
{
    private $_table = [
        'mock_register' => 'lms_mock_register',
        'mock_grades' => 'lms_mock_grades',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_grades_log' => 'lms_mock_grades_log',

        'mock_product' => 'lms_product_mock',
        'product' => 'lms_product',
        'product_cate' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'vw_product_mocktest' => 'vw_product_mocktest',

        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
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
            $arr_order_by = ['MP.ProdCode' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
                PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,'~',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = (SELECT Ccd FROM {$this->_table['sys_code']} Where CcdName = 'online')) AS OnlineCnt,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = (SELECT Ccd FROM {$this->_table['sys_code']} Where CcdName = 'off(학원)')) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_grades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,  
                fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,
                C1.CateName, C1.IsUse AS IsUseCate, SC1.CcdName As AcceptStatusCcd_Name
            ";
        }

        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_table['product_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 모의고사 정보 조회
     * @param $prod_code
     * @return mixed
     */
    public function productInfo($prod_code)
    {
        $column = "PD.*, S.SiteName, GL.*, IFNULL(ANT.cnt,0) AS USERCNT";
        $where = $this->_conn->makeWhere(['EQ' => ['PD.ProdCode' => $prod_code]])->getMakeWhere(false);
        $from = "
            FROM {$this->_table['vw_product_mocktest']} AS PD
            JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
            LEFT JOIN (
                SELECT gLog.ProdCode, admin.wAdminName AS writer, gLog.RegDatm AS wdate
                FROM (
                    SELECT ProdCode, MemId, RegDatm
                    FROM {$this->_table['mock_grades_log']}
                    WHERE ProdCode = '{$prod_code}'
                    ORDER BY RegDatm DESC LIMIT 1
                ) AS gLog
                INNER JOIN {$this->_table['admin']} AS admin ON gLog.MemId = admin.wAdminId
            ) AS GL ON PD.ProdCode = GL.ProdCode
            
            LEFT JOIN (
                SELECT COUNT(*) AS cnt, ProdCode
                FROM {$this->_table['mock_answertemp']}
                WHERE ProdCode = '{$prod_code}'
                GROUP BY MrIdx
            ) AS ANT ON ANT.ProdCode = PD.ProdCode
        ";
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }
}