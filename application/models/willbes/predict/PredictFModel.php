<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFModel extends WB_Model
{
    private $_table = [
        'category' => 'lms_sys_category'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getCntVarious(){
        $column = "
            (SELECT COUNT(*) FROM lms_survey_answer_info WHERE SpIdx = '3') AS Survey, -- 설문
            (SELECT COUNT(*) FROM lms_predict_register WHERE ProdCode = '100001') AS Preregist, -- 사전접수
            (SELECT COUNT(*) FROM (
                SELECT MemIdx FROM lms_predict_grades_origin WHERE ProdCode = '100001' GROUP BY MemIdx
            ) AS A) AS Score, -- 채점
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1187)) AS Rumor, -- 소문내기
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1199)) AS Hit, -- 적중
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1200)) AS precedents -- 최신판례특강
            -- 라이브특강플레이수
            -- 해설강의
            -- 봉투모의고사
            -- 시크릿다운
        ";

        $from = "
            FROM 
                DUAL
        ";

        $order_by = "";
        $where = " ";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }
}