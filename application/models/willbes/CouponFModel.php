<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponFModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_pin' => 'lms_coupon_pin',
        'coupon_detail' => 'lms_coupon_detail',
        'coupon_r_category' => 'lms_coupon_r_category',
        'coupon_r_product' => 'lms_coupon_r_product',
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_sms' => 'lms_product_sms'
    ];

    // 쿠폰유형 (할인권, 수강권)
    public $_coupon_type_ccd = ['coupon' => '644001', 'voucher' => '644002'];

    // 상품타입 또는 판매형태와 쿠폰적용구분 공통코드 맵핑 (온라인강좌, 학원강좌, 교재, 사은품, 배송료, 추가 배송료, 모의고사, 재수강, 수강연장)
    public $_coupon_apply_type_ccd = ['636001' => '645001', '636002' => '645004', '636003' => '645005', '636004' => '', '636005' => '645006', '636006' => '645006', '636010' => '645007'
        , '694002' => '', '694003' => '645002'
    ];

    // 학습형태와 쿠폰상세구분 공통코드 맵핑 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지, 무료강좌, 단과반, 종합반)
    public $_coupon_lec_type_ccd = ['615001' => '646001', '615002' => '', '615003' => '646002', '615004' => '646003', '615005' => '', '615006' => '646004', '615007' => '646005'];

    // 쿠폰적용구분이 온라인강좌, 수강연장, 배수, 학원강좌일 경우 쿠폰상세구분 적용 (학습형태)
    public $_coupon_apply_type_to_lec_ccds = ['645001', '645002', '645003', '645004'];

    // 발급타입 공통코드 (자동, 수동, 환불재발급, 주문결제자동발급)
    private $_coupon_issue_type_ccd = ['auto' => '647001', 'manual' => '647002', 'refund' => '647003', 'order' => '647004'];

    // 상품자동문자 발송할 쿠폰 식별자
    private $_coupon_idx_prod_sms = [
        (ENVIRONMENT == 'production' || ENVIRONMENT == 'testing' ? '505' : '312' )      // 엔잡 도매꾹 수강권 쿠폰
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원별 보유 쿠폰
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param bool $is_add_data
     * @return mixed
     */
    public function listMemberCoupon($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $is_add_data = false)
    {
        // 사용한 쿠폰일 경우 주문 데이터 추가 조회
        $add_column = $add_from = '';
        if ($is_add_data === true) {
            $add_column = ', SG.SiteGroupName, O.OrderNo, P.ProdName';
            $add_from = '
                left join ' . $this->_table['site'] . ' as S
                    on C.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode and SG.IsStatus = "Y"            
                left join ' . $this->_table['order_product'] . ' as OP
                    on CD.UseOrderProdIdx = OP.OrderProdIdx
                left join ' . $this->_table['order'] . ' as O
                    on OP.OrderIdx = O.OrderIdx
                left join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode and P.IsStatus = "Y"';
        }

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'C.CouponIdx, CD.MemIdx, C.SiteCode, CC.CateCodes, if(CD.CouponPin = "N", "", CD.CouponPin) as CouponPin, C.CouponName
                , C.ApplyTypeCcd, fn_ccd_name(C.ApplyTypeCcd) as ApplyTypeCcdName
                , C.DiscRate, C.DiscType, if(C.DiscType = "R", "%", "원") as DiscRateUnit, C.DiscAllowPrice, C.ValidDay, C.ValidEndDatm
                , CD.IsUse, CD.UseDatm, CD.IssueDatm, CD.RegDatm, CD.ExpireDatm
                , if(C.ValidDay > 0, concat(C.ValidDay, "일"), concat("~ ", left(C.ValidEndDatm, 16))) as ValidPeriod
                , (case when CD.IsUse = "Y" then "사용"
                        when NOW() between CD.IssueDatm and CD.ExpireDatm and CD.ValidStatus = "Y" then "유효"
                        when NOW() > CD.ExpireDatm then "만료"
                        when CD.ValidStatus = "N" then "비유효"
                        when CD.ValidStatus = "R" then "회수"                    
                        when CD.ValidStatus = "C" then "취소"
                        else CD.ValidStatus			
                  end) as ValidStatusName
                , if(NOW() < CD.ExpireDatm, to_days(CD.ExpireDatm) - to_days(NOW()), 0) as RemainDay' . $add_column;
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
            ' . $add_from . '
            where CD.MemIdx = ?
                and C.IsIssue = "Y"
                and C.IsStatus = "Y"';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$this->session->userdata('mem_idx')]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상품별 적용가능한 회원 쿠폰 조회
     * @param bool $is_count
     * @param array $arr_param
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberProductCoupon($is_count, $arr_param = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'C.CouponIdx, CD.CdIdx, CD.MemIdx, C.SiteCode, CC.CateCodes, if(CD.CouponPin = "N", "", CD.CouponPin) as CouponPin, C.CouponName
                , C.ApplyTypeCcd, fn_ccd_name(C.ApplyTypeCcd) as ApplyTypeCcdName, ifnull(CP.ProdCodes, "") as ProdCodes
                , C.DiscRate, C.DiscType, if(C.DiscType = "R", "%", "원") as DiscRateUnit, C.DiscAllowPrice, C.ValidDay, C.ValidEndDatm, CD.IssueDatm, CD.RegDatm, CD.ExpireDatm
                , if(C.ValidDay > 0, concat(C.ValidDay, "일"), concat("~ ", left(C.ValidEndDatm, 16))) as ValidPeriod
                , if(NOW() < CD.ExpireDatm, to_days(CD.ExpireDatm) - to_days(NOW()), 0) as RemainDay                
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
                and NOW() between CD.IssueDatm and CD.ExpireDatm    # 쿠폰 유효성 체크
                and CD.ValidStatus = "Y"    
                and CD.IsUse = "N"  # 미사용 쿠폰                                                
                and C.DiscAllowPrice <= ?    # 할인허용가능금액          
                and C.ApplyTypeCcd = ?   # 쿠폰적용구분 (상품분류)
                and (      
                    case    # 쿠폰상세구분 (학습형태) 
                        when find_in_set(C.ApplyTypeCcd, "' . implode(',', $this->_coupon_apply_type_to_lec_ccds) . '") > 0 then if(C.LecTypeCcds like ?, "Y", "N")
                        else "Y"
                    end    				    		
                ) = "Y"                                       
                and (                
                    case C.ApplyRangeType   # 적용범위
                        when "A" then "Y"
                        when "I" then fn_coupon_item_validate(C.ApplySchoolYear, C.ApplyCourseIdx, C.ApplySubjectIdx, C.ApplyProfIdx, ?, ?, ?, ?)
                        when "P" then if(CP.ProdCodes like ?, "Y", "N")
                        else "N"
                    end			
                ) = "Y"';

        // binding 배열
        $arr_binding = [
            $this->session->userdata('mem_idx'),
            element('RealSalePrice', $arr_param),   // 상품 실제판매가격
            element('ApplyTypeCcd', $arr_param),    // 쿠폰적용구분 (상품분류)
            '%' . element('LecTypeCcd', $arr_param) . '%',  // 쿠폰상세구분 (학습형태)
            element('SchoolYear', $arr_param),  // ApplyRangeType : 항목별 (I)
            element('CourseIdx', $arr_param),
            element('SubjectIdx', $arr_param),
            element('ProfIdx', $arr_param),
            '%' . element('ProdCode', $arr_param) . '%',    // ApplyRangeType : 특정상품 (P)
        ];

        // where 조건
        $arr_condition = [
            'EQ' => [
                'C.SiteCode' => element('SiteCode', $arr_param), 
                'CD.CdIdx' => element('CdIdx', $arr_param), 
                'C.CouponTypeCcd' => element('CouponTypeCcd', $arr_param)
            ],  // 사이트코드, 사용자쿠폰식별자, 쿠폰유형
            'LKB' => [
                'CC.CateCodes' => element('CateCode', $arr_param)
            ]  // 카테고리코드
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, $arr_binding);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
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

            // 쿠폰사용 여부 체크
            $use_row = $this->_conn->getFindResult($this->_table['coupon_detail'], 'IsUse', ['EQ' => ['CdIdx' => $coupon_detail_idx, 'MemIdx' => $sess_mem_idx]]);

            if (empty($use_row) === true) {
                throw new \Exception('회원쿠폰이 존재하지 않습니다.');
            }

            if ($use_row['IsUse'] == 'Y') {
                throw new \Exception('이미 사용한 쿠폰입니다.');
            }

            // 쿠폰사용 업데이트
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

    /**
     * 쿠폰정보 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findCoupon($arr_condition = [])
    {
        $column = 'C.CouponIdx, C.SiteCode, C.CouponTypeCcd, C.DeployType, C.PinType, C.IssueStartDate, C.IssueEndDate, C.ValidDay, C.ValidEndDatm, C.IsIssue            
            , ifnull(CP.CouponPin, "N") as CouponPin, if(C.ValidDay > 0, date_add(NOW(), interval C.ValidDay day), C.ValidEndDatm) as ExpireDatm';

        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => ['C.IsIssue' => 'Y', 'C.IsStatus' => 'Y']
        ]);

        return $this->_conn->getJoinFindResult($this->_table['coupon'] . ' as C', 'left', $this->_table['coupon_pin'] . ' as CP'
            , 'C.CouponIdx = CP.CouponIdx', $column, $arr_condition);
    }

    /**
     * 쿠폰정보 조회 by 쿠폰식별자
     * @param int $coupon_idx
     * @return mixed
     */
    public function findCouponByIdx($coupon_idx)
    {
        $arr_condition = ['EQ' => ['C.CouponIdx' => $coupon_idx, 'C.DeployType' => 'N']];
        return $this->findCoupon($arr_condition);
    }

    /**
     * 쿠폰정보 조회 by 핀번호
     * @param string $coupon_pin
     * @return mixed
     */
    public function findCouponByPin($coupon_pin)
    {
        $arr_condition = ['EQ' => ['CP.CouponPin' => $coupon_pin, 'C.DeployType' => 'F']];
        return $this->findCoupon($arr_condition);
    }

    /**
     * 쿠폰 연결상품 리턴
     * @param int $coupon_idx [쿠폰식별자]
     * @return mixed
     */
    public function getCouponProduct($coupon_idx)
    {
        $column = 'CP.ProdCode, P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, PL.PackTypeCcd';
        $from = '
            from ' . $this->_table['coupon_r_product'] . ' as CP
                inner join ' . $this->_table['product'] . ' as P
                    on CP.ProdCode = P.ProdCode
                inner join ' . $this->_table['product_lecture'] . ' as PL
                    on CP.ProdCode = PL.ProdCode
            where CP.CouponIdx = ?
                and CP.IsStatus = "Y"
                and P.IsUse = "Y" and P.IsStatus = "Y"';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$coupon_idx]);

        return $query->result_array();        
    }

    /**
     * 오프라인 쿠폰 등록
     * @param string $coupon_type [쿠폰타입 (쿠폰 : coupon / 수강권 : voucher]
     * @param string $coupon_no [쿠폰번호]
     * @return array|bool
     */
    public function addMemberCouponByPin($coupon_type, $coupon_no)
    {
        $this->_conn->trans_begin();

        try {
            // 사용자 쿠폰 등록
            $result = $this->addMemberCoupon($coupon_type, $coupon_no, true);
            if ($result['ret_cd'] !== true) {
                throw new \Exception($result['ret_msg']);
            }

            // 발급된 쿠폰이 수강권일 경우 주문 등록
            if ($coupon_type == 'voucher' && $result['ret_data']['coupon']['CouponTypeCcd'] == $this->_coupon_type_ccd['voucher']) {
                // 사용자 쿠폰 식별자
                $coupon_detail_idx = $result['ret_data']['coupon_detail_idx'];

                // 쿠폰 연결상품 조회
                $coupon_prod_data = $this->getCouponProduct($result['ret_data']['coupon']['CouponIdx']);
                if (empty($coupon_prod_data) === true) {
                    throw new \Exception('수강권 연결상품 조회에 실패했습니다.');
                }

                // 수강권 주문 등록
                $this->load->loadModels(['order/orderF']);
                $is_order = $this->orderFModel->procVoucherOrder($coupon_prod_data, $result['ret_data']['coupon']['SiteCode'], $coupon_detail_idx);
                if ($is_order !== true) {
                    throw new \Exception($is_order);
                }

                // 특정쿠폰 상품자동문자 발송
                $sms_data = $this->getCouponProductAutoSmsMsg($coupon_detail_idx, $this->session->userdata('mem_idx'));
                if(empty($sms_data) === false && in_array($result['ret_data']['coupon']['CouponIdx'], $this->_coupon_idx_prod_sms) === true) {
                    $this->load->loadModels(['crm/smsF']);
                    foreach ($sms_data as $sms_row) {
                        if (empty($sms_row['SendSmsTel']) === false && empty($sms_row['SendSmsMsg']) === false) {
                            $send_sms_msg = $this->smsFModel->getProductSendSmsMsg($sms_row);
                            $this->smsFModel->addKakaoMsg($this->session->userdata('mem_phone'), $send_sms_msg, $sms_row['SendSmsTel'], null, 'KFT');
                        }
                    }
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
     * 회원 쿠폰발급
     * @param string $coupon_type [쿠폰타입 (쿠폰 : coupon / 수강권 : voucher]
     * @param int|string $coupon_no [쿠폰식별자 or 핀번호]
     * @param bool $is_pin [핀번호 여부, false : 쿠폰식별자를 사용하여 쿠폰 조회, 기 발급여부 체크]
     * @param string $issue_type [쿠폰발급구분]
     * @param int|null $issue_order_prod_idx [발급주문상품식별자]
     * @param string $mem_idx [회원식별자]
     * @return array
     */
    public function addMemberCoupon($coupon_type, $coupon_no, $is_pin = false, $issue_type = 'auto', $issue_order_prod_idx = null, $mem_idx = '')
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $mem_idx = empty($mem_idx) === false ? $mem_idx : $sess_mem_idx;
            $find_method = $is_pin === true ? 'Pin' : 'Idx';
            $today = date('Y-m-d');
            $reg_ip = $this->input->ip_address();
            $issue_type_ccd = element($issue_type, $this->_coupon_issue_type_ccd, $this->_coupon_issue_type_ccd['auto']);

            if (empty($mem_idx) === true) {
                throw new \Exception('회원 식별자가 없습니다.');
            }

            // 쿠폰정보 조회
            $row = $this->{'findCouponBy' . $find_method}($coupon_no);
            if (empty($row) === true) {
                throw new \Exception('유효하지 않은 쿠폰입니다. 쿠폰번호를 확인해주세요.', _HTTP_NOT_FOUND);
            }

            // 쿠폰타입 체크
            if ($this->_coupon_type_ccd[$coupon_type] != $row['CouponTypeCcd']) {
                throw new \Exception('쿠폰타입이 일치하지 않습니다.', _HTTP_NO_PERMISSION);
            }

            // 발급유효기간 확인
            if ($today < $row['IssueStartDate'] || $today > $row['IssueEndDate']) {
                throw new \Exception('유효기간이 만료된 쿠폰입니다.', _HTTP_NO_PERMISSION);
            }

            // 오프라인 쿠폰일 경우만 체크
            if ($is_pin === true) {
                if ($row['PinType'] == 'R') {
                    // 오프라인 > 랜덤핀
                    $chk_condition = ['EQ' => ['CouponPin' => $row['CouponPin'], 'ValidStatus' => 'Y']];
                } else {
                    // 오프라인 > 공통핀
                    $chk_condition = ['EQ' => ['CouponIdx' => $row['CouponIdx'], 'MemIdx' => $mem_idx, 'ValidStatus' => 'Y']];
                }

                $chk_row = $this->_conn->getFindResult($this->_table['coupon_detail'], 'CdIdx', $chk_condition);
                if (empty($chk_row) === false) {
                    throw new \Exception('이미 등록된 쿠폰입니다.', _HTTP_NO_PERMISSION);
                }
            }

            // 회원쿠폰 등록
            $data = [
                'CouponPin' => $row['CouponPin'],
                'CouponIdx' => $row['CouponIdx'],
                'MemIdx' => $mem_idx,
                'IssueOrderProdIdx' => $issue_order_prod_idx,
                'IssueTypeCcd' => $issue_type_ccd,
                'ValidStatus' => 'Y',
                'ExpireDatm' => $row['ExpireDatm'],
                'IssueUserType' => 'M',
                'IssueUserIdx' => $mem_idx,
                'IssueIp' => $reg_ip
            ];

            $is_insert = $this->_conn->set($data)->set('IssueDatm', 'NOW()', false)->set('RegDatm', 'NOW()', false)->insert($this->_table['coupon_detail']);
            if ($is_insert === false) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }

            // 사용자 쿠폰 식별자
            $coupon_detail_idx = $this->_conn->insert_id();

            return ['ret_cd' => true, 'ret_data' => [
                'coupon_detail_idx' => $coupon_detail_idx, 'coupon' => $row
            ]];
        } catch (\Exception $e) {
            return ['ret_cd' => false, 'ret_msg' => $e->getMessage()];
        }
    }

    /**
     * 쿠폰 발급여부 확인
     * @param $couponidx
     * @param $add_condition
     * @return mixed
     */
    public function checkIssueCoupon($couponidx, $add_condition=[])
    {
        $arr_condition = array_merge_recursive($add_condition,[
            'EQ' => [
                'C.CouponIdx' =>  $couponidx,
                'CP.MemIdx' =>  $this->session->userdata('mem_idx')
            ]
        ]);

        $column = 'count(*) as checkCnt';
        $from = '
            from ' . $this->_table['coupon'] . ' as C
                inner join ' . $this->_table['coupon_detail'] . ' as CP
                    on C.CouponIdx = CP.CouponIdx
            where  CP.ValidStatus = "Y"
            ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where)->row(0)->checkCnt;

        return $query;
    }

    /**
     * 쿠폰 발급여부 확인
     * @param $arr_condition
     * @return mixed
     */
    public function checkOverlapCoupon($arr_condition=[])
    {
        $column = 'count(*) as checkCnt';
        $from = '
            from ' . $this->_table['coupon'] . ' as C
                inner join ' . $this->_table['coupon_detail'] . ' as CP
                    on C.CouponIdx = CP.CouponIdx
            where  CP.ValidStatus = "Y"
            ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where)->row(0)->checkCnt;

        return $query;
    }

    /**
     * 쿠폰상품 SMS 발송 메시지 조회
     * @param int $cd_idx [쿠폰사용식별자]
     * @param int $mem_idx [회원식별자]
     * @return mixed
     */
    public function getCouponProductAutoSmsMsg($cd_idx, $mem_idx)
    {
        $column = 'PSM.SendTel AS SendSmsTel, PSM.Memo AS SendSmsMsg, CONCAT(OP.OrderProdIdx, RIGHT(OP.MemIdx, 3)) AS EventCertCode';
        $from = "
            FROM {$this->_table['order_product']} AS OP
            INNER JOIN {$this->_table['order']} AS O ON OP.OrderIdx = O.OrderIdx
            LEFT JOIN {$this->_table['product']} AS P ON OP.ProdCode = P.ProdCode AND P.IsStatus = 'Y'
            LEFT JOIN {$this->_table['product_sms']} AS PSM ON OP.ProdCode = PSM.ProdCode AND PSM.IsStatus = 'Y'
            WHERE OP.UserCouponIdx = ?
            AND O.MemIdx = ? 
            AND P.IsSms = 'Y'                                            
        ";
        $query = $this->_conn->query('SELECT ' . $column . $from, [$cd_idx, $mem_idx]);
        return $query->result_array();
    }
}
