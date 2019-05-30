<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseMember extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'memberF', 'pointF','classroomF', 'couponF', 'mocktest/mockExam', 'order/orderF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_urlFromMailAuthCcd = [
        '662001' => '/member/join',
        '662002' => '/member/findid',
        '662003' => '/member/findpwd',
        '662004' => '/member/sleep',
        '662005' => '/'
    ];

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 사용가능한 아이디 인지 검색
     * @return CI_Output
     */
    public function checkID()
    {
        // 가입페이지에서 호출
        $MemId = $this->_req('MemId');
        // 통합회원 전환페이지에서 호출
        $ChangeId = $this->_req('ChangeId');

        if(empty($MemId) === true){
            $MemId = $ChangeId;
        }

        // 호출 아이디 없으면 사용불가 반환
        if(empty($MemId) === true){
            echo "0001";
            exit(0);
        }

        // 검색 쿼리
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemId' => $MemId
            ]
        ]);

        // 해당 아이디가 존재하면 사용 불가 반환
        if($count > 0){
            echo "0001";
            exit(0);

        } else {
            echo "0000";
            exit(0);
        }
    }

    /**
     * 핸드폰 번호로 인증번호를 보내거나 해당 핸드폰으로 보낸 인증번호가 맞는지 체크
     */
    public function sendSms($param = [])
    {
        $phone = element('phone', $param);
        $code = element('code', $param);
        $name = element('name', $param);
        $id = element('id', $param);
        $new = element('isnew', $param);

        // 전화번호체크
        if (empty($phone) === true) {
            return $this->json_error("전화번호를 정확하게 입력해주십시요.");

        } else {
            // 전화번호 패턴 체크
            $pattern = "^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[1-9][0-9]{7})$^";
            if(!preg_match($pattern, $phone)){
                // 전화번호 패턴 오류
                return $this->json_error("정상적인 휴대폰번호가 아닙니다.");
            }
        }

        if($new == true) {
            // 새로인증시작 코드이면
            // 인증번호 생성
            $this->load->helper('string');
            $code = random_string('numeric', 6);
            $limit_date = Date("Y/m/d H:i:s", strtotime('+3 minutes '));

            //세션에 인증코드와 인증 시간을 기록한다.
            $this->session->set_tempdata('sms_phone', $phone, 180);
            $this->session->set_tempdata('sms_code', $code, 180);
            $this->session->set_tempdata('sms_name', $name, 180);
            $this->session->set_tempdata('sms_id', $id, 180);

            $this->load->library('sendSms');

            if($this->sendsms->send($phone, '윌비스 본인확인 번호입니다. ['.$code.']를 입력해주십시요.', '1544-5006') === false){
                return $this->json_error('메세지 발송에 실패했습니다.\n다시한번 시도해 주십시요.');
            }

            return $this->json_result(true,"인증번호를 발송하였습니다.",
                null, [
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
                empty($this->session->tempdata('sms_code')) === true  ) {
                return $this->json_error("입력시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 전화번호가 일치하는지 체크
            if($phone != $sms_phone){
                return $this->json_error("인증번호를 발송한 전화번호와 일치하지 않습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 입력코드가 정확한지 체크
            if($code == $sms_code){
                // 인증코드가 일치하면 전화번호와 이름을 암호화 해서 넘긴다.`

                // 메세지전송

                // 비밀번호 찾기를 위해 아이디 필드 추가
                // 0000-00-00 00:00:00^전화번호^이름^회원아이디^0000-00-00 00:00:00
                $var_data = Date('YmdHis')."^{$sms_phone}^{$sms_name}^{$sms_id}^".Date('YmdHis');
                $this->load->library('encrypt');
                $enc_data = $this->encrypt->encode($var_data);
                return $this->json_result(true,"인증번호가 확인되었습니다.",
                    null, [
                        'err_cd' => 0,
                        'enc_data' => $enc_data,
                        'phone_number' => $sms_phone
                    ]);

            } else {
                // 인증번호 불일치
                return $this->json_error("인증번호가 일치하지 않습니다. 확인후 다시 입력해주세요.");
            }

        }
    }

    /**
     * 인증 이메일 보내기
     * @param array $param
     * @return CI_Output
     */
    public function sendMail($param = [])
    {
        $typeccd = element('typeccd', $param);
        $mail = element('mail', $param);
        $name = element('name', $param);
        $id = element('id', $param);
        $MemIdx = element('MemIdx', $param);

        // 이메일체크
        if(empty($mail) === true){
            return $this->json_error("이메일 주소를 입력해주십시요.");

        } else {
            // 이메일 패턴체크
            $pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
            if(!preg_match($pattern, $mail)){
                // 전화번호 패턴 오류
                return $this->json_error("이메일 주소를 정확하게 입력해주십시요.");
            }
        }

        // 인증키 암호화 
        // 0000-00-00 00:00:00^메일주소^이름^회원아이디^0000-00-00 00:00:00
        $var_data = Date('YmdHis')."^{$mail}^{$name}^{$id}^".Date('YmdHis');
        $this->load->library('encrypt');
        $enc_data = $this->encrypt->encode($var_data);

        // 전송한인증메일 정보 DB저장
        $result = $this->memberFModel->storeMailAuth([
            'MemIdx' => $MemIdx,
            'CertKey' => $enc_data,
            'CertMail' => $mail,
            'MailCertTypeCcd' => $typeccd
        ]);

        // 메일 발송 실패
        if($result === false){
            return $this->json_error("메일발송에 실패했습니다. 다시 시도해주십시요.");
        }

        // 성공리턴
        return $this->json_result(true, "인증메일을 발송했습니다.\n발송된 메일의 인증링크를 30분 안에 클릭해 주세요. ");
    }





}

