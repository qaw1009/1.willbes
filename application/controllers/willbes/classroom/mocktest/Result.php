<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends \app\controllers\FrontController
{
    protected $models = array('downloadF','_lms/sys/code','mocktestNew/mockResultF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/mocktest/result';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $total_img_path = PUBLICURL."uploads/willbes/mocktest/";
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);

        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                //'MP.IsStatus' => 'Y',
                'MR.MemIdx'   => $this->session->userdata('mem_idx'),
                'OP.PayStatusCcd' => '676001',
                'MR.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $s_keyword
                ]
            ]
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockResultFModel->listExam(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index?'.$get_page_params, $total_rows, $this->_paging_limit, $paging_count,true);

        if ($total_rows > 0) {
            $list = $this->mockResultFModel->listExam(false, $arr_condition, $paging['limit'], $paging['offset'], ['O.CompleteDatm'=>'DESC', 'MP.ProdCode'=>'DESC']);
        }

        $this->load->view('/classroom/mocktestNew/result/index', [
            'page_type' => 'result',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'total_img_path' => $total_img_path,
            'list' => $list,
            'paging' => $paging,
            'userid' => $this->session->userdata('mem_id')
        ]);
    }

    /**
     * 과목파일 정보 리스트
     * @return CI_Output
     */
    public function findSubjectFileAjax()
    {
        $prod_code = $this->_req("prod_code");
        $list = $this->mockResultFModel->findSubjectFile($prod_code);
        return $this->response([
            'data' => $list
        ]);
    }

    public function winStatTotal()
    {

    }
}