<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaveUse extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'service/point');
    protected $helpers = array();
    private $_point_type = null;
    private $_list_type = 'all';
    private $_ccd = ['PointStatus' => '679'];

    public function __construct()
    {
        parent::__construct();

        $this->_point_type = get_var($this->uri->rsegment(3), 'lecture');
    }

    /**
     * 포인트적립/차감 인덱스
     */
    public function index()
    {
        $this->load->view('service/point/save_use_index', []);
    }

    /**
     * 포인트적립/차감 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $list = [];
        $count = 0;
        $valid_save_point = 0;
        $expire_save_point = 0;
        $mem_idx = $this->_reqP('mem_idx');

        if (empty($mem_idx) === false) {
            // 유효포인트 조회
            $valid_save_point = $this->pointModel->getMemberPoint($mem_idx, $this->_point_type);

            // 당월소멸예정포인트 조회
            $expire_save_point = array_get($this->pointModel->listAllSaveUsePoint($this->_point_type, 'save_only', $mem_idx, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
                'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
                'NOT' => ['PSU.RemainPoint' => 0],
                'BDT' => ['PSU.ExpireDatm' => [date('Y-m-01'), date('Y-m-t')]]
            ]), '0.RemainPoint', 0);

            // 목록 조회
            $arr_condition = $this->_getListConditions();

            $count = $this->pointModel->listAllSaveUsePoint($this->_point_type, $this->_list_type, $mem_idx, true, $arr_condition, null, null, []);

            if ($count > 0) {
                $list = $this->pointModel->listAllSaveUsePoint($this->_point_type, $this->_list_type, $mem_idx, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PSU.RegDatm' => 'desc']);
            }
        }

        return $this->response([
            'valid_save_point' => $valid_save_point,
            'expire_save_point' => $expire_save_point,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 포인트적립/차감 목록 엑셀 다운로드
     */
    public function excel()
    {
        $list = [];
        $mem_idx = $this->_reqP('mem_idx');
        $headers = ['운영사이트', '주문번호', '유효기간', '상태', '적립/차감액', '적립/차감일', '등록자', '적립/차감사유'];

        if (empty($mem_idx) === false) {
            $column = 'S.SiteName, O.OrderNo, if(PSU.ExpireDatm is not null, concat(substring(PSU.RegDatm, 1, 10), " ~ ", substring(PSU.ExpireDatm, 1, 10)), "") as ValidDatePeriod
            , if(PSU.PointStatusCcd = "U", "차감", CPS.CcdName) as PointStatusCcdName, PSU.PointAmt, PSU.RegDatm, A.wAdminName
            , if(PSU.ReasonCcd like "%999", EtcReason, CR.CcdName) as ReasonCcdName';

            $arr_condition = $this->_getListConditions();
            $list = $this->pointModel->listAllSaveUsePoint($this->_point_type, $this->_list_type, $mem_idx, $column, $arr_condition, null, null, ['PSU.RegDatm' => 'desc']);
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('포인트적립차감리스트', $list, $headers);
    }

    /**
     * 포인트적립/차감 목록 검색 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'IN' => [
                'O.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 포인트적립/차감 등록 폼
     * @return object|string
     */
    public function create()
    {
        return $this->load->view('service/point/save_use_create', [
        ]);
    }
}
