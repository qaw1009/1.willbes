<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamInfo extends \app\controllers\FrontController
{
    protected $models = array('examTakeInfoF');
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
        $arr_download_list = [
            '서울특별시' => [
                'infant_file_name' => 'download_infant_seoul.pdf' ,'infant_file_name_kr' => '유아초등_서울.pdf',
                'secondary_file_name' => 'download_secondary_seoul.pdf' ,'secondary_file_name_kr' => '중등_서울.pdf'
            ],
            '경기도' => [
                'infant_file_name' => 'download_infant_gyeonggi.pdf' ,'infant_file_name_kr' => '유아초등_경기.pdf',
                'secondary_file_name' => 'download_secondary_gyeonggi.pdf' ,'secondary_file_name_kr' => '중등_경기.pdf'
            ],
            '인천광역시' => [
                'infant_file_name' => 'download_infant_incheon.pdf' ,'infant_file_name_kr' => '유아초등_인천.pdf',
                'secondary_file_name' => 'download_secondary_incheon.pdf' ,'secondary_file_name_kr' => '중등_인천.pdf'
            ],
            '충청북도' => [
                'infant_file_name' => 'download_infant_chungbuk.pdf' ,'infant_file_name_kr' => '유아초등_충북.pdf',
                'secondary_file_name' => 'download_secondary_chungbuk.pdf' ,'secondary_file_name_kr' => '중등_충북.pdf'
            ],
            '대전광역시' => [
                'infant_file_name' => 'download_infant_deajeon.pdf' ,'infant_file_name_kr' => '유아초등_대전.pdf',
                'secondary_file_name' => 'download_secondary_deajeon.pdf' ,'secondary_file_name_kr' => '중등_대전.pdf'
            ],
            '충청남도' => [
                'infant_file_name' => 'download_infant_chungnam.pdf' ,'infant_file_name_kr' => '유아초등_충남.pdf',
                'secondary_file_name' => 'download_secondary_chungnam.pdf' ,'secondary_file_name_kr' => '중등_충남.pdf'
            ],
            '세종시' => [
                'infant_file_name' => 'download_infant_sejong.pdf' ,'infant_file_name_kr' => '유아초등_세종.pdf',
                'secondary_file_name' => 'download_secondary_sejong.pdf' ,'secondary_file_name_kr' => '중등_세종.pdf'
            ],
            '전라북도' => [
                'infant_file_name' => 'download_infant_jeonbuk.pdf' ,'infant_file_name_kr' => '유아초등_전북.pdf',
                'secondary_file_name' => 'download_secondary_jeonbuk.pdf' ,'secondary_file_name_kr' => '중등_전북.pdf'
            ],
            '광주광역시' => [
                'infant_file_name' => 'download_infant_gwangju.pdf' ,'infant_file_name_kr' => '유아초등_광주.pdf',
                'secondary_file_name' => 'download_secondary_gwangju.pdf' ,'secondary_file_name_kr' => '중등_광주.pdf'
            ],
            '전라남도' => [
                'infant_file_name' => 'download_infant_jeonnam.pdf' ,'infant_file_name_kr' => '유아초등_전남.pdf',
                'secondary_file_name' => 'download_secondary_jeonnam.pdf' ,'secondary_file_name_kr' => '중등_전남.pdf'
            ],
            '대구광역시' => [
                'infant_file_name' => 'download_infant_deagu.pdf' ,'infant_file_name_kr' => '유아초등_대구.pdf',
                'secondary_file_name' => 'download_secondary_deagu.pdf' ,'secondary_file_name_kr' => '중등_대구.pdf'
            ],
            '강원도' => [
                'infant_file_name' => 'download_infant_gangwon.pdf' ,'infant_file_name_kr' => '유아초등_강원.pdf',
                'secondary_file_name' => 'download_secondary_gangwon.pdf' ,'secondary_file_name_kr' => '중등_강원.pdf'
            ],
            '울산광역시' => [
                'infant_file_name' => 'download_infant_ulsan.pdf' ,'infant_file_name_kr' => '유아초등_울산.pdf',
                'secondary_file_name' => 'download_secondary_ulsan.pdf' ,'secondary_file_name_kr' => '중등_울산.pdf'
            ],
            '경상북도' => [
                'infant_file_name' => 'download_infant_gyeongbuk.pdf' ,'infant_file_name_kr' => '유아초등_경북.pdf',
                'secondary_file_name' => 'download_secondary_gyeongbuk.pdf' ,'secondary_file_name_kr' => '중등_경북.pdf'
            ],
            '부산광역시' => [
                'infant_file_name' => 'download_infant_busan.pdf' ,'infant_file_name_kr' => '유아초등_부산.pdf',
                'secondary_file_name' => 'download_secondary_busan.pdf' ,'secondary_file_name_kr' => '중등_부산.pdf'
            ],
            '경상남도' => [
                'infant_file_name' => 'download_infant_gyeongnam.pdf' ,'infant_file_name_kr' => '유아초등_경남.pdf',
                'secondary_file_name' => 'download_secondary_gyeongnam.pdf' ,'secondary_file_name_kr' => '중등_경남.pdf'
            ],
            '제주도' => [
                'infant_file_name' => 'download_infant_jeju.pdf' ,'infant_file_name_kr' => '유아초등_제주.pdf',
                'secondary_file_name' => 'download_secondary_jeju.pdf' ,'secondary_file_name_kr' => '중등_제주.pdf'
            ],
        ];

        $file_type = element('file_type', $this->_reqG(null));
        $this->load->view('site/examinfo/' . $file_type . 'notice',[
            'arr_download_list' => $arr_download_list,
        ]);
    }

    /**
     * 최근 10년동향 (메인페이지)
     * @param array $params
     */
    public function mainTrend()
    {
        $arr_base['subject_list'] = $this->examTakeInfoFModel->getCcdForSubject(['RAW' => ['JSON_EXTRACT(CcdEtc,\'$.is_mobile\') = ' => '\'Y\'']]);
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
        $arr_base['subject_list'] = $this->examTakeInfoFModel->getCcdForSubject(['RAW' => ['JSON_EXTRACT(CcdEtc,\'$.is_mobile\') = ' => '\'Y\'']]);
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
            $temp_data[$row['YearTarget']]['TakeType'] = $row['TakeType'];
            $temp_data[$row['YearTarget']]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['YearTarget']]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['YearTarget']]['AvgData'] = $row['AvgData'];
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
            $temp_data[$row['YearTarget']]['TakeType'] = $row['TakeType'];
            $temp_data[$row['YearTarget']]['NoticeNumber'] = $row['NoticeNumber'];
            $temp_data[$row['YearTarget']]['TakeNumber'] = $row['TakeNumber'];
            $temp_data[$row['YearTarget']]['AvgData'] = $row['AvgData'];
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