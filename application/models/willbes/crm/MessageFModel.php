<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageFModel extends WB_Model
{
    private $_ccd = [
        'send_type_message' => '641002',    //발송종류 : SMS(641001), 쪽지(641002), 메일(641003)
        'send_status_success' => '639001'   //발송상태 : 성공(639001), 예약(639002), 취소(639003)
    ];
    protected $_table = [
        'crm_send' => 'lms_crm_send',
        'crm_send_message' => 'lms_crm_send_r_receive_message',
        'lms_crm_download_log' => 'lms_crm_download_log',
        'lms_site' => 'lms_site',
        'lms_site_group' => 'lms_site_group'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 쪽지관리 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param $sess_mem_idx
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMessage($is_count, $arr_condition = [], $sess_mem_idx, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'a.SendIdx, a.SendGroupTypeCcd, a.SiteCode, a.SendPatternCcd, a.SendTypeCcd, a.SendOptionCcd, a.SendStatusCcd, a.AdvertisePatternCcd,
            a.CsTelCcd, a.SendMail, a.SendAttachFilePath, a.SendAttachFileName, a.SendAttachRealFileName,
            a.Title, a.Content, a.AdvertiseAgreeContent, a.SendDatm, a.IsUse, a.IsStatus, a.RegDatm, a.RegDate, a.RcvDatm, a.RegAdminIdx, a.IsReceive,
            g.SiteName AS SiteName, g.IsCampus AS IsCampus, h.SiteGroupName AS SiteGroupName,
            IF(g.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType,
            IF(g.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name,
            CONCAT(a.SendAttachFilePath, a.SendAttachFileName) AS AttachData
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM (
                SELECT 
                    temp_a.SendIdx, temp_a.SendGroupTypeCcd, temp_a.SiteCode, temp_a.SendPatternCcd, temp_a.SendTypeCcd, temp_a.SendOptionCcd, temp_a.SendStatusCcd, temp_a.AdvertisePatternCcd,
                    temp_a.CsTelCcd, temp_a.SendMail, temp_a.SendAttachFilePath, temp_a.SendAttachFileName, temp_a.SendAttachRealFileName,
                    temp_a.Title, temp_a.Content, temp_a.AdvertiseAgreeContent, temp_a.SendDatm, temp_a.IsUse, temp_a.IsStatus,
                    RegDatm, DATE_FORMAT(temp_a.RegDatm, \"%Y-%m-%d\") AS RegDate, RcvDatm,
                    temp_a.RegAdminIdx, temp_b.IsReceive
                FROM {$this->_table['crm_send']} AS temp_a
                INNER JOIN (
                    SELECT SendIdx, MemIdx, IsReceive, RcvDatm
                    FROM {$this->_table['crm_send_message']}
                    WHERE MemIdx = '{$sess_mem_idx}' AND IsStatus = 'Y'
                    GROUP BY SendIdx
                ) AS temp_b ON temp_a.SendIdx = temp_b.SendIdx
            
                WHERE temp_a.SendGroupTypeCcd = '{$this->_ccd['send_type_message']}'
                AND temp_a.SendStatusCcd = '{$this->_ccd['send_status_success']}'
                AND temp_a.IsStatus = 'Y' AND temp_a.IsUse = 'Y'
            ) AS a
            INNER JOIN {$this->_table['lms_site']} AS g
                    ON (a.SiteCode = g.SiteCode
                        AND g.IsStatus = 'Y'
                        AND g.IsUse = 'Y')
            INNER JOIN {$this->_table['lms_site_group']} AS h
                   ON (g.SiteGroupCode = h.SiteGroupCode
                       AND h.IsStatus = 'Y'
                       AND h.IsUse = 'Y')
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 쪽지회원관리테이블 정보 수정
     * @param $arr_condition
     * @param $inputData
     * @return array|bool
     */
    public function updateReceiveMessage($arr_condition, $inputData)
    {
        $this->_conn->trans_begin();
        try {
            $this->_conn->set($inputData)->where($arr_condition);
            if ($this->_conn->update($this->_table['crm_send_message']) === false) {
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
     * 파일 다운로드 로그
     * @param $idx
     * @return array|bool
     */
    public function saveLog($idx)
    {
        $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);

        $input_data = [
            'SendIdx' => $idx,
            'MemIdx' => (empty($this->session->userdata('mem_idx')) ? null : $this->session->userdata('mem_idx')),
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain ),
            'ReferPath' => (empty($refer_info) ? null : $refer_info ),
            'ReferQuery' => urldecode($_SERVER['QUERY_STRING']),
            'UserPlatform' =>$platform,
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];

        try {
            if ($this->_conn->set($input_data)->insert($this->_table['lms_crm_download_log']) === false) {
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