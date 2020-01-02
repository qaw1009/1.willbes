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
                MSG.SendIdx, MSG.SiteCode, MSG.SendPatternCcd, MSG.SendTypeCcd, MSG.SendOptionCcd, MSG.SendStatusCcd, MSG.CsTelCcd,
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
    public function listMessageDetail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SEND.MessageSendIdx, SEND.SendIdx, SEND.MemIdx, SEND.Receive_MemId, SEND.IsReceive, MEM.MemId, MEM.MemName
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
            list($get_send_data, $get_send_data_count) = $this->_get_send_detail_data($formData);

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

            $datas = $this->_listTempTableData($send_idx, $get_send_data);
            if ($datas === false) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }
            $result = $this->_addTempDataForSendReceiveData($datas);
            if ($result === false) {
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
            $upload_sub_dir = config_item('upload_prefix_dir') . '/send/message/' . date('Y') . '/' . date('md');
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

    public function listMessageForMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                b.SendIdx, b.SendGroupTypeCcd, b.SiteCode, b.SendPatternCcd, b.SendTypeCcd, b.SendOptionCcd, b.SendStatusCcd, b.AdvertisePatternCcd,
                b.CsTelCcd, b.SendMail, b.SendAttachFilePath, b.SendAttachFileName, b.SendAttachRealFileName, b.Title, b.Content, b.AdvertiseAgreeContent,
                b.SendDatm, b.IsUse, b.IsStatus, b.RegDatm, b.RegAdminIdx, b.RegIp, b.UpdDatm, b.UpdAdminIdx,
                a.MessageSendIdx, a.MemIdx, a.Receive_MemId, a.IsReceive, a.RcvDatm, a.DelDatm,
                fn_ccd_name(b.SendStatusCcd) AS SendStatusCcdName,
                fn_ccd_name(b.SendPatternCcd) AS SendPatternCcdName,
                fn_ccd_name(b.SendTypeCcd) AS SendTypeCcdName,
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

    // 회원테이블 임시테이블 조인
    private function _listTempTableData($send_idx, $get_send_data)
    {
        $column = "{$send_idx} as SendIdx, TP.item AS MemIdx, Mem.MemId AS Receive_MemId";
        $from = "
            FROM {$this->_table_member} as Mem
            INNER JOIN
            (
                SELECT TT.item AS item FROM
                (
                    SELECT
                        SUBSTRING_INDEX(SUBSTRING_INDEX('{$get_send_data}', ',', TN.num), ',', -1) AS item
                    FROM tmp_numbers AS TN
                        WHERE CHAR_LENGTH('{$get_send_data}') - CHAR_LENGTH(REPLACE('{$get_send_data}', ',', '')) >= TN.num - 1
                )
                AS TT
            ) AS TP
            ON Mem.MemIdx = TP.item
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

    /**
     * 수신데이터 셋팅
     * @param $formData
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function _get_send_detail_data($formData)
    {
        $set_send_data = '';
        $set_send_data_count = [];
        //1 : 입력데이터, 2 : 첨부파일
        switch ($formData['send_type']) {
            case "1" :
                //회원검색창에서 선택된 회원식별자 + 모달창에 호출된 회원식별자
                if (empty($formData['temp_mem_idx']) === false) {
                    $set_send_data = $formData['temp_mem_idx'];
                } else {
                    $set_send_data = $formData['choice_mem_idx'];
                }
                $set_send_data_count = explode(',', $set_send_data);
                break;
            case "2" :
                $this->load->library('upload');
                $upload_sub_dir = config_item('upload_prefix_dir') . '/send/message/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (!empty($uploaded) === true || count($uploaded) > 0) {
                    $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                    foreach ($excel_data as $key => $val) {
                        $set_send_data_count[$key] = $val['A'];
                        $set_send_data .= $val['A'].',';
                    }

                    // 업로드 파일 삭제
                    @unlink($uploaded[0]['full_path']);
                }
                $set_send_data = substr($set_send_data , 0, -1);

                // 식별자 memIdx 조회
                $mem_idx_str = '';
                if(empty($set_send_data) === false) {
                    $memberData = $this->_listMember(false, ['EQ' => ['M.IsStatus' => 'Y'], 'IN' => ['M.MemId' => explode(',', $set_send_data)]]);
                    if(empty($memberData) === false) {
                        foreach($memberData as $key => $val) {
                            if(empty($val['MemIdx']) === false) {
                                if($key != 0) $mem_idx_str .= ',';
                                $mem_idx_str .= $val['MemIdx'];
                            }
                        }
                    }
                }
                $set_send_data = $mem_idx_str;
                break;
            default :
                $set_send_data = '';
                break;
        }

        return array($set_send_data, count($set_send_data_count));
    }


    /**
     * 파일명 배열 생성
     * @return array
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
        $upload_sub_dir = config_item('upload_prefix_dir') . '/send/message/' . date('Y') . '/' . date('md');
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

        if (empty($uploaded) === false && count($uploaded[0]) > 0) {
            $input_data = array_merge($input_data,[
                'SendAttachFileName' => $uploaded[0]['orig_name'],
                'SendAttachRealFileName' => $uploaded[0]['client_name']
            ]);
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

    /**
     * 회원 조회
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return array
     */
    private function _listMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                M.*
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_member} M
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}