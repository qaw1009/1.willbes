<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    protected $_table = [
        'on_lecture' => 'vw_product_on_lecture',
        'on_lecture_before' => 'vw_product_on_lecture',
        'on_free_lecture' => 'vw_product_on_free_lecture',
        'adminpack_lecture' => 'vw_product_adminpack_lecture',
        'userpack_lecture' => 'vw_product_userpack_lecture',
        'periodpack_lecture' => 'vw_product_periodpack_lecture',
        'off_lecture' => 'vw_product_off_lecture',
        'off_lecture_before' => 'vw_product_off_lecture',
        'off_pack_lecture' => 'vw_product_off_pack_lecture',
        'book' => 'vw_product_book',
        'mock_exam' => 'vw_product_mocktest',
        'delivery_price' => 'vw_product_delivery_price',
        'delivery_add_price' => 'vw_product_delivery_add_price',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_division' => 'lms_product_division',
        'product_r_category' => 'lms_product_r_category',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'product_r_product' => 'lms_product_r_product',
        'product_lecture_disc' => 'lms_product_lecture_disc',
        'product_lecture_disc_info' => 'lms_product_lecture_disc_info',
        'product_affiliate_disc_info' => 'lms_product_affiliate_disc_info',
        'product_salebook' => 'vw_product_salebook',
        'product_content' => 'lms_product_content',
        'product_memo' => 'lms_product_memo',
        'product_professor_concat' => 'vw_product_r_professor_concat',
        'product_professor_concat_repr' => 'vw_product_r_professor_concat_repr',
        'cms_lecture' => 'wbs_cms_lecture',
        'cms_lecture_unit' => 'wbs_cms_lecture_unit',
        'bms_book_combine' => 'wbs_bms_book_combine',
        'category' => 'lms_sys_category',
        'code' => 'lms_sys_code',
        'product_series' => 'lms_product_subject_r_category_r_code'

    ];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재, 사은품)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003', 'freebie' => '636004'];

    // 수강생 교재 공통코드
    public $_student_book_ccd = '610003';

    // 무료강좌타입 공통코드 > 일반, 보강동영상, 비로그인
    public $_free_lec_type_ccd = ['normal' => '652001', 'bogang' => '652002', 'logout' => '652003'];

    // 상품 판매상태 > 판매가능, 판매예정
    public $_sale_status_ccds = ['available' => '618001', 'expected' => '618002'];

    // 학원 단과,종합반 접수상태 > 접수예정, 접수중, 접수마감(추가-21.05.10 : 한주연대리)
    public $_accept_status_ccds = ['expected' => '675001', 'available' => '675002', 'end' => '675003'];

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
            $column = (($learn_pattern === 'off_pack_lecture' || $learn_pattern === 'adminpack_lecture' ) ? '' :  ' straight_join \'\' as TempCol, ');
            $column .= 'ProdCode, SiteCode, ProdName, SaleStatusCcd, IsSaleEnd, SaleStartDatm, SaleEndDatm, IsSalesAble, IsUse, RegDatm';

            switch ($learn_pattern) {
                // 온라인 단강좌, 온라인 무료강좌
                case 'on_lecture' :
                case 'on_lecture_before' :
                case 'on_free_lecture' :
                        $column .= ', CateCode, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, StudyPeriod, MultipleApply, StudyStartDate
                            , SubjectIdx, SubjectName, CourseIdx, CourseName, OrderNumCourse, SchoolYear, ProfIdx, wProfIdx, wProfName, ProfNickName, ProfSlogan
                            , wLecIdx, wUnitLectureCnt, wLectureProgressCcd, wLectureProgressCcdName, LecSaleType, LectureSampleData, ProdBookData, ProdBookMemo
                            , wScheduleCount, ProfReferData, ProdPriceData, IsOpenwUnitNum, IsOpenStudyComment, AppellationCcdName 
                            , ProfNickNameAppellation, wAttachFileReal, wAttachFile, wAttachPath, LecTypeCcd, SiteUrl, SiteName, ProdCateName, OrderNum';
                        
                        // 온라인 무료강좌 컬럼 추가 (무료강좌타입, 보강동영상 비밀번호)
                        if ($learn_pattern == 'on_free_lecture') {
                            $column .= ', FreeLecTypeCcd, FreeLecPasswd';
                        }
                    break;
                
                // 학원 단과, 학원 단과 선수강좌
                case 'off_lecture' :
                case 'off_lecture_before' :
                        $column .= ', CateCode, IsBest, IsNew, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo, SubjectIdx, SubjectName, CourseIdx, CourseName, OrderNumCourse, SchoolYear
                            , CampusCcd, CampusCcdName, FixNumber, StudyPeriod, StudyStartDate, StudyEndDate, WeekArrayName, IFNULL(AmountDisp,Amount) AS Amount, StudyPatternCcd, StudyPatternCcdName
                            , AcceptStatusCcd, AcceptStatusCcdName, StudyApplyCcd, StudyApplyCcdName, ProfIdx, wProfIdx, wProfName, ProfNickName, ProfSlogan, LecSaleType, ProdPriceData
                            , fn_product_content(ProdCode, "633002") as Content,ProfReferData, ProdBookData, ProdBookMemo, AppellationCcdName
                            , ProfNickNameAppellation, DiscIdx, BlIdx, LecType, ConditionType, ValidPeriodStartDate, ValidPeriodEndDate, IsDup, IsBeforeLectureAble, OrderNum';
                        if($learn_pattern == 'off_lecture') {
                            $column .= ', SiteUrl';
                        }
                    break;

                // 학원 종합반
                case 'off_pack_lecture' :
                        $column .= ', CateCode, IsCoupon, IsCart, IsFreebiesTrans, IsDeliveryInfo,  CourseIdx, CourseName, OrderNumCourse, SchoolYear,
                            , CampusCcd, CampusCcdName, FixNumber, StudyPatternCcd, StudyPatternCcdName
                            , AcceptStatusCcd, AcceptStatusCcdName, StudyApplyCcd, StudyApplyCcdName, LecSaleType, ProdPriceData
                            , SchoolStartYear,SchoolStartMonth,PackSelCount,
                            , fn_product_content(ProdCode, "633002") as Content, PackTypeCcd, SiteUrl';
                    break;

                //추천-선택 패키지
                case 'adminpack_lecture' :
                        $column .= ', CateCode, StudyPeriod, MultipleApply, StudyStartDate, StudyStartDateYM, PackTypeCcd, PackCateCcd, PackCateEtcMemo, PackSelCount
                            , CourseIdx, CourseName, OrderNumCourse, SchoolYear, ProfIdx_String, wProfName_String, fn_product_sublecture_codes(ProdCode) as ProdCodeSub, ProdPriceData
                            , SiteUrl, SiteName, ProdCateName, StudyPeriodCcd, StudyEndDate
                            ';
                    break;

                //사용자패키지
                case 'userpack_lecture' :
                        $column .= ', CateCode, SchoolYear, StudyStartDate, StudyStartDateYM, IsSelLecCount,SelCount, PackSaleData';
                    break;

                //기간제패키지
                case 'periodpack_lecture' :
                        $column .= ', CateCode, StudyPeriod, MultipleApply, StudyStartDate, StudyStartDateYM, PackTypeCcd, PackCateCcd, PackCateEtcMemo, PackSelCount
                            , SchoolYear, fn_product_sublecture_codes(ProdCode) as ProdCodeSub, ProdPriceData, StudyPeriodCcd, StudyEndDate';
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

        if($order_by == 'random') {
            $this->_conn->order_by('id', 'RANDOM');
        }

        if (empty($add_column) === false) {
            $column .= $add_column;
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column, $arr_condition, $limit, $offset, $order_by);
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

        // todo : 쿼리 속도를 위해 straight_join 추가 
        $query = /** @lang text */ '
            select * from (
                select straight_join ' . $column . ' from ' . $this->_table[$learn_pattern] . $where . '
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

        return array_get($data, '0', []);
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
        $arr_condition = ['EQ' => ['ProdCode' => $prod_code, 'SaleStatusCcd' => $this->_available_sale_status_ccd['product']]];

        // 교재일 경우 WBS 교재 판매상태 (판매중) 추가
        if ($learn_pattern == 'book') {
            $arr_condition['EQ']['wSaleCcd'] = $this->_available_sale_status_ccd['book'];
        }

        $arr_condition = array_merge_recursive($arr_condition, $this->getSalesProductCondition($learn_pattern));

        $data = $this->listProduct($learn_pattern, false, $arr_condition, null, null, [], $add_column);

        return array_get($data, '0', []);
    }

    /**
     * 판매가능, 판매예정 상품 목록 조회 조건 리턴
     * @param string $learn_pattern [상품타입/학습형태]
     * @param string $as [테이블 별칭, alias]
     * @return array
     */
    public function getSalesProductCondition($learn_pattern, $as = '')
    {
        // 테이블 별칭
        $as = empty($as) === false ? $as . '.' : '';

        // 기본 판매조건
        $arr_condition = [
            'EQ' => [$as . 'IsSaleEnd' => 'N', $as . 'IsUse' => 'Y'],
            'IN' => [$as . 'SaleStatusCcd' => array_values($this->_sale_status_ccds)],
            'RAW' => ['NOW() between ' => $as . 'SaleStartDatm and ' . $as . 'SaleEndDatm']
        ];

        switch ($learn_pattern) {
            // 온라인 단강좌, 온라인 무료강좌
            case 'on_lecture' :
            case 'on_lecture_before' : //선수강좌
            case 'on_free_lecture' :
                $lec_sale_type = $learn_pattern == 'on_lecture_before' ? 'B' : 'N';   // 강의판매구분 (일반/선수강좌)
                $is_before_lecture_able = $learn_pattern == 'on_lecture_before' ? 'Y' : null; //선수강좌신청가능여부
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => [$as . 'LecSaleType' => $lec_sale_type, $as . 'wIsUse' => 'Y'
                        , $as . 'IsBeforeLectureAble' => $is_before_lecture_able
                    ]   // 강의판매구분, 마스터강의, 선수강좌신청가능여부 사용여부
                ]);
                break;
            // 학원 단과, 학원 단과 선수강좌
            case 'off_lecture' :
            case 'off_lecture_before' :
                $lec_sale_type = $learn_pattern == 'off_lecture_before' ? 'B' : 'N';   // 강의판매구분 (일반/선수강좌)
                $is_before_lecture_able = $learn_pattern == 'off_lecture_before' ? 'Y' : null; //선수강좌신청가능여부
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => [$as . 'LecSaleType' => $lec_sale_type, $as . 'wIsUse' => 'Y'
                                , $as . 'IsLecOpen' => 'Y', $as . 'IsBeforeLectureAble' => $is_before_lecture_able],   // 강의판매구분, 마스터강의 사용여부, 강의개설여부, 선수강좌신청가능여부
                    'IN' => [$as . 'AcceptStatusCcd' => array_values($this->_accept_status_ccds)]   // 접수예정, 접수중, 접수마감
                ]);
                break;
            // 학원 종합반
            case 'off_pack_lecture' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => [$as . 'LecSaleType' => 'N', $as . 'IsLecOpen' => 'Y'],   // 일반강의, 강의개설여부
                    'IN' => [$as . 'AcceptStatusCcd' => array_values($this->_accept_status_ccds)]   // 접수예정, 접수중, 접수마감
                ]);
                break;
            // 교재
            case 'book' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => [$as . 'wIsUse' => 'Y']   // WBS 교재 사용여부
                ]);
                break;
            // 모의고사
            case 'mock_exam' :
                $arr_condition = array_merge_recursive($arr_condition, [
                    'EQ' => [$as . 'AcceptStatusCcd' => $this->_accept_status_ccds['available']]   // 접수중
                ]);
                break;
        }

        return $arr_condition;
    }

    /**
     * 상품정보 조회 (뷰 테이블을 사용하지 않고 상품 테이블을 직접 조회)
     * @param int|array $prod_code [상품코드]
     * @param string $add_column [추가조회 컬럼]
     * @param array $arr_condition [추가조회 조건]
     * @return mixed
     */
    public function findRawProductByProdCode($prod_code, $add_column = '', $arr_condition = [])
    {
        $learn_pattern_ccd_to_prod_code_sub = ['615002', '615003', '615007'];   // 서브강좌 조회하는 학습형태 공통코드 (사용자패키지, 운영자패키지, 학원종합반)

        $column = 'P.ProdCode, P.SiteCode, P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, PL.PackTypeCcd	
	        , if(PL.LearnPatternCcd in ?, fn_product_sublecture_codes(P.ProdCode), "") as ProdCodeSub  
	        , ifnull(fn_product_saleprice_data(P.ProdCode), "N") as ProdPriceData' . $add_column;
        $from = '
            from ' . $this->_table['product'] . ' as P
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on P.ProdCode = PL.ProdCode
            where P.ProdCode in ?
                and P.IsStatus = "Y"';

        $where = '';
        if (empty($arr_condition) === false) {
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where, [$learn_pattern_ccd_to_prod_code_sub, (array) $prod_code]);

        return $query->result_array();
    }

    /**
     * 상품강좌정보 조회
     * @param array $prod_code
     * @return array|int|mixed
     */
    public function findProductLectureInfo($prod_code = [])
    {
        $arr_prod_code = get_arr_var($prod_code, '0');
        $learn_pattern_ccd_to_end_date = '"615003", "615004"';  // 수강기간설정 > 수강종료일 기준이 적용되는 학습형태 (운영자, 기간제패키지)
        $study_period_end_date_ccd = '616002';  // 수강기간설정 > 수강종료일 기준
        $multiple_lec_time_ccd = '612002';  // 배수제한타입 > 전체 강의시간에 배수 적용
        $column = 'P.ProdCode, P.ProdTypeCcd, PL.LearnPatternCcd, if(PL.StudyPeriodCcd = "' . $study_period_end_date_ccd . '", "N", ifnull(PL.IsLecStart, "N")) as IsLecStart
            , PL.StudyStartDate, PL.StudyEndDate, PL.StudyPeriodCcd        
            , (case when PL.LearnPatternCcd in (' . $learn_pattern_ccd_to_end_date . ') and PL.StudyPeriodCcd = "' . $study_period_end_date_ccd . '" 
                then ifnull(datediff(PL.StudyEndDate, date_format(NOW(),"%Y-%m-%d")) + 1, 0)
                else ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate) + 1, 0))
              end) as StudyPeriod        
        	, PL.MultipleTypeCcd, PL.MultipleApply, ifnull(PL.AllLecTime, 0) as AllLecTime
        	, if(PL.MultipleTypeCcd = "' . $multiple_lec_time_ccd . '", convert(PL.AllLecTime * 60 * PL.MultipleApply, int), 0) as MultipleAllLecSec
	        , PL.IsPackLecStartType';
        $arr_condition = [
            'EQ' => ['P.IsStatus' => 'Y'], 'IN' => ['P.ProdCode' => $arr_prod_code]
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
        $order_by = 'order by P.ProdCode desc, WLU.wOrderNum asc, WLU.wUnitIdx asc';

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
     * 해당 강좌상품의 서브강좌 중 해당 수강생교재를 포함하고 있는 단강좌/학원단과 코드 리턴
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
                    and P.ProdTypeCcd in ("' . $this->_prod_type_ccd['on_lecture'] . '", "' . $this->_prod_type_ccd['off_lecture'] . '")
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
     * 상품 과목에 연결된 직렬 정보 추출
     * @param array $add_condition
     * @param array $order
     * @return mixed
     */
    public function findProductSubjectSeries($add_condition = [], $order = [])
    {
        //$column = 'distinct B.ChildCcd,C.CcdName';
        $column =' B.ChildCcd,C.CcdName,GROUP_CONCAT(distinct B.SubjectIdx) as subject_arr';
        $from = '
                from 
                    '.$this->_table['on_lecture'].' A 
                    join '.$this->_table['product_series'].' B on A.SubjectIdx = B.SubjectIdx 
                    join '.$this->_table['code'].' C on B.ChildCcd = C.Ccd 
                where
                        A.IsUse=\'Y\' and A.wIsUse=\'Y\'  
                        and B.IsStatus=\'Y\' 
                        and C.IsStatus=\'Y\' and C.IsUse=\'Y\' 
                ';
        $group_by = ' Group by B.ChildCcd,C.CcdName ';

        $where = $this->_conn->makeWhere($add_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $query = $this->_conn->query('select '. $column . $from . $where . $group_by. $order_by)->result_array();

        return $query;
    }

    /**
     * 자동지급 연결상품 조회
     * @param int $prod_code [상품코드]
     * @param string $prod_type [상품타입 (on_lecture, freebie)
     * @return array|int
     */
    public function findProductToProduct($prod_code, $prod_type)
    {
        $prod_type_ccd = $this->_prod_type_ccd[$prod_type];
        $column = 'P.ProdCode, P.ProdName';
        $arr_condition = [
            'EQ' => ['PP.ProdCode' => get_var($prod_code, 0), 'PP.ProdTypeCcd' => $prod_type_ccd, 'PP.IsStatus' => 'Y', 'P.IsStatus' => 'Y']
        ];
        
        return $this->_conn->getJoinListResult($this->_table['product_r_product'] . ' as PP', 'inner', $this->_table['product'] . ' as P'
            , 'PP.ProdCodeSub = P.ProdCode and PP.ProdTypeCcd = P.ProdTypeCcd'
            , $column, $arr_condition);
    }

    /**
     * 상품 가격 리턴
     * @param int $prod_code [상품코드]
     * @param string $price_type [가격구분 (R : 판매가, S : 정상가)
     * @param string $sale_type_ccd [판매구분공통코드 (기본값 : PC+모바일)
     * @return mixed
     */
    public function getProductSaleTypePrice($prod_code, $price_type, $sale_type_ccd = '613001')
    {
        $arr_price_type = ['S' => 'SalePrice', 'R' => 'RealSalePrice'];
        $price_column = array_get($arr_price_type, $price_type, 'RealSalePrice');

        $query = 'select fn_product_saletype_price(?, ?, ?) as Price';
        $data = $this->_conn->query($query, [$prod_code, $sale_type_ccd, $price_column])->row_array();

        return array_get($data, 'Price');
    }

    /**
     * 강좌할인율 리턴 (단강좌, 단과반 상품만 해당)
     * @param $arr_prod_code
     * @param $site_code
     * @return array|null
     */
    public function getLetureDiscRate($arr_prod_code, $site_code)
    {
        $result = null;
        $arr_learn_pattern_ccd = ['615001', '615006'];  // 단강좌, 단과반

        // 운영사이트 강좌할인율 설정여부 확인
        $cnt_rows = $this->_conn->getListResult($this->_table['product_lecture_disc'], 'DiscIdx'
            , ['EQ' => ['SiteCode' => get_var($site_code, '0'), 'IsUse' => 'Y', 'IsStatus' => 'Y']]);
        if (empty($cnt_rows) === true) {
            return null;
        }

        // 강좌할인율 조회 (사이트코드, 카테고리코드, 과정식별자 기준)
        $column = 'A.DiscIdx, B.DiscTitle, A.DiscRate, A.BundleProdCode';
        $from = '
            from (
                select P.SiteCode, PC.CateCode, PL.CourseIdx
                    , group_concat(P.ProdCode) as BundleProdCode	
                    , max(PDC.DiscIdx) as DiscIdx
                    , ifnull((select DiscRate 
                        from ' . $this->_table['product_lecture_disc_info'] . ' 
                        where DiscIdx = max(PDC.DiscIdx)
                            and DiscNum <= count(0)
                            and IsApply = "Y" and IsStatus = "Y" 
                        order by DiscNum desc limit 1
                      ), 0) as DiscRate		
                from ' . $this->_table['product'] . ' as P
                    inner join ' . $this->_table['product_lecture'] . ' as PL
                        on P.ProdCode = PL.ProdCode
                    inner join ' . $this->_table['product_r_category'] . ' as PC
                        on P.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                    inner join ' . $this->_table['product_lecture_disc'] . ' as PDC
                        on PDC.SiteCode = P.SiteCode and PDC.CateCode = PC.CateCode and PDC.CourseIdx = PL.CourseIdx and PDC.IsUse = "Y" and PDC.IsStatus = "Y"                             
                where P.ProdCode in ?
                    and P.SiteCode = ?
                    and P.ProdTypeCcd in ("' . $this->_prod_type_ccd['on_lecture'] . '", "' . $this->_prod_type_ccd['off_lecture'] . '")
                    and PL.LearnPatternCcd in ("' . $arr_learn_pattern_ccd[0] . '", "' . $arr_learn_pattern_ccd[1] . '")
                    and P.IsUse = "Y"
                    and P.IsStatus = "Y"                                        
                group by P.SiteCode, PC.CateCode, PL.CourseIdx
                having count(0) > 1
            ) A
                inner join ' . $this->_table['product_lecture_disc'] . ' as B
                    on A.DiscIdx = B.DiscIdx
            where A.DiscRate > 0
                and B.IsUse = "Y" 
                and B.IsStatus = "Y"                        
        ';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from, [$arr_prod_code, $site_code])->result_array();
        if (empty($data) === true) {
            return null;
        }

        // 상품코드별 할인정보 설정
        foreach ($data as $row) {
            $bundle_prod_code = explode(',', $row['BundleProdCode']);
            foreach ($bundle_prod_code as $prod_code) {
                $result[$prod_code] = [
                    'DiscIdx' => $row['DiscIdx'],
                    'DiscRate' => $row['DiscRate'],
                    'DiscType' => 'R',
                    'DiscRateUnit' => '%',
                    'DiscTitle' => $row['DiscTitle']
                ];
            }
        }

        return $result;
    }

    /**
     * 제휴구분별 할인율 조회
     * @param string $aff_type [제휴구분 (독서실 : readingroom)
     * @param int $site_code [사이트코드]
     * @param string $apply_type [적용구분 (단강좌 : on_lecture, 단과반 : off_lecture, 교재 : book, 모의고사 : mock_exam)]
     * @return array|int
     */
    public function findAffiliateDiscInfo($aff_type, $site_code, $apply_type = null)
    {
        $arr_aff_type_ccd = ['readingroom' => '725001'];    // 제휴구분공통코드
        $arr_apply_type_ccd = ['on_lecture' => '726001', 'off_lecture' => '726002', 'book' => '726003', 'mock_exam' => '726004'];   // 적용구분공통코드
        $apply_type_ccd = element($apply_type, $arr_apply_type_ccd);

        $column = 'AffIdx, AffName, ApplyTypeCcds, DiscRate, DiscType, if(DiscType = "R", "%", "원") as DiscRateUnit';
        $arr_condition = [
            'EQ' => [
                'AffTypeCcd' => element($aff_type, $arr_aff_type_ccd, '999999'), 'SiteCode' => get_var($site_code, '9999'),
                'IsUse' => 'Y', 'IsStatus' => 'Y'
            ],
            'LKB' => [
                'ApplyTypeCcds' => $apply_type_ccd
            ]
        ];
        $order_by = ['AffIdx' => 'desc'];

        return $this->_conn->getListResult($this->_table['product_affiliate_disc_info'], $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 제휴업체별 상품할인율 정보 리턴
     * @param int $aff_idx [제휴식별자]
     * @param int $site_code [사이트코드]
     * @return array|null
     */
    public function getAffiliateDiscRate($aff_idx, $site_code)
    {
        $result = null;
        // 적용구분공통코드 (장바구니 상품구분 값과 맵핑 (CartProdType))
        $arr_apply_type_ccd = ['on_lecture' => '726001', 'off_lecture' => '726002', 'book' => '726003', 'mock_exam' => '726004'];

        $column = 'AffIdx, AffName, ApplyTypeCcds, DiscRate, DiscType, if(DiscType = "R", "%", "원") as DiscRateUnit';
        $arr_condition = [
            'EQ' => [
                'AffIdx' => get_var($aff_idx, '0'), 'SiteCode' => get_var($site_code, '9999'),
                'IsUse' => 'Y', 'IsStatus' => 'Y'
            ]
        ];

        $data = $this->_conn->getFindResult($this->_table['product_affiliate_disc_info'], $column, $arr_condition);
        if (empty($data) === true) {
            return null;
        }

        // 적용구분별 할인정보 설정
        foreach (explode(',', $data['ApplyTypeCcds']) as $idx => $apply_type_ccd) {
            $apply_type = array_search($apply_type_ccd, $arr_apply_type_ccd);

            if (empty($apply_type) === false) {
                $result[$apply_type] = [
                    'DiscIdx' => $data['AffIdx'],
                    'DiscRate' => $data['DiscRate'],
                    'DiscType' => $data['DiscType'],
                    'DiscRateUnit' => $data['DiscRateUnit'],
                    'DiscTitle' => $data['AffName'] . ' 할인'
                ];
            }
        }

        return $result;
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
