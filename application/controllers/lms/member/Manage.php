<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends \app\controllers\BaseController
{
    protected $models = array('member/member');
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
        $search_value_enc = $this->memberModel->getEncString($search_value); // 검색어 암호화
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
                    'Info.MailEnc' => $search_value_enc // 암호화된 이메일
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
        if($this->_reqP('NOChangePwd') == 'Y'){
            $arr_condition += [
                'LTE' => ['Mem.JoinDate' => '' ]
            ];
        }

        // 휴면회원 1년이상 미로그인 회원
        if($this->_reqP('IsSleep') == 'Y'){
            $arr_condition += [
                'LTE' => ['Mem.JoinDate' => '' ]
            ];
        }

        // 갯수 구해오기
        $count = $this->memberModel->list(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby, $inQuery);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->memberModel->list(false, $arr_condition,
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
                $data = $this->memberModel->detail($memIdx);
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
                $data = $this->memberModel->detail($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/log/login_pop', [
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
        $count = $this->memberModel->loginlogList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->memberModel->loginlogList(false, $arr_condition,
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
                $data = $this->memberModel->detail($memIdx);
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

        $this->load->view('member/log/info_pop', [
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
        $count = $this->memberModel->infologList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->memberModel->infologList(false, $arr_condition,
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
                $data = $this->memberModel->detail($memIdx);
            } else {
                show_error('파라미터가 정확하기 않습니다.');
            }
        } else {
            show_error('파라미터가 정확하기 않습니다.');
        }

        if(empty($data) == true){
            show_error('회원검색에 실패했습니다.');
        }

        $this->load->view('member/log/device_pop', [
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
        $count = $this->memberModel->deviceList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $list = $this->memberModel->deviceList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
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
                $data = $this->memberModel->detail($memIdx);
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
        $count = $this->memberModel->infologList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        // 갯수가 1개 이상일 경우 데이타 구해오기
        if($count > 0){
            $cdata = $this->memberModel->infologList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }

        $this->load->view('member/log/chgName_pop', [
            'data' => $data,
            'cdata' => $cdata
        ]);
    }
}