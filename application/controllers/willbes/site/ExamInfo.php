<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamInfo extends \app\controllers\FrontController
{
    protected $models = array('examTakeInfoF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 시험제도
     * @param array $params
     */
    public function system($params = [])
    {
        $this->load->view('site/examinfo/system',[
        ]);
    }

    /**
     * 지역별 공고문
     * @param array $params
     */
    public function notice($params = [])
    {
        $this->load->view('site/examinfo/notice',[
        ]);
    }

    /**
     * 최근 10년동향
     * @param array $params
     */
    public function trend($params = [])
    {
        $this->{'_trend_'.APP_DEVICE}();
    }

    private function _trend_pc()
    {
        $arr_input = array_merge($this->_reqG(null));
        $subject_ccd = element('subject_id', $arr_input);
        $arr_condition = [
            'EQ' => [
                'DataType' => 'detail',
                'SiteCode' => $this->_site_code,
                'SubjectCcd' => $subject_ccd
            ]
        ];
        $arr_subject = $this->examTakeInfoFModel->getCcdForSubject();
        $arr_base['area_data'] = $this->examTakeInfoFModel->getSubjectForAreaExamInfo($arr_condition);
        $arr_base['years'] = $this->examTakeInfoFModel->getExamGroupYear($this->_site_code);
        $arr_base['area_list'] = $this->examTakeInfoFModel->getCcdForArea();

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'SubjectCcd' => $subject_ccd,
                'AreaCcd' => '734001',
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ]
        ];
        $arr_base['graph'] = $this->examTakeInfoFModel->totalDataForGraph($arr_condition);

        $temp_data = [];
        foreach ($arr_base['graph'] as $row) {
            $temp_data[$row['YearTarget']]['TakeType'] = $row['TakeType'];
            $temp_data[$row['YearTarget']]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['YearTarget']]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['YearTarget']]['AvgData'] = $row['AvgData'];
        }
        ksort($temp_data);
        $arr_base['graph_table_data'] = $temp_data;

        $this->load->view('site/examinfo/trend',[
            'arr_input' => $arr_input,
            'title' => $arr_subject[$subject_ccd],
            'arr_base' => $arr_base
        ]);
    }

    private function _trend_m()
    {
        $this->load->view('site/examinfo/trend',[

        ]);
    }
}