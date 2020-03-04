<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends \app\controllers\RestController
{
    protected $models = array('event/eventA');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 도매꾹 쇼핑몰 <-> 엔잡 상품주문 주문여부 검증
     * @example /event/events/domeggook_njob/{order_prod_idx}
     * @param string $order_prod_idx
     */
    public function domeggook_njob_get($order_prod_idx = '')
    {
        try {
            // 이벤트 상품코드
            $arr_prod_code = ['158360', '158975']; //TODO

            if (empty($order_prod_idx) === true) {
                return $this->api_param_error(['err_cd' => 'ER01'], 400);
            }

            $arr_condition = [
                'EQ' => ['OP.PayStatusCcd' => '676001']     //결제 완료
            ];

            $data = $this->eventAModel->findOrderByOrderProdIdx($arr_prod_code, $order_prod_idx, $arr_condition);
            if(empty($data) === false) {
                $now = date('Y-m-d');
                if($data['LecStartDate'] > $now || $data['RealLecEndDate'] < $now) {
                    $this->api_error('수강 기간이 아닙니다.', ['err_cd' => 'ER02'], 400);
                }
            } else {
                $this->api_error('수강인증 정보가 없습니다.', ['err_cd' => 'ER03'], 400);
            }
            return $this->api_success('수강인증 되었습니다.', ['err_cd' => '']);

        } catch (\Exception $e) {
            $this->api_error('시스템 오류입니다.', ['err_cd' => 'ER05'], 500);
        }

    }

}
