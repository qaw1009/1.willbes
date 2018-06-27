<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFModel extends WB_Model
{
    private $_table = [
        'on_lecture' => 'vw_product_on_lecture',
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
                , SalePrice, SaleRate, SaleDiscType, RealSalePrice, CourseName, SubjectName, wLectureProgressCcd, wLectureProgressName';

            switch ($learn_pattern) {
                // 온라인 단강좌
                case 'on_lecture' :
                        $column .= ', SubjectIdx, ProfIdx, wProfIdx, wProfName, wUnitLectureCnt, ifnull(fn_product_salebook_data(ProdCode), "N") as ProdBookData
                            , ifnull(fn_product_lecture_sample_data(ProdCode), "N") as LectureSampleData';
                    break;
                default :
                        return 0;
                    break;
            }
        }

        return $this->_conn->getListResult($this->_table[$learn_pattern], $column, $arr_condition, $limit, $offset, $order_by);
    }
}
