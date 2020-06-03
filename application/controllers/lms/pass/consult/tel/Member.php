<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/pass/consult/BaseConsultMember.php';

class Member extends BaseConsultMember
{
    protected $_consult_name = '전화상담';
    protected $_consult_type = 'T';        //상담종류 (V: 방문, T: 전화)
    protected $_consult_status = ['Y' => '상담완료', 'N' => '상담전', 'M' => '부재중'];
    protected $_default_path = '/pass/consult/tel';

    public function __construct()
    {
        parent::__construct();
    }
}