<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Cart extends BaseOrder
{
    protected $models = array('pay/cart', 'pay/orderList', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 장바구니 관리 인덱스
     */
    public function index()
    {
        $this->load->view('pay/order/cart/index', []);
    }

    /**
     * 장바구니 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->cartModel->listValidCart(true, $arr_condition);

        if ($count > 0) {
            $list = $this->cartModel->listValidCart(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 장바구니 관리 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code')
            ],
            'LKB' => [
                'P.ProdName' => $this->_reqP('search_prod_value')
            ],
            'IN' => ['CA.SiteCode' => get_auth_site_codes()],    //사이트 권한 추가
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                    'A.wAdminId' => $this->_reqP('search_member_value'),
                    'A.wAdminName' => $this->_reqP('search_member_value')
                ]
            ]
        ];

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        $arr_condition['BDT'] = ['CA.RegDatm' => [$search_start_date, $search_end_date]];

        return $arr_condition;
    }

    /**
     * 장바구니 조회 order by 배열 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['CA.MemIdx' => 'desc', 'CA.SiteCode' => 'asc', 'CA.CartIdx' => 'asc'];
    }

    /**
     * 장바구니 관리 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '상품구분', '상품명', '결제금액', '등록자', '등록일', '등록사유'];

        $arr_condition = $this->_getListConditions();
        $list = $this->cartModel->listExcelValidCart($arr_condition, $this->_getListOrderBy());

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('장바구니관리리스트', $list, $headers);
    }
}
