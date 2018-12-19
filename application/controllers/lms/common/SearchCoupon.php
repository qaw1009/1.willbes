<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchCoupon extends \app\controllers\BaseController
{
    protected $models = array('service/couponRegist');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $locationid = empty($this->_req('locationid')) ? null : $this->_req('locationid');

        $this->load->view('common/search_coupon',[
            'site_code' => $this->_req('site_code')
            ,'deploy_type' => $this->_req('deploy_type')
            ,'ProdCode' => $this->_req('ProdCode')
            ,'locationid' => $locationid
        ]);
    }

    /**
     * 쿠폰 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_reqP('site_code'),
                'A.DeployType' => $this->_reqP('deploy_type'),
            ],
            'ORG' =>[
                'LKB' => [
                    'A.CouponIdx' => $this->_reqP('search_value'),
                    'A.CouponName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->couponRegistModel->listCoupon(true,$arr_condition);

        if($count > 0) {
            $list = $this->couponRegistModel->listCoupon(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CouponIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}