<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnonymousComment extends \app\controllers\FrontController
{
    protected $models = array('support/baseSupportF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_default_path = '/support/AnonymousComment';
    protected $_paging_limit = 20;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 댓글 목록
     */
    public function index()
    {
        $list = [];
        $arr_input = $this->_reqG(null, false);
        $get_params = http_build_query($arr_input);

        $board_idx = (int)element('board_idx',$arr_input);
        $get_page_params = '&board_idx='.$board_idx;

        $arr_condition = [
            'RAW' => [
                'a.BoardIdx = ' => $board_idx
            ],
            'EQ' => [
                'a.IsUse' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ];

        $column = 'STRAIGHT_JOIN a.BoardCmtIdx, a.Comment, a.RegNickName, b.MemName, b.MemId, b.MemIdx, DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS RegDatm';
        $order_by = ['a.BoardCmtIdx' => 'DESC'];
        $total_rows = $this->baseSupportFModel->listComment(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->baseSupportFModel->listComment(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
        }

        $this->load->view('support/frame/list_anonymous_comment', [
            'method' => 'POST',
            'default_path' => $this->_default_path,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list'=>$list,
            'paging' => $paging
        ]);
    }

    /**
     * 댓글 등록
     */
    public function commentStore()
    {
        $rules = [
            ['field' => 'board_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'reg_nick_name', 'label' => '닉네임', 'rules' => 'trim|required'],
            ['field' => 'comment', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->baseSupportFModel->addComment($this->_reqP(null, false));
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
            $result = $this->baseSupportFModel->delComment($comment_idx);
        }
        $this->json_result($result, '삭제되었습니다.', $result);
    }

    /**
     * 댓글 미사용 처리
     * @param array $params
     */
    public function commentDisuse($params = [])
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
            $result = $this->baseSupportFModel->disuseComment($comment_idx);
        }
        $this->json_result($result, '삭제되었습니다.', $result);
    }
}