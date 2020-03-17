<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultFModel extends WB_Model
{
    public $_ccds = ['661','666','614','631','667', '668', '729'];   //이메일,응시직렬,응시지역,수험기간,수강여부

    private $_table = [
        'consult_schedule' => 'lms_consult_schedule',
        'consult_schedule_time' => 'lms_consult_schedule_time',
        'consult_schedule_member' => 'lms_consult_schedule_member',
        'consult_schedule_member_r_ccd' => 'lms_consult_schedule_member_r_ccd',
        'sys_category' => 'lms_sys_category',
        'lms_member' => 'lms_member'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public $yoil = array("일","월","화","수","목","금","토");

    /**
     * 로그인 회원 상담예약 방문상태 조회
     * @param $site_code
     * @param $campus_code
     * @return mixed
     */
    public function getScheduleDataForMemberIsConsult($site_code, $campus_code)
    {
        $arr_condition = [
            'RAW' => [
                'c.MemIdx = ' => (empty($this->session->userdata('mem_idx')) === true) ? '\'\'' : $this->session->userdata('mem_idx'),
                'a.SiteCode = ' => (empty($site_code) === true) ? '\'\'' : '\''.$site_code.'\'',
                'a.CampusCcd = ' => (empty($campus_code) === true) ? '\'\'' : '\''.$campus_code.'\'',
            ],
            'EQ' => [
                'a.IsUse' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'STRAIGHT_JOIN COUNT(*) AS cnt';
        $from = "
            FROM {$this->_table['consult_schedule']} AS a
            INNER JOIN {$this->_table['consult_schedule_time']} AS b ON a.CsIdx = b.CsIdx
            INNER JOIN {$this->_table['consult_schedule_member']} AS c ON b.CstIdx = c.CstIdx AND c.IsConsult = 'N' AND c.IsReg = 'Y'
        ";
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
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

    /**
     * 특정시간대 기준 데이터 조회
     * @param $arr_condition
     * @param $arr_sub_condition
     * @param $column
     * @return mixed
     */
    public function findConsultScheduleTimeForOnly($arr_condition, $arr_sub_condition, $column)
    {
        $sub_where = $this->_conn->makeWhere($arr_sub_condition);
        $sub_where = $sub_where->getMakeWhere(false);

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $form = "
            FROM {$this->_table['consult_schedule_time']} AS a
            INNER JOIN {$this->_table['consult_schedule']} AS b ON a.CsIdx = b.CsIdx AND b.IsUse = 'Y' AND b.IsStatus = 'Y'
            LEFT JOIN (
                SELECT CstIdx, COUNT(*) AS memCnt
                FROM {$this->_table['consult_schedule_member']}
                {$sub_where}
            ) AS c ON a.CstIdx = c.CstIdx
        ";

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $form . $where)->row_array();
    }

    /**
     * 상담예약 등록
     * @param array $inputData
     * @return array|bool
     */
    public function addConsultSchedule($inputData = [], $site_code)
    {
        $this->_conn->trans_begin();
        try {
            $member_data = $this->consultFModel->getScheduleDataForMemberIsConsult($site_code, element('s_campus', $inputData));
            $isCount_cnt = $member_data['cnt'];
            if ($isCount_cnt > 0) {
                throw new \Exception('등록된 상담예약건이 존재합니다. 취소 후 다시 예약해 주세요.');
            }

            $arr_serial_ccd = element('serial_ccd', $inputData);
            $arr_study_ccd = element('study_ccd', $inputData);

            $input_Data = [
                'CstIdx' => element('cst_idx', $inputData),
                'CateCode' => element('cate_code', $inputData, ''),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'CandidateAreaCcd' => element('candidate_area_ccd', $inputData),
                'ExamPeriodCcd' => element('exam_period_ccd', $inputData),
                'SubjectName' => element('subject_name', $inputData),
                'Memo' => element('memo', $inputData),
                'IsReg' => 'Y',
                'IsConsult' => 'N',
                'RegIp' => $this->input->ip_address()
            ];

            $this->_conn->set($input_Data)
                ->set('PhoneEnc', 'fn_enc("' . element('phone', $inputData) . '")', false)
                ->set('MailEnc', 'fn_enc("' . element('mail_id', $inputData). '@' . element('mail_domain', $inputData) . '")', false);

            if ($this->_conn->insert($this->_table['consult_schedule_member']) === false) {
                throw new \Exception('상담예약 등록에 실패했습니다.');
            }
            $csm_idx = $this->_conn->insert_id();

            //응시직렬저장 (공무원일경우 groupccd 분기처리)
            foreach ($arr_serial_ccd as $key => $val) {
                $inputData = [
                    'CsmIdx' => $csm_idx,
                    'GroupCcd' => (config_app('SiteGroupCode') == '1002') ? '614' : '666',
                    'CcdValue' => $val
                ];
                if ($this->_conn->set($inputData)->insert($this->_table['consult_schedule_member_r_ccd']) === false) {
                    throw new \Exception('상담예약 등록에 실패했습니다.');
                }
            }

            //수강여부저장
            foreach ($arr_study_ccd as $key => $val) {
                $inputData = [
                    'CsmIdx' => $csm_idx,
                    'GroupCcd' => '668',
                    'CcdValue' => $val
                ];
                if ($this->_conn->set($inputData)->insert($this->_table['consult_schedule_member_r_ccd']) === false) {
                    throw new \Exception('상담예약 등록에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true, 'ret_status' => '200', 'ret_msg' => $csm_idx];
    }

    /**
     * 회원예약정보 목록
     * @param $site_code
     * @param $campus_code
     * @return mixed
     */
    public function listConsultScheduleForMember($site_code, $campus_code)
    {
        $mem_idx = $this->session->userdata('mem_idx');

        $arr_condition = [
            'RAW' => [
                'a.SiteCode = ' => (empty((int)$site_code) === true) ? '\'\'' : (int)$site_code,
                'a.CampusCcd = ' => (empty((int)$campus_code) === true) ? '\'\'' : (int)$campus_code
            ],
            'EQ' => [
                'c.IsReg' => 'Y',
                'a.IsUse' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = '
            STRAIGHT_JOIN
            c.CsmIdx, a.CampusCcd, fn_ccd_name(a.CampusCcd) AS CampusName, a.ConsultDate
            ,b.TimeValue, c.IsReg, c.IsConsult
            ,fn_dec(c.PhoneEnc) AS MemPhone
            ,fn_dec(c.MailEnc) AS MemMail
            ,c.CandidatePosition, c.CandidateAreaCcd, fn_ccd_name(c.CandidateAreaCcd) AS CandidateAreaName
            ,c.ExamPeriodCcd, fn_ccd_name(c.ExamPeriodCcd) AS ExamPeriodName, c.SubjectName
            ,d.MemId, d.MemName, d.BirthDay, c.Memo
            ,IFNULL(f.CcdName, e.CcdName) AS SerialName, g.CcdName AS StudyName
        ';
        $from = "
            FROM {$this->_table['consult_schedule']} AS a
            INNER JOIN {$this->_table['consult_schedule_time']} AS b ON a.CsIdx = b.CsIdx AND b.IsUse = 'Y' AND b.IsStatus = 'Y'
            INNER JOIN {$this->_table['consult_schedule_member']} AS c ON b.CstIdx = c.CstIdx AND c.MemIdx = '{$mem_idx}'
            
            LEFT JOIN (
                SELECT b.CsmIdx, GROUP_CONCAT(fn_ccd_name(b.CcdValue)) AS CcdName
                FROM (
                    SELECT CsmIdx
                    FROM {$this->_table['consult_schedule_member']}
                    WHERE MemIdx = '{$mem_idx}'
                ) AS a
                INNER JOIN {$this->_table['consult_schedule_member_r_ccd']} AS b ON a.CsmIdx= b.CsmIdx
                WHERE b.GroupCcd = '666'
                GROUP BY b.CsmIdx, b.GroupCcd
            ) AS e ON c.CsmIdx = e.CsmIdx
            
            LEFT JOIN (
                SELECT b.CsmIdx, GROUP_CONCAT(fn_ccd_name(b.CcdValue)) AS CcdName
                FROM (
                    SELECT CsmIdx
                    FROM {$this->_table['consult_schedule_member']}
                    WHERE MemIdx = '{$mem_idx}'
                ) AS a
                INNER JOIN {$this->_table['consult_schedule_member_r_ccd']} AS b ON a.CsmIdx= b.CsmIdx
                WHERE b.GroupCcd = '614'
                GROUP BY b.CsmIdx, b.GroupCcd
            ) AS f ON c.CsmIdx = f.CsmIdx
            
            LEFT JOIN (
                SELECT b.CsmIdx, GROUP_CONCAT(fn_ccd_name(b.CcdValue)) AS CcdName
                FROM (
                    SELECT CsmIdx
                    FROM {$this->_table['consult_schedule_member']}
                    WHERE MemIdx = '{$mem_idx}'
                ) AS a
                INNER JOIN {$this->_table['consult_schedule_member_r_ccd']} AS b ON a.CsmIdx= b.CsmIdx
                WHERE b.GroupCcd = '668'
                GROUP BY b.CsmIdx, b.GroupCcd
            ) AS g ON c.CsmIdx = g.CsmIdx
            
            INNER JOIN {$this->_table['lms_member']} AS d ON c.MemIdx = d.MemIdx
        ";
        $order_by = $this->_conn->makeOrderBy(['c.CsmIdx' => 'DESC'])->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 회원예약정보 조회
     * @param $csm_idx
     * @return mixed
     */
    public function findConsultScheduleForMember($csm_idx)
    {
        $arr_condition = [
            'RAW' => [
                'a.MemIdx = ' => (empty($this->session->userdata('mem_idx')) === true) ? '\'\'' : $this->session->userdata('mem_idx'),
                'a.CsmIdx = ' => (empty($csm_idx) === true) ? '\'\'' : '\''.$csm_idx.'\''
            ],
            'EQ' => [
                'c.IsUse' => 'Y',
                'c.IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = '
            STRAIGHT_JOIN
            a.CsmIdx, a.CstIdx, a.CateCode, a.MemIdx, fn_dec(a.PhoneEnc) AS Phone, fn_dec(a.MailEnc) AS Mail,
            e.CateName AS CandidatePositionName,
            fn_ccd_name(A.CandidateAreaCcd) AS CandidateAreaName,
            fn_ccd_name(A.ExamPeriodCcd) AS ExamPeriodName,
            a.SubjectName, a.Memo, a.IsReg,
            c.ConsultDate, b.TimeValue
        ';
        $from = "
            FROM {$this->_table['consult_schedule_member']} AS a
            INNER JOIN {$this->_table['consult_schedule_time']} AS b ON a.CstIdx = b.CstIdx
            INNER JOIN {$this->_table['consult_schedule']} AS c ON b.CsIdx = c.CsIdx
            LEFT JOIN {$this->_table['sys_category']} AS e ON a.CandidatePosition = e.CateCode AND e.IsStatus = 'Y'
        ";
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 예약회원정보 관계테이블
     * @param $csm_idx
     * @param $group_ccd
     * @return array
     */
    public function findConsultScheduleDetailForMember_R_Ccd($csm_idx, $group_ccd)
    {
        $column = '
            CsmIdx, GROUP_CONCAT(fn_ccd_name(CcdValue)) AS CcdName
        ';
        $from = '
            FROM '.$this->_table['consult_schedule_member_r_ccd'].'
        ';
        $where = ' where CsmIdx = ? and GroupCcd = ?';
        $group_by = ' GROUP BY GroupCcd';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $group_by, [$csm_idx, $group_ccd])->result_array();

        return array_pluck($data, 'CcdName', 'CsmIdx');
    }

    /**
     * 상담예약취소
     */
    public function cancelConsultSchedule($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $csm_idx = element('csm_idx', $formData);

            $data['IsReg'] = 'N';
            $data['CancelDatm'] = date('Y-m-d H:i:s');
            $this->_conn->set($data)->where(['CsmIdx' => $csm_idx, 'MemIdx' => $this->session->userdata('mem_idx'), 'IsReg' => 'Y']);

            if ($this->_conn->update($this->_table['consult_schedule_member']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}