<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'siteF', 'downloadF', 'memberF', '/support/supportBoardF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_onoff_type = '';
    protected $_page_url = '';
    protected $_view_url = '';
    
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기본정보셋팅
     * @param $type
     * @param $page_url
     * @param $view_url
     */
    private function setDefaultData($type, $page_url, $view_url)
    {
        $this->_onoff_type = $type;
        $this->_page_url = $page_url;
        $this->_view_url = $view_url;
    }

    /**
     * 기본정보받기
     * @param $target_data
     * @return mixed
     */
    private function getDefaultData($target_data)
    {
        return $this->$target_data;
    }

    /**
     * 이벤트 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if (empty($this->_is_pass_site) === true) {
            $onoff_type = $params['pattern'];
            $page_url = '/event/list/cate/'.$params['cate'].'/pattern/'.$onoff_type;
            $view_url = '/event/show/cate/'.$params['cate'].'/pattern/'.$onoff_type;
        } else {
            $onoff_type = $params[0];
            $page_url = '/event/list/'.$onoff_type;
            $view_url = '/event/show/'.$onoff_type;
        }

        if (empty($onoff_type) === true) {
            show_alert('잘못된 접근 입니다.', '/');
        }
        $this->setDefaultData($onoff_type, $page_url, $view_url);

        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $this->ongoing();
                break;

            case 'end': // 종료 이벤트
                $this->end();
                break;

            default:
                show_alert('잘못된 접근 입니다.', '/');
                break;
        }
    }

    /**
     * 이벤트 뷰 페이지
     * @param array $params
     */
    public function show($params = [])
    {
        $method = 'POST';
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);

        $result = $this->eventFModel->modifyEventRead(element('event_idx', $arr_input));
        if($result !== true) {
            show_alert('이벤트 조회시 오류가 발생되었습니다.', '/');
        }

        //학원,온라인 경로 셋팅
        if (empty($this->_is_pass_site) === true) {
            $onoff_type = $params['pattern'];
            $page_url = '/event/list/cate/'.$params['cate'].'/pattern/'.$onoff_type;
            $frame_params = 'cate_code='.$params['cate'].'&event_idx='.element('event_idx', $arr_input).'&pattern='.$onoff_type;
        } else {
            $onoff_type = $params[0];
            $page_url = '/event/list/'.$onoff_type;
            $frame_params = 'cate_code=&event_idx='.element('event_idx', $arr_input).'&pattern='.$onoff_type;
        }

        if (empty($onoff_type) === true) {
            show_alert('잘못된 접근 입니다.', '/');
        }

        $default_condition = [
            'EQ'=>[
                'A.ElIdx' => element('event_idx', $arr_input),
                'A.IsStatus' => 'Y'
            ]
        ];

        $arr_condition = [];
        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $arr_condition = array_merge($default_condition, [
                    'GTE' => [
                        'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                    ]
                ]);
                break;

            case 'end': // 종료 이벤트
                $arr_condition = array_merge($default_condition, [
                    'ORG2' => [
                        'EQ' => [
                            'A.IsRegister' => 'N',
                        ],
                        'LTE' => [
                            'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                        ]
                    ]
                ]);
                break;

            default:
                show_alert('잘못된 접근 입니다.', '/');
                break;
        }

        //이벤트 기본정보 조회
        $data = $this->eventFModel->findEvent($arr_condition);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', front_url($page_url), false);
        }
        $frame_params .= '&take_type='.$data['TakeType'];   //댓글 등록타입

        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        //이벤트 파일 기본 검색 조건
        $arr_condition_file = [
            'EQ' => [
                'ElIdx' => element('event_idx', $arr_input),
                'IsUse' => 'Y'
            ]
        ];

        //이벤트 내용관련 파일
        $arr_condition_file_C = array_merge_recursive($arr_condition_file,[
            'EQ' => [ 'FileType' => 'C' ]
        ]);
        $arr_base['file_C'] = $this->eventFModel->findAttachData($arr_condition_file_C);

        //이벤트 첨부파일
        $arr_condition_file_F = array_merge_recursive($arr_condition_file,[
            'EQ' => [ 'FileType' => 'F' ]
        ]);
        $arr_base['file_F'] = $this->eventFModel->findAttachData($arr_condition_file_F);

        //이벤트 신청리스트 조회
        $arr_register_data = $this->eventFModel->listEventForRegister($default_condition);
        $arr_base['register_list'] = $arr_register_data;

        $register_create_type = $this->_createRegisterChk(count($arr_register_data), $arr_input, $data, $onoff_type);

        $arr_base['page_url'] = $page_url;
        $arr_base['onoff_type'] = $onoff_type;
        $arr_base['content_type'] = $this->eventFModel->_content_type;
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['register_limit_type'] = $this->eventFModel->_register_limit_type;
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;
        $arr_base['register_create_type'] = $register_create_type;

        $this->load->view('site/event/show',[
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'frame_params' => $frame_params,
            'data' => $data,
            'method' => $method
        ]);
    }

    /**
     * 뷰페이지 > 댓글리스트
     */
    public function frameCommentList()
    {
        $list = [];
        $method = 'POST';
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 'cate_code=' . element('cate_code', $arr_input) . '&event_idx=' . element('event_idx', $arr_input) . '&pattern=' . element('pattern', $arr_input) . '&take_type=' . element('take_type', $arr_input, '1');
        $onoff_type = element('pattern', $arr_input);

        $comment_create_type = '1';
        if ($onoff_type == 'ongoing') {
            if (element('take_type', $arr_input) == 1) {
                if ($this->session->userdata('is_login') === false) {
                    $comment_create_type = '2';
                }
            } else {
                $comment_create_type = '1';
            }
        } else {
            $comment_create_type = '3';
        }

        $arr_base['page_url'] = '/event/frameCommentList';
        $arr_base['comment_create_type'] = $comment_create_type;

        $arr_condition_notice = [
            'EQ' => [
                'a.ElIdx' => element('event_idx', $arr_input),
                'a.BmIdx' => $this->eventFModel->_bm_idx,
                'a.IsStatus' => 'Y',
                'a.RegType' => '1',
                'a.SiteCode' => $this->_site_code,
                'b.CateCode' => element('cate_code', $arr_input),
            ]
        ];

        $arr_condition_event_comment = [
            'EQ' => [
                'a.ElIdx' => element('event_idx', $arr_input),
                'a.IsStatus' => 'Y',
                'b.SiteCode' => $this->_site_code,
                'c.CateCode' => element('cate_code', $arr_input),
            ]
        ];

        $total_rows = $this->eventFModel->listEventForComment(true, $arr_condition_notice, $arr_condition_event_comment);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, 20, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listEventForComment(false, $arr_condition_notice, $arr_condition_event_comment, $paging['limit'], $paging['offset']);
        }

        $this->load->view('site/event/frame_comment_list',[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'list' => $list,
            'paging' => $paging,
            'method' => $method
        ]);
    }

    /**
     * 특강 신청 처리
     */
    public function registerStore()
    {
        // 프로모션일 경우 검증 데이터가 유동적이므로 해당 값으로 데이터 검증
        $target_params = $this->_reqP('target_params');
        $target_param_names = $this->_reqP('target_param_names');
        $target_params_item = $this->_reqP('target_params_item');
        $register_type = ($this->_reqP('register_type') == 'promotion') ? 'promotion' : 'event';
        $file_chk = $this->_reqP('file_chk');   //첨부파일 체크 유무

        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'register_chk[]', 'label' => '특강', 'rules' => 'trim|required|integer'],
            ['field' => 'register_name', 'label' => '이름', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'register_tel', 'label' => '휴대폰번호', 'rules' => 'trim|required|integer|max_length[11]']
        ];

        if ($register_type == 'event') {
            $rules = array_merge($rules, [
                ['field' => 'register_email', 'label' => '이메일', 'rules' => 'trim|required|max_length[30]']
            ]);
        }

        if ($file_chk == 'Y') {
            $rules = array_merge($rules, [
                ['field' => 'attach_file', 'label' => '첨부파일', 'rules' => 'callback_validateFileRequired[attach_file]']
            ]);
        }

        if (empty($target_params) === false && is_array($target_params) === true) {
            foreach ($target_params as $key => $target_param) {
                if(empty($target_params_item[$key]) === true || $target_params_item[$key] == 'true') {
                    $rules = array_merge($rules, [
                        ['field' => $target_param, 'label' => (empty($target_param_names) === false && empty($target_param_names[$key]) === false) ? $target_param_names[$key] : '데이타', 'rules' => 'trim|required']
                    ]);
                }
            }
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->addEventRegisterMember($this->_reqP(null, false), $this->_site_code, $register_type);
        $this->json_result($result, '신청되었습니다.', $result);
    }

    /**
     * 단일 첨부파일 수정
     */
    public function registerStoreForModifyFile()
    {
        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'register_chk[]', 'label' => '특강', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->modifyRegisterMemberForFile($this->_reqP(null, false));
        $this->json_result($result, '수정되었습니다.', $result);
    }

    /**
     * 댓글 등록 처리
     */
    public function commentStore()
    {
        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'event_comment', 'label' => '댓글', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->addEventComment($this->_reqP(null, false));
        $this->json_result($result, '등록되었습니다.', $result);
    }

    /**
     * 댓글 삭제 처리
     * @param array $params
     */
    public function commentDel($params = [])
    {
        $comment_idx = $params[0];
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($comment_idx) === true) {
            $result = false;
        } else {
            $result = $this->eventFModel->delEventComment($comment_idx);
        }
        $this->json_result($result, '삭제되었습니다.', $result);
    }

    /**
     * 이벤트용 공지사항 레이어팝업 [뷰페이지]
     */
    public function popupNoticeShow()
    {
        $arr_input = array_merge($this->_reqG(null));
        $board_idx = element('board_idx', $arr_input);

        if (empty($board_idx) === true) {
            show_alert('잘못된 접근입니다.', '/');
        }

        $data = $this->eventFModel->findEventForNotice($board_idx);
        if (empty($data) === true) {
            show_alert('잘못된 접근입니다.', '/');
        }

        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', '/');
        }

        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        $this->load->view('site/event/popup_show_notice',[
            'arr_input' => $arr_input,
            'data' => $data
        ]);
    }

    /**
     * 신청 팝업 페이지 [배너호출용]
     */
    public function popupRegistCreateByBanner()
    {
        $method = 'POST';
        $arr_input = array_merge($this->_reqG(null));

        $arr_condition = [
            'EQ'=>[
                'A.BIdx' => element('banner_idx', $arr_input),
                'A.IsRegister' => 'Y',
                'A.IsUse' => 'Y',
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
            ],
            'GTE' => [
                'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
            ]
        ];

        $data = $this->eventFModel->findEvent($arr_condition);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', '/', false);
        }
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        //이벤트 신청리스트 조회
        $arr_condition = [
            'EQ'=>[
                'A.ElIdx' => $data['ElIdx'],
                'A.IsStatus' => 'Y'
            ]
        ];
        $arr_register_data = $this->eventFModel->listEventForRegister($arr_condition);
        if (empty($arr_register_data) === true ) {
            show_alert('잘못된 설정값이 존재합니다. 관리자에게 문의해 주세요.', '/', false);
        }

        $arr_base['register_list'] = $arr_register_data;
        $register_create_type = $this->_createRegisterChk(count($arr_register_data), $arr_input, $data, 'ongoing');
        $arr_base['register_create_type'] = $register_create_type;

        $comment_create_type = '1';
        if ($this->session->userdata('is_login') === false) {
            $comment_create_type = '2';
        }
        $arr_base['comment_create_type'] = $comment_create_type;
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;

        $this->load->view('site/event/popup_create_regist',[
            'data' => $data,
            'arr_base' => $arr_base,
            'method' => $method
        ]);
    }

    /**
     * 이벤트 첨부파일 다운로드
     */
    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'event');
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    public function registerStoreForCheckMember()
    {
        $start_date = $this->_reqG('start_date');
        $end_date = $this->_reqG('end_date');

        $data = $this->memberFModel->getMemberForJoinDate($this->session->userdata('mem_idx'), $start_date, $end_date);
        if (empty($data) === true) {
            $result = false;
        } else {
            $result = true;
        }
        $this->json_result(true, '정상.', '',$result);
    }

    /**
     * 진행중이벤트 인덱스
     */
    private function ongoing()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input));

        $arr_base['request_type'] = $this->eventFModel->_request_type;

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getDefaultData('_onoff_type');

        //기본경로셋팅
        $arr_base['page_url'] = $this->getDefaultData('_page_url');
        $arr_base['view_url'] = $this->getDefaultData('_view_url');

        //캠퍼스조회
        $arr_base['campus'] = ($this->_is_pass_site === true) ? $this->siteFModel->getSiteCampusArray($this->_site_code) : [];

        $arr_condition = [
            'EQ' => [
                'A.IsRegister' => 'Y',
                'A.IsUse' => 'Y',
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
                'A.RequestType' => element('s_request_type', $arr_input),
                'A.CampusCcd' => element('s_campus', $arr_input)
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => element('s_keyword', $arr_input)
                ]
            ],
            'GTE' => [
                'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y',
                'B.CateCode' => $this->_cate_code
            ]
        ];

        $total_rows = $this->eventFModel->listAllEvent(true, $arr_condition, $sub_query_condition);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $arr_condition, $sub_query_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    /**
     * 종료된이벤트 인덱스
     */
    private function end()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input));

        $arr_base['request_type'] = $this->eventFModel->_request_type;

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getDefaultData('_onoff_type');

        //기본경로셋팅
        $arr_base['page_url'] = $this->getDefaultData('_page_url');
        $arr_base['view_url'] = $this->getDefaultData('_view_url');

        //캠퍼스조회
        $arr_base['campus'] = ($this->_is_pass_site === true) ? $this->siteFModel->getSiteCampusArray($this->_site_code) : [];

        $arr_condition = [
            'EQ' => [
                'A.IsUse' => 'Y',
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
                'A.RequestType' => element('s_request_type', $arr_input),
                'A.CampusCcd' => element('s_campus', $arr_input)
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => element('s_keyword', $arr_input)
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'A.IsRegister' => 'N',
                ],
                'LTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y',
                'B.CateCode' => $this->_cate_code
            ]
        ];

        $total_rows = $this->eventFModel->listAllEvent(true, $arr_condition, $sub_query_condition);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $arr_condition, $sub_query_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    /**
     * 회원 신청 상태 체크
     * @param $register_count
     * @param $arr_input
     * @param $data
     * @param $onoff_type
     * @return int|string   1:신청가능, 2:로그인, 3:신청완료, 4:만료
     */
    private function _createRegisterChk($register_count, $arr_input, $data, $onoff_type)
    {
        $return_type = 1;
        if ($onoff_type == 'ongoing') {
            switch ($data['TakeType']) {
                case "1":   //회원
                    if (empty($this->session->userdata('mem_idx')) === true) {
                        //비로그인 상태
                        $return_type = '2';
                    } else {
                        //로그인상태
                        $m_count = $this->eventFModel->getMemberForRegisterCount(element('event_idx', $arr_input), ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx')]]);
                        if ($m_count < $register_count) {
                            $return_type = '1';     //신청리스트 1개 이상 남았을 경우
                        } else {
                            $return_type = '3';     //회원이 신청한 수가 많을 경우
                        }
                    }
                    break;
                case "2":   //회원 + 비회원
                    if (empty($this->session->userdata('mem_idx')) === true) {
                        //비로그인 상태
                        $return_type = '1';
                    } else {
                        //로그인상태
                        $m_count = $this->eventFModel->getMemberForRegisterCount(element('event_idx', $arr_input), ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx')]]);
                        if ($m_count < $register_count) {
                            $return_type = '1';     //신청리스트 1개 이상 남았을 경우
                        } else {
                            $return_type = '3';     //회원이 신청한 수가 많을 경우
                        }
                    }
                    break;
            }
        } else {
            $return_type = '4';
        }

        return $return_type;
    }
}