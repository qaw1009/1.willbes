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
        'event_quiz_member_answer_detail' => 'lms_event_quiz_member_answer_detail',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원의 퀴즈 참여 조건
     * 금일 기준 (회차수 - 회원참여회차수)
     * @param $quiz_id
     * @return mixed
     */
    public function memberQuizTodayType($quiz_id)
    {
        $arr_condition = [
            'EQ' => [
                'a.EqIdx' => $quiz_id
                ,'a.IsUse' => 'Y'
                ,'a.IsStatus' => 'Y'
            ]
            ,'LTE' => [
                'a.EqsStartDatm' => date('Y-m-d')
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $column = "IF(m.quiz_count > m.member_count, 'Y', 'N') AS TotayType";
        $from = "
            FROM (
                SELECT
                    (SELECT COUNT(*) AS today_count FROM {$this->_table['event_quiz_set']} as a {$where}) AS quiz_count
                    ,(
                        SELECT COUNT(*) AS member_count
                        FROM {$this->_table['event_quiz_set']} AS a
                        INNER JOIN {$this->_table['event_quiz_member_answer']} AS b ON a.EqIdx = b.EqIdx AND a.EqsIdx = b.EqsIdx AND b.MemIdx = '{$this->session->userdata('mem_idx')}' AND b.IsFinish = 'Y'
                        {$where}
                    ) AS member_count
            ) AS m
        ";

        return $this->_conn->query('select '.$column . $from)->row_array();
    }
    public function listQuiz($quiz_id)
    {
        $arr_condition = [
            'EQ' => [
                'q.EqIdx' => $quiz_id
                ,'q.IsUse' => 'Y'
                ,'q.IsStatus' => 'Y'
                ,'qs.IsUse' => 'Y'
                ,'qs.IsStatus' => 'Y'
            ]
            ,'LTE' => [
                'q.StartDatm' => date('Y-m-d')
            ]
            ,'GTE' => [
                'q.EndDatm' => date('Y-m-d')
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['m.OrderNum' => 'asc'])->getMakeOrderBy();

        $column = "
            m.EqsIdx, m.EqsGroupTitle, m.EqsqTotalCnt, m.EqsType, m.OrderNum, m.EqsStartDate, m.EqsEndDate
            ,m.MemQmIdx, m.MemEqIdx, m.MemEqsIdx
            ,IF(m.MemQmIdx IS NULL,'N','Y') AS IsQuizMember
            ,IF(DATE_FORMAT(EqsStartDate, '%Y-%m-%d') <= CURDATE(),'Y','N') AS ShowType
            ,IF(m.MemQmIdx IS NOT NULL,'9999',(@rownum:=@rownum+1)) AS RowNum
        ";

        $from = "
            FROM (
                SELECT qs.EqsIdx, qs.EqsGroupTitle, qs.EqsqTotalCnt, qs.EqsType, qs.OrderNum
                    ,DATE_FORMAT(qs.EqsStartDatm,'%Y-%m-%d') AS EqsStartDate
                    ,DATE_FORMAT(qs.EqsEndDatm,'%Y-%m-%d') AS EqsEndDate
                    ,qm.QmIdx AS MemQmIdx, qm.EqIdx AS MemEqIdx, qm.EqsIdx AS MemEqsIdx
                FROM {$this->_table['event_quiz']} AS q
                INNER JOIN {$this->_table['event_quiz_set']} AS qs ON q.EqIdx = qs.EqIdx
                LEFT JOIN {$this->_table['event_quiz_member_answer']} AS qm ON qs.EqIdx = qm.EqIdx AND qs.EqsIdx = qm.EqsIdx AND qm.MemIdx = '{$this->session->userdata('mem_idx')}' AND qm.IsFinish = 'Y'
                {$where}
            ) AS m
            ,(SELECT @rownum := 0) AS tmp
        ";

        return $this->_conn->query('select '.$column . $from . $order_by)->result_array();
    }

    /**
     * 질문 데이터 조회
     * @param false $is_count
     * @param array $params
     * @return mixed
     */
    public function findQuizQuestion($is_count = false, $params = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "a.EqIdx, a.Title, b.EqsIdx, b.EqsGroupTitle, DATE_FORMAT(b.EqsStartDatm,'%Y-%m-%d') AS EqsStartDate
            ,c.EqsqIdx, c.EqsqTitle, c.EqsqExplanation, c.RightAnswer,qm.IsFinish, qm.QmIdx, qmd.QmdIdx, qmd.EqsqdIdx, qmd.Answer
            ,IF(LOCATE(qmd.Answer , c.RightAnswer), 'Y', 'N') AS IsWrong";
            $order_by_offset_limit = $this->_conn->makeOrderBy(['c.EqsqIdx' => 'ASC'])->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset(1, element('page_num', $params, 0))->getMakeLimitOffset();
        }

        $arr_condition = [
            'EQ' => [
                'a.EqIdx' => element('quiz_id', $params)
                ,'b.EqsIdx' => element('quiz_set_id', $params)
                ,'a.IsStatus' => 'Y'
                ,'a.IsUse' => 'Y'
                ,'b.IsStatus' => 'Y'
                ,'b.IsUse' => 'Y'
                ,'c.IsStatus' => 'Y'
            ]
            ,'LTE' => [
                'b.EqsStartDatm' => date('Y-m-d')
            ]
            ,'GTE' => [
                'b.EqsEndDatm' => date('Y-m-d')
            ]
        ];

        $from = "
            FROM {$this->_table['event_quiz']} AS a
            INNER JOIN {$this->_table['event_quiz_set']} AS b ON a.EqIdx = b.EqIdx
            INNER JOIN {$this->_table['event_quiz_set_question']} AS c ON b.EqsIdx = c.EqsIdx
            LEFT JOIN {$this->_table['event_quiz_member_answer']} AS qm ON a.EqIdx = qm.EqIdx AND b.EqsIdx = qm.EqsIdx AND qm.MemIdx = '{$this->session->userdata('mem_idx')}'
            LEFT JOIN {$this->_table['event_quiz_member_answer_detail']} AS qmd ON qm.QmIdx = qmd.QmIdx AND c.EqsqIdx = qmd.EqsqIdx AND qm.MemIdx = '{$this->session->userdata('mem_idx')}'
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->row_array();
    }

    /**
     * 질문의 보기 데이터 조회
     * @param array $params
     * @param string $question_detail_idx
     * @return mixed
     */
    public function findQuizQuestionDetail($params = [], $question_detail_idx = '')
    {
        $column = "a.EqIdx, b.EqsIdx, c.EqsqIdx, d.EqsqdIdx, d.EqsqdQuestion";
        $order_by_offset_limit = $this->_conn->makeOrderBy(['d.EqsqdIdx' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'a.EqIdx' => element('quiz_id', $params)
                ,'b.EqsIdx' => element('quiz_set_id', $params)
                ,'d.EqsqIdx' => $question_detail_idx
                ,'a.IsStatus' => 'Y'
                ,'a.IsUse' => 'Y'
                ,'b.IsStatus' => 'Y'
                ,'b.IsUse' => 'Y'
                ,'c.IsStatus' => 'Y'
                ,'d.IsStatus' => 'Y'
            ]
        ];

        $from = "
            FROM {$this->_table['event_quiz']} AS a
            INNER JOIN {$this->_table['event_quiz_set']} AS b ON a.EqIdx = b.EqIdx
            INNER JOIN {$this->_table['event_quiz_set_question']} AS c ON b.EqsIdx = c.EqsIdx
            INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS d ON c.EqsqIdx = d.EqsqIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    public function findMemberAnswer($column = '*', $arr_condition = [])
    {
        $from = " FROM {$this->_table['event_quiz_member_answer']}";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 퀴즈풀이
     * @param array $form_data
     * @return array|bool
     */
    public function addQuizForMemberAnswer($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $column = 'QmIdx';
            $arr_condition = [
                'EQ' => [
                    'EqIdx' => element('quiz_id', $form_data)
                    ,'EqsIdx' => element('quiz_set_id', $form_data)
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];
            $member_data = $this->findMemberAnswer($column, $arr_condition);

            if (empty($member_data) === true) {
                //ins
                $answer_data = [
                    'EqIdx' => element('quiz_id', $form_data)
                    ,'EqsIdx' => element('quiz_set_id', $form_data)
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                    ,'IsFinish' => 'N'
                    ,'RegIp' => $this->input->ip_address()
                ];
                if ($this->_conn->set($answer_data)->insert($this->_table['event_quiz_member_answer']) === false) {
                    throw new \Exception('등록에 실패했습니다.');
                }
                $qm_idx = $this->_conn->insert_id();
            } else {
                $qm_idx = $member_data['QmIdx'];
            }

            $answer_detail_data = [
                'QmIdx' => $qm_idx
                ,'MemIdx' => $this->session->userdata('mem_idx')
                ,'EqsqIdx' => element('question_id', $form_data)
                ,'EqsqdIdx' => element('answer_id', $form_data)
                ,'Answer' => element('answer_num', $form_data)
                ,'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($answer_detail_data)->insert($this->_table['event_quiz_member_answer_detail']) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 퀴즈 완료
     * @param array $form_data
     * @return array|bool
     */
    public function updateQuizForMemberAnswer($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $column = 'QmIdx';
            $arr_condition = [
                'EQ' => [
                    'QmIdx' => element('qm_idx', $form_data)
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];
            $member_data = $this->findMemberAnswer($column, $arr_condition);

            if (empty($member_data) === true) {
                throw new \Exception('조회된 회원 퀴즈 정보가 없습니다. 관리자에게 문의해주세요.');
            }

            $data = [
                'IsFinish' => 'Y'
            ];

            if ($this->_conn->set($data)->where('QmIdx', element('qm_idx', $form_data))->update($this->_table['event_quiz_member_answer']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
