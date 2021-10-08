<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Member extends BaseSupporters
{
    protected $temp_models = array('board/boardSupporters', 'board/boardAssignmentSupporters', 'board/board', 'member/manageLecture');
    protected $helpers = array('download');
    private $board_name = 'supportersQna';
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];
    private $_arr_reply_code = [
        'unAnswered' => '621001',   //미답변 코드
        'finish' => '621004'        //답변완료
    ];
    protected $_LearnPatternCcd_pass = ['615004'];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 회원관리 인덱스 페이지
     */
    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();
        $arr_base['supporters_type'] = $this->_getCcdData($this->_ccd['supporters_type']);
        $this->load->view('site/supporters/member/index', ['arr_base' => $arr_base]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.SupportersIdx' => $this->_reqP('search_supporters_idx'),
                'b.SupportersTypeCcd' => $this->_reqP('search_supporters_type_ccd')
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemName' => $this->_reqP('search_value'),
                    'm.MemId' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->supportersMemberModel->listSupportersMember(true, $arr_condition);

        if ($count > 0) {
            $list = $this->supportersMemberModel->listSupportersMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.SrmIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 서포터즈 회원 등록 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();

        //응시직렬,활동상태,학년,재학여부,시험준비기간
        $set_ccd = [$this->_ccd['serial'], $this->_ccd['supporters_status'], $this->_ccd['year'], $this->_ccd['is_school'], $this->_ccd['exam_period']];
        $arr_base['ccds'] = $this->_getCcdArrayData($set_ccd);
        unset($arr_base['ccds']['666']['666001']); //'일반' 항목 제거

        $data = null;
        $srm_idx = '';

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $srm_idx = $params[0];

            $column = '
            a.SiteCode, a.SupportersIdx, a.MemIdx, a.SupportersStatusCcd, a.SerialCcd, a.UniversityName, a.Department, a.SchoolYearCcd, a.IsSchoolCcd, a.ExamPeriodCcd, a.ExamCount,
            a.Content1, a.Content2, a.Content3, a.Content4, a.Content5, a.RegDatm, a.RegAdminIdx, a.RegIp, a.UpdDatm, a.UpdAdminIdx,
            m.MemIdx, m.MemId, m.MemName, m.BirthDay, m.Sex, fn_dec(m.PhoneEnc) as Phone, fn_dec(m.MailEnc) as Mail,
            mo.ZipCode, mo.Addr1, fn_dec(mo.Addr2Enc) as Addr2, fn_dec(mo.TelEnc) as Tel
            ';
            $arr_condition = [
                'EQ' => [
                    'a.SrmIdx' => $srm_idx
                ]
            ];
            $data = $this->supportersMemberModel->findSupportersMember($arr_condition, $column);
            if(empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('site/supporters/member/create', [
            'method' => $method,
            'arr_base' => $arr_base,
            'data' => $data,
            'srm_idx' => $srm_idx
        ]);
    }

    /**
     * 서포터즈 회원 등록/수정
     */
    public function store()
    {
        $method = 'add';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'supporters_idx', 'label' => '서포터즈', 'rules' => 'trim|integer|integer']
        ];

        if (empty($this->_reqP('srm_idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        //addSupportersMember, modifySupportersMember
        $result = $this->supportersMemberModel->{$method . 'SupportersMember'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 서포터즈 회원 일괄 등록 폼
     * @return object|string
     */
    public function createGroupModal()
    {
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();

        //활동상태
        $arr_base['supporters_status'] = $this->_getCcdData($this->_ccd['supporters_status']);

        return $this->load->view('site/supporters/member/create_group_modal', [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 서포터즈 회원 일괄 등록
     * @return null
     */
    public function storeGroup()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'supporters_idx', 'label' => '서포터즈', 'rules' => 'trim|integer|integer'],
            ['field' => 'mem_idx[]', 'label' => '회원식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->supportersMemberModel->addSupportersMemberGroup($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 서포터즈 회원 View 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $srm_idx = $params[0];

        $column = '
            a.SrmIdx, a.SiteCode, b.SiteName, a.SupportersIdx, s.Title AS SupportersName, a.MemIdx, s.SupportersYear, s.SupportersNumber,
            a.SupportersStatusCcd, a.SerialCcd, a.UniversityName, a.Department, a.SchoolYearCcd, a.IsSchoolCcd, a.ExamPeriodCcd, a.ExamCount,
            a.Content1, a.Content2, a.Content3, a.Content4, a.Content5, a.RegDatm, a.RegAdminIdx, a.RegIp, a.UpdDatm, a.UpdAdminIdx,
            m.MemIdx, m.MemId, m.MemName, m.BirthDay, m.Sex, fn_dec(m.PhoneEnc) as Phone, fn_dec(m.MailEnc) as Mail,
            mo.ZipCode, mo.Addr1, fn_dec(mo.Addr2Enc) as Addr2, fn_dec(mo.TelEnc) as Tel,
            mo.MailRcvStatus, mo.SmsRcvStatus,
            c.wAdminName AS RegAdminName, d.wAdminName AS UpdAdminName,
            fn_ccd_name(a.SerialCcd) AS SerialCcdName,
            fn_ccd_name(a.SchoolYearCcd) AS SchoolYearCcdName,
            fn_ccd_name(a.IsSchoolCcd) AS IsSchoolCcdName,
            fn_ccd_name(a.ExamPeriodCcd) AS ExamPeriodCcdName,
            fn_ccd_name(a.SupportersStatusCcd) AS SupportersStatusCcdName
            ';
        $arr_condition = [
            'EQ' => [
                'a.SrmIdx' => $srm_idx
            ]
        ];
        $data = $this->supportersMemberModel->findSupportersMember($arr_condition, $column);
        if(empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view('site/supporters/member/read', [
            'data' => $data,
            'srm_idx' => $srm_idx
        ]);
    }

    public function ajaxAssignment()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $this->load->view('site/supporters/member/layer/list_assignment', [
            'arr_hidden_data' => $arr_hidden_data
        ]);
    }

    public function ajaxAssignmentDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->supportersMemberModel->_arr_bm_idx['assignment'],
                'b.SupportersIdx' => $this->_reqP('supporters_idx'),
                'b.IsStatus' => 'Y',
                'b.IsUse' => 'Y'
            ]
        ];

        $list = [];
        $count = $this->boardAssignmentSupportersModel->listBoardForAssignmentSupportersMember($this->_reqP('member_idx'), true, $arr_condition);

        if ($count > 0) {
            $list = $this->boardAssignmentSupportersModel->listBoardForAssignmentSupportersMember($this->_reqP('member_idx'),false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['b.BoardIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function ajaxSuggest()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $this->load->view('site/supporters/member/layer/list_suggest', [
            'arr_hidden_data' => $arr_hidden_data
        ]);
    }

    public function ajaxSuggestDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->supportersMemberModel->_arr_bm_idx['suggest'],
                'b.SupportersIdx' => $this->_reqP('supporters_idx'),
                'b.RegMemIdx' => $this->_reqP('member_idx'),
                'b.IsStatus' => 'Y',
                'b.IsUse' => 'Y'
            ]
        ];

        $list = [];
        $count = $this->boardSupportersModel->listSuggestForMember(true, $arr_condition);

        if ($count > 0) {
            $list = $this->boardSupportersModel->listSuggestForMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['b.BoardIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function ajaxMyClass()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $column = 'SmcIdx, IsPublic, Content, AttachFileName, AttachFileRealName, AttachFilePath';
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $arr_hidden_data['supporters_idx'],
                'MemIdx' => $arr_hidden_data['member_idx']
            ]
        ];
        $data = $this->supportersMemberModel->findMyClass($arr_condition, $column);

        $this->load->view('site/supporters/member/layer/list_myClass', [
            'method' => 'PUT',
            'arr_hidden_data' => $arr_hidden_data,
            'data' => $data
        ]);
    }

    /**
     * 나의 소개 관리자 수정
     */
    public function storeMyClass()
    {
        $rules = [
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'member_idx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'smc_idx', 'label' => '나의소개식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'myclass_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $idx = $this->_reqP('smc_idx');
        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->supportersMemberModel->modifyMyClass($inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->supportersMemberModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 출석체크 ajax
     */
    public function ajaxMyAttendance()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $this->load->view('site/supporters/member/layer/list_my_attendance', [
            'arr_hidden_data' => $arr_hidden_data
        ]);
    }

    /**
     * 출석체크 데이터테이블
     * @return CI_Output
     */
    public function ajaxMyAttendanceDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $this->_reqP('supporters_idx'),
                'MemIdx' => $this->_reqP('member_idx'),
                'IsStatus' => 'Y',
            ]
        ];

        $list = [];
        $count = $this->supportersMemberModel->listMyAttendance( true, $arr_condition);

        if ($count > 0) {
            $list = $this->supportersMemberModel->listMyAttendance(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SadIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function calendarModal()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $this->load->view('site/supporters/member/calendar_modal', [
            'arr_hidden_data' => $arr_hidden_data
        ]);
    }

    public function showCalendar($params = [])
    {
        $supporters_idx = $this->_reqG('supporters_idx');
        $member_idx = $this->_reqG('member_idx');

        if (empty($params) === true) {
            $year = date('Y');
            $month = date('m');
        } else {
            $year = $params[0];
            $month = $params[1];
        }

        //일자별 데이터 조회
        $data = $this->_getScheduleDataForMonth($supporters_idx, $member_idx, $year.$month);

        $this->load->library('calendar');
        $this->calendar->next_prev_url = site_url('/site/supporters/member/showCalendar');
        $calendar = $this->calendar->generate($year, $month, $data);

        //월 회원 출석 통계
        $member_average = $this->_getAttendanceMemberAverage($supporters_idx, $member_idx, $year.$month.'01');

        $this->load->view('site/supporters/member/calendar', [
            'member_average' => $member_average,
            'calendar' => $calendar
        ]);
    }

    /**
     * 학습상담 ajax
     */
    public function ajaxMyQna()
    {
        $arr_hidden_data['supporters_idx'] = $this->_reqG('supporters_idx');
        $arr_hidden_data['member_idx'] = $this->_reqG('member_idx');

        $this->load->view('site/supporters/member/layer/list_my_qna', [
            'arr_reply_code' => $this->_arr_reply_code,
            'arr_hidden_data' => $arr_hidden_data
        ]);
    }

    /**
     * 학습상담 dataTable
     * @return CI_Output
     */
    public function ajaxQnaDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->supportersMemberModel->_arr_bm_idx['qna'],
                'LB.SupportersIdx' => $this->_reqP('supporters_idx'),
                'LB.IsStatus' => 'Y',
                'LB.IsUse' => 'Y'
            ]
        ];
        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName, MEM.MemId AS RegMemId,
            LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.SubjectIdx, PS.SubjectName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName AS ReplyRegAdminName,
            lms_product.ProdName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, [], '');

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, [], '', $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 학습상담 보기
     * @param array $param
     */
    public function readQnaReplyModal($param = [])
    {
        if (empty($param) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }
        $board_idx = $param[0];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName, LB.ReplyContent,
            qnaAdmin.wAdminName AS qnaAdminName, qnaAdmin2.wAdminName AS qnaUpdAdminName,
            LB.ReplyRegDatm, LB.ReplyUpdDatm,
            LB.SubjectIdx, PS.SubjectName, lms_product.ProdName
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

        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }

        // 첨부파일 이미지일 경우 해당 배열에 담기
        /*$data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['reply_AttachFilePath'], $data['reply_AttachFileName']);*/

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_reply_attach_file_idx'] = explode(',', $data['reply_AttachFileIdx']);
        $data['arr_reply_attach_file_path'] = explode(',', $data['reply_AttachFilePath']);
        $data['arr_reply_attach_file_name'] = explode(',', $data['reply_AttachFileName']);
        $data['arr_reply_attach_file_real_name'] = explode(',', $data['reply_AttachRealFileName']);

        $this->load->view('site/supporters/member/layer/read_qna_reply_modal', [
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
        ]);
    }

    /**
     * 학습상담 답변 등록 페이지
     * @param array $param
     */
    public function createQnaReplyModal($param = [])
    {
        if (empty($param) === true) {
            show_alert('잘못된 접근 입니다.','back');
        }
        $board_idx = $param[0];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic,
            LB.ReadCnt, LB.SettingReadCnt,
            LBA_1.AttachFileIdx as reply_AttachFileIdx, LBA_1.AttachFilePath as reply_AttachFilePath, LBA_1.AttachFileName as reply_AttachFileName, LBA_1.AttachRealFileName as reply_AttachRealFileName,
            LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            MEM.MemName, MEM.MemId, fn_dec(MEM.PhoneEnc) AS MemPhone,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName, LB.ReplyContent,
            qnaAdmin.wAdminName AS qnaAdminName, qnaAdmin2.wAdminName AS qnaUpdAdminName,
            LB.ReplyRegDatm, LB.ReplyUpdDatm,
            LB.SubjectIdx, PS.SubjectName, lms_product.ProdName
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

        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.','back');
        }

        // 첨부파일 이미지일 경우 해당 배열에 담기
        /*$data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['reply_AttachFilePath'], $data['reply_AttachFileName']);*/

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_reply_attach_file_idx'] = explode(',', $data['reply_AttachFileIdx']);
        $data['arr_reply_attach_file_path'] = explode(',', $data['reply_AttachFilePath']);
        $data['arr_reply_attach_file_name'] = explode(',', $data['reply_AttachFileName']);
        $data['arr_reply_attach_file_real_name'] = explode(',', $data['reply_AttachRealFileName']);

        $this->load->view('site/supporters/member/layer/create_qna_reply_modal', [
            'board_idx' => $board_idx,
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
        ]);
    }

    /**
     * 답변 등록
     * @return CI_Output|void
     */
    public function storeReply()
    {
        $this->bm_idx = $this->supportersMemberModel->_arr_bm_idx['qna'];

        $rules = [
            ['field' => 'reply_contents', 'label' => '답변 내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === true) {
            return $this->json_error('식별자가 없습니다.', _HTTP_NOT_FOUND);
        } else {
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setReplyInputData($this->_reqP(null, false));
        $result = $this->boardModel->replyAddBoard($inputData, $idx, $this->bm_idx);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 학습상담 게시판 삭제
     * @param array $params
     */
    public function deleteBoard($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->boardModel->boardDelete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }


    public function ajaxMyChart()
    {
        $this->load->view('site/supporters/member/layer/list_myChart', [
            'chart_data' => $this->_getChartData(),
            'supporters_idx' => $this->_req('supporters_idx'),
            'member_idx' => $this->_req('member_idx')
        ]);
    }

    public function myChartModal()
    {
        $chart_data = $this->_getChartData();
        $this->load->view('site/supporters/member/mychart_modal', [
            'chartdata' => $chart_data,

        ]);
    }

    /**
     * 챠트데이타
     * @return array
     */
    private function _getChartData()
    {
        $mem_idx = $this->_req('member_idx');
        $supporter_idx = $this->_req('supporters_idx');

        $column = '
                a.SupportersIdx, a.SiteCode, a.Title, a.SupportersTypeCcd, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.MenuInfo, a.IsUse, a.RegDatm, a.RegAdminIdx,
                b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName
            ';
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $supporter_idx
            ]
        ];
        $data = $this->supportersRegistModel->findSupporters($arr_condition, $column);
        $prod_data = $this->supportersRegistModel->listSupportersForProduct($supporter_idx);

        $chart_data = [];
        $today = date("Y-m-d", time());
        if(empty($prod_data) == false){
            $prod_code = array_data_pluck($prod_data, 'ProdCode');
            $prod = $this->manageLectureModel->getPackage(false, [
                'EQ' => [
                    'MemIdx' => $mem_idx,
                ],
                'LTE' => [
                    'LecStartDate' => $today // 시작일 <= 오늘
                ],
                'LT' => [
                    'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
                ],
                'GTE' => [
                    'RealLecEndDate' => $today // 종료일 >= 오늘
                ],
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
                    'ProdCode' => $prod_code
                ]
            ]);

            if(empty($prod) == false){
                $prod = $prod[0];

                $prod['TakeLecNum'] = $this->manageLectureModel->getLecture(true, [
                    'EQ' => [
                        'MemIdx' => $prod['MemIdx'],
                        'OrderIdx' => $prod['OrderIdx'],
                        'ProdCode' => $prod['ProdCode']
                    ],
                    'NOT' => [
                        'ProdCode' => 'ProdCodeSub'
                    ]
                ]);

                $prod['LecNum'] = 0;

                $chart_all = $this->supportersMemberModel->getChartData([
                    'EQ' => [
                        'o.MemIdx' => $prod['MemIdx'],
                        'o.OrderIdx' => $prod['OrderIdx'],
                        'op.ProdCode' => $prod['ProdCode']
                    ]
                ]);
                $chart_data['prod'] = $prod;
                $chart_data['all'] = array_data_pluck($chart_all, 'Cnt','Name');

                $chart_today = $this->supportersMemberModel->getChartData([
                    'EQ' => [
                        'o.MemIdx' => $prod['MemIdx'],
                        'o.OrderIdx' => $prod['OrderIdx'],
                        'op.ProdCode' => $prod['ProdCode']
                    ],
                    'LKB' => [
                        'lsh.FIrstStudyDate' => $today
                    ]
                ]);
                $chart_data['today'] = [
                    'Cnt' => 0,
                    'TimeSum' => 0,
                    'ProdCnt' => 0
                ];
                foreach ($chart_today as $row) {
                    $chart_data['today']['Cnt'] += $row['Cnt'];
                    $chart_data['today']['TimeSum'] += $row['TimeSum'];
                    $chart_data['today']['ProdCnt'] += $row['ProdCnt'];
                }

                // 월별기록
                $date = $data['StartDate'];
                while(strtotime($date) <= strtotime($data['EndDate'])){
                    $getmonth = date("Y-m", strtotime($date));
                    $month_data = $this->supportersMemberModel->getChartData([
                        'EQ' => [
                            'o.MemIdx' => $prod['MemIdx'],
                            'o.OrderIdx' => $prod['OrderIdx'],
                            'op.ProdCode' => $prod['ProdCode']
                        ],
                        'LKB' => [
                            'lsh.FIrstStudyDate' => $getmonth . '-'
                        ]
                    ]);
                    $pluck_data = array_data_pluck($month_data, ['Cnt','TimeSum'],'Name');
                    if(empty($pluck_data) == false){
                        $sum_cnt = 0;
                        $sum_time = 0;
                        foreach($pluck_data as $key => $row){
                            $pluck_arr = explode('::', $row);
                            $pluck_data[$key] =
                                [
                                    'Cnt' => $pluck_arr[0],
                                    'TimeSum' => $pluck_arr[1]
                                ];
                            $sum_cnt += $pluck_arr[0];
                            $sum_time += $pluck_arr[1];
                        }

                        $pluck_data['SumCnt'] = $sum_cnt;
                        $pluck_data['SumTime'] = gmdate('H시간 i분', $sum_time);
                    } else{
                        $pluck_data['SumCnt'] = 0;
                        $pluck_data['SumTime'] = '00시간 00분';
                    }


                    $chart_data['month'][$getmonth] = $pluck_data;

                    // 다음달 1일로 설정
                    $date = date("Y-m-01", strtotime("+1 month", strtotime($date)));

                    if($getmonth == substr($today, 0, 7)){
                        $chart_data['month_sum'] = [
                            'Cnt' => 0,
                            'TimeSum' => 0,
                            'ProdCnt' => 0
                        ];
                        foreach ($month_data as $row) {
                            $chart_data['month_sum']['Cnt'] += $row['Cnt'];
                            $chart_data['month_sum']['TimeSum'] += $row['TimeSum'];
                            $chart_data['month_sum']['ProdCnt'] += $row['ProdCnt'];
                        }
                        $chart_data['month_sum']['h'] = gmdate('H', $chart_data['month_sum']['TimeSum']);
                        $chart_data['month_sum']['m'] = gmdate('i', $chart_data['month_sum']['TimeSum']);
                    }
                }
            }
        }

        return $chart_data;
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
    }


    private function _setInputData($input){
        $input_data = [
            'Content' => element('myclass_content', $input),
            'IsPublic' => element('is_public', $input),
            'UpdAdminIdx' => $this->session->userdata('admin_idx')
        ];
        return$input_data;
    }

    /**
     * 일자별 데이터 조회
     * @param string $supporters_idx
     * @param string $member_idx
     * @param string $target_month
     * @return array
     */
    private function _getScheduleDataForMonth($supporters_idx = '', $member_idx = '', $target_month = '')
    {
        $month_data = [];
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx
                ,'MemIdx' => $member_idx
                ,'IsStatus' => 'Y'
            ]
        ];

        $data = $this->supportersMemberModel->getSupportersAttendanceMember($arr_condition);
        $last_day = date('t', strtotime($target_month . '01'));

        for ($i=1; $i<=$last_day; $i++) {
            $temp_css = '';
            $temp_txt = '';
            $day = ($i < 10) ? '0'. $i : $i;
            if(empty($data[$target_month.$day]) === false){
                $temp_css = 'attend';
                $temp_txt = $data[$target_month.$day];
            }
            $temp_html = '<span class="'.$temp_css.'">'.$temp_txt.'</span>';
            $month_data[$i] = $temp_html;
        }
        return $month_data;
    }

    /**
     * 출석 통계
     * @param string $supporters_idx
     * @param string $member_idx
     * @param string $target_day
     * @return mixed
     */
    private function _getAttendanceMemberAverage($supporters_idx = '', $member_idx = '', $target_day = '')
    {
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx
                ,'MemIdx' => $member_idx
                ,'IsStatus' => 'Y'
            ],
            'RAW' => [
                'AttendanceDay BETWEEN ' => 'LAST_DAY('.$target_day.' - INTERVAL 1 MONTH) + INTERVAL 1 DAY AND DATE_FORMAT(LAST_DAY('.$target_day.'), "%Y%m%d")'
            ]
        ];
        return $this->supportersMemberModel->getSupportersAttendanceMemberAverage($arr_condition, $target_day);
    }

    /**
     * 게시판 내용 재가공 처리
     * @param $content
     * @param $file_path
     * @param $file_name
     * @param $cnt
     * @return string
     */
    private function _getBoardForContent($content, $file_path, $file_name, $cnt = 20)
    {
        $arr_file_path = explode(',', $file_path);
        $arr_file_name = explode(',', $file_name);

        $tmp_images = '';
        for ($i=0; $i<$cnt; $i++) {
            if (empty($arr_file_path[$i]) === false) {
                $tmp_images .= make_image_tag($arr_file_path[$i] . $arr_file_name[$i]);
            }
        }
        return $tmp_images . $content;
    }

    private function _setReplyInputData($input)
    {
        $input_data = [
            'ReplyContent' => element('reply_contents', $input),
            'ReplyStatusCcd' => $this->_arr_reply_code['finish']
        ];
        return $input_data;
    }
}