<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyModel extends WB_Model
{
    private $_table = [
        'event_survey' => 'lms_event_survey',
        'event_survey_question' => 'lms_event_survey_question',
        'event_answer_info' => 'lms_event_survey_answer_info',
    ];

    public $upload_path_predict;       // 통파일 저장경로: ~/predict/{idx}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->upload_path_predict = $this->config->item('upload_path_predict', 'predict');
    }

    /**
     * 설문 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurvey($sp_idx = null)
    {
        $arr_condition = [
            'EQ' => ['A.SpIdx' => $sp_idx, 'A.SpIsUse' => 'Y'],
            'RAW' => ['NOW() between ' => 'StartDate and EndDate']
        ];

        $column = "
            A.SpIdx, A.SpTitle, A.SpComment, A.SpIsDuplicate
            ";

        $from = "
            FROM {$this->_table['event_survey']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 설문문항 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function listSurveyForQuestion($sp_idx = null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx, 'A.IsStatus' => 'Y', 'A.SqIsUse' => 'Y']];
        $order_by = ['A.OrderNum'=>'ASC','A.SqIdx'=>'ASC'];

        $column = "
            A.SqIdx, A.SqTitle, A.SqComment, A.SqType, A.SqCnt, A.SqJsonData
            ";

        $from = "
            FROM {$this->_table['event_survey_question']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->result_array();
    }

    /**
     * 설문응답 체크
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyAnswer($sp_idx = null)
    {
        $arr_condition = ['EQ' => ['SpIdx' => $sp_idx, 'MemIdx' => $this->session->userdata('mem_idx')]];

        $column = "
            COUNT(*) AS cnt
        ";

        $from = "
            FROM {$this->_table['event_answer_info']}
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row(0)->cnt;
    }

    /**
     * 설문저장
     * @param $formData
     * @param integer $sp_idx
     * @return mixed
     */
    public function storeSurvey($formData = [],$sp_idx = null){
        try {
            $this->_conn->trans_begin();

            // 설문응답
            $data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SpIdx'  => $sp_idx,
                'AnswerInfo' => json_encode($formData)
            ];

            if ($this->_conn->set($data)->insert($this->_table['event_answer_info']) === false) {
                throw new \Exception('문항저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

}