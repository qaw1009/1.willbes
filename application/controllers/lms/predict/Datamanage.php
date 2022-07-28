<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Datamanage extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict', 'predict/predictCode');
    protected $helpers = array();
    /*protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값*/

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
        $def_site_code = key($arr_site_code);

        $this->load->view('predict/datamanage/index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
        ]);
    }

    /**
     * 등록폼
     */
    public function register($param)
    {
        if($param) $PredictIdx = $param[0];

        $data = $this->predictModel->getProduct($PredictIdx);
        if (empty($data) === true) {
            show_alert('조회된 합격예측 정보가 없습니다.', 'back');
        }

        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart($PredictIdx);
        $area = $this->predictModel->getArea($this->config->item('sysCode_Area', 'predict'));

        $this->load->view('predict/datamanage/register', [
            'PredictIdx' => $PredictIdx,
            'data' => $data,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'area' => $area,
        ]);
    }

    /**
     * 리스트
     */
    public function registerListAjax()
    {
        $condition = [
            'EQ' => [
                'r.IsStatus' => 'Y',
                'r.TakeMockPart' => $this->_reqP('search_take_mock_part'),
                'r.TakeArea' => $this->_reqP('search_TakeArea'),
            ]
        ];

        $condition2 = [];
        if (empty($this->_reqP('search_subject_count')) === false) {
            $condition2 = [
                'RAW' => ['PR.ppCount'. ($this->_reqP('search_subject_count') == 'up' ? ' >' : ' <') => ' 5']
            ];
        }

        $list = [];
        $count = $this->predictModel->predictRegistList3(true, $this->_reqP('search_predict_idx'), $condition, $condition2);

        if ($count > 0) {
            $list = $this->predictModel->predictRegistList3(false, $this->_reqP('search_predict_idx'), $condition, $condition2, $this->_reqP('length'), $this->_reqP('start'), ['RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 성적등록용 엑셀업로드
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'predictidx', 'label' => '합격예측코드', 'rules' => 'trim|required'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'attach_file', 'label' => '가데이터 엑셀파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ['field' => 'take_mock_part', 'label' => '직렬', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $params = $this->_getInvoiceExcelData();
        if ($params === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->tempDataUpload($params, $this->_reqP(null));
        return $this->json_result($result, '저장 되었습니다.', $result);
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
     * 샘플엑셀파일 다운로드
     */
    public function sampleDownload()
    {
        /*$this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_predict.xls';
        force_download($file_path, null);*/

        $predict_idx = $this->_reqP('predict_idx');
        $take_mock_part = $this->_reqP('take_mock_part');

        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->predictModel->getArea($sysCode_Area);

        $result_subject = $this->predictCodeModel->getPredictForSubjectAll($predict_idx, $take_mock_part);
        $headers = ['지역','지역코드'];
        $paper_headers = [];
        foreach ($result_subject as $row) {
            $paper_headers[] = $row['CcdName'];
        }
        $headers = array_merge($headers,$paper_headers);

        $file_name = 'sample_'.$result_subject[0]['TakeMockPartName'];
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $area, $headers);
    }

    public function originSampleDataDelete()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'predict_idx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer'],
            ['field' => 'pr_idx', 'label' => '등록회원식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'pgo_idx', 'label' => '점수식별자', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->originSampleDataDelete($this->_reqP(null));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result);
    }

    /**
     * 가데이터 엑셀 변환
     */
    public function exportFakeExcel()
    {
        $arr_result = $this->predictModel->predictRegistFakeListForExcel($this->_reqP(null));
        $last_query = $this->predictModel->getLastQuery();
        $file_name = '합격예측성적 가데이터_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');
        $headers = ['직렬', '지역'];
        $paper_headers = [];
        foreach ($arr_result['paperList'] as $row) {
            $paper_headers[] = $row['PaperName'];
        }
        $headers = array_merge($headers,$paper_headers);

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($arr_result['list'])) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $arr_result['list'], $headers);
    }
}