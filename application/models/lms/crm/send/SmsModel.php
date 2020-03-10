<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsModel extends WB_Model
{
    private $_CI;
    private $_db;
    private $_send_type = 'sms';
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_sms';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_member_otherinfo';
    private $_table_temp = '_lms_temp_table';   // 임시테이블
    private $_table_kakao_template = 'lms_crm_kakao_template';
    private $_table_kakao_msg = 'kkt_msg';
    private $_table_kakao_log = 'kkt_log_';     //kkt_log_yyyymm

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

    // 메세지 리턴 종류
    private $_rslt_send_name = [
        'SMS' => 'SMS',
        'LMS' => 'LMS',
        'KFT' => '친구톡',
        'KAT' => '알림톡'
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

    public function __construct($database = 'dreamline')
    {
        parent::__construct('lms');
        $this->_CI = &get_instance();
        $this->_db = $this->_CI->load->database($database, true);
        $this->load->library('sendSms');
        $this->load->loadModels(['_lms/crm/send/kakaoTemplate', '_lms/sys/code']);
    }

    public function __destruct()
    {
        $this->_db->close();
    }

    public function listSms($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SMS.SendIdx, SMS.SiteCode, SMS.SendPatternCcd, SMS.SendTypeCcd, SMS.SendOptionCcd, SMS.SendStatusCcd, SMS.CsTelCcd,
                CONCAT(LEFT(SMS.Content, 20), IF (CHAR_LENGTH(SMS.Content) > 20, " ...", "") ) as Content,
                SMS.SendDatm, SMS.RegDatm, SMS.RegAdminIdx,
                LS.SiteName, ADMIN.wAdminName,
                fn_ccd_name(SMS.CsTelCcd) AS CsTelCcdName,
                (SELECT CcdValue FROM lms_sys_code WHERE Ccd = SMS.CsTelCcd) AS CsTelCcdValue
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as SMS
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON SMS.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON SMS.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 발송 데이터 조회
     * @param $column
     * @param $arr_condition
     * @return mixed
     */
    public function findSms($column, $arr_condition){
        $from = "
            FROM $this->_table AS a
            LEFT JOIN $this->_table_r_send_receive AS b ON a.SendIdx = b.SendIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 발송 상세 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param $send_idx
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSmsDetail($is_count, $arr_condition = [], $send_idx, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SEND.SmsSendIdx, SEND.SendIdx, SEND.MemIdx, fn_dec(SEND.Receive_PhoneEnc) AS Receive_PhoneEnc, SEND.Receive_Name, SEND.SmsRcvStatus, TM.Phone3 ,MEM.MemId, MEM.MemName, 
                CSM.SendDatm, DATE_FORMAT(CSM.SendDatm, \'%Y%m\') AS SendYyyyMm, SEND.ReplaceContent
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM 
            {$this->_table_r_send_receive} as SEND
            LEFT JOIN {$this->_table} as CSM ON SEND.SendIdx = CSM.SendIdx
            LEFT JOIN {$this->_table_member} as MEM ON SEND.MemIdx = MEM.MemIdx
            INNER JOIN
            (
                SELECT SmsSendIdx, RIGHT(fn_dec(Receive_PhoneEnc),4) AS Phone3
                FROM lms_crm_send_r_receive_sms
                WHERE SendIdx = {$send_idx}
            ) AS TM ON SEND.SmsSendIdx = TM.SmsSendIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 발송 데이터 등록 (2019-09-19 이전, TODO 제거)
     * @param array $formData
     * @param $_send_type
     * @param $_send_type_ccd
     * @param $_send_status_ccd
     * @param $_send_option_ccd
     * @param $_send_text_length_ccd
     * @return array
     */
    public function addSms($formData = [], $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd, $_send_text_length_ccd)
    {
        $this->_conn->trans_begin();
        try {
            $get_send_data_count = 0;
            list($get_send_data, $set_send_data_name, $get_send_data_count) = $this->_get_send_detail_data($formData['send_type'], $formData['mem_phone'], $formData['mem_name']);
            $inputData = $this->_setInputData($formData, $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd, $_send_text_length_ccd);

            if ($formData['send_option_ccd'] == $_send_option_ccd[0]) {
                $inputData = array_merge($inputData, ['SendDatm' => date('Y-m-d H:i:s')]);
            } else {
                $send_datm = $formData['send_datm_day'] . ' ' . $formData['send_datm_h'] . ':' . $formData['send_datm_m'] . ':' . '00';
                $inputData = array_merge($inputData, ['SendDatm' => $send_datm]);
            }

            $inputData = array_merge($inputData,[
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegDatm' => date('Y-m-d H:i:s'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $send_idx = $this->_conn->insert_id();

            /**
             * 1. 임시테이블 생성
             * 1-2. 임시테이블 데이터 저장
             * 2. 회원테이블 임시테이블 조인
             * 3. 조인 데이터 발송테이블 저장
             */
            $result = $this->createTempTable($this->_table_temp);
            if ($result === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            $result = $this->insertTempTable($this->_table_temp, $get_send_data, $set_send_data_name);
            if ($result === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            $datas = $this->_listTempTableData($send_idx);
            if ($datas === false) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }

            $result = $this->_addTempDataForSendReceiveData($datas);
            if ($result === false) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }

            // 임시테이블 삭제
            $this->dropTempTable($this->_table_temp);

            //메세지 치환
            $before_content = $inputData['Content'];
            foreach($get_send_data as $i => $row){
                $after_content = $before_content;
                foreach($this->_sms_send_content_replace as $key => $val) {
                    if(strpos($after_content, $key) !== false) {
                        $after_content = str_replace($key, $formData[$val][$i], $after_content);
                    }
                }
                $inputData['Content'] = $after_content;

                /** 즉시 발송 시작 [솔루션 호출] */
                $result = $this->_smsSend($inputData, $get_send_data[$i]);
                if ($result === false) {
                    throw new \Exception('문자 발송 실패 입니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return array(error_result($e), $get_send_data_count);
        }

        return array(true, $get_send_data_count);
    }

    /**
     * 발송상태일괄 수정
     * @param array $params
     * @return array|bool
     */
    public function updateSendStatus($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }
            $set_send_idx = implode(',', array_keys($params));
            $set_send_optoin_val = implode(',', array_values($params));
            $arr_send_idx = explode(',', $set_send_idx);
            $arr_send_optoin_val = explode(',', $set_send_optoin_val);
            $set_data = $arr_send_optoin_val[0];

            $this->_conn->set(['SendStatusCcd' => $set_data])->where_in('SendIdx',$arr_send_idx);

            if($this->_conn->update($this->_table)=== false) {
                throw new \Exception('데이터 수정을 실패했습니다.');
            }

            if($this->removeKakao($arr_send_idx) === false){
                throw new \Exception('SMS 발송 삭제를 실패하였습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 회원 정보 조회
     * @param $is_count
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getMemberList($is_count, $arr_condition, $column = '*', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_member} AS Mem
            INNER JOIN {$this->_table_member_otherinfo} AS MemInfo ON Mem.MemIdx = MemInfo.MemIdx
        ";
        /*$where = $this->_conn->makeWhere($arr_condition, true, false)->getMakeWhere(false);*/
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * Excel 파일 로드
     * @return array
     */
    public function fileUpload()
    {
        $result = true;
        $err_data = [];
        $return = [];

        try{
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/send/sms/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

            if (empty($uploaded) === true || count($uploaded) <= 0) {
                throw new \Exception('업로드할 파일이 없습니다.');
            }

            // 엑셀 데이터 셋팅
            $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);

            // 업로드 파일 삭제
            @unlink($uploaded[0]['full_path']);

            $return = [
                'excel_data' => $excel_data
            ];

        } catch (\Exception $e) {
            $result = false;
            $err_data['ret_cd'] = false;
            $err_data['ret_msg'] = $e->getMessage();
            $err_data['ret_status'] = '422';
        }

        return array($result, $err_data, $return);
    }

    public function listSmsForMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                b.SendIdx, b.SendGroupTypeCcd, b.SiteCode, b.SendPatternCcd, b.SendTypeCcd, b.SendOptionCcd, b.SendStatusCcd, b.AdvertisePatternCcd,
                b.CsTelCcd, b.SendMail, b.SendAttachFilePath, b.SendAttachFileName, b.SendAttachRealFileName, b.Title, b.Content, b.AdvertiseAgreeContent,
                b.SendDatm, b.IsUse, b.IsStatus, b.RegDatm, b.RegAdminIdx, b.RegIp, b.UpdDatm, b.UpdAdminIdx,
                a.SmsSendIdx, a.MemIdx, a.Receive_PhoneEnc, a.Receive_Name, a.SmsRcvStatus,
                fn_ccd_name(b.SendStatusCcd) AS SendStatusCcdName,
                fn_ccd_name(b.SendPatternCcd) AS SendPatternCcdName,
                fn_ccd_name(b.SendTypeCcd) AS SendTypeCcdName,
                c.MemName, fn_dec(a.Receive_PhoneEnc) AS Receive_Phone,
                LS.SiteName, ADMIN.wAdminName,
                fn_ccd_name(b.CsTelCcd) AS CsTelCcdName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_r_send_receive} as a
            INNER JOIN {$this->_table} AS b ON a.SendIdx = b.SendIdx
            INNER JOIN {$this->_table_member} AS c ON a.MemIdx = c.MemIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON b.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON b.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * SMS 발송 (2019-09-19 이전, TODO 제거)
     * @param $inputData
     * @param $arr_send_data
     * @return bool
     */
    private function _smsSend($inputData, $arr_send_data)
    {
        $send_date = $inputData['SendDatm'];
        $send_msg = $inputData['Content'];

        $arr_condition = ['EQ' => ['Ccd' => $inputData['CsTelCcd']]];
        $arr_ccd_data = $this->codeModel->listAllCode($arr_condition)[0];

        $send_call_center = $arr_ccd_data['CcdValue'];
        $arr_send_phone = $arr_send_data;

        if ($this->sendsms->send($arr_send_phone, $send_msg, $send_call_center, $send_date) !== true) {
            return false;
        } else {
            return true;
        }
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
//            'SendTypeCcd' => (mb_strlen(element('send_content', $formData),'euc-kr') <= 80) ? $_send_text_length_ccd[0] : $_send_text_length_ccd[1],     //LMS
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
     * 엑셀 데이터 리턴
     * @param $file_path
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function _ExcelReader($file_path)
    {
        $this->load->library('excel');
        $excel_data = $this->excel->readExcel($file_path);

        return $excel_data;
    }

    /**
     * 수신데이터 셋팅 (2019-09-19 이전, TODO 제거)
     * @param $send_type : [1 : 입력데이터, 2 : 첨부파일]
     * @param $arr_send_data : 입력데이터
     * @param $arr_send_data_name
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function _get_send_detail_data($send_type, $arr_send_data, $arr_send_data_name)
    {
        $set_send_data = [];
        $set_send_data_name = [];
        $set_send_data_count = [];
        switch ($send_type) {
            case "1" :
                foreach ($arr_send_data as $key => $val) {
                    if (empty($arr_send_data[$key]) === false) {
                        $set_send_data_count[$key] = $val;
                        $set_send_data[$key] = $val;
                        $set_send_data_name[$key] = $arr_send_data_name[$key];
                    }
                }
                break;
            case "2" :
                $i = 0;
                $this->load->library('upload');
                $upload_sub_dir = config_item('upload_prefix_dir') . '/send/sms/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (!empty($uploaded) === true || count($uploaded) > 0) {
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        $set_send_data_count[$key] = $val['B'];
                        $set_send_data[$i] = $val['B'];
                        $set_send_data_name[$i] = $val['A'];
                        $i++;
                    }

                    // 업로드 파일 삭제
                    @unlink($uploaded[0]['full_path']);
                }
                break;

            default :
                $set_send_data = [];
                $set_send_data_name = [];
                break;
        }

        return array($set_send_data, $set_send_data_name, count($set_send_data_count));
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
     * 파일명 배열 생성
     * @return array
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'send_list_' . date('YmdHis');
        return $attach_file_names;
    }

    // 회원테이블 임시테이블 조인
    private function _listTempTableData($send_idx)
    {
        $column = "{$send_idx} as SendIdx, TMP.tempData AS Receive_PhoneEnc, TMP.tempData2 AS Receive_Name, IFNULL(MEM.MemIdx, '0') AS MemIdx, IFNULL(MO.SmsRcvStatus, 'N') AS SmsRcvStatus, TMP.tempData3 AS ReplaceContent ";

        $from = "
            FROM {$this->_table_temp} AS TMP
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON MEM.MemIdx = (
                SELECT SUBM.MemIdx
                FROM {$this->_table_member} AS SUBM
                WHERE SUBM.PhoneEnc = TMP.tempData
                ORDER BY SUBM.LastLoginDatm DESC
                LIMIT 1
            )
            LEFT OUTER JOIN {$this->_table_member_otherinfo} AS MO ON MO.MemIdx = MEM.MemIdx            
        ";

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from);
        return $query->result_array();
    }

    // 등록
    private function _addTempDataForSendReceiveData($inputData = [])
    {
        if (empty($inputData) === false) {
            foreach ($inputData as $data) {
                if ($this->_conn->set($data)->insert($this->_table_r_send_receive) === false) {
                    return false;
                }
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * 카카오 알림톡 템플릿 정보 조회
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return mixed
     */
    public function listKakaoTemplate($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                KT.*
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table_kakao_template} as KT
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 카카오 발송 데이터 등록 (2019-09-19 이후)
     * @param $mem_phone
     * @param $send_content
     * @param $from_phone
     * @param $send_date
     * @param string $kakao_msg_type
     * @param $tmpl_cd
     * @param $send_content_value
     * @param array $arr_log_member_data
     * @return boolean
     */
    public function addKakaoMsg($mem_phone, $send_content, $from_phone = null, $send_date = null, $kakao_msg_type = 'KFT', $tmpl_cd = null, $send_content_value = null, $arr_log_member_data = array())
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
            'send_content_value' => $send_content_value,    // 데이터 치환 배열
            'mem_name' => array(),
            'mem_phone' => $arr_mem_phone,
            'send_option_ccd' => 640001,                    // 640001:즉시발송, 640002:예약발송
            'send_datm_day' => null,
            'send_datm_h' => null,
            'send_datm_m' => null,
            'reg_admin_idx' => 1000,                        // 자동문자는 발송 등록 관리자가 없음
            'from_phone' => $from_phone,
            'arr_log_member_data' => $arr_log_member_data   // 로그 테이블에 저장될 회원 정보
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

            // *** 일괄발송일 경우 전화번호 세팅 (엑셀 업로드) ***
            if(empty($formData['send_type']) === false && $formData['send_type'] == '2'){
                $this->load->library('upload');
                $upload_sub_dir = config_item('upload_prefix_dir') . '/send/sms/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (empty($uploaded) === false || count($uploaded) > 0) {
                    $arr_temp_mem_name = array();
                    $arr_temp_mem_phone = array();
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        array_push($arr_temp_mem_name, $val['A']);
                        array_push($arr_temp_mem_phone, $val['B']);
                    }
                    $formData['mem_name'] = $arr_temp_mem_name;
                    $formData['mem_phone'] = $arr_temp_mem_phone;
                    @unlink($uploaded[0]['full_path']);
                }
            }

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
                    $tmpl_data = $this->kakaoTemplateModel->findKakaoTemplate(null, $formData['tmpl_cd']);
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
                    'RegAdminIdx' => $this->session->userdata('admin_idx')
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

            if(empty($formData['arr_log_member_data']) === false && is_array($formData['arr_log_member_data'])) {
                //발송 로그 저장할 회원정보가 넘어왔을 경우
                foreach ($formData['arr_log_member_data'] as $key => $val) {
                    $log_member_data = $formData['arr_log_member_data'][$key];
                    $log_member_data['SendIdx'] = $send_idx;
                    $log_member_data['MemIdx'] = empty($val['MemIdx']) === false ? $val['MemIdx'] : '0';
                    $log_member_data['Receive_PhoneEnc'] = empty($val['Receive_PhoneEnc']) === false ? $this->getEncString($val['Receive_PhoneEnc']) : '';
                    $log_member_data['Receive_Name'] = empty($val['Receive_Name']) === false ? $val['Receive_Name'] : '비회원';
                    $log_member_data['SmsRcvStatus'] = empty($val['SmsRcvStatus']) === false ? $val['SmsRcvStatus'] : 'N';
                }
                $result = $this->_addTempDataForSendReceiveData($formData['arr_log_member_data']);
                if ($result === false) {
                    throw new \Exception('상세 정보 등록에 실패했습니다.');
                }
            } else {
                //발송 로그 저장할 회원정보가 안넘어왔을 경우
                $result = $this->createTempTable($this->_table_temp);
                if ($result === false) {
                    throw new \Exception('등록에 실패했습니다.');
                }

                $result = $this->insertTempTable($this->_table_temp, $set_send_data_phone, $set_send_data_name, $set_send_data_msg);
                if ($result === false) {
                    throw new \Exception('등록에 실패했습니다.');
                }

                $datas = $this->_listTempTableData($send_idx);
                if ($datas === false) {
                    throw new \Exception('상세 정보 등록에 실패했습니다.');
                }

                $result = $this->_addTempDataForSendReceiveData($datas);
                if ($result === false) {
                    throw new \Exception('상세 정보 등록에 실패했습니다.');
                }
                $this->dropTempTable($this->_table_temp);
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
     * 알림톡 발송 로그 상세 조회
     * @param $yyyymm
     * @param $phone
     * @param $send_idx
     * @return mixed
     */
    public function findKakaoLog($yyyymm, $phone, $send_idx){
        try {
            $arr_condition = [
                'EQ' => [
                    'KL.PHONE' => $phone,
                    'KL.ETC1' => $send_idx,
                    'KL.ETC2' => $this->sendsms->getKakaoLogEtc2()
                ]
            ];
            $column = "
                KL.*, 
                IFNULL(RC.RSLT_INFO, '알수없는 결과코드') AS RSLT_INFO,
                (CASE KL.RSLT_RESEND
                    WHEN 'NONE' THEN KL.TYPE
                    ELSE KL.RSLT_RESEND
                    END
                ) AS RSLT_SEND
            ";
            $from = "
                FROM {$this->_table_kakao_log}{$yyyymm} AS KL
                LEFT OUTER JOIN common_result_code AS RC ON KL.RSLT = RC.RSLT AND MsgType = 'kkt'
            ";

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $result = $this->_db->query('SELECT ' . $column . $from . $where)->row_array();

            //수신결과명
            if(empty($result) === false && empty($result['RSLT_SEND']) === false){
                $result['RSLT_SEND_NAME'] = $this->_rslt_send_name[$result['RSLT_SEND']];
            }
            return $result;

        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * 알림톡 발송 삭제
     * @param $send_idx
     * @return mixed
     * @throws Exception
     */
    public function removeKakao($send_idx){
        try {
            $arr_send_idx = ( is_array($send_idx) === false ? array($send_idx) : $send_idx );
            foreach($arr_send_idx as $key => $val) {
                $arr_condition = [
                    'EQ' => [
                        'ETC1' => $val,
                        'ETC2' => $this->sendsms->getKakaoLogEtc2()
                    ]
                ];
                $from = "FROM {$this->_table_kakao_msg} ";
                $where = $this->_conn->makeWhere($arr_condition);
                $where = $where->getMakeWhere(false);
                $result = $this->_db->query('DELETE '. $from . $where);
                if ($result === 0) {
                    return false;
                } else {
                    return true;
                }
            }
        } catch (\Exception $e) {
            $this->_db->trans_rollback();
            throw new \Exception('SMS 발송 삭제를 실패하였습니다.');
        }
    }
}