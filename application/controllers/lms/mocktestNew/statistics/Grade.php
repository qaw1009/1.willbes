<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Grade extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/regGrade');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['applyType'] = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['applyType']);

        $this->load->view('mocktestNew/statistics/grade/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'PD.IsStatus' => 'Y',
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'PC.CateCode' => $this->_reqP('search_cateD1'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                'MP.AcceptStatusCcd' => $this->_reqP('search_AcceptStatus'),
                'MP.TakeType' => $this->_reqP('search_TakeType'),
                'PD.IsUse' => $this->_reqP('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->_reqP('search_cateD2'),
                'MP.TakeFormsCcd' => $this->_reqP('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->_reqP('search_fi', true),
                    'A.wAdminName' => $this->_reqP('search_fi', true),
                    'PD.SaleStartDatm' => $this->_reqP('search_fi', true),
                    'PD.SaleEndDatm' => $this->_reqP('search_fi', true),
                    'PS.RealSalePrice' => $this->_reqP('search_fi', true),
                ]
            ],
        ];

        $list = [];
        $count = $this->regGradeModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->regGradeModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        // 데이터 가공
        $mockKindCode = $this->mockCommonModel->_groupCcd['sysCode_kind'];    //직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
        $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];

        foreach ($list as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
            $it['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if (!empty($codes[$mockKindCode][$mp])) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function detail($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $product_info = $this->regGradeModel->productInfo($params[0]);
        if (empty($product_info) === true) {
            show_error('조회된 상품이 없습니다.');
        }

        //기본정보 가공
        $arr_mock_kind_code = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['sysCode_kind']);
        $arr_mock_part = explode(',', $product_info['MockPart']);
        foreach ($arr_mock_part as $key => $val) {
            $product_info['MockPartName'][] = $arr_mock_kind_code[$val];
        }



        $this->load->view('mocktestNew/statistics/grade/detail', [
            'product_info' => $product_info
        ]);
    }
}