<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class User extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/applyUser');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        if (empty($this->_reqG('search_site_code')) === true) {
            $def_site_code = key($arr_site_code);
        } else {
            $def_site_code = $this->_reqG('search_site_code');
        }

        $arr_base['search_PayStatusCcd'] = $this->_reqG('search_PayStatusCcd');
        $arr_base['search_IsTake'] = $this->_reqG('search_IsTake');
        $arr_base['search_takeArea'] = $this->_reqG('search_takeArea');
        $arr_base['search_fi'] = $this->_reqG('search_fi', true);

        $paymentStatus = $this->mockCommonModel->_groupCcd['paymentStatus'];
        $applyType = $this->mockCommonModel->_groupCcd['applyType'];
        $applyArea1 = $this->mockCommonModel->_groupCcd['applyArea1'];
        $applyArea2 = $this->mockCommonModel->_groupCcd['applyArea2'];
        $codes = $this->codeModel->getCcdInArray([$paymentStatus, $applyType, $applyArea1, $applyArea2]);

        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);

        $arr_base['paymentStatus'] = $codes[$paymentStatus];
        $arr_base['applyType'] = $codes[$applyType];
        $arr_base['applyArea'] = $applyAreaTmp1 + $applyAreaTmp2;

        $this->load->view('mocktestNew/apply/user/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'MR.IsStatus' => 'Y',
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
            ]
        ];

        $list = [];
        $count = $this->applyUserModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->applyUserModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_condition = [
            'EQ' => [
                'MR.IsStatus' => 'Y',
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
            ]
        ];
        $results = $this->applyUserModel->mainList('excel', $arr_condition);
        $file_name = '모의고사_개별접수현황_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['주문번호', '회원명', '회원아이디', '전화번호', '결제완료일', '결제금액', '결제상태', '결제수단', '상품명', '연도', '회차', '응시형태', '응시번호', '카테고리', '직렬', '과목', '응시지역', '응시여부'];

        $last_query = $this->applyUserModel->getLastQuery();
        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}