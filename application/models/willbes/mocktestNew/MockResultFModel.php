<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockResultFModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_Product',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_area' => 'lms_mock_area',
        'mock_area_list' => 'lms_mock_area_list',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'mock_wronganswernote' => 'lms_mock_wronganswernote',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_questions' => 'lms_mock_questions',
        'mock_grades' => 'lms_mock_grades',
        'mock_grades_log' => 'lms_mock_grades_log',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'product_mock' => 'lms_product_mock',
        'product_subject' => 'lms_product_subject',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'lms_member' => 'lms_member',
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'category' => 'lms_sys_category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listExam($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                MR.MemIdx, MP.*, MR.IsTake AS MrIsStatus, MR.MrIdx, MR.TakeForm,
                PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate, IsDisplay,
                (SELECT SiteGroupName FROM {$this->_table['site_group']} WHERE SiteGroupCode = (SELECT SiteGroupCode FROM {$this->_table['site']} WHERE SiteCode = PD.SiteCode)) AS SiteName,
                (SELECT RegDatm FROM {$this->_table['mock_answerpaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                (SELECT IFNULL(SUM(IF(MA.IsWrong = 'Y', Scoring, '0')),'0') AS Res
                    FROM {$this->_table['mock_paper']} AS MP
                    JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                    JOIN {$this->_table['mock_answerpaper']} AS MA ON MQ.MqIdx = MA.MqIdx 
                    JOIN {$this->_table['mock_register']} AS MMR ON MMR.MrIdx = MA.MrIdx
                    WHERE MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
                ) AS TCNT,
                (SELECT COUNT(*) FROM {$this->_table['mock_register_r_paper']} WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
                (SELECT RegDatm FROM {$this->_table['mock_answerpaper']} WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 온라인응시자만 나오게
        $from = "
            FROM {$this->_table['product_mock']} AS MP
                INNER JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                INNER JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
                INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx AND PayStatusCcd = '676001'  -- 결제완료
                INNER JOIN {$this->_table['order']} AS O ON O.OrderIdx = OP.OrderIdx                
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 과목파일 정보 조회
     * @param $prod_code
     * @return mixed
     */
    public function findSubjectFile($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $this->session->userdata('mem_idx'),
                'MR.ProdCode' => $prod_code,
                'MR.IsStatus' => 'Y',
                'OP.PayStatusCcd' => '676001'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            (SELECT SubjectName FROM {$this->_table['product_subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            #IFNULL(NULLIF(MP.FrontRealQuestionFile,''),MP.RealQuestionFile) AS fileQ,
            MP.RealQuestionFile AS fileQ,
            MP.RealExplanFile AS fileA, MP.FilePath AS PFilePath, MP.MpIdx
        ";

        $from = "
            FROM {$this->_table['mock_register']} AS MR    
            JOIN {$this->_table['mock_register_r_paper']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
            INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx
            LEFT OUTER JOIN {$this->_table['mock_paper']} AS MP ON RP.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y'
        ";
        $order_by = " ORDER BY SubjectIdx";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 종합성적조회
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function gradeInfo($prod_code, $mr_idx)
    {
        $arr_condition = [
            'EQ' => [
                'MG.ProdCode' => $prod_code,
                'MG.MrIdx' => $mr_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            MB.MemName
            ,IFNULL(SUM(OrgPoint),0) AS SumOrgPoint                 #나의 원점수총점
            ,IFNULL(SUM(AdjustPoint),0) AS SumAdjustPoint           #나의 조정점수총점
            ,IFNULL(ROUND(AVG(OrgPoint),2),0) AS AvgOrgPoint        #나의 원점수평균
            ,IFNULL(ROUND(AVG(AdjustPoint),2),0) AS AvgAdjustPoint  #나의 조정점수평균
            ,IFNULL(ORank.OrgRankNum,0) AS OrgRankNum               #원점수내석차
            ,IFNULL(ARank.AdjustRankNum,0) AS AdjustRankNum         #원점수내석차
            ,(SELECT ROUND(AVG(OrgPoint),2) AS TotalAvgOrgPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code}) AS TotalAvgOrgPoint          #전체 원점수평균
            ,(SELECT ROUND(AVG(AdjustPoint),2) AS TotalAvgAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code}) AS TotalAvgAdjustPoint #전체 조정점수평균
            ,(SELECT MAX(A.sumAPoint) AS MaxPoint FROM (SELECT SUM(AdjustPoint) AS sumAPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A) AS MaxPoint  #최고점수
            ,(SELECT ROUND(AVG(a.sumP),2) FROM (SELECT SUM(AdjustPoint) AS sumP FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS a) AS MrTotalAvgAdjustPoint  #전체 MrIdx기준 조정점수평균
            ,(SELECT COUNT(TC.MrIdx) AS TotalCount FROM (SELECT MrIdx FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS TC) AS TotalCount    #전체석차
        ";

        $from = "
            FROM {$this->_table['mock_grades']} AS MG
            INNER JOIN {$this->_table['mock_register']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y'
            INNER JOIN {$this->_table['order_product']} AS OP ON MR.OrderProdIdx = OP.OrderProdIdx AND OP.PayStatusCcd = '676001'
            INNER JOIN {$this->_table['lms_member']} AS MB ON MR.MemIdx = MB.MemIdx
            INNER JOIN
            (
                SELECT R.MrIdx, RANK() OVER (PARTITION BY R.ProdCode ORDER BY R.avgOrgPoint DESC) AS OrgRankNum
                FROM (
                    SELECT ProdCode, MrIdx, AVG(OrgPoint) AS avgOrgPoint
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = {$prod_code}
                    GROUP BY MrIdx
                ) AS R
            ) AS ORank ON MG.MrIdx = ORank.MrIdx
            INNER JOIN
            (
                SELECT R.MrIdx, RANK() OVER (PARTITION BY R.ProdCode ORDER BY R.avgAdjustPoint DESC) AS AdjustRankNum
                FROM (
                    SELECT ProdCode, MrIdx, AVG(AdjustPoint) AS avgAdjustPoint
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = {$prod_code}
                    GROUP BY MrIdx
                ) AS R
            ) AS ARank ON MG.MrIdx = ARank.MrIdx
        ";
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    public function selectivity($prod_code)
    {
        $query_string = "
            (SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint <= 4) AS cnt_5
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 5 AND 9) AS cnt_10
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 10 AND 14) AS cnt_15
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 15 AND 19) AS cnt_20
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 20 AND 24) AS cnt_25
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 25 AND 29) AS cnt_30
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 30 AND 34) AS cnt_35
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 35 AND 39) AS cnt_40
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 40 AND 44) AS cnt_45
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 45 AND 49) AS cnt_50
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 50 AND 54) AS cnt_55
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 55 AND 59) AS cnt_60
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 60 AND 64) AS cnt_65
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 65 AND 69) AS cnt_70
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 70 AND 74) AS cnt_75
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 75 AND 79) AS cnt_80
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 80 AND 84) AS cnt_85
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 85 AND 89) AS cnt_90
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 90 AND 94) AS cnt_95
            ,(SELECT COUNT(*) AS cnt FROM (SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} GROUP BY MrIdx) AS A WHERE A.SumAdjustPoint BETWEEN 95 AND 100) AS cnt_100
        ";
        return $this->_conn->query('select ' . $query_string)->row_array();
    }

    /**
     * 회원과목별상세
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function registerForSubjectDetail($prod_code, $mr_idx)
    {
        $column = "
            M.*            
            ,IFNULL((SELECT OrgPoint FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}'),0) AS MyOrgPoint
            ,IFNULL(ROUND((SELECT AdjustPoint FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}'),2),0) AS MyAdjustPoint
            ,IFNULL((SELECT RANK FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}'),0) AS MyRank
            ,ROUND(((IFNULL((SELECT RANK FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}'),0) / M.TotalRank) * 100),2) tpct    #백분위
            
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
                ,ROUND(AVG(A.OrgPoint), 2) AS AvgOrgPoint       #원점수평균
                ,ROUND(AVG(A.AdjustPoint),2) AS AvgAdjustPoint  #조정점수평균
                ,ROUND(MAX(A.OrgPoint),2) AS MaxOrgPoint        #원점수최고점
                ,ROUND(MAX(A.AdjustPoint),2) AS MaxAdjustPoint  #조정점수최고점
                ,A.StandardDeviation                            #표준편차
                ,COUNT(A.MpIdx) AS MemCount                     #응시인원
                ,Max(A.Rank) AS TotalRank                       #총석차
                ,fn_ccd_name(A.TakeMockPart) AS TakeMockPartName
                FROM (
                    SELECT 
                    a.ProdCode, a.TakeMockPart, b.MpIdx, b.Rank, e.MockType, b.OrgPoint, b.AdjustPoint, b.StandardDeviation, c.SubjectIdx, d.SubjectName
                    FROM {$this->_table['mock_register']} AS a
                    INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                    INNER JOIN {$this->_table['mock_register_r_paper']} AS c ON a.MrIdx = c.MrIdx AND c.MpIdx = b.MpIdx
                    INNER JOIN {$this->_table['product_subject']} AS d ON c.SubjectIdx = d.SubjectIdx
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS e ON e.ProdCode = b.ProdCode AND e.MpIdx = b.MpIdx
                    WHERE a.ProdCode = '{$prod_code}' AND c.MpIdx IN (SELECT MpIdx FROM {$this->_table['mock_register_r_paper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}')
                ) AS A
                GROUP BY A.MpIdx
            ) AS M
        ";
        return $this->_conn->query('select ' . $column . $from)->result_array();
    }

    /**
     * 과목별,문항별 분석
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function gradeSubjectDetail($prod_code, $mr_idx)
    {
        $column = "
            P.*, MA.Answer, MA.IsWrong
            ,(
                SELECT ROUND(((ycnt / (ycnt + ncnt)) * 100), 2) AS QAVR
                FROM (
                    SELECT MP.MpIdx,MQ.MqIdx
                    ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE MqIdx = MQ.MqIdx AND MpIdx = MP.MpIdx AND IsWrong = 'Y') AS ycnt
                    ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE MqIdx = MQ.MqIdx AND MpIdx = Mp.MpIdx AND IsWrong = 'N') AS ncnt
                    FROM {$this->_table['mock_paper']} AS MP
                    JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['product_mock_r_paper']} AS PM ON Mp.MpIdx = PM.MpIdx 
                    AND PM.ProdCode = '{$prod_code}'
                    AND PM.IsStatus = 'Y'
                    GROUP BY MQ.MqIdx
                ) AS A
                WHERE A.MpIdx = MA.MpIdx AND A.MqIdx = MA.MqIdx
            ) AS QAVR
        ";

        $from = "
            FROM (
                SELECT 
                PS.SubjectName, A.MpIdx, A.MockType, A.OrderNum, MQ.MqIdx, MQ.MalIdx, MQ.QuestionNO, MQ.RightAnswer
                ,IF(MQ.Difficulty='T','상',(IF(MQ.Difficulty='M','중','하')))AS Difficulty
                FROM
                (
                    SELECT PM.ProdCode, MP.MpIdx, MRS.SubjectIdx, PMP.MockType, PMP.OrderNum
                    FROM {$this->_table['product_mock']} AS PM
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS PMP ON PM.ProdCode = PMP.ProdCode AND PMP.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_paper']} AS MP ON PMP.MpIdx = MP.MpIdx AND MP.IsStatus='Y' AND MP.IsUse='Y'
                    INNER JOIN {$this->_table['mock_paper_r_category']} AS MPRC ON MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_r_category']} AS MRC ON MPRC.MrcIdx = MRC.MrcIdx AND MRC.IsStatus='Y'
                    INNER JOIN {$this->_table['mock_r_subject']} AS MRS ON MRC.MrsIdx = MRS.MrsIdx AND MRS.IsStatus='Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    WHERE PM.ProdCode = '{$prod_code}' AND Mp.MpIdx IN (SELECT MpIdx FROM {$this->_table['mock_register_r_paper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}')
                    GROUP BY MP.MpIdx
                ) AS A
                INNER JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = A.MpIdx AND MQ.IsStatus = 'Y'
                INNER JOIN {$this->_table['product_subject']} AS PS ON A.SubjectIdx = PS.SubjectIdx AND PS.IsUse = 'Y' AND PS.IsStatus = 'Y'
            ) AS P
            LEFT JOIN {$this->_table['mock_answerpaper']} AS MA ON P.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' AND MA.MrIdx = '{$mr_idx}'
        ";
        $order_by = " ORDER BY P.MpIdx, P.OrderNum, P.QuestionNO";
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 과목별, 항목영역별 데이타 조회
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function gradeSubjectAreaData($prod_code, $mr_idx)
    {
        $column = "
            S.SubjectName, S.MockType, S.MpIdx, S.MalIdx
            ,SUM(S.myYcnt) AS sumMyYcnt                 #맞은개수
            ,SUM(S.myNcnt) AS sumMyYcnt                 #틀린개수
            ,SUM(S.myYcnt) + SUM(S.myNcnt) AS TotalCnt  #전체문항수
            ,ROUND(AVG(S.avgMq),2) AS avgMq             #전체문항의평균
            ,GROUP_CONCAT(QuestionNo) AS gQuestionNo    #관련문항
            ,MAL.AreaName                               #영역명
            ,GROUP_CONCAT(nQuestionNo) AS nQuestionNo   #오답문항
        ";

        $from = "
            FROM (
                SELECT 
                P.SubjectName, P.MockType, P.MpIdx, P.MqIdx, P.MalIdx, P.QuestionNo
                ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}' AND MqIdx = P.MqIdx AND IsWrong = 'Y') AS myYcnt
                ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}' AND MqIdx = p.MqIdx AND IsWrong = 'N') AS myNcnt
                ,(SELECT QuestionNo FROM {$this->_table['mock_answerpaper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}' AND MqIdx = P.MqIdx AND IsWrong = 'N') AS nQuestionNo
                ,AV.avgMq
                FROM (
                    SELECT 
                    A.ProdCode, PS.SubjectName, A.MpIdx, A.MockType, A.OrderNum, MQ.MqIdx, MQ.MalIdx, MQ.QuestionNO, MQ.RightAnswer
                    FROM
                    (
                        SELECT PM.ProdCode, MP.MpIdx, MRS.SubjectIdx, PMP.MockType, PMP.OrderNum
                        FROM {$this->_table['product_mock']} AS PM
                        INNER JOIN {$this->_table['product_mock_r_paper']} AS PMP ON PM.ProdCode = PMP.ProdCode AND PMP.IsStatus='Y'
                        INNER JOIN {$this->_table['mock_paper']} AS MP ON PMP.MpIdx = MP.MpIdx AND MP.IsStatus='Y' AND MP.IsUse='Y'
                        INNER JOIN {$this->_table['mock_paper_r_category']} AS MPRC ON MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                        INNER JOIN {$this->_table['mock_r_category']} AS MRC ON MPRC.MrcIdx = MRC.MrcIdx AND MRC.IsStatus='Y'
                        INNER JOIN {$this->_table['mock_r_subject']} AS MRS ON MRC.MrsIdx = MRS.MrsIdx AND MRS.IsStatus='Y'
                        INNER JOIN {$this->_table['product_subject']} AS SJ ON MRS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                        WHERE PM.ProdCode = '{$prod_code}' AND Mp.MpIdx IN (SELECT MpIdx FROM {$this->_table['mock_register_r_paper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}')
                        GROUP BY MP.MpIdx
                    ) AS A
                    INNER JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = A.MpIdx AND MQ.IsStatus = 'Y'
                    INNER JOIN {$this->_table['product_subject']} AS PS ON A.SubjectIdx = PS.SubjectIdx AND PS.IsUse = 'Y' AND PS.IsStatus = 'Y'
                ) AS P
                LEFT JOIN (
                    SELECT a.MqIdx, ROUND((b.yCount / a.TotalCount) * 100,2) AS avgMq
                    FROM (
                        SELECT a.MqIdx, COUNT(*) AS TotalCount
                        FROM {$this->_table['mock_answerpaper']} AS a
                        WHERE ProdCode = '{$prod_code}'
                        GROUP BY a.MqIdx
                    ) AS a
                    INNER JOIN (
                        SELECT a.MqIdx, COUNT(*) AS yCount
                        FROM {$this->_table['mock_answerpaper']} AS a
                        INNER JOIN {$this->_table['mock_questions']} AS b ON a.MqIdx = b.MqIdx
                        WHERE ProdCode = '{$prod_code}' AND a.IsWrong = 'Y'
                        GROUP BY a.MqIdx
                    ) AS b ON a.MqIdx = b.MqIdx
                ) AS AV ON P.MqIdx = AV.MqIdx
                ORDER BY P.MockType, P.MpIdx, P.OrderNum, P.QuestionNo    
            ) AS S
            LEFT JOIN {$this->_table['mock_area_list']} AS MAL ON S.MalIdx = MAL.MalIdx AND MAL.IsStatus = 'Y'
        ";
        $group_by = " GROUP BY S.MalIdx";
        $order_by = " ORDER BY S.MockType, S.MpIdx, S.QuestionNO ASC";
        return $this->_conn->query('select ' . $column . $from . $group_by . $order_by)->result_array();
    }

    /**
     * 과목별 문제영역 조회
     * @param $arr_subject_data
     * @return mixed
     */
    public function areaList($arr_subject_data)
    {
        $arr_condition = [
            'IN' => [
                'MP.MpIdx' => array_keys($arr_subject_data)
            ],
            'EQ' => [
                'MP.IsUse' => 'Y',
                'MP.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = " GROUP BY MQ.MalIdx";
        $order_by = " ORDER BY M.MpIdx, M.MalIdx";
        $column = "M.MpIdx, M.MalIdx, M.AreaName";
        $from = "
            FROM (
                SELECT MP.MpIdx, MQ.MalIdx, MAL.AreaName
                FROM {$this->_table['mock_paper']} AS MP
                INNER JOIN {$this->_table['mock_questions']} AS MQ ON MP.MpIdx = MQ.MpIdx AND MQ.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_area']} AS MA ON MP.MaIdx = MA.MaIdx AND MA.IsUse = 'Y' AND MA.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_area_list']} AS MAL ON MQ.MalIdx = MAL.MalIdx AND MAL.IsStatus = 'Y'
                {$where} {$group_by}                
            ) AS M
        ";
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 오답노트 리스트
     * @param string $prod_code
     * @param string $mr_idx
     * @param array $arr_condition
     * @param string $wrong_note_type
     * @return mixed
     */
    public function answerForNoteList($prod_code = '', $mr_idx = '', $arr_condition = [], $wrong_note_type = '')
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            AP.MrIdx, MP.MpIdx, MQ.MqIdx, MQ.QuestionNO,
            MP.RealQuestionFile AS filetotal,
            IFNULL(NULLIF(MP.FrontRealQuestionFile,''),MP.RealQuestionFile) AS FrontRealQuestionFile,
            MQ.RealQuestionFile,
            MQ.RealExplanFile,
            MQ.FilePath AS QFilePath,
            MQ.MalIdx, AP.IsWrong, WN.MqIdx AS myMq, MwaIdx, Memo
        ";

        $from = "
            FROM {$this->_table['mock_paper']} AS MP
            INNER JOIN {$this->_table['mock_area']} AS MA ON MP.MaIdx = MA.MaIdx AND MA.IsUse = 'Y' AND MA.IsStatus = 'Y'
            INNER JOIN {$this->_table['mock_questions']} AS MQ  ON MP.MpIdx = MQ.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
            INNER JOIN {$this->_table['mock_area_list']} AS MAL ON MQ.MalIdx = MAL.MalIdx AND MAL.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['mock_answerpaper']} AS AP ON MQ.MqIdx = AP.MqIdx AND AP.ProdCode = {$prod_code} AND AP.MrIdx = {$mr_idx} AND AP.MemIdx = {$this->session->userdata('mem_idx')}
            LEFT OUTER JOIN {$this->_table['mock_register_r_paper']} AS RP ON MP.MpIdx = RP.MpIdx AND AP.MrIdx = RP.MrIdx
        ";

        if ($wrong_note_type == 'Y') {
            $from .= "INNER JOIN {$this->_table['mock_wronganswernote']} AS WN ON AP.MqIdx = WN.MqIdx AND WN.ProdCode = {$prod_code} AND WN.MrIdx = {$mr_idx} AND WN.MemIdx = {$this->session->userdata('mem_idx')}";
        } else {
            $from .= "LEFT OUTER JOIN {$this->_table['mock_wronganswernote']} AS WN ON AP.MqIdx = WN.MqIdx AND WN.ProdCode = {$prod_code} AND WN.MrIdx = {$mr_idx} AND WN.MemIdx = {$this->session->userdata('mem_idx')}";
        }

        $order_by = " ORDER BY MQ.QuestionNO";
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 오답노트 저장
     * @param $form_data
     * @return array|bool
     */
    public function addNote($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $prod_code = element('regi_prod_code', $form_data);
            $mr_idx = element('regi_mr_idx', $form_data);
            $mem_idx = $this->session->userdata('mem_idx');
            $mp_idx = element('regi_mp_idx', $form_data);
            $mq_idx = element('regi_mq_idx', $form_data);
            $memo = element('regi_memo', $form_data);

            $arr_condition = [
                'EQ' => [
                    'ProdCode' => $prod_code,
                    'MrIdx' => $mr_idx,
                    'MemIdx' => $mem_idx,
                    'MpIdx' => $mp_idx,
                    'MqIdx' => $mq_idx
                ]
            ];
            $result = $this->_findAnswerNote($arr_condition);
            if (empty($result) === true) {
                $input_data = [
                    'ProdCode' => $prod_code,
                    'MrIdx' => $mr_idx,
                    'MemIdx' => $mem_idx,
                    'MpIdx' => $mp_idx,
                    'MqIdx' => $mq_idx,
                    'Memo' => $memo
                ];
                if ($this->_conn->set($input_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mock_wronganswernote']) === false) {
                    throw new \Exception('오답노트 저장에 실패했습니다.');
                }
            } else {
                // 데이터 수정
                $input_data = ['Memo' => $memo];
                $where = ['ProdCode' => $prod_code, 'MrIdx' => $mr_idx, 'MemIdx' => $this->session->userdata('mem_idx'), 'MpIdx' => $mp_idx, 'MqIdx' => $mq_idx];
                $this->_conn->set($input_data)->set('RegDatm', 'NOW()', false)->where($where);
                if ($this->_conn->update($this->_table['mock_wronganswernote']) === false) {
                    throw new \Exception('오답노트 수정에 실패했습니다.');
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
     * 오답노트 삭제
     * @param $form_data
     * @return array|bool
     */
    public function deleteNote($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $where = [
                'MwaIdx' => element('memo_id', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx')
            ];

            $arr_condition = ['EQ' => $where];
            $result = $this->_findAnswerNote($arr_condition);
            if (empty($result) === true) {
                throw new \Exception('삭제할 문항이 없습니다.');
            }

            if($this->_conn->delete($this->_table['mock_wronganswernote'], $where) === false){
                throw new \Exception('오답노트삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 메모조회
     * @param $arr_condition
     * @return mixed
     */
    private function _findAnswerNote($arr_condition)
    {
        $column = "MwaIdx";
        $from = " FROM {$this->_table['mock_wronganswernote']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //return "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }
}