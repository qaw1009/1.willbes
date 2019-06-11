<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\BaseController
{
    protected $models = array('pay/orderCalc', 'product/base/professor', 'sys/code');
    protected $helpers = array();
    protected $_calc_type = 'lecture';
    protected $_calc_name = '온라인강좌';
    protected $_methods = ['LE' => 'Lecture', 'AC' => 'AdminPackChoice', 'PP' => 'PeriodPack'];
    protected $_prod_name = ['LE' => '단강좌&사용자/운영자패키지(일반형)', 'AC' => '운영자패키지(선택형)', 'PP' => '기간제패키지'];
    protected $_group_ccd = [];
    protected $_is_tzone = false;
    protected $_sess_tzone_prof_idxs = null;
    protected $_limit_start_date = '2019-03-25';    // 검색제한일자

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderCalcModel->_group_ccd;
        $this->_is_tzone = SUB_DOMAIN == 'tzone' ? true : false;
        $this->_sess_tzone_prof_idxs = $this->session->userdata('admin_prof_idxs');

        if ($this->_is_tzone === true && empty($this->_sess_tzone_prof_idxs) === true) {
            show_alert('연결된 교수정보가 없습니다.', 'back');
        }
    }

    /**
     * 온라인강좌 강사매출 매출요약 인덱스
     */
    protected function index()
    {
        // 상품구분 파라미터
        $prod_type = get_var($this->_reqG('prod_type'), 'LE');

        // 사이트탭 조회
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        // 교수 조회
        $arr_professor = [];
        if ($this->_is_tzone === false) {
            $arr_professor = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);
        }

        $this->load->view('profsales/calc/index', [
            'calc_type' => $this->_calc_type,
            'calc_name' => $this->_calc_name,
            'prod_type' => $prod_type,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_professor' => $arr_professor,
            'is_tzone' => $this->_is_tzone,
            'tzone_admin_id' => $this->_getTzoneAdminId(),
            'limit_start_date' => $this->_limit_start_date
        ]);
    }

    /**
     * 온라인강좌 강사매출 매출요약 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $prod_type = $this->_reqP('prod_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $sum_type = 'sum';
        $count = 0;
        $list = [];

        if (empty($prod_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            // tzone일 경우 통합 이후 주문내역만 조회 가능
            if ($this->_is_tzone === true && $search_start_date < $this->_limit_start_date) {
                // do nothing
            } else {
                $method = $this->_methods[$prod_type];
                $arr_search_date = [$search_start_date, $search_end_date];
                $arr_condition = $this->_getSumConditions($prod_type);

                $list = $this->orderCalcModel->{'listCalc' . $method}($this->_calc_type, $arr_search_date, $sum_type, $arr_condition);
                $count = count($list);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강사식별자 리턴 (tzone일 경우 로그인 세션 값 리턴)
     * @return mixed
     */
    private function _getProfIdx()
    {
        $arr_prof_idx = [];

        if ($this->_is_tzone === true) {
            $arr_prof_idx = $this->_sess_tzone_prof_idxs;
        } elseif (empty($this->_reqP('search_prof_idx')) === false) {
            $arr_prof_idx = [$this->_reqP('search_prof_idx')];
        }

        return $arr_prof_idx;
    }

    /**
     * 이전 사이트 자동로그인 전용 관리자 아이디 리턴
     * @return string
     */
    private function _getTzoneAdminId()
    {
        if ($this->_is_tzone === true) {
            $this->load->library('Crypto', ['license' => 'Willbes_Tzone']);
            return $this->crypto->encrypt($this->session->userdata('admin_id'));
        }

        return '';
    }

    /**
     * 온라인강좌 강사매출 매출요약 합계 조회조건 리턴
     * @param string $prod_type [조회구분]
     * @return array
     */
    private function _getSumConditions($prod_type)
    {
        $search_prof_idx = $this->_getProfIdx();
        $column_prefix = '';

        switch ($prod_type) {
            case 'LE' :
                // 단강좌, 사용자패키지, 운영자일반형패키지
                $column_prefix = 'PD';
                break;
            case 'AC' :
                // 운영자선택형패키지
                $column_prefix = 'SPD';
                break;
            case 'PP' :
                // 기간제패키지
                $column_prefix = 'OPP';
                break;
        }

        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                $column_prefix . '.ProfIdx' => $search_prof_idx
            ]
        ];

        return $arr_condition;
    }
}
