<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockTest extends \app\controllers\FrontController
{
    protected $models = array('mocktest/mockInfoF','_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('apply_modal','apply_cart_modal','apply_order');

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

    /**
     * 모의고사 신청하기 폼
     * @param array $params
     * @return CI_Output
     */
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
        $order_prod_idx = $mock_data['OrderProdIdx'];

        //전체결제이력 (학원응시일 경우 접수마감인원 체크)
        $all_pay_check =  $mock_data['AllPayCnt'];

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
            'order_prod_idx' => $order_prod_idx,
            'all_pay_check' => $all_pay_check,
            'mock_data' => $mock_data,
            'mock_part' => $mock_part,
            'mock_area' => $mock_area,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
            'mock_addpoint' => $mock_addpoint,
        ]);
    }


    /**
     * 장바구니 신청 내역 조회
     * @param array $params
     * @return CI_Output
     */
    public function apply_cart_modal($params=[])
    {
        $cart_idx = $params[0];

        $cart_info = $this->mockInfoFModel->findCartByCartIdx($cart_idx);

        $cart_info['PostData'] = json_decode($cart_info['PostData'], true);

        $cart_info['take_form'] =$cart_info['PostData']['mock_exam']['take_form'];          //응시형태
        $cart_info['take_area'] =$cart_info['PostData']['mock_exam']['take_area'];          //지역
        $cart_info['take_part'] =$cart_info['PostData']['mock_exam']['take_part'];          //직렬
        $cart_info['subject_ess'] =$cart_info['PostData']['mock_exam']['subject_ess'];  //필수과목
        $cart_info['subject_sub'] =$cart_info['PostData']['mock_exam']['subject_sub'];  //선택과목
        $cart_info['add_point'] =$cart_info['PostData']['mock_exam']['add_point'];      //가산점

        //dd($cart_info);

        $prod_code = $cart_info['ProdCode'];

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

        $this->load->view('site/mocktest/apply_cart_modal', [
            'ele_id' => $this->_req('ele_id'),
            'ProdCode' => $prod_code,
            'mock_data' => $mock_data,
            'mock_part' => $mock_part,
            'mock_area' => $mock_area,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
            'mock_addpoint' => $mock_addpoint,
            'cart_info' => $cart_info
        ]);
    }


    /**
     * 주문내역 조회
     * @param array $params
     * @return CI_Output
     */
    public function apply_order($params=[])
    {

        if(empty($params)) {
            return $this->json_error('주문 코드가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }

        $order_prod_idx = $params[0];

        //신청 내역
        $order_info = $this->mockInfoFModel->findRegistByOrderProdIdx($order_prod_idx);

        //신청 과목정보 추출
        $regist_subject = $this->mockInfoFModel->findRegistSubject($order_prod_idx);

        $subject_ess = '';
        $subject_sub = [];
        foreach ($regist_subject as $rows) {
            if($rows['MockType'] == 'E') {
                $subject_ess = $rows['subject_names'];
            } else if($rows['MockType'] == 'S') {
                $subject_sub = explode(',',$rows['subject_names']);
            }
        }

        //$this->load->view('site/mocktest/apply_order_popup', [
        $this->load->view('site/mocktest/apply_order_popup', [
            'ele_id' => $this->_req('ele_id'),
            'order_info' => $order_info,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
        ]);
    }


    /**
     * 이의제기/정오표 : 모의고사 리스트
     */
    public function board()
    {
        $arr_input = $this->_reqG(null,false);
        $s_keyword = element('s_keyword',$arr_input);
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'pm.SiteCode' => $this->_site_code,
                'pm.CateCode' => $this->_cate_code,
                'pm.IsUse' => 'Y'

            ],
            'LKB' => [
                'pm.ProdName' => $s_keyword
            ]
        ];

        $column = 'pm.*,
                    IFNULL(DATE_FORMAT(pm.TakeStartDatm, \'%Y%m%d\'), 0) as TakeStartDate,
                    IFNULL(DATE_FORMAT(pm.TakeEndDatm, \'%Y%m%d\'), 0) as TakeEndDate,
                    IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS noticeCnt
                    ';
        $order_by = ['pm.ProdCode'=>'Desc'];

        $list = [];
        $count = $this->mockInfoFModel->listMockTestForBoard(true, $arr_condition);
        $paging = $this->pagination('mockTest/board/cate/'.$this->_cate_code.'/?'.$get_page_params,$count,$this->_paging_limit,$this->_paging_count,true);
        if($count > 0) {
            $list = $this->mockInfoFModel->listMockTestForBoard(false, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
        }

        $this->load->view('site/mocktest/board_product',[
            'page_type' => 'board',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'def_cate_code' => $this->_cate_code,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    /**
     * 모의고사 이의제기 목록
     */
    public function listQna()
    {
        $this->load->view('site/mocktest/board_list_qna',[
            'page_type' => 'board',
            /*'arr_input' => $arr_input,
            'get_params' => $get_params,
            'def_cate_code' => $this->_cate_code,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,*/
        ]);
    }

    /**
     * 모의고사 정오표 목록
     */
    public function listNotice()
    {
        $this->load->view('site/mocktest/board_list_notice',[
            'page_type' => 'board',
            /*'arr_input' => $arr_input,
            'get_params' => $get_params,
            'def_cate_code' => $this->_cate_code,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,*/
        ]);
    }

    /**
     * 모의고사 이의제기 등록 폼
     */
    public function createQna()
    {
        $arr_input = $this->_reqG(null,false);
        $prod_code = element('prod_code', $arr_input);

        // 모의고사 상품 상세 조회
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'pm.IsUse' => 'Y',
                'pm.CateCode' => $this->_cate_code,
                'pm.SiteCode' => $this->_site_code,
                'op.PayStatusCcd' => '676001'
            ],
            'RAW' => [
                'op.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        $data = $this->mockInfoFModel->findRegistForBoard($arr_condition);
        /*if (empty($data) === true) {
            show_alert('조회된 모의고사 상품이 없습니다.', 'back');
        }

        if (empty($data['IsTake']) === true) {
            show_alert('응시한 모의고사 상품이 아닙니다.', 'back');
        }*/

        $this->load->view('site/mocktest/board_create_qna',[
            'page_type' => 'board',
            'arr_input' => $arr_input,
            'def_cate_code' => $this->_cate_code,
            'data' => $data
        ]);
    }

}