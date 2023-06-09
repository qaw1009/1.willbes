<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGradeModel extends WB_Model
{
    private $_table = [
        'mock_paper' => 'lms_mock_paper_new',
        'mock_product' => 'lms_product_mock',
        'mock_questions' => 'lms_mock_questions',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_grades' => 'lms_mock_grades',
        'mock_grades_log' => 'lms_mock_grades_log',
        'mock_log' => 'lms_mock_log',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product' => 'lms_product',
        'product_subject' => 'lms_product_subject',
        'product_cate' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'order_product' => 'lms_order_product',
        'vw_product_mocktest' => 'vw_product_mocktest',
        'lms_member' => 'lms_member',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin'
    ];
    private $_take_form_ccd = '690002'; //오프라인

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['MP.ProdCode' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
                PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,'~',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_on']}) AS OnlineCnt,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_off']}) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_grades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,
                fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,
                C1.CateName, C1.IsUse AS IsUseCate, SC1.CcdName As AcceptStatusCcd_Name
            ";
        }

        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_table['product_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 모의고사 정보 조회
     * @param $prod_code
     * @return mixed
     */
    public function productInfo($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'MP.ProdCode' => $prod_code,
                'PD.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
            PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,' ~ ',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
            (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_on']}) AS OnlineCnt,
            (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_off']}) AS OfflineCnt,
            (SELECT COUNT(*) FROM {$this->_table['mock_grades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,  
            fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,
            C1.CateName, C1.IsUse AS IsUseCate, SC1.CcdName As AcceptStatusCcd_Name,
            MGL.LastGradesUpdAdminId, MGL.LastGradesUpdAdminName, MGL.LastGradesUpdDatm, ST.SiteName
            ,(
                SELECT COUNT(*) AS mp_cnt
                FROM {$this->_table['product_mock_r_paper']} AS a
                INNER JOIN {$this->_table['mock_questions']} AS b ON a.MpIdx = b.MpIdx AND b.IsStatus = 'Y'
                WHERE a.ProdCode = '{$prod_code}' AND a.IsStatus = 'Y'
            ) AS TotalCountQuestion
        ";

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode
            JOIN {$this->_table['product_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['site']} AS ST ON PD.SiteCode = ST.SiteCode
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
            LEFT JOIN (
                SELECT MemId AS LastGradesUpdAdminId, b.wAdminName AS LastGradesUpdAdminName, RegDatm AS LastGradesUpdDatm, ProdCode
                FROM {$this->_table['mock_grades_log']} AS a
                INNER JOIN {$this->_table['admin']} AS b ON a.MemId = b.wAdminId
                WHERE ProdCode = '{$prod_code}'
                ORDER BY MglIdx DESC
                LIMIT 1
            ) AS MGL ON MP.ProdCode = MGL.ProdCode
        ";
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }

    /**
     * 중복된 OFF답안정보 조회
     * @param $prod_code
     * @param $answer_count
     * @return mixed
     */
    public function OverAnswerpaperForOffMember($prod_code, $answer_count)
    {
        $arr_condition = [
            'EQ' => [
                'MR.ProdCode' => $prod_code,
                'MR.IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'MB.MemId, MB.MemName, MR.MrIdx, COUNT(*) AS AnswerCnt';
        $from = "
            FROM {$this->_table['mock_product']} AS PM
            JOIN {$this->_table['mock_register']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' AND MR.TakeForm = '{$this->_take_form_ccd}'
            JOIN {$this->_table['mock_answerpaper']} AS MA ON MR.MrIdx = MA.MrIdx AND MR.ProdCode = MA.Prodcode
            JOIN {$this->_table['lms_member']} AS MB ON MR.MemIdx = MB.MemIdx
        ";
        $etc_query = "
            GROUP BY MR.MrIdx
            HAVING AnswerCnt > {$answer_count}
        ";
        $order_by = $this->_conn->makeOrderBy(['MR.MrIdx' => 'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $etc_query . $order_by)->result_array();
    }

    /**
     * 중복문항 삭제
     * @param array $form_data
     * @return array|bool
     */
    public function deleteAnswerPaper($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_mr_idx = json_decode($form_data['params'], true);
            $arr_condition = [
                'EQ' => [
                    'a.ProdCode' => element('prod_code', $form_data),
                    'a.TakeForm' => $this->_take_form_ccd
                ],
                'IN' => [
                    'a.MrIdx' => $arr_mr_idx
                ]
            ];
            $where = $this->_conn->makewhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $from = "
                FROM {$this->_table['mock_register']} as a
            ";
            $data = $this->_conn->query('select MrIdx' . $from . $where)->result_array();
            if (empty($data) === true) {
                throw new Exception('조회된 데이터가 없습니다.');
            }

            //log 저장
            $log_query_string = "
                lms_mock_answerpaper_delete_log (
                    MapIdx,MemIdx,MrIdx,ProdCode,MpIdx,MqIdx,LogIdx,Answer,IsWrong,TakeForm,RegDatm,LogDatm,RegAdminIdx,RegIp
                )
                SELECT
                    b.MapIdx,b.MemIdx,b.MrIdx,b.ProdCode,b.MpIdx,b.MqIdx,b.LogIdx,b.Answer,b.IsWrong,b.TakeForm,b.RegDatm
                    ,'".date('Y-m-d H:i:s')."' as LogDatm
                    ,'".$this->session->userdata('admin_idx')."' AS RegAdminIdx
                    ,'".$this->input->ip_address()."' AS RegIp
                FROM {$this->_table['mock_register']} AS a
                INNER JOIN {$this->_table['mock_answerpaper']} AS b ON a.ProdCode = b.ProdCode AND a.MrIdx = b.MrIdx
            ";
            $result = $this->_conn->query('INSERT INTO' . $log_query_string . $where . ' ORDER BY b.MapIdx ASC');
            if ($result !== true) {
                throw new Exception('로그저장 실패입니다.');
            }
            
            //삭제
            $is_del_my_answerpaper = $this->_conn->where('ProdCode', element('prod_code', $form_data))
                ->where('TakeForm', $this->_take_form_ccd)
                ->where_in('MrIdx', $arr_mr_idx)
                ->delete($this->_table['mock_answerpaper']);
            if ($is_del_my_answerpaper === false) {
                throw new \Exception('등록된 응시자 성적 삭제 실패했습니다.');
            }
            
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 복수정답처리
     * @param $prod_code
     * @return array|bool
     */
    public function scoreMulti($prod_code)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_countAnswerPaper($prod_code) <= 0) {
                throw new \Exception('등록된 답안이 없습니다.');
            }

            $column = "MAP.MapIdx, MAP.MrIdx, MAP.MpIdx, MAP.MqIdx, MAP.ProdCode, MAP.Answer, MQ.RightAnswer, MAP.IsWrong";
            $arr_condition = [
                'EQ' => [
                    'MAP.ProdCode' => $prod_code,
                    'MQ.QuestionOption' => 'M'
                ]
            ];
            $where = $this->_conn->makewhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $from = "
                FROM {$this->_table['mock_answerpaper']} AS MAP
                INNER JOIN {$this->_table['mock_questions']} AS MQ ON MAP.MqIdx = MQ.MqIdx
            ";
            $data = $this->_conn->query('select ' . $column . $from . $where)->result_array();

            $update_data = [];
            foreach ($data as $key => $row) {
                $RightAnswer = $row['RightAnswer'];
                $Answer = $row['Answer'];

                if(strpos($RightAnswer, $Answer) !== false) {
                    $update_data[] = [
                        'MapIdx' => $row['MapIdx'],
                        'IsWrong' => 'Y'
                    ];
                }
            }

            if($update_data) $this->_conn->update_batch($this->_table['mock_answerpaper'], $update_data, 'MapIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복수정답 처리에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 답안재검
     * @param $prod_code
     * @return array|bool
     */
    public function reGrading($prod_code)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_countAnswerPaper($prod_code) <= 0) {
                throw new \Exception('등록된 답안이 없습니다.');
            }

            $arr_condition = [
                'EQ' => [
                    'MAP.ProdCode' => $prod_code
                ],
                'ORG' => [
                    'RAW' => [
                        '(MAP.IsWrong = \'Y\' ' => 'AND FIND_IN_SET(MAP.Answer, MQ.RightAnswer) <= 0)',
                        '(MAP.IsWrong = \'N\' ' => 'AND FIND_IN_SET(MAP.Answer, MQ.RightAnswer) > 0)',
                    ]
                ]
            ];
            $where = $this->_conn->makewhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $column = "MAP.MapIdx, MAP.Answer, MAP.IsWrong ,MQ.QuestionOption, MQ.RightAnswer";
            $from = "
                FROM {$this->_table['mock_answerpaper']} AS MAP
                INNER JOIN {$this->_table['mock_questions']} AS MQ ON MAP.MqIdx = MQ.MqIdx
            ";
            $target_data = $this->_conn->query('select ' . $column . $from . $where)->result_array();

            if (count($target_data) <= 0) {
                throw new \Exception('잘못처리된 정답이 없습니다.');
            }

            $update_data = [];
            $y2n = $n2y = 0;
            foreach ($target_data as $key => $row) {
                if($row['IsWrong'] == 'N' && strpos($row['RightAnswer'], $row['Answer']) !== false) {
                    $update_data[] = [
                        'MapIdx' => $row['MapIdx'],
                        'IsWrong' => 'Y'
                    ];
                    $n2y++;
                } else {
                    $update_data[] = [
                        'MapIdx' => $row['MapIdx'],
                        'IsWrong' => 'N'
                    ];
                    $y2n++;
                }
            }

            if($update_data) $this->_conn->update_batch($this->_table['mock_answerpaper'], $update_data, 'MapIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('답안재검 처리에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true, 'ret_status' => '200', 'ret_msg' => $y2n.'개가 오답으로, '.$n2y.'개가 정답으로 변경되었습니다. 조점정수를 반영해야 변경된 답안이 적용됩니다.'];
    }

    /**
     * 정답제출
     * @param array $formData
     * @return array|bool
     */
    public function answerSave($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $ProdCode = element('prod_code', $formData);
            $MrIdx = element('mr_idx', $formData);
            $MemIdx = element('mem_idx', $formData);

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
     * 응시상태변경
     * @param array $formData
     * @return array|bool
     */
    public function updateForIsTake($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $ProdCode = element('prod_code', $formData);
            $MrIdx = element('mr_idx', $formData);
            $MemIdx = element('mem_idx', $formData);

            $update_data = [
                'IsTake' => 'Y',
                'RegDatm' => date('Y-m-d H:i:s'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($update_data)->where('MrIdx', $MrIdx);
            if ($this->_conn->update($this->_table['mock_register']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 조정점수반영
     * @param $prod_code
     * @param $mode
     * @return array|bool
     */
    public function scoreMake($prod_code, $mode)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_countAnswerPaper($prod_code) <= 0) {
                throw new \Exception('등록된 답안이 없습니다.');
            }

            $result = $this->_addMockGradesLog($prod_code, $mode);
            if ($result != true) {
                throw new \Exception($result['ret_msg']);
            }

            //조정점수 데이터 셋팅
            $arr_adjust_data = $this->_getAdjustData($prod_code);

            //저장데이터 셋팅
            $input_data = $this->_setInputData($arr_adjust_data);

            //저장
            if ($this->_conn->insert_batch($this->_table['mock_grades'], $input_data) === false) {
                throw new \Exception('조정점수 반영에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 모의고사 과목상세
     * @param $prod_code
     * @return array
     */
    public function registerForSubjectDetail($prod_code)
    {
        $column = "
            STRAIGHT_JOIN M.*
            ,(
                SELECT T.Top10AvgOrgPoint
                FROM (
                    SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, ROUND(AVG(A.OrgPoint),2) AS Top10AvgOrgPoint
                    FROM (
                        SELECT a.ProdCode, a.TakeMockPart, b.MpIdx, b.OrgPoint
                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.OrgPoint DESC) AS PaperPercRank
                        FROM {$this->_table['mock_register']} AS a
                        INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100)
                    GROUP BY A.TakeMockPart, A.MpIdx
                ) AS T 
                WHERE T.ProdCode = M.ProdCode AND T.TakeMockPart = M.TakeMockPart AND T.MpIdx = M.MpIdx
            ) AS Top10AvgOrgPoint
            
            ,(
                SELECT T.Top30AvgOrgPoint
                FROM (
                    SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, ROUND(AVG(A.OrgPoint),2) AS Top30AvgOrgPoint
                    FROM (
                        SELECT a.ProdCode, a.TakeMockPart, b.MpIdx, b.OrgPoint
                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.OrgPoint DESC) AS PaperPercRank
                        FROM {$this->_table['mock_register']} AS a
                        INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (30 / 100)
                    GROUP BY A.TakeMockPart, A.MpIdx
                ) AS T 
                WHERE T.ProdCode = M.ProdCode AND T.TakeMockPart = M.TakeMockPart AND T.MpIdx = M.MpIdx
            ) AS Top30AvgOrgPoint
            
            ,(
                SELECT T.Top10AvgAdjustPoint
                FROM (
                    SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, ROUND(AVG(A.AdjustPoint),2) AS Top10AvgAdjustPoint
                    FROM (
                        SELECT a.ProdCode, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                        FROM {$this->_table['mock_register']} AS a
                        INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100)
                    GROUP BY A.TakeMockPart, A.MpIdx
                ) AS T 
                WHERE T.ProdCode = M.ProdCode AND T.TakeMockPart = M.TakeMockPart AND T.MpIdx = M.MpIdx
            ) AS Top10AvgAdjustPoint
            
            ,(
                SELECT T.Top30AvgAdjustPoint
                FROM (
                    SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, ROUND(AVG(A.AdjustPoint),2) AS Top30AvgAdjustPoint
                    FROM (
                        SELECT a.ProdCode, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                        FROM {$this->_table['mock_register']} AS a
                        INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS A
                    WHERE A.PaperPercRank BETWEEN 0 AND (30 / 100)
                    GROUP BY A.TakeMockPart, A.MpIdx
                ) AS T 
                WHERE T.ProdCode = M.ProdCode AND T.TakeMockPart = M.TakeMockPart AND T.MpIdx = M.MpIdx
            ) AS Top30AvgAdjustPoint
        ";

        $from = "
            FROM (
                SELECT STRAIGHT_JOIN A.ProdCode, A.TakeMockPart, A.MpIdx, A.MockType, A.SubjectName
                ,ROUND(AVG(A.OrgPoint), 2) AS AvgOrgPoint		#원점수평균
                ,ROUND(AVG(A.AdjustPoint),2) AS AvgAdjustPoint	#조정점수평균
                ,ROUND(MAX(A.OrgPoint),2) AS MaxOrgPoint		#원점수최고점
                ,ROUND(MAX(A.AdjustPoint),2) AS MaxAdjustPoint	#조정점수최고점
                ,A.StandardDeviation					        #표준편차
                ,COUNT(A.MpIdx) AS MemCount				        #응시인원
                ,fn_ccd_name(A.TakeMockPart) AS TakeMockPartName
                FROM (
                    SELECT 
                    a.ProdCode, a.TakeMockPart, b.MpIdx, e.MockType, b.OrgPoint, b.AdjustPoint, b.StandardDeviation, c.SubjectIdx, d.SubjectName
                    FROM {$this->_table['mock_register']} AS a
                    INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                    INNER JOIN {$this->_table['mock_register_r_paper']} AS c ON a.MrIdx = c.MrIdx AND c.MpIdx = b.MpIdx
                    INNER JOIN {$this->_table['product_subject']} AS d ON c.SubjectIdx = d.SubjectIdx
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS e ON e.ProdCode = b.ProdCode AND e.MpIdx = b.MpIdx AND e.IsStatus = 'Y'
                    WHERE a.ProdCode = '{$prod_code}'
                ) AS A
                GROUP BY A.TakeMockPart, A.MpIdx
            ) AS M
        ";

        $total_avg_query = "
            D.TakeMockPart
            ,ROUND(AVG(D.AvgOrgPoint),2) AS AvgAvgOrgPoint              #원점수평균
            ,ROUND(AVG(D.AvgAdjustPoint),2) AS AvgAvgAdjustPoint        #조정점수평균
            ,ROUND(AVG(D.MaxOrgPoint),2) AS AvgMaxOrgPoint              #원점수최고점
            ,ROUND(AVG(D.MaxAdjustPoint),2) AS AvgMaxAdjustPoint        #조정점수최고점
            ,ROUND(AVG(D.StandardDeviation),2) AS AvgStandardDeviation  #표준편차
            ,ROUND(AVG(D.MemCount),2) AS AvgMemCount                    #응시인원
            ,ROUND(AVG(D.Top10AvgOrgPoint),2) AS AvgTop10AvgOrgPoint    #원점수상위10퍼센트 평균
            ,ROUND(AVG(D.Top30AvgOrgPoint),2) AS AvgTop30AvgOrgPoint    #원점수상위30퍼센트 평균
            FROM (
                select {$column} {$from}
            ) AS D
            GROUP BY D.TakeMockPart
        ";

        $data = $this->_conn->query('select ' . $column . $from)->result_array();
        $total_avg = $this->_conn->query('select ' . $total_avg_query)->result_array();
        return [
            'data' => $data,
            'total_avg' => $total_avg
        ];
    }

    /**
     * 과목별 문항수 조회
     * @param $prod_code
     * @return array
     */
    public function PaperAnswerNumList($prod_code)
    {
        $arr_condition = ['EQ' => ['ProdCode' => $prod_code, 'P.IsStatus' => 'Y', 'MP.IsStatus' => 'Y', 'MP.IsUse' => 'Y']];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['MP.MpIdx' => 'ASC'])->getMakeOrderBy();
        $column = "P.MpIdx, MP.AnswerNum";

        $from = "
            FROM {$this->_table['product_mock_r_paper']} AS P
            INNER JOIN {$this->_table['mock_paper']} AS MP ON P.MpIdx = MP.MpIdx
        ";
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
        return array_pluck($data, 'AnswerNum', 'MpIdx');
    }

    /**
     * 과목별 문항별 마킹정보
     * @param $prod_code
     * @return mixed
     */
    public function AnswerStatsList($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'ProdCode' => $prod_code
            ],
            /*'NOT' => [
                'Answer' => 'N'
            ]*/
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['AP.MpIdx' => 'ASC', 'AP.MqIdx' => 'ASC', 'AP.Answer' => 'ASC'])->getMakeOrderBy();
        $column = "AP.MpIdx, AP.MqIdx, MQ.QuestionNO, MQ.RightAnswer, AP.Answer, AP.cnt AS AnsCount, QT.cnt AS AnsTotalCount, ROUND((AP.cnt / QT.cnt) * 100, 2) AS AnswerAvg";

        $from = "
            FROM (
                SELECT MpIdx, MqIdx, Answer, COUNT(*) AS cnt
                FROM {$this->_table['mock_answerpaper']} AS ap
                {$where}
                GROUP BY MqIdx, Answer
            ) AS AP
            INNER JOIN {$this->_table['mock_questions']} AS MQ ON AP.MqIdx = MQ.MqIdx AND MQ.IsStatus = 'Y'
            INNER JOIN (
                SELECT MqIdx, COUNT(*) AS cnt
                FROM {$this->_table['mock_answerpaper']}
                {$where}
                GROUP BY MqIdx
            ) AS QT ON AP.MqIdx = QT.MqIdx
        ";
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 모의고사 문항상세
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function questionAnswerList($is_count = false, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if ($is_count == 'excel') {
                $column = "PD.ProdName, PM.ProdCode, MB.MemId, MB.MemName, TakeNumber, PS.SubjectName, MP.MpIdx, QuestionNO, Answer, IsWrong";
                $order_by_offset_limit = '';
            } else {
                $column = 'MB.MemId, MB.MemName, TakeNumber, PS.SubjectName, QuestionNO, Answer, IsWrong, MP.MpIdx, MP.MockType, MA.MqIdx';
                $order_by_offset_limit = $this->_conn->makeOrderBy(['MR.MrIdx' => 'ASC', 'MA.MpIdx' => 'ASC', 'MQ.QuestionNo' => 'ASC'])->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }
        }

        $from = "
            FROM {$this->_table['mock_product']} AS PM
            JOIN {$this->_table['product']} AS PD ON PM.ProdCode = PD.ProdCode
            JOIN {$this->_table['product_mock_r_paper']} AS MP ON PM.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y' AND MP.IsStatus = 'Y'
            JOIN {$this->_table['mock_register']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' AND MR.TakeForm = '{$this->_take_form_ccd}'
            JOIN {$this->_table['mock_register_r_paper']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx AND MP.MpIdx = RP.MpIdx
            JOIN {$this->_table['product_subject']} AS PS ON PS.SubjectIdx = RP.SubjectIdx
            JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx
            JOIN {$this->_table['mock_answerpaper']} AS MA ON MR.MrIdx = MA.MrIdx AND MQ.MqIdx = MA.MqIdx AND MR.ProdCode = MA.Prodcode
            JOIN {$this->_table['lms_member']} AS MB ON MR.MemIdx = MB.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 엑셀데이터 저장
     * @param $prod_code
     * @param $params
     * @return array|bool
     */
    public function gradeExcelDataUpload($prod_code, $params)
    {
        $this->_conn->trans_begin();
        try {
            $question_data = $this->_findQuestions($prod_code);
            if (empty($question_data) === true) {
                throw new \Exception('등록된 답안이 없습니다. 답안등록 후 저장해 주세요.');
            }

            $group_params = array_chunk($params, 50);
            foreach ($group_params as $g_key => $g_val) {
                //회원아이디 추출
                $arr_take_num = [];
                foreach ($g_val as $arr_data) {
                    $arr_take_num[$arr_data['A']] = $arr_data['A'];
                }

                $reg_data = $this->_findRegister($prod_code, $arr_take_num);
                $register_update_data = [];
                $log_data = [];
                foreach ($reg_data as $log_row) {
                    $register_update_data[] = [
                        'MrIdx' => $log_row['mr_idx'],
                        'IsTake' => 'Y',
                        'RegDatm' => date('Y-m-d H:i:s')
                    ];

                    $log_data[] = [
                        'LogType' => 'S',
                        'RegIp' => '999999',
                        'RemainSec' => '999999',
                        'MrIdx' => $log_row['mr_idx']
                    ];
                }

                //접수데이터 응시상태로 업데이트
                if($register_update_data) {
                    if ($this->_conn->update_batch($this->_table['mock_register'], $register_update_data, 'MrIdx') === false) {
                        throw new \Exception('접수데이터 업데이트 실패했습니다.');
                    }
                }

                $add_data = [];
                if (empty($log_data) === false) {
                    // 등록된 응시자 데이터삭제
                    $arr_mr_idx = array_pluck($log_data, 'MrIdx');
                    $is_del_my_answerpaper = $this->_conn->where('ProdCode', $prod_code)
                        ->where('TakeForm', $this->_take_form_ccd)
                        ->where_in('MrIdx', array_values($arr_mr_idx))
                        ->delete($this->_table['mock_answerpaper']);
                    if ($is_del_my_answerpaper === false) {
                        throw new \Exception('등록된 응시자 성적 삭제 실패했습니다.');
                    }

                    $this->_conn->insert_batch($this->_table['mock_log'], $log_data);
                    $first_log_idx = $this->_conn->insert_id();

                    $arr_log_idx = [];
                    foreach ($log_data as $log_key => $log_val) {
                        $arr_log_idx[$log_val['MrIdx']] = $first_log_idx;
                        $first_log_idx++;
                    }

                    foreach ($g_val as $arr_data) {
                        if (empty($reg_data[$arr_data['A']]['mem_idx']) === false) {
                            $i = 1;
                            $arr_answer = explode('/', $arr_data['C']);
                            foreach ($arr_answer as $key => $answer) {
                                if (empty($answer) === false) {
                                    if (empty($question_data[$arr_data['B']][$i]) === false) {
                                        if ($question_data[$arr_data['B']][$i]['RightAnswer'] == $answer) {
                                            $is_wrong = 'Y';
                                        } else {
                                            $is_wrong = 'N';
                                        }

                                        $add_data[] = [
                                            'MemIdx' => $reg_data[$arr_data['A']]['mem_idx'],
                                            'MrIdx' => $reg_data[$arr_data['A']]['mr_idx'],
                                            'ProdCode' => $prod_code,
                                            'MpIdx' => $arr_data['B'],
                                            'MqIdx' => $question_data[$arr_data['B']][$i]['MqIdx'],
                                            'LogIdx' => $arr_log_idx[$reg_data[$arr_data['A']]['mr_idx']],
                                            'Answer' => $answer,
                                            'IsWrong' => $is_wrong,
                                            'TakeForm' => $this->_take_form_ccd,
                                            'RegDatm' => date('Y-m-d H:i:s')
                                        ];
                                    }
                                }
                                $i++;
                            }
                        }
                    }
                    if($add_data) $this->_conn->insert_batch($this->_table['mock_answerpaper'], $add_data);
                    if ($this->_conn->trans_status() === false) {
                        throw new Exception('저장 실패입니다(1)');
                    }
                }
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장 실패입니다(2)');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 직렬,과목별 전체통계
     * 문항수,만점,응시인원,평균,최고득점
     * @param $prod_code
     * @return mixed
     */
    public function totalStatistics($prod_code)
    {
        $query_string = "
            M.*
            ,(
                SELECT COUNT(*) AS count_question
                FROM {$this->_table['mock_questions']} AS a
                WHERE a.MpIdx = M.MpIdx
            ) AS count_question
            ,(
                SELECT SUM(Scoring) AS sum_scoring
                FROM {$this->_table['mock_questions']} AS a
                WHERE a.MpIdx = M.MpIdx
            ) AS sum_scoring
            ,(
                SELECT 
                COUNT(*)
                FROM {$this->_table['mock_register']} AS a
                INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                WHERE a.ProdCode = ? AND a.TakeMockPart = M.TakeMockPart AND b.MpIdx = M.MpIdx
                GROUP BY a.TakeMockPart, b.MpIdx
            ) AS reg_member_cnt
            ,ROUND((
                SELECT 
                AVG(AdjustPoint)
                FROM {$this->_table['mock_register']} AS a
                INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                WHERE a.ProdCode = ? AND a.TakeMockPart = M.TakeMockPart AND b.MpIdx = M.MpIdx
                GROUP BY a.TakeMockPart, b.MpIdx
            ),2) AS avg_scoring
            ,ROUND((
                SELECT 
                MAX(AdjustPoint)
                FROM {$this->_table['mock_register']} AS a
                INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                WHERE a.ProdCode = ? AND a.TakeMockPart = M.TakeMockPart AND b.MpIdx = M.MpIdx
                GROUP BY a.TakeMockPart, b.MpIdx
            ),2) AS max_scoring
            FROM (
                SELECT TM.TakeMockPart, fn_ccd_name(TM.TakeMockPart) AS TakeMockPartName, PS.SubjectName, A.MpIdx, A.MockType, A.BaseScoring
                FROM (
                    SELECT PM.ProdCode, MP.MpIdx, MP.BaseScoring, MRS.SubjectIdx, PMP.MockType
                    FROM {$this->_table['mock_product']} AS PM
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS PMP ON PM.ProdCode = PMP.ProdCode AND PMP.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_paper']} AS MP ON PMP.MpIdx = MP.MpIdx AND MP.IsStatus='Y' AND MP.IsUse='Y'
                    INNER JOIN {$this->_table['mock_paper_r_category']} AS MPRC ON MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_r_category']} AS MRC ON MPRC.MrcIdx = MRC.MrcIdx AND MRC.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_r_subject']} AS MRS ON MRC.MrsIdx = MRS.MrsIdx AND MRS.IsStatus='Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    WHERE PM.ProdCode = ?
                    GROUP BY MP.MpIdx
                ) AS A
                INNER JOIN {$this->_table['product_subject']} AS PS ON A.SubjectIdx = PS.SubjectIdx AND PS.IsUse = 'Y' AND PS.IsStatus = 'Y'
                INNER JOIN (
                    SELECT a.ProdCode,SUBSTRING_INDEX(SUBSTRING_INDEX(a.MockPart,',',numbers.n),',',-1) AS TakeMockPart
                    FROM (SELECT num AS n FROM tmp_numbers LIMIT 10) AS numbers
                    INNER JOIN lms_product_mock AS a ON CHAR_LENGTH(a.MockPart) - CHAR_LENGTH(REPLACE(a.MockPart,',','')) >= numbers.n - 1
                    WHERE a.ProdCode = ?
                ) AS TM ON TM.ProdCode = A.ProdCode
            ) AS M
            ORDER BY M.TakeMockPart ASC, M.MpIdx ASC
        ";
        return $this->_conn->query('select ' . $query_string, [$prod_code,$prod_code,$prod_code,$prod_code,$prod_code])->result_array();
    }

    /**
     * 점수별 인원,누계,백분율  전체응시자 점수분포표
     * 직렬,과목,점수,마킹수,누계,백분률
     * @param string $prod_code
     * @param string $mp_idx
     * @param array $type
     * @return mixed
     */
    public function pointForStatistics($prod_code = '',$mp_idx = '',$type = [])
    {
        switch ($type[0]) {
            case "decimal" :    //소수점
                $num_from = /** @lang text */"
                    SELECT t_point
                    FROM (SELECT t_point FROM (SELECT @num := num * {$type[1]} AS t_point FROM tmp_numbers LIMIT 40) AS t) AS t
                    UNION ALL SELECT 0 AS t_point ORDER BY t_point DESC
                ";
                break;
            case "integer" :    //정수
                $num_from = /** @lang text */"
                    SELECT t_point
                    FROM (SELECT t_point FROM (SELECT num AS t_point FROM tmp_numbers WHERE (num%{$type[1]})=0) AS t) AS t
                    UNION ALL SELECT 0 AS t_point ORDER BY t_point DESC
                ";
                break;
            default :
                $num_from = /** @lang text */"
                    SELECT t_point
                    FROM (SELECT t_point FROM (SELECT @num := num * {$type[1]} AS t_point FROM tmp_numbers LIMIT 40) AS t) AS t
                    UNION ALL SELECT 0 AS t_point ORDER BY t_point DESC
                ";
        }

        $query_string = "
            m.listMockPart, m.MpIdx, m.t_point, m.cnt, m.sumCnt
            ,IFNULL(ROUND((m.sumCnt / m.total_cnt) * 100,2),0) AS tavg
            FROM (
                SELECT
                m.listMockPart, m.MpIdx, m.t_point, m.cnt
                ,SUM(m.cnt) OVER(PARTITION BY m.listMockPart, m.MpIdx ORDER BY m.listMockPart ASC, m.MpIdx ASC, m.t_point DESC) AS sumCnt
                ,(
                    SELECT a.total_cnt
                    FROM (
                        SELECT a.TakeMockPart, b.MpIdx, COUNT(*) AS total_cnt
                        FROM {$this->_table['mock_register']} AS a
                        INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = ? AND b.MpIdx = {$mp_idx}
                        GROUP BY a.TakeMockPart, b.MpIdx
                    ) AS a
                    WHERE a.TakeMockPart = m.listMockPart AND a.MpIdx = m.MpIdx
                ) AS total_cnt
                FROM (
                    SELECT m.listMockPart, m.MpIdx, m.t_point, IFNULL(p.cnt,0) AS cnt
                    FROM (
                        SELECT a.listMockPart, a.MpIdx, b.t_point
                        FROM (
                            SELECT b.listMockPart, a.MpIdx, a.mapping
                            FROM (
                                SELECT a.ProdCode, b.MpIdx, 'mapping' AS mapping
                                FROM {$this->_table['mock_product']} AS a
                                INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode AND b.IsStatus = 'Y'
                                WHERE a.ProdCode = ? AND b.MpIdx = {$mp_idx}
                            ) AS a
                            INNER JOIN (
                                SELECT a.ProdCode,SUBSTRING_INDEX(SUBSTRING_INDEX(a.MockPart,',',numbers.n),',',-1) AS listMockPart
                                FROM (SELECT num AS n FROM tmp_numbers LIMIT 10) AS numbers
                                INNER JOIN {$this->_table['mock_product']} AS a ON CHAR_LENGTH(a.MockPart) - CHAR_LENGTH(REPLACE(a.MockPart,',','')) >= numbers.n - 1
                                WHERE a.ProdCode = ?
                            ) AS b ON a.ProdCode = b.ProdCode
                        ) AS a
                        LEFT JOIN (
                            SELECT a.t_point, 'mapping' AS mapping
                            FROM ({$num_from}) AS a
                        ) AS b ON a.mapping = b.mapping
                    ) AS m
                    LEFT JOIN (
                        SELECT b.TakeMockPart, a.MpIdx, a.AdjustPoint, COUNT(*) AS cnt
                        FROM {$this->_table['mock_grades']} AS a
                        INNER JOIN {$this->_table['mock_register']} AS b ON a.MrIdx = b.MrIdx
                        WHERE a.ProdCode = ? AND a.MpIdx = {$mp_idx}
                        GROUP BY b.TakeMockPart, a.MpIdx, a.AdjustPoint
                    ) AS p ON m.listMockPart = p.TakeMockPart AND m.MpIdx = p.MpIdx AND m.t_point = p.AdjustPoint
                ) AS m
            ) as m
            ORDER BY m.listMockPart ASC, m.MpIdx ASC, m.t_point DESC
        ";
        return $this->_conn->query('select ' . $query_string, [$prod_code,$prod_code,$prod_code,$prod_code])->result_array();
    }

    /**
     * 전체, 상위 **퍼센트 응시자 정답률
     * @param string $prod_code
     * @param string $rank
     * @return mixed
     */
    public function pointAvgForRankStatistics($prod_code = '', $rank = 'total')
    {
        if ($rank == 'total') {
            $rank_where = '';
        } else {
            $rank_where = "WHERE A.PaperPercRank BETWEEN 0 AND ({$rank} / 100)"; //상위 퍼센트 조건
        }

        $query_string = "
            P.*
            ,IFNULL((
                SELECT ROUND(((IFNULL(ycnt,0) / (IFNULL(ycnt,0) + IFNULL(ncnt,0))) * 100), 2) AS AvgScore
                FROM (
                    SELECT TM.TakeMockPart, MP.MpIdx, MQ.MqIdx
                    ,(
                        SELECT a.ycnt
                        FROM (
                            SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ycnt
                            FROM (
                                SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                FROM (
                                    SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                    ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                    FROM {$this->_table['mock_register']} AS a
                                    INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                                    WHERE a.ProdCode = ?
                                ) AS A
                                {$rank_where}
                            ) AS a
                            INNER JOIN {$this->_table['mock_answerpaper']} AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                            WHERE b.IsWrong = 'Y'
                            GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                        ) AS a
                        WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                    ) AS ycnt
            
                    ,(
                        SELECT a.ncnt
                        FROM (
                            SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ncnt
                            FROM (
                                SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                FROM (
                                    SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                    ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                    FROM {$this->_table['mock_register']} AS a
                                    INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                                    WHERE a.ProdCode = ?
                                ) AS A
                                {$rank_where}
                            ) AS a
                            INNER JOIN {$this->_table['mock_answerpaper']} AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                            WHERE b.IsWrong = 'N'
                            GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                        ) AS a
                        WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                    ) AS ncnt
            
                    FROM {$this->_table['mock_paper']} AS MP
                    JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['product_mock_r_paper']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.IsStatus = 'Y'
                    INNER JOIN (
                        SELECT ProdCode, TakeMockPart
                        FROM {$this->_table['mock_register']}
                        WHERE ProdCode = ?
                        GROUP BY TakeMockPart
                    ) AS TM ON TM.ProdCode = PM.ProdCode
            
                    AND PM.ProdCode = ?
                    AND PM.IsStatus = 'Y'
                ) AS A
                WHERE A.TakeMockPart = P.TakeMockPart AND A.MpIdx = P.MpIdx AND A.MqIdx = P.MqIdx
            ),0) AS AvgScore
            
            FROM (
                SELECT 
                TM.TakeMockPart, PS.SubjectName, A.MpIdx, A.MockType, MQ.MqIdx, MQ.MalIdx, MQ.QuestionNO, MQ.RightAnswer
                ,IF(MQ.Difficulty='T','상',(IF(MQ.Difficulty='M','중',(IF(MQ.Difficulty='N','','하')))))AS Difficulty
                FROM
                (
                    SELECT PM.ProdCode, MP.MpIdx, MRS.SubjectIdx, PMP.MockType
                    FROM {$this->_table['mock_product']} AS PM
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS PMP ON PM.ProdCode = PMP.ProdCode AND PMP.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_paper']} AS MP ON PMP.MpIdx = MP.MpIdx AND MP.IsStatus='Y' AND MP.IsUse='Y'
                    INNER JOIN {$this->_table['mock_paper_r_category']} AS MPRC ON MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_r_category']} AS MRC ON MPRC.MrcIdx = MRC.MrcIdx AND MRC.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_r_subject']} AS MRS ON MRC.MrsIdx = MRS.MrsIdx AND MRS.IsStatus='Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    WHERE PM.ProdCode = ?
                    GROUP BY MP.MpIdx
                ) AS A
                INNER JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = A.MpIdx AND MQ.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_subject']} AS PS ON A.SubjectIdx = PS.SubjectIdx AND PS.IsUse = 'Y' AND PS.IsStatus = 'Y'
                INNER JOIN (
                    SELECT ProdCode, TakeMockPart
                    FROM {$this->_table['mock_register']}
                    WHERE ProdCode = ?
                    GROUP BY TakeMockPart
                ) AS TM ON TM.ProdCode = A.ProdCode
            ) AS P
            ORDER BY P.TakeMockPart, P.MpIdx, P.MqIdx ASC
        ";
        return $this->_conn->query('select ' . $query_string, [$prod_code,$prod_code,$prod_code,$prod_code,$prod_code,$prod_code])->result_array();
    }

    /**
     * 문항별 데이터
     * 문항,정답,배점,분류,유형, 정답비율 (10%,25%,전체), 마킹수(1번,2번,3번 마킹수~) 마킹률
     * column : 직렬,문제영역명,과목명,과목코드,문항코드,문항번호,정답,배점,난이도,정답률 상위10,정답률 상위25,정답률 전체,마킹수 1번, 2번, 3번, 4번, 5번, 전체마킹수
     * @param $prod_code
     * @return mixed
     */
    public function totalStatistics2($prod_code)
    {
        $query_string = "
            M.TakeMockPart, M.AreaName, M.SubjectName, M.MpIdx, M.MockType, M.MqIdx, M.QuestionNo, M.RightAnswer, M.Scoring, M.Difficulty
            , M.QAVR_Top10, M.QAVR_Top25, M.QAVR_Total
            , M.marking_cnt_num_1, M.marking_cnt_num_2, M.marking_cnt_num_3, M.marking_cnt_num_4, M.marking_cnt_num_5, M.total_marking_cnt
            /*
            ,ROUND((M.marking_cnt_num_1 / M.total_marking_cnt) * 100,2) AS marking_avg_num_1
            ,ROUND((M.marking_cnt_num_2 / M.total_marking_cnt) * 100,2) AS marking_avg_num_2
            ,ROUND((M.marking_cnt_num_3 / M.total_marking_cnt) * 100,2) AS marking_avg_num_3
            ,ROUND((M.marking_cnt_num_4 / M.total_marking_cnt) * 100,2) AS marking_avg_num_4
            ,ROUND((M.marking_cnt_num_5 / M.total_marking_cnt) * 100,2) AS marking_avg_num_5
            */
            FROM (
                SELECT
                P.TakeMockPart, P.AreaName, P.SubjectName, P.MpIdx, P.MockType, P.MqIdx, P.QuestionNO, P.RightAnswer, P.Scoring, P.Difficulty
                , P.marking_cnt_num_1, P.marking_cnt_num_2, P.marking_cnt_num_3, P.marking_cnt_num_4, P.marking_cnt_num_5, P.total_marking_cnt
                
                ,(
                    SELECT ROUND(((IFNULL(ycnt,0) / (IFNULL(ycnt,0) + IFNULL(ncnt,0))) * 100), 2) AS QAVR
                    FROM (
                        SELECT TM.TakeMockPart, MP.MpIdx, MQ.MqIdx
                        ,(
                            SELECT a.ycnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ycnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'Y'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ycnt
            
                        ,(
                            SELECT a.ncnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ncnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    WHERE A.PaperPercRank BETWEEN 0 AND (10 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'N'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ncnt
            
                        FROM lms_mock_paper_new AS MP
                        JOIN lms_mock_questions AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                        JOIN lms_product_mock_r_paper AS PM ON Mp.MpIdx = PM.MpIdx AND PM.IsStatus = 'Y'
                        INNER JOIN (
                            SELECT ProdCode, TakeMockPart
                            FROM lms_mock_register
                            WHERE ProdCode = ?
                            GROUP BY TakeMockPart
                        ) AS TM ON TM.ProdCode = PM.ProdCode
            
                        AND PM.ProdCode = ?
                        AND PM.IsStatus = 'Y'
                    ) AS A
                    WHERE A.TakeMockPart = P.TakeMockPart AND A.MpIdx = P.MpIdx AND A.MqIdx = P.MqIdx
                ) AS QAVR_Top10
            
                ,(
                    SELECT ROUND(((IFNULL(ycnt,0) / (IFNULL(ycnt,0) + IFNULL(ncnt,0))) * 100), 2) AS QAVR
                    FROM (
                        SELECT TM.TakeMockPart, MP.MpIdx, MQ.MqIdx
                        ,(
                            SELECT a.ycnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ycnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    WHERE A.PaperPercRank BETWEEN 0 AND (25 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'Y'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ycnt
            
                        ,(
                            SELECT a.ncnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ncnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    WHERE A.PaperPercRank BETWEEN 0 AND (25 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'N'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ncnt
            
                        FROM lms_mock_paper_new AS MP
                        JOIN lms_mock_questions AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                        JOIN lms_product_mock_r_paper AS PM ON Mp.MpIdx = PM.MpIdx AND PM.IsStatus = 'Y'
                        INNER JOIN (
                            SELECT ProdCode, TakeMockPart
                            FROM lms_mock_register
                            WHERE ProdCode = ?
                            GROUP BY TakeMockPart
                        ) AS TM ON TM.ProdCode = PM.ProdCode
            
                        AND PM.ProdCode = ?
                        AND PM.IsStatus = 'Y'
                    ) AS A
                    WHERE A.TakeMockPart = P.TakeMockPart AND A.MpIdx = P.MpIdx AND A.MqIdx = P.MqIdx
                ) AS QAVR_Top25
            
                ,(
                    SELECT ROUND(((IFNULL(ycnt,0) / (IFNULL(ycnt,0) + IFNULL(ncnt,0))) * 100), 2) AS QAVR
                    FROM (
                        SELECT TM.TakeMockPart, MP.MpIdx, MQ.MqIdx
                        ,(
                            SELECT a.ycnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ycnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    #WHERE A.PaperPercRank BETWEEN 0 AND (100 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'Y'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ycnt
            
                        ,(
                            SELECT a.ncnt
                            FROM (
                                SELECT a.ProdCode, a.TakeMockPart, a.MpIdx, b.MqIdx, COUNT(*) AS ncnt
                                FROM (
                                    SELECT A.ProdCode, A.MrIdx, A.TakeMockPart, A.MpIdx
                                    FROM (
                                        SELECT a.ProdCode, a.MrIdx, a.TakeMockPart, b.MpIdx, b.AdjustPoint
                                        ,PERCENT_RANK() OVER (PARTITION BY a.TakeMockPart, b.MpIdx ORDER BY b.AdjustPoint DESC) AS PaperPercRank
                                        FROM lms_mock_register AS a
                                        INNER JOIN lms_mock_grades AS b ON a.MrIdx = b.MrIdx
                                        WHERE a.ProdCode = ?
                                    ) AS A
                                    #WHERE A.PaperPercRank BETWEEN 0 AND (100 / 100) #상위 퍼센트 조건
                                ) AS a
                                INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
                                WHERE b.IsWrong = 'N'
                                GROUP BY a.TakeMockPart, a.MpIdx, b.MqIdx
                            ) AS a
                            WHERE a.ProdCode = PM.ProdCode AND a.TakeMockPart = TM.TakeMockPart AND a.MpIdx = MP.MpIdx AND a.MqIdx = MQ.MqIdx
                        ) AS ncnt
            
                        FROM lms_mock_paper_new AS MP
                        JOIN lms_mock_questions AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                        JOIN lms_product_mock_r_paper AS PM ON Mp.MpIdx = PM.MpIdx AND PM.IsStatus = 'Y'
                        INNER JOIN (
                            SELECT ProdCode, TakeMockPart
                            FROM lms_mock_register
                            WHERE ProdCode = ?
                            GROUP BY TakeMockPart
                        ) AS TM ON TM.ProdCode = PM.ProdCode
            
                        AND PM.ProdCode = ?
                        AND PM.IsStatus = 'Y'
                    ) AS A
                    WHERE A.TakeMockPart = P.TakeMockPart AND A.MpIdx = P.MpIdx AND A.MqIdx = P.MqIdx
                ) AS QAVR_Total
                
                FROM (
                    SELECT 
                    TM.TakeMockPart, MAL.AreaName, PS.SubjectName, A.MpIdx, A.MockType, MQ.MqIdx, MQ.QuestionNO, MQ.RightAnswer, MQ.Scoring
                    ,IF(MQ.Difficulty='T','상',(IF(MQ.Difficulty='M','중',(IF(MQ.Difficulty='N','','하')))))AS Difficulty
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx AND b.Answer = 1
                        GROUP BY a.TakeMockPart, b.MpIdx, b.Answer
                    ),0) AS marking_cnt_num_1
            
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx AND b.Answer = 2
                        GROUP BY a.TakeMockPart, b.MpIdx, b.Answer
                    ),0) AS marking_cnt_num_2
            
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx AND b.Answer = 3
                        GROUP BY a.TakeMockPart, b.MpIdx, b.Answer
                    ),0) AS marking_cnt_num_3
            
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx AND b.Answer = 4
                        GROUP BY a.TakeMockPart, b.MpIdx, b.Answer
                    ),0) AS marking_cnt_num_4
            
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx AND b.Answer = 5
                        GROUP BY a.TakeMockPart, b.MpIdx, b.Answer
                    ),0) AS marking_cnt_num_5
            
                    ,IFNULL((
                        SELECT 
                        COUNT(*) AS marking_cnt
                        FROM lms_mock_register AS a
                        INNER JOIN lms_mock_answerpaper AS b ON a.MrIdx = b.MrIdx
                        WHERE b.ProdCode = ? AND a.TakeMockPart = TM.TakeMockPart AND b.MpIdx = A.MpIdx AND b.MqIdx = MQ.MqIdx
                        GROUP BY a.TakeMockPart, b.MpIdx
                    ),0) AS total_marking_cnt
            
                    FROM (
                        SELECT PM.ProdCode, MP.MpIdx, MRS.SubjectIdx, PMP.MockType
                        FROM lms_product_mock AS PM
                        INNER JOIN lms_product_mock_r_paper AS PMP ON PM.ProdCode = PMP.ProdCode AND PMP.IsStatus='Y'
                        INNER JOIN lms_mock_paper_new AS MP ON PMP.MpIdx = MP.MpIdx AND MP.IsStatus='Y' AND MP.IsUse='Y'
                        INNER JOIN lms_mock_paper_r_category AS MPRC ON MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                        INNER JOIN lms_mock_r_category AS MRC ON MPRC.MrcIdx = MRC.MrcIdx AND MRC.IsStatus='Y'
                        INNER JOIN lms_mock_r_subject AS MRS ON MRC.MrsIdx = MRS.MrsIdx AND MRS.IsStatus='Y'
                        INNER JOIN lms_product_subject AS SJ ON MRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                        WHERE PM.ProdCode = ?
                        GROUP BY MP.MpIdx
                    ) AS A
                    INNER JOIN lms_mock_questions AS MQ ON MQ.MpIdx = A.MpIdx AND MQ.IsStatus = 'Y'
                    INNER JOIN lms_product_subject AS PS ON A.SubjectIdx = PS.SubjectIdx AND PS.IsUse = 'Y' AND PS.IsStatus = 'Y'
                    INNER JOIN lms_mock_area_list AS MAL ON MAL.MalIdx = MQ.MalIdx AND MAL.IsUse = 'Y' AND MAL.IsStatus = 'Y'
                    INNER JOIN (
                        SELECT ProdCode, TakeMockPart
                        FROM lms_mock_register
                        WHERE ProdCode = ?
                        GROUP BY TakeMockPart
                    ) AS TM ON TM.ProdCode = A.ProdCode		
                ) AS P
            ) AS M
            ORDER BY M.TakeMockPart, M.MpIdx, M.MqIdx ASC
        ";
        return $this->_conn->query('select ' . $query_string, [
            $prod_code,$prod_code,$prod_code,$prod_code,$prod_code
            ,$prod_code,$prod_code,$prod_code,$prod_code,$prod_code
            ,$prod_code,$prod_code,$prod_code,$prod_code,$prod_code
            ,$prod_code,$prod_code,$prod_code,$prod_code,$prod_code
        ])->result_array();
    }

    /**
     * 응시자 마킹정보 엑셀 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function answerDataExcel($arr_condition)
    {
        $column = 'r.TakeMockPartName, r.SubjectName, r.TakeNumber, r.MemName, m.Answer';
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = " ORDER BY m.MpIdx, m.MrIdx ASC";

        $from = "
            FROM (
                SELECT
                a.ProdCode,a.MrIdx,a.MpIdx
                ,GROUP_CONCAT(a.Answer ORDER BY a.MqIdx ASC) AS Answer
                FROM {$this->_table['mock_answerpaper']} AS a
                INNER JOIN {$this->_table['mock_questions']} AS b ON a.MqIdx = b.MqIdx
                {$where}
                GROUP BY a.MrIdx,a.MpIdx
            ) AS m
            
            INNER JOIN (
                SELECT
                a.ProdCode, a.MrIdx, b.MpIdx,
                sc1.CcdName AS TakeMockPartName,c.SubjectName,a.TakeNumber,m.MemName
                FROM {$this->_table['mock_register']} AS a
                INNER JOIN {$this->_table['mock_register_r_paper']} AS b ON a.MrIdx = b.MrIdx AND a.ProdCode = b.ProdCode
                INNER JOIN {$this->_table['lms_member']} AS m ON a.MemIdx = m.MemIdx
                INNER JOIN {$this->_table['product_subject']} AS c ON b.SubjectIdx = c.SubjectIdx
                INNER JOIN {$this->_table['sys_code']} AS sc1 ON a.TakeMockPart = sc1.Ccd
                {$where}
            ) AS r ON m.ProdCode = r.ProdCode AND m.MrIdx = r.MrIdx AND m.MpIdx = r.MpIdx
        ";
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }


    /**
     * 응시번호기준 접수식별자, 회원식별자 조회
     * @param $prod_code
     * @param $arr_take_num
     * @return array
     */
    private function _findRegister($prod_code, $arr_take_num)
    {
        $column = 'MR.TakeNumber, MR.MrIdx, MR.MemIdx';
        $arr_condition = [
            'EQ' => [
                'MR.ProdCode' => $prod_code,
                'MR.IsStatus' => 'Y',
                'MR.TakeForm' => $this->_take_form_ccd
            ],
            'IN' => [
                'MR.TakeNumber' => $arr_take_num
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_register']} AS MR
            INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx AND OP.PayStatusCcd = '676001'
        ";
        $result = $this->_conn->query('select ' . $column . $from . $where)->result_array();
        $data = [];
        foreach ($result as $row) {
            $data[$row['TakeNumber']]['mr_idx'] = $row['MrIdx'];
            $data[$row['TakeNumber']]['mem_idx'] = $row['MemIdx'];
        }

        return $data;
    }

    /**
     * 문항(답안) 조회
     * @param string $prod_code
     * @return array
     */
    private function _findQuestions($prod_code = '')
    {
        $column = 'MQ.MpIdx, MQ.MqIdx, MQ.QuestionNo, RightAnswer';
        $arr_condition = [
            'EQ' => [
                'PMRP.ProdCode' => $prod_code,
                'PMRP.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['product_mock_r_paper']} AS PMRP
            JOIN {$this->_table['mock_questions']} AS MQ ON PMRP.MpIdx = MQ.MpIdx AND MQ.IsStatus = 'Y'
        ";
        $order_by = " ORDER BY MQ.MpIdx, MQ.QuestionNO";
        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
        $data = [];
        foreach ($result as $row) {
            $data[$row['MpIdx']][$row['QuestionNo']]['MqIdx'] = $row['MqIdx'];
            $data[$row['MpIdx']][$row['QuestionNo']]['RightAnswer'] = $row['RightAnswer'];
        }

        return $data;
    }

    /**
     * @param string $prod_code
     * @return mixed
     */
    private function _countAnswerPaper($prod_code = '')
    {
        $column = 'count(*) AS numrows';
        $arr_condition = [
            'EQ' => [
                'ProdCode' => $prod_code
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = " FROM {$this->_table['mock_answerpaper']}";
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 조정점수 데이터 셋팅
     * @param string $prod_code
     * @return array
     */
    private function _getAdjustData($prod_code = '')
    {
        $arr_user_point = $this->_getUserPoint($prod_code);         //유저별, 과목별 점수 (가산점포함)
        $arr_user_avg_data = $this->_getUserAvgPoint($prod_code);   //유저별, 과목별 평균점수 (가산점포함)
        /*$arr_set_rank = $this->_arrSetRank($arr_user_point);*/

        //과목별 표준편차
        $arr_sum = null;
        $sum = 0;
        $arr_standard_deviation = [];
        foreach ($arr_user_point as $row) {
            if (empty($arr_user_avg_data[$row['MpIdx']]) === false) {
                $sum = pow($row['SumOrgPoint'] - $arr_user_avg_data[$row['MpIdx']]['AvgOrgPoint'], 2);
            }
            $arr_sum[$row['MpIdx']] = (empty($arr_sum[$row['MpIdx']]) === true ? 0 : $arr_sum[$row['MpIdx']]) + $sum;
        }
        foreach ($arr_user_avg_data as $key => $val) {
            $subject_cnt = $val['userTotalCnt'] - 1;
            $arr_standard_deviation[$key] = (empty($arr_sum[$key]) === true || $arr_sum[$key] <= 0) ? '0' : round(sqrt($arr_sum[$key] / $subject_cnt), 2);
        }

        //조정점수 [선택과목만 계산]
        foreach ($arr_user_point as $key => $val) {
            if ($val['MockType'] == 'E') {
                $arr_user_point[$key]['AdjustPoint'] = $val['SumOrgPoint'];
                $arr_user_point[$key]['StandardDeviation'] = 0;
            } else {
                if (isset($arr_standard_deviation[$val['MpIdx']])) {
                    if ($arr_standard_deviation[$val['MpIdx']] == 0) {
                        $arr_user_point[$key]['AdjustPoint'] = ( 0 * 10 ) + 50;
                        $arr_user_point[$key]['StandardDeviation'] = $arr_standard_deviation[$val['MpIdx']];
                    } else {
                        $avg_data = $arr_user_avg_data[$val['MpIdx']]['AvgOrgPoint'];
                        $arr_user_point[$key]['AdjustPoint'] = round((($val['SumOrgPoint'] - $avg_data) / $arr_standard_deviation[$val['MpIdx']] * 10) + 50, 2);
                        $arr_user_point[$key]['StandardDeviation'] = $arr_standard_deviation[$val['MpIdx']];
                    }
                } else {
                    $arr_user_point[$key]['AdjustPoint'] = 0;
                    $arr_user_point[$key]['StandardDeviation'] = 0;
                }
            }

            /*if (empty($arr_set_rank[$val['MpIdx']]) === false) {
                $arr_user_point[$key]['Rank'] = $arr_set_rank[$val['MpIdx']][$val['SumOrgPoint']] + 1;
            }*/
        }
        return $arr_user_point;
    }

    /**
     * 저장데이터 셋팅
     * @param array $arr_data
     * @return array
     */
    private function _setInputData($arr_data = [])
    {
        $return_data = [];
        foreach ($arr_data as $key => $val) {
            $return_data[$key]['MemIdx'] = $val['MemIdx'];
            $return_data[$key]['MrIdx'] = $val['MrIdx'];
            $return_data[$key]['ProdCode'] = $val['ProdCode'];
            $return_data[$key]['MpIdx'] = $val['MpIdx'];
            $return_data[$key]['UseTime'] = $val['Rsec'];
            $return_data[$key]['OrgPoint'] = $val['SumOrgPoint'];
            $return_data[$key]['AdjustPoint'] = $val['AdjustPoint'];
            /*$return_data[$key]['Rank'] = $val['Rank'];*/
            $return_data[$key]['Rank'] = 0;
            $return_data[$key]['StandardDeviation'] = $val['StandardDeviation'];
        }
        return $return_data;
    }

    /**
     * 응시자별 과목별 점수
     * @param string $prod_code
     * @return mixed
     */
    private function _getUserPoint($prod_code = '')
    {
        $column = "
            MR.MrIdx, M.MpIdx, M.MockType, MR.MemIdx, MR.AddPoint, MA.ProdCode,
            SUM(IF(MA.IsWrong = 'Y', M.Scoring, '0')) + M.TotalScore * (MR.AddPoint * 0.01) AS SumOrgPoint,
            (SELECT RemainSec FROM {$this->_table['mock_log']} WHERE LogIdx = MA.LogIdx) AS Rsec
        ";

        $from = "
            FROM
            (
                SELECT a1.ProdCode, a1.MockType, b1.MpIdx, b1.TotalScore, c1.Scoring, c1.MqIdx
                FROM (
                    SELECT a.ProdCode, b.MpIdx, b.MockType
                    FROM {$this->_table['mock_product']} AS a
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode AND b.IsStatus = 'Y'
                    WHERE a.ProdCode = '{$prod_code}'
                ) AS a1
                INNER JOIN {$this->_table['mock_paper']} AS b1 ON a1.MpIdx = b1.MpIdx AND b1.IsUse = 'Y' AND b1.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_questions']} AS c1 ON b1.MpIdx = c1.MpIdx AND c1.IsStatus = 'Y'
            ) AS M
            INNER JOIN {$this->_table['mock_answerpaper']} AS MA ON M.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' 
            INNER JOIN {$this->_table['mock_register']} AS MR ON MA.MrIdx = MR.MrIdx AND MR.IsStatus = 'Y' AND MR.IsTake = 'Y'
        ";
        $group_by = ' GROUP BY MA.MrIdx, MA.MpIdx';
        $order_by = ' ORDER BY M.MpIdx, SumOrgPoint DESC';
        return $this->_conn->query('select ' . $column . $from . $group_by . $order_by)->result_array();
    }

    /**
     * 과목평균/응시자 수
     * @param string $prod_code
     * @return array
     */
    private function _getUserAvgPoint($prod_code = '')
    {
        $column = "
            M2.MpIdx, ROUND(AVG(M2.SumOrgPoint)) AS AvgOrgPoint, COUNT(*) AS cnt
        ";

        $from = "
            FROM (
                SELECT M.MpIdx, M.MockType, MR.AddPoint, MA.ProdCode
                ,SUM(IF(MA.IsWrong = 'Y', M.Scoring, '0')) + M.TotalScore * (MR.AddPoint * 0.01) AS SumOrgPoint
                FROM
                (
                    SELECT a1.ProdCode, a1.MockType, b1.MpIdx, b1.TotalScore, c1.Scoring, c1.MqIdx
                    FROM (
                        SELECT a.ProdCode, b.MpIdx, b.MockType
                        FROM {$this->_table['mock_product']} AS a
                        INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode AND b.IsStatus = 'Y'
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS a1
                    INNER JOIN {$this->_table['mock_paper']} AS b1 ON a1.MpIdx = b1.MpIdx AND b1.IsUse = 'Y' AND b1.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_questions']} AS c1 ON b1.MpIdx = c1.MpIdx AND c1.IsStatus = 'Y'
                ) AS M
                INNER JOIN {$this->_table['mock_answerpaper']} AS MA ON M.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' 
                INNER JOIN {$this->_table['mock_register']} AS MR ON MA.MrIdx = MR.MrIdx AND MR.IsStatus = 'Y' #AND MR.IsTake = 'Y'
                GROUP BY MA.MrIdx, MA.MpIdx
            ) AS M2
        ";
        $group_by = ' GROUP BY M2.MpIdx';
        $data = $this->_conn->query('select ' . $column . $from . $group_by)->result_array();

        $result = [];
        foreach ($data as $key => $row) {
            $result[$row['MpIdx']]['AvgOrgPoint'] = $row['AvgOrgPoint'];
            $result[$row['MpIdx']]['userTotalCnt'] = $row['cnt'];
        }
        return $result;
    }

    /**
     * 등록된 과목별 총점 등수 셋팅
     * @param $user_list
     * @return array
     */
    private function _arrSetRank($user_list)
    {
        $arr_set_rank = [];
        $set_rank = [];

        foreach ($user_list as $key => $val) {
            $tmp_mapping_data = $val['MpIdx'];
            $arr_set_rank[$tmp_mapping_data][] = $val['SumOrgPoint'];

            rsort($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_unique($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_keys($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
        }
        return $set_rank;
    }

    /**
     * 조정점수반영 로그
     * @param $prod_code
     * @param $mode
     * @return array|bool
     */
    private function _addMockGradesLog($prod_code, $mode)
    {
        try {
            $this->_conn->where(['ProdCode' => $prod_code]);
            if ($this->_conn->delete($this->_table['mock_grades']) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'ProdCode' => $prod_code
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'ProdCode' => $prod_code
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mock_grades_log']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
}