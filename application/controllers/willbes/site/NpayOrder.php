<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayOrder extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'product/productF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    // API 연동모드 (test/real)
    private $_api_mode = 'test';

    // API 연동주소 설정
    private $_api_url_info = [
        'test' => [
            'order_regi' => 'https://test-api.pay.naver.com/o/customer/api/order/v20/register',     // 주문정보 등록
            'order_page' => 'https://test-order.pay.naver.com/customer/buy/',                       // 주문페이지
            'wish_regi' => 'https://test-pay.naver.com/customer/api/wishlist.nhn',                  // 찜정보 등록
            'wish_page' => 'https://test-pay.naver.com/customer/wishlistPopup.nhn',                 // 찜목록 페이지
        ],
        'real' => [
            'order_regi' => 'https://api.pay.naver.com/o/customer/api/order/v20/register',          // 주문정보 등록
            'order_page' => 'https://order.pay.naver.com/customer/buy/',                            // 주문페이지
            'wish_regi' => 'https://pay.naver.com/customer/api/wishlist.nhn',                       // 찜정보 등록
            'wish_page' => 'https://pay.naver.com/customer/wishlistPopup.nhn',                      // 찜목록 페이지
        ]
    ];

    // API 연동주소
    private $_api_url = array();

    public function __construct()
    {
        parent::__construct();

        // 연동모드에 맞는 API 연동주소 셋팅
        $this->_api_url = $this->_api_url_info[$this->_api_mode];
    }

    /**
     * 네이버페이 주문정보 등록 연동 후 주문 페이지 이동
     * @param array $params
     * @return mixed
     */
    public function register($params = [])
    {
        // input parameter
        $pattern = strtolower(element('pattern', $params, 'only'));
        $learn_pattern = $this->_reqP('learn_pattern');
        $arr_prod_code = $this->_reqP('prod_code');
        $arr_cart_idx = $this->_reqP('cart_idx');
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $referer = $this->input->server('HTTP_REFERER');
        $back_url = 'https:' . front_url('/cart/index');

        try {
            // 상품정보 조회
            if ($pattern == 'cart') {
                if ($this->isLogin() === true) {
                    // 회원 장바구니
                    if (empty($arr_cart_idx) === true) {
                        throw new \Exception('필수 파라미터 오류입니다.');
                    }

                    // 데이터 조회
                    $data = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $arr_cart_idx, null, 'N', 'N', true);
                } else {
                    // 비회원 장바구니
                    if (empty($arr_prod_code) === true) {
                        throw new \Exception('필수 파라미터 오류입니다.');
                    }

                    // 데이터 조회
                    $data = $this->cartFModel->listGuestCart($this->_site_code, $arr_prod_code);
                }
            } else {
                // 상품 상세
                $arr_prod_code = explode(':', array_get($arr_prod_code, '0'));

                if (empty($learn_pattern) === true || empty(array_filter($arr_prod_code)) === true) {
                    throw new \Exception('필수 파라미터 오류입니다.');
                }

                $prod_code = $arr_prod_code[0];
                $sale_type_ccd = $arr_prod_code[1];
                $prod_qty = array_get($this->_reqP('prod_qty'), $prod_code, 1);
                $back_url = get_var($referer, $back_url);

                // 데이터 조회
                $add_column = ', "' . $prod_qty . '" as ProdQty, wAttachImgPath, wAttachImgOgName, fn_product_saletype_price("'. $prod_code . '", "'. $sale_type_ccd . '", "RealSalePrice") as RealSalePrice';
                $data[0] = $this->productFModel->findOnlySalesProductByProdCode($learn_pattern, $prod_code, $add_column);
            }

            if (empty(array_filter($data)) === true) {
                throw new \Exception('데이터가 없습니다.');
            }

            // 사이트설정 변수
            $_delivery_group_id = config_app('npay_delivery_group_id');
            $_delivery_price = config_app('DeliveryPrice', 2500);
            $_delivery_free_price = config_app('DeliveryFreePrice', 30000);
            $_delivery_add_split_unit = config_app('npay_delivery_add_split_unit', 3);
            $_delivery_add_area2_price = config_app('npay_delivery_add_area2_price', 3000);
            $_delivery_add_area3_price = config_app('npay_delivery_add_area3_price', 5000);

            // 주문정보 XML 작성
            //header('Content-Type: application/xml; charset=utf-8');   // XML 데이터 확인용
            $send_xml = '<?xml version="1.0" encoding="utf-8"?>';
            $send_xml .= '<order>';
            $send_xml .= '<merchantId>' . config_app('npay_merchant_id') . '</merchantId>';
            $send_xml .= '<certiKey>' . config_app('npay_mart_cert_key') . '</certiKey>';
            $send_xml .= '<backUrl><![CDATA[' . $back_url . ']]></backUrl>';
            $send_xml .= '<interface>';
            $send_xml .= '<naverInflowCode>' . get_cookie('NA_CO') . '</naverInflowCode>';
            $send_xml .= '</interface>';
            $send_xml .= '<mcstCultureBenefitYn>true</mcstCultureBenefitYn>';

            foreach ($data as $idx => $row) {
                $image_url = 'https:' . rtrim(site_url('/'), '/') . $row['wAttachImgPath'] . $row['wAttachImgOgName'];    // 상품이미지 URL
                $info_url = 'https:' . front_url('/bookStore/show/pattern/all/prod-code/' . $row['ProdCode']);    // 상품상세 URL

                $send_xml .= '<product>';
                $send_xml .= '<id>' . $row['ProdCode'] . '</id>';
                $send_xml .= '<merchantProductId>' . $row['ProdCode'] . '</merchantProductId>';
                $send_xml .= '<ecMallProductId>' . $row['ProdCode'] . '</ecMallProductId>';
                $send_xml .= '<name><![CDATA[' . $row['ProdName'] . ']]></name>';
                $send_xml .= '<basePrice>' . $row['RealSalePrice'] . '</basePrice>';
                $send_xml .= '<taxType>TAX_FREE</taxType>';
                $send_xml .= '<imageUrl><![CDATA[' . $image_url . ']]></imageUrl>';
                $send_xml .= '<infoUrl><![CDATA[' . $info_url . ']]></infoUrl>';
                $send_xml .= '<single>';
                $send_xml .= '<quantity>' . $row['ProdQty'] . '</quantity>';
                $send_xml .= '</single>';

                // 배송정책
                $send_xml .= '<shippingPolicy>';
                $send_xml .= '<groupId>' . $_delivery_group_id . '</groupId>';
                $send_xml .= '<method>DELIVERY</method>';
                $send_xml .= '<feeType>CONDITIONAL_FREE</feeType>';

                if ($row['IsFreebiesTrans'] == 'N') {
                    $send_xml .= '<feePayType>FREE</feePayType>';
                    $send_xml .= '<feePrice>0</feePrice>';
                } else {
                    $send_xml .= '<feePayType>PREPAYED</feePayType>';
                    $send_xml .= '<feePrice>' . $_delivery_price . '</feePrice>';
                    $send_xml .= '<conditionalFree>';
                    $send_xml .= '<basePrice>' . $_delivery_free_price . '</basePrice>';
                    $send_xml .= '</conditionalFree>';
                }

                $send_xml .= '<surchargeByArea>';
                $send_xml .= '<splitUnit>' . $_delivery_add_split_unit . '</splitUnit>';
                $send_xml .= '<area2Price>' . $_delivery_add_area2_price . '</area2Price>';
                $send_xml .= '<area3Price>' . $_delivery_add_area3_price . '</area3Price>';
                $send_xml .= '</surchargeByArea>';
                $send_xml .= '</shippingPolicy>';

                $send_xml .= '</product>';
            }

            $send_xml .= '</order>';

            // 주문정보 XML 전송
            $this->load->library('curl');
            $this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $this->curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
            $this->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $this->curl->setOpt(CURLOPT_HTTPHEADER, ['Content-Type: application/xml; charset=utf-8']);
            $this->curl->setOpt(CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            $this->curl->setOpt(CURLOPT_TIMEOUT, 10);
            $this->curl->setOpt(CURLOPT_FAILONERROR, false);
            $this->curl->post($this->_api_url['order_regi'], $send_xml);

            if ($this->curl->error === true) {
                throw new \Exception('주문정보 전송 중 오류가 발생하였습니다. [' . $this->curl->errorMessage . ' (' . $this->curl->errorCode . ')]', 9999);
            }

            $response = $this->curl->rawResponse;
            $results = explode(':', $response);
            $this->curl->close();

            if (array_get($results, '0') === 'SUCCESS') {
                // 주문 페이지 이동
                redirect($this->_api_url['order_page'] . $results[1] . '/' . $results[2]);
            } else {
                throw new \Exception('주문정보 등록 중 오류가 발생하였습니다. [' . $response . ']', 9999);
            }
        } catch (\Exception $e) {
            if ($e->getCode() == 9999) {
                error_result($e);
            }
            show_alert($e->getMessage(), 'back');
        }

        return null;
    }

    /**
     * 네이버페이 찜정보 등록 후 찜 페이지 이동
     * @param array $params
     * @return mixed
     */
    public function wishlist($params = [])
    {
        // input parameter
        $learn_pattern = $this->_reqP('learn_pattern');
        $arr_prod_code = explode(':', array_get($this->_reqP('prod_code'), '0'));

        try {
            if (empty($learn_pattern) === true || empty(array_filter($arr_prod_code)) === true) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            // 데이터 조회
            $prod_code = $arr_prod_code[0];
            $sale_type_ccd = $arr_prod_code[1];
            $add_column = ', wAttachImgPath, wAttachImgOgName, fn_product_saletype_price("'. $prod_code . '", "'. $sale_type_ccd . '", "RealSalePrice") as RealSalePrice';
            $data = $this->productFModel->findOnlySalesProductByProdCode($learn_pattern, $prod_code, $add_column);

            if (empty($data) === true) {
                throw new \Exception('데이터가 없습니다.');
            }

            $image_url = 'https:' . rtrim(site_url('/'), '/') . $data['wAttachImgPath'] . $data['wAttachImgOgName'];    // 상품이미지 URL
            $info_url = 'https:' . front_url('/bookStore/show/pattern/all/prod-code/' . $data['ProdCode']);    // 상품상세 URL

            // 전송 데이터
            $post_data = [
                'SHOP_ID' => urlencode(config_app('npay_merchant_id')),
                'CERTI_KEY' => urlencode(config_app('npay_mart_cert_key')),
                'RESERVE1' => '', 'RESERVE2' => '', 'RESERVE3' => '', 'RESERVE4' => '', 'RESERVE5' => '',
                'ITEM_ID' => urlencode($data['ProdCode']),
                'ITEM_NAME' => urlencode($data['ProdName']),
                'ITEM_UPRICE' => urlencode($data['RealSalePrice']),
                'ITEM_IMAGE' => urlencode($image_url),
                'ITEM_URL' => urlencode($info_url),
            ];

            // 찜 정보 전송
            $this->load->library('curl');
            $this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $this->curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
            $this->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $this->curl->setOpt(CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded;charset=utf-8']);
            $this->curl->setOpt(CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            $this->curl->setOpt(CURLOPT_TIMEOUT, 10);
            $this->curl->setOpt(CURLOPT_FAILONERROR, false);
            $this->curl->post($this->_api_url['wish_regi'], $post_data);

            if ($this->curl->error === true) {
                throw new \Exception('찜정보 전송 중 오류가 발생하였습니다. [' . $this->curl->errorMessage . ' (' . $this->curl->errorCode . ')]', 9999);
            }

            $item_id = $this->curl->rawResponse;
            $this->curl->close();

            // 찜 페이지 이동
            redirect($this->_api_url['wish_page'] . '?SHOP_ID=' . urlencode(config_app('npay_merchant_id')) . '&ITEM_ID=' . urlencode($item_id));
        } catch (\Exception $e) {
            if ($e->getCode() == 9999) {
                error_result($e);
            }
            show_alert($e->getMessage(), 'close');
        }

        return null;
    }
}
