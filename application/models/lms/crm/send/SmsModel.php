<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsModel extends WB_Model
{
    private $_table = 'lms_crm_send_sms';
    private $_table_r_send_info = 'lms_crm_send_r_all_content';
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
                SMS.SendIdx, SMS.SiteCode, SMS.SendGroupTypeCcd, SMS.SendPatternCcd, SMS.SendTypeCcd, SMS.SendOptionCcd, SMS.SendStatusCcd,
                SMS.CsTel, SMS.Content, SMS.SendDatm, SMS.RegDatm, SMS.RegAdminIdx,
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
     * 발송 상세 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSmsDetail($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SendInfoIdx, SendIdx, SendGroupTypeCcd, MemIdx, MemId, MemName, MemEmail, MemPhone, MemSendAgreeStatus
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table_r_send_info}
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
     * @param $arr_member_data
     * @return array|bool
     */
    public function addSms($inputData = [], $arr_member_data)
    {
        $this->_conn->trans_begin();
        try {
            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }

            // 등록된 발송식별자
            $send_idx = $this->_conn->insert_id();

            $set_content_data = [];
            foreach ($arr_member_data as $key) {
                $set_content_data['SendIdx'] = $send_idx;
                $set_content_data['SendGroupTypeCcd'] = $inputData['SendGroupTypeCcd'];
                $set_content_data['MemPhone'] = $key['Phone'];
                $set_content_data['MemIdx'] = (empty($key['MemIdx']) === false) ? $key['MemIdx'] : '';
                $set_content_data['MemId'] = (empty($key['MemId']) === false) ? $key['MemId'] : '';
                $set_content_data['MemName'] = (empty($key['MemName']) === false) ? $key['MemName'] : '';
                $set_content_data['MemSendAgreeStatus'] = (empty($key['SmsRcvStatus']) === false) ? $key['SmsRcvStatus'] : 'N';

                if ($this->_addSmsContent($set_content_data) === false) {
                    throw new \Exception('등록에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return array(true, count($arr_member_data));
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
    public function getMemberList($is_count, $arr_condition = [], $column = '*', $limit = null, $offset = null, $order_by = [])
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

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    private function _addSmsContent($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_r_send_info) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}