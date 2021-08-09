<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * REST API Server Sample
 */
class Server extends \app\controllers\RestController
{
    // 메소드별 인증방식 설정
    /*protected $methods = [
        'index_get' => ['auth' => 'digest'],
    ];*/
    // 컨트롤러별 아이피 체크 설정
    //protected $_check_ip_whitelist = '192.168.56.1';

    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $id = $this->_reqG('id');
        if (empty($id) === true) {
            return $this->api_param_error();
        }

        $data = [
            'name' => '홍길동'
        ];

        return $this->api_success($data);
    }

    public function index_post()
    {
        $rules = [
            ['field' => 'id', 'label' => '아이디', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $data = [
            'name' => '홍길동POST'
        ];

        return $this->api_success($data);
    }
}