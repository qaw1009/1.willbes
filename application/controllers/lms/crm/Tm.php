<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tm extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'crm/tm/tm', 'member/manageMember');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Tm 목록페이지
     */
    public function tmIndex()
    {
        $codes = $this->codeModel->getCcdInArray(['687']);

        $this->load->view("crm/tm/list", [
            'AssignCcd' => $codes['687']
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
                'A.AssignCcd' => $this->_reqP('AssignCcd')
            ]
        ];

        if(empty($this->_reqP('StartDate'))=== false and empty($this->_reqP('EndDate')) === false ) {
            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'A.RegDatm between' => '\''.  $this->_reqP('StartDate') .'\' and \'' . $this->_reqP('EndDate') .'\''
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
     * tm 배정 폼
     */
    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['687']);
        $assign_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);
        $method='POST';

        $this->load->view("crm/tm/create",[
            'AssignCcd' => $codes['687'],
            'AssignAdmin' => $assign_admin,
            'method'=>$method
        ]);
    }

    /**
     * 검색 및 배정
     */
    public function search()
    {
        //return $this->json_result(true, '', '', '30'); // 테스트용

        $rules = [
            ['field'=>'AssignCcd', 'label'=>'조건', 'rules'=>'trim|required'],
            ['field'=>'SearchDate', 'label'=>'조건 적용일', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->tmModel->searchMember($this->_reqP(null));
        //echo var_dump($result);exit;
        $this->json_result(true, '','',$result);

    }

    /**
     * 회원 배정 처리
     * @return CI_Output|void
     */
    public function assign()
    {

        //return $this->json_result(true, '', '', '30'); //테스트용

        $rules = [
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
     * 배정 정보
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

    /**
     * TM 회원관리
     */
    public function assignMember()
    {
        $codes = $this->codeModel->getCcdInArray(['687']);
        $assign_admin = $this->tmModel->listAdmin(['EQ'=>['C.RoleIdx'=>'1010']]);

        $this->load->view('crm/tm/assign_member_list',[
            'AssignCcd' => $codes['687'],
            'AssignAdmin' => $assign_admin
        ]);
    }

    /**
     * TM 회원관리 회원 배정 리스트
     */
    public function assignMemberAjax()
    {
        /*
        echo array_get($this->session->userdata('admin_auth_data'), 'Role.RoleIdx');
        echo $this->session->userdata('admin_auth_data')['Role']['RoleIdx'];
        */
        $search_value = $this->_reqP('search_value');
        $search_value_enc = $this->tmModel->getEncString($search_value);

        $arr_condition = [
            'EQ' => [
                'A.AssignCcd' => $this->_reqP('AssignCcd'),
                'B.AssignAdminIdx' => $this->_reqP('AssignAdminIdx')
            ],
            'ORG' => [
                'LKB' => [
                    'D.MemId' => $search_value,
                    'D.MemName' => $search_value,
                ],
                'EQ' => [
                    'D.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                    'D.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                    'D.Phone3' => $search_value, // 전화번호 뒷자리
                ]
            ]
        ];

        if(empty($this->_reqP('StartDate'))=== false and empty($this->_reqP('EndDate')) === false ) {
            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'Date_format(A.RegDatm,\'%Y-%m-%d\')  between' => '\''.  $this->_reqP('StartDate') .'\' and \'' . $this->_reqP('EndDate') .'\''
                ]
            ]);
        }

        // 본인이 TM 담당자 일경우 본인 배정 회원만 추출해야 함.
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == '1010') {
            $arr_condition = array_merge($arr_condition,[
                'EQ' => ['B.AssignAdminIdx' => $this->session->userdata('admin_idx')],
            ]);
        }

        $order_by =  ['A.TmIdx'=>'desc', 'B.TaIdx' => 'asc'];

        $list = [];
        $count = $this->tmModel->listAssignMember(true,$arr_condition);

        if($count > 0) {
            $list = $this->tmModel->listAssignMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 상담관련 기본 정보
     * @param array $params
     * @return CI_Output
     */
    public function consult($params=[])
    {
        if(empty($params[0])) {
            return $this->json_error('회원식별자가 없습니다.');
        }

        $mem_idx = $params[0];
        $ta_idx = $params[1];

        $data_mem = $this->manageMemberModel->getMember($mem_idx);
        $codes = $this->codeModel->getCcdInArray(['687','688','689']);

        $list_cs = [];
        $list_coupon = [];

        $this->load->view('crm/tm/consult_modal',[
            'TaIdx' => $ta_idx,
            'AssignCcd' => $codes['687'],
            'ConsultCcd' => $codes['688'],
            'TmClassCcd' => $codes['689'],
            'data_mem' => $data_mem,
            'list_cs' => $list_cs,
            'list_coupon' => $list_coupon
        ]);
    }

    /**
     * 상담내역 목록 추출
     * @return CI_Output
     */
    public function consultListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'B.MemIdx' => $this->_reqP('MemIdx')
                ,'D.ConsultCcd' => $this->_reqP('_consult_search_ConsultCcd')
                ,'D.TmClassCcd' => $this->_reqP('_consult_search_TmClassCcd')
            ],

            'LKB' => [
                'D.TmContent' => $this->_reqP('_consult_search_value'),
            ],
        ];

        $order_by =  ['D.TcIdx'=>'desc'];

        $list = [];

        $count = $this->tmModel->listConsult(true,$arr_condition);
        if($count > 0) {
            $list = $this->tmModel->listConsult(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }


    /**
     * 상담 등록
     * @return CI_Output|void
     */
    public function consultStore()
    {
        $method = 'add';
        $rules = [
            ['field'=>'_reg_TmClassCcd', 'label'=>'상담대상유형', 'rules'=>'trim|required'],
            ['field'=>'_reg_TmClassCcd', 'label'=>'TM분류', 'rules'=>'trim|required'],
            ['field'=>'MemIdx', 'label'=>'회원식별자', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->tmModel->addConsult($this->_reqP(null));

        return $this->json_result($result, '', $result);
    }
}