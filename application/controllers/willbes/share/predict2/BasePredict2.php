<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePredict2 extends \app\controllers\FrontController
{
    protected $models = array('predict/predict2F');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

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
        $question_data = $this->predict2FModel->getQuestionForAnswer($idx);

        if (empty($subject_list) === true) {
            show_alert('등록된 과목이 없습니다.', 'back');
        }

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
        $data = null;

        /*print_r($base_data);*/

        $view_file = 'willbes/'.APP_DEVICE.'/predict2/'.$idx;
        $this->load->view($view_file, [
            'idx' => $idx,
            'mode' => $mode,
            'base_data' => $base_data,
            'mack_part' => $mack_part,
            'subject_list' => $subject_list,
            'question_list' => $question_list,
            'data' => $data
        ], false);
    }


    public function storeAjax()
    {
        $method = 'add';
        $idx = $this->_reqP('idx');

        if (empty($idx) === false) {
            $method = 'modify';
        }

        $idx = $this->_reqP('PredictIdx');
        $arr_condition = ['EQ' => ['PredictIdx2' => $idx,'IsStatus' => 'Y','IsUse' => 'Y']];
        $data = $this->predict2FModel->findPredictData($arr_condition, 'PredictIdx2');
        if (empty($data) === true) {
            return $this->json_error('잘못된 접근 입니다.');
        }

        $error_result = [];
        $result = $this->predict2FModel->{$method . 'Predict2'}($this->_reqP(null, false));
        if ($result !== true) {
            $error_result = [
                'ret_cd' => false,
                'ret_msg' => $result,
                'ret_status' => _HTTP_ERROR
            ];
        }
        print_r($result);
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
        $arr_condition = ['EQ' => ['PredictIdx2' => $predict_idx2,'IsStatus' => 'Y','IsUse' => 'Y']];
        return $this->predict2FModel->findPredictData($arr_condition, $column);
    }
}