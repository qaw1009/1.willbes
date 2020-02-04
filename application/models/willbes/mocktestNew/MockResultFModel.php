<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockResultFModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_Product',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_questions' => 'lms_mock_questions',
        'mock_grades_log' => 'lms_mock_grades_log',

        'product_mock' => 'lms_product_mock',
        'product_subject' => 'lms_product_subject',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'category' => 'lms_sys_category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listExam($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                MR.MemIdx, MP.*, MR.IsTake AS MrIsStatus, MR.MrIdx,
                PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate, IsDisplay,
                (SELECT SiteGroupName FROM {$this->_table['site_group']} WHERE SiteGroupCode = (SELECT SiteGroupCode FROM {$this->_table['site']} WHERE SiteCode = PD.SiteCode)) AS SiteName,
                (SELECT RegDatm FROM {$this->_table['mock_answerpaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                (SELECT IFNULL(SUM(IF(MA.IsWrong = 'Y', Scoring, '0')),'0') AS Res
                    FROM {$this->_table['mock_paper']} AS MP
                    JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                    JOIN {$this->_table['mock_answerpaper']} AS MA ON MQ.MqIdx = MA.MqIdx 
                    JOIN {$this->_table['mock_register']} AS MMR ON MMR.MrIdx = MA.MrIdx
                    WHERE MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
                ) AS TCNT,
                (SELECT COUNT(*) FROM {$this->_table['mock_register_r_paper']} WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
                (SELECT RegDatm FROM {$this->_table['mock_answerpaper']} WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate,
                (SELECT MemId FROM {$this->_table['mock_grades_log']} WHERE ProdCode = MR.ProdCode LIMIT 1) AS gRegister
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 온라인응시자만 나오게
        $from = "
            FROM {$this->_table['product_mock']} AS MP
                INNER JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                INNER JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
                INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx AND PayStatusCcd = '676001'  -- 결제완료
                INNER JOIN {$this->_table['order']} AS O ON O.OrderIdx = OP.OrderIdx                
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        //echo "<pre>".'select ' . $column . $from . $where . $order_by_offset_limit."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 과목파일 정보 조회
     * @param $prod_code
     * @return mixed
     */
    public function findSubjectFile($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $this->session->userdata('mem_idx'),
                'MR.ProdCode' => $prod_code,
                'MR.IsStatus' => 'Y',
                'OP.PayStatusCcd' => '676001'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            (SELECT SubjectName FROM {$this->_table['product_subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            IFNULL(NULLIF(MP.FrontRealQuestionFile,''),MP.RealQuestionFile) AS fileQ,
            MP.RealExplanFile AS fileA, MP.FilePath AS PFilePath, MP.MpIdx
        ";

        $from = "
            FROM {$this->_table['mock_register']} AS MR    
            JOIN {$this->_table['mock_register_r_paper']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
            INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx
            LEFT OUTER JOIN {$this->_table['mock_paper']} AS MP ON RP.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y'
        ";
        $order_by = " ORDER BY SubjectIdx";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }
}