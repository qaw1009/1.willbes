<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/mocktest/Main.php';

class Notice extends Main
{
    protected $temp_models = array('board/board');
    protected $helpers = array('download','file');

    public $boardName = 'mocktest/notice';
    private $bm_idx;

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 메인 리스트 페이지 리턴
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/{$this->boardName}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 메인페이지
     */
    public function mainList()
    {
        return $this->_mainList();
    }

    /**
     * 메인페이지 ajax
     * @return CI_Output
     */
    public function mainListAjax()
    {
        return $this->_mainListAjax();
    }

    /**
     * 모의고사별 공지사항 목록
     */
    public function detailList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');

        //모의고사 상품 조회
        $prod_data = $this->_prodData($prod_code);

        $this->load->view("board/{$this->boardName}/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->boardName,
            'prod_code' => $prod_code,
            'prod_data' => $prod_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prod_code={$prod_data['ProdCode']}&site_code={$prod_data['SiteCode']}",
        ]);
    }

    public function detailListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');
        $site_code = $this->_req('site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProdCode' => $prod_code,
                'LB.IsStatus' => 'Y',
                'LB.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->boardName,true, $arr_condition, $sub_query_condition, $site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->boardName,false, $arr_condition, $sub_query_condition, $site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}