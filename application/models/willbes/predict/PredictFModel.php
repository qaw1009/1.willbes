<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 페이지 뷰
     * @param $event_idx
     * @return mixed
     */
    public function getCntEventPV($event_idx)
    {
        if (empty($event_idx) === false) {
            $column = "ReadCnt AS Cnt";
            $from = " FROM lms_event_lecture ";
            $arr_condition = ['EQ' => ['ElIdx' => $event_idx]];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }

        return $return;
    }

    /**
     * 설문
     * @param $spIdx
     * @return mixed
     */
    public function getCntSurvey($spIdx)
    {
        if (empty($spIdx) === false) {
            $column = "COUNT(*) AS Cnt";
            $from = " FROM lms_survey_answer_info ";
            $arr_condition = ['EQ' => ['SpIdx' => $spIdx]];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }

        return $return;
    }

    /**
     * 사전접수
     * @param $predict_idx
     * @return mixed
     */
    public function getCntPreregist($predict_idx)
    {
        if (empty($predict_idx) === false) {
            $column = "COUNT(*) AS Cnt";
            $from = " FROM lms_predict_register ";
            $arr_condition = ['EQ' => ['ProdCode' => $predict_idx]];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }

        return $return;
    }

    /**
     * 채점
     * @param $predict_idx
     * @return mixed
     */
    public function getCntScore($predict_idx)
    {
        if (empty($predict_idx) === false) {
            $column = "COUNT(*) AS Cnt";
            $from = " FROM SELECT MemIdx FROM lms_predict_grades_origin WHERE ProdCode = '" . $predict_idx . "' GROUP BY MemIdx ";
            $query = $this->_conn->query('select ' . $column . $from);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }
        return $return;
    }

    /**
     * 소문내기, 적중
     * @param $event_idx
     * @return mixed
     */
    public function getCntEventComment($event_idx)
    {
        if (empty($event_idx) === false) {
            $column = "COUNT(*) AS Cnt";
            $from = " FROM lms_event_comment ";
            $arr_condition = ['EQ' => ['ElIdx' => $event_idx]];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }
        return $return;
    }

    /**
     * 최신판례특강 (특강 수강 건수 152583,152582)
     * 봉투모의고사 (봉투모의고사 강좌 수강건수 강좌코드: 152580)
     * 시크릿다운 (시크릿 강좌 수강 건수 : 152581)
     * @param $prod_code
     * @return mixed
     */
    public function getCntMyLecture($prod_code)
    {
        if (empty($prod_code) === false) {
            $column = "COUNT(*) AS Cnt";
            $from = " FROM lms_my_lecture ";
            $arr_condition = ['EQ' => ['ProdCodeSub' => $prod_code]];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $Res = $query->row_array();
            $return = $Res['Cnt'];
        } else {
            $return = 0;
        }
        return $return;
    }

    /**
     * 조정 조회수 업데이트
     * @param $promotino_code
     * @param $data
     * @return array|bool
     */
    public function updCnt($promotino_code, $data)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_conn->set($data)->where('PromotionCode', $promotino_code)->update('lms_event_lecture') === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}