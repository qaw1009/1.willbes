<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseTm extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'crm/tm/tm', 'member/manageMember');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Tm 값 구분 회원 배정 정보
     */
    public function assignList($params=[])
    {
        $tm_idx = $params[0];
        $data = $this->tmModel->findTm($tm_idx);

        $this->load->view('crm/tm/assign_list_modal',[
            'data' => $data,
            'tm_idx'=>$tm_idx
        ]);
    }

    /**
     * 배정회원 목록 조회
     */
    public function assignListAjax()
    {
        $arr_condition = [
            'EQ' => ['A.TmIdx' => $this->_reqP('tm_idx')],
        ];

        $list = [];
        $count = $this->tmModel->listAssignMember(true,$arr_condition);

        if($count > 0) {
            $list = $this->tmModel->listAssignMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['B.TaIdx' => 'asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }

}