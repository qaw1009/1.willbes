<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class CartFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();

        // 사용 모델 로드
        $this->load->loadModels(['product/productF', 'order/orderListF']);
    }

    /**
     * 장바구니 목록 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param array $arr_out_condition
     * @return mixed
     */
    public function listCart($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_out_condition = [])
    {
        if ($is_count === true) {
            $column = 'numrows';
            $in_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*
                , ifnull(JSON_VALUE(CalcPriceData, "$.SalePrice"), OriSalePrice) as SalePrice
                , ifnull(JSON_VALUE(CalcPriceData, "$.SaleRate"), OriSaleRate) as SaleRate
                , ifnull(JSON_VALUE(CalcPriceData, "$.SaleDiscType"), OriSaleDiscType) as SaleDiscType
                , ifnull(JSON_VALUE(CalcPriceData, "$.RealSalePrice"), OriRealSalePrice) as RealSalePrice
                , ifnull(JSON_EXTRACT(CalcPriceData, "$.SubRealSalePrice"), "") as SubRealSalePrice
                , ifnull(JSON_VALUE(CalcPriceData, "$.LecExten"), 0) as AddExtenDay
                , if(LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '" and IsPackLecStartType = "S", fn_product_sublecture_selected_data(ProdCode, ProdCodeSub), "") as SubProdData';

            $in_column = 'CA.CartIdx, CA.MemIdx, CA.SiteCode, PC.CateCode, CA.ProdCode
                , ifnull(if(
                    (PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '")
                        or (PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_userpack_lecture_type_ccd['fixed'] . '")
                    , fn_product_sublecture_codes(CA.ProdCode)
                    , CA.ProdCodeSub
                  ), "") as ProdCodeSub
                , CA.ParentProdCode, CA.SaleTypeCcd, CA.SalePatternCcd, CA.ProdQty, CA.IsDirectPay, CA.IsVisitPay, CA.CaIdx, CA.ExtenDay, CA.PostData
                , CA.TargetOrderIdx, CA.TargetProdCode, CA.TargetProdCodeSub 
                , concat(P.ProdName, if(CA.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", concat(" (", fn_ccd_name(CA.SalePatternCcd), ")"), "")) as ProdName
                , P.ProdTypeCcd, ifnull(PL.LearnPatternCcd, "") as LearnPatternCcd, PL.PackTypeCcd, PL.StudyPeriodCcd, P.IsCoupon, P.PointApplyCcd, P.PointSaveType, P.PointSavePrice, P.IsAllianceDisc
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['retake'] . '", "N", P.IsPoint) as IsPoint
                , if((PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" and CA.SalePatternCcd != "' . $this->_sale_pattern_ccd['retake'] . '") or P.ProdTypeCcd in ("' . $this->_prod_type_ccd['book'] . '"), "Y", "N") as IsUsePoint                
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '", "N", P.IsFreebiesTrans) as IsFreebiesTrans
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '", "N", P.IsDeliveryInfo) as IsDeliveryInfo                                
                , ifnull(PB.SchoolYear, PL.SchoolYear) as SchoolYear, ifnull(PB.CourseIdx, PL.CourseIdx) as CourseIdx
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", fn_product_book_subject_idxs(CA.ProdCode), PL.SubjectIdx) as SubjectIdx
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", fn_product_book_prof_idxs(CA.ProdCode), PD.ProfIdx) as ProfIdx                                         
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '" or PL.StudyPeriodCcd = "' . $this->_study_period_ccd['end_date'] . '", "N", PL.IsLecStart) as IsLecStart                
                , (case when PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['adminpack_lecture'] . '", "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '") and PL.StudyPeriodCcd = "' . $this->_study_period_ccd['end_date'] . '" 
                        then ifnull(datediff(PL.StudyEndDate, date_format(NOW(), "%Y-%m-%d")) + 1, "")
                    else ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate) + 1, ""))
                  end) as StudyPeriod
                , PL.StudyStartDate, PL.StudyEndDate, PL.StudyApplyCcd, PL.IsPackLecStartType, PL.CampusCcd, fn_ccd_name(PL.CampusCcd) as CampusCcdName, fn_ccd_name(PL.StudyPatternCcd) as StudyPatternCcdName
                , PL.LecSaleType, SC.CateName, WB.wAttachImgPath, WB.wAttachImgName as wAttachImgOgName
                , PS.SalePrice as OriSalePrice, PS.SaleRate as OriSaleRate, PS.SaleDiscType as OriSaleDiscType, PS.RealSalePrice as OriRealSalePrice
                , (case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_userpack_lecture_type_ccd['normal'] . '" then fn_product_userpack_price_data(CA.ProdCode, CA.SaleTypeCcd, CA.ProdCodeSub)
                    when CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['retake'] . '" then JSON_OBJECT("RealSalePrice", cast(PS.SalePrice * ((100 - PL.RetakeSaleRate) / 100) as int))
                    when CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '" then JSON_OBJECT("RealSalePrice", floor((PS.SalePrice * CA.ExtenDay) / PL.StudyPeriod))
                    else null
                  end) as CalcPriceData
                , (case P.ProdTypeCcd
                    when "' . $this->_prod_type_ccd['book'] . '" then "book" 
                    when "' . $this->_prod_type_ccd['on_lecture'] . '" then "on_lecture"
                    when "' . $this->_prod_type_ccd['off_lecture'] . '" then "off_lecture"
                    when "' . $this->_prod_type_ccd['mock_exam'] . '" then "mock_exam"
                    else "etc"
                  end) as CartType
                , (case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" then "on_lecture" 
                    when PL.LearnPatternCcd in ("' . implode('","', $this->_on_pack_lecture_pattern_ccd) . '") then "on_pack_lecture"
                    when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" then "off_lecture"
                    when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" then "off_pack_lecture"
                    when P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" then "book"
                    when P.ProdTypeCcd = "' . $this->_prod_type_ccd['mock_exam'] . '" then "mock_exam"
                    when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_price'] . '" then "delivery_price"
                    when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_add_price'] . '" then "delivery_add_price"
                    else "etc" 
                  end) as CartProdType
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '", fn_product_closing_yn(CA.ProdCode, PL.FixNumber), "N") as IsClosing                
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['cart'] . ' as CA
                inner join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on CA.ProdCode = PC.ProdCode and PC.IsStatus = "Y"    
                left join ' . $this->_table['product_sale'] . ' as PS
                    on CA.ProdCode = PS.ProdCode and CA.SaleTypeCcd = PS.SaleTypeCcd and PS.IsStatus = "Y" and PS.SalePriceIsUse = "Y"
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on CA.ProdCode = PL.ProdCode
                left join ' . $this->_table['product_division'] . ' as PD
                    on CA.ProdCode = PD.ProdCode and PD.IsReprProf = "Y" and PD.IsStatus = "Y"                    
                left join ' . $this->_table['product_book'] . ' as PB
                    on CA.ProdCode = PB.ProdCode
                left join ' . $this->_table['bms_book'] . ' as WB
                    on PB.wBookIdx = WB.wBookIdx and WB.wIsUse = "Y" and WB.wIsStatus = "Y"  
                left join ' . $this->_table['category'] . ' as SC
                    on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"                                      
            where CA.IsStatus = "Y"   
                and P.IsStatus = "Y"                                                                  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $out_where = $this->_conn->makeWhere($arr_out_condition);
        $out_where = $out_where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $out_where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 유효한 장바구니 목록
     * @param int $mem_idx [회원 식별자]
     * @param int $site_code [사이트코드]
     * @param null|int $cate_code [상품 카테고리 코드]
     * @param array $cart_idx [장바구니 식별자 배열]
     * @param array $prod_code [상품코드 배열]
     * @param string $is_direct_pay [바로결제 여부, Y/N]
     * @param string $is_visit_pay [방문접수 여부, Y/N]
     * @param bool $is_check_closing [정원체크 여부]
     * @param string $cond_type [장바구니 조건구분]
     * @return mixed
     */
    public function listValidCart($mem_idx, $site_code, $cate_code = null, $cart_idx = [], $prod_code = [], $is_direct_pay = 'N', $is_visit_pay = 'N', $is_check_closing = false, $cond_type = '')
    {
        $arr_out_condition = [];
        $arr_condition = [
            'EQ' => [
                'CA.MemIdx' => $mem_idx, 'CA.SiteCode' => $site_code, 'CA.IsDirectPay' => $is_direct_pay, 'CA.IsVisitPay' => $is_visit_pay,
            ],
            'IN' => [
                'CA.CartIdx' => $cart_idx,
                'CA.ProdCode' => $prod_code
            ],
            'LKR' => [
                'PC.CateCode' => $cate_code,
            ],
            'RAW' => [
                'CA.ExpireDatm > ' => 'NOW()',
                'CA.ConnOrderIdx is ' => 'null',
                '(P.ProdTypeCcd != ' => '"' . $this->_prod_type_ccd['book']. '" OR (P.ProdTypeCcd = "' . $this->_prod_type_ccd['book']. '" and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book']. '"))'
            ]
        ];

        // 재수강, 수강연장일 경우
        if ($cond_type == 'retake' || $cond_type == 'extend') {
            $arr_condition['RAW']['(P.IsUse = '] = '"Y" OR P.SaleStatusCcd != "' . $this->_not_sale_status_ccd . '")';
        } else {
            $arr_condition['EQ']['P.IsUse'] = 'Y';
            $arr_condition['EQ']['P.IsSaleEnd'] = 'N';
            $arr_condition['EQ']['P.SaleStatusCcd'] = $this->_available_sale_status_ccd['product'];
            $arr_condition['RAW']['NOW() between '] = 'P.SaleStartDatm and P.SaleEndDatm';
        }

        // 방문결제일 경우 세션 아이디 컬럼 추가
        if ($is_visit_pay == 'Y') {
            $arr_condition['EQ']['CA.SessId'] = $this->session->userdata($this->_sess_cart_sess_id);
            $order_by = ['CartIdx' => 'asc'];
        } else {
            $order_by = ['ProdTypeCcd' => 'asc', 'CartIdx' => 'desc'];
        }

        // 정원 체크 조건
        if ($is_check_closing === true) {
            $arr_out_condition['EQ']['IsClosing'] = 'N';
        }

        return $this->listCart(false, $arr_condition, null, null, $order_by, $arr_out_condition);
    }

    /**
     * 단일 장바구니 조회
     * @param int $cart_idx [장바구니 식별자]
     * @param int $mem_idx [회원 식별자]
     * @return mixed
     */
    public function findCartByCartIdx($cart_idx, $mem_idx = null)
    {
        $arr_condition = ['EQ' => ['CA.CartIdx' => $cart_idx, 'CA.MemIdx' => $mem_idx]];
        $data = $this->listCart(false, $arr_condition, null, null, []);

        return element('0', $data, []);
    }

    /**
     * 수강생교재 구매시 부모상품 주문여부 및 장바구니 확인
     * @param int $site_code [미사용, 사이트코드]
     * @param string $prod_book_code [교재상품코드]
     * @param string $parent_prod_code [부모상품코드 (강좌상품코드)]
     * @param array $arr_input_prod_code [미사용, 교재상품과 동시에 장바구니에 저장될 상품코드, form input 상품코드]
     * @param int $prod_qty [상품수량]
     * @return bool|string [true : 구매가능, string : 구매불가]
     */
    public function checkStudentBook($site_code, $prod_book_code, $parent_prod_code, $arr_input_prod_code = [], $prod_qty = 1)
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 에러 메시지
        $err_msg = '선택하신 수강생 교재에 해당하는 강좌를 구매하지 않으셨습니다. 해당 강좌를 선 구매 후 수강생 교재를 다시 구매해 주세요.';

        // 1. 해당 강좌상품의 서브강좌 중 해당 수강생교재를 포함하고 있는 단강좌 코드 리턴
        $target_rows = $this->productFModel->findLectureProductToStudentBook($parent_prod_code, $prod_book_code);

        if (empty($target_rows) === true) {
            // 수강생교재가 아닐 경우
            return true;
        }
        $arr_target_prod_code = array_pluck($target_rows, 'ProdCode');

        // 2. 1권만 구매 가능
        if ($prod_qty > 1) {
            return '수강생 교재는 1권만 구매 가능합니다.';
        }

        // 3. 수강생교재 구매여부 확인 (1권만 구매가능, 구매정보가 있다면 return false, 없다면 continue)
        $book_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
            'EQ' => ['OP.MemIdx' => $sess_mem_idx, 'OP.ProdCode' => $prod_book_code, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]
        ]);

        if ($book_paid_cnt > 0) {
            return '이미 동일한 수강생 교재를 구매하셨습니다.';
        }

        // 4. 수강생교재 판매금액 조회
        $real_sale_price = $this->productFModel->getProductSaleTypePrice($prod_book_code, 'R');
        if (is_null($real_sale_price) === true) {
            return '수강생 교재 판매금액 조회에 실패했습니다.';
        }

        // 5. 회원이 구매한 결제완료된 내강의실 정보 조회
        $add_condition = [];
        if ($real_sale_price < 1) {
            // 수강생교재 판매금액이 0원일 경우 0원결제 결제루트 제외 (기간제패키지 제외 조건 추가)
            //$add_condition = ['NOT' => ['O.PayRouteCcd' => $this->_pay_route_ccd['zero']]];
            $add_condition['RAW']['(O.PayRouteCcd !='] = ' "' . $this->_pay_route_ccd['zero'] . '" OR PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '")';
        }

        $my_lecture_rows = $this->orderListFModel->getMemberMyLectureByProdCodeSub($arr_target_prod_code, $add_condition);
        if (empty($my_lecture_rows) === false) {
            return true;
        }

        return $err_msg;
    }

    /**
     * 수강생교재 구매시 부모상품 주문여부 및 장바구니 확인 (사용안함)
     * @param int $site_code [사이트코드]
     * @param string $prod_book_code [교재상품코드]
     * @param string $parent_prod_code [부모상품코드 (강좌상품코드)]
     * @param array $arr_input_prod_code [교재상품과 동시에 장바구니에 저장될 상품코드, form input 상품코드]
     * @return bool|string [true : 구매가능, string : 구매불가]
     */
    public function checkStudentBookNotUsed($site_code, $prod_book_code, $parent_prod_code, $arr_input_prod_code = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 에러 메시지
        $err_msg = '선택하신 수강생 교재에 해당하는 강좌를 선택하지 않으셨습니다. 해당 강좌를 선택해 주세요.';

        // 1. 해당 도서 수강생교재 여부 확인, 수강생교재일 경우 연관된 부모상품코드 조회
        $arr_target_prod_code = array_pluck($this->productFModel->findParentProductToStudentBook($prod_book_code), 'ProdCode');
        if (empty($arr_target_prod_code) === true) {
            // 수강생교재가 아닐 경우
            return true;
        } else {
            // 부모상품의 구매교재정보에서 수강생교재로 설정되지 않을 경우
            if (in_array($parent_prod_code, $arr_target_prod_code) === false) {
                return true;
            }
        }

        // 2. 수강생교재 구매여부 확인 (1권만 구매가능, 구매정보가 있다면 return false, 없다면 continue)
        $book_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
            'EQ' => ['OP.MemIdx' => $sess_mem_idx, 'OP.ProdCode' => $prod_book_code, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]
        ]);

        if ($book_paid_cnt > 0) {
            return '이미 동일한 수강생 교재를 구매하셨습니다.';
        }

        // 3. 교재상품과 동시에 장바구니에 저장되는 상품코드와 수강생교재 부모상품코드 비교 (동일한 상품코드가 있다면 return true, 없다면 continue)
        $arr_same_prod_code = array_intersect($arr_target_prod_code, $arr_input_prod_code);
        if (empty($arr_same_prod_code) === false) {
            return true;
        }

        // 4. 수강생교재 부모상품코드 장바구니 등록여부 확인 (등록되어 있다면 return true, 없다면 continue)
        $cart_data = $this->listValidCart($sess_mem_idx, $site_code);

        // 단강좌는 상품코드, 패키지 상품일 경우 연결된 단강좌 상품코드를 병합
        $arr_cart_prod_code = [];
        $arr_tmp_prod_code = array_pluck($cart_data, 'ProdCodeSub', 'ProdCode');
        foreach ($arr_tmp_prod_code as $prod_code => $prod_sub_code) {
            $arr_cart_prod_code = array_merge($arr_cart_prod_code, [(string) $prod_code]);
            empty($prod_sub_code) === false && $arr_cart_prod_code = array_merge($arr_cart_prod_code, explode(',', $prod_sub_code));
        }
        $arr_cart_prod_code = array_unique($arr_cart_prod_code);

        // 수강생교재 부모상품코드와 병합된 상품코드 비교
        $arr_same_prod_code = array_intersect($arr_target_prod_code, $arr_cart_prod_code);
        if (empty($arr_same_prod_code) === false) {
            return true;
        }

        // 5. 수강생교재 부모 단강좌 상품 구매여부 확인 (구매정보가 있다면 return true, 없다면 continue)
        $arr_paid_prod_code = array_pluck($this->orderListFModel->getMemberOrderProdCodes($this->_pay_status_ccd['paid']), 'ProdCode');
        $arr_same_prod_code = array_intersect($arr_target_prod_code, $arr_paid_prod_code);
        if (empty($arr_same_prod_code) === false) {
            return true;
        }

        return $err_msg;
    }

    /**
     * 장바구니 등록
     * @param string $learn_pattern [학습형태]
     * @param array $input [입력정보]
     * @return array
     */
    public function addCart($learn_pattern, $input = [])
    {
        $this->_conn->trans_begin();
        $results = [];

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');
            $sess_gw_idx = $this->session->userdata('gw_idx');
            $reg_ip = $this->input->ip_address();
            $arr_temp_prod_code = $this->makeProdCodeArray($learn_pattern, element('prod_code', $input, []));
            $arr_prod_code = element('data', $arr_temp_prod_code);
            $is_prod_mixed = element('is_mixed', $arr_temp_prod_code);
            $site_code = element('site_code', $input, '');
            $is_direct_pay = element('is_direct_pay', $input, 'N');
            $is_visit_pay = element('is_visit_pay', $input, 'N');
            $sale_pattern_ccd = array_get($this->_sale_pattern_ccd, element('sale_pattern', $input, 'normal'), $this->_sale_pattern_ccd['normal']);

            // 데이터 저장
            foreach ($arr_prod_code as $prod_code => $prod_row) {
                // 학습형태별 사전 체크
                $check_result = $this->checkProduct($prod_row['LearnPattern'], $site_code, $prod_code, $prod_row['ParentProdCode'], $is_visit_pay, false, true, $sale_pattern_ccd);
                if ($check_result !== true) {
                    throw new \Exception($check_result);
                }

                $prod_sub_code = '';
                if ($prod_row['LearnPattern'] != 'book' && empty(element('prod_code_sub', $input)) === false) {
                    // 서브 강좌가 있는 경우 (운영자 선택형 패키지, 사용자 패키지, 학원 종합반)
                    $prod_sub_code = implode(',', element('prod_code_sub', $input, []));
                }

                // 강좌, 교재상품이 동시에 바로 결제될 경우 교재상품은 바로결제 여부를 N으로 강제 변경
                $is_direct_pay_change = false;
                if ($is_direct_pay == 'Y' && $is_prod_mixed === true && $prod_row['LearnPattern'] == 'book') {
                    $is_direct_pay_change = true;
                }

                // 상품 수량
                $prod_qty = array_get($input, 'prod_qty.' . $prod_code, 1);
                if (empty($prod_qty) === true || is_numeric($prod_qty) === false || $prod_qty < 1) {
                    $prod_qty = 1;
                }

                // 데이터 등록
                $data = [
                    'MemIdx' => $sess_mem_idx,
                    'SiteCode' => $site_code,
                    'ProdCode' => $prod_code,
                    'ProdCodeSub' => $prod_sub_code,
                    'ParentProdCode' => $prod_row['ParentProdCode'],
                    'SaleTypeCcd' => $prod_row['SaleTypeCcd'],
                    'SalePatternCcd' => $sale_pattern_ccd,
                    'ProdQty' => $prod_qty,
                    'IsDirectPay' => $is_direct_pay_change === true ? 'N' : $is_direct_pay,
                    'IsVisitPay' => $is_visit_pay,
                    'TargetOrderIdx' => element('target_order_idx', $input),
                    'TargetProdCode' => element('target_prod_code', $input),
                    'TargetProdCodeSub' => element('target_prod_code_sub', $input),
                    'ExtenDay' => element('extend_day', $input),
                    'PostData' => element('post_data', $input),
                    'CaIdx' => element('ca_idx', $input),
                    'GwIdx' => $sess_gw_idx,
                    'RegIp' => $reg_ip
                ];

                // 방문결제일 경우 세션 아이디 컬럼 저장
                if ($is_visit_pay == 'Y') {
                    $data['SessId'] = $this->session->userdata($this->_sess_cart_sess_id);
                }
                
                $insert_cart_idx = $this->_addCart($data);
                if (is_numeric($insert_cart_idx) === false) {
                    throw new \Exception($insert_cart_idx);
                }                

                // 바로결제 여부가 변경된 경우 장바구니 식별자 리턴 안함
                if ($is_direct_pay_change === false) {
                    $results[] = $insert_cart_idx;
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $results];
    }

    /**
     * 장바구니 데이터 등록
     * @param array $input
     * @return string
     */
    public function _addCart($input = [])
    {
        try {
            $mem_idx = element('MemIdx', $input);
            $prod_code = element('ProdCode', $input);

            // 이미 장바구니에 담긴 상품이 있는지 여부 확인
            $cart_row = $this->_conn->getFindResult($this->_table['cart'], 'CartIdx', [
                'EQ' => ['MemIdx' => $mem_idx, 'ProdCode' => $prod_code, 'IsStatus' => 'Y'],
                'RAW' => ['ExpireDatm > ' => 'NOW()', 'ConnOrderIdx is ' => 'null']
            ]);

            if (empty($cart_row) === false) {
                // 이미 장바구니에 담겨 있다면 삭제
                $is_delete = $this->_conn->where('CartIdx', $cart_row['CartIdx'])->where('MemIdx', $mem_idx)->delete($this->_table['cart']);
                if ($is_delete === false) {
                    throw new \Exception('기존 장바구니 데이터 삭제에 실패했습니다.');
                }
            }

            // 데이터 등록
            $this->_conn->set($input)->set('ExpireDatm', 'date_add(NOW(), interval 14 day)', false);
            if ($this->_conn->insert($this->_table['cart']) === false) {
                throw new \Exception('장바구니 등록에 실패했습니다.');
            }

            $insert_cart_idx = $this->_conn->insert_id();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $insert_cart_idx;
    }

    /**
     * 배송료 상품 전용 장바구니 등록
     * @param int $site_code [사이트코드]
     * @param string $cart_type [장바구니 구분, 온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book]
     * @param array $arr_cart_idx [선택된 장바구니 식별자 배열]
     * @return array|bool
     */
    public function addCartForDeliveryPrice($site_code, $cart_type, $arr_cart_idx = [])
    {
        $this->_conn->trans_begin();

        // 신규 등록되는 장바구니 식별자
        $insert_cart_idx = '';

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');
            $sess_gw_idx = $this->session->userdata('gw_idx');
            $reg_ip = $this->input->ip_address();
            $is_delivery_info = false;
            $total_prod_order_price = 0;
            $arr_is_freebies_trans = [];

            // 장바구니 데이터 조회
            $cart_rows = $this->listValidCart($sess_mem_idx, $site_code, null, $arr_cart_idx, null, null, null);

            foreach ($cart_rows as $idx => $row) {
                // 배송정보 입력 여부
                if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                    $is_delivery_info = true;
                }

                // 배송료 부과여부
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];
                
                // 전체상품 주문금액
                $total_prod_order_price += $row['RealSalePrice'] * $row['ProdQty'];
            }

            if ($is_delivery_info === true) {
                // 배송료 계산
                if ($cart_type == 'book') {
                    $delivery_price = $this->getBookDeliveryPrice($total_prod_order_price, $arr_is_freebies_trans);
                } else {
                    $delivery_price = $this->getLectureDeliveryPrice($arr_is_freebies_trans);
                }

                // 배송료 상품 등록
                if ($delivery_price > 0) {
                    // 배송료 상품 조회
                    $prod_rows = $this->productFModel->listSalesProduct('delivery_price', false, ['EQ' => ['SiteCode' => $site_code]], 1, 0, ['ProdCode' => 'desc']);
                    if (empty($prod_rows) === true) {
                        throw new \Exception('배송료 상품이 존재하지 않습니다.', _HTTP_NOT_FOUND);
                    }

                    $prod_row = element('0', $prod_rows);

                    // 판매가격 정보 확인
                    $prod_row['ProdPriceData'] = json_decode($prod_row['ProdPriceData'], true);
                    if (empty($prod_row['ProdPriceData']) === true || isset($prod_row['ProdPriceData'][0]['SaleTypeCcd']) === false) {
                        throw new \Exception('배송료 가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                    }
                    $prod_row['ProdPriceData'] = element('0', $prod_row['ProdPriceData']);

                    // 장바구니 등록
                    $data = [
                        'MemIdx' => $sess_mem_idx,
                        'SiteCode' => $site_code,
                        'ProdCode' => $prod_row['ProdCode'],
                        'ProdCodeSub' => '',
                        'ParentProdCode' => $prod_row['ProdCode'],
                        'SaleTypeCcd' => $prod_row['ProdPriceData']['SaleTypeCcd'],
                        'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                        'IsDirectPay' => 'Y',
                        'IsVisitPay' => 'N',
                        'GwIdx' => $sess_gw_idx,
                        'RegIp' => $reg_ip
                    ];

                    $insert_cart_idx = $this->_addCart($data);
                    if (is_numeric($insert_cart_idx) === false) {
                        throw new \Exception($insert_cart_idx);
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $insert_cart_idx];
    }

    /**
     * 장바구니 삭제
     * @param array $arr_cart_idx [장바구니 식별자 배열]
     * @return array|bool
     */
    public function removeCart($arr_cart_idx = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($arr_cart_idx) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 세션 회원 식별자
            $sess_mem_idx = $this->session->userdata('mem_idx');

            foreach ($arr_cart_idx as $idx => $cart_idx) {
                // 장바구니 조회
                $data = $this->findCartByCartIdx($cart_idx, $sess_mem_idx);
                if (empty($data) === true) {
                    throw new \Exception('장바구니 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                // 부모상품일 경우 연계상품 동시 삭제
                if ($data['ProdCode'] == $data['ParentProdCode']) {
                    $arr_condition = [
                        'EQ' => ['IsDirectPay' => 'N', 'IsVisitPay' => 'N', 'IsStatus' => 'Y'],
                        'RAW' => ['ExpireDatm > ' => 'NOW()', 'ConnOrderIdx is ' => 'null']
                    ];

                    $is_delete = $this->_conn->where('MemIdx', $sess_mem_idx)->where('ParentProdCode', $data['ParentProdCode'])->makeWhere($arr_condition)->delete($this->_table['cart']);
                } else {
                    $is_delete = $this->_conn->where('MemIdx', $sess_mem_idx)->where('CartIdx', $cart_idx)->delete($this->_table['cart']);
                }

                if ($is_delete === false) {
                    throw new \Exception('장바구니 삭제에 실패했습니다.');
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
     * 개별 장바구니 데이터 삭제 by CartIdx
     * @param $cart_idx
     * @return array|bool
     */
    public function removeCartByCartIdx($cart_idx)
    {
        $this->_conn->trans_begin();

        try {
            // 세션 회원 식별자
            $sess_mem_idx = $this->session->userdata('mem_idx');

            $is_delete = $this->_conn->where('MemIdx', $sess_mem_idx)->where('CartIdx', $cart_idx)->delete($this->_table['cart']);
            if ($is_delete === false) {
                throw new \Exception('장바구니 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 상품 체크
     * @param string $learn_pattern [학습형태]
     * @param int $site_code [사이트코드]
     * @param int $prod_code [상품코드]
     * @param int $parent_prod_code [부모상품코드]
     * @param string $is_visit_pay [방문결제여부, Y/N]
     * @param bool $is_data_return [상품 데이터 리턴 여부]
     * @param bool $is_cart [장바구니여부]
     * @param string $sale_pattern_ccd [판매형태공통코드]
     * @return bool|array|string
     */
    public function checkProduct($learn_pattern, $site_code, $prod_code, $parent_prod_code, $is_visit_pay, $is_data_return = false, $is_cart = false, $sale_pattern_ccd = '')
    {
        $sale_pattern = array_search($sale_pattern_ccd, $this->_sale_pattern_ccd);  // 판매형태구분

        if ($sale_pattern == 'retake' || $sale_pattern == 'extend') {
            // 재수강, 수강연장일 경우
            $data = $this->productFModel->findProductByProdCode($learn_pattern, $prod_code);

            // 미사용 and 판매불가일 경우만 수강신청 불가
            if ($data['IsUse'] == 'N' && $data['SaleStatusCcd'] == $this->_not_sale_status_ccd) {
                return '판매 중인 상품만 주문 가능합니다.';
            }
        } else {
            $data = $this->productFModel->findOnlySalesProductByProdCode($learn_pattern, $prod_code);
            if (empty($data) === true) {
                return '판매 중인 상품만 주문 가능합니다.';
            }
        }

        // 사이트코드 체크
        if ($site_code != $data['SiteCode']) {
            return '사이트 정보가 일치하지 않습니다.';
        }

        if ($learn_pattern == 'book') {
            // 수강생 교재 체크 (체크안함)
            /*if ($is_cart === false) {
                $check_result = $this->checkStudentBook($site_code, $prod_code, $parent_prod_code);
                if ($check_result !== true) {
                    return $check_result;
                }
            }*/
        } elseif ($learn_pattern == 'mock_exam') {
            // 응시형태가 학원일 경우 정원 체크
            if ($data['TakeFormsCcd'] == '690002') {
                $mock_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
                    'EQ' => ['OP.ProdCode' => $prod_code, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]
                ]);

                if ($mock_paid_cnt >= $data['ClosingPerson']) {
                    return '접수가 마감되었습니다.';
                }
            }
        } else {
            // 학원강좌일 경우
            if (starts_with($learn_pattern, 'off') === true) {
                // 장바구니에서만 정원체크, 결제에서는 getMakeCartReData 메소드에서 체크
                if ($is_cart === true) {
                    $off_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
                        'EQ' => ['OP.ProdCode' => $prod_code, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]
                    ]);

                    if ($off_paid_cnt >= $data['FixNumber']) {
                        return '정원이 마감된 강좌입니다.';
                    }
                }

                if ($is_visit_pay == 'Y' && $data['StudyApplyCcd'] == $this->_off_study_apply_ccd['online']) {
                    return '온라인 접수 전용상품은 방문 접수 하실 수 없습니다.';
                } elseif ($is_visit_pay == 'N' && $data['StudyApplyCcd'] == $this->_off_study_apply_ccd['visit']) {
                    return '방문 접수 전용상품은 바로 결제 하실 수 없습니다.';
                }
            }
        }
        
        // 선수강좌일 경우 주문가능여부 체크
        if (ends_with($learn_pattern, '_before') === true) {
            $check_result = $this->checkBeforeLecture($prod_code);
            if ($check_result !== true) {
                return $check_result;
            }
        }

        return $is_data_return === true ? $data : true;
    }

    /**
     * 선수강좌 주문가능여부 체크
     * @param int $prod_code [상품코드]
     * @return bool|string [true : 주문가능, string : 주문불가]
     */
    public function checkBeforeLecture($prod_code)
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 비로그인 상태
        if (empty($sess_mem_idx) === true) {
            return '로그인 정보가 없습니다.';
        }

        // 선수강좌 주문가능여부 체크
        $query = $this->_conn->query('select fn_product_before_lecture_orderable_check(?, ?, "chkonly") as IsOrderable', [get_var($prod_code, '0'), $sess_mem_idx]);
        $is_orderable = $query->row(0)->IsOrderable;

        if ($is_orderable != 'Y') {
            if ($is_orderable == 'E') {
                return '선접수 상품이 아닙니다.';
            } elseif ($is_orderable == 'D') {
                return '이미 신청하셨습니다.';
            } elseif ($is_orderable == 'N') {
                return '선접수 신청 대상자가 아닙니다.';
            } else {
                return '선접수 주문 가능여부 체크 중 오류가 발생하였습니다.';
            }
        }

        return true;
    }

    /**
     * 장바구니 상품에 포함된 사은품 조회
     * @param array $arr_cart_idx
     * @param int $mem_idx
     * @param int $site_code
     * @return mixed
     */
    public function getProductFreebieByCartIdx($arr_cart_idx, $mem_idx, $site_code)
    {
        $column = 'P.ProdCode, P.ProdName';
        $from = '
            from ' . $this->_table['cart'] . ' as CA
                inner join ' . $this->_table['product_r_product'] . ' as PP
                    on CA.ProdCode = PP.ProdCode
                inner join ' . $this->_table['product'] . ' as P
                    on PP.ProdCodeSub = P.ProdCode and PP.ProdTypeCcd = P.ProdTypeCcd
            where CA.CartIdx in ?
                and CA.MemIdx = ?	
                and CA.SiteCode = ?
                and PP.ProdTypeCcd = "' . $this->_prod_type_ccd['freebie'] . '"
	            and PP.IsStatus = "Y" and P.IsStatus = "Y"           
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$arr_cart_idx, $mem_idx, $site_code]);

        return $query->result_array();
    }

    /**
     * 장바구니 데이터에 단과/제휴 할인율 정보를 추가하여 리턴 (재수강, 수강연장 제외)
     * @param array $cart_rows [유효한 장바구니 데이터]
     * @param null|int $aff_idx [제휴할인식별자]
     * @return mixed
     */
    public function getAddProductDiscToCartData($cart_rows, $aff_idx = null)
    {
        $site_code = array_get($cart_rows, '0.SiteCode');
        $arr_prod_code = array_pluck($cart_rows, 'ProdCode');
        $aff_min_real_sale_price = 50000;   // 제휴할인 최소판매금액
        $disc_data = null;

        if (empty($site_code) === true || empty($arr_prod_code) === true || (empty($aff_idx) === true && count($arr_prod_code) < 2)) {
            return $cart_rows;
        }

        if (empty($aff_idx) === false) {
            // 제휴할인 (상품구분 기준)
            $chk_key = 'CartProdType';
            $disc_data = $this->productFModel->getAffiliateDiscRate($aff_idx, $site_code);
        } else {
            // 과정별 단과할인 (상품코드 기준)
            $chk_key = 'ProdCode';
            $disc_data = $this->productFModel->getLetureDiscRate($arr_prod_code, $site_code);
        }

        if (empty($disc_data) === false) {
            foreach ($cart_rows as $idx => $row) {
                if ($row['SalePatternCcd'] == $this->_sale_pattern_ccd['normal'] && array_key_exists($row[$chk_key], $disc_data) === true) {
                    // 제휴할인일 경우 독서실제휴할인 상품설정이 적용일 경우만 적용 (판매금액이 50000원 이상 할인적용 정책 삭제 (추후 삭제 예정))
                    if ($chk_key == 'ProdCode' || ($chk_key == 'CartProdType' && $row['IsAllianceDisc'] == 'Y' && $row['RealSalePrice'] >= $aff_min_real_sale_price)) {
                        // 상품별 맵핑된 할인정보
                        $disc_row = element($row[$chk_key], $disc_data);

                        if (empty($disc_row) === false && $disc_row['DiscRate'] > 0) {
                            if ($disc_row['DiscType'] == 'R' || ($disc_row['DiscType'] == 'P' && $row['RealSalePrice'] > $disc_row['DiscRate'])) {
                                $cart_rows[$idx]['IsLecDisc'] = 'Y';
                                $cart_rows[$idx]['LecDiscTitle'] = $disc_row['DiscTitle'];
                                $cart_rows[$idx]['LecDiscRate'] = $disc_row['DiscRate'];
                                $cart_rows[$idx]['LecDiscRateUnit'] = $disc_row['DiscRateUnit'];
                                $cart_rows[$idx]['Remark'] = $disc_row['DiscTitle'] . '(' . $disc_row['DiscRate'] . $disc_row['DiscRateUnit'] . ')';

                                if ($disc_row['DiscType'] == 'R') {
                                    $cart_rows[$idx]['RealSalePrice'] = ceil($row['RealSalePrice'] * ((100 - $disc_row['DiscRate']) / 100));    // 소숫점 올림
                                } else {
                                    $cart_rows[$idx]['RealSalePrice'] = $row['RealSalePrice'] - $disc_row['DiscRate'];
                                }
                            }
                        }
                    }
                }
            }
        }

        return $cart_rows;
    }

    /**
     * 비회원 장바구니 목록 조회 (교재 기준)
     * @param int $site_code [사이트코드]
     * @param null|array $arr_prod_code [선택된 상품코드]
     * @param bool $is_order [주문여부]
     * @return array
     */
    public function listGuestCart($site_code, $arr_prod_code = null, $is_order = false)
    {
        // 장바구니 세션 데이터
        $sess_site_cart_data = array_get($this->getSessGuestCartData(), $site_code);
        if (empty($sess_site_cart_data) === true) {
            return [];
        }

        // 변수 초기화
        $total_prod_cnt = 0;
        $total_prod_order_price = 0;
        $arr_is_freebies_trans = [];

        // 상품코드 추출
        $arr_sess_prod_code = array_keys($sess_site_cart_data);

        // 장바구니 상품 조회
        $arr_condition = ['IN' => ['P.ProdCode' => $arr_prod_code]];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $column = 'P.ProdCode, P.ProdName, P.IsFreebiesTrans, SC.CateName, ifnull(fn_product_saleprice_data(P.ProdCode), "N") as ProdPriceData
            , WB.wAttachImgPath, WB.wAttachImgName as wAttachImgOgName, "book" as CartType, "book" as CartProdType';

        $from = '
            from ' . $this->_table['product'] . ' as P
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on P.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                left join ' . $this->_table['product_book'] . ' as PB
                    on P.ProdCode = PB.ProdCode
                left join ' . $this->_table['bms_book'] . ' as WB
                    on PB.wBookIdx = WB.wBookIdx and WB.wIsUse = "Y" and WB.wIsStatus = "Y"
                left join ' . $this->_table['category'] . ' as SC		
                    on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"
            where P.IsStatus = "Y"
                and P.IsUse = "Y"
                and P.IsSaleEnd = "N"
                and P.SaleStatusCcd = "' . $this->_available_sale_status_ccd['product'] . '"
                and NOW() between P.SaleStartDatm and P.SaleEndDatm
                and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book'] . '"		
                and P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '"
                and P.SiteCode = ?
                and P.ProdCode in ?
            ' . $where . '                   
            order by P.ProdCode desc                     
        ';

        // 쿼리 실행
        $results = $this->_conn->query('select ' . $column . $from, [$site_code, $arr_sess_prod_code])->result_array();

        // 가격정보, 수량 정보 추가
        foreach ($results as $idx => $row) {
            $arr_price_data = $row['ProdPriceData'] != 'N' ? element('0', json_decode($row['ProdPriceData'], true)) : [];
            if (empty($arr_price_data) === false) {
                $results[$idx] = array_merge($row, $arr_price_data);
            }

            $results[$idx]['ProdQty'] = array_get($sess_site_cart_data, $row['ProdCode'], 1);

            // 주문 페이지
            if ($is_order === true) {
                $results[$idx]['RealPayPrice'] = array_get($results[$idx], 'RealSalePrice', 0) * $results[$idx]['ProdQty'];

                // 상품구분명 / 상품구분명 색상 class 번호
                $results[$idx]['CartProdTypeName'] = $this->_cart_prod_type_name[$row['CartProdType']];
                $results[$idx]['CartProdTypeNum'] = $this->_cart_prod_type_idx[$row['CartProdType']];

                // 상품 부가정보 컬럼 추가
                $results[$idx]['ProdAddInfo'] = '';
                empty($row['CateName']) === false && $results[$idx]['ProdAddInfo'] .= $row['CateName'] . ' | ';

                // 배송료 부과여부
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];

                // 전체상품 주문금액
                $total_prod_order_price += $results[$idx]['RealPayPrice'];

                // 전체상품 수량
                $total_prod_cnt++;
            }
        }

        // 주문 페이지
        if ($is_order === true) {
            // 배송료 상품 추가
            $delivery_price = $this->getBookDeliveryPrice($total_prod_order_price, $arr_is_freebies_trans);

            if ($delivery_price > 0) {
                $prod_rows = $this->productFModel->listSalesProduct('delivery_price', false, ['EQ' => ['SiteCode' => $site_code]], 1, 0, ['ProdCode' => 'desc']);
                if (empty($prod_rows) === true) {
                    return [];  // 배송료상품이 없을 경우
                }
                $prod_row = element('0', $prod_rows);

                // 판매가격 정보 확인
                $arr_price_data = $prod_row['ProdPriceData'] != 'N' ? element('0', json_decode($prod_row['ProdPriceData'], true)) : [];
                if (empty($arr_price_data) === true || isset($arr_price_data['SaleTypeCcd']) === false) {
                    return [];  // 배송료상품 가격정보가 없을 경우
                }

                $results[] = array_merge([
                    'ProdCode' => $prod_row['ProdCode'],
                    'ProdName' => $prod_row['ProdName'],
                    'IsFreebiesTrans' => 'N',
                    'CateName' => null,
                    'ProdPriceData' => $prod_row['ProdPriceData'],
                    'wAttachImgPath' => null,
                    'wAttachImgOgName' => null,
                    'CartType' => 'etc',
                    'CartProdType' => 'delivery_price',
                ], $arr_price_data, [
                    'ProdQty' => '1',
                    'RealPayPrice' => $arr_price_data['RealSalePrice'],
                    'CartProdTypeName' => $this->_cart_prod_type_name['delivery_price'],
                    'CartProdTypeNum' => $this->_cart_prod_type_idx['delivery_price'],
                    'ProdAddInfo' => ''
                ]);
            }

            $results = [
                'list' => $results,
                'total_prod_cnt' => $total_prod_cnt,
                'total_prod_order_price' => $total_prod_order_price,
                'delivery_price' => $delivery_price,
                'total_pay_price' => $total_prod_order_price + $delivery_price,
                'is_delivery_info' => true,
                'repr_prod_name' => $results[0]['ProdName'] . ($total_prod_cnt > 1 ? ' 외 ' . ($total_prod_cnt - 1) . '건' : ''),
                'cart_type' => $results[0]['CartType']
            ];
        }

        return $results;
    }

    /**
     * 비회원 장바구니 세션 저장
     * @param string $learn_pattern [학습형태]
     * @param array $input [입력정보]
     * @return array|bool|bool[]
     */
    public function addGuestCart($learn_pattern, $input = [])
    {
        $results = [];

        try {
            $arr_temp_prod_code = $this->makeProdCodeArray($learn_pattern, element('prod_code', $input, []));
            $arr_prod_code = element('data', $arr_temp_prod_code);
            $site_code = element('site_code', $input, '');
            $sess_cart_data = $this->getSessGuestCartData();    // 비회원 장바구니 세션 데이터

            foreach ($arr_prod_code as $prod_code => $prod_row) {
                // 학습형태별 사전 체크
                $check_result = $this->checkProduct($prod_row['LearnPattern'], $site_code, $prod_code, $prod_row['ParentProdCode'], 'N', false, true);
                if ($check_result !== true) {
                    throw new \Exception($check_result);
                }

                // 상품 수량
                $prod_qty = array_get($input, 'prod_qty.' . $prod_code, 1);
                if (empty($prod_qty) === true || is_numeric($prod_qty) === false || $prod_qty < 1) {
                    $prod_qty = 1;
                }

                // 비회원 장바구니 세션 저장 데이터 (수량)
                $sess_cart_data[$site_code][$prod_code] = $prod_qty;

                // 장바구니 상품코드
                $results[] = $prod_code;
            }

            // 비회원 장바구니 세션 저장
            $this->makeSessGuestCartData($sess_cart_data);
        } catch (\Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $results];
    }

    /**
     * 비회원 장바구니 세션 삭제
     * @param int $site_code [사이트코드]
     * @param array $arr_prod_code [삭제대상 상품코드배열]
     * @return array|bool
     */
    public function removeGuestCart($site_code, $arr_prod_code = [])
    {
        try {
            if (count($arr_prod_code) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            $sess_cart_data = $this->getSessGuestCartData();    // 비회원 장바구니 세션 데이터
            $sess_site_cart_data = array_get($sess_cart_data, $site_code);  // 해당 사이트 비회원 장바구니 세션 데이터

            if (empty($sess_site_cart_data) === true) {
                throw new \Exception('장바구니 데이터가 없습니다.');
            }

            // 해당 상품 세션 삭제
            $sess_site_cart_data = array_unset($sess_site_cart_data, $arr_prod_code);

            // 변경된 비회원 장바구니 세션 저장
            $sess_cart_data[$site_code] = $sess_site_cart_data;
            $this->makeSessGuestCartData($sess_cart_data);
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }    
}
