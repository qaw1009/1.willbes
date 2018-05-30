<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponIssueModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_detail' => 'lms_coupon_detail',
        'coupon_r_category' => 'lms_coupon_r_category',
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];
    private $_group_ccd = ['IssueType' => '647'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 쿠폰발급 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAllCouponDetail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            if ($is_count == 'excel') {
                $column = 'CouponPin, concat(MemName, " (", MemId, ")") as MemName, concat(Phone, " (", SmsRcvStatus, ")") as Phone, concat(CouponName, " [", CouponIdx, "]") as CouponName
                    , IssueTypeName, concat(left(IssueDatm, 10), " (", IssueUserName, ")") as IssueDatm, concat(ValidStatus, " (", left(ExpireDatm, 10), ")") as ValidStatus
                    , if(IsUse = "Y", concat("사용 (", left(UseDatm, 10), ")"), "미사용") as IsUse, if(IsUse = "Y", concat(ProdName, " (", OrderNo, ")"), "") as ProdName
                    , if(RetireDatm is not null, concat(left(RetireDatm, 10), " (", RetireUserName, ")"), "") as RetireDatm    
                ';
            }
        }

        // TODO : 추후 주문정보 추가 필요
        $from = '
            select CD.CdIdx, CD.CouponPin, CD.MemIdx, CD.IssueTypeCcd, CD.IssueDatm, CD.IssueUserIdx, CD.ExpireDatm, CD.IsUse, CD.UseDatm, CD.RetireDatm, CD.RetireUserIdx
                , C.CouponIdx, C.SiteCode, C.CouponName
                , M.MemId, M.MemName, M.PhoneEnc, fn_dec(M.PhoneEnc) as Phone, M.Phone3, MO.SmsRcvStatus
                , "추후 주문정보 추가 필요" as ProdName, "000000" as OrderNo
                , SC.CcdName as IssueTypeName
                , (case when current_date() between CD.IssueDatm and CD.ExpireDatm then "유효"
                        when current_date() > CD.ExpireDatm then "만료"
                        when CD.ValidStatus = "C" then "취소"
                        else CD.ValidStatus			
                  end) as ValidStatus
                , if(CD.IssueUserType = "M", M.MemId, AI.wAdminId) as IssueUserId
                , if(CD.IssueUserType = "M", M.MemName, AI.wAdminName) as IssueUserName
                , if(CD.RetireUserType = "M", M.MemName, AR.wAdminName) as RetireUserName
            from ' . $this->_table['coupon'] . ' as C
                inner join ' . $this->_table['coupon_detail'] . ' as CD
                    on C.CouponIdx = CD.CouponIdx
                inner join ' . $this->_table['member'] . ' as M
                    on CD.MemIdx = M.MemIdx
                inner join ' . $this->_table['member_otherinfo'] . ' as MO
                    on M.MemIdx = MO.MemIdx	
                inner join ' . $this->_table['code'] . ' as SC
                    on CD.IssueTypeCcd = SC.Ccd and SC.GroupCcd = "' . $this->_group_ccd['IssueType'] . '"
                left join ' . $this->_table['admin'] . ' as AI
                    on CD.IssueUserIdx = AI.wAdminIdx and AI.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as AR
                    on CD.RetireUserIdx = AR.wAdminIdx and AR.wIsStatus = "Y"
            where C.IsStatus = "Y"         
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (' . $from . ') U' . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
