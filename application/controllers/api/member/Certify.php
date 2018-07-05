<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certify extends \app\controllers\RestController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }

    /**
     * 핸드폰 번호로 인증번호를 보내거나 해당 핸드폰으로 보낸 인증번호가 맞는지 체크
     */
    public function sms_get()
    {
        $phone = $this->_req('phone');
        $code = $this->_req('code');
        $name = $this->_req('name');
        $id = $this->_req('id');

        if (empty($phone) === true) {
            return $this->api_success("전화번호를 정확하게 입력해주십시요.", [
                'err_cd' => 1
            ]);

        } else {
            $pattern = "^01(?:0|1|[6-9])(?:\d{3}|\d{4})\d{4}$^";

            if(!preg_match($pattern, $phone)){
                // 전화번호 패턴 오류
                return $this->api_success("전화번호를 정확하게 입력해주십시요.", [
                    'err_cd' => 1
                ]);
            }
        }

        if(empty($code) === true) {
            if(empty($this->session->tempdata('sms_code')) === false){
                return $this->api_success('이미 인증번호를 발송했습니다.', [
                    'err_cd' => 9
                ]);
            }

            // 인증코드가 없으면 해당 전화번호로 인증코드를 보냅니다.
            // 인증번호 생성
            $this->load->helper('string');
            $code = random_string('numeric', 6);
            $limit_date = Date("Y/m/d H:i:s", strtotime('+1 minutes '));

            //세션에 인증코드와 인증 시간을 기록한다.
            $this->session->set_tempdata('sms_phone', $phone, 180);
            $this->session->set_tempdata('sms_code', $code, 180);
            $this->session->set_tempdata('sms_name', $name, 180);
            $this->session->set_tempdata('sms_id', $id, 180);

            return $this->api_success('인증번호를 발송하였습니다.'.$code, [
                'err_cd' => 0,
                'limit_date' => $limit_date
            ]);


        } else {
            // 인증코드가 있으면 해당 전화번호로 보낸 인증코드가 정확한지 체크합니다.
            $sms_phone = $this->session->tempdata('sms_phone');
            $sms_code = $this->session->tempdata('sms_code');
            $sms_name = $this->session->tempdata('sms_name');
            $sms_id = $this->session->tempdata('sms_id');

            // 입력 시간이 초과했는지 체크
            if (empty($this->session->tempdata('sms_phone')) === true ||
                empty($this->session->tempdata('sms_code')) === true  ||
                empty($this->session->tempdata('sms_name')) === true  ) {
                return $this->api_success("입력시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.", null, [
                    'err_cd' => 1
                ]);
            }


            // 전화번호가 일치하는지 체크
            if($phone != $sms_phone){
                return $this->api_success("인증번호를 발송한 전화번호와 일치하지 않습니다. 인증번호 받기를 다시 진행해 주세요.", null, [
                    'err_cd' => 1,
                ]);
            }

            // 입력코드가 정확한지 체크
            if($code == $sms_code){
                // 인증코드가 일치하면 전화번호와 이름을 암호화 해서 넘긴다.
                // 0000-00-00 00:00:00^전화번호^이름^0000-00-00 00:00:00
                $var_data = Date('YmdHis')."^{$sms_phone}^{$sms_name}^{$sms_id}^".Date('YmdHis');
                $enc_data = $this->encrypt->encode($var_data);
                return $this->api_success('인증번호가 확인되었습니다.', [
                    'err_cd' => 0,
                    'enc_data' => $enc_data,
                    'phone_number' => $sms_phone
                ]);

            } else {
                // 인증번호 불일치
                return $this->api_success('인증번호가 일치하지 않습니다. 확인후 다시 입력해주세요.', [
                    'err_cd' => 9
                ]);
            }

        }
    }

}