<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFModel extends WB_Model
{
    public $_mock_part_exception_ccd = '300';    //예외처리코드
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


    /**
     * 합격예측 회원 등록 정보 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findPredictFinalMember($arr_condition, $column = 'a.PfIdx')
    {
        $from = "
            FROM lms_predict_final AS a
            INNER JOIN lms_cert_apply AS b ON a.CertIdx = b.CertIdx AND a.MemIdx = b.MemIdx
            INNER JOIN lms_predict_code AS c ON a.TakeMockPart = c.Ccd AND c.IsUse = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 합격예측관리 회차 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findPredictData($arr_condition, $column = 'PredictIdx')
    {
        $from = " FROM lms_product_predict ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 합격예측 점수 저장
     * @param $input
     * @return array|bool
     */
    public function addPredictForMemberPoint($input)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx'), 'a.PredictIdx' => element('predict', $input), 'a.CertIdx' => element('cert', $input), 'a.IsStatus' => 'Y']];
            $member_ins_type = $this->findPredictFinalMember($arr_condition);
            if (empty($member_ins_type) === false) {
                throw new \Exception('등록된 정보가 있습니다. 실시간 참여현황에서 확인해 주세요.');
            }

            $add_condition = ['IN' => ['ApprovalStatus' => ['A','Y']]];
            $apply_result = $this->certApplyFModel->findApplyByCertIdx(element('cert', $input), $add_condition);
            if(empty($apply_result) === true) {
                throw new \Exception('인증 후 등록 가능합니다.');
            }

            $column = 'PredictIdx, MockPart';
            $arr_condition = ['EQ' => ['PredictIdx' => element('predict', $input),'IsUse' => 'Y'],'LKB' => ['CertIdxArr' => element('cert', $input)]];
            $predict_result = $this->findPredictData($arr_condition, $column);
            if (empty($predict_result) === true) {
                throw new \Exception('조회된 합격예측 서비스 정보가 없습니다.');
            }

            if ($this->_addPredictFinal($input) === false) {
                throw new \Exception('저장에 실패했습니다.');
            }

            if ($this->_addPredictFinalPoint($input) === false) {
                throw new \Exception('저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 직렬,지역별 등록자 카운트 수
     * @param $arr_condition
     * @param string $total_type
     * @return mixed
     */
    public function countFinalMockPartForArea($arr_condition, $total_type = '')
    {
        if ($total_type == 'total') {
            $column = 'TakeMockPart, COUNT(*) AS cnt';
            $group_by = ' GROUP BY TakeMockPart ';
        } else {
            $column = 'TakeMockPart, TakeAreaCcd, COUNT(*) AS cnt';
            $group_by = ' GROUP BY TakeMockPart, TakeAreaCcd ';
        }

        $from = " FROM lms_predict_final ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where . $group_by)->result_array();
    }

    /**
     * 서비스이용자, 내등수 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getFinalData($arr_condition)
    {
        $column = 'T.Total, M.Rownum, ROUND((M.Rownum / T.Total) * 100) AS MyPercentage';
        $where_member = $this->_conn->makeWhere($arr_condition);
        $where_member = $where_member->getMakeWhere(false);

        unset($arr_condition['EQ']['a.MemIdx']);
        $where_total = $this->_conn->makeWhere($arr_condition);
        $where_total = $where_total->getMakeWhere(false);

        $from = "
            FROM (
                SELECT COUNT(*) AS total
                FROM lms_predict_final as a
                {$where_total}
            ) AS T,
            (
                SELECT COUNT(*) AS Rownum
                FROM lms_predict_final
                WHERE FinalPoint >= (
                    SELECT FinalPoint FROM lms_predict_final as a 
                    {$where_member}
                )
            ) AS M
        ";
        return $this->_conn->query('select '. $column . $from)->row_array();
    }

    /**
     * 과목저장
     * @param $input
     * @return array|bool
     */
    private function _addPredictFinal($input)
    {
        try {
            $data = [
                'PredictIdx' => element('predict', $input),
                'CertIdx' => element('cert', $input),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'TakeMockPart' => element('mock_part', $input),
                'TakeAreaCcd' => element('take_area', $input),
                'StrengthPoint' => element('strength_point', $input),
                'AddPoint' => element('add_point', $input)
            ];

            if ($this->_conn->set($data)->insert('lms_predict_final') === false) {
                throw new \Exception('저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 과목점수저장
     * 최종환산점수 업데이트 [{(공통과목 원점수 총합)+(선택과목 조정점수 총합)}÷5]÷2 + (체력점수÷2) + 가산점(0~5점)
     * @param $input
     * @return array|bool
     */
    private function _addPredictFinalPoint($input)
    {
        try {
            $data = [];
            $total_subject_p = 0;
            $total_subject_s = 0;

            $pf_idx = $this->_conn->insert_id();
            $mock_part = element('mock_part', $input);
            if (empty(element('subject_p_code', $input)[$mock_part]) === true) {
                throw new \Exception('필수 과목이 없습니다.');
            }
            foreach (element('subject_p_code', $input)[$mock_part] as $key => $val) {
                if ((element('subject_p', $input)[$val]) === true) throw new \Exception('필수과목점수를 입력해주세요.');
                $data[] = [
                    'PfIdx' => $pf_idx,
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'Subject' => $val,
                    'Point' => element('subject_p', $input)[$val]
                ];
                $total_subject_p += element('subject_p', $input)[$val];
            }

            if ($mock_part != $this->_mock_part_exception_ccd) {
                if (empty(element('subject_s', $input)[$mock_part]) === true) {
                    throw new \Exception('선택 과목이 없습니다.');
                }
                foreach (element('subject_s', $input)[$mock_part] as $key => $val) {
                    if ((element('point', $input)[$mock_part]) === true) throw new \Exception('선택 과목 점수가 없습니다.');
                    $data[] = [
                        'PfIdx' => $pf_idx,
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'Subject' => $val,
                        'Point' => element('point', $input)[$mock_part][$key]
                    ];
                    $total_subject_s += element('point', $input)[$mock_part][$key];
                }
            }
            foreach ($data as $key => $val) {
                if ($this->_conn->set($data[$key])->insert('lms_predict_final_point') === false) {
                    throw new \Exception('저장에 실패했습니다.');
                }
            }

            $final_point = round(((($total_subject_p + $total_subject_s) / 5) / 2), 2) + (element('strength_point', $input, '0') / 2) + element('add_point', $input);
            if ($this->_conn->set(['FinalPoint' => $final_point])->where('PfIdx', $pf_idx)->update('lms_predict_final') === false) {
                throw new \Exception('최종 환산점수 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
}