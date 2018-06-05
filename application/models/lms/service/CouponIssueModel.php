<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponIssueModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_detail' => 'lms_coupon_detail',
        'coupon_r_category' => 'lms_coupon_r_category',
        'coupon_pin' => 'lms_coupon_pin',
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];
    private $_ccd = ['IssueType' => '647'];
    private $_lec_type_ccd = '647002';  // 쿠폰발급구분 > 수동발급

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
     * @param null|string $list_type
     * @return int|array
     */
    public function listAllCouponDetail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $list_type = null)
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

        $column_coupon_pin = 'if(CD.CouponPin = "N", "", CD.CouponPin)';
        $join_type = 'inner';
        // 쿠폰핀 테이블 정보 조회할 경우 (쿠폰발급 등록 페이지)
        if ($list_type == 'pins') {
            $column_coupon_pin = 'ifnull(if(CD.CouponPin = "N", "", CD.CouponPin), CP.CouponPin)';
            $join_type = 'left';
        }

        // TODO : 추후 주문정보 추가 필요
        $from = '
            select CD.CdIdx, ' . $column_coupon_pin . ' as CouponPin, CD.MemIdx, CD.IssueTypeCcd, CD.IssueDatm, CD.IssueUserIdx, CD.ExpireDatm, CD.IsUse, CD.UseDatm, CD.RetireDatm, CD.RetireUserIdx
                , C.CouponIdx, C.SiteCode, C.CouponName
                , M.MemId, M.MemName, M.PhoneEnc, fn_dec(M.PhoneEnc) as Phone, M.Phone3, MO.SmsRcvStatus
                , "추후 주문정보 추가 필요" as ProdName, "000000" as OrderNo
                , SC.CcdName as IssueTypeName
                , (case when now() between CD.IssueDatm and CD.ExpireDatm then "유효"
                        when now() > CD.ExpireDatm then "만료"
                        when CD.ValidStatus = "C" then "취소"
                        else CD.ValidStatus			
                  end) as ValidStatus
                , if(CD.IssueUserType = "M", M.MemId, AI.wAdminId) as IssueUserId
                , if(CD.IssueUserType = "M", M.MemName, AI.wAdminName) as IssueUserName
                , if(CD.RetireUserType = "M", M.MemName, AR.wAdminName) as RetireUserName
            from ' . $this->_table['coupon'] . ' as C
        ';

        if ($list_type == 'pins') {
            $from .= '
                left join ' . $this->_table['coupon_pin'] . ' as CP	        
                    on C.CouponIdx = CP.CouponIdx and CP.CouponIdx is not null and C.DeployType = "F" and C.PinType = "R"
                left join ' . $this->_table['coupon_detail'] . ' as CD
                    on C.CouponIdx = CD.CouponIdx and CP.CouponPin = CD.CouponPin                                                        
            ';
        } else {
            $from .= '
                inner join ' . $this->_table['coupon_detail'] . ' as CD
                    on C.CouponIdx = CD.CouponIdx                                            
            ';
        }

        $from .=
                $join_type . ' join ' . $this->_table['member'] . ' as M
                    on CD.MemIdx = M.MemIdx
                ' . $join_type . ' join ' . $this->_table['member_otherinfo'] . ' as MO
                    on M.MemIdx = MO.MemIdx	
                ' . $join_type . ' join ' . $this->_table['code'] . ' as SC
                    on CD.IssueTypeCcd = SC.Ccd and SC.GroupCcd = "' . $this->_ccd['IssueType'] . '"
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

    /**
     * 사용자 쿠폰 발급
     * @param array $input
     * @return array|bool
     */
    public function addCouponDetail($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $coupon_idx = element('coupon_idx', $input);
            $arr_mem_idx = element('mem_idx', $input, []);

            // 회원 식별자 확인
            if (empty($arr_mem_idx) === true) {
                throw new \Exception('등록할 회원 정보가 없습니다.', _HTTP_BAD_REQUEST);
            }

            // 기존 쿠폰 기본정보 조회
            // 쿠폰등록 모델 로드
            $this->load->loadModels(['service/couponRegist']);

            $row = $this->couponRegistModel->findCoupon('CouponIdx, DeployType, PinType, PinIssueCnt, IssueStartDate, IssueEndDate, ValidDay, IsIssue'
                , ['EQ' => ['CouponIdx' => $coupon_idx, 'IsStatus' => 'Y']]);
            if (count($row) < 1) {
                throw new \Exception('쿠폰 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 쿠폰발급 가능여부 확인
            // 발급여부 확인
            if ($row['IsIssue'] == 'N') {
                throw new \Exception('해당 쿠폰은 미발급 상태입니다.', _HTTP_NO_PERMISSION);
            }

            // 발급유효기간 확인
            if (date('Y-m-d') < $row['IssueStartDate'] || date('Y-m-d') > $row['IssueEndDate']) {
                throw new \Exception('발급 유효기간이 아닙니다.', _HTTP_NO_PERMISSION);
            }

            // 배포루트, 쿠폰핀타입에 따라 발급 처리
            $is_issue = $this->_addCouponDetail($coupon_idx, $row, $arr_mem_idx);
            if ($is_issue !== true) {
                throw new \Exception($is_issue, _HTTP_NO_PERMISSION);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 온라인 사용자 쿠폰 발급
     * @param $coupon_idx
     * @param array $coupon_data
     * @param array $arr_mem_idx
     * @return bool|string
     */
    private function _addCouponDetail($coupon_idx, $coupon_data = [], $arr_mem_idx = [])
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $binds = [];

            $query = 'insert into ' . $this->_table['coupon_detail']. ' (CouponPin, CouponIdx, MemIdx, IssueTypeCcd, IssueDatm, RegDatm, ExpireDatm, IssueUserType, IssueUserIdx, IssueIp)';
            if ($coupon_data['DeployType'] == 'N') {
                // 온라인 배포
                $binds = ['N', $coupon_idx, $this->_lec_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $arr_mem_idx];
                $query .= '
                    select ?, ?, MemIdx, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
                    from ' . $this->_table['member']. ' where MemIdx in ?
                ';
            } elseif ($coupon_data['DeployType'] == 'F' && $coupon_data['PinType'] == 'S') {
                // 오프라인 배포 && 공통핀번호
                $binds = [$coupon_idx, $coupon_idx, $this->_lec_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $arr_mem_idx];
                $query .= '
                    select (select CouponPin from ' . $this->_table['coupon_pin'] . ' where CouponIdx = ?), ?, MemIdx, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
                    from ' . $this->_table['member']. ' where MemIdx in ?
                ';
            } elseif ($coupon_data['DeployType'] == 'F' && $coupon_data['PinType'] == 'R') {
                // 오프라인 배포 && 랜덤핀번호
                $binds = [$coupon_idx, $this->_lec_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $coupon_idx, $arr_mem_idx];
                $query .= '
                    select A.CouponPin, ?, B.MemIdx, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
                    from (
                        select CP.CouponPin, (@rownum1 := @rownum1 + 1) as RowNum
                        from ' . $this->_table['coupon_pin'] . ' as CP left join ' . $this->_table['coupon_detail']. ' as CD
                                on CP.CouponIdx = CD.CouponIdx and CP.CouponPin = CD.CouponPin
                            , (select @rownum1 := 0) as tmp
                        where CP.CouponIdx = ? and CD.CouponPin is null
                        order by CP.PinIdx asc
                    ) as A 
                    inner join (
                        select MemIdx, (@rownum2 := @rownum2 + 1) as RowNum 
                        from ' . $this->_table['member']. ', (select @rownum2 := 0) as tmp 
                        where MemIdx in ?
                    ) B
                    on A.RowNum = B.RowNum                
                ';
            } else {
                throw new \Exception('쿠폰 정보 오류입니다.');
            }

            $is_insert = $this->_conn->query($query, $binds);
            if ($is_insert !== true) {
                throw new \Exception('사용자 쿠폰 발급에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 사용자 쿠폰 회수
     * @param array $params
     * @return array|bool
     */
    public function modifyRetireCouponDetail($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            foreach ($params as $coupon_idx => $cd_idx) {
                $this->_conn->set('RetireDatm', 'now()', false);
                $this->_conn->set(['RetireUserType' => 'A', 'RetireUserIdx' => $admin_idx, 'RetireIp' => $reg_ip]);
                $this->_conn->where(['CdIdx' => $cd_idx, 'CouponIdx' => $coupon_idx, 'IsUse' => 'N']);

                if ($this->_conn->update($this->_table['coupon_detail']) === false) {
                    throw new \Exception('사용자 쿠폰 회수에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
