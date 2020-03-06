<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsFModel extends WB_Model
{
    private $_CI;
    private $_send_type = 'sms';
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_sms';
    private $_table_kakao_template = 'lms_crm_kakao_template';

    // 메세지 발송 치환 정보
    private $_sms_send_content_replace = [
        '{{name}}' => 'mem_name',
        '{{id}}' => 'mem_id'
    ];

    // 카카오 타입. (KAKAO_MSG.TYPE)
    private $_kakao_msg_type = [
        'KFT' => '638003',
        'KAT' => '638004'
    ];

    // 메세지 발송 종류 (SMS,쪽지,메일)
    private $_send_type_ccd = [
        'sms' => '641001',
        'message' => '641002',
        'mail' => '641003'
    ];

    // 메시지 상태 (성공,예약,취소)
    private $_send_status_ccd = [
        '0' => '639001',
        '1' => '639002',
        '2' => '639003'
    ];

    // 메시지 발송 옵션 (즉시발송, 예약발송)
    private $_send_option_ccd = [
        '0' => '640001',
        '1' => '640002'
    ];

    // 메시지 발송 옵션 (SMS, LMS, 친구톡, 알림톡)
    private $_send_text_length_ccd = [
        '0' => '638001',
        '1' => '638002',
        '2' => '638003',
        '3' => '638004'
    ];

    // 상품발송 문자 내용 치환 정보
    private $_product_send_sms_msg_replace = [
        '{{이벤트수강인증코드}}' => 'EventCertCode'
    ];

    public function __construct()
    {
        parent::__construct('lms');
        $this->_CI = &get_instance();
        $this->load->library('sendSms');
        $this->load->loadModels(['_lms/sys/code']);
    }

    public function __destruct()
    {
    }

    /**
     * 카카오 발송 데이터 등록 (2019-09-19 이후)
     * @param $mem_phone
     * @param $send_content
     * @param $from_phone
     * @param $send_date
     * @param $kakao_msg_type
     * @param $send_content_value
     * @param $tmpl_cd
     * @return boolean
     */
    public function addKakaoMsg($mem_phone, $send_content, $from_phone = null, $send_date = null, $kakao_msg_type = 'KFT', $tmpl_cd = null, $send_content_value = null)
    {
        $arr_mem_phone = ( is_array($mem_phone) === false ? array($mem_phone) : $mem_phone );
        if(empty($send_date) === false){
            //TODO
        }

        $param = [
            'send_type' => 1,                               // 1:개별발송, 2:일괄발송(엑셀)
            'kakao_msg_type' => $kakao_msg_type,            // KFT:친구톡, KAT:알림톡
            'site_code' => 2000,
            'send_pattern_ccd' => 637003,                   // 637001:일반발송, 637002:예약발송, 637003:자동발송
            'cs_tel_ccd' => 706001,                         // 706001:WCA, 706002:경찰학원
            'tmpl_cd' => $tmpl_cd,                          // 알림톡 템플릿 코드
            'send_content' => $send_content,
            'send_content_value' => $send_content_value,    //데이터 치환 배열
            'mem_name' => array(),
            'mem_phone' => $arr_mem_phone,
            'send_option_ccd' => 640001,                    // 640001:즉시발송, 640002:예약발송
            'send_datm_day' => null,
            'send_datm_h' => null,
            'send_datm_m' => null,
            'reg_admin_idx' => 1000,                        //자동문자는 발송 등록 관리자가 없음
            'from_phone' => $from_phone
        ];
        list($result, $return_count) = $this->addKakao($param);

        if($return_count == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 카카오 발송 데이터 등록 (2019-09-19 이후)
     * @param array $formData
     * @return array
     */
    public function addKakao($formData = [])
    {
        $this->_conn->trans_begin();
        try {
            $set_send_data_count = 0;

            // *** 메세지 치환 ***
            $arr_replace_content = array(); // 치환된 메세지가 담길 배열
            switch ($formData['kakao_msg_type']) {
                case 'KFT' :
                    foreach($formData['mem_phone'] as $i => $i_val) {
                        if(empty($i_val) === false) {
                            $temp_content = $formData['send_content'];
                            // {{name}} 사용자 이름 치환
                            foreach($this->_sms_send_content_replace as $j => $j_val) {
                                if(strpos($temp_content, $j) !== false) {
                                    $temp_content = str_replace($j, $formData[$j_val][$i], $temp_content);
                                }
                            }
                            array_push($arr_replace_content, $temp_content);
                        }
                    }
                    break;
                case 'KAT' :
                    $tmpl_msg = $arr_send_content_value = null;

                    // 템플릿 조회
                    $tmpl_data = $this->findKakaoTemplate(null, $formData['tmpl_cd']);
                    if(empty($tmpl_data) === true || empty($tmpl_data['Msg']) === true){
                        throw new \Exception('템플릿코드가 잘못 되었습니다.'); break;
                    }

                    // 치환할 변수가 넘어왔을 경우
                    if(empty($formData['send_content_value']) === false) {
                        $arr_send_content_value = ( is_array($formData['send_content_value']) === false ? array($formData['send_content_value']) : $formData['send_content_value'] );
                        $formData['send_content'] = $tmpl_msg = $tmpl_data['Msg'];
                    }

                    foreach($formData['mem_phone'] as $i => $i_val) {
                        if(empty($i_val) === false){
                            if(empty($arr_send_content_value) === false) {
                                $temp_content = $tmpl_msg;
                                foreach($arr_send_content_value as $j => $j_val) {
                                    if(empty($j_val) === false) {
                                        foreach ($j_val as $k => $k_val) {
                                            $temp_content = str_replace($k, (empty($k_val) === false ? $k_val : '-'), $temp_content);
                                        }
                                        array_push($arr_replace_content, $temp_content);
                                    }
                                }
                            } else {
                                // 넘어온 치환 변수 배열이 없을 경우
                                array_push($arr_replace_content, $formData['send_content']);
                            }
                        }
                    }
                    break;
                default :
                    throw new \Exception('전송구분 값이 잘못 되었습니다.');
                    break;
            }

            list($set_send_data_phone, $set_send_data_name, $set_send_data_msg, $set_send_data_count) = $this->_getSendDetailData($formData['mem_phone'], $formData['mem_name'], $arr_replace_content);
            $inputData = $this->_setInputData($formData, $this->_send_type, $this->_send_type_ccd, $this->_send_status_ccd, $this->_send_option_ccd, $this->_send_text_length_ccd);

            if ($formData['send_option_ccd'] == $this->_send_option_ccd[0]) {
                $inputData = array_merge($inputData, ['SendDatm' => date('Y-m-d H:i:s')]);
            } else {
                $send_datm = $formData['send_datm_day'] . ' ' . $formData['send_datm_h'] . ':' . $formData['send_datm_m'] . ':' . '00';
                $inputData = array_merge($inputData, ['SendDatm' => $send_datm]);
            }

            //자동문자는 관리자 식별자가 없음
            if(empty($formData['reg_admin_idx']) === false) {
                $inputData = array_merge($inputData, [
                    'RegAdminIdx' => $formData['reg_admin_idx']
                ]);
            } else {
                $inputData = array_merge($inputData, [
                    'RegAdminIdx' => 1000
                ]);
            }

            $inputData = array_merge($inputData, [
                'RegDatm' => date('Y-m-d H:i:s'),
                'RegIp' => $this->input->ip_address()
            ]);

            if ($this->_conn->set($inputData)->insert($this->_table) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $send_idx = $this->_conn->insert_id();

            // *** lms_crm_send_r_receive_sms 테이블 정보 세팅 (세션) ***
            $arr_member_data = array();
            foreach ($set_send_data_phone as $key => $val) {
                $member_data = [
                    'SendIdx' => $send_idx,
                    'MemIdx' => (empty($this->session->userdata('mem_idx')) === false ? $this->session->userdata('mem_idx') : '0' ),
                    'Receive_PhoneEnc' => ( empty($val) === false ? $this->getEncString($val) : '' ),
                    'Receive_Name' => (empty($this->session->userdata('mem_name')) === false ? $this->session->userdata('mem_name') : '비회원' ),
                    'SmsRcvStatus' => 'N'
                ];
                array_push($arr_member_data, $member_data);
            }
            $result = $this->_addSendReceiveSms($arr_member_data);
            if ($result === false) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }

            // 챗버블
            if(empty($tmpl_data) === false) {
                $inputData = array_merge($inputData, [
                    'arr_chat_button' => [
                        'ChatBubbleButton1' => empty($tmpl_data['ChatBubbleButton1']) === false ? $tmpl_data['ChatBubbleButton1'] : null,
                        'ChatBubbleButton2' => empty($tmpl_data['ChatBubbleButton2']) === false ? $tmpl_data['ChatBubbleButton2'] : null,
                        'ChatBubbleButton3' => empty($tmpl_data['ChatBubbleButton3']) === false ? $tmpl_data['ChatBubbleButton3'] : null,
                        'ChatBubbleButton4' => empty($tmpl_data['ChatBubbleButton4']) === false ? $tmpl_data['ChatBubbleButton4'] : null,
                        'ChatBubbleButton5' => empty($tmpl_data['ChatBubbleButton5']) === false ? $tmpl_data['ChatBubbleButton5'] : null
                    ]
                ]);
            }

            $set_from_phone = empty($formData['from_phone']) === false ? $formData['from_phone'] : null;
            $result = $this->_kakaoSend($inputData, $set_send_data_phone, $set_send_data_msg, $set_from_phone, $send_idx);
            if ($result === false) {
                throw new \Exception('문자 발송 실패 입니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return array(error_result($e), $set_send_data_count);
        }
        return array(true, $set_send_data_count);
    }

    /**
     * SMS, 카카오 알림톡 발송 (2019-09-19 이후)
     * @param $inputData
     * @param $arr_send_data_phone
     * @param $arr_send_data_msg
     * @param $from_phone
     * @param $send_idx [lms_crm_send.SendIdx]
     * @return bool
     */
    private function _kakaoSend($inputData, $arr_send_data_phone, $arr_send_data_msg = array(), $from_phone = null, $send_idx)
    {
        $send_call_center = null;
        $send_msg = empty($arr_send_data_msg) === false ? $arr_send_data_msg : $inputData['Content'];
        $send_date = $inputData['SendDatm'];

        if(empty($from_phone) === false) {
            $send_call_center = $from_phone;
        } else {
            if(empty($inputData['CsTelCcd']) === false){
                $arr_condition = ['EQ' => ['Ccd' => $inputData['CsTelCcd']]];
                $send_call_center = $this->codeModel->listAllCode($arr_condition)[0]['CcdValue'];
            } else {
                $send_call_center = $this->config->item('wca_tel');
            }
        }
        $arr_chat_button = empty($inputData['arr_chat_button']) === false ? $inputData['arr_chat_button'] : null;

        if ($this->sendsms->sendKakao($arr_send_data_phone, $send_msg, $send_call_center, $send_date, $inputData['KakaoMsgType'], $inputData['tmplCd'], $send_idx, $arr_chat_button) !== true) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * input data 셋팅
     * @param $formData
     * @param $_send_type
     * @param $_send_type_ccd
     * @param $_send_status_ccd
     * @param $_send_option_ccd
     * @param $_send_text_length_ccd
     * @return array
     */
    private function _setInputData($formData, $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd, $_send_text_length_ccd)
    {
        $send_type_ccd = $tmpl_cd = null;
        $kakao_msg_type = element('kakao_msg_type', $formData);
        if(empty($kakao_msg_type) === false){
            //친구톡, 알림톡
            $send_type_ccd = $this->_kakao_msg_type[$kakao_msg_type];
            $tmpl_cd = element('tmpl_cd', $formData);
        }else{
            //이전 SMS,LMS
            $send_type_ccd = (mb_strlen(element('send_content', $formData),'euc-kr') <= 80) ? $_send_text_length_ccd[0] : $_send_text_length_ccd[1];
        }

        $input_data = [
            'SendGroupTypeCcd' => $_send_type_ccd[$_send_type],
            'SiteCode' => element('site_code', $formData),
            'SendPatternCcd' => element('send_pattern_ccd', $formData),
            'SendTypeCcd' => $send_type_ccd,
            'SendOptionCcd' => element('send_option_ccd', $formData),
            'SendStatusCcd' => (element('send_option_ccd', $formData) == $_send_option_ccd['0']) ? $_send_status_ccd['0'] : $_send_status_ccd['1'],
            'CsTelCcd' => element('cs_tel_ccd', $formData),
            'Title' => '',
            'Content' => element('send_content', $formData),
            'KakaoMsgType' => $kakao_msg_type,
            'tmplCd' => $tmpl_cd
        ];

        return $input_data;
    }

    /**
     * 수신데이터 셋팅 (2019-09-19 이후)
     * @param $arr_mem_phone : 입력데이터
     * @param $arr_mem_name
     * @param $arr_send_msg
     * @return array
     */
    private function _getSendDetailData($arr_mem_phone, $arr_mem_name, $arr_send_msg = array())
    {
        $set_send_data_phone = [];
        $set_send_data_name = [];
        $set_send_data_msg = [];
        $set_send_data_count = [];
        foreach ($arr_mem_phone as $key => $val) {
            if (empty($arr_mem_phone[$key]) === false) {
                $set_send_data_phone[$key] = $val;
                $set_send_data_name[$key] = empty($arr_mem_name[$key]) == false ? $arr_mem_name[$key] : '';
                $set_send_data_msg[$key] = $arr_send_msg[$key];
                $set_send_data_count[$key] = $val;
            }
        }
        return array($set_send_data_phone, $set_send_data_name, $set_send_data_msg, count($set_send_data_count));
    }

    /**
     * 알림톡 템플릿 정보 상세 조회
     * @param $idx
     * @param $tmpl_cd
     * @return mixed
     */
    public function findKakaoTemplate($idx = null, $tmpl_cd = null)
    {
        $return_data = null;
        $arr_condition = [
            'EQ' => [
                'KT.IsStatus' => 'Y'
            ]
        ];
        if(empty($idx) === false) $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['KT.CktIdx' => $idx]);
        if(empty($tmpl_cd) === false) $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['KT.TmplCd' => $tmpl_cd]);

        $column = '
            KT.*,
            fn_admin_name(KT.RegAdminIdx) AS RegAdminName,
            fn_admin_name(KT.UpdAdminIdx) AS UpdAdminName,
            fn_admin_name(KT.ApprovalAdminIdx) AS ApprovalAdminName
        ';
        $from = "
            FROM {$this->_table_kakao_template} as KT
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        $return_data = $query->row_array();

        return $return_data;
    }

    /**
     * 발송 로그 상세 저장
     * @param $inputData
     * @return mixed
     */
    private function _addSendReceiveSms($inputData = [])
    {
        if (empty($inputData) === false) {
            foreach ($inputData as $data) {
                if ($this->_conn->set($data)->insert($this->_table_r_send_receive) === false) return false;
            }
        } else {
            return false;
        }
        return true;
    }

    /**
     * 상품발송 문자 내용 치환
     * @param $inputData
     * @return string
     */
    public function getProductSendSmsMsg($inputData)
    {
        $result_msg = '';
        if (empty($inputData) === false) {
            $result_msg = $inputData['SendSmsMsg'];
            if(strpos($result_msg, '{{') !== false) {
                foreach($this->_product_send_sms_msg_replace as $key => $val) {
                    if(strpos($result_msg, $key) !== false && empty($inputData[$val]) === false) {
                        $result_msg = str_replace($key, $inputData[$val], $result_msg);
                    }
                }
            }
        }
        return $result_msg;
    }
}