<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class Assignment extends BaseSupport
{
    protected $models = array('support/supportBoardTwoWayF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '88';
    protected $_default_path = '/classroom/assignment';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
    protected $_reg_type = 0;    //등록타입
    protected $_arr_save_type_ccd = ['698001','698002'];    //임시저장, 제출완료

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));

        //과제노출 총 수 취득
        $arr_condition = [
            'EQ' => ['ProdCode' => element('p',$arr_input)],
            'BET' => ['ScheduleDate' => [element('sd',$arr_input), date('Y-m-d')]],
            'LTE' => ['ScheduleDate' => element('ed',$arr_input)]
        ];
        $total_rows = $this->supportBoardTwoWayFModel->listTotalCountForAssignment($arr_condition);

        $column = '
            b.*
            ,a.BaIdx AS am_BaIdx, a.Content AS am_MemContent, a.AssignmentStatusCcd AS am_AssignmentStatusCcd, IFNULL(a.IsReply,"N") AS am_IsReply
            ,DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS am_RegDatm ,DATE_FORMAT(a.ReplyRegDatm, \'%Y-%m-%d\') AS am_ReplyRegDatm
        ';
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.ProfIdx' => element('pf',$arr_input),
                'b.ProdCode' => element('p',$arr_input)
            ]
        ];
        $order_by = ['b.BoardIdx'=>'ASC'];
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForAssignment($arr_condition, $column, $total_rows, $order_by);
        }

        $this->load->view('classroom/assignment/index', [
            'arr_save_type_ccd' => $this->_arr_save_type_ccd,
            'total_rows' => $total_rows,
            'list' => $list
        ]);
    }

    /**
     * 과제제출
     */
    public function create()
    {
        $arr_input = array_merge($this->_reqG(null));
        $board_idx = element('board_idx', $arr_input);

        if (empty($board_idx) == true) {
            show_alert('잘못된 접근 입니다.', '/classroom/home/', false);
        }

        $column = '
            b.*
            ,a.BaIdx AS am_BaIdx, a.Title AS am_Title, a.Content AS am_MemContent, a.AssignmentStatusCcd AS am_AssignmentStatusCcd
            ,IFNULL(a.IsReply,"N") AS am_IsReply ,DATE_FORMAT(a.RegDatm, \'%Y-%m-%d %H:%i\') AS am_RegDatm
            ,a.ReplyContent AS am_ReplyContent
            ,DATE_FORMAT(a.ReplyRegDatm, \'%Y-%m-%d %H:%i\') AS am_ReplyRegDatm
            ,IFNULL(fn_board_attach_data(b.BoardIdx),NULL) AS AttachData
            ,IFNULL(fn_board_attach_data_assignment(a.BaIdx,1),\'N\') AS AttachAssignmentData_Admin
            ,IFNULL(fn_board_attach_data_assignment(a.BaIdx,0),\'N\') AS AttachAssignmentData_User
        ';
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.BoardIdx' => $board_idx,
                'b.IsUse' => 'Y'
            ],
        ];
        $data = $this->supportBoardTwoWayFModel->findBoardForAssignment('LEFT', $arr_condition, $column);
        if (empty($data) === true) {
            show_alert('조회된 과제가 없습니다.', '/classroom/home/', false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일

        if ($data['am_AssignmentStatusCcd'] == $this->_arr_save_type_ccd[0]) {
            $data['temp_Title'] = $data['am_Title'];
            $data['temp_Content'] = $data['am_MemContent'];
        } else {
            $data['temp_Title'] = $data['Title'];
            $data['temp_Content'] = $data['Content'];
        }

        $this->load->view('classroom/assignment/create', [
            'arr_save_type_ccd' => $this->_arr_save_type_ccd,
            'method' => 'POST',
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_assignment_file_cnt,
            'data' => $data
        ]);
    }

    /**
     * 과제현황
     */
    public function show()
    {
        $arr_input = array_merge($this->_reqG(null));
        $board_idx = element('board_idx', $arr_input);
        $tab = element('tab', $arr_input, '');
        $show_content = element('oc', $arr_input, '');

        $column = '
            b.*
            ,a.BaIdx AS am_BaIdx, a.Title AS am_Title, a.Content AS am_MemContent, a.AssignmentStatusCcd AS am_AssignmentStatusCcd
            ,IFNULL(a.IsReply,"N") AS am_IsReply ,DATE_FORMAT(a.RegDatm, \'%Y-%m-%d %H:%i\') AS am_RegDatm
            ,a.ReplyContent AS am_ReplyContent
            ,DATE_FORMAT(a.ReplyRegDatm, \'%Y-%m-%d %H:%i\') AS am_ReplyRegDatm
            ,IFNULL(fn_board_attach_data(b.BoardIdx),NULL) AS AttachData
            ,IFNULL(fn_board_attach_data_assignment(a.BaIdx,1),\'N\') AS AttachAssignmentData_Admin
            ,IFNULL(fn_board_attach_data_assignment(a.BaIdx,0),\'N\') AS AttachAssignmentData_User
        ';
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.BoardIdx' => $board_idx,
                'a.MemIdx' => $this->session->userdata('mem_idx'),
                'b.IsUse' => 'Y'
            ],
        ];
        $data = $this->supportBoardTwoWayFModel->findBoardForAssignment('INNER', $arr_condition, $column);
        if (empty($data) === true) {
            show_alert('조회된 과제가 없습니다.', '/classroom/home/', false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일

        $this->load->view('classroom/assignment/show', [
            'board_idx' => $board_idx,
            'show_tab' => $tab,
            'show_content' => $show_content,
            'data' => $data,
        ]);
    }

    /**
     * 과제 저장
     */
    public function store()
    {
        $method = 'add';
        $ba_idx = '';
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'idx', 'label' => '과제식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'save_type', 'label' => '저장방식', 'rules' => 'trim|required|in_list['.$this->_arr_save_type_ccd[0].','.$this->_arr_save_type_ccd[1].']'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));
        if (empty($this->_reqP('ba_idx')) === false) {
            $method = 'modify';
            $ba_idx = $this->_reqP('ba_idx');
        }
        $result = $this->supportBoardTwoWayFModel->{$method . 'BoardForAssignment'}($inputData, $ba_idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $board_idx = $this->_reqG('board_idx');
        $attach_type = $this->_reqG('attach_type');
        $this->downloadFModel->saveLog($board_idx, $attach_type);

        $file_data = $this->downloadFModel->getFileData($board_idx, $file_idx, 'board_assignment');
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    private function _setInputData($input){
        $input_data = [
            'BoardIdx' => element('idx', $input),
            'MemIdx' => $this->session->userdata('mem_idx'),
            'Title' => element('board_title', $input),
            'Content' => element('board_content', $input),
            'AssignmentStatusCcd' => element('save_type', $input),
            'RegIp' => $this->input->ip_address()
        ];
        return$input_data;
    }
}