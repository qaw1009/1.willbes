<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMockTestModel extends WB_Model
{
    private $_table = [
        'vw_mockProduct' => 'vw_product_mocktest',
        'mockProduct' => 'lms_Product_Mock',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'category' => 'lms_sys_category',
        'ProductSale' => 'lms_Product_Sale',
        'admin' => 'wbs_sys_admin',
        'sysCode' => 'lms_sys_code',
        'site' => 'lms_site',
        'order' => 'lms_order',
        'orderProduct' => 'lms_Order_Product',
        'mockProductExam' => 'lms_product_mock_r_paper',
        //'mockExamBase' => 'lms_mock_paper',
        'mockExamBase' => 'lms_mock_paper_new',
        'mockAreaCate' => 'lms_mock_r_category',
        'mockSubject' => 'lms_mock_r_subject',
        'subject' => 'lms_product_subject',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listMockTest($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $mem_idx = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PD.IsCoupon, PS.SalePrice, PS.RealSalePrice          
                , C1.CateName, C1.IsUse AS IsUseCate
                , SC1.CcdName As AcceptStatusCcd_Name
                , S.SiteName
                , SC2.CcdName As TakeFormCcd_Name                
            ';

            if (empty($mem_idx) === true) {
                $column .= ", '0' as OrderProdIdx ";
            } else {
                $column .= ", fn_product_count_order(PD.ProdCode, '676001') as AllPayCnt
                , IF(PD.IsSaleEnd = 'N' AND PD.IsUse = 'Y' AND PD.SaleStatusCcd = '618001', 'Y', 'N') AS IsSalesAble
                , (
                    select
                        IFNULL(max(OrderProdIdx),0)
                    from
                        {$this->_table['orderProduct']} op 
                        join {$this->_table['order']} o on op.OrderIdx = o.OrderIdx
                    where op.PayStatusCcd = '676001' and ProdCode = PD.ProdCode and op.MemIdx = '{$mem_idx}'
                ) as OrderProdIdx";
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y' AND PS.SaleTypeCcd='613001'
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC2 ON MP.TakeFormsCcd = SC2.Ccd
                JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode
            where PD.IsStatus = 'Y'
        ";

        $arr_condition['IN']['PD.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 응시직렬 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestMockPart($prod_code)
    {
        $select = "Select straight_join b.Ccd,b.CcdName ";
        $from = "
            from 
            {$this->_table['vw_mockProduct']} a 
            join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.MockPart)
        ";
        $where = " where b.IsUse='Y' ";
        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);
        $order_by = 'order by b.OrderNum';
        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        return $result;
    }

    /**
     * 응시지역 추출 (응시지역 1 + 응시지역 2)
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestArea($prod_code)
    {

        $select = 'Select * ';

        $from = "from  (
            select straight_join b.Ccd,b.CcdName
            from {$this->_table['vw_mockProduct']} a 
                join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.TakeAreas1CCds)
            where a.ProdCode ='".$prod_code."' 
            union all
            select straight_join b.Ccd,b.CcdName
            from {$this->_table['vw_mockProduct']} a 
                join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.TakeAreas2CCds)
            where a.ProdCode ='".$prod_code."' 
        ) mm ";

        $result = $this->_conn->query($select. $from)->result_array();
        return $result;
    }

    /**
     * 모의고사 상품 필수과목, 선택과목 추출6
     * @param $prod_code
     * @param $mock_type
     * @return mixed
     */
    public function listMockTestSubject($prod_code, $mock_type)
    {
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'b.MockType' => $mock_type,
                'pm.IsUse' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'M.MpIdx, M.MockType, M.PapaerName, sj.SubjectIdx, sj.SubjectName';
        $from ="
            FROM (
                SELECT b.MpIdx, b.MockType, mp.PapaerName, mprc.MrcIdx
                FROM vw_product_mocktest AS pm
                INNER JOIN lms_product_mock_r_paper AS b ON pm.ProdCode = b.ProdCode AND b.IsStatus='Y'
                INNER JOIN lms_mock_paper_new AS mp ON b.MpIdx = mp.MpIdx AND mp.IsStatus='Y' AND mp.IsUse='Y'
                INNER JOIN lms_mock_paper_r_category AS mprc ON mp.MpIdx = mprc.MpIdx AND mprc.IsStatus = 'Y'
                {$where} GROUP BY mp.MpIdx
            ) AS M
            INNER JOIN lms_mock_r_category AS mrc ON M.MrcIdx = mrc.MrcIdx AND mrc.IsStatus='Y'
            INNER JOIN lms_mock_r_subject AS mrs ON mrc.MrsIdx = mrs.MrsIdx AND mrs.IsStatus='Y'
            INNER JOIN lms_product_subject AS SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
        ";
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * 가산점 항목 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestAddPoint($prod_code)
    {
        $select = "Select straight_join b.Ccd,b.CcdName,b.CcdValue ";
        $from = "
            from 
            {$this->_table['vw_mockProduct']} a 
            join {$this->_table['sysCode']} b on find_in_set(b.Ccd, a.AddPointCcds)";
        $where = " where b.IsUse='Y' ";

        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);

        $order_by = "order by b.OrderNum";

        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        return $result;
    }
}
