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
                (SELECT COUNT(*) 
                    FROM {$this->_table['event_quiz_member_answer']} 
                    WHERE EqsIdx IN (
                        SELECT EqsIdx FROM {$this->_table['event_quiz_set']} WHERE EqIdx = A.EqIdx AND IsStatus = 'Y'
                    ) AND IsStatus = 'Y') AS CNT,
                A.EqIdx, A.SiteCode, A.Title, A.StartDatm, A.EndDatm, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
                DATE_FORMAT(A.StartDatm, '%Y-%m-%d') AS StartDay, DATE_FORMAT(A.EndDatm, '%Y-%m-%d') AS EndDay, 
                S.SiteName,
                A1.wAdminName AS RegAdminName, 
                A2.wAdminName AS UpdAdminName
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

        $query_string = 'select A.*';
        $query_string .= ' from ( ';
        $query_string .= " select {$column} {$from} {$where} {$order_by_offset_limit}";
        $query_string .= ' ) as A';

        // 쿼리 실행
        $query = $this->_conn->query($query_string);
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

        $from = "
            FROM {$this->_table['event_quiz_set']} AS A
        ";

        $where = ' where A.EqIdx = ? and A.IsStatus = "Y" ';
        $order_by_offset_limit = ' order by A.OrderNum asc, A.EqsIdx asc';

        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit, [$eq_idx])->result_array();
    }

    /**
     * 퀴즈 문제 상세 조회
     * @param integer $eqs_idx
     * @return mixed
     */
    public function findEventQuizSetForModify($eqs_idx = null)
    {
        $column = "
            A.EqsIdx, A.EqIdx, A.EqsGroupTitle, A.EqsqTotalCnt, A.EqsType, A.EqsStartDatm, A.EqsEndDatm, A.OrderNum, A.IsUse, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            DATE_FORMAT(A.EqsStartDatm, '%Y-%m-%d') AS EqsStartDay, DATE_FORMAT(A.EqsStartDatm, '%H') AS EqsStartHour, DATE_FORMAT(A.EqsStartDatm, '%i') AS EqsStartMin,
            DATE_FORMAT(A.EqsEndDatm, '%Y-%m-%d') AS EqsEndDay, DATE_FORMAT(A.EqsEndDatm, '%H') AS EqsEndHour, DATE_FORMAT(A.EqsEndDatm, '%i') AS EqsEndMin,
            B.EqsqIdx, B.EqsqTitle, B.EqsqExplanation, B.EqsqNum, B.EqsqdTotalcnt,
            C.EqsqdIdx, C.EqsqdQuestion, C.IsAnswer,
            D.wAdminName AS RegAdminName, E.wAdminName AS UpdAdminName
        ";

        $from = "
            FROM {$this->_table['event_quiz_set']} AS A
            INNER JOIN {$this->_table['event_quiz_set_question']} AS B ON A.EqsIdx = B.EqsIdx
            INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS C ON B.EqsqIdx = C.EqsqIdx
            INNER JOIN {$this->_table['admin']} AS D ON A.RegAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS E ON A.UpdAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
        ";

        $where = ' where A.EqsIdx = ? and A.IsStatus = "Y" AND B.IsStatus = "Y" ';
        $order_by_offset_limit = ' order by B.EqsqIdx asc, C.EqsqdIdx asc';

        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit, [$eqs_idx])->result_array();
    }

    /**
     * 퀴즈 문제 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findEventQuizSet($column = '*', $arr_condition = [])
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

    /**
     * 퀴즈 답변 팝업 데이타 조회
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberPopupAnswer($is_count = true, $arr_condition = [], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if (empty($column) === true) {
                $column = "
                    A.EqsIdx, A.EqIdx, A.EqsGroupTitle, A.EqsqTotalCnt, A.EqsType, A.EqsStartDatm, A.EqsEndDatm, A.OrderNum,
                    B.EqsqIdx, B.EqsqTitle, B.EqsqExplanation, B.EqsqNum, 
                    GROUP_CONCAT(CONCAT('질문',B.EqsqNum,':',C.EqsqdQuestion,'(',C.IsAnswer,')')) AS MemAnswer,
                    D.MemIdx, D.Answer, D.RegDatm AS AnswerDatm,
                    M.MemId, M.MemName
                ";
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
                FROM {$this->_table['event_quiz_set']} AS A
                INNER JOIN {$this->_table['event_quiz_set_question']} AS B ON A.EqsIdx = B.EqsIdx AND B.IsStatus = 'Y'
                INNER JOIN {$this->_table['event_quiz_set_question_detail']} AS C ON B.EqsqIdx = C.EqsqIdx
                INNER JOIN {$this->_table['event_quiz_member_answer']} AS D ON A.EqsIdx = D.EqsIdx AND C.EqsqdIdx = D.EqsqdIdx AND D.IsStatus = 'Y'
                LEFT JOIN {$this->_table['member']} AS M ON D.MemIdx = M.MemIdx 
            ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $group_by = ' GROUP BY D.MemIdx ';

        $query_string = ($is_count === true) ? "select COUNT(numrows) as numrows" : "select A.*";
        $query_string .= " from ( ";
        $query_string .= " select {$column} {$from} {$where} {$group_by} {$order_by_offset_limit}";
        $query_string .= " ) as A";

        $query = $this->_conn->query($query_string);
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
     * @param $input
     * @return array|bool
     */
    public function addEventQuizSet($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $eq_idx = element('eq_idx', $input);
            
            if(empty($eq_idx) === true){
                throw new \Exception('퀴즈를 먼저 등록해 주세요.');
            }

            $eqs_total_cnt = element('eqs_total_cnt', $input); // 퀴즈 문제 갯수
            $arr_item_cnt = element('eqsq_question_cnt', $input); // 퀴즈 문제별 문항 갯수
            $arr_answer = element('eqsq_is_answer', $input);
            $arr_question_title = element('eqsq_question_title', $input);
            $arr_question = element('eqsq_question', $input);
            $arr_explanation = element('eqsq_explanation', $input);

            $eqs_start_datm = element('eqs_start_day', $input) . ' ' . element('eqs_start_hour', $input) . ':' . element('eqs_start_min', $input) . ':00';
            $eqs_end_datm = element('eqs_end_day', $input) . ' ' . element('eqs_end_hour', $input) . ':' . element('eqs_end_min', $input) .  ':00';

            $data = [
                'EqIdx' => $eq_idx,
                'EqsGroupTitle' => element('eqs_group_title', $input),
                'EqsqTotalCnt' => $eqs_total_cnt,
                'EqsType' => element('eqs_type', $input),
                'EqsStartDatm' => $eqs_start_datm,
                'EqsEndDatm' => $eqs_end_datm,
                'OrderNum' => element('order_num', $input),
                'IsUse' => element('eqs_is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            //퀴즈 문제 등록
            if ($this->_conn->set($data)->insert($this->_table['event_quiz_set']) === false) {
                throw new \Exception('퀴즈 등록에 실패했습니다(1).');
            }

            $eqs_idx = $this->_conn->insert_id();

            for($i=1; $i<=$eqs_total_cnt; $i++){
                if(empty($arr_answer[$i]) === true){
                    throw new \Exception('퀴즈 정답을 확인 하세요.');
                }

                // 퀴즈 질문
                $data_set = [
                    'EqsIdx' => $eqs_idx,
                    'EqsqTitle' => $arr_question_title[$i],
                    'EqsqExplanation' => $arr_explanation[$i],
                    'EqsqNum' => $i,
                    'EqsqdTotalcnt' =>$arr_item_cnt[$i]
                ];
                if ($this->_conn->set($data_set)->insert($this->_table['event_quiz_set_question']) === false) {
                    throw new \Exception('퀴즈 등록에 실패했습니다(2).');
                }

                $data_set_detail['EqsqIdx'] = $this->_conn->insert_id();
                for ($j=1; $j<=$arr_item_cnt[$i]; $j++){
                    $data_set_detail['EqsqdQuestion'] = $arr_question[$i][$j];
                    $data_set_detail['IsAnswer'] = (empty($arr_answer[$i][$j]) === false) ? 'Y' : 'N';
                    $data_set_detail['EqsqdNum'] = $j;

                    // 퀴즈 선택 문항
                    if ($this->_conn->set($data_set_detail)->insert($this->_table['event_quiz_set_question_detail']) === false) {
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
     * @param $input
     * @return array|bool
     */
    public function modifyEventQuizSet($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $eq_idx = element('eq_idx', $input);
            $eqs_idx = element('eqs_idx', $input);

            // 퀴즈 조회
            $row = $this->findEventQuizSet('A.EqsIdx, B.EqsqIdx, C.EqsqdIdx', ['EQ' => ['A.EqsIdx' => $eqs_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            
            $eqs_total_cnt = element('eqs_total_cnt', $input); // 업데이트 퀴즈 문제 갯수
            $arr_item_cnt = element('eqsq_question_cnt', $input); // 퀴즈 문제별 문항 갯수
            $arr_answer = element('eqsq_is_answer', $input);
            $arr_question_title = element('eqsq_question_title', $input);
            $arr_question = element('eqsq_question', $input);
            $arr_explanation = element('eqsq_explanation', $input);

            $eqs_start_datm = element('eqs_start_day', $input) . ' ' . element('eqs_start_hour', $input) . ':' . element('eqs_start_min', $input) . ':00';
            $eqs_end_datm = element('eqs_end_day', $input) . ' ' . element('eqs_end_hour', $input) . ':' . element('eqs_end_min', $input) .  ':00';

            $data = [
                'EqsGroupTitle' => element('eqs_group_title', $input),
                'EqsqTotalCnt' => $eqs_total_cnt,
                'EqsType' => element('eqs_type', $input),
                'EqsStartDatm' => $eqs_start_datm,
                'EqsEndDatm' => $eqs_end_datm,
                'OrderNum' => element('order_num', $input),
                'IsUse' => element('eqs_is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //퀴즈 질문 수정
            if ($this->_conn->set($data)->where('EqsIdx', $eqs_idx)->update($this->_table['event_quiz_set']) === false) {
                throw new \Exception('퀴즈 수정에 실패했습니다(1).');
            }

            // 퀴즈 질문 답안 조회
            $eqsq_total_cnt = $this->findEventQuizSetQuestionByEqsIdx($eqs_idx);

            $eqsq_idx = $row['EqsqIdx'];
            for($i=1; $i<=$eqs_total_cnt; $i++){
                if(empty($arr_answer[$i]) === true){
                    throw new \Exception('퀴즈 정답을 확인 하세요.');
                }

                // 퀴즈 질문
                $data_set = [
                    'EqsqTitle' => $arr_question_title[$i],
                    'EqsqExplanation' => $arr_explanation[$i],
                    'EqsqdTotalcnt' => $arr_item_cnt[$i]
                ];

                if($i > 1){
                    $eqsq_idx++;
                }

                // 기존 데이타 비교후 실행
                if($i <= $eqsq_total_cnt){
                    // 업데이트
                    if ($this->_conn->set($data_set)->where('EqsIdx', $row['EqsIdx'])->where('EqsqNum', $i)->update($this->_table['event_quiz_set_question']) === false) {
                        throw new \Exception('퀴즈 수정에 실패했습니다(2-1).');
                    }
                }else{
                    $data_set['EqsIdx'] = $row['EqsIdx'];
                    $data_set['EqsqNum'] = $i;

                    // 추가
                    if ($this->_conn->set($data_set)->insert($this->_table['event_quiz_set_question']) === false) {
                        throw new \Exception('퀴즈 수정에 실패했습니다(2-2).');
                    }

                    $eqsq_idx = $this->_conn->insert_id();
                }

                // 퀴즈 질문 답안 조회
                $eqsqd_total_cnt = $this->findEventQuizSetQuestionDetailByEqsqIdx($eqsq_idx);

                // 퀴즈 답안
                for ($j=1; $j<=$arr_item_cnt[$i]; $j++){
                    $data_set_detail = [
                        'EqsqdQuestion' => $arr_question[$i][$j],
                        'IsAnswer' => (empty($arr_answer[$i][$j]) === false) ? 'Y' : 'N',
                    ];

                    // 기존 데이타 비교후 실행
                    if($j <= $eqsqd_total_cnt){
                        // 업데이트
                        if ($this->_conn->set($data_set_detail)->where('EqsqIdx', $eqsq_idx)->where('EqsqdNum', $j)->update($this->_table['event_quiz_set_question_detail']) === false) {
                            throw new \Exception('퀴즈 수정에 실패했습니다(3-1).');
                        }
                    }else{
                        $data_set_detail['EqsqIdx'] = $eqsq_idx;
                        $data_set_detail['EqsqdNum'] = $j;

                        // 추가
                        if ($this->_conn->set($data_set_detail)->insert($this->_table['event_quiz_set_question_detail']) === false) {
                            throw new \Exception('퀴즈 수정에 실패했습니다(3-2).');
                        }
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


    public function findEventQuizSetQuestionByEqsIdx($eqs_idx = null)
    {

        $column = 'count(*) AS numrows';

        $from = "
            FROM {$this->_table['event_quiz_set_question']} AS A
        ";

        $arr_condition = ['EQ' => ['EqsIdx' => $eqs_idx]];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query("select {$column} {$from} {$where}")->row(0)->numrows;
    }

    public function findEventQuizSetQuestionDetailByEqsqIdx($eqsq_idx = null)
    {

        $column = 'count(*) AS numrows';

        $from = "
            FROM {$this->_table['event_quiz_set_question_detail']} AS A
        ";

        $arr_condition = ['EQ' => ['EqsqIdx' => $eqsq_idx]];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query("select {$column} {$from} {$where}")->row(0)->numrows;
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
            $row = $this->findEventQuizSet('A.EqsIdx, B.EqsqIdx', ['EQ' => ['A.EqsIdx' => $eqs_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 회원 참여 이력 조회
            $row = $this->findMemberAnswer('A.EqIdx, A.EqsIdx, B.EqmaIdx', ['EQ' => ['A.EqsIdx' => $eqs_idx]]);
            if (count($row) > 0) {
                throw new \Exception('회원 참여 이력이 있어 삭제 불가합니다.', _HTTP_NO_PERMISSION);
            }

            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('EqsIdx', $row['EqsIdx'])->update($this->_table['event_quiz_set']) === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

}
