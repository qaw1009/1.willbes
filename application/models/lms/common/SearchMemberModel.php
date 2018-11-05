<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'site' => 'lms_site'
    ];
    
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원 검색 (결제관리 > 회원 검색)
     * @param bool $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSearchMember($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column === false) {
            $column = 'M.MemIdx, M.SiteCode, M.MemId, M.MemName, M.BirthDay, M.Sex, fn_dec(M.PhoneEnc) as Phone, M.Phone3, M.PhoneEnc, M.JoinDate
                , fn_dec(M.MailEnc) as Mail, MO.ZipCode, MO.Addr1, fn_dec(MO.Addr2Enc) as Addr2, MO.SmsRcvStatus, MO.MailRcvStatus
                , (select SiteName from ' . $this->_table['site'] . ' where SiteCode = M.SiteCode) as SiteName 
            ';
        }

        return $this->_conn->getJoinListResult($this->_table['member'] . ' as M', 'inner', $this->_table['member_otherinfo'] . ' as MO',
            'M.MemIdx = MO.MemIdx', $column, $arr_condition, $limit, $offset, $order_by);
    }
}
