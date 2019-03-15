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

    public function __construct()
    {
        parent::__construct();

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
                'AmountCount' => '1',
                'Amount' => '1',
                'refundFlag' => 'N',
                'PCode' => $this->_setItem($row['ProdCode']),
                'Remark' => '',
                'PayDate' => $this->_setItem($row['CompleteDatm']),
                'Price' => $this->_setItem($row['RealPayPrice']),
                'MemberID' => $this->_setItem($row['MemId']),
                'MemberName' => $this->_setItem($row['MemName']),
                'TransNum' => $this->_setItem($row['InvoiceNo']),
                'booxencode' => '',
                'SiteCode' => $this->_setItem($sitecode)
            ];
        }

        return $this->_response($results);
    }

    /**
     * 송장번호 등록
     * @return mixed
     */
    public function setCode()
    {
        $data = $this->_reqP('data');

        logger('book api setCode => ' . $data);

        $result = $this->bookAModel->modifyInvoiceNo($this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
    }

    /**
     * 발송준비 상태 변경
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
     * @return mixed
     */
    public function setInit()
    {
        $data = $this->_reqP('data');
        $data = '<NewDataSet>
                <bookDelivery><OrderNum><![CDATA[20190314114922135045]]></OrderNum><TransNum><![CDATA[123456789011]]></TransNum><SiteCode><![CDATA[2001]]></SiteCode></bookDelivery>
                <bookDelivery><OrderNum><![CDATA[20190314191334907982]]></OrderNum><TransNum><![CDATA[123456789022]]></TransNum><SiteCode><![CDATA[2001]]></SiteCode></bookDelivery>
            </NewDataSet>';

        $result = $this->bookAModel->modifyDeliveryInit($this->_parse($data));
        return $result === true ? $this->_success() : $this->_error();
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
        return empty($input) === false ? array_map('get_object_vars', element($this->_item_node, $input)) : [];
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
     * @return null
     */
    private function _error()
    {
        return null;
    }
}
