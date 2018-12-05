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
        $total_rows = 4;

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
            'data' => $data
        ]);
    }

    public function show()
    {
        $this->load->view('classroom/assignment/show', [
        ]);
    }
}