<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Assignment extends BaseSupporters
{
    protected $temp_models = array('board/board', 'board/boardAssignmentSupporters');
    protected $helpers = array('download','file');

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_year'] = $this->supportersRegistModel->getSupportersYear();
        $arr_base['arr_supporters_number'] = $this->supportersRegistModel->getSupportersNumber();
        $this->load->view('site/supporters/assignment/index', ['arr_base' => $arr_base]);
    }

    public function listSupportersAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.SupportersYear' => $this->_reqP('search_supporters_year'),
                'a.SupportersNumber' =>$this->_reqP('search_supporters_number'),
                'a.IsUse' =>$this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'a.SupportersIdx' => $this->_reqP('search_value'),
                    'a.Title' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->supportersRegistModel->listSupporters(false, true, $arr_condition);

        if ($count > 0) {
            $list = $this->supportersRegistModel->listSupporters(true, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.SupportersIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 과제등록관리[게시판]
     * @param array $params
     */
    public function registForBoard($params = [])
    {
        $supporters_idx = $params[0];

        // 기본 서포터즈 정보
        $column = '
            a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.IsUse, a.RegDatm, a.RegAdminIdx,
            b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName
        ';
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $supporters_idx
            ]
        ];
        $data = $this->supportersRegistModel->findSupporters($arr_condition, $column);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("site/supporters/assignment/regist/index", [
            'supporters_data' => $data
        ]);
    }
}