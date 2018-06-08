<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 아이핀이나 핸드폰 본인인증등을 리턴 받는 컨트롤러
 */
class Auth extends \app\controllers\FrontController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ipinRtn()
    {
        $viewURL = '';
        $sReservedParam1 = $this->_req('param_r1'); // 아이핀을 사용 구분
        $sReservedParam2 = $this->_req('param_r2');
        $sReservedParam3 = $this->_req('param_r3');
        $sResponseData = $this->_req('enc_data');

        if( preg_match('~[^0-9a-zA-Z+/=]~', $sResponseData, $match) ) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다']);
            exit;
        }
        if( base64_encode(base64_decode($sResponseData))!= $sResponseData) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다']);
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam1, $match)) {
            $this->load->view('auth/Error', ['msg' => "문자열 점검 : ".$match[0] ]);
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam2, $match)) {
            $this->load->view('auth/Error', ['msg' => "문자열 점검 : ".$match[0] ]);
            exit;
        }
        if( preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam3, $match)) {
            $this->load->view('auth/Error', ['msg' => "문자열 점검 : ".$match[0] ]);
            exit;
        }

        // 회원가입 아이핀 리텀 페이지
        if( $sReservedParam1 == ''){
            $viewURL = 'auth/Error';
            $sResponseData = '입력값이 잘못 되었습니다.';

        } else {
            $viewURL = 'auth/ipin_' . $sReservedParam1;

        }

        $this->load->view($viewURL, [
            'sResponseData' => $sResponseData,
            '$sReservedParam1' => $sReservedParam1,
            '$sReservedParam2' => $sReservedParam2,
            '$sReservedParam3' => $sReservedParam3
        ]);
    }

    /*
     * 간편인증 실패 페이지
     */
    public function cpErr()
    {
        $this->load->library('NiceAuth');
        $enc_data = $this->_req('EncodeData');

        if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다'.$match[0]]);
            exit;
        }

        if(base64_encode(base64_decode($enc_data))!=$enc_data) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다']);
            exit;
        }

        if ($enc_data == "") {
        } else {

            $plaindata = $this->niceauth->cpDec($enc_data); // 복호화

            if ($plaindata['rtnCode'] != 0) {
                $this->load->view('auth/Error', [
                    'msg' => $plain]);
                $returnMsg  = "암/복호화 시스템 오류";

            } else if ($plaindata == -4) {
                $returnMsg  = "복호화 처리 오류";

            } else if ($plaindata == -5) {
                $returnMsg  = "HASH값 불일치 - 복호화 데이터는 리턴됨";

            } else if ($plaindata == -6) {
                $returnMsg  = "복호화 데이터 오류";

            } else if ($plaindata == -9) {
                $returnMsg  = "입력값 오류";

            } else if ($plaindata == -12) {
                $returnMsg  = "사이트 비밀번호 오류";

            } else {
                $requestnumber = $this->niceauth->GetValue($plaindata , "REQ_SEQ");
                $errcode = $this->niceauth->GetValue($plaindata , "ERR_CODE");
                $authtype = $this->niceauth->GetValue($plaindata , "AUTH_TYPE");

            }
        }

        $this->load->view('auth/cp_error', [
            'msg' => $returnMsg,
            'reqnum' => $requestnumber,
            'errcode' => $errcode,
            'authtype' => $authtype
        ]);
    }

    /*
     * 간편 본인인증 성공후 반환 경로
     */
    public function cpRtn_join()
    {
        $enc_data = $this->_req('EncodeData');

        if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다 : ' . $match[0]]);
            exit;
        }

        if(base64_encode(base64_decode($enc_data))!=$enc_data) {
            $this->load->view('auth/Error', ['msg' => '입력 값 확인이 필요합니다 : ' . $match[0]]);
            exit;
        }

        $this->load->view('auth/cp_join', [ 'encData' => $sResponseData ]);
    }
}