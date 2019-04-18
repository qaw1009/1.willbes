<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllStatus extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'service/point');
    protected $helpers = array();
    private $_point_type = null;
    private $_ccd = ['PointStatus' => '679'];

    public function __construct()
    {
        parent::__construct();

        $this->_point_type = get_var($this->uri->rsegment(3), 'lecture');
    }

    /**
     * 전체포인트현황 인덱스
     */
    public function index()
    {
        // 전체 유효포인트 조회
        $valid_save_point = array_get($this->pointModel->listAllSaveUsePoint($this->_point_type, 'save_only', null, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'RAW' => ['PSU.ExpireDatm >= ' => 'NOW()']
        ]), '0.RemainPoint', 0);

        // 당월소멸예정포인트 조회
        $expire_save_point = array_get($this->pointModel->listAllSaveUsePoint($this->_point_type, 'save_only', null, 'ifnull(SUM(PSU.RemainPoint), 0) as RemainPoint', [
            'EQ' => ['PSU.PointStatusCcd' => $this->pointModel->_point_status_ccd['save']],
            'GT' => ['PSU.RemainPoint' => 0],
            'BDT' => ['PSU.ExpireDatm' => [date('Y-m-d'), date('Y-m-t')]]
        ]), '0.RemainPoint', 0);

        $this->load->view('service/point/all_status_index', [
            'arr_point_status_ccd' => $this->codeModel->getCcd($this->_ccd['PointStatus']),
            'valid_save_point' => $valid_save_point,
            'expire_save_point' => $expire_save_point,
            '_point_type' => $this->_point_type
        ]);
    }

    /**
     * 전체포인트현황 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $arr_condition = $this->_getListConditions();

        $list_type = get_var($this->_reqP('search_point_type'), 'all');
        $list = [];
        $count = $this->pointModel->listAllSaveUsePoint($this->_point_type, $list_type, null, true, $arr_condition, null, null, []);

        if ($count > 0) {
            $list = $this->pointModel->listAllSaveUsePoint($this->_point_type, $list_type, null, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PSU.RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 전체포인트현황 목록 엑셀 다운로드
     */
    public function excel()
    {
        $headers = ['운영사이트', '회원명', '회원아이디', '주문번호', '유효기간', '상태', '적립/차감액', '적립/차감일', '등록자', '적립/차감사유'];
        $column = 'S.SiteName, M.MemName, M.MemId, O.OrderNo, if(PSU.ExpireDatm is not null, concat(substring(PSU.RegDatm, 1, 10), " ~ ", substring(PSU.ExpireDatm, 1, 10)), "") as ValidDatePeriod
            , if(PSU.PointStatusCcd = "U", "차감", CPS.CcdName) as PointStatusCcdName, PSU.PointAmt, PSU.RegDatm, A.wAdminName
            , if(PSU.ReasonCcd like "%999", EtcReason, CR.CcdName) as ReasonCcdName';

        $list_type = get_var($this->_reqP('search_point_type'), 'all');
        $arr_condition = $this->_getListConditions();
        $list = $this->pointModel->listAllSaveUsePoint($this->_point_type, $list_type, null, $column, $arr_condition, null, null, ['PSU.RegDatm' => 'desc']);
        $last_query = $this->pointModel->getLastQuery();
        $file_name = '전체포인트현황리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $list, $headers);
    }

    /**
     * 전체포인트현황 목록 검색 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'M.MemIdx' => $this->_reqP('search_member_idx'),
                'PSU.SiteCode' => $this->_reqP('search_site_code'),
                'O.OrderNo' => $this->_reqP('search_order_no'),
                'PSU.PointStatusCcd' => $this->_reqP('search_point_status_ccd')
            ],
            'IN' => [
                'PSU.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ],
            'BDT' => [
                'PSU.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]
            ],
            'ORG1' => [
                'EQ' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ]
        ];

        return $arr_condition;
    }
}
