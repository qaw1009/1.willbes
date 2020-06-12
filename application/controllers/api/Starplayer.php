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
        $input = array_merge($this->_reqP(null), $this->_reqG(null));

        $event = element('event', $input); // 이벤트코드
        $user_id = element('user_id', $input); // 아이디
        $device_id = element('device_id', $input); // 기기고유번호
        $device_model = element('device_model', $input); // 기기종류
        $os_version = element('os_version', $input); // OS종류
        $app_version = element('app_version', $input); // 엡버전
        $state = element('state', $input); // 기기상태
        $date = element('date', $input); // 시간
        $online = element('online', $input); // online 시 yes offline 시 no

        $play_type = element('play_time', $input); // streaming / download
        $content_id = element('content_id', $input); // $id = "^{$AdminId}^{$AdminIdx}^{$ProdCode}^{$LecIdx}^{$UnitIdx}^";
        $content_url = element('content_url', $input); // 강의 URL

        $play_time = element('play_time', $input); // 동영상 재생 누적시간 (초)
        $play_time2 = element('play_time2', $input); // 동영상 재생 누적시간 ms
        $latest_playtime = element('latest_playtime', $input); // 이벤트사이의 누적시간 (초)
        $latest_playtime2 = element('latest_playtime2', $input); // 이벤트사이의 누적시간 ms
        $latest_ratio_playtime = element('latest_ratio_playtime', $input); // 배속을 이용한 값을 적용한 시간 (초)
        $loopback_playtime = element('loopback_playtime', $input); // 구간반복 유무에 관게없이 누적 (초)
        $content_duration = element('content_duration', $input); // 강의 사간
        $content_position = element('current_position', $input); // 현재 동영상 위치
        $play_ratio = element('play_ratio', $input); // 현재 배속정보

        $sum_latest_playtime = element('sum_latest_playtime', $input); // latest_playtime 합계 (초)
        $sum_latest_playtime2 = element('sum_latest_playtime2', $input); // latest_playtime 합계 ms

        $begin_content_date = element('begin_content_date', $input); // 앱 실행시 날짜 값

        switch($event){
            case 'begin_app':
                // 앱 실행
                $this->checkState($state); // 기기상태 체크
                return $this->StarplayerResult(false,'앱실행');
                break;

            case 'begin_content':
                // 동영상을 시작할때
                $this->checkState($state); // 기기상태 체크
            case 'download_begin_content':
                // 다운로드 시작할때 + 동영상시작할때
                $this->checkAuth($content_id);
                return $this->StarplayerResult(false,'재생권한확인완료');
                break;

            case 'playing_content':
            case 'end_content':

                return $this->StarplayerResult(false,'수강기록업데이트완료');
                break;


            case 'download_content':
                // 다운로드 완료 기록을 남길것인가
                return $this->StarplayerResult(false,'다운로드완료');
                break;

            case 'playing_ratio_status':
            case 'delete_content':
            case 'register_device_id':
            case 'unregister_device_id':
                // 나머지는 모두 그냥 정상 처리
                return $this->StarplayerResult(false,'정상처리');
                break;

            default;
                // 알수없는 이벤트는 에러
                return $this->StarplayerResult(true,'알수없는 이벤트입니다.');
        }
    }



    private function checkAuth($input)
    {
        // ^{$AdminId}^{$AdminIdx}^{$ProdCode}^{$LecIdx}^{$UnitIdx}^
        @$input_arr = explode('^', $input);

        $AdminId = $input_arr[1];
        $AdminIdx = $input_arr[2];
        $ProdCode = $input_arr[3];
        $LecIdx = $input_arr[4];
        $UnitIdx = $input_arr[5];

        if(empty($AdminId) == true
            || empty($AdminIdx) == true
            || empty($ProdCode) == true
            || empty($LecIdx) == true
            || empty($UnitIdx) == true ){
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
            return $this->StarplayerResult(true,'관리자정보가 없습니다.');
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

        if($this->unitModel->storeAdminViewLog([
                'Type' => 'M',
                'wAdminIdx' => $AdminIdx,
                'ProdCode' => $ProdCode,
                'wLecIdx' => $LecIdx,
                'wUnitIdx' => $UnitIdx,
                'RegIp' => $this->input->ip_address()
            ]) === false){
            return $this->StarplayerResult(true,'오류가 발생하였습니다.');
        };
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
            return $this->StarplayerResult(true,'관리자정보가 없습니다.');
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


    /**
     * 기기상태체크
     * @param string $state
     * @return CI_Output
     */
    private function checkState($state = '')
    {
        if($state != 'normal'){
            // 기기상태가 normal 이 아니면 재생 불가
            return $this->StarplayerResult(true, '루팅 혹은 탈옥 기기는 수강이 불가능합니다.', '', false);
        }
    }
}
