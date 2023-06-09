<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'siteF', 'downloadF', 'memberF', '/support/supportBoardF');
    protected $helpers = array('download');
    protected $auth_controller = array('deleteRegister','deleteAllRegister');
    protected $auth_methods = array();
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
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
        if (empty($params['cate']) === false) {
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

        $file_type = '';
        if(strpos($onoff_type, '_v') !== false){
            $file_type = '_' . explode('_', $onoff_type)[1];
        }

        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
            case 'ongoing_v2':
                $this->ongoing($file_type);
                break;

            case 'end': // 종료 이벤트
            case 'end_v2':
                $this->end($file_type);
                break;

            case 'all':
                $this->all();
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
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input))  . '&s_event_type=' . element('s_event_type', $arr_input);
        $file_type = '';

        $result = $this->eventFModel->modifyEventRead(element('event_idx', $arr_input));
        if($result !== true) {
            show_alert('이벤트 조회시 오류가 발생되었습니다.', '/');
        }

        //학원,온라인 경로 셋팅
        if (empty($params['cate']) === false) {
            $onoff_type = $this->_getOnOffType($params['pattern'], element('event_idx', $arr_input));
            $page_url = '/event/list/cate/'.$params['cate'].'/pattern/'.$params['pattern'];
            $frame_params = 'cate_code='.$params['cate'].'&event_idx='.element('event_idx', $arr_input).'&pattern='.$onoff_type;
        } else {
            $onoff_type = $this->_getOnOffType($params[0], element('event_idx', $arr_input));
            $page_url = '/event/list/'.$params[0];
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
            case 'ongoing_v2':
                $arr_condition = array_merge($default_condition, [
                    'GTE' => [
                        'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                    ]
                ]);
                break;

            case 'end': // 종료 이벤트
            case 'end_v2':
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

        if(strpos($onoff_type, '_v') !== false){
            $file_type = '_' . explode('_', $onoff_type)[1];
        }

        $arr_base['page_url'] = $page_url;
        $arr_base['onoff_type'] = $onoff_type;
        $arr_base['content_type'] = $this->eventFModel->_content_type;
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['register_limit_type'] = $this->eventFModel->_register_limit_type;
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;
        $arr_base['register_create_type'] = $register_create_type;

        $this->load->view('site/event/show' . $file_type,[
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'frame_params' => $frame_params,
            'data' => $data,
            'method' => $method,
            'get_page_params' => $get_page_params
        ]);
    }

    /**
     * 이벤트 진행상태 조회
     * @param null $pattern
     * @param null $event_idx
     */
    private function _getOnOffType($pattern = null, $event_idx = null)
    {
        if($pattern == 'all'){
            $arr_condition = [
                'EQ'=>[
                    'A.ElIdx' => $event_idx,
                    'A.IsStatus' => 'Y'
                ]
            ];
            $data = $this->eventFModel->findEvent($arr_condition);

            // 진행중 이벤트 여부 확인 후 분기
            if (empty($data) === false) {
                if($data['IsRegister'] == 'Y' && $data['RegisterEndDate'] > date('Y-m-d H:i:s')){
                    $pattern = 'ongoing_v2';
                }else{
                    $pattern = 'end_v2';
                }
            }
        }

        return $pattern;
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
        if (in_array($onoff_type, ['ongoing', 'ongoing_v2']) === true) {
            if (element('take_type', $arr_input) == 1) {
                if ($this->session->userdata('is_login') !== true) {
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
                'a.SiteCode' => $this->_site_code
            ]
        ];

        $arr_condition_event_comment = [
            'EQ' => [
                'a.ElIdx' => element('event_idx', $arr_input),
                'a.IsStatus' => 'Y',
                'b.SiteCode' => $this->_site_code
            ]
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->eventFModel->listEventForComment(true, $arr_condition_notice, $arr_condition_event_comment);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, 20, $paging_count, true);

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
        $file_chk2 = $this->_reqP('file_chk2'); //첨부파일2 체크 유무
        $el_idx = (int)$this->_req('event_code');   //이벤트식별자
        $comment_chk_yn = $this->_req('comment_chk_yn');    //댓글참여 확인 여부
        $ssn_type = $this->_req('ssn_type');    //상품권지급 프로모션 여부
        $ret_msg = (empty($this->_reqP('ret_msg')) === false ? $this->_reqP('ret_msg') : '신청 되었습니다.');

        // 댓글 참여 여부 확인
        if(empty($comment_chk_yn) === false && $comment_chk_yn == 'Y') {
            $arr_condition = [
                'EQ' => [
                    'a.MemIdx' => $this->session->userdata('mem_idx'),
                    'a.ElIdx' => $el_idx,
                    'a.IsStatus' => 'Y',
                    'a.IsUse' => 'Y'
                ]
            ];

            $comment_result = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, 1, 0, ['a.CIdx' => 'DESC']);
            if (empty($comment_result) === true) {
                return $this->json_error('소문내기 댓글을 등록해 주세요.');
            }
        }

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

        if ($file_chk2 == 'Y') {
            $rules = array_merge($rules, [
                ['field' => 'attach_file2', 'label' => '첨부파일', 'rules' => 'callback_validateFileRequired[attach_file2]']
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

        if ($ssn_type == 'Y') {
            $rules = array_merge($rules, [
                ['field' => 'ssn_1', 'label' => '주민번호', 'rules' => 'trim|required|integer|min_length[6]|max_length[6]'],
                ['field' => 'ssn_2', 'label' => '주민번호', 'rules' => 'trim|required|integer|min_length[7]|max_length[7]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->addEventRegisterMember($this->_reqP(null, true), $this->_site_code, $register_type);
        $this->json_result($result, $ret_msg, $result);
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

        $result = $this->eventFModel->addEventComment($this->_reqP(null, false), null, $this->_site_code);
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

        $data['AttachData'] = (empty($data['AttachData']) === true) ? null : json_decode($data['AttachData'],true);       //첨부파일
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
        if ($this->session->userdata('is_login') !== true) {
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
     * @param null $file_type
     */
    private function ongoing($file_type = null)
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input))  . '&s_event_type=' . element('s_event_type', $arr_input);

        $arr_base['request_type'] = $this->eventFModel->_request_type;
        $arr_base['event_type'] = $this->eventFModel->_event_type;

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

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->eventFModel->listAllEvent(true, $this->_cate_code, $arr_condition);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $this->_cate_code, $arr_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index' . $file_type, [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
        ]);
    }

    /**
     * 종료된이벤트 인덱스
     * @param null $file_type
     */
    private function end($file_type = null)
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input))  . '&s_event_type=' . element('s_event_type', $arr_input);

        $arr_base['request_type'] = $this->eventFModel->_request_type;
        $arr_base['event_type'] = $this->eventFModel->_event_type;

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

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->eventFModel->listAllEvent(true, $this->_cate_code, $arr_condition);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $this->_cate_code, $arr_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index' . $file_type, [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
        ]);
    }

    /**
     * 전체이벤트 인덱스
     */
    private function all()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input)) . '&s_event_type=' . element('s_event_type', $arr_input);

        $arr_base['request_type'] = $this->eventFModel->_request_type;
        $arr_base['event_type'] = $this->eventFModel->_event_type;

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
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->eventFModel->listAllEvent(true, $this->_cate_code, $arr_condition);
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $this->_cate_code, $arr_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index_v2', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
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
        if (in_array($onoff_type, ['ongoing', 'ongoing_v2']) === true) {
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

    /**
     * 이벤트 신청자 자료 파일 다운로드
     * @return mixed
     */
    public function registerFileDownload()
    {
        $el_idx = $this->_reqG('el_idx');
        $mem_idx = $this->session->userdata('mem_idx');

        if(empty($mem_idx) === true){
            show_alert('로그인 후 이용 가능합니다.', 'back');
        }

        $reg_count =$this->eventFModel->getMemberForRegisterCount($el_idx, ['EQ' => ['a.MemIdx' => $mem_idx, 'b.ElIdx' => $el_idx]]);
        if($reg_count < 1) {
            show_alert('이벤트 신청 후 다운로드 가능합니다.','back');
        }

        $this->downloadFModel->saveLogEvent($el_idx);
        $file_data = $this->eventFModel->findAttachData(['EQ' => ['ElIdx' => $el_idx, 'FileType' => 'R', 'IsUse' => 'Y']]);

        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','back');
        }

        $file_path = $file_data['FileFullPath'].$file_data['FileName'];
        $file_name = $file_data['FileRealName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','back');
    }

    /**
     * 추가 이벤트 신청 처리
     */
    public function addApplyStore()
    {
        $comment_chk_yn = $this->_req('comment_chk_yn');    //댓글참여 확인 여부
        $comment_ccd = (int)$this->_req('comment_ccd');    //댓글참여 확인 여부

        // 댓글 참여 여부 확인
        if(empty($comment_chk_yn) === false && $comment_chk_yn == 'Y') {
            $arr_condition = [
                'EQ' => [
                    'a.MemIdx' => $this->session->userdata('mem_idx'),
                    'a.ElIdx' => (int)$this->_req('event_idx'),
                    'a.IsStatus' => 'Y',
                    'a.IsUse' => 'Y',
                    'a.CommentUiCcd' => $comment_ccd
                ]
            ];

            $comment_result = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, 1, 0, ['a.CIdx' => 'DESC']);
            if (empty($comment_result) === true) {
                return $this->json_error('소문내기 댓글을 등록해 주세요.');
            }
        }

        $register_type = ($this->_reqP('register_type') == 'promotion') ? 'promotion' : 'event';
        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'add_apply_chk[]', 'label' => '추가신청 식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->addEventApplyMember($this->_reqP(null, false), $this->_site_code, $register_type);
        $this->json_result($result, '신청 되었습니다.', $result);
    }

    /**
     * 프로모션 기타 처리
     */
    public function promotionEtcStore()
    {
        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->eventFModel->procPromotionEtc($this->_reqP(null, false), $this->_site_code);
        $this->json_result($result, '장바구니에 담겼습니다', $result);
    }

    /**
     * 프로모션 회원 신청리스트
     * @return mixed
     */
    public function listRegisterAjax()
    {
        $data = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $el_idx = element('el_idx',$arr_input);
        $file_type = element('file_type',$arr_input);
        $limit = element('limit',$arr_input, $this->_paging_limit);
        $search_value = element('search_value',$arr_input);
        $search_type = element('search_type',$arr_input);

        $get_page_params = 'list_keyword='.urlencode($search_value);
        $get_page_params .= '&search_type='.$search_type;

        if(empty($el_idx) === true) {
            return $this->json_error('필수 데이터 누락입니다.');
        }

        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'B.ElIdx' => $el_idx,
                'B.IsStatus' => 'Y',
            ],
        ];

        if(empty($search_type) === false){
            $arr_condition['ORG']['LKB'] = [];
            if($search_type == 'content'){
                $arr_condition['ORG']['LKB']['A.EtcValue'] = $search_value;
            }else if($search_type == 'id'){
                $arr_condition['ORG']['LKB']['C.MemId'] = $search_value;
            }
        }

        $order_by = ['A.EmIdx' => 'DESC'];

        $total_rows = $this->eventFModel->listRegisterMember(true, $arr_condition);
        $paging = $this->pagination('/event/listRegisterAjax/' . $el_idx . '?' . $get_page_params, $total_rows, $limit, $this->_paging_count,true);

        if ($total_rows > 0) {
            $data = $this->eventFModel->listRegisterMember(false,$arr_condition,$paging['limit'],$paging['offset'],$order_by);
        }

        $this->load->view('promotion/register_list' . $file_type . '_ajax', [
            'data' => $data,
            'paging' => $paging,
            'total_rows' => $total_rows,
            'arr_input' => $arr_input
        ]);
    }

    /**
     * 신청내역 삭제
     */
    public function deleteRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'em_idx', 'label' => '이벤트접수식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return $this->json_error('필수 데이터 누락입니다.');
        }

        $result = $this->eventFModel->delEventRegister(element('em_idx', $this->_reqP(null)));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 신청내역 전체 삭제
     */
    public function deleteAllRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'em_idx[]', 'label' => '이벤트접수식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return $this->json_error('필수 데이터 누락입니다.');
        }

        $result = $this->eventFModel->delAllEventRegister($this->_reqP(null));
        $this->json_result($result, '취소 되었습니다.', $result);
    }

    /**
    * 프로모션 신청리스트 팝업
    * @param array $param
    */
    public function showThumbnailPopup($param = [])
    {
        if (empty($param) === true) {
            return $this->json_error('잘못된 접근 입니다.');
        }

        $arr_condition = [
            'EQ' => [
                'A.EmIdx' => $param[0],
                'A.IsStatus' => 'Y',
                'B.IsStatus' => 'Y',
            ],
        ];
        $data = $this->eventFModel->listRegisterMember(false, $arr_condition);

        return $this->load->view('/promotion/register_thumbnail_popup',[
            'data' => $data
        ]);
    }

}