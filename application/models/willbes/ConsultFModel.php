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

    public $yoil = array("일","월","화","수","목","금","토");

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
                'CampusCcd = ' => (empty($campus_code) === true) ? '\'\'' : '\''.$campus_code.'\'',
                'ConsultDate between ' => ' DATE_FORMAT(CONCAT(\''.$target_month.'\',\'-1\'),\'%Y-%m-%d\') and LAST_DAY(DATE_FORMAT(CONCAT(\''.$target_month.'\',\'-1\'),\'%Y-%m-%d\'))'
            ],
            'EQ' => [
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'STRAIGHT_JOIN a.CsIdx, a.SiteCode, a.CampusCcd, ConsultDate, DATE_FORMAT(a.ConsultDate, \'%d\') AS ConsultDay, IFNULL(b.DayCount, 0) AS DayCount, IFNULL(c.MemberDayCount, 0) AS MemberDayCount';
        $from = "
            FROM 
            (
                SELECT *
                    FROM {$this->_table['consult_schedule']}
                {$where}
                GROUP BY ConsultDate
                ORDER BY ConsultDate ASC
            ) AS a 
            
            LEFT JOIN (
                SELECT a.CsIdx, SUM(ConsultPersonCount) AS DayCount
                FROM {$this->_table['consult_schedule_time']} AS a
                INNER JOIN (
                    SELECT CsIdx
                        FROM {$this->_table['consult_schedule']}
                        {$where}
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
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * 특정일자 예약현황 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findConsultSchedule($arr_condition)
    {
        $column = '
            A.CsIdx, A.SiteCode, A.CampusCcd, A.ConsultDate,
            A.StartTime, A.EndTime,
            DATE_FORMAT(A.StartTime,\'%H\') AS StartHour,
            DATE_FORMAT(A.StartTime,\'%i\') AS StartMin,
            DATE_FORMAT(A.EndTime,\'%H\') AS EndHour,
            DATE_FORMAT(A.EndTime,\'%i\') AS EndMin,
            A.LunchStartTime,A.LunchEndTime,
            DATE_FORMAT(A.LunchStartTime,\'%H\') AS LunchStartHour,
            DATE_FORMAT(A.LunchStartTime,\'%i\') AS LunchStartMin,
            DATE_FORMAT(A.LunchEndTime,\'%H\') AS LunchEndHour,
            DATE_FORMAT(A.LunchEndTime,\'%i\') AS LunchEndMin,
            A.ConsultTime, A.BreakTime,
            A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx,
            D.totalConsult, E.memCount
            ';

        $from = "
        FROM {$this->_table['consult_schedule']} AS A        
        INNER JOIN (
            SELECT CsIdx, SUM(ConsultPersonCount) AS totalConsult
            FROM {$this->_table['consult_schedule_time']}
            WHERE IsUse = 'Y' AND IsStatus = 'Y'
            GROUP BY CsIdx
        ) AS D ON A.CsIdx = D.CsIdx
        
        LEFT JOIN (
            SELECT tA.CsIdx, COUNT(tB.CstIdx) AS memCount FROM {$this->_table['consult_schedule_time']} AS tA
            LEFT JOIN {$this->_table['consult_schedule_member']} AS tB ON tA.CstIdx = tB.CstIdx AND tB.IsReg = 'Y' AND tA.IsUse = 'Y' AND tA.IsStatus = 'Y'
            GROUP BY tA.CsIdx
        ) AS E ON A.CsIdx = E.CsIdx
            ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 특정일자 시간표 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findConsultScheduleTime($arr_condition)
    {
        $column = "STRAIGHT_JOIN A.CstIdx, A.ConsultPersonCount, A.ConsultTargetType, A.IsUse, IFNULL(B.memCount, 0) AS memCount";

        $form = "
            FROM {$this->_table['consult_schedule_time']} AS A
            LEFT JOIN 
            (
                SELECT CstIdx, COUNT(CstIdx) AS memCount
                FROM {$this->_table['consult_schedule_member']}
                WHERE IsReg = 'Y'
                GROUP BY CstIdx
            ) AS B ON A.CstIdx = B.CstIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.CstIdx' => 'ASC'])->getMakeOrderBy();

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $form . $where . $order_by)->result_array();
    }
}