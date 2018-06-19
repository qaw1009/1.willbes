<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultModel extends WB_Model
{
    private $_table = [
        'consult_schedule' => 'lms_consult_schedule'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상담예약관리 수정 폼에 필요한 데이터 조회
     * @param $idx
     * @return string
     */
    public function findConsultScheduleForModify($idx)
    {
        return '';
    }
}