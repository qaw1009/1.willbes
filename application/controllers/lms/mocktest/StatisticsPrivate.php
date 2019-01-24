<?php
/**
 * ======================================================================
 * 모의고사등록 > 과목별 문제등록
 * ======================================================================
 *
 * 보기형식 - S:객관식(단일정답), M:객관식(복수정답), J:주관식
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticsPrivate extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regGrade');
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

        $this->load->view('mocktest/statistics/private/index', [
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock'),
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {

        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_subject', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_professor', 'label' => '교수', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;



        $condition = [
            'EQ' => [
                /*
                'EB.SiteCode' => $this->input->post('search_site_code'),
                'MB.CateCode' => $this->input->post('search_cateD1'),
                'MB.Ccd' => $this->input->post('search_cateD2'),
                'MS.SubjectIdx' => $this->input->post('search_subject'),
                'EB.ProfIdx' => $this->input->post('search_professor'),
                'EB.Year' => $this->input->post('search_year'),
                'EB.RotationNo' => $this->input->post('search_round'),
                'EB.IsUse' => $this->input->post('search_use'),
                */
            ],
            'ORG' => [
                'LKB' => [
                    /*
                    'EB.PapaerName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'SC.CcdName' => $this->input->post('search_fi', true),
                    'SJ.SubjectName' => $this->input->post('search_fi', true),
                    'PMS.wProfName' => $this->input->post('search_fi', true),
                    */
                ]
            ],
        ];


        list($data, $count) = $this->regGradeModel->privateList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 모의고사정보
     */
    public function statSubject($param = [])
    {
        //$arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $prodcode = $param[0];

        $productInfo = $this->regGradeModel->productInfo($prodcode);

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값

        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        $SiteCode = $productInfo['SiteCode'];
        if(empty($productInfo)===false){
            $productInfo['SiteName'] = $_SESSION['admin_auth_data']['Site'][$SiteCode]['SiteName'];

            $mockPart = explode(',', $productInfo['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ){
                    $productInfo['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }
        }
        $list = $this->regGradeModel->subjectDetailPrivate($prodcode);
        $MpIdxSet = array();
        $TakeMockPartSet = array();
        if(empty($list)===false){
            $MpIdxSet = $list['MpIdxSet'];
            $list = $list['rdata'];
            $TakeMockPartSet = $list['TakeMockPartSet'];
        }

        $this->load->view('mocktest/statistics/grade/stat_subject', [
            'productInfo' => $productInfo,
            'list' => $list,
            'TakeMockPartSet' => $TakeMockPartSet,
            'MpIdxSet' => $MpIdxSet,
            'prodcode' => $prodcode
        ]);
    }

}
