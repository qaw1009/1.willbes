<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockTest extends \app\controllers\FrontController
{
    protected $models = array('mocktest/mockInfoF','_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 모의고사 안내
     */
    public function info()
    {
        $this->load->view('site/mocktest/info',[
            'page_type' => 'info'
        ]);
    }

    /**
     * 모의고사 접수
     */
    public function apply()
    {
        $applyType = $this->codeModel->getCcd('675');

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $s_type = element('s_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_type='.$s_type.'&s_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'pm.CateCode' => $this->_cate_code
                ,'pm.IsUse' => 'Y'
                ,'pm.SiteCode' => $this->_site_code
                ,'pm.AcceptStatusCcd' => $s_type
            ],

            'LKB' => [
                'pm.ProdName' => $s_keyword
            ]
        ];

        $order_by = ['pm.ProdCode'=>'Desc'];

        $list = [];
        $count = $this->mockInfoFModel->listMockTest(true, $arr_condition);

        $paging = $this->pagination('mockTest/apply/cate/'.$this->_cate_code.'/?'.$get_page_params,$count,$this->_paging_limit,$this->_paging_count,true);

        if($count > 0) {
            $list = $this->mockInfoFModel->listMockTest(false, $arr_condition,null,$paging['limit'],$paging['offset'],$order_by);
        }

        $this->load->view('site/mocktest/apply',[
            'arr_input' => $arr_input,
            'applyType' => $applyType,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,
            'page_type' => 'apply'
        ]);
    }

    public function apply_modal($params=[])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('모의고사 코드가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }

        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code
                ,'pm.IsUse' => 'Y'
            ],
        ];

        $mock_data = $this->mockInfoFModel->listMockTest(false, $arr_condition,null,null,null, null)[0];

        if (empty($mock_data) === true) {
            return $this->json_error('모의고사 정보가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }



        //내결제이력 (0보다 크면 이력 존재)
        $my_pay_check = $mock_data['PayCnt'];

        //전체결제이력 (학원응시일 경우 접수마감인원 체크)
        $all_pay_check =  $mock_data['AllPayCnt'];

        $mock_apply = '';
        if($my_pay_check > 0) {
            $mock_apply = $this->mockInfoFModel->findApplyMockTestByProdCode($prod_code);
        }

        //직렬 추출
        $mock_part = $this->mockInfoFModel->listMockTestMockPart($prod_code);

        //응시지역 추출
        $mock_area = $this->mockInfoFModel->listMockTestArea($prod_code);

        //필수 과목정보 추출
        $subject_ess = $this->mockInfoFModel->listMockTestSubject($prod_code, 'E');

        //선택 과목정보 추출
        $subject_sub = $this->mockInfoFModel->listMockTestSubject($prod_code, 'S');

        //가산점 추출
        $mock_addpoint = $this->mockInfoFModel->listMockTestAddPoint($prod_code);

        $this->load->view('site/mocktest/apply_regist_modal', [
            'ele_id' => $this->_req('ele_id'),
            'ProdCode' => $prod_code,
            'my_pay_check' => $my_pay_check,
            'all_pay_check' => $all_pay_check,
            'mock_data' => $mock_data,
            'mock_part' => $mock_part,
            'mock_area' => $mock_area,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
            'mock_addpoint' => $mock_addpoint,
            'mock_apply' => $mock_apply
        ]);

    }


    /**
     * 이의제기/정오표
     */
    public function board()
    {

        $this->load->view('site/mocktest/board',[
            'page_type' => 'board'
        ]);

    }



}