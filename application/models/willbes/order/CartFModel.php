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
     * @return mixed
     */
    public function listCart($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
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
                , ifnull(JSON_VALUE(CalcPriceData, "$.LecExten"), 0) as AddExtenDay';   // 사용자패키지 추가 수강연장 일수

            $in_column = 'CA.CartIdx, CA.MemIdx, CA.SiteCode, PC.CateCode, CA.ProdCode
                , ifnull(if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '", fn_product_sublecture_codes(CA.ProdCode), CA.ProdCodeSub), "") as ProdCodeSub
                , CA.ParentProdCode, CA.SaleTypeCcd, CA.SalePatternCcd, CA.ProdQty, CA.IsDirectPay, CA.IsVisitPay, CA.CaIdx, CA.ExtenDay, CA.PostData
                , CA.TargetOrderIdx, CA.TargetProdCode, CA.TargetProdCodeSub 
                , concat(P.ProdName, if(CA.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", concat(" (", fn_ccd_name(CA.SalePatternCcd), ")"), "")) as ProdName
                , P.ProdTypeCcd, ifnull(PL.LearnPatternCcd, "") as LearnPatternCcd, PL.PackTypeCcd, P.IsCoupon, P.PointApplyCcd, P.PointSaveType, P.PointSavePrice
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['retake'] . '", "N", P.IsPoint) as IsPoint
                , if((PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" and CA.SalePatternCcd != "' . $this->_sale_pattern_ccd['retake'] . '") or P.ProdTypeCcd in ("' . $this->_prod_type_ccd['book'] . '"), "Y", "N") as IsUsePoint                
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '", "N", P.IsFreebiesTrans) as IsFreebiesTrans
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '", "N", P.IsDeliveryInfo) as IsDeliveryInfo                                
                , ifnull(PB.SchoolYear, PL.SchoolYear) as SchoolYear, ifnull(PB.CourseIdx, PL.CourseIdx) as CourseIdx
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", fn_product_book_subject_idxs(CA.ProdCode), PL.SubjectIdx) as SubjectIdx
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", fn_product_book_prof_idxs(CA.ProdCode), PD.ProfIdx) as ProfIdx                                         
                , if(CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '", "N", PL.IsLecStart) as IsLecStart                                          
                , ifnull(PL.StudyPeriod, if(PL.StudyStartDate is not null and PL.StudyEndDate is not null, datediff(PL.StudyEndDate, PL.StudyStartDate), "")) as StudyPeriod                               
                , PL.StudyStartDate, PL.StudyEndDate, PL.StudyApplyCcd, PL.CampusCcd, fn_ccd_name(PL.CampusCcd) as CampusCcdName                  
                , PS.SalePrice as OriSalePrice, PS.SaleRate as OriSaleRate, PS.SaleDiscType as OriSaleDiscType, PS.RealSalePrice as OriRealSalePrice
                , case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '" then fn_product_userpack_price_data(CA.ProdCode, CA.SaleTypeCcd, CA.ProdCodeSub)
                    when CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['retake'] . '" then JSON_OBJECT("RealSalePrice", cast(PS.RealSalePrice * ((100 - PL.RetakeSaleRate) / 100) as int))
                    when CA.SalePatternCcd = "' . $this->_sale_pattern_ccd['extend'] . '" then JSON_OBJECT("RealSalePrice", floor((PS.SalePrice * CA.ExtenDay) / PL.StudyPeriod))
                    else null
                  end as CalcPriceData                                              
                , case P.ProdTypeCcd when "' . $this->_prod_type_ccd['book'] . '" then "book" 
                    when "' . $this->_prod_type_ccd['on_lecture'] . '" then "on_lecture"
                    when "' . $this->_prod_type_ccd['off_lecture'] . '" then "off_lecture"
                    when "' . $this->_prod_type_ccd['mock_exam'] . '" then "mock_exam"
                    else "etc"
                  end as CartType
                , case when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" then "on_lecture" 
                         when PL.LearnPatternCcd in ("' . implode('","', $this->_on_pack_lecture_pattern_ccd) . '") then "on_pack_lecture"
                         when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" then "off_lecture"
                         when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" then "off_pack_lecture"
                         when P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" then "book"
                         when P.ProdTypeCcd = "' . $this->_prod_type_ccd['mock_exam'] . '" then "mock_exam"
                         when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_price'] . '" then "delivery_price"
                         when P.ProdTypeCcd = "' . $this->_prod_type_ccd['delivery_add_price'] . '" then "delivery_add_price"
                         else "etc" 
                  end as CartProdType';
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
            where CA.IsStatus = "Y"   
                and P.IsUse = "Y"
                and P.IsStatus = "Y"                                                                  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

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
     * @return mixed
     */
    public function listValidCart($mem_idx, $site_code, $cate_code = null, $cart_idx = [], $prod_code = [], $is_direct_pay = 'N', $is_visit_pay = 'N')
    {
        $arr_condition = [
            'EQ' => [
                'CA.MemIdx' => $mem_idx, 'CA.SiteCode' => $site_code, 'CA.IsDirectPay' => $is_direct_pay, 'CA.IsVisitPay' => $is_visit_pay,
                'P.SaleStatusCcd' => $this->_available_sale_status_ccd['product'], 'P.IsSaleEnd' => 'N'
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
                'NOW() between ' => 'P.SaleStartDatm and P.SaleEndDatm',
                '(P.ProdTypeCcd != ' => '"' . $this->_prod_type_ccd['book']. '" OR (P.ProdTypeCcd = "' . $this->_prod_type_ccd['book']. '" and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book']. '"))'
            ]
        ];

        // 방문결제일 경우 세션 아이디 컬럼 추가
        if ($is_visit_pay == 'Y') {
            $arr_condition['EQ']['CA.SessId'] = $this->session->userdata($this->_sess_cart_sess_id);
            $order_by =['CartIdx' => 'asc'];
        } else {
            $order_by =['ProdTypeCcd' => 'asc', 'CartIdx' => 'desc'];
        }

        return $this->listCart(false, $arr_condition, null, null, $order_by);
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
     * @return bool|string [true : 구매가능, string : 구매불가]
     */
    public function checkStudentBook($site_code, $prod_book_code, $parent_prod_code, $arr_input_prod_code = [])
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

        // 2. 수강생교재 구매여부 확인 (1권만 구매가능, 구매정보가 있다면 return false, 없다면 continue)
        $book_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
            'EQ' => ['OP.MemIdx' => $sess_mem_idx, 'OP.ProdCode' => $prod_book_code, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']]
        ]);

        if ($book_paid_cnt > 0) {
            return '이미 동일한 수강생 교재를 구매하셨습니다.';
        }

        // 3. 회원이 구매한 결제완료된 내강의실 정보 조회
        $my_lecture_rows = $this->orderListFModel->getMemberMyLectureByProdCodeSub($arr_target_prod_code);
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
                $check_result = $this->checkProduct($prod_row['LearnPattern'], $site_code, $prod_code, $prod_row['ParentProdCode'], $is_visit_pay, false, true);
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

                // 데이터 등록
                $data = [
                    'MemIdx' => $sess_mem_idx,
                    'SiteCode' => $site_code,
                    'ProdCode' => $prod_code,
                    'ProdCodeSub' => $prod_sub_code,
                    'ParentProdCode' => $prod_row['ParentProdCode'],
                    'SaleTypeCcd' => $prod_row['SaleTypeCcd'],
                    'SalePatternCcd' => $sale_pattern_ccd,
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
                $total_prod_order_price += $row['RealSalePrice'];
            }

            if ($is_delivery_info === true) {
                // 배송료 계산
                if ($cart_type == 'book') {
                    $delivery_price = $this->getBookDeliveryPrice($total_prod_order_price);
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
     * @return bool|array|string
     */
    public function checkProduct($learn_pattern, $site_code, $prod_code, $parent_prod_code, $is_visit_pay, $is_data_return = false, $is_cart = false)
    {
        $data = $this->productFModel->findOnlySalesProductByProdCode($learn_pattern, $prod_code);

        if (empty($data) === true) {
            return '판매 중인 상품만 주문 가능합니다.';
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
                if ($is_visit_pay == 'Y' && $data['StudyApplyCcd'] == $this->_off_study_apply_ccd['online']) {
                    return '온라인 접수 전용상품은 방문 접수 하실 수 없습니다.';
                } elseif ($is_visit_pay == 'N' && $data['StudyApplyCcd'] == $this->_off_study_apply_ccd['visit']) {
                    return '방문 접수 전용상품은 바로 결제 하실 수 없습니다.';
                }
            }
        }

        return $is_data_return === true ? $data : true;
    }
}
