<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbConnectionTest extends \app\controllers\FrontController
{
    protected $models = array('dbconnection/test');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 리얼 DB connection test
     * @return mixed
     */
    public function index()
    {
        $this->load->view('site/connection_test/index', [
        ]);
    }

    public function pingStage()
    {
        $url = site_url('/dbConnectionTest/connectionTest');

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);


        echo '<pre>';
        print_r($status_code);
        echo '<pre>';
        print_r($response);
//        if($response['code'] != '200'){
//            echo 'error';
//        }

        exit;
    }

    public function connectionTest()
    {
        $response = $this->testModel->connectionResponse();

        if(empty($response) === false){
            $response['code'] = 200;
            $response['msg'] = 'success';
            echo json_encode($response);
            exit;
        }

    }

}