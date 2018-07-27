<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// TODO : 추후 회원 모델과 병합 예정
class SearchMemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo'
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
            $column = 'M.MemIdx, M.SiteCode, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as Phone, M.Phone3, M.PhoneEnc, M.JoinDate
                , fn_dec(M.MailEnc) as Mail, MO.ZipCode, MO.Addr1, fn_dec(MO.Addr2Enc) as Addr2
            ';
        }

        return $this->_conn->getJoinListResult($this->_table['member'] . ' as M', 'inner', $this->_table['member_otherinfo'] . ' as MO',
            'M.MemIdx = MO.MemIdx', $column, $arr_condition, $limit, $offset, $order_by);
    }
}
