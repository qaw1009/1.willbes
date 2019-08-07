<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsModel extends WB_Model
{
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_sms';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_member_otherinfo';
    private $_table_temp = '_lms_temp_table';   // 임시테이블

    // 메세지 발송 치환 정보
    private $_sms_send_content_replace = [
        '{{name}}' => 'mem_name',
        '{{id}}' => 'mem_id'
    ];

    public function __construct()
    {
        parent::__construct('lms');
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
                fn_ccd_name(SMS.CsTelCcd) AS CsTelCcdName
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
                SEND.SmsSendIdx, SEND.SendIdx, SEND.MemIdx, fn_dec(SEND.Receive_PhoneEnc) AS Receive_PhoneEnc, SEND.Receive_Name, SEND.SmsRcvStatus, TM.Phone3 ,MEM.MemId, MEM.MemName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_r_send_receive} as SEND
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
     * 발송 데이터 등록
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
            $result = $this->createTampTable($this->_table_temp);
            if ($result === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            $result = $this->insertTampTable($this->_table_temp, $get_send_data, $set_send_data_name);
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
            $this->dropTampTable($this->_table_temp);

            //메세지 치환
            $beforeContent = $inputData['Content'];
            foreach($get_send_data as $i => $row){
                $afterContent = $beforeContent;
                foreach($this->_sms_send_content_replace as $key => $val) {
                    if(strpos($afterContent, $key) !== false) {
                        $afterContent = str_replace($key, $formData[$val][$i], $afterContent);
                    }
                }
                $inputData['Content'] = $afterContent;

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
                throw new \Exception('데이터 수정에 실패했습니다.');
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
     * SMS 발송
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

        $this->load->library('sendSms');
        if ($this->sendsms->send($arr_send_phone, $send_msg, $send_call_center, $send_date) !== true) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * input date 셋팅
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
        $input_data = [
            'SendGroupTypeCcd' => $_send_type_ccd[$_send_type],
            'SiteCode' => element('site_code', $formData),
            'SendPatternCcd' => element('send_pattern_ccd', $formData),
            'SendTypeCcd' => (mb_strlen(element('send_content', $formData),'euc-kr') <= 80) ? $_send_text_length_ccd[0] : $_send_text_length_ccd[1],     //LMS
            'SendOptionCcd' => element('send_option_ccd', $formData),
            'SendStatusCcd' => (element('send_option_ccd', $formData) == $_send_option_ccd['0']) ? $_send_status_ccd['0'] : $_send_status_ccd['1'],
            'CsTelCcd' => element('cs_tel_ccd', $formData),
            'Title' => '',
            'Content' => element('send_content', $formData)
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
     * 수신데이터 셋팅
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
        $column = "{$send_idx} as SendIdx, tempT.tempData as Receive_PhoneEnc, tempT.tempData2 as Receive_Name, IFNULL(Mem.MemIdx,'0') AS MemIdx, IFNULL(MemInfo.SmsRcvStatus,'N') AS SmsRcvStatus";

        $from = "
            FROM {$this->_table_member} as Mem
            INNER JOIN {$this->_table_member_otherinfo} AS MemInfo ON Mem.MemIdx = MemInfo.MemIdx
            RIGHT JOIN {$this->_table_temp} AS tempT ON Mem.PhoneEnc = tempT.tempData
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from);
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
}