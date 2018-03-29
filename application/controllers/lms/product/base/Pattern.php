<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pattern extends \app\controllers\BaseController
{
    protected $models = array('product/base/pattern');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 학습형태 관리 인덱스
     */
    public function index()
    {
        $list = $this->patternModel->listpattern([], null, null, ['PP.PatternIdx' => 'asc']);

        $this->load->view('product/base/pattern/index',[
            'data' => $list
        ]);
    }

    /**
     * 학습형태 관리 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->patternModel->findPatternForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('product/base/pattern/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    /**
     * 학습형태 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'pattern_name', 'label' => '학습형태명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->patternModel->{$method . 'Pattern'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 학습형태 관리 정렬변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->patternModel->modifyPatternReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
