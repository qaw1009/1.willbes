<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DownloadFModel extends WB_Model
{
    protected $_table = [
        'lms_board_download_log' => 'lms_board_download_log'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function saveLog($idx=null)
    {
        $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);

        $input_data = [
            'BoardIdx' => $idx,
            'MemIdx' => (empty($this->session->userdata('mem_idx')) ? null : $this->session->userdata('mem_idx')),
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain ),
            'ReferPath' => (empty($refer_info) ? null : $refer_info ),
            'ReferQuery' => urldecode($_SERVER['QUERY_STRING']),
            'UserPlatform' =>$platform,
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];

        try {
            if ($this->_conn->set($input_data)->insert($this->_table['lms_board_download_log']) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    private function __userAgent(&$agent_short, &$agent, &$platform)
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
            $agent_short = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent_short = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent_short = $this->agent->mobile();
        }
        else
        {
            $agent_short = 'Unidentified User Agent';
        }

        $agent = $this->agent->agent_string();
        $platform = $this->agent->platform();
    }
}