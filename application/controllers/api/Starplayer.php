<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Starplayer extends \app\controllers\BaseController
{
    protected $models = array('_lcms/auth/login', '_wbs/sys/admin', '_lms/product/base/professor', '_lms/crm/send/sms', '_wbs/cms/lecture', '_wbs/cms/unit');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 관리자 스타플레이어 API
     */
    public function Admin()
    {
        $this->StarplayerResult(false, '', '', false);
    }


    /**
     * 관리자 스타플레이어 재생 정보 반환
     * @return CI_Output
     */
    public function getMobileAdmin()
    {
        $AdminId = $this->_req('i');
        $AdminIdx = $this->_req('x');
        $ProdCode = $this->_req('p');
        $LecIdx = $this->_req('l');
        $UnitIdx = $this->_req('u');
        $Quility = $this->_req('q');

        if(empty($AdminId) == true
            || empty($AdminIdx) == true
            || empty($ProdCode) == true
            || empty($LecIdx) == true
            || empty($UnitIdx) == true
            || empty($Quility) == true ){
            return $this->StarplayerResult(true,'정보가 정확하지 않습니다.');
        }

        // 관리자 아이디 검증
        $admin = $this->adminModel->findAdmin('wRoleIdx', [
                'EQ' => [
                    'wAdminId' => $AdminId,
                    'wAdminIdx' => $AdminIdx
                ]
            ]
        );
        if(empty($admin) === true){
            return $this->StarplayerResult(true,'사용자정보가 없습니다.');
        }

        // 강의 데이타 읽어오기
        $data = $this->lectureModel->findLectureForModify($LecIdx);
        if(empty($data) === true){
            return $this->StarplayerResult(true,'강의정보가 없습니다.');
        }

        $unitdata = $this->unitModel->getUnit($UnitIdx);
        if(empty($unitdata) == true){
            return $this->StarplayerResult(true,'회차정보가 없습니다.');
        }
        $unitdata = $unitdata[0];

        switch($Quility){
            case 'WD':
                $filename = $unitdata['wWD'];
                break;

            case 'HD':
                $filename = $unitdata['wHD'];
                break;

            case 'SD':
                $filename = $unitdata['wSD'];
                break;
        }

        // 모든 경로가 존재 없을때
        if(empty($filename) === true){
            return $this->StarplayerResult(true,'강의파일이 없습니다.');
        }

        $url = $this->clearUrl($data['wMediaUrl'].'/'.$filename);

        $id = "^{$AdminId}^{$AdminIdx}^{$ProdCode}^{$LecIdx}^{$UnitIdx}^";

        $XMLString  = "<?xml version='1.0' encoding='UTF-8' ?>";
        $XMLString .= "<axis-app>";
        $XMLString .= "<security>true</security>"; // 보안설정
        $XMLString .= "<action-type>streaming</action-type>"; // 스트리밍/다운로드
        $XMLString .= "<user-id><![CDATA[".$AdminId."(A)]]></user-id>"; // 회원 아이디
        $XMLString .= "<content>";
        $XMLString .= "<id><![CDATA[".$id."]]></id>";
        $XMLString .= "<url><![CDATA[".$url."]]></url>";
        $XMLString .= "<title><![CDATA[".clean_string($unitdata['wUnitName'])."]]></title>";
        $XMLString .= "<position>0</position>";
        $XMLString .= "</content>";
        $XMLString .= "</axis-app>";

        $this->load->library('Crypto', ['license' => config_item('starplayer_license_admin')]);

        echo $this->crypto->encrypt($XMLString);
        exit(0);
    }


    /**
     * 모바일 리턴 코드 만들기
     * @param $error
     * @param string $msg
     * @param string $debug
     * @param bool $isApp
     * @return CI_Output
     */
    private function StarplayerResult($error, $msg ='', $debug = '', $isApp = false)
    {
        if($isApp == true){
            if($error == true){
                echo '{';
                echo '"result":"error",';
                echo '"message":"'.$msg.'"';
                echo '}';
            } else {
                echo '{';
                echo '"result":"success",';
                echo '"message":"'.$msg.'"';
                echo '}';
            }

        } else {
            if($error == true){
                $error = 1;
            } else if($error == false){
                $error = 0;
            }

            echo("<axis-app>");
            echo("<error>".$error."</error>");
            echo("<message>".$msg."</message>");
            echo("<debug>".$debug."</debug>");
            echo("</axis-app>");
        }

        exit ;
    }

    /** URL 에서 // 를 제거하기 위해서
     * @param $str
     * @return string
     */
    private function clearUrl($str)
    {
        $protocol_arr = ['mms://', 'http://', 'https://'];
        $protocol = '';
        $i = 0;

        // 앞에 protocol 제거 하고 저장
        foreach($protocol_arr as $key){
            $str = str_replace($key, '', $str, $i);
            if($i > 0){
                $protocol = $key;
                break;
            }
        }

        // 프로코톨이 겁색이 안되었을경우 기본 http로 설정
        if($protocol == ""){
            $protocol = 'http://';
        }

        // 공백제거
        $str = str_replace(' ', '', $str, $i);

        do {
            $str = str_replace('//', '/', $str, $i);
        } while($i > 0);

        return $protocol.$str;
    }
}
