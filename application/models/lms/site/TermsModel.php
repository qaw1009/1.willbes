<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsModel extends WB_Model
{
    public $_content_types = [
        '0' => 'A',     //이용약관
        '1' => 'P'      //개인정보처리방침
    ];
    private $_table = [
        'terms' => 'lms_site_use_personal',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function addTerms($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            if (empty(element('applay_start_day', $input)) === true) {
                $applay_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $applay_start_datm = element('applay_start_day', $input) . ' ' . element('applay_start_hour', $input) . ':00:00';
            }

            if (empty(element('applay_end_day', $input)) === true) {
                $applay_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $applay_end_datm = element('applay_end_day', $input) . ' ' . element('applay_end_hour', $input) . ':00:00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'LinkUrl' => element('link_url', $input),
                'Desc' => element('desc', $input),
                'ApplayStartDatm' => $applay_start_datm,
                'ApplayEndDatm' => $applay_end_datm,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['terms']) === false) {
                throw new \Exception('랜딩페이지 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}