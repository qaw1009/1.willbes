<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamInfo extends \app\controllers\FrontController
{
    protected $models = array('examTakeInfoF','examFileInfoF','_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 지역별 공고문
     */
    public function notice()
    {
        $arr_input = $this->_reqG(null);
        $codes = $this->codeModel->getCcd('734');
        unset($codes['734001']);    //전국제외

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code
                ,'DataType' => '0'
                ,'IsStatus' => 'Y'
                ,'IsUse' => 'Y'
            ]
        ];
        $data['arr_year'] = $this->examFileInfoFModel->getYearTarget($arr_condition);
        $year_target = empty($data['arr_year']) === false ? $data['arr_year'][0]['GroupCode'] : 'null';
        $group_code = element('s_group_code', $arr_input, $year_target);

        $arr_condition = [
            'EQ' => [
                'DataType' => '1'
                ,'GroupCode' => $group_code
                ,'IsStatus' => 'Y'
                ,'IsUse' => 'Y'
            ]
        ];
        $result = $this->examFileInfoFModel->fileList($arr_condition);
        $data['arr_download_list'] = [];

        if (empty($result) === false) {
            foreach ($result as $row) {
                $temp_file_info = json_decode($row['FileInfo'],true);
                foreach ($temp_file_info as $f_row) {
                    $data['arr_download_list'][$row['AreaCcd']][$f_row['FileType']]['file_real_name'] = $f_row['FileRealName'];
                    $data['arr_download_list'][$row['AreaCcd']][$f_row['FileType']]['file_path'] = $f_row['FilePath'].$f_row['FileName'];
                }
            }
        }
        $file_type = element('file_type', $arr_input);
        $this->load->view('site/examinfo/'.$file_type.'notice',[
            'arr_input' => $arr_input
            ,'exam_area_ccd' => $codes
            ,'data' => $data
        ]);
    }

    /**
     * 최근 10년동향 (메인페이지)
     * @param array $params
     */
    public function mainTrend()
    {
        $arr_base['subject_list'] = $this->examTakeInfoFModel->getCcdForSubject(['RAW' => ['JSON_EXTRACT(CcdEtc,\'$.is_mobile_main\') = ' => '\'Y\'']]);
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'AreaCcd' => '734001',
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ],
            'IN' => [
                'SubjectCcd' => array_keys($arr_base['subject_list'])
            ]
        ];
        $arr_graph = $this->examTakeInfoFModel->totalDataForGraph($arr_condition);
        $temp_data = [];
        foreach ($arr_graph as $key => $row) {
            $temp_data[$row['SubjectCcd']][$key]['YearTarget'] = $row['YearTarget'];
            $temp_data[$row['SubjectCcd']][$key]['TakeType'] = $row['TakeType'];
            $temp_data[$row['SubjectCcd']][$key]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['SubjectCcd']][$key]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['SubjectCcd']][$key]['AvgData'] = $row['AvgData'];
        }
        $arr_base['graph'] = $temp_data;
        $this->load->view('site/examinfo/main_trend',[
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 최근 10년동향 (페이지)
     */
    public function trend()
    {
        if ($this->_is_mobile === true) {
            $arr_where = ['JSON_EXTRACT(CcdEtc,\'$.is_mobile_page\') = ' => '\'Y\''];
        } else {
            $arr_where = ['JSON_EXTRACT(CcdEtc,\'$.is_pc_page\') = ' => '\'Y\''];
        }
        $arr_base['subject_list'] = $this->examTakeInfoFModel->getCcdForSubject(['RAW' => $arr_where]);
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'AreaCcd' => '734001',
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ],
            'IN' => [
                'SubjectCcd' => array_keys($arr_base['subject_list'])
            ]
        ];
        $arr_graph = $this->examTakeInfoFModel->totalDataForGraph($arr_condition);
        $temp_data = [];
        foreach ($arr_graph as $key => $row) {
            $temp_data[$row['SubjectCcd']][$key]['YearTarget'] = $row['YearTarget'];
            $temp_data[$row['SubjectCcd']][$key]['TakeType'] = $row['TakeType'];
            $temp_data[$row['SubjectCcd']][$key]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['SubjectCcd']][$key]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['SubjectCcd']][$key]['AvgData'] = $row['AvgData'];
        }
        $arr_base['graph'] = $temp_data;

        $this->load->view('site/examinfo/trend',[
            'arr_base' => $arr_base
        ]);
    }

    public function trendPopup()
    {
        $arr_input = array_merge($this->_reqG(null));
        $subject_ccd = element('subject_id', $arr_input);
        $arr_base = [];

        $arr_condition = [
            'EQ' => [
                'DataType' => 'detail',
                'SiteCode' => $this->_site_code,
                'SubjectCcd' => $subject_ccd
            ]
        ];
        $arr_subject = $this->examTakeInfoFModel->getCcdForSubject();
        $arr_base['area_data'] = $this->examTakeInfoFModel->getSubjectForAreaExamInfo($arr_condition, $arr_subject[$subject_ccd]['retake_type']);
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
            $temp_data[$row['YearTarget'].$row['TakeType']]['YearTarget'] = $row['YearTarget'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['TakeType'] = $row['TakeType'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['AvgData'] = $row['AvgData'];
        }
        ksort($temp_data);
        $arr_base['graph_table_data'] = $temp_data;

        $this->load->view('site/examinfo/trend_popup',[
            'arr_input' => $arr_input,
            'title' => $arr_subject[$subject_ccd]['subject_name'],
            'retake_type' => $arr_subject[$subject_ccd]['retake_type'],
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 그래프 ajax
     */
    public function graphHtml()
    {
        $arr_base = [];
        $arr_input = array_merge($this->_reqG(null));
        $subject_ccd = element('subject_id', $arr_input);
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
            $temp_data[$row['YearTarget'].$row['TakeType']]['YearTarget'] = $row['YearTarget'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['TakeType'] = $row['TakeType'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['YearTarget'].$row['TakeType']]['AvgData'] = $row['AvgData'];
        }
        ksort($temp_data);
        $arr_base['graph_table_data'] = $temp_data;

        $this->load->view('site/examinfo/graph_html',[
            'arr_base' => $arr_base
        ]);
    }

    public function download()
    {
        $file_path = urldecode($this->_reqG('path',false));
        $file_name = urldecode($this->_reqG('fname',false));

        public_download($file_path, $file_name);
        show_alert('등록된 파일을 찾지 못했습니다.', 'back');
    }
}