<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends \app\controllers\BaseController
{
    protected $models = array('member/manageMember','sys/code', 'pay/orderList','service/couponRegist','service/point', 'board/board','member/manageLecture');

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

        $free = [];

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
                'LB.RegMemIdx' => $memIdx = $this->_reqP('search_member_idx')
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

        $this->load->view('member/layer/board/counsel', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'cs'
        ]);
    }

    /**
     * 상담/메모관리 : TM 상담관리
     */
    public function ajaxTm()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);

        $this->load->view('member/layer/board/counsel', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'tm'
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
                'LB.RegMemIdx' => $memIdx = $this->_reqP('search_member_idx')
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
    public function ajaxConsumer()
    {
        $memIdx = $this->_req('memIdx');
        $tabs_data = $this->_arrBoardForMemberCnt($memIdx);

        $this->load->view('member/layer/board/counsel', [
            'memIdx' => $memIdx,
            'tabs_data' => $tabs_data,
            '_board_type' => 'consumer'
        ]);
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

        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['BmIdx' => '48']]);
        $arr_unAnswered = $this->boardModel->getUnAnserArray($arr_condition);

        $arr_condition = array_replace_recursive($arr_condition, ['EQ' => ['BmIdx' => '66']]);
        $arr_unAnswered_prof = $this->boardModel->getUnAnserArray($arr_condition);

        $data['unAnswered'] = (empty($arr_unAnswered) === true) ? 0 : $arr_unAnswered['all'];
        $data['cs'] = '0';
        $data['tm'] = '0';
        $data['profQna'] = (empty($arr_unAnswered_prof) === true) ? 0 : $arr_unAnswered_prof['all'];
        $data['consumer'] = '0';

        return $data;
    }

}