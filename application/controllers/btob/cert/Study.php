<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Study extends \app\controllers\BaseController
{
    protected $models = array('_lms/sys/btobCode', 'cert/btobStudy');
    protected $helpers = array();
    private $_sess_btob_idx = null;
    private $_sess_btob_branch_ccd = null;
    private $_arr_approval_status = ['N' => '미승인', 'R' => '승인반려', 'Y' => '승인완료', 'C' => '승인취소', 'E' => '승인만료'];
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
        $this->_sess_btob_branch_ccd = get_auth_branch_ccd();
    }

    /**
     * 제휴사 수강이력확인 인덱스
     */
    public function index()
    {
        // 상세 페이지에서 전달된 검색어
        $arr_input = $this->_reqP(null);

        $this->load->view('cert/study/index', [
            'arr_input' => $arr_input
        ]);
    }

    /**
     * 제휴사 수강이력확인 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->btobStudyModel->listStudyMember($this->_sess_btob_idx, $this->_sess_btob_branch_ccd, true, $arr_condition, null, null, []);

        if ($count > 0) {
            $list = $this->btobStudyModel->listStudyMember($this->_sess_btob_idx, $this->_sess_btob_branch_ccd, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 수강이력확인 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'ORG' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ]
        ];

        return $arr_condition;
    }

    /**
     * 제휴사 수강이력확인 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['LastApplyIdx' => 'desc'];
    }

    /**
     * 제휴사 수강이력확인 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $headers = ['회원명', '회원아이디', '성별', '생년월일', '연락처'];
        $file_name = '수강이력확인_' . $this->_sess_btob_idx . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->btobStudyModel->listStudyMember($this->_sess_btob_idx, $this->_sess_btob_branch_ccd, 'excel', $arr_condition, null, null, $this->_getListOrderBy());

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 제휴사 수강이력확인 상세
     * @param array $params
     */
    public function show($params = [])
    {
        $apply_idx = element('0', $params);
        if (empty($apply_idx) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 회원정보 조회
        $mem_data = $this->btobStudyModel->findStudyMember($this->_sess_btob_idx, $this->_sess_btob_branch_ccd, $apply_idx);
        if (empty($mem_data) === true) {
            show_alert('회원정보가 없습니다.', 'back');
        }
        $mem_idx = $mem_data['MemIdx'];

        // 수강이력 조회 (상품조회)
        $data = $this->btobStudyModel->listStudyMemberProduct($this->_sess_btob_idx, $mem_idx);
        if (empty($data) === true) {
            show_alert('수강이력이 없습니다.', 'back');
        }

        // 상품별 서브강좌 조회
        $sub_data = $this->btobStudyModel->listStudyMemberSubProduct($this->_sess_btob_idx, $mem_idx);

        // 수강이력 조합
        foreach ($data as $idx => $row) {
            // 진행상태명 설정
            $data[$idx]['ApprovalStatusName'] = element($row['ApprovalStatus'], $this->_arr_approval_status, '');
            
            // 서브강좌 설정
            $data[$idx]['ProdSubData'] = [];
            foreach ($sub_data as $sub_row) {
                if ($row['ApplyIdx'] == $sub_row['ApplyIdx']) {
                    $data[$idx]['ProdSubData'][] = $sub_row;
                }
            }
        }

        $this->load->view('cert/study/show', [
            'mem_idx' => $mem_idx,
            'mem_data' => $mem_data,
            'data' => $data
        ]);
    }

    /**
     * 제휴사 서브강좌 수강이력
     * @return mixed
     */
    public function lectureHist()
    {
        $arr_param = $this->_reqG(null);
        $mem_idx = element('mem_idx', $arr_param);
        $apply_idx = element('apply_idx', $arr_param);
        $prod_code_sub = element('prod_code_sub', $arr_param);

        if (empty($mem_idx) === true || empty($apply_idx) === true || empty($prod_code_sub) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 강좌정보 조회
        $prod_data = element('0', $this->btobStudyModel->listStudyMemberSubProduct($this->_sess_btob_idx, $mem_idx, [
            'EQ' => ['CA.ApplyIdx' => $apply_idx, 'ML.ProdCodeSub' => $prod_code_sub]
        ]));
        if (empty($prod_data) === true) {
            return $this->json_error('강좌정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 강좌 수강이력 조회
        $data = $this->btobStudyModel->listStudyMemberUnitLecture($this->_sess_btob_idx, $mem_idx, $apply_idx, $prod_data['ProdCodeSub']);
        if (empty($data) === true) {
            return $this->json_error('학습이력이 없습니다.', _HTTP_NOT_FOUND);
        }

        // 강좌 수강이력 회차별 배수시간, 남은시간 조회
        foreach ($data as $idx => $row) {
            $arr_time = $this->_getUnitLectureLimitRemainTime($prod_data, $row);
            $data[$idx]['LimitStudyTime'] = $arr_time['LimitStudyTime'];
            $data[$idx]['RemainStudyTime'] = $arr_time['RemainStudyTime'];
        }

        return $this->load->view('cert/study/lecture_hist', [
            'prod_data' => $prod_data,
            'data' => $data
        ]);
    }

    /**
     * 회차별 배수시간, 남은시간 계산
     * @param array $lec_data [강좌정보]
     * @param array $unit_data [회차정보]
     * @return array
     */
    private function _getUnitLectureLimitRemainTime($lec_data, $unit_data)
    {
        $limit_time = '';
        $remain_time = '';

        if (empty($lec_data['MultipleApply']) == true || $lec_data['MultipleApply'] == '1') {
            $limit_time = '무제한';
            $remain_time = '무제한';
        } elseif ($lec_data['MultipleTypeCcd'] == '612001' || $lec_data['MultipleTypeCcd'] == '612002') {
            if ($lec_data['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크 (회차 시간에 배수 적용)
                $study_time = intval($unit_data['RealStudyTime']);  // 수강시간(초)

                // 제한시간 분 -> 초
                if ($unit_data['RealExpireTime'] == '0') {
                    $limit_time = intval($unit_data['wRuntime']) * intval($lec_data['MultipleApply']) * 60;
                } else {
                    $limit_time = intval($unit_data['RealExpireTime']) * 60;
                }
            } else {
                // 패키지 수강시간 체크 (전체 강의시간에 배수 적용)
                $study_time = intval($lec_data['StudyTimeSum']);  // 수강시간(초)

                // 제한시간 분 -> 초
                $limit_time = intval($lec_data['RealExpireTime']) * 60;
            }

            if ($study_time > $limit_time){
                // 제한시간 초과
                $limit_time = round(intval($limit_time) / 60) . '분';
                $remain_time = '0분';
            } else {
                $limit_time = round(intval($limit_time) / 60) . '분';
                $remain_time = round(($limit_time - $study_time) / 60) .'분';
            }
        }

        return ['LimitStudyTime' => $limit_time, 'RemainStudyTime' => $remain_time];
    }
}
