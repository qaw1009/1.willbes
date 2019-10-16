<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStats extends \app\controllers\BaseController
{
    protected $models = array('_lms/sys/btobCode', 'stats/btobStats', 'cert/btobCert');
    protected $helpers = array();
    protected $_stats_type = '';
    protected $_stats_stype = '';
    protected $_sess_btob_idx = null;
    protected $_sess_btob_branch_ccd = null;
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct($stats_type, $stats_stype)
    {
        parent::__construct();

        $this->_stats_type = $stats_type;   // 통계구분 (인증/수강)
        $this->_stats_stype = $stats_stype; // 통계상세구분 (누적/월별)
        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
        $this->_sess_btob_branch_ccd = get_auth_branch_ccd();
    }

    /**
     * 제휴사 통계 인덱스
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

        // 연령대/성별별
        $arr_age = ['10' => '10대', '20' => '20대', '30' => '30대', '40' => '40대'];
        $arr_sex = ['M' => '남', 'F' => '여'];

        $view_file = $this->_stats_type . '_' . $this->_stats_stype;
        $this->load->view('stats/' . $view_file, [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_age' => $arr_age,
            'arr_sex' => $arr_sex
        ]);
    }

    /**
     * 제휴사 통계 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();
        
        $list = $this->btobStatsModel->{'list' . ucfirst($this->_stats_type) . 'Stats'}($this->_stats_stype, $arr_condition);
        $count = count($list);
        $sum_data = $this->_getTotalSum($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 제휴사 통계 엑셀 다운로드
     * @param string $file_name
     * @param array $data
     * @param array $headers
     */
    protected function _excel($file_name, $data, $headers)
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $data, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 제휴사 진행상태별 회원현황 모달 팝업
     * @return mixed
     */
    public function apply()
    {
        $arr_param = $this->_reqG(null);
        $search_branch_ccd = element('search_branch_ccd', $arr_param);
        $search_approval_status = element('search_approval_status', $arr_param);
        $search_start_date = element('search_start_date', $arr_param);
        $search_end_date = element('search_end_date', $arr_param);
        $search_age = element('search_age', $arr_param);
        $search_sex = element('search_sex', $arr_param);

        if (empty($search_branch_ccd) === true || empty($search_approval_status) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 검색정보
        $arr_search_info['date'] = $search_start_date . ' ~ ' . $search_end_date;
        $arr_search_info['age'] = empty($search_age) === false ? $search_age . '대' : '전체';
        if (empty($search_sex) === false) {
            $arr_search_info['sex'] = $search_sex == 'M' ? '남' : '여';
        } else {
            $arr_search_info['sex'] = '전체';
        }

        // 지점정보 조회
        $arr_condition = $this->_getListConditions();
        $data = element('0', $this->btobStatsModel->{'list' . ucfirst($this->_stats_type) . 'Stats'}($this->_stats_stype, $arr_condition));

        return $this->load->view('stats/apply', [
            'arr_param' => $arr_param,
            'arr_search_info' => $arr_search_info,
            'data' => $data
        ]);
    }

    /**
     * 제휴사 진행상태별 회원현황 목록
     * @return CI_Output
     */
    public function applyAjax()
    {
        $arr_condition = $this->_getApplyConditions();

        $list = [];
        $count = $this->btobCertModel->listCertApply(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobCertModel->listCertApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getApplyOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 진행상태별 회원현황 엑셀 다운로드
     */    
    public function applyExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = ['인증회차', '회원명', '회원아이디', '회원휴대폰번호', '생년월일', '성별', '지역', '지점', '신청일', '수험직렬', '상품명', '진행상태'
            , '승인완료자', '승인완료일', '승인반려자', '승인반려일', '승인취소자', '승인취소일', '승인만료일'];
        $file_name = '진행상태별_회원현황_' . $this->_sess_btob_idx . '_' . date('Y-m-d');

        $arr_condition = $this->_getApplyConditions();
        $list = $this->btobCertModel->listCertApply('excel', $arr_condition, null, null, $this->_getApplyOrderBy());

        // 진행상태코드값 수정
        $arr_approval_status = ['N' => '미승인', 'R' => '승인반려', 'Y' => '승인완료', 'C' => '승인취소', 'E' => '승인만료'];
        $list = array_map(function($row) use ($arr_approval_status) {
            $row['ApprovalStatus'] = $arr_approval_status[$row['ApprovalStatus']];
            return $row;
        }, $list);

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }        
    }

    /**
     * 제휴사 통계 조회조건 리턴
     * @return array|bool
     */
    private function _getListConditions()
    {
        // 필수 파라미터 체크
        if ($this->_stats_stype == 'month') {
            if (empty($this->_req('search_year')) === true) {
                show_error('필수 파라미터 오류입니다.');
            }
        } else {
            if (empty($this->_req('search_start_date')) === true || empty($this->_req('search_end_date')) === true) {
                show_error('필수 파라미터 오류입니다.');
            }
        }

        // 기본 검색조건
        $arr_condition = [
            'EQ' => [
                'CA.BtobIdx' => $this->_sess_btob_idx,
                'CA.AreaCcd' => $this->_req('search_area_ccd'),
                'CA.BranchCcd' => $this->_req('search_branch_ccd'),
                'M.Sex' => $this->_req('search_sex')
            ],
            'ORG' => [
                'LKB' => [
                    'BCA.CcdName' => $this->_req('search_value'),
                    'BCB.CcdName' => $this->_req('search_value')
                ]
            ]
        ];

        // 지점관리자 해당 지점만 조회
        if ($this->_sess_btob_branch_ccd !== true) {
            $arr_condition['EQ']['CA.BranchCcd'] = $this->_sess_btob_branch_ccd;
        }

        // 연령대 검색
        $arr_condition = array_merge_recursive($arr_condition, $this->_getAgeConditions($this->_req('search_age')));

        // 기간 검색
        if ($this->_stats_stype == 'month') {
            $arr_condition['BDT']['CA.RegDatm'] = [$this->_req('search_year') . '-01-01', $this->_req('search_year') . '-12-31'];
        } else {
            $arr_condition['BDT']['CA.RegDatm'] = [$this->_req('search_start_date'), $this->_req('search_end_date')];
        }

        return $arr_condition;
    }

    /**
     * 연령대 검색조건 리턴
     * @param int $age [연령대]
     * @return array
     */
    private function _getAgeConditions($age)
    {
        $age_fix_num = date('Y') - 2019;
        switch ($age) {
            case '10': $arr_condition['GT']['M.BirthDay'] = (1999 + $age_fix_num) . '1231'; break;
            case '20': $arr_condition['BET']['M.BirthDay'] = [(1990 + $age_fix_num) . '0101', (1999 + $age_fix_num) . '1231']; break;
            case '30': $arr_condition['BET']['M.BirthDay'] = [(1980 + $age_fix_num) . '0101', (1989 + $age_fix_num) . '1231']; break;
            case '40': $arr_condition['BET']['M.BirthDay'] = [(1970 + $age_fix_num) . '0101', (1979 + $age_fix_num) . '1231']; break;
            default: $arr_condition = []; break;
        }

        return $arr_condition;
    }

    /**
     * 제휴사 진행상태별 회원현황 목록 조회조건 리턴
     * @return array
     */
    private function _getApplyConditions()
    {
        $arr_condition = [
            'EQ' => [
                'CA.BtobIdx' => $this->_sess_btob_idx,
                'CA.BranchCcd' => $this->_reqP('search_branch_ccd'),
                'M.Sex' => $this->_reqP('search_sex')
            ],
            'IN' => [
                'CA.ApprovalStatus' => ['Y', 'R']
            ],
            'BDT' => [
                'CA.RegDatm' => [$this->_req('search_start_date'), $this->_req('search_end_date')]
            ]
        ];

        // 지점관리자 해당 지점만 조회
        if ($this->_sess_btob_branch_ccd !== true) {
            $arr_condition['EQ']['CA.BranchCcd'] = $this->_sess_btob_branch_ccd;
        }

        // 승인상태
        $search_approval_status = $this->_reqP('search_approval_status');
        if (empty($search_approval_status) === false && $search_approval_status != 'A') {
            if ($search_approval_status == 'Y') {
                $arr_condition['EQ']['CA.ApprovalStatus'] = 'Y';
                $arr_condition['GTE']['CA.ApprovalExpireDatm'] = date('Y-m-d H:i:s');
            } elseif ($search_approval_status == 'E') {
                $arr_condition['EQ']['CA.ApprovalStatus'] = 'Y';
                $arr_condition['LT']['CA.ApprovalExpireDatm'] = date('Y-m-d H:i:s');
            } else {
                $arr_condition['EQ']['CA.ApprovalStatus'] = $search_approval_status;
            }
        }

        // 연령대 검색
        $arr_condition = array_merge_recursive($arr_condition, $this->_getAgeConditions($this->_req('search_age')));

        return $arr_condition;
    }

    /**
     * 제휴사 진행상태별 회원현황 목록 정렬조건 리턴
     * @return array
     */
    private function _getApplyOrderBy()
    {
        return ['ApplyIdx' => 'desc'];
    }

    /**
     * 제휴사 통계 엑셀 데이터 리턴
     * @return array
     */
    protected function _getExcelData()
    {
        $arr_condition = $this->_getListConditions();

        $data = $this->btobStatsModel->{'list' . ucfirst($this->_stats_type) . 'Stats'}($this->_stats_stype, $arr_condition);
        $sum_data = $this->_getTotalSum($data);

        return ['data' => $data, 'sum_data' => $sum_data];
    }

    /**
     * 제휴사 통계 결과 합산
     * @param array $data
     * @return mixed
     */
    private function _getTotalSum($data)
    {
        if ($this->_stats_type == 'cert') {
            $sum_data['tApprovalApplyCnt'] = array_sum(array_pluck($data, 'ApprovalApplyCnt'));
            $sum_data['tApprovalCompleteCnt'] = array_sum(array_pluck($data, 'ApprovalCompleteCnt'));
            $sum_data['tApprovalRejectCnt'] = array_sum(array_pluck($data, 'ApprovalRejectCnt'));
            $sum_data['tApprovalExpireCnt'] = array_sum(array_pluck($data, 'ApprovalExpireCnt'));
        } else {
            $sum_data['tStudyRate'] = array_sum(array_pluck($data, 'StudyRate'));
            $sum_data['tStudyCnt'] = array_sum(array_pluck($data, 'StudyCnt'));
            $sum_data['tRealStudyCnt'] = array_sum(array_pluck($data, 'RealStudyCnt'));
            $sum_data['tAvgStudyRate'] = $sum_data['tStudyCnt'] > 0 ? round($sum_data['tStudyRate'] / $sum_data['tStudyCnt'], 2) : '0';
        }

        return $sum_data;
    }
}
