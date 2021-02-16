<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentProduct extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'assignmentProductF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->_is_mobile === true) {
            $prod_code = $this->_reqG('prod_code',true);
            if (empty($prod_code) === true) {
                show_alert('정보가 올바르지 않습니다.','back');
            }
            $form_data = $this->_reqG(null);
        } else {
            $rules = [
                ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ];
            if ($this->validate($rules) === false) {
                return $this->json_error("정보가 올바르지 않습니다.");
            }
            $form_data = $this->_reqP(null);
        }

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'ProdCodeSub' => element('prod_code', $form_data),
            ],
            'RAW' => [
                '1' => '1 AND FIND_IN_SET(\'731001\',OptionCcds)'
            ]
        ];
        $orderby = 'OrderDate ASC';
        $leclist = $this->classroomFModel->getLecture($cond_arr, $orderby,false, true);
        if (empty($leclist) === true) {
            show_alert('조회된 상품이 없습니다. 다시 시도해 주세요.', '/classroom/home/', false);
        }
        $lec_data = $leclist[0];

        $column = '
            lcu.CorrectIdx, lcu.SiteCode, lcu.ProdCode, lcu.Title, lcu.Price, lcu.StartDate, lcu.EndDate
            ,IFNULL(fn_board_attach_data_correct(lcu.CorrectIdx),NULL) AS AttachFileName
            ,DATE_FORMAT(lcua.RegDatm, \'%Y-%m-%d\') as RegDatm #제출일제출일
            ,lcua.CuaIdx	#첨삭식별자
            ,lcua.AssignmentStatusCcd	#제출상태
            ,lcua.IsReply	#채점상태
            ,DATE_FORMAT(lcua.ReplyRegDatm, \'%Y-%m-%d\') as ReplyRegDatm #채점일
        ';
        $arr_condition = [
            'EQ' => [
                'lcu.ProdCode' => element('prod_code', $form_data),
                'lcu.IsStatus' => 'Y',
                'lcu.IsUse' => 'Y'
            ]
        ];
        $arr_condition_sub = [
            'EQ' => [
                'lcua.MemIdx' => $this->session->userdata('mem_idx'),
                'lcua.IsStatus' => 'Y'
            ]
        ];
        $list = $this->assignmentProductFModel->listCorrectAssignment($column, $arr_condition, $arr_condition_sub, ['lcu.CorrectIdx' => 'DESC']);

        return $this->load->view('/classroom/assignmentProduct/index',[
            'form_data' => $form_data,
            'lec_data' => $lec_data,
            'list' => $list,
            'arr_save_type_ccd' => ['698001','698002']    //임시저장, 제출완료
        ]);
    }

    /**
     * 첨삭등록
     * @return object|string
     */
    public function createModal()
    {
        $prod_code = $this->_req('prod_code');
        $correct_idx = $this->_req('correct_idx');
        $cua_idx = $this->_req('cua_idx');
        $method = 'POST';
        $join_type = 'left';

        $column = '
            lcu.CorrectIdx, lcu.SiteCode, lcu.ProdCode, lcu.Title, lcu.Content, lcu.Price, lcu.StartDate, lcu.EndDate
            ,IFNULL(fn_board_attach_data_correct(lcu.CorrectIdx),NULL) AS AttachData
            ,IFNULL(fn_board_attach_data_correct_assignment(lcua.CuaIdx,1),NULL) AS AttachAssignmentData_Admin
            ,IFNULL(fn_board_attach_data_correct_assignment(lcua.CuaIdx,0),NULL) AS AttachAssignmentData_User
            ,DATE_FORMAT(lcua.RegDatm, \'%Y-%m-%d\') as RegDatm #제출일
            ,lcua.CuaIdx	#첨삭식별자
            ,lcua.AssignmentStatusCcd	#제출상태
            ,lcua.IsReply	#채점상태
            ,lcua.ReplyRegDatm #채점일
            ,lcua.Content AS AnswerContent, lcua.ReplyContent
            ,lcua.IsStatus AS AnswerIsStatus
        ';
        $arr_condition = [
            'EQ' => [
                'lcu.ProdCode' => $prod_code,
                'lcu.CorrectIdx' => $correct_idx,
                'lcu.IsStatus' => 'Y',
                'lcu.IsUse' => 'Y'
            ]
        ];

        $arr_condition_sub = [
            'EQ' => [
                'lcua.MemIdx' => $this->session->userdata('mem_idx'),
                /*'lcua.IsStatus' => 'Y'*/
            ]
        ];

        if (empty($cua_idx) === false) {
            $method = 'PUT';
            $join_type = 'inner';
        }
        $data = $this->assignmentProductFModel->findCorrectAssignment($column, $arr_condition, $arr_condition_sub, $join_type);
        if (empty($data) === true) {
            show_alert('잘못된 접근 입니다.', '/classroom/home/', false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일
        if ($data['AnswerIsStatus'] == 'Y') {
            $data['temp_AnswerContent'] = $data['AnswerContent'];
        } else {
            $data['temp_AnswerContent'] = $data['Content'];
        }

        return $this->load->view('/classroom/assignmentProduct/create_modal',[
            'method' => $method,
            'attach_file_cnt' => 5,
            'prod_code' => $prod_code,
            'correct_idx' => $correct_idx,
            'cua_idx' => $cua_idx,
            'arr_save_type_ccd' => ['698001','698002'],    //임시저장, 제출완료
            'data' => $data
        ]);
    }

    /**
     * 첨삭상세페이지
     */
    public function showModal()
    {
        $prod_code = $this->_req('prod_code');
        $correct_idx = $this->_req('correct_idx');
        $edit_id = $this->_req('edit_id');
        $join_type = 'inner';

        $column = '
            lcu.CorrectIdx, lcu.SiteCode, lcu.ProdCode, lcu.Title, lcu.Content, lcu.Price, lcu.StartDate, lcu.EndDate, lcua.ReplyScore, lcua.RegDatm
            ,IFNULL(fn_board_attach_data_correct(lcu.CorrectIdx),NULL) AS AttachData
            ,IFNULL(fn_board_attach_data_correct_assignment(lcua.CuaIdx,1),NULL) AS AttachAssignmentData_Admin
            ,IFNULL(fn_board_attach_data_correct_assignment(lcua.CuaIdx,0),NULL) AS AttachAssignmentData_User
            ,lcua.CuaIdx	#첨삭식별자
            ,lcua.AssignmentStatusCcd	#제출상태
            ,lcua.IsReply	#채점상태
            ,lcua.ReplyRegDatm #채점일
            ,lcua.Content AS AnswerContent, lcua.ReplyContent
        ';
        $arr_condition = [
            'EQ' => [
                'lcu.CorrectIdx' => $correct_idx,
                'lcu.IsStatus' => 'Y',
                'lcu.IsUse' => 'Y'
            ]
        ];

        $arr_condition_sub = [
            'EQ' => [
                'lcua.MemIdx' => $this->session->userdata('mem_idx'),
                'lcua.IsStatus' => 'Y'
            ]
        ];

        $data = $this->assignmentProductFModel->findCorrectAssignment($column, $arr_condition, $arr_condition_sub, $join_type);
        if (empty($data) === true) {
            show_alert('잘못된 접근 입니다.', '/classroom/home/', false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일

        $this->load->view('classroom/assignmentProduct/show_modal', [
            'prod_code' => $prod_code,
            'correct_idx' => $correct_idx,
            'edit_id' => $edit_id,
            'data' => $data,
        ]);
    }

    /**
     * 첨삭저장
     */
    public function store()
    {
        $method = 'add';
        $cua_idx = '';
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'correct_idx', 'label' => '과제식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $inputData = $this->_setAssignmentInputData($this->_reqP(null, false));
        if (empty($this->_reqP('cua_idx')) === false) {
            $method = 'modify';
            $cua_idx = $this->_reqP('cua_idx');
        }
        $result = $this->assignmentProductFModel->{$method . 'CorrectForAssignment'}($inputData, $cua_idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 첨삭파일다운로드
     */
    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $correct_idx = $this->_reqG('correct_idx');
        $attach_type = (empty($this->_reqG('attach_type')) === true) ? '0' : $this->_reqG('attach_type');
        $this->downloadFModel->saveLog($correct_idx, $attach_type);

        $file_data = $this->downloadFModel->getFileData($correct_idx, $file_idx, 'correct_assignment');
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    /**
     * @param $input
     * @return array
     */
    private function _setAssignmentInputData($input){
        $input_data = [
            'CorrectIdx' => element('correct_idx', $input),
            'MemIdx' => $this->session->userdata('mem_idx'),
            'Title' => '',
            'Content' => element('board_content', $input),
            'AssignmentStatusCcd' => '698002',
            'RegIp' => $this->input->ip_address()
        ];
        return$input_data;
    }
}