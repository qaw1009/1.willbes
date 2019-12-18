<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMockTest extends \app\controllers\BaseController
{
    protected $models = array('common/searchMockTest','sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $prod_tabs = array_filter(explode(',', $this->_req('prod_tabs')));  // 노출되는 상품 탭
        $hide_tabs = array_filter(explode(',', $this->_req('hide_tabs')));  // 비노출되는 상품 탭
        $is_event = get_var($this->_req('is_event'), 'N');  // change 이벤트 발생 여부
        $is_single = get_var($this->_req('is_single'), '');  // 단일선택 여부
        $return_type = get_var($this->_req('return_type'), 'table');

        $data = [
            'prod_type' => 'mock_exam',
            'prod_tabs' => $prod_tabs,
            'hide_tabs' => $hide_tabs,
            'is_event' => $is_event,
            'is_single' => $is_single,
            'site_code' => $this->_req('site_code'),
            'return_type' => $return_type,
            'target_id' => get_var($this->_req('target_id'), 'bookList'),
            'target_field' => get_var($this->_req('target_field'), 'ProdCode_book'),
        ];

        if ($return_type == 'table') {
            $data['ProdCode'] = $this->_req('ProdCode');
            $data['bookprovision_ccd'] = $this->codeModel->getCcd('610');
        }

        $this->load->view('common/search_mocktest', $data);
    }

    /**
     * 모의고사 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => ['PD.SiteCode' => $this->_reqP('site_code')],
            'ORG' =>[
                'LKB' => [
                    'PD.ProdCode' => $this->_reqP('search_value'),
                    'PD.ProdName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->searchMockTestModel->listMockTest(true,$arr_condition);

        if($count > 0) {
            $list = $this->searchMockTestModel->listMockTest(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PD.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 모의고사 신정정보입력 팝업창
     * @param array $params
     * @return mixed
     */
    public function createApplyRegistModal($params = [])
    {
        $mem_idx = $this->_reqG('mem_idx');

        if (empty($params) === true) {
            return $this->json_error('모의고사 상품코드가 없습니다.');
        }

        if (empty($mem_idx) === true) {
            return $this->json_error('회원식별자가 없습니다.');
        }

        $prod_code = $params[0];
        $arr_condition = ['EQ' => ['PD.ProdCode' => $prod_code]];

        $data = $this->searchMockTestModel->listMockTest(false, $arr_condition, 1, 0, ['PD.ProdCode' => 'desc'], $mem_idx);
        if (empty($data) === true) {
            return $this->json_error('모의고사 데이터 조회에 실패했습니다.');
        }
        $mock_data = $data[0];

        //내결제이력 (0보다 크면 이력 존재)
        $order_prod_idx = $mock_data['OrderProdIdx'];

        //전체결제이력 (학원응시일 경우 접수마감인원 체크)
        $all_pay_check =  $mock_data['AllPayCnt'];

        //직렬 추출
        $mock_part = $this->searchMockTestModel->listMockTestMockPart($prod_code);

        //응시지역 추출
        $mock_area = $this->searchMockTestModel->listMockTestArea($prod_code);

        //필수 과목정보 추출
        $subject_ess = $this->searchMockTestModel->listMockTestSubject($prod_code, 'E');

        //선택 과목정보 추출
        $subject_sub = $this->searchMockTestModel->listMockTestSubject($prod_code, 'S');

        //가산점 추출
        $mock_addpoint = $this->searchMockTestModel->listMockTestAddPoint($prod_code);

        return $this->load->view("common/search_mocktest_apply_regist", [
            'prod_code' => $prod_code,
            'all_pay_check' => $all_pay_check,
            'order_prod_idx' => $order_prod_idx,
            'mock_data' => $mock_data,
            'mock_part' => $mock_part,
            'mock_area' => $mock_area,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
            'mock_addpoint' => $mock_addpoint,
        ]);
    }
}
