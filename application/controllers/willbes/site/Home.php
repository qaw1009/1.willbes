<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('onAirF','support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // 온라인, 학원 분기처리
        if ($this->_is_pass_site === true) {
            $_view_path = 'pass_';
            $arr_base = $this->_getOffLineData();
        } else {
            $_view_path = 'main_';
            $arr_base = $this->_getOnLineData();
        }

        $this->load->view('site/'. $_view_path . SUB_DOMAIN, [
            'arr_base' => $arr_base,
        ]);
    }

    /**
     * 메인에 사용할 데이터 셋팅 [온라인]
     * @return mixed
     */
    private function _getOnLineData()
    {
        $data['board'] = $this->_board();
        return $data;
    }

    /**
     * 메인에 사용할 데이터 셋팅 [학원]
     * @return mixed
     */
    private function _getOffLineData()
    {
        $data['onAir'] = $this->_onAir();
        $data['board'] = $this->_board();
        return $data;
    }

    /**
     * OnAir 조회
     * @return array
     */
    private function _onAir()
    {
        $data = $this->onAirFModel->getLiveOnAir($this->_site_code, '');
        return $data;
    }

    /**
     * 게시판
     * @return array
     */
    private function _board()
    {
        $column = 'b.BoardIdx, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];
        $arr_condition = [
            'EQ' => [
                'b.IsUse' => 'Y'
            ]
            /*'LKB' => [
                'Category_String' => $this->_cate_code
            ]*/
        ];

        //공지사항
        $arr_condition_notice['EQ'] = array_merge($arr_condition['EQ'], ['b.BmIdx' => 45, 'b.SiteCode' => $this->_site_code]);
        $data['notice']['data'] = $this->supportBoardFModel->listBoard(false, $arr_condition_notice, $column,5,0, $order_by);

        //시험공고
        $arr_condition_announcement['EQ'] = array_merge($arr_condition['EQ'], ['b.BmIdx' => 54]);
        $data['exam_announcement']['data'] = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition_announcement, $column,5,0, $order_by);

        //수험뉴스
        $arr_condition_news['EQ'] = array_merge($arr_condition['EQ'], ['b.BmIdx' => 57]);
        $data['exam_news']['data'] = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition_news, $column,5,0, $order_by);
        return $data;
    }
}
