<?php
/**
 * ======================================================================
 * 퀴즈관리 > 퀴즈등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class EventQuizModel extends WB_Model
{
    private $_table = [
        'event_quiz' => 'lms_event_quiz',
        'event_quiz_set' => 'lms_event_quiz_set',
        'event_quiz_set_question' => 'lms_event_quiz_set_question',
        'event_quiz_set_question_detail' => 'lms_event_quiz_set_question_detail',
        'event_quiz_member_answer' => 'lms_event_quiz_member_answer',
        'event_quiz_member_answer_detail' => 'lms_event_quiz_member_answer_detail',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
        'member' => 'lms_member',
    ];

    public $_sel_type = [
        'S' => '선택형',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }
    
    /**
     * 퀴즈 목록 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllEventQuiz($is_count = true, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                A.EqIdx, A.SiteCode, A.Title, A.StartDatm, A.EndDatm, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
                DATE_FORMAT(A.StartDatm, '%Y-%m-%d') AS StartDay, DATE_FORMAT(A.EndDatm, '%Y-%m-%d') AS EndDay, 
                S.SiteName,
                A1.wAdminName AS RegAdminName, 
                A2.wAdminName AS UpdAdminName
                ,(
                    SELECT COUNT(*) AS cnt
                    FROM {$this->_table['event_quiz_member_answer']} AS qm
                    WHERE qm.EqIdx = A.EqIdx
                ) AS CNT
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_quiz']} AS A
            INNER JOIN {$this->_table['site']} AS S ON A.SiteCode = S.SiteCode
            INNER JOIN {$this->_table['admin']} AS A1 ON A.RegAdminIdx = A1.wAdminIdx AND A1.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} AS A2 ON A.UpdAdminIdx = A2.wAdminIdx AND A2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findEventQuizForModify($arr_condition)
    {
        $column = "
            A.EqIdx, A.SiteCode, A.Title, A.StartDatm, A.EndDatm, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            DATE_FORMAT(A.StartDatm, '%Y-%m-%d') AS StartDay, DATE_FORMAT(A.EndDatm, '%Y-%m-%d') AS EndDay, 
            B.SiteName,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
        ";

        $from = "
            FROM {$this->_table['event_quiz']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 퀴즈 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findEventQuiz($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['event_quiz'], $column, $arr_condition);
    }

    /**
     * 퀴즈 문제 조회
     * @param integer $eq_idx
     * @return mixed
     */
    public function listAllEventQuizSet($eq_idx = null)
    {
        $column = "
            A.EqsIdx, A.EqIdx, A.EqsGroupTitle, A.EqsqTotalCnt, A.EqsType, A.EqsStartDatm, A.EqsEndDatm, A.OrderNum, A.IsUse, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            (SELECT COUNT(*) 
                FROM {$this->_table['event_quiz_member_answer']} 
                WHERE EqsIdx IN (
                SELECT EqsIdx FROM {$this->_table['event_quiz_set']} WHERE EqIdx = A.EqIdx AND IsStatus = 'Y'
            ) AND IsStatus = 'Y') AS MemAnswerCnt
        ";
        $from = " FROM {$this->_table['event_quiz_set']} AS A";
        $where = ' where A.EqIdx = ? and A.IsStatus = "Y" ';
        $order_by_offset_limit = ' order by A.OrderNum asc, A.EqsIdx asc';
        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit, [$eq_idx])->result_array();
    }

    /**
     * 퀴즈회차 정보 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findQuizSet($arr_condition = [])
    {
        $column = '
            s.EqsIdx, s.EqIdx, s.EqsGroupTitle, s.EqsqTotalCnt, s.EqsType, s.OrderNum, s.IsUse, s.EqsStartDatm, s.EqsEndDatm
            ,DATE_FORMAT(s.EqsStartDatm, \'%Y-%m-%d\') AS EqsStartDay, DATE_FORMAT(s.EqsStartDatm, \'%H\') AS EqsStartHour, DATE_FORMAT(s.EqsStartDatm, \'%i\') AS EqsStartMin
            ,DATE_FORMAT(s.EqsEndDatm, \'%Y-%m-%d\') AS EqsEndDay, DATE_FORMAT(s.EqsEndDatm, \'%H\') AS EqsEndHour, DATE_FORMAT(s.EqsEndDatm, \'%i\') AS EqsEndMin
            ,s.RegDatm, s.UpdDatm, a1.wAdminName AS RegAdminName, a2.wAdminName AS UpdAdminName
        ';
        $from = "
            FROM {$this->_table['event_quiz_set']} AS s
            INNER JOIN {$this->_table['admin']} AS a1 ON s.RegAdminIdx = a1.wAdminIdx AND a1.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} AS a2 ON s.UpdAdminIdx = a2.wAdminIdx AND a2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 퀴즈회차 항목 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findQuizQuestion($arr_condition)
    {
        $column = 'sq.EqsqIdx, sq.EqsIdx, sq.EqsqTitle, sq.EqsqContent, sq.EqsqExplanation, sq.EqsqdTotalcnt, sq.RightAnswer';
        $from = "
            FROM {$this->_table['event_quiz_set']} AS s
            INNER JOIN {$this->_table['event_quiz_set_question']} AS sq ON s.EqsIdx = sq.EqsIdx AND sq.IsStatus = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = ' order by sq.EqsqIdx asc';
        return $this->_conn->query('select '.$column .$from .$where)->result_array();
    }

    /**
     * 질문갯수 MAX 값 조회
     * @return mixed
     */
    public function findMaxQuestionCnt()
    {
        $query_string = /** @lang text */ "SELECT IFNULL(MAX(EqsqTotalCnt),0) AS cnt FROM {$this->_table['event_quiz_set']} WHERE IsStatus = 'Y'";
        return $this->_conn->query($query_string)->row_array();
    }

    /**
     * 퀴즈회차 항목의 보기 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findQuizDetail($arr_condition)
    {
        $column = 'EqsqdIdx, EqsqIdx, EqsqdQuestion, DetailRowNum, RightAnswer, IF(LOCATE(DetailRowNum , RightAnswer), \'Y\', \'N\') AS IsWrong';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM(
                SELECT a.*
                , (CASE @g WHEN a.q_group THEN @rownum := @rownum + 1 ELSE @rownum := 1 END) DetailRowNum
                , (@g := a.q_group) g
                    FROM (
                        SELECT sqd.EqsqdIdx, sq.EqsqIdx, sqd.EqsqdQuestion, sq.RightAnswer, sq.EqsqIdx AS q_group
                        FROM {$this->_table['event_quiz_set_question']} AS sq
                        INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS sqd ON sq.EqsqIdx = sqd.EqsqIdx AND sqd.IsStatus = 'Y'
                        {$where}
                    ) a                    
                , (SELECT @g :='',@rownum := 0 FROM DUAL) b
                ORDER BY EqsqIdx, EqsqdIdx ASC
            ) AS m
        ";
        return $this->_conn->query('select '. $column . $from)->result_array();
    }

    /**
     * 정렬순서 셋팅 (MAX + 1)
     * @param array $arr_condition
     * @return mixed
     */
    public function setOrderNum($arr_condition = [])
    {
        $column = "IFNULL(MAX(OrderNum) + 1,1) AS order_num";
        $from = "
            FROM {$this->_table['event_quiz_set']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 퀴즈 답변 회원 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findMemberAnswer($column = '*', $arr_condition = [])
    {
        $from = "
            FROM {$this->_table['event_quiz_set']} AS A
            INNER JOIN {$this->_table['event_quiz_member_answer']} AS B ON A.EqsIdx = B.EqsIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    public function listQuizAnswerMember($is_count = true, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if (empty($column) === true) {
                $column = "
                    m.MemName, m.MemId, qm.RegDatm, b.EqsGroupTitle, a.EqIdx, b.EqsIdx, qm.QmIdx
                    ,(
                        SELECT
                        CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                            'EqsqIdx', c.EqsqIdx
                            ,'EqsqdQuestion', CONCAT(d.EqsqdQuestion,' (',IF(LOCATE(b.Answer , c.RightAnswer), 'Y', 'N'),')')
                        )), ']')
                        FROM {$this->_table['event_quiz_member_answer']} AS a
                        INNER JOIN {$this->_table['event_quiz_member_answer_detail']} AS b ON a.QmIdx = b.QmIdx
                        INNER JOIN {$this->_table['event_quiz_set_question']} AS c ON b.EqsqIdx = c.EqsqIdx AND c.IsStatus = 'Y'
                        INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS d ON c.EqsqIdx = d.EqsqIdx AND b.EqsqdIdx = d.EqsqdIdx AND d.IsStatus = 'Y'
                        WHERE a.QmIdx = qm.QmIdx
                        GROUP BY a.QmIdx
                    ) AS info_detail
                ";
            }
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            if ($is_count != 'excel') {
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }
        }

        $from = "
            FROM {$this->_table['event_quiz']} AS a
            INNER JOIN {$this->_table['event_quiz_set']} AS b ON a.EqIdx = b.EqIdx AND b.IsStatus = 'Y'
            INNER JOIN {$this->_table['event_quiz_member_answer']} AS qm ON a.EqIdx = qm.EqIdx AND b.EqsIdx = qm.EqsIdx AND qm.IsFinish = 'Y'
            INNER JOIN {$this->_table['member']} AS m ON qm.MemIdx = m.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 퀴즈 등록
     * @param array $input
     * @return array|bool
     */
    public function addEventQuiz($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $data = [
                'SiteCode' => element('site_code', $input),
                'Title' => element('title', $input),
                'StartDatm' => element('start_datm', $input),
                'EndDatm' => element('end_datm', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['event_quiz']) === false) {
                throw new \Exception('퀴즈 등록에 실패했습니다.');
            }

            $eq_idx = $this->_conn->insert_id();

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $eq_idx];
    }

    /**
     * 퀴즈 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyEventQuiz($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $eq_idx = element('eq_idx', $input);

            // 퀴즈 조회
            $row = $this->findEventQuiz('EqIdx, SiteCode', ['EQ' => ['EqIdx' => $eq_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $data = [
                'Title' => element('title', $input),
                'StartDatm' => element('start_datm', $input),
                'EndDatm' => element('end_datm', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->set($data)->where('EqIdx', $eq_idx)->update($this->_table['event_quiz']) === false) {
                throw new \Exception('퀴즈 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $eq_idx];
    }

    /**
     * 퀴즈 정렬순서, 사용유무 (업데이트)
     * @param array $params
     * @return bool
     */
    public function modifyQuizSetUseOrderNum($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $eqs_idx => $val) {
                if(empty($eqs_idx) === true) throw new \Exception('필수 파라미터 오류입니다.');

                $data = [
                    'OrderNum' => $val['eqs_order_num'],
                    'IsUse' => $val['eqs_is_use'],
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];

                if ($this->_conn->set($data)->where('EqsIdx', $eqs_idx)->update($this->_table['event_quiz_set']) === false) {
                    throw new \Exception('수정에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 퀴즈 문제 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addEventQuizSet($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $eq_idx = element('eq_idx', $form_data);
            if(empty($eq_idx) === true) {
                throw new \Exception('퀴즈를 먼저 등록해 주세요.');
            }

            $input_data = [
                'EqIdx' => $eq_idx,
                'EqsGroupTitle' => element('eqs_group_title', $form_data),
                'EqsqTotalCnt' => element('eqs_total_cnt', $form_data),
                'EqsType' => element('eqs_type', $form_data),
                'EqsStartDatm' => element('eqs_start_day', $form_data) . ' ' . element('eqs_start_hour', $form_data) . ':' . element('eqs_start_min', $form_data) . ':00',
                'EqsEndDatm' => element('eqs_end_day', $form_data) . ' ' . element('eqs_end_hour', $form_data) . ':' . element('eqs_end_min', $form_data) .  ':00',
                'OrderNum' => element('order_num', $form_data),
                'IsUse' => element('eqs_is_use', $form_data),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            //퀴즈 문제 등록
            if ($this->_conn->set($input_data)->insert($this->_table['event_quiz_set']) === false) {
                throw new \Exception('퀴즈 등록에 실패했습니다(1).');
            }
            $eqs_idx = $this->_conn->insert_id();

            $eqs_total_cnt = element('eqs_total_cnt', $form_data);
            for($i=0; $i<$eqs_total_cnt; $i++) {
                $input_question_data = [
                    'EqsIdx' => $eqs_idx,
                    'EqsqTitle' => element('question_title_'.$i, $form_data),
                    'EqsqContent' => element('question_content_'.$i, $form_data),
                    'EqsqExplanation' => element('eqsq_explanation_'.$i, $form_data),
                    'EqsqdTotalcnt' => element('question_cnt_'.$i, $form_data),
                    'RightAnswer' => implode(element('question_detail_is_answer_'.$i, $form_data),',')
                ];
                //질문 데이터 등록
                if ($this->_conn->set($input_question_data)->insert($this->_table['event_quiz_set_question']) === false) {
                    throw new \Exception('퀴즈 등록에 실패했습니다(2).');
                }
                $eqsq_idx = $this->_conn->insert_id();

                //보기 데이터 등록
                for($j=0; $j<element('question_cnt_'.$i, $form_data); $j++) {
                    $input_question_detail_data = [
                        'EqsqIdx' => $eqsq_idx,
                        'EqsqdQuestion' => element('question_detail_title_'.$i, $form_data)[$j],
                    ];
                    if ($this->_conn->set($input_question_detail_data)->insert($this->_table['event_quiz_set_question_detail']) === false) {
                        throw new \Exception('퀴즈 등록에 실패했습니다(3).');
                    }
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $eq_idx];
    }

    /**
     * 퀴즈 문제 수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyEventQuizSet($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $eq_idx = element('eq_idx', $form_data);
            $eqs_idx = element('eqs_idx', $form_data);

            $input_data = [
                'EqsGroupTitle' => element('eqs_group_title', $form_data),
                'EqsqTotalCnt' => element('eqs_total_cnt', $form_data),
                'EqsType' => element('eqs_type', $form_data),
                'EqsStartDatm' => element('eqs_start_day', $form_data) . ' ' . element('eqs_start_hour', $form_data) . ':' . element('eqs_start_min', $form_data) . ':00',
                'EqsEndDatm' => element('eqs_end_day', $form_data) . ' ' . element('eqs_end_hour', $form_data) . ':' . element('eqs_end_min', $form_data) .  ':00',
                'OrderNum' => element('order_num', $form_data),
                'IsUse' => element('eqs_is_use', $form_data),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];
            //퀴즈 질문 수정
            if ($this->_conn->set($input_data)->where('EqsIdx', $eqs_idx)->update($this->_table['event_quiz_set']) === false) {
                throw new \Exception('퀴즈 수정에 실패했습니다(1).');
            }

            //question data
            for ($i=0; $i<element('eqs_total_cnt', $form_data); $i++) {
                if (empty(element('sq_idx', $form_data)[$i]) === false) {
                    //question update
                    $update_question_data[] = [
                        'EqsqIdx' => element('sq_idx', $form_data)[$i],
                        'EqsIdx' => $eqs_idx,
                        'EqsqTitle' => element('question_title_'.$i, $form_data),
                        'EqsqContent' => element('question_content_'.$i, $form_data),
                        'EqsqExplanation' => element('eqsq_explanation_'.$i, $form_data),
                        'EqsqdTotalcnt' => element('question_cnt_'.$i, $form_data),
                        'RightAnswer' => implode(element('question_detail_is_answer_'.$i, $form_data),',')
                    ];

                    //detail data
                    for ($j=0; $j<element('question_cnt_'.$i, $form_data); $j++) {
                        if (empty(element('sqd_idx_'.$i, $form_data)[$j]) === false) {
                            //detail update
                            $update_detail_data[] = [
                                'EqsqdIdx' => element('sqd_idx_'.$i, $form_data)[$j],
                                'EqsqdQuestion' => element('question_detail_title_'.$i, $form_data)[$j],
                            ];
                        } else {
                            //detail insert
                            $input_question_detail_data = [
                                'EqsqIdx' => element('sq_idx', $form_data)[$i],
                                'EqsqdQuestion' => element('question_detail_title_'.$i, $form_data)[$j],
                            ];
                            if ($this->_conn->set($input_question_detail_data)->insert($this->_table['event_quiz_set_question_detail']) === false) {
                                throw new \Exception('퀴즈 등록에 실패했습니다(2).');
                            }
                        }
                    }

                } else {
                    //question insert
                    $input_question_data = [
                        'EqsIdx' => $eqs_idx,
                        'EqsqTitle' => element('question_title_'.$i, $form_data),
                        'EqsqContent' => element('question_content_'.$i, $form_data),
                        'EqsqExplanation' => element('eqsq_explanation_'.$i, $form_data),
                        'EqsqdTotalcnt' => element('question_cnt_'.$i, $form_data),
                        'RightAnswer' => implode(element('question_detail_is_answer_'.$i, $form_data),',')
                    ];
                    //질문 데이터 등록
                    if ($this->_conn->set($input_question_data)->insert($this->_table['event_quiz_set_question']) === false) {
                        throw new \Exception('퀴즈 등록에 실패했습니다(3).');
                    }
                    $eqsq_idx = $this->_conn->insert_id();

                    //보기 데이터 등록
                    for($j=0; $j<element('question_cnt_'.$i, $form_data); $j++) {
                        $input_question_detail_data = [
                            'EqsqIdx' => $eqsq_idx,
                            'EqsqdQuestion' => element('question_detail_title_'.$i, $form_data)[$j],
                        ];
                        if ($this->_conn->set($input_question_detail_data)->insert($this->_table['event_quiz_set_question_detail']) === false) {
                            throw new \Exception('퀴즈 등록에 실패했습니다(4).');
                        }
                    }
                }
            }

            if($update_question_data) $this->_conn->update_batch($this->_table['event_quiz_set_question'], $update_question_data, 'EqsqIdx');
            if($update_detail_data) $this->_conn->update_batch($this->_table['event_quiz_set_question_detail'], $update_detail_data, 'EqsqdIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('퀴즈 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $eq_idx];
    }

    /**
     * 개별항목삭제
     * @param array $form_data
     * @return array|bool
     */
    public function deleteQuestion($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $eqs_idx = element('eqs_idx', $form_data);
            $eqsq_idx = element('eqsq_idx', $form_data);

            //quiz_set_question_detail delete
            $query_string = /** @lang text */ "
                UPDATE {$this->_table['event_quiz_set_question_detail']} AS T1,
                (
                    SELECT EqsqIdx
                    FROM {$this->_table['event_quiz_set_question_detail']}
                    WHERE EqsqIdx IN (
                        SELECT EqsqIdx
                        FROM {$this->_table['event_quiz_set_question']}
                        WHERE EqsqIdx = ? AND IsStatus = 'Y'
                    )
                    AND IsStatus = 'Y'
                ) T2
                SET T1.IsStatus = 'N'
                WHERE T1.EqsqIdx = T2.EqsqIdx
            ";
            $result = $this->_conn->query($query_string, [$eqsq_idx]);
            if ($result === false) {
                throw new \Exception('항목삭제에 실패했습니다.(1).');
            }

            if ($this->_conn->set('EqsqTotalCnt', '`EqsqTotalCnt` - 1', false)->where('EqsIdx', $eqs_idx)->update($this->_table['event_quiz_set']) === false) {
                throw new \Exception('항목삭제에 실패했습니다(2).');
            }

            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('EqsqIdx', $eqsq_idx)->update($this->_table['event_quiz_set_question']) === false) {
                throw new \Exception('항목삭제에 실패했습니다(3).');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 개별보기항목삭제
     * @param array $form_data
     * @return array|bool
     */
    public function deleteDetail($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $eqsq_idx = element('eqsq_idx', $form_data);
            $eqsqd_idx = element('eqsqd_idx', $form_data);

            if ($this->_conn->set('EqsqdTotalcnt', '`EqsqdTotalcnt` - 1', false)->where('EqsqIdx', $eqsq_idx)->update($this->_table['event_quiz_set_question']) === false) {
                throw new \Exception('항목삭제에 실패했습니다(1).');
            }

            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('EqsqdIdx', $eqsqd_idx)->update($this->_table['event_quiz_set_question_detail']) === false) {
                throw new \Exception('항목삭제에 실패했습니다(2).');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 퀴즈 문제 삭제 (업데이트)
     * @param integer $eqs_idx
     * @return bool
     */
    public function removeQuizSet($eqs_idx = null)
    {
        $this->_conn->trans_begin();
        try {
            // 퀴즈 조회
            $result = $this->_findEventQuizSet('A.EqsIdx, B.EqsqIdx', ['EQ' => ['A.EqsIdx' => $eqs_idx]]);
            if (empty($result) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 회원 참여 이력 조회
            $result = $this->findMemberAnswer('A.EqIdx, A.EqsIdx, B.EqmaIdx', ['EQ' => ['A.EqsIdx' => $eqs_idx]]);
            if (empty($result) === false) {
                throw new \Exception('회원 참여 이력이 있어 삭제 불가합니다.', _HTTP_NO_PERMISSION);
            }

            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('EqsIdx', $eqs_idx)->update($this->_table['event_quiz_set']) === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 퀴즈 문제 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    private function _findEventQuizSet($column = '*', $arr_condition = [])
    {
        $from = "
            FROM {$this->_table['event_quiz_set']} AS A
            INNER JOIN {$this->_table['event_quiz_set_question']} AS B ON A.EqsIdx = B.EqsIdx
            INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS C ON B.EqsqIdx = C.EqsqIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }
}
