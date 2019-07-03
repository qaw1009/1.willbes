<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'support/supportBoardTwoWayF', 'supportersF', 'couponF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '104';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    protected $_arr_save_type_ccd = ['698001','698002'];    //임시저장, 제출완료
    protected $_coupon_issue_ccd = ['685002']; //쿠폰자동발급

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = $this->_reqG(null);
        $arr_input['arr_save_type_ccd'] = $this->_arr_save_type_ccd;
        $this->load->view('site/supporters/assignment/index', [
            'arr_input' => $arr_input
        ]);
    }

    /**
     * ajax list
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code,
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SupportersIdx' => $supporters_idx
            ]
        ];

        $column = '
            b.*
            ,a.BaIdx AS am_BaIdx, a.Content AS am_MemContent, a.AssignmentStatusCcd AS am_AssignmentStatusCcd, IFNULL(a.IsReply,"N") AS am_IsReply
            ,DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS am_RegDatm ,DATE_FORMAT(a.ReplyRegDatm, \'%Y-%m-%d\') AS am_ReplyRegDatm,
            IFNULL((
                SELECT
                CONCAT(\'[\', GROUP_CONCAT(JSON_OBJECT(
                    \'FileIdx\', BoardFileIdx,
                    \'FileType\', AttachFiletype,
                    \'FilePath\', AttachFilePath,
                    \'FileName\', AttachFileName,
                    \'RealName\', AttachRealFileName,
                    \'Filesize\', AttachFileSize
                )), \']\') AS AttachData
                
                FROM lms_board_attach
                WHERE BoardIdx=b.BoardIdx AND IsStatus=\'Y\'
            ),\'N\') AS AttachData
        ';
        $order_by = ['b.BoardIdx'=>'DESC'];

        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoardForSupprotersAssignment(true, $arr_condition);
        $paging = $this->pagination('/supporters/assignment/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForSupprotersAssignment(false,$arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    /**
     * @return CI_Output
     */
    public function ajaxPaging()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code,
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SupportersIdx' => $supporters_idx
            ]
        ];

        $total_rows = $this->supportBoardTwoWayFModel->listBoardForSupprotersAssignment(true, $arr_condition, '');
        $paging = $this->pagination('/supporters/assignment/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);
        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function create()
    {
        $arr_input = array_merge($this->_reqG(null));
        $board_idx = element('board_idx', $arr_input);
        $supporters_idx = element('supporters_idx', $arr_input);

        if (empty($board_idx) == true || empty($supporters_idx) == true) {
            show_alert('잘못된 접근 입니다.', site_url('/supporters/home/index'), false);
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
            show_alert('조회된 과제가 없습니다.', site_url('/supporters/home/index'), false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일

        if (empty($data['am_Title']) === false) {
            $data['temp_Title'] = $data['am_Title'];
            $data['temp_Content'] = $data['am_MemContent'];
        } else {
            $data['temp_Title'] = $data['Title'];
            $data['temp_Content'] = $data['Content'];
        }

        $this->load->view('site/supporters/assignment/create', [
            'arr_save_type_ccd' => $this->_arr_save_type_ccd,
            'method' => 'POST',
            'board_idx' => $board_idx,
            'supporters_idx' => $supporters_idx,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_assignment_file_cnt,
            'data' => $data
        ]);
    }

    /**
     * 과제 상세 페이지
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
            show_alert('조회된 과제가 없습니다.', '/supporters/home/index', false);
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //과제 첨부파일
        $data['AttachAssignmentData_Admin'] = json_decode($data['AttachAssignmentData_Admin'],true);    //답변 첨부파일
        $data['AttachAssignmentData_User'] = json_decode($data['AttachAssignmentData_User'],true);      //과제 제출 첨부파일

        $this->load->view('site/supporters/assignment/show', [
            'board_idx' => $board_idx,
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
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'save_type', 'label' => '저장방식', 'rules' => 'trim|required|in_list['.$this->_arr_save_type_ccd[0].','.$this->_arr_save_type_ccd[1].']'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        //서포터즈조회
        $supporters_data = $this->_getSupportersData($this->_reqP('supporters_idx'));
        if (empty($supporters_data) === true) {
            return $this->json_error('조회된 서포터즈가 없습니다. 새로고침 후 다시 시도해 주세요.');
        }

        //발급할 쿠폰 조회 -> 발급
        $this->_coupon($supporters_data, $this->_reqP('supporters_idx'));

        $inputData = $this->_setInputData($this->_reqP(null, false));
        if (empty($this->_reqP('ba_idx')) === false) {
            $method = 'modify';
            $ba_idx = $this->_reqP('ba_idx');
        }
        $result = $this->supportBoardTwoWayFModel->{$method . 'BoardForAssignment'}($this->_bm_idx, $inputData, $ba_idx);
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

    /**
     * 서포터즈데이터 조회
     * @param $supporters_idx
     * @return mixed
     */
    private function _getSupportersData($supporters_idx)
    {
        $column = 'a.SupportersIdx, a.Title AS SupportersTitle, a.SupportersYear, a.SupportersNumber, a.CouponIssueCcd';
        $arr_condition_1 = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx,
                'IsUse' => 'Y'
            ]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'b.MemIdx' => $this->session->userdata('mem_idx'),
                'b.SiteCode' => $this->_site_code,
                'b.SupportersStatusCcd' => '720001',
                'b.IsStatus' => 'Y'
            ]
        ];
        return $this->supportersFModel->findSupporters($arr_condition_1, $arr_condition_2, $column);
    }

    /**
     * 쿠폰조회, 발급
     * @param $supporters_data
     * @param $supporters_idx
     */
    private function _coupon($supporters_data, $supporters_idx)
    {
        if ($supporters_data['CouponIssueCcd'] == $this->_coupon_issue_ccd[0]) {
            $coupon_data = $this->supportersFModel->listCoupon($supporters_idx);
            foreach ($coupon_data as $row) {
                $this->_giveCoupon($row['CouponIdx']);
            }
        }
    }

    /**
     * 쿠폰발급
     * @param $pin
     */
    private function _giveCoupon($pin)
    {
        //발급 제한 갯수
        $limit_count = 1;

        //발급여부 확인
        $check = $this->couponFModel->checkIssueCoupon($pin);

        if((int)$check < $limit_count) {
            //쿠폰발급
            $this->couponFModel->addMemberCoupon('coupon', $pin);
        }
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