<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePromotion extends \app\controllers\FrontController
{
    protected $models = array('eventF');
    protected $helpers = array();
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
        $promotion_code = (int)$params['code'];
        $data = $this->eventFModel->findEventForPromotion($promotion_code, $test_type);

        if (empty($data) === true) {
            show_alert('조회에 실패했습니다.', 'back');
        }

        // 조회수 업데이트
        $result = $this->eventFModel->modifyEventRead($data['ElIdx']);
        if($result !== true) {
            show_alert('이벤트 조회시 오류가 발생되었습니다.', '/');
        }

        // 접근 로그 저장
        if ($test_type != 1) {
            $this->eventFModel->saveLogPromotion($this->_site_code, $this->_cate_code, $promotion_code);
        }

        $arr_base['frame_params'] = 'cate_code='.$this->_cate_code.'&event_idx='.$data['ElIdx'].'&pattern=ongoing';
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_comment_use_area_type;

        // 댓글사용영역 데이터 가공처리
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        $view_file = 'willbes/pc/promotion/'.$this->_site_code.'/'.$promotion_code;
        $this->load->view($view_file, [
            'arr_base' => $arr_base,
            'data' => $data
        ],false);
    }

    /**
     * 프로모션 댓글리스트
     */
    public function frameCommentList()
    {
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

        $arr_base['page_url'] = '/promotion/frameCommentList';
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
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listEventForCommentPromotion(false, $arr_condition, $paging['limit'], $paging['offset'], ['A.ElIdx' => 'DESC']);
        }

        $view_file = 'willbes/pc/promotion/frame_comment_list';
        $this->load->view($view_file, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'list' => $list,
            'paging' => $paging,
            'method' => $method
        ],false);
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
}