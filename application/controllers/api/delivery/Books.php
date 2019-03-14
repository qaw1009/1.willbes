<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'hooks/LogQueryHook.php';

class Books extends \app\controllers\BaseController
{
    protected $models = array('delivery/bookA');
    protected $helpers = array();

    private $_content_type = 'application/xml';

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
     * @example https://api.local.willbes.net/delivery/books/getOrder?sitecode=2000&sdate=2019-03-14&stime=00&edate=2019-03-15&etime=00
     * @return CI_Output|null
     */
    public function getOrder()
    {
        $sitecode = $this->_reqG('sitecode');
        $sdate = $this->_reqG('sdate');
        $stime = $this->_reqG('stime');
        $edate = $this->_reqG('edate');
        $etime = $this->_reqG('etime');
        $results =  [];

        if (empty($sitecode) === true || empty($sdate) === true || empty($stime) === true || empty($edate) === true || empty($etime) === true) {
            return $this->_error();
        }

        $data = $this->bookAModel->listOrder($sdate, $stime, $edate, $etime);
        foreach ($data as $row) {
            $results[] = [
                'Name' => $this->_setItem($row['Receiver']),
                'Tel' => $this->_setItem($row['ReceiverTel']),
                'Hp' => $this->_setItem($row['ReceiverPhone']),
                'Zipcode' => $this->_setItem($row['ZipCode']),
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
     * 리턴값 가공
     * @param $value
     * @return string
     */
    private function _setItem($value)
    {
        return '<![CDATA[' . base64_encode($value) . ']]>';
    }

    /**
     * XML response
     * @param array $data
     * @param int $http_code
     * @return CI_Output
     */
    private function _response($data, $http_code = _HTTP_OK)
    {
        $output = $this->format->to_xml($data, null, 'NewDataSet', 'bookDelivery');
        $output = htmlspecialchars_decode(trim(str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $output)), ENT_XML1);

        return $this->output
            ->set_content_type($this->_content_type)
            ->set_status_header($http_code)
            ->set_output($output);
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
