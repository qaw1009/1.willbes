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
                SMS.SendIdx, SMS.SiteCode, SMS.SendPatternCcd, SMS.SendOptionCcd, SMS.SendStatusCcd, SMS.AdvertisePatternCcd,
                SMS.Title, SMS.SendDatm, SMS.RegDatm, SMS.RegAdminIdx, LS.SiteName, ADMIN.wAdminName
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
            $sendMail_result = false;
            $get_send_data_count = 0;
            list($get_send_data, $set_send_data_name, $get_send_data_count) = $this->_get_send_detail_data($formData['send_type'], $formData['mem_mail'], $formData['mem_name']);

            $inputData = $this->_setInputData($formData, $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd);

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

            // 등록된 발송식별자
            $send_idx = $this->_conn->insert_id();
            $result = $this->_addSendReceiveData($send_idx, $get_send_data, $set_send_data_name, $_send_type);
            if ($result['result'] != 1) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }

            // 즉시 발송 시작
            if ($formData['send_option_ccd'] == $_send_option_ccd[0]) {
                $sendMail_result = $this->_sendMailAuthNumber($formData, $get_send_data, $_send_advertise_pattern_ccd, $_advertise_link);
            }

            if ($sendMail_result === false) {
                throw new \Exception('메일 전송에 실패했습니다.');
            }

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
            $upload_sub_dir = SUB_DOMAIN . '/send/mail/' . date('Y') . '/' . date('m') . '/' . date('d') ;
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
     * 발송데이터 상세 데이터 등록
     * @param $send_idx
     * @param $detail_datas
     * @param $detail_data_names
     * @return mixed
     */
    private function _addSendReceiveData($send_idx, $detail_datas, $detail_data_names, $send_type = '')
    {
        $this->_conn->query('CALL sp_send_detail_insert(?, ?, ?, ?, @_result)', [
            $send_idx, $detail_datas, ',', $send_type
        ]);

        return $this->_conn->query('SELECT @_result as result')->row_array();
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
        $set_send_data = '';
        $set_send_data_name = '';
        $set_send_data_count = [];
        switch ($send_type) {
            case "1" :
                foreach ($arr_send_data as $key => $val) {
                    if (empty($arr_send_data[$key]) === false) {
                        $set_send_data_count[$key] = $val;
                        $set_send_data .= $val.',';
                        $set_send_data_name .= $arr_send_data_name[$key];
                    }
                }
                break;
            case "2" :
                $this->load->library('upload');
                $upload_sub_dir = SUB_DOMAIN . '/send/mail/' . date('Y') . '/' . date('m') . '/' . date('d') ;
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (!empty($uploaded) === true || count($uploaded) > 0) {
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        $set_send_data_count[$key] = $val['B'];
                        $set_send_data .= $val['B'].',';
                        $set_send_data_name .= $val['A'].',';
                    }

                    // 업로드 파일 삭제
                    @unlink($uploaded[0]['full_path']);
                }
                break;

            default :
                $set_send_data = '';
                $set_send_data_name = '';
                break;
        }
        $set_send_data = substr($set_send_data , 0, -1);
        $set_send_data_name = substr($set_send_data_name , 0, -1);

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
        $this->load->library('upload');
        $upload_sub_dir = SUB_DOMAIN . '/send/mail/' . date('Y') . '/' . date('m') . '/' . date('d') ;
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

        if (empty($uploaded) === false || count($uploaded) > 0) {
            $input_data = array_merge($input_data,[
                'SendAttachFileName' => $uploaded[0]['orig_name']
            ]);
        }

        return $input_data;
    }

    /**
     * 파일명 배열 생성
     * @param $board_idx
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
     * @param $_advertise_link
     * @return bool
     */
    private function _sendMailAuthNumber($datas, $to_mail, $_send_advertise_pattern_ccd, $_advertise_link)
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
}