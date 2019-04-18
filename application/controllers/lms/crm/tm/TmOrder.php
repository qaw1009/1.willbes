<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TmOrder extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'crm/tm/tm');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    //결제 기본 정보 페이지
    public function index()
    {
        //TM 목록
        $tm_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);   //TM목록
        $this->load->view('crm/tm/order_list',[
            'AssignAdmin' => $tm_admin
        ]);
    }

    /**
     * 목록 추출
     * @return CI_Output
     */
    public function orderListAjax()
    {
        $arr_condition = $this->_getListConditions();

        $order_by =  ['o.OrderIdx'=>'desc', 'op.OrderProdIdx' => 'asc'];

        $list = [];
        $result = $this->tmModel->listOrder(true,$arr_condition);

        $count = $result['numrows'];
        $sum_price = $result['sum_price'];

        if($count > 0) {
            $list =  $this->tmModel->listOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' =>  $count,
            'data' => $list,
            'sum_price' =>  $sum_price,
            'sum_count' =>  $count
        ]);
    }

    /**
     * 검색조건
     * @return array
     */
    public function _getListConditions()
    {
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->tmModel->getEncString($search_value); // 검색어 암호화

        $arr_condition = [
            'EQ' => [
                'p.ProdTypeCcd' => '636001',		#온라인 강좌상품
                'o.SiteCode' => $this->_reqP('search_site_code'),
            ]
            ,'IN' => [
                'op.SalePatternCcd' => ['694001','694002','694003']      #일반/재수강/수강연장 인것
                ,'op.PayStatusCcd' => ['676001','676006']                  #결제완료/환불완료
                ,'o.PayRouteCcd' => ['670001','670002','670005']         #온라인결제(PG사), 학원방문결제, 제휴사결제
            ]
        ];

        if(empty($search_value) === false) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'ORG' => [
                    'LKB' => [
                        'm.MemId' => $search_value,
                        'm.MemName' => $search_value,
                    ],
                    'EQ' => [
                        'm.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                        'm.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                        'm.Phone3' => $search_value, // 전화번호 뒷자리
                    ]
                ]
            ]);
        }

        // 본인이 TM 담당자 일경우 본인 상담 매출내역만 추출해야 함
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == '1010') {
            $arr_condition = array_merge_recursive($arr_condition,[
                'EQ' => ['tc1.ConsultAdminIdx' => $this->session->userdata('admin_idx')],
            ]);
        } else {
            $arr_condition = array_merge_recursive($arr_condition,[
                'EQ' => ['tc1.ConsultAdminIdx' => $this->_reqP('AssignAdminIdx')],
            ]);

        }

        if (!empty($this->_reqP('StartDate')) && !empty($this->_reqP('EndDate'))) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'BDT' => [
                    $this->_reqP('DateType') => [$this->_reqP('StartDate'), $this->_reqP('EndDate')]
                ],
            ]);
        }

        return $arr_condition;
    }

    /**
     * 결제내역 엑셀추출
     */
    public function orderListExcel()
    {
        $arr_condition = $this->_getListConditions();
        $order_by =  ['o.OrderIdx'=>'desc', 'op.OrderProdIdx' => 'asc'];

        $list = $this->tmModel->listOrderExcel($arr_condition, $order_by);

        $headers = ['회원명', '회원아이디', '주문번호', '사이트', '결제완료일', '상품명', '상품금액', '결제금액', '결제상태', 'TM담당자', '배정일', '최종상담일'];
        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('TM결제내역_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d"), $list, $headers);
    }

}