<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFinal extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict', 'predict/predictCode');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        list($data, $count) = $this->predictModel->mainList($condition);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart();
        $area = $this->predictModel->getArea($sysCode_Area);

        $this->load->view('predict/predictFinal/index',[
            'predictList' => $data,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'area' => $area,
        ]);
    }

    public function listAjax($params=[]){

        if(empty($params) == false) {
            $excel = $params[0];
        } else {
            $excel = '';
        }

        $arr_condition = [
            'EQ' => [
                'A.PredictIdx' => $this->_reqP('search_PredictIdx'),
                'A.IsStatus' => 'Y',
                'A.TakeMockPart' => $this->_reqP('search_take_mock_part'),
                'A.TakeAreaCcd' => $this->_reqP('search_TakeArea'),
                'C.SiteCode' => $this->_reqP('search_site_code'),
            ],
            'ORG' => [
                'LKB' => [
                    'D.MemId' => $this->_reqP('search_value'),
                    'D.MemName' => $this->_reqP('search_value'),
                ]
            ],
        ];

        if(empty($excel)) {
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

        } else {
            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $list = $this->predictModel->listPredictFinalExcel($arr_condition, ['A.PfIdx' => 'desc']);
            $file_name = '최종합격예측등록현황_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
            $headers = ['합격예측명', '이름', '아이디', '휴대폰번호', '응시번호', '직렬', '지역', '과목점수(난이도)', '체력점수', '가산점', '시험공고', '기타데이터', '등록일'];

            // export excel
            /*----  다운로드 정보 저장  ----*/
            $download_query = $this->predictModel->getLastQuery();

            $this->load->library('approval');
            if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
                show_alert('로그 저장 중 오류가 발생하였습니다.','back');
            }
            /*----  다운로드 정보 저장  ----*/

            $this->load->library('excel');
            $this->excel->exportHugeExcel($file_name, $list, $headers);
        }
    }

    /**
     * 최종합격예측등록 데이터 삭제
     */
    public function delFinalData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field'=>'pf_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field'=>'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer']
        ];

        if($this->validate($rules) === false) {
            return;
        }
        $result = $this->predictModel->delFinalData($this->_reqP(null));
        $this->json_result($result,'정상 삭제 되었습니다.',$result);
    }

    /**
     * 가데이터 등록
     * @return CI_Output|null
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predictidx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer'],
            ['field' => 'take_mock_part', 'label' => '응시직렬', 'rules' => 'trim|required|integer'],
            ['field' => 'cert_idx', 'label' => '수강인증코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $params = $this->_getInvoiceExcelData();
        if ($params === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->tempFinalDataUpload($params, $this->_reqP(null));
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 합격예측관련 합격자인증번호등록
     */
    public function certDataUpload()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'exam_cert_idx', 'label' => '수강인증코드', 'rules' => 'trim|required|integer'],
            ['field' => 'exam_name', 'label' => '인증그룹명', 'rules' => 'trim|required'],
            ['field' => 'exam_cen_code', 'label' => '인증그룹코드', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $input_data = $this->_getInvoiceExcelCertData();
        if ($input_data === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->certExamDataUpload($this->_reqP(null), $input_data);
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 최종합격자수 등록
     * @return CI_Output|null
     */
    public function successfulDataUpload()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict_idx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $input_data = $this->_getInvoiceExcelData();
        if ($input_data === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->successfulDataUpload($this->_reqP(null), $input_data);
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 최종합격자 수 모달팝업
     * @param array $params
     */
    public function listSuccessfulModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        //직렬리스트
        $arr_base['take_mock_part'] = $this->predictCodeModel->getPredictForTakeMockPart($params[0]);
        $arr_base['take_area'] = $this->codeModel->getCcd('712');
        $arr_condition = ['EQ' => ['ps.PredictIdx' => $params[0]]];
        $data = $this->predictModel->listSuccessful($arr_condition, ['ps.TakeMockPart' => 'asc', 'ps.TakeArea' => 'asc']);
        $this->load->view("predict/predictFinal/list_successful_modal", [
            'arr_base' => $arr_base,
            'predict_idx' => $params[0],
            'memo_data' => $data
        ]);
    }

    /**
     * 최종합격자 수 정보 수정
     */
    public function storeSuccessful()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'predict_idx', 'label' => '합격예측코드', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'take_mock_part', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'take_area', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'count', 'label' => '합격자수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->updateForSuccessful($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function sampleDownload()
    {
        /*$this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_final_predict.xlsx';
        force_download($file_path, null);*/

        $predict_idx = $this->_reqP('predict_idx');
        $take_mock_part = $this->_reqP('take_mock_part');

        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->predictModel->getArea($sysCode_Area);

        $result_subject = $this->predictCodeModel->getPredictForSubjectAll($predict_idx, $take_mock_part);
        $headers = ['지역','지역코드','환산점수','체력','가점'];
        $paper_headers = [];
        foreach ($result_subject as $row) {
            $paper_headers[] = $row['CcdName'];
        }
        $headers = array_merge($headers,$paper_headers);

        $file_name = 'sample_final_'.$result_subject[0]['TakeMockPartName'];
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $area, $headers);
    }

    public function sampleCertDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_cert_takenum.xlsx';
        force_download($file_path, null);
    }

    public function sampleSuccessfulDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_successful_candidate.xlsx';
        force_download($file_path, null);
    }

    /**
     * 등록된 회원 인증식별자 체크 및 인증번호 삭제
     * @return CI_Output|null
     */
    public function chkCertApplyDataForDelete()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'del_cert_exam_idx', 'label' => '수강인증코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }
        $result = $this->predictModel->chkCertApplyDataForDelete($this->_reqP(null));
        return $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 인증번호삭제
     * @return CI_Output|null
     */
    public function certExamDataDelete()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'del_cert_exam_idx', 'label' => '수강인증코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }
        $result = $this->predictModel->certExamDataDelete($this->_reqP(null));
        return $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 업로드된 엑셀파일 변환
     * @return array|bool
     */
    private function _getInvoiceExcelData()
    {
        try {
            $this->load->library('excel');
            $data = $this->excel->readExcel($_FILES['attach_file']['tmp_name']);
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    /**
     * 업로드된 엑셀파일 변환
     * @return array|bool
     */
    private function _getInvoiceExcelCertData()
    {
        try {
            $this->load->library('excel');
            $data = $this->excel->readExcel($_FILES['attach_file']['tmp_name']);
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }
}