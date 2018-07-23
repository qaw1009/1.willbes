<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agreement extends \app\controllers\BaseController
{
    protected $models = array('site/terms');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {
        $this->load->view('site/terms/agreement/index',[
        ]);
    }

    public function listAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 약관동의 등록
     */
    public function create()
    {
        $method = 'POST';
        $data = null;
        $sup_idx = null;

        $this->load->view("site/terms/agreement/create", [
            'method' => $method,
            'data' => $data,
            'sup_idx' => $sup_idx,
            'content_type' => $this->termsModel->_content_types[0]
        ]);
    }

    public function store()
    {
        $method = 'add';

        $rules = [
            ['field' => 'site_code', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'content_type', 'label' => '약관타입', 'rules' => 'trim|required|in_list[A,P]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'link_url', 'label' => '링크주소', 'rules' => 'trim|required'],
            ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[R,Y,N]']
        ];

        if (empty($this->_reqP('sup_idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'sup_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->termsModel->{$method . 'Terms'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}