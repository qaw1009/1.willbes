<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCode extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'mocktest/mockCommon', 'mocktest/baseCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 메인 (전체 로딩 후 dataTable로 처리)
     */
    public function index()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind(false);

        list($listDB, $subjectNames, $subjectIdxs) = $this->baseCodeModel->list();

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/base/code/index', [
            'siteCodeDef' => '2002', //$cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'listDB' => $listDB,
            'subjectNames' => $subjectNames,
            'subjectIdxs' => $subjectIdxs,
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 직렬 등록,수정폼
     */
    public function createKind()
    {
        if ($this->input->get('act') == 'edit') { // 수정
            $method = 'PUT';
            $idx = $this->input->get('idx');
            $data = $this->baseCodeModel->getMockBase($idx);
            $adminName = $this->mockCommonModel->getAdminNames();
            $cateD2 = $this->baseCodeModel->getMockKindAll(false);

            if (!$data) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
        } else { // 등록
            $method = 'POST';
            $data = array();
            $adminName = array();
            $cateD2 = $this->baseCodeModel->getMockKindAll();
        }

        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);

        $this->load->view('mocktest/base/code/create_kind', [
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'method' => $method,
            'adminName' => $adminName,
            'data' => $data,
        ]);
    }


    /**
     * 직렬 등록
     */
    public function storeKind()
    {
        $rules = [
            ['field' => 'site', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD2', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'orderNum', 'label' => '정렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseCodeModel->storeKind();
        $this->json_result($result, '등록되었습니다.', $result);
    }


    /**
     * 직렬 수정
     */
    public function updateKind()
    {
        $rules = [
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'orderNum', 'label' => '정렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseCodeModel->updateKind();
        if ($result)
            $this->json_result($result, '변경되었습니다.', $result);
        else
            $this->json_error('변경에 실패했습니다.');
    }


    /**
     * 과목 등록,수정폼
     */
    public function createSubject()
    {
        $get = array(
            'act' => $this->input->get('act'),
            'idx' => $this->input->get('idx'),
            'sjType' => $this->input->get('sjType'),
        );
        $rules = [
            ['field' => 'act', 'label' => 'ACT', 'rules' => 'trim|required|in_list[create,edit]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sjType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]'],
        ];
        $this->load->library('form_validation');
        $this->form_validation->set_data($get);
        if ($this->validate($rules) === false) return;


        list($baseDB, $subjectDB, $adminInfo) = $this->baseCodeModel->getSubject($this->input->get('idx'), $this->input->get('sjType'));
        if (!$baseDB) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }


        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind(false);

        $this->load->view('mocktest/base/code/create_subject', [
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'method' => ($this->input->get('act') == 'edit') ? 'PUT' : 'POST',
            'baseDB' => $baseDB,
            'subjectDB' => $subjectDB,
            'adminInfo' => $adminInfo,
        ]);
    }


    /**
     * 과목 등록,수정
     */
    public function storeSubject()
    {
        $rules = [
            ['field' => 'subjectIdx[]', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sjType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseCodeModel->storeSubject();
        $msg = ($this->input->post('_method') == 'POST') ? '등록되었습니다.' : '변경되었습니다.';
        $this->json_result($result, $msg, $result);
    }


    /**
     * 사용,미사용 전환
     */
    public function useToggle()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseCodeModel->useToggle();
        if($result)
            $this->json_result($result, '변경되었습니다.', $result);
        else
            $this->json_error('변경에 실패했습니다.');
    }


    /**
     * 모의고사카테고리 검색 팝업 메인
     *
     * Input  $_GET['siteCode'] OR null
     *        $_GET['single'] OR null : 다중검색(변수없거나 N), 단일검색(Y) 여부
     *        $_GET['reg'] : 1.모의고사 기본정보 > 문제영역관리 - null
     *                       2.모의고사 등록 > 과목별 문제등록 - Y
     * Output 부모창 <div id="selected_category"> 안에 생성
     *        1.모의고사 기본정보 > 문제영역관리 - $moLink[] AND "카테고리>직렬>과목" 문자열
     *                                           $moLink[] : lms_Mock_R_Subject의 MrsIdx
     *        2.모의고사 등록 > 과목별문제등록 - $moLink AND "카테고리>직렬>과목 - 문제영역명" 문자열
     *                                         $moLink : lms_Mock_R_Category의 MrcIdx
     */
    public function moCate()
    {
        $siteCode = $this->input->get('siteCode');
        if ( !empty($siteCode) && !preg_match('/^[0-9]+$/', $siteCode) ) return false;

        $this->load->view('mocktest/search_mockCategory', [
            'siteCode' => $siteCode,
            'isSingle' => ($this->input->get('single') == 'Y') ? true : false,
            'isReg' => ($this->input->get('reg') == 'Y') ? true : false,
        ]);
    }


    /**
     * 모의고사카테고리 검색 팝업 리스트
     */
    public function moCateList()
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
        list($data, $count) = $this->mockCommonModel->moCateList($condition, $this->input->post('length'), $this->input->post('start'), true, $this->input->post('isReg'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}