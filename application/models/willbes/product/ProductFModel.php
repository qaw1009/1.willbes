<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    private $_table = [
        'on_lecture' => 'vw_product_on_lecture',
        'product_salebook' => 'vw_product_salebook',
        'product_content' => 'lms_product_content',
        'product_memo' => 'lms_product_memo',
        'code' => 'lms_sys_code'
    ];
    // 상품 메모타입 공통코드
    private $_memo_type_ccds = ['book' => '634002'];

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
                        $column .= ', SubjectIdx, ProfIdx, wProfIdx, wProfName, ProfSlogan, wUnitLectureCnt
                            , ifnull(fn_product_salebook_data(ProdCode), "N") as ProdBookData
                            , ifnull(fn_product_memo(ProdCode, "' . $this->_memo_type_ccds['book'] . '"), "") as ProdBookMemo
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
        $column = 'BookProdCode, BookProdName, BookCateCode, BookCateName, BookProvisionCcd, BookProvisionCcdName, SalePrice, SaleRate, SaleDiscType, RealSalePrice        
	        , wAuthorNames, wPublName, wPublDate, wEditionCcd, wEditionCcdName, wEditionSize, wEditionCnt, wPageCnt, wPrintCnt
	        , wSaleCcd, wSaleCcdName, wBookDesc, wAuthorDesc, wTableDesc, wAttachImgPath, wAttachImgOgName, wAttachImgLgName, wAttachImgMdName, wAttachImgSmName         
        ';

        $arr_condition = ['EQ' => ['ProdCode' => $prod_code]];
        $order_by = ['BookProvisionCcd' => 'asc', 'PrpIdx' => 'asc'];

        return $this->_conn->getListResult($this->_table['product_salebook'], $column, $arr_condition, null, null, $order_by);
    }
}
