<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change extends \app\controllers\BaseController
{
    protected $temp_models = array('mocktestNew/applyChange');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('mocktestNew/apply/change/index', [
        ]);
    }

    /**
     * 백업데이터 리스트
     * @return CI_Output
     */
    public function listLogAjax()
    {
        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'p.ProdName' => $this->_reqP('search_value', true),
                    'p.ProdCode' => $this->_reqP('search_value', true),
                ]
            ],
        ];

        $list = [];
        $count = $this->applyChangeModel->logList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->applyChangeModel->logList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['rl.LogIdx' => 'DESC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * @param array $params
     */
    public function logDetailModal($params = [])
    {
        if (empty($params) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $this->load->view("mocktestNew/apply/change/log_detail_modal", [
            'log_idx' => $params[0]
        ]);
    }

    /**
     * 백업데이터 상세리스트
     * @return CI_Output
     */
    public function listLogDetailAjax()
    {
        $arr_condition = [
            'EQ' => [
                'rld.LogIdx' => $this->_reqP('search_log_idx'),
                'o.OrderNo' => $this->_reqP('search_order_no'),
                'mr.TakeNumber' => $this->_reqP('search_takenumber'),
                'm.MemName' => $this->_reqP('search_member_name'),
                'm.MemId' => $this->_reqP('search_member_id'),
            ]
        ];

        $list = [];
        $count = $this->applyChangeModel->logListDetail(true, $arr_condition);
        if ($count > 0) {
            $list = $this->applyChangeModel->logListDetail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['rld.LogDetailIdx' => 'ASC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 복구
     */
    public function storeLogDetailData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'log_detail_idx', 'label' => '로그식별자', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'mr_idx', 'label' => '접수식별자', 'rules' => 'trim|required|is_natural_no_zero']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->applyChangeModel->updateForLogDetail($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 셈플파일 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_change_target_data.xlsx';
        force_download($file_path, null);
    }

    /**
     * 엑셀파일 기준 데이터 업데이트 (offline -> online)
     * @return CI_Output|null
     */
    public function excelForDataChange()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'prod_code', 'label' => '합격예측코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $input_data = $this->_getExcelData();
        if ($input_data === false) {
            return $this->json_error('엑셀파일 읽기에 실패했습니다.');
        }

        $result = $this->applyChangeModel->excelDataUpload($this->_reqP(null), $input_data);
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