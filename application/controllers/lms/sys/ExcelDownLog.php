<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelDownLog extends \app\controllers\BaseController
{
    protected $models = array('sys/code','sys/excelDownLog');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $params
     */
    public function index($params = [])
    {
        $codes = $this->codeModel->getCcdInArray(['715']);

        $this->load->view('sys/excel_log/index', [
            'down_type_ccd' => $codes['715']
        ]);
    }

    /**
     * 다운로드 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {

        $arr_condition = [
            'BDT' => ['a.RegDatm' => [$this->input->post('search_start_date'), $this->input->post('search_end_date')]],
            'EQ' => ['a.DownloadTypeCcd' => $this->_reqP('search_down_type_ccd')],
            'ORG' => [
                'LKB' => [
                    'b.wAdminName' => $this->_reqP('search_value'),
                    'b.wAdminId' => $this->_reqP('search_value'),
                    'b.wAdminIdx' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $list = [];
        $count = $this->excelDownLogModel->listDownLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->excelDownLogModel->listDownLog( false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SdIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}