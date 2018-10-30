<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoods extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regGoods');
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

        $this->load->view('mocktest/reg/goods/index', [
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_subject', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_professor', 'label' => '교수', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'MB.SiteCode' => $this->input->post('siteCode')
            ],
            'ORG' => [
                'LKB' => [
                    'MB.PapaerName' => $this->input->post('sc_fi', true),
                    'A.wAdminName' => $this->input->post('sc_fi', true),
                    'SC.CcdName' => $this->input->post('sc_fi', true),
                    'SJ.SubjectName' => $this->input->post('sc_fi', true),
                    'PMS.wProfName' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regExamModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
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

        $result = $this->regExamModel->copyData($this->input->post('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }


    /**
     * 등록폼
     */
    public function create()
    {
        $applyType = $this->config->item('sysCode_applyType', 'mock');
        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $addPoint = $this->config->item('sysCode_addPoint', 'mock');

        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$applyType, $applyArea1, $applyArea2, $addPoint]);
        $csTel = $this->siteModel->getSiteArray(false, 'CsTel');

        $cateD2Json = array();
        foreach ($cateD2 as $it) {
            $cateD2Json[ $it['ParentCateCode'] ][ $it['CateCode'] ] = $it['CateName'];
        }

        $this->load->view('mocktest/reg/goods/create', [
            'method' => 'POST',
            'siteCodeDef' => '',
            'cateD1' => $cateD1,
            'cateD2' => json_encode($cateD2Json),
            'applyType' => $codes[$applyType],
            'applyArea1' => $codes[$applyArea1],
            'applyArea2' => $codes[$applyArea2],
            'addPoint' => $codes[$addPoint],
            'csTel' => json_encode($csTel),

        ]);
    }


    /**
     * 등록 (lms_Product_Mock)
     */
    public function store()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'applyPart', 'label' => '응시분야', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD2[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'TakeFormsCcds', 'label' => '응시형태', 'rules' => 'trim|required|'],
            ['field' => 'TakeAreas1CCds', 'label' => 'Off(학원)응시지역1', 'rules' => 'trim|required|'],
            ['field' => 'TakeAreas2Ccd', 'label' => 'Off(학원)응시지역2', 'rules' => 'trim|required|'],
            ['field' => 'AddPointsCcd', 'label' => '가산점', 'rules' => 'trim|required|'],
            ['field' => 'MockYear', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockRotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProdName', 'label' => '모의고사명', 'rules' => 'trim|required|'],

            ['field' => 'SalePrice', 'label' => '정상가', 'rules' => 'trim|required|'],
            ['field' => 'SaleRate', 'label' => '할인', 'rules' => 'trim|required|'],
            ['field' => 'SaleDiscType', 'label' => '할인타입', 'rules' => 'trim|required|'],
            ['field' => 'RealSalePrice', 'label' => '판매가', 'rules' => 'trim|required|'],

            ['field' => 'SaleStartDatm_d', 'label' => '접수시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SaleStartDatm_h', 'label' => '접수시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SaleStartDatm_m', 'label' => '접수시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SaleEndDatm_d', 'label' => '접수시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SaleEndDatm_h', 'label' => '접수시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'SaleEndDatm_m', 'label' => '접수마감시간', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'ClosingPerson', 'label' => '접수마감인원', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'IsRegister', 'label' => '접수상태', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'TakeType', 'label' => '응시가능타입', 'rules' => 'trim|required|in_list[A,L]'],
            ['field' => 'TakeStartDatm_d', 'label' => '응시시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeStartDatm_h', 'label' => '응시시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeStartDatm_m', 'label' => '응시시작시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeEndDatm_d', 'label' => '응시마감시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeEndDatm_h', 'label' => '응시마감시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeEndDatm_m', 'label' => '응시마감시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeTime', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'MpIdx', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockType', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'OrderNum[]', 'label' => '응시시간', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'IsSms', 'label' => '문자사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'Memo', 'label' => '문자내용', 'rules' => 'trim|'],
            ['field' => 'SendTel', 'label' => '문자송신번호', 'rules' => 'trim|required|'],

            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGoodsModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 수정폼
     */
    public function edit($param = [])
    {
        list($data, $qData, $moCate_name, $moCate_isUse, $professor, $areaList) = $this->regGoodsModel->getExamBase($param[0]);
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        $this->load->view('mocktest/reg/goods/create', [
            'siteCodeDef' => $data['SiteCode'],
            'method' => 'PUT',
            'data' => $data,
            'qData' => $qData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'professor' => $professor,
            'areaList' => $areaList,
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'isCopy' => ( isset($param[1]) && $param[1] == 'copy' ) ? true : false,
        ]);
    }


    /**
     * 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'moLink', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PapaerName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'Year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|required|in_list[S,M,J]'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGoodsModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 과목검색창 오픈
     */
    public function searchExam()
    {
        $siteCodeDef = $this->input->get('siteCode');
        $cateD1Def = $this->input->get('cateD1');
        $suType = $this->input->get('suType');

        if ( empty($siteCodeDef) || !preg_match('/^[0-9]+$/', $siteCodeDef) ||
             empty($cateD1Def) || !preg_match('/^[0-9]+$/', $cateD1Def) ||
             empty($suType) || !preg_match('/^(E|S)$/', $suType) ) {
            return false;
        }

        $this->load->view('mocktest/reg/goods/searchExam', [
            'siteCodeDef' => $siteCodeDef,
            'cateD1Def' => $cateD1Def,
            'suType' => $suType,
            'cateD1' => $this->categoryModel->getCategoryArray('', '', '', 1),
            'cateD2' => $this->mockCommonModel->getMockKind(),
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
        ]);
    }


    /**
     * 과목검색창 팝업리스트
     */
    public function searchExamList()
    {
        $rules = [
            ['field' => 'sc_siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_subject', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_professor', 'label' => '교수', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_questionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'EB.SiteCode' => $this->input->post('search_site_code'),
                'MB.CateCode' => $this->input->post('sc_cateD1'),
                'MB.Ccd' => $this->input->post('sc_cateD2'),
                'EB.Year' => $this->input->post('sc_year'),
                'EB.RotationNo' => $this->input->post('sc_round'),
                'MS.SubjectIdx' => $this->input->post('sc_subject'),
                'EB.ProfIdx' => $this->input->post('sc_professor'),
                'EB.QuestionOption' => $this->input->post('sc_questionOption'),
            ],
            'ORG' => [
                'LKB' => [
                    'EB.PapaerName' => $this->input->post('sc_fi', true),
                    'C1.CateName' => $this->input->post('sc_fi', true),
                    'SC.CcdName' => $this->input->post('sc_fi', true),
                    'SJ.SubjectName' => $this->input->post('sc_fi', true),
                    'PMS.wProfName' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regGoodsModel->searchExamList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 과목검색 삭제
     */
    public function searchExamDel()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regGoodsModel->searchExamDel();
        if($result)
            $this->json_result($result, '삭제되었습니다.', $result);
        else
            $this->json_error('삭제에 실패했습니다.');
    }


    /**
     * 과목검색 정렬변경
     */
    public function searchExamSort()
    {
        $sorting = @json_decode($this->input->post('sorting'));
        if(!is_object($sorting)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['tmp_key'] = array_keys((array) $sorting);
            $_POST['tmp_val'] = array_values((array) $sorting);
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'tmp_key[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'tmp_val[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        if( count($_POST['tmp_val']) != count(array_unique($_POST['tmp_val'])) ) {
            $this->json_error('정렬번호가 중복되어 있습니다.');
            return;
        }

        $result = $this->regGoodsModel->searchExamSort($sorting);
        $this->json_result($result['ret_cd'], '정렬되었습니다.', $result, $result);
    }
}
