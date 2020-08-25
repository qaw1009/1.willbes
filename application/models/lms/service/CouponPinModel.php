<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CouponPinModel extends WB_Model
{
    private $_table = [
        'coupon_pin' => 'lms_coupon_pin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 쿠폰핀 목록
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listCouponPin($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column === false && $column = 'CouponPin, PinIdx, CouponIdx';

        return $this->_conn->getListResult($this->_table['coupon_pin'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사용가능한 쿠폰핀 수량 리턴
     * @return int
     */
    public function getAvailableCouponPinCnt()
    {
        $arr_condition['RAW']['CouponIdx is'] = ' null';
        return $this->_conn->getListResult($this->_table['coupon_pin'], true, $arr_condition);
    }

    /**
     * 쿠폰핀 배정 (배정된 쿠폰식별자 업데이트)
     * @param $assign_cnt
     * @param $coupon_idx
     * @return bool|string
     */
    public function assignCouponPin($assign_cnt, $coupon_idx)
    {
        try {
            if (empty($assign_cnt) === true || empty($coupon_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            $query = 'update ' . $this->_table['coupon_pin'] . ' as CP 
                    inner join (select PinIdx from ' . $this->_table['coupon_pin'] . ' where CouponIdx is null order by PinIdx asc limit ' . $assign_cnt . ') as CPF     
                        on CP.PinIdx = CPF.PinIdx
                    set CP.CouponIdx = ?
                where CP.CouponIdx is null';

            $is_update = $this->_conn->query($query, [$coupon_idx]);
            if ($is_update !== true) {
                throw new \Exception('쿠폰 핀 배정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
