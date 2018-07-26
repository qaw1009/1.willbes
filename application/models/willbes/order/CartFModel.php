<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class CartFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 장바구니 목록 조회
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCart($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'CA.CartIdx, CA.MemIdx, CA.SiteCode, CA.CateCode, CA.ProdCode
                , ifnull(if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['admin_package'] . '" and PL.PackTypeCcd = "' . $this->_admin_package_type_ccd['normal'] . '", fn_product_sublecture_codes(CA.ProdCode), CA.ProdCodeSub), "") as ProdCodeSub
                , CA.ParentProdCode, CA.SaleTypeCcd, CA.ProdQty, CA.IsDirectPay, CA.IsVisitPay, PS.SalePrice, PS.SaleRate, PS.SaleDiscType, PS.RealSalePrice
                , P.ProdName, P.ProdTypeCcd, P.IsCoupon, P.IsFreebiesTrans, P.IsDeliveryInfo, P.IsPoint, P.PointApplyCcd, P.PointSaveType, P.PointSavePrice
                , PL.StudyPeriod, PL.StudyStartDate, PL.StudyEndDate, PL.IsLecStart
                , ifnull(PL.LearnPatternCcd, "") as LearnPatternCcd
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", "book", "on_lecture") as CartType
                , if(P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '", "book", 
                    case when PL.LearnPatternCcd in ("' . implode('","', $this->_package_pattern_ccd) . '") then "on_package" 
                         when PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture'] . '" then "on_lecture"
                         else PL.LearnPatternCcd 
                    end) as CartProdType';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['cart'] . ' as CA
                inner join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode
                inner join ' . $this->_table['product_sale'] . ' as PS
                    on CA.ProdCode = PS.ProdCode and CA.SaleTypeCcd = PS.SaleTypeCcd
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on CA.ProdCode = PL.ProdCode and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture']. '"   # 온라인강좌
                left join ' . $this->_table['product_book'] . ' as PB
                    on CA.ProdCode = PB.ProdCode and P.ProdTypeCcd = "' . $this->_prod_type_ccd['book']. '"   # 교재
                left join ' . $this->_table['bms_book'] . ' as WB
                    on PB.wBookIdx = WB.wBookIdx and WB.wIsUse = "Y" and WB.wIsStatus = "Y"
            where CA.IsStatus = "Y"   
                and PS.IsStatus = "Y"
                and PS.SalePriceIsUse = "Y"
                and P.IsStatus = "Y"                                   
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($column === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 유효한 장바구니 목록
     * @param $mem_idx
     * @param $site_code
     * @param null $cate_code
     * @param array $cart_idx
     * @param array $prod_code
     * @param string $is_direct_pay
     * @param string $is_visit_pay
     * @return mixed
     */
    public function listValidCart($mem_idx, $site_code, $cate_code = null, $cart_idx = [], $prod_code = [], $is_direct_pay = 'N', $is_visit_pay = 'N')
    {
        $arr_condition = [
            'EQ' => [
                'CA.MemIdx' => $mem_idx, 'CA.SiteCode' => $site_code, 'CA.CateCode' => $cate_code, 'CA.IsDirectPay' => $is_direct_pay, 'CA.IsVisitPay' => $is_visit_pay,
                'P.SaleStatusCcd' => $this->_available_sale_status_ccd['product'], 'P.IsSaleEnd' => 'N', 'P.IsCart' => 'Y', 'P.IsUse' => 'Y'
            ],
            'IN' => [
                'CA.CartIdx' => $cart_idx,
                'CA.ProdCode' => $prod_code
            ],
            'RAW' => [
                'CA.ExpireDatm > ' => 'NOW()',
                'NOW() between ' => 'P.SaleStartDatm and P.SaleEndDatm',
                '(P.ProdTypeCcd = ' => '"' . $this->_prod_type_ccd['on_lecture']. '" OR (P.ProdTypeCcd = "' . $this->_prod_type_ccd['book']. '" and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book']. '"))'
            ]
        ];

        return $this->listCart(false, $arr_condition, null, null, ['CA.CartIdx' => 'desc']);
    }

    /**
     * 단일 장바구니 조회
     * @param $cart_idx
     * @return mixed
     */
    public function findCartByCartIdx($cart_idx)
    {
        $arr_condition = ['EQ' => ['CA.CartIdx' => $cart_idx]];
        $data = $this->listCart(false, $arr_condition, null, null, []);

        return element('0', $data, []);
    }

    /**
     * 수강생교재 구매시 부모상품 주문여부 및 장바구니 확인
     * @param string $prod_book_code [교재상품코드]
     * @param array $arr_input_prod_code [교재상품과 동시에 장바구니에 저장될 상품코드, form input 상품코드]
     * @return bool|string [true : 구매가능, string : 구매불가]
     */
    public function checkStudentBook($prod_book_code, $arr_input_prod_code = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 에러 메시지
        $err_msg = '선택하신 수강생 교재에 해당하는 강좌를 선택하지 않으셨습니다.' . PHP_EOL . '해당 강좌를 선택해 주세요.';

        logger('check start');

        // 1. 해당 도서 수강생교재 여부 확인, 수강생교재일 경우 연관된 부모상품코드 조회
        $this->load->loadModels(['product/productF']);  // 기본상품모델 로드
        $arr_target_prod_code = array_pluck($this->productFModel->findParentProductToStudentBook($prod_book_code), 'ProdCode');
        if (empty($arr_target_prod_code) === true) {
            // 수강생교재가 아닐 경우
            return true;
        }

        logger('check 2', [$arr_target_prod_code]);

        // TODO : 2. 수강생교재 구매여부 확인 (1권만 구매가능, 구매정보가 있다면 return false, 없다면 continue)

        // 3. 교재상품과 동시에 장바구니에 저장되는 상품코드와 수강생교재 부모상품코드와 비교 (동일한 상품코드가 있다면 return true, 없다면 continue)
        $arr_same_prod_code = array_intersect($arr_target_prod_code, $arr_input_prod_code);
        if (empty($arr_same_prod_code) === false) {
            return true;
        }

        logger('check 3', $arr_same_prod_code);

        // 4. 수강생교재 부모상품코드 장바구니 등록여부 확인 (등록되어 있다면 return true, 없다면 continue)
        $cart_data = $this->cartFModel->listValidCart($sess_mem_idx, null, null, null);

        // 단강좌는 상품코드, 패키지 상품일 경우 연결된 단강좌 상품코드를 병합
        $arr_cart_prod_code = [];
        $arr_tmp_prod_code = array_pluck($cart_data, 'ProdCodeSub', 'ProdCode');
        foreach ($arr_tmp_prod_code as $prod_code => $prod_sub_code) {
            $arr_cart_prod_code = array_merge($arr_cart_prod_code, [(string) $prod_code]);
            empty($prod_sub_code) === false && $arr_cart_prod_code = array_merge($arr_cart_prod_code, explode(',', $prod_sub_code));
        }
        $arr_cart_prod_code = array_unique($arr_cart_prod_code);

        logger('check 4', [$arr_cart_prod_code]);

        // 수강생교재 부모상품코드와 병합된 상품코드 비교
        $arr_same_prod_code = array_intersect($arr_target_prod_code, $arr_cart_prod_code);
        if (empty($arr_same_prod_code) === false) {
            return true;
        }

        logger('check 5', $arr_same_prod_code);

        // TODO : 5. 수강생교재 부모 단강좌 상품 구매여부 확인 (구매정보가 있다면 return true, 없다면 continue)

        return $err_msg;
    }

    /**
     * 장바구니 등록
     * @param $learn_pattern
     * @param array $input
     * @return array
     */
    public function addCart($learn_pattern, $input = [])
    {
        $this->_conn->trans_begin();
        $results = [];

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');
            $gw_idx = $this->session->userdata('gw_idx');
            $reg_ip = $this->input->ip_address();
            $arr_prod_code = element('prod_code', $input, []);
            $arr_prod_code = $this->_makeProdCodeArray($learn_pattern, $arr_prod_code);

            // 데이터 저장
            foreach ($arr_prod_code as $prod_code => $prod_row) {
                // 학습형태별 사전 체크
                $check_result = $this->{'_check_' . $learn_pattern}($prod_code, $prod_row['ParentProdCode']);
                if ($check_result !== true) {
                    throw new \Exception($check_result);
                }

                // 이미 장바구니에 담긴 상품이 있는지 여부 확인
                $cart_row = $this->_conn->getFindResult($this->_table['cart'], 'CartIdx', [
                    'EQ' => ['MemIdx' => $sess_mem_idx, 'ProdCode' => $prod_code, 'IsStatus' => 'Y'],
                    'RAW' => ['ExpireDatm > ' => 'NOW()']
                ]);

                if (empty($cart_row) === false) {
                    // 이미 장바구니에 담겨 있다면 삭제
                    $is_delete = $this->_conn->where('CartIdx', $cart_row['CartIdx'])->where('MemIdx', $sess_mem_idx)->delete($this->_table['cart']);
                    if ($is_delete === false) {
                        throw new \Exception('기존 장바구니 데이터 삭제에 실패했습니다.');
                    }
                }

                $data = [
                    'MemIdx' => $sess_mem_idx,
                    'SiteCode' => element('site_code', $input, ''),
                    'CateCode' => element('cate_code', $input, ''),
                    'ProdCode' => $prod_code,
                    'ParentProdCode' => $prod_row['ParentProdCode'],
                    'SaleTypeCcd' => $prod_row['SaleTypeCcd'],
                    'IsDirectPay' => element('is_direct_pay', $input, 'N'),
                    'IsVisitPay' => element('is_visit_pay', $input, 'N'),
                    'GwIdx' => $gw_idx,
                    'RegIp' => $reg_ip
                ];
                $this->_conn->set($data)->set('ExpireDatm', 'date_add(NOW(), interval 14 day)', false);

                // 데이터 등록
                if ($this->_conn->insert($this->_table['cart']) === false) {
                    throw new \Exception('장바구니 등록에 실패했습니다.');
                }

                $results[] = $this->_conn->insert_id();
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $results];
    }

    /**
     * 장바구니 삭제
     * @param array $arr_cart_idx
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
                $data = $this->findCartByCartIdx($cart_idx);
                if (empty($data) === true) {
                    throw new \Exception('장바구니 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                // 부모상품일 경우 연계상품 동시 삭제
                if ($data['ProdCode'] == $data['ParentProdCode']) {
                    $is_delete = $this->_conn->where('MemIdx', $sess_mem_idx)->where('ParentProdCode', $data['ParentProdCode'])->delete($this->_table['cart']);
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
     * 상품코드 재정의
     * @param $learn_pattern
     * @param $arr_prod_code
     * @return array
     */
    private function _makeProdCodeArray($learn_pattern, $arr_prod_code)
    {
        $results = [];
        foreach ($arr_prod_code as $idx => $val) {
            $tmp_arr = explode(':', $val);
            $results[$tmp_arr[0]] = ['ProdCode' => $tmp_arr[0], 'SaleTypeCcd' => $tmp_arr[1], 'ParentProdCode' => $tmp_arr[2]];
        }

        return $results;
    }

    /**
     * 온라인 단강좌 사전 체크
     * @param $prod_code
     * @param $parent_prod_code
     * @return bool|string
     */
    private function _check_on_lecture($prod_code, $parent_prod_code)
    {
        if ($prod_code != $parent_prod_code) {
            // 수강생 교재 체크
            $check_result = $this->checkStudentBook($prod_code);
            if ($check_result !== true) {
                return $check_result;
            }
        }

        return true;
    }
}
