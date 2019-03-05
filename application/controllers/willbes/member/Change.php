<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Change extends BaseMember
{
    protected $auth_controller = true;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $params
     * @return object|string
     */
    public function index($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/member/change/index/info/');
        }

        if($params[0] == 'info'){
            return $this->info();
        } else if($params[0] == 'password'){
            return $this->password();
        } else {
            redirect('/member/change/index/info/');
        }
    }

    /**
     * 회원정보 변경 페이지
     * @return object|string
     */
    public function info()
    {
        $Password = $this->_req('password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            return $this->load->view('member/change/info_check');
        }

        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/info/', false);
        }

        $codes = $this->codeModel->getCcdInArray(['661']);

        $this->load->library('encrypt');

        $data = $this->memberFModel->getMember(false, ['EQ'=>['Mem.MemIdx'=>$MemIdx]]);

        return $this->load->view('member/change/info', [
            'mail_domain_ccd' => $codes['661'],
            'password' => $this->encrypt->encode($Password),
            'data' => $data
        ]);
    }

    /**
     * 비밀번호 변경 페이지
     * @return object|string
     */
    public function password()
    {
        $oldPassword = $this->_req('oldPass');
        $newPassword = $this->_req('newPass');
        $newPasswordchk = $this->_req('newPasschk');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($oldPassword) === false && empty($newPassword) === true){
            // 새로운 비밀번호 입력
            if($this->memberFModel->checkMemberPassword($MemIdx, $oldPassword) === false){
                show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/password/', false);
            }

            $this->load->library('encrypt');

            return $this->load->view('member/change/password', [
                'method' => 'change',
                'password' => $this->encrypt->encode($oldPassword)
            ]);

        } else if(empty($oldPassword) === false && empty($newPassword) === false){
            $this->load->library('encrypt');
            $oldPassword = $this->encrypt->decode($oldPassword);

            // 비밀번호 변경 프로세스
            if($this->memberFModel->checkMemberPassword($MemIdx, $oldPassword) === false){
                show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/password/', false);
            }

            if($this->memberFModel->setMemberPassword(['MemIdx' => $MemIdx, 'MemPassword' => $newPassword, 'UpdTypeCcd' => '656001']) === false){
                show_alert('비밀번호 변경이 실패했습니다. 다시 시도해주십시요.', '/member/change/index/password/', false);
            } else {
                show_alert('비밀번호 변경이 완료되었습니다.', '/classroom/home/', false);
            }
        }

        return $this->load->view('member/change/password', [
            'method' => 'check',
            'password' => ''
        ]);
    }

    /**
     * 회원정보변경 처리
     */
    public function proc()
    {
        $Password = $this->_req('Password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            show_alert('비밀번호를 다시 한번 입력해야 정보변경이 가능합니다.', '/member/change/index/info/', false);
        }

        $this->load->library('encrypt');
        $Password = $this->encrypt->decode($Password);
        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/info/', false);
        }

        $data = [
            'Tel' => $this->_req('Tel1').$this->_req('Tel2').$this->_req('Tel3'),
            'Tel1' => $this->_req('Tel1'),
            'Tel2' => $this->_req('Tel2'),
            'Tel3' => $this->_req('Tel3'),
            'ZipCode' => $this->_req('ZipCode'),
            'Addr1' => $this->_req('Addr1'),
            'Addr2' => $this->_req('Addr2'),
            'MailRcvStatus' => ($this->_req('MailRcvStatus') == 'Y' ? 'Y' : 'N'),
            'SmsRcvStatus' => ($this->_req('SmsRcvStatus') == 'Y' ? 'Y' : 'N')
        ];

        if($this->memberFModel->setMember($MemIdx, $data) == false){
            show_alert('회원정보가 변경에 실패했습니다..', '/member/change/index/info/', false);
        }

        show_alert('회원정보가 변경되었습니다.', '/classroom/home/', false);
    }

    /**
     * 회원정보 핸드폰번호 변경
     * @return CI_Output
     */
    public function phone()
    {
        $enc_data = $this->_req('enc_data');

        $this->load->library('encrypt');
        $plainText = $this->encrypt->decode($enc_data);

        // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
        $data_arr = explode("^", $plainText);
        $phone = $data_arr[1];
        $MemIdx = $data_arr[3];

        if($this->session->userdata('mem_idx') != $MemIdx){
            return $this->json_error('정보가 일치하지 않습니다.');
        }

        // 전화번호 나누기
        $phone1 = substr($phone,0,3);
        $phone2 = substr($phone,3,-4);
        $phone3 = substr($phone,-4);

        // 데이타에 추가
        $input = [
            'Phone' => $phone,
            'Phone1' => $phone1,
            'Phone2' => $phone2,
            'Phone3' => $phone3
        ];

        if($this->memberFModel->setMemberPhone($MemIdx, $input) == false){
            return $this->json_error('핸드폰번호 변경에 실패했습니다.');
        }

        return $this->json_result(true, '핸드폰번호가 변경되었습니다.', null, [
            'phone1' => $phone1,
            'phone2' => $phone2,
            'phone3' => $phone3
        ]);
    }


    /**
     * 메일주소변경 메일인증처리
     * @return object|string
     */
    public function mailproc()
    {
        // 주소/인증키/인증메일
        $certKey = $this->_req('enc_data');

        // 검색쿼리
        $result = $this->memberFModel->getMailAuth([
            'EQ' => [
                'certKey' => $certKey
            ]]);

        if(empty($result) === true){
            // 검색정보 없음
            show_alert('인증정보가 올바르지 않습니다.', '/', false);
        }

        // 시간체크
        $now = strtotime(date('Y-m-d H:i:s')); // 지금 시간
        $sendDate = strtotime($result['MailSendDatm'].'+30 minutes'); // 보낸시간 더하기 30분

        // 인증시간 초과 보내고나서 30분
        if($now > $sendDate){
            show_alert('인증시간이 초과했습니다.', '/', false);
        }

        // 이미 사용한 인증키
        if($result['IsCert'] == 'Y'){
            show_alert('이미 사용한 인증코드입니다.', '/', false);
        }

        $mailArr = explode('@', $result['CertMail']);
        $mailId = $mailArr[0];
        $mailDomain = $mailArr[1];

        $data = [
            'Mail' => $result['CertMail'],
            'MailId' => $mailId,
            'MailDomain' => $mailDomain
        ];

        if($this->memberFModel->setMemberMail($result['MemIdx'], $data) == false){
            show_alert('메일주소변경이 실패하였습니다. 다시 시도해주십시요.', '/', false);
        }

        // 해당 인증 메일 사용 처리
        $result = $this->memberFModel->updateMailAuth($certKey);

        show_alert('메일주소변경이 처리되었습니다.', '/', false);
    }

    /**
     * 핸드폰번호변경 SMS
     * @return CI_Output
     */
    public function phonesms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_stat = $this->_req('sms_stat');
        $MemIdx = $this->session->userdata('mem_idx');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // SMS 인증 처리
        return $this->sendSms([
            'phone' => $phonenumber,
            'code' => $authcode,
            'id' => $MemIdx,
            'isnew' => $isNew
        ]);
    }

    /**
     * 이메일주소 변경 메일
     * @return CI_Output
     */
    public function mail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $idx = $this->session->userdata('mem_idx');

        $mail = $mailid.'@'.$maildomain;

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $mail,
            'MemIdx' => $idx,
            'typeccd' => 'UPDMAIL' // 회원가입인증메일
        ]);
    }



}