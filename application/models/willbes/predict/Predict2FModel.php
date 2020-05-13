<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predict2FModel extends WB_Model
{
    private $_table = [
        'product_predict2' => 'lms_product_predict2',
        'sys_code' => 'lms_sys_code',
        'product_predict2_r_paper' => 'lms_product_predict2_r_paper',
        'predict2_paper' => 'lms_predict2_paper',
        'predict2_paper_r_category' => 'lms_predict2_paper_r_category',
        'predict2_r_category' => 'lms_predict2_r_category',
        'predict2_r_subject' => 'lms_predict2_r_subject',
        'product_subject' => 'lms_product_subject',
        'predict2_questions' => 'lms_predict2_questions',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 성적서비스 정보 조회
     * @param $arr_condition
     * @param string $column
     */
    public function findPredictData($arr_condition, $column = 'PredictIdx2')
    {
        $from = " FROM {$this->_table['product_predict2']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    public function getMackPart($idx)
    {
        $arr_condition = [
            'EQ' => [
                'a.PredictIdx2' => $idx
            ]
        ];
        $column = 'b.Ccd AS MockPart,b.CcdName AS MockPartName';

        $from = "
            FROM {$this->_table['product_predict2']} AS a
            INNER JOIN {$this->_table['sys_code']} b ON FIND_IN_SET(b.Ccd, a.MockPart)
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = 'ORDER BY b.Ccd ASC';

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 과목조회
     * @param $idx
     * @return mixed
     */
    public function getSubjectList($idx)
    {
        $arr_condition = [
            'EQ' => [
                'PP.PredictIdx2' => $idx,
                'PP.IsStatus' => 'Y',
                'PP.IsUse' => 'Y',
                'PPRP.IsStatus' => 'Y',
            ]
        ];
        $column = "
            PPRP.PpIdx, PPR.AnswerNum, PPR.TotalScore, SJ.SubjectName, PRS.SubjectIdx, PRS.SubjectType,
            (SELECT COUNT(*) AS qCnt FROM {$this->_table['predict2_questions']} AS a WHERE a.PpIdx = PPR.PpIdx) AS qCnt
        ";

        $from = "
            FROM {$this->_table['product_predict2']} AS PP
            INNER JOIN {$this->_table['product_predict2_r_paper']} AS PPRP ON PP.PredictIdx2 = PPRP.PredictIdx2
            INNER JOIN {$this->_table['predict2_paper']} AS PPR ON PPRP.PpIdx = PPR.PpIdx AND PPR.IsStatus = 'Y' AND PPR.IsUse = 'Y'
            INNER JOIN {$this->_table['predict2_paper_r_category']} AS PPRC ON PPR.PpIdx = PPRC.PpIdx AND PPRC.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict2_r_category']} AS PRC ON PPRC.PrcIdx = PRC.PrcIdx AND PRC.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict2_r_subject']} AS PRS ON PRC.PrsIdx = PRS.PrsIdx AND PRS.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_subject']} AS SJ ON PRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = 'ORDER BY PPRP.OrderNum ASC';

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 과목별 문항 조회 및 답안정보
     * @param $idx
     * @return mixed
     * TODO : 답안관련 테이블 조인 미비
     */
    public function getQuestionForAnswer($idx)
    {
        $arr_condition = [
            'EQ' => [
                'PP.PredictIdx2' => $idx,
                'PP.IsStatus' => 'Y',
                'PP.IsUse' => 'Y',
                'PPRP.IsStatus' => 'Y',
            ]
        ];
        $column = "
            q.PqIdx, q.PpIdx, q.QuestionNO, q.QuestionOption, q.RightAnswer, q.Scoring, '' AS Answer
        ";

        $from = "
            FROM {$this->_table['product_predict2']} AS PP
            INNER JOIN {$this->_table['product_predict2_r_paper']} AS PPRP ON PP.PredictIdx2 = PPRP.PredictIdx2
            INNER JOIN {$this->_table['predict2_questions']} AS q ON PPRP.PpIdx = q.PpIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = 'ORDER BY q.PpIdx, q.QuestionNO ASC';

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    public function addPredict2($form_data)
    {
        try {
            $subjectData = $this->getSubjectList(element('PredictIdx', $form_data));
            if (empty($subjectData) === true) {
                throw new Exception('조회된 과목이 없습니다.');
            }

            $questionData = $this->getQuestionForAnswer(element('PredictIdx', $form_data));
            if (empty($questionData) === true) {
                throw new Exception('조회된 문항이 없습니다.');
            }

            print_r($questionData);
            $take_level = '';
            foreach ($subjectData as $row) {
                if (empty(element('take_level_'.$row['PpIdx'],$form_data)) === true) {
                    throw new Exception('과목별 체감난이도를 선택해 주세요.');
                }

                for($i = 0; $i < count(element('Answer_'.$row['PpIdx'],$form_data)); $i++){
                    $Answer = element('Answer_'.$row['PpIdx'],$form_data)[$i];
                    /*if(strlen($Answer) != $row['AnswerNum']) {
                        throw new Exception('정답이 모두 입력되지 않았습니다.');
                    }*/
                }

                $take_level .= $row['PpIdx'].'|'.element('take_level_'.$row['PpIdx'],$form_data).',';
            }
            $take_level = substr($take_level, 0, -1);

            $base_data = [
                'PredictIdx2' => element('PredictIdx', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx'),

                'MemEmail' => element('register_email', $form_data),
                'MemTel' => element('register_tel', $form_data),
                'TakeMockPart' => element('take_mock_part', $form_data),
                'TakeNumber' => element('take_num', $form_data),
                'TakeCount' => element('take_cnt', $form_data),
                'TakeLevel' => $take_level,
            ];

            foreach ($subjectData as $row) {
                $answer_data[] = [
                    'PpIdx' => ''
                ];
            }




        } catch (Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}