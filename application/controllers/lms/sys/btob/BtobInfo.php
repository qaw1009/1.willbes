<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobInfo extends \app\controllers\BaseController
{
    protected $models = array('sys/code','sys/btob');
    protected $helpers = array();
    private $_ccd = ['672','673','674','699'];


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $arr_condition = [
        ];

        $list = $this->btobModel->listCompany(false,$arr_condition,null,null,['A.BtobIdx' => 'desc']);

        $this->load->view('sys/btob/index', [
            'data' => $list
        ]);

    }


    public function create($params=[])
    {

        $codes = $this->codeModel->getCcdInArray($this->_ccd);

        $method='POST';
        $btobidx = null;
        $data = null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $btobidx = $params[0];
            $data = $this->btobModel->findCompanyForModify($btobidx);
        }

        $this->load->view('sys/btob/create_modal',[
            'method' => $method
            ,'tel'=>$codes['672']
            ,'hp'=>$codes['673']
            ,'control'=>$codes['699']
            ,'btobidx' => $btobidx
            ,'data' => $data
        ]);

    }


    public function store()
    {
        $rules = [
            ['field' => 'BtobName', 'label' => '제휴사명', 'rules' => 'trim|required']
        ];

        if(empty($this->_reqP('btobidx')) === true){
            $method = 'add';
            $rules = array_merge($rules,[
                ['field' => 'BtobId', 'label' => '제휴사아이디', 'rules' => 'trim|required|alpha_dash']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules,[
                ['field' => 'btobidx', 'label' => '식별자', 'rules' => 'trim|required']
            ]);
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobModel->{$method.'Company'}($this->_reqP(null));

        $this->json_result($result,'저장 되었습니다.',$result);
    }


    /**
     * IP 등록 폼
     * @param array $params
     */
    public function createIp($params=[])
    {

        $method='POST';
        $btobidx = $params[0];

        $this->load->view('sys/btob/create_ip_modal',[
            'method' => $method
            ,'btobidx' => $btobidx
       ]);

    }

    /**
     * ip 등록 처리
     */
    public function storeIp()
    {
        $rules = [
            ['field' => 'btobidx', 'label' => '제휴사식별자', 'rules' => 'trim|required'],
            ['field' => 'ApprovalIp', 'label' => 'IP주소', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $cnt = $this->btobModel->listIp(true, [
            'EQ' => [
                'A.BtoBIdx' => $this->_req('btobidx'),
                'A.ApprovalIp' => $this->_req('ApprovalIp')
            ]
        ]);

        if($cnt > 0){
            return $this->json_error('이미 등록된 아이피 입니다.');
        }

        $result = $this->btobModel->addIp($this->_reqP(null));
        //echo var_dump($result);exit;
        $this->json_result($result,'저장 되었습니다.',$result);
    }


    /**
     * ip 목록추출
     * @return CI_Output
     */
    public function listIp()
    {

        $arr_condition = [
            'EQ' => [
                'A.BtoBIdx' => $this->_reqP('btobidx'),
            ]
        ];
        $order_by =  ['A.BiIdx'=>'desc'];

        $list = [];
        $count = $this->btobModel->listIp(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobModel->listIp(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }


    /**
     *  IP 삭제
     * @return CI_Output
     */
    public function deleteIp()
    {
        $result = $this->btobModel->deleteIp($this->_reqP(null));

        return $this->json_result($result, '', $result);

    }


    /**
     *  제휴사로 등록된 회원목록 팝업
     * @param array $params
     */
    public function listCpMember($params = [])
    {
        $method='POST';
        $btobidx = $params[0];

        $this->load->view('sys/btob/member_list_modal',[
            'method' => $method
            ,'btobidx' => $btobidx
        ]);
    }


    /**
     * 제휴사로 등록된 회원목록
     * @return CI_Output
     */
    public function ajaxCpMember()
    {

        $isStatus = $this->_req('istatus') === 'N' ? '' : 'Y';

        $arr_condition = [
            'EQ' => [
                'B.BtobIdx' => $this->_reqP('btobidx'),
                'R.IsStatus' => $isStatus
            ]
        ];
        $order_by =  ['R.bmIdx' => 'desc'];

        $list = [];
        $count = $this->btobModel->listCpMember(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobModel->listCpMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }


    /**
     *  제휴사 회원 삭제
     * @return CI_Output
     */    
    public function deleteCpMember()
    {
        $btobidx = $this->_req('btobidx');
        $bmidx = $this->_req('bmidx');

        $count = $this->btobModel->listCpMember(true, [
            'EQ' => [
                'B.BtobIdx' => $btobidx,
                'R.bmIdx' => $bmidx,
                'R.IsStatus' => 'Y'
            ]
        ]);

        if($count != 1){
            return $this->json_error('등록된 회원이 아닙니다.');
        }

        if($this->btobModel->deleteCpMember([
                'BtobIdx' => $btobidx,
                'BmIdx' => $bmidx
            ]) === false)
        {
            return $this->json_error('제휴사 회원 삭제에 실패했습니다.\'');
        }

        return $this->json_result(true, '제휴사 회원을 삭제되었습니다.');
    }


    /**
     * 제휴사 회원 추가
     * @return CI_Output
     */
    public function addCpMember()
    {
        $btobidx = $this->_req('btobidx');
        $memidx = $this->_req('mem_idx');

        if(empty($memidx) === true || empty($btobidx) === true){
            return $this->json_error('등록정보가 잘못되었습니다.');
        }

        $count = $this->btobModel->listCpMember(true, [
            'EQ' => [
                'B.BtobIdx' => $btobidx,
                'M.MemIdx' => $memidx,
                'R.IsStatus' => 'Y'
            ]
        ]);

        if($count > 0){
            return $this->json_error('이미 등록된 회원입니다.');
        }

        $count = $this->btobModel->listCpMember(true, [
            'EQ' => [
                'M.MemIdx' => $memidx,
                'R.IsStatus' => 'Y'
            ]
        ]);

        if($count > 0){
            return $this->json_error('다른 제휴사로 등록되어있는 회원입니다.');
        }

        if($this->btobModel->addCpMember([
                'BtobIdx' => $btobidx,
                'MemIdx' => $memidx
            ]) === false)
        {
            return $this->json_error('등록에 실패했습니다.');
        }

        return $this->json_result(true, '등록되었습니다.');

    }
}
