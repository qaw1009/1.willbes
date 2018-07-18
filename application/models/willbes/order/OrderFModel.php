<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderFModel extends WB_Model
{
    private $_table = [
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌상품 배송료 계산 (미부과 상품이 하나라도 있을 경우 0원)
     * @param array $arr_is_freebies_trans [강좌상품별 사은품/무료교재 배송료 부과여부 배열]
     * @return int
     */
    public function getLectureDeliveryPrice($arr_is_freebies_trans = [])
    {
        return empty($arr_is_freebies_trans) === true || array_search('N', $arr_is_freebies_trans) !== false ? 0 : config_app('DeliveryPrice', 0);
    }

    /**
     * 교재상품 배송료 계산
     * @param $price
     * @return int
     */
    public function getBookDeliveryPrice($price)
    {
        return $price > 0 && $price < config_app('DeliveryFreePrice', 0) ? config_app('DeliveryPrice', 0) : 0;
    }
}
