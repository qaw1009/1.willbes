<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLecture extends \app\controllers\BaseController
{
    protected $models = array('site/eventLecture', 'sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'product/base/professor', 'board/board', '_wbs/sys/admin');
    protected $helpers = array();

    protected $_groupCcd = [];

    public function __construct()
    {
        parent::__construct();

        // 공통코드 셋팅
        $this->_groupCcd = $this->eventLectureModel->_groupCcd;
    }

    /**
     * 이벤트/설명회/특강관리 인텍스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("site/event_lecture/index", [
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y',
                'B.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $list = [];
        $count = $this->eventLectureModel->listAllEvent(true, $arr_condition, $sub_query_condition);
        if ($count > 0) {
            $list = $this->eventLectureModel->listAllEvent(false, $arr_condition, $sub_query_condition, $this->_reqP('length'), $this->_reqP('start'), ['ElIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 이벤트/설명회/특강관리 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $el_idx = null;
        $list_event_register = null;
        $file_data = null;

        //관리옵션
        $optoins_keys = [];
        $arr_options = $this->codeModel->getCcd($this->_groupCcd['option']);
        foreach ($arr_options as $key => $val) {
            $optoins_keys[] = $key;
        }

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //과목조회
        $arr_subject = $this->subjectModel->getSubjectArray();

        //교수조회
        $arr_professor = $this->professorModel->getProfessorArray();

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $el_idx = $params[0];

            $arr_condition = ([
                'EQ'=>[
                    'A.ElIdx' => $el_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->eventLectureModel->findEventForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->eventLectureModel->listEventCategory($el_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리

            // 등록파일 데이터 조회
            $list_event_file = $this->eventLectureModel->listEventForFile($el_idx);
            foreach ($list_event_file as $row) {
                $file_data[$row['FileType']]['file_idx'] = $row['EfIdx'];
                $file_data[$row['FileType']]['file_real_name'] = $row['FileRealName'];
                $file_data[$row['FileType']]['file_path'] = $row['FileFullPath'].$row['FileName'];
            }

            // 정원제한 데이터 조회 / 타입별 데이터 초기화
            if ($data['LimitType'] == 'S') { $list_event_register['M'] = null; } else if ($data['LimitType'] == 'M') { $list_event_register['S'] = null; }
            $list_event_register[$data['LimitType']] = $this->eventLectureModel->listEventForRegister($el_idx);

            // 댓글사용영역 데이터 가공
            $arr_comment_use = explode(',', $data['CommentUseArea']);
            foreach ($arr_comment_use as $key => $val) {
                $data['ArrCommentUseArea'][$val] = $val;
            }
        }

        $this->load->view("site/event_lecture/create", [
            'arr_options' => $arr_options,
            'optoins_keys' => $optoins_keys,
            'method' => $method,
            'data' => $data,
            'el_idx' => $el_idx,
            'arr_campus' => $arr_campus,
            'offLineSite_list' => $offLineSite_list,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            'arr_requst_types' => $this->eventLectureModel->_requst_type_names,
            'arr_take_types' => $this->eventLectureModel->_take_type_names,
            'arr_is_registers' => $this->eventLectureModel->_is_register_names,
            'file_data' => $file_data,
            'list_event_register' => $list_event_register
        ]);
    }

    /**
     * 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $el_idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required|integer'],
            ['field' => 'requst_type', 'label' => '신청유형', 'rules' => 'trim|required|integer'],
            ['field' => 'register_start_date', 'label' => '접수기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'register_end_date', 'label' => '접수기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'event_name', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'content_type', 'label' => '내용옵션', 'rules' => 'trim|required|in_list[I,E]'],
            ['field' => 'option_ccds[]', 'label' => '관리옵션', 'rules' => 'trim|required'],
        ];

        //상태 값에 따른 rules 적용 (일반적 rules 적용 불가)
        $content_type = $this->_reqP('content_type');       //내용타입
        $option_ccds = $this->_reqP('option_ccds[]');       //관리옵션
        $limit_type = $this->_reqP('limit_type');           //정원제한타입

        // 등록,수정 조건 분기 처리
        if (empty($this->_reqP('el_idx')) === true) {
            if ($content_type == 'I' && empty($_FILES['attach_file']['size'][0]) === true) {
                $rules = array_merge($rules, [
                    ['field' => "attach_file_C", 'label' => '이미지내용', 'rules' => "callback_validateFileRequired[attach_file_C]"]
                ]);
            } else if ($content_type == 'E') {
                $rules = array_merge($rules, [
                    ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required']
                ]);
            }

            if (empty($_FILES['attach_file']['size'][2]) === true) {
                $rules = array_merge($rules, [
                    ['field' => "attach_file_S", 'label' => '리스트썸네일', 'rules' => "callback_validateFileRequired[attach_file_S]"]
                ]);
            }

            if (count($option_ccds) > 0) {
                foreach ($option_ccds as $key => $val) {
                    switch ($val) {
                        case $this->eventLectureModel->_event_lecture_option_ccds[0] :
                            $rules = array_merge($rules, [
                                ['field' => 'limit_type', 'label' => '정원제한', 'rules' => 'trim|required|in_list[S,M]']
                            ]);

                            if ($limit_type == 'S') {
                                $rules = array_merge($rules, [
                                    ['field' => 'person_limit_type', 'label' => '인원제한타입', 'rules' => 'callback_validateRequiredIf[limit_type,S]|in_list[L,N]'],
                                    ['field' => 'person_limit', 'label' => '정원수', 'rules' => 'callback_validateRequiredIf[person_limit_type,L]|integer'],
                                ]);
                            } else if ($limit_type == 'M') {
                                $rules = array_merge($rules, [
                                    ['field' => 'event_register_parson_limit_type[]', 'label' => '단일,다중선택', 'rules' => 'trim|required'],
                                    ['field' => 'event_register_name[]', 'label' => '특강명', 'rules' => 'trim|required']
                                ]);
                            }
                            break;
                    }
                }
            }

        } else {
            $method = 'modify';
            $el_idx = $this->_reqP('el_idx');

            if ($content_type == 'E') {
                $rules = array_merge($rules, [
                    ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required']
                ]);
            }
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->{$method . 'EventLecture'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 이벤트 접수 관리 : 정원제한 다중리스트 데이터 삭제
     */
    public function delRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'er_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->delRegister($this->_reqP('er_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function read($params = [])
    {
        $el_idx = $params[0];
        $file_data = null;

        $arr_condition = ([
            'EQ'=>[
                'A.ElIdx' => $el_idx,
                'A.IsStatus' => 'Y'
            ]
        ]);
        $data = $this->eventLectureModel->findEventForModify($arr_condition);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        // 신청유형
        $data['RequstTypeName'] = (empty($this->eventLectureModel->_requst_type_names[$data['RequstType']]) === true) ? '' : $this->eventLectureModel->_requst_type_names[$data['RequstType']];

        // 참여구분
        $data['TakeTypeName'] = (empty($this->eventLectureModel->_take_type_names[$data['TakeType']]) === true) ? '' : $this->eventLectureModel->_take_type_names[$data['TakeType']];

        // 접수상태
        $data['IsRegisterName'] = (empty($this->eventLectureModel->_is_register_names[$data['IsRegister']]) === true) ? '' : $this->eventLectureModel->_is_register_names[$data['IsRegister']];

        // 카테고리 연결 데이터 조회
        $arr_cate_code = $this->eventLectureModel->listEventCategory($el_idx);
        $data['CateCodes'] = $arr_cate_code;
        $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리

        // 정원제한 다중리스트 데이터 조회
        $data_register_LM = [];
        if ($data['LimitType'] == 'M') {
            $listRegister = $this->eventLectureModel->listEventForRegister($el_idx);
            if (empty($listRegister) === false) {
                $data_register_LM = array_pluck($listRegister, 'Name', 'ErIdx');
            }
        }

        // 관리자명 리턴
        $wAdmin_info = $this->adminModel->findAdmin('wAdminName', ['EQ' => ['wAdminIdx' => $this->session->userdata('admin_idx')]]);

        // 등록파일 데이터 조회
        $list_event_file = $this->eventLectureModel->listEventForFile($el_idx);
        foreach ($list_event_file as $row) {
            $file_data[$row['FileType']]['file_idx'] = $row['EfIdx'];
            $file_data[$row['FileType']]['file_real_name'] = $row['FileRealName'];
            $file_data[$row['FileType']]['file_path'] = $row['FileFullPath'].$row['FileName'];
        }

        $this->load->view("site/event_lecture/read", [
            'data' => $data,
            'el_idx' => $el_idx,
            'file_data' => $file_data,
            'data_register_LM' => $data_register_LM,
            'wAdmin_info' => $wAdmin_info
        ]);
    }

    /**
     * 접수관리데이터 회원 신청리스트
     * @param array $params
     * @return CI_Output
     */
    public function listRegisterAjax($params = [])
    {
        $count = 0;
        $list = [];
        $el_idx = $params[0];

        if (empty($el_idx) === false) {
            $arr_condition = $this->_getRegisterListConditions($el_idx);

            $count = $this->eventLectureModel->listAllEventRegister(true, $arr_condition);
            if ($count > 0) {
                $list = $this->eventLectureModel->listAllEventRegister(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.EmIdx' => 'asc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 접수관리 회원 신청 수
     * @param $params
     */
    public function getAjaxRegisterMemberCount($params)
    {
        $result = $this->eventLectureModel->getRegisterMemberCount($params[0]);
        $this->json_result(true, '', [], $result);
    }

    /**
     * 이벤트 공지사항, 댓글현황
     * @param array $params
     * @return CI_Output
     */
    public function listCommentAjax($params = [])
    {
        $count = 0;
        $list = [];
        $list_comment = [];
        $list_notice = [];
        $el_idx = $params[0];

        if (empty($el_idx) === false) {
            // 공지사항 조회 (댓글 현황 탭에 노출)
            $arr_notice_condition = $this->_getNoticeListConditions($el_idx);
            $data_notice = $this->eventLectureModel->listEventNotice($arr_notice_condition);

            if (empty($data_notice) === false) {
                foreach ($data_notice as $key => $row) {
                    $list_notice[$key]['temp_type'] = 'notice';
                    $list_notice[$key]['temp_idx'] = $row['BoardIdx'];
                    $list_notice[$key]['temp_Name'] = $row['wAdminName'];
                    $list_notice[$key]['temp_Title'] = $row['Title'];
                    $list_notice[$key]['temp_RegDatm'] = $row['RegDatm'];
                    $list_notice[$key]['temp_isUse'] = $row['IsUse'];
                    $list_notice[$key]['temp_MemIdx'] = null;
                    $list_notice[$key]['temp_MemId'] = null;
                    $list_notice[$key]['temp_Phone'] = null;
                    $list_notice[$key]['temp_Mail'] = null;
                }
            }

            // 댓글현황 조회
            $arr_condition = $this->_getCommentListConditions($el_idx);
            $count_comment = $this->eventLectureModel->listAllEventComment(true, $arr_condition);
            if ($count_comment > 0) {
                $data_comment = $this->eventLectureModel->listAllEventComment(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CIdx' => 'asc']);

                foreach ($data_comment as $key => $row) {
                    $list_comment[$key]['temp_type'] = 'comment';
                    $list_comment[$key]['temp_idx'] = $row['CIdx'];
                    $list_comment[$key]['temp_Name'] = $row['MemName'];
                    $list_comment[$key]['temp_Title'] = $row['eventComment'];
                    $list_comment[$key]['temp_RegDatm'] = $row['RegDatm'];
                    $list_comment[$key]['temp_isUse'] = $row['IsUse'];
                    $list_comment[$key]['temp_MemIdx'] = $row['MemIdx'];
                    $list_comment[$key]['temp_MemId'] = $row['MemId'];
                    $list_comment[$key]['temp_Phone'] = $row['Phone'];
                    $list_comment[$key]['temp_Mail'] = $row['Mail'];
                }
            }
        }

        $list = array_merge($list_notice, $list_comment);
        return $this->response([
            'recordsTotal' => count($list),
            'recordsFiltered' => count($list),
            'data' => $list,
        ]);
    }

    /**
     * 댓글등록
     */
    public function storeComment()
    {
        $rules = [
            ['field' => 'comment_el_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_name', 'label' => '관리자명', 'rules' => 'trim|required'],
            ['field' => 'event_comment', 'label' => '댓글', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->addEventComment($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 이벤트 공지등록 폼
     * @param array $params
     */
    public function createNoticeModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $el_idx = $params[0];

        // 이벤트/설명회/특강관리 정보 조회
        $arr_condition = ([
            'EQ'=>[
                'A.ElIdx' => $el_idx,
                'A.IsStatus' => 'Y'
            ]
        ]);
        $event_data = $this->eventLectureModel->findEventForModify($arr_condition);
        if (count($event_data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        // 카테고리 연결 데이터 조회
        $arr_cate_code = $this->eventLectureModel->listEventCategory($el_idx);
        $event_data['CateCodes'] = $arr_cate_code;
        $event_data['CateNames'] = implode(', ', array_values($arr_cate_code));

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $method = 'POST';
        $data = null;
        $board_idx = $this->_req('board_idx');
        $data_notice = null;

        // 게시판 조회
        if (empty($board_idx) === false) {
            $method = 'PUT';
            $data_notice = $this->eventLectureModel->findEventNoticeForModify($board_idx);
            $data_notice['arr_attach_file_idx'] = explode(',', $data_notice['AttachFileIdx']);
            $data_notice['arr_attach_file_path'] = explode(',', $data_notice['AttachFilePath']);
            $data_notice['arr_attach_file_name'] = explode(',', $data_notice['AttachFileName']);
        }

        $this->load->view("site/event_lecture/create_notice_modal", [
            'method' => $method,
            'el_idx' => $el_idx,
            'arr_campus' => $arr_campus,
            'event_data' => $event_data,
            'data' => $data,
            'board_idx' => $board_idx,
            'data_notice' => $data_notice,
            'attach_file_cnt' => $this->eventLectureModel->_attach_img_cnt
        ]);
    }

    /**
     * 이벤트 공지사항 등록
     */
    public function storeNotice()
    {
        $method = 'add';
        $board_idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'el_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $board_idx = $this->_reqP('board_idx');
        }

        $inputData = $this->_setInputBoardData($this->_reqP(null, false));

        //addEventNotice, modifyEventNotice
        $result = $this->eventLectureModel->{$method . 'EventNotice'}($method, $inputData, $board_idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 이벤트 공지사항 첨부파일 삭제
     */
    public function destroyNoticeFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 이벤트 공지사항 Read 페이지
     * @param array $params
     */
    public function readNoticeModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $el_idx = $params[0];
        $board_idx = $this->_req('board_idx');
        $data = $this->eventLectureModel->findEventNoticeForModify($board_idx);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $site_code = $data['SiteCode'];
        $arr_cate_code = explode(',', $data['CateCode']);
        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);

        $get_category_array = $this->categoryModel->getCategoryArray($site_code);

        foreach ($arr_cate_code as $item => $code) {
            $data['arr_cate_code'][$code] = $get_category_array[$code];
        }

        $this->load->view("site/event_lecture/read_notice_modal", [
            'data' => $data,
            'el_idx' => $el_idx,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 이벤트 공지사항 삭제
     */
    public function deleteNotice($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $board_idx = $params[0];
        if (empty($board_idx) === true) {
            $result = false;
        } else {
            $result = $this->boardModel->boardDelete($board_idx);
        }
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 유효기간 검색
            $arr_condition['BET'] = [
                'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }

    /**
     * 이벤트 접수관리 검색 조건
     * @param $el_idx
     * @return array
     */
    private function _getRegisterListConditions($el_idx)
    {
        $arr_condition = [
            'EQ' => [
                'B.ElIdx' => $el_idx,
                'B.IsStatus' => 'Y',
                'B.ErIdx' => $this->_reqP('search_register_idx')
            ],
            'ORG1' => [
                'LKB' => [
                    'C.MemName' => $this->_reqP('search_member_value'),
                    'C.MemId' => $this->_reqP('search_member_value'),
                    'C.Phone3' => $this->_reqP('search_member_value'),
                ]
            ]
        ];

        // 날짜 검색
        $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_member_start_date'), $this->_reqP('search_member_end_date')]];

        return $arr_condition;
    }

    /**
     * 이벤트 댓글 관리 검색 조건
     * @param $el_idx
     * @return array
     */
    private function _getCommentListConditions($el_idx)
    {
        $arr_condition = [
            'EQ' => [
                'A.ElIdx' => $el_idx,
                'A.IsStatus' => 'Y'
            ],
            'ORG1' => [
                'LKB' => [
                    'B.MemName' => $this->_reqP('search_member_value'),
                    'B.MemId' => $this->_reqP('search_member_value'),
                    'B.Phone3' => $this->_reqP('search_member_value'),
                ]
            ]
        ];

        $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_member_start_date'), $this->_reqP('search_member_end_date')]];

        return $arr_condition;
    }

    /**
     * 이벤트 공지사항 검색 조건
     * @param $el_idx
     * @return array
     */
    private function _getNoticeListConditions($el_idx)
    {
        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->eventLectureModel->bm_idx,
                'LB.ElIdx' => $el_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1'
            ]
        ];

        return $arr_condition;
    }

    /**
     * 공지사항 데이터 셋팅
     * @param $input
     * @return array
     */
    private function _setInputBoardData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->eventLectureModel->bm_idx,
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ElIdx' => element('el_idx', $input),
                'ReadCnt' => 0,
                'SettingReadCnt' => 0
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}