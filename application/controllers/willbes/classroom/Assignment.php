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
        $total_rows = 20;

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

        $column = 'BoardIdx, Title, Content, AttachData';
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];
        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($data) === true) {
            show_alert('조회된 과제가 없습니다.', '/classroom/home/', false);
        }

        $this->load->view('classroom/assignment/create', [
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
        $data = $this->supportBoardTwoWayFModel->findBoardForAssignment($arr_condition, $column);
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

    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],

        ];

        if ($this->validate($rules) === false) {
            return;
        }

        /*if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('board_idx');
        }

        //
        $result = $this->{'_' . $method . 'Board'}($this->_reqP(null, false));*/
        $result = true;

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        $board_idx = $this->_reqG('board_idx');
        $attach_type = $this->_reqG('attach_type');

        $this->downloadFModel->saveLog($board_idx, $attach_type);
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }
}