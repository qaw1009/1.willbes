<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/wCode', 'sys/category', 'product/base/course', 'product/base/subject', 'product/base/professor', 'bms/book');
    protected $helpers = array();
    private $_ccd = [
        'wSale' => '112',
        'DispType' => '619'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재 관리 인덱스
     */
    public function index()
    {
        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('bms/book/index', [
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'arr_sale_ccd' => $this->wCodeModel->getCcd($this->_ccd['wSale']),
        ]);
    }

    /**
     * 교재 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $this->_reqP('search_site_code'),
                'BC.CateCode' => $this->_reqP('search_md_cate_code'),
                'P.IsUse' => $this->_reqP('search_is_use'),
                'VWB.wIsUse' => $this->_reqP('search_w_is_use'),
                'VWB.wSaleCcd' => $this->_reqP('search_sale_ccd'),
                'P.IsNew' =>$this->_reqP('search_new'),
                'P.IsBest' =>$this->_reqP('search_best'),
            ],
            'LKR' => [
                'BC.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
            'LKB' => [
                'BPS.SubjectIdxs' => $this->_reqP('search_subject_idx'),
                'BPS.ProfIdxs' => $this->_reqP('search_prof_idx'),
            ],
            'ORG1' => [
                'LKB' => [
                    'P.ProdCode' => $this->_reqP('search_value'),
                    'P.ProdName' => $this->_reqP('search_value')
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'VWB.wPublName' => $this->_reqP('search_publ_author'),
                    'VWB.wAuthorNames' => $this->_reqP('search_publ_author'),
                ]
            ],
        ];

        $list = [];
        $count = $this->bookModel->listBook(true, $arr_condition);

        if ($count > 0) {
            $list = $this->bookModel->listBook(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 교재 관리 등록/수정 폼
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
            $data = $this->bookModel->findBookForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회 (단일)
            $arr_book_category = $this->bookModel->listBookCategory($idx);
            $data['CateCode'] = key($arr_book_category);
            $data['CateRouteName'] = current($arr_book_category);

            // 과목/교수 연결 데이터 조회
            $data['ProfSubject'] = $this->bookModel->listBookProfessorSubject($idx);

            if (isset($params[1]) === true && $params[1] == 'copy') {
                $method = 'POST';
                $idx = null;
            }
        }

        $arr_course = $this->courseModel->getCourseArray();

        $this->load->view('bms/book/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_disp_type_ccd' => $this->codeModel->getCcd($this->_ccd['DispType']),
            'arr_sale_ccd' => $this->wCodeModel->getCcd($this->_ccd['wSale']),
            'arr_course' => $arr_course
        ]);
    }

    /**
     * 교재 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'school_year', 'label' => '대비학년도', 'rules' => 'trim|required'],
            ['field' => 'course_idx', 'label' => '과정', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_subject_idx[]', 'label' => '과목/교수 정보', 'rules' => 'trim|required'],
            ['field' => 'book_name', 'label' => '교재명', 'rules' => 'trim|required'],
            ['field' => 'disp_type_ccd', 'label' => '노출위치', 'rules' => 'trim|required'],
            ['field' => 'is_free', 'label' => '무료여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'org_price', 'label' => '정상가', 'rules' => 'trim|required|integer'],
            ['field' => 'dc_amt', 'label' => '할인량', 'rules' => 'trim|required|integer'],
            ['field' => 'dc_type', 'label' => '할인구분', 'rules' => 'callback_validateRequiredIf[is_free,N]|in_list[R,P]'],
            ['field' => 'sale_price', 'label' => '판매가', 'rules' => 'trim|required|integer'],
            ['field' => 'is_coupon', 'label' => '쿠폰적용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'is_point_saving', 'label' => '북포인트적용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'point_saving_amt', 'label' => '적립포인트', 'rules' => 'callback_validateRequiredIf[is_point_saving,Y]'],
            ['field' => 'point_saving_type', 'label' => '적립구분', 'rules' => 'callback_validateRequiredIf[is_point_saving,Y]|in_list[R,P]'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'wbook_idx', 'label' => '교재 선택', 'rules' => 'trim|required|integer'],
                ['field' => 'cate_code', 'label' => '카테고리 선택', 'rules' => 'trim|required|integer'],
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

        $result = $this->bookModel->{$method . 'Book'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 교재 신규/추천 수정
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '신규/추천여부', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->bookModel->modifyBooksByColumn(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
