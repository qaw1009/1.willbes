<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code','supportersF', 'support/supportBoardF');
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
        $arr_base['supporters_menu'] = $this->codeModel->getCcd('746');

        $column = 'a.SupportersIdx, a.SupportersTypeCcd, a.Title AS SupportersTitle, a.SupportersYear, a.SupportersNumber, a.MenuInfo';
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
        if ($data['SupportersTypeCcd'] == '736002' && empty($data['MenuInfo']) === true) {
            show_alert('온라인 관리반 기본정보 조회 실패입니다. 관리자에게 문의해 주세요.', 'back');
        }

        //서포터즈 상품정보 조회
        $arr_base['product_list'] = $this->supportersFModel->listProduct($data['SupportersIdx']);

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