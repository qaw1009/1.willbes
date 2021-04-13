<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalStats extends \app\controllers\BaseController
{
    protected $models = array('stats/btobStats', 'cert/btobCert', '_lms/sys/btobCode');
    protected $helpers = array();
    private $_sess_btob_idx = null;
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
    }

    /**
     * 제휴사 수강부여현황 인덱스
     */
    public function index()
    {
        // 지역/지점 공통코드 조회
        $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
        $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');

        $this->load->view('stats/approval/index', [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd
        ]);
    }

    /**
     * 제휴사 수강부여현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $count = 0;
        $search_date = $this->_reqP('search_year') . '-' . str_pad($this->_reqP('search_month'), 2, '0', STR_PAD_LEFT) . '-01'; // 검색월 1일

        if (date_verify($search_date, 'Y-m-d') === true) {
            $arr_condition = $this->_getListConditions();
            $count = $this->btobStatsModel->listApprovalStats($search_date, true, $arr_condition);

            if ($count > 0) {
                $list = $this->btobStatsModel->listApprovalStats($search_date, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 수강부여현황 목록 조회조건 리턴
     * @param null|string $branch_ccd [지점공통코드]
     * @return array
     */
    private function _getListConditions($branch_ccd = null)
    {
        return [
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
    }

    /**
     * 제휴사 수강부여현황 목록 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['ACC.OrderNum' => 'asc', 'BCC.OrderNum' => 'asc'];
    }

    /**
     * 제휴사 수강부여현황 목록 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_date = $this->_reqP('search_year') . '-' . str_pad($this->_reqP('search_month'), 2, '0', STR_PAD_LEFT) . '-01'; // 검색월 1일
        if (date_verify($search_date, 'Y-m-d') === false) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['지역', '지점', '제공건수', '부여(승인완료)건수', '잔여건수'];
        $file_name = '수강부여현황리스트_' . $this->_sess_btob_idx . '_' . date('Y-m-d');

        $arr_condition = $this->_getListConditions();
        $list = $this->btobStatsModel->listApprovalStats($search_date, 'excel', $arr_condition, null, null, $this->_getListOrderBy());

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 제휴사 수강부여현황 이력 보기
     * @param array $params
     */
    public function show($params = [])
    {
        $branch_ccd = $this->_reqG('branch_ccd');
        $search_year = $this->_reqG('search_year');
        $search_month = $this->_reqG('search_month');
        $search_date = $search_year . '-' . str_pad($search_month, 2, '0', STR_PAD_LEFT) . '-01'; // 검색월 1일

        if (empty($branch_ccd) === true || date_verify($search_date, 'Y-m-d') === false) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 지점별 수강부여현황 조회
        $arr_condition = $this->_getListConditions($branch_ccd);
        $data = array_get($this->btobStatsModel->listApprovalStats($search_date, false, $arr_condition), '0');
        if (empty($data) === true) {
            return $this->json_error('수강부여현황 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 승인완료 인증신청 목록 조회
        $arr_apply_condition = [
            'EQ' => [
                'CA.BtobIdx' => $this->_sess_btob_idx,
                'CA.BranchCcd' => $branch_ccd,
                'CA.ApprovalStatus' => 'Y'
            ],
            'BDT' => [
                'CA.ApprovalDatm' => [$search_date, date('Y-m-t', strtotime($search_date))]
            ]
        ];
        $list = $this->btobCertModel->listCertApply(false, $arr_apply_condition, null, null, ['CA.ApplyIdx' => 'desc']);

        return $this->load->view('stats/approval/show', [
            'branch_ccd' => $branch_ccd,
            'search_year' => $search_year,
            'search_month' => $search_month,
            'data' => $data,
            'list' => $list
        ]);
    }
}