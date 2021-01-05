<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Member extends BaseSupporters
{
    protected $temp_models = array('board/boardSupporters', 'board/boardAssignmentSupporters');
    protected $helpers = array();

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

        $this->load->view('site/supporters/member/calendar', [
            'calendar' => $calendar
        ]);
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
            if($i < 10){
                $day = '0'. $i;
            }else{
                $day = $i;
            }
            if(empty($data[$target_month.$day]) === false){
                $temp_css = 'attend';
            }
            $temp_html = '<span class="'.$temp_css.'"></span>';
            $month_data[$i] = $temp_html;
        }
        return $month_data;
    }
}