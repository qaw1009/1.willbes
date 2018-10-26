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

    public function __construct()
    {
        parent::__construct('lms');
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
}
