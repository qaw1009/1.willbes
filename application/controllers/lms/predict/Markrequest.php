<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Markrequest extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict', 'predict/predictCode');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     */
    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);

        $search_fi = $this->_req('search_fi', true);
        $search_site_code = $this->_req('search_site_code', true);
        if($search_site_code){
            $scode = $search_site_code;
        } else {
            $scode = key($arr_site_code);
        }

        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        list($data, $count) = $this->predictModel->mainList($condition);

        //응시지역
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->predictModel->getArea($sysCode_Area);

        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart();

        //합격예측별 직렬별 과목 전체 리스트
        $arr_subject_list = $this->predictCodeModel->getPredictForSubjectAll();

        $this->load->view('predict/markrequest/index', [
            'predictList' => $data,
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $scode,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'area' => $area,
            'arr_subject_list' => $arr_subject_list,
            'search_fi'=> $search_fi
        ]);
    }

    /**
     * 리스트
     */
    public function list($params=[])
    {
        if(empty($params) == false) {
            $excel = $params[0];
        } else {
            $excel = '';
        }

        $condition = [
            'EQ' => [
                'PR.ApplyType' => $this->_req('search_ApplyType'),
                'PR.SiteCode' => $this->_req('search_site_code'),
                'PR.PredictIdx' => $this->_req('search_PredictIdx'),
                'PR.TakeMockPart' => $this->_req('search_take_mock_part'),
                'PR.TakeArea' => $this->_req('search_TakeArea'),
            ],
            'ORG' => [
                'LKB' => [
                    'M.MemName' => $this->_req('search_fi', true),
                    'M.MemId' => $this->_req('search_fi', true),
                    'PR.TakeNumber' => $this->_req('search_fi', true),

                ]
            ],
        ];

        if($excel === 'Y') {
            $excel_data = [];
            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $paper_condition = [
                'EQ' => [
                    'PP.PredictIdx' => $this->_req('search_PredictIdx'),
                ]
            ];

            $paperData = $this->predictModel->QuestionMainList($paper_condition);
            $data  = $this->predictModel->predictRegistListExcel2($condition, ['PR.RegDatm' => 'DESC'], $paperData);
            // export excel
            $file_name = '채점서비스참여현황_'.date('Y-m-d');

            $headers = [
                '구분', '이름', '회원식별자', '회원아이디', '휴대폰번호', '직렬', '지역', '가산점', '응시번호', '수강여부', '시험준비기간', '신청일', '총점',
            ];

            $paper_headers = [];
            if (empty($paperData) === false) {
                foreach ($paperData[0] as $row) {
                    $paper_headers[$row['PpIdx']] = $row['PaperName'];
                }
            }
            $headers = array_merge($headers,$paper_headers);
            $this->load->library('excel');
            foreach ($data as $key => $val) {
                $excel_data[$key][] = $val['ApplyType'];
                $excel_data[$key][] = $val['MemName'];
                $excel_data[$key][] = $val['MemIdx'];
                $excel_data[$key][] = $val['MemId'];
                $excel_data[$key][] = $val['Phone'];
                $excel_data[$key][] = $val['TakeMockPart'];
                $excel_data[$key][] = $val['TaKeArea'];
                $excel_data[$key][] = $val['AddPoint'];
                $excel_data[$key][] = $val['TaKeNumber'];
                $excel_data[$key][] = $val['LectureType'];
                $excel_data[$key][] = $val['Period'];
                $excel_data[$key][] = $val['RegDatm'];
                $excel_data[$key][] = $val['SumOrgPoint'];
                foreach ($paper_headers as $ppKey => $ppVal) {
                    $excel_data[$key][] = $val[$ppKey];
                }
            }

            if ($this->excel->exportHugeExcel($file_name, $excel_data, $headers) !== true) {
                show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
            }
        } else {
            $list = [];
            $count = $this->predictModel->predictRegistList2(true, $condition, $this->input->post('length'), $this->input->post('start'));
            if ($count > 0) {
                $list = $this->predictModel->predictRegistList2(false, $condition, $this->input->post('length'), $this->input->post('start'), ['PR.RegDatm' => 'DESC']);
            }
            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $list,
            ]);
        }

    }

    public function answerPaperExcel()
    {
        $excel_data = [];
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_condition = [
            'EQ' => [
                'PP.PredictIdx' => $this->_req('search_PredictIdx'),
                'r.TakeMockPart' => $this->_req('search_take_mock_part'),
                'crs.SubjectCode' => $this->_req('search_subject_code'),
                'pq.QuestionType' => $this->_req('search_question_type_cnt'),
            ]
        ];

        $result = $this->predictModel->listAnswerPaperForExcel($arr_condition);

        $file_name = '답안입력현황';
        $question_headers = [];
        if (empty($result) === false) {
            $file_name = '답안입력현황_'.$result[0]['PaperName'].'_'.$result[0]['QuestionType'].'_'.date('Y-m-d');
            $arr_question_no = explode(',',$result[0]['question_no']);
            foreach ($arr_question_no as $val) {
                $question_headers[] = $val;
            }
        }

        $headers = ['ID', '직렬', '최종저장시간'];
        $headers = array_merge($headers,$question_headers);

        $this->load->library('excel');
        foreach ($result as $key => $val) {
            $excel_data[$key][] = $val['MemId'];
            $excel_data[$key][] = $val['TakeMockPartName'];
            $excel_data[$key][] = $val['RegDatm'];

            $arr_member_answer = explode(',',$val['member_answer']);
            foreach ($question_headers as $q_key => $q_no) {
                $excel_data[$key][] = $arr_member_answer[$q_key];
            }
        }
        if ($this->excel->exportHugeExcel($file_name, $excel_data, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}