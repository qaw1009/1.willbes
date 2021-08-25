<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends \app\controllers\FrontController
{
    protected $models = array('eventQuizF');
    protected $auth_controller = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $quiz_id = $this->_reqG('quiz_id');
        $member_quiz_today_type = $this->eventQuizFModel->memberQuizTodayType($quiz_id);
        $result = $this->eventQuizFModel->listQuiz($quiz_id);

        $this->load->view('site/event/quiz/index', [
            'quiz_id' => $quiz_id
            ,'member_quiz_today_type' => $member_quiz_today_type['TotayType']
            ,'list_quiz' => $result
        ]);
    }

    public function show()
    {
        $params = $this->_reqG(null);
        $question_count = $this->eventQuizFModel->findQuizQuestion(true, $params);
        $question_data = $question_detail_data = [];

        if (empty($question_count) === false) {
            $question_data = $this->eventQuizFModel->findQuizQuestion(false, $params);
            $question_detail_data = $this->eventQuizFModel->findQuizQuestionDetail($params, $question_data['EqsqIdx']);
        }

        $this->load->view('site/event/quiz/show', [
            'quiz_id' => element('quiz_id', $params)
            ,'quiz_set_id' => element('quiz_set_id', $params)
            ,'unit_num' => element('unit_num', $params, 0)
            ,'page_num' => element('page_num', $params, 0)
            ,'next_page' => element('page_num', $params, 0) + 1
            ,'question_count' => $question_count
            ,'question_data' => $question_data
            ,'question_detail_data' => $question_detail_data
            ,'arr_number_icon' => [1 => '①', 2=>'②', 3=>'③', 4=>'④', 5=>'⑤', 6=>'⑥', 7=>'⑦']
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'quiz_id', 'label' => '퀴즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'quiz_set_id', 'label' => '퀴즈항목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'question_id', 'label' => '퀴즈문항식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'answer_id', 'label' => '퀴즈보기식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'answer_num', 'label' => '퀴즈보기번호', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizFModel->addQuizForMemberAnswer($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function storeFinish()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'qm_idx', 'label' => '퀴즈회원식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizFModel->updateQuizForMemberAnswer($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}