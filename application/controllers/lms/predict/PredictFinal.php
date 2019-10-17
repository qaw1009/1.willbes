<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictFinal extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
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
        $area = $this->predictModel->getArea($sysCode_Area);
        $serial = $this->predictModel->getSerialAll();

        $this->load->view('predict/predictFinal/index',[
            'predictList' => $data,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'area' => $area,
            'serial' => $serial,
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

    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict_idx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer'],
            ['field' => 'cert_idx', 'label' => '수강인증코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $input_data = $this->_getInvoiceExcelData();
        if ($input_data === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->tempFinalDataUpload($this->_reqP(null), $input_data);
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_final_predict.xlsx';
        force_download($file_path, null);
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
}