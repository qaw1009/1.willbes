<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePromotion extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'downloadF', 'cert/certApplyF','couponF');
    protected $helpers = array('download');
    protected $_paging_limit = 5;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        if (empty((int)$params['code']) === true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $test_type = (int)element('type', $this->_reqG(null), '0');
        $arr_base['promotion_code'] = (int)$params['code'];

        //인증식별자
        //$cert_idx = element('cert', $this->_reqG(null), '');

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

        $arr_base['frame_params'] = 'cate_code=' . $this->_cate_code . '&event_idx=' . $data['ElIdx'] . '&pattern=ongoing';
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;
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

        // 인증여부 추출
        $apply_result = null;
        //인증 파람값이 존재한다면
        if (empty($arr_promotion_params['cert']) === false && empty($this->session->userdata('mem_idx')) === false) {
            $apply_result = $this->certApplyFModel->findApplyByCertIdx($arr_promotion_params['cert'])['CaIdx'];
        }

        // 등록파일 데이터 조회
        $list_event_file = $this->eventFModel->listEventForFile($data['ElIdx']);
        $file_data_promotion = $list_event_file;
        $arrCircle = array(0 => '①', 1 => '②', 2 => '③', 3 => '④', 4 => '⑤', 5 => '⑥', 6 => '⑦');

        $view_file = 'willbes/pc/promotion/' . $this->_site_code . '/' . $arr_base['promotion_code'];
        $this->load->view($view_file, [
            'arr_base' => $arr_base,
            'data' => $data,
            'arrCircle' => $arrCircle,
            'cert_apply' => $apply_result,
            'file_data_promotion' => $file_data_promotion,
            'arr_promotion_params' => $arr_promotion_params
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
        $get_page_params = 'cate_code=' . element('cate_code', $arr_input) . '&event_idx=' . element('event_idx', $arr_input) . '&pattern=' . element('pattern', $arr_input);
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
            'event_idx' => element('event_idx', $arr_input)
        ];

        $arr_condition = [
            'EQ' => [
                'a.ElIdx' => element('event_idx', $arr_input),
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

    public function popup($param = [])
    {
        $arr_base['promotion_code'] = $param[0];
        $test_type = (int)element('type', $this->_reqG(null), '0');
        $arr_base['method'] = 'POST';

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

        $this->load->view('willbes/pc/promotion/popup/' . $arr_base['promotion_code'], [
            'arr_base' => $arr_base
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

        if(empty($give_type)) {
            return $this->json_result('', '정보가 존재하지 않습니다.', '');
        }

        if($give_type === 'coupon') {
            if(empty($give_idx)) {
                $this->json_result('', '정보가 존재하지 않습니다.', '');
            }else{
                //발급여부 확인
                $check = $this->couponFModel->checkIssueCoupon($give_idx);

                if($check > $limit_count) {
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


}
