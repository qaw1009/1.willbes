<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

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

    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //공통코드
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();
        $codes = $this->codeModel->getCcdInArray([$this->applyType, $this->acceptStatus]);

        $this->load->view('board/mocktest/main/mainList', [
            'boardName' => $this->boardName,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
            'siteCodeDef' => $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'applyType' => $codes[$this->applyType],
            'accept_ccd' => $codes[$this->acceptStatus],
        ]);
    }

    public function mainListAjax()
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