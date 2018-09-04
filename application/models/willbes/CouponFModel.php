<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponFModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_detail' => 'lms_coupon_detail',
        'coupon_r_category' => 'lms_coupon_r_category',
        'coupon_r_product' => 'lms_coupon_r_product',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원별 보유 쿠폰
     * @param $column
     * @param array $arr_param
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberCoupon($column, $arr_param = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'C.CouponIdx, CD.MemIdx, C.SiteCode, CC.CateCodes, if(CD.CouponPin = "N", "", CD.CouponPin) as CouponPin, C.CouponName
                , C.ApplyTypeCcd, replace(fn_ccd_name(C.ApplyTypeCcd), "온라인", "") as ApplyTypeCcdName
                , C.LecTypeCcds, C.ApplyRangeType
                , C.DiscRate, C.DiscType, C.DiscAllowPrice, if(C.DiscType = "R", "%", "원") as DiscRateUnit, C.ValidDay, CD.ExpireDatm
                , (case when now() between CD.IssueDatm and CD.ExpireDatm then "유효"
                        when now() > CD.ExpireDatm then "만료"
                        when CD.ValidStatus = "C" then "취소"
                        else CD.ValidStatus			
                  end) as ValidStatus
                , if(now() < CD.ExpireDatm, to_days(CD.ExpireDatm) - to_days(now()), 0) as RemainDay';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['coupon'] . ' as C
                inner join ' . $this->_table['coupon_detail'] . ' as CD
                    on C.CouponIdx = CD.CouponIdx
                left join (
                    select CouponIdx, group_concat(CateCode) as CateCodes from ' . $this->_table['coupon_r_category'] . ' where IsStatus = "Y" group by CouponIdx
                ) as CC 	
                    on C.CouponIdx = CC.CouponIdx	
            where CD.MemIdx = ?
                and C.IsIssue = "Y"
                and C.IsStatus = "Y"';

        // where 조건
        $arr_condition = [
            'EQ' => ['C.SiteCode' => element('SiteCode', $arr_param)],
            'LKB' => ['CC.CateCodes' => substr(element('CateCode', $arr_param), 0, 4)]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$this->session->userdata('mem_idx')]);

        return ($column === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상품별 적용가능한 회원 쿠폰 조회
     * @param $column
     * @param array $arr_param
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberProductCoupon($column, $arr_param = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'C.CouponIdx, CD.CdIdx, CD.MemIdx, C.SiteCode, CC.CateCodes, if(CD.CouponPin = "N", "", CD.CouponPin) as CouponPin, C.CouponName
                , C.ApplyTypeCcd, replace(fn_ccd_name(C.ApplyTypeCcd), "온라인", "") as ApplyTypeCcdName, ifnull(CP.ProdCodes, "") as ProdCodes
                , C.DiscRate, C.DiscType, C.DiscAllowPrice, if(C.DiscType = "R", "%", "원") as DiscRateUnit, C.ValidDay, CD.ExpireDatm
                , (case when now() between CD.IssueDatm and CD.ExpireDatm then "유효"
                        when now() > CD.ExpireDatm then "만료"
                        when CD.ValidStatus = "C" then "취소"
                        else CD.ValidStatus			
                  end) as ValidStatus
                , if(now() < CD.ExpireDatm, to_days(CD.ExpireDatm) - to_days(now()), 0) as RemainDay                
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['coupon'] . ' as C
                inner join ' . $this->_table['coupon_detail'] . ' as CD
                    on C.CouponIdx = CD.CouponIdx
                left join (
                    select CouponIdx, group_concat(CateCode) as CateCodes
                    from ' . $this->_table['coupon_r_category'] . '
                    where IsStatus = "Y"
                    group by CouponIdx
                ) as CC 	
                    on C.CouponIdx = CC.CouponIdx		
                left join (
                    select CouponIdx, group_concat(ProdCode) as ProdCodes
                    from ' . $this->_table['coupon_r_product'] . '
                    where IsStatus = "Y"
                    group by CouponIdx		
                ) as CP	
                    on C.CouponIdx = CP.CouponIdx
            where CD.MemIdx = ?
                and C.IsIssue = "Y"
                and C.IsStatus = "Y"                
                and now() between CD.IssueDatm and CD.ExpireDatm    # 쿠폰 유효성 체크
                and CD.ValidStatus = "Y"    
                and CD.IsUse = "N"  # 미사용 쿠폰                            
                and C.ApplyTypeCcd = ?   # 상품분류 구분                     
                and C.DiscAllowPrice <= ?    # 할인허용가능금액            
                and (                
                    case C.ApplyRangeType   # 적용범위
                        when "A" then "Y"
                        when "I" then 
                            (case 
                                when C.ApplySchoolYear = ? and C.ApplyCourseIdx = 0 and C.ApplySubjectIdx = 0 and C.ApplyProfIdx = 0 then "Y" 
                                when C.ApplySchoolYear = ? and C.ApplyCourseIdx = ? and C.ApplySubjectIdx = 0 and C.ApplyProfIdx = 0 then "Y"
                                when C.ApplySchoolYear = ? and C.ApplyCourseIdx = ? and C.ApplySubjectIdx = ? and C.ApplyProfIdx = 0 then "Y"
                                when C.ApplySchoolYear = ? and C.ApplyCourseIdx = ? and C.ApplySubjectIdx = ? and C.ApplyProfIdx = ? then "Y"
                                else "N"
                            end)
                        when "P" then if(CP.ProdCodes like ?, "Y", "N")
                        else "N"
                    end			
                ) = "Y"';

        // binding 배열
        $arr_binding = [
            $this->session->userdata('mem_idx'),
            element('ApplyTypeCcd', $arr_param),
            element('RealSalePrice', $arr_param),   // 상품 실제판매가격
            element('SchoolYear', $arr_param),  // ApplyRangeType : 항목별 (I-1)
            element('SchoolYear', $arr_param),  // ApplyRangeType : 항목별 (I-2)
            element('CourseIdx', $arr_param),
            element('SchoolYear', $arr_param),  // ApplyRangeType : 항목별 (I-3)
            element('CourseIdx', $arr_param),
            element('SubjectIdx', $arr_param),
            element('SchoolYear', $arr_param),  // ApplyRangeType : 항목별 (I-4)
            element('CourseIdx', $arr_param),
            element('SubjectIdx', $arr_param),
            element('ProfIdx', $arr_param),
            '%' . element('ProdCode', $arr_param) . '%',    // ApplyRangeType : 특정상품 (P)
        ];

        // where 조건
        $arr_condition = [
            'EQ' => ['C.SiteCode' => element('SiteCode', $arr_param), 'CD.CdIdx' => element('CdIdx', $arr_param)],  // 사이트코드, 사용자쿠폰식별자
            'LKB' => ['C.LecTypeCcds' => element('LecTypeCcd', $arr_param), 'CC.CateCodes' => substr(element('CateCode', $arr_param), 0, 4)]  // 학습형태구분, 카테고리코드
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, $arr_binding);

        return ($column === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원쿠폰 사용 처리 업데이트
     * @param int $coupon_detail_idx [사용자쿠폰 식별자]
     * @param int $order_prod_idx [주문상품 식별자] 
     * @return bool|string
     */
    public function modifyUseMemberCoupon($coupon_detail_idx, $order_prod_idx)
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션

            $data = [
                'UseOrderProdIdx' => $order_prod_idx,
                'IsUse' => 'Y'
            ];

            $is_update = $this->_conn->set($data)->set('UseDatm', 'NOW()', false)->where('CdIdx', $coupon_detail_idx)->where('MemIdx', $sess_mem_idx)
                ->update($this->_table['coupon_detail']);

            if ($is_update === false) {
                throw new \Exception('회원쿠폰 사용 업데이트에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
