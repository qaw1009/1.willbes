<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends \app\controllers\BaseController
{
    protected $models = array('member/manageMember','sys/code', 'pay/orderList','service/couponRegist','service/point',
        'board/board', 'crm/tm/tm', 'member/manageCs', 'member/manageBlackConsumer', 'member/manageLecture');

    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];

    // 강의형태 단과/사용자패키지/운영자패키지/무료
    protected $_LearnPatternCcd_dan = ['615001','615002'];
    protected $_LearnPatternCcd_free = ['615005'];
    protected $_LearnPatternCcd_pkg = ['615003'];

    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
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
                'Mem.IsChange' => $this->_reqP('IsChange'), // 회원통합 여부
                'Info.SmsRcvStatus' => $this->_reqP('SmsRcv'), // sms 수신여부
                'Info.MailRcvStatus' => $this->_reqP('MailRcv'), // 메일 수신여부
                'Mem.IsBlackList' => $this->_reqp('IsBlackList') // 블랙리스트 여부
            ]
        ];

        // 최신 가입순으로
        $orderby = [
            'Mem.MemIdx' => 'DESC'
        ];

        // 날짜검색 쿼리생성
        $search_condition = $this->_reqP('search_condition');
        $search_sdate = $this->_reqP('search_start_date');
        $search_edate = $this->_reqP('search_end_date');
        if($search_sdate != '' && $search_edate != ''){
            switch($search_condition){
                case 'joindate':
                    $arr_condition += [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ];
                    break;

                case 'lastlogin':
                    $arr_condition += [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ];
                    break;

                case 'lastmodify':
                    $arr_condition += [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ];
                    break;

                case 'lastchgpwd':
                    $arr_condition += [
                        'BDT' => [
                            'Mem.JoinDate' => [$search_sdate, $search_edate]
                        ]
                    ];
                    break;

                case 'outdate':
                    $inQuery .= "
                    INNER JOIN (
                        SELECT memIdx FROM lms_Member_Out_Log 
                        WHERE OutDatm >= '{$search_sdate} 00:00:00' AND OutDatm <= '{$search_edate} 23:59:59'
                    ) AS tempA ON tempA.memIdx = Mem.MemIdx ";
                    break;
            }
        }

        // 탈퇴회원쿼리
        if($this->_reqP('IsOut') == 'Y' && $search_condition != 'outdate'){
            $inQuery .= "
            INNER JOIN lms_Member_Out_Log AS outMem2 ON outMem2.memIdx = Mem.memIdx ";
        }

        // 비번 6개월이상 미변경 회원
        if($this->_reqP('NoChangePwd') == 'Y'){
            $arr_condition += [
                'LTE' => ['Mem.LastPassModyDatm' => date("Y-m-d H:m:s", strtotime("-6 month"))]
            ];
        }

        // 휴면회원 1년이상 미로그인 회원
        if($this->_reqP('IsSleep') == 'Y'){
            $arr_condition += [
                'LTE' => ['Mem.LastLoginDatm' => '']
            ];
        }

        // 기기등록회원
        if($this->_reqP('IsRegDevice') == 'Y' ){
            //$inQuery .= "
            //INNER JOIN lms_Member_Out_Log AS outMem2 ON outMem2.memIdx = Mem.memIdx ";
        }

        // 갯수 구해오기
        $count = $this->manageMemberModel->list(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby, $inQuery);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->manageMemberModel->list(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby, $inQuery);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
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
            $UpdTypeCcd = "656004"; //회원정보수정
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
            $leclist = $this->manageLectureModel->getPackage($cond_arr);

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

        if($start_date < $today){
            return $this->json_error('시작일은 오늘 이후 날짜만 가능합니다.');
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
            $leclist = $this->manageLectureModel->getLecture(false,array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->manageLectureModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

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

    public function extend()
    {

    }

    public function setExtend()
    {

    }


    public function pause()
    {

    }

    public function setPause()
    {

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

        $userpkg = [];

        $pkg = [];

        $pass = [];

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

        $admin = [];

        $offdan = $this->manageLectureModel->getLecture(false, [
            'EQ' => [
                'MemIdx' => $memIdx,
                'LearnPatternCcd' => '615001'
            ]
        ], true);

        $offpkg = [];

        $this->load->view('member/layer/lecture/list', [
            'memIdx' => $memIdx,
            'search_value' => $search_value,
            'dan' => $dan,
            'userpkg' => $userpkg,
            'pkg' => $pkg,
            'pass' => $pass,
            'free' => $free,
            'admin' =>$admin,
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

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.MdCateCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
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

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LB.CampusCcd, LBC.CateCode,
            LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.IsPublic, LB.IsStatus,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
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

    public function ajaxCRM()
    {

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
        $arr_unAnswered = $this->boardModel->getUnAnserArray($arr_condition);

        //교수학습Q&A 미답변
        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['BmIdx' => '66']]);
        $arr_unAnswered_prof = $this->boardModel->getUnAnserArray($arr_condition);

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


    public function download($params = [])
    {
        // 강좌정보 읽어오기
        $prodcode = $params[0];
        $prodcodesub = $params[1];
        $lecidx = $params[2];
        $unitidx = $params[3];

        // 커리큘럼 읽어오기
        $curriculum = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $unitidx
            ]
        ]);

        if(empty($curriculum) == true){
            show_alert('회차정보가 존재하지 않습니다.', 'back');
        }

        $curriculum = $curriculum[0];

        $filepath = $curriculum['wAttachPath'] . $curriculum['wUnitAttachFile'];
        $filename = $curriculum['wUnitAttachFileReal'];

        if(is_file(public_to_upload_path($filepath)) == false){
            show_alert('파일이 존재하지 않습니다.', 'back');
        }

        // 파일 다운로드 로그남기기
        $this->classroomFModel->storeDownloadLog(
            [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lecidx,
                'wUnitIdx' => $unitidx
            ]
        );

        // 실제로 파일 다운로드 처리
        public_download($filepath, $filename);
    }

}