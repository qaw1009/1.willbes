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
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $this->applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $this->addPoint = $this->config->item('sysCode_addPoint', 'mock');
        $this->applyType_on = $this->config->item('sysCode_applyType_on', 'mock');
        $this->applyType_off = $this->config->item('sysCode_applyType_off', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');

        // 공통코드 셋팅
        //$this->_groupCcd = $this->regGoodsModel->_groupCcd;
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
     * 리스트
     */
    public function list()
    {
        $condition = [
            'EQ' => [
                'r.IsUse' => 'Y',
                'r.IsStatus' => 'Y',
                'r.ApplyType' => $this->_reqP('search_ApplyType'),
                'r.SiteCode' => $this->_reqP('search_site_code'),
                'r.TakeMockPart' => $this->_reqP('search_TakeMockPart'),
                'r.TakeArea' => $this->_reqP('search_TakeArea'),
            ],
            'ORG' => [
                'LKB' => [
                    'r.MemName' => $this->_reqP('search_fi', true),
                    'r.MemId' => $this->_reqP('search_fi', true),
                    'r.TakeNumber' => $this->_reqP('search_fi', true),
                ]
            ],
        ];

        $list = [];
        $count = $this->predictModel->predictRegistList3(true, $this->_reqP('search_predict_idx'), $condition);

        if ($count > 0) {
            $list = $this->predictModel->predictRegistList3(false, $this->_reqP('search_predict_idx'), $condition, $this->_reqP('length'), $this->_reqP('start'), ['RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);

    }

    /**
     * 등록폼
     */
    public function register($param)
    {
        if($param) $PredictIdx = $param[0];

        if(empty($PredictIdx) === true){
            $method = "CREATE";
            $data = array();
            $data['SiteCode'] = '2001';
            $data['MockPart'] = '';
        } else {
            $method = "PUT";
        }

        $this->load->view('predict/datamanage/register', [
            'PredictIdx' => $PredictIdx
        ]);
    }

    /**
     * 성적등록용 엑셀업로드
     */
    public function redata()
    {
        $predictidx = get_var($this->_reqP('predictidx'), 'form');

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $params = $this->_getInvoiceExcelData();

        if ($params === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->predictModel->tempDataUpload($predictidx, $params);

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
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_predict.xls';
        force_download($file_path, null);
    }
}