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
            a.CsTel, a.SendMail, a.SendAttachFilePath, a.SendAttachFileName, a.SendAttachRealFileName,
            a.Title, a.Content, a.AdvertiseAgreeContent, a.SendDatm, a.IsUse, a.IsStatus, a.RegDatm, a.RegAdminIdx, a.IsReceive,
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
                    temp_a.CsTel, temp_a.SendMail, temp_a.SendAttachFilePath, temp_a.SendAttachFileName, temp_a.SendAttachRealFileName,
                    temp_a.Title, temp_a.Content, temp_a.AdvertiseAgreeContent, temp_a.SendDatm, temp_a.IsUse, temp_a.IsStatus,
                    DATE_FORMAT(temp_a.RegDatm, \"%Y-%m-%d\") AS RegDatm,
                    temp_a.RegAdminIdx, temp_b.IsReceive
                FROM {$this->_table['crm_send']} AS temp_a
                INNER JOIN (
                    SELECT SendIdx, MemIdx, IsReceive
                    FROM {$this->_table['crm_send_message']}
                    WHERE MemIdx = '{$sess_mem_idx}'
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
}