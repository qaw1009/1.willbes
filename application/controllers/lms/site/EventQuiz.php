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
        $eqs_total_cnt = 20; // 문제 총 갯수
        $eqs_item_cnt = 5; // 문제별 보기 갯수
        $arr_param = $this->_reqG(null);
        $eq_idx = element('eq_idx', $arr_param);
        $eqs_idx = element('eqs_idx', $arr_param);
        $mem_answer_cnt = element('mem_answer_cnt', $arr_param);
        $eqs_data = [];
        $eqs_detail_data = [];

        if(empty($eq_idx) === true || !is_numeric($eq_idx)){
            show_alert("잘못된 접근 입니다.");
        }

        if(empty($eqs_idx) === false){
            $method = 'PUT';
            $eqs_data = $this->eventQuizModel->findEventQuizSetForModify($eqs_idx);
            $temp_eqs_data = [];

            foreach ($eqs_data as $row){
                $temp_eqs_data[$row['EqsqNum']][] = $row;
            }

            foreach ($temp_eqs_data as $key => $row){
                $cnt = 1;
                for($i=0; $i < $row[0]['EqsqdTotalcnt']; $i++){
                    $eqs_detail_data[$key][$cnt] = $row[$i];
                    $cnt++;
                }
            }
        }

        $this->load->view('site/event_quiz/quiz_create_modal', [
            'method' => $method,
            'arr_sel_type' => $this->eventQuizModel->_sel_type,
            'eq_idx' => $eq_idx,
            'eqs_data' => $eqs_data,
            'eqs_detail_data' => $eqs_detail_data,
            'eqs_total_cnt' => $eqs_total_cnt,
            'eqs_item_cnt' => $eqs_item_cnt,
            'mem_answer_cnt' => $mem_answer_cnt
        ]);
    }

    /**
     * 퀴즈 답변 팝업
     */
    public function quizAnswerPopup()
    {
        $eq_idx = $this->_reqG('eq_idx');

        // 퀴즈 그룹 조회
        $data = $this->eventQuizModel->listAllEventQuizSet($eq_idx);
        if(empty($data) === true){
            show_alert('잘못된 접근 입니다.', 'close');
        }

        $this->load->view('site/event_quiz/quiz_answer_popup', [
            'data' => $data,
            'eq_idx' => $eq_idx
        ]);
    }

    public function listAnswerPopupAjax()
    {
        $count = 0;
        $list = [];

        $arr_input = $this->_reqP(null);
        $eqs_idx = element('search_eqs_idx', $arr_input);

        if(empty($eqs_idx) === false){
            $arr_condition = [
                'EQ' => [
                    'A.IsStatus' => 'Y',
                    'A.EqsIdx' => $eqs_idx,
                ],
            ];

            $count = $this->eventQuizModel->listMemberPopupAnswer(true,$arr_condition);
            if ($count > 0) {
                $list = $this->eventQuizModel->listMemberPopupAnswer(false, $arr_condition, null, $this->input->post('length'), $this->input->post('start'), ['D.EqmaIdx' => 'asc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 퀴즈문제 등록/수정
     */
    public function quizSetStore()
    {
        $method = 'add';

        $rules = [
            ['field' => 'eqs_group_title', 'label' => '문제(그룹)명', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'order_num', 'label' => '정렬순서', 'rules' => 'trim|required|integer'],
            ['field' => 'eqs_is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'eqs_start_day', 'label' => '접수기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'eqs_end_day', 'label' => '접수기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'eqs_type', 'label' => '문제유형', 'rules' => 'trim|required'],
            ['field' => 'eqs_total_cnt', 'label' => '문제갯수', 'rules' => 'trim|required|integer'],
        ];

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
     * 엑셀 다운로드
     */
    public function answerExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $file_name = '퀴즈응답_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['이름', 'ID', '참여일', '문제(그룹)명', '결과'];

        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.EqIdx' => $this->_reqG('eq_idx'),
            ],
        ];

        $column = "
            M.MemName, M.MemId, D.RegDatm AS AnswerDatm, A.EqsGroupTitle, GROUP_CONCAT(CONCAT('질문',B.EqsqNum,':',C.EqsqdQuestion,'(',C.IsAnswer,')')) AS MemAnswer 
        ";

        $where = ['B.EqsIdx' => 'asc', 'C.EqsqIdx' => 'asc', 'D.EqmaIdx' => 'asc'];
        $list = $this->eventQuizModel->listMemberPopupAnswer(false, $arr_condition, $column, null, null, $where);

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
