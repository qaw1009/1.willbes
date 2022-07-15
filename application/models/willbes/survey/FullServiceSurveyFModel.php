<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FullServiceSurveyFModel extends WB_Model
{
    private $_table = [
        'survey_set' => 'lms_survey_set',
        'survey_set_question' => 'lms_survey_set_question',
        'survey_set_answer' => 'lms_survey_set_answer',
        'survey_set_statistics' => 'lms_survey_set_statistics',

        'sysCode' => 'lms_sys_code',
    ];

    // 디코딩 필드
    private $_field = [
        'lms' => ['SeriesData','SqJsonData'],
        'wbs' => ['AnswerInfo'],
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 설문조사 조회
     * @param integer $ss_idx
     * @param integer $site_code
     * @return mixed
     */
    public function findSurvey($ss_idx = null, $site_code = null)
    {
        $arr_condition = [
            'EQ' => ['A.SsIdx' => $ss_idx, 'A.IsUse' => 'Y', 'A.IsStatus' => 'Y', 'A.SiteCode' => $site_code],
            'RAW' => ['NOW() between ' => 'StartDate and EndDate']
        ];

        $column = "
            A.SsIdx, A.SurveyTitle, A.SurveyComment, A.IsDuplicate
            ";

        $from = "
            FROM {$this->_table['survey_set']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 설문문항 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listSurveyForQuestion($arr_condition = [])
    {
        $order_by = ['A.OrderNum'=>'ASC','A.SsqIdx'=>'ASC'];

        $column = "
            A.SsqIdx, A.IsSeries, A.SeriesData, A.SqTitle, A.SqComment, A.SqType, A.SqCnt, A.SqSubjectCnt, A.SqJsonData
            ";

        $from = "
            FROM {$this->_table['survey_set_question']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->result_array();
    }

    /**
     * 설문조사 결과 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listSurveyForAnswer($arr_condition = [])
    {
        $column = "A.AnswerInfo";
        $from = "
            FROM {$this->_table['survey_set_answer']} AS A
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.SsaIdx' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 설문 참여 여부 체크
     * @param integer $ss_idx
     * @return mixed
     */
    public function findSurveyForAnswer($ss_idx = null)
    {
        $arr_condition = ['EQ' => ['SsIdx' => $ss_idx, 'MemIdx' => $this->session->userdata('mem_idx'), 'IsStatus' => 'Y']];
        $column = "SsaIdx, AnswerInfo";
        $from = "
            FROM {$this->_table['survey_set_answer']}
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 설문 저장
     * @param $formData
     * @return mixed
     */
    public function storeSurvey($formData = []){
        try {
            $this->_conn->trans_begin();

            $data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SsIdx'  => element('ss_idx', $formData),
                'UserIp'  => $this->input->ip_address(),
                'AnswerInfo' => json_encode($formData['survey_answer'],JSON_UNESCAPED_UNICODE)
            ];

            if ($this->_conn->set($data)->insert($this->_table['survey_set_answer']) === false) {
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