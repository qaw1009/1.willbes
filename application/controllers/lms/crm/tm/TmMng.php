<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/crm/tm/BaseTm.php';
class TmMng extends BaseTm
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * tm 배정 폼
     */
    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['687', '718']);
        $assign_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);
        $method='POST';

        $this->load->view("crm/tm/create",[
            'AssignCcd' => $codes['687'],
            'InterestCcd' => $codes['718'],
            'AssignAdmin' => $assign_admin,
            'method'=>$method
        ]);
    }


    /**
     * 대상 회원 검색
     */
    public function search()
    {

        $rules = [
            ['field'=>'InterestCcd', 'label'=>'준비과정', 'rules'=>'trim|required'],
            ['field'=>'AssignCcd', 'label'=>'조건', 'rules'=>'trim|required'],
            ['field'=>'SearchDate', 'label'=>'조건 적용일', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->tmModel->searchMember($this->_reqP(null));
        $this->json_result(true, '','',$result);
    }


    /**
     * Tm 목록페이지
     */
    public function tmIndex()
    {
        $codes = $this->codeModel->getCcdInArray(['687', '718']);

        $this->load->view("crm/tm/list", [
            'AssignCcd' => $codes['687'],
            'InterestCcd' => $codes['718'],
        ]);
    }

    /**
     * TM 목록 추출
     * @return CI_Output
     */
    public function tmListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.AssignCcd' => $this->_reqP('AssignCcd'),
                'A.InterestCcd' => $this->_reqP('InterestCcd')
            ]
        ];

        if(empty($this->_reqP('StartDate'))=== false and empty($this->_reqP('EndDate')) === false ) {
            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'DATE_FORMAT(A.RegDatm,\'%Y-%m-%d\')' => '\''.  $this->_reqP('StartDate') .'\' and \'' . $this->_reqP('EndDate') .'\''
                ]
            ]);
        }

        $list = [];
        $count = $this->tmModel->listTm(true,$arr_condition);

        if($count > 0) {
            $list = $this->tmModel->listTm(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.TmIdx' => 'Desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 회원 배정 처리
     * @return CI_Output|void
     */
    public function assign()
    {
        $rules = [
            ['field'=>'InterestCcd', 'label'=>'준비과정', 'rules'=>'trim|required'],
            ['field'=>'AssignCcd', 'label'=>'조건', 'rules'=>'trim|required'],
            ['field'=>'SearchDate', 'label'=>'조건 적용일', 'rules'=>'trim|required'],
            ['field'=>'MemCnt', 'label'=>'검색건수', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->tmModel->assignMember($this->_reqP(null));

        if($result['ret_cd'] === true) {
            return $this->json_result($result['ret_cd'], '', '', $result['ret_data']);
        } else {
            return $this->json_result($result['ret_cd'], '', $result);
        }
    }


    /**
     * 수동 배정
     */
    public function assignManualCreate()
    {
        $codes = $this->codeModel->getCcdInArray(['687', '718']);
        $assign_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);

        $this->load->view("crm/tm/create_manual_modal",[
            'AssignCcd' => $codes['687'],
            'InterestCcd' => $codes['718'],
            'AssignAdmin' => $assign_admin,
        ]);
    }

    /**
     * 수동 배정을 위한 회원 목록
     * @return CI_Output
     */
    public function assignManualMemberList()
    {
        $list = [];
        $count = 0;

        if(empty($this->_reqP('_manual_search_value')) != true) {

            $arr_condition = [
                'ORG' => [
                    //'LKB' => [
                    'EQ' => [
                        'A.MemId' => $this->_reqP('_manual_search_value'),
                        'A.MemName' => $this->_reqP('_manual_search_value')
                    ]
                ]
            ];

            $order_by = ['A.JoinDate'=>'desc'];

            $count = $this->tmModel->searchMemberManual(true,$arr_condition);
            if($count > 0) {
                $list = $this->tmModel->searchMemberManual(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 회원 수동 배정 처리
     * @return CI_Output|void
     */
    public function assignManual()
    {
        $rules = [
            ['field'=>'_InterestCcd', 'label'=>'준비과정', 'rules'=>'trim|required'],
            ['field'=>'_AssignCcd', 'label'=>'조건', 'rules'=>'trim|required'],
            ['field'=>'_wAdminIdx', 'label'=>'TM', 'rules'=>'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->tmModel->assignMemberManual($this->_reqP(null));

        if($result['ret_cd'] === true) {
            return $this->json_result($result['ret_cd'], '', '', $result['ret_data']);
        } else {
            return $this->json_result($result['ret_cd'], '', $result);
        }
    }

}