<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

/**
 * 이의제기,정오표게시판 메인페이지 공통클레스
 * Class Main
 */
class Main extends BaseBoard
{
    protected $temp_main_models = array('board/boardMock', 'mocktest/mockCommon');
    protected $helpers = array();

    private $bm_idx;
    protected $applyType;
    protected $acceptStatus;

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_main_models);
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');
    }

    protected function _mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //공통코드
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->acceptStatus]);

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('board/mocktest/main/mainList', [
            'boardName' => $this->boardName,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
            'siteCodeDef' => $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'applyType' => $codes[$this->applyType],
            'accept_ccd' => $codes[$this->acceptStatus],
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }

    protected function _mainListAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->boardMockModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->boardMockModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['MP.ProdCode' => 'desc']);

            // 직렬이름 추출
            $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
            $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

            // 데이터정리
            $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
            $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

            foreach ($list as &$it) {
                $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
                $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
                $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

                $mockPart = explode(',', $it['MockPart']);
                foreach ($mockPart as $mp) {
                    if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 모의고사 단일 상품 조회
     * @param $prod_code
     * @return mixed
     */
    protected function _prodData($prod_code)
    {
        // 모의고사 기본정보 조회
        $arr_condition = [
            'EQ' => [
                'MP.ProdCode' => $prod_code,
                'PD.IsStatus' => 'Y'
            ]
        ];

        $prod_data = $this->boardMockModel->mainList(false, $arr_condition, 1, 0, ['MP.ProdCode' => 'desc']);
        if (empty($prod_data) === true) {
            show_error('조회된 모의고사 상품 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }
        $prod_data = $prod_data[0];
        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        $takeFormsCcds = explode(',', $prod_data['TakeFormsCcd']);
        $prod_data['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
        $prod_data['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';
        $mockPart = explode(',', $prod_data['MockPart']);
        foreach ($mockPart as $mp) {
            if( !empty($codes[$mockKindCode][$mp]) ) $prod_data['MockPartName'][] = $codes[$mockKindCode][$mp];
        }

        return $prod_data;
    }

    private function _getListConditions()
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

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            $arr_condition['ORG']['BET'] = [
                'PD.SaleStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'PD.SaleEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
            $arr_condition['ORG']['RAW'] = ['(PD.SaleStartDatm < "' => $this->_reqP('search_start_date') . '" AND PD.SaleEndDatm > "' . $this->_reqP('search_end_date') . '")'];
        }

        return $arr_condition;
    }
}