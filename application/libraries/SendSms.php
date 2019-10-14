<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendSms
{
    private $_CI;
    /**
     * @var \CI_DB_query_builder
     */
    private $_db;

    private $_title_max_length = '40';
    private $_msg_max_length = '54';    //발송메세지 바이트 최대 길이
    private $_table = [
        'sms' => 'SMS_MSG',
        'mms' => 'MMS_MSG',
        'KFT' => 'KKT_MSG',
        'KAT' => 'KKT_MSG'
    ];
    private $_yellowid_key = '2504b92410349779c13e6377b2638dcbd3d5b4ef'; // 카카오 발신 프로필 키 (드림라인 영업 담당자를 통해 지급)

    public function __construct($database = 'dreamline')
    {
        $this->_CI = &get_instance();
        $this->_db = $this->_CI->load->database($database, true);
    }

    public function __destruct()
    {
        $this->_db->close();
    }

    /**
     * SMS 메세지 발송 (2019-09-19 이전, TODO 제거)
     * @param $send_phone [발송번호 : 배열 or 특정번호]
     * @param $send_msg [발송메시지]
     * @param $send_call_center [콜백번호]
     * @param $send_date [발송일 : 예약 발송일 경우 전송할 날짜 입력]
     * @param $send_title [발송제목 : MMS 경우에 한함]
     * @return array|bool
     */
    public function send($send_phone, $send_msg, $send_call_center, $send_date = null, $send_title = '윌비스 안내 메세지')
    {
        try {
            $result = 0;
            if (empty($send_phone) === true || empty($send_msg) === true || empty($send_call_center) === true) {
                throw new \Exception('필수 데이터 누락.');
            }

            list($table, $data) = $this->_send_data($send_phone, $send_msg, $send_call_center, $send_date, $send_title);
            if($data) $result = $this->_db->insert_batch($table, $data);
            if ($result <= 0) {
                throw new \Exception('발송 실패');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 발송데이터 셋팅 (2019-09-19 이전, TODO 제거)
     * @param $send_phone
     * @param $send_msg
     * @param $send_call_center
     * @param $send_date
     * @param $send_title
     * @return array
     */
    private function _send_data($send_phone, $send_msg, $send_call_center, $send_date, $send_title)
    {
        $this_table = '';
        $data = [];
        $set_send_phone = $send_phone;
        if (is_array($send_phone) === false) {
            $set_send_phone = array($send_phone);
        }

        if (empty($send_date) === true) {
            $set_send_date = date('Y-m-d H:i:s');
        } else {
            $set_send_date = $send_date;
        }

        if (mb_strlen($send_title) <= $this->_title_max_length) {
            //byte 체크
            if (mb_strlen($send_msg) > $this->_msg_max_length) {
                $this_table = $this->_table['mms'];
                foreach ($set_send_phone as $key => $val) {
                    $data[] = [
                        'SUBJECT' => $send_title,
                        'PHONE' => $val,
                        'CALLBACK' => $send_call_center,
                        'STATUS' => '0',
                        'REQDATE' => $set_send_date,
                        'MSG' => $send_msg,
                        'EXPIRETIME' => '0',
                        'TYPE' => '0'
                    ];
                }
            } else {
                $this_table = $this->_table['sms'];
                foreach ($set_send_phone as $key => $val) {
                    $data[] = [
                        'TR_SENDDATE' => $set_send_date,
                        'TR_SENDSTAT' => '0',
                        'TR_MSGTYPE' => '0',
                        'TR_PHONE' => $val,
                        'TR_CALLBACK' => $send_call_center,
                        'TR_MSG' => $send_msg,
                        'TR_ORG_CALLBACK' => $send_call_center
                    ];
                }
            }
        }
        return array($this_table, $data);
    }

    /**
     * 카카오 메세지 발송 (2019-09-19 이후)
     * @param $send_phone [발송번호 : 배열 or 특정번호]
     * @param $send_msg [발송메시지]
     * @param $send_call_center [콜백번호]
     * @param $send_date [발송일 : 예약 발송일 경우 전송할 날짜 입력]
     * @param $kakao_msg_type [카카오톡 메세지 타입: KFT(친구톡), KAT(알림톡)]
     * @param $tmpl_cd [알림톡 템플릿 코드]
     * @param $send_idx [lms_crm_send.SendIdx]
     * @return array|bool
     */
    public function sendKakao($send_phone, $send_msg, $send_call_center, $send_date = null, $kakao_msg_type = 'KFT', $tmpl_cd = null, $send_idx = null)
    {
        try {
            $result = 0;

            if (empty($kakao_msg_type) === true || empty($send_phone) === true || empty($send_msg) === true || empty($send_call_center) === true) {
                throw new \Exception('필수 데이터 누락.');
            }

            list($table, $data) = $this->_setSendKakaoData($send_phone, $send_msg, $send_call_center, $send_date, $kakao_msg_type, $tmpl_cd, $send_idx);
            if($data) $result = $this->_db->insert_batch($table, $data);
            if ($result <= 0) {
                throw new \Exception('발송 실패');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 발송데이터 셋팅 (2019-09-19 이후)
     * @param $send_phone
     * @param $send_msg
     * @param $send_call_center
     * @param $send_date
     * @param $kakao_msg_type [카카오톡 메세지 타입: KFT(친구톡), KAT(알림톡)]
     * @param $tmpl_cd [알림톡 템플릿 코드]
     * @param $send_idx [lms_crm_send.SendIdx]
     * @return array
     * @throws Exception
     */
    private function _setSendKakaoData($send_phone, $send_msg, $send_call_center, $send_date, $kakao_msg_type, $tmpl_cd = null, $send_idx = null)
    {
        $this_table = $resend = $sms_msg = $etc2 = '';
        $data = [];
        $kakao_msg_type = (empty($kakao_msg_type) === false ? strtoupper($kakao_msg_type) : null);
        $set_send_phone = ( is_array($send_phone) === false ? array($send_phone) : $send_phone );
        $set_send_msg = ( is_array($send_msg) === false ? array($send_msg) : $send_msg );
        $set_send_date = ( empty($send_date) === true ? date('Y-m-d H:i:s') : $send_date );
        $set_send_call_center = ( empty($send_call_center) === true ? $this->config->item('wca_tel') : $send_call_center );

        switch ($kakao_msg_type) {
            case 'KFT':
                $this_table = $this->_table['KFT'];
                break;
            case 'KAT':
                $this_table = $this->_table['KAT'];
                if(empty($tmpl_cd) === true) throw new \Exception('알림톡일 경우 템플릿 코드가 필요합니다.');
                break;
            default:
                throw new \Exception('전송구분 값이 잘못 되었습니다.');
                break;
        }

        foreach ($set_send_phone as $key => $val) {

            //장문 단문 구분
            if (mb_strlen($set_send_msg[$key]) > $this->_msg_max_length) {
                $resend = 'LMS';
            } else {
                $resend = 'SMS';
                $sms_msg = $set_send_msg[$key];
            }

            $data[] = [
                'TYPE' => $kakao_msg_type,
                'RESEND' => $resend,
                'YELLOWID_KEY' => $this->_yellowid_key,
                'TMPL_CD' => $tmpl_cd,
                'MSG' => $set_send_msg[$key],
                'SMS_MSG' => $sms_msg,
                'CHAT_BUBBLE_BUTTON1' => null,
                'CHAT_BUBBLE_BUTTON2' => null,
                'CHAT_BUBBLE_BUTTON3' => null,
                'CHAT_BUBBLE_BUTTON4' => null,
                'CHAT_BUBBLE_BUTTON5' => null,
                'IMAGE_URL' => null,
                'IMAGE_LINK' => null,
                'PHONE' => $val,
                'CALLBACK' => $set_send_call_center,
                'ORG_CALLBACK' => null,
                'BILL_ID' => null,
                'STATUS' => 0,
                'REQDATE' => $set_send_date,
                'SENTDATE' => null,
                'RSLTDATE' => null,
                'REPORTDATE' => null,
                'TERMINATEDDATE' => null,
                'RSLT' => null,
                'RSLT_RESEND' => null,
                'ID' => null,
                'POST' => null,
                'ETC1' => $send_idx,
                'ETC2' => $this->getKakaoLogEtc2(),
                'ETC3' => null,
                'ETC4' => null,
                'ETC5' => null,
                'ETC6' => null,
                'ETC7' => null,
                'ETC8' => null,
                'ETC9' => null,
                'ETC10' => null,
                'AD_FLAG' => 'N'
            ];
        }

        return array($this_table, $data);
    }

    /**
     * 알림톡 발송 로그 etc2 컬럼 셋팅
     * @return mixed
     */
    public function getKakaoLogEtc2() {
        $etc2 = null;
        switch (ENVIRONMENT) {
            case 'local': $etc2 = 'development'; break;
            case 'development': $etc2 = 'development'; break;
            default: $etc2 = 'production'; break;
        }
        return $etc2;
    }

}