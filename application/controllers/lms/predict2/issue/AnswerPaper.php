<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnswerPaper extends \app\controllers\BaseController
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

        $this->load->view('predict2/issue/paper/index', [
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'PR.PredictIdx2' => $this->_reqP('search_PredictIdx2'),
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
        $count = $this->predict2Model->mainOriginList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->predict2Model->mainOriginList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 채점서비스참여현황 엑셀변환
     */
    public function answerOriginExcel()
    {
        $arr_condition = [
            'EQ' => [
                'PR.PredictIdx2' => $this->_reqP('search_PredictIdx2'),
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
        $results = $this->predict2Model->mainOriginList('excel', $arr_condition);
        $file_name = '채점서비스참여현황_('.date("Y-m-d").')';
        $headers = ['접수식별자', '이름', '회원식별자', '아이디', '연락처', '이메일', '직렬', '응시번호', '응시횟수', '커트라인평균점수','등록일','과목별점수','과목별난이도'];

        $last_query = $this->predict2Model->getLastQuery();
        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 답안서비스참여현황 엑셀변환
     */
    public function answerPaperExcel()
    {
        $arr_condition = [
            'EQ' => [
                'PR.PredictIdx2' => $this->_reqP('search_PredictIdx2'),
                'PR.SiteCode' => $this->_reqP('search_site_code'),
                'PR.TakeMockPart' => $this->_reqP('search_TakeMockPart'),
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
        $arr_condition_sub = [
            'EQ' => [
                'PpIdx' => $this->_reqP('search_paper')
            ]
        ];

        $results = $this->predict2Model->answerPaperForExcel($arr_condition, $arr_condition_sub);
        $cnt = 0;
        $arr_excel_data = [];
        $temp_ppidx_cnt = [];
        if (empty($results) === false) {
            foreach ($results as $key => $row) {
                $arr_excel_data[$key]['MemId'] = $row['MemId'];
                $arr_excel_data[$key]['MemName'] = $row['MemName'];
                $arr_excel_data[$key]['BirthDay'] = $row['BirthDay'];
                $arr_excel_data[$key]['Phone'] = $row['Phone'];
                $arr_excel_data[$key]['Mail'] = $row['Mail'];
                $arr_excel_data[$key]['TakeMockPart'] = $row['TakeMockPart'];
                $arr_excel_data[$key]['TaKeNumber'] = $row['TaKeNumber'];
                $arr_excel_data[$key]['RegDatm'] = $row['RegDatm'];
                $tmp_answers = explode(',',$row['Answers']);
                foreach ($tmp_answers as $answer_key => $answer_val) {
                    $arr_excel_data[$key]['answers_'.$answer_key] = $answer_val;
                }

                $temp_ppidx_cnt[$row['PpIdx']] = count($tmp_answers);
            }
            $cnt = max(array_values($temp_ppidx_cnt));
        }

        $num = [];
        for ($i=1; $i<=$cnt; $i++) {
            $num[] = $i;
        }
        $file_name = '답안서비스참여현황_'.$this->_reqP('search_paper_name').'_'.'('.date("Y-m-d").')';
        $headers = [
            '아이디', '이름', '생년월일', '연락처', '이메일', '직렬', '응시번호', '등록일'
        ];
        $headers = array_merge($headers, $num);

        $last_query = $this->predict2Model->getLastQuery();
        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($arr_excel_data)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $arr_excel_data, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}