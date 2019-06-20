<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class ActivityHistory extends BaseSupporters
{
    protected $temp_models = array('board/boardSupporters', 'board/boardAssignmentSupporters');
    protected $helpers = array('download','file');
    private $_arr_supporters_type = [
        '104' => '과제',
        '105' => '제안/토론'
    ];
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 활동내역 리스트
     */
    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();
        $arr_base['arr_supporters_type'] = $this->_arr_supporters_type;
        $this->load->view('site/supporters/activityHistory/index', ['arr_base' => $arr_base]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'Board.SiteCode' => $this->_reqP('search_site_code'),
                'Board.SupportersIdx' => $this->_reqP('search_supporters_idx'),
                'Board.BmIdx' => $this->_reqP('search_supporters_type')
            ],
            'ORG' => [
                'LKB' => [
                    'M.MemId' => $this->_reqP('search_value'),
                    'M.MemName' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $list = [];
        $count = $this->boardAssignmentSupportersModel->listAllSupportersForMember(true, $arr_condition);

        if ($count > 0) {
            $list = $this->boardAssignmentSupportersModel->listAllSupportersForMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['Board.RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 과제 View 페이지
     * @param array $param
     */
    public function readAssignmentModal($param = [])
    {
        if (empty($param) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }
        $ba_idx = $param[0];
        $board_idx = $this->_req('board_idx');

        $column = '
            STRAIGHT_JOIN
            s.Title AS SupportersTitle, s.SupportersYear, s.SupportersNumber,
            m.MemName, m.MemId,
            a.Title AS AssignmentTitle, a.Content AS AssignmentContent, b.Title AS BoardTitle, b.Content AS BoardContent, a.RegDatm,
            c.AttachFileIdx AS AttachFileIdx_Admin, c.AttachFilePath AS AttachFilePath_Admin, c.AttachFileName AS AttachFileName_Admin, c.AttachRealFileName AS AttachRealFileName_Admin,
            d.AttachFileIdx AS AttachFileIdx_User, d.AttachFilePath AS AttachFilePath_User, d.AttachFileName AS AttachFileName_User, d.AttachRealFileName AS AttachRealFileName_User
        ';
        $data = $this->boardAssignmentSupportersModel->findBoardForAssignmentSupporters($column, $ba_idx, $board_idx);

        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }

        $data['arr_attach_file_idx_admin'] = explode(',', $data['AttachFileIdx_Admin']);
        $data['arr_attach_file_path_admin'] = explode(',', $data['AttachFilePath_Admin']);
        $data['arr_attach_file_name_admin'] = explode(',', $data['AttachFileName_Admin']);
        $data['arr_attach_file_real_name_admin'] = explode(',', $data['AttachRealFileName_Admin']);

        $data['arr_attach_file_idx_user'] = explode(',', $data['AttachFileIdx_User']);
        $data['arr_attach_file_path_user'] = explode(',', $data['AttachFilePath_User']);
        $data['arr_attach_file_name_user'] = explode(',', $data['AttachFileName_User']);
        $data['arr_attach_file_real_name_user'] = explode(',', $data['AttachRealFileName_User']);

        $this->load->view("site/supporters/activityHistory/read_assignment_modal", [
            'data' => $data,
            'attach_file_cnt' => 5,
        ]);
    }

    /**
     * 제안/토론 뷰
     * @param array $param
     */
    public function readFreeBoardModal($param = [])
    {
        if (empty($param) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }
        $board_idx = $param[0];

        $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsPublic, LB.IsBest, LB.IsUse, LB.SupportersStartDate, LB.SupportersEndDate,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber,
            MEM.MemId, MEM.MemName
            ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['user'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];

        $data = $this->boardSupportersModel->findBoardForSupporters($column, $arr_condition, $arr_condition_file);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }
        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $this->load->view("site/supporters/activityHistory/read_free_board_modal", [
            'data' => $data,
            'attach_file_cnt' => 7,
        ]);
    }

    public function download()
    {
        $this->_download();
    }
}