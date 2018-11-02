<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사그룹등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGroup extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'mocktest/mockCommon', 'mocktest/regGroup');
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
        $siteCode = get_auth_site_codes();
        $this->load->view('mocktest/reg/group/index', [
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $siteCode[0],
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('siteCode')
            ],
            'ORG' => [
                'LKB' => [
                    'MG.GroupName' => $this->input->post('sc_fi', true),
                    'MG.Desc' => $this->input->post('sc_fi', true),
                    'MG.MgIdx' => $this->input->post('sc_fi', true),
                    'A.wAdminName' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regGroupModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 등록폼
     */
    public function create()
    {
        $this->load->view('mocktest/reg/group/create', [
            'method' => 'POST',
        ]);
    }


    /**
     * 등록 (lms_Mock_Group/lms_Mock_R_Group)
     */
    public function store()
    {
        $rules = [
            ['field' => 'GroupName', 'label' => '모의고사 그룹명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'ProdCode', 'label' => '모의고사 상품', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'IsDup', 'label' => '중복응시여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GroupDesc', 'label' => '설명', 'rules' => 'trim|max_length[100]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGroupModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 수정폼
     */
    public function edit()
    {
        list($data, $mData) = $this->regGroupModel->getGroup();
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        $this->load->view('mocktest/reg/group/create', [
            'method' => 'PUT',
            'data' => $data,
            'mData' => $mData,
            'adminName' => $this->mockCommonModel->getAdminNames(),
        ]);
    }


    /**
     * 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'GroupName', 'label' => '모의고사 그룹명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'ProdCode', 'label' => '모의고사 상품', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'IsDup', 'label' => '중복응시여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GroupDesc', 'label' => '설명', 'rules' => 'trim|max_length[100]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGroupModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 모의고사 상품검색 폼
     */
    public function searchGoods()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();

        $this->load->view('mocktest/reg/group/searchGoods', [
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
        ]);
    }


    /**
     * 모의고사 상품검색
     */
    public function searchGoodsList()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'isReg', 'label' => 'IsReg', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'S.SiteCode' => $this->input->post('siteCode')
            ],
            'ORG' => [
                'LKB' => [
                    'SJ.SubjectName' => $this->input->post('sc_fi', true)
                ]
            ],
        ];
        list($data, $count) = $this->mockGroupModel->searchGoodsList($condition, $this->input->post('length'), $this->input->post('start'), true, $this->input->post('isReg'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}

