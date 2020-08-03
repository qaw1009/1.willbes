<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyModel extends WB_Model
{
    private $_table = [
        'event_survey' => 'lms_event_survey',
        'event_survey_question' => 'lms_event_survey_question',
        'event_answer_info' => 'lms_event_survey_answer_info',
        'predict_code' => 'lms_predict_code',
        'product_predict' => 'lms_product_predict',
        'predict_grades_line' => 'lms_predict_grades_line',
        'predict_paper' => 'lms_predict_paper',
        'predict_answer_paper' => 'lms_predict_answerpaper',
        'predict_grades_origin' => 'lms_predict_grades_origin',
        'predict_question' => 'lms_predict_questions',

        'sysCode' => 'lms_sys_code',
    ];

    public $upload_path_predict;       // 통파일 저장경로: ~/predict/{idx}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->upload_path_predict = $this->config->item('upload_path_predict', 'predict');
    }

    /**
     * 설문 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurvey($sp_idx = null)
    {
        $arr_condition = [
            'EQ' => ['A.SpIdx' => $sp_idx, 'A.SpIsUse' => 'Y'],
            'RAW' => ['NOW() between ' => 'StartDate and EndDate']
        ];

        $column = "
            A.SpIdx, A.SpTitle, A.SpComment, A.SpIsDuplicate
            ";

        $from = "
            FROM {$this->_table['event_survey']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 설문문항 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function listSurveyForQuestion($sp_idx = null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx, 'A.IsStatus' => 'Y', 'A.SqIsUse' => 'Y']];
        $order_by = ['A.OrderNum'=>'ASC','A.SqIdx'=>'ASC'];

        $column = "
            A.SqIdx, A.SqTitle, A.SqComment, A.SqType, A.SqCnt, A.SqSubjectCnt, A.SqJsonData
            ";

        $from = "
            FROM {$this->_table['event_survey_question']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $data = $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit)->result_array();
        return $this->_getDecodeData($data,'SqJsonData');
    }



    /**
     * 설문조사 결과 조회
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyForAnswerInfo($sp_idx=null)
    {
        $arr_condition = ['EQ' => ['A.SpIdx' => $sp_idx]];
        $column = "A.AnswerInfo";
        $from = "
            FROM {$this->_table['event_answer_info']} AS A
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.SaIdx' => 'ASC'])->getMakeOrderBy();
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
        return $this->_getDecodeData($data,'AnswerInfo');
    }

    /**
     * 설문응답 체크
     * @param integer $sp_idx
     * @return mixed
     */
    public function findSurveyAnswer($sp_idx = null)
    {
        $arr_condition = ['EQ' => ['SpIdx' => $sp_idx, 'MemIdx' => $this->session->userdata('mem_idx')]];

        $column = "
            COUNT(*) AS cnt
        ";

        $from = "
            FROM {$this->_table['event_answer_info']}
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row(0)->cnt;
    }

    /**
     * 설문저장
     * @param $formData
     * @param integer $sp_idx
     * @return mixed
     */
    public function storeSurvey($formData = [],$sp_idx = null){
        try {
            $this->_conn->trans_begin();

            // 설문응답
            $data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SpIdx'  => $sp_idx,
                'AnswerInfo' => json_encode($formData)
            ];

            if ($this->_conn->set($data)->insert($this->_table['event_answer_info']) === false) {
                throw new \Exception('문항저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 답변항목 디코딩
     * @param array $data
     * @param string $field
     * @return mixed
     */
    private function _getDecodeData($data=[],$field=null){

        foreach ($data as $key => $val){
            if(empty($field) === false){
                $data[$key][$field] = json_decode($val[$field],true);
            }
        }

        return $data;
    }


    /**
     #################### pridict 함수 ####################
     */

    /**
     *  합격예측용 직렬호출
     */
    public function getSerial($GroupCcd){
        $column = "
            Ccd, CcdName, Type  
        ";

        $from = "
            FROM {$this->_table['predict_code']} 
        ";

        $order_by = " ORDER BY OrderNum";
        $where = " WHERE IsUse = 'Y' AND GroupCcd = ".$GroupCcd."";

        //일반경채(남)의 수사, 행정법 코드 제외
        $where .= " AND Ccd != '100901' AND Ccd != '100902'";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();
        return $Res;
    }

    /**
     * 합격예측관리 회차 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findPredictData($arr_condition, $column = 'PredictIdx')
    {
        $from = " FROM {$this->_table['product_predict']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 지역별현황
     * @param $PredictIdx
     * @return mixed
     */
    public function areaList($PredictIdx){
        $column = "
            sc.CcdName AS Areaname, pc.CcdName AS Serialname, pg.*   
            ,(
            SELECT A.AvgAdjustPoint
            FROM (
                SELECT
                PredictIdx, TakeMockPart, TakeArea, ROUND(AVG(t.SumAdjustPoint),2) AS AvgAdjustPoint
                FROM (
                    SELECT PredictIdx, TakeMockPart, TakeArea, ROUND(SUM(AdjustPoint),2) AS SumAdjustPoint FROM lms_predict_grades 
                    WHERE PredictIdx = '{$PredictIdx}'
                    GROUP BY PrIdx
                ) AS t
                GROUP BY TakeMockPart, TakeArea
            ) AS A
            WHERE PredictIdx = pg.PredictIdx AND TakeArea = pg.TakeArea AND TakeMockPart = pg.TakeMockPart
            ) AS AvrPoint
        ";

        $from = "
            FROM 
                {$this->_table['predict_grades_line']} AS pg
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predict_code']} AS pc ON pg.TakeMockPart = pc.Ccd
        ";

        $where = " WHERE PredictIdx = ?";
        $order_by = " ORDER BY TaKeMockPart, TakeArea";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$PredictIdx]);

        return $query->result_array();
    }

    /**
     * 과목별 원점수 평균 (0점 제외)
     * @param $PredictIdx
     * @return mixed
     */
    public function gradeList($PredictIdx){
        $column = "
            pg.PpIdx, pg.Avg, pc.CcdName as SubjectName, pp.SubjectCode, pp.Type       
        ";

        $from = "
            from (
                select PpIdx, ROUND(AVG(OrgPoint)) AS Avg
                from {$this->_table['predict_grades_origin']}
                where PredictIdx = ?
                    and OrgPoint > 0
                group by PpIdx
            ) as pg
                left join {$this->_table['predict_paper']} AS pp ON pg.PpIdx = pp.PpIdx
                left join {$this->_table['predict_code']} AS pc ON pp.SubjectCode = pc.Ccd
            order by pg.PpIdx asc                            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);

        return $query->result_array();
    }

    /**
     * 총점 성적분포
     * @param $PredictIdx
     * @return array
     */
    public function pointArea($PredictIdx)
    {
        $column = "
            COUNT(*) AS CNT, Pointarea
        ";

        $from = "            
            FROM 
            (
                SELECT 
                    (case 
                        when SUM(OrgPoint) <= 100 then 0    # 0 ~ 100
                        when SUM(OrgPoint) >= 500 then 4    # 500 이상
                        else substr(SUM(OrgPoint), 1, 1)    # 101 ~ 499
                    end) as Pointarea 
                FROM 
                    {$this->_table['predict_grades_origin']} 
                WHERE PredictIdx = ?
                GROUP BY PrIdx                
            ) AS A                
        ";

        $order_by = " GROUP BY Pointarea ORDER BY Pointarea ASC";

        $query = $this->_conn->query('select ' . $column . $from . $order_by, [$PredictIdx]);
        $result = $query->result_array();

        $arr_point_area = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));    // 총인원수

            // 점수대별 인원비율, (인원수/총인원수) * 100, PA0 ~ PA4
            foreach ($result as $row) {
                $arr_point_area['PA' . $row['Pointarea']] = $row['CNT'] < 1 ? 0 : ROUND($row['CNT'] / $total * 100, 2);
            }
        }

        return $arr_point_area;
    }

    /**
     * 과목별 성적분포 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function getSubjectPoint($PredictIdx){
        $column = "
            A.PpIdx, A.Pointarea, A.CNT, B.SubjectCode, C.CcdName as SubjectName 
                , (select count(0) from {$this->_table['predict_grades_origin']} where PpIdx = A.PpIdx) as TotalCNT
        ";

        $from = "
            from (
                select PpIdx
                    , (case 
                        when OrgPoint between 1 and 20 then 1
                        when OrgPoint between 21 and 40 then 2
                        when OrgPoint between 41 and 60 then 3
                        when OrgPoint between 61 and 80 then 4
                        else 5
                      end) as Pointarea	
                    , count(0) as CNT 	  
                from {$this->_table['predict_grades_origin']}
                where PredictIdx = ?
                    and OrgPoint > 0
                group by PpIdx, Pointarea
            ) as A
                left join {$this->_table['predict_paper']} AS B ON A.PpIdx = B.PpIdx
                left join {$this->_table['predict_code']} AS C ON B.SubjectCode = C.Ccd	
            order by A.PpIdx, A.pointarea asc             
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_point_area = [];
        if (empty($result) === false) {
            $tmp_subject_code = '';

            foreach ($result as $idx => $row) {
                if ($row['SubjectCode'] != $tmp_subject_code) {
                    $arr_point_area[$row['SubjectCode']]['SubjectName'] = $row['SubjectName'];
                }

                for($i = 1; $i <= 5; $i++) {
                    if ($i == $row['Pointarea']) {
                        $arr_point_area[$row['SubjectCode']][$row['Pointarea']] = ROUND(($row['CNT'] / $row['TotalCNT']) * 100, 2);
                    } else {
                        if (isset($arr_point_area[$row['SubjectCode']][$i]) === false) {
                            $arr_point_area[$row['SubjectCode']][$i] = 0;
                        }
                    }
                }

                $tmp_subject_code = $row['SubjectCode'];
            }
        }

        return $arr_point_area;
    }

    /**
     * 과목별 단일 선호도 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function bestSubject($PredictIdx)
    {
        $column = "
            pc.CcdName as SubjectName, A.CNT
        ";

        $from = "
            from (
                select pg.PpIdx, count(0) as CNT, max(pp.SubjectCode) as SubjectCode
                from {$this->_table['predict_grades_origin']} as pg
                    left join {$this->_table['predict_paper']} as pp
                        on pg.PpIdx = pp.PpIdx
                where pg.PredictIdx = ?
                    and pp.Type = 'S'
                    and pg.OrgPoint > 0
                group by pg.PpIdx	
            ) as A
                left join {$this->_table['predict_code']} as pc
                    on pc.Ccd = A.SubjectCode
            where A.CNT > 0                    
            order by A.CNT desc	            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_subject = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));

            foreach ($result as $row) {
                $arr_subject[] = [
                    'SubjectName' => $row['SubjectName'],
                    'SubjectRatio' => ROUND(($row['CNT'] / $total) * 100,2)
                ];
            }
        }

        return $arr_subject;
    }

    /**
     * 과목별 조합 선호도 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function bestCombineSubject($PredictIdx)
    {
        $column = "
            A.SubjectName, count(0) as CNT
        ";

        $from = "
            from (
                select pg.PrIdx, group_concat(pc.CcdName order by pp.PpIdx asc separator '/') as SubjectName
                from {$this->_table['predict_grades_origin']} as pg
                    left join {$this->_table['predict_paper']} as pp
                        on pg.PpIdx = pp.PpIdx
                    left join {$this->_table['predict_code']} as pc
                        on pp.SubjectCode = pc.Ccd
                where pg.PredictIdx = ?
                    and pp.Type = 'S'
                    and pg.OrgPoint > 0
                group by pg.PrIdx
            ) as A
            group by A.SubjectName
            order by CNT desc	            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_subject = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));

            foreach ($result as $row) {
                $arr_subject[] = [
                    'SubjectName' => $row['SubjectName'],
                    'SubjectRatio' => ROUND(($row['CNT'] / $total) * 100,2)
                ];
            }
        }

        return $arr_subject;
    }

    /**
     * 과목별 오답 랭킹
     * @param $PredictIdx
     * @return mixed
     */
    public function wrongRank($PredictIdx)
    {
        $column = "A.PpIdx, A.PqIdx, A.CNT, A.Answer1, A.Answer2, A.Answer3, A.Answer4, A.WrongCnt, A.RankNum
            , round((A.Answer1 / A.CNT) * 100, 2) as AnswerRatio1
            , round((A.Answer2 / A.CNT) * 100, 2) as AnswerRatio2
            , round((A.Answer3 / A.CNT) * 100, 2) as AnswerRatio3
            , round((A.Answer4 / A.CNT) * 100, 2) as AnswerRatio4
            , pp.PaperName, pq.QuestionNO, pq.RightAnswer            
        ";

        $from = "
            from (
                select PpIdx, PqIdx, count(0) as CNT
                    , sum(if(Answer = '1', 1, 0)) as Answer1
                    , sum(if(Answer = '2', 1, 0)) as Answer2
                    , sum(if(Answer = '3', 1, 0)) as Answer3
                    , sum(if(Answer = '4', 1, 0)) as Answer4
                    , sum(if(IsWrong = 'N', 1, 0)) as WrongCNT
                    , row_number() over (partition by PpIdx order by WrongCnt desc, PqIdx asc) as RankNum 
                from {$this->_table['predict_answer_paper']}
                where PredictIdx = ?
                    and Answer in ('1', '2', '3', '4')
                group by PpIdx, PqIdx
            ) as A
                inner join {$this->_table['predict_paper']} as pp
                    on A.PpIdx = pp.PpIdx
                inner join {$this->_table['predict_question']} as pq
                    on A.PpIdx = pq.PpIdx and A.PqIdx = pq.PqIdx
            where A.RankNum between 1 and 5
            order by A.PpIdx asc, A.RankNum asc            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);

        return $query->result_array();
    }

}