<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class MailAuth extends BaseMember
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메일인증
     * @param array $params
     * @return object|string
     */
    public function index($params = [])
    {
        // 파라미터체크
        if(empty($params[0]) === true || empty($params[1]) === true){
            return $this->load->view('auth/certMail_Error', [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        // 주소/인증키/인증메일
        $certKey = $params[0];
        $certMail = $params[1];

        // 검색쿼리
        $result = $this->memberFModel->getMailAuth([
            'EQ' => [
                'certKey' => $certKey,
                'certMail' => $certMail
            ]]);

        if(empty($result) === true){
            // 검색정보 없음
            return $this->load->view("auth/certMail_Error", [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        // 시간체크
        $now = strtotime(date('Y-m-d H:i:s')); // 지금 시간
        $sendDate = strtotime($result['MailSendDatm'].'+30 minutes'); // 보낸시간 더하기 30분

        // 인증시간 초과 보내고나서 30분
        if($now > $sendDate){
            return $this->load->view("auth/certMail_Error", [
                'code' => 'over',
                'msg' => '인증시간이 초과했습니다.',
                'returnurl' => $this->_urlFromMailAuthCcd[$result['MailCertTypeCcd']]
            ]);
        }

        // 이미 사용한 인증키
        if($result['IsCert'] == 'Y'){
            return $this->load->view("auth/certMail_Error", [
                'code' => 'used',
                'msg' => '이미 사용한 인증코드입니다.',
                'returnurl' => $this->_urlFromMailAuthCcd[$result['MailCertTypeCcd']]
            ]);
        }

        return $this->load->view("auth/certMail_success", [
            'enc_data' => $result['CertKey'],
            'CertTypeCcd' => $result['MailCertTypeCcd']
        ]);
    }

}