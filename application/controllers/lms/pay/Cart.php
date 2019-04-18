<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

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
        $this->load->view('pay/cart/index', []);
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
                'CA.SiteCode' => $this->_reqP('search_site_code')
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
            ],
            'ORG2' => [
                'EQ' => [
                    'P.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],
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
    public function _getListOrderBy()
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
        $last_query = $this->cartModel->getLastQuery();

        // export excel
        $this->_makeExcel('장바구니리스트', $list, $headers, true, $last_query);
    }

    /**
     * 장바구니 담기 등록 폼
     * @param array $params
     */
    public function create($params = [])
    {
        // 등록할 상품구분 공통코드 조회
        $arr_prod_type_target_key = ['on_lecture', 'book'];
        $arr_prod_type_target_ccd = array_filter_keys($this->cartModel->_prod_type_ccd, $arr_prod_type_target_key);
        $arr_prod_type_target_name = $this->codeModel->getCcd($this->_group_ccd['ProdType'], '', ['IN' => ['Ccd' => array_values($arr_prod_type_target_ccd)]]);

        $this->load->view('pay/cart/create', [
            'arr_prod_type_target_ccd' => $arr_prod_type_target_ccd,
            'arr_prod_type_target_name' => $arr_prod_type_target_name,
            'prod_search_hide_tabs' => 'periodpack_lecture'
        ]);
    }

    /**
     * 장바구니 등록
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'mem_idx[]', 'label' => '회원 선택', 'rules' => 'trim|required'],
            ['field' => 'prod_code[]', 'label' => '상품식별자', 'rules' => 'trim|required'],
            ['field' => 'admin_reg_reason', 'label' => '등록사유', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->cartModel->addCart($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 장바구니 내역 삭제
     */
    public function destroy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'cart_idx', 'label' => '장바구니식별자', 'rules' => 'trim|required'],
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '상품식별자', 'rules' => 'trim|required'],
            ['field' => 'parent_prod_code', 'label' => '부모상품식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $arr_cart_idx = json_decode($this->_reqP('cart_idx'), true);
        $arr_mem_idx = json_decode($this->_reqP('mem_idx'), true);
        $arr_prod_code = json_decode($this->_reqP('prod_code'), true);
        $arr_parent_prod_code = json_decode($this->_reqP('parent_prod_code'), true);

        $result = $this->cartModel->removeCart($arr_cart_idx, $arr_mem_idx, $arr_prod_code, $arr_parent_prod_code);

        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}
