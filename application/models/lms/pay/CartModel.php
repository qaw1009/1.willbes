<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class CartModel extends BaseOrderModel
{
    /**
     * 현재 유효한 장바구니 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listValidCart($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'CA.CartIdx, CA.MemIdx, CA.SiteCode, CA.ProdCode, CA.ParentProdCode, CA.RegDatm
                    , if(CA.RegAdminIdx is not null, "Y", "N") as IsRegAdmin, CA.AdminRegReason, CA.RegAdminIdx, A.wAdminName as RegAdminName
                    , M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
                    , P.ProdName, P.ProdTypeCcd, PL.LearnPatternCcd, PS.RealSalePrice	
                    , S.SiteName, CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName';
            }
        } else {
            $column = $is_count;
        }

        $from = $this->_getListFrom();

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 현재 유효한 장바구니 엑셀 다운로드
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listExcelValidCart($arr_condition, $order_by = [])
    {
        $column = 'S.SiteName, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone
            , CPT.CcdName as ProdTypeCcdName, concat("[", ifnull(CLP.CcdName, CPT.CcdName), "] ", P.ProdName) as ProdName, PS.RealSalePrice           
            , if(CA.RegAdminIdx is not null, concat(A.wAdminName, "(운)"), M.MemName) as RegName, CA.RegDatm, CA.AdminRegReason';

        $from = $from = $this->_getListFrom();

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행 및 결과값 리턴
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    /**
     * 현재 유효한 장바구니 조회 from절 리턴
     * @return string
     */
    private function _getListFrom()
    {
        return '
            from ' . $this->_table['cart'] . ' as CA
                inner join ' . $this->_table['member'] . ' as M
                    on CA.MemIdx = M.MemIdx
                inner join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode
                inner join ' . $this->_table['product_sale'] . ' as PS
                    on CA.ProdCode = PS.ProdCode and CA.SaleTypeCcd = PS.SaleTypeCcd
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on CA.ProdCode = PL.ProdCode 
                left join ' . $this->_table['product_book'] . ' as PB
                    on CA.ProdCode = PB.ProdCode
                left join ' . $this->_table['bms_book'] . ' as WB
                    on PB.wBookIdx = WB.wBookIdx and WB.wIsUse = "Y" and WB.wIsStatus = "Y"
                left join ' . $this->_table['site'] . ' as S	
                    on CA.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"		
                left join ' . $this->_table['admin'] . ' as A
                    on CA.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where CA.ExpireDatm > NOW()
                and CA.ConnOrderIdx is null
                and CA.IsDirectPay = "N"
                and CA.IsVisitPay = "N"
                and CA.IsStatus = "Y"
                and P.IsUse = "Y"
                and P.IsStatus = "Y"	
                and P.SaleStatusCcd = "' . $this->_available_sale_status_ccd['product'] . '"
                and P.IsSaleEnd = "N"    
                and NOW() between P.SaleStartDatm and P.SaleEndDatm
                and (P.ProdTypeCcd != "' . $this->_prod_type_ccd['book'] . '" or (P.ProdTypeCcd = "' . $this->_prod_type_ccd['book'] . '" and WB.wSaleCcd = "' . $this->_available_sale_status_ccd['book'] . '"))
                and PS.IsStatus = "Y" and PS.SalePriceIsUse = "Y"                	            
        ';
    }

    /**
     * 장바구니 등록
     * @param array $input
     * @return array|bool
     */
    public function addCart($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 판매상품 모델 로드
            $this->load->loadModels(['pay/salesProduct']);

            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $arr_mem_idx = element('mem_idx', $input, []);
            $arr_prod_info = element('prod_code', $input, []);  // 상품코드:상품타입:학습형태공통코드
            $arr_available_learn_pattern = ['on_lecture', 'adminpack_lecture', 'book'];     // 장바구니 등록가능 상품구분
            $default_sale_type_ccd = '613001';  // 기본 판매타입 공통코드 (PC+모바일)

            // 상품코드 기준으로 루프
            foreach ($arr_prod_info as $prod_info) {
                // 상품정보 변수 할당
                list($prod_code, $prod_type, $learn_pattern_ccd) = explode(':', $prod_info);

                // 학습형태 조회 (단강좌, 운영자 일반형 패키지, 교재 상품만 장바구니 등록 가능)
                $learn_pattern = $this->getLearnPattern($prod_type, $learn_pattern_ccd);
                if ($learn_pattern === false || in_array($learn_pattern, $arr_available_learn_pattern) === false) {
                    throw new \Exception('장바구니에 담을 수 없는 상품입니다.' . PHP_EOL . '온라인 단강좌, 운영자 일반형 패키지, 교재 상품만 등록 가능합니다.', _HTTP_BAD_REQUEST);
                }

                // 상품정보 조회
                $row = $this->salesProductModel->findSalesProductByProdCode($learn_pattern, $prod_code);
                if (empty($row) === true) {
                    throw new \Exception('판매 중인 상품만 장바구니에 담을 수 있습니다.', _HTTP_NOT_FOUND);
                }

                // 운영자 선택형 패키지는 장바구니 등록 불가
                if ($learn_pattern == 'adminpack_lecture' && $row['PackTypeCcd'] != $this->_adminpack_lecture_type_ccd['normal']) {
                    throw new \Exception('운영자 선택형 패키지는 장바구니에 담을 수 없습니다.', _HTTP_BAD_REQUEST);
                }

                // 회원식별자 기준으로 루프
                foreach ($arr_mem_idx as $mem_idx) {
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

                    // 장바구니 등록
                    $data = [
                        'MemIdx' => $mem_idx,
                        'SiteCode' => $row['SiteCode'],
                        'ProdCode' => $prod_code,
                        'ProdCodeSub' => '',
                        'ParentProdCode' => $prod_code,
                        'SaleTypeCcd' => $default_sale_type_ccd,
                        'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                        'IsDirectPay' => 'N',
                        'IsVisitPay' => 'N',
                        'AdminRegReason' => element('admin_reg_reason', $input),
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    $this->_conn->set($data)->set('ExpireDatm', 'date_add(NOW(), interval 14 day)', false);
                    if ($this->_conn->insert($this->_table['cart']) === false) {
                        throw new \Exception('장바구니 등록에 실패했습니다.');
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
     * 장바구니 삭제
     * @param array $arr_cart_idx
     * @param array $arr_mem_idx
     * @param array $arr_prod_code
     * @param array $arr_parent_prod_code
     * @return array|bool
     */
    public function removeCart($arr_cart_idx, $arr_mem_idx, $arr_prod_code, $arr_parent_prod_code)
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $data = ['IsStatus' => 'N', 'UpdAdminIdx' => $sess_admin_idx];

            foreach ($arr_cart_idx as $idx => $cart_idx) {
                // 부모상품일 경우 연계상품 동시 삭제 업데이트
                if ($arr_prod_code[$idx] == $arr_parent_prod_code[$idx]) {
                    $arr_condition = [
                        'EQ' => ['IsDirectPay' => 'N', 'IsVisitPay' => 'N', 'IsStatus' => 'Y'],
                        'RAW' => ['ExpireDatm > ' => 'NOW()', 'ConnOrderIdx is ' => 'null']
                    ];

                    $is_update = $this->_conn->where('MemIdx', $arr_mem_idx[$idx])->where('ParentProdCode', $arr_parent_prod_code[$idx])->makeWhere($arr_condition)
                        ->set($data)->set('UpdDatm', 'NOW()', false)->update($this->_table['cart']);
                } else {
                    $is_update = $this->_conn->where('MemIdx', $arr_mem_idx[$idx])->where('CartIdx', $cart_idx)
                        ->set($data)->set('UpdDatm', 'NOW()', false)->update($this->_table['cart']);
                }

                if ($is_update === false) {
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
}
