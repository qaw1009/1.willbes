<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        var_dump('unit test controller method');
    }

    public function curlSend()
    {
        $url = 'https://www.dev.willbes.net/unitTest/npayResult';
        $send_xml = '<?xml version="1.0" encoding="utf-8"?>';
        $send_xml .= '<order>';
        $send_xml .= '<item>1000</item>';
        $send_xml .= '</order>';

        $this->load->library('curl');
        $this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $this->curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $this->curl->setOpt(CURLOPT_HTTPHEADER, ['Content-Type: application/xml; charset=utf-8']);
        $this->curl->setOpt(CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $this->curl->setOpt(CURLOPT_TIMEOUT, 10);
        $this->curl->setOpt(CURLOPT_FAILONERROR, false);
        $this->curl->post($url, $send_xml);

        if ($this->curl->error === true) {
            echo $this->curl->errorMessage . ' (' . $this->curl->errorCode . ')';
        } else {
            echo $this->curl->rawResponse;
        }

        $this->curl->close();
    }

    public function curlResult()
    {
        echo 'SUCCESS:1:2';
    }
}
