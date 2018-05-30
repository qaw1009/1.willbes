<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'service/couponRegist', 'service/couponIssue');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 전체쿠폰발급/사용현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/coupon/issue_index', []);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->couponIssueModel->listAllCouponDetail(true, $arr_condition);

        if ($count > 0) {
            $list = $this->couponIssueModel->listAllCouponDetail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CdIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 엑셀 다운로드
     */
    public function excel()
    {
        $headers = ['쿠폰핀번호', '회원명 (아이디)', '휴대폰번호', '쿠폰정보', '발급구분', '발급일 (발급자)', '유효여부 (만료일)', '사용여부 (사용일)', '사용상품 (주문번호)', '발급회수일 (회수자)'];

        $arr_condition = $this->_getListConditions();
        $list = $this->couponIssueModel->listAllCouponDetail('excel', $arr_condition, null, null, ['CdIdx' => 'desc']);

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('쿠폰발급리스트', $list, $headers);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 검색 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_date_colum = ['I' => 'IssueDatm', 'U' => 'UseDatm', 'R' => 'RetireDatm'];
        $arr_condition = [
            'EQ' => [
                'IsIssue' => $this->_reqP('search_is_issue'),
                'IsUse' => $this->_reqP('search_is_use'),
                'ValidStatus' => $this->_reqP('search_valid_status'),
            ],
            'BDT' => [
                $arr_date_colum[$this->_reqP('search_date_type')] => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]
            ],
            'ORG1' => [
                'LKB' => [
                    'MemName' => $this->_reqP('search_member_value'),
                    'MemId' => $this->_reqP('search_member_value'),
                    'IssueUserName' => $this->_reqP('search_member_value'),
                    'IssueUserId' => $this->_reqP('search_member_value'),
                ],
                'EQ' => [
                    'Phone3' => $this->_reqP('search_member_value'),
                    'PhoneEnc' => $this->couponIssueModel->getEncString($this->_reqP('search_member_value'))
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'CouponIdx' => $this->_reqP('search_value'),
                    'CouponName' => $this->_reqP('search_value')
                ]
            ]
        ];

        return $arr_condition;
    }

    /**
     * 쿠폰 발급폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->load->view('service/coupon/issue_create', [
            'idx' => 1,
            'method' => 'POST',
            'data' => null,
        ]);
    }
}
