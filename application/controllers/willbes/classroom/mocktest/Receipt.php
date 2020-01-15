<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receipt extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'mocktest/mockExam','_lms/sys/code','mocktestNew/mockInfoF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/mocktest/receipt';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 접수현황
     */
    public function index()
    {
        $applyType = $this->config->item('sysCode_applyType', 'mock');
        $paymentStatus = $this->config->item('sysCode_paymentStatus', 'mock');
        $codes = $this->codeModel->getCcdInArray([$applyType, $paymentStatus]);
        $arr_base['apply_type'] = $codes[$applyType];
        $arr_base['filter_payment_status'] = array_filter_keys($codes[$paymentStatus], $this->mockInfoFModel->arr_payment_status_ccd);
        $arr_base['payment_status'] = $codes[$paymentStatus];

        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $get_page_params = 's_take_form=' . element('s_take_form', $arr_input);
        $get_page_params .= '&s_pay_status_ccd=' . element('s_pay_status_ccd', $arr_input);
        $get_page_params .= '&s_keyword=' . element('s_keyword', $arr_input);
        $get_params = http_build_query($arr_input);

        $arr_condition_main = [
            'EQ' => [
                'mr.TakeForm' => element('s_take_form', $arr_input),
                'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        $arr_condition_sub = [
            'EQ' => [
                'OP.PayStatusCcd' => element('s_pay_status_ccd', $arr_input)
            ],
            'ORG' => [
                'LKB' => [
                    'pm.ProdName' => element('s_keyword', $arr_input)
                ]
            ],
        ];

        $total_rows = $this->mockInfoFModel->findRegisterByOrderProdIdx('classroom', true, $arr_condition_main, $arr_condition_sub);
        $paging = $this->pagination($this->_default_path.'/index?'.$get_page_params, $total_rows,$this->_paging_limit, (APP_DEVICE == 'pc') ? $this->_paging_count : $this->_paging_count_m,true);

        if ($total_rows > 0) {
            $list = $this->mockInfoFModel->findRegisterByOrderProdIdx('classroom', false,$arr_condition_main, $arr_condition_sub, $paging['limit'], $paging['offset'], ['A.MrIdx'=>'DESC']);
        }

        $this->load->view('/classroom/mocktestNew/receipt/index', [
            'page_type' => 'receipt',
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' =>$list,
            'paging' => $paging
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
        $this->load->view('/classroom/mocktestNew/receipt/apply_order_popup', [
            'ele_id' => $this->_req('ele_id'),
            'order_info' => $order_info,
            'subject_ess' => $subject_ess,
            'subject_sub' => $subject_sub,
        ]);
    }
}