<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'pms/professor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수 기본정보 관리 인덱스
     */
    public function index()
    {
        $this->load->view('pms/professor/index');
    }

    /**
     * 교수 기본정보 관리 목록 조회
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
                    'P.wProfIdx' => $this->_reqP('search_value'),
                    'P.wProfId' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->professorModel->listProfessor(true, $arr_condition);

        if ($count > 0) {
            $list = $this->professorModel->listProfessor(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.wProfIdx' => 'desc']);

            // 사용하는 코드값 조회
            $codes = $this->codeModel->getCcd('111');

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wContentCcdName' => ['wContentCcd' => $codes],
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 교수 기본정보 등록/수정 폼
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

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcd('111');

        // 권한유형별 CP사 목록 조회
        $cps = $this->professorModel->listProfessorCp($idx);

        $this->load->view('pms/professor/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'content_ccd' => $codes,
            'cps' => $cps,
            'attach_img_cnt' => $this->professorModel->_attach_img_cnt
        ]);
    }

    /**
     * 교수 아이디 중복 체크
     * @return CI_Output
     */
    public function idCheck()
    {
        $rules = [
            ['field' => 'prof_id', 'label' => '아이디', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = true;
        $is_duplicate = $this->professorModel->isDuplicateProfId($this->_reqP('prof_id'));
        if ($is_duplicate === true) {
            return $this->json_error('이미 사용중인 교수아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
        }

        $this->json_result($result, '사용 가능한 교수아이디 입니다. 사용하시겠습니까?', $result);
    }

    /**
     * 교수 기본정보 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'cp_idx[]', 'label' => '적용CP', 'rules' => 'trim|required'],
            ['field' => 'content_ccd', 'label' => '대표콘텐츠유형', 'rules' => 'trim|required'],
            ['field' => 'prof_name', 'label' => '교수명', 'rules' => 'trim|required'],
            ['field' => 'prof_id', 'label' => '교수아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'sample_url', 'label' => '맛보기영상경로', 'rules' => 'trim|valid_url'],
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

        $result = $this->professorModel->{$method . 'Professor'}($this->_reqP(null, false));
        //echo var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}