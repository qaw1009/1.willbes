<?php
/**
 * ======================================================================
 * 설문조사관리 > 설문등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyModel extends WB_Model
{
    private $_table = [
        'event_survey' => 'lms_event_survey',
        'event_survey_question' => 'lms_event_survey_question',
        'event_answer_info' => 'lms_event_survey_answer_info',
        'admin' => 'wbs_sys_admin',
        'member' => 'lms_member',
    ];

    private $_use_type = [
        'Y' => '사용',
        'N' => '미사용'
    ];

    public $_selection_type = [
        'S' => '선택형(단일)',
        'M' => '선택형(그룹)',
        'T' => '복수형',
        'D' => '서술형',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 설문리스트
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return mixed
     */
    public function eventSurveyList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = "count(*) AS numrows";
            $order_by_offset_limit = '';
        } else {
            $column = "
            A.SpIdx, A.SpTitle, A.SpComment, A.SpIsUse, A.SpIsDuplicate, A.StartDate, A.EndDate, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            (SELECT COUNT(*) FROM {$this->_table['event_answer_info']} WHERE SpIdx = A.SpIdx) AS CNT
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_survey']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 설문조사 수정 폼 데이터 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyForModify($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx]];
        $order_by = ['B.RegDatm'=>'DESC'];

        $column = "
            A.SpIdx, A.SpTitle, A.SpComment, A.SpIsUse, A.SpIsDuplicate, A.StartDate, A.EndDate, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            B.SqIdx AS seriesIdx , B.SqJsonData AS seriesData,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['event_survey']} AS A
            LEFT OUTER JOIN {$this->_table['event_survey_question']} AS B ON A.SpIdx = B.SpIdx AND B.IsSeries='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->row_array();
    }

    /**
     * 설문조사 문항 수정 폼 데이터 조회
     * @param integer $sq_idx
     * @return mixed
     */
    public function findQuestionForModify($sq_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SqIdx' => $sq_idx, 'A.IsStatus' => 'Y']];

        $column = "
            A.SqIdx, A.SpIdx, A.IsSeries, A.SqSeries, A.SqTitle, A.SqComment, A.OrderNum, A.SqIsUse, A.SqIsUse, A.SqType, A.SqCnt, A.SqSubjectCnt, A.SqJsonData, A.RegDatm, A.UpdDatm,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['event_survey_question']} AS A
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 설문조사 문항 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function listSurveyForQuestion($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx, 'A.IsStatus' => 'Y']];
        $order_by = ['A.OrderNum'=>'ASC','A.SqIdx'=>'ASC'];

        $column = "
            A.SpIdx, A.SqIdx, A.SqSeries, A.SqTitle, A.SqComment, A.OrderNum, A.SqIsUse, A.SqType, A.SqCnt, A.SqJsonData, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx AS SqUpdAdminIdx,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['event_survey_question']} AS A
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $data = $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->result_array();

        return $this->_getDecodeData($data);
    }

    /**
     * 설문조사 결과 조회 그래프
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyAnswerInfo($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['SpIdx' => $sp_idx]];
        $column = "AnswerInfo";
        $from = "
            FROM {$this->_table['event_answer_info']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['SaIdx' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 설문조사 결과 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyForAnswerInfo($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx]];
        $column = "A.AnswerInfo, A.RegDatm, B.MemName, B.MemId";
        $from = "
            FROM {$this->_table['event_answer_info']} AS A
            LEFT JOIN {$this->_table['member']} AS B ON A.MemIdx = B.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.SaIdx' => 'ASC'])->getMakeOrderBy();
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
        return $this->_getDecodeData($data,'AnswerInfo');
    }

    /**
     * 설문조사 등록
     * @param $input
     * @return mixed
     */
    public function addEventSurvey($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $data = [
                'SpTitle' => element('sp_title', $input),
                'SpComment' => element('sp_comment', $input),
                'SpIsUse' => element('sp_is_use', $input),
                'SpIsDuplicate' => element('sp_is_duplicate', $input),
                'StartDate' => element('register_start_datm', $input),
                'EndDate' => element('register_end_datm', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['event_survey']) === false) {
                throw new \Exception('설문조사 등록에 실패했습니다.');
            }

            $sp_idx = $this->_conn->insert_id();

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $sp_idx];
    }

    /**
     * 설문조사 수정
     * @param $input
     * @return mixed
     */
    public function modifyEventSurvey($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $sp_idx = element('sp_idx', $input);

            $data = [
                'SpTitle' => element('sp_title', $input),
                'SpComment' => element('sp_comment', $input),
                'SpIsUse' => element('sp_is_use', $input),
                'SpIsDuplicate' => element('sp_is_duplicate', $input),
                'StartDate' => element('register_start_datm', $input),
                'EndDate' => element('register_end_datm', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //수정
            if ($this->_conn->set($data)->where('SpIdx', $sp_idx)->update($this->_table['event_survey']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'idx' => $sp_idx];
    }

    /**
     * 설문조사 항목 등록
     * @param $input
     * @return array|bool
     */
    public function addSurveyQuestion($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $sq_cnt = element('sq_cnt', $input);
            $sq_question_title = element('sq_question_title', $input);
            $sq_question_item = element('sq_question_item', $input);
            $sq_question_item_arr = element('sq_item_cnt', $input);
            $sq_type = element('sq_type', $input);
            $sq_series = element('sq_series', $input);

            $json_data = $this->_setEncodeData($sq_question_title,$sq_cnt,$sq_question_item,$sq_question_item_arr,$sq_type);

            $data = [
                'SpIdx' => element('SpIdx', $input),
                'IsSeries' => element('is_series', $input, 'N'),
                'SqSeries' => empty($sq_series) ? '' : json_encode($sq_series),
                'SqTitle' => element('sq_title', $input),
                'SqComment' => element('sq_comment', $input),
                'OrderNum' => element('order_num', $input),
                'SqIsUse' => element('sq_is_use', $input),
                'SqSubjectCnt' => element('sq_subject_cnt', $input),
                'SqType' => $sq_type,
                'SqCnt' => $sq_cnt,
                'SqJsonData' => $json_data,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['event_survey_question']) === false) {
                throw new \Exception('설문항목 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'sp_idx' => $data['SpIdx']];
    }

    /**
     * 설문조사 항목 수정
     * @param $input
     * @return mixed
     */
    public function modifySurveyQuestion($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $sp_idx = element('SpIdx', $input);
            $sq_idx = element('sq_idx', $input);
            $sq_cnt = element('sq_cnt', $input);
            $sq_question_title = element('sq_question_title', $input);
            $sq_question_item = element('sq_question_item', $input);
            $sq_question_item_arr = element('sq_item_cnt', $input);
            $sq_type = element('sq_type', $input);
            $sq_series = element('sq_series', $input);

            $json_data = $this->_setEncodeData($sq_question_title,$sq_cnt,$sq_question_item,$sq_question_item_arr,$sq_type);

            $data = [
                'SqTitle' => element('sq_title', $input),
                'IsSeries' => element('is_series', $input, 'N'),
                'SqSeries' => empty($sq_series) ? '' : json_encode($sq_series),
                'SqComment' => element('sq_comment', $input),
                'OrderNum' => element('order_num', $input),
                'SqIsUse' => element('sq_is_use', $input),
                'SqType' => $sq_type,
                'SqCnt' => $sq_cnt,
                'SqSubjectCnt' => element('sq_subject_cnt', $input),
                'SqJsonData' => $json_data,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //수정
            if ($this->_conn->set($data)->where('SqIdx', $sq_idx)->update($this->_table['event_survey_question']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'sp_idx' => $sp_idx];
    }

    /**
     * 설문조사 항목 삭제 (업데이트)
     * @param integer $sq_idx
     * @return array|bool
     */
    public function removeSurveyQuestion($sq_idx=null)
    {
        $this->_conn->trans_begin();
        try {
            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('SqIdx', $sq_idx)->update($this->_table['event_survey_question']) === false) {
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
     * 답변항목 인코딩
     * @param array $question_title
     * @param integer $question_cnt
     * @param array $question_item
     * @param array $question_item_arr
     * @param string $question_type
     * @return string JSON string
     */
    private function _setEncodeData($question_title=[],$question_cnt=null,$question_item=[],$question_item_arr=[],$question_type=null){

        $data = [];
        foreach ($question_title as $key => $val){
            if(empty($val) === false && $key <= $question_cnt){
                if($question_type == 'S'){
                    $data[1]["title"] = '';
                    $data[1]["item"][$key] = $val;
                }else{
                    $data[$key]["title"] = $val;
                    foreach ((array)$question_item[$key] as $k => $v){
                        if(empty($v) === false && $k <= $question_item_arr[$key]){
                            $data[$key]["item"][$k] = $v;
                            $data[$key]["item_cnt"] = $question_item_arr[$key];
                        }else{
                            break;
                        }
                    }
                }
            }else{
                break;
            }
        }

        return json_encode($data);
    }

    /**
     * 답변항목 디코딩
     * @param array $data
     * @param string $field
     * @return mixed
     */
    private function _getDecodeData($data=[],$field=null){

        foreach ($data as $key => $val){
            if(empty($field) === false){
                $data[$key][$field] = json_decode($val[$field],true);
            }else{
                $data[$key]['SqTypeTxt'] = element($val['SqType'],$this->_selection_type);
                $data[$key]['SqUseTxt'] = element($val['SqIsUse'],$this->_use_type);
                $data[$key]['SqJsonData'] = json_decode($val['SqJsonData'],true);
                $data[$key]['SqSeries'] = empty($val['SqSeries']) ? [] : json_decode($val['SqSeries'],true);
            }
        }

        return $data;
    }

}
