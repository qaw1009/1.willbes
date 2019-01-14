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

        $this->load->view('board/mocktest/main/index', [
            'board_name' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
            'siteCodeDef' => $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'applyType' => $codes[$this->applyType],
            'accept_ccd' => $codes[$this->acceptStatus],
        ]);
    }

    public function listAjax()
    {
        $condition = [
            'EQ' => [
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
        list($data, $count) = $this->boardMockModel->mainList($condition, $this->_reqP('length'), $this->_reqP('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}