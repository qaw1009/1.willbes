<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReasonStatus extends \app\controllers\BaseController
{
    protected $models = array('service/pointStat');
    protected $helpers = array();
    private $_point_type = null;
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_point_type = get_var($this->uri->rsegment(3), 'lecture');
    }

    /**
     * 적립/차감 사유별 현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/point/reason_status_index', [
            '_point_type' => $this->_point_type
        ]);
    }

    /**
     * 적립/차감 사유별 현황 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $arr_input = $this->_getSearchDateParam();
        $count = 0;
        $list = [];
        $sum_data = null;

        // 조회날짜 파라미터가 모두 있을 경우만 조회
        if ($arr_input !== false) {
            $arr_condition = $this->_getListConditions();
            $list = $this->pointStatModel->listStatSaveUsePointByReason($this->_point_type, $arr_input['search_start_date'], $arr_input['search_end_date'], $arr_condition);

            // 결과값 가공
            if (empty($list) === false) {
                $list = $this->_getListResults($list);
                $count = count($list);
                $sum_data = $this->_getTotalSum($list);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 적립/차감 사유별 현황 엑셀다운로드
     * @param array $params
     */
    public function excel($params = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_input = $this->_getSearchDateParam();
        if ($arr_input === false) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['기간(년월)', '회원가입적립액', '주문/결제적립액', '이벤트적립액', '기타적립액', '주문/결제사용액', '소멸사용액', '기타사용액'];
        $arr_condition = $this->_getListConditions();
        $list = $this->pointStatModel->listStatSaveUsePointByReason($this->_point_type, $arr_input['search_start_date'], $arr_input['search_end_date'], $arr_condition);

        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // 결과값 가공
        $list = $this->_getListResults($list);
        $file_name = '적립차감사유별현황_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 적립/차감 사유별 현황 조회날짜 파라미터 검증 및 리턴
     * @return array|bool
     */
    private function _getSearchDateParam()
    {
        // 조회날짜 파라미터명
        $arr_param = ['search_start_date', 'search_end_date'];
        $arr_input = [];

        foreach ($arr_param as $name) {
            if (empty($this->_reqP($name)) === true) {
                return false;
            }

            $arr_input[$name] = $this->_reqP($name);
        }

        return $arr_input;
    }

    /**
     * 적립/차감 사유별 현황 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'PS.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'PS.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 적립/차감 사유별 현황 결과값 가공 (row => col)
     * @param array $data
     * @return array
     */
    private function _getListResults($data)
    {
        $results = [];
        $idx = -1;
        $tmp_base_ym = '';

        foreach ($data as $row) {
            if ($row['BaseYm'] != $tmp_base_ym) {
                $idx++;
            }

            // 디폴트 값 설정
            if (isset($results[$idx]['BaseYm']) === false) {
                $results[$idx] = [
                    'BaseYm' => $row['BaseYm'],
                    'JoinSavePoint' => '0', 'OrderSavePoint' => '0', 'EventSavePoint' => '0', 'EtcSavePoint' => '0',
                    'OrderUsePoint' => '0', 'ExpireUsePoint' => '0', 'EtcUsePoint' => '0'
                ];
            }

            // 적립구분별 적립/사용 포인트 설정
            if (isset($results[$idx][ucfirst($row['ReasonCode']) . 'SavePoint']) === true) {
                $results[$idx][ucfirst($row['ReasonCode']) . 'SavePoint'] = $row['SumSavePoint'];
            }
            if (isset($results[$idx][ucfirst($row['ReasonCode']) . 'UsePoint']) === true) {
                $results[$idx][ucfirst($row['ReasonCode']) . 'UsePoint'] = $row['SumUsePoint'];
            }

            $tmp_base_ym = $row['BaseYm'];
        }

        return $results;
    }

    /**
     * 적립/차감 사유별 현황 결과값 합계
     * @param $data
     * @return mixed
     */
    private function _getTotalSum($data)
    {
        $sum_data['tJoinSavePoint'] = array_sum(array_pluck($data, 'JoinSavePoint'));
        $sum_data['tOrderSavePoint'] = array_sum(array_pluck($data, 'OrderSavePoint'));
        $sum_data['tEventSavePoint'] = array_sum(array_pluck($data, 'EventSavePoint'));
        $sum_data['tEtcSavePoint'] = array_sum(array_pluck($data, 'EtcSavePoint'));
        $sum_data['tOrderUsePoint'] = array_sum(array_pluck($data, 'OrderUsePoint'));
        $sum_data['tExpireUsePoint'] = array_sum(array_pluck($data, 'ExpireUsePoint'));
        $sum_data['tEtcUsePoint'] = array_sum(array_pluck($data, 'EtcUsePoint'));

        return $sum_data;
    }
}
