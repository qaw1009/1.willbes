<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalPolicy extends \app\controllers\BaseController
{
    protected $models = array('sys/btobApprovalPolicy', '_lms/sys/btobCode');
    protected $helpers = array();
    private $_sess_btob_idx = null;
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
    }

    /**
     * 제휴사 수강부여제한관리 인덱스
     */
    public function index()
    {
        // 지역/지점 공통코드 조회
        $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
        $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');

        $this->load->view('sys/approval_policy/index', [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd
        ]);
    }

    /**
     * 제휴사 수강부여제한관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();

        $count = $this->btobApprovalPolicyModel->listApprovalPolicy(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobApprovalPolicyModel->listApprovalPolicy(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 수강부여제한관리 목록 조회조건 리턴
     * @param null|string $branch_ccd [지점공통코드]
     * @return array
     */
    private function _getListConditions($branch_ccd = null)
    {
        $arr_condition = [
            'EQ' => [
                'AC.BtobIdx' => $this->_sess_btob_idx,
                'ACC.Ccd' => $this->_reqP('search_area_ccd'),
                'BCC.Ccd' => get_var($branch_ccd, $this->_reqP('search_branch_ccd')),
            ],
            'ORG' => [
                'LKB' => [
                    'ACC.CcdName' => $this->_reqP('search_value'),
                    'BCC.CcdName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 년월
        $search_year = $this->_reqP('search_year');
        $search_month = $this->_reqP('search_month');
        if (empty($search_year) === false) {
            if (empty($search_month) === false) {
                $search_date = $search_year . '-' . str_pad($search_month, 2, '0', STR_PAD_LEFT) . '-01';   // 검색월 1일
                $arr_condition['RAW']['"' . $search_date . '" between'] = ' AP.ApplyStartDate and AP.ApplyEndDate';
            } else {
                $arr_condition['RAW']['"' . $search_year . '" between'] = ' left(AP.ApplyStartDate, 4) and left(AP.ApplyEndDate, 4)';
            }
        }

        // 제한여부
        $search_is_limit = $this->_reqP('search_is_limit');
        if (empty($search_is_limit) === false) {
            if ($search_is_limit == 'Y') {
                $arr_condition['GTE']['AP.LimitCnt'] = 0;   // 제한있음
            } else {
                $arr_condition['LT']['AP.LimitCnt'] = 0;    // 제한없음
            }
        }

        return $arr_condition;
    }

    /**
     * 제휴사 수강부여제한관리 목록 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['ACC.OrderNum' => 'asc', 'BCC.OrderNum' => 'asc', 'AP.ApplyStartDate' => 'asc'];
    }

    /**
     * 제휴사 수강부여제한관리 목록 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = ['지역', '지점', '년월', '제한여부', '제한건수'];
        $file_name = '수강부여제한리스트_' . $this->_sess_btob_idx . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->btobApprovalPolicyModel->listApprovalPolicy('excel', $arr_condition, null, null, $this->_getListOrderBy());

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 제휴사 수강부여제한관리 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $branch_ccd = $params[0];
        if (empty($branch_ccd) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 지점별 수강부여제한정책 조회
        $arr_condition = $this->_getListConditions($branch_ccd);
        $data = $this->btobApprovalPolicyModel->listApprovalPolicy(false, $arr_condition, null, null, ['AP.ApplyStartDate' => 'asc']);

        $this->load->view('sys/approval_policy/create', [
            'branch_ccd' => $branch_ccd,
            'data' => $data
        ]);
    }

    /**
     * 제휴사 수강부여제한관리 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '등록구분', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'branch_ccd', 'label' => '지점코드', 'rules' => 'trim|required|integer'],
            ['field' => 'start_year', 'label' => '지정년도', 'rules' => 'trim|required|integer'],
            ['field' => 'start_month', 'label' => '지정월', 'rules' => 'trim|required|integer'],
            ['field' => 'is_limit', 'label' => '제한여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'limit_cnt', 'label' => '수강부여가능개수', 'rules' => 'callback_validateRequiredIf[is_limit,Y]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $method = $this->_reqP('_method') == 'POST' ? 'add' : 'modify';
        $result = $this->btobApprovalPolicyModel->{$method . 'ApprovalPolicy'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}