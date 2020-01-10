<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'hooks/LogQueryHook.php';

class Books extends \app\controllers\BaseController
{
    protected $models = array('delivery/bookA');
    protected $helpers = array();
    private $_content_type = 'application/xml';
    private $_base_node = 'NewDataSet';
    private $_item_node = 'bookDelivery';
    private $_allow_ip = ['122.199.222.', '59.5.87.1.', '115.94.76.', '115.90.108.245', '58.150.126.91','112.219.179.26','218.50.164.164'];

    public function __construct()
    {
        parent::__construct();

        // 접근 아이피 체크
        $is_allow = $this->_checkAllowIp();
        if ($is_allow !== true) {
            exit($is_allow);
        }

        // xml format library
        $this->load->library('format');
    }

    public function __destruct()
    {
        // 수동 쿼리로그 저장
        $query_log = new \LogQueryHook();
        $query_log->logQueries();
    }

    /**
     * 결제완료 주문조회 (운송장 입력 대상)
     * @example https://api.local.willbes.net/delivery/books/getOrder?sitecode=2001&sdate=2019-03-14&stime=00&edate=2019-03-16&etime=00
     * @return CI_Output|null
     */
    public function getOrder()
    {
        $sitecode = $this->_reqG('sitecode');   // 사이트코드
        $sdate = $this->_reqG('sdate');     // 시작일자
        $stime = $this->_reqG('stime');     // 시작시간
        $edate = $this->_reqG('edate');     // 종료일자
        $etime = $this->_reqG('etime');     // 종료시간
        $results =  [];

        if (empty($sitecode) === true || empty($sdate) === true || empty($stime) === true || empty($edate) === true || empty($etime) === true) {
            return $this->_error();
        }

        $data = $this->bookAModel->listOrder($sitecode, $sdate, $stime, $edate, $etime);
        foreach ($data as $row) {
            $results[] = [
                'Name' => $this->_setItem($row['Receiver']),
                'Tel' => $this->_setItem($row['ReceiverTel']),
                'Hp' => $this->_setItem($row['ReceiverPhone']),
                'ZipCode' => $this->_setItem($row['ZipCode']),
                'Address' => $this->_setItem($row['Addr1'] . ' ' . $row['Addr2']),
                'Msg' => $this->_setItem($row['DeliveryMemo']),
                'BookName' => $this->_setItem($row['ReprProdName']),
                'OrderNum' => $this->_setItem($row['OrderNo']),
                'SiteCode' => $this->_setItem($sitecode)
            ];
        }

        return $this->_response($results);
    }

    /**
     * 송장입력상태인 주문상품 조회 (발송준비 변경 대상)
     * @example https://api.local.willbes.net/delivery/books/getProduct?sitecode=2001&sdate=2019-03-14&stime=00&edate=2019-03-16&etime=00
     * @return CI_Output|null
     */
    public function getProduct()
    {
        $sitecode = $this->_reqG('sitecode');   // 사이트코드
        $sdate = $this->_reqG('sdate');     // 시작일자
        $stime = $this->_reqG('stime');     // 시작시간
        $edate = $this->_reqG('edate');     // 종료일자
        $etime = $this->_reqG('etime');     // 종료시간

        return $this->_getProduct($sitecode, $sdate, $stime, $edate, $etime, 'invoice');
    }

