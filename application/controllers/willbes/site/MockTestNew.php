<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportMockTest.php';

class MockTestNew extends SupportMockTest
/*class MockTestNew extends \app\controllers\FrontController*/
{
    protected $models = array('mocktestNew/mockInfoF', 'categoryF', '_lms/sys/code', 'support/supportBoardTwoWayF', 'support/supportBoardF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array('apply_modal','apply_cart_modal','apply_order', 'createQna');

    protected $_bm_idx_qna = '95';        //이의제기
    protected $_bm_idx_notice = '96';     //정오표
    protected $_default_path = 'mockTestNew';
    protected $_include_path = 'site.mocktestNew';
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
        $this->load->view('site/mocktestNew/info',[
            'page_type' => 'info'
        ]);
    }

    /**
     * 모의고사 접수
     */
    public function apply()
    {
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);
        $arr_base['applyType'] = $this->codeModel->getCcd('675');
        unset($arr_base['applyType']['675001']);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_type = element('s_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_cate_code='.$s_cate_code.'&s_type='.$s_type.'&s_keyword='.$s_keyword;

        if($s_type == 675001){
            $search_date1 = '(pm.SaleStartDatm > "';
            $search_date2 = date('Y-m-d H:i:s') . '")';
        } else if($s_type == 675002) {
            $search_date1 = '(pm.SaleStartDatm < "';
            $search_date2 = date('Y-m-d H:i:s') . '" AND pm.SaleEndDatm > "' . date('Y-m-d H:i:s') . '")';
        } else {
            $search_date1 = '1=';
            $search_date2 = '1';
        }

        $arr_condition = [
            'EQ' => [
                'pm.CateCode' => (empty($s_cate_code) === true) ? $this->_cate_code : $s_cate_code,
                'pm.IsUse' => 'Y',
                'pm.SiteCode' => $this->_site_code
            ],
            'LKB' => [
                'pm.ProdName' => $s_keyword
            ],
            'RAW' => [ $search_date1 => $search_date2 ]
        ];
        $order_by = ['pm.ProdCode'=>'Desc'];

        $list = [];
        $count = $this->mockInfoFModel->listMockTest(true, $arr_condition);
        $paging = $this->pagination('/mockTestNew/apply/cate/'.$this->_cate_code.'?'.$get_page_params,$count,$this->_paging_limit,$this->_paging_count,true);
        if($count > 0) {
            $list = $this->mockInfoFModel->listMockTest(false, $arr_condition, null, $paging['limit'], $paging['offset'], $order_by);
        }

        $this->load->view('site/mocktestNew/apply',[
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,
            'page_type' => 'apply',
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

        $mock_data = $this->mockInfoFModel->findMockTest($arr_condition);
        if (empty($mock_data) === true) {
            return $this->json_error('모의고사 정보가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }

        $arr_take_forms = $this->codeModel->getCcd('690');
        foreach (explode(',', preg_replace("/\s+/", "", $mock_data['TakeFormsCcd'])) as $key => $val) {
            if (empty($arr_take_forms[$val]) === false) {
                $mock_data['arrTakeFormsCcd'][$val] = $arr_take_forms[$val];
            }
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

        $this->load->view('site/mocktestNew/apply_regist_modal', [
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

        $this->load->view('site/mocktestNew/apply_cart_modal', [
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
        $arr_condition = [
            'EQ' => [
                'mr.MemIdx' => $this->session->userdata('mem_idx'),
                'mr.OrderProdIdx' => $order_prod_idx
            ]
        ];
        $order_info = $this->mockInfoFModel->findRegisterByOrderProdIdx('site', false, $arr_condition);
        if (empty($order_info) === true) {
            return $this->json_error('조회된 정보가 없습니다.', _HTTP_BAD_REQUEST);
        }

        $subject_ess = ''; $subject_sub = [];
        $temp_subject_depth1 = explode(',', $order_info['subject_names']);
        $temp_subject_depth2 = [];
        foreach ($temp_subject_depth1 as $key => $val) {
            $temp_subject_depth2[] = explode('|', $val);
        }
        foreach ($temp_subject_depth2 as $rows) {
            if ($rows[0] == 'E' && (empty($rows[1]) === false)) {
                $subject_ess .= $rows[1].',';
            } else if ($rows[0] == 'S' && (empty($rows[1]) === false)) {
                $subject_sub[] = $rows[1];
            }
        }
        $subject_ess = substr($subject_ess, 0, -1);
        $this->load->view('site/mocktestNew/apply_order_popup', [
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
        $this->_board();
    }

    /**
     * 모의고사 이의제기 목록
     */
    public function listQna()
    {
        $this->_listQna();
    }

    /**
     * 모의고사 이의제기 등록 폼
     */
    public function createQna()
    {
        $this->_createQna();
    }

    /**
     * 모의고사 이의제기 등록
     */
    public function boardQnaStore()
    {
        $this->_boardQnaStore();
    }

    public function showQna()
    {
        $this->_showQna();
    }

    /**
     * 모의고사 이의제기 게시물 삭제
     */
    public function deleteQna()
    {
        $this->_deleteQna();
    }

    /**
     * 모의고사 정오표 목록
     */
    public function listNotice()
    {
        $this->_listNotice();
    }

    public function showNotice()
    {
        $this->_showNotice();
    }
}