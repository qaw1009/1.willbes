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
                'U.SiteCode' => $this->_reqP('search_site_code'),
                'U.IsUse' => $this->_reqP('search_is_use'),
                'U.wIsUse' => $this->_reqP('search_w_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'U.ProfIdx' => $this->_reqP('search_value'),
                    'U.wProfId' => $this->_reqP('search_value'),
                    'U.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->professorModel->listProfessor(true, $arr_condition);

        if ($count > 0) {
            $list = $this->professorModel->listProfessor(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['U.ProfIdx' => 'desc']);
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

            // 참조자료 조회
            $refer_data = $this->professorModel->listProfessorRefer($idx, 'type');
            
            // 기본정보 + 참조자료
            $data = array_merge($data, element('string', $refer_data, []), element('attach', $refer_data, []));

            // 카테고리 + 과목 매핑 데이터 조회
            $data['SubjectMapping'] = $this->professorModel->listProfessorSubjectMapping($idx);

            // 강사료 정산 데이터 조회
            $data['CalcRate'] = $this->professorModel->listProfessorCalcRate($idx);
        }

        $this->load->view('product/base/professor/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_bm_idx' => $this->professorModel->_bm_idx,
            'arr_calc_target' => $this->professorModel->listProfessorCalcRateTarget()
        ]);
    }

    /**
     * 교수 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'wprof_idx', 'label' => '교수선택', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_nickname', 'label' => '교수닉네임', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'subject_mapping_code[]', 'label' => '카테고리 정보', 'rules' => 'trim|required'],
            ['field' => 'prof_curriculum', 'label' => '커리큘럼', 'rules' => 'trim|required'],
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

        $result = $this->professorModel->{$method . 'Professor'}($this->_reqP(null, false));

        // 교수 + 과목 연결 캐쉬 저장
        if ($result === true) {
            $this->load->driver('caching');
            $this->caching->site_subject_professor->save();
        }

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 교수영역 이미지 삭제
     */
    public function destroyImg()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'img_type', 'label' => '이미지 구분', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorModel->removeImg($this->_reqP('img_type'), $this->_reqP('idx'));

        $this->json_result($result, '저장 되었습니다.', $result);
    }    
}
