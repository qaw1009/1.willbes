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
        'predict2_register' => 'lms_predict2_register',
        'predict2_register_r_paper' => 'lms_predict2_register_r_paper',
        'predict2_answerpaper' => 'lms_predict2_answerpaper',
        'predict2_grades_origin' => 'lms_predict2_grades_origin',
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
        $group_by = ' GROUP BY PPRP.PpIdx';
        $order_by = ' ORDER BY PPRP.OrderNum ASC';

        return $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
    }

    /**
     * 과목별 문항 조회 및 답안정보
     * @param $idx
     * @param null $prIdx
     * @return mixed
     */
    public function getQuestionForAnswer($idx, $prIdx = null)
    {
        $member_idx = (empty($this->session->userdata('mem_idx')) === true) ? '' : $this->session->userdata('mem_idx');
        $arr_condition = [
            'EQ' => [
                'PP.PredictIdx2' => $idx,
                'PP.IsStatus' => 'Y',
                'PP.IsUse' => 'Y',
                'PPRP.IsStatus' => 'Y',
            ]
        ];
        $column = "
            q.PqIdx, q.PpIdx, q.QuestionNO, q.QuestionOption, q.RightAnswer, q.Scoring, pa.Answer
        ";

        $from = "
            FROM {$this->_table['product_predict2']} AS PP
            INNER JOIN {$this->_table['product_predict2_r_paper']} AS PPRP ON PP.PredictIdx2 = PPRP.PredictIdx2
            INNER JOIN {$this->_table['predict2_questions']} AS q ON PPRP.PpIdx = q.PpIdx
            LEFT JOIN {$this->_table['predict2_answerpaper']} AS pa ON q.PqIdx = pa.PqIdx AND pa.MemIdx = '{$member_idx}' AND PPRP.PredictIdx2 = '{$idx}' AND pa.PrIdx = '{$prIdx}'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = 'ORDER BY q.PpIdx, q.QuestionNO ASC';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 기본정보조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findPredictForRegister($arr_condition, $column = 'PrIdx')
    {
        $from = " FROM {$this->_table['predict2_register']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * Research1
     * @param $form_data
     * @return bool|string
     */
    public function addPredict2Research1($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition);
            if(empty($register_data) === false) {
                throw new \Exception('이미 등록된 정보가 있습니다.');
            }

            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'TakeNumber' => element('take_num', $form_data),
                    'TakeMockPart' => element('take_mock_part', $form_data),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition);
            if(empty($register_data) === false) {
                throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
            }

            $subjectData = $this->getSubjectList(element('predict_idx', $form_data));
            if (empty($subjectData) === true) {
                throw new Exception('조회된 과목이 없습니다.');
            }

            $questionData = $this->getQuestionForAnswer(element('predict_idx', $form_data));
            if (empty($questionData) === true) {
                throw new Exception('조회된 문항이 없습니다.');
            }
            $setQuestionData = [];
            foreach ($questionData as $key => $row) {
                $setQuestionData[$row['PpIdx']][] = $row['PqIdx'];
            }

            $setArr_subject_answer = [];
            $take_level = '';
            foreach ($subjectData as $row) {
                if (empty(element('take_level_'.$row['PpIdx'],$form_data)) === true) {
                    throw new Exception('과목별 체감난이도를 선택해 주세요.');
                }
                $setArr_subject_answer[$row['PpIdx']] = $row['PpIdx'];
                $take_level .= $row['PpIdx'].'|'.element('take_level_'.$row['PpIdx'],$form_data).',';
            }
            $take_level = substr($take_level, 0, -1);

            //답안정보셋팅
            $get_data_answer = [];
            foreach ($setArr_subject_answer as $key => $ppidx) {
                $input_answer = element('Answer_'.$ppidx, $form_data);
                foreach ($input_answer as $key2 => $val) {
                    if (strlen($val) != 5) {
                        throw new Exception('정답이 모두 입력되지 않았습니다.');
                    }
                    for ($i = 0; $i < strlen($val); $i++) {
                        $get_data_answer[$ppidx][] = substr($val, $i, 1);
                    }
                }
            }

            $register_tel = (empty(element('register_tel', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_tel', $form_data));
            $register_email = (empty(element('register_email', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_email', $form_data));

            $ins_reg_data = [
                'SiteCode' => element('SiteCode', $form_data),
                'PredictIdx2' => element('predict_idx', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'UserTelEnc' => $register_tel,
                'UserMailEnc' => $register_email,
                'TakeMockPart' => element('take_mock_part', $form_data),
                'TakeNumber' => element('take_num', $form_data),
                'TakeCount' => element('take_cnt', $form_data),
                'TakeLevel' => $take_level,
            ];
            if ($this->_conn->set($ins_reg_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predict2_register']) === false) {
                throw new \Exception('기본정보 저장에 실패했습니다.');
            }
            $nowIdx = $this->_conn->insert_id();

            $ins_reg_paper_data = [];
            foreach ($subjectData as $row) {
                $ins_reg_paper_data[] = [
                    'PrIdx' => $nowIdx,
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'PpIdx' => $row['PpIdx'],
                    'SubjectIdx' => $row['SubjectIdx']
                ];
            }
            if ($this->_conn->insert_batch($this->_table['predict2_register_r_paper'], $ins_reg_paper_data) === false) {
                throw new \Exception('과목정보 저장에 실패했습니다.');
            }

            $ins_answer_data = [];
            foreach ($setQuestionData as $pk => $row) {
                foreach ($row as $k => $v) {
                    if ($this->isNumberChk($get_data_answer[$pk][$k]) !== true) {throw new \Exception('허용되지 않은 문자입니다.');}
                    $ins_answer_data[] = [
                        'PredictIdx2' => element('predict_idx', $form_data),
                        'PrIdx' => $nowIdx,
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'PpIdx' => $pk,
                        'PqIdx' => $v,
                        'Answer' => (empty($get_data_answer[$pk]) === true) ? '' : $get_data_answer[$pk][$k],
                        'RegDatm' => date('Y-m-d H:i:s')
                    ];
                }
            }

            if ($this->_conn->insert_batch($this->_table['predict2_answerpaper'], $ins_answer_data) === false) {
                throw new \Exception('문항 정보 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return $e->getMessage();
        }
        return true;
    }

    /**
     * Research1
     * @param $form_data
     * @return bool|string
     */
    public function modifyPredict2Research1($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'PrIdx' => element('PrIdx', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition, 'PrIdx, TakeMockPart, TakeNumber');
            if(empty($register_data) === true) {
                throw new \Exception('등록된 기본정보가 없습니다.');
            }

            //기존 등록된 직렬,응시번호 값이 달라진 경우 체크
            if ($register_data['TakeMockPart'] != element('take_mock_part', $form_data) || $register_data['TakeNumber'] != element('take_num', $form_data)) {
                $arr_condition = [
                    'EQ' => [
                        'PredictIdx2' => element('predict_idx', $form_data),
                        'TakeNumber' => element('take_num', $form_data),
                        'TakeMockPart' => element('take_mock_part', $form_data),
                        'IsStatus' => 'Y'
                    ]
                ];
                $register_data2 = $this->findPredictForRegister($arr_condition);
                if (empty($register_data2) === false) {
                    throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
                }
            }

            $subjectData = $this->getSubjectList(element('predict_idx', $form_data));
            if (empty($subjectData) === true) {
                throw new Exception('조회된 과목이 없습니다.');
            }

            $questionData = $this->getQuestionForAnswer(element('predict_idx', $form_data));
            if (empty($questionData) === true) {
                throw new Exception('조회된 문항이 없습니다.');
            }
            $setQuestionData = [];
            foreach ($questionData as $key => $row) {
                $setQuestionData[$row['PpIdx']][] = $row['PqIdx'];
            }

            $setArr_subject_answer = [];
            $take_level = '';
            foreach ($subjectData as $row) {
                if (empty(element('take_level_'.$row['PpIdx'],$form_data)) === true) {
                    throw new Exception('과목별 체감난이도를 선택해 주세요.');
                }
                $setArr_subject_answer[$row['PpIdx']] = $row['PpIdx'];
                $take_level .= $row['PpIdx'].'|'.element('take_level_'.$row['PpIdx'],$form_data).',';
            }
            $take_level = substr($take_level, 0, -1);

            //답안정보셋팅
            $get_data_answer = [];
            foreach ($setArr_subject_answer as $key => $ppidx) {
                $input_answer = element('Answer_'.$ppidx, $form_data);
                foreach ($input_answer as $key2 => $val) {
                    if (strlen($val) != 5) {
                        throw new Exception('정답이 모두 입력되지 않았습니다.');
                    }
                    for ($i = 0; $i < strlen($val); $i++) {
                        $get_data_answer[$ppidx][] = substr($val, $i, 1);
                    }
                }
            }

            $register_tel = (empty(element('register_tel', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_tel', $form_data));
            $register_email = (empty(element('register_email', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_email', $form_data));

            //기본정보수정
            $upd_reg_data = [
                'UserTelEnc' => $register_tel,
                'UserMailEnc' => $register_email,
                'TakeMockPart' => element('take_mock_part', $form_data),
                'TakeNumber' => element('take_num', $form_data),
                'TakeCount' => element('take_cnt', $form_data),
                'TakeLevel' => $take_level,
            ];
            $this->_conn->set($upd_reg_data)->set('UpdDatm', 'NOW()', false)->where('PrIdx', element('PrIdx', $form_data));
            if ($this->_conn->update($this->_table['predict2_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predict2_register_r_paper'], ['PrIdx' => element('PrIdx', $form_data)]) === false) {
                throw new \Exception('기본정보(과목) 삭제에 실패했습니다.');
            }
            $ins_reg_paper_data = [];
            foreach ($subjectData as $row) {
                $ins_reg_paper_data[] = [
                    'PrIdx' => element('PrIdx', $form_data),
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'PpIdx' => $row['PpIdx'],
                    'SubjectIdx' => $row['SubjectIdx']
                ];
            }
            if ($this->_conn->insert_batch($this->_table['predict2_register_r_paper'], $ins_reg_paper_data) === false) {
                throw new \Exception('과목정보 저장에 실패했습니다.');
            }


            //답안정보 삭제
            $result = $this->_examDelete(element('PrIdx', $form_data));
            if ($result !== true) {
                throw new \Exception($result);
            }

            $ins_answer_data = [];
            foreach ($setQuestionData as $pk => $row) {
                foreach ($row as $k => $v) {
                    if ($this->isNumberChk($get_data_answer[$pk][$k]) !== true) {throw new \Exception('허용되지 않은 문자입니다.');}
                    $ins_answer_data[] = [
                        'PredictIdx2' => element('predict_idx', $form_data),
                        'PrIdx' => element('PrIdx', $form_data),
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'PpIdx' => $pk,
                        'PqIdx' => $v,
                        'Answer' => (empty($get_data_answer[$pk]) === true) ? '' : $get_data_answer[$pk][$k],
                        'RegDatm' => date('Y-m-d H:i:s')
                    ];
                }
            }
            if ($this->_conn->insert_batch($this->_table['predict2_answerpaper'], $ins_answer_data) === false) {
                throw new \Exception('문항 정보 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return $e->getMessage();
        }
        return true;
    }

    /**
     * Research2
     * @param $form_data
     * @return bool|string
     */
    public function addPredict2Research2($form_data) {
        try {
            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition);
            if(empty($register_data) === false) {
                throw new \Exception('이미 등록된 정보가 있습니다.');
            }

            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'TakeNumber' => element('take_num', $form_data),
                    'TakeMockPart' => element('take_mock_part', $form_data),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition);
            if(empty($register_data) === false) {
                throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
            }

            $subjectData = $this->getSubjectList(element('predict_idx', $form_data));
            if (empty($subjectData) === true) {
                throw new Exception('조회된 과목이 없습니다.');
            }

            $questionData = $this->getQuestionForAnswer(element('predict_idx', $form_data));
            if (empty($questionData) === true) {
                throw new Exception('조회된 문항이 없습니다.');
            }

            if (empty(element('cut_point', $form_data)) === true) {
                throw new \Exception('PAST 커트라인 점수를 입력해 주세요.');
            }

            $take_level = '';
            foreach ($subjectData as $row) {
                if (empty(element('take_level_'.$row['PpIdx'],$form_data)) === true) {
                    throw new Exception('과목별 체감난이도를 선택해 주세요.');
                }
                $take_level .= $row['PpIdx'].'|'.element('take_level_'.$row['PpIdx'],$form_data).',';
            }
            $take_level = substr($take_level, 0, -1);

            $register_tel = (empty(element('register_tel', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_tel', $form_data));
            $register_email = (empty(element('register_email', $form_data)) === true) ? '' : $this->memberFModel->getEncString(element('register_email', $form_data));

            $ins_reg_data = [
                'SiteCode' => element('SiteCode', $form_data),
                'PredictIdx2' => element('predict_idx', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'UserTelEnc' => $register_tel,
                'UserMailEnc' => $register_email,
                'TakeMockPart' => element('take_mock_part', $form_data),
                'TakeNumber' => element('take_num', $form_data),
                'TakeCount' => element('take_cnt', $form_data),
                'TakeLevel' => $take_level,
                'CutPoint' => element('cut_point', $form_data),
                'IsFinish' => 'Y'
            ];
            if ($this->_conn->set($ins_reg_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predict2_register']) === false) {
                throw new \Exception('기본정보 저장에 실패했습니다.');
            }
            $nowIdx = $this->_conn->insert_id();

            $ins_reg_paper_data = [];
            foreach ($subjectData as $row) {
                $ins_reg_paper_data[] = [
                    'PrIdx' => $nowIdx,
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'PpIdx' => $row['PpIdx'],
                    'SubjectIdx' => $row['SubjectIdx']
                ];
            }
            if ($this->_conn->insert_batch($this->_table['predict2_register_r_paper'], $ins_reg_paper_data) === false) {
                throw new \Exception('과목정보 저장에 실패했습니다.');
            }

            $ScoreArr = element('Score', $form_data);
            $PpIdxArr = element('PpIdx', $form_data);
            foreach($ScoreArr as $key => $val) {
                if (empty($val) === true) {
                    throw new \Exception('본인 점수를 모두 입력해주세요.');
                }
                if ($this->isNumberChk($val) !== true) {throw new \Exception('허용되지 않은 문자입니다.');}

                $PpIdx = $PpIdxArr[$key];
                $data = [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'PrIdx'  => $nowIdx,
                    'PredictIdx2'=> element('predict_idx', $form_data),
                    'PpIdx' => $PpIdx,
                    'TakeMockPart' => element('take_mock_part', $form_data),
                    'OrgPoint' => $val
                ];

                if ($this->_conn->set($data)->insert($this->_table['predict2_grades_origin']) === false) {
                    throw new \Exception('저장에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return $e->getMessage();
        }
        return true;
    }

    /**
     * Research2
     * 성적저장, PAST 커트라인 업데이트, IsFinish 업데이트
     * @param $form_data
     * @return bool|string
     */
    public function modifyPredict2Research2($form_data) {
        try {
            if (empty(element('cut_point', $form_data)) === true) {
                throw new \Exception('PAST 커트라인 점수를 입력해 주세요.');
            }
            $arr_condition = [
                'EQ' => [
                    'PredictIdx2' => element('predict_idx', $form_data),
                    'PrIdx' => element('PrIdx', $form_data),
                    'IsStatus' => 'Y'
                ],
                'RAW' => [
                    'MemIdx' => (empty($this->session->userdata('mem_idx')) === true) ? '\'\'' : $this->session->userdata('mem_idx'),
                    'TakeMockPart' => (empty(element('take_mock_part_val', $form_data)) === true) ? '\'\'' : element('take_mock_part_val', $form_data),
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition, 'PrIdx, TakeMockPart, TakeNumber');
            if(empty($register_data) === true) {
                throw new \Exception('등록된 기본정보가 없습니다.');
            }

            //기존 등록된 직렬,응시번호 값이 달라진 경우 체크
            if ($register_data['TakeMockPart'] != element('take_mock_part', $form_data) || $register_data['TakeNumber'] != element('take_num', $form_data)) {
                $arr_condition = [
                    'EQ' => [
                        'PredictIdx2' => element('predict_idx', $form_data),
                        'TakeNumber' => element('take_num', $form_data),
                        'TakeMockPart' => element('take_mock_part', $form_data),
                        'IsStatus' => 'Y'
                    ]
                ];
                $register_data2 = $this->findPredictForRegister($arr_condition);
                if (empty($register_data2) === false) {
                    throw new \Exception('이미 등록된 응시번호입니다. 응시번호를 다시 확인해주세요');
                }
            }

            $subjectData = $this->getSubjectList(element('predict_idx', $form_data));
            if (empty($subjectData) === true) {
                throw new Exception('조회된 과목이 없습니다.');
            }

            $questionData = $this->getQuestionForAnswer(element('predict_idx', $form_data));
            if (empty($questionData) === true) {
                throw new Exception('조회된 문항이 없습니다.');
            }

            //origin data 삭제
            $result = $this->_originDelete(element('PrIdx', $form_data));
            if ($result !== true) {
                throw new \Exception($result);
            }

            //origin data 저장
            $ScoreArr = element('Score', $form_data);
            $PpIdxArr = element('PpIdx', $form_data);
            foreach($ScoreArr as $key => $val){
                if (empty($val) === true) {
                    throw new \Exception('본인 점수를 모두 입력해주세요.');
                }
                if ($this->isNumberChk($val) !== true) {throw new \Exception('허용되지 않은 문자입니다.');}

                $PpIdx = $PpIdxArr[$key];
                $data = [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'PrIdx'  => element('PrIdx', $form_data),
                    'PredictIdx2'=> element('predict_idx', $form_data),
                    'PpIdx' => $PpIdx,
                    'TakeMockPart' => element('take_mock_part_val', $form_data),
                    'OrgPoint' => $val
                ];

                if ($this->_conn->set($data)->insert($this->_table['predict2_grades_origin']) === false) {
                    throw new \Exception('저장에 실패했습니다.');
                }
            }

            $upd_reg_data = [
                'CutPoint' => element('cut_point', $form_data),
                'IsFinish' => 'Y',
            ];
            $this->_conn->set($upd_reg_data)->set('UpdDatm', 'NOW()', false)->where('PrIdx', element('PrIdx', $form_data));
            if ($this->_conn->update($this->_table['predict2_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return $e->getMessage();
        }
        return true;
    }

    /**
     * Research1 과목별 총점
     * @param $idx
     * @param $prIdx
     * @param $member_idx
     * @return mixed
     */
    public function getRegisterPaperForSumResearch1($idx, $prIdx, $member_idx)
    {
        $arr_condition = [
            'EQ' => [
                'pa.PredictIdx2' => $idx,

            ],
            'RAW' => [
                'pa.MemIdx' => (empty($member_idx) === true) ? '\'\'' : $member_idx,
                'pa.PrIdx' => (empty($prIdx) === true) ? '\'\'' : $prIdx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'po.*, pp.IsAvg';
        $from = "
            FROM (
                SELECT M.PrIdx, M.PredictIdx2, M.MemIdx, M.PpIdx, SUM(M.Scoring) AS Scoring
                FROM (
                SELECT 
                pa.MemIdx, pa.PrIdx, pa.PredictIdx2, pa.PpIdx, pa.Answer, pq.RightAnswer, pq.Scoring
                , IF (pa.Answer = pq.RightAnswer, 'Y','N') AS IsWrong
                FROM lms_predict2_answerpaper AS pa
                INNER JOIN lms_predict2_questions AS pq ON pa.PqIdx = pq.PqIdx AND pq.IsStatus = 'Y'
                {$where}
                ) AS M
                WHERE M.IsWrong = 'Y'
                GROUP BY M.PpIdx
            ) AS po
            INNER JOIN lms_predict2_paper AS pp ON po.PpIdx = pp.PpIdx
        ";
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * Research2 과목별 총점
     * @param $idx
     * @param $prIdx
     * @param $member_idx
     * @return mixed
     */
    public function getRegisterPaperForSumResearch2($idx, $prIdx, $member_idx)
    {
        $arr_condition = [
            'EQ' => [
                'po.PredictIdx2' => $idx,
                'po.PrIdx' => $prIdx,
            ],
            'RAW' => [
                'po.MemIdx' => (empty($member_idx) === true) ? '\'\'' : $member_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'po.PrIdx, po.PredictIdx2, po.MemIdx, po.PpIdx, po.OrgPoint AS Scoring, pp.IsAvg';
        $from = "
            FROM lms_predict2_grades_origin AS po
            INNER JOIN lms_predict2_paper AS pp ON po.PpIdx = pp.PpIdx
        ";
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 정답제출삭제
     * @param $PrIdx
     * @return array|bool
     */
    private function _examDelete($PrIdx)
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'PrIdx' => $PrIdx,
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition, 'PrIdx, PointDelCnt');
            if (empty($register_data) === true) {
                throw new \Exception('조회된 기본정보가 없습니다.');
            }

            $where = ['PrIdx' => $PrIdx];
            if($this->_conn->delete($this->_table['predict2_answerpaper'], $where) === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $point_del_cnt = $register_data['PointDelCnt'] + 1;
            if ($this->_conn->set(['PointDelCnt' => $point_del_cnt, 'PointDelDatm' => date('Y-m-d H:i:s')])->where('PrIdx', $PrIdx)->update($this->_table['predict2_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 점수삭제
     * @param $PrIdx
     * @return array|bool
     */
    private function _originDelete($PrIdx)
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'PrIdx' => $PrIdx,
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'IsStatus' => 'Y'
                ]
            ];
            $register_data = $this->findPredictForRegister($arr_condition, 'PrIdx, PointDelCnt');
            if (empty($register_data) === true) {
                throw new \Exception('조회된 기본정보가 없습니다.');
            }

            $where = ['PrIdx' => $PrIdx];
            if($this->_conn->delete($this->_table['predict2_grades_origin'], $where) === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $point_del_cnt = $register_data['PointDelCnt'] + 1;
            if ($this->_conn->set(['PointDelCnt' => $point_del_cnt, 'PointDelDatm' => date('Y-m-d H:i:s')])->where('PrIdx', $PrIdx)->update($this->_table['predict2_register']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 숫자체크
     * @param $string
     * @return bool
     */
    private function isNumberChk($string)
    {
        $return = true;
        if (!preg_match( '/^[0-9.]+$/', $string)) {
            $return = false;
        }
        return $return;
    }
}