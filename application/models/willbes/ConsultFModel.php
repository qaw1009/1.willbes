<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultFModel extends WB_Model
{
    private $_table = [
        'consult_schedule' => 'lms_consult_schedule',
        'consult_schedule_time' => 'lms_consult_schedule_time',
        'consult_schedule_member' => 'lms_consult_schedule_member'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 월별 예약 현황 조회
     * @param $site_code
     * @param $campus_code
     * @param $target_month
     * @return mixed
     */
    public function getScheduleDataForMonth($site_code, $campus_code, $target_month)
    {
        $arr_condition = [
            'RAW' => [
                'SiteCode = ' => $site_code,
                'CampusCcd = ' => $campus_code,
                'ConsultDate between ' => ' DATE_FORMAT(CONCAT(\''.$target_month.'\',\'-1\'),\'%Y-%m-%d\') and LAST_DAY(DATE_FORMAT(CONCAT(\''.$target_month.'\',\'-1\'),\'%Y-%m-%d\'))'
            ],
            'EQ' => [
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];

        $default_where = $this->_conn->makeWhere($arr_condition);
        $default_where = $default_where->getMakeWhere(false);

        $column = 'STRAIGHT_JOIN a.CsIdx, a.SiteCode, a.CampusCcd, DATE_FORMAT(a.ConsultDate, \'%d\') AS ConsultDay, IFNULL(b.DayCount, 0) AS DayCount, IFNULL(c.MemberDayCount, 0) AS MemberDayCount';
        $from = "
            FROM 
            (
                SELECT *
                    FROM {$this->_table['consult_schedule']}
                {$default_where}
                GROUP BY ConsultDate
                ORDER BY ConsultDate ASC
            ) AS a 
            
            LEFT JOIN (
                SELECT a.CsIdx, SUM(ConsultPersonCount) AS DayCount
                FROM {$this->_table['consult_schedule_time']} AS a
                INNER JOIN (
                    SELECT CsIdx
                        FROM {$this->_table['consult_schedule']}
                        {$default_where}
                        GROUP BY ConsultDate
                ) AS b ON a.CsIdx = b.CsIdx
                WHERE a.IsUse = 'Y' AND a.IsStatus = 'Y'
                GROUP BY CsIdx
            ) AS b ON a.CsIdx = b.CsIdx
            
            LEFT JOIN (
                SELECT a.CsIdx, COUNT(*) AS MemberDayCount
                FROM {$this->_table['consult_schedule_time']} AS a
                INNER JOIN {$this->_table['consult_schedule_member']} AS b ON a.CstIdx = b.CstIdx
                WHERE b.IsReg = 'Y' AND a.IsUse = 'Y' AND a.IsStatus = 'Y'
                GROUP BY CsIdx
            ) AS c ON a.CsIdx = c.CsIdx
        ";
        $query = $this->_conn->query('select ' . $column . $from);
        return $query->result_array();
    }
}