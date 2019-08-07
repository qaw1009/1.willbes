<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AmtStatus extends \app\controllers\BaseController
{
    protected $models = array('service/point');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 포인트금액별현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/point/amt_status_index');
    }

    /**
     * 포인트금액별현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_save_point = $this->_reqP('search_save_point');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $count = 0;
        $list = [];

        // 포인트금액, 포인트사용기간이 있을 경우만 조회
        if (empty($search_save_point) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition = $this->_getListConditions();

            $count = $this->pointModel->listSaveUsePointByPointAmt($search_save_point, $search_start_date, $search_end_date, true, $arr_condition);

            if ($count > 0) {
                $list = $this->pointModel->listSaveUsePointByPointAmt($search_save_point, $search_start_date, $search_end_date, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 포인트금액별현황 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_save_point = $this->_reqP('search_save_point');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_save_point) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['적립시 주문번호', '적립시 주문상품코드', '적립시 주문상품명', '사용포인트구분', '사용구분', '아이디', '이름'
            , '사용시 주문번호', '적립날짜', '적립포인트', '사용날짜', '사용포인트', '남은포인트', '사용사유'];

        $arr_condition = $this->_getListConditions();
        $list = $this->pointModel->listSaveUsePointByPointAmt($search_save_point, $search_start_date, $search_end_date, false, $arr_condition, null, null, $this->_getListOrderBy());
        $last_query = $this->pointModel->getLastQuery();
        $file_name = '포인트금액별현황_' . $search_save_point . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 포인트금액별현황 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'PS.SiteCode' => $this->_reqP('search_site_code'),
                'SO.OrderNo' => $this->_reqP('search_order_no'),
                'SOP.ProdCode' => $this->_reqP('search_prod_code')
            ],
            'IN' => [
                'PS.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }

    /**
     * 포인트금액별현황 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['PS.PointIdx' => 'asc'];
    }    
}
