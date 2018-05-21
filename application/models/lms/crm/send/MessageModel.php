<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageModel extends WB_Model
{
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_message';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_member_otherinfo';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listMessage($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                MSG.SendIdx, MSG.SiteCode, MSG.SendPatternCcd, MSG.SendTypeCcd, MSG.SendOptionCcd, MSG.SendStatusCcd, MSG.CsTel,
                CONCAT(LEFT(MSG.Content, 20), IF (CHAR_LENGTH(MSG.Content) > 20, " ...", "") ) as Content,
                MSG.SendDatm, MSG.RegDatm, MSG.RegAdminIdx,
                LS.SiteName, ADMIN.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as MSG
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON MSG.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON MSG.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
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
    public function findMessage($column, $arr_condition){
        $from = "
            FROM $this->_table
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
    public function listMessageDetail($is_count, $arr_condition = [], $send_idx, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SEND.MessageSendIdx, SEND.SendIdx, SEND.MemIdx, SEND.IsReceive, MEM.MemId, MEM.MemName
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

    /**
     * @param array $formData
     * @param $_send_type
     * @param $_send_type_ccd
     * @param $_send_status_ccd
     * @param $_send_option_ccd
     * @return array
     */
    public function addMessage($formData = [], $_send_type, $_send_type_ccd, $_send_status_ccd, $_send_option_ccd)
    {
        $this->_conn->trans_begin();
        try {
            $get_send_data_count = 0;
            list($get_send_data, $get_send_data_count) = $this->_get_send_detail_data($formData['send_type'], $formData['mem_id']);

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
            $result = $this->_addSendReceiveData($send_idx, $get_send_data);
            if ($result['result'] != 1) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
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
            $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d') ;
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
     * @return mixed
     */
    private function _addSendReceiveData($send_idx, $detail_datas)
    {
        $this->_conn->query('CALL sp_send_detail_message_insert(?, ?, ?, @_result)', [
            $send_idx, $detail_datas, ','
        ]);

        return $this->_conn->query('SELECT @_result as result')->row_array();
    }

    /**
     * 수신데이터 셋팅
     * @param $send_type : [1 : 입력데이터, 2 : 첨부파일]
     * @param $arr_send_data : 입력데이터
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function _get_send_detail_data($send_type, $arr_send_data)
    {
        $set_send_data = '';
        $set_send_data_count = [];
        switch ($send_type) {
            case "1" :
                foreach ($arr_send_data as $key => $val) {
                    if (empty($arr_send_data[$key]) === false) {
                        $set_send_data_count[$key] = $val;
                        $set_send_data .= $val.',';
                    }
                }
                break;
            case "2" :
                $this->load->library('upload');
                $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d') ;
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (!empty($uploaded) === true || count($uploaded) > 0) {
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        $set_send_data_count[$key] = $val['B'];
                        $set_send_data .= $val['B'].',';
                    }

                    // 업로드 파일 삭제
                    @unlink($uploaded[0]['full_path']);
                }
                break;

            default :
                $set_send_data = '';
                break;
        }
        $set_send_data = substr($set_send_data , 0, -1);

        return array($set_send_data, count($set_send_data_count));
    }

    /**
     * 파일명 배열 생성
     * @return string
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'msg_' . date('YmdHis');
        return $attach_file_names;
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
        $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d') ;
        $uploaded = $this->upload->uploadFile('file', ['send_attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

        $input_data = [
            'SendGroupTypeCcd' => $_send_type_ccd[$_send_type],
            'SiteCode' => element('site_code', $formData),
            'SendOptionCcd' => element('send_option_ccd', $formData),
            'SendStatusCcd' => (element('send_option_ccd', $formData) == $_send_option_ccd['0']) ? $_send_status_ccd['0'] : $_send_status_ccd['1'],
            'Title' => '',
            'Content' => element('send_content', $formData),
            'SendAttachFilePath' => $this->upload->_upload_url . $upload_sub_dir . '/',
        ];

        if (empty($uploaded) === false || count($uploaded) > 0) {
            $input_data = array_merge($input_data,[
                'SendAttachFileName' => $uploaded[0]['orig_name']
            ]);

            /*$set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
            $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
            $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];*/
        }

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
}