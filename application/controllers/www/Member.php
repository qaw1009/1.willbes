<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $sSiteCode = "B931"; // IPIN 서비스 사이트 코드
    private $sSitePw = "63602849"; // IPIN 서비스 사이트 패스워드
    private $sModulePath = "/IPINClient"; // 하단내용 참조

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 로그인페이지
     */
    public function Login()
    {
        $this->load->view('member/login/form', [ ]);
    }

    /*
     * 회원가입 페이지
     */
    public function join()
    {
        $step = $this->_req('step');
     //   echo app_url('/', 'www');
        $ipinData = $this->ipinEnc('http:'.app_url('/', 'www').'/Member/_ipinRtn');

        if($step == 1){
            $this->load->view('member/join/step1', [ 'ipinData' => $ipinData]);
        } else if($step == 2){
            $this->load->view('member/join/step2', [ 'ipinData' => $ipinData]);
        }
    }

    /*
     * 회원가입처리페이지
     */
    public function joinProcess()
    {


        $this->load->view('member/join/step3', [ ]);
    }

    /*
     * 아이디찾기
     */
    public function findID()
    {

    }

    /*
     * 비밀번호 찾기
     */
    public function findPWD()
    {

    }

    

    
    /*
     * 아이핀 인증 결과 리턴 페이지
     */
    public function ipinRtn()
    {
        $viewURL = '';
        $sReservedParam1 = $this->_req('param_r1'); // 아이핀을 사용 구분
        $sReservedParam2 = $this->_req('param_r2');
        $sReservedParam3 = $this->_req('param_r3');
        $sResponseData = $this->_req('enc_data');

        if( preg_match('~[^0-9a-zA-Z+/=]~', $sResponseData, $match) ) {
            echo "입력 값 확인이 필요합니다";
            exit;
        }
        if( base64_encode(base64_decode($sResponseData))!= $sResponseData) {
            echo " 입력 값 확인이 필요합니다";
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam1, $match)) {
            echo "문자열 점검 : ".$match[0];
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam2, $match)) {
            echo "문자열 점검 : ".$match[0];
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam3, $match)) {
            echo "문자열 점검 : ".$match[0];
            exit;
        }


        if($sReservedParam1 === 'join'){
            // 회원가입 아이핀 리텀 페이지
            $viewURL = 'member/ipin/join';

        } else if($sReservedParam1 === 'find_id') {
            // 아이디찹기 아이핀 리턴페이지
            $viewURL = 'member/ipin/find_id';

        } else if($sReservedParam1 === 'find_pwd') {
            // 비빌번호찾기 아이핀 리턴 페이지
            $viewURL = 'member/ipin/find_pwd';
            
        }

        $this->load->view($viewURL, [ 'encData' => $sResponseData ]);
    }

    /*
     * ipin 암호화 암수
     * @Param $sReturnURL
     * @return Array
     */
    private function ipinEnc($sReturnURL)
    {
        $sCPRequest = `$this->sModulePath SEQ $this->sSiteCode`;
        $sEncData = "";			// 암호화 된 데이타
        $sRtnMsg = "";			// 처리결과 메세지
        $sEncData = `$this->sModulePath REQ $this->sSiteCode $this->sSitePw $sCPRequest $sReturnURL`;
        $sRtnCode = 1;

        if ($sEncData == -9){
            $sRtnCode = 0;
            $sRtnMsg = "입력값 오류 : 암호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
        } else {
            $sRtnCode = 0;
            $sRtnMsg = "변수에 암호화 데이타가 확인되면 정상, 정상이 아닌 경우 리턴코드 확인 후 NICE평가정보 개발 담당자에게 문의해 주세요.";
        }

        return [
            'rtnCode' => $sRtnCode,
            'rtnMsg' => $sRtnMsg,
            'encData' => $sEncData
        ];
    }

    /*
     * ipin 암호화 암수
     * @Param $sEncData
     * @return Array
     */
    private function ipinDec($sEncData)
    {

        if(preg_match('~[^0-9a-zA-Z+/=]~', $sEncData, $match)) {
            $sRtnCode = 0;
            $sRtnMsg = '입력 값 확인이 필요합니다.';
            $sEncData = '';
        }

        if(base64_encode(base64_decode($sEncData)) != $sEncData) {
            $sRtnCode = 0;
            $sRtnMsg = '입력 값 확인이 필요합니다.';
            $sEncData = '';
        }

        if ($sEncData != "") {
            $sDecData = `$this->sModulePath RES $this->sSiteCode $this->sSitePw $sEncData`;

            if ($sDecData == -9) {
                $sRtnMsg = "입력값 오류 : 복호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
            } else if ($sDecData == -12) {
                $sRtnMsg = "NICE평가정보에서 발급한 개발정보가 정확한지 확인해 보세요.";
            } else {

                $arrData = split("\^", $sDecData);
                $iCount = count($arrData);

                if ($iCount >= 5) {

                    $strResultCode	= $arrData[0];			// 결과코드
                    if ($strResultCode == 1) {
                        $strCPRequest	= $arrData[8];			// CP 요청번호

                        if ($sCPRequest == $strCPRequest) {
                            $sRtnCode           = 1;
                            $sRtnMsg            = "사용자 인증 성공";
                            $strVno      		= $arrData[1];	// 가상주민번호 (13자리이며, 숫자 또는 문자 포함)
                            $strUserName		= $arrData[2];	// 이름
                            $strDupInfo			= $arrData[3];	// 중복가입 확인값 (64Byte 고유값)
                            $strAgeInfo			= $arrData[4];	// 연령대 코드 (개발 가이드 참조)
                            $strGender			= $arrData[5];	// 성별 코드 (개발 가이드 참조)
                            $strBirthDate		= $arrData[6];	// 생년월일 (YYYYMMDD)
                            $strNationalInfo	= $arrData[7];	// 내/외국인 정보 (개발 가이드 참조)

                        } else {
                            $sRtnMsg = "CP 요청번호 불일치 : 세션에 넣은 $sCPRequest 데이타를 확인해 주시기 바랍니다.";
                        }
                    } else {
                        $sRtnMsg = "리턴값 확인 후, NICE평가정보 개발 담당자에게 문의해 주세요. [$strResultCode]";
                    }

                } else {
                    $sRtnMsg = "리턴값 확인 후, NICE평가정보 개발 담당자에게 문의해 주세요.";
                }

            }
        } else {
            $sRtnMsg = "처리할 암호화 데이타가 없습니다.";
        }

        return [
            'rtnCode' =>$sRtnCode,
            'rtnMsg' => $sRtnMsg,
            'vno' => $strVno,
            'userName' => $strUserName,
            'dupInfo' => $strDupInfo,
            'ageInfo' => $strAgeInfo,
            'Gender' => $strGender,
            'birthDate' => $strBirthDate,
            'nationalInfo' => $strNationalInfo
        ];
    }
}
