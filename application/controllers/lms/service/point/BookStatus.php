<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookStatus extends \app\controllers\BaseController
{
    protected $models = array('service/pointStat');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재포인트현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/point/book_status_index');
    }

    /**
     * 교재포인트현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = $this->_getSearchDateParam();
        $count = 0;
        $list = [];

        // 조회날짜 파라미터가 모두 있을 경우만 조회
        if ($arr_input !== false) {
            $arr_condition = $this->_getListConditions();

            $list = $this->pointStatModel->listStatBookSaveUsePoint($arr_input['search_save_start_date'], $arr_input['search_save_end_date']
                , $arr_input['search_use_save_start_date'], $arr_input['search_use_save_end_date']
                , $arr_input['search_use_start_date'], $arr_input['search_use_end_date']
                , $arr_condition);

            // 결과값 가공
            if (empty($list) === false) {
                $list = $this->_getListResults($list);
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
     * 교재포인트현황 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_input = $this->_getSearchDateParam();
        if ($arr_input === false) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['기간(년월)', '회원가입적립액', '회원가입사용액', '교재적립액', '교재사용액', '강의적립액', '강의사용액'];
        $arr_condition = $this->_getListConditions();
        $list = $this->pointStatModel->listStatBookSaveUsePoint($arr_input['search_save_start_date'], $arr_input['search_save_end_date']
            , $arr_input['search_use_save_start_date'], $arr_input['search_use_save_end_date']
            , $arr_input['search_use_start_date'], $arr_input['search_use_end_date']
            , $arr_condition);

        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // 결과값 가공
        $list = $this->_getListResults($list);
        $file_name = '교재포인트현황_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 교재포인트현황 조회날짜 파라미터 검증 및 리턴
     * @return array|bool
     */
    private function _getSearchDateParam()
    {
        // 조회날짜 파라미터명
        $arr_param = ['search_save_start_date', 'search_save_end_date', 'search_use_save_start_date', 'search_use_save_end_date', 'search_use_start_date', 'search_use_end_date'];
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
     * 교재포인트현황 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'TA.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'TA.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 교재포인트현황 결과값 가공 (row => col)
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
                    'JoinSavePoint' => '0', 'JoinUsePoint' => '0',
                    'BookSavePoint' => '0', 'BookUsePoint' => '0',
                    'LectureSavePoint' => '0', 'LectureUsePoint' => '0',
                    //'EtcSavePoint' => '0', 'EtcUsePoint' => '0'
                ];
            }

            // 적립구분별 적립/사용 포인트 설정
            $results[$idx][ucfirst($row['SaveReason']) . 'SavePoint'] = $row['SumSavePoint'];
            $results[$idx][ucfirst($row['SaveReason']) . 'UsePoint'] = $row['SumUsePoint'];

            $tmp_base_ym = $row['BaseYm'];
        }

        return $results;
    }
}
