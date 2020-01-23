<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockExamFModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_Product',
        'product_mock' => 'lms_product_mock',
        'product_r_category' => 'lms_product_r_category',
        'mock_register' => 'lms_mock_register',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_questions' => 'lms_mock_questions',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product_subject' => 'lms_product_subject',
        'product_sale' => 'lms_product_sale',
        'category' => 'lms_sys_category',
        'mock_log' => 'lms_mock_log',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 온라인모의고사 응시목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listExam($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['product_mock']} AS MP
                INNER JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                INNER JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' AND TakeFormsCcd = '690001' -- 온라인응시자
                INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx AND PayStatusCcd = '676001'  -- 결제완료
				INNER JOIN {$this->_table['order']} AS O ON O.OrderIdx = OP.OrderIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 모의고사 응시 정보
     * @param array $arr_condition
     * @return mixed
     */
    public function registerInfo($arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            MP.*, A.OrderProdIdx, A.MrIdx, A.TakeNumber, A.TakeMockPartName,
            IFNULL(A.IsDate, MP.TakeStartDatm) AS IsDate, A.MpIdx, A.subject_names,
            PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,
            C1.CateName, C1.IsUse AS IsUseCate, Temp.LogIdx,
            IFNULL((SELECT RemainSec FROM {$this->_table['mock_log']} WHERE MrIdx = A.MrIdx ORDER BY RemainSec LIMIT 1), (MP.TakeTime*60)) AS RemainSec
        ";

        $from = "
            FROM (
                SELECT 
                mr.ProdCode, mr.OrderProdIdx, mr.MrIdx, mr.TakeNumber, fn_ccd_name(mr.TakeMockPart) AS TakeMockPartName,
                mr.IsTake AS MrIsStatus, mr.RegDatm AS IsDate,
                GROUP_CONCAT(pmp.MpIdx) AS MpIdx,
                GROUP_CONCAT(CONCAT(pmp.MockType,'|',pmp.MpIdx,'@',ps.SubjectName)) AS subject_names
                FROM {$this->_table['mock_register']} AS mr
                JOIN {$this->_table['mock_register_r_paper']} AS mrp ON mr.MrIdx = mrp.MrIdx
                JOIN {$this->_table['product_mock_r_paper']} AS pmp ON mrp.ProdCode = pmp.ProdCode AND mrp.MpIdx = pmp.MpIdx
                JOIN {$this->_table['product_subject']} AS ps ON mrp.SubjectIdx = ps.SubjectIdx
                {$where}
                GROUP BY mr.ProdCode
            ) AS A
            INNER JOIN {$this->_table['product_mock']} AS MP ON MP.ProdCode = A.ProdCode
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN (
                SELECT ProdCode, LogIdx FROM {$this->_table['mock_answertemp']} AS MR {$where} LIMIT 1
            ) AS Temp ON MP.ProdCode = Temp.ProdCode
        ";

        $order_by = " ORDER BY A.ProdCode DESC";
        #echo '<pre>'.'select STRAIGHT_JOIN' . $column . $from . $order_by.'</pre>';
        return $this->_conn->query('select STRAIGHT_JOIN' . $column . $from . $order_by)->row_array();
    }

    /**
     * 임시저장 갯수(전체문항/임시저장문항)
     * @param $arr_condition
     * @param $mr_idx
     * @return mixed
     */
    public function questionTempCnt($arr_condition, $mr_idx)
    {
        $column = "
            MP.MpIdx, COUNT(*) AS TCNT,
            (SELECT COUNT(*) FROM {$this->_table['mock_answertemp']} WHERE MpIdx = Mp.MpIdx AND Answer != '0'  AND MemIdx = {$this->session->userdata('mem_idx')} AND MrIdx = {$mr_idx}) AS CNT
        ";

        $from = "
            FROM {$this->_table['mock_paper']} AS MP
            JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
        ";

        $order_by = " GROUP BY MP.MpIdx ORDER BY MP.MpIdx";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 문항정보호출
     * @param string $prod_code
     * @param string $mp_idx
     * @return array
     */
    public function listQuestion($prod_code = '', $mp_idx = '')
    {
        $arr_condition = ['IN' => ['MP.MpIdx' => explode(',', $mp_idx)]];
        $column = "
            MP.MpIdx, MQ.MqIdx, AnswerNum, QuestionNO,
            MQ.FilePath AS QFilePath, MP.FilePath AS PFilePath, MP.RealQuestionFile AS filetotal,
            IFNULL(NULLIF(MP.FrontRealQuestionFile,''),MP.RealQuestionFile) AS FrontRealQuestionFile,
            MQ.RealQuestionFile AS file, MT.Answer
        ";

        $from = "
            FROM {$this->_table['mock_paper']} AS MP
            JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['mock_answertemp']} AS MT ON MQ.MqIdx = MT.MqIdx AND MT.MemIdx = ".$this->session->userdata('mem_idx')." AND ProdCode = ".$prod_code."
        ";
        $order_by = " ORDER BY MP.MpIdx, QuestionNO ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $questionData = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();

        $arr_temp = [];
        foreach ($questionData as $key => $row) {
            $arr_temp[$row['MpIdx']][$key] = 1;
        }
        $mp_count = [];
        foreach ($arr_temp as $key => $val) {
            $mp_count[$key] = count($val);
        }

        $question_list = [];
        $i = 1;
        foreach ($questionData as $key => $row) {
            if ($i > $mp_count[$row['MpIdx']]) {$i = 1;}  //키 초기화
            $question_list[$row['MpIdx']][$i]['MqIdx'] = $row['MqIdx'];
            $question_list[$row['MpIdx']][$i]['AnswerNum'] = $row['AnswerNum'];
            $question_list[$row['MpIdx']][$i]['QuestionNO'] = $row['QuestionNO'];
            $question_list[$row['MpIdx']][$i]['QFilePath'] = $row['QFilePath'];
            $question_list[$row['MpIdx']][$i]['PFilePath'] = $row['PFilePath'];
            $question_list[$row['MpIdx']][$i]['filetotal'] = $row['filetotal'];
            $question_list[$row['MpIdx']][$i]['FrontRealQuestionFile'] = $row['FrontRealQuestionFile'];
            $question_list[$row['MpIdx']][$i]['file'] = $row['file'];
            $question_list[$row['MpIdx']][$i]['Answer'] = $row['Answer'];
            $i++;
        }
        return $question_list;
    }

    /**
     * 남은시간호출
     * @param $mr_idx
     * @return mixed
     */
    public function callRemainTime($mr_idx)
    {
        $arr_condition = ['EQ' => ['MrIdx' => $mr_idx]];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $column = "RemainSec";
        $from = " FROM {$this->_table['mock_log']}";
        $order_by = " ORDER BY RemainSec";
        //echo "<pre>".'select '. $column . $from . $where . $order_by."</pre>";
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->row_array();
    }

    /**
     * 임시저장 문항데이터 조회
     * @param string $return_type
     * @param $formData
     * @param array $add_condition
     * @return mixed
     */
    public function findAnswerTemp($formData, $add_condition = [], $return_type = 'row')
    {
        $column = "MatIdx, MqIdx";
        $from = " FROM {$this->_table['mock_answertemp']}";

        $arr_condition = [
            'EQ' => [
                'MemIdx'   => $this->session->userdata('mem_idx'),
                'ProdCode' => element('prod_code', $formData),
                'MrIdx' => element('mr_idx', $formData)
            ]
        ];
        $arr_condition = array_replace_recursive($arr_condition, $add_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        /*echo '<pre>'.'select ' . $column . $from . $where.'</pre>';*/
        $query = $this->_conn->query('select ' . $column . $from . $where);
        if ($return_type == 'row') {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    /**
     * 로그생성 시험시간 저장
     * @param $sec
     * @param $mr_idx
     * @return array|bool
     */
    public function makeExamLog($sec, $mr_idx)
    {
        $this->_conn->trans_begin();
        try {
            // 데이터 등록
            $log_data = [
                'LogType'=> 'S',
                'RegIp'=> $this->input->ip_address(),
                'RemainSec' => $sec,
                'MrIdx'=> $mr_idx
            ];

            if ($this->_conn->set($log_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mock_log']) === false) {
                throw new \Exception('시험로그 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $log_idx = $this->_conn->insert_id();

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true, 'dt' => ['log_idx' => $log_idx]];
    }

    /**
     * 문항별 임시저장/수정
     * @param array $formData
     * @return array|bool
     */
    public function answerTempSave($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $remain_sec = element('remain_sec', $formData);
            if ((empty($remain_sec) === true) || ($remain_sec <= 0)) {
                throw new Exception('시험이 종료되어 답안을 제출할 수 없습니다.');
            }

            $add_condition = [
                'EQ' => [
                    'MqIdx' => element('mq_idx', $formData),
                    'MpIdx' => element('mp_idx', $formData),
                ]
            ];
            $answer_temp_data = $this->findAnswerTemp($formData, $add_condition, 'row');
            if(empty($answer_temp_data['MatIdx']) === true) {
                $mode = 'add';
            } else {
                $mode = 'modify';
            }

            if ($this->{'_' . $mode . 'AnswerTemp'}($formData) !== true) {
                throw new \Exception('임시저장에 실패했습니다.');
            }

            if ($this->_saveTime(element('log_idx', $formData), $remain_sec) !== true) {
                throw new \Exception('시간저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 임시저장 전문항
     * @param array $formData
     * @return array|bool
     */
    public function answerTempAllSave($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $mp_idx = element('mp_idx',$formData);
            if (empty($formData['q_cnt_'.$mp_idx]) === true) { throw new Exception('잘못된 접근 입니다.'); }
            $cnt = element('q_cnt_'.$mp_idx,$formData);

            $remain_sec = element('remain_sec', $formData);
            if ((empty($remain_sec) === true) || ($remain_sec <= 0)) {
                throw new Exception('시험이 종료되어 답안을 제출할 수 없습니다.');
            }

            $add_condition = [
                'EQ' => [
                    'MpIdx' => element('mp_idx', $formData),
                ]
            ];
            $data = $this->findAnswerTemp($formData, $add_condition, 'list');
            $answer_temp_data = array_pluck($data, 'MatIdx', 'MqIdx');

            $dataReg = $dataMod = [];
            for ($i=1; $i<=$cnt; $i++) {
                $answer_key = $mp_idx.'_'.$i;
                if (isset($formData['answer_'.$answer_key]) === true) {
                    if (empty($answer_temp_data[element('mq_idx_'.$answer_key,$formData)]) === true) {
                        $dataReg[] = [
                            'MemIdx' => $this->session->userdata('mem_idx'),
                            'MrIdx'  => element('mr_idx',$formData),
                            'ProdCode'=> element('prod_code',$formData),
                            'LogIdx' => element('log_idx',$formData),
                            'MpIdx' => element('mp_idx',$formData),
                            'MqIdx' => element('mq_idx_' . $answer_key, $formData),
                            'Answer' => element('answer_' . $answer_key, $formData),
                        ];

                    } else {
                        $dataMod[] = [
                            'MatIdx' => $answer_temp_data[element('mq_idx_'.$answer_key,$formData)],
                            'Answer' => element('answer_'.$answer_key,$formData)
                        ];
                    }
                }
            }
            if($dataReg) $this->_conn->insert_batch($this->_table['mock_answertemp'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mock_answertemp'], $dataMod, 'MatIdx');
            if ($this->_saveTime(element('log_idx', $formData), $remain_sec) !== true) {
                throw new \Exception('시간저장에 실패했습니다.');
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 정답제출
     */
    public function answerSave($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $ProdCode = element('prod_code', $formData);
            $MrIdx = element('mr_idx', $formData);
            $MemIdx = $this->session->userdata('mem_idx');

            //삭제후 입력
            $where = ['MemIdx' => $MemIdx, 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx];
            if($this->_conn->delete($this->_table['mock_answerpaper'], $where) === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $insert_column = "
                MemIdx, MrIdx, ProdCode, MpIdx, MqIdx, LogIdx, Answer, IsWrong, RegDatm
            ";
            $select_column = "
                '".$MemIdx."', '".$MrIdx."', '".$ProdCode."', MA.MpIdx, MQ.MqIdx, LogIdx, Answer, if(LOCATE(Answer , RightAnswer), 'Y', 'N') AS IsWrong, MA.RegDatm
            ";
            $query = "
                INSERT INTO {$this->_table['mock_answerpaper']} ({$insert_column})
                SELECT {$select_column}
                FROM {$this->_table['mock_answertemp']} AS MA
                JOIN {$this->_table['mock_questions']} AS MQ ON MA.MqIdx = MQ.MqIdx AND MQ.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
                WHERE MemIdx = ".$MemIdx." AND ProdCode = ".$ProdCode." AND MrIdx = ".$MrIdx." ORDER BY MpIdx
            ";
            if($this->_conn->query($query) === false) {
                throw new \Exception('정답 제출에 실패했습니다.');
            };

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 로그 시간저장
     * @param string $log_idx
     * @param int $remain_sec
     * @return array|bool
     */
    public function saveTime($log_idx = '', $remain_sec = 0){
        $this->_conn->trans_begin();
        try {
            if ($this->_saveTime($log_idx, $remain_sec) === false) {
                throw new \Exception('시간저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 시험종료
     * @param array $formData
     * @return mixed
     */
    public function examEnd($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $ProdCode = element('prod_code', $formData);
            $LogIdx = element('log_idx', $formData);
            $MrIdx = element('mr_idx', $formData);

            // 데이터 수정
            $data = ['IsTake' => 'Y'];
            $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx]);
            if ($this->_conn->update($this->_table['mock_register']) === false) {
                throw new \Exception('상태수정에 실패했습니다.');
            }

            // 데이터 수정
            $data = ['LogType' => 'E'];
            $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['LogIdx' => $LogIdx]);
            if ($this->_conn->update($this->_table['mock_log']) === false) {
                throw new \Exception('상태수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 시간저장
     * @param $log_idx
     * @param $remain_sec
     * @return array|bool
     */
    private function _saveTime($log_idx, $remain_sec){
        try {
            $data = [
                'RemainSec' => $remain_sec
            ];
            $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['LogIdx' => $log_idx]);
            if ($this->_conn->update($this->_table['mock_log']) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 문항별 임시저장
     * @param array $formData
     * @return bool
     */
    private function _addAnswerTemp($formData = [])
    {
        try {
            $input_data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'MrIdx'  => element('mr_idx', $formData),
                'ProdCode'=> element('prod_code', $formData),
                'LogIdx' => element('log_idx', $formData),
                'MpIdx' => element('mp_idx', $formData),
                'MqIdx' => element('mq_idx', $formData),
                'Answer' => element('answer', $formData),
            ];

            if ($this->_conn->set($input_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mock_answertemp']) === false) {
                throw new \Exception('add fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 문항별 임시데이터 수정
     * @param array $formData
     * @return bool
     */
    private function _modifyAnswerTemp($formData = [])
    {
        try {
            $input_data = [
                'Answer' => element('answer', $formData),
                'LogIdx' => element('log_idx', $formData)
            ];
            $arr_where = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'ProdCode' => element('prod_code', $formData),
                'MrIdx' => element('mr_idx', $formData),
                'MpIdx' => element('mp_idx', $formData),
                'MqIdx' => element('mq_idx', $formData)
            ];
            $this->_conn->set($input_data)->set('RegDatm', 'NOW()', false)->where($arr_where);
            if ($this->_conn->update($this->_table['mock_answertemp']) === false) {
                throw new \Exception('modify fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}