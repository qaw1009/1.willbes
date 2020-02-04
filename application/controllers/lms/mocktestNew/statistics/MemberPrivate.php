<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class MemberPrivate extends BaseMocktest
{
    protected $temp_models = array();
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['applyType'] = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['applyType']);
        $arr_base['subject'] = $this->getSubjectArray();

        $applyArea1 = $this->mockCommonModel->_groupCcd['applyArea1'];
        $applyArea2 = $this->mockCommonModel->_groupCcd['applyArea2'];
        $codes = $this->codeModel->getCcdInArray([$applyArea1, $applyArea2]);
        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
        $arr_base['applyArea'] = $applyAreaTmp1 + $applyAreaTmp2;

        $this->load->view('mocktestNew/statistics/memberPrivate/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }
}