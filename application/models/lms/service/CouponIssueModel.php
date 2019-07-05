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
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' =>  'lms_product',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    private $_ccd = ['IssueType' => '647'];

    // 쿠폰발급구분 (자동발급, 수동발급, 환불재발급, 주문결제자동발급)
    public $_issue_type_ccd = ['auto' => '647001', 'manual' => '647002', 'refund' => '647003', 'order' => '647004'];

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
                    , IssueTypeName, concat(left(IssueDatm, 10), " (", IssueUserName, ")") as IssueDatm, concat(ValidStatusName, " (", left(ExpireDatm, 10), ")") as ValidStatusName
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

        $from = '
            select CD.CdIdx, ' . $column_coupon_pin . ' as CouponPin, CD.MemIdx, CD.IssueTypeCcd, CD.IssueDatm, CD.IssueUserIdx, CD.ExpireDatm, CD.IsUse, CD.UseDatm, CD.RetireDatm, CD.RetireUserIdx
                , C.CouponIdx, C.SiteCode, C.CouponName
                , M.MemId, M.MemName, M.PhoneEnc, fn_dec(M.PhoneEnc) as Phone, M.Phone3, MO.SmsRcvStatus
                , concat(ifnull(P.ProdName, ""), if(P.ProdCode is not null and P.IsStatus = "N", " (삭제)", "")) as ProdName
                , ifnull(O.OrderNo, "") as OrderNo
                , SC.CcdName as IssueTypeName
                , CD.ValidStatus
                , (case when CD.IsUse = "Y" then "사용" 
                        when now() between CD.IssueDatm and CD.ExpireDatm and CD.ValidStatus = "Y" then "유효"                        
                        when CD.ValidStatus = "N" then "비유효"
                        when CD.ValidStatus = "R" then "회수"
                        when CD.ValidStatus = "C" then "취소"
                        when now() > CD.ExpireDatm then "만료"                        
                        else CD.ValidStatus			
                  end) as ValidStatusName
                , if(CD.IssueUserType = "M", M.MemId, AI.wAdminId) as IssueUserId
                , if(CD.IssueUserType = "M", M.MemName, AI.wAdminName) as IssueUserName
                , if(CD.RetireUserType = "M", M.MemName, AR.wAdminName) as RetireUserName
            from ' . $this->_table['coupon'] . ' as C
        ';

        if ($list_type == 'pins') {
            $from .= '
                left join ' . $this->_table['coupon_pin'] . ' as CP	        
                    on C.CouponIdx = CP.CouponIdx and CP.CouponIdx is not null and C.DeployType = "F" #and C.PinType = "R"
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
                left join ' . $this->_table['order_product'] . ' as OP                     
                    on CD.CdIdx = OP.UserCouponIdx and CD.UseOrderProdIdx = OP.OrderProdIdx and CD.IsUse = "Y"            
                left join ' . $this->_table['order'] . ' as O
                    on OP.OrderIdx = O.OrderIdx
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode                                                       
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
     * 사용자 쿠폰 목록 조회
     * @param bool|string $column
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function listCouponDetail($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        return $this->_conn->getListResult($this->_table['coupon_detail'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사용자 쿠폰 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findCouponDetail($column = '*', $arr_condition = [])
    {
        return $this->_conn->getFindResult($this->_table['coupon_detail'], $column, $arr_condition);
    }

    /**
     * 사용자 쿠폰 조회 by 사용자 쿠폰 식별자
     * @param int $coupon_detail_idx
     * @param string $column
     * @return array
     */
    public function findCouponDetailByCdIdx($coupon_detail_idx, $column = '*')
    {
        $arr_condition['EQ']['CdIdx'] = $coupon_detail_idx;

        return $this->findCouponDetail($column, $arr_condition);
    }

    /**
     * 수동 사용자 쿠폰 발급 (from 발급 페이지)
     * @param array $input
     * @return array|bool
     */
    public function addCouponDetailByManual($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 사용자 쿠폰 발급
            $is_add = $this->addCouponDetail($input);
            if ($is_add !== true) {
                throw new \Exception($is_add);
            }            
            
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;            
    }

    /**
     * 사용자 쿠폰 발급
     * @param array $input
     * @return array|bool
     */
    public function addCouponDetail($input = [])
    {
        try {
            $coupon_idx = element('coupon_idx', $input);
            $arr_mem_idx = element('mem_idx', $input, []);
            $issue_type = element('issue_type', $input, '');
            $issue_order_prod_idx = element('issue_order_prod_idx', $input);

            // 회원 식별자 확인
            if (empty($arr_mem_idx) === true) {
                throw new \Exception('등록할 회원 정보가 없습니다.', _HTTP_BAD_REQUEST);
            }
            
            // 사용자 쿠폰 발급전 쿠폰 유효성 체크
            $coupon_data = $this->checkAddCouponDetail($coupon_idx);
            if (is_array($coupon_data) === false) {
                throw new \Exception($coupon_data, _HTTP_NO_PERMISSION);
            }

            // 배포루트, 쿠폰핀타입에 따라 발급 처리
            $coupon_data['IssueType'] = $issue_type;
            $is_issue = $this->_addCouponDetail($coupon_idx, $coupon_data, $arr_mem_idx, $issue_order_prod_idx);
            if ($is_issue !== true) {
                throw new \Exception($is_issue, _HTTP_NO_PERMISSION);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 사용자 쿠폰 발급전 사전 체크
     * @param int $coupon_idx
     * @return array|string
     */
    public function checkAddCouponDetail($coupon_idx)
    {
        // 쿠폰등록 모델 로드
        $this->load->loadModels(['_lms/service/couponRegist']);

        // 기존 쿠폰 기본정보 조회
        $row = $this->couponRegistModel->findCoupon('CouponIdx, CouponTypeCcd, DeployType, PinType, PinIssueCnt, IssueStartDate, IssueEndDate, ValidDay, IsIssue'
            , ['EQ' => ['CouponIdx' => $coupon_idx, 'IsStatus' => 'Y']]);
        if (empty($row) === true) {
            return '쿠폰 정보 조회에 실패했습니다.';
        }

        // 쿠폰발급 가능여부 확인
        // 쿠폰타입 확인
        if ($row['CouponTypeCcd'] == $this->couponRegistModel->_coupon_type_ccd['voucher']) {
            return '수강권 쿠폰은 발급하실 수 없습니다.';
        }

        // 발급여부 확인
        if ($row['IsIssue'] == 'N') {
            return '해당 쿠폰은 미발급 상태입니다.';
        }

        // 발급유효기간 확인
        if (date('Y-m-d') < $row['IssueStartDate'] || date('Y-m-d') > $row['IssueEndDate']) {
            return '발급 유효기간이 아닙니다.';
        }

        return $row;
    }

    /**
     * 사용자 쿠폰 발급
     * @param int $coupon_idx [쿠폰식별자]
     * @param array $coupon_data [쿠폰 데이터 배열]
     * @param array $arr_mem_idx [회원식별자 배열]
     * @param null|int $issue_order_prod_idx [발급주문상품식별자]
     * @return bool|string
     */
    public function _addCouponDetail($coupon_idx, $coupon_data = [], $arr_mem_idx = [], $issue_order_prod_idx = null)
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 전달된 쿠폰발급구분 값이 없다면 수동발급
            if (isset($coupon_data['IssueType']) === true) {
                $issue_type_ccd = element($coupon_data['IssueType'], $this->_issue_type_ccd, $this->_issue_type_ccd['manual']);
            } else {
                $issue_type_ccd = $this->_issue_type_ccd['manual'];
            }

            $query = /** @lang text */ 'insert into ' . $this->_table['coupon_detail']. ' (CouponPin, CouponIdx, MemIdx, IssueOrderProdIdx, IssueTypeCcd, IssueDatm, RegDatm, ExpireDatm, IssueUserType, IssueUserIdx, IssueIp)';
            
            if ($coupon_data['DeployType'] == 'N') {
                // 온라인 배포
                $binds = ['N', $coupon_idx, $issue_order_prod_idx, $issue_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $arr_mem_idx];
                $query .= /** @lang text */ '
                    select ?, ?, MemIdx, ?, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
                    from ' . $this->_table['member']. ' where MemIdx in ?
                ';
            } elseif ($coupon_data['DeployType'] == 'F' && $coupon_data['PinType'] == 'S') {
                // 오프라인 배포 && 공통핀번호
                $binds = [$coupon_idx, $coupon_idx, $issue_order_prod_idx, $issue_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $arr_mem_idx];
                $query .= /** @lang text */ '
                    select (select CouponPin from ' . $this->_table['coupon_pin'] . ' where CouponIdx = ?), ?, MemIdx, ?, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
                    from ' . $this->_table['member']. ' where MemIdx in ?
                ';
            } elseif ($coupon_data['DeployType'] == 'F' && $coupon_data['PinType'] == 'R') {
                // 오프라인 배포 && 랜덤핀번호
                $binds = [$coupon_idx, $issue_order_prod_idx, $issue_type_ccd, $coupon_data['ValidDay'], 'A', $admin_idx, $reg_ip, $coupon_idx, $arr_mem_idx];
                $query .= /** @lang text */ '
                    select A.CouponPin, ?, B.MemIdx, ?, ?, NOW(), NOW(), date_add(NOW(), interval ? day), ?, ?, ?
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
     * @param array $params [쿠폰식별자 => 사용자쿠폰 식별자 배열]
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
                $coupon_idx = str_first_pos_before($coupon_idx, '::');

                // 사용자 쿠폰 회수
                $this->_conn->set('RetireDatm', 'NOW()', false);
                $this->_conn->set(['ValidStatus' => 'R', 'RetireUserType' => 'A', 'RetireUserIdx' => $admin_idx, 'RetireIp' => $reg_ip]);
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

    /**
     * 주문 결제완료시 발급된 자동지급 쿠폰 회수
     * @param int $mem_idx [회원식별자]
     * @param int $issue_order_prod_idx [발급주문상품식별자]
     * @param int $retire_admin_idx [회수요청관리자식별자]
     * @return bool|string
     */
    public function modifyRetireCouponDetailByOrderProdIdx($mem_idx, $issue_order_prod_idx, $retire_admin_idx)
    {
        try {
            if (empty($mem_idx) === true || empty($issue_order_prod_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            // 사용자 쿠폰 회수
            $this->_conn->set('RetireDatm', 'NOW()', false);
            $this->_conn->set(['ValidStatus' => 'R', 'RetireUserType' => 'A', 'RetireUserIdx' => $retire_admin_idx, 'RetireIp' => $this->input->ip_address()]);
            $this->_conn->where(['MemIdx' => $mem_idx, 'IssueOrderProdIdx' => $issue_order_prod_idx, 'IsUse' => 'N']);

            if ($this->_conn->update($this->_table['coupon_detail']) === false) {
                throw new \Exception('자동지급 사용자 쿠폰 회수에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
