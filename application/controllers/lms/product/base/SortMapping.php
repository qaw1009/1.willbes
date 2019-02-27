<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SortMapping extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'product/base/sortMapping');
    protected $helpers = array();
    private $_ccd = [
        'Series' => '614',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 소트매핑 관리 인덱스
     */
    public function index()
    {
        $list = $this->sortMappingModel->listSortMapping();

        $this->load->view('product/base/sort_mapping/index', [
            'data' => $list
        ]);
    }

    /**
     * 소트매핑 과정/과목 연결 등록 폼
     * @param array $params
     */
    public function create($params = [])
    {
        // 전달 데이터 설정
        $_params = ['_conn_type' => $params[0], '_site_code' => $params[1], '_cate_code' => $params[2], '_child_ccd' => ''];

        $arr_series = [];
        if ($_params['_conn_type'] == 'course') {
            $title = '과정';
            $col_key = 'Course';
            $arr_subject_idx = $this->sortMappingModel->listCourseMapping($_params['_site_code'], $_params['_cate_code']);
        } else {
            $title = '과목';
            $col_key = 'Subject';

            // 복합연결일 경우 직렬 공통코드 전달
            if ($_params['_conn_type'] == 'complex') {
                $arr_series = $this->codeModel->getCcd($this->_ccd['Series']);
                $_params['_child_ccd'] = ($params[3] === '000000') ? array_keys($arr_series)[0] : $params[3];
            }

            $arr_subject_idx = $this->sortMappingModel->listSubjectMapping($_params['_conn_type'], $_params['_site_code'], $_params['_cate_code'], $_params['_child_ccd']);
        }

        $this->load->view('product/base/sort_mapping/create', [
            'title' => $title,
            'col_key' => $col_key,
            'params' => $_params,
            'cate_route_name' => str_replace('>', ' > ', $this->categoryModel->getCategoryRouteName($_params['_site_code'], $_params['_cate_code'])),
            'arr_subject_idx' => $arr_subject_idx,
            'arr_series' => $arr_series
        ]);
    }

    /**
     * 소트매핑 복합연결 과목 목록
     * @param array $params
     */
    public function list($params = [])
    {
        $_params = [
            '_conn_type' => $params[0],
            '_site_code' => $params[1],
            '_cate_code' => $params[2],
        ];

        $list = $this->sortMappingModel->listChildSubjectMapping($_params['_site_code'], $_params['_cate_code'], $this->_ccd['Series']);

        $this->load->view('product/base/sort_mapping/list_' . $_params['_conn_type'], [
            'params' => $_params,
            'cate_route_name' => str_replace('>', ' > ', $this->categoryModel->getCategoryRouteName($_params['_site_code'], $_params['_cate_code'])),
            'data' => $list
        ]);
    }

    /**
     * 소트매핑 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => '_conn_type', 'label' => '소트매핑조건', 'rules' => 'trim|required|in_list[course,subject,complex]'],
            ['field' => '_site_code', 'label' => '사이트코드', 'rules' => 'trim|required|integer'],
            ['field' => '_cate_code', 'label' => '카테고리코드', 'rules' => 'trim|required|integer'],
            ['field' => 'child_ccd', 'label' => '대분류', 'rules' => 'callback_validateRequiredIf[_conn_type,complex]'],
            ['field' => 'subject_idx[]', 'label' => '과목', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->sortMappingModel->replaceSortMapping($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
