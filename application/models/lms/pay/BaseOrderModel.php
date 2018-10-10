<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderModel extends WB_Model
{
    protected $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_sub_product' => 'lms_order_sub_product',
        'order_product_delivery_info' => 'lms_order_product_delivery_info',
        'order_delivery_address' => 'lms_order_delivery_address',
        'order_memo' => 'lms_order_memo',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_book' => 'lms_product_book',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'product_division' => 'lms_product_division',
        'product_r_product' => 'lms_product_r_product',
        'bms_book' => 'wbs_bms_book',
        'my_lecture' => 'lms_my_lecture',
        'member' => 'lms_member',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    // 공통그룹코드 => 결제채널, 결제루트, 결제방법, 상품구분, 학습형태, 결제상태, 배송상태
    public $_ccd = ['PayChannel' => '669', 'PayRoute' => '670', 'PayMethod' => '604', 'ProdType' => '636', 'LearnPattern' => '615', 'PayStatus' => '676', 'DeliveryStatus' => '677'];

    // 결제루트 공통코드
    public $_pay_route_ccd = ['pg' => '670001', 'visit' => '670002', 'zero' => '670003', 'free' => '670004', 'alliance' => '670005'];

    // 결제방법 공통코드
    public $_pay_method_ccd = ['card' => '604001', 'direct_bank' => '604002', 'vbank' => '604003', 'phone' => '604004'];

    public function __construct()
    {
        parent::__construct('lms');
    }
}
