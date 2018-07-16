<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartFModel extends WB_Model
{
    private $_table = [
        'cart' => 'lms_cart',
        'product_r_product' => 'lms_product_r_product'
    ];
    // 수강생 교재 공통코드
    private $_student_book_ccd = '610003';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 장바구니 등록
     * @param $learn_pattern
     * @param array $input
     * @return array|bool
     */
    public function addCart($learn_pattern, $input = [])
    {
        $this->_conn->trans_begin();

        try {
            $mem_idx = $this->session->userdata('mem_idx');
            $gw_idx = $this->session->userdata('gw_idx');
            $reg_ip = $this->input->ip_address();
            $arr_prod_code = element('prod_code', $input, []);
            $arr_prod_code = $this->_makeProdCodeArray($learn_pattern, $arr_prod_code);

            // 학습형태별 사전 체크
            $check_result = $this->{'_check_' . $learn_pattern}($arr_prod_code);
            if ($check_result !== true) {
                throw new \Exception($check_result);
            }

            // 데이터 저장
            foreach ($arr_prod_code['all'] as $idx => $prod_row) {
                // 이미 장바구니에 담긴 상품이 있는지 여부 확인
                $cart_row = $this->_conn->getFindResult($this->_table['cart'], 'CartIdx', [
                    'EQ' => ['MemIdx' => $mem_idx, 'ProdCode' => $prod_row['ProdCode'], 'IsStatus' => 'Y'],
                    'RAW' => ['ExpireDatm > ' => 'NOW()']
                ]);

                if (empty($cart_row) === false) {
                    // 이미 장바구니에 담겨 있다면 삭제
                    $is_delete = $this->_conn->where('CartIdx', $cart_row['CartIdx'])->where('MemIdx', $mem_idx)->delete($this->_table['cart']);
                    if ($is_delete === false) {
                        throw new \Exception('기존 장바구니 데이터 삭제에 실패했습니다.');
                    }
                }

                $data = [
                    'MemIdx' => $mem_idx,
                    'SiteCode' => element('site_code', $input, ''),
                    'CateCode' => element('cate_code', $input, ''),
                    'ProdCode' => $prod_row['ProdCode'],
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

            if ($tmp_arr[0] == $tmp_arr[2]) {
                // 단강좌 상품
                $results['lecture'][] = $tmp_arr[0];
            } else {
                // 구매교재 상품
                $results['book'][] = ['ProdCode' => $tmp_arr[0], 'ParentProdCode' => $tmp_arr[2]];
            }
            
            // 전체상품
            $results['all'][] = ['ProdCode' => $tmp_arr[0], 'SaleTypeCcd' => $tmp_arr[1], 'ParentProdCode' => $tmp_arr[2]];
        }

        return $results;
    }

    /**
     * 온라인 단강좌 사전 체크
     * @param $params
     * @return bool|string
     */
    private function _check_on_lecture($params = [])
    {
        foreach ($params['book'] as $idx => $book_row)
        {
            // 부모상품코드와 상품코드가 일치하지 않을 경우 교재구분 조회
            $data = $this->_conn->getFindResult($this->_table['product_r_product'], 'OptionCcd', ['EQ' => [
                'ProdCode' => $book_row['ParentProdCode'],
                'ProdCodeSub' => $book_row['ProdCode'],
                'IsStatus' => 'Y'
            ]]);

            if (empty($data) === false && $data['OptionCcd'] === $this->_student_book_ccd) {
                // 수강생 교재일 경우 강좌상품코드가 존재하는지 여부 확인
                if (isset($params['lecture']) === false || array_search($book_row['ParentProdCode'], $params['lecture']) === false) {
                    return '선택하신 수강생 교재에 해당하는 강좌를 선택하지 않으셨습니다.' . PHP_EOL . '해당 강좌를 선택해 주세요';
                }
            }
        }

        return true;
    }
}
