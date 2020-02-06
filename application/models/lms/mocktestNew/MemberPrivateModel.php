<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberPrivateModel extends WB_Model
{
    private $_table = [
        'product_mock' => 'lms_product_mock',
        'Product' => 'lms_Product',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product_r_category' => 'lms_product_r_category',
        'sys_category' => 'lms_sys_category',
        'product_sale' => 'lms_product_sale',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_paper' => 'lms_mock_paper_new',
        'product_subject' => 'lms_product_subject',
        'mock_grades' => 'lms_mock_grades',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'lms_member' => 'lms_member'
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
            $query_string = $this->_set_query_string_count($where_1);
        } else {
            $query_string = $this->_set_query_string_row($is_count, $where_1, $where_2, $limit, $offset, $order_by);
        }
        $query = $this->_conn->query($query_string);
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
            ,M.TakeNumber, M.TakeMockPart, M.TakeForm, M.TakeArea, PM.MockYear, PM.MockRotationNo
            ,PD.ProdName, C1.CateName, M.SubjectIdxs, M.SubjectNames, M.RegDatm AS ExamRegDatm
            ,fn_ccd_name(M.TakeMockPart) AS TakeMockPartName
            ,fn_ccd_name(M.TakeForm) AS TakeFormName
            ,fn_ccd_name(M.TakeArea) AS TakeAreaName
            ,(SELECT COUNT(*) AS tempCnt FROM {$this->_table['mock_answertemp']} WHERE MrIdx = M.MrIdx AND MemIdx = M.MemIdx) AS tempCnt
        ";

        $from = "
            FROM (
                SELECT MR.ProdCode, MR.MrIdx, MR.MemIdx, MR.TakeNumber, MR.TakeMockPart, MR.TakeForm, MR.TakeArea, MR.RegDatm
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
            INNER JOIN {$this->_table['Product']} AS PD ON PM.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_r_category']} AS PC ON PM.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            INNER JOIN {$this->_table['lms_member']} AS MB ON M.MemIdx = MB.MemIdx
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
            M.*
            ,(SELECT OrgPoint FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}') AS MyOrgPoint
            ,ROUND((SELECT AdjustPoint FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}'),2) AS MyAdjustPoint
            ,(SELECT RANK FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}') AS MyRank
            ,ROUND((((SELECT RANK FROM lms_mock_grades WHERE ProdCode = M.ProdCode AND MpIdx = M.MpIdx AND MrIdx = '{$mr_idx}') / M.TotalRank) * 100),2) tpct    #백분위
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
                ,Max(A.Rank) AS TotalRank				        #총석차
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

        $total_avg_query = "
            ROUND(AVG(D.MyOrgPoint),2) AS AvgMyOrgPoint              #회원점수평균
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
     * 리스트 카운트용 쿼리
     * @param $where
     * @return string
     */
    private function _set_query_string_count($where)
    {
        $column = "COUNT(M.MemIdx) AS numrows";
        $from = "
            FROM (
                SELECT 
                A.MemIdx
                FROM (
                    SELECT MR.MemIdx
                    FROM {$this->_table['product_mock']} AS MP
                    JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                    JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                    JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                    JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                    JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
                    JOIN {$this->_table['mock_register_r_paper']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                    JOIN {$this->_table['mock_paper']} AS MO ON RP.MpIdx = MO.MpIdx
                    JOIN {$this->_table['product_subject']} AS S ON RP.SubjectIdx = S.SubjectIdx
                    {$where}
                    GROUP BY MR.MrIdx
                ) AS A
                JOIN {$this->_table['lms_member']} AS MB ON A.MemIdx = MB.MemIdx
            ) AS M
        ";
        return 'select ' . $column . $from;
    }

    /**
     * 쿼리문
     * @param bool $is_count
     * @param $where_1
     * @param $where_2
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return string
     */
    private function _set_query_string_row($is_count = false, $where_1, $where_2, $limit, $offset, $order_by)
    {
        if ($is_count == 'excel') {
            $order_by_offset_limit = $this->_conn->makeOrderBy(['MP.ProdCode' => 'DESC', 'MR.RegDatm' => 'DESC'])->getMakeOrderBy();
            $column = "
                MB.MemName ,CONCAT(MB.Phone1,'-',fn_dec(MB.Phone2Enc),'-',MB.phone3) AS Phone ,A.TakeNumber ,fn_ccd_name(A.TakeForm) AS TakeFormName
                ,A.MockYear ,A.MockRotationNo ,A.ProdName ,A.CateName ,fn_ccd_name(A.TakeMockPart) AS TakeMockPartName ,A.SubjectName ,fn_ccd_name(A.TakeArea) AS TakeAreaName
                ,ROUND((SELECT SUM(AdjustPoint) FROM {$this->_table['mock_grades']} WHERE ProdCode = A.ProdCode AND MrIdx = A.MrIdx),2) AS AdjustSum ,A.ExamRegDatm
            ";
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MB.MemIdx, MB.MemId, MB.MemName
                ,CONCAT(MB.Phone1,'-',fn_dec(MB.Phone2Enc),'-',MB.phone3) AS Phone
                ,A.ProdCode ,A.ProdName, A.MrIdx, A.TakeNumber
                ,fn_ccd_name(A.TakeMockPart) AS TakeMockPartName
                ,fn_ccd_name(A.TakeForm) AS TakeFormName
                ,fn_ccd_name(A.TakeArea) AS TakeAreaName
                ,A.MockYear, A.MockRotationNo
                ,A.CateName, A.SubjectName, A.IsTake, A.ExamRegDatm
                ,ROUND((SELECT SUM(AdjustPoint) FROM {$this->_table['mock_grades']} WHERE ProdCode = A.ProdCode AND MrIdx = A.MrIdx),2) AS AdjustSum #총점
                ,(SELECT COUNT(*) AS tempCnt FROM {$this->_table['mock_answertemp']} WHERE MrIdx = A.MrIdx AND MemIdx = A.MemIdx) AS tempCnt
                ,(SELECT COUNT(*) AS tempCnt FROM {$this->_table['mock_answerpaper']} WHERE MrIdx = A.MrIdx AND MemIdx = A.MemIdx) AS answerCnt
            ";
        }

        $from = "
            FROM (
                SELECT 
                    MR.MemIdx
                    ,MP.ProdCode ,PD.ProdName, MR.MrIdx
                    ,MR.TakeNumber, MR.TakeMockPart, MR.TakeForm, MR.TakeArea   #응시번호,응시직렬,응시형태,응시지역
                    ,MP.MockYear, MP.MockRotationNo                 #연도, 회차
                    ,C1.CateName                                    #카테고리명
                    ,GROUP_CONCAT(RP.SubjectIdx) AS SubjectIdx
                    ,GROUP_CONCAT(S.SubjectName) AS SubjectName     #과목
                    ,MR.IsTake
                    ,MR.RegDatm AS ExamRegDatm                      #시험종료
                FROM {$this->_table['product_mock']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['product_r_category']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mock_register']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
                JOIN {$this->_table['mock_register_r_paper']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN {$this->_table['mock_paper']} AS MO ON RP.MpIdx = MO.MpIdx
                JOIN {$this->_table['product_subject']} AS S ON RP.SubjectIdx = S.SubjectIdx
                JOIN {$this->_table['lms_member']} AS searchMem ON MR.MemIdx = searchMem.MemIdx
                {$where_1} {$where_2}
                GROUP BY MR.MrIdx
                {$order_by_offset_limit}
            ) AS A
            JOIN {$this->_table['lms_member']} AS MB ON A.MemIdx = MB.MemIdx
        ";

        return 'select ' . $column . $from;
    }
}