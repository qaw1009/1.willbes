<?php
/**
 * ======================================================================
 * 모의고사성적관리 > 성적처리통계
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticsGrade extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regGrade');
    protected $helpers = array();

    protected $applyType;
    protected $applyArea1;
    protected $applyArea2;
    protected $addPoint;
    protected $applyType_on;
    protected $applyType_off;
    protected $acceptStatus;

    public function __construct()
    {
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $this->applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $this->addPoint = $this->config->item('sysCode_addPoint', 'mock');
        $this->applyType_on = $this->config->item('sysCode_applyType_on', 'mock');
        $this->applyType_off = $this->config->item('sysCode_applyType_off', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');
    }

    /**
     * 메인
     */
    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['675']);

        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->acceptStatus]);

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/statistics/grade/index', [
            'siteCodeDef' => '2002', //$cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'applyType' => $codes[$this->applyType],
            'accept_ccd' => $codes[$this->acceptStatus],
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
            ['field' => 'search_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeFormsCcd', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_AcceptStatus', 'label' => '접수상태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'PC.CateCode' => $this->input->post('search_cateD1'),
                'MP.MockYear' => $this->input->post('search_year'),
                'MP.MockRotationNo' => $this->input->post('search_round'),
                'MP.AcceptStatusCcd' => $this->input->post('search_AcceptStatus'),
                'MP.TakeType' => $this->input->post('search_TakeType'),
                'PD.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->input->post('search_cateD2'),
                'MP.TakeFormsCcd' => $this->input->post('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'PD.SaleStartDatm' => $this->input->post('search_fi', true),
                    'PD.SaleEndDatm' => $this->input->post('search_fi', true),
                    'PS.RealSalePrice' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regGradeModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

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
        $prodcode = $param[0];
        $mgidx = $param[1];

        $productInfo = $this->regGradeModel->productInfo($prodcode);

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $mockTakeForms = $this->config->item('sysCode_applyType', 'mock'); // 응시형태 코드값

        $codes = $this->codeModel->getCcdInArray([$mockKindCode, $mockTakeForms]);

        $SiteCode = $productInfo['SiteCode'];
        if(empty($productInfo)===false){
            $productInfo['SiteName'] = $_SESSION['admin_auth_data']['Site'][$SiteCode]['SiteName'];

            $mockPart = explode(',', $productInfo['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ){
                    $productInfo['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }

            $TakeFormsCcd = explode(',', $productInfo['TakeFormsCcd']);
            foreach ($TakeFormsCcd as $row) {
                if( !empty($codes[$mockTakeForms][$row]) ){
                    $productInfo['TakeFormsCcd_Name'][] = $codes[$mockTakeForms][$row];
                }
            }
        }
        $listArr = $this->regGradeModel->subjectDetail($prodcode);

        $MpIdxSet = $listArr['MpIdxSet'];
        $list = $listArr['rdata'];
        $TakeMockPartSet = $listArr['TakeMockPartSet'];

        $this->load->view('mocktest/statistics/grade/stat_subject', [
            'productInfo' => $productInfo,
            'list' => $list,
            'TakeMockPartSet' => $TakeMockPartSet,
            'MpIdxSet' => $MpIdxSet,
            'prodcode' => $prodcode,
            'mgidx' => $mgidx
        ]);


    }

    /**
     * 임시저장 전체
     * @return object|string
     */
    public function scoreMakeAjax()
    {
        $formData = $this->_reqP(null, false);
        $MgIdx = element('MgIdx', $formData);
        $result = $this->regGradeModel->scoreMake($MgIdx,'web');
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }

    /**
     * 복수정답처리
     * @return object|string
     */
    public function scoreMultiAjax()
    {
        $formData = $this->_reqP(null, false);
        $MgIdx = element('MgIdx', $formData);
        $result = $this->regGradeModel->scoreMulti($MgIdx);
        $this->json_result($result, '처리완료되었습니다.', $result, $result);
    }


    /**
     * 정답 재처리
     */
    public function reGradingAjax()
    {
        $formData = $this->_reqP(null, false);
        $MgIdx = element('MgIdx', $formData);
        $result = $this->regGradeModel->reGrading($MgIdx);
        $this->json_result($result['ret_cd'], $result['ret_msg']);
    }
}
