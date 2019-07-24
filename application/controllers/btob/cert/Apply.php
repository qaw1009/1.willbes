<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends \app\controllers\BaseController
{
    protected $models = array('_lms/sys/btobCode', 'cert/btobCert');
    protected $helpers = array();
    private $_sess_btob_idx = null;
    private $_sess_btob_branch_ccd = null;
    private $_arr_approval_status = ['N' => '미승인', 'R' => '승인반려', 'Y' => '승인완료', 'C' => '승인취소', 'E' => '승인만료'];
    private $_arr_approval_color = ['N' => 'red', 'R' => 'orange', 'Y' => 'blue', 'C' => 'green', 'E' => ''];
    private $_arr_search_date_type = ['N' => '신청일', 'R' => '승인반려일', 'Y' => '승인완료일', 'C' => '승인취소일', 'E' => '승인만료일'];
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
        $this->_sess_btob_branch_ccd = get_auth_branch_ccd();
    }

    /**
     * 제휴사 인증신청 인덱스
     */
    public function index()
    {
        // 지역/지점 공통코드 조회
        $arr_branch_ccd = [];
        $arr_area_ccd = [];
        if ($this->_sess_btob_branch_ccd === true) {
            $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
            $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');
        }

        // 수험직렬 공통코드 조회
        $arr_take_kind_ccd = element('takekind', $this->btobCodeModel->getCcdInArrayByConnValue($this->_sess_btob_idx, ['takekind']));

        $this->load->view('cert/apply/index', [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_take_kind_ccd' => $arr_take_kind_ccd,
            'arr_approval_status' => $this->_arr_approval_status,
            'arr_approval_color' => $this->_arr_approval_color,
            'arr_search_date_type' => $this->_arr_search_date_type
        ]);
    }

    /**
     * 제휴사 인증신청 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->btobCertModel->listCertApply(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobCertModel->listCertApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 인증신청 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'CA.BtobIdx' => $this->_sess_btob_idx,
                'CA.AreaCcd' => $this->_reqP('search_area_ccd'),
                'CA.BranchCcd' => $this->_reqP('search_branch_ccd'),
                'CA.TakeKindCcd' => $this->_reqP('search_take_kind_ccd')
            ],
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'CA.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ]
            ]
        ];

        // 지점관리자 해당 지점만 조회
        if ($this->_sess_btob_branch_ccd !== true) {
            $arr_condition['EQ']['CA.BranchCcd'] = $this->_sess_btob_branch_ccd;
        }

        // 승인상태
        $search_approval_status = $this->_reqP('search_approval_status');
        if (empty($search_approval_status) === false) {
            if ($search_approval_status == 'E') {
                $arr_condition['EQ']['CA.ApprovalStatus'] = 'Y';
                $arr_condition['LT']['CA.ApprovalExpireDatm'] = date('Y-m-d H:i:s');
            } else {
                $arr_condition['EQ']['CA.ApprovalStatus'] = $search_approval_status;
            }
        }

        // 날짜검색
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_date_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            switch ($search_date_type) {
                case 'N' :  // 신청일
                    $arr_condition['BDT'] = ['CA.RegDatm' => [$search_start_date, $search_end_date]];
                    break;
                case 'Y' :  // 승인완료일
                    $arr_condition['BDT'] = ['CA.ApprovalDatm' => [$search_start_date, $search_end_date]];
                    break;
                case 'R' :  // 승인반려일
                case 'C' :  // 승인취소일
                    $arr_condition['EQ']['CA.ApprovalStatus'] = $search_date_type;
                    $arr_condition['BDT'] = ['CA.StatusUpdDatm' => [$search_start_date, $search_end_date]];
                    break;
                case 'E' :  // 승인만료일
                    $arr_condition['BDT'] = ['CA.ApprovalExpireDatm' => [$search_start_date, $search_end_date]];
                    break;
            }
        }

        return $arr_condition;
    }

    /**
     * 제휴사 인증신청 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['ApplyIdx' => 'desc'];
    }

    /**
     * 제휴사 인증신청 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = ['인증회차', '회원명', '회원아이디', '회원휴대폰번호', '생년월일', '성별', '지역', '지점', '신청일', '수험직렬', '상품명', '진행상태'
            , '승인완료자', '승인완료일', '승인반려자', '승인반려일', '승인취소자', '승인취소일', '승인만료일'];
        $file_name = '인증신청목록_' . $this->_sess_btob_idx . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->btobCertModel->listCertApply('excel', $arr_condition, null, null, $this->_getListOrderBy());

        // 진행상태코드값 수정
        $list = array_map(function($row) {
            $row['ApprovalStatus'] = $this->_arr_approval_status[$row['ApprovalStatus']];
            return $row;
        }, $list);

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 제휴사 인증신청 승인관리 폼
     * @param array $params
     * @return mixed
     */
    public function create($params = [])
    {
        $apply_idx = element('0', $params, 0);
        $data = $this->btobCertModel->findCertApplyByApplyIdx($apply_idx);
        if (empty($data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }
        $data['ApprovalStatusName'] = $this->_arr_approval_status[$data['ApprovalStatus']];
        $data['ApprovalStatusColor'] = $this->_arr_approval_color[$data['ApprovalStatus']];

        // 신청목록 조회
        $arr_condition = ['EQ' => ['CA.BtobIdx' => $this->_sess_btob_idx, 'CA.MemIdx' => $data['MemIdx']]];
        $list = $this->btobCertModel->listCertApply(false, $arr_condition, null, null, $this->_getListOrderBy());

        return $this->load->view('cert/apply/approval', [
            'idx' => $apply_idx,
            'data' => $data,
            'list' => $list,
            'arr_approval_status' => $this->_arr_approval_status,
            'arr_approval_color' => $this->_arr_approval_color
        ]);
    }

    /**
     * 제휴사 인증신청 승인처리
     */
    public function approval()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'approval_status', 'label' => '진행상태', 'rules' => 'trim|required|in_list[R,Y,C]'],
            ['field' => 'lec_start_date', 'label' => '수강시작일', 'rules' => 'callback_validateRequiredIf[approval_status,Y]'],
            ['field' => 'lec_end_date', 'label' => '수강종료일', 'rules' => 'callback_validateRequiredIf[approval_status,Y]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCertModel->procCertApproval($this->_reqP(null, false));

        $this->json_result($result, '진행상태가 변경되었습니다.', $result);
    }
}
