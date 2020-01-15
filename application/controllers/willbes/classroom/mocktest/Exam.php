<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'mocktestNew/mockExamF','_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/mocktest/exam';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_is_take = element('s_is_take',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $get_page_params = 's_is_take='.$s_is_take;
        $get_page_params .= 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'OP.PayStatusCcd' => '676001',
                //'MP.IsStatus' => 'Y',
                'MR.MemIdx'   => $this->session->userdata('mem_idx'),
                'MR.IsTake' => $s_is_take
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $s_keyword
                ]
            ]
        ];

        $column = 'MP.*, MR.IsTake, MR.MrIdx,
                   (SELECT SiteGroupName FROM lms_site_group WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   MR.RegDatm AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,
                   C1.CateName, C1.IsUse AS IsUseCate, TakeStartDatm, TakeEndDatm';

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockExamFModel->listExam(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index?'.$get_page_params, $total_rows, $this->_paging_limit, $paging_count,true);

        if ($total_rows > 0) {
            $list = $this->mockExamFModel->listExam(false, $arr_condition, $column, $paging['limit'], $paging['offset'], ['O.CompleteDatm'=>'DESC', 'MP.ProdCode'=>'DESC']);
        }

        $this->load->view('/classroom/mocktestNew/exam/index', [
            'page_type' => 'exam',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
        ]);
    }
}