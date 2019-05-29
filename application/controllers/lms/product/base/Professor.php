<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\BaseController
{
    protected $models = array('product/base/sortMapping', 'product/base/professor', 'product/base/subject', 'sys/category', 'sys/code');
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

        $codes = $this->codeModel->getCcdInArray(['719']);

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->professorModel->findProfessorForModify($idx);

            if (empty($data) === true) {
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

            // 교수배너 데이터 조회
            $data['Bnr'] = $this->professorModel->listProfessorBanner($idx);
        }

        $this->load->view('product/base/professor/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_bm_idx' => $this->professorModel->_bm_idx,
            'arr_calc_target' => $this->professorModel->listProfessorCalcRateTarget(),
            'onlec_view_ccd' => $codes['719']

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
            //['field' => 'prof_curriculum', 'label' => '커리큘럼', 'rules' => 'trim|required'],
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

        /* 사용안함
        // 교수 + 과목 연결 캐쉬 저장
        if ($result === true) {
            $this->load->driver('caching');
            $this->caching->site_subject_professor->save();
        }*/

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 교수영역/배너 이미지 삭제
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

        if (starts_with($this->_reqP('img_type'), 'bnr_img_') === true) {
            $result = $this->professorModel->removeBannerImg($this->_reqP('img_type'), $this->_reqP('idx'));
        } else {
            $result = $this->professorModel->removeImg($this->_reqP('img_type'), $this->_reqP('idx'));
        }

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과목별 교수 정렬변경 인덱스
     */
    public function reorderList()
    {
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);  // 1차 카테고리 조회
        $arr_subject = $this->subjectModel->getSubjectArray();

        $this->load->view('product/base/professor/reorder', [
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
        ]);
    }

    /**
     * 과목별 교수 정렬변경 목록 조회
     * @return CI_Output
     */
    public function reorderListAjax()
    {
        $search_site_code = $this->_reqP('_search_site_code');
        $search_cate_code = $this->_reqP('_search_cate_code');
        $search_subject_idx = $this->_reqP('_search_subject_idx');
        $count = 0;
        $list = [];

        if (empty($search_site_code) === false && empty($search_site_code) === false && empty($search_site_code) === false) {
            $arr_condition = [
                'EQ' => [
                    'PF.SiteCode' => $search_site_code,
                    'PSC.CateCode' => $search_cate_code,
                    'PSC.SubjectIdx' => $search_subject_idx
                ],
                'IN' => ['PF.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
            ];

            $list = $this->professorModel->listSearchProfessorSubjectMapping(false, $arr_condition, null, null, ['PSC.OrderNum' => 'asc', 'PSC.PcIdx' => 'desc']);
            $count = count($list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 과목별 교수 정렬변경 저장
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

        $result = $this->professorModel->modifyProfessorSubjectMappingReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
