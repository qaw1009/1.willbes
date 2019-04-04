<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    protected $_table = [
        'on_lecture' => 'vw_product_on_lecture',
        'on_free_lecture' => 'vw_product_on_free_lecture',
        'adminpack_lecture' => 'vw_product_adminpack_lecture',
        'userpack_lecture' => 'vw_product_userpack_lecture',
        'periodpack_lecture' => 'vw_product_periodpack_lecture',
        'off_lecture' => 'vw_product_off_lecture',
        'off_pack_lecture' => 'vw_product_off_pack_lecture',
        'book' => 'vw_product_book',
        'mock_exam' => 'vw_product_mocktest',
        'delivery_price' => 'vw_product_delivery_price',
        'delivery_add_price' => 'vw_product_delivery_add_price',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_division' => 'lms_product_division',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'product_r_product' => 'lms_product_r_product',
        'product_salebook' => 'vw_product_salebook',
        'product_content' => 'lms_product_content',
        'product_memo' => 'lms_product_memo',
        'product_professor_concat' => 'vw_product_r_professor_concat',
        'product_professor_concat_repr' => 'vw_product_r_professor_concat_repr',
        'cms_lecture' => 'wbs_cms_lecture',
        'cms_lecture_unit' => 'wbs_cms_lecture_unit',
        'code' => 'lms_sys_code'
    ];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003'];

    // 수강생 교재 공통코드
    public $_student_book_ccd = '610003';

    // 무료강좌타입 공통코드 > 일반, 보강동영상
    public $_free_lec_type_ccd = ['normal' => '652001', 'bogang' => '652002'];

    // 상품 판매상태 > 판매가능, 판매예정
    public $_sale_status_ccds = ['available' => '618001', 'expected' => '618002'];

    // 학원 단과,종합반 접수상태 > 접수예정, 접수중
    public $_accept_status_ccds = ['expected' => '675001', 'available' => '675002'];

    // 판매가능 공통코드 (판매가능, 판매중)
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001'];

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
            $column = 'ProdCode, SiteCode, ProdName, SaleStatusCcd, IsSaleEnd, SaleStartDatm, SaleEndDatm, IsSalesAble, IsUse, RegDatm';

            switch ($learn_pattern) {
                // 온라인 단강좌, 온라인 무료강좌
                case 'on_lecture' :
                case 'on_free_lecture' :
                        $column .= ', CateCode, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, StudyPeriod, MultipleApply, StudyStartDate
                            , SubjectIdx, SubjectName, CourseIdx, CourseName, OrderNumCourse, SchoolYear, ProfIdx, wProfIdx, wProfName, ProfNickName, ProfSlogan
                            , wLecIdx, wUnitLectureCnt, wLectureProgressCcd, wLectureProgressCcdName, LecSaleType, LectureSampleData, ProdBookData, ProdBookMemo
                            , wScheduleCount, ProfReferData, ProdPriceData';
                        
                        // 온라인 무료강좌 컬럼 추가 (무료강좌타입, 보강동영상 비밀번호)
                        if ($learn_pattern == 'on_free_lecture') {
                            $column .= ', FreeLecTypeCcd, FreeLecPasswd';
                        }
                    break;
                
                // 학원 단과
                case 'off_lecture' :
                        $column .= ', CateCode, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, SubjectIdx, SubjectName, CourseIdx, CourseName, OrderNumCourse, SchoolYear
                            , CampusCcd, CampusCcdName, FixNumber, StudyPeriod, StudyStartDate, StudyEndDate, WeekArrayName, IFNULL(AmountDisp,Amount) AS Amount, StudyPatternCcd, StudyPatternCcdName
                            , AcceptStatusCcd, AcceptStatusCcdName, StudyApplyCcd, StudyApplyCcdName, ProfIdx, wProfIdx, wProfName, ProfNickName, ProfSlogan, LecSaleType, ProdPriceData
                            , fn_product_content(ProdCode, "633002") as Content';
                    break;

                // 학원 종합반
                case 'off_pack_lecture' :
                        $column .= ', CateCode, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo,  CourseIdx, CourseName, OrderNumCourse, SchoolYear,
                            , CampusCcd, CampusCcdName, FixNumber, StudyPatternCcd, StudyPatternCcdName
                            , AcceptStatusCcd, AcceptStatusCcdName, StudyApplyCcd, StudyApplyCcdName, LecSaleType, ProdPriceData
                            , SchoolStartYear,SchoolStartMonth,PackSelCount,
                            , fn_product_content(ProdCode, "633002") as Content';
                    break;

                //추천-선택 패키지
                case 'adminpack_lecture' :
                        $column .= ', CateCode, StudyPeriod, MultipleApply, StudyStartDate, StudyStartDateYM, PackTypeCcd, PackCateCcd, PackCateEtcMemo, PackSelCount
                            , CourseIdx, CourseName, OrderNumCourse, SchoolYear, ProfIdx_String, wProfName_String, fn_product_sublecture_codes(ProdCode) as ProdCodeSub, ProdPriceData';
                    break;

                //사용자패키지
                case 'userpack_lecture' :
                        $column .= ', CateCode, SchoolYear, StudyStartDate, StudyStartDateYM, IsSelLecCount,SelCount, PackSaleData';
                    break;

                //기간제패키지
                case 'periodpack_lecture' :
                        $column .= ', CateCode, StudyPeriod, MultipleApply, StudyStartDate, StudyStartDateYM, PackTypeCcd, PackCateCcd, PackCateEtcMemo, PackSelCount
                            , SchoolYear, fn_product_sublecture_codes(ProdCode) as ProdCodeSub, ProdPriceData';
                    break;

                // 교재상품
                case 'book' :
                        $column .= ', CateCode, wSaleCcd, wIsUse, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, SchoolYear, CourseIdx, CourseName
                            , SubjectIdx, ProfIdx, ProdPriceData';
                    break;

                // 모의고사
                case 'mock_exam' :
                        $column .= ', CateCode, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, TakeFormsCcd, AcceptStatusCcd, ClosingPerson, ProdPriceData';
                    break;

                // 배송료 상품
                case 'delivery_price' :
                case 'delivery_add_price' :
                        $column .= ', IsCoupon, IsCart, ProdPriceData';
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
        $arr_condition = array_merge_recursive($arr_condition, $this->getSalesProductCondition($learn_pattern));

        return $this->listProduct($learn_pattern, $column, $arr_condition, $limit, $offset, $order_by, $add_column);
    }

    /**
     * 판매가능, 판매예정 상품 과목별 {N}개씩 조회 (온라인단강좌, 무료강좌, 학원단과만 해당)
     * @param $learn_pattern
     * @param array $arr_condition
     * @param int $limit
     * @return mixed
     */
    public function listSalesProductLimitBySubjectIdx($learn_pattern, $arr_condition = [], $limit = 2)
    {
        $column = 'row_number() over (partition by SubjectIdx order by ProdCode desc) as RowNum
            , ProdCode, ProdName, CateCode, SubjectIdx, SubjectName, wProfName, ProfNickName
            , ifnull(JSON_VALUE(ProfReferData, "$.lec_list_img"), "") as ProfLecListImg
            , ifnull(fn_professor_refer_value(ProfIdx, "class_detail_img"), "") as ProfClassImg';
        $learn_pattern != 'off_lecture' && $column .= ', if(LectureSampleData = "N", "N", JSON_VALUE(LectureSampleData, "$[0].wUnitIdx")) as wUnitIdx';
        $arr_condition = array_merge_recursive($arr_condition, $this->getSalesProductCondition($learn_pattern));

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = /** @lang text */ '
            select * from (
                select ' . $column . ' from ' . $this->_table[$learn_pattern] . $where . '
            ) U
            where RowNum < ? 
            order by SubjectIdx asc, ProdCode desc';

        // 쿼리 실행
        $query = $this->_conn->query($query, [$limit + 1]);
        
        return $query->result_array();
    }

    /**
     * 단일상품 조회
     * @param string $learn_pattern
     * @param int $prod_code
     * @param string $add_column
     * @param array $arr_condition
     * @return mixed
     */
    public function findProductByProdCode($learn_pattern, $prod_code, $add_column = '', $arr_condition = [])
    {
        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['ProdCode' => $prod_code]]);
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
    public function findOnlySalesProductByProdCode($learn_pattern, $prod_code, $add_column = '')
    {
        $arr_condition = array_merge_recursive([
                'EQ' => ['ProdCode' => $prod_code, 'SaleStatusCcd' => $this->_available_sale_status_ccd['product']]
            ], $this->getSalesProductCondition($learn_pattern));

        $data = $this->listProduct($learn_pattern, false, $arr_condition, null, null, [], $add_column);

        return element('0', $data, []);
    }

    /**
     * 판매가능, 판매예정 상품 목록 조회 조건 리턴
     * @param $learn_pattern
     * @return array
     */
    public function getSalesProductCondition($learn_pattern)
    {
        $arr_condition = [
            'EQ' => ['IsSaleEnd' => 'N', 'IsUse' => 'Y'],
            'IN' => ['SaleStatusCcd' => array_values($this->_sale_status_ccds)],
            'RAW' => ['NOW() between ' => 'SaleStartDatm and SaleEndDatm']
        ];

        switch ($learn_pattern) {
            // 온라인 단강좌, 온라인 무료강좌
            case 'on_lecture' :
            case 'on_free_lecture' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'wIsUse' => 'Y']   // 일반강의, 마스터강의 사용여부
                ]);
                break;
            // 학원 단과
            case 'off_lecture' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'wIsUse' => 'Y', 'IsLecOpen' => 'Y'],   // 일반강의, 마스터강의 사용여부, 강의개설여부
                    'IN' => ['AcceptStatusCcd' => array_values($this->_accept_status_ccds)]   //접수예정, 접수중
                ]);
                break;
            // 학원 종합반
            case 'off_pack_lecture' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'IsLecOpen' => 'Y'],   // 일반강의, 강의개설여부
                    'IN' => ['AcceptStatusCcd' => array_values($this->_accept_status_ccds)]   //접수예정, 접수중
                ]);
                break;
            // 교재
            case 'book' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => ['wSaleCcd' => $this->_available_sale_status_ccd['book'], 'wIsUse' => 'Y']   // WBS 교재 판매상태 (판매중), 사용여부
                ]);
                break;
            // 모의고사
            case 'mock_exam' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => ['AcceptStatusCcd' => $this->_accept_status_ccds['available']]   // 접수중
                ]);
                break;
        }

        return $arr_condition;
    }

    /**
     * 상품강좌정보 조회
     * @param array $prod_code
     * @return array|int|mixed
     */
    public function findProductLectureInfo($prod_code = [])
    {
        $multiple_lec_time_ccd = '612002';  // 배수제한타입 > 전체 강의시간에 배수 적용
        $column = 'P.ProdCode, P.ProdTypeCcd, PL.LearnPatternCcd, ifnull(PL.IsLecStart, "N") as IsLecStart, PL.StudyStartDate, PL.StudyEndDate
            , ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate) + 1, 0)) as StudyPeriod            
        	, PL.MultipleTypeCcd, PL.MultipleApply, ifnull(PL.AllLecTime, 0) as AllLecTime
        	, if(PL.MultipleTypeCcd = "' . $multiple_lec_time_ccd . '", convert(PL.AllLecTime * 60 * PL.MultipleApply, int), 0) as MultipleAllLecSec
	        , PL.IsPackLecStartType';
        $arr_condition = [
            'EQ' => ['P.IsStatus' => 'Y'], 'IN' => ['P.ProdCode' => (array) $prod_code]
        ];

        $data = $this->_conn->getJoinListResult($this->_table['product'] . ' as P', 'inner', $this->_table['product_lecture'] . ' as PL', 'P.ProdCode = PL.ProdCode'
            , $column, $arr_condition
        );

        return is_array($prod_code) === true ? $data : element('0', $data, []);
    }

    /**
     * 상품 컨텐츠 조회
     * @param array $prod_code
     * @param array $conten_type_ccd
     * @return array|int
     */
    public function findProductContents($prod_code = [], $conten_type_ccd = [])
    {
        $column = 'PC.ProdCode, PC.ContentTypeCcd, CD.CcdName as ContentTypeCcdName, PC.Content';
        $arr_condition = [
            'EQ' => ['PC.IsStatus' => 'Y'], 'IN' => ['PC.ProdCode' => (array) $prod_code, 'PC.ContentTypeCcd' => $conten_type_ccd]
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
            , WLU.wUnitAttachFileReal, WLU.wUnitAttachFile, WLU.wRuntime, WLU.wBookPage, WLU.wShootingDate, WLU.wProfIdx,WL.wAttachPath';
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
     * 해당 강좌상품의 서브강좌 중 해당 수강생교재를 포함하고 있는 단강좌 코드 리턴
     * @param string $prod_lecture_code [강좌상품코드]
     * @param string $prod_book_code [교재상품코드]
     * @return mixed
     */
    public function findLectureProductToStudentBook($prod_lecture_code, $prod_book_code)
    {
        $column = 'LP.ProdLecCode as ProdCode';
        // 연결상품 상품타입(교재상품) 조건 제외 (실DB 상품타입 데이터 부정확함) => and PRP.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '"
        $from = '
            from (
                select ifnull(PRS.ProdCodeSub, P.ProdCode) as ProdLecCode
                from ' . $this->_table['product'] . ' as P
                    left join ' . $this->_table['product_r_sublecture'] . ' as PRS
                        on P.ProdCode = PRS.ProdCode and PRS.IsStatus = "Y"
                where P.ProdCode = ?    #강좌코드
                    and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
                    and P.IsStatus = "Y"		
            ) as LP
                inner join ' . $this->_table['product_r_product'] . ' as PRP
                    on LP.ProdLecCode = PRP.ProdCode
            where PRP.ProdCodeSub = ?   #교재코드
                and PRP.OptionCcd = "' . $this->_student_book_ccd . '"
                and PRP.IsStatus = "Y"            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$prod_lecture_code, $prod_book_code]);

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
        $column = 'PS.ProdCode, PS.ProdCodeSub, P.ProdName as ProdNameSub, PS.IsEssential, VPP.ProfIdx_String as ReprProfIdx, VPP.wProfName_String as ReprWProfName';
        $from = '
            from ' . $this->_table['product_r_sublecture'] . ' as PS
                inner join ' . $this->_table['product'] . ' as P
                    on PS.ProdCodeSub = P.ProdCode
                inner join ' . $this->_table['product_professor_concat_repr'] . ' as VPP
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
     * 기간제패키지 서브강좌 과목/교수 조회 (기간제패키지 주문일 경우 사용)
     * @param int $prod_code [기간제패키지 상품코드]
     * @return mixed
     */
    public function findPeriodPackageSubjectProfIdx($prod_code)
    {
        $column = 'PL.SubjectIdx, PD.ProfIdx';
        $from = '
            from ' . $this->_table['product_r_sublecture'] . ' as PS
                inner join ' . $this->_table['product'] . ' as P
                    on PS.ProdCodeSub = P.ProdCode
                inner join ' . $this->_table['product_lecture'] . ' as PL
                    on P.ProdCode = PL.ProdCode
                inner join ' . $this->_table['product_division'] . ' as PD
                    on P.ProdCode = PD.ProdCode
            where PS.ProdCode = ? and PS.IsStatus = "Y"
                and P.IsStatus = "Y"
                and PD.IsStatus = "Y" and PD.IsReprProf = "Y"
            group by PL.SubjectIdx, PD.ProfIdx';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$prod_code]);

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
