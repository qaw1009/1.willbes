<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\BaseController
{
    protected $models = array('product/base/sortMapping', 'product/base/professor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수 관리 인덱스
     */
    public function index()
    {
        $this->load->view('product/base/professor/index', [
        ]);
    }

    /**
     * 교수 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->_reqP('search_value'),
                    'WP.wProfId' => $this->_reqP('search_value'),
                    'WP.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->professorModel->listProfessor(true, $arr_condition);

        if ($count > 0) {
            $list = $this->professorModel->listProfessor(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.ProfIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 교수 관리 등록/수정 폼
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
            $data = $this->professorModel->findProfessorForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('product/base/professor/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    /**
     * 교수 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'course_name', 'label' => '교수명', 'rules' => 'trim|required'],
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

        $result = $this->courseModel->{$method . 'Course'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 교수 관리 정렬변경
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

        $result = $this->courseModel->modifyCourseReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
