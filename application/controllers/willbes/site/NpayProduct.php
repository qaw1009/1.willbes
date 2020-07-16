<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayProduct extends \app\controllers\FrontController
{
    protected $models = array('product/bookF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'book';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 윌스토리 네이버페이 상품DB 연동
     * @param array $params
     * @return array|bool
     */
    public function index($params=[])
    {
        try {
            $add_condition = [
                'EQ' => ['A.SiteCode' => $this->_site_code]
            ];
            $data = $this->bookFModel->NpayListBookStoreProduct($add_condition);

            $type = empty($params) ? '' : $params[0];

            //$write =  "id	title	price_pc	price_mobile	normal_price	link	image_link	category_name1  naver_category	condition	brand	maker	search_tag	shipping". PHP_EOL;
            $write = "id\ttitle\tprice_pc\tprice_mobile\tnormal_price\tlink\timage_link\tcategory_name1\tnaver_category\tcondition\tbrand\tmaker\tsearch_tag\tshipping" . PHP_EOL;

            foreach ($data as $row) {
                $write .= $row['id'] . "\t" . $row['title'] . "\t" . $row['price_pc'] . "\t" . $row['price_mobile'] . "\t" . $row['normal_price'] . "\t" . $row['link'] . "\t" . $row['image_link'] . "\t" . $row['category_name1']
                    . "\t" . $row['naver_category'] . "\t" . $row['condition'] . "\t" . $row['brand'] . "\t" . $row['maker'] . "\t" . $row['search_tag'] . "\t" . $row['shipping'] . PHP_EOL;
            }

            if ($type === '') {
            
                echo $write; //바로 호출
            
            } else if ($type === 'file') {  //txt 파일 형태

                /* 파일 생성 후 리다이렉트 처리*/
                $this->load->helper('file');
                $dir = public_to_upload_path(config_item('upload_prefix_dir') . '/npay');
                if (is_dir($dir) === false && is_null($dir) === false) {
                    if (mkdir($dir, 0707, true) === false) {
                        throw new \Exception(sprintf('디렉토리 생성에 실패했습니다. (%s)', $dir));
                    }
                }
                $real_file_path = $dir.'/product'.$this->_site_code.'.txt';
                write_file($real_file_path, $write);
                header('Location:'.upload_path_to_public($real_file_path));
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 윌스토리 네이버페이 상품정보 요청
     * @example https://book.dev.willbes.net/npayProduct/info?product[0][id]=159390&product[1][id]=159371&product[2][id]=159406
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $format = 'application/xml';
        $output = '<?xml version="1.0" encoding="utf-8"?>';

        try {
            // input parameter
            $arr_prod_code = array_pluck(get_arr_var($this->_reqG('product'), []), 'id');   // 상품코드
            if (empty($arr_prod_code) === true) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }
            
            // 상품조회
            $add_column = ', rwRealSalePrice, wAttachImgPath, wAttachImgOgName';
            $arr_condition = [
                'EQ' => ['SiteCode' => $this->_site_code],
                'IN' => ['ProdCode' => $arr_prod_code]
            ];

            $data = $this->bookFModel->listProduct($this->_learn_pattern, false, $arr_condition, null, null, [], $add_column);
            if (empty($data) === true) {
                throw new \Exception('데이터가 없습니다.');
            }

            // 사이트설정 변수
            $_site_url = config_app('SiteUrl');
            $_delivery_group_id = config_app('npay_delivery_group_id');
            $_delivery_free_price = config_app('DeliveryFreePrice', 30000);
            $_delivery_price = config_app('DeliveryPrice', 2500);
            $_delivery_add_split_unit = config_app('npay_delivery_add_split_unit', 3);
            $_delivery_add_area2_price = config_app('npay_delivery_add_area2_price', 3000);
            $_delivery_add_area3_price = config_app('npay_delivery_add_area3_price', 5000);
            $_return_info_zipcode = config_app('npay_return_info.zipcode', '');
            $_return_info_address1 = config_app('npay_return_info.address1', '');
            $_return_info_address2 = config_app('npay_return_info.address2', '');
            $_return_info_sellername = config_app('npay_return_info.sellername', '');
            $_return_info_contact = config_app('npay_return_info.contact', '');

            // output XML 작성
            $output .= '<products>';

            foreach ($data as $row) {
                $image_url = 'https://' . $_site_url . $row['wAttachImgPath'] . $row['wAttachImgOgName'];    // 상품이미지 URL
                $info_url = 'https://' . $_site_url . '/bookStore/show/pattern/all/prod-code/' . $row['ProdCode'];    // 상품상세 URL
                $stock_cnt = $row['IsSalesAble'] == 'Y' ? 999 : 0;
                $sale_status = $row['IsSalesAble'] == 'Y' ? 'ON_SALE' : 'NOT_SALE';
                if ($row['wSaleCcd'] == '112002') {
                    $sale_status = 'SOLD_OUT';
                }

                $output .= '<product>';
                $output .= '<id>' . $row['ProdCode'] . '</id>';
                $output .= '<merchantProductId>' . $row['ProdCode'] . '</merchantProductId>';
                $output .= '<ecMallProductId>' . $row['ProdCode'] . '</ecMallProductId>';
                $output .= '<name><![CDATA[' . $row['ProdName'] . ']]></name>';
                $output .= '<basePrice>' . $row['rwRealSalePrice'] . '</basePrice>';
                $output .= '<taxType>TAX_FREE</taxType>';
                $output .= '<imageUrl><![CDATA[' . $image_url . ']]></imageUrl>';
                $output .= '<infoUrl><![CDATA[' . $info_url . ']]></infoUrl>';
                $output .= '<stockQuantity>' . $stock_cnt . '</stockQuantity>';
                $output .= '<status>' . $sale_status . '</status>';
                $output .= '<supplementSupport>false</supplementSupport>';
                $output .= '<optionSupport>false</optionSupport>';

                // 배송정책
                $output .= '<shippingPolicy>';
                $output .= '<groupId>' . $_delivery_group_id . '</groupId>';
                $output .= '<method>DELIVERY</method>';

                // 가격이 30,000원 미만일 경우만 배송료 무료조건 적용
                if ($row['IsFreebiesTrans'] == 'N' && $row['rwRealSalePrice'] < $_delivery_free_price) {
                    $output .= '<feeType>FREE</feeType>';
                    $output .= '<feePayType>FREE</feePayType>';
                    $output .= '<feePrice>0</feePrice>';
                } else {
                    $output .= '<feeType>CONDITIONAL_FREE</feeType>';
                    $output .= '<conditionalFree>';
                    $output .= '<basePrice>' . $_delivery_free_price . '</basePrice>';
                    $output .= '</conditionalFree>';
                    $output .= '<feePayType>PREPAYED</feePayType>';
                    $output .= '<feePrice>' . $_delivery_price . '</feePrice>';
                }

                $output .= '<surchargeByArea>';
                $output .= '<splitUnit>' . $_delivery_add_split_unit . '</splitUnit>';
                $output .= '<area2Price>' . $_delivery_add_area2_price . '</area2Price>';
                $output .= '<area3Price>' . $_delivery_add_area3_price . '</area3Price>';
                $output .= '</surchargeByArea>';
                $output .= '</shippingPolicy>';

                // 반품주소정보
                $output .= '<returnInfo>';
                $output .= '<zipcode>' . $_return_info_zipcode . '</zipcode>';
                $output .= '<address1><![CDATA[' . $_return_info_address1 . ']]></address1>';
                $output .= '<address2><![CDATA[' . $_return_info_address2 . ']]></address2>';
                $output .= '<sellername><![CDATA[' . $_return_info_sellername . ']]></sellername>';
                $output .= '<contact1><![CDATA[' . $_return_info_contact . ']]></contact1>';
                $output .= '<contact2><![CDATA[' . $_return_info_contact . ']]></contact2>';
                $output .= '</returnInfo>';

                $output .= '</product>';
            }

            $output .= '</products>';
        } catch (\Exception $e) {
            error_result($e);
            $output .= '<products></products>';
        }

        return $this->output
            ->set_content_type($format)
            ->set_status_header(_HTTP_OK)
            ->set_output($output);
    }
}
