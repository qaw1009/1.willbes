<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointFModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
    ];

    private $_point_status_ccd = ['save' => '679001', 'expire' => '679002'];    // 포인트상태 (적립, 소멸)
    private $_point_save_reason_ccd = ['paid' => '680001'];   // 포인트 적립사유 (결제완료)
    private $_point_use_reason_ccd = ['paid' => '681001'];    // 포인트 사용사유 (주문결제)

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getMemberPoint($point_type = 'all')
    {

    }

    /**
     * 결제완료된 주문일 경우 포인트 적립 저장
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param int $site_code [사이트코드]
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @return array|bool
     */
    public function addOrderSavePoint($point_type, $save_point, $site_code, $order_idx, $order_prod_idx)
    {
        $input = [
            'site_code' => $site_code,
            'order_idx' => $order_idx,
            'order_prod_idx' => $order_prod_idx,
            'point_status_type' => 'save',
            'reason_type' => 'paid',
            'valid_days' => '365'   // 유효기간 1년
        ];

        return $this->addSavePoint($point_type, $save_point, $input);
    }

    /**
     * 포인트 적립 저장
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param array $input
     * @return array|bool
     */
    public function addSavePoint($point_type, $save_point, $input = [])
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $valid_days = element('valid_days', $input, 365);   // 기본값 1년

            $data = [
                'PointType' => $point_type,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => element('site_code', $input),
                'OrderIdx' => element('order_idx', $input, 0),
                'OrderProdIdx' => element('order_prod_idx', $input, 0),
                'PointStatusCcd' => $this->_point_status_ccd[element('point_status_type', $input)],
                'SavePoint' => $save_point,
                'RemainPoint' => $save_point,
                'ReasonCcd' => $this->_point_save_reason_ccd[element('reason_type', $input)],
                'EtcReason' => element('etc_reason', $input),
                'RegIp' => $this->input->ip_address()
            ];
            $this->_conn->set($data)->set('ExpireDatm', 'date_add(NOW(), interval ' . ($valid_days - 1) . ' day)', false);

            if ($this->_conn->insert($this->_table['point_save']) === false) {
                throw new \Exception('포인트 적립에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
