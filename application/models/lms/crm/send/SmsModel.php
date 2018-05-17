<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsModel extends WB_Model
{
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_sms';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_membr_otherinfo';

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
                SMS.SendIdx, SMS.SiteCode, SMS.SendPatternCcd, SMS.SendTypeCcd, SMS.SendOptionCcd, SMS.SendStatusCcd, SMS.CsTel,
                CONCAT(LEFT(SMS.Content, 20), IF (CHAR_LENGTH(SMS.Content) > 20, " ...", "") ) as Content,
                SMS.SendDatm, SMS.RegDatm, SMS.RegAdminIdx,
                LS.SiteName, ADMIN.wAdminName
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
    public function listSmsDetail($is_count, $arr_condition = [], $send_idx, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SEND.SmsSendIdx, SEND.SendIdx, SEND.MemIdx, fn_dec(SEND.Receive_PhoneEnc) AS Receive_PhoneEnc, SEND.SmsRcvStatus, TM.Phone3 ,MEM.MemId, MEM.MemName
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
     * @param array $inputData
     * @param $set_mem_phone
     * @param $send_type
     * @return array|bool
     */
    public function addSms($inputData = [], $set_mem_phone, $send_type)
    {
        $this->_conn->trans_begin();
        try {
            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            // 등록된 발송식별자
            $send_idx = $this->_conn->insert_id();
            $result = $this->_addSendReceiveData($send_idx, $set_mem_phone, $send_type);
            if ($result['result'] != 1) {
                throw new \Exception('상세 정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
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
        $where = $this->_conn->makeWhere($arr_condition, true, false)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 발송데이터 상세 데이터 등록
     * @param $send_idx
     * @param $detail_datas
     * @param string $send_type
     * @return mixed
     */
    private function _addSendReceiveData($send_idx, $detail_datas, $send_type = '')
    {
        $this->_conn->query('CALL sp_send_detail_insert(?, ?, ?, ?, @_result)', [
            $send_idx, $detail_datas, ',', $send_type
        ]);

        return $this->_conn->query('SELECT @_result as result')->row_array();
    }

}