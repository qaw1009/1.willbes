<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyClass extends \app\controllers\FrontController
{
    protected $models = array('supportersF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_paging_limit = 8;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = $this->_reqG(null);
        $this->load->view('site/supporters/myclass/index', [
            'arr_input' => $arr_input
        ]);
    }

    public function listAjax()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $supporters_idx,
                'a.IsStatus' => 'Y'
            ]
        ];

        $column = '
            a.SmcIdx, a.SupportersIdx, a.MemIdx, a.IsPublic, a.Content, a.AttachFileName, a.AttachFileRealName, a.AttachFilePath,
            DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS RegDatm,
            b.MemId, b.MemName
        ';

        $order_by = ['SmcIdx'=>'Desc'];
        $list = [];
        $total_rows = $this->supportersFModel->listMyClass(true, $arr_condition,'');
        $paging = $this->pagination('/supporters/myClass/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportersFModel->listMyClass(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    public function ajaxPaging()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $supporters_idx,
                'a.IsStatus' => 'Y'
            ]
        ];
        $total_rows = $this->supportersFModel->listMyClass(true, $arr_condition,'');
        $paging = $this->pagination('/supporters/myClass/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);
        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function create()
    {
        $arr_input = $this->_reqG(null);
        $smc_idx = element('smc_idx', $arr_input);
        $supporters_idx = element('supporters_idx', $arr_input);

        $method = 'POST';
        $data = null;

        if (empty($smc_idx) === false) {
            $method = 'PUT';
        }

        $this->load->view('site/supporters/myclass/create', [
            'method' => $method,
            'smc_idx' => $smc_idx,
            'supporters_idx' => $supporters_idx,
            'data' => $data
        ]);
    }

    public function show()
    {
        $arr_input = $this->_reqG(null);
        $smc_idx = element('smc_idx', $arr_input);

        if (empty($smc_idx) === true) {
            show_alert('잘못된 접근 입니다.', '/supporters/home/index', false);
        }

        $column = '
            a.SmcIdx, a.SupportersIdx, a.MemIdx, a.IsPublic, a.Content, a.AttachFileName, a.AttachFileRealName, a.AttachFilePath,
            DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS RegDatm,
            b.MemId, b.MemName
        ';
        $arr_condition = [
            'EQ' => [
                'a.SmcIdx' => $smc_idx,
                'a.IsStatus' => 'Y'
            ],
        ];
        $data = $this->supportersFModel->findMyClass($arr_condition, $column);

        if (empty($data) === true) {
            show_alert('조회된 데이터가 없습니다.', '/supporters/home/index', false);
        }

        $this->load->view('site/supporters/myclass/show', [
            'smc_idx' => $smc_idx,
            'data' => $data
        ]);
    }

    /**
     * 나의소개 등록/수정
     * TODO : 수정기능 없음, 코드만 구현
     */
    public function store()
    {
        $idx = '';
        $method = 'add';
        $rules = [
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'myclass_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //addMyClass
        $result = $this->supportersFModel->{$method . 'MyClass'}($inputData, $idx);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    private function _setInputData($input){
        $input_data = [
            'SupportersIdx' => element('supporters_idx', $input),
            'MemIdx' => $this->session->userdata('mem_idx'),
            'Content' => element('myclass_content', $input),
            'IsPublic' => element('is_public', $input),
            'RegIp' => $this->input->ip_address()
        ];
        return$input_data;
    }
}