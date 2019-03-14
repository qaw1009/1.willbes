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
                'Name' => base64_encode($row['Receiver']),
                'Tel' => base64_encode($row['ReceiverTel']),
                'Hp' => base64_encode($row['ReceiverPhone']),
                'Zipcode' => base64_encode($row['ZipCode']),
                'Address' => base64_encode($row['Addr1'] . ' ' . $row['Addr2']),
                'Msg' => base64_encode($row['DeliveryMemo']),
                'BookName' => base64_encode($row['ReprProdName']),
                'OrderNum' => base64_encode($row['OrderNo']),
                'SiteCode' => $sitecode
            ];
        }

        return $this->_response($results);
    }

    /**
     * XML response
     * @param array $data
     * @param int $http_code
     * @return CI_Output
     */
    private function _response($data, $http_code = _HTTP_OK)
    {
        return $this->output
            ->set_content_type($this->_content_type)
            ->set_status_header($http_code)
            ->set_output($this->format->to_xml($data, null, 'NewDataSet', 'bookDelivery'));
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
