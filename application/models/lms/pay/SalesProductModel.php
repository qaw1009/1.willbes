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
        'off_lecture' => 'vw_product_off_lecture',
        'off_pack_lecture' => 'vw_product_off_pack_lecture',
        'book' => 'vw_product_book',
        'delivery_price' => 'vw_product_delivery_price',
        'delivery_add_price' => 'vw_product_delivery_add_price',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
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
     * @return array|int
     */
    public function listSalesProduct($learn_pattern, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
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

            // 학원 단과
            case 'off_lecture' :
                $column .= ', CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'wIsUse' => 'Y', 'IsLecOpen' => 'Y', 'AcceptStatusCcd' => $this->_available_sale_status_ccd['accept']]   // 일반강의, 마스터강의 사용여부, 강의개설여부, 접수상태
                ]);
                break;

            // 학원 종합반
            case 'off_pack_lecture' :
                $column .= ', CateCode, IsCart, IsFreebiesTrans, IsDeliveryInfo, ProdPriceData';
                $arr_default_condition = array_merge_recursive($arr_default_condition, [
                    'EQ' => ['LecSaleType' => 'N', 'IsLecOpen' => 'Y', 'AcceptStatusCcd' => $this->_available_sale_status_ccd['accept']]   // 일반강의, 강의개설여부, 접수상태
                ]);
                break;

            //추천-선택 패키지
            case 'adminpack_lecture' :
                $column .= ', CateCode, PackTypeCcd, ProdPriceData';
                break;

            //사용자패키지
            case 'userpack_lecture' :
                $column .= ', CateCode, PackSaleData';
                break;

            //기간제패키지
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

            // 배송료 상품
            case 'delivery_price' :
            case 'delivery_add_price' :
                $column .= ', IsCart, ProdPriceData';
                break;

            default :
                return 0;
                break;
        }

        if (is_bool($is_count) === false || $is_count === true) {
            $column = $is_count;
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column, array_merge_recursive($arr_default_condition, $arr_condition), $limit, $offset, $order_by);
    }

    /**
     * 판매가능 상품 조회 by 상품코드
     * @param string $learn_pattern
     * @param int $prod_code
     * @param bool|string $column
     * @return mixed
     */
    public function findSalesProductByProdCode($learn_pattern, $prod_code, $column = false)
    {
        $arr_condition = ['EQ' => ['ProdCode' => $prod_code]];
        $data = $this->listSalesProduct($learn_pattern, $column, $arr_condition);

        return element('0', $data, []);
    }

    /**
     * 강좌상품 수강정보 조회
     * @param array $prod_code
     * @return array|int|mixed
     */
    public function findProductLectureInfo($prod_code = [])
    {
        $multiple_lec_time_ccd = '612002';  // 배수제한타입 > 전체 강의시간에 배수 적용
        $column = 'ProdCode, LearnPatternCcd, StudyStartDate, StudyEndDate
            , ifnull(StudyPeriod, if(StudyStartDate is not null and StudyEndDate is not null, datediff(StudyEndDate, StudyStartDate), 0)) as StudyPeriod
            , if(MultipleTypeCcd = "' . $multiple_lec_time_ccd . '", convert(AllLecTime * 60 * MultipleApply, int), 0) as MultipleAllLecSec';
        $arr_condition = ['IN' => ['ProdCode' => (array) $prod_code]];

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
}
