<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'bms/author');
    protected $helpers = array('text');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 저자 관리 인덱스
     */
    public function index()
    {
        $this->load->view('bms/author/index');
    }

    /**
     * 저자 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'AU.wIsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'AU.wAuthorIdx' => $this->_reqP('search_value'),
                    'AU.wAuthorName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->authorModel->listAuthor(true, $arr_condition);

        if ($count > 0) {
            $list = $this->authorModel->listAuthor(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['AU.wAuthorIdx' => 'desc']);
            
            // 출판사 설명 문자열 자르기 데이터 추가
            $list = array_map(function ($arr) {
                $arr['wAuthorShortDesc'] = ellipsize(str_replace(PHP_EOL, '', $arr['wAuthorDesc']), 30);
                return $arr;
            }, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 저자 등록/수정 폼
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
            $data = $this->authorModel->findAuthorForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('bms/author/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
        ]);
    }

    /**
     * 저자 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'author_name', 'label' => '저자명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->authorModel->{$method . 'Author'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}