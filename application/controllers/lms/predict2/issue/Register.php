<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends \app\controllers\BaseController
{
    protected $models = array('predict/predict2');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $def_site_code = '2005';
        $arr_base = [];

        $arr_base['predict2_list'] = $this->predict2Model->getGoodsList();
        $arr_base['take_mock_part'] = $this->predict2Model->getTakeMockPart();
        $arr_base['reg_paper'] = $this->predict2Model->getRegPaper();

        $this->load->view('predict2/issue/register/index', [
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'P.PredictIdx2' => $this->_reqP('search_PredictIdx2'),
                'PR.SiteCode' => $this->_reqP('search_site_code'),
                'PR.TakeMockPart' => $this->_reqP('search_TakeMockPart'),
                'PP.PpIdx' => $this->_reqP('search_paper'),
                'PR.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'M.MemName' => $this->_reqP('search_fi', true),
                    'M.MemId' => $this->_reqP('search_fi', true),
                    'PR.TakeNumber' => $this->_reqP('search_fi', true)
                ]
            ],
        ];

        $list = [];
        $count = $this->predict2Model->mainRegisterList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->predict2Model->mainRegisterList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}