    /**
     * 발송준비상태인 주문상품 조회 (발송완료 변경 대상)
     * @example https://api.local.willbes.net/delivery/books/getProductReady?sitecode=2001
     * @return CI_Output|null
     */
    public function getProductReady()
    {
        $sitecode = $this->_reqG('sitecode');   // 사이트코드
        $edate = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));   // 종료일자 (익일 0시)
        $sdate = date('Y-m-d', strtotime($edate . ' -30 day'));     // 시작일자 (종료일자 - 30일)

        return $this->_getProduct($sitecode, $sdate, '00', $edate, '00', 'prepare');
    }

    /**
     * 배송상태별 주문상품 조회
     * @param int $sitecode [사이트코드]
     * @param string $sdate [시작일 (y-m-d)]
     * @param string $stime [시작시간 (h)]
     * @param string $edate [종료일 (y-m-d)]
     * @param string $etime [종료시간 (h)]
     * @param string $delivery_status [배송상태, invoice (송장등록), prepare (발송준비)]
     * @return CI_Output|null
     */
    private function _getProduct($sitecode, $sdate, $stime, $edate, $etime, $delivery_status)
    {
        $results =  [];

        if (empty($sitecode) === true || empty($sdate) === true || empty($stime) === true || empty($edate) === true || empty($etime) === true) {
            return $this->_error();
        }

        $data = $this->bookAModel->listOrderProduct($sitecode, $sdate, $stime, $edate, $etime, $delivery_status);
        foreach ($data as $row) {
            $results[] = [
                'BookName' => $this->_setItem($row['ProdName']),
                'Name' => $this->_setItem($row['Receiver']),
                'ZipCode' => $this->_setItem($row['ZipCode']),
                'Address' => $this->_setItem($row['Addr1'] . ' ' . $row['Addr2']),
                'Address01' => $this->_setItem($row['Addr1']),
                'Address02' => $this->_setItem($row['Addr2']),
                'Hp' => $this->_setItem($row['ReceiverPhone']),
                'Tel' => $this->_setItem($row['ReceiverTel']),
                'OrderNum' => $this->_setItem($row['OrderNo']),
                'AmountCount' => $this->_setItem('1'),
                'Amount' => $this->_setItem('1'),
                'refundFlag' => $this->_setItem('N'),
                'PCode' => $this->_setItem($row['ProdCode']),
                'Remark' => $this->_setItem(''),
                'PayDate' => $this->_setItem($row['CompleteDatm']),
                'Price' => $this->_setItem($row['RealPayPrice']),
                'MemberID' => $this->_setItem($row['MemId']),
                'MemberName' => $this->_setItem($row['MemName']),
                'TransNum' => $this->_setItem($row['InvoiceNo']),
                'booxencode' => $this->_setItem(''),
                'SiteCode' => $this->_setItem($sitecode)
            ];
        }

        return $this->_response($results);
    }

    /**
     * 송장번호 등록
     * @example https://api.local.willbes.net/delivery/books/setCode?data={XML}
     * @return mixed
     */
    public function setCode()
    {
        $data = $this->_reqP('data');

        $result = $this->bookAModel->modifyInvoiceNo($this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
    }

    /**
     * 발송준비 상태 변경
     * @example https://api.local.willbes.net/delivery/books/setStatus?data={XML}
     * @return mixed
     */
    public function setStatus()
    {
        $data = $this->_reqP('data');

        $result = $this->bookAModel->modifyDeliveryStatus('prepare', $this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
    }

    /**
     * 발송완료 상태 변경
     * @example https://api.local.willbes.net/delivery/books/setComplete?data={XML}
     * @return mixed
     */
    public function setComplete()
    {
        $data = $this->_reqP('data');

        $result = $this->bookAModel->modifyDeliveryStatus('complete', $this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
    }

    /**
     * 배송정보 초기화
     * @example https://api.local.willbes.net/delivery/books/setInit?data={XML}
     * @return mixed
     */
    public function setInit()
    {
        $data = $this->_reqP('data');

        $result = $this->bookAModel->modifyDeliveryInit($this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
    }

    /**
     * 송장번호 등록, 배송상태 변경 (발송준비/발송완료), 배송정보 초기화 테스트
     * @param array $params
     * @return void
     */
    public function setTest($params = [])
    {
        $test_mode = element('0', $params);
        if (empty($test_mode) === true || in_array($test_mode, ['invoice', 'prepare', 'complete', 'init']) === false) {
            return $this->_error('필수 파라미터 오류입니다.');
        }

        // 로컬환경에서만 테스트 가능
        if (ENVIRONMENT != 'local') {
            return $this->_error('로컬 환경에서만 테스트 가능합니다.');
        }

        // 테스트 전달값 생성
        $arr_order_no = ['20191016134842763105', '20191016135025573565'];   // 테스트 주문번호
        $arr_invoice_no = ['1234567890', '9876543210'];     // 테스트 주문건에 저장될 운송장번호 (주문번호와 1대1 매칭)
        $site_code = '2001';    // 테스트 주문건의 사이트코드
        $data = [];

        foreach ($arr_order_no as $idx => $order_no) {
            $data[$idx] = ['OrderNum' => $order_no, 'SiteCode' => $site_code];

            if ($test_mode == 'invoice') {
                $data[$idx]['TransNum'] = element($idx, $arr_invoice_no, '1234567890');
            }
        }

        if (empty($data) === true) {
            return $this->_error('테스트 주문 데이터가 없습니다.');
        }

        // 테스트 메소드 실행
        $result = '';
        switch ($test_mode) {
            case 'invoice' :
                $result = $this->bookAModel->modifyInvoiceNo($data);
                break;
            case 'prepare' :
                $result = $this->bookAModel->modifyDeliveryStatus('prepare', $data);
                break;
            case 'complete' :
                $result = $this->bookAModel->modifyDeliveryStatus('complete', $data);
                break;
            case 'init' :
                $result = $this->bookAModel->modifyDeliveryInit($data);
                break;
        }
        
        if ($result === true) {
            var_dump('테스트 성공 ==> ', $result);
        } else {
            var_dump('테스트 실패 ==> ', $result);
        }
    }

    /**
     * XML response set item value
     * @param $value
     * @return string
     */
    private function _setItem($value)
    {
        //return $value;
        return '<![CDATA[' . base64_encode(urlencode($value)) . ']]>';
    }

    /**
     * XML input value parsing
     * @param string $data [XML input value]
     * @return array
     */
    private function _parse($data)
    {
        $input = $this->format->_from_xml($data);
        $item_input = element($this->_item_node, $input);
        $results = [];

        if (empty($item_input) === false) {
            if (is_array($item_input) === true) {
                $results = array_map('get_object_vars', $item_input);
            } else {
                $item_input = get_object_vars($item_input);
                $results[] = $item_input;
            }
        }

        return $results;
    }

    /**
     * XML response
     * @param array $data
     * @param int $http_code
     * @return CI_Output
     */
    private function _response($data, $http_code = _HTTP_OK)
    {
        $output = $this->format->to_xml($data, null, $this->_base_node, $this->_item_node);
        $output = htmlspecialchars_decode(trim(str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $output)), ENT_XML1);

        return $this->output
            ->set_content_type($this->_content_type)
            ->set_status_header($http_code)
            ->set_output($output);
    }

    /**
     * success response
     */
    private function _success() {
        echo 'OK';
    }

    /**
     * error response
     * @param string $msg
     */
    private function _error($msg = '')
    {
        empty($msg) === true && $msg = 'ERROR';
        echo $msg;
    }

    /**
     * 접근 아이피 체크
     * @return bool|string
     */
    private function _checkAllowIp()
    {
        // 로컬서버가 아닐 경우 체크 ==> TODO : 서버 환경별 실행
        if (ENVIRONMENT != 'local') {
            $access_ip = $this->input->ip_address();

            $is_allow = starts_with($access_ip, $this->_allow_ip);
            if ($is_allow !== true) {
                return 'NOT_ALLOW_IP';
            }
        }

        return true;
    }
}
