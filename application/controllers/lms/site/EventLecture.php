<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLecture extends \app\controllers\BaseController
{
    protected $models = array('site/eventLecture', 'sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'product/base/professor', 'board/board', 'site/bannerRegist', '_wbs/sys/admin');
    protected $helpers = array('download','file');

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
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        //사이트카테고리 중분류 조회
        $arr_m_category = $this->categoryModel->getCategoryArray('', '', '', 2);

        $this->load->view("site/event_lecture/index", [
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'arr_m_category' => $arr_m_category,
            'send_option_ccd' => $this->eventLectureModel->_event_lecture_option_ccds[2],
            'arr_request_types' => $this->eventLectureModel->_request_type_names,
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y'
            ]
//            'LKR' => [
//                'B.CateCode' => $this->_reqP('search_category')
//            ]
        ];

        $list = [];
        $count = $this->eventLectureModel->listAllEvent(true, $arr_condition, $sub_query_condition, $this->_reqP('search_site_code'));
        if ($count > 0) {
            $list = $this->eventLectureModel->listAllEvent(false, $arr_condition, $sub_query_condition, $this->_reqP('search_site_code'), $this->_reqP('length'), $this->_reqP('start'), ['IsBest' => 'desc', 'ElIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 이벤트 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'el_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->eventLectureCopy($this->_reqP('el_idx'));
        $this->json_result($result, '복사 되었습니다.', $result);
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
        $file_data_promotion = null;
        $list_event_display_product = null;
        $list_event_add_apply = null;

        //관리옵션
        $options_keys = [];
        $arr_options = $this->codeModel->getCcd($this->_groupCcd['option']);
        foreach ($arr_options as $key => $val) {
            $options_keys[] = $key;
        }

        //댓글UI종류
        $arr_comment_ui_type_ccd = $this->codeModel->getCcd($this->_groupCcd['CommentUiType']);

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //과목조회
        $arr_subject = $this->subjectModel->getSubjectArray();

        //교수조회
        $arr_professor = $this->professorModel->getProfessorArray(null, null, ['P.ProfNickName' => 'ASC', 'P.ProfIdx' => 'ASC']);

        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        //포인트적립타입
        $arr_pointapply_ccd = $this->codeModel->getCcd('635');

        //캠퍼스'N'상태 사이트 코드 조회
        $onLineSite_list = $this->siteModel->getOnLineSiteArray();

        // 학원사이트 코드 조회
        $arr_offline_site_code = get_auth_on_off_site_codes('Y');
        $arr_online_site_code = get_auth_on_off_site_codes('N');

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
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->eventLectureModel->listEventCategory($el_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리

            // 등록파일 데이터 조회
            $list_event_file = $this->eventLectureModel->listEventForFile($el_idx);
            if ($data['RequestType'] == '5') {
                $file_data_promotion = $list_event_file;
            } else {
                foreach ($list_event_file as $row) {
                    $file_data[$row['FileType']]['file_idx'] = $row['EfIdx'];
                    $file_data[$row['FileType']]['file_real_name'] = $row['FileRealName'];
                    $file_data[$row['FileType']]['file_path'] = $row['FileFullPath'] . $row['FileName'];
                }
            }

            // 정원제한 데이터 조회 / 타입별 데이터 초기화
            if ($data['LimitType'] == 'S') { $list_event_register['M'] = null; } else if ($data['LimitType'] == 'M') { $list_event_register['S'] = null; }
            $list_event_register[$data['LimitType']] = $this->eventLectureModel->listEventForRegister($el_idx, true);

            // 댓글사용영역 데이터 가공
            $arr_comment_use = explode(',', $data['CommentUseArea']);
            foreach ($arr_comment_use as $key => $val) {
                $data['ArrCommentUseArea'][$val] = $val;
            }

            // 댓글UI타입 데이터 가공
            $data['comment_ui_type_ccds'] = array_flip(explode(',', $data['CommentUiTypeCcds']));   // 관리옵션 데이터 가공처리

            // 프로모션 부가 정보 조회
            $data['promotion_other_data'] = $this->eventLectureModel->listEventPromotionForOther($data['PromotionCode']);

            // 프로모션 부가 정보 조회
            $data['promotion_live_video_data'] = $this->eventLectureModel->listEventPromotionForLiveVideo($data['PromotionCode']);

            // 강좌신청 조회
            $list_event_display_product = $this->eventLectureModel->listEventForDisplayProduct($el_idx);

            // 프로모션 추가신청정보 조회
            $list_event_add_apply = $this->eventLectureModel->listEventForAddApply($el_idx);
        }

        $this->load->view("site/event_lecture/create", [
            'arr_options' => $arr_options,
            'arr_comment_ui_type_ccd' => $arr_comment_ui_type_ccd,
            'options_keys' => $options_keys,
            'method' => $method,
            'data' => $data,
            'el_idx' => $el_idx,
            'arr_campus' => $arr_campus,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            /*'site_csTel' => $site_csTel,*/
            'arr_send_callback_ccd' => $arr_send_callback_ccd,
            'arr_request_types' => $this->eventLectureModel->_request_type_names,
            'arr_take_types' => $this->eventLectureModel->_take_type_names,
            'arr_is_registers' => $this->eventLectureModel->_is_register_names,
            'pointapply_ccd' => $arr_pointapply_ccd,
            'file_data' => $file_data,
            'file_data_promotion' => $file_data_promotion,
            'list_event_register' => $list_event_register,
            'list_event_display_product' => $list_event_display_product,
            'list_event_add_apply' => $list_event_add_apply,
            'promotion_modify_type' => (ENVIRONMENT === 'production') ? false : true,
            'promotion_attach_file_cnt' => (empty($file_data_promotion) === true) ? 3 : count($file_data_promotion),
            'onLineSite_list' => $onLineSite_list,
            'arr_offline_site_code' => $arr_offline_site_code,
            'arr_online_site_code' => $arr_online_site_code,
        ]);
    }

    /**
     * 등록/수정
     */
    public function store()
    {
        $method = 'add';

        //캠퍼스 Y 값 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|integer|callback_validateRequiredIf[site_code,' . implode(',', array_keys($offLineSite_list)) . ']'],
            ['field' => 'request_type', 'label' => '신청유형', 'rules' => 'trim|required|integer'],
            ['field' => 'register_start_datm', 'label' => '접수기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'register_end_datm', 'label' => '접수기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'event_name', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'content_type', 'label' => '내용옵션', 'rules' => 'trim|required|in_list[I,E]'],
            ['field' => 'option_ccds[]', 'label' => '관리옵션', 'rules' => 'callback_validateRequiredIf[request_type,'.implode(',', $this->eventLectureModel->_option_rules).']'],
        ];

        //사이트코드 통합코드가 아닐경우 카테고리 체크
        if ($this->_reqP('site_code') != config_item('app_intg_site_code')) {
            $rules = array_merge($rules, [
                ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required']
            ]);
        }

        //상태 값에 따른 rules 적용
        $request_type = $this->_reqP('request_type');       //신청유형
        $content_type = $this->_reqP('content_type');       //내용타입
        $option_ccds = $this->_reqP('option_ccds[]');       //관리옵션
        $limit_type = $this->_reqP('limit_type');           //정원제한타입
        $promotion_live_type = $this->_reqP('promotion_live_type');  //라이브송출타입

        //프로모션 제외
        if (($this->eventLectureModel->_request_type_names[$request_type] != '프로모션') && (empty($option_ccds) === false) && count($option_ccds) > 0) {
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
                                ['field' => 'register_name', 'label' => '특강명', 'rules' => 'trim|required']
                            ]);
                        } else if ($limit_type == 'M') {
                            $rules = array_merge($rules, [
                                ['field' => 'event_register_person_limit_type[]', 'label' => '단일,다중선택', 'rules' => 'trim|required'],
                                ['field' => 'event_register_name[]', 'label' => '특강명', 'rules' => 'trim|required']
                            ]);
                        }
                        break;
                    case $this->eventLectureModel->_event_lecture_option_ccds[1] :
                        $rules = array_merge($rules, [
                            ['field' => 'comment_use_area[]', 'label' => '댓글기능옵션', 'rules' => 'trim|required'],
                            ['field' => 'comment_ui_type_ccds[]', 'label' => '댓글Ui종류', 'rules' => 'trim|required']
                        ]);
                        if(empty($this->_reqP('point_type')) === false) {
                            $rules = array_merge($rules, [
                                ['field' => 'point_amount', 'label' => '적립포인트', 'rules' => 'trim|required'],
                                ['field' => 'point_valid_days', 'label' => '포인트 유효일수', 'rules' => 'trim|required']
                            ]);
                        }
                        break;
                    case $this->eventLectureModel->_event_lecture_option_ccds[2] :
                        $rules = array_merge($rules, [
                            ['field' => 'send_tel', 'label' => '발신번호', 'rules' => 'trim|required'],
                            ['field' => 'sms_content', 'label' => '발신내용', 'rules' => 'trim|required']
                        ]);
                        break;
                    case $this->eventLectureModel->_event_lecture_option_ccds[3] :
                        $rules = array_merge($rules, [
                            ['field' => 'popup_title', 'label' => '팝업타이틀명', 'rules' => 'trim|required'],
                            ['field' => 'banner_idx', 'label' => '배너선택', 'rules' => 'trim|required|integer']
                        ]);
                        break;
                }
            }
        }

        // 프로모션,라이브송출관리 Y인 경우
        if ($this->eventLectureModel->_request_type_names[$request_type] == '프로모션' && $promotion_live_type == 'Y') {
            $rules = array_merge($rules, [
                ['field' => 'live_title[]', 'label' => '라이브송출제목', 'rules' => 'trim|required'],
                ['field' => 'live_auto_type[]', 'label' => '동영상자동실행', 'rules' => 'trim|required'],
                ['field' => 'live_ratio[]', 'label' => '동영상비율', 'rules' => 'trim|required'],
                ['field' => 'live_date[]', 'label' => '라이브송출날짜', 'rules' => 'trim|required'],
                ['field' => 'live_url[]', 'label' => '라이브송출경로', 'rules' => 'trim|required']
            ]);
        }

        // 등록,수정 조건 분기 처리, 프로모션 제외
        if (empty($this->_reqP('el_idx')) === true) {
            // 프로모션 제외
            if ($this->eventLectureModel->_request_type_names[$request_type] != '프로모션') {
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
            }
        } else {
            $method = 'modify';

            // 프로모션 제외
            if ($this->eventLectureModel->_request_type_names[$request_type] != '프로모션') {
                if ($content_type == 'E') {
                    $rules = array_merge($rules, [
                        ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required']
                    ]);
                }
            }
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $promotion_modify_type = (ENVIRONMENT === 'production') ? false : true;
        $result = $this->eventLectureModel->{$method . 'EventLecture'}($this->_reqP(null, false), $promotion_modify_type);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 이벤트 파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 이벤트 접수 관리 : 정원제한 다중리스트 데이터 삭제
     */
    public function delRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'el_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'er_idx', 'label' => '접수관리식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->delRegister($this->_reqP('el_idx'), $this->_reqP('er_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 이벤트 접수 관리 : 만료상태 수정
     */
    public function expireRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'er_idx', 'label' => '접수관리식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'person_limit_type', 'label' => '인원제한타입', 'rules' => 'trim|required|in_list[L,N]'],
            ['field' => 'person_limit', 'label' => '정원수', 'rules' => 'callback_validateRequiredIf[person_limit_type,L]|integer'],
            ['field' => 'register_name', 'label' => '특강명', 'rules' => 'trim|required'],
            ['field' => 'expire_status', 'label' => '만료상태', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->expireRegister($this->_reqP(null, false));
        $this->json_result($result, '신청정보 정상 수정 처리 되었습니다.', $result);
    }

    /**
     * 신청리스트 : 단일리스트 특강 정보 수정
     */
    public function updateRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'er_idx', 'label' => '특강식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'person_limit_type', 'label' => '인원제한타입', 'rules' => 'trim|required|in_list[L,N]'],
            ['field' => 'person_limit', 'label' => '정원수', 'rules' => 'callback_validateRequiredIf[person_limit_type,L]|integer'],
            ['field' => 'register_name', 'label' => '특강명', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->updateRegister($this->_reqP(null, false));
        $this->json_result($result, '만료상태 수정 정상 처리 되었습니다.', $result);
    }

    public function read($params = [])
    {
        $el_idx = $params[0];
        $file_data = null;
        $file_data_promotion = null;

        $arr_condition = (['EQ'=>['A.ElIdx' => $el_idx,'A.IsStatus' => 'Y']]);
        $data = $this->eventLectureModel->findEventForModify($arr_condition);

        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        // 신청유형
        $data['RequestTypeName'] = (empty($this->eventLectureModel->_request_type_names[$data['RequestType']]) === true) ? '' : $this->eventLectureModel->_request_type_names[$data['RequestType']];

        // 참여구분
        $data['TakeTypeName'] = (empty($this->eventLectureModel->_take_type_names[$data['TakeType']]) === true) ? '' : $this->eventLectureModel->_take_type_names[$data['TakeType']];

        // 접수상태
        $data['IsRegisterName'] = (empty($this->eventLectureModel->_is_register_names[$data['IsRegister']]) === true) ? '' : $this->eventLectureModel->_is_register_names[$data['IsRegister']];

        //댓글UI종류
        $data['arr_comment_ui_type_ccd'] = $this->codeModel->getCcd($this->_groupCcd['CommentUiType']);

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

        //응시직렬
        $ms_datas['SerialCcd'] = $this->codeModel->getCcd($this->_groupCcd['SerialCcd']);

        //응시지역
        $ms_datas['CandidateAreaCcd'] = $this->codeModel->getCcd($this->_groupCcd['CandidateAreaCcd']);

        //합격구분
        $ms_datas['SuccessType'] = $this->eventLectureModel->_successType;

        // 관리자명 리턴
        $wAdmin_info = $this->adminModel->findAdmin('wAdminName', ['EQ' => ['wAdminIdx' => $this->session->userdata('admin_idx')]]);

        // 등록파일 데이터 조회
        $list_event_file = $this->eventLectureModel->listEventForFile($el_idx);
        if ($data['RequestType'] == '5') {
            $file_data_promotion = $list_event_file;
        } else {
            foreach ($list_event_file as $row) {
                $file_data[$row['FileType']]['file_idx'] = $row['EfIdx'];
                $file_data[$row['FileType']]['file_real_name'] = $row['FileRealName'];
                $file_data[$row['FileType']]['file_path'] = $row['FileFullPath'] . $row['FileName'];
            }
        }

        //프로모션 URL Domain
        if (empty($data) === false && empty($data['SiteUrl']) === false) {
            $event_sub_domain = explode('.', $data['SiteUrl'])[0];
            $data['SiteDomain'] = preg_replace('/'.$event_sub_domain.'/', $event_sub_domain.ENV_DOMAIN, $data['SiteUrl'], 1);
        }

        $this->load->view("site/event_lecture/read", [
            'data' => $data,
            'el_idx' => $el_idx,
            'file_data' => $file_data,
            'file_data_promotion' => $file_data_promotion,
            'data_register_LM' => $data_register_LM,
            'wAdmin_info' => $wAdmin_info,
            'ms_datas' => $ms_datas,
            'arr_cate_code' => $arr_cate_code
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
                $list = $this->eventLectureModel->listAllEventRegister(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.EmIdx' => 'desc']);
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
        $count_comment = 0;
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
                    $list_comment[$key]['temp_comment_ui_ccd'] = null;
                    $list_comment[$key]['temp_comment_ui_ccd_name'] = null;
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
            if (empty($count_comment) === false) {
                $data_comment = $this->eventLectureModel->listAllEventComment(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CIdx' => 'desc']);

                foreach ($data_comment as $key => $row) {
                    $list_comment[$key]['temp_type'] = 'comment';
                    $list_comment[$key]['temp_idx'] = $row['CIdx'];
                    $list_comment[$key]['temp_comment_ui_ccd'] = $row['CommentUiCcd'];
                    $list_comment[$key]['temp_comment_ui_ccd_name'] = $row['CommentUiCcdName'];
                    $list_comment[$key]['temp_Name'] = $row['MemName'];
                    $list_comment[$key]['temp_Title'] = $row['eventComment'];
                    $list_comment[$key]['temp_RegDatm'] = $row['RegDatm'];
                    $list_comment[$key]['temp_isUse'] = $row['IsUse'];
                    $list_comment[$key]['temp_isStatus'] = $row['IsStatus'];
                    $list_comment[$key]['temp_MemIdx'] = $row['MemIdx'];
                    $list_comment[$key]['temp_MemId'] = $row['MemId'];
                    $list_comment[$key]['temp_Phone'] = $row['Phone'];
                    $list_comment[$key]['temp_Mail'] = $row['Mail'];
                }
            }
        }

        $cnt = count($list_notice) + $count_comment;
        $list = array_merge($list_notice, $list_comment);
        return $this->response([
            'recordsTotal' => $cnt,
            'recordsFiltered' => $cnt,
            'data' => $list,
        ]);
    }

    /**
     * 이벤트 합격수기 현황
     * @param array $params
     * @return CI_Output
     */
    public function listMemberSuccessAjax($params = [])
    {
        $count = 0;
        $list = [];
        $el_idx = $params[0];

        if (empty($el_idx) === false) {
            $arr_condition = $this->_getMemberSuccessListConditions($el_idx);

            $count = $this->eventLectureModel->listAllEventMemberSuccess(true, $arr_condition);
            if ($count > 0) {
                $list = $this->eventLectureModel->listAllEventMemberSuccess(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.EmsIdx' => 'DESC']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
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
            ['field' => 'comment_ui_type_ccd', 'label' => '댓글유형', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->addEventComment($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 게시판 삭제
     * @param array $params
     */
    public function deleteComment($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->eventLectureModel->commentDelete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
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

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
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

    public function deletePromotionOtherInfo()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'epo_idx', 'label' => '프로모션부가정보식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->deletePromotionOtherInfo($this->_reqP('epo_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function deletePromotionLiveVideo()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'eplv_idx', 'label' => '프로모션부가정보식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->deletePromotionLiveVideo($this->_reqP('eplv_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 신청 현황 엑셀다운로드
     * @param array $params
     */
    public function registerExcel($params = [])
    {
        $file_name = '이벤트_신청현황_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['이름', '아이디', '연락처', '이메일', '추가데이터', '신청일', '신청특강/설명회', '총신청수', '주소', '상세주소', '우편번호', '성별'];

        $el_idx = $params[0];
        $arr_condition = $this->_getRegisterListConditions($el_idx);
        $list = $this->eventLectureModel->listAllEventRegister('excel', $arr_condition, null, null, ['A.EmIdx' => 'desc']);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->eventLectureModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 추가신청자 현황 엑셀다운로드
     * @param array $params
     */
    public function addApplyMemberExcel($params = [])
    {
        $file_name = '이벤트_추가_신청현황_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['회원ID', '이름', '전화번호', '신청정보', '신청일시'];

        $el_idx = $params[0];

        $arr_condition = ['EQ' => ['B.ElIdx' => $el_idx]];
        $list = $this->eventLectureModel->listAllEventApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.EamIdx' => 'desc'], true);

        $download_query = $this->eventLectureModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 댓글 현황 엑셀다운로드
     * @param array $params
     */
    public function commentExcel($params = [])
    {
        $file_name = '이벤트_댓글현황_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['댓글종류', '이름', '아이디', '연락처', '이메일', '댓글', '작성일', '삭제여부'];

        $el_idx = $params[0];
        $arr_condition = $this->_getCommentListConditions($el_idx);
        $list = $this->eventLectureModel->listAllEventComment('excel', $arr_condition, null, null, ['A.CIdx' => 'desc']);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->eventLectureModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/
        
        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 합격수기 엑셀다운로드
     * @param array $params
     */
    public function memberSuccessExcel($params = [])
    {
        $file_name = '이벤트_합격수기_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['이름', '아이디', '연락처', '응시번호', '응시직렬', '응시지역', '합격구분', '등록일'];

        $el_idx = $params[0];
        $arr_condition = $this->_getMemberSuccessListConditions($el_idx);
        $list = $this->eventLectureModel->listAllEventMemberSuccess('excel', $arr_condition, null, null, ['a.EmsIdx' => 'DESC']);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->eventLectureModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
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
                'A.IsUse' => $this->_reqP('search_is_use'),
                'A.RequestType' => $this->_reqP('search_request_type')
            ],
            'ORG1' => [
                'LKB' => ['A.EventName' => $this->_reqP('search_value')],
                'LKR' => ['A.PromotionCode' => $this->_reqP('search_value')]
            ]
        ];

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            if ($this->_reqP('search_date_type') == 'I') {
                // 유효기간 검색
                $arr_condition['ORG2']['BET'] = [
                    'A.RegisterStartDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                    'A.RegisterEndDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                ];
                $arr_condition['ORG2']['RAW'] = ['(A.RegisterStartDate < "' => $this->_reqP('search_start_date') . '" AND A.RegisterEndDate > "' . $this->_reqP('search_end_date') . '")'];
            } elseif ($this->_reqP('search_date_type') == 'R') {
                // 등록일 기간 검색
                $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
            }
        }

        // 카테고리 대분류, 중분류 검색
        if(empty($this->_reqP('search_category')) === false || empty($this->_reqP('search_md_cate_code')) === false) {
            if(empty($this->_reqP('search_md_cate_code')) === false) {
                $raw_cate_code = ' AND MEC.CateCode = \'' . $this->_reqP('search_md_cate_code') . '\'';    //중분류
            } else {
                $raw_cate_code = ' AND MEC.CateCode LIKE \'' . $this->_reqP('search_category') . '%\'';    //대분류
            }
            $raw_cate_query = '
                SELECT MEC.ElIdx
                FROM lms_event_r_category AS MEC
                INNER JOIN lms_sys_category AS MSC ON MEC.CateCode = MSC.CateCode AND MEC.IsStatus = \'Y\'
                WHERE MEC.IsStatus = \'Y\'
                '.$raw_cate_code;
            $arr_condition['RAW'][' A.ElIdx IN ('] = $raw_cate_query . ')';
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
                'A.CommentUiCcd' => $this->_reqP('search_comment_ui_type_ccd')
                /*'A.IsStatus' => 'Y'*/
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

    private function _getMemberSuccessListConditions($el_idx)
    {
        $arr_condition = [
            'EQ' => [
                'a.ElIdx' => $el_idx,
                'a.IsStatus' => 'Y',
                'a.SerialCcd' => $this->_reqP('search_serial_ccd'),
                'a.CandidateAreaCcd' => $this->_reqP('search_candidate_area_ccd'),
                'a.SuccessType' => $this->_reqP('search_success_type')
            ],
            'ORG1' => [
                'LKB' => [
                    'b.MemName' => $this->_reqP('search_member_value'),
                    'b.MemId' => $this->_reqP('search_member_value'),
                    'a.CandidateNum' => $this->_reqP('search_member_value'),
                ]
            ]
        ];

        // 날짜 검색
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

        return $input_data;
    }

    /**
     * 프로모션 추가신청정보 회원 리스트
     * @param array $params
     * @return CI_Output
     */
    public function listApplyAjax($params = [])
    {
        $count = 0;
        $list = [];
        $el_idx = $params[0];

        if (empty($el_idx) === false) {
            $arr_condition = ['EQ' => ['B.ElIdx' => $el_idx]];

            $count = $this->eventLectureModel->listAllEventApply(true, $arr_condition);
            if ($count > 0) {
                $list = $this->eventLectureModel->listAllEventApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.EamIdx' => 'desc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * DP 강좌신청 삭제
     */
    public function delDisplayProduct()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'edp_idx', 'label' => '강좌신청 식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->delDisplayProduct($this->_reqP('edp_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 프로모션 추가신청정보 수정
     */
    public function updateAddApply()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'eaa_idx', 'label' => '프로모션 추가신청정보식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'person_limit_type', 'label' => '인원제한타입', 'rules' => 'trim|required|in_list[L,N]'],
            ['field' => 'person_limit', 'label' => '인원수', 'rules' => 'callback_validateRequiredIf[person_limit_type,L]|integer'],
            ['field' => 'name', 'label' => '신청정보명', 'rules' => 'trim|required'],
            ['field' => 'apply_start_datm', 'label' => '신청가능 시작일시', 'rules' => 'trim|required'],
            ['field' => 'apply_end_datm', 'label' => '신청가능 종료일시', 'rules' => 'trim|required'],
            ['field' => 'register_expire_status', 'label' => '접수상태', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventLectureModel->modifyAddApply($this->_reqP(null, false));
        $this->json_result($result, '프로모션 추가신청정보가 정상적으로 수정 되었습니다.', $result);
    }


}