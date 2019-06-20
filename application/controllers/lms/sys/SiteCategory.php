<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteCategory
{
    private $_CI;

    public function __construct()
    {
        $this->_CI =& get_instance();

        // load model
        $this->_CI->load->loadModels(['sys/category', 'sys/site']);
    }

    /**
     * 사이트 카테고리 인덱스
     */
    public function index()
    {
        $list = $this->_CI->categoryModel->listAllCategory();

        $this->_CI->load->view('sys/site_category/index', [
            'data' => $list
        ]);
    }

    /**
     * 카테고리 등록/수정 폼
     * @param array $params 등록 : SiteCode/CateDepth/ParentCateCode / 수정 : CateCode
     * @return CI_Output
     */
    public function create($params = [])
    {
        $data = null;
        $parent_categories = null;

        if (isset($params[2]) === true) {
            // 메뉴 등록
            $method = 'POST';
            $idx = null;
            $site_code = (empty($params[1]) === false) ? intval($params[1]) : '';
            $cate_depth = $params[2];
            $parent_cate_code = $params[3];
            $group_cate_code = $parent_cate_code;
        } else {
            // 메뉴 수정
            $method = 'PUT';
            $idx = $params[1];

            $data = $this->_CI->categoryModel->findCategoryForModify($idx);
            if (empty($data) === true) {
                return $this->_CI->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $site_code = $data['SiteCode'];
            $cate_depth = $data['CateDepth'];
            $parent_cate_code = $data['ParentCateCode'];
            $group_cate_code = $data['GroupCateCode'];
        }

        if ($cate_depth > 1) {
            // 대분류 목록 조회
            $parent_categories['LG'] = $this->_CI->categoryModel->listCategory(['EQ' => ['SiteCode' => $site_code, 'ParentCateCode' => 0]], null, null, ['OrderNum' => 'asc']);
        }

        $this->_CI->load->view('sys/site_category/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'site_codes' => $this->_CI->siteModel->getSiteArray(),
            'site_code' => $site_code,
            'cate_depth' => $cate_depth,
            'parent_cate_code' => $parent_cate_code,
            'group_cate_code' => $group_cate_code,
            'parent_categories' => $parent_categories
        ]);
    }

    /**
     * 카테고리 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'cate_name', 'label' => '분류명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'is_default', 'label' => '디폴트여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if (empty($this->_CI->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'group_cate_code', 'label' => '대분류', 'rules' => 'callback_validateRequiredIf[cate_depth,2]'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->categoryModel->{$method . 'Category'}($this->_CI->_reqP(null, false));

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 카테고리 정렬변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->categoryModel->modifyCategoriesReorder(json_decode($this->_CI->_reqP('params'), true));

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }
}