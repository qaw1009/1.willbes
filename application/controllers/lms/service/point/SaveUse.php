<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaveUse extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'member/manageMember', 'service/point');
    protected $helpers = array();
    private $_point_type = null;
    private $_list_type = 'all';
    private $_ccd = ['PointStatus' => '679', 'SaveReason' => '680', 'UseReason' => '681'];

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
                'GT' => ['PSU.RemainPoint' => 0],
                'BDT' => ['PSU.ExpireDatm' => [date('Y-m-d'), date('Y-m-t')]]
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
        $file_name = '포인트적립차감리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        if (empty($mem_idx) === false) {
            $column = 'S.SiteName, O.OrderNo, if(PSU.ExpireDatm is not null, concat(substring(PSU.RegDatm, 1, 10), " ~ ", substring(PSU.ExpireDatm, 1, 10)), "") as ValidDatePeriod
            , if(PSU.PointStatusCcd = "U", "차감", CPS.CcdName) as PointStatusCcdName, PSU.PointAmt, PSU.RegDatm, A.wAdminName
            , if(PSU.ReasonCcd like "%999", EtcReason, CR.CcdName) as ReasonCcdName';

            $arr_condition = $this->_getListConditions();
            $list = $this->pointModel->listAllSaveUsePoint($this->_point_type, $this->_list_type, $mem_idx, $column, $arr_condition, null, null, ['PSU.RegDatm' => 'desc']);
        }

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 포인트적립/차감 목록 검색 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'PSU.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'PSU.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 포인트적립/차감 일괄/바로 등록 폼
     * @return object|string
     */
    public function create()
    {
        $mem_idx = $this->_reqG('mem_idx');
        $mem_data = [];
        $is_direct = empty($mem_idx) === false ? true : false;

        if ($is_direct === true) {
            // 바로등록일 경우 회원정보 조회
            $mem_data = $this->manageMemberModel->getMember($mem_idx);
        }
        
        // 적립/차감 사유 공통코드 조회
        $arr_reason_group_ccd = array_filter_keys($this->_ccd, ['SaveReason', 'UseReason']);
        $arr_reason_ccd = $this->codeModel->getCcdInArray(array_values($arr_reason_group_ccd));

        return $this->load->view('service/point/save_use_create', [
            'is_direct' => $is_direct,
            'mem_idx' => $mem_idx,
            'mem_data' => $mem_data,
            'arr_reason_group_ccd' => $arr_reason_group_ccd,
            'arr_reason_ccd' => $arr_reason_ccd
        ]);
    }

    /**
     * 포인트적립/차감 일괄/바로 등록
     * @return mixed
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'point_type', 'label' => '포인트구분', 'rules' => 'trim|required|in_list[lecture,book]'],
            ['field' => 'save_use', 'label' => '적립/차감구분', 'rules' => 'trim|required|in_list[save,use]'],
            ['field' => 'reason_ccd', 'label' => '적립/차감사유', 'rules' => 'trim|required'],
            ['field' => 'valid_start_date', 'label' => '유효시작일자', 'rules' => 'callback_validateRequiredIf[save_use,save]'],
            ['field' => 'valid_end_date', 'label' => '유효종료일자', 'rules' => 'callback_validateRequiredIf[save_use,save]'],
            ['field' => 'point_amt', 'label' => '적립/차감포인트', 'rules' => 'trim|required|integer|greater_than[0]'],
            ['field' => 'mem_idx[]', 'label' => '회원식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        if (($this->_reqP('save_use') == 'save' && starts_with($this->_reqP('reason_ccd'), $this->_ccd['SaveReason']) === false)
            || ($this->_reqP('save_use') == 'use' && starts_with($this->_reqP('reason_ccd'), $this->_ccd['UseReason']) === false)) {
            return $this->json_error('적립/차감 사유가 올바르지 않습니다.', _HTTP_BAD_REQUEST);
        }

        if (ends_with($this->_reqP('reason_ccd'), '999') === true && empty($this->_reqP('etc_reason')) === true) {
            return $this->json_error('적립/차감 기타사유를 입력해 주세요.', _HTTP_BAD_REQUEST);
        }

        if ($this->_reqP('save_use') == 'use' && count($this->_reqP('mem_idx')) > 1) {
            return $this->json_error('포인트 차감은 회원 1명씩만 처리가 가능합니다.', _HTTP_BAD_REQUEST);
        }

        $result = $this->pointModel->addSaveUsePoint($this->_reqP(null, false));

        return $this->json_result($result, '등록되었습니다.', $result);
    }
}
