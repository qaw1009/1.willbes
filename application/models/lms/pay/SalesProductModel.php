<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class SalesProductModel extends BaseOrderModel
{
    public $_table = [
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
        'reading_room' => 'vw_product_reading_room',
        'locker' => 'vw_product_locker',
        'deposit' => 'vw_product_deposit',
        'product' => 'lms_product',
        'product_book' => 'lms_product_book',
        'product_lecture' => 'lms_product_lecture',
        'product_division' => 'lms_product_division',
        'product_r_category' => 'lms_product_r_category',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'product_r_product' => 'lms_product_r_product',
        'product_lecture_disc' => 'lms_product_lecture_disc',
        'product_lecture_disc_info' => 'lms_product_lecture_disc_info',
        'cms_lecture_unit' => 'wbs_cms_lecture_unit'
    ];

    /**
     * 판매가능 상품 목록 조회
     * @param string $learn_pattern
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param bool $is_sales_check [판매가능 체크 여부]
     * @return array|int
     */
    public function listSalesProduct($learn_pattern, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $is_sales_check = true)
    {
        $column = 'ProdCode, SiteCode, ProdName, IsSalesAble, RegDatm';
        $arr_default_condition = [
            'EQ' => ['SaleStatusCcd' => $this->_available_sale_status_ccd['product'], 'IsSaleEnd' => 'N', 'IsUse' => 'Y'],
            'RAW' => ['NOW() between ' => 'SaleStartDatm and SaleEndDatm']
        ];

        switch ($learn_pattern) {
            // 온라인 단강좌, 온라인 무료강좌
            case 'on_lecture' :
            case 'on_free_lecture' :
                $column .= ', CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'wIsUse' => 'Y']   // 일반강의, 마스터강의 사용여부
                ]);
                break;

            // 학원 단과 (일반/선수강좌 구분없이 조회)
            case 'off_lecture' :
                $column .= ', LecSaleType, CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['wIsUse' => 'Y', 'IsLecOpen' => 'Y', 'AcceptStatusCcd' => $this->_available_sale_status_ccd['accept']]   // 마스터강의 사용여부, 강의개설여부, 접수상태
                ]);
                break;

            // 학원 종합반
            case 'off_pack_lecture' :
                $column .= ', CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'IsLecOpen' => 'Y', 'AcceptStatusCcd' => $this->_available_sale_status_ccd['accept']]   // 일반강의, 강의개설여부, 접수상태
                ]);
                break;

            // 추천-선택 패키지
            case 'adminpack_lecture' :
                $column .= ', CateCode, PackTypeCcd, ProdPriceData';
                break;

            // 사용자패키지
            case 'userpack_lecture' :
                $column .= ', CateCode, PackSaleData';
                break;

            // 기간제패키지
            case 'periodpack_lecture' :
                $column .= ', CateCode, PackTypeCcd, ProdPriceData';
                break;

            // 교재상품
            case 'book' :
                $column .= ', CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['wSaleCcd' => $this->_available_sale_status_ccd['book'], 'wIsUse' => 'Y']   // WBS 교재 판매상태 (판매중), 사용여부
                ]);
                break;

            // 모의고사
            case 'mock_exam' :
                $column .= ', CateCode, IsCart, ClosingPerson, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['AcceptStatusCcd' => $this->_available_sale_status_ccd['accept']]   // 접수상태
                ]);
                break;

            // 배송료, 추가배송료, 독서실, 사물함, 예치금, 모의고사 상품
            case 'delivery_price' :
            case 'delivery_add_price' :
            case 'reading_room' :
            case 'locker' :
            case 'deposit' :
                $column .= ', IsCart, ProdPriceData';
                break;

            default :
                return 0;
                break;
        }

        if (is_bool($is_count) === false || $is_count === true) {
            $column = $is_count;
        }

        // 판매여부 상관없이 조회
        if ($is_sales_check === false) {
            $arr_default_condition = [];
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column, array_merge_recursive($arr_default_condition, $arr_condition), $limit, $offset, $order_by);
    }

    /**
     * 판매가능 상품 조회 by 상품코드
     * @param string $learn_pattern
     * @param int $prod_code
     * @param bool|string $column
     * @param bool $is_sales_check [판매가능 체크 여부]
     * @return mixed
     */
    public function findSalesProductByProdCode($learn_pattern, $prod_code, $column = false, $is_sales_check = true)
    {
        $arr_condition = ['EQ' => ['ProdCode' => $prod_code]];
        $data = $this->listSalesProduct($learn_pattern, $column, $arr_condition, null, null, [], $is_sales_check);

        return array_get($data, '0', []);
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
     * 강좌상품 수강정보 조회
     * @param array $prod_code
     * @return array|int|mixed
     */
    public function findProductLectureInfo($prod_code = [])
    {
        $arr_prod_code = get_arr_var($prod_code, '0');
        $multiple_lec_time_ccd = '612002';  // 배수제한타입 > 전체 강의시간에 배수 적용
        $column = 'ProdCode, LearnPatternCcd, StudyStartDate, StudyEndDate
            , ifnull(StudyPeriod, if(StudyStartDate is not null and StudyEndDate is not null, datediff(StudyEndDate, StudyStartDate) + 1, 0)) as StudyPeriod
            , if(MultipleTypeCcd = "' . $multiple_lec_time_ccd . '", convert(AllLecTime * 60 * MultipleApply, int), 0) as MultipleAllLecSec';
        $arr_condition = ['IN' => ['ProdCode' => $arr_prod_code]];

        $data = $this->_conn->getListResult($this->_table['product_lecture'], $column, $arr_condition);

        return is_array($prod_code) === true ? $data : element('0', $data, []);
    }

    /**
     * 강의 회차정보 조회 (관리자 결제 회차등록일 경우 사용)
     * @param array|int $unit_idx [회차식별자]
     * @return array|int
     */
    public function findLectureUnitByUnitIdx($unit_idx)
    {
        $column = 'wUnitIdx, wLecIdx, wUnitName, wUnitLectureNum, wUnitNum, wRuntime, wShootingDate';
        $arr_condition = ['IN' => ['wUnitIdx' => (array) $unit_idx]];

        return $this->_conn->getListResult($this->_table['cms_lecture_unit'], $column, $arr_condition);
    }

    /**
     * 기간제패키지 서브강좌 과목/교수 조회 (관리자결제 기간제패키지 주문일 경우 사용)
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
     * wbs 교재식별자와 연결된 구매교재정보가 있는 단강좌의 json 데이터 업데이트 (교재 판매여부, 사용여부가 변경되었을 경우만)
     * @param int $wbook_idx [wbs 교재식별자]
     * @return bool|string
     */
    public function replaceProdJsonDataByWBookIdx($wbook_idx)
    {
        // 상품 판매상태 > 판매가능, 판매예정
        $_sale_status_ccds = ['618001', '618002'];

        try {
            if (empty($wbook_idx) === true) {
                throw new \Exception('교재 식별자가 없습니다.');
            }

            // 해당 wbs 교재식별자와 연결된 구매교재정보가 있는 단강좌 코드 조회
            $column = 'distinct(PRP.ProdCode) as ProdLecCode';
            $from = '
                from ' . $this->_table['product_book'] . ' as PB
                    inner join ' . $this->_table['product_r_product'] . ' as PRP
                        on PB.ProdCode = PRP.ProdCodeSub
                    inner join ' . $this->_table['product'] . ' as P
                        on PRP.ProdCode = P.ProdCode
                where PB.wBookIdx = ?
                    and PRP.IsStatus = "Y"
                    and P.SaleStatusCcd in ?
                    and NOW() between P.SaleStartDatm and P.SaleEndDatm
                    and P.IsSaleEnd = "N"
                    and P.IsUse = "Y"';

            // 쿼리 실행
            $results = $this->_conn->query('select ' . $column . $from, [$wbook_idx, $_sale_status_ccds])->result_array();
            if (empty($results) === true) {
                return true;
            }

            foreach ($results as $row) {
                // 단강좌 상품 가격 JSON 데이터 업데이트
                $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$row['ProdLecCode']]);
                $sp_result = $query->row(0)->ReturnMsg;
                if ($sp_result != 'Success') {
                    throw new \Exception('단강좌 상품 가격 JSON 데이터 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 정원마감된 상품명 리턴
     * @param array $prod_code [상품코드]
     * @return bool|string
     */
    public function getClosingProductName($prod_code)
    {
        // 정원마감여부 컬럼 추가하여 상품 조회
        $column = ', if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '", fn_product_closing_yn(P.ProdCode, PL.FixNumber), "N") as IsClosing';
        $data = $this->findRawProductByProdCode($prod_code, $column);
        if (empty($data) === true) {
            return '상품 데이터가 없습니다.';
        }

        // 정원마감된 상품명 연결
        $result = '';
        foreach ($data as $row) {
            if ($row['IsClosing'] == 'Y') {
                $result .= '::' . $row['ProdName'];
            }
        }

        return empty($result) === true ? true : substr($result, 2);
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
                    and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['off_lecture'] . '")
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
                    'DiscTitle' => $row['DiscTitle']
                ];
            }
        }

        return $result;
    }
}
