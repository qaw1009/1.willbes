<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'hooks/LogQueryHook.php';

/**
 * 한국인재개발진흥원 인적성 검사를 위한 데이터 검증
 * 진흥원 -> 윌비스 호출
 */
class Exam extends \app\controllers\BaseController
{
    protected $models = array('exam/personalityAptitudeExamA');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        // 수동 쿼리로그 저장
        $query_log = new \LogQueryHook();
        $query_log->logQueries();
    }

    /**
     * 인적성 검사 시 데이터 검증
     * 한국인재개발진흥원 -> 윌비스 호출
     */
    public function validateForData()
    {
        $rules = [
            ['field' => 'pae_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ,['field' => 'order_number', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ,['field' => 'id', 'label' => '식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            $this->personalityAptitudeExamAModel->addPersonalityAptitudeExamForLog(
                json_encode($this->_reqP(null),JSON_UNESCAPED_UNICODE),
                $this->_reqP('pae_idx'),
                'exam_validate',
                $this->personalityAptitudeExamAModel->return_info['error_params']['code']
            );
            return $this->json_error('필수 파라미터 오류');
        }

        $result = $this->personalityAptitudeExamAModel->validateForData($this->_reqP(null));
        $return_data = [];
        $this->json_result($result, '인증성공', $result, $return_data);
    }

    /**
     * 인적성 검사 상태값 저장
     * 한국인재개발진흥원 -> 윌비스 호출
     */
    public function updateState()
    {
        $return_data = [];

        $rules = [
            ['field' => 'pae_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ,['field' => 'order_number', 'label' => '주문번호', 'rules' => 'trim|required|integer']
            ,['field' => 'exam_state', 'label' => '상태정보', 'rules' => 'trim|required']
        ];

        //검사중
        if ($this->_reqP('exam_state') == 1) {
            $rules = array_merge($rules, [
                ['field' => 'bmt_uid', 'label' => '검사번호', 'rules' => 'trim|required']
                ,['field' => 'exam_startdt', 'label' => '검사시작일시', 'rules' => 'trim|required|integer']
            ]);
            $return_data = [
                'exam_startdt' => $this->_reqP('exam_startdt')
            ];
        }

        //만료,완료
        if ($this->_reqP('exam_state') == 3 || $this->_reqP('exam_state') == 9) {
            $rules = array_merge($rules, [
                ['field' => 'exam_enddt', 'label' => '검사종료일시', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            $this->personalityAptitudeExamAModel->addPersonalityAptitudeExamForLog(
                json_encode($this->_reqP(null),JSON_UNESCAPED_UNICODE),
                $this->_reqP('pae_idx'),
                'exam_state',
                $this->personalityAptitudeExamAModel->return_info['error_params']['code']
            );
            return $this->json_error('필수 파라미터 오류');
        }

        $result = $this->personalityAptitudeExamAModel->updateState($this->_reqP(null));
        $this->json_result($result, '성공', $result, $return_data);
    }
}