<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BasePromotion extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'downloadF', 'cert/certApplyF', 'couponF', 'support/supportBoardF', 'predict/predictF', '_lms/sys/code', 'DDayF');
    protected $helpers = array('download');
    protected $_paging_limit = 5;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        if (empty($params['code']) === true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $test_type = (int)element('type', $this->_reqG(null), '0');
        $arr_base['tab_id'] = element('tab', $this->_reqG(null), '1');
        $arr_base['promotion_code'] = $params['code'];
        $arr_base['spidx'] = (empty($params['spidx']) === false) ? $params['spidx'] : '';

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

        // 프로모션 라이브송출 조회
        $today_now = time();
        $arr_base['promotion_live_data'] = ($data['PromotionLiveType'] == 'Y') ? $this->eventFModel->listEventPromotionForLiveVideo($data['PromotionCode']) : [];
        $arr_base['promotion_live_file_link'] = 'javascript:alert(\'준비중입니다.\')';
        $arr_base['promotion_live_file_yn'] = 'N';
        if (empty($arr_base['promotion_live_data']) === false) {
            foreach ($arr_base['promotion_live_data'] as $row) {
                if(empty($row['FileStartDatm']) === false && empty($row['FileEndDatm']) === false){
                    $arr_base['promotion_live_file_link'] = 'javascript:alert(\'라이브 당일 '.$row['FileStartHour'].'시 '.$row['FileStartMin'].'분부터 다운받으실 수 있습니다.\')';
                    $arr_base['promotion_live_file_yn'] = 'N';
                    if($today_now >= strtotime($row['FileStartDatm']) && $today_now < strtotime($row['FileEndDatm'])){
                        $arr_base['promotion_live_file_link'] = '/promotion/downloadLiveVideo?file_idx='.$row['EplvIdx'].'&event_idx='.$row['PromotionCode'];
                        $arr_base['promotion_live_file_yn'] = 'Y';
                        break;
                    }
                }
            }
        }

        $arr_base['frame_params'] = 'cate_code=' . $this->_cate_code . '&event_idx=' . $data['ElIdx'] . '&pattern=ongoing';
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;
        $arr_base['register_limit_type'] = $this->eventFModel->_register_limit_type;
        $arr_base['test_type'] = $test_type;

        // 프로모션 추가 파라미터 배열처리
        $arr_promotion_params = [];
        if (empty($data['PromotionParams']) === false) {
            $temp_params = explode('&', $data['PromotionParams']);

            if (empty($temp_params) === false) {
                foreach ($temp_params as $key => $val) {
                    $arr_temp_params = explode('=', $val);
                    if (empty($arr_temp_params) === false && count($arr_temp_params) > 1) {
                        $arr_promotion_params[$arr_temp_params[0]] = $arr_temp_params[1];
                    }
                }
            }
        }
        // 댓글사용영역 데이터 가공처리
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        //이벤트 신청리스트 조회
        $arr_condition = ['EQ' => ['A.ElIdx' => $data['ElIdx'], 'A.IsStatus' => 'Y']];
        $arr_base['register_list'] = $this->eventFModel->listEventForRegister($arr_condition);

        //인원제한체크를 위한 특강별 회원 수
        $arr_register_member_cnt = [];
        $arr_base['register_member_list'] = [];
        if (empty($arr_base['register_list']) === false) {
            $get_register_idxs = array_pluck($arr_base['register_list'], 'Name', 'ErIdx');
            $arr_condition = [
                'IN' => ['ErIdx' => array_keys($get_register_idxs)]
            ];
            $arr_register_member_cnt = $this->eventFModel->getRegisterMemberCount($arr_condition);
            $arr_register_member_cnt = array_pluck($arr_register_member_cnt, 'MemCount', 'ErIdx');
        }
        foreach ($arr_base['register_list'] as $row) {
            $arr_base['register_member_list'][$row['ErIdx']]['PersonLimitType'] = $row['PersonLimitType'];
            $arr_base['register_member_list'][$row['ErIdx']]['PersonLimit'] = $row['PersonLimit'];
            $arr_base['register_member_list'][$row['ErIdx']]['RegisterExpireStatus'] = $row['RegisterExpireStatus'];
            $arr_base['register_member_list'][$row['ErIdx']]['mem_cnt'] = (empty($arr_register_member_cnt[$row['ErIdx']]) === true) ? '0' : $arr_register_member_cnt[$row['ErIdx']];
        }

        // 인증여부 추출
        $apply_result = null;
        //인증 파람값이 존재한다면
        if (empty($arr_promotion_params['cert']) === false && empty($this->session->userdata('mem_idx')) === false) {
            $apply_result = $this->certApplyFModel->findApplyByCertIdx($arr_promotion_params['cert'])['CaIdx'];
        }

        // 등록파일 데이터 조회
        $file_link = array();
        $file_yn = array();
        $list_event_file = $this->eventFModel->listEventForFile($data['ElIdx']);

        for($i = 0; $i <= 99; $i++){
            $file_link[$i] = "javascript:alert('준비중입니다.')";
            $file_yn[$i] = 'N';
        }

        $file_data_promotion = $list_event_file;
        $arrCircle = array(0 => '①', 1 => '②', 2 => '③', 3 => '④', 4 => '⑤', 5 => '⑥', 6 => '⑦');

        foreach ($file_data_promotion as $key => $row){
            $fileidx = $row['Ordering'];
            $file_link[$fileidx] = '/promotion/download?file_idx='.$row['EfIdx'].'&event_idx='.$data['ElIdx'];
            $file_yn[$fileidx] = 'Y';
        }

        //공지사항조회
        $arr_noti_condition = [
            'EQ' => [
                'BmIdx' => '102',
                'IsUse' => 'Y',
                'PromotionCode' => $arr_base['promotion_code']
            ]
        ];
        if (empty($arr_promotion_params['predict_idx']) === false) {
            $arr_noti_condition['EQ'] = array_merge($arr_noti_condition['EQ'], ['PredictIdx' => $arr_promotion_params['predict_idx']]);
        }
        $arr_base['notice_list'] = $this->supportBoardFModel->listBoard(false, $arr_noti_condition,'','BoardIdx, IsBest, Title, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm', 4, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);

        //합격예측 데이터
        $arr_base['predict_data'] = $this->_predictData((empty($arr_promotion_params['PredictIdx']) === true ? 'null' : $arr_promotion_params['PredictIdx']));

        //가데이터 제외
        $arr_preg_condition = [
            'NOT' => [
                'MemIdx' => '1000000'
            ]
        ];
        $arr_base['predict_register_cnt'] = $this->predictFModel->getCntPreregist((empty($arr_promotion_params['PredictIdx']) === true ? 'null' : $arr_promotion_params['PredictIdx']), $arr_preg_condition);

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

        //모바일체크
        $this->load->library('user_agent');
        $ismobile = $this->agent->is_mobile();

        $view_file = 'willbes/'.APP_DEVICE.'/promotion/' . $this->_site_code . '/' . $arr_base['promotion_code'];
        $this->load->view($view_file, [
            'arr_base' => $arr_base,
            'data' => $data,
            'arrCircle' => $arrCircle,
            'cert_apply' => $apply_result,
            'file_data_promotion' => $file_data_promotion,
            'arr_promotion_params' => $arr_promotion_params,
            'file_link' => $file_link,
            'file_yn' => $file_yn,
            'ismobile' => $ismobile
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
        $get_page_params = 'cate_code=' . element('cate_code', $arr_input) . '&event_idx=' . element('event_idx', $arr_input) . '&pattern=' . element('pattern', $arr_input) . '&bottom_cafe_type=' . element('bottom_cafe_type', $arr_input, 'Y');
        $onoff_type = element('pattern', $arr_input);

        $comment_create_type = '1';
        if ($onoff_type == 'ongoing') {
            if ($this->session->userdata('is_login') === false) {
                $comment_create_type = '2';
            }
        } else {
            $comment_create_type = '3';
        }

        $arr_base['page_url'] = '/promotion/frameCommentList/' . $comment_type;
        $arr_base['comment_create_type'] = $comment_create_type;

        $arr_base['set_params '] = [
            'event_idx' => element('event_idx', $arr_input),
            'comment_ui_ccd' => $comment_type
        ];

        $arr_condition = [
            'EQ' => [
                'a.ElIdx' => element('event_idx', $arr_input),
                'a.CommentUiCcd' => $comment_type,
                'a.IsStatus' => 'Y',
                'b.SiteCode' => $this->_site_code,
                'c.CateCode' => element('cate_code', $arr_input),
            ]
        ];

        $total_rows = $this->eventFModel->listEventForCommentPromotion(true, $arr_condition);
        $paging = $this->pagination($arr_base['page_url'] . '?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, $paging['limit'], $paging['offset'], ['a.CIdx' => 'DESC']);
        }

        // 공지사항 조회 (페이징 처리 없음)
        $arr_base['notice_data'] = $this->eventFModel->getEventForNotice(element('event_idx', $arr_input)
            , 'BoardIdx, ElIdx, Title, Content, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') AS RegDate');
        $view_file = 'willbes/pc/promotion/frame_comment_list_' . $comment_type;

        $this->load->view($view_file, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'list' => $list,
            'paging' => $paging,
            'method' => $method
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

        $result = $this->eventFModel->addEventComment($this->_reqP(null, false), 'promotion');
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
        $this->downloadFModel->saveLogEvent($event_idx);

        $file_data = $this->downloadFModel->getFileData($event_idx, $file_idx, 'event_promotion_live_video');
        if (empty($file_data) === true) {
            show_alert('조회된 파일이 없습니다.', 'close', '');
        }

        $file_path = $file_data['FilePath'];
        $file_name = $file_data['RealFileName'];
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
        //제공구분 : 포인트, 쿠폰
        $give_type = $this->_req('give_type');
        //제공식별자 : 쿠폰식별자
        $give_idx = $this->_req('give_idx');
        //발급 제한 갯수
        $limit_count = 1;
        
        //이벤트식별자
        $el_idx = (int)$this->_req('event_code');

        // 댓글 참여 여부 확인
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
            return $this->json_error("소문내기 댓글을 등록해 주세요.");
        }

        if(empty($give_type)) {
            return $this->json_error("정보가 존재하지 않습니다.");
        }

        if($give_type === 'coupon') {
            if(empty($give_idx)) {
                return $this->json_error("정보가 존재하지 않습니다.");
            }else{
                //발급여부 확인
                $check = $this->couponFModel->checkIssueCoupon($give_idx);

                if((int)$check >= $limit_count) {
                    return $this->json_error("이미 발급받은 쿠폰이 존재합니다.");
                }

                //쿠폰발급
                $result = $this->couponFModel->addMemberCoupon($give_type, $give_idx);

                if($result['ret_cd'] != true) {
                    return $this->json_error($result["ret_msg"]);
                }

                $this->json_result($result['ret_cd'] , $result, $result);
            }
        }
    }

    /**
     * 합격예측 데이터
     * @param $predict_idx
     * @return mixed
     * TODO : 합격예측 고도화 시 합격예측 모델 호출 메소드 확인 필요
     */
    private function _predictData($predict_idx)
    {
        $column = 'PredictIdx, MockPart';
        $column .= ',DATE_FORMAT(PreServiceSDatm, \'%Y%m%d%H%i\') AS PreServiceSDatm, DATE_FORMAT(PreServiceEDatm, \'%Y%m%d%H%i\') AS PreServiceEDatm';
        $column .= ',DATE_FORMAT(ServiceSDatm, \'%Y%m%d%H%i\') AS ServiceSDatm, DATE_FORMAT(ServiceEDatm, \'%Y%m%d%H%i\') AS ServiceEDatm';
        $arr_condition = ['EQ' => ['PredictIdx' => $predict_idx,'IsUse' => 'Y']];
        return $this->predictFModel->findPredictData($arr_condition, $column);
    }
}
