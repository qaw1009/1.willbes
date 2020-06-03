<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/site/consult/BaseConsult.php';

class VisitConsult extends BaseConsult
{
    protected $_consult_name = '방문상담';
    protected $_consult_type = 'V';        //상담종류 (V: 방문, T: 전화)
    protected $_consult_status = ['Y' => '상담완료', 'N' => '미방문'];
    protected $_default_path = '/consult/VisitConsult';

    public function __construct()
    {
        parent::__construct();
    }
}