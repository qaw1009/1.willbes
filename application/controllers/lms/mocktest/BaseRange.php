<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 과목별문제영역
 * ======================================================================
 *
 * 로직흐름: 등록폼 -> 과목 기본정보 저장 -> 변경폼 바로이동 -> 변경저장 OR 출제챕터 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRange extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'mocktest/mockCommon', 'mocktest/baseRange');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 메인
     */
    public function index()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();

        list($data, $modata) = $this->baseRangeModel->list();

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/base/range/index', [
            'siteCodeDef' => '2002', //$this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'data' => $data,
            'moData' => $modata,
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 문제영역 등록폼
     */
    public function create()
    {
        $this->load->view('mocktest/base/range/create', [
            'siteCodeDef' => '',
            'method' => 'POST',
        ]);
    }


    /**
     * 문제영역 기본정보 등록 (lms_Mock_Area, lms_Mock_R_Category)
     */
    public function store()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'moLink[]', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'questionArea', 'label' => '문제영역명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseRangeModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 문제영역 기본정보 수정폼 ($param[0] - lms_Mock_Area DB의 MaIdx)
     *
     * 복사된 직후, 미사용 카테고리가 있는 경우 카테고리 변경가능
     */
    public function edit($param = [])
    {
        list($data, $chData, $moCate_name, $moCate_isUse) = $this->baseRangeModel->getMockArea($param[0]);
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        $this->load->view('mocktest/base/range/create', [
            'siteCodeDef' => $data['SiteCode'],
            'method' => 'PUT',
            'data' => $data,
            'chData' => $chData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'isCopy' => ( isset($param[1]) && $param[1] == 'copy' ) ? true : false,
        ]);
    }


    /**
     * 문제영역 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'questionArea', 'label' => '문제영역명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if($this->input->post('isCopy')) {
            $rules_add = [
                ['field' => 'moLink[]', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'moLink_be[]', 'label' => '이전 카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ];
            $rules = array_merge($rules, $rules_add);
        }
        if ($this->validate($rules) === false) return;

        $result = $this->baseRangeModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 문제영역 출제챕터 등록,수정
     */
    public function storeChapter()
    {
        $rules = [
            ['field' => 'areaName[]', 'label' => '영역명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'orderNum[]', 'label' => '정렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse[]', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'chapterTotal[]', 'label' => '챕터 tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => '챕터 eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => '챕터 dIDX', 'rules' => 'trim|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        if( count($this->input->post('orderNum')) != count(array_unique($this->input->post('orderNum'))) ) {
            $this->json_error('정렬번호가 중복되어 있습니다.');
            return;
        }

        $result = $this->baseRangeModel->storeChapter();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 데이터 복사
     */
    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseRangeModel->copyData($this->input->post('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }
}
