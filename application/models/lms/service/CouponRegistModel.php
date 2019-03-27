<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponRegistModel extends WB_Model
{
    private $_table = [
        'coupon' => 'lms_coupon',
        'coupon_detail' => 'lms_coupon_detail',
        'coupon_r_category' => 'lms_coupon_r_category',
        'coupon_r_product' => 'lms_coupon_r_product',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'product' => 'lms_product',
        'admin' => 'wbs_sys_admin'
    ];
    public $_ccd = [
        'CouponType' => '644',
        'ApplyType' => '645',
        'LecType' => '646',
        'IssueType' => '647'
    ];
    public $_coupon_type_ccd = ['coupon' => '644001', 'voucher' => '644002'];   // 쿠폰유형 (할인권, 수강권)
    public $_apply_type_to_lec_ccds = ['645001', '645002', '645003', '645004']; // 온라인강좌, 수강연장, 배수, 학원강좌
    public $_apply_type_to_range_ccds = ['645001', '645002', '645003', '645004', '645005', '645007']; // 온라인강좌, 수강연장, 배수, 학원강좌, 교재, 모의고사
    public $_apply_type_to_mock_ccd = '645007'; // 모의고사

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 쿠폰 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAllCoupon($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            if ($is_count == 'excel') {
                $column = 'SiteName, CateName, concat(CouponName, " [", CouponIdx, "]") as CouponName, DeployName, CouponTypeName
                    , concat(PinName, if(PinType = "R", concat(" (", PinIssueCnt, "개)"), "")) as PinName
                    , ApplyTypeName, LecTypeCcds, ApplyRangeName
                    , concat(ValidDay, "일", " (", IssueStartDate, "~", IssueEndDate, ")") as ValidDay, IssueValid, concat(DiscRate, if(DiscType = "R", "%", "원")) as DiscRate, UseCnt, IssueCnt
                    , if(IsIssue = "Y", "발급", "미발급") as IsIssue, RegAdminName, RegDatm';
            }
        }

        $from = /** @lang text */
            'select
                C.CouponIdx, C.SiteCode, C.CouponName, C.CouponTypeCcd, C.PinType, C.PinIssueCnt, C.DeployType, C.ApplyTypeCcd, C.LecTypeCcds, C.ApplyRangeType
                    , C.IssueStartDate, C.IssueEndDate, C.ValidDay, C.DiscRate, C.DiscType, C.IsIssue, C.RegDatm, C.RegAdminIdx
                    , if(C.PinType = "S", "공통핀번호", if(C.PinType = "R", "랜덤핀번호", "")) as PinName
                    , if(C.DeployType = "N", "온라인", "오프라인") as DeployName                   
                    , if(C.ApplyRangeType = "A", "전체", if(C.ApplyRangeType = "I", "항목별", "특정상품")) as ApplyRangeName
                    , (case when current_date() between C.IssueStartDate and C.IssueEndDate then "유효"
                           when current_date() > C.IssueEndDate then "만료"
                           else "발급전"
                      end) as IssueValid
                    , SCC.CcdName as CouponTypeName, SCA.CcdName as ApplyTypeName                      
                    , S.SiteName, CC.CateCode, CC.CateCodes, SC.CateName, ifnull(CD.IssueCnt, 0) as IssueCnt, ifnull(CD.UseCnt, 0) as UseCnt, A.wAdminName as RegAdminName            
            from ' . $this->_table['coupon'] . ' as C
                left join (
                    select CouponIdx, min(CateCode) as CateCode, GROUP_CONCAT(CateCode separator ",") as CateCodes
                    from ' . $this->_table['coupon_r_category'] . '
                    where IsStatus = "Y"
                    group by CouponIdx                    
                ) as CC
                    on C.CouponIdx = CC.CouponIdx
                inner join ' . $this->_table['code'] . ' as SCC
                    on C.CouponTypeCcd = SCC.Ccd and SCC.GroupCcd = "' . $this->_ccd['CouponType'] . '"                    
                inner join ' . $this->_table['code'] . ' as SCA
                    on C.ApplyTypeCcd = SCA.Ccd and SCA.GroupCcd = "' . $this->_ccd['ApplyType'] . '"
                left join ' . $this->_table['category'] . ' as SC
                    on C.SiteCode = SC.SiteCode and CC.CateCode = SC.CateCode and SC.IsStatus = "Y"
                left join (
                    select CouponIdx, count(*) as IssueCnt, sum(if(IsUse = "Y", 1, 0)) as UseCnt
                    from ' . $this->_table['coupon_detail'] . '
                    group by CouponIdx                
                ) as CD
                    on C.CouponIdx = CD.CouponIdx                    
                left join ' . $this->_table['site'] . ' as S
                    on C.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on C.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
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
     * 쿠폰 목록 조회 - 강좌 적용 검색용
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCoupon($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                A.*
                ,(case 
                    when current_date() between A.IssueStartDate and A.IssueEndDate then "유효"
                    when current_date() > A.IssueEndDate then "만료"
                    else "발급전"
                end) as IssueValid
                ,B.CcdName as CouponTypeCcdName
                ,C.CcdName as ApplyTypeCcdName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from lms_coupon A
                join lms_sys_code B on A.CouponTypeCcd = B.Ccd
                join lms_sys_code C on A.ApplyTypeCcd = C.Ccd
            where A.IsStatus=\'Y\'        
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 쿠폰 카테고리 연결 데이터 조회
     * @param $coupon_idx
     * @return array
     */
    public function listCouponCategory($coupon_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['coupon_r_category'] . ' as CC
                inner join ' . $this->_table['category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.CouponIdx = ? and CC.IsStatus = "Y" and C.IsUse = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.CcIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$coupon_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 쿠폰 상품 연결 데이터 조회
     * @param $coupon_idx
     * @return array
     */
    public function listCouponProduct($coupon_idx)
    {
        $data = $this->_conn->getJoinListResult($this->_table['coupon_r_product'] . ' as CP', 'inner', $this->_table['product'] . ' as P', 'CP.ProdCode = P.ProdCode'
                , 'CP.ProdCode, P.ProdName', [
                    'EQ' => [
                        'CP.CouponIdx' => $coupon_idx, 'CP.IsStatus' => 'Y', 'P.IsUse' => 'Y', 'P.IsStatus' => 'Y'
                    ]
                ], null, null, ['CP.CpIdx' => 'asc']
            );

        return array_pluck($data, 'ProdName', 'ProdCode');
    }

    /**
     * 쿠폰 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findCoupon($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['coupon'], $column, $arr_condition);
    }
    
    /**
     * 쿠폰 정보 수정 폼에 필요한 데이터 조회
     * @param $coupon_idx
     * @return array
     */
    public function findCouponForModify($coupon_idx)
    {
        $column = '
            C.CouponIdx, C.SiteCode, C.CouponName, C.CouponTypeCcd, C.PinType, C.PinIssueCnt, C.DeployType, C.ApplyTypeCcd, C.LecTypeCcds, C.ApplyRangeType
                , C.ApplySchoolYear, C.ApplySubjectIdx, C.ApplyCourseIdx, C.ApplyProfIdx, C.DiscType, C.DiscRate, C.DiscAllowPrice
                , C.IssueStartDate, C.IssueEndDate, C.ValidDay, C.CouponDesc, C.IsIssue, C.RegDatm, C.RegAdminIdx, C.UpdDatm, C.UpdAdminIdx
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = C.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(C.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = C.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName                            
        ';

        return $this->_conn->getFindResult($this->_table['coupon'] . ' as C', $column, [
            'EQ' => ['C.CouponIdx' => $coupon_idx]
        ]);
    }

    /**
     * 쿠폰 등록
     * @param array $input
     * @return array|bool
     */
    public function addCoupon($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $cate_code = element('cate_code', $input);
            $coupon_type_ccd = element('coupon_type_ccd', $input);
            $deploy_type = element('deploy_type', $input);
            $pin_type = ($deploy_type == 'F') ? element('pin_type', $input) : 'N';
            $pin_issue_cnt = ($deploy_type == 'F') ? element('pin_issue_cnt', $input) : 0;
            $apply_type_ccd = element('apply_type_ccd', $input);
            $lec_type_ccd = (in_array($apply_type_ccd, $this->_apply_type_to_lec_ccds) === true) ? implode(',', element('lec_type_ccd', $input)) : '';
            $apply_range_type = (in_array($apply_type_ccd, $this->_apply_type_to_range_ccds) === true) ? element('apply_range_type', $input, 'A') : 'A';
            $apply_school_year = ($apply_range_type == 'I') ? element('apply_school_year', $input) : '';
            $apply_subject_idx = ($apply_range_type == 'I') ? element('apply_subject_idx', $input) : '';
            $apply_course_idx = ($apply_range_type == 'I') ? element('apply_course_idx', $input) : '';
            $apply_prof_idx = ($apply_range_type == 'I') ? element('apply_prof_idx', $input) : '';

            // 쿠폰유형이 수강권일 경우 할인율 100%로 고정
            if ($coupon_type_ccd == $this->_coupon_type_ccd['voucher']) {
                $disc_type = 'R';
                $disc_rate = '100';
            } else {
                $disc_type = element('disc_type', $input);
                $disc_rate = element('disc_rate', $input);
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CouponName' => element('coupon_name', $input),
                'CouponTypeCcd' => $coupon_type_ccd,
                'PinType' => $pin_type,
                'PinIssueCnt' => $pin_issue_cnt,
                'DeployType' => $deploy_type,
                'ApplyTypeCcd' => $apply_type_ccd,
                'LecTypeCcds' => $lec_type_ccd,
                'ApplyRangeType' => $apply_range_type,
                'ApplySchoolYear' => $apply_school_year,
                'ApplySubjectIdx' => $apply_subject_idx,
                'ApplyCourseIdx' => $apply_course_idx,
                'ApplyProfIdx' => $apply_prof_idx,
                'DiscType' => $disc_type,
                'DiscRate' => $disc_rate,
                'DiscAllowPrice' => element('disc_allow_price', $input),
                'IssueStartDate' => element('issue_start_date', $input),
                'IssueEndDate' => element('issue_end_date', $input),
                'ValidDay' => element('valid_day', $input),
                'CouponDesc' => element('coupon_desc', $input),
                'IsIssue' => element('is_issue', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['coupon']) === false) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }

            // 등록된 쿠폰 식별자
            $coupon_idx = $this->_conn->insert_id();

            // 카테고리 정보 등록
            if (empty($cate_code) === false) {
                $is_coupon_category = $this->_replaceCouponCategory($cate_code, $coupon_idx);
                if ($is_coupon_category !== true) {
                    throw new \Exception($is_coupon_category);
                }
            }

            // 상품 정보 등록
            if ($apply_range_type == 'P') {
                $is_coupon_product = $this->_replaceCouponProduct(element('prod_code', $input), $coupon_idx);
                if ($is_coupon_product !== true) {
                    throw new \Exception($is_coupon_product);
                }
            }

            // 배포루트가 오프라인일 경우 핀번호 배정
            if ($deploy_type == 'F') {
                // 쿠폰핀 모델 로드
                $this->load->loadModels(['service/couponPin']);
                $is_assign_pin = $this->couponPinModel->assignCouponPin($pin_issue_cnt, $coupon_idx);
                if ($is_assign_pin !== true) {
                    throw new \Exception($is_assign_pin);
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
     * 쿠폰 수정 (쿠폰 설정 관련 정보 수정 불가)
     * @param array $input
     * @return array|bool
     */
    public function modifyCoupon($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $coupon_idx = element('idx', $input);

            // 기존 쿠폰 기본정보 조회
            $row = $this->findCoupon('CouponIdx', ['EQ' => ['CouponIdx' => $coupon_idx]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 상품 정보 수정
            $data = [
                'CouponName' => element('coupon_name', $input),
                'IssueStartDate' => element('issue_start_date', $input),
                'IssueEndDate' => element('issue_end_date', $input),
                'ValidDay' => element('valid_day', $input),
                'CouponDesc' => element('coupon_desc', $input),
                'IsIssue' => element('is_issue', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            
            if ($this->_conn->set($data)->where('CouponIdx', $coupon_idx)->update($this->_table['coupon']) === false) {
                throw new \Exception('쿠폰 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 쿠폰 카테고리 연결 데이터 저장
     * @param $arr_cate_code
     * @param $coupon_idx
     * @return bool|string
     */
    private function _replaceCouponCategory($arr_cate_code, $coupon_idx)
    {
        $_table = $this->_table['coupon_r_category'];
        $arr_cate_code = (is_null($arr_cate_code) === true) ? [] : array_values(array_unique($arr_cate_code));
        $admin_idx = $this->session->userdata('admin_idx');

        try {
            // 기존 설정된 카테고리 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'CcIdx, CateCode', ['EQ' => ['CouponIdx' => $coupon_idx, 'IsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'CateCode', 'CcIdx');

                // 기존 등록된 카테고리 연결 데이터 삭제 처리 (전달된 카테고리 식별자 중에 기 등록된 카테고리 식별자가 없다면 삭제 처리)
                $arr_delete_cate_code = array_diff($data, $arr_cate_code);
                if (count($arr_delete_cate_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('CcIdx', array_keys($arr_delete_cate_code))->where('CouponIdx', $coupon_idx)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리 식별자 중에 전달된 카테고리 식별자가 없다면 등록 처리)
            $arr_insert_cate_code = array_diff($arr_cate_code, $data);
            foreach ($arr_insert_cate_code as $cate_code) {
                $is_insert = $this->_conn->set([
                    'CouponIdx' => $coupon_idx,
                    'CateCode' => $cate_code,
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ])->insert($_table);

                if ($is_insert === false) {
                    throw new \Exception('카테고리 정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 쿠폰 상품 연결 데이터 저장
     * @param $arr_prod_code
     * @param $coupon_idx
     * @return bool|string
     */
    private function _replaceCouponProduct($arr_prod_code, $coupon_idx)
    {
        $_table = $this->_table['coupon_r_product'];
        $arr_prod_code = (is_null($arr_prod_code) === true) ? [] : array_values(array_unique($arr_prod_code));
        $admin_idx = $this->session->userdata('admin_idx');

        try {
            // 기존 설정된 상품 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'CpIdx, ProdCode', ['EQ' => ['CouponIdx' => $coupon_idx, 'IsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'ProdCode', 'CpIdx');

                // 기존 등록된 상품 연결 데이터 삭제 처리 (전달된 상품코드 중에 기 등록된 상품코드가 없다면 삭제 처리)
                $arr_delete_prod_code = array_diff($data, $arr_prod_code);
                if (count($arr_delete_prod_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('CpIdx', array_keys($arr_delete_prod_code))->where('CouponIdx', $coupon_idx)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 상품 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 상품코드 중에 전달된 상품코드가 없다면 등록 처리)
            $arr_insert_prod_code = array_diff($arr_prod_code, $data);
            foreach ($arr_insert_prod_code as $prod_code) {
                $is_insert = $this->_conn->set([
                    'CouponIdx' => $coupon_idx,
                    'ProdCode' => $prod_code,
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ])->insert($_table);

                if ($is_insert === false) {
                    throw new \Exception('상품 정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
