<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    private $_table = [
        'on_lecture' => 'vw_product_on_lecture',
        'on_free_lecture' => 'vw_product_on_free_lecture',
        'adminpack_lecture' => 'vw_product_adminpack_lecture',
        'userpack_lecture' => 'vw_product_userpack_lecture',
        'book' => 'vw_product_book',
        'product' => 'lms_product',
        'product_r_product' => 'lms_product_r_product',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'product_lecture' => 'lms_product_lecture',
        'product_salebook' => 'vw_product_salebook',
        'product_content' => 'lms_product_content',
        'product_memo' => 'lms_product_memo',
        'product_professor_concat' => 'vw_product_r_professor_concat',
        'cms_lecture' => 'wbs_cms_lecture',
        'cms_lecture_unit' => 'wbs_cms_lecture_unit',
        'code' => 'lms_sys_code'
    ];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003'];

    // 수강생 교재 공통코드
    public $_student_book_ccd = '610003';

    // 판매가능 공통코드 (판매중)
    public $_available_sale_status_ccd = '618001';    

    // 상품 메모타입 공통코드
    public $_memo_type_ccds = ['book' => '634002'];

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
     * @param string $add_column
     * @return array|int
     */
    public function listProduct($learn_pattern, $column, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $add_column = '')
    {
        if ($column === false) {
            $column = 'ProdCode, SiteCode, CateCode, ProdName, SaleStatusCcd, IsSaleEnd, SaleStartDatm, SaleEndDatm, IsSalesAble, IsUse, SchoolYear, RegDatm
                , if(IsSalesAble = "Y" and SaleStatusCcd = "' . $this->_available_sale_status_ccd . '", "Y", "N") as IsOrderable';

            switch ($learn_pattern) {
                // 온라인 단강좌, 온라인 무료강좌
                case 'on_lecture' :
                case 'on_free_lecture' :
                        $column .= ', IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, StudyPeriod, MultipleApply, SubjectIdx, SubjectName, CourseIdx, CourseName
                            , ProfIdx, wProfIdx, wProfName, ProfSlogan, wLecIdx, wUnitLectureCnt, wLectureProgressCcd, wLectureProgressCcdName, LecSaleType
                            , LectureSampleData, ProdBookData, ProdBookMemo, ProfReferData, ProdPriceData';
                    break;
                
                // 학원 단과
                case 'off_lecture' :
                        $column .= ', IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, SubjectIdx, SubjectName, CourseIdx, CourseName
                                , CampusCcd, CampusCcdName, FixNumber, StudyStartDate, StudyEndDate, WeekArrayName, Amount, StudyPatternName, StudyApplyCcdName
                                , ProfIdx, wProfIdx, wProfName, ProfSlogan, LecSaleType, SalesAbleName, ProdPriceData, fn_product_content(ProdCode, "633002") as Content';
                    break;

                //추천-선택 패키지
                case 'adminpack_lecture' :
                        $column .= ', StudyPeriod, MultipleApply, StudyStartDate, PackTypeCcd, PackCateCcd, PackCateEtcMemo, PackSelCount
                            , CourseIdx, CourseName, ProfIdx_String, wProfName_String, fn_product_sublecture_codes(ProdCode) as ProdCodeSub, ProdPriceData';
                    break;

                //사용자패키지
                case 'userpack_lecture' :
                    $column .= ', StudyStartDate, IsSelLecCount,SelCount, PackSaleData';
                    break;

                // 교재상품
                case 'book' :
                        $column .= ', wSaleCcd, wIsUse, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, SubjectIdx, SubjectName, ProfIdx, wProfIdx, wProfName
                            , CourseIdx, CourseName, ProfSlogan, ProfReferData, ProdPriceData';
                    break;

                default :
                        return 0;
                    break;
            }
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column . $add_column, $arr_condition, $limit, $offset, $order_by);

    }

    /**
     * 판매가능, 판매예정 상품 목록 조회
     * @param $learn_pattern
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $add_column
     * @return array|int
     */
    public function listSalesProduct($learn_pattern, $column, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $add_column = '')
    {
        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => ['IsSalesAble' => 'Y']
        ]);

        switch ($learn_pattern) {
            // 온라인 단강좌, 온라인 무료강좌, 학원 단과
            case 'on_lecture' :
            case 'on_free_lecture' :
            case 'off_lecture' :
                    $arr_condition = array_merge_recursive($arr_condition, [
                        'EQ' => ['LecSaleType' => 'N']   // 일반강의
                    ]);
                break;
        }

        return $this->listProduct($learn_pattern, $column, $arr_condition, $limit, $offset, $order_by, $add_column);
    }

    /**
     * 단일상품 조회
     * @param $learn_pattern
     * @param $prod_code
     * @param string $add_column
     * @return array
     */
    public function findProductByProdCode($learn_pattern, $prod_code, $add_column = '')
    {
        $arr_condition = ['EQ' => ['ProdCode' => $prod_code, 'IsUse' => 'Y']];
        $data = $this->listProduct($learn_pattern, false, $arr_condition, null, null, [], $add_column);

        return element('0', $data, []);
    }

    /**
     * 판매가능한 상품 조회 (판매예정 제외)
     * @param $learn_pattern
     * @param $prod_code
     * @param string $add_column
     * @return array
     */
    public function findOnlySaleProductByProdCode($learn_pattern, $prod_code, $add_column = '')
    {
        $arr_condition = [
            'EQ' => ['ProdCode' => $prod_code, 'IsSalesAble' => 'Y', 'SaleStatusCcd' => $this->_available_sale_status_ccd]
        ];

        switch ($learn_pattern) {
            // 온라인 단강좌, 온라인 무료강좌, 학원 단과
            case 'on_lecture' :
            case 'on_free_lecture' :
            case 'off_lecture' :
                    $arr_condition = array_merge_recursive($arr_condition, [
                        'EQ' => ['LecSaleType' => 'N']   // 일반강의
                    ]);
                break;
        }

        $data = $this->listProduct($learn_pattern, false, $arr_condition, null, null, [], $add_column);

        return element('0', $data, []);
    }

    /**
     * 상품 컨텐츠 조회
     * @param array $prod_code
     * @return array
     */
    public function findProductContents($prod_code = [])
    {
        $prod_code = is_array($prod_code) ? $prod_code : array($prod_code);
        $column = 'PC.ProdCode, PC.ContentTypeCcd, CD.CcdName as ContentTypeCcdName, PC.Content';
        $arr_condition = [
            'EQ' => ['PC.IsStatus' => 'Y'], 'IN' => ['PC.ProdCode' => $prod_code]
        ];

        return $this->_conn->getJoinListResult($this->_table['product_content'] . ' as PC', 'inner', $this->_table['code'] . ' as CD', 'PC.ContentTypeCcd = CD.Ccd'
            , $column, $arr_condition, null, null, ['PC.ProdCode' => 'asc', 'PC.ContentTypeCcd' => 'asc']
        );
    }

    /**
     * 상품 구매교재 정보 조회
     * @param $prod_code
     * @return array
     */
    public function findProductSaleBooks($prod_code)
    {
        $column = 'ProdBookCode, ProdBookName, BookCateCode, BookCateName, BookProvisionCcd, BookProvisionCcdName, SalePrice, SaleRate, SaleRateUnit, SaleDiscType, RealSalePrice        
	        , wAuthorNames, wPublName, wPublDate, wEditionCcd, wEditionCcdName, wEditionSize, wEditionCnt, wPageCnt, wPrintCnt
	        , wSaleCcd, wSaleCcdName, wBookDesc, wAuthorDesc, wTableDesc, wAttachImgPath, wAttachImgOgName, wAttachImgLgName, wAttachImgMdName, wAttachImgSmName';

        $arr_condition = ['EQ' => ['ProdCode' => $prod_code]];
        $order_by = ['BookProvisionCcd' => 'asc', 'PrpIdx' => 'asc'];

        return $this->_conn->getListResult($this->_table['product_salebook'], $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 상품 강의 목록 조회
     * @param $prod_code
     * @return mixed
     */
    public function findProductLectureUnits($prod_code)
    {
        $column = 'P.ProdCode, PL.wLecIdx, WL.wLecName, WLU.wUnitIdx, WLU.wUnitName, WLU.wUnitNum, WLU.wUnitLectureNum, WLU.wHD, WLU.wSD, WLU.wWD
            , WLU.wUnitAttachFileReal, WLU.wUnitAttachFile, WLU.wRuntime, WLU.wBookPage, WLU.wShootingDate, WLU.wProfIdx';
        $from = '
            from ' . $this->_table['product'] . ' as P		
                inner join ' . $this->_table['product_lecture'] . ' as PL
                    on P.ProdCode = PL.ProdCode
                inner join ' . $this->_table['cms_lecture'] . ' as WL
                    on PL.wLecIdx = WL.wLecIdx
                inner join ' . $this->_table['cms_lecture_unit'] . ' as WLU
                    on PL.wLecIdx = WLU.wLecIdx
            where P.ProdCode = ?
                and P.IsUse = "Y" and P.IsStatus = "Y"
                and WL.wIsUse = "Y" and WL.wIsStatus = "Y"
                and WLU.wIsUse = "Y" and WLU.wIsStatus = "Y"            
        ';
        $order_by = 'order by P.ProdCode desc, WLU.wOrderNum asc, WLU.wUnitIdx desc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by, [$prod_code]);

        return $query->result_array();
    }

    /**
     * 수강생교재의 부모상품코드 조회
     * @param $prod_book_code
     * @return array
     */
    public function findParentProductToStudentBook($prod_book_code)
    {
        $column = 'PP.ProdCode';
        $from = '
            from ' . $this->_table['product'] . ' as BP
                inner join ' . $this->_table['product_r_product'] . ' as PP
                    on BP.ProdCode = PP.ProdCodeSub
                inner join ' . $this->_table['product'] . ' as LP
                    on PP.ProdCode = LP.ProdCode    
            where BP.ProdCode = ?
                and BP.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '"
                and PP.OptionCcd = "' . $this->_student_book_ccd . '"
                and PP.IsStatus = "Y"	
                and LP.ProdTypeCcd in ("' . $this->_prod_type_ccd['on_lecture'] . '", "' . $this->_prod_type_ccd['off_lecture'] . '")                            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$prod_book_code]);

        return $query->result_array();
    }

    /**
     * 상품별 단강좌 목록 조회 (패키지)
     * @param $prod_code
     * @param array $prod_sub_codes
     * @return mixed
     */
    public function findProductSubLectures($prod_code, $prod_sub_codes = [])
    {
        $column = 'PS.ProdCode, PS.ProdCodeSub, P.ProdName as ProdNameSub, PS.IsEssential, VPP.ReprProfIdx, VPP.ReprWProfName';
        $from = '
            from ' . $this->_table['product_r_sublecture'] . ' as PS
                inner join ' . $this->_table['product'] . ' as P
                    on PS.ProdCodeSub = P.ProdCode
                inner join ' . $this->_table['product_professor_concat'] . ' as VPP
                    on PS.ProdCodeSub = VPP.ProdCode
            where PS.ProdCode = ?
                and PS.IsStatus = "Y"
                and P.IsStatus = "Y"     
        ';
        $where = $this->_conn->makeWhere(['IN' => ['PS.ProdCodeSub' => $prod_sub_codes]])->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where, [$prod_code]);

        return $query->result_array();
    }

    /**
     * 랜딩 컨텐츠 추출
     * @param $lidx
     * @return mixed
     */
    public function findProductLanding($lidx)
    {
        $column = ' A.* ';
        $from = '
            from lms_landing A
            where A.IsUse = "Y" and A.IsStatus = "Y"
        ';

        $arr_condition = [
            'EQ' => ['A.lidx' => $lidx]
            ,'RAW' => ['NOW() between ' => 'DispStartDatm and DispEndDatm']
        ];

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }
}
