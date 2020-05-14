<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePredict2 extends \app\controllers\FrontController
{
    protected $models = array('memberF', 'predict/predict2F');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('storeAjax');

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $mode = 'INS';
        $idx = $params[0];
        $base_data = $this->_predict2Data($idx);
        $mack_part = $this->predict2FModel->getMackPart($idx);
        $subject_list = $this->predict2FModel->getSubjectList($idx);
        if (empty($base_data) === true || empty($subject_list) === true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $is_finish = 'N';
        $research_type = '';
        if ($base_data['IsResearch1'] == 'Y' && $base_data['Research1StartDatm'] <= date('YmdHi') && $base_data['Research1EndDatm'] >= date('YmdHi')) {
            $research_type = 'Research1';
        }
        if ($base_data['IsResearch2'] == 'Y' && $base_data['Research2StartDatm'] <= date('YmdHi') && $base_data['Research2EndDatm'] >= date('YmdHi')) {
            $research_type = 'Research2';
        }
        /*if (empty($research_type) === true) {show_alert('잘못된 접근 입니다.', 'back');}*/

        //기본정보 조회
        $arr_condition = [
            'EQ' => [
                'PredictIdx2' => $idx,
                'IsStatus' => 'Y'
            ],
            'RAW' => [
                'MemIdx' => ($this->isLogin() !== true) ? '\'\'' : $this->session->userdata('mem_idx')
            ]
        ];
        $column = 'PrIdx, PredictIdx2, fn_dec(UserTelEnc) AS UserTelDec, fn_dec(UserMailEnc) AS UserMailDec, TakeMockPart, TakeNumber, TakeCount, TakeLevel, CutPoint, IsFinish';
        $reg_result = $this->predict2FModel->findPredictForRegister($arr_condition,$column);
        $reg_data = $reg_result;
        if (empty($reg_result) === false) {
            $mode = 'MOD';
            $arr_t2 = [];
            $arr_t1 = explode(',', $reg_result['TakeLevel']);
            foreach ($arr_t1 as $key => $val) {
                $arr_t2[] = explode('|', $val);
            }
            foreach ($arr_t2 as $key => $val) {
                $reg_data['ArrTakeLevel'][$val[0]] = $val[1];
            }

            if ($research_type == 'Research2') {
                $is_finish = $reg_data['IsFinish'];
            }
        }

        //총점, 평균점수조회
        $arr_reg_answerpaper = $this->_getRegDetailForScore($idx, $reg_data['PrIdx'], $this->session->userdata('mem_idx'));

        $question_data = $this->predict2FModel->getQuestionForAnswer($idx, $reg_data['PrIdx']);
        $question_list = [];
        $j = 1;
        $numArr = [];
        $numStr = '';
        foreach ($question_data as $row1) {
            $PpIdx = $row1['PpIdx'];
            $Answer = $row1['Answer'];
            $isPP = 'N';
            $arrCnt = [];
            foreach ($subject_list as $row2) {
                if($PpIdx == $row2['PpIdx']) $isPP = 'Y'; $arrCnt[$row2['PpIdx']] = $row2['qCnt'];
            }
            if ($isPP == 'Y') {
                $numArr[] = $j;
                if($Answer) $numStr .= $Answer;
                if($j % 5 == 0){
                    $question_list['numset'][$PpIdx][] = min($numArr). "~" .max($numArr);
                    $question_list['answerset'][$PpIdx][] = $numStr;
                    unset($numArr);
                    $numStr = '';
                    if($j == $arrCnt[$PpIdx]) $j = 0;
                }
                $j++;
            }
        }

        $view_file = 'willbes/'.APP_DEVICE.'/predict2/'.$idx;
        $this->load->view($view_file, [
            'idx' => $idx,
            'mode' => $mode,
            'base_data' => $base_data,
            'research_type' => $research_type,
            'mack_part' => $mack_part,
            'subject_list' => $subject_list,
            'question_list' => $question_list,
            'data' => $reg_data,
            'arr_reg_answerpaper' => $arr_reg_answerpaper,
            'is_finish' => $is_finish
        ], false);
    }

    /**
     * @return CI_Output
     */
    public function storeAjax()
    {
        $method = 'add';
        $idx = $this->_reqP('predict_idx');
        $prIdx = $this->_reqP('PrIdx');
        if (empty($prIdx) === false) {
            $method = 'modify';
        }
        $arr_condition = ['EQ' => ['PredictIdx2' => $idx,'IsStatus' => 'Y','IsUse' => 'Y']];
        $data = $this->predict2FModel->findPredictData($arr_condition, 'PredictIdx2');
        if (empty($data) === true) {
            return $this->json_error('잘못된 접근 입니다.');
        }

        if (empty($this->_reqP('research_type')) === true) {
            return $this->json_error('잘못된 접근 입니다.');
        }
        $research_type = $this->_reqP('research_type');

        $error_result = [];
        $result = $this->predict2FModel->{$method . 'Predict2' . $research_type}($this->_reqP(null, false));
        if ($result !== true) {
            $error_result = [
                'ret_cd' => false,
                'ret_msg' => $result,
                'ret_status' => _HTTP_ERROR
            ];
        }
        $this->json_result($result, '저장되었습니다.', $error_result);
    }

    /**
     * 성적서비스 데이터 [합격예측성격]
     * @param $predict_idx2
     * @return mixed
     */
    private function _predict2Data($predict_idx2)
    {
        $column = 'PredictIdx2, SiteCode, Predict2Name, TakePart, MockPart, GradeOpenIsUse, GradeOpenDatm, SubjectSViewCount';
        $column .= ',DATE_FORMAT(Research1StartDatm, \'%Y%m%d%H%i\') AS Research1StartDatm, DATE_FORMAT(Research1EndDatm, \'%Y%m%d%H%i\') AS Research1EndDatm';
        $column .= ',DATE_FORMAT(Research2StartDatm, \'%Y%m%d%H%i\') AS Research2StartDatm, DATE_FORMAT(Research2EndDatm, \'%Y%m%d%H%i\') AS Research2EndDatm';
        $column .= ',IsResearch1, IsResearch2';
        $arr_condition = ['EQ' => ['PredictIdx2' => $predict_idx2,'IsStatus' => 'Y','IsUse' => 'Y']];
        return $this->predict2FModel->findPredictData($arr_condition, $column);
    }

    /**
     * 점수입력 조건 리턴
     * 과목별 총점, 총 평균점수
     * @param $idx
     * @param $prIdx
     * @param $member_idx
     * @return mixed
     */
    private function _getRegDetailForScore($idx, $prIdx = '', $member_idx = '')
    {
        $reSearch1_result = $this->predict2FModel->getRegisterPaperForSumResearch1($idx, $prIdx, $member_idx);
        $reSearch2_result = $this->predict2FModel->getRegisterPaperForSumResearch2($idx, $prIdx, $member_idx);

        if (empty($reSearch1_result) === true) {
            $result = $reSearch2_result;
        } else {
            $result = $reSearch1_result;
        }

        $arr_sum = [];
        $arr_avg = [];
        $avg = '';
        if (empty($result) === false) {
            foreach ($result as $key => $val) {
                $arr_sum[$val['PpIdx']] = $val['Scoring'];
                if ($val['IsAvg'] != 'N') {
                    $arr_avg[$val['PpIdx']] = $val['Scoring'];
                }
            }
            $avg = (empty($arr_avg) === false) ? round(array_sum($arr_avg) / count($arr_avg),1) : '';   //전체평균
        }
        return [
            'subjectSum' => $arr_sum,
            'avg' => $avg
        ];
    }
}