<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyModel extends WB_Model
{
    private $_table = [
        'surveyQuestion' => 'lms_survey_question',
        'surveyQuestionSet' => 'lms_survey_question_set',
        'surveyQuestionSetDetail' => 'lms_survey_question_set_r_question',
        'surveyProduct' => 'lms_survey_product',
        'surveyAnswer' => 'lms_survey_answer_info',
        'surveyAnswerDetail' => 'lms_survey_answer',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    //설문 상품호출
    public function productCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyProduct']} 
        ";

        $obder_by = "";
        $where = " WHERE SpIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 문항세트호출
     */
    public function questionSetCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestionSet']} AS sqs
                JOIN {$this->_table['surveyQuestionSetDetail']} AS sqsd ON sqs.SqsIdx = sqsd.SqsIdx
        ";

        $obder_by = " ORDER BY Ordering ASC";
        $where = " WHERE sqs.SqsIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 문항세트호출
     */
    public function questionCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestion']}
        ";

        $obder_by = "";
        $where = " WHERE SqIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 설문저장
     */
    public function surveyIs($idx){
        $column = "
            COUNT(*) AS CNT
        ";

        $from = "
            FROM
                {$this->_table['surveyAnswer']}
        ";

        $obder_by = "";
        $where = " WHERE SpIdx = ".$idx." AND MemIdx = ".$this->session->userdata('mem_idx');
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 설문결과
     */
    public function answerCall($idx)
    {
        $column = "
            SubTitle, sa.SqIdx, Answer, sa.Type 
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyAnswer']} AS si ON sp.SpIdx = si.SpIdx
                JOIN {$this->_table['surveyAnswerDetail']} AS sa ON si.SaIdx = sa.SaIdx
                LEFT JOIN {$this->_table['surveyQuestionSetDetail']}  sr ON sa.SqIdx = sr.SqIdx AND sp.SqsIdx = sr.SqsIdx
        ";

        $obder_by = "ORDER BY sr.GroupNumber ASC, sa.SqIdx ASC";
        $where = " WHERE sp.SpIdx = " . $idx . " AND sa.TYPE = 'S'";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->result_array();

        return $Res;
    }
    
    /**
     * 설문저장
     */
    public function storeSurvey($formData = []){
        try {
            $this->_conn->trans_begin();

            $SpIdx = element('SpIdx', $formData);
            $totalIdx = element('totalIdx', $formData);
            $totalType = element('totalType', $formData);

            // 데이터 수정
            $data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SpIdx'  => $SpIdx
            ];

            $this->_conn->set($data)->set('RegDatm', 'NOW()', false);

            if ($this->_conn->insert($this->_table['surveyAnswer']) === false) {
                throw new \Exception('문항저장에 실패했습니다.');
            }

            $saidx = $this->_conn->insert_id();

            for($i = 0; $i < count($totalIdx); $i++){
                // 데이터 수정
                $snum = $totalIdx[$i];
                $type = $totalType[$i];

                $q = element('q'.$snum, $formData);

                $txt = '';
                if($type == 'S' || $type == 'D'){
                    $txt = $q;
                } else {
                    for($j=0; $j < COUNT($q); $j++){
                        $txt .= $q[$j]."/";
                    }
                    $txt = substr($txt,0,strlen($txt)-1);
                }

                $Comment = '';
                $Answer = '';

                if($type == 'S' || $type == 'T'){
                    $Answer = $txt;
                } else {
                    $Comment = $txt;
                }

                if(empty(trim($txt)) === false){
                    $data = [
                        'SaIdx' => $saidx,
                        'SqIdx' => $snum,
                        'Type' => $type,
                        'Comment' => $Comment,
                        'Answer' => $Answer
                    ];

                    $this->_conn->set($data);

                    if ($this->_conn->insert($this->_table['surveyAnswerDetail']) === false) {
                        throw new \Exception('문항저장에 실패했습니다 .');
                    }

                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}