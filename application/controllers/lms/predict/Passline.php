<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Passline extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict', 'predict/predictCode');
    protected $helpers = array();
    private $_memory_limit_size = '512M'; // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 합격예측 리스트
     */
    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $this->load->view('predict/passline/index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
        ]);
    }

    public function listAjax()
    {
        $condition = [
            'EQ' => [
                'PP.SiteCode' => $this->input->post('search_site_code'),
                'PP.IsUse' => $this->input->post('search_use')
            ],
            'ORG' => [
                'LKB' => [
                    'PP.ProdName' => $this->input->post('search_fi', true),
                    'PP.PredictIdx' => $this->input->post('search_fi', true)
                ]
            ]
        ];
        list($data, $count) = $this->predictModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    public function detail($params = [])
    {
        if (empty($params[0]) === true) {
            show_alert('잘못된 접근입니다.', '/');
        }
        $predict_idx = $params[0];
        $data = $this->predictModel->getProduct($predict_idx);

        //직렬, 지역
        $arr_base['serialList'] = $this->predictCodeModel->getPredictForTakeMockPart($predict_idx);
        $area_code = $this->config->item('sysCode_Area', 'predict');
        $arr_base['areaList'] = $this->predictModel->getArea($area_code);

        $arr_condition = [];
        $list = $this->predictModel->listGradesLine($predict_idx, $arr_condition);

        $this->load->view('predict/passline/detail', [
            'predict_idx' => $predict_idx
            ,'data' => $data
            ,'arr_base' => $arr_base
            ,'list' => $list
        ]);
    }

    /**
     * 직렬별 예상합격선 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'PredictIdx', 'label' => '합격예측명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeMockPart[]', 'label' => '직렬', 'rules' => 'trim|required'],
            ['field' => 'TakeArea[]', 'label' => '지역', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->storeLine($this->_reqP(null));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /*
     *  기대권 / 유력권 / 안정권
     */
    public function calculateAjax(){
        $PredictIdx = $this->_req("PredictIdx");
        $TakeMockPart = $this->_req("TakeMockPart");
        $TakeArea = $this->_req("TakeArea");
        $Per1 = $this->_req("Per1");
        $Per2 = $this->_req("Per2");
        $Per3 = $this->_req("Per3");

        $data = $this->predictModel->calculate($PredictIdx, $TakeMockPart, $TakeArea, $Per1, $Per2, $Per3);
        return $this->response([
            'data' => $data
        ]);
    }

    /**
     * 합격예측의 직렬별 지역별 셈플파일다운로드
     */
    public function excelSampleDownload()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 파일명 가공
        $file_name = '합격선셈플_' . $this->_reqP('PredictIdx') . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');

        $headers = [
            '직렬코드', '직렬명', '지역코드', '지역명'
            ,'선발인원', '접수인원', '경쟁률', '직전시험경쟁률', '직전시험합격선', '지난평균'
            ,'기대원상위%', '기대원최고점', '기대원최저점'
            ,'유력권상위%', '유력권최고점', '유력권최저점'
            ,'안정권상위%', '안정권최저점', '사용여부'
        ];

        $list = [];
        $data = $this->predictModel->areaForMockPartCodelist($this->_reqP('PredictIdx'));
        foreach ($data as $key => $row) {
            $_temp = ($key == 0) ? 0 : '';  //첫번째 row만 '0'으로 셋팅

            $list[$key]['1'] = $row['TakeMockPart'];
            $list[$key]['2'] = $row['TakeMockPartName'];
            $list[$key]['3'] = $row['TakeArea'];
            $list[$key]['4'] = $row['TakeAreaName'];
            $list[$key]['5'] = $_temp; $list[$key]['6'] = $_temp; $list[$key]['7'] = $_temp; $list[$key]['8'] = $_temp; $list[$key]['9'] = $_temp;
            $list[$key]['10'] = $_temp; $list[$key]['11'] = $_temp; $list[$key]['12'] = $_temp; $list[$key]['13'] = $_temp; $list[$key]['14'] = $_temp;
            $list[$key]['15'] = $_temp; $list[$key]['16'] = $_temp; $list[$key]['17'] = $_temp; $list[$key]['18'] = $_temp; $list[$key]['19'] = 'N';
        }
        $result = $this->excel->exportHugeExcel($file_name, $list, $headers, []);
        if ($result !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    public function excelUpload()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict_idx', 'label' => '접수관리식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $input_data = $this->_getExcelData();
        if ($input_data === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->passlineStoreForExcel($this->_reqP(null), $input_data);
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    private function _getExcelData()
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