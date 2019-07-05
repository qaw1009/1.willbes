<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCertFModel extends WB_Model
{
    private $_table = [
        'btob' => 'lms_btob',
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'product' => 'lms_product',
        'product_r_btob' => 'lms_product_r_btob'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 정보 조회
     * @param string $btob_id
     * @return array
     */
    public function findBtobByBtobId($btob_id)
    {
        $arr_condition = ['EQ' => ['BtobId' => get_var($btob_id, 'none'), 'IsUse' => 'Y', 'IsStatus' => 'Y']];

        return $this->_conn->getFindResult($this->_table['btob'], 'BtobIdx, BtobId, BtobName', $arr_condition);
    }

    /**
     * 제휴사 연결상품 조회
     * @param int $btob_idx
     * @return array
     */
    public function getBtobProduct($btob_idx)
    {
        $arr_condition = ['EQ' => ['PB.BtobIdx' => get_var($btob_idx, '-1'), 'PB.IsStatus' => 'Y', 'P.IsStatus' => 'Y']];

        return $this->_conn->getJoinListResult($this->_table['product'] . ' as P', 'inner', $this->_table['product_r_btob'] . ' as PB'
            , 'P.ProdCode = PB.ProdCode', 'P.ProdCode, P.SiteCode, P.ProdName', $arr_condition
        );
    }

    /**
     * 제휴사 인증신청 등록
     * @param array $input
     * @return array|bool
     */
    public function addCertApply($input)
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원식별자
            $btob_id = element('btob_id', $input);

            // 제휴사 정보 조회
            $row = $this->findBtobByBtobId($btob_id);
            if (empty($row) === true) {
                throw new \Exception('제휴사 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 인증신청 가능여부 확인
            if ($this->_checkCertApply($row['BtobIdx'], $sess_mem_idx) === false) {
                throw new \Exception('이미 인증신청 하셨습니다.', _HTTP_BAD_REQUEST);
            }

            // 인증신청 등록
            $data = [
                'BtobIdx' => $row['BtobIdx'],
                'MemIdx' => $sess_mem_idx,
                'ApplySeq' => $this->_getApplySeq($row['BtobIdx'], $sess_mem_idx),
                'SiteCode' => element('site_code', $input),
                'ProdCode' => element('prod_code', $input),
                'AreaCcd' => element('area_ccd', $input),
                'BranchCcd' => element('branch_ccd', $input),
                'TakeKindCcd' => element('take_kind_ccd', $input),
                'ApprovalStatus' => 'N',
                'RegIp' => $this->input->ip_address()
            ];

            $is_insert = $this->_conn->set($data)->insert($this->_table['btob_cert_apply']);
            if ($is_insert === false) {
                throw new \Exception('인증신청 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 제휴사 인증신청 가능 여부
     * @param int $btob_idx
     * @param int $mem_idx
     * @return bool
     */
    private function _checkCertApply($btob_idx, $mem_idx)
    {
        $query = /** @lang text */ '
            select ApplyIdx 
            from ' . $this->_table['btob_cert_apply'] . '
            where BtobIdx = ? and MemIdx = ?
                and (ApprovalStatus = "N" or (ApprovalStatus = "Y" and ApprovalExpireDatm > NOW()))
            limit 1                
        ';

        $result = $this->_conn->query($query, [$btob_idx, $mem_idx])->result_array();

        return empty($result);
    }

    /**
     * 제휴사 인증신청 다음 회차 조회
     * @param int $btob_idx
     * @param int $mem_idx
     * @return mixed
     */
    private function _getApplySeq($btob_idx, $mem_idx)
    {
        return $this->_conn->getFindResult($this->_table['btob_cert_apply'],'ifnull(max(ApplySeq), 0) + 1 as NextApplySeq', [
            'EQ' => ['BtobIdx' => $btob_idx, 'MemIdx' => $mem_idx]
        ])['NextApplySeq'];
    }
}
