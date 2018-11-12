<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO - 주문/결제 정보 완료 후 개발 진행 : 11. 12
 */
require_once APPPATH . 'controllers/lms/crm/tm/BaseTm.php';
class TmOrder extends BaseTm
{
    public function __construct()
    {
        parent::__construct();
    }

    //결제/환불 목록
    public function index()
    {
        //TM 목록
        $tm_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);   //TM목록
        $codes = $this->codeModel->getCcdInArray(['676']);      //결제상태


        $this->load->view('crm/tm/order_list',[
            'PayStatusCcd' => $codes['676'],
            'AssignAdmin' => $tm_admin
        ]);
    }

    public function OrderListAjax()
    {

        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}