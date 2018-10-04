<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCode extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'mocktest/baseCode');
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
        $cateList = $this->categoryModel->getCategoryArray();
        $cateD1 = $cateD2 = array();
        foreach ($cateList as $it) {
            if ($it['CateDepth'] == '1') $cateD1[] = $it;
            else $cateD2[] = $it;
        }

        list($listDB, $subjectNames, $subjectIdxs) = $this->baseCodeModel->list();
        $this->load->view('mocktest/base/code/index', [
            'siteCodeDef' => $cateList[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'adminName' => $this->baseCodeModel->getAdminNames(),
            'listDB' => $listDB,
            'subjectNames' => $subjectNames,
            'subjectIdxs' => $subjectIdxs,
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
            $gCateCode = $this->input->get('gcate');
            $data = $this->baseCodeModel->getKind($idx);

            if (!$data) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
        } else { // 등록
            $method = 'POST';
            $data = array();
            $gCateCode = '';
        }


        $cateList = $this->categoryModel->getCategoryArray();
        $cateD1 = $cateD2 = array();
        foreach ($cateList as $it) {
            if ($it['CateDepth'] == '1') $cateD1[] = $it;
            else $cateD2[] = $it;
        }

        $this->load->view('mocktest/base/code/create_kind', [
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'method' => $method,
            'adminName' => $this->baseCodeModel->getAdminNames(),
            'data' => array_merge($data, array('gCateCode' => $gCateCode)),
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
            //['field' => 'site', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            //['field' => 'cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            //['field' => 'cateD2', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],
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
            'gcate' => $this->input->get('gcate'),
            'sjType' => $this->input->get('sjType'),
        );
        $rules = [
            ['field' => 'act', 'label' => 'ACT', 'rules' => 'trim|required|in_list[create,edit]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'gcate', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
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


        $cateList = $this->categoryModel->getCategoryArray();
        $cateD1 = $cateD2 = array();
        foreach ($cateList as $it) {
            if ($it['CateDepth'] == '1') $cateD1[] = $it;
            else $cateD2[] = $it;
        }

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
}