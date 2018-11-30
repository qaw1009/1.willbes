<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publisher extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'bms/publisher');
    protected $helpers = array('text');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 출판사 관리 인덱스
     */
    public function index()
    {
        $this->load->view('bms/publisher/index');
    }

    /**
     * 출판사 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'P.wIsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'P.wPublIdx' => $this->_reqP('search_value'),
                    'P.wPublName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->publisherModel->listPublisher(true, $arr_condition);

        if ($count > 0) {
            $list = $this->publisherModel->listPublisher(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.wPublIdx' => 'desc']);
            
            // 출판사 설명 문자열 자르기 데이터 추가
            $list = array_map(function ($arr) {
                $arr['wPublShortDesc'] = ellipsize(str_replace(PHP_EOL, '', $arr['wPublDesc']), 30);
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
     * 출판사 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['101', '102']);

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->publisherModel->findPublisherForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('bms/publisher/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'tel1_ccd' => $codes['101'],
            'phone1_ccd' => $codes['102'],
        ]);
    }

    /**
     * 출판사 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'publ_name', 'label' => '출판사명', 'rules' => 'trim|required'],
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

        $result = $this->publisherModel->{$method . 'Publisher'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}