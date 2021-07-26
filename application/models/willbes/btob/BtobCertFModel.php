<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCertFModel extends WB_Model
{
    private $_table = [
        'btob' => 'lms_btob',
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'btob_branch_approval_policy' => 'lms_btob_branch_approval_policy',
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
     * 최종 제휴사 인증신청 목록 조회
     * @param int $btob_idx
     * @param int $mem_idx
     * @param null|int $apply_idx
     * @return array
     */
    public function getLastCertApply($btob_idx, $mem_idx, $apply_idx = null)
    {
        $arr_condition = ['EQ' => ['BtobIdx' => get_var($btob_idx, '-1'), 'MemIdx' => get_var($mem_idx, '-1'), 'ApplyIdx' => $apply_idx, 'IsStatus' => 'Y']];
        $column = 'ApplyIdx, SiteCode, ProdCode, AreaCcd, BranchCcd, TakeKindCcd, if(ApprovalStatus = "Y" and ApprovalExpireDatm < NOW(), "E", ApprovalStatus) as ApprovalStatus';

        return element('0', $this->_conn->getListResult($this->_table['btob_cert_apply'], $column, $arr_condition, 1, 0, ['ApplyIdx' => 'desc']));
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
            $branch_ccd = element('branch_ccd', $input);

            // 제휴사 정보 조회
            $row = $this->findBtobByBtobId($btob_id);
            if (empty($row) === true) {
                throw new \Exception('제휴사 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 인증신청 가능여부 확인
            $is_check = $this->_checkCertApply($row['BtobIdx'], $sess_mem_idx, $branch_ccd);
            if ($is_check !== true) {
                throw new \Exception($is_check, _HTTP_BAD_REQUEST);
            }

            // 인증신청 등록
            $data = [
                'BtobIdx' => $row['BtobIdx'],
                'MemIdx' => $sess_mem_idx,
                'ApplySeq' => $this->_getApplySeq($row['BtobIdx'], $sess_mem_idx),
                'SiteCode' => element('site_code', $input),
                'ProdCode' => element('prod_code', $input),
                'AreaCcd' => element('area_ccd', $input),
                'BranchCcd' => $branch_ccd,
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
     * 제휴사 인증신청 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCertApply($input)
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원식별자
            $btob_id = element('btob_id', $input);
            $apply_idx = element('apply_idx', $input);  // 인증식별자
            $branch_ccd = element('branch_ccd', $input);

            // 제휴사 정보 조회
            $row = $this->findBtobByBtobId($btob_id);
            if (empty($row) === true) {
                throw new \Exception('제휴사 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 인증정보 조회
            $chk_row = $this->getLastCertApply($row['BtobIdx'], $sess_mem_idx, $apply_idx);
            if (empty($chk_row) === true) {
                throw new \Exception('제휴사 인증신청 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 미승인 상태일 경우만 수정 가능
            if ($chk_row['ApprovalStatus'] != 'N') {
                throw new \Exception('진행상태가 신청완료일 경우만 수정 가능합니다.', _HTTP_BAD_REQUEST);
            }

            // 지점별 당월 승인완료 제한건수 체크
            $limit_check = $this->_checkApprovalLimitCnt($row['BtobIdx'], $branch_ccd);
            if ($limit_check !== true) {
                throw new \Exception($limit_check);
            }

            // 인증신청 수정
            $data = [
                'SiteCode' => element('site_code', $input),
                'ProdCode' => element('prod_code', $input),
                'AreaCcd' => element('area_ccd', $input),
                'BranchCcd' => $branch_ccd,
                'TakeKindCcd' => element('take_kind_ccd', $input)
            ];

            $is_update = $this->_conn->set($data)->set('UpdDatm', 'NOW()', false)
                ->where('ApplyIdx', $apply_idx)->where('BtobIdx', $row['BtobIdx'])->where('MemIdx', $sess_mem_idx)
                ->update($this->_table['btob_cert_apply']);
            if ($is_update === false) {
                throw new \Exception('인증신청 정보 수정에 실패했습니다.');
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
     * @param string $branch_ccd
     * @return bool|string
     */
    private function _checkCertApply($btob_idx, $mem_idx, $branch_ccd)
    {
        // 1. 기신청여부 체크
        $query = /** @lang text */ '
            select ApplyIdx 
            from ' . $this->_table['btob_cert_apply'] . '
            where BtobIdx = ? and MemIdx = ?
                and (ApprovalStatus = "N" or (ApprovalStatus = "Y" and ApprovalExpireDatm > NOW()))
            limit 1                
        ';

        $apply_rows = $this->_conn->query($query, [$btob_idx, $mem_idx])->result_array();
        if (empty($apply_rows) === false) {
            return '이미 인증신청 하셨습니다.';
        }

        // 2. 지점별 당월 승인완료 제한건수 체크
        $limit_check = $this->_checkApprovalLimitCnt($btob_idx, $branch_ccd);
        if ($limit_check !== true) {
            return $limit_check;
        }

        return true;
    }

    /**
     * 제휴사 지점별 당월 승인완료 제한건수 체크
     * @param int $btob_idx
     * @param string $branch_ccd
     * @return bool|string
     */
    private function _checkApprovalLimitCnt($btob_idx, $branch_ccd)
    {
        // 해당 지점 당월 승인완료 제한건수 조회
        $arr_policy_condition = [
            'EQ' => ['BtobIdx' => $btob_idx, 'BranchCcd' => $branch_ccd, 'IsStatus' => 'Y'],
            'RAW' => ['current_date() between' => ' ApplyStartDate and ApplyEndDate']
        ];
        $limit_cnt = array_get($this->_conn->getListResult($this->_table['btob_branch_approval_policy'], 'LimitCnt', $arr_policy_condition, 1, 0, ['PolicyIdx' => 'desc'])
            , '0.LimitCnt', -1);

        // 제한없음이 아닐 경우
        if ($limit_cnt > -1) {
            // 해당 지점 승인완료 건수 조회
            $arr_cnt_condition = [
                'EQ' => ['BtobIdx' => $btob_idx, 'BranchCcd' => $branch_ccd, 'ApprovalStatus' => 'Y'],
                'BDT' => ['ApprovalDatm' => [date('Y-m-01'), date('Y-m-t')]]
            ];
            $complete_cnt = $this->_conn->getFindResult($this->_table['btob_cert_apply'], true, $arr_cnt_condition);

            if ($limit_cnt <= $complete_cnt) {
                return '해당 지점 수강부여(승인완료) 가능한 개수가 초과되어 인증 신청이 불가능합니다.';
            }
        }

        return true;
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
