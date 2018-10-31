<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    // 포인트상태 (적립, 소진, 소멸)
    public $_point_status_ccd = ['save' => '679001', 'useall' => '679002', 'expire' => '679003'];

    // 포인트 적립사유 (결제완료, 환불에 따른 사용포인트 복구)
    public $_point_save_reason_ccd = ['paid' => '680001', 'refund' => '680002'];

    // 포인트 사용사유 (주문결제, 소멸, 환불에 따른 적립포인트 회수)
    public $_point_use_reason_ccd = ['paid' => '681001', 'expire' => '681002', 'refund' => '681003'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 적립 포인트 목록 조회
     * @param bool|string $column
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSavePoint($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        return $this->_conn->getListResult($this->_table['point_save'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 회원 포인트 조회
     * @param int $mem_idx [회원식별자]
     * @param string $point_type [포인트구분, lecture : 강좌, book : 교재, all : 전체]
     * @return mixed
     */
    public function getMemberPoint($mem_idx, $point_type = 'all')
    {
        $query = $this->_conn->query('select fn_member_point(?, ?) as MemPoint', [$mem_idx, $point_type]);
        $data = $query->row(0)->MemPoint;

        if ($point_type == 'all') {
            $data = json_decode($data, true);

            // 조회되지 않는 포인트 초기화
            $arr_point_type = ['lecture', 'book'];
            foreach ($arr_point_type as $type) {
                if (isset($data[$type]) === false) {
                    $data[$type] = 0;
                }
            }
        }

        return $data;
    }

    /**
     * 포인트 사용
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $use_point [사용포인트]
     * @param int $mem_idx [회원식별자]
     * @param array $input
     * @param bool $is_save_point_check [사용포인트보다 적립포인트가 많을 경우 남은 적립포인트만큼만 차감할 경우 true, false일 경우 보유 포인트 부족 에러 리턴]
     * @return bool|string
     */
    public function addUsePoint($point_type, $use_point, $mem_idx, $input = [], $is_save_point_check = false)
    {
        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');

            if ($is_save_point_check === true) {
                // 회원 포인트 조회
                $save_point = $this->getMemberPoint($mem_idx, $point_type);

                // 회원 포인트가 없을 경우 차감할 포인트가 없기 때문에 true 리턴
                if ($save_point < 1) {
                    return true;
                }

                // 사용 포인트보다 회원 포인트가 작을 경우 회원 포인트 만큼만 차감
                if ($save_point < $use_point) {
                    $use_point = $save_point;
                }
            }

            $data = [
                $mem_idx, element('site_code', $input, 0), $point_type, $use_point,
                element('order_idx', $input, 0), element('order_prod_idx', $input, 0),
                $this->_point_use_reason_ccd[element('reason_type', $input)], element('etc_reason', $input),
                $sess_admin_idx, $this->input->ip_address()
            ];

            $query = $this->_conn->query('call sp_member_point_use(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
            $result = $query->row(0)->ReturnMsg;

            if ($result != 'Success') {
                $err_msg = '포인트 사용에 실패했습니다.';
                if ($result == 'NotEnoughPoint') {
                    $err_msg = '보유 포인트가 부족합니다.';
                }
                throw new \Exception($err_msg);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 포인트 적립
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param int $mem_idx [회원식별자]
     * @param array $input
     * @return array|bool
     */
    public function addSavePoint($point_type, $save_point, $mem_idx, $input = [])
    {
        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $valid_days = element('valid_days', $input, 365);   // 기본값 1년

            $data = [
                'PointType' => $point_type,
                'MemIdx' => $mem_idx,
                'SiteCode' => element('site_code', $input),
                'OrderIdx' => element('order_idx', $input, 0),
                'OrderProdIdx' => element('order_prod_idx', $input, 0),
                'PointStatusCcd' => $this->_point_status_ccd['save'],
                'SavePoint' => $save_point,
                'RemainPoint' => $save_point,
                'ReasonCcd' => $this->_point_save_reason_ccd[element('reason_type', $input)],
                'EtcReason' => element('etc_reason', $input),
                'RegAdminIdx' => $sess_admin_idx,
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
