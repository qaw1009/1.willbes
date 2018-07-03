<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    private $_table = [
        'on_lecture' => 'vw_product_on_lecture',
        'product' => 'lms_product',
        'product_sale' => 'lms_product_sale',
        'product_memo' => 'lms_product_memo',
        'product_book' => 'lms_product_book',
        'product_salebook' => 'lms_product_r_salebook',
        'product_content' => 'lms_product_content',
        'vw_bms_book' => 'wbs_bms_book_combine',
        'code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상품 목록 조회
     * @param string $learn_pattern [학습형태 구분]
     * @param bool|string $column
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param null|array $order_by
     * @return array|int
     */
    public function listProduct($learn_pattern, $column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === false) {
            $column = 'ProdCode, SiteCode, CateCode, ProdName, SaleStatusCcd, IsSaleEnd, SaleStartDatm, SaleEndDatm, CourseIdx, SchoolYear, StudyPeriod, MultipleApply	
                , SalePrice, SaleRate, SaleDiscType, RealSalePrice, CourseName, SubjectName, wLectureProgressCcd, wLectureProgressCcdName';

            switch ($learn_pattern) {
                // 온라인 단강좌
                case 'on_lecture' :
                        $column .= ', SubjectIdx, ProfIdx, wProfIdx, wProfName, ProfSlogan, wUnitLectureCnt, ifnull(fn_product_salebook_data(ProdCode), "N") as ProdBookData
                            , ifnull(fn_product_lecture_sample_data(ProdCode), "N") as LectureSampleData
                            , ifnull(fn_professor_refer_data(ProfIdx), "N") as ProfReferData';
                    break;
                default :
                        return 0;
                    break;
            }
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 상품 컨텐츠 조회
     * @param $prod_code
     * @return array
     */
    public function findProductContents($prod_code)
    {
        $column = 'PC.ProdCode, PC.ContentTypeCcd, CD.CcdName as ContentTypeCcdName, PC.Content';
        $arr_condition = [
            'EQ' => ['PC.ProdCode' => $prod_code, 'PC.IsStatus' => 'Y']
        ];

        return $this->_conn->getJoinListResult($this->_table['product_content'] . ' as PC', 'inner', $this->_table['code'] . ' as CD', 'PC.ContentTypeCcd = CD.Ccd'
            , $column, $arr_condition, null, null, ['PC.ContentTypeCcd' => 'asc']
        );
    }

    /**
     * 상품 구매교재 정보 조회
     * @param $prod_code
     * @return array
     */
    public function findProductSaleBooks($prod_code)
    {
        $column = 'PSB.BookProdCode, P.ProdName as BookProdName, PSB.BookProvisionCcd, fn_ccd_name(PSB.BookProvisionCcd) as BookProvisionCcdName
            , PS.SalePrice, PS.SaleRate, PS.SaleDiscType, PS.RealSalePrice, ifnull(PM.Memo, "") as BookMemo
	        , VWB.wAuthorNames, VWB.wPublName, VWB.wPublDate, VWB.wEditionCcd, VWB.wEditionCcdName, VWB.wEditionSize, VWB.wEditionCnt, VWB.wPageCnt, VWB.wPrintCnt
	        , VWB.wSaleCcd, VWB.wSaleCcdName, VWB.wBookDesc, VWB.wAuthorDesc, VWB.wTableDesc
	        , VWB.wAttachImgPath, VWB.wAttachImgName as wAttachImgOrgName
	        , replace(VWB.wAttachImgName, "_og", "_lg") as wAttachImgLgName, replace(VWB.wAttachImgName, "_og", "_md") as wAttachImgMdName
	        , replace(VWB.wAttachImgName, "_og", "_sm") as wAttachImgSmName         
        ';
        $from = '
            from ' . $this->_table['product_salebook'] . ' as PSB
                inner join ' . $this->_table['product'] . ' as P
                    on PSB.BookProdCode = P.ProdCode
                left join ' . $this->_table['product_memo'] . ' as PM
                    on PSB.ProdCode = PM.ProdCode and PM.MemoTypeCcd = "634002" and PM.IsStatus = "Y"
                inner join ' . $this->_table['product_book'] . ' as PB
                    on PSB.BookProdCode = PB.ProdCode
                inner join ' . $this->_table['product_sale'] . ' as PS
                    on PSB.BookProdCode = PS.ProdCode
                inner join ' . $this->_table['vw_bms_book'] . ' as VWB
                    on PB.wBookIdx = VWB.wBookIdx
                left join ' . $this->_table['code'] . ' as C
                    on PSB.BookProvisionCcd = C.Ccd and C.IsStatus = "Y" 
            where PSB.ProdCode = ?
                and PSB.IsStatus = "Y"
                and P.IsUse = "Y" and P.IsStatus = "Y"
                and PS.IsStatus = "Y"
                and VWB.wIsUse = "Y" and VWB.wIsStatus = "Y"         
        ';
        $order_by = ' order by PSB.BookProvisionCcd asc, PSB.PsbIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by, [$prod_code]);

        return $query->result_array();
    }
}
