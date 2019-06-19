<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Regist extends BaseSupporters
{
    protected $temp_models = array();
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 서포터즈 기본 관리
     */
    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_year'] = $this->supportersRegistModel->getSupportersYear();
        $arr_base['arr_supporters_number'] = $this->supportersRegistModel->getSupportersNumber();
        $this->load->view('site/supporters/regist/index', ['arr_base' => $arr_base]);
    }

    public function listAjax()
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
            $list = $this->supportersRegistModel->listSupporters(false, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SP.SupportersIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['coupon_issue_ccd'] = $this->_couponIssueCcd();

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $arr_base['supporters_idx'] = $params[0];
            $column = '
                a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.IsUse, a.RegDatm, a.RegAdminIdx,
                b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName
            ';
            $arr_condition = [
                'EQ' => [
                    'a.SupportersIdx' => $arr_base['supporters_idx']
                ]
            ];
            $data = $this->supportersRegistModel->findSupporters($arr_condition, $column);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            //쿠폰조회
            $arr_base['arr_coupon_data'] = $this->supportersRegistModel->listSupportersForCoupon($arr_base['supporters_idx']);
        }

        $this->load->view("site/supporters/regist/create", [
            'method' => $method,
            'arr_base' => $arr_base,
            'data' => $data
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'supporters_year', 'label' => '기수(년)', 'rules' => 'trim|required'],
            ['field' => 'supporters_number', 'label' => '기수', 'rules' => 'trim|required'],
            ['field' => 'start_date', 'label' => '운영시작일', 'rules' => 'trim|required'],
            ['field' => 'end_date', 'label' => '운영종료일', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '서포터즈명', 'rules' => 'trim|required'],
            ['field' => 'coupon_issue_ccd', 'label' => '쿠폰자동지급', 'rules' => 'trim|required'],
            ['field' => 'CouponIdx[]', 'label' => '쿠폰', 'rules' => 'callback_validateRequiredIf[coupon_issue_ccd,685002]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required'],
        ];

        if (empty($this->_reqP('supporters_idx')) === true) {
            $method = 'add';
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'supporters_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->supportersRegistModel->{$method . 'Supporters'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}