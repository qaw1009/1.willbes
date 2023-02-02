<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FullServiceFModel extends WB_Model
{
    private $_table = [
        'product_predict' => 'lms_product_predict'
        ,'predict_code_r_subject' => 'lms_predict_code_r_subject'
        ,'predict_register' => 'lms_predict_register'
        ,'predict_register_r_code' => 'lms_predict_register_r_code'
        ,'predict_paper' => 'lms_predict_paper'
        ,'predict_code' => 'lms_predict_code'
        ,'predict_answerpaper' => 'lms_predict_answerpaper'
        ,'predict_grades_origin' => 'lms_predict_grades_origin'
        ,'predict_grades' => 'lms_predict_grades'
        ,'predict_questions' => 'lms_predict_questions'
        ,'predict_grades_line' => 'lms_predict_grades_line'
        ,'lms_Product' => 'lms_Product'
        ,'predict_r_product' => 'lms_predict_r_product'
        ,'lms_member' => 'lms_member'
    ];

    private $_cut_line = 40;    //가산점 합산 기준 점수

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 합격예측관리 회차 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findPredictData($arr_condition)
    {
        $column = 'PredictIdx, MockPart, IsQuestionType, IsAddPoint, TakeNumRedundancyCheckIsUse, PreServiceIsUse';
        $column .= ',DATE_FORMAT(PreServiceSDatm, \'%Y%m%d%H%i\') AS PreServiceSDatm, DATE_FORMAT(PreServiceEDatm, \'%Y%m%d%H%i\') AS PreServiceEDatm';
        $column .= ',DATE_FORMAT(AnswerServiceSDatm, \'%Y%m%d%H%i\') AS AnswerServiceSDatm, DATE_FORMAT(AnswerServiceEDatm, \'%Y%m%d%H%i\') AS AnswerServiceEDatm';
        $column .= ',DATE_FORMAT(ServiceSDatm, \'%Y%m%d%H%i\') AS ServiceSDatm, DATE_FORMAT(ServiceEDatm, \'%Y%m%d%H%i\') AS ServiceEDatm';

        $from = " FROM {$this->_table['product_predict']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 합격예측의 직렬 조회
     */
    public function listMockPartForPredict($predict_idx)
    {
        $column = "Ccd, CcdName";
        $from = " FROM {$this->_table['predict_code']}";
        $order_by = $this->_conn->makeOrderBy(['OrderNum' => 'ASC'])->getMakeOrderBy();

        //일반경채(남)의 수사, 행정법 코드 제외
        $arr_condition = [
            'EQ' => [
                'GroupCcd' => '0'
            ],
            'RAW' => [
                'IsUse' => "'Y' AND FIND_IN_SET(Ccd, (SELECT MockPart FROM {$this->_table['product_predict']} WHERE PredictIdx = '{$predict_idx}' AND IsUse = 'Y'))
                AND Ccd != '100901' AND Ccd != '100902'"
            ],
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 합격예측 직렬+과목코드 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function getSubjectCode($arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "a.TakeMockPart, b.Ccd, b.CcdName, b.Type";
        $from = "
            FROM {$this->_table['predict_code_r_subject']} AS a
            INNER JOIN {$this->_table['predict_code']} AS b ON a.TakeMockPart = b.GroupCcd AND a.SubjectCode = b.Ccd AND b.IsUse = 'Y'
            INNER JOIN {$this->_table['predict_code']} AS c ON b.GroupCcd = c.Ccd AND c.IsUse = 'Y'
        ";
        $order_by = $this->_conn->makeOrderBy(['c.OrderNum' => 'ASC', 'a.OrderNum' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 합격예측 접수데이터 조회
     * 막대그래프 Y축 MAX 값
     * @param array $arr_condition
     * @return mixed
     */
    public function findRegisterData($arr_condition = [], $add_column = '')
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            a.PrIdx, a.TakeNumber, a.TakeMockPart, a.TakeArea, a.AddPoint, a.LectureType, a.Period, a.PointDelCnt
            ,b.MemName, c.CcdName AS TakeMockPartName
            ,gl.PickNum, gl.TakeNum, gl.CompetitionRateNow
            ,(SELECT QuestionType FROM {$this->_table['predict_register_r_code']} AS prc WHERE a.PrIdx = prc.PrIdx LIMIT 1) AS QuestionType            
        ";
        $column .= $add_column;
        $from = "
            FROM {$this->_table['predict_register']} AS a
            INNER JOIN {$this->_table['lms_member']} AS b ON a.MemIdx = b.MemIdx
            INNER JOIN {$this->_table['predict_code']} AS c ON a.TakeMockPart = c.Ccd AND c.GroupCcd = 0
            LEFT JOIN {$this->_table['predict_grades_line']} AS gl ON a.PredictIdx = gl.PredictIdx AND a.TakeMockPart = gl.TakeMockPart AND a.TakeArea = gl.TakeArea AND gl.IsUse = 'Y'
        ";

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 기본정보 직렬의 과목 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findRegisterSubjectData($arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        unset($arr_condition['EQ']['a.IsStatus']);
        $where_sub1 = $this->_conn->makeWhere($arr_condition);
        $where_sub1 = $where_sub1->getMakeWhere(false);

        $arr_condition_sub2['EQ'] = array_merge($arr_condition['EQ'], ['a.IsWrong' => 'Y']);
        $where_sub2 = $this->_conn->makeWhere($arr_condition_sub2);
        $where_sub2 = $where_sub2->getMakeWhere(false);

        $column = '
            m.TakeMockPart, m.AnswerNum, m.TotalScore, m.PpIdx, m.CcdName, m.Type, m.SubjectCode
            ,m.QuestionCnt, s.MyScore, c.MyRightAnswerCnt
            ,ROUND(((IFNULL(c.MyRightAnswerCnt,0) / IFNULL(m.QuestionCnt,0)) * 100), 2) AS MyRightAnswerAvg
        ';
        $from = "
            FROM (
                SELECT a.PredictIdx, a.PrIdx, a.TakeMockPart, pp.AnswerNum, pp.TotalScore, pp.PpIdx, pc.CcdName, pp.Type, prc.SubjectCode, pcrs.OrderNum
                    ,(SELECT COUNT(*) AS QuestionCnt
                        FROM {$this->_table['predict_questions']} AS a 
                        WHERE a.PpIdx = pp.PpIdx AND a.QuestionType = prc.QuestionType AND a.IsStatus = 'Y'
                    ) AS QuestionCnt
                FROM {$this->_table['predict_register']} AS a
                INNER JOIN {$this->_table['predict_register_r_code']} AS prc ON a.PrIdx = prc.PrIdx
                INNER JOIN {$this->_table['predict_paper']} AS pp ON a.PredictIdx = pp.PredictIdx AND prc.SubjectCode = pp.SubjectCode AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
                INNER JOIN {$this->_table['predict_code_r_subject']} AS pcrs ON a.PredictIdx = pcrs.PredictIdx AND pp.SubjectCode = pcrs.SubjectCode AND pcrs.IsStatus = 'Y' AND pcrs.IsUse = 'Y'
                INNER JOIN {$this->_table['predict_code']} AS pc ON pcrs.SubjectCode = pc.Ccd AND pc.IsUse = 'Y'
                {$where}
            ) AS m
            LEFT JOIN (
                SELECT a.PpIdx, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + b.AddPoint, a.OrgPoint) AS MyScore
                FROM {$this->_table['predict_grades_origin']} AS a
                INNER JOIN `lms_predict_register` AS b ON a.PredictIdx = b.PredictIdx AND a.PrIdx = b.PrIdx
                {$where_sub1}
            ) AS s ON m.PpIdx = s.PpIdx
            
            LEFT JOIN (
                SELECT a.PpIdx, COUNT(*) AS MyRightAnswerCnt
                FROM {$this->_table['predict_answerpaper']} AS a
                INNER JOIN {$this->_table['predict_questions']} AS b ON a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx
                {$where_sub2}
                GROUP BY a.PpIdx
            ) AS c ON m.PpIdx = c.PpIdx
        ";
        $order_by = $this->_conn->makeOrderBy(['m.OrderNum' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 합격예측 기본정보 등록
     * @param array $form_data
     * @return array|bool|void
     */
    public function addRegister($form_data = [])
    {
        try {
            $this->_conn->trans_begin();
            $predict_idx = element('predict_idx', $form_data);

            $now_time = date('YmdHi');
            $isStore = true;

            $arr_condition = ['EQ' => ['PredictIdx' => $predict_idx, 'IsUse' => 'Y']];
            $predict_data = $this->findPredictData($arr_condition);
            if (empty($predict_data) === true) {
                throw new \Exception('조회된 합격예측 코드가 없습니다.');
            }

            if ($predict_data['PreServiceIsUse'] == 'Y') {
                if ($now_time >= $predict_data['PreServiceSDatm'] && $now_time <= $predict_data['PreServiceEDatm']) {
                    $isStore = true;
                } else {
                    $isStore = false;
                }
            }

            if ($isStore === false) {
                throw new \Exception('사전예약 신청기간이 아닙니다.');
            }

            //응시번호중복체크 사용인경우
            if ($predict_data['TakeNumRedundancyCheckIsUse'] == 'Y') {
                $arr_condition = [
                    'EQ' => [
                        'a.PredictIdx' => $predict_idx,
                        'a.TakeNumber' => element('take_number', $form_data),
                        'a.TakeMockPart' => element('take_mock_part', $form_data),
                        'a.IsStatus' => 'Y'
                    ]
                ];
                $register_data = $this->findRegisterData($arr_condition);
                if (empty($register_data) === false) {
                    throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
                }
            }

            $arr_condition = [
                'EQ' => [
                    'a.PredictIdx' => $predict_idx
                    ,'a.MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];
            $regist_check = $this->findRegisterData($arr_condition);
            if(empty($regist_check) === false) {
                throw new \Exception('이미 신청하셨습니다.');
            }

            $input_data = $this->setInputDataForRegister($form_data);
            if ($this->_conn->set($input_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predict_register']) === false) {
                throw new \Exception('저장에 실패했습니다.');
            }
            $ins_pr_idx = $this->_conn->insert_id();

            $addRegisterRSubjectCode = $this->addRegisterRSubjectCode($form_data, $ins_pr_idx);
            if ($addRegisterRSubjectCode !== true) {
                throw new \Exception('과목 등록에 실패했습니다.');
            }

            //자동지급 강좌 처리
            $prod_data = $this->getPredictProduct($predict_idx);
            if(empty($prod_data['ProdCode']) === false) {
                if ($this->orderFModel->procAutoOrder('predict', [$prod_data['ProdCode']]) !== true) {
                    throw new \Exception('강좌 지급에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['pr_idx' => $ins_pr_idx]];
    }

    /**
     * 합격예측 기본정보 수정
     * @param array $form_data
     * @return array|bool|bool[]
     */
    public function modifyRegister($form_data = [])
    {
        try {
            $this->_conn->trans_begin();
            $predict_idx = element('predict_idx', $form_data);
            $pr_idx = element('pr_idx', $form_data);

            $arr_condition = [
                'EQ' => [
                    'a.PredictIdx' => $predict_idx,
                    'a.PrIdx' => $pr_idx,
                    'a.IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findRegisterData($arr_condition);
            if ($register_data['TakeNumber'] != element('take_number', $form_data)) {
                $arr_condition = [
                    'EQ' => [
                        'a.PredictIdx' => $predict_idx,
                        'a.TakeNumber' => element('take_number', $form_data),
                        'a.TakeMockPart' => element('take_mock_part', $form_data),
                        'a.IsStatus' => 'Y'
                    ]
                ];
                $register_data = $this->findRegisterData($arr_condition);
                if (empty($register_data) === false) {
                    throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
                }
            }

            $input_data = $this->setInputDataForRegister($form_data);
            $this->_conn->set($input_data)->set('UpdDatm', 'NOW()', false)->where('PrIdx', $pr_idx);
            if ($this->_conn->update($this->_table['predict_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            if ($this->_conn->delete($this->_table['predict_register_r_code'], ['PrIdx' => $pr_idx]) === false) {
                throw new \Exception('과목 삭제에 실패했습니다.');
            }

            $addRegisterRSubjectCode = $this->addRegisterRSubjectCode($form_data, $pr_idx);
            if ($addRegisterRSubjectCode !== true) {
                throw new \Exception('과목 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true];
    }

    /**
     * 합격예측에 설정된 자동지급 강좌
     * @param $predict_idx
     * @return mixed
     */
    public function getPredictProduct($predict_idx)
    {
        $column = 'A.*, B.ProdName';
        $from = '
            from '. $this->_table['predict_r_product'] .' A
            inner join '.$this->_table['lms_Product'] .' B ON A.ProdCode = B.ProdCode
            where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' And DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s") between A.StartDate and A.EndDate
        ';
        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.PrpIdx' => 'ASC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1,null)->getMakeLimitOffset();
        $where = $this->_conn->makeWhere(['EQ'=>['PredictIdx' => $predict_idx]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where. $order_by_offset_limit)->row_array();
        return $result;
    }

    /**
     * 회원의 직렬기준 -> 과목별 문항 조회
     */
    public function listQuestionForRegister($arr_condition = [])
    {
        $column = "
            pp.PpIdx, pq.PqIdx, AnswerNum, QuestionNO, RightAnswer, RealQuestionFile AS FILE, pa.Answer,
            IF(FIND_IN_SET(pa.Answer, pq.RightAnswer) > 0, 'Y', 'N') AS IsWrong
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = " 
            FROM {$this->_table['predict_register_r_code']} AS rc
            INNER JOIN {$this->_table['predict_paper']} AS pp ON pp.SubjectCode = rc.SubjectCode AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
            INNER JOIN {$this->_table['predict_questions']} AS pq ON pp.PpIdx = pq.PpIdx AND rc.QuestionType = pq.QuestionType AND pp.IsUse = 'Y' AND pq.IsStatus = 'Y'
            INNER JOIN {$this->_table['predict_code_r_subject']} AS pcrs ON pp.SubjectCode = pcrs.SubjectCode AND pcrs.IsStatus = 'Y' AND pcrs.IsUse = 'Y'
            LEFT JOIN {$this->_table['predict_answerpaper']} AS pa ON pa.PrIdx = rc.PrIdx AND pq.PpIdx = pa.PpIdx AND pq.PqIdx = pa.PqIdx
        ";

        $order_by = $this->_conn->makeOrderBy(['pcrs.OrderNum' => 'ASC', 'pq.QuestionNO' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 정답제출
     * @param array $form_data
     */
    public function storeAnswerPaper($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $pr_idx = element('pr_idx', $form_data);
            $predict_idx = element('predict_idx', $form_data);
            $arr_answer_data = element('answer', $form_data);
            $mem_idx = $this->session->userdata('mem_idx');

            $arr_condition = [
                'EQ' => [
                    'a.PrIdx' => $pr_idx
                    ,'a.PredictIdx' => $predict_idx
                    ,'a.IsStatus' => 'Y'
                ]
            ];
            $reg_subject_data = $this->findRegisterSubjectData($arr_condition);
            if ($reg_subject_data === true) {
                throw new \Exception('조회된 과목정보가 없습니다.');
            }

            $arr_condition = [
                'EQ' => [
                    'rc.PredictIdx' => $predict_idx
                    ,'rc.PrIdx' => $pr_idx
                ]
            ];
            $arr_question_data = $this->fullServiceFModel->listQuestionForRegister($arr_condition);

            //답안 삭제
            $result = $this->_answerPaperDelete($pr_idx);
            if ($result !== true) {
                throw new \Exception($result);
            }

            //답안 저장
            $input_data = [];
            $i = 0;
            foreach ($reg_subject_data as $row) {
                if (array_key_exists($row['PpIdx'],$arr_answer_data) === true) {
                    foreach ($arr_answer_data[$row['PpIdx']] as $key => $answer_input_datas) {
                        foreach (str_split($answer_input_datas) as $answer_key => $answer_value) {
                            $input_data[] = [
                                'MemIdx' => $mem_idx
                                ,'PrIdx' => $pr_idx
                                ,'PredictIdx' => $predict_idx
                                ,'PpIdx' => $row['PpIdx']
                                ,'Answer' => $answer_value
                                ,'PqIdx' => $arr_question_data[$i]['PqIdx']
                                ,'IsWrong' => (in_array($answer_value, explode(',',$arr_question_data[$i]['RightAnswer'])) === true) ? 'Y' : 'N'
                            ];
                            $i+=1;
                        }
                    }
                }
            }

            if ($this->_conn->insert_batch($this->_table['predict_answerpaper'], $input_data) === false) {
                throw new \Exception('답안등록에 실패했습니다.');
            }

            //점수 저장
            if ($this->_addGradesOrigin($predict_idx, $pr_idx) !== true) {
                throw new \Exception('답안등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 과목별 문항별 통계
     * @param $predict_idx
     * @param $pr_idx
     * @return mixed
     */
    public function listStatsAnswerPaperForQuestion($predict_idx, $pr_idx)
    {
        $column = '
            base.PpIdx, base.PqIdx, base.QuestionNO, base.RightAnswer, base.Answer, base.IsWrong
            ,ROUND(((IFNULL(rightAnswerAvg.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS rightAnswerAvg
            ,ROUND(((IFNULL(answer1.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS answer_1
            ,ROUND(((IFNULL(answer2.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS answer_2
            ,ROUND(((IFNULL(answer3.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS answer_3
            ,ROUND(((IFNULL(answer4.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS answer_4
            ,ROUND(((IFNULL(answer5.cnt,0) / IFNULL(base.total_count,0)) * 100), 2) AS answer_5
        ';

        $arr_condition = [
            'EQ' => [
                'pr.PredictIdx' => $predict_idx
                ,'pr.PrIdx' => $pr_idx
                ,'pr.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['pcrs.OrderNum' => 'ASC', 'base.QuestionNO' => 'ASC'])->getMakeOrderBy();

        $from = "
            FROM (
                SELECT
                    answer.SubjectCode, answer.PpIdx, answer.PqIdx, answer.QuestionNO, answer.RightAnswer
                    ,answer.Answer, answer.IsWrong
                    ,tcount.total_count
                FROM (
                    SELECT rc.SubjectCode, pp.PpIdx, pq.PqIdx, pp.AnswerNum, pq.QuestionNO, pq.RightAnswer, pp.RealQuestionFile AS FILE, pa.Answer,
                    IF(FIND_IN_SET(pa.Answer, pq.RightAnswer) > 0, 'Y', 'N') AS IsWrong
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS rc ON pr.PrIdx = rc.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS pp ON pp.SubjectCode = rc.SubjectCode AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS pq ON pp.PpIdx = pq.PpIdx AND rc.QuestionType = pq.QuestionType AND pp.IsUse = 'Y' AND pq.IsStatus = 'Y'
                    LEFT JOIN {$this->_table['predict_answerpaper']} AS pa ON pa.PrIdx = rc.PrIdx AND pq.PpIdx = pa.PpIdx AND pq.PqIdx = pa.PqIdx
                    {$where}
                ) AS answer
                INNER JOIN (
                    SELECT b.PpIdx, b.PqIdx, COUNT(*) AS total_count
                    FROM (
                        SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                        FROM {$this->_table['predict_register']} AS pr
                        INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                        INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                        INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                        {$where}
                    ) AS a
                    INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx
                    GROUP BY b.PqIdx
                ) AS tcount ON tcount.PpIdx = answer.PpIdx AND tcount.PqIdx = answer.PqIdx
            ) AS base
            INNER JOIN {$this->_table['predict_code_r_subject']} AS pcrs ON base.SubjectCode = pcrs.SubjectCode AND pcrs.IsStatus = 'Y' AND pcrs.IsUse = 'Y'
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.IsWrong = 'Y'
                GROUP BY b.PqIdx
            ) AS rightAnswerAvg ON rightAnswerAvg.PpIdx = base.PpIdx AND rightAnswerAvg.PqIdx = base.PqIdx
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.Answer = '1'
                GROUP BY b.PqIdx
            ) AS answer1 ON answer1.PpIdx = base.PpIdx AND answer1.PqIdx = base.PqIdx
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.Answer = '2'
                GROUP BY b.PqIdx
            ) AS answer2 ON answer2.PpIdx = base.PpIdx AND answer2.PqIdx = base.PqIdx
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.Answer = '3'
                GROUP BY b.PqIdx
            ) AS answer3 ON answer3.PpIdx = base.PpIdx AND answer3.PqIdx = base.PqIdx
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.Answer = '4'
                GROUP BY b.PqIdx
            ) AS answer4 ON answer4.PpIdx = base.PpIdx AND answer4.PqIdx = base.PqIdx
            
            LEFT JOIN (
                SELECT b.PpIdx, b.PqIdx, COUNT(*) AS cnt
                FROM (
                    SELECT a.PredictIdx, a.SubjectCode, a.QuestionType, c.PpIdx, c.PqIdx
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS a ON pr.PrIdx = a.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.SubjectCode = b.SubjectCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_questions']} AS c ON b.PpIdx = c.PpIdx AND a.QuestionType = c.QuestionType
                    {$where}
                ) AS a
                INNER JOIN {$this->_table['predict_answerpaper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx AND b.Answer = '5'
                GROUP BY b.PqIdx
            ) AS answer5 ON answer5.PpIdx = base.PpIdx AND answer5.PqIdx = base.PqIdx
        ";

        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 답안정보 삭제
     */
    public function examDelete($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $predict_idx = element('predict_idx', $form_data);
            $pr_idx = element('pr_idx', $form_data);

            $arr_condition = [
                'EQ' => [
                    'a.PredictIdx' => $predict_idx,
                    'a.PrIdx' => $pr_idx,
                    'a.IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findRegisterData($arr_condition);
            if (empty($register_data) === true) {
                throw new \Exception('조회된 기본정보가 없습니다.');
            }

            if ($register_data['PointDelCnt'] >= 2) {
                throw new \Exception('재채점은 최대 2회만 가능합니다.');
            }

            $where = ['PrIdx' => $pr_idx];
            if($this->_conn->delete($this->_table['predict_answerpaper'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predict_grades_origin'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predict_grades'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }

            $point_del_cnt = $register_data['PointDelCnt'] + 1;
            if ($this->_conn->set(['PointDelCnt' => $point_del_cnt, 'PointDelDatm' => date('Y-m-d H:i:s')])
                    ->where('PrIdx', $pr_idx)
                    ->update($this->_table['predict_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 전체 직렬 성적 분석
     * 과목별, 합계
     * @param string $predict_idx
     * @param string $pr_idx
     */
    public function statsForGradesData($predict_idx = '', $pr_idx = '')
    {
        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx
            ]
        ];
        $where_1 = $this->_conn->makeWhere($arr_condition);
        $where_1 = $where_1->getMakeWhere(false);

        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx
                ,'a.PrIdx' => $pr_idx
            ]
        ];
        $where_2 = $this->_conn->makeWhere($arr_condition);
        $where_2 = $where_2->getMakeWhere(false);

        $query_string = /** @lang text */ "
            SELECT a.PredictIdx, a.PrIdx, a.PpIdx, a.GroupBy, a.SubjectName, a.MyOrgPoint, b.AvgMyRank, c.AvgOrgPoint, c.UserCnt
            ,(
                SELECT T.Top10AvgOrgPoint
                FROM (
                    SELECT A.PredictIdx, A.GroupBy, ROUND(AVG(A.OrgPoint),2) AS Top10AvgOrgPoint
                    FROM (
                        SELECT a.PredictIdx, a.PpIdx, a.GroupBy, a.OrgPoint
                            ,PERCENT_RANK() OVER (PARTITION BY a.GroupBy ORDER BY a.OrgPoint DESC) PaperPercRank
                        FROM (
                            SELECT a.PredictIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS OrgPoint
                            FROM {$this->_table['predict_grades_origin']} AS a
                            INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                            INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                            INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                            {$where_1}
                        ) as a
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100)
                    GROUP BY A.GroupBy
                ) AS T 
                WHERE a.PredictIdx = T.PredictIdx AND a.GroupBy = T.GroupBy
            ) AS Top10AvgOrgPoint
            
            ,(
                SELECT T.Top20AvgOrgPoint
                FROM (
                    SELECT A.PredictIdx, A.GroupBy, ROUND(AVG(A.OrgPoint),2) AS Top20AvgOrgPoint
                    FROM (
                        SELECT a.PredictIdx, a.PpIdx, a.GroupBy, a.OrgPoint
                            ,PERCENT_RANK() OVER (PARTITION BY a.GroupBy ORDER BY a.OrgPoint DESC) PaperPercRank
                        FROM (
                            SELECT a.PredictIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS OrgPoint
                            FROM {$this->_table['predict_grades_origin']} AS a
                            INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                            INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                            INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                            {$where_1}
                        ) as a
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (20 / 100)
                    GROUP BY A.GroupBy
                ) AS T 
                WHERE a.PredictIdx = T.PredictIdx AND a.GroupBy = T.GroupBy
            ) AS Top20AvgOrgPoint
            
            FROM (
                SELECT a.PredictIdx, a.PrIdx, a.PpIdx, c.GroupBy
                ,IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS MyOrgPoint
                ,D.CcdName AS SubjectName, d.OrderNum
                FROM {$this->_table['predict_grades_origin']} AS a
                INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                INNER JOIN {$this->_table['predict_code']} AS d ON c.SubjectCode = d.Ccd
                {$where_2}
            ) AS a
            INNER JOIN (
                SELECT
                    a.PrIdx, a.PpIdx, a.GroupBy, a.OrgPoint
                    ,ROUND(PERCENT_RANK() OVER (PARTITION BY a.GroupBy ORDER BY a.OrgPoint DESC) * 100,2) AS AvgMyRank
                FROM (
                    SELECT a.PrIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS OrgPoint
                    FROM {$this->_table['predict_grades_origin']} AS a
                    INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                    {$where_1}
                ) AS a
            ) AS b ON a.PrIdx = b.PrIdx AND a.GroupBy = b.GroupBy
            INNER JOIN (
                SELECT c.GroupBy, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)),2) AS AvgOrgPoint, COUNT(*) AS UserCnt
                FROM {$this->_table['predict_grades_origin']} AS a
                INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                {$where_1}
                GROUP BY c.GroupBy
            ) AS c ON a.GroupBy = c.GroupBy
        ";
        $order_by = $this->_conn->makeOrderBy(['a.OrderNum' => 'ASC'])->getMakeOrderBy();
        $return['list'] = $this->_conn->query($query_string . $order_by)->result_array();

        $stats_query_string = /** @lang text */ "
            SELECT
                ROUND(AVG(tAvg.MyOrgPoint),2) AS TotalMyOrgPoint
                ,ROUND(AVG(tAvg.AvgOrgPoint),2) AS TotalAvgOrgPoint
                ,ROUND(AVG(tAvg.Top10AvgOrgPoint),2) AS TotalTop10AvgOrgPoint
                ,ROUND(AVG(tAvg.Top20AvgOrgPoint),2) AS TotalTop20AvgOrgPoint
                ,ROUND(AVG(tAvg.AvgMyRank),2) AS TotalAvgMyRank
            FROM (
                {$query_string}
            ) AS tAvg
            GROUP BY tAvg.PredictIdx
        ";
        $return['stats'] = $this->_conn->query($stats_query_string)->row_array();

        return $return;
    }

    /**
     * 전체, 동일 직렬별 점수 분포 데이터
     * @param string $predict_idx
     * @param string $pr_idx
     * @param string $type
     * @return mixed
     */
    public function statsForChartData($predict_idx = '', $pr_idx = '', $type = 'total')
    {
        $add_where = '';
        if ($type != 'total') {
            $add_where = "
                AND a.PpIdx IN (
                    SELECT c.PpIdx
                    FROM {$this->_table['predict_register']} AS a
                    INNER JOIN {$this->_table['predict_register_r_code']} AS b ON a.PrIdx = b.PrIdx
                    INNER JOIN {$this->_table['predict_paper']} AS c ON b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                    WHERE a.PredictIdx = {$predict_idx} AND a.PrIdx = {$pr_idx} AND a.IsStatus = 'Y'
                )
            ";
        }

        $total_numbering_table = /** @lang text */ "SELECT '0' AS GroupBy, num AS n FROM tmp_numbers LIMIT 25";
        $group_numbering_table = /** @lang text */ "
            SELECT a.GroupBy, a.n
            FROM (SELECT '1' AS GroupBy, num AS n FROM tmp_numbers LIMIT 25) AS a
            UNION ALL SELECT GroupBy, n FROM (SELECT '2' AS GroupBy, num AS n FROM tmp_numbers LIMIT 25) AS b
            UNION ALL SELECT GroupBy, n FROM (SELECT '3' AS GroupBy, num AS n FROM tmp_numbers LIMIT 25) AS c
        ";

        $query_string = /** @lang text */ "
            SELECT
                m.GroupBy, m.n
                ,cnt AS cntSection
                ,ROUND((cnt / total) * 100,2) AS avgSection
                ,cntCumsum
                ,ROUND((cntCumsum / total) * 100,2) AS avgCumsum
                ,m.my_OrgPoint
                ,{$this->_setColumnForChartData()['title']} AS title
            FROM (
                SELECT a.GroupBy, a.n, IFNULL(b.cnt,0) AS cnt
                    ,IFNULL(SUM(b.cnt) OVER(PARTITION BY a.GroupBy ORDER BY a.GroupBy ASC, a.n DESC),'-') AS cntCumsum #누적인원
                    ,my.OrgPoint AS my_OrgPoint
                    ,(
                        SELECT total
                        FROM (
                            SELECT '0' AS GroupBy, COUNT(*) AS total
                            FROM (
                                SELECT PrIdx
                                FROM {$this->_table['predict_grades_origin']} AS a
                                INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                                INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode 
                                WHERE a.PredictIdx = {$predict_idx}
                                {$add_where}
                                GROUP BY a.PrIdx
                            ) AS a
                        ) AS total WHERE total.GroupBy = a.GroupBy
                    ) AS total
                FROM (
                    {$total_numbering_table}
                ) AS a
                LEFT JOIN (
                    SELECT '0' AS GroupBy, a.numberForScore, COUNT(*) AS cnt
                    FROM (
                        SELECT {$this->_setColumnForChartData()['numberForScore']} as numberForScore
                        FROM (
                            SELECT a.PrIdx, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)),2) AS OrgPoint
                            FROM {$this->_table['predict_grades_origin']} AS a
                            INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                            INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                            INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode 
                            WHERE a.PredictIdx = {$predict_idx}
                            {$add_where}
                            GROUP BY a.PrIdx
                        ) AS a
                    ) AS a
                    GROUP BY a.numberForScore
                ) AS b ON a.n = b.numberForScore
                LEFT JOIN (
                    SELECT a.GroupBy, a.OrgPoint, a.PrIdx
                    , {$this->_setColumnForChartData()['numberForScore']} as numberForScore
                    FROM (
                        SELECT a.PrIdx, '0' AS GroupBy, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)),2) AS OrgPoint
                        FROM {$this->_table['predict_grades_origin']} AS a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                        INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode
                        WHERE a.PredictIdx = '{$predict_idx}' AND a.PrIdx = '{$pr_idx}'
                        GROUP BY a.PrIdx
                    ) AS a
                ) AS my ON a.GroupBy = my.GroupBy AND a.n = my.numberForScore
                        
                ORDER BY a.n DESC
            ) AS m
            
            UNION ALL
        
            SELECT
                m.GroupBy, m.n
                ,cnt AS cntSection
                ,ROUND((cnt / total) * 100,2) AS avgSection
                ,cntCumsum
                ,ROUND((cntCumsum / total) * 100,2) AS avgCumsum
                ,m.my_OrgPoint
                ,{$this->_setColumnForChartData()['title']} AS title
            FROM (
                SELECT a.GroupBy, a.n, IFNULL(b.cnt,0) AS cnt
                    ,IFNULL(SUM(b.cnt) OVER(PARTITION BY a.GroupBy ORDER BY a.GroupBy ASC, a.n DESC),'-') AS cntCumsum #누적인원
                    ,my.OrgPoint AS my_OrgPoint
                    ,(
                        SELECT total
                        FROM (
                            SELECT c.GroupBy, COUNT(*) AS total
                            FROM {$this->_table['predict_grades_origin']} AS a
                            INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                            INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode 
                            WHERE a.PredictIdx = {$predict_idx}
                            {$add_where}
                            GROUP BY c.GroupBy
                        ) AS total WHERE total.GroupBy = a.GroupBy
                    ) AS total
                FROM (
                    {$group_numbering_table}
                ) AS a
                LEFT JOIN (
                    SELECT a.GroupBy, a.numberForScore, COUNT(*) AS cnt
                    FROM (                        
                        SELECT a.PredictIdx, a.PpIdx, a.GroupBy, a.OrgPoint,a.PrIdx
                            ,{$this->_setColumnForChartData()['numberForScore']} as numberForScore
                        FROM (
                            SELECT a.PredictIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS OrgPoint,a.PrIdx
                            FROM {$this->_table['predict_grades_origin']} AS a
                            INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx		
                            INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                            INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode
                            WHERE a.PredictIdx = {$predict_idx} 
                            {$add_where}
                        ) AS a
                    ) AS a
                    GROUP BY a.GroupBy, a.numberForScore
                ) AS b ON a.GroupBy = b.GroupBy AND a.n = b.numberForScore
                LEFT JOIN (
                    SELECT a.GroupBy, a.OrgPoint, a.PrIdx
                    , {$this->_setColumnForChartData()['numberForScore']} as numberForScore
                    FROM (
                        SELECT a.PrIdx, c.GroupBy, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)),2) AS OrgPoint
                        FROM {$this->_table['predict_grades_origin']} AS a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx
                        INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode
                        WHERE a.PredictIdx = '{$predict_idx}' AND a.PrIdx = '{$pr_idx}'
                        GROUP BY a.PrIdx, c.GroupBy
                    ) AS a
                ) AS my ON a.GroupBy = my.GroupBy AND a.n = my.numberForScore
                
                ORDER BY a.GroupBy ASC, a.n DESC
            ) AS m
        ";
        return $this->_conn->query($query_string)->result_array();
    }

    /**
     * 전체 직렬별 나의 성적 위치
     * @param string $predict_idx
     * @param string $pr_idx
     * @param string $type
     */
    public function statsForAvgData($predict_idx = '', $pr_idx = '', $query_type = 'total', $data_type = 'myself')
    {
        $add_where_query = '';
        if ($query_type != 'total') {
            $add_where_query = "
                AND a.PpIdx IN (
                    SELECT a.PpIdx
                    FROM {$this->_table['predict_paper']} AS a
                    INNER JOIN {$this->_table['predict_register_r_code']} AS b ON a.SubjectCode = b.SubjectCode
                    WHERE a.PredictIdx = {$predict_idx} AND b.PrIdx = {$pr_idx}
                    AND a.IsStatus = 'Y' AND a.IsUse = 'Y'
                )
            ";
        }

        switch ($data_type) {
            case "myself" :
                $main_from = /** @lang text */ "
                    SELECT a.PrIdx, ROUND(AVG(a.OrgPoint), 2) AS avgOrgPoint
                    FROM {$this->_table['predict_grades_origin']} as a
                    INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                    WHERE a.PredictIdx = {$predict_idx} AND a.PrIdx = {$pr_idx}
                    GROUP BY a.PrIdx
                ";
                break;
            case "high_rank" :
                $main_from = /** @lang text */ "
                    SELECT a.PredictIdx, a.PrIdx, a.avgOrgPoint
                    FROM (
                        SELECT a.PredictIdx, a.PrIdx, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)), 2) AS avgOrgPoint
                        FROM {$this->_table['predict_grades_origin']} as a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        WHERE a.PredictIdx = {$predict_idx}
                        {$add_where_query}
                        GROUP BY a.PrIdx
                    ) AS a
                    WHERE a.avgOrgPoint >
                    (
                        SELECT ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)), 2) AS MyAvgOrgPoint
                        FROM {$this->_table['predict_grades_origin']} as a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        WHERE a.PredictIdx = {$predict_idx} AND a.PrIdx = {$pr_idx}
                        GROUP BY a.PrIdx
                    )
                    ORDER BY a.avgOrgPoint DESC
                    LIMIT 2
                ";
                break;
            case "low_rank" :
                $main_from = /** @lang text */ "
                    SELECT a.PredictIdx, a.PrIdx, a.avgOrgPoint
                    FROM (
                        SELECT a.PredictIdx, a.PrIdx, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)), 2) AS avgOrgPoint
                        FROM {$this->_table['predict_grades_origin']} as a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        WHERE a.PredictIdx = {$predict_idx}
                        {$add_where_query}
                        GROUP BY a.PrIdx
                    ) AS a
                    WHERE a.avgOrgPoint <
                    (
                        SELECT ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)), 2) AS MyAvgOrgPoint
                        FROM {$this->_table['predict_grades_origin']} as a
                        INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                        WHERE a.PredictIdx = {$predict_idx} AND a.PrIdx = {$pr_idx}
                        GROUP BY a.PrIdx
                    )
                    ORDER BY a.avgOrgPoint DESC
                    LIMIT 2
                ";
                break;
        }

        $column = "
            a.PrIdx, a.avgOrgPoint, t.UserRank, t.UserAvgRank
            ,(
                SELECT CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT('OrderNum', c1.OrderNum,'PpIdx', a1.PpIdx,'OrgPoint', IF(a1.OrgPoint >= 10, a1.OrgPoint + pr.AddPoint, a1.OrgPoint))
                            ORDER BY c1.OrderNum ASC)
                        ,']') AS jsonOrgPoint
                FROM {$this->_table['predict_grades_origin']} AS a1
                INNER JOIN {$this->_table['predict_register']} AS pr ON a1.PredictIdx = pr.PredictIdx AND a1.PrIdx = pr.PrIdx
                INNER JOIN {$this->_table['predict_paper']} AS b1 ON a1.PpIdx = b1.PpIdx
                INNER JOIN {$this->_table['predict_code_r_subject']} AS c1 ON b1.SubjectCode = c1.SubjectCode
                WHERE a1.PredictIdx = {$predict_idx} AND a1.PrIdx = a.PrIdx
                GROUP BY a1.PrIdx
            ) AS jsonOrgPoint
        ";

        $query_string = "SELECT" . $column . "
            FROM (
                {$main_from}
            ) AS a
            INNER JOIN (
                SELECT
                t.PrIdx
                ,RANK() OVER (PARTITION BY t.PredictIdx ORDER BY t.avgOrgPoint DESC) UserRank
                ,ROUND(PERCENT_RANK() OVER (PARTITION BY t.PredictIdx ORDER BY t.avgOrgPoint DESC) * 100,2) AS UserAvgRank
                FROM (
                    SELECT a.PredictIdx, a.PrIdx, ROUND(AVG(IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint)), 2) AS avgOrgPoint
                    FROM {$this->_table['predict_grades_origin']} as a
                    INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                    WHERE a.PredictIdx = {$predict_idx}
                    {$add_where_query}
                    GROUP BY a.PrIdx
                ) AS t
            ) AS t ON a.PrIdx = t.PrIdx
        ";

        return $this->_conn->query($query_string)->result_array();
    }

    /**
     * 합격예측 결과 데이터
     * 전체 직렬 기준 : 내점수, 상위10%컷, 합격여부, 합격 **권
     * @param string $predict_idx
     * @param string $pr_idx
     * @return mixed
     */
    public function fullServiceForResult($predict_idx = '', $pr_idx = '')
    {
        $column = "
            t.PredictIdx, t.PrIdx, t.TotalMyOrgPoint, t.TotalTop10AvgOrgPoint, t.TakeMockPart, t.TakeArea
            ,gl.StabilityAvrPoint, gl.StrongAvrPoint2, gl.StrongAvrPoint1, gl.ExpectAvrPoint2, gl.ExpectAvrPoint1, gl.PassLineAgo
            ,IF (gl.StrongAvrPoint2 <= t.TotalMyOrgPoint && gl.StabilityAvrPoint >= t.TotalMyOrgPoint, 'Y', 'N') AS IsPass
        ";
        $from = "
            FROM (
                SELECT tAvg.PredictIdx, tAvg.PrIdx
                ,ROUND(AVG(tAvg.MyOrgPoint),2) AS TotalMyOrgPoint
                ,ROUND(AVG(tAvg.Top10AvgOrgPoint),2) AS TotalTop10AvgOrgPoint
                ,tAvg.TakeMockPart, tAvg.TakeArea
                FROM (
                    SELECT a.PredictIdx, a.PrIdx, a.MyOrgPoint, a.TakeMockPart, a.TakeArea
                    ,(
                        SELECT T.Top10AvgOrgPoint
                        FROM (
                            SELECT A.PredictIdx, A.GroupBy, ROUND(AVG(A.OrgPoint),2) AS Top10AvgOrgPoint
                            FROM (
                                SELECT a.PredictIdx, a.PpIdx, a.GroupBy, a.OrgPoint
                                    ,PERCENT_RANK() OVER (PARTITION BY a.GroupBy ORDER BY a.OrgPoint DESC) PaperPercRank
                                FROM (
                                    SELECT a.PredictIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + pr.AddPoint, a.OrgPoint) AS OrgPoint
                                    FROM {$this->_table['predict_grades_origin']} AS a
                                    INNER JOIN {$this->_table['predict_register']} AS pr ON a.PredictIdx = pr.PredictIdx AND a.PrIdx = pr.PrIdx
                                    INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                                    INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                                    WHERE a.PredictIdx = {$predict_idx}
                                ) AS a
                            ) AS A
                            WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100)
                            GROUP BY A.GroupBy
                        ) AS T 
                        WHERE a.PredictIdx = T.PredictIdx AND a.GroupBy = T.GroupBy
                    ) AS Top10AvgOrgPoint   
                    FROM (
                        SELECT a.PredictIdx, a.PrIdx, a.PpIdx, c.GroupBy, IF(a.OrgPoint >= {$this->_cut_line}, a.OrgPoint + r.AddPoint, a.OrgPoint) AS MyOrgPoint
                        ,r.TakeMockPart, r.TakeArea
                        FROM {$this->_table['predict_register']} AS r
                        INNER JOIN {$this->_table['predict_grades_origin']} AS a ON a.PredictIdx = r.PredictIdx AND a.PrIdx = r.PrIdx
                        INNER JOIN {$this->_table['predict_paper']} AS b ON a.PredictIdx = b.PredictIdx AND a.PpIdx = b.PpIdx AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
                        INNER JOIN {$this->_table['predict_code_r_subject']} AS c ON b.PredictIdx = c.PredictIdx AND b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                        WHERE a.PredictIdx = {$predict_idx}
                        AND a.PrIdx = {$pr_idx}
                    ) AS a
                ) AS tAvg
                GROUP BY tAvg.PredictIdx
            ) AS t
            LEFT JOIN {$this->_table['predict_grades_line']} AS gl ON t.PredictIdx = gl.PredictIdx AND t.TakeMockPart = gl.TakeMockPart AND t.TakeArea = gl.TakeArea
        ";
        return $this->_conn->query('SELECT ' . $column . $from)->row_array();
    }


    /**
     * 합격예측 기본정보 등록/수정 데이터 셋팅
     * @param array $form_data
     * @return array
     */
    private function setInputDataForRegister($form_data = [])
    {
        return [
            'ApplyType' => element('apply_type', $form_data, '합격예측')
            ,'PredictIdx' => element('predict_idx', $form_data)
            ,'MemIdx' => $this->session->userdata('mem_idx')
            ,'SiteCode' => element('site_code', $form_data)
            ,'TakeNumber' => element('take_number', $form_data)
            ,'TakeMockPart' => element('take_mock_part', $form_data)
            ,'TakeArea' => element('take_area', $form_data)
            ,'AddPoint' => element('add_point', $form_data, 0)
            ,'LectureType' => element('lecture_type', $form_data)
            ,'Period' => element('Period', $form_data)
        ];
    }

    /**
     * 기본정보 과목 저장
     * @param array $form_data
     * @param null $pr_idx
     * @return array|bool
     */
    private function addRegisterRSubjectCode($form_data = [], $pr_idx = null)
    {
        try {
            $subject_s = element('subject_s', $form_data);
            $subject_p = element('subject_p', $form_data);
            if(empty($subject_s)===false){
                for($i=0; $i < count($subject_s); $i++){
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $pr_idx,
                        'PredictIdx' => element('predict_idx', $form_data),
                        'SubjectCode' => $subject_s[$i],
                        'QuestionType' => element('question_type', $form_data,1),
                    );
                    if ($this->_conn->set($data)->insert($this->_table['predict_register_r_code']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }

            if(empty($subject_p)===false) {
                for ($i = 0; $i < count($subject_p); $i++) {
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $pr_idx,
                        'PredictIdx' => element('predict_idx', $form_data),
                        'SubjectCode' => $subject_p[$i],
                        'QuestionType' => element('question_type', $form_data,1),
                    );
                    if ($this->_conn->set($data)->insert($this->_table['predict_register_r_code']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 회원 답안 정보 삭제
     * @param $pr_idx
     * @return bool|string
     */
    private function _answerPaperDelete($pr_idx)
    {
        try {
            $where = ['PrIdx' => $pr_idx];
            if($this->_conn->delete($this->_table['predict_answerpaper'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predict_grades_origin'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predict_grades'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 점수 저장
     * @param string $predict_idx
     * @param string $pr_idx
     * @return bool|string
     */
    private function _addGradesOrigin($predict_idx = '', $pr_idx = '')
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'pr.PredictIdx' => $predict_idx
                    ,'pr.PrIdx' => $pr_idx
                    ,'a.IsWrong' => 'Y'
                ]
            ];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $query_string = /** @lang text */ "
                INSERT INTO {$this->_table['predict_grades_origin']} (MemIdx, PrIdx, PredictIdx, PpIdx, TakeMockPart, TakeArea, OrgPoint)
                (
                    SELECT pr.MemIdx, pr.PrIdx, pr.PredictIdx, pp.PpIdx, pr.TakeMockPart, pr.TakeArea, SUM(b.Scoring) AS SUM
                    FROM {$this->_table['predict_register']} AS pr
                    INNER JOIN {$this->_table['predict_register_r_code']} AS prc ON pr.PrIdx = prc.PrIdx
                    INNER JOIN {$this->_table['predict_code_r_subject']} AS pcrs ON prc.SubjectCode = pcrs.SubjectCode AND IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_paper']} AS pp ON pcrs.SubjectCode = pp.SubjectCode AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
                    INNER JOIN {$this->_table['predict_answerpaper']} AS a ON pr.PrIdx = a.PrIdx AND pp.PpIdx = a.PpIdx
                    INNER JOIN {$this->_table['predict_questions']} AS b ON a.PqIdx = b.PqIdx AND prc.QuestionType = b.QuestionType
                    {$where}
                    GROUP BY a.PpIdx ORDER BY a.PpIdx ASC
                )
            ";
            if($this->_conn->query($query_string) === false) {
                throw new \Exception('답안등록에 실패했습니다.');
            };

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    private function _setColumnForChartData()
    {
        $return['title'] = "
            (
                CASE WHEN m.n = 1 THEN '~4점'
                WHEN m.n = 2 THEN '4점~8점'
                WHEN m.n = 3 THEN '8점~12점'
                WHEN m.n = 4 THEN '12점~16점'
                WHEN m.n = 5 THEN '16점~20점'
                WHEN m.n = 6 THEN '20점~24점'
                WHEN m.n = 7 THEN '24점~28점'
                WHEN m.n = 8 THEN '28점~32점'
                WHEN m.n = 9 THEN '32점~36점'
                WHEN m.n = 10 THEN '36점~40점'
                WHEN m.n = 11 THEN '40점~44점'
                WHEN m.n = 12 THEN '44점~48점'
                WHEN m.n = 13 THEN '48점~52점'
                WHEN m.n = 14 THEN '52점~56점'
                WHEN m.n = 15 THEN '56점~60점'
                WHEN m.n = 16 THEN '60점~64점'
                WHEN m.n = 17 THEN '64점~68점'
                WHEN m.n = 18 THEN '68점~72점'
                WHEN m.n = 19 THEN '72점~76점'
                WHEN m.n = 20 THEN '76점~80점'
                WHEN m.n = 21 THEN '80점~84점'
                WHEN m.n = 22 THEN '84점~88점'
                WHEN m.n = 23 THEN '88점~92점'
                WHEN m.n = 24 THEN '92점~96점'
                ELSE '96점~'
            END)
        ";

        $return['numberForScore'] = "
            (
                CASE WHEN a.OrgPoint < 4 THEN '1'
                WHEN a.OrgPoint BETWEEN 4 AND 7 THEN '2'
                WHEN a.OrgPoint BETWEEN 8 AND 11 THEN '3'
                WHEN a.OrgPoint BETWEEN 12 AND 15 THEN '4'
                WHEN a.OrgPoint BETWEEN 16 AND 19 THEN '5'
                WHEN a.OrgPoint BETWEEN 20 AND 23 THEN '6'
                WHEN a.OrgPoint BETWEEN 24 AND 27 THEN '7'
                WHEN a.OrgPoint BETWEEN 28 AND 31 THEN '8'
                WHEN a.OrgPoint BETWEEN 32 AND 35 THEN '9'
                WHEN a.OrgPoint BETWEEN 36 AND 39 THEN '10'
                WHEN a.OrgPoint BETWEEN 40 AND 43 THEN '11'
                WHEN a.OrgPoint BETWEEN 44 AND 47 THEN '12'
                WHEN a.OrgPoint BETWEEN 48 AND 51 THEN '13'
                WHEN a.OrgPoint BETWEEN 52 AND 55 THEN '14'
                WHEN a.OrgPoint BETWEEN 56 AND 59 THEN '15'
                WHEN a.OrgPoint BETWEEN 60 AND 63 THEN '16'
                WHEN a.OrgPoint BETWEEN 64 AND 67 THEN '17'
                WHEN a.OrgPoint BETWEEN 68 AND 71 THEN '18'
                WHEN a.OrgPoint BETWEEN 72 AND 75 THEN '19'
                WHEN a.OrgPoint BETWEEN 76 AND 79 THEN '20'
                WHEN a.OrgPoint BETWEEN 80 AND 83 THEN '21'
                WHEN a.OrgPoint BETWEEN 84 AND 87 THEN '22'
                WHEN a.OrgPoint BETWEEN 88 AND 91 THEN '23'
                WHEN a.OrgPoint BETWEEN 92 AND 95 THEN '24'
                ELSE '25'
            END)
        ";

        return $return;
    }
}