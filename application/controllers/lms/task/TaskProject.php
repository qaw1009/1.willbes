<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskProject extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'task/task');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 업무프로젝트관리
     * @return mixed
     */
    public function index()
    {
        $this->load->view("task/taskProject/index", [
        ]);
    }

    /**
     * 업무프로젝트관리 목록 조회
     * @return mixed
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'TP.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'TP.TprojectName' => $this->_reqP('search_value'),
                    'TP.TprojectDesc' => $this->_reqP('search_value')
                ]
            ],
            'BDT' => [
                'TP.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]
            ]
        ];
        $list = [];
        $count = $this->taskModel->listTaskProject(true, $arr_condition, null, null, []);
        if ($count > 0) {
            $list = $this->taskModel->listTaskProject(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['TP.TpIdx' => 'DESC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 업무프로젝트관리 등록/수정 폼
     * @param array
     * @return mixed
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = $idx = null;

        if (empty($params[0]) === false) {
            $idx  = $params[0];
            $method = 'PUT';

            $data = $this->taskModel->findTaskProject($idx);
            if (empty($data) === true) show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("task/taskProject/create", [
            'data' => $data,
            'idx' => $idx,
            'method' => $method
        ]);
    }

    /**
     * 업무프로젝트관리 글 등록
     * @return mixed
     */
    public function store()
    {
        $method = 'add';
        $idx = $result = null;
        $rules = [
            ['field' => 'tproject_name', 'label' => '업무프로젝트명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'tproject_desc', 'label' => '설명', 'rules' => 'trim|max_length[200]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];
        if ($this->validate($rules) === false) return;

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        try {
            $input_data = $this->_setInputData($this->_reqP(null, false));
            $result = $this->taskModel->{$method.'TaskProject'}($input_data, $idx);
        } catch (\Exception $e) {
            $this->json_error('등록/수정 도중에 오류가 발생하였습니다.');
        }

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 업무프로젝트관리 상세 페이지
     * @param array
     * @return mixed
     */
    public function read($params = [])
    {
        $idx = $params[0];
        if (empty($idx) === true) show_error('잘못된 접근 입니다.');

        $data = $this->taskModel->findTaskProject($idx);
        if (empty($data) === true) show_error('데이터 조회에 실패했습니다.');

        return $this->load->view('task/taskProject/read', [
            'idx' => $idx,
            'data' => $data
        ]);
    }

    /**
     * 업무프로젝트관리 삭제
     * @param array
     * @return mixed
     */
    public function remove($params = [])
    {
        $idx = $params[0];
        $result = null;
        if(empty($idx) === true) {
            $this->json_error('삭제 도중에 오류가 발생하였습니다.');
        }

        try {
            $result = $this->taskModel->removeTaskProject($idx);
        } catch (\Exception $e) {
            $this->json_error('삭제 도중에 오류가 발생하였습니다.');
        }

        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 화면 파라미터 설정
     * @param $input
     * @return array
     */
    private function _setInputData($input){
        return [
            'TprojectName' => element('tproject_name', $input),
            'TprojectDesc' => element('tproject_desc', $input),
            'IsUse' => element('is_use', $input)
        ];
    }

}