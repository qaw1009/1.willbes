<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends \app\controllers\BaseController
{
    protected $models = array('member/manageMember','sys/code', 'pay/orderList','service/couponRegist','service/point',
        'board/board', 'crm/tm/tm', 'member/manageCs', 'member/manageBlackConsumer', 'member/manageLecture',
        'crm/send/sms', 'crm/send/message', 'crm/send/mail'
    );

    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];

    // 강의형태 단과/사용자패키지/운영자패키지/무료
    protected $_LearnPatternCcd_dan = ['615001','615002'];
    protected $_LearnPatternCcd_free = ['615005'];
    protected $_LearnPatternCcd_pkg = ['615003'];

    // CRM 발송 상태 [성공,예약,취소]
    private $_send_status_ccd = [
        '0' => '639001',
        '1' => '639002',
        '2' => '639003'
    ];

    protected $helpers = array('download','file');

    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
        // push 테스트
    }

    /**
     * 사용자 리스트
     * @return CI_Output
     */
    public function index()
    {
        $this->load->view('member/manage/list');
    }

    /**
     * 사용자 리스트
     * @return CI_Output
     */
    public function ajaxList()
    {
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->manageMemberModel->getEncString($search_value); // 검색어 암호화
        $inQuery = "";
        $list = [];

        // 기본 검색조건
        $arr_condition = [
            'ORG' => [
                'EQ' => [
                    'Mem.MemID' => $search_value, // 아이디
                    'Mem.MemIdx' => $search_value, // 회원번호
                    'Mem.MemName' => $search_value, // 회원이름
                    'Mem.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                    'Mem.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                    'Mem.Phone3' => $search_value, // 전화번호 뒷자리
                    'Mem.MailEnc' => $search_value_enc // 암호화된 이메일
                ]
            ],
            'EQ' => [
                'Mem.IsChange' => $this->_req('IsChange'), // 회원통합 여부
                'Info.SmsRcvStatus' => $this->_req('SmsRcv'), // sms 수신여부
                'Info.MailRcvStatus' => $this->_req('MailRcv'), // 메일 수신여부
                'Mem.IsBlackList' => $this->_req('IsBlackList') // 블랙리스트 여부
            ]
        ];

        // 최신 가입순으로
        $orderby = [
            'Mem.MemIdx' => 'DESC'
        ];

        // 날짜검색 쿼리생성
        $search_condition = $this->_req('search_condition');
        $search_sdate = $this->_req('search_start_date');
        $search_edate = $this->_req('search_end_date');
        if($search_sdate != '' && $search_edate != ''){
            switch($search_condition){
                case 'joindate':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastlogin':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastmodify':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastchgpwd':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'outdate':
                    $inQuery .= "
                    AND Mem.IsStatus = 'N'
                    AND Mem.MemIdx IN (
                        SELECT memIdx FROM lms_Member_Out_Log 
                        WHERE OutDatm >= '{$search_sdate} 00:00:00' AND OutDatm <= '{$search_edate} 23:59:59'
                    )";
                    break;
            }
        }

        // 탈퇴회원쿼리
        if($this->_req('IsOut') == 'Y' && $search_condition != 'outdate'){
            $inQuery .= " AND Mem.IsStatus = 'N' ";
        }

        // 비번 6개월이상 미변경 회원
        if($this->_req('NoChangePwd') == 'Y'){
            $arr_condition = array_merge($arr_condition, [
                'LTE' => ['Mem.LastPassModyDatm' => date("Y-m-d H:m:s", strtotime("-6 month"))]
            ]);
        }

        // 휴면회원 1년이상 미로그인 회원
        if($this->_req('IsSleep') == 'Y'){
            $arr_condition = array_merge($arr_condition, [
                'EQ' => ['Mem.IsStatus' => 'D']
                //'LTE' => ['Mem.LastLoginDatm' => date("Y-m-d H:m:s", strtotime("-12 month"))]
            ]);
        }
        // 기기등록회원
        if($this->_req('IsRegDevice') == 'Y' ){
            $inQuery .= "
                    AND Mem.MemIdx IN (
                        SELECT memIdx FROM lms_member_device 
                    )";
        }

        // 갯수 구해오기
        $count = $this->manageMemberModel->list(true, $arr_condition,
            $this->_req('length'), $this->_req('start'), $orderby, $inQuery);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->manageMemberModel->list(false, $arr_condition,
                $this->_req('length'), $this->_req('start'), $orderby, $inQuery);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 엑셀 읽어오기
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = [ '회원번호', '회원명', '아이디', '휴대폰', '휴대폰수신여부', '이메일', '이메일수신여부','상태'];

        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->manageMemberModel->getEncString($search_value); // 검색어 암호화
        $inQuery = "";
        $list = [];

        // 기본 검색조건
        $arr_condition = [
            'ORG' => [
                'EQ' => [
                    'Mem.MemID' => $search_value, // 아이디
                    'Mem.MemIdx' => $search_value, // 회원번호
                    'Mem.MemName' => $search_value, // 회원이름
                    'Mem.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                    'Mem.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                    'Mem.Phone3' => $search_value, // 전화번호 뒷자리
                    'Mem.MailEnc' => $search_value_enc // 암호화된 이메일
                ]
            ],
            'EQ' => [
                'Mem.IsChange' => $this->_req('IsChange'), // 회원통합 여부
                'Info.SmsRcvStatus' => $this->_req('SmsRcv'), // sms 수신여부
                'Info.MailRcvStatus' => $this->_req('MailRcv'), // 메일 수신여부
                'Mem.IsBlackList' => $this->_req('IsBlackList') // 블랙리스트 여부
            ]
        ];

        // 최신 가입순으로
        $orderby = [
            'Mem.MemIdx' => 'DESC'
        ];

        // 날짜검색 쿼리생성
        $search_condition = $this->_req('search_condition');
        $search_sdate = $this->_req('search_start_date');
        $search_edate = $this->_req('search_end_date');
        if($search_sdate != '' && $search_edate != ''){
            switch($search_condition){
                case 'joindate':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastlogin':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastmodify':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'lastchgpwd':
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ]);
                    break;

                case 'outdate':
                    $inQuery .= "
                    AND Mem.IsStatus = 'N'
                    AND Mem.MemIdx IN (
                        SELECT memIdx FROM lms_Member_Out_Log 
                        WHERE OutDatm >= '{$search_sdate} 00:00:00' AND OutDatm <= '{$search_edate} 23:59:59'
                    )";
                    break;
            }
        }

        // 탈퇴회원쿼리
        if($this->_req('IsOut') == 'Y' && $search_condition != 'outdate'){
            $inQuery .= " AND Mem.IsStatus = 'N' ";
        }

        // 비번 6개월이상 미변경 회원
        if($this->_req('NoChangePwd') == 'Y'){
            $arr_condition = array_merge($arr_condition, [
                'LTE' => ['Mem.LastPassModyDatm' => date("Y-m-d H:m:s", strtotime("-6 month"))]
            ]);
        }

        // 휴면회원 1년이상 미로그인 회원
        if($this->_req('IsSleep') == 'Y'){
            $arr_condition = array_merge($arr_condition, [
                'EQ' => ['Mem.IsStatus' => 'D']
                //'LTE' => ['Mem.LastLoginDatm' => date("Y-m-d H:m:s", strtotime("-12 month"))]
            ]);
        }
        // 기기등록회원
        if($this->_req('IsRegDevice') == 'Y' ){
            $inQuery .= "
                    AND Mem.MemIdx IN (
                        SELECT memIdx FROM lms_member_device 
                    )";
        }

        $list = $this->manageMemberModel->listExcel($arr_condition, $orderby, $inQuery);

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel('사용자목록', $list, $headers);
    }

    /**
     * 회원상세정보
     * @param array $param
     */
    public function detail($params = [])
    {
        $memIdx = null;
        $viewType = null;
        $data = [];

        if (empty($params[1]) === false) {
            $viewType = $params[1];
        }

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if(is_numeric($memIdx) == true){
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/manage/view', [
            'viewtype' => $viewType,
            'data' => $data
        ]);
    }

    public function detail_popup($params = [])
    {
        $memIdx = null;
        $viewType = null;
        $data = [];

        if (empty($params[1]) === false) {
            $viewType = $params[1];
        }

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if(is_numeric($memIdx) == true){
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_alert('파라미터가 정확하기 않습니다.','close');
            }
        } else {
            show_alert('파라미터가 정확하기 않습니다.','close');
        }

        if(empty($data) == true){
            show_alert('회원검색에 실패했습니다.','close');
        }

        $this->load->view('member/manage/view_popup', [
            'viewtype' => $viewType,
            'data' => $data
        ]);
    }

    /**
     * 회원 상세페이지에서 회원검색 레이어팝업
     * @param array $params
     */
    public function search($params = [])
    {
        $search_value = null;

        if (empty($params[0]) === false) {
            $search_value = $params[0];
        }

        $this->load->view('member/manage/search_modal', [
            'search_value' => $search_value
        ]);
    }

    /**
     * 로그인 로그 팝업 페이지
     * @param array $params
     */
    public function loginLog($params = [])
    {
        $memIdx = null;
        $data = [];

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if (is_numeric($memIdx) == true) {
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/log/login_modal', [
            'logtype' => 'login',
            'data' => $data
        ]);
    }

    /**
     * 회원 로그인 정보 리스트
     * @return CI_Output
     */
    public function ajaxloginlogList()
    {
        $memIdx = $this->_reqP('memIdx');
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_sdate = $this->_reqP('search_start_date');
        $search_edate = $this->_reqP('search_end_date');
        $list = [];

        // 기본 검색조건
        $arr_condition = [
            'EQ' => [
                'Log.MemIdx' => $memIdx,
                'Log.LoginIp' => $search_value
            ],
            'BDT' => [
                'Log.LoginDatm' => [$search_sdate, $search_edate]
            ]
        ];

        // 최신순으로
        $orderby = [
            'Log.LIdx' => 'DESC'
        ];

        // 갯수 구해오기
        $count = $this->manageMemberModel->loginlogList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->manageMemberModel->loginlogList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }

    /**
     * 회원정보수정 로그 팝업 페이지
     * @param array $params
     */
    public function infoLog($params = [])
    {
        $memIdx = null;
        $data = [];
        $logtype = null;
        $UpdTypeCcd = null;

        if (empty($params[1]) === false) {
            $logtype = $params[1];
        } else {
            $logtype = 'chg';
        }

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if (is_numeric($memIdx) == true) {
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        if($logtype == 'chg'){
            $UpdTypeCcd = "656004,656007"; //회원정보수정
        } else if($logtype == 'pwd') {
            $UpdTypeCcd = "656001,656002,656003"; // 비밀번호변경 혹은 초기화
        }

        $this->load->view('member/log/info_modal', [
            'logtype' => $logtype,
            'UpdTypeCcd' => $UpdTypeCcd,
            'data' => $data
        ]);
    }

    /**
     * 회원정볼 변경 리스트
     * @return CI_Output
     */
    public function ajaxinfologList()
    {
        $memIdx = $this->_reqP('memIdx');
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_sdate = $this->_reqP('search_start_date');
        $search_edate = $this->_reqP('search_end_date');
        $UpdTypeCcd = $this->_reqP('UpdTypeCcd');
        $list = [];

        // 기본 검색조건
        $arr_condition = [
            'EQ' => [
                'Log.MemIdx' => $memIdx,
                'Log.UpdIp' => $search_value
            ],
            'IN' => [
                'Log.UpdTypeCcd' => explode(',',$UpdTypeCcd)
            ],
            'BDT' => [
                'Log.UpdDatm' => [$search_sdate, $search_edate]
            ]
        ];

        // 최신순으로
        $orderby = [
            'Log.ChIdx' => 'DESC'
        ];

        // 갯수 구해오기
        $count = $this->manageMemberModel->infologList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->manageMemberModel->infologList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 회원 등록 기기정보 페이지
     * @param array $params
     */
    public function deviceLog($params = [])
    {
        $memIdx = null;
        $data = [];

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if (is_numeric($memIdx) == true) {
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/log/device_modal', [
            'data' => $data
        ]);
    }

    /**
     * 회원등록 기기정보 리스트
     * @return CI_Output
     */
    public function ajaxdeviceList()
    {
        $memIdx = $this->_reqP('memIdx');
        $list = [];

        // 기본 검색조건
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $memIdx,
            ]
        ];

        // 최신순으로
        $orderby = [
            //'ChIdx' => 'DESC'
        ];

        // 갯수 구해오기
        $count = $this->manageMemberModel->deviceList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->manageMemberModel->deviceList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function deleteDevice()
    {
        $input = $this->_reqP(null, false);
        $rules = [
            ['field' => 'memIdx', 'label' => '사용자번호', 'rules' => 'trim|required'],
            ['field' => 'MdIdx', 'label' => '삭제번호', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $input = [
            'MemIdx' => element('memIdx', $input),
            'MdIdx' => element('MdIdx', $input)
        ];

        $result = $this->manageMemberModel->deleteDevice($input);

        $this->json_result($result, '처리되었습니다.', $result);
    }

    /**
     * 회원 이름 변경 페이지
     * @param array $params
     */
    public function chgName($params = [])
    {
        $memIdx = null;
        $data = [];
        $cdata = [];

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if (is_numeric($memIdx) == true) {
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        // 기본 검색조건
        $arr_condition = [
            'EQ' => [
                'Log.MemIdx' => $memIdx,
                'Log.UpdTypeCcd' => '656005' // 이름변경
            ]
        ];

        // 최신순으로
        $orderby = [
            'Log.ChIdx' => 'DESC'
        ];

        // 갯수 구해오기
        $count = $this->manageMemberModel->infologList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $cdata = $this->manageMemberModel->infologList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        $this->load->view('member/log/chgname_modal', [
            'data' => $data,
            'cdata' => $cdata
        ]);
    }

    /**
     *  사용자 이름 변경 처리
     */
    public function chgName_Proc()
    {
        $input = $this->_reqP(null, false);
        $rules = [
            ['field' => 'memIdx', 'label' => '사용자번호', 'rules' => 'trim|required'],
            ['field' => 'chg_name', 'label' => '변겅이름', 'rules' => 'trim|required'],
            ['field' => 'chg_reason', 'label' => '변경사유', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $data = $this->manageMemberModel->getMember(element('memIdx', $input));

        if(empty($data) == true){
            $this->json_result(false, '', [
                'ret_cd' => false,
                'ret_msg' => '어쩌구저쩌구
            ']);
            return;
        }

        $input = [
            'MemIdx' => element('memIdx', $input),
            'MemName' => element('chg_name', $input),
            'UpdMemo' => element('chg_reason', $input),
            'UpdData' => $data['MemName'].' ▶ '.element('chg_name', $input)
        ];

        $result = $this->manageMemberModel->chgName($input);

        $this->json_result($result, '처리되었습니다.', $result);
    }

    /**
     * 블랙리스트 목록
     * @param array $params
     */
    public function blacklistLog($params = [])
    {
        $memIdx = null;
        $data = [];

        if (empty($params[0]) === false) {
            $memIdx = $params[0]; //회원번호

            if (is_numeric($memIdx) == true) {
                $data = $this->manageMemberModel->getMember($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/log/blacklist_modal', [
            'data' => $data
        ]);
    }


    /**
     * 해당 회원으로 로그인후 메인 페이지로 이동
     */
    public function setMemberLogin($params = [])
    {
        if(empty($params[0]) == true){
            show_alert('로그인할수 없습니다.', 'close');
        }
        $memIdx = $params[0];

        $data = $this->manageMemberModel->getMember($memIdx);

        if($this->manageMemberModel->storeMemberLogin($data) == false){
            show_alert('로그인할수 없습니다.', 'close');
        }

        redirect(app_url('/', 'www'));
    }


    /**
     *  회원 비밀번호 초기화
     * @return CI_Output
     */
    public function resetPWD()
    {
        $memIdx = $this->_req('memIdx');

        if(empty($memIdx) == true){
            return $this->json_error('해당하는 회원정보가 없습니다.');
        }

        $data = $this->manageMemberModel->getMember($memIdx);

        if(empty($data) == true){
            return $this->json_error('해당하는 회원정보가 없습니다.');
        }

        if($this->manageMemberModel->resetPWD($memIdx) == false){
            return $this->json_error('비밀번호 초기화에 실패했습니다.');
        }

        return $this->json_result(true, '비밀번호를 초기화 했습니다.');
    }


    /**
     * 강좌 수강 시간 정보 확인
     */
    public function viewCurriculum()
    {
        $memidx = $this->_req('memidx');
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');

        $member = $this->manageMemberModel->getMember($memidx);

        $lec = $this->manageLectureModel->getLecture(false, [
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ]);

        if(empty($lec) == true){
            show_alert('신청강좌 정보가 없습니다.', 'close');
        }

        $lec = $lec[0];

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        $curriculum = $this->manageLectureModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx']
            ],
            'IN' => [
                'wUnitIdx' => $wUnitIdxs
            ]
        ]);

        $lec['down_log'] = $this->manageLectureModel->getDownLog([
            'EQ' => [
                'MemIdx' => $lec['MemIdx'],
                'OrderIdx' => $lec['OrderIdx'],
                'ProdCode' => $lec['ProdCode'],
                'ProdCodeSub' => $lec['ProdCodeSub'],
                'wLecIdx' => $lec['wLecIdx']
            ]
        ]);

        // 회차별 수강시간 체크
        foreach($curriculum AS $idx => $row){
            if(empty($lec['MultipleApply']) == true){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';
            }
            else if($lec['MultipleApply'] == '1'){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';

            } elseif($lec['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크

                // 수강시간은 초
                $studytime = intval($row['RealStudyTime']);

                // 제한시간 분 -> 초
                if($row['RealExpireTime'] == 0){
                    $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;
                } else {
                    $limittime = intval($row['RealExpireTime']) * 60;
                }

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }

            } elseif($lec['MultipleTypeCcd'] == '612002') {
                // 패키치 수강시간 체크

                // 수강시간은 초
                $studytime = intval($lec['StudyTimeSum']);

                // 제한시간 분 -> 초
                $limittime = intval($lec['RealExpireTime']) * 60;

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }
            }
        }

        $this->load->view('member/layer/lecture/curriculum',[
            'member' => $member,
            'lec' => $lec,
            'curriculum' => $curriculum
        ]);
    }


    /**
     * 시작일 변경
     * @return CI_Output|object|string
     */
    public function start()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->_req('memidx');

        $today = date("Y-m-d", time());

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        if($lec['IsLecStart'] != 'Y'){
            //show_alert('시작일을 변경할 수 없는 강좌입니다.', 'close');
        }

        if($lec['ChgStartNum'] >= 3) {
            //return $this->json_error('시작일 변경횟수를 초과했습니다.');
        }

        $log = $this->manageLectureModel->getStartDateLog([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ]
        ]);

        $member = $this->manageMemberModel->getMember($memidx);

        return $this->load->view('member/layer/lecture/start', [
            'member' => $member,
            'lec' => $lec,
            'log' => $log
        ]);
    }

    /**
     *  강의 시작일변경처리
     * @return CI_Output
     */
    public function setStart()
    {
        $memidx =  $this->_req('memidx');
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $today = date("Y-m-d", time());

        if(empty($start_date) === true){
            $start_date = $this->_req("startdate");
        }

        if(empty($start_date) === true){
            return $this->json_error('시작일이 잘못된 날짜 입니다.');
        }

        if(strtotime($start_date) == false){
            return $this->json_error('시작일이 잘못된 날짜 입니다.');
        }

        /*
        if($start_date < $today){
            return $this->json_error('시작일은 오늘 이후 날짜만 가능합니다.');
        }
*/
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

/*
        관리자는 마음대로

        if($lec['IsLecStart'] != 'Y'){
            return $this->json_error('시작일을 변경할 수 없는 강좌입니다.');
        }

        if($lec['ChgStartNum'] >= 3) {
            if($start_date != $today){
                return $this->json_error('시작일 변경횟수를 초과했습니다.');
            }
        }

        if($lec['IsRebuy'] > 0 || $lec['RebuyCount'] > 0){
            return $this->json_error('수강연장 강의는 시작일 변경이 불가능합니다.');
        }


        if($start_date > date("Y-m-d", strtotime(substr($lec['OrderDate'], 10).'+30day'))){
            return $this->json_error('시작일은 주문일로부터 30일 이내만 변경 가능합니다.');
        }
*/

        if($this->manageLectureModel->setStartDate([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ], $start_date) === true){
            return $this->json_result(true);
        } else {
            return $this->json_error('강의 시작일 변경중에 오류가 발생했습니다.');
        }
    }


    /**
     *  기간 연장페이지
     * @return object|string
     */
    public function extend()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx =  $this->_req('memidx');

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        $log = $this->manageLectureModel->getExtendLog([
            'EQ' => [
                'MemIdx' => $memidx,
                'TargetOrderIdx' => $orderidx,
                'TargetProdCode' => $prodcode,
                'TargetProdCodeSub' => $prodcodesub
            ]
        ]);

        $member = $this->manageMemberModel->getMember($memidx);

        return $this->load->view('member/layer/lecture/extend', [
            'member' => $member,
            'lec' => $lec,
            'log' => $log
        ]);
    }


    /**
     *  사용자 기간 연장처리
     * @return CI_Output|object|string
     */
    public function setExtend()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx =  $this->_req('memidx');
        $extenday = $this->_req("extenday");
        $extenmemo = $this->_req("extenmemo");
        $extentype = $this->_req("extentype");

        if(is_numeric($extenday) === false){
            return $this->json_error('연장기간은 숫자로 입력해야합니다.');
        }

        if(empty($extenmemo) === true){
            return $this->json_error('연장사유를 입력해주십시요.');
        }

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($this->manageLectureModel->storeExtend([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'ExtenType' => $extentype,
                'ExtenDay' => $extenday,
                'ExtenMemo' => $extenmemo,
                'RealLecExpireDay' => $lec['RealLecExpireDay'],
                'LecStartDate' => $lec['LecStartDate'],
                'OrderProdIdx' => $lec['OrderProdIdx']
            ]) === false){
            return $this->json_error('강의 연장에 실패했습니다.');
        } else {
            return $this->json_result(true,'처리 완료되었습니다.');
        }
    }


    /**
     *  일시중지 페이지
     * @return object|string
     */
    public function pause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx =  $this->_req('memidx');

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            show_alert('신청강좌정보를 찾을수 없습니다.', 'close');
        }

        if($lec['IsPause'] != 'Y'){
            show_alert('일시중지할 수 없는 강좌입니다.', 'close');
        }

        $PauseRemain = $lec['LecExpireDay'] - $lec['PauseSum'];

        if($PauseRemain < 0){
            $PauseRemain = 0;
        }

        if($PauseRemain > $lec['remainDays']){
            $PauseRemain = $lec['remainDays'];
        }

        $lec['PauseRemain'] = $PauseRemain;


        $log = $this->manageLectureModel->getPauseLog([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ]
        ]);

        $member = $this->manageMemberModel->getMember($memidx);

        return $this->load->view('member/layer/lecture/pause', [
            'member' => $member,
            'lec' => $lec,
            'log' => $log
        ]);
    }

    
    /**
     *  일시중지 처리
     * @return CI_Output
     */
    public function setPause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->_req("memidx");
        $enddate = $this->_req("enddate");
        $startdate = $this->_req("startdate");

        $today = date("Y-m-d", time());

        if(empty($enddate) === true){
            return $this->json_error('일시중지 종료일이 잘못된 날짜 입니다.');
        }

        if(strtotime($enddate) == false){
            return $this->json_error('일시중지 종료일이 잘못된 날짜 입니다.');
        }

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($lec['IsRebuy'] > 0 || $lec['RebuyCount'] > 0){
            return $this->json_error('수강연장 강의는 일시중지가 불가능합니다.');
        }

        // 날짜 계산
        $PauseDay = intval((strtotime($enddate)-strtotime($startdate))/86400) +1;

        if( $this->manageLectureModel->setPause([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'OrderProdIdx' => $lec['OrderProdIdx'],
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'lecstartdate' => $lec['LecStartDate'],
                'realecexpireday' => $lec['LecExpireDay'] + $PauseDay + $lec['PauseSum'] + $lec['ExtenSum'],
                'pausestartdate' => $startdate,
                'pauseenddate' => $enddate,
                'pauseday' => $PauseDay
            ]) == true){
            return $this->json_result(true,'일시중지 성공');
        } else {
            return $this->json_error('일시중지중 에러발생');
        }
    }

    /**
     *  일시중지 취소
     * @return CI_Output
     */
    public function cancelPause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('memidx');
        $lphidx = $this->_req('lphidx');

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->manageLectureModel->getLecture(false, $cond_arr);

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(false, $cond_arr);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($this->manageLectureModel->cancelPause([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'OrderProdIdx' => $lec['OrderProdIdx'],
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'lecstartdate' => $lec['LecStartDate'],
                'realecexpireday' => $lec['RealLecExpireDay'],
                'LphIdx' => $lphidx
            ]) == true){
            return $this->json_result(true, '일시정지가 취소되었습니다.');
        } else {
            return $this->json_error('일시정지 취소에 실패했습니다.');
        }
    }

    /**
     * 수강한 강좌 리스트
     */
    public function ajaxLecture()
    {
        $memIdx = $this->_req('memIdx');
        $search_value = $this->_req('search_value');

        $dan = $this->manageLectureModel->getLecture(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615001'
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $search_value,
                    'subProdName' => $search_value
                ]
            ]
        ]);

        logger("단과",null,'debug');

        $userpkg = $this->manageLectureModel->getPackage(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615002'
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $search_value,
                    'subProdName' => $search_value
                ]
            ]
        ]);
        logger("사용자",null,'debug');
        foreach($userpkg as $idx => $row){
            $pkgsublist =  $this->manageLectureModel->getLecture(false, [
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $userpkg[$idx]['subleclist'] = $pkgsublist;
        }
        logger("사용자상세",null,'debug');

        $pkg = $this->manageLectureModel->getPackage(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615003'
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $search_value,
                    'subProdName' => $search_value
                ]
            ]
        ]);
        logger("패키지",null,'debug');
        foreach($pkg as $idx => $row){
            $pkgsublist =  $this->manageLectureModel->getLecture(false, [
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkg[$idx]['subleclist'] = $pkgsublist;
        }
        logger("패키지상세",null,'debug');

        $pass = $this->manageLectureModel->getPackage(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615004'
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $search_value,
                    'subProdName' => $search_value
                ]
            ]
        ]);
        logger("기간제",null,'debug');
        foreach($pass as $idx => $row){
            $pkgsublist =  $this->manageLectureModel->getLecture(false, [
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pass[$idx]['subleclist'] = $pkgsublist;
        }
        logger("기간제 상세",null,'debug');
        $free = $this->manageLectureModel->getLecture(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615005'
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $search_value,
                    'subProdName' => $search_value
                ]
            ]
        ]);;
        logger("무료",null,'debug');


        $offdan = [];

        $offpkg = [];

        $this->load->view('member/layer/lecture/list', [
            'memIdx' => $memIdx,
            'search_value' => $search_value,
            'dan' => $dan,
            'userpkg' => $userpkg,
            'pkg' => $pkg,
            'pass' => $pass,
            'free' => $free,
            'offdan' => $offdan,
            'offpkg' => $offpkg
        ]);
    }


    public function ajaxPay()
    {
        $memIdx = $this->_req('memIdx');

        $this->load->view('member/layer/pay', [
            'memIdx' => $memIdx,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    public function ajaxCoupon()
    {
        $memIdx = $this->_req('memIdx');

        $arr_issue_type_ccd = $this->codeModel->getCcd($this->couponRegistModel->_ccd['IssueType']);

        $this->load->view('member/layer/coupon', [
            'memIdx' => $memIdx,
            'arr_issue_type_ccd' => $arr_issue_type_ccd
        ]);
    }

    public function ajaxPointLecture()
    {
        $memIdx = $this->_req('memIdx');

        // 전체 유효포인트 조회
        $valid_save_point = array_get($this->pointModel->listAllSaveUsePoint('lecture', 'save_only', $memIdx, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'RAW' => ['PSU.ExpireDatm >= ' => 'NOW()']
        ]), '0.RemainPoint', 0);

        // 당월소멸예정포인트 조회
        $expire_save_point = array_get($this->pointModel->listAllSaveUsePoint('lecture', 'save_only', $memIdx, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'BDT' => ['PSU.ExpireDatm' => [date('Y-m-d'), date('Y-m-t')]]
        ]), '0.RemainPoint', 0);

        $this->load->view('member/layer/point', [
            'memIdx' => $memIdx,
            'arr_point_status_ccd' => $this->codeModel->getCcd('679'),
            'valid_save_point' => $valid_save_point,
            'expire_save_point' => $expire_save_point,
            '_point_type' => 'lecture'
        ]);
    }

    public function ajaxPointBook()
    {
        $memIdx = $this->_req('memIdx');

        // 전체 유효포인트 조회
        $valid_save_point = array_get($this->pointModel->listAllSaveUsePoint('book', 'save_only', $memIdx, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'RAW' => ['PSU.ExpireDatm >= ' => 'NOW()']
        ]), '0.RemainPoint', 0);

        // 당월소멸예정포인트 조회
        $expire_save_point = array_get($this->pointModel->listAllSaveUsePoint('book', 'save_only', $memIdx, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'BDT' => ['PSU.ExpireDatm' => [date('Y-m-d'), date('Y-m-t')]]
        ]), '0.RemainPoint', 0);

        $this->load->view('member/layer/point', [
            'memIdx' => $memIdx,
            'arr_point_status_ccd' => $this->codeModel->getCcd('679'),
            'valid_save_point' => $valid_save_point,
            'expire_save_point' => $expire_save_point,
            '_point_type' => 'book'
        ]);
    }

    /**
     * 상담/메모관리 : 상담게시판
     */
    public function ajaxCounsel()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);

        $this->load->view('member/layer/board/counsel', [
            'bm_idx' => '48',
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'counsel'
        ]);
    }

    public function ajaxCounselDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => '48',
                'LB.RegMemIdx' => $this->_reqP('search_member_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                    'LB.ReplyContent' => $this->_reqP('search_replay_value')
                ]
            ]
        ];

        if ($this->_req('search_chk_delete_value') == '1') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsStatus' => 'N']);
        }

        $sub_query_condition = [];
        if (empty($this->_reqP('search_category')) === false) {
            $sub_query_condition = [
                'EQ' => [
                    'subLBrC.IsStatus' => 'Y',
                    'subLBrC.CateCode' => $this->_reqP('search_category')
                ]
            ];
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.MdCateCode, LB.CampusCcd, LSC.CcdName AS CampusName,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName,
            LB.IsPublic, LB.VocCcd, LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName,
            MdSysCate.CateName as MdCateName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard('counsel',true, $arr_condition, $sub_query_condition, '');

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard('counsel',false, $arr_condition, $sub_query_condition, '', $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 상담/메모관리 : CS 상담관리
     */
    public function ajaxCs()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);
        $codes['consult_group_ccd'] = [
            '700' => '고객상담',
            '701' => '환불'
        ];
        $temp_codes = $this->codeModel->getCcdInArray(['700','701']);
        $temp_data = [];
        foreach ($temp_codes as $keys => $row) {
            foreach ($row as $key => $val) {
                $temp_data[$key]['group'] = $keys;
                $temp_data[$key]['ccd'] = $key;
                $temp_data[$key]['ccd_name'] = $val;
            }
        }
        $codes['consult_ccd'] = $temp_data;

        $this->load->view('member/layer/board/cs', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            'codes' => $codes,
            '_board_type' => 'cs'
        ]);
    }

    public function ajaxCsDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $this->_reqP('search_member_idx'),
                'SiteCode' => $this->_reqP('search_site_code'),
                'CsGroupCcd' => $this->_reqP('search_group_cs_ccd'),
                'CsCcd' => $this->_reqP('search_cs_ccd'),
            ],
            'ORG' => [
                'LKB' => [
                    'Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        $column = '
            a.CsIdx, a.MemIdx, a.SiteCode, a.CsGroupCcd, a.CsCcd, a.IsSuccess, a.Content, a.IsStatus, a.RegAdminIdx, a.RegDatm, a.RegIp, a.UpdAdminIdx, a.UpdDatm,
            b.SiteName, c.wAdminName AS RegAdminName, d.wAdminName AS UpdAdminName,
            fn_ccd_name(a.CsGroupCcd) AS CsGroupCcdName ,fn_ccd_name(a.CsCcd) AS CsCcdName,
            CASE a.IsSuccess WHEN \'Y\' THEN \'조치\' WHEN \'N\' THEN \'미조치\' END AS IsSuccessName
        ';

        $list = [];
        $count = $this->manageCsModel->list(true, $arr_condition);

        if ($count > 0) {
            $list = $this->manageCsModel->list(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CsIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function storeMemberCs()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'regi_memIdx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_group_cs_ccd', 'label' => '상담구분', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_cs_ccd', 'label' => '상담분류', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_is_success', 'label' => '조치여부', 'rules' => 'trim|required'],
            ['field' => 'regi_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('cs_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('cs_idx');
        }

        $result = $this->manageCsModel->{$method . 'MemberCs'}($this->_reqP(null, false), $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 상담/메모관리 : TM 상담관리
     */
    public function ajaxTm()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);
        $codes = $this->codeModel->getCcdInArray(['688','689']);

        $this->load->view('member/layer/board/tm', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            'ConsultCcd' => $codes['688'],
            'TmClassCcd' => $codes['689'],
            '_board_type' => 'tm'
        ]);
    }

    public function ajaxTmDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'B.MemIdx' => $this->_reqP('search_member_idx')
                ,'D.ConsultCcd' => $this->_reqP('_consult_search_ConsultCcd')
                ,'D.TmClassCcd' => $this->_reqP('_consult_search_TmClassCcd')
            ],

            'LKB' => [
                'D.TmContent' => $this->_reqP('_consult_search_value'),
            ],
        ];

        $order_by =  ['D.TcIdx'=>'desc'];

        $list = [];

        $count = $this->tmModel->listConsult(true,$arr_condition);
        if($count > 0) {
            $list = $this->tmModel->listConsult(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 상담/메모관리 : 교수학습 Q&A
     */
    public function ajaxProfQna()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);

        $this->load->view('member/layer/board/prof_qna', [
            'bm_idx' => '66',
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'profQna'
        ]);
    }

    public function ajaxProfQnaDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => '66',
                'LB.RegMemIdx' => $this->_reqP('search_member_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                    'LB.ReplyContent' => $this->_reqP('search_replay_value')
                ]
            ]
        ];

        if ($this->_req('search_chk_delete_value') == '1') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsStatus' => 'N']);
        }

        $sub_query_condition = [];
        if (empty($this->_reqP('search_category')) === false) {
            $sub_query_condition = [
                'EQ' => [
                    'subLBrC.IsStatus' => 'Y',
                    'subLBrC.CateCode' => $this->_reqP('search_category')
                ]
            ];
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.RegMemIdx, MEM.MemName AS RegMemName,
            LB.ReplyAdminIdx, LB.ReplyRegDatm,
            LB.typeCcd, LSC2.CcdName AS TypeCcdName,
            LB.SubjectIdx, PS.SubjectName,
            LB.ReplyStatusCcd, LSC3.CcdName AS ReplyStatusCcdName,
            ADMIN2.wAdminName as ReplyRegAdminName,
            LB.MdCateCode, MdSysCate.CateName as MdCateName,
            LB.ProfIdx, PROFESSOR.ProfNickName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard('qna',true, $arr_condition, $sub_query_condition, '');

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard('qna',false, $arr_condition, $sub_query_condition, '', $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 상담/메모관리 : 블랙컨슈머
     */
    public function ajaxBlackConsumer()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);

        $this->load->view('member/layer/board/black_consumer', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'blackConsumer'
        ]);
    }

    public function ajaxBlackConsumerDataTable()
    {
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $this->_reqP('search_member_idx')
            ]
        ];

        $column = '
            a.BcIdx, a.MemIdx, a.SiteCode, a.Content, a.IsStatus, a.RegAdminIdx, a.RegDatm, a.RegIp, a.UpdAdminIdx, a.UpdDatm,
            b.SiteName, c.wAdminName AS RegAdminName, d.wAdminName AS UpdAdminName
        ';

        $list = [];
        $count = $this->manageBlackConsumerModel->list(true, $arr_condition);

        if ($count > 0) {
            $list = $this->manageBlackConsumerModel->list(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['BcIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function storeBlackConsumer()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'regi_memIdx', 'label' => '회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('bc_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('bc_idx');
        }

        $result = $this->manageBlackConsumerModel->{$method . 'MemberBlackConsumer'}($this->_reqP(null, false), $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * CRM 관리 : SMS Tab
     */
    public function ajaxSms()
    {
        $memIdx = $this->_req('memIdx');

        $this->load->view('member/layer/crm/sms', [
            'memIdx' => $memIdx,
            '_crm_type' => 'sms',
            'arr_send_status_ccd_vals' => $this->_send_status_ccd
        ]);
    }

    /**
     * CRM 관리 : SMS Ajax
     * @return CI_Output
     */
    public function ajaxSmsDataTable()
    {
        $list = [];
        $memIdx = $this->_reqP('search_member_idx');

        $arr_condition = [
            'RAW' => [
                'a.MemIdx' => (empty($memIdx) === true) ? '\'\'' : $memIdx,
            ],
            'EQ' => [
                'b.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        $count = $this->smsModel->listSmsForMember(true, $arr_condition);
        if ($count > 0) {
            $list = $this->smsModel->listSmsForMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * CRM 관리 : Message Tab
     */
    public function ajaxMessage()
    {
        $memIdx = $this->_req('memIdx');

        $this->load->view('member/layer/crm/message', [
            'memIdx' => $memIdx,
            '_crm_type' => 'message',
            'arr_send_status_ccd_vals' => $this->_send_status_ccd
        ]);
    }

    /**
     * CRM 관리 : Message Ajax
     * @return CI_Output
     */
    public function ajaxMessageDataTable()
    {
        $list = [];
        $memIdx = $this->_req('search_member_idx');

        $arr_condition = [
            'RAW' => [
                'a.MemIdx' => (empty($memIdx) === true) ? '\'\'' : $memIdx,
            ],
            'EQ' => [
                'b.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        $count = $this->messageModel->listMessageForMember(true, $arr_condition);
        if ($count > 0) {
            $list = $this->messageModel->listMessageForMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * CRM 관리 : Mail Tab
     */
    public function ajaxMail()
    {
        $memIdx = $this->_req('memIdx');

        $this->load->view('member/layer/crm/mail', [
            'memIdx' => $memIdx,
            '_crm_type' => 'mail',
            'arr_send_status_ccd_vals' => $this->_send_status_ccd
        ]);
    }

    /**
     * CRM 관리 : Mail Ajax
     * @return CI_Output
     */
    public function ajaxMailDataTable()
    {
        $list = [];
        $memIdx = $this->_req('search_member_idx');

        $arr_condition = [
            'RAW' => [
                'a.MemIdx' => (empty($memIdx) === true) ? '\'\'' : $memIdx,
            ],
            'EQ' => [
                'b.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        $count = $this->mailModel->listMailForMember(true, $arr_condition);
        if ($count > 0) {
            $list = $this->mailModel->listMailForMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 상담/메모관리 서브탭별 조회수
     * @param $memIdx
     * @return array
     */
    private function _arrBoardForMemberCnt($memIdx)
    {
        $data = [];
        $arr_condition = [
            'EQ' => [
                'RegMemIdx' => $memIdx,
                'IsStatus' => 'Y',
                'ReplyStatusCcd' => '621001'    //미답변
            ]
        ];

        //상담게시판 미답변
        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['BmIdx' => '48']]);
        $arr_unAnswered = $this->boardModel->getUnAnswerArray($arr_condition);

        //교수학습Q&A 미답변
        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['BmIdx' => '66']]);
        $arr_unAnswered_prof = $this->boardModel->getUnAnswerArray($arr_condition);

        //TM상담관리 수
        $arr_condition = ['EQ' => ['B.MemIdx' => $memIdx]];
        $tm_count = $this->tmModel->listConsult(true,$arr_condition);

        //CS상담관리 수
        $arr_condition = ['EQ' => ['a.MemIdx' => $memIdx, 'a.IsStatus' => 'Y']];
        $cs_count = $this->manageCsModel->list(true, $arr_condition);

        //블랙컨슈머관리 수
        $arr_condition = ['EQ' => ['a.MemIdx' => $memIdx, 'a.IsStatus' => 'Y']];
        $bc_count = $this->manageBlackConsumerModel->list(true, $arr_condition);

        $data['unAnswered'] = (empty($arr_unAnswered) === true) ? 0 : $arr_unAnswered['all'];
        $data['cs'] = $cs_count;
        $data['tm'] = $tm_count;
        $data['profQna'] = (empty($arr_unAnswered_prof) === true) ? 0 : $arr_unAnswered_prof['all'];
        $data['blackConsumer'] = $bc_count;

        return $data;
    }


    /**
     * 강좌 첨부파일 다운로드
     * @param array $params
     */
    public function download($params = [])
    {
        // 강좌정보 읽어오기
        $orderidx = $params[0];
        $prodcode = $params[1];
        $prodcodesub = $params[2];
        $lecidx = $params[3];
        $unitidx = $params[4];

        // 커리큘럼 읽어오기
        $curriculum = $this->manageLectureModel->getCurriculum([
            'EQ' => [
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lecidx,
                'wUnitIdx' => $unitidx
            ]
        ]);

        if(empty($curriculum) == true){
            show_alert('회차정보가 존재하지 않습니다.', 'back');
        }

        $curriculum = $curriculum[0];

        $filepath = str_replace( '//', '/', $curriculum['wAttachPath'] .'/'. $curriculum['wUnitAttachFile']);
        $filename = $curriculum['wUnitAttachFileReal'];

        if(is_file(public_to_upload_path($filepath)) == false){
            show_alert('파일이 존재하지 않습니다.', 'back');
        }

        // 실제로 파일 다운로드 처리
        public_download($filepath, $filename);
    }


    /**
     * 인쇄용 진도율 변경
     * @return CI_Output
     */
    public function setRate()
    {
        $memidx = $this->_req('memidx');
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $rate = $this->_req('rate');

        if(is_numeric($rate) == false){
            return $this->json_error('진도율은 0~100 사이의 숫자로 입력해주십시요.'.$rate);
        }

        if($rate < 0) {
            $rate = 0;
        } else if($rate > 100) {
            $rate = 100;
        }

        if($this->manageLectureModel->setRate([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'Rate' => $rate
            ]) == false){
            return $this->json_error('진도율 변경에 실패했습니다.');
        }

        return $this->json_result(true, '진도율이 변경되었습니다.');
    }


    /**
     * 배수시간 변경 레이어
     */
    public function layerSetTime()
    {
        $memidx = $this->_req('m');
        $orderidx = $this->_req('o');
        $orderprodidx = $this->_req('op');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('ps');
        $wlecidx = $this->_req('l');
        $wunitidx = $this->_req('u');

        $param = array_merge($this->_reqG(null), $this->_reqP(null));

        $cond  = [
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'OrderProdIdx' => $orderprodidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $wlecidx,
                'wUnitIdx' => $wunitidx
            ]
        ];

        $log = $this->manageLectureModel->getTimeLog($cond);

        $curriculum = $this->manageLectureModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $wlecidx,
                'wUnitIdx' => $wunitidx
            ]
        ]);

        $curriculum = $curriculum[0];


        $this->load->view('member/layer/lecture/time_modal', [
            'log' => $log,
            'curriculum' => $curriculum,
            'param' => $param
        ]);
    }


    /**
     * 배수시간 변경
     */
    public function setTime()
    {
        $memidx = $this->_req('m');
        $orderidx = $this->_req('o');
        $orderprodidx = $this->_req('op');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('ps');
        $wlecidx = $this->_req('l');
        $wunitidx = $this->_req('u');
        $addm = $this->_req('addminutes');
        $memo = $this->_req('addmemo');

        if(is_numeric($memidx) == false ||
            is_numeric($orderidx) == false ||
            is_numeric($orderprodidx) == false ||
            is_numeric($prodcode) == false ||
            is_numeric($prodcodesub) == false ||
            is_numeric($wlecidx) == false ||
            is_numeric($wunitidx) == false ||
            is_numeric($addm) == false
        ){
            return $this->json_error('데이터가 정확하지 않습니다.');
        }

        $curriculum = $this->manageLectureModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $wlecidx,
                'wUnitIdx' => $wunitidx
            ]
        ]);

        if(count($curriculum) != 1){
            return $this->json_error('강좌정보가 없습니다.');
        }

        if($this->manageLectureModel->addTime([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'OrderProdIdx' => $orderprodidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $wlecidx,
                'wUnitIdx' => $wunitidx,
                'addTime' => $addm,
                'memo' => $memo
            ]) == true){
            return $this->json_result(true, $addm.'분이 추가되었습니다.');
        } else {
            return $this->json_error('시간추가에 실패했습니다.');
        }

    }


    /**
     * 성별 변경
     */
    public function chg_sex()
    {
        $memidx = $this->_req('m');

        if(empty($memidx) == true){
            return $this->json_error('회원번호가 정확하지않습니다.');
        }

        $data = $this->manageMemberModel->getMember($memidx);

        if(empty($data) == true){
            return $this->json_error('회원번호가 정확하지않습니다.');
        }

        // 성별을 반대로
        $sex = ($data['Sex'] == 'F') ? 'M' : 'F';

        //
        if($this->manageMemberModel->setMemberSex($memidx, $sex) == false){
            return $this->json_error('회원성별 전환에 실패했습니다.');
        }

        $this->json_result(true, '회원성별을 변경했습니다.');
    }


    /**
     * 휴면회원 해제
     */
    public function sleep_cancel()
    {
        $memidx = $this->_req('m');

        if(empty($memidx) == true){
            return $this->json_error('회원번호가 정확하지않습니다.');
        }

        $data = $this->manageMemberModel->getMember($memidx);

        if(empty($data) == true){
            return $this->json_error('회원번호가 정확하지않습니다.');
        }

        if($data['IsStatus'] != 'D'){
            return $this->json_error('휴면회원이 아닙니다.');
        }

        //
        if($this->manageMemberModel->setNormalStatus($memidx) == false){
            return $this->json_error('휴면해제에 실패했습니다.');
        }

        $this->json_result(true, '휴면상태를 해제했습니다.');
    }
}