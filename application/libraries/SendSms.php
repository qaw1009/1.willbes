<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendSms
{
    protected $_CI;
    /**
     * @var \CI_DB_query_builder
     */
    protected $_db;

    private $_title_max_length = '40';
    private $_msg_max_length = '54';    //발송메세지 바이트 최대 길이
    private $_table = [
        'sms' => 'SMS_MSG',
        'mms' => 'MMS_MSG'
    ];

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
     * 발송데이터 셋팅
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
}