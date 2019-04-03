<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseAdvance extends \app\controllers\BaseController
{
    protected $models = array('pay/orderAdvance', 'sys/site');
    protected $helpers = array();
    protected $_advance_type = '';
    protected $_advance_name = '';
    protected $_group_ccd = [];
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct($advance_type, $advance_name)
    {
        parent::__construct();

        $this->_advance_type = $advance_type;
        $this->_advance_name = $advance_name;
        $this->_group_ccd = $this->orderAdvanceModel->_group_ccd;
    }

    /**
     * 선수금 조회 인덱스
     */
    protected function index()
    {
        // 사이트탭 조회
        $arr_site = $this->siteModel->listSite('SiteCode, SiteName', [
            'EQ' => ['IsUse' => 'Y', 'IsCampus' => ($this->_advance_type == 'lecture' ? 'N' : 'Y')],
            'IN' => ['SiteCode' => get_auth_site_codes()]
        ]);
        $arr_site_code = array_pluck($arr_site, 'SiteName', 'SiteCode');
        $def_site_code = key($arr_site_code);

        $this->load->view('business/advance/index', [
            'advance_type' => $this->_advance_type,
            'advance_name' => $this->_advance_name,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code
        ]);
    }

    /**
     * 선수금 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $search_date = $this->_reqP('search_date');
        $count = 0;
        $list = [];

        if (empty($search_date) === false) {
            $method = ucfirst($this->_advance_type);
            $arr_condition = ['EQ' => ['O.SiteCode' => $this->_reqP('search_site_code')]];

            $list = $this->orderAdvanceModel->{'listAdvance' . $method}($search_date, false, $arr_condition, 100, 0);
            $count = count($list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 선수금 목록 엑셀다운로드
     */
    protected function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_date = $this->_reqP('search_date');
        if (empty($search_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 데이터 조회
        $method = ucfirst($this->_advance_type);
        $arr_condition = ['EQ' => ['O.SiteCode' => $this->_reqP('search_site_code')]];
        $list = $this->orderAdvanceModel->{'listAdvance' . $method}($search_date, 'excel', $arr_condition);

        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // export excel
        $file_name = $this->_advance_name . '_선수금리스트';

        if ($this->_advance_type == 'lecture') {
            $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '상품구분', '상품상세구분', '상품코드', '상품명', '강좌코드', '강좌명', '교수명', '결제금액', '결제일'
                , '환불금액', '환불완료일', '결제상태', '전체금액', '안분율', '안분금액', '정산율', '배분금액', '수강시작일', '수강종료일', '실제수강종료일', '총무료연장일수', '총일시정지일수'
                , '1차일시정지', '2차일시정지', '3차일시정지', '수강상태', '총유료수강일수', '잔여수강일수', '사용수강일수', '잔여금액(선수금)', '사용금액', '기준일'];
        } else {
            $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '상품구분', '상품상세구분', '캠퍼스', '상품코드', '상품명', '강좌코드', '강좌명', '교수명', '과목명', '결제금액', '결제일'
                , '환불금액', '환불완료일', '결제상태', '전체금액', '안분율', '안분금액', '정산율', '배분금액', '개강일', '종강일', '전체강의횟수', '잔여강의횟수', '사용강의횟수'
                , '잔여금액(선수금)', '사용금액', '기준일'];
        }

        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 선수금 목록 엑셀다운로드 (사용안함, 테이블 HTML 출력방식 => 엑셀파일 오픈속도 느림)
     */
    protected function excelTable()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);
        
        $search_date = $this->_reqP('search_date');
        if (empty($search_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 데이터 조회
        $method = ucfirst($this->_advance_type);
        $arr_condition = ['EQ' => ['O.SiteCode' => $this->_reqP('search_site_code')]];
        $list = $this->orderAdvanceModel->{'listAdvance' . $method}($search_date, 'excel', $arr_condition);

        if (empty($list) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        try {
            $file_name = $this->_advance_name . '_선수금리스트';

            if ($this->_advance_type == 'lecture') {
                $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '상품구분', '상품상세구분', '상품코드', '상품명', '강좌코드', '강좌명', '교수명', '결제금액', '결제일'
                    , '환불금액', '환불완료일', '결제상태', '전체금액', '안분율', '안분금액', '정산율', '배분금액', '수강시작일', '수강종료일', '실제수강종료일', '총무료연장일수', '총일시정지일수'
                    , '1차일시정지', '2차일시정지', '3차일시정지', '수강상태', '총유료수강일수', '잔여수강일수', '사용수강일수', '잔여금액(선수금)', '사용금액', '기준일'];
            } else {
                $headers = ['주문번호', '회원명', '회원아이디', '결제루트', '결제수단', '상품구분', '상품상세구분', '상품코드', '상품명', '강좌코드', '강좌명', '교수명', '과목명', '결제금액', '결제일'
                    , '환불금액', '환불완료일', '결제상태', '전체금액', '안분율', '안분금액', '정산율', '배분금액', '개강일', '종강일', '전체강의횟수', '잔여강의횟수', '사용강의횟수'
                    , '잔여금액(선수금)', '사용금액', '기준일'];
            }

            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . iconv('UTF-8','EUC-KR',$file_name).'.xls"');
            header('Expires: 0');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: private, no-transform, no-store, must-revalidate');

            ob_start();
                echo '<table cellpadding="0" cellspacing="0" border="1">';
                echo '<tr>';
                foreach ($headers as $val) {
                    echo '<td>' . $val . '</td>';
                }
                echo '</tr>';

                foreach ($list as $idx => $row) {
                    echo '<tr>';
                    foreach ($row as $key => $val) {
                        if ($key == 'OrderNo') {
                            echo '<td style="mso-number-format: \@;">' . $val . '</td>';
                        } else {
                            echo '<td>' . $val . '</td>';
                        }
                    }
                    echo '</tr>';

                    ob_flush();
                    flush();
                }

                echo '</table>';
            ob_end_clean();
        } catch (\Exception $e) {
            show_alert('엑셀파일 생성 중 에러가 발생하였습니다. [' . $e->getMessage() . ']', 'back');
        }
    }
}
