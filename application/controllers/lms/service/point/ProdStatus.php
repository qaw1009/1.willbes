<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdStatus extends \app\controllers\BaseController
{
    protected $models = array('service/pointStat');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상품별현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/point/prod_status_index');
    }

    /**
     * 상품별현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $search_prod_code = $this->_reqP('search_prod_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $count = 0;
        $list = [];

        // 상품코드, 조회기간이 있을 경우만 조회
        if (empty($search_prod_code) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_prod_code = explode(',', $search_prod_code);
            $arr_condition = $this->_getListConditions();

            $list = $this->pointStatModel->listStatSaveUsePointByProdCode($arr_prod_code, $search_start_date, $search_end_date, $arr_condition);
            $count = count($list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 상품별현황 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_prod_code = $this->_reqP('search_prod_code');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');

        if (empty($search_prod_code) === true || empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['상품코드', '상품명', '기간(년월)', '적립합계', '적립건수', '사용합계', '사용건수'];
        $arr_prod_code = explode(',', $search_prod_code);
        $arr_condition = $this->_getListConditions();
        $list = $this->pointStatModel->listStatSaveUsePointByProdCode($arr_prod_code, $search_start_date, $search_end_date, $arr_condition);
        $file_name = '상품별포인트현황_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 상품별현황 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $this->_reqP('search_site_code')
            ],
            'IN' => [
                'P.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ]
        ];

        return $arr_condition;
    }
}
