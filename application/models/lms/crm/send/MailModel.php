<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailModel extends WB_Model
{
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_mail';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_member_otherinfo';
    private $_table_temp = '_lms_temp_table';   // 임시테이블

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listMail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                MAIL.SendIdx, MAIL.SiteCode, MAIL.SendPatternCcd, MAIL.SendOptionCcd, MAIL.SendStatusCcd, MAIL.AdvertisePatternCcd,
                MAIL.Title, MAIL.SendDatm, MAIL.RegDatm, MAIL.RegAdminIdx, LS.SiteName, ADMIN.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as MAIL
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON MAIL.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON MAIL.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
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
     * @param $_send_advertise_pattern_ccd
     * @param $_advertise_link
     * @return array
     */
    public function addMail($formData = [], $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd, $_send_advertise_pattern_ccd, $_advertise_link)
    {
        $this->_conn->trans_begin();
        try {
            $get_send_data_count = 0;
            list($get_send_data, $set_send_data_name, $get_send_data_count) = $this->_get_send_detail_data($formData['send_type'], $formData['mem_mail'], $formData['mem_name']);
            list($inputData, $mail_attach_path) = $this->_setInputData($formData, $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd);

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

            // 즉시 발송 시작
            if ($formData['send_option_ccd'] == $_send_option_ccd[0]) {
                $sendMail_result = $this->_sendMailAuthNumber($formData, $get_send_data, $_send_advertise_pattern_ccd, $_advertise_link, $mail_attach_path);

                if ($sendMail_result === false) {
                    throw new \Exception('메일 전송에 실패했습니다.');
                }
            }

            // 임시테이블 삭제
            $this->dropTempTable($this->_table_temp);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return array(error_result($e), $get_send_data_count);
        }

        return array(true, $get_send_data_count);
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
            $upload_sub_dir = config_item('upload_prefix_dir') . '/send/mail/' . date('Y') . '/' . date('md');
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
     * 발송 데이터 조회
     * @param $column
     * @param $arr_condition
     * @return mixed
     */
    public function findMail($column, $arr_condition){
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
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMailDetail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SEND.EmailSendIdx, SEND.SendIdx, SEND.MemIdx, fn_dec(SEND.Receive_MailEnc) AS Receive_MailEnc, SEND.Receive_Name, SEND.MailRcvStatus, MEM.MemId, MEM.MemName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_r_send_receive} as SEND
            LEFT JOIN {$this->_table_member} as MEM ON SEND.MemIdx = MEM.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function listMailForMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                b.SendIdx, b.SendGroupTypeCcd, b.SiteCode, b.SendPatternCcd, b.SendTypeCcd, b.SendOptionCcd, b.SendStatusCcd, b.AdvertisePatternCcd,
                b.CsTelCcd, b.SendMail, b.SendAttachFilePath, b.SendAttachFileName, b.SendAttachRealFileName, b.Title, b.Content, b.AdvertiseAgreeContent,
                b.SendDatm, b.IsUse, b.IsStatus, b.RegDatm, b.RegAdminIdx, b.RegIp, b.UpdDatm, b.UpdAdminIdx,
                a.EmailSendIdx, a.MemIdx, a.Receive_MailEnc, a.Receive_Name, a.MailRcvStatus,
                fn_ccd_name(b.SendStatusCcd) AS SendStatusCcdName,
                fn_ccd_name(b.SendPatternCcd) AS SendPatternCcdName,
                fn_ccd_name(b.SendTypeCcd) AS SendTypeCcdName,
                fn_ccd_name(b.AdvertisePatternCcd) AS AdvertisePatternCcdName,
                LS.SiteName, ADMIN.wAdminName
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
     * 수신데이터 셋팅
     * @param $send_type : [1 : 입력데이터, 2 : 첨부파일]
     * @param $arr_send_data : 입력데이터
     * @param $arr_send_data_name : 입력데이터 : 이름
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
                $upload_sub_dir = config_item('upload_prefix_dir') . '/send/mail/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (!empty($uploaded) === true || count($uploaded) > 0) {
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        $set_send_data_count[$i] = $val['B'];
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
     * input date 셋팅
     * @param $formData
     * @param $_send_type
     * @param $_send_type_ccd
     * @param $_send_status_ccd
     * @param $_send_option_ccd
     * @return array
     */
    private function _setInputData($formData, $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd)
    {
        $mail_attach_path = '';
        $this->load->library('upload');
        $upload_sub_dir = config_item('upload_prefix_dir') . '/send/mail/' . date('Y') . '/' . date('md');
        $uploaded = $this->upload->uploadFile('file', ['send_attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

        $input_data = [
            'SendGroupTypeCcd' => $_send_type_ccd[$_send_type],
            'SiteCode' => element('site_code', $formData),
            'SendPatternCcd' => element('send_pattern_ccd', $formData),
            'SendMail' => element('send_mail', $formData),
            'AdvertisePatternCcd' => element('advertise_pattern_ccd', $formData),
            'SendOptionCcd' => element('send_option_ccd', $formData),
            'SendStatusCcd' => (element('send_option_ccd', $formData) == $_send_option_ccd['0']) ? $_send_status_ccd['0'] : $_send_status_ccd['1'],
            'Title' => element('send_title', $formData),
            'Content' => element('send_content', $formData),
            'AdvertiseAgreeContent' => element('advertise_agree_content', $formData),
            'SendAttachFilePath' => $this->upload->_upload_url . $upload_sub_dir . '/',
        ];

        if (empty($uploaded) === false && count($uploaded[0]) > 0) {
            $input_data = array_merge($input_data,[
                'SendAttachFileName' => $uploaded[0]['orig_name'],
                'SendAttachRealFileName' => $uploaded[0]['client_name']
            ]);
            $mail_attach_path = $uploaded[0]['full_path'];
        }
        return array($input_data, $mail_attach_path);
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
     * 메일 발송
     * @param $datas
     * @param $to_mail
     * @param $_send_advertise_pattern_ccd
     * @param $_advertise_link  [수신거부링크]
     * @param $mail_attach_path [첨부파일 경로]
     * @return bool
     */
    private function _sendMailAuthNumber($datas, $to_mail, $_send_advertise_pattern_ccd, $_advertise_link, $mail_attach_path = '')
    {
        try {
            if ($datas['advertise_pattern_ccd'] == $_send_advertise_pattern_ccd[0] && empty($datas['advertise_agree_content']) === false) {
                /*$advertise_content = str_replace('&#13;&#10;', '<br>', $datas['advertise_agree_content']);*/
                $advertise_content = nl2br($datas['advertise_agree_content']);
                $advertise_content = str_replace('[수신거부]', "<a href='{$_advertise_link}' target='_blank'>[수신거부]</a>", $advertise_content);
                $advertise_content = str_replace('[HERE]', "<a href='{$_advertise_link}' target='_blank'>[HERE]</a>", $advertise_content);
            } else {
                $advertise_content = '';
            }

            $this->load->library('email', [
                'mail_from_address' => $datas['send_mail']
                ,'mailtype' => 'html'
            ]);
            $this->email->to($to_mail);
            $this->email->subject($datas['send_title']);
            $this->email->attach($mail_attach_path);

            $body = $this->load->view('crm/mail/_sendMail_template', [
                'send_content' => $datas['send_content'],
                'advertise_content' => $advertise_content,
            ], true, true);

            $this->email->message($body);
            $this->email->send();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    // 회원테이블 임시테이블 조인
    private function _listTempTableData($send_idx)
    {
        $column = "{$send_idx} as SendIdx, tempT.tempData as Receive_MailEnc, tempT.tempData2 as Receive_Name, IFNULL(Mem.MemIdx,'0') AS MemIdx, IFNULL(MemInfo.MailRcvStatus,'N') AS MailRcvStatus";

        $from = "
            FROM {$this->_table_member} as Mem
            INNER JOIN {$this->_table_member_otherinfo} AS MemInfo ON Mem.MemIdx = MemInfo.MemIdx
            RIGHT JOIN {$this->_table_temp} AS tempT ON MemInfo.MailEnc = tempT.tempData
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