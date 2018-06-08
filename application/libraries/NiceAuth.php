<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NiceAuth extends \app\controllers\BaseController
{
    // 아이핀
    private $ipinSiteCode = "B931";     // IPIN 서비스 사이트 코드
    private $ipinSitePw = "63602849";   // IPIN 서비스 사이트 패스워드
    private $ipinReturnURL = ''; // 아이핀 결과 리턴

    // 간편 본인인증
    private $cpSiteCode = "BH221";				// NICE로부터 부여받은 사이트 코드
    private $cpSitePw = "kemNkokZwEBA";			// NICE로부터 부여받은 사이트 패스워드
    private $cpAuthType = "M";      		// 없으면 기본 선택화면, X: 공인인증서, M: 핸드폰, C: 카드
    private $cpPopupGubun 	= "N";			// Y : 취소버튼 있음 / N : 취소버튼 없음
    private $cpCustomize 	= "";			// 없으면 기본 웹페이지 / Mobile : 모바일페이지
    private $cpErrorURL = '';      // 실패시 이동 URL
    private $cpReturnURL = '';    // 성공시 이동 URL
    private $cpGender = "";                 // 기본 성별 설정

    function __construct()
    {
        $this->ipinReturnURL = 'https:'.app_url('/', 'www').'Auth/ipinRtn'; // 아이핀 결과 리턴
        $this->cpErrorURL = 'https:'.app_url('/', 'www').'Auth/cpErr';      // 실패시 이동 URL
        $this->cpReturnURL = 'https:'.app_url('/', 'www').'Auth/cpRtn_';    // 성공시 이동 URL
    }

    /*
     * 간편 본인인증 하기위애 나이스 서버에 전송할 데이타 암호화
     * @Param $sReturnType
     * @return Array
     */
    public function cpEnc($sReturnType)
    {
        $sRtnCode = 0;
        $returnURL = $this->cpReturnURL . $sReturnType;
        $sEncData = "";			// 암호화 된 데이타
        $sRtnMsg = "";			// 처리결과 메세지

        $reqseq = get_cprequest_no($this->cpSiteCode);

        // 세션에 번호 저장 해야하나?

        // 입력될 plain 데이타를 만든다.
        $plaindata = "7:REQ_SEQ" . strlen($reqseq) . ":" . $reqseq .
            "8:SITECODE" . strlen($this->cpSiteCode) . ":" . $this->cpSiteCode .
            "9:AUTH_TYPE" . strlen($this->cpAuthType) . ":". $this->cpAuthType .
            "7:RTN_URL" . strlen($returnURL) . ":" . $returnURL .
            "7:ERR_URL" . strlen($this->cpErrorURL) . ":" . $this->cpErrorURL .
            "11:POPUP_GUBUN" . strlen($this->cpPopupGubun) . ":" . $this->cpPopupGubun .
            "9:CUSTOMIZE" . strlen($this->cpCustomize) . ":" . $this->cpCustomize .
            "6:GENDER" . strlen($this->cpGender) . ":" . $this->cpGender ;

        $sEncData = get_encode_data($this->cpSiteCode, $this->cpSitePw, $plaindata);

        if( $sEncData == -1 ) {
            $sRtnMsg = "암/복호화 시스템 오류입니다.";
            $sEncData = "";
            $sRtnCode = $sEncData;

        } else if( $sEncData== -2 ) {
            $sRtnMsg = "암호화 처리 오류입니다.";
            $sEncData = "";
            $sRtnCode = $sEncData;

        } else if( $sEncData== -3 ) {
            $sRtnMsg = "암호화 데이터 오류 입니다.";
            $sEncData = "";
            $sRtnCode = $sEncData;

        } else if( $sEncData== -9 ) {
            $sRtnMsg = "입력값 오류 입니다.";
            $sEncData = "";
            $sRtnCode = $sEncData;
        }

        return [
            'rtnCode' => $sRtnCode,
            'rtnMsg' => $sRtnMsg,
            'encData' => $sEncData
        ];
    }

    /*
     * 간편 본인인증 복호화
     * @Param $sEncData
     * @return Array
     */
    public function cpDec($sEncData)
    {
        $sRtnCode = 0;
        $sRtnMsg = '';
        $requestnumber = '';
        $responsenumber = '';
        $authtype = '';
        $name = '';
        $birthdate = '';
        $gender = '';
        $nationalinfo = '';
        $dupinfo = '';
        $conninfo = '';
        $mobileno = '';
        $mobileco = '';

        if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {
            $sRtnCode = -1;
            $sRtnMsg = "입력 값 확인이 필요합니다 : ".$match[0];
            $enc_data = '';
        }

        if(base64_encode(base64_decode($enc_data))!=$enc_data) {
            $sRtnCode = -1;
            $sRtnMsg = "입력 값 확인이 필요합니다";
            $enc_data = '';
        }

        if ($enc_data != "") {
            $plaindata = get_decode_data($this->cpSiteCode, $this->cpSitePw, $sEncData);

            if ($plaindata == -1) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "암/복호화 시스템 오류";

            } else if ($plaindata == -4) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "복호화 처리 오류";

            } else if ($plaindata == -5) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "HASH값 불일치 - 복호화 데이터는 리턴됨";

            } else if ($plaindata == -6) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "복호화 데이터 오류";

            } else if ($plaindata == -9) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "입력값 오류";

            } else if ($plaindata == -12) {
                $sRtnCode = $plaindata;
                $sRtnMsg  = "사이트 비밀번호 오류";

            } else {
                $sRtnCode = 1;
                $requestnumber = $this->GetValue($plaindata , "REQ_SEQ");
                $responsenumber = $this->GetValue($plaindata , "RES_SEQ");
                $authtype = $this->GetValue($plaindata , "AUTH_TYPE");
                $name = $this->GetValue($plaindata , "UTF8_NAME"); //charset utf8 사용시 주석 해제 후 사용
                $birthdate = $this->GetValue($plaindata , "BIRTHDATE");
                $gender = $this->GetValue($plaindata , "GENDER");
                $nationalinfo = $this->GetValue($plaindata , "NATIONALINFO");	//내/외국인정보(사용자 매뉴얼 참조)
                $dupinfo = $this->GetValue($plaindata , "DI");
                $conninfo = $this->GetValue($plaindata , "CI");
                $mobileno = $this->GetValue($plaindata , "MOBILE_NO");
                $mobileco = $this->GetValue($plaindata , "MOBILE_CO");
            }
        }

        return [
            'rtnCode' => $sRtnCode,
            'rtnMsg' => $sRtnMsg,
            'reqnumber' => $requestnumber,
            'resnumber' => $responsenumber,
            'authtype' => $authtype,
            'name' => $name,
            'birthdate' => $birthdate,
            'gender' => $gender,
            'nationalinfo' => $nationalinfo,
            'dupinfo' => $dupinfo,
            'conninfo' => $conninfo,
            'mobileno' => $mobileno,
            'mobileco' => $mobileco
        ];
    }

    /*
     * 아이핀 암호화 암수
     * @Param $sReturnURL
     * @return Array
     */
    public function ipinEnc()
    {
        $sRtnCode = 0;
        $sEncData = "";			// 암호화 된 데이타
        $sRtnMsg = "";			// 처리결과 메세지
        $sRtnCode = 1;

        $sCPRequest = get_request_no($this->ipinSiteCode);
        $sEncData = get_request_data($this->ipinSiteCode, $this->ipinSitePw, $sCPRequest, $this->ipinReturnURL);

        if ($sEncData == -9){
            $sRtnCode = -1;
            $sRtnMsg = "입력값 오류 : 암호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
        } else {
            $sRtnCode = -1;
            $sRtnMsg = "변수에 암호화 데이타가 확인되면 정상, 정상이 아닌 경우 리턴코드 확인 후 NICE평가정보 개발 담당자에게 문의해 주세요.";
        }

        return [
            'rtnCode' => $sRtnCode,
            'rtnMsg' => $sRtnMsg,
            'encData' => $sEncData
        ];
    }

    /*
     * 아이핀 암호화 암수
     * @Param $sEncData
     * @return Array
     */
    public function ipinDec($sEncData)
    {
        $sRtnCode = 0;
        $sRtnMsg = '';
        $strVno = '';
        $strUserName = '';
        $strDupInfo = '';
        $strAgeInfo = '';
        $strGender = '';
        $strBirthDate = '';
        $strNationalInfo = '';

        if(preg_match('~[^0-9a-zA-Z+/=]~', $sEncData, $match)) {
            $sRtnCode = -1;
            $sRtnMsg = '입력 값 확인이 필요합니다.';
            $sEncData = '';
        }

        if(base64_encode(base64_decode($sEncData)) != $sEncData) {
            $sRtnCode = -1;
            $sRtnMsg = '입력 값 확인이 필요합니다.';
            $sEncData = '';
        }

        if ($sEncData != "") {
            $sDecData = get_response_data($this->ipinSiteCode, $this->ipinSitePw, $sEncData);

            if ($sDecData == -9) {
                $sRtnCode = -9;
                $sRtnMsg = "입력값 오류 : 복호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";

            } else if ($sDecData == -12) {
                $sRtnCode = -12;
                $sRtnMsg = "NICE평가정보에서 발급한 개발정보가 정확한지 확인해 보세요.";

            } else {
                $strResultCode	= $this->GetValue($sDecData, 'RESULT_CODE');			// 결과코드

                if ($strResultCode == 1) {
                    //$strCPRequest	    = $this->GetValue($sDecData, 'CPREQUESTNO');			// CP 요청번호
                    $sRtnCode           = 1;
                    $sRtnMsg            = "사용자 인증 성공";
                    $strVno      		= $this->GetValue($sDecData, 'VNUMBER');	// 가상주민번호 (13자리이며, 숫자 또는 문자 포함)
                    $strUserName		= $this->GetValue($sDecData, 'UTF8_NAME');	// 이름
                    $strDupInfo			= $this->GetValue($sDecData, 'DUPINFO');	// 중복가입 확인값 (64Byte 고유값)
                    $strAgeInfo			= $this->GetValue($sDecData, 'AGECODE');	// 연령대 코드 (개발 가이드 참조)
                    $strGender			= $this->GetValue($sDecData, 'GENDERCODE');	// 성별 코드 (개발 가이드 참조)
                    $strBirthDate		= $this->GetValue($sDecData, 'BIRTHDATE');	// 생년월일 (YYYYMMDD)
                    $strNationalInfo	= $this->GetValue($sDecData, 'NATIONALINFO');	// 내/외국인 정보 (개발 가이드 참조)

                } else {
                    $sRtnCode = -1;
                    $sRtnMsg = "리턴값 확인 후, NICE평가정보 개발 담당자에게 문의해 주세요. [$strResultCode]";
                }
            }

        } else {
            $sRtnCode = -1;
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

    /*
     * 간편본인인증에서 값 추출 함수
     * $str 추출할 데이타
     * $name 추출할 key 이름
     */
    public function GetValue($str, $name)
    {
        $pos1 = 0;  // length의 시작 위치
        $pos2 = 0;  // : 의 위치

        while( $pos1 <= strlen($str) ) {
            $pos2 = strpos($str , ":" , $pos1);
            $len = substr($str , $pos1 , $pos2 - $pos1);
            $key = substr($str , $pos2 + 1 , $len);
            $pos1 = $pos2 + $len + 1;

            if( $key == $name ) {
                $pos2 = strpos( $str , ":" , $pos1);
                $len = substr($str , $pos1 , $pos2 - $pos1);
                $value = substr($str , $pos2 + 1 , $len);
                return $value;
            } else {
                $pos2 = strpos( $str , ":" , $pos1);
                $len = substr($str , $pos1 , $pos2 - $pos1);
                $pos1 = $pos2 + $len + 1;
            }
        }
    }
}