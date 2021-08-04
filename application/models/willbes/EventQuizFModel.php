<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventQuizFModel extends WB_Model
{
    private $_table = [
        'event_quiz' => 'lms_event_quiz',
        'event_quiz_set' => 'lms_event_quiz_set',
        'event_quiz_set_question' => 'lms_event_quiz_set_question',
        'event_quiz_set_question_detail' => 'lms_event_quiz_set_question_detail',
        'event_quiz_member_answer' => 'lms_event_quiz_member_answer',
        'site' => 'lms_site',
        'lms_member' => 'lms_member',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 퀴즈 문제 조회
     * @param integer $eq_idx
     * @param integer $site_code
     * @return mixed
     */
    public function listEventQuizSet($eq_idx = null, $site_code = null)
    {
        $arr_condition = [
            'EQ' => ['A.EqIdx' => $eq_idx, 'A.IsUse' => 'Y', 'A.IsStatus' => 'Y', 'A.SiteCode' => $site_code],
            'RAW' => ['NOW() between ' => 'StartDatm and EndDatm']
        ];

        $column = "
            A.EqIdx, A.SiteCode, A.Title, A.StartDatm, A.EndDatm,
            B.EqsIdx, B.EqsGroupTitle, B.EqsqTotalCnt, B.EqsType, B.EqsStartDatm, B.EqsEndDatm, B.OrderNum,
            DATE_FORMAT(B.EqsStartDatm, '%Y.%m.%d') AS EqsStartDay, DATE_FORMAT(B.EqsEndDatm, '%Y.%m.%d') AS EqsEndDay
        ";

        $from = "
            FROM {$this->_table['event_quiz']} AS A
            INNER JOIN {$this->_table['event_quiz_set']} AS B ON A.EqIdx = B.EqIdx AND B.IsStatus = 'Y' AND B.IsUse = 'Y' 
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['B.OrderNum' => 'asc', 'B.EqsIdx' => 'asc'])->getMakeOrderBy();

        $query = $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit);
        return $query->result_array();
    }

    /**
     * 회원 참여 현황
     * @param integer $eq_idx
     * @param integer $event_code
     * @return mixed
     */
    public function findQuizMemberAnswer($eq_idx = null, $event_code = null)
    {
        $arr_condition = [
            'EQ' => [
                'EqIdx' => $eq_idx,
                'EventCode' => $event_code,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'IsStatus' => 'Y'
            ]
        ];
        $column = "EqsIdx";
        $from = "
            FROM {$this->_table['event_quiz_member_answer']}
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['EqsIdx' => 'desc'])->getMakeOrderBy();

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return $query->row_array();
    }


}
