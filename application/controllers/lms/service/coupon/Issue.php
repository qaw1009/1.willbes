<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'service/couponRegist', 'service/couponIssue');
    protected $helpers = array();
    private $_ccd = [];

    public function __construct()
    {
        parent::__construct();

        // 공통코드 셋팅
        $this->_ccd = $this->couponRegistModel->_ccd;
    }

    /**
     * 전체쿠폰발급/사용현황 인덱스
     */
    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $memidx = element('memidx',$arr_input);

        $this->load->view('service/coupon/issue_index', [
            'arr_issue_type_ccd' => $this->codeModel->getCcd($this->_ccd['IssueType']),
            'memidx' => $memidx
        ]);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $arr_condition = $this->_getListConditions();

        $list_type = element(0, $params);

        $list = [];
        $count = $this->couponIssueModel->listAllCouponDetail(true, $arr_condition, null, null, [], $list_type);

        if ($count > 0) {
            $list = $this->couponIssueModel->listAllCouponDetail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CdIdx' => 'desc'], $list_type);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 엑셀 다운로드
     */
    public function excel()
    {
        $headers = ['쿠폰핀번호', '회원명 (아이디)', '휴대폰번호', '쿠폰정보', '발급구분', '발급일 (발급자)', '유효여부 (만료일)', '사용여부 (사용일)', '사용상품 (주문번호)', '발급회수일 (회수자)'];

        $arr_condition = $this->_getListConditions();
        $list = $this->couponIssueModel->listAllCouponDetail('excel', $arr_condition, null, null, ['CdIdx' => 'desc']);
        $last_query = $this->couponIssueModel->getLastQuery();
        $file_name = '쿠폰발급리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

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
     * 전체쿠폰발급/사용현황 목록 검색 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_date_colum = ['I' => 'IssueDatm', 'U' => 'UseDatm', 'R' => 'RetireDatm'];
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $this->_reqP('search_member_idx'),
                'CouponIdx' => $this->_reqP('search_coupon_idx'),
                'IssueTypeCcd' => $this->_reqP('search_issue_type'),
                'IsUse' => $this->_reqP('search_is_use'),
                'ValidStatus' => $this->_reqP('search_valid_status'),
            ],
            'ORG1' => [
                'LKB' => [
                    'MemName' => $this->_reqP('search_member_value'),
                    'MemId' => $this->_reqP('search_member_value'),
                    'MemIdx' => $this->_reqP('search_member_value'),
                    'IssueUserName' => $this->_reqP('search_member_value'),
                    'IssueUserId' => $this->_reqP('search_member_value'),
                ],
                'EQ' => [
                    'MemIdx' => $this->_reqP('search_member_value'),
                    'Phone3' => $this->_reqP('search_member_value'),
                    'PhoneEnc' => $this->couponIssueModel->getEncString($this->_reqP('search_member_value'))
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'CouponIdx' => $this->_reqP('search_value'),
                    'CouponName' => $this->_reqP('search_value')
                ]
            ],
        ];

        // 날짜 검색
        if (array_key_exists($this->_reqP('search_date_type'), $arr_date_colum) === true) {
            $arr_condition['BDT'] = [$arr_date_colum[$this->_reqP('search_date_type')] => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        // 발급회수쿠폰 여부
        if ($this->_reqP('search_is_retire') == 'Y') {
            $arr_condition['RAW'] = ['RetireDatm is ' => 'not null'];
        }

        return $arr_condition;
    }

    /**
     * 사용자 쿠폰 발급 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $coupon_idx = element('0', $params, '');
        if (empty($coupon_idx) === true) {
            show_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST, '잘못된 접근');
        }

        // 쿠폰정보 조회
        $data = element('0', $this->couponRegistModel->listAllCoupon(false, ['EQ' => ['CouponIdx' => $coupon_idx]], 1, 0));
        if (empty($data) === true) {
            show_error('쿠폰정보 조회에 실패했습니다.', _HTTP_NOT_FOUND, '정보 없음');
        }

        // 적용상세구분 코드 조회
        $data['LecTypeNames'] = '';
        if (empty($data['LecTypeCcds']) === false) {
            $lec_type_ccds = $this->codeModel->getCcd($this->_ccd['LecType']);

            foreach (explode(',', $data['LecTypeCcds']) as $lec_type_ccd) {
                $data['LecTypeNames'] .= ',' . $lec_type_ccds[$lec_type_ccd];
            }
            $data['LecTypeNames'] = substr($data['LecTypeNames'], 1);
        }

        $this->load->view('service/coupon/issue_create', [
            'coupon_idx' => $coupon_idx,
            'method' => 'POST',
            'data' => $data,
            'arr_issue_type_ccd' => $this->codeModel->getCcd($this->_ccd['IssueType'])
        ]);
    }

    /**
     * 사용자 쿠폰 발급
     */
    public function store()
    {
        $rules = [
            ['field' => 'coupon_idx', 'label' => '쿠폰식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'mem_idx[]', 'label' => '회원 선택', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->couponIssueModel->addCouponDetailByManual($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사용자 쿠폰 회수
     */
    public function retire()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '사용자쿠폰식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->couponIssueModel->modifyRetireCouponDetail(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '회수 되었습니다.', $result);
    }
}
