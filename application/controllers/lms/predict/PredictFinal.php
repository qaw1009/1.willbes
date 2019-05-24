<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFinal extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
    protected $helpers = array();


    public function index()
    {

        list($data, $count) = $this->predictModel->mainList();
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->predictModel->getArea($sysCode_Area);
        $serial = $this->predictModel->getSerialAll();

        $this->load->view('predict/predictFinal/index',[
            'predictList' => $data,
            'area' => $area,
            'serial' => $serial,
        ]);
    }


    public function listAjax(){

        $arr_condition = [
            'EQ' => [
                'A.TakeMockPart' => $this->_reqP('search_TakeMockPart'),
                'A.TakeAreaCcd' => $this->_reqP('search_TakeArea'),
                'C.PredictIdx' => $this->_reqP('search_PredictIdx'),
                'C.SiteCode' => $this->_reqP('search_site_code'),
            ],
            'ORG' => [
                'LKB' => [
                    'D.MemId' => $this->_reqP('search_value'),
                    'D.MemName' => $this->_reqP('search_value'),
                ]
            ],
        ];

        $list = [];
        $count = $this->predictModel->listPredictFinal(true,$arr_condition);

        if ($count > 0) {
            $list = $this->predictModel->listPredictFinal(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.PfIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }


}