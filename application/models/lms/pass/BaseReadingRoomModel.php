<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseReadingRoomModel extends WB_Model
{
    public $arr_mang_title = [
        'R' => '독서실',
        'L' => '사물함'
    ];
    public $arr_product_type_ccd = [
        'R' => '636007',    //상품타입공통코드 독서실
        'L' => '636008'     //상품타입공통코드 사물함
    ];
    private $sub_product_type_ccd = '636009';   //상품타입공통코드 예치금

    private $_prod_code;
    private $_sub_prod_code;
    private $_arr_sale_status_ccd = [
        'main' => '618001',    //판매상태(판매가능)
        'sub' => '618003'      //판매상태(판매불가)
    ];

    private $_sale_type_ccd = '613001'; // 상품판매구분 > PC+모바일

    private $_table = [
        'product' => 'lms_product',
        'product_r_product' => 'lms_product_r_product',
        'product_sale' => 'lms_product_sale',
        'product_sms' => 'lms_product_sms',
        'readingRoom' => 'lms_readingroom',
        'readingRoom_mst' => 'lms_readingroommst',
        'readingRoom_useDetail' => 'lms_readingroomusedetail',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    //상품등록
    protected function _addProductForReadingRoom($input = [])
    {
        try {
            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');
            $prod_code = $row['ProdCode'];
            $this->_setProdCode($prod_code);

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'main');
            $product_data = array_merge($set_product_data, [
                'ProdCode' => $prod_code,
                'ProdTypeCcd' => $this->arr_product_type_ccd[element('mang_type',$input)],
                'SiteCode' => element('site_code',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            print_r($product_data);

            /*if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };*/

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //예치금 상품등록
    protected function _addSubProductForReadingRoom($input = [])
    {
        try {
            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');
            $prod_code = $row['ProdCode'];
            $this->_setSubProdCode($prod_code);

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'sub');
            $product_data = array_merge($set_product_data, [
                'ProdCode' => $prod_code,
                'ProdTypeCcd' => $this->sub_product_type_ccd,
                'SiteCode' => element('site_code',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            print_r($product_data);

            /*if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };*/

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 판매가격 등록
     * @param array $input
     * @return bool|string
     */
    protected function _addProductPriceForReadingRoom($input = [])
    {
        $prod_code = $this->_getProdCode();

        try {
            $data = [
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => element('sale_price', $input),
                'SaleRate' => element('sale_rate', $input, 0),
                'SaleDiscType' => element('sale_disc_type', $input, 'R'),
                'RealSalePrice' => element('real_sale_price', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            print_r($data);

            /*if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('판매가격 정보 등록에 실패했습니다.');
            }*/

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 예치금 판매가격 등록
     * @param array $input
     * @return bool|string
     */
    protected function _addSubProductPriceForReadingRoom($input = [])
    {
        try {
            $prod_code = $this->_getSubProdCode();
            $data = [
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => element('sub_prod_code_price', $input),
                'SaleRate' => '0',
                'SaleDiscType' => 'R',
                'RealSalePrice' => element('sub_prod_code_price', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            print_r($data);

            /*if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('판매가격 정보 등록에 실패했습니다.');
            }*/

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 연관상품 저장
     * @param $mang_type
     * @return bool|string
     */
    protected function _addSubProduct($mang_type)
    {
        try {
            $prod_code = $this->_getProdCode();
            $sub_prod_code = $this->_getSubProdCode();

            $data = [
                'ProdCode' => $prod_code,
                'ProdCodeSub' => $sub_prod_code,
                'IsSale' => 'N',
                'ProdTypeCcd' => $this->arr_product_type_ccd[$mang_type],
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($data)->insert($this->_table['subproduct']) === false) {
                throw new \Exception('예치금 연관상품 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    //SMS 발송 정보
    protected function _addSms($input = [])
    {
        try {
            $prod_code = $this->_getProdCode();

            if(empty(element('sms_memo',$input)) === false && empty(element('cs_tel',$input)) === false) {
                $data = [
                    'ProdCode' => $prod_code,
                    'Memo' => element('sms_memo', $input),
                    'SendTel' => element('cs_tel', $input, ''),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];
                if($this->_conn->set($data)->insert($this->_table['product_sms']) === false) {
                    throw new \Exception('SMS 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 상품데이터 셋팅
     * @param array $input
     * @param $input_type
     * @return array
     */
    private function _setProductData($input = [], $input_type = 'main')
    {
        $SaleStartDatm = element('use_start_date',$input).' '.date('H').':00:00';
        $SaleEndDatm = element('use_end_date',$input).'23:59:59';

        $input_product = [
            'ProdName' => element('rd_name',$input),
            'SaleStartDatm' => $SaleStartDatm,
            'SaleEndDatm' => $SaleEndDatm,
            'SaleStatusCcd' => $this->_arr_sale_status_ccd[$input_type],
            'IsSaleEnd' => 'N',
            'IsCoupon' => 'N',
            'IsPoint' => 'N',
            'PointApplyCcd' => '',
            'PointSavePrice' => '0',
            'PointSaveType' => 'R',
            'IsBest' => 'N',
            'IsNew' => 'N',
            'IsCart' => 'N',
            'IsRefund' => 'Y',
            'IsFreebiesTrans' => 'N',
            'IsSms' => ($input_type == 'main') ? element('sms_is_use',$input,'N') : 'N',
            'IsDeliveryInfo' => 'N',
            'IsUse' => 'Y'
        ];

        return $input_product;
    }

    private function _setProdCode($prod_code)
    {
        $this->_prod_code = $prod_code;
    }

    private function _getProdCode()
    {
        return $this->_prod_code;
    }

    private function _setSubProdCode($prod_code)
    {
        $this->_sub_prod_code = $prod_code;
    }

    private function _getSubProdCode()
    {
        return $this->_sub_prod_code;
    }
}