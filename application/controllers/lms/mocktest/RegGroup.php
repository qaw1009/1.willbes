<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사그룹등록
 * ======================================================================
 *
 * 메인리스트 : 사이트 그룹코드로 묶어서 처리
 * 등록 : 사이트 그룹코드가 다르면 등록불가
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGroup extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'mocktest/mockCommon', 'mocktest/regGroup');
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


        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/reg/group/index', [
//            'siteCodeDef' => $siteCode[0],
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[5]['SiteCode'],
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'S.SiteCode' => $this->input->post('search_site_code')
            ],
            'ORG' => [
                'LKB' => [
                    'MG.MgIdx' => $this->input->post('search_fi', true),
                    'MG.GroupName' => $this->input->post('search_fi', true),
                    'MG.GroupDesc' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
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
            ['field' => 'ProdCode[]', 'label' => '모의고사 상품', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SiteGroupCode[]', 'label' => '사이트그룹코드', 'rules' => 'trim|required|is_natural_no_zero'],
            //['field' => 'IsDup', 'label' => '중복응시여부', 'rules' => 'trim|required|in_list[Y,N]'],
            //['field' => 'GradeOpenDatm_d', 'label' => '성적오픈일', 'rules' => 'trim'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GroupDesc', 'label' => '설명', 'rules' => 'trim|max_length[100]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;


        if( count(array_unique($_POST['SiteGroupCode'])) !== 1 ) {
            $this->json_error('같은 사이트그룹코드의 모의고사만 등록가능합니다.');
            return;
        }

        $result = $this->regGroupModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 수정폼
     */
    public function edit($param = [])
    {
        list($data, $mData) = $this->regGroupModel->getGroup($param[0]);
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
        $Info = @json_decode($this->input->post('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'GroupName', 'label' => '모의고사 그룹명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'ProdCode[]', 'label' => '모의고사 상품', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SiteGroupCode[]', 'label' => '사이트그룹코드', 'rules' => 'trim|required|is_natural_no_zero'],
            //['field' => 'IsDup', 'label' => '중복응시여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GroupDesc', 'label' => '설명', 'rules' => 'trim|max_length[100]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        if( count(array_unique($_POST['SiteGroupCode'])) !== 1 ) {
            $this->json_error('같은 사이트그룹코드의 모의고사만 등록가능합니다.');
            return;
        }

        $result = $this->regGroupModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 모의고사상품 검색폼
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
     * 모의고사상품 검색
     */
    public function searchGoodsList()
    {
        $rules = [
            ['field' => 'sc_site', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('sc_site'),
                'PC.CateCode' => $this->input->post('sc_cateD1'),
                'MP.MockYear' => $this->input->post('sc_year'),
                'MP.MockRotationNo' => $this->input->post('sc_round'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->input->post('sc_cateD2'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->input->post('sc_fi', true),
                    'MP.ProdCode' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regGroupModel->searchGoodsList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}
