<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BasePromotion extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'downloadF', 'cert/certApplyF', 'couponF', 'support/supportBoardF', 'predict/predictF', '_lms/sys/code', 'DDayF', 'product/lectureF', 'eventsurvey/survey', '_lms/product/base/subject', 'memberF');
    protected $helpers = array('download');
    protected $_paging_limit = 5;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    // 이벤트 상품 그룹별 호출
    private $_event_learn_ccd = [
        '615001' => 'OnLecture',        // 단강좌
        '615003' => 'AdminpackLecture', // 운영자패키지
        '615004' => 'PeriodpackLecture', // 기간제패키지
        '615005' => 'FreeLecture'       // 무료강좌
    ];

    // 강좌유형
    private $_lec_type_ccd = [
        '607001' => '일반강좌',
        '607002' => '특강',
        '607003' => '직장인/재학생반'
    ];

    // 상품유형
    private $_pattern_ccd = [
        '615001' => 'only',     // 단강좌
        '615003' => 'package',  // 운영자패키지
        '615004' => 'period',    // 기간제패키지
        '615005' => 'free'      // 무료강좌
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        if (empty($params['code']) === true || !is_numeric($params['code'])) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        if(empty($params['spidx']) === false){
            if(!is_numeric($params['spidx'])){
                show_alert('잘못된 접근 입니다.', 'back');
            }
        }

        if(empty($params['SsIdx']) === false){
            if(!is_numeric($params['SsIdx'])){
                show_alert('잘못된 접근 입니다.', 'back');
            }
        }

        $test_type = (int)element('type', $this->_reqG(null), '0');
        $arr_base['tab_id'] = element('tab', $this->_reqG(null), '1');
        $arr_base['promotion_code'] = $params['code'];
        $arr_base['spidx'] = (empty($params['spidx']) === false) ? $params['spidx'] : '';
        $arr_base['SsIdx'] = (empty($params['SsIdx']) === false) ? $params['SsIdx'] : '';
        $arr_base['get_data'] = $this->_reqG(null);

        //인증식별자
        //$cert_idx = element('cert', $this->_reqG(null), '');

        //프로모션데이터 조회
        $data = $this->eventFModel->findEventForPromotion($arr_base['promotion_code'], $test_type);
        if (empty($data) === true) {
            show_alert('조회에 실패했습니다.', 'back');
        }

        // 조회수 업데이트
        $result = $this->eventFModel->modifyEventRead($data['ElIdx']);
        if ($result !== true) {
            show_alert('이벤트 조회시 오류가 발생되었습니다.', '/');
        }

        // 접근 로그 저장
        if ($test_type != 1) {
            $this->eventFModel->saveLogPromotion($this->_site_code, $this->_cate_code, $arr_base['promotion_code']);
        }

        // 프로모션 부가정보 조회
        $arr_base['promotion_otherinfo_data'] = $this->eventFModel->listEventPromotionForOther($data['PromotionCode']);

        // 임용 추가처리
        if(config_app('SiteGroupCode') == '1011'){
            $arr_base['promotion_otherinfo_group'] = $this->_getPromotionOtherinfoData($arr_base['promotion_otherinfo_data'],'group',$data['ElIdx']);
            $arr_base['promotion_otherinfo_professor'] = $this->_getPromotionOtherinfoData($arr_base['promotion_otherinfo_data'],'professor',$data['ElIdx']);

            //과목조회
            $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);
            if(in_array(ENVIRONMENT, ['local','development']) === true) {
                $arr_base['max_subject_idx'] = 1895;
            }else{
                $arr_base['max_subject_idx'] = 1995;
            }
        }

        // 프로모션 라이브송출 조회
        $promotion_live_data = $this->_getPromotionLiveData($data['PromotionCode'],$data['PromotionLiveType'],$data['ElIdx']);
        $arr_base['promotion_live_data'] = $promotion_live_data['promotion_live_data'];
        $arr_base['promotion_live_file_link'] = $promotion_live_data['promotion_live_file_link'];
        $arr_base['promotion_live_file_yn'] = $promotion_live_data['promotion_live_file_yn'];
        $arr_base['promotion_live_file_list'] = $promotion_live_data['file_download_list'];

        // 프로모션 추가 파라미터 배열처리
        $arr_promotion_params = $this->_getPromotionParams($data['PromotionParams']);

        // 댓글사용영역 데이터 가공처리
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        //이벤트 신청리스트 조회
        $arr_condition = ['EQ' => ['A.ElIdx' => $data['ElIdx'], 'A.IsStatus' => 'Y', 'A.IsUse' => 'Y']];
        $arr_base['register_list'] = $this->eventFModel->listEventForRegister($arr_condition);
        //if(config_app('SiteGroupCode') == '1011'){ // 임용 추가처리
            //$arr_base['register_list_prod_data'] = $this->_getRegisterListProdData($arr_base['register_list']);
            //$arr_base['register_prof_group_data'] = $this->_getProfGroupData($arr_base['register_list_prod_data']);
        //}

        //인원 제한 체크를 위한 특강별 회원 수
        $arr_base['register_member_list'] = [];
        if (empty($arr_base['register_list']) === false) {
            $arr_base['register_member_list'] = $this->_getRegisterMemberList($arr_base['register_list']);
            $arr_base['register_date_list'] = $this->_getRegisterDateList($arr_base['register_list']);
        }

        // 등록파일 데이터 조회
        $list_event_file = $this->eventFModel->listEventForFile($data['ElIdx']);
        list($file_link,$file_yn) = $this->_getEventFileData($list_event_file,$data['ElIdx']);
        $arrCircle = array(0 => '①', 1 => '②', 2 => '③', 3 => '④', 4 => '⑤', 5 => '⑥', 6 => '⑦');

        //공지사항 조회
        $arr_noti_condition = ['EQ' => ['IsUse' => 'Y']];
        if (empty($arr_promotion_params['PredictIdx']) === false) {
            //합격예측인 경우
            $arr_noti_condition['EQ'] = array_merge($arr_noti_condition['EQ'], ['PredictIdx' => $arr_promotion_params['PredictIdx'], 'BmIdx' => '102']);
            $arr_base['predict_data'] = $this->_predictData($arr_promotion_params['PredictIdx']);
            $arr_base['predict_register_cnt'] = $this->predictFModel->getCntPreregist($arr_promotion_params['PredictIdx'], ['NOT' => ['MemIdx' => '1000000']]);
            $arr_base['predict_count'] = $this->predictFModel->getPredictMakeCount($arr_promotion_params['PredictIdx']);
        }else{
            //일반프로모션인 경우
            $arr_noti_condition['EQ'] = array_merge($arr_noti_condition['EQ'], ['PromotionCode' => $arr_base['promotion_code'],'BmIdx' => '106']);
        }
        $arr_base['notice_list'] = $this->supportBoardFModel->listBoard(false, $arr_noti_condition, '', 'BoardIdx, IsBest, Title, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm', 4, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);

        //D-day 조회
        if(empty($arr_promotion_params['DIdx']) === false) {
            $arr_dday_condition = [
                'EQ' => [
                    'a.SiteCode' => $this->_site_code,
                    'b.CateCode' => $this->_cate_code,
                    'a.DIdx' => $arr_promotion_params['DIdx']
                ]
            ];
            $arr_base['dday_data'] = $this->DDayFModel->getDDays($arr_dday_condition);
        }

        // 신청 통계
        if(empty($arr_promotion_params['stats_data']) === false && $arr_promotion_params['stats_data'] == 'Y') {
            $arr_base['stats_data'] = $this->eventFModel->getStatsEventMemberForEtcValue($data['ElIdx']);
        }

        // 상품 수강후기
        if(empty($arr_promotion_params['reply_prod_code']) === false) {
            $reply_prod_data = $this->lectureFModel->findProductByProdCode('on_lecture', $arr_promotion_params['reply_prod_code'], '', ['EQ' => ['IsUse' => 'Y']]);
            if (empty($reply_prod_data) === false) {
                $data['ProdCode'] = $reply_prod_data['ProdCode'];
                $data['ProdName'] = $reply_prod_data['ProdName'];
                $data['SubjectIdx'] = $reply_prod_data['SubjectIdx'];
                $data['ProfIdx'] = $reply_prod_data['ProfIdx'];
            }
        }

        // DP상품 그룹핑
        if(empty($data['data_option_ccd']) === false && isset($data['data_option_ccd']['660005']) === true) {
            $arr_base['display_product_data'] = $this->_getDpGroupdata($data['ElIdx']);
        }

        // 이벤트 추가신청정보 조회
        $arr_base['add_apply_data'] = $this->eventFModel->listEventPromotionForAddApply($data['ElIdx']);

        $arr_base['add_apply_member_login_count'] = 0;
        $register_count = '';
        $apply_result = null;
        $add_frame_params = '';
        $survey_count = 0;

        // 로그인 후 실행
        if(sess_data('is_login') === true){
            // 이벤트 신청횟수
            $arr_condition = ['EQ' => ['B.ElIdx' => $data['ElIdx'], 'A.IsStatus' => 'Y', 'A.MemIdx' => $this->session->userdata('mem_idx')]];
            $arr_base['add_apply_member_login_count'] = $this->eventFModel->getApplyMember($arr_condition, true);

            // 신청리스트 참여 여부 체크
            if(empty($arr_promotion_params['register_chk_yn']) === false && $arr_promotion_params['register_chk_yn'] == 'Y'){
                $arr_condition = ['EQ' => ['B.ElIdx' => $data['ElIdx'], 'A.MemIdx' => $this->session->userdata('mem_idx')]];
                $register_count = $this->eventFModel->getRegisterMember($arr_condition);
            }

            // 인증여부 추출
            if (empty($arr_promotion_params['cert']) === false) {
                $apply_result = $this->certApplyFModel->findApplyByCertIdx($arr_promotion_params['cert'])['CaIdx'];
            }

            // 설문조사 참여 여부 체크
            if(empty($arr_promotion_params['survey_chk_yn']) === false && $arr_promotion_params['survey_chk_yn'] == 'Y' && empty($arr_promotion_params['SsIdx']) === false){
                $survey_count = $this->surveyModel->findSurveyForAnswer($arr_promotion_params['SsIdx']);
                $add_frame_params = '&survey_chk_yn=Y&survey_count=' . $survey_count;
            }

            // 상품 구매여부 체크
            if(empty($arr_promotion_params['prod_chk_yn']) === false && $arr_promotion_params['prod_chk_yn'] == 'Y'){
                $arr_base['order_count'] = 0;

                if(empty($arr_promotion_params['arr_prod_code']) === false){
                    $arr_prod_code = explode(',', $arr_promotion_params['arr_prod_code']);
                    foreach ($arr_prod_code as $prod_code){
                        $order_count = $this->eventFModel->getOrderForEventMemberCount($prod_code, $this->session->userdata('mem_idx'));
                        $arr_base['order_count'] += $order_count;
                    }
                }
            }

            // 회원정보 조회
            if(empty($arr_promotion_params['member_info_chk_yn']) === false && $arr_promotion_params['member_info_chk_yn'] == 'Y'){
                $arr_base['member_info'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $this->session->userdata('mem_idx')]]);
            }
        }

        $arr_base['frame_params'] = 'cate_code=' . $this->_cate_code . '&event_idx=' . $data['ElIdx'] . '&pattern=ongoing&promotion_code=' . $data['PromotionCode'] . $add_frame_params;
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;
        $arr_base['register_limit_type'] = $this->eventFModel->_register_limit_type;
        $arr_base['test_type'] = $test_type;

        //모바일체크
        $this->load->library('user_agent');
        $ismobile = $this->agent->is_mobile();

        $view_file = 'willbes/'.APP_DEVICE.'/promotion/' . $this->_site_code . '/' . $arr_base['promotion_code'];
        $this->load->view($view_file, [
            'arr_base' => $arr_base,
            'data' => $data,
            'arrCircle' => $arrCircle,
            'cert_apply' => $apply_result,
            'file_data_promotion' => $list_event_file,
            'arr_promotion_params' => $arr_promotion_params,
            'file_link' => $file_link,
            'file_yn' => $file_yn,
            'ismobile' => $ismobile,
            'lec_type' => $this->_lec_type_ccd,
            'pattern_ccd' => $this->_pattern_ccd,
            'survey_count' => $survey_count,
            'register_count' => $register_count,
        ], false);
    }

    /**
     * 프로모션 댓글리스트
     * @param array $params
     */
    public function frameCommentList($params = [])
    {
        $comment_type = $params[0];
        $list = [];
        $method = 'POST';
        $arr_input = array_merge($this->_reqG(null));

        //하단 카페 링크 사용여부
        $get_page_params = 'cate_code=' . element('cate_code', $arr_input);
        $get_page_params .= '&event_idx=' . element('event_idx', $arr_input);
        $get_page_params .= '&pattern=' . element('pattern', $arr_input);
        $get_page_params .= '&bottom_cafe_type=' . element('bottom_cafe_type', $arr_input, 'Y');
        $get_page_params .= '&promotion_code=' . element('promotion_code', $arr_input);

        $onoff_type = element('pattern', $arr_input);
        $event_idx = element('event_idx', $arr_input);
        $promotion_code = element('promotion_code', $arr_input);

        //프로모션데이터 조회
        $promotion_data = $this->eventFModel->findEventForPromotion($promotion_code);
        if (empty($promotion_data) === true) {
            show_alert('조회에 실패했습니다.', 'back');
        }

        // 강사 이모티콘 이미지
        $arr_comment_ui_type_ccd = explode(',', $promotion_data['CommentUiTypeCcds']);
        if(in_array('713003', $arr_comment_ui_type_ccd) === true){
            $arr_base['comment_emoticon_image'] =  explode(',', $promotion_data['CommentEmoticonImages']);
        }

        $comment_create_type = '1';
        if ($onoff_type == 'ongoing') {
            if ($this->session->userdata('is_login') !== true) {
                $comment_create_type = '2';
            }
        } else {
            $comment_create_type = '3';
        }

        if ($this->session->userdata('is_login') !== true) {
            $comment_create_type = '2';
            $arr_base['login_url'] = element('login_url', $arr_input);
        }

        $arr_base['max_byte'] = element('max_byte', $arr_input);
        $arr_base['write_yn'] = element('write_yn', $arr_input);
        $arr_base['survey_chk_yn'] = element('survey_chk_yn', $arr_input);
        $arr_base['survey_count'] = element('survey_count', $arr_input);
        $arr_base['page_url'] = '/promotion/frameCommentList/' . $comment_type;
        $arr_base['comment_create_type'] = $comment_create_type;
        $arr_base['is_public'] = element('is_public', $arr_input);

        $arr_base['set_params '] = [
            'event_idx' => $event_idx,
            'comment_ui_ccd' => $comment_type
        ];

        $arr_condition = [
            'EQ' => [
                'a.ElIdx' => $event_idx,
                'a.CommentUiCcd' => $comment_type,
                'a.IsStatus' => 'Y',
                'b.SiteCode' => $this->_site_code,
                'c.CateCode' => element('cate_code', $arr_input),
            ]
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->eventFModel->listEventForCommentPromotion(true, $arr_condition, [], [], [], element('cate_code', $arr_input));
        $paging = $this->pagination($arr_base['page_url'] . '?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, $paging['limit'], $paging['offset'], ['a.CIdx' => 'DESC'], element('cate_code', $arr_input));
        }

        // 공지사항 조회 (페이징 처리 없음)
        $arr_base['notice_data'] = $this->eventFModel->getEventForNotice($event_idx
            , 'BoardIdx, ElIdx, Title, Content, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') AS RegDate');

        $view_file = 'willbes/' . APP_DEVICE . '/promotion/frame_comment_list_' . $comment_type;

        $this->load->view($view_file, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'list' => $list,
            'paging' => $paging,
            'method' => $method,
            'give_timing' => element('give_timing', $arr_input)
        ], false);
    }

    public function commentStore()
    {
        $rules = [
            ['field' => 'event_idx', 'label' => '이벤트식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'comment_ui_ccd', 'label' => '이벤트UI식별자', 'rules' => 'trim|required'],
            ['field' => 'event_comment', 'label' => '댓글', 'rules' => 'trim|required']
        ];

        if (empty($this->session->userdata('mem_idx')) === true) {
            $this->json_error('로그인 후 이용해주세요.');
            return;
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->eventFModel->addEventComment($this->_reqP(null, false), 'promotion', $this->_site_code);
        $this->json_result($result, '등록되었습니다.', $result);
    }

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

    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'event');
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
        }

        $file_path = $file_data['FilePath'] . $file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
    }

    public function downloadNotice()
    {
        $file_idx = $this->_reqG('file_idx');
        $board_idx = $this->_reqG('board_idx');
        $this->downloadFModel->saveLog($board_idx);

        $file_data = $this->downloadFModel->getFileData($board_idx, $file_idx);
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    /**
     * 보조자료 다운로드
     */
    public function downloadReference()
    {
        $file_idx = $this->_reqG('file_idx');
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'prof_reference');
        if (empty($file_data) === true) {
            show_alert('조회된 파일이 없습니다.', 'close', '');
        }

        $file_path = $file_data['FilePath'] . $file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
    }

    /**
     * 이벤트 프로모션 라이브 스트리밍 자료 다운로드
     */
    public function downloadLiveVideo()
    {
        $file_idx = $this->_reqG('file_idx');
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx,$file_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'event_promotion_live_video');
        if (empty($file_data) === true) {
            show_alert('조회된 파일이 없습니다.', 'close', '');
        }

        $file_path = $file_data['FilePath'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
    }

    /**
     * 이벤트 프로모션 상세설정 첨부파일 다운로드
     */
    public function downloadOtherFile()
    {
        $file_idx = $this->_reqG('file_idx');
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'event_promotion_otherinfo');
        if (empty($file_data) === true) {
            show_alert('조회된 파일이 없습니다.', 'close', '');
        }

        $file_path = $file_data['FilePath'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
    }

    /**
     * 하드코딩 파일 다운로드
     */
    public function downloadHardCodingFile()
    {
        $event_idx = $this->_reqG('event_idx');
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_path = urldecode($this->_reqG('path',false));
        $file_name = urldecode($this->_reqG('fname',false));
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.', 'close', '');
    }

    public function popup($param = [])
    {
        $arr_base['promotion_code'] = $param[0];
        $arr_base['selected'] = element('selected', $this->_reqG(null));
        $test_type = element('type', $this->_reqG(null), '0');
        $arr_base['method'] = 'POST';

        /**
         * 인증정보 추가
         */
        $arr_cert = [];
        $cert_idx = element('cert', $this->_reqG(null), null);
        if(empty($cert_idx) != true) {
            $arr_condition['EQ'] = [
                //'A.SiteCode' => $this->_site_code
            ];
            $arr_cert['cert_idx'] = $cert_idx;
            $arr_cert['cert_data'] = $this->certApplyFModel->findCertByCertIdx($cert_idx,$arr_condition);

            if(empty($this->session->userdata('mem_idx')) == false) {
                $arr_cert['apply_result'] = $this->certApplyFModel->findApplyByCertIdx($cert_idx);
            }

            $codes = $this->codeModel->getCcdInArray(['711','712']);
            $arr_cert['kind_ccd'] = $codes['711'];
            $arr_cert['area_ccd'] = $codes['712'];
        }

        if (empty($arr_base['promotion_code']) === true) {
            show_alert('잘못된 접근 입니다.', 'close', '');
        }

        $arr_base['data'] = $this->eventFModel->findEventForPromotion($arr_base['promotion_code'], $test_type);
        if (empty($arr_base['data']) === true) {
            show_alert('프로모션 조회에 실패했습니다.', '');
        }

        //이벤트 신청리스트 조회
        $arr_condition = ['EQ' => ['A.ElIdx' => $arr_base['data']['ElIdx'], 'A.IsStatus' => 'Y']];
        $arr_base['register_list'] = $this->eventFModel->listEventForRegister($arr_condition);
        if (empty($arr_base['register_list']) === true) {
            show_alert('이벤트 조회에 실패했습니다.', '');
        }

        // 등록파일 데이터 조회
        $list_event_file = $this->eventFModel->listEventForFile($arr_base['data']['ElIdx']);
        if (empty($list_event_file) === false) {
            $arr_base['arr_file'] = $list_event_file[0];
        }

        //이벤트 신청 여부 조회
        $regist_member = $this->eventFModel->getRegisterMember(['EQ' => ['B.ElIdx' => $arr_base['data']['ElIdx'], 'A.MemIdx' => $this->session->userdata('mem_idx')]]);
        if (empty($regist_member) === false) {
            $arr_base['regist_member'] = $regist_member[0];
        }

        $this->load->view('willbes/pc/promotion/popup/' . $arr_base['promotion_code'], [
            'arr_base' => $arr_base,
            'arr_cert' => $arr_cert
        ], false);
    }

    /**
     * 프로모션 단순 HTML 뷰 페이지 연결
     * @param array $param
     */
    public function html($param = [])
    {
        $promotion_code = $param[0];
        $type = $this->_reqG('type');
        $view_file = $promotion_code . (empty($type) === false ? '_' . $type : '');
        
        if (empty($promotion_code) === true) {
            show_alert('잘못된 접근 입니다.', 'close', '');
        }

        $this->load->view('willbes/pc/promotion/html/' . $view_file, [
        ], false);
    }

    public function promotionEventCheck()
    {

        $give_type = $this->_req('give_type');  //제공구분 : 포인트, 쿠폰
        $give_idx = $this->_req('give_idx');    //제공식별자 : 쿠폰식별자
        $give_overlap_chk = $this->_req('give_overlap_chk');    //다건 쿠폰 중복체크 여부
        $comment_chk_yn = $this->_req('comment_chk_yn');    //댓글참여 확인 여부
        $comment_ccd = $this->_req('comment_ccd');    //댓글 유형 확인;
        $regist_chk_yn = $this->_req('regist_chk_yn');    //프로모션 참여 확인 여부
        $el_idx = (int)$this->_req('event_code');   //이벤트식별자
        $limit_count = (empty($this->_req('limit_count')) === false) ? $this->_req('limit_count') : 1;   //발급 제한 갯수
        $result = null;

        if(empty($give_type) === true) {
            return $this->json_error('정보가 존재하지 않습니다.');
        }

        // 댓글 참여 여부 확인
        if(empty($comment_chk_yn) || $comment_chk_yn == 'Y') {
            $arr_condition = [
                'EQ' => [
                    'a.MemIdx' => $this->session->userdata('mem_idx'),
                    'a.ElIdx' => $el_idx,
                    'a.IsStatus' => 'Y',
                    'a.IsUse' => 'Y',
                    'a.CommentUiCcd' => $comment_ccd
                ]
            ];
            $comment_result = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, 1, 0, ['a.CIdx' => 'DESC']);
            if (empty($comment_result) === true) {
                // 에러 문구 설정
                $err_msg = empty($this->_req('msg')) === false ? $this->_req('msg') : '소문내기 댓글을 등록해 주세요.';
                return $this->json_error($err_msg);
            }
        }

        // *** 프로모션 신청여부 확인 ***
        if(empty($regist_chk_yn) === false && $regist_chk_yn == 'Y') {
            if ($this->eventFModel->getMemberForRegisterCount($el_idx, ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx')]]) == 0) {
                return $this->json_error('이벤트를 먼저 신청해 주세요.');
            }
        }

        // *** 쿠폰 발급 체크 ***
        if($give_type === 'coupon' || (empty($give_overlap_chk) === false && empty($give_overlap_chk) === 'N')) {

            if($give_overlap_chk == 'coupons'){
                // 다건 쿠폰 쿠폰별 아이디당 1회 발급
                if(empty($this->_req('arr_give_idx_chk')) === true) {
                    return $this->json_error('쿠폰 정보가 존재하지 않습니다.');
                }

                $arr_give_idx = explode(',', $this->_req('arr_give_idx_chk'));
                $give_idx = element($give_idx,$arr_give_idx);
            }

            if(empty($give_idx)) {
                return $this->json_error('정보가 존재하지 않습니다.');
            }

            //발급여부 확인
            $check = $this->couponFModel->checkIssueCoupon($give_idx);
            if((int)$check >= $limit_count) {
                return $this->json_error('이미 발급받은 쿠폰이 존재합니다.');
            }

            $result = $this->_addPromotionCoupon($give_type, $give_idx);

        } else if($give_type === 'coupons') {
            //다건 쿠폰 선택
            $arr_give_idx_chk = $this->_req('arr_give_idx_chk'); //체크할 쿠폰식별자. 콤마(,)붙인 형식으로 전송
            try {
                //한개 쿠폰 허용
                $arr_give_idx = explode(',', $arr_give_idx_chk);
                foreach($arr_give_idx as $key => $val) {
                    $check = $this->couponFModel->checkIssueCoupon($val);
                    if((int)$check >= $limit_count) {
                        return $this->json_error('이미 발급받은 쿠폰이 존재합니다.');
                    }
                }

                foreach($arr_give_idx as $key => $val) {
                    $result = $this->_addPromotionCoupon('coupon', $val);
                }
            } catch (\Exception $e) {
                return $this->json_error('쿠폰 발급 도중 오류가 발생 하였습니다.');
            }
        }

        return $result;
    }

    /**
     * 합격예측 데이터
     * @param $predict_idx
     * @return mixed
     * TODO : 합격예측 고도화 시 합격예측 모델 호출 메소드 확인 필요
     */
    private function _predictData($predict_idx)
    {
        $column = 'PredictIdx, MockPart, PreServiceIsUse, ServiceIsUse, AnswerServiceIsUse';
        $column .= ',DATE_FORMAT(PreServiceSDatm, \'%Y%m%d%H%i\') AS PreServiceSDatm, DATE_FORMAT(PreServiceEDatm, \'%Y%m%d%H%i\') AS PreServiceEDatm';
        $column .= ',DATE_FORMAT(ServiceSDatm, \'%Y%m%d%H%i\') AS ServiceSDatm, DATE_FORMAT(ServiceEDatm, \'%Y%m%d%H%i\') AS ServiceEDatm';
        $column .= ',DATE_FORMAT(AnswerServiceSDatm, \'%Y%m%d%H%i\') AS AnswerServiceSDatm, DATE_FORMAT(AnswerServiceEDatm, \'%Y%m%d%H%i\') AS AnswerServiceEDatm';
        $arr_condition = ['EQ' => ['PredictIdx' => $predict_idx,'IsUse' => 'Y']];
        return $this->predictFModel->findPredictData($arr_condition, $column);
    }

    /**
     * 프로모션 쿠폰 발급
     * @param $give_type
     * @param $give_idx
     * @return mixed
     */
    private function _addPromotionCoupon($give_type, $give_idx)
    {
        //쿠폰발급
        $result = $this->couponFModel->addMemberCoupon($give_type, $give_idx);

        if($result['ret_cd'] != true) {
            return $this->json_error($result["ret_msg"]);
        }
        return $this->json_result($result['ret_cd'] , $result, $result);
    }

    /**
     * 프로모션 신청 여부 체크
     * @return mixed
     */
    public function checkEventRegisterMember()
    {
        $el_idx = $this->_req('el_idx');

        if(empty($el_idx)) {
            return $this->json_error('이벤트 정보가 없습니다.');
        }

        // *** 프로모션 신청여부 확인 ***
        if ($this->eventFModel->getMemberForRegisterCount($el_idx, ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx')]]) == 0) {
            return $this->json_error('이벤트를 신청한뒤 이용 가능한 서비스입니다.');
        }
        return $this->json_result(true);
    }

    /**
     * 이벤트 상세설정 조회
     * @param array $otherinfo_data
     * @param null $option (group: 그룹핑, professor: 교수정보)
     * @param integer $el_idx
     * @return mixed
     */
    private function _getPromotionOtherinfoData($otherinfo_data = [], $option = null, $el_idx = null)
    {
        $data = [];

        foreach ($otherinfo_data as $key => $val){
            if($option == 'professor'){
                if(empty($val['FileFullPath']) === false){
                    $data[$val['EpoIdx']]['download_url'] = site_url('/promotion/downloadOtherFile?file_idx='.$val['EpoIdx'].'&event_idx='.$el_idx);
                }else{
                    $data[$val['EpoIdx']]['download_url'] = "javascript:alert('준비중입니다.')";
                }

                if(empty($val['wHD']) === false){
                    $data[$val['EpoIdx']]['player_sample'] = "javascript:fnPlayerSample('" . $val['OtherData1'] . "','" . $val['wUnitIdx'] . "','WD');";
                }else{
                    $data[$val['EpoIdx']]['player_sample'] = "javascript:alert('준비중입니다.')";
                }
            }

            if($option == 'group'){
                if(empty($val['FileFullPath']) === false){
                    $val['download_url'] = site_url('/promotion/downloadOtherFile?file_idx='.$val['EpoIdx'].'&event_idx='.$el_idx);
                }else{
                    $val['download_url'] = "javascript:alert('자료 없이 수강 가능한 샘플 강의입니다.')";
                }

                if(empty($val['OrderNum']) === false){
                    $data[$val['OrderNum']][] = $val;
                }
            }
        }

        return $data;
    }

    /**
     * 이벤트 라이브송출 조회
     * @param integer $PromotionCode
     * @param string $PromotionLiveType
     * @param integer $el_idx
     * @return mixed
     */
    private function _getPromotionLiveData($PromotionCode = null, $PromotionLiveType = 'N', $el_idx = null)
    {
        $today_now = time();
        $data = [];
        $data['promotion_live_data'] = [];
        $data['file_download_list'] = [];
        $data['promotion_live_file_link'] = 'javascript:alert(\'준비중입니다.\')';
        $data['promotion_live_file_yn'] = 'N';

        if($PromotionLiveType == 'Y'){
            $data['promotion_live_data'] = $this->eventFModel->listEventPromotionForLiveVideo($PromotionCode);

            if (empty($data['promotion_live_data']) === false) {
                foreach ($data['promotion_live_data'] as $key => $row) {
                    $data['file_download_list'][$key]['download_yn'] = 'N';

                    if(empty($row['FileStartDatm']) === false && empty($row['FileEndDatm']) === false) {
                        if($today_now >= strtotime($row['FileStartDatm']) && $today_now < strtotime($row['FileEndDatm'])) {
                            $data['promotion_live_file_link'] = '/promotion/downloadLiveVideo?file_idx='.$row['EplvIdx'].'&event_idx='.$el_idx;
                            $data['promotion_live_file_yn'] = 'Y';

                            $data['file_download_list'][$key]['file_link'] = $data['promotion_live_file_link'];
                            $data['file_download_list'][$key]['download_yn'] = $data['promotion_live_file_yn'];
                        }
                    }

                }
            }
        }

        return $data;
    }

    /**
     * 이벤트 라이브송출 조회
     * @param array $PromotionParams
     * @return mixed
     */
    private function _getPromotionParams($PromotionParams = [])
    {
        $arr_promotion_params = [];
        if (empty($PromotionParams) === false) {
            $temp_params = explode('&', $PromotionParams);

            if (empty($temp_params) === false) {
                foreach ($temp_params as $key => $val) {
                    $arr_temp_params = explode('=', $val);
                    if (empty($arr_temp_params) === false && count($arr_temp_params) > 1) {
                        if (empty($arr_temp_params[2]) === false) {
                            $arr_promotion_params[$arr_temp_params[0]] = $arr_temp_params[1] . '=' . $arr_temp_params[2];
                        } else {
                            $arr_promotion_params[$arr_temp_params[0]] = $arr_temp_params[1];
                        }
                    }
                }
            }
        }

        return $arr_promotion_params;
    }

    /**
     * 인원 제한 체크를 위한 특강별 회원 수
     * @param array $register_list
     * @return mixed
     */
    private function _getRegisterMemberList($register_list = [])
    {
        $data = [];
        $get_register_idxs = array_pluck($register_list, 'Name', 'ErIdx');
        $arr_condition = ['IN' => ['ErIdx' => array_keys($get_register_idxs)]];
        $arr_register_member_cnt = $this->eventFModel->getRegisterMemberCount($arr_condition);
        $arr_register_member_cnt = array_pluck($arr_register_member_cnt, 'MemCount', 'ErIdx');

        foreach ($register_list as $row) {
            $data['register_member_list'][$row['ErIdx']]['PersonLimitType'] = $row['PersonLimitType'];
            $data['register_member_list'][$row['ErIdx']]['PersonLimit'] = $row['PersonLimit'];
            $data['register_member_list'][$row['ErIdx']]['RegisterExpireStatus'] = $row['RegisterExpireStatus'];
            $data['register_member_list'][$row['ErIdx']]['mem_cnt'] = (empty($arr_register_member_cnt[$row['ErIdx']]) === true) ? '0' : $arr_register_member_cnt[$row['ErIdx']];
        }

        return $data['register_member_list'];
    }

    /**
     * 신청 리스트 전체 날짜 조회
     * @param array $register_list
     * @return mixed
     */
    private function _getRegisterDateList($register_list = [])
    {
        $data['register_start_date'] = [];
        $data['register_end_date'] = [];

        foreach ($register_list as $row) {
            array_push($data['register_start_date'], $row['RegisterStartDatm']);
            array_push($data['register_end_date'], $row['RegisterEndDatm']);
        }

        return $data;
    }

    /**
     * 등록파일 데이터 조회
     * @param array $list_event_file
     * @param integer $ElIdx
     * @return mixed
     */
    private function _getEventFileData($list_event_file = [], $ElIdx = null)
    {
        $file_link = array();
        $file_yn = array();

        for($i = 0; $i <= 99; $i++){
            $file_link[$i] = "javascript:alert('준비중입니다.')";
            $file_yn[$i] = 'N';
        }

        foreach ($list_event_file as $key => $row){
            $fileidx = $row['Ordering'];
            $file_link[$fileidx] = '/promotion/download?file_idx='.$row['EfIdx'].'&event_idx='.$ElIdx;
            $file_yn[$fileidx] = 'Y';
        }

        return [$file_link,$file_yn];
    }

    /**
     * 이벤트 DP상품 그룹핑
     * @param integer $ElIdx
     * @return mixed
     */
    private function _getDpGroupdata($ElIdx = null)
    {
        $display_group_data = [];

        // DP상품 조회
        $display_product_data = $this->eventFModel->listEventDisplayProductV2($ElIdx);
        foreach ($display_product_data as $key => $val) {
            $display_group_data[$val['GroupOrderNum']][$val['LearnPatternCcd']][] = $val['ProdCode'];
        }

        // DP상품 그룹핑
        foreach ($display_group_data as $group => $data) {
            foreach ($data as $ccd => $arr_prod_idx) {
                $display_group_data[$group][$ccd] = $this->_getEventProductGroup($ccd,$arr_prod_idx);

                if (empty($display_group_data[$group][$ccd]) === false) {
                    foreach ($display_group_data[$group][$ccd] as $idx => $row) {
                        $display_group_data[$group][$ccd][$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                        if (in_array($this->_pattern_ccd[$ccd], ['only','free']) === true) {
                            $display_group_data[$group][$ccd][$idx]['ProdBookData'] = json_decode($row['ProdBookData'], true);
                            $display_group_data[$group][$ccd][$idx]['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                            $display_group_data[$group][$ccd][$idx]['ProfReferData'] = json_decode($row['ProfReferData'], true);
                        }
                    }
                }
            }
        }

        return $display_group_data;
    }

    /**
     * 이벤트 신청리스트 지급상품 조회(단강좌)
     * @param array $register_list
     * @return mixed
     */
    private function _getRegisterListProdData($register_list = [])
    {
        foreach ($register_list as $key => $val){
            if(empty($val['LearnPatternCcd']) === false && empty($val['ProdCode']) === false && $this->_pattern_ccd[$val['LearnPatternCcd']] == 'only'){
                $register_list[$key]['prod_data'] = $this->_getEventProductGroup($val['LearnPatternCcd'],[$val['ProdCode']]);

                if (empty($register_list[$key]['prod_data']) === false) {
                    foreach ($register_list[$key]['prod_data'] as $idx => $row) {
                        $register_list[$key]['prod_data'][$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                        if ($this->_pattern_ccd[$val['LearnPatternCcd']] == 'only') {
                            $register_list[$key]['prod_data'][$idx]['ProdBookData'] = json_decode($row['ProdBookData'], true);
                            $register_list[$key]['prod_data'][$idx]['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                            $register_list[$key]['prod_data'][$idx]['ProfReferData'] = json_decode($row['ProfReferData'], true);
                        }
                    }
                }
            }
        }

        return $register_list;
    }

    /**
     * 이벤트 신청리스트 교수 그룹핑(단강좌)
     * @param array $register_list_prod_data
     * @return mixed
     */
    private function _getProfGroupData($register_list_prod_data=[])
    {
        $new_prod_data = [];
        $prof_group_data = [];
        foreach ($register_list_prod_data as $key => $val){
            $new_prod_data[$val['SubjectIdx']][$val['ProfIdx']][] = $val;
        }

        foreach ($new_prod_data as $subject_idx => $data){
            foreach ($data as $prof_idx => $arr){
                foreach ($arr as $key => $val){
                    if(empty($val['prod_data']) === false){
                        $val['prod_count'] = count($arr);
                        $val['ProdPriceData'] = $val['prod_data'][0]['ProdPriceData'];
                        $val['ProdBookData'] = $val['prod_data'][0]['ProdBookData'];
                        unset($val['prod_data']);
                        $prof_group_data[$val['SubjectIdx']][] = $val;
                    }
                }
            }
        }

        return $prof_group_data;
    }

    /**
     * 이벤트 DP상품 그룹 데이터 조회 (단강좌, 운영자패키지, 기간제패키지)
     * @param $learn_ccd
     * @param array $arr_prod_idx
     * @return mixed
     */
    private function _getEventProductGroup($learn_ccd,$arr_prod_idx)
    {
        $method = element($learn_ccd,$this->_event_learn_ccd);

        if(empty($method) === true || empty($arr_prod_idx) === true) {
            return false;
        }

        return $this->eventFModel->{'getProduct' . $method}($arr_prod_idx);
    }

}
