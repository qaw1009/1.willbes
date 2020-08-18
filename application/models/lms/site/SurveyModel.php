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
        'survey_set' => 'lms_survey_set',
        'survey_set_question' => 'lms_survey_set_question',
        'survey_set_answer' => 'lms_survey_set_answer',
        'admin' => 'wbs_sys_admin',
        'member' => 'lms_member',
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
     * 설문리스트 조회
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return mixed
     */
    public function listAllSurvey($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = "count(*) AS numrows";
            $order_by_offset_limit = '';
        } else {
            $column = "
            A.SsIdx, A.SurveyTitle, A.SurveyComment, A.SurveyIsUse, A.IsDuplicate, A.StartDate, A.EndDate, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            (SELECT COUNT(*) FROM {$this->_table['survey_set_answer']} WHERE SsIdx = A.SsIdx) AS CNT
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['survey_set']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 설문조사 수정 폼 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyForModify($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SsIdx' => $sp_idx]];
        $order_by = ['B.RegDatm'=>'DESC'];

        $column = "
            A.SsIdx, A.SurveyTitle, A.SurveyComment, A.SurveyIsUse, A.IsDuplicate, A.StartDate, A.EndDate, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            B.SsqIdx AS seriesIdx , B.SqJsonData AS SeriesData,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['survey_set']} AS A
            LEFT OUTER JOIN {$this->_table['survey_set_question']} AS B ON A.SsIdx = B.SsIdx AND B.IsSeries='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->row_array();
    }

    /**
     * 설문조사 문항 수정 폼 조회
     * @param integer $sq_idx
     * @return mixed
     */
    public function findQuestionForModify($sq_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SsqIdx' => $sq_idx, 'A.IsStatus' => 'Y']];

        $column = "
            A.SsqIdx, A.SsIdx, A.IsSeries, A.SeriesData, A.SqTitle, A.SqComment, A.OrderNum, A.SqIsUse, A.SqType, A.SqCnt, A.SqSubjectCnt, A.SqJsonData, A.RegDatm, A.UpdDatm,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['survey_set_question']} AS A
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
        $arr_condition = ['EQ' => ['A.SsIdx' => $sp_idx, 'A.IsStatus' => 'Y']];
        $order_by = ['A.OrderNum'=>'ASC','A.SsqIdx'=>'ASC'];

        $column = "
            A.SsIdx, A.SsqIdx, A.SeriesData, A.SqTitle, A.SqComment, A.OrderNum, A.SqIsUse, A.SqType, A.SqCnt, A.SqJsonData, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx AS SqUpdAdminIdx,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['survey_set_question']} AS A
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $data = $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->result_array();
        return $this->_getDecodeData($data);
    }

    /**
     * 설문조사 팝업 데이타 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function listAnswerPopupData($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SsIdx' => $sp_idx]];
        $column = "A.AnswerInfo, A.RegDatm, B.MemName, B.MemId";
        $from = "
            FROM {$this->_table['survey_set_answer']} AS A
            LEFT JOIN {$this->_table['member']} AS B ON A.MemIdx = B.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.SsaIdx' => 'ASC'])->getMakeOrderBy();
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
        return $this->_getDecodeData($data,'AnswerInfo');
    }

    /**
     * 설문조사 팝업 그래프 데이타 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function listAnswerGraphData($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SsIdx' => $sp_idx]];
        $column = "A.AnswerInfo";
        $from = "
            FROM {$this->_table['survey_set_answer']} AS A
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.SsaIdx' => 'ASC'])->getMakeOrderBy();
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
        return $this->_getDecodeData($data,'AnswerInfo');
    }

    /**
     * 직렬 항목 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyBySeries($sp_idx = null)
    {
        $data = [];
        $arr_condition = ['EQ' => ['SsIdx' => $sp_idx, 'IsSeries' => 'Y']];

        $column = "SsqIdx,SqJsonData";
        $from = " FROM {$this->_table['survey_set_question']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $row[0] = $this->_conn->query('select '. $column . $from . $where)->row_array();

        if(empty($row[0]) === false){
            $data[$row[0]['SsqIdx']] = $this->_getDecodeData($row,'SqJsonData')[0]['SqJsonData'][1]['item'];
        }

        return $data;
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
                'SurveyTitle' => element('sp_title', $input),
                'SurveyComment' => element('sp_comment', $input),
                'SurveyIsUse' => element('sp_is_use', $input),
                'IsDuplicate' => element('sp_is_duplicate', $input),
                'StartDate' => element('register_start_datm', $input),
                'EndDate' => element('register_end_datm', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['survey_set']) === false) {
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
                'SurveyTitle' => element('sp_title', $input),
                'SurveyComment' => element('sp_comment', $input),
                'SurveyIsUse' => element('sp_is_use', $input),
                'IsDuplicate' => element('sp_is_duplicate', $input),
                'StartDate' => element('register_start_datm', $input),
                'EndDate' => element('register_end_datm', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //수정
            if ($this->_conn->set($data)->where('SsIdx', $sp_idx)->update($this->_table['survey_set']) === false) {
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
     * 설문조사 문항 등록
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
            $is_series = element('is_series', $input, 'N');
            $sq_series = [];

            $json_data = $this->_setEncodeData($sq_question_title,$sq_cnt,$sq_question_item,$sq_question_item_arr,$sq_type);

            if($is_series == 'Y'){
                foreach (json_decode($json_data,true)[1]['item'] as $key => $val){
                    $sq_series[] = $val;
                }
            }else{
                $sq_series = element('sq_series', $input);
            }

            $sq_series = empty($sq_series) ? '' : json_encode($sq_series);

            $data = [
                'SsIdx' => element('SsIdx', $input),
                'IsSeries' => $is_series,
                'SeriesData' => $sq_series,
                'SqTitle' => element('sq_title', $input),
                'SqComment' => element('sq_comment', $input),
                'OrderNum' => element('order_num', $input),
                'SurveyIsUse' => element('sq_is_use', $input),
                'SqSubjectCnt' => element('sq_subject_cnt', $input),
                'SqType' => $sq_type,
                'SqCnt' => $sq_cnt,
                'SqJsonData' => $json_data,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['survey_set_question']) === false) {
                throw new \Exception('설문항목 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'sp_idx' => $data['SsIdx']];
    }

    /**
     * 설문조사 문항 수정
     * @param $input
     * @return mixed
     */
    public function modifySurveyQuestion($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $sp_idx = element('SsIdx', $input);
            $sq_idx = element('sq_idx', $input);
            $sq_cnt = element('sq_cnt', $input);
            $sq_question_title = element('sq_question_title', $input);
            $sq_question_item = element('sq_question_item', $input);
            $sq_question_item_arr = element('sq_item_cnt', $input);
            $sq_type = element('sq_type', $input);
            $is_series = element('is_series', $input, 'N');
            $sq_series = [];

            $json_data = $this->_setEncodeData($sq_question_title,$sq_cnt,$sq_question_item,$sq_question_item_arr,$sq_type);

            if($is_series == 'Y'){
                foreach (json_decode($json_data,true)[1]['item'] as $key => $val){
                    $sq_series[] = $val;
                }
            }else{
                $sq_series = element('sq_series', $input);
            }
            $sq_series = empty($sq_series) ? '' : json_encode($sq_series);

            $data = [
                'SqTitle' => element('sq_title', $input),
                'IsSeries' => $is_series,
                'SeriesData' => $sq_series,
                'SqComment' => element('sq_comment', $input),
                'OrderNum' => element('order_num', $input),
                'SurveyIsUse' => element('sq_is_use', $input),
                'SqType' => $sq_type,
                'SqCnt' => $sq_cnt,
                'SqSubjectCnt' => element('sq_subject_cnt', $input),
                'SqJsonData' => $json_data,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            //수정
            if ($this->_conn->set($data)->where('SsqIdx', $sq_idx)->update($this->_table['survey_set_question']) === false) {
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
     * 설문조사 문항 삭제 (업데이트)
     * @param integer $sq_idx
     * @return array|bool
     */
    public function removeSurveyQuestion($sq_idx=null)
    {
        $this->_conn->trans_begin();
        try {
            $data = ['IsStatus'=>'N'];
            if ($this->_conn->set($data)->where('SsqIdx', $sq_idx)->update($this->_table['survey_set_question']) === false) {
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
     * 설문문항 정렬순서, 사용유무 (업데이트)
     * @param array $params
     * @return bool
     */
    public function modifyQuestionUseOrderNum($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $sq_idx => $val) {
                if(empty($sq_idx) === true) throw new \Exception('필수 파라미터 오류입니다.');

                $data = [
                    'OrderNum' => $val['sq_order_num'],
                    'SurveyIsUse' => $val['sq_is_use'],
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];

                if ($this->_conn->set($data)->where('SsqIdx', $sq_idx)->update($this->_table['survey_set_question']) === false) {
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
     * 답변문항 인코딩
     * @param array $question_title
     * @param integer $question_cnt
     * @param array $question_item
     * @param array $question_item_arr
     * @param string $question_type
     * @return string JSON string
     */
    private function _setEncodeData($question_title=[],$question_cnt=null,$question_item=[],$question_item_arr=[],$question_type=null)
    {
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
     * 답변문항 디코딩
     * @param array $data
     * @param string $field
     * @return mixed
     */
    private function _getDecodeData($data=[],$field=null)
    {
        foreach ($data as $key => $val){
            if(empty($field) === false){
                $data[$key][$field] = json_decode($val[$field],true);
            }else{
                $data[$key]['SqTypeTxt'] = element($val['SqType'],$this->_selection_type);
                $data[$key]['SqJsonData'] = json_decode($val['SqJsonData'],true);
                $data[$key]['SeriesData'] = empty($val['SeriesData']) ? [] : json_decode($val['SeriesData'],true);
            }
        }

        return $data;
    }

}
