<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockReceipt extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'mocktest/mockExam','_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/MockReceipt/';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 온라인 모의고사 접수현황페이지
     * @return object|string
     */
    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_IsStatus = element('s_IsStatus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $get_page_params = 's_IsStatus='.$s_IsStatus;
        $get_page_params .= 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_req('search_site_code'),
                'OP.PayStatusCcd' => $this->_req('search_PayStatusCcd'),
                'MR.TakeForm' => $this->_req('search_TakeForm'),
                'MR.TakeArea' => $this->_req('search_TakeArea'),
                'MR.IsTake' => $this->_req('search_IsTake'),
                'MR.MemIdx' => $_SESSION['mem_idx']
            ],
            'ORG' => [
                'LKB' => [
                    'U.MemName' => $this->_req('search_fi', true),
                    'U.MemId' => $this->_req('search_fi', true),
                    'U.Phone3' => $this->_req('search_fi', true),
                    'PD.ProdName' => $this->_req('search_fi', true),
                    'MR.ProdCode' => $this->_req('search_fi', true),
                    'MR.TakeNumber' => $this->_req('search_fi', true),
                    'O.OrderNo' => $this->_req('search_fi', true),
                ]
            ],
        ];

        $order_by = ['MR.MrIdx'=>'DESC'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockExamModel->listBoardReceipt(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->mockExamModel->listBoardReceipt(false,$arr_condition,$paging['limit'],$paging['offset'],$order_by);
        }

        $paymentStatus = $this->config->item('sysCode_paymentStatus', 'mock');
        $applyType = $this->config->item('sysCode_applyType', 'mock');
        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');

        $codes = $this->codeModel->getCcdInArray([$paymentStatus, $applyType, $applyArea1, $applyArea2]);

        $this->load->view('/classroom/mock/receipt/index', [
            'default_path' => $this->_default_path,
            'arr_input'    => $arr_input,
            'get_params'   => $get_params,
            'list'         =>$list,
            'paging'       => $paging,
            'paymentStatus' => $codes[$paymentStatus],

        ]);
    }

    /**
     * 문제/해설 ajax
     * @return object|string
     */
    public function subjectAjax()
    {

        $prodcode = $this->_req("prodcode");
        $memidx = $this->_req("memidx");

        $subject = $this->mockExamModel->subjectDetailPrivate($prodcode, $memidx);

        return $this->response([
            'data' => $subject
        ]);

    }



}
