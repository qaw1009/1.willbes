<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberPrivateModel extends WB_Model
{
    private $_table = [
        'product_mock' => 'lms_product_mock',
        'product' => 'lms_product',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product_r_category' => 'lms_product_r_category',
        'mock_questions' => 'lms_mock_questions',
        'sys_category' => 'lms_sys_category',
        'product_sale' => 'lms_product_sale',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'mock_area_list' => 'lms_mock_area_list',
        'product_subject' => 'lms_product_subject',
        'mock_grades' => 'lms_mock_grades',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'category' => 'lms_sys_category',
        'mock_log' => 'lms_mock_log',
        'lms_member' => 'lms_member',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 개인별성적통계리스트
     * @param bool $is_count
     * @param array $arr_condition_1
     * @param array $arr_condition_2
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function mainList($is_count = false, $arr_condition_1 = [], $arr_condition_2 = [], $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition_1['IN']['PD.SiteCode'] = get_auth_site_codes();       //사이트 권한 추가
        $where_1 = $this->_conn->makeWhere($arr_condition_1);
        $where_1 = $where_1->getMakeWhere(false);

        $where_2 = $this->_conn->makeWhere($arr_condition_2);
        $where_2 = $where_2->getMakeWhere(true);

        if ($is_count === true) {
            $column = "COUNT(*) AS numrows";
            $order_by_offset_limit = '';

        } else {
            if ($is_count == 'excel') {
                $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
                $column = "
                    MB.MemName ,CONCAT(MB.Phone1,'-',fn_dec(MB.Phone2Enc),'-',MB.phone3) AS Phone ,MR.TakeNumber
                    ,fn_ccd_name(MR.TakeForm) AS TakeFormName
                    ,MP.MockYear ,MP.MockRotationNo ,PD.ProdName ,C1.CateName
                    ,fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName
                    ,(
                        SELECT GROUP_CONCAT(SJ.SubjectName)
                        FROM {$this->_table['mock_register_r_paper']} AS MAS
                        JOIN {$this->_table['product_subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
                        WHERE MR.MrIdx = MAS.MrIdx
                    ) AS SubjectName
                    ,fn_ccd_name(MR.TakeArea) AS TakeAreaName
                    ,ROUND((SELECT SUM(AdjustPoint) FROM {$this->_table['mock_grades']} WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx),2) AS AdjustSum
                    ,MR.RegDatm AS ExamRegDatm
                ";
            } else {
                $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                $column = "
                    MR.MemIdx, MB.MemName, MB.MemId, CONCAT(MB.Phone1,'-',fn_dec(MB.Phone2Enc),'-',MB.phone3) AS Phone
                    ,MP.ProdCode ,PD.ProdName, MR.MrIdx, MR.OrderProdIdx
                    ,MR.TakeNumber, MR.TakeMockPart, MR.TakeForm, MR.TakeArea #응시번호,응시직렬,응시형태,응시지역
                    ,MP.MockYear, MP.MockRotationNo, C1.CateName,MR.IsTake #연도, 회차, 카테고리명, 응시/미응시
                    ,MR.RegDatm AS ExamRegDatm #시험종료
                    ,fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName
                    ,fn_ccd_name(MR.TakeForm) AS TakeFormName
                    ,fn_ccd_name(MR.TakeArea) AS TakeAreaName
                    ,(
                        SELECT GROUP_CONCAT(SJ.SubjectName)
                        FROM {$this->_table['mock_register_r_paper']} AS MAS
                        JOIN {$this->_table['product_subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
                        WHERE MR.MrIdx = MAS.MrIdx
                    ) AS SubjectName
                    ,ROUND((SELECT SUM(AdjustPoint) FROM lms_mock_grades WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx),2) AS AdjustSum #총점
                    ,(SELECT COUNT(*) AS tempCnt FROM lms_mock_answertemp WHERE MrIdx = MR.MrIdx AND MemIdx = MR.MemIdx) AS tempCnt
                    ,(SELECT COUNT(*) AS tempCnt FROM lms_mock_answerpaper WHERE MrIdx = MR.MrIdx AND MemIdx = MR.MemIdx) AS answerCnt
                    ,ADMIN.wAdminName AS UpdAdminName
                ";
            }
        }

        $from = "
            FROM {$this->_table['mock_register']} AS MR
            JOIN {$this->_table['lms_member']} AS MB ON MR.MemIdx = MB.MemIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['order_product']} AS OP ON OP.OrderProdIdx = MR.OrderProdIdx AND OP.PayStatusCcd = 676001
            JOIN {$this->_table['order']} AS O ON OP.OrderIdx = O.OrderIdx
            JOIN {$this->_table['product_mock']} AS MP ON MR.ProdCode = MP.ProdCode
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS ADMIN ON MR.UpdAdminIdx = ADMIN.wAdminIdx
        ";

        //과목 검색 조건시 추가
        if (empty($arr_condition_1['EQ']['S.SubjectIdx']) === false) {
            $from .= "
                JOIN lms_mock_register_r_paper AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN lms_mock_paper_new AS MO ON RP.MpIdx = MO.MpIdx
                JOIN lms_product_subject AS S ON RP.SubjectIdx = S.SubjectIdx
            ";
        }

        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where_1 . $where_2 . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원시험접수정보
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function privateExamInfo($prod_code, $mr_idx)
    {
        $arr_condition = [
            'EQ' => [
                'MR.ProdCode' => $prod_code,
                'MR.MrIdx' => $mr_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            M.ProdCode, MB.MemIdx, MB.MemName, CONCAT(MB.Phone1,'-',fn_dec(MB.Phone2Enc),'-',MB.phone3) AS Phone
            ,M.TakeNumber, M.TakeMockPart, M.TakeForm, M.TakeArea, M.IsTake, PM.MockYear, PM.MockRotationNo, PM.IsAdjust
            ,PD.ProdName, C1.CateName, M.SubjectIdxs, M.SubjectNames, M.RegDatm AS ExamRegDatm
            ,fn_ccd_name(M.TakeMockPart) AS TakeMockPartName
            ,fn_ccd_name(M.TakeForm) AS TakeFormName
            ,fn_ccd_name(M.TakeArea) AS TakeAreaName
            ,(SELECT COUNT(*) AS tempCnt FROM {$this->_table['mock_answertemp']} WHERE MrIdx = M.MrIdx AND MemIdx = M.MemIdx AND Answer > 0) AS tempCnt
            ,(
                SELECT COUNT(*) AS ProductCountAnswer
                FROM {$this->_table['mock_questions']}
                WHERE MpIdx IN (
                    SELECT b.MpIdx
                    FROM {$this->_table['product_mock']} AS a
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode
                    WHERE a.ProdCode = M.ProdCode
                )
            ) AS ProductCountAnswer
            ,ADMIN.wAdminName AS UpdAdminName
        ";

        $from = "
            FROM (
                SELECT MR.ProdCode, MR.MrIdx, MR.MemIdx, MR.TakeNumber, MR.TakeMockPart, MR.TakeForm, MR.TakeArea, MR.IsTake, MR.RegDatm, MR.UpdAdminIdx
                , GROUP_CONCAT(S.SubjectIdx) AS SubjectIdxs
                , GROUP_CONCAT(S.SubjectName) AS SubjectNames
                FROM {$this->_table['mock_register']} AS MR
                INNER JOIN {$this->_table['mock_register_r_paper']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx
                INNER JOIN {$this->_table['mock_paper']} AS MO ON RP.MpIdx = MO.MpIdx
                INNER JOIN {$this->_table['product_subject']} AS S ON RP.SubjectIdx = S.SubjectIdx
                {$where}
                GROUP BY MR.MrIdx
            ) AS M
            INNER JOIN {$this->_table['product_mock']} AS PM ON M.ProdCode = PM.ProdCode
            INNER JOIN {$this->_table['product']} AS PD ON PM.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_r_category']} AS PC ON PM.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            INNER JOIN {$this->_table['lms_member']} AS MB ON M.MemIdx = MB.MemIdx
            LEFT JOIN {$this->_table['admin']} AS ADMIN ON M.UpdAdminIdx = ADMIN.wAdminIdx
            LIMIT 1
        ";

        $query = $this->_conn->query('select ' . $column . $from);
        return $query->row_array();
    }

    /**
     * 회원과목별상세
     * @param $prod_code
     * @param $mr_idx
     * @return array
     */
    public function registerForSubjectDetail($prod_code, $mr_idx)
    {
        $column = "
            M.*, ROUND(((M.MyRank / M.MemCount) * 100),2) AS tpct    #백분위
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
            SELECT b.*, a.MyRank, a.OrgPoint AS MyOrgPoint, a.AdjustPoint AS MyAdjustPoint
            FROM (
                SELECT a.MrIdx, a.MpIdx, a.OrgPoint, a.AdjustPoint, b.MyRank
                FROM (
                    SELECT MrIdx, MpIdx, OrgPoint, AdjustPoint
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}'
                ) AS a
                INNER JOIN (
                    #SELECT MrIdx, MpIdx, RANK() OVER (PARTITION BY MpIdx ORDER BY RANK) MyRank
                    SELECT MrIdx, MpIdx, OrgPoint, RANK() OVER (PARTITION BY MpIdx ORDER BY OrgPoint DESC) MyRank
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = '{$prod_code}'
                ) AS b ON a.MrIdx = b.MrIdx AND a.MpIdx = b.MpIdx
            ) AS a
            INNER JOIN (
                SELECT A.ProdCode, A.TakeMockPart, A.MpIdx, A.MockType, A.SubjectName
                ,ROUND(AVG(A.OrgPoint), 2) AS AvgOrgPoint       #원점수평균
                ,ROUND(AVG(A.AdjustPoint),2) AS AvgAdjustPoint  #조정점수평균
                ,ROUND(MAX(A.OrgPoint),2) AS MaxOrgPoint        #원점수최고점
                ,ROUND(MAX(A.AdjustPoint),2) AS MaxAdjustPoint  #조정점수최고점
                ,A.StandardDeviation                            #표준편차
                ,COUNT(A.MpIdx) AS MemCount                     #응시인원
                ,fn_ccd_name(A.TakeMockPart) AS TakeMockPartName
                FROM (
                    SELECT a.ProdCode, a.TakeMockPart, b.MpIdx, e.MockType, b.OrgPoint, b.AdjustPoint, b.StandardDeviation, c.SubjectIdx, d.SubjectName
                    FROM {$this->_table['mock_register']} AS a
                    INNER JOIN {$this->_table['mock_grades']} AS b ON a.MrIdx = b.MrIdx
                    INNER JOIN {$this->_table['mock_register_r_paper']} AS c ON a.MrIdx = c.MrIdx AND c.MpIdx = b.MpIdx
                    INNER JOIN {$this->_table['product_subject']} AS d ON c.SubjectIdx = d.SubjectIdx
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS e ON e.ProdCode = b.ProdCode AND e.MpIdx = b.MpIdx AND e.IsStatus = 'Y'
                    WHERE a.ProdCode = '{$prod_code}' AND c.MpIdx IN (SELECT MpIdx FROM {$this->_table['mock_register_r_paper']} WHERE ProdCode = '{$prod_code}' AND MrIdx = '{$mr_idx}')
                ) AS A
                GROUP BY A.MpIdx
            ) AS b ON a.MpIdx = b.MpIdx
        ) AS M
        ";

        $total_avg_query = "
            ROUND(AVG(D.MyOrgPoint),2) AS AvgMyOrgPoint                 #회원점수평균
            ,ROUND(AVG(D.AvgOrgPoint),2) AS AvgAvgOrgPoint              #원점수평균
            ,ROUND(AVG(D.AvgAdjustPoint),2) AS AvgAvgAdjustPoint        #조정점수평균
            ,ROUND(AVG(D.MaxOrgPoint),2) AS AvgMaxOrgPoint              #원점수최고점
            ,ROUND(AVG(D.MaxAdjustPoint),2) AS AvgMaxAdjustPoint        #조정점수최고점
            ,ROUND(AVG(D.StandardDeviation),2) AS AvgStandardDeviation  #표준편차
            ,ROUND(AVG(D.MemCount),2) AS AvgMemCount                    #응시인원
            ,ROUND(AVG(D.Top10AvgAdjustPoint),2) AS AvgTop10AvgAdjustPoint    #조정점수상위10퍼센트 평균
            ,ROUND(AVG(D.Top30AvgAdjustPoint),2) AS AvgTop30AvgAdjustPoint    #조정점수상위30퍼센트 평균
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
     * 모의고사 개인성적 전체과목합의 등수
     * @param $prod_code
     * @param $mr_idx
     * @return string
     */
    public function subjectAllAvg($prod_code, $mr_idx)
    {
        $arr_condition = [
            'EQ' => [
                'MR.ProdCode' => $prod_code,
                'MR.MrIdx' => $mr_idx
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            R.MrIdx, R.RankNum
            , (
                SELECT COUNT(*) AS TotalCount
                FROM (
                    SELECT MrIdx, ProdCode
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = '{$prod_code}'
                    GROUP BY MrIdx
                ) AS A
                GROUP BY A.ProdCode
            ) AS TotalCount
        ";
        $from = "
            FROM (
                SELECT R.MrIdx, RANK() OVER (PARTITION BY R.ProdCode ORDER BY R.avgAdjustPoint DESC) AS RankNum
                FROM (
                    SELECT ProdCode, MrIdx, AVG(AdjustPoint) AS avgAdjustPoint
                    FROM {$this->_table['mock_grades']}
                    WHERE ProdCode = '{$prod_code}'
                    GROUP BY MrIdx
                ) AS R
            ) AS R
            INNER JOIN {$this->_table['mock_register']} AS MR ON MR.MrIdx = R.MrIdx
        ";

        $data = $this->_conn->query('select ' . $column . $from . $where)->row_array();
        $return_data = '';
        if (empty($data) === false) {
            $return_data = $data['RankNum'].'/'.$data['TotalCount'];
        }

        return $return_data;
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
            MP.*, MB.MemName, A.OrderProdIdx, A.MrIdx, A.TakeNumber, A.TakeMockPartName,
            IFNULL(A.IsDate, MP.TakeStartDatm) AS IsDate, A.MpIdx, A.subject_names, A.TotalScore,
            PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,
            C1.CateName, C1.IsUse AS IsUseCate, Temp.LogIdx,
            IFNULL((SELECT RemainSec FROM {$this->_table['mock_log']} WHERE MrIdx = A.MrIdx ORDER BY RemainSec LIMIT 1), (MP.TakeTime*60)) AS RemainSec
        ";

        $from = "
            FROM (
                SELECT 
                mr.ProdCode, mr.OrderProdIdx, mr.MrIdx, mr.MemIdx, mr.TakeNumber, fn_ccd_name(mr.TakeMockPart) AS TakeMockPartName,
                mr.IsTake AS MrIsStatus, mr.RegDatm AS IsDate,
                SUM(mp.TotalScore) AS TotalScore,
                GROUP_CONCAT(pmp.MpIdx) AS MpIdx,
                GROUP_CONCAT(CONCAT(pmp.MockType,'|',pmp.MpIdx,'@',ps.SubjectName) ORDER BY pmp.OrderNum ASC) AS subject_names
                FROM {$this->_table['mock_register']} AS mr
                JOIN {$this->_table['order_product']} AS OP ON mr.ProdCode = OP.ProdCode AND mr.OrderProdIdx = OP.OrderProdIdx AND OP.PayStatusCcd = '676001'
                JOIN {$this->_table['mock_register_r_paper']} AS mrp ON mr.MrIdx = mrp.MrIdx
                JOIN {$this->_table['product_mock_r_paper']} AS pmp ON mrp.ProdCode = pmp.ProdCode AND mrp.MpIdx = pmp.MpIdx AND pmp.IsStatus = 'Y'
                JOIN {$this->_table['product_subject']} AS ps ON mrp.SubjectIdx = ps.SubjectIdx
                JOIN {$this->_table['mock_paper']} AS mp ON pmp.MpIdx = mp.MpIdx AND mp.IsStatus = 'Y' AND mp.IsUse = 'Y'
                {$where}
                GROUP BY mr.ProdCode
            ) AS A
            INNER JOIN {$this->_table['product_mock']} AS MP ON MP.ProdCode = A.ProdCode
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['lms_member']} AS MB ON A.MemIdx = MB.MemIdx
            LEFT JOIN (
                SELECT ProdCode, LogIdx FROM {$this->_table['mock_answertemp']} AS mr {$where} ORDER BY LogIdx DESC LIMIT 1
            ) AS Temp ON MP.ProdCode = Temp.ProdCode
        ";
        $order_by = " ORDER BY A.ProdCode DESC";
        return $this->_conn->query('select STRAIGHT_JOIN' . $column . $from . $order_by)->row_array();
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
            ,(SELECT ROUND(AVG(OrgPoint),2) AS MemberAvgOrgPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = {$prod_code} AND MrIdx = {$mr_idx}) AS MemberAvgOrgPoint  #내 평균
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

    /**
     * 전체 성적 분석 > 전체 응시자 평균점수 분포표
     * @param $prod_code
     * @param $mr_idx
     * @return mixed
     */
    public function selectivity($prod_code, $mr_idx)
    {
        $query_string = "
            DT.p_type, DT.cnt, IFNULL(MP.AvgAdjustPoint,0) AS MemAvgAdjustPoint
            FROM (
                SELECT a.p_type, IFNULL(b.cnt,0) AS cnt
                FROM (
                    SELECT num AS p_type FROM tmp_numbers WHERE (num%5)=0
                ) AS a
                LEFT JOIN (
                    SELECT b.p_type, COUNT(*) AS cnt
                    FROM (
                        SELECT
                        a.SumAdjustPoint, (CEILING(a.SumAdjustPoint/5)*5) AS p_type
                        FROM (
                            SELECT MrIdx, AVG(AdjustPoint) AS SumAdjustPoint FROM {$this->_table['mock_grades']} WHERE ProdCode = ? GROUP BY MrIdx
                        ) AS a
                    ) AS b
                    GROUP BY b.p_type
                ) AS b ON a.p_type = b.p_type
            ) AS DT
            
            LEFT JOIN (
                SELECT a.AvgAdjustPoint, (CEILING(a.AvgAdjustPoint/5)*5) AS p_type
                FROM (
                    SELECT IFNULL(AVG(AdjustPoint),1) AS AvgAdjustPoint FROM {$this->_table['mock_grades']} WHERE MrIdx = ?
                ) AS a
            ) AS MP ON DT.p_type = MP.p_type
            ORDER BY DT.p_type
        ";
        return $this->_conn->query('SELECT' . $query_string, [$prod_code, $mr_idx])->result_array();
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
            P.*, MA.Answer, MA.IsWrong, MAT.Answer AS TempAnswer
            ,(
                SELECT ROUND(((ycnt / (ycnt + ncnt)) * 100), 2) AS QAVR
                FROM (
                    SELECT MP.MpIdx,MQ.MqIdx
                    ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE MqIdx = MQ.MqIdx AND MpIdx = MP.MpIdx AND IsWrong = 'Y') AS ycnt
                    ,(SELECT COUNT(IsWrong) FROM {$this->_table['mock_answerpaper']} WHERE MqIdx = MQ.MqIdx AND MpIdx = Mp.MpIdx AND IsWrong = 'N') AS ncnt
                    FROM {$this->_table['mock_paper']} AS MP
                    JOIN {$this->_table['mock_questions']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['product_mock_r_paper']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.IsStatus = 'Y'
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
                ,IF(MQ.Difficulty='T','상',(IF(MQ.Difficulty='M','중',(IF(MQ.Difficulty='N','','하')))))AS Difficulty
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
            LEFT JOIN {$this->_table['mock_answertemp']} AS MAT ON P.MqIdx = MAT.MqIdx AND MAT.ProdCode = '{$prod_code}' AND MAT.MrIdx = '{$mr_idx}'
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
}