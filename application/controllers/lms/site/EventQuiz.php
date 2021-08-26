<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventQuiz extends \app\controllers\BaseController
{
    protected $models = array('site/eventQuiz');
    protected $helpers = array();
    protected $arr_site_code;
    protected $def_site_code;

    private $_memory_limit_size = '512M';

    public function __construct()
    {
        parent::__construct();

        $this->arr_site_code = get_auth_on_off_site_codes('N', true);
        $this->def_site_code = key($this->arr_site_code);
    }

    /**
     * 퀴즈 관리 인덱스
     */
    public function index()
    {
        $this->load->view('site/event_quiz/index', [
            'def_site_code' => $this->def_site_code,
            'arr_site_code' => $this->arr_site_code
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EqIdx' => $this->_reqP('search_value'),
                    'A.Title' => $this->_reqP('search_value'),
                ]
            ]
        ];

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'A.StartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                    'A.EndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]
                ],
            ]);
        }

        $list = [];
        $count = $this->eventQuizModel->listAllEventQuiz(true,$arr_condition);
        if ($count > 0) {
            $list = $this->eventQuizModel->listAllEventQuiz(false, $arr_condition, $this->input->post('length'), $this->input->post('start'), ['EqIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 퀴즈 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $eq_idx = null;
        $quiz_set_data = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $eq_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.EqIdx' => $eq_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->eventQuizModel->findEventQuizForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 퀴즈 문제 조회
            $quiz_set_data = $this->eventQuizModel->listAllEventQuizSet($eq_idx);
        }

        $this->load->view("site/event_quiz/create", [
            'method' => $method,
            'data' => $data,
            'eq_idx' => $eq_idx,
            'def_site_code' => $this->def_site_code,
            'arr_site_code' => $this->arr_site_code,
            'quiz_set_data' => $quiz_set_data,
        ]);
    }

    /**
     * 퀴즈 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'title', 'label' => '퀴즈명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required'],
            ['field' => 'start_datm', 'label' => '노출기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'end_datm', 'label' => '노출기간종료일자', 'rules' => 'trim|required'],
        ];

        if (empty($this->_reqP('eq_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules,[
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ]);
        } else {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizModel->{$method . 'EventQuiz'}($this->_reqP(null, false));

        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 퀴즈문제 등록/수정 레이어
     */
    public function quizSetCreateModal()
    {
        $method = 'POST';
        $arr_param = $this->_reqG(null);
        $eq_idx = element('eq_idx', $arr_param);
        $eqs_idx = element('eqs_idx', $arr_param);
        $data_quiz = $data_question = $data_detail = [];

        if(empty($eq_idx) === true || !is_numeric($eq_idx)){
            show_alert("잘못된 접근 입니다.");
        }

        $result_order_num = $this->eventQuizModel->setOrderNum(['EQ' => ['EqIdx' => $eq_idx,'IsStatus' => 'Y']]);
        if(empty($eqs_idx) === false){
            $method = 'PUT';
            $data_quiz = $this->eventQuizModel->findQuizSet(['EQ' => ['s.EqsIdx' => $eqs_idx,'s.IsStatus' => 'Y']]);
            $data_question = $this->eventQuizModel->findQuizQuestion(['EQ' => ['s.EqsIdx' => $eqs_idx,'s.IsStatus' => 'Y']]);
            $result_detail = $this->eventQuizModel->findQuizDetail(['EQ' => ['sq.EqsIdx' => $eqs_idx,'sq.IsStatus' => 'Y']]);
            foreach ($result_detail as $row) {
                $data_detail[$row['EqsqIdx']][$row['EqsqdIdx']]['EqsqdQuestion'] = $row['EqsqdQuestion'];
                $data_detail[$row['EqsqIdx']][$row['EqsqdIdx']]['DetailRowNum'] = $row['DetailRowNum'];
                $data_detail[$row['EqsqIdx']][$row['EqsqdIdx']]['RightAnswer'] = $row['RightAnswer'];
                $data_detail[$row['EqsqIdx']][$row['EqsqdIdx']]['IsWrong'] = $row['IsWrong'];
            }
        }

        $this->load->view('site/event_quiz/quiz_create_modal', [
            'method' => $method,
            'arr_sel_type' => $this->eventQuizModel->_sel_type,
            'eq_idx' => $eq_idx,
            'eqs_idx' => $eqs_idx,
            'order_num' => $result_order_num['order_num'],
            'data_quiz' => $data_quiz,
            'data_question' => $data_question,
            'data_detail' => $data_detail,
        ]);
    }

    /**
     * 퀴즈문제 등록/수정
     */
    public function quizSetStore()
    {
        $method = 'add';

        $rules = [
            ['field' => 'eq_idx', 'label' => '퀴즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'eqs_group_title', 'label' => '문제(그룹)명', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'order_num', 'label' => '정렬순서', 'rules' => 'trim|required|integer'],
            ['field' => 'eqs_is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'eqs_start_day', 'label' => '노출기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'eqs_end_day', 'label' => '노출기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'eqs_type', 'label' => '문제유형', 'rules' => 'trim|required'],
            ['field' => 'eqs_total_cnt', 'label' => '문제갯수', 'rules' => 'trim|required|integer'],
        ];

        $form_data = $this->_reqP(null);
        $eqs_total_cnt = element('eqs_total_cnt', $form_data); // 퀴즈 문제 갯수
        $j=1;
        for($i=0; $i<$eqs_total_cnt; $i++) {
            if (empty(element('question_title_'.$i, $form_data)) === true) {
                $rules = array_merge($rules, [['field' => 'question_title_'.$j, 'label' => '['.$j.']답변항목(질문)', 'rules' => 'trim|required']]);
            }
            if (empty(element('question_cnt_'.$i, $form_data)) === true) {
                $rules = array_merge($rules, [['field' => 'question_cnt_'.$j, 'label' => '['.$j.']답변항목(보기갯수)', 'rules' => 'trim|required']]);
            }
            foreach (element('question_detail_title_'.$i, $form_data) as $key => $val) {
                if (empty($val) === true) {
                    $rules = array_merge($rules, [['field' => 'question_detail_title_'.$j, 'label' => '['.$j.']답변항목(보기)', 'rules' => 'trim|required']]);
                }
            }
            if (empty(element('question_detail_is_answer_'.$i, $form_data)) === true) {
                $rules = array_merge($rules, [['field' => 'question_detail_is_answer_'.$j, 'label' => '['.$j.']답변항목(정답체크)', 'rules' => 'trim|required']]);
            }
            if (empty(element('eqsq_explanation_'.$i, $form_data)) === true) {
                $rules = array_merge($rules, [['field' => 'eqsq_explanation_'.$j, 'label' => '['.$j.']답변항목(해설)', 'rules' => 'trim|required']]);
            }
            $j++;
        }

        if (empty($this->_reqP('eq_idx')) === false && empty($this->_reqP('eqs_idx')) === false) {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->eventQuizModel->{$method . 'EventQuizSet'}($this->_reqP(null, false));
        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 개별항목삭제
     */
    public function deleteQuestion()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'eqs_idx', 'label' => '식별자', 'rules' => 'trim|required'],
            ['field' => 'eqsq_idx', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizModel->deleteQuestion($this->_reqP(null, false));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 개별보기항목삭제
     */
    public function deleteDetail()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'eqsq_idx', 'label' => '식별자', 'rules' => 'trim|required'],
            ['field' => 'eqsqd_idx', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizModel->deleteDetail($this->_reqP(null, false));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 정렬순서, 사용유무 적용
     */
    public function storeUseOrderNum()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizModel->modifyQuizSetUseOrderNum(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 퀴즈 문제 삭제
     */
    public function delQuizSet()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'eqs_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventQuizModel->removeQuizSet($this->_reqP('eqs_idx'));
        $this->json_result($result, '삭제 처리 되었습니다.', $result);
    }

    /**
     * 퀴즈결과
     * @param array $params
     */
    public function quizAnswerModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_alert('잘못된 접근 입니다.', '/');
        }

        //퀴즈 그룹 조회
        $arr_base['eq_idx'] = $params[0];
        $selectBoxData = $this->eventQuizModel->listAllEventQuizSet($arr_base['eq_idx']);
        if(empty($selectBoxData) === true){
            show_alert('잘못된 접근 입니다.', '/');
        }
        $arr_base['max_question_cnt'] = $this->eventQuizModel->findMaxQuestionCnt()['cnt'];

        $add_columns = [];
        $search_eqs_idx = $this->_reqG('search_eqs_idx');
        if (empty($search_eqs_idx) === false) {
            $arr_base['eqs_idx'] = $search_eqs_idx;

            //퀴즈회차 항목 조회
            $question_data = $this->eventQuizModel->findQuizQuestion(['EQ' => ['s.EqIdx' => $arr_base['eq_idx'], 's.EqsIdx' => $search_eqs_idx, 's.IsStatus' => 'Y']]);
            $add_columns = array_pluck($question_data, 'EqsqTitle', 'EqsqIdx');
        }

        $this->load->view('site/event_quiz/quiz_answer_modal', [
            'arr_base' => $arr_base
            ,'arr_selectbox_data' => $selectBoxData
            ,'add_columns' => $add_columns
        ]);
    }

    /**
     * 퀴즈결과 ajax list
     * @return CI_Output
     */
    public function lisAjaxQuizAnswerModal()
    {
        $arr_input = $this->_reqP(null);
        $list = [];

        $arr_condition = [
            'EQ' => [
                'a.EqIdx' => element('search_eq_idx', $arr_input)
                ,'b.EqsIdx' => element('search_eqs_idx', $arr_input)
            ],
        ];

        $order_by = ['m.MemIdx' => 'asc', 'b.EqsIdx' => 'asc'];
        if (empty(element('search_eqs_idx', $arr_input)) === false) {
            $order_by = ['qm.QmIdx' => 'asc'];
        }

        $count = $this->eventQuizModel->listQuizAnswerMember(true,$arr_condition);
        if ($count > 0) {
            $list = $this->eventQuizModel->listQuizAnswerMember(false, $arr_condition, $this->input->post('length'), $this->input->post('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 엑셀 다운로드
     */
    public function answerExcel($params = [])
    {
        if (empty($params[0]) === true) {
            show_alert('잘못된 접근 입니다.', '/');
        }

        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $file_name = '퀴즈응답_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['이름', 'ID', '참여일', '문제(그룹)명'];

        $add_columns = $this->eventQuizModel->findMaxQuestionCnt()['cnt'];
        $search_eqs_idx = $this->_req('search_eqs_idx');

        $order_by = ['m.MemIdx' => 'asc', 'b.EqsIdx' => 'asc'];
        if (empty($search_eqs_idx) === false) {
            $order_by = ['qm.QmIdx' => 'asc'];

            //퀴즈회차 항목 조회
            $question_data = $this->eventQuizModel->findQuizQuestion(['EQ' => ['s.EqIdx' => $params[0], 's.EqsIdx' => $search_eqs_idx, 's.IsStatus' => 'Y']]);
            $add_columns = array_pluck($question_data, 'EqsqTitle', 'EqsqIdx');
        }

        if (is_array($add_columns) === true) {
            foreach ($add_columns as $key => $val) {
                $headers = array_merge($headers, [$val]);
            }
        } else {
            for ($i=1; $i<=$add_columns; $i++) {
                $headers = array_merge($headers, ['질문'.$i]);
            }
        }

        $arr_condition = [
            'EQ' => [
                'a.EqIdx' => $params[0]
                ,'b.EqsIdx' => $search_eqs_idx
            ],
        ];
        $result = $this->eventQuizModel->listQuizAnswerMember('excel', $arr_condition, null, null, $order_by);
        $list = [];
        if (empty($result) === false) {
            foreach ($result as $key => $row) {
                $list[$key]['MemName'] = $row['MemName'];
                $list[$key]['MemId'] = $row['MemId'];
                $list[$key]['RegDatm'] = $row['RegDatm'];
                $list[$key]['EqsGroupTitle'] = $row['EqsGroupTitle'];
                $temp_info_detail = json_decode($row['info_detail'], true);
                $arr_info_detail = array_pluck($temp_info_detail,'EqsqdQuestion','EqsqIdx');
                if (is_array($add_columns) === true) {
                    foreach ($add_columns as $key1 => $val1) {
                        if (empty($arr_info_detail[$key1]) === false) {
                            $list[$key][$val1] = $arr_info_detail[$key1];
                        }
                    }
                } else {
                    $j=0;
                    for ($i=1; $i<=$add_columns; $i++) {
                        if (empty($temp_info_detail[$j]) === false) {
                            $list[$key]['질문'.$i] = $temp_info_detail[$j]['EqsqdQuestion'];
                        } else {
                            $list[$key]['질문'.$i] = '';
                        }
                        $j++;
                    }
                }
            }
        }

        $download_query = $this->eventQuizModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

}
