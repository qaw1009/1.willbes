<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval
{
    protected $_CI;
    /**
     * @var \CI_DB_query_builder
     */
    protected $_db;

    public function __construct($database = 'lms')
    {
        $this->_CI = &get_instance();
        $this->_db = $this->_CI->load->database($database, true);
    }

    public function __destruct()
    {
        $this->_db->close();
    }


    /**
     * 승인 신청
     */
    public function Request()
    {

    }


    /**
     * 승인 결과 : 승인/미승인
     */
    public function Response()
    {

    }

    /**
     * 다운로드 코드 추출
     */
    public function GetDownloadCcd($page_url)
    {
        if(empty($page_url) === false) {
            $from = " Ccd From lms_sys_code WHERE IsUse='Y' AND IsStatus='Y' AND GroupCcd='715' ";
            $where = ' AND ( INSTR(\''.$page_url.'\',CcdValue) > 0)';
            $result = $this->_db->query('select '. $from. $where) -> row(0) -> Ccd;
            return $result;
        } else {
            return null;
        }
    }

    /**
     * LMS 내 엑셀다운로드 정보 로그 저장
     */
    public function SysDownLog($download_query, $file_name, $data_count=0)
    {
        $download_type_ccd = $this->GetDownloadCcd(uri_string());
        $now_page_info = current_url();
        $input = [
            'DownloadTypeCcd' => $download_type_ccd
            ,'PageInfo' => $now_page_info
            ,'Query' => $download_query
            ,'DataCount' => $data_count
            ,'DownloadFileName' => $file_name
            ,'RegIp' => $this->_CI->input->ip_address()
            ,'RegAdminIdx' => $this->_CI->session->userdata('admin_idx')
        ];
        return $this->_db->set($input)->insert('lms_sys_download_log');
    }

}

