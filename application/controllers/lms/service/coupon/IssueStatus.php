<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueStatus extends \app\controllers\BaseController
{
    protected $models = array('service/couponStat');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사용자쿠폰 발급/사용 통계 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('service/coupon/issue_status_index', []);
    }

    /**
     * 사용자쿠폰 발급/사용 통계 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $arr_input = $this->_getSearchDateParam();
        $arr_condition = $this->_getListConditions();
        $method = ucfirst(get_var($this->_reqP('search_date_type'), 'issue'));

        $list = $this->couponStatModel->{'listStat' . $method . 'Coupon'}($arr_input['search_start_date'], $arr_input['search_end_date'], $arr_condition);
        $count = count($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 사용자쿠폰 발급/사용 통계 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_input = $this->_getSearchDateParam();
        $arr_condition = $this->_getListConditions();
        $method = ucfirst(get_var($this->_reqP('search_date_type'), 'issue'));

        $headers = ['기간(년월)', '발급건수', '미사용건수', '사용건수', '사용금액'];
        $list = $this->couponStatModel->{'listStat' . $method . 'Coupon'}($arr_input['search_start_date'], $arr_input['search_end_date'], $arr_condition);

        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        $file_name = '전체쿠폰발급사용통계_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 사용자쿠폰 발급/사용 통계 검색일자 파라미터 리턴
     * @return array
     */
    private function _getSearchDateParam()
    {
        $arr_input = ['search_start_date' => $this->_reqP('search_start_date'), 'search_end_date' => $this->_reqP('search_end_date')];

        if (empty($arr_input['search_start_date']) === true || empty($arr_input['search_end_date']) === true) {
            $arr_input['search_start_date'] = date('Y-m-01', strtotime('-1 month'));
            $arr_input['search_end_date'] = date('Y-m-t', strtotime('-1 month'));
        }

        return $arr_input;
    }

    /**
     * 사용자쿠폰 발급/사용 통계 검색조건 리턴
     * @return array[]
     */
    private function _getListConditions()
    {
        return [
            'EQ' => [
                'C.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'C.SiteCode' => get_auth_site_codes()   // 사이트 권한 추가
            ]
        ];
    }
}
