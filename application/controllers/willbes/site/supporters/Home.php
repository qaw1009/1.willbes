<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('supportersF', 'support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_base = [];

        $column = 'a.SupportersIdx, a.Title AS SupportersTitle, a.SupportersYear, a.SupportersNumber';
        $arr_condition_1 = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'IsUse' => 'Y'
            ],
            'LTE' => ['StartDate' => date('Y-m-d')],
            'GTE' => ['EndDate' => date('Y-m-d')]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'b.MemIdx' => $this->session->userdata('mem_idx'),
                'b.SiteCode' => $this->_site_code,
                'b.SupportersStatusCcd' => '720001',
                'b.IsStatus' => 'Y'
            ]
        ];
        $data = $this->supportersFModel->findSupporters($arr_condition_1, $arr_condition_2, $column);
        if (empty($data) === true) show_alert('서포터즈 회원이 아닙니다.', 'back');

        //공지사항조회
        $arr_noti_condition = [
            'EQ' => [
                'BmIdx' => $this->supportersFModel->_arr_bm_idx['notice'],
                'SupportersIdx' => $data['SupportersIdx'],
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ]
        ];
        $arr_base['notice_list'] = $this->supportBoardFModel->listBoard(false, $arr_noti_condition,'','BoardIdx, SupportersIdx, IsBest, Title, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm', 4, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);

        return $this->load->view('site/supporters/home', [
            'data' => $data,
            'arr_base' => $arr_base
        ]);
    }
}