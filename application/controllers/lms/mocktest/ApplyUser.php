<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 개별접수현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyUser extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'mocktest/mockCommon', 'mocktest/applyUser');
    protected $helpers = array('url');
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     */
    public function index()
    {
        $paymentStatus = $this->config->item('sysCode_paymentStatus', 'mock');
        $applyType = $this->config->item('sysCode_applyType', 'mock');
        $applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');

        $siteCode = get_auth_site_codes();
        $codes = $this->codeModel->getCcdInArray([$paymentStatus, $applyType, $applyArea1, $applyArea2]);

        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
        $applyArea = $applyAreaTmp1 + $applyAreaTmp2;

        /*모의고사별 접수현황 메뉴에서 검색조건 달고 페이지 접근*/
        $search_PayStatusCcd = $this->_req('search_PayStatusCcd');
        $search_IsTake = $this->_req('search_IsTake');
        $search_fi = $this->_req('search_fi', true);
        $search_site_code = $this->_req('search_site_code', true);

        if($search_site_code){
            $scode = $search_site_code;
        } else {
            $scode = $siteCode[0];
        }

        $this->load->view('mocktest/apply/user/index', [
            'siteCodeDef' => $scode,
            'paymentStatus' => $codes[$paymentStatus],
            'applyType' => $codes[$applyType],
            'applyArea' => $applyArea,
            'search_PayStatusCcd'=>$search_PayStatusCcd,
            'search_IsTake'=>$search_IsTake,
            'search_fi'=>$search_fi,
        ]);
    }


    /**
     * 리스트
     */
    public function list($params=[])
    {
        if(empty($params) == false) {
            $excel = $params[0];
        } else {
            $excel = '';
        }

        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_PayStatusCcd', 'label' => '결제상태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeForm', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeArea', 'label' => '응시지역', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_IsStatus', 'label' => '응시여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_IsTicketPrint', 'label' => '응시표출력', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'O.SiteCode' => $this->_req('search_site_code'),
                'OP.PayStatusCcd' => $this->_req('search_PayStatusCcd'),
                'MR.TakeForm' => $this->_req('search_TakeForm'),
                'MR.TakeArea' => $this->_req('search_TakeArea'),
                'MR.IsTake' => $this->_req('search_IsTake'),
            ],
            'ORG' => [
                'LKB' => [
                    'U.MemName' => $this->_req('search_fi', true),
                    'U.MemId' => $this->_req('search_fi', true),
                    'U.Phone3' => $this->_req('search_fi', true),
                    'PD.ProdName' => $this->_req('search_fi', true),
                    'MR.ProdCode' => $this->_req('search_fi', true),
                    'MR.TakeNumber' => $this->_req('search_fi', true),
                    'O.OrderNo' => $this->_req('search_fi', true),
                ]
            ],
        ];

        if($excel === 'Y') {

            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $data  = $this->applyUserModel->mockRegistListExcel($condition);

            // export excel
            $file_name = '모의고사_개별접수현황_'.date('Y-m-d');
            $headers = ['NO','주문번호', '회원명', '회원아이디', '전화번호', '결제완료일', '결제금액', '결제상태', '상품명', '연도', '회차', '응시형태', '응시번호', '카테고리', '직렬', '과목', '응시지역', '응시여부'];

            /*----  다운로드 정보 저장  ----*/
            $download_query = $this->applyUserModel->getLastQuery();
            $this->load->library('approval');
            if($this->approval->SysDownLog($download_query, $file_name, count($data)) !== true) {
                show_alert('로그 저장 중 오류가 발생하였습니다.','back');
            }
            /*----  다운로드 정보 저장  ----*/

            $this->load->library('excel');
            if ($this->excel->exportHugeExcel($file_name, $data, $headers) !== true) {
                show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
            }

        } else {

            list($data, $count) = $this->applyUserModel->mockRegistList($condition, $this->input->post('length'), $this->input->post('start'),'');
            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $data,
            ]);
        }

    }


    /**
     * 출력이력 추출
     * @param array $params
     * @return CI_Output
     */
    public function PrintLog($params=[])
    {
        if(empty($params)) {
            return $this->json_error('신청코드가 존재하지 않습니다.');
        }

        $mr_idx = $params[0];

        $arr_condition = [
            'EQ' => [
                'MR.MrIdx' => $mr_idx
            ]
        ];
        $data = $this->applyUserModel->mockRegistList($arr_condition,'','','Y');

        $log = $this->applyUserModel->ticketPrintLog($mr_idx);

        $this->load->view('mocktest/apply/user/print_log_modal',[
                'data' => $data,
                'log' => $log
            ]
        );
    }

}
