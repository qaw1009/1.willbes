<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasswdVerify extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 비밀번호 유효성 체크
     * @return CI_Output|null
     */
    public function check()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_passwd', 'label' => '비밀번호', 'rules' => 'trim|required|callback_validatePasswdVerify[admin_id]']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        return $this->json_result(true, '사용 가능한 비밀번호입니다.');
    }
}
