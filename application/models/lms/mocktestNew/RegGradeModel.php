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
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product' => 'lms_product',
        'product_subject' => 'lms_product_subject',
        'product_cate' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'vw_product_mocktest' => 'vw_product_mocktest',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
    ];

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
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_off']}) AS OfflineCnt,
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
            PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,'~',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
            (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_on']}) AS OnlineCnt,
            (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_off']}) AS OfflineCnt,
            (SELECT COUNT(*) FROM {$this->_table['mock_grades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,  
            fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,
            C1.CateName, C1.IsUse AS IsUseCate, SC1.CcdName As AcceptStatusCcd_Name,
            MGL.LastGradesUpdAdminId, MGL.LastGradesUpdAdminName, MGL.LastGradesUpdDatm, ST.SiteName
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

        /*echo '<pre>'.'select ' . $column . $from . $where.'</pre>';*/
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }

    /**
     * 시험지데이터 조회
     * @param string $prod_code
     * @param string $column
     * @return mixed
     */
    /*public function findProductMockPaper($prod_code = '', $column = '')
    {
        $arr_condition = [
            'EQ' => [
                'PM.ProdCode' => $prod_code,
                'MP.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']}  AS PM
            JOIN {$this->_table['product_mock_r_paper']} AS MP ON PM.Prodcode = MP.ProdCode
        ";
        $order_by = " GROUP BY MpIdx ORDER BY MockType, OrderNum ";
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }*/

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
            M.*
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
                SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, A.MockType, A.SubjectName
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
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS e ON e.ProdCode = b.ProdCode AND e.MpIdx = b.MpIdx
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
        $arr_set_rank = $this->_arrSetRank($arr_user_point);

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

            if (empty($arr_set_rank[$val['MpIdx']]) === false) {
                $arr_user_point[$key]['Rank'] = $arr_set_rank[$val['MpIdx']][$val['SumOrgPoint']] + 1;
            }
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
            $return_data[$key]['Rank'] = $val['Rank'];
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
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode
                    WHERE a.ProdCode = '{$prod_code}'
                ) AS a1
                INNER JOIN {$this->_table['mock_paper']} AS b1 ON a1.MpIdx = b1.MpIdx AND b1.IsUse = 'Y' AND b1.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_questions']} AS c1 ON b1.MpIdx = c1.MpIdx AND c1.IsStatus = 'Y'
            ) AS M
            INNER JOIN {$this->_table['mock_answerpaper']} AS MA ON M.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' 
            INNER JOIN {$this->_table['mock_register']} AS MR ON MA.MrIdx = MR.MrIdx AND MR.IsStatus = 'Y' #AND MR.IsTake = 'Y'
        ";
        $group_by = ' GROUP BY MA.MrIdx, MA.MpIdx';
        $order_by = ' ORDER BY M.MpIdx, SumOrgPoint DESC';
        /*echo '<pre>'.'select ' . $column . $from . $group_by . $order_by.'</pre>';*/
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
                        INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode
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