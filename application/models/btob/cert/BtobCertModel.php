<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCertModel extends WB_Model
{
    private $_table = [
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'btob_member' => 'lms_btob_r_member',
        'btob_admin' => 'lms_btob_admin',
        'btob_code' => 'lms_btob_code',
        'product' => 'lms_product',
        'member' => 'lms_member'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 인증신청 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listCertApply($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'CA.ApplyIdx, CA.BtobIdx, CA.MemIdx, CA.ApplySeq, CA.SiteCode, CA.ProdCode, CA.OrderIdx, CA.LecStartDate, CA.LecEndDate
                , CA.ApprovalDatm, CA.ApprovalExpireDatm, CA.RegDatm
                , M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone, P.ProdName
                , AC.CcdName as AreaCcdName, BC.CcdName as BranchCcdName, TKC.CcdName as TakeKindCcdName
                , AAP.AdminName as ApprovalAdminName
                , if(CA.ApprovalStatus = "Y" and CA.ApprovalExpireDatm < NOW(), "E", CA.ApprovalStatus) as ApprovalStatus
                , if(CA.ApprovalStatus = "R", CA.StatusUpdDatm, null) as ApprovalRejectDatm
                , if(CA.ApprovalStatus = "R", SUA.AdminName, null) as ApprovalRejectAdminName
                , if(CA.ApprovalStatus = "C", CA.StatusUpdDatm, null) as ApprovalCancelDatm	
                , if(CA.ApprovalStatus = "C", SUA.AdminName, null) as ApprovalCancelAdminName                
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['btob_cert_apply'] . ' as CA
                inner join ' . $this->_table['member'] . ' as M
                    on CA.MemIdx = M.MemIdx
                left join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode and P.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as AC
                    on CA.AreaCcd = AC.Ccd and AC.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as BC
                    on CA.BranchCcd = BC.Ccd and BC.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as TKC
                    on CA.TakeKindCcd = TKC.Ccd and TKC.IsStatus = "Y"		
                left join ' . $this->_table['btob_admin'] . ' as AAP					
                    on CA.ApprovalAdminIdx = AAP.AdminIdx and AAP.IsStatus = "Y"
                left join ' . $this->_table['btob_admin'] . ' as SUA
                    on CA.StatusUpdAdminIdx = SUA.AdminIdx and SUA.IsStatus = "Y"                     
            where CA.IsStatus = "Y"        
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        if ($is_count === 'excel') {
            $excel_column = 'ApplySeq, MemName, MemId, MemPhone, AreaCcdName, BranchCcdName, RegDatm, TakeKindCcdName, ProdName, ApprovalStatus
                , ApprovalAdminName, ApprovalDatm, ApprovalRejectAdminName, ApprovalRejectDatm, ApprovalCancelAdminName, ApprovalCancelDatm, ApprovalExpireDatm';
            $query = 'select ' . $excel_column . ' from (select ' . $column . $from . $where . ') as ED' . $order_by_offset_limit;
        } else {
            $query = 'select ' . $column . $from . $where . $order_by_offset_limit;
        }

        // 쿼리 실행
        $query = $this->_conn->query($query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 제휴사 인증신청 데이터 조회 by ApplyIdx
     * @param $apply_idx
     * @return mixed
     */
    public function findCertApplyByApplyIdx($apply_idx)
    {
        $arr_condition = ['EQ' => ['CA.ApplyIdx' => $apply_idx]];
        $data = $this->listCertApply(false, $arr_condition);
        return element('0', $data, []);
    }

    /**
     * 제휴사 인증신청 승인 처리
     * @param $input
     * @return array|bool
     */
    public function procCertApproval($input)
    {
        $this->_conn->trans_begin();

        try {
            $sess_btob_idx = $this->session->userdata('btob.btob_idx');  // 제휴사식별자
            $apply_idx = element('idx', $input, 0);  // 인증신청식별자
            $approval_status = element('approval_status', $input);  // 변경 진행상태
            $result = null;     // 승인처리 결과값

            // 인증신청 정보 조회
            $apply_row = $this->findCertApplyByApplyIdx($apply_idx);
            if (empty($apply_row) === true) {
                throw new \Exception('인증신청 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            if ($apply_row['BtobIdx'] != $sess_btob_idx) {
                throw new \Exception('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
            }

            // 변경 진행상태별 체크
            if ($approval_status == 'R' || $approval_status == 'Y') {
                if ($apply_row['ApprovalStatus'] != 'N') {
                    throw new \Exception('진행상태가 미승인 상태일 경우만 가능합니다.', _HTTP_BAD_REQUEST);
                }

                if ($approval_status == 'Y') {
                    // 이미 승인완료된 데이터가 있는지 여부 체크
                    $prev_rows = $this->listCertApply(false, [
                        'EQ' => ['CA.BtobIdx' => $sess_btob_idx, 'CA.MemIdx' => $apply_row['MemIdx'], 'CA.ApprovalStatus' => 'Y'],
                        'RAW' => ['CA.ApprovalExpireDatm >' => 'NOW()']
                    ]);

                    if (empty($prev_rows) === false) {
                        throw new \Exception('이미 승인완료된 데이터가 있습니다.', _HTTP_BAD_REQUEST);
                    }
                }
            } elseif ($approval_status == 'C') {
                if ($apply_row['ApprovalStatus'] != 'Y') {
                    throw new \Exception('진행상태가 승인완료 상태일 경우만 가능합니다.', _HTTP_BAD_REQUEST);
                }
            } else {
                throw new \Exception('승인반려/완료/취소만 처리 가능합니다.', _HTTP_BAD_REQUEST);
            }

            // 변경 진행상태별 프로세스 진행
            if ($approval_status == 'Y') {
                // 승인완료 (주문등록)
                $result = $this->_addOrder($sess_btob_idx, $apply_idx, array_merge($input, $apply_row));
                if ($result['ret_cd'] === false) {
                    throw new \Exception($result['ret_msg']);
                }

                $input['order_idx'] = $result['ret_data'];  // 주문식별자
            } elseif ($approval_status == 'C') {
                // 승인취소 (환불처리)
                $result = $this->_refundOrder($sess_btob_idx, $apply_idx, $apply_row);
                if ($result['ret_cd'] === false) {
                    throw new \Exception($result['ret_msg']);
                }
            } else {
                $result['ret_cd'] = true;
            }

            if ($result['ret_cd'] === true) {
                // 제휴사 회원 등록/삭제 (승인완료/취소일 경우만)
                $is_member = $this->_replaceBtobMember($sess_btob_idx, $apply_row['MemIdx'], $approval_status);
                if ($is_member !== true) {
                    throw new \Exception($is_member);
                }

                // 진행상태 변경
                $is_update = $this->_modifyCertApply($sess_btob_idx, $apply_idx, $approval_status, $input);
                if ($is_update !== true) {
                    throw new \Exception($is_update);
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 승인완료 주문등록
     * @param int $btob_idx
     * @param int $apply_idx
     * @param array $input [입력폼 + 신청정보 데이터]
     * @return array
     */
    private function _addOrder($btob_idx, $apply_idx, $input)
    {
        try {
            $sess_btob_lms_admin_idx = $this->session->userdata('btob.lms_admin_idx');  // LMS 운영자식별자
            $sess_btob_name = $this->session->userdata('btob.btob_name');    // 제휴사명

            // 주문 모델로드
            $this->load->loadModels(['_lms/pay/order']);

            // 상품정보 조회
            $prod_code = element('ProdCode', $input);
            $prod_row = element('0', $this->salesProductModel->findRawProductByProdCode($prod_code));
            if (empty($prod_row) === true) {
                throw new \Exception('상품정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 주문 데이터
            $admin_reason_ccd = '705002';   // 제휴부여
            $order_data = [
                'btob_idx' => $btob_idx,
                'btob_ca_idx' => $apply_idx,
                'mem_idx' => [element('MemIdx', $input)],
                'site_code' => $prod_row['SiteCode'],
                'prod_code' => [$prod_row['ProdCode'] . ':' . $prod_row['ProdTypeCcd'] . ':' . $prod_row['LearnPatternCcd']],
                'real_pay_price' => 0,
                'lec_start_date' => element('lec_start_date', $input),
                'lec_expire_day' => diff_days(element('lec_end_date', $input), element('lec_start_date', $input)) + 1,
                'admin_reason_ccd' => $admin_reason_ccd,
                'admin_etc_reason' => '제휴사 인증 승인완료 (' . $sess_btob_name . ')',
                'reg_admin_idx' => $sess_btob_lms_admin_idx
            ];

            // 주문등록
            $is_order = $this->orderModel->_procAdminOrder('zero', $order_data);
            if ($is_order !== true) {
                throw new \Exception($is_order);
            }

            // 등록된 주문식별자 조회
            $order_row = $this->_conn->getListResult($this->orderModel->_table['order'], 'OrderIdx', [
                'EQ' => [
                    'BtobIdx' => $btob_idx,
                    'BtobCaIdx' => $apply_idx,
                    'MemIdx' => element('MemIdx', $input)
                ]
            ], 1, 0, ['OrderIdx' => 'desc']);

            // 주문식별자
            $ret_data = array_get($order_row, '0.OrderIdx');
        } catch (\Exception $e) {
            return ['ret_cd' => false, 'ret_msg' => $e->getMessage(), 'ret_data' => null];
        }

        return ['ret_cd' => true, 'ret_msg' => '', 'ret_data' => $ret_data];
    }

    /**
     * 승인취소 환불처리
     * @param int $btob_idx
     * @param int $apply_idx
     * @param array $input [신청정보 데이터]
     * @return array
     */
    private function _refundOrder($btob_idx, $apply_idx, $input)
    {
        try {
            $sess_btob_lms_admin_idx = $this->session->userdata('btob.lms_admin_idx');  // LMS 운영자식별자
            $sess_btob_name = $this->session->userdata('btob.btob_name');    // 제휴사명

            // 주문 모델로드
            $this->load->loadModels(['_lms/pay/order']);

            // 주문상품 조회
            $order_idx = element('OrderIdx', $input);
            $order_prod_rows = $this->_conn->getJoinListResult($this->orderModel->_table['order'] . ' as O', 'inner'
                , $this->orderModel->_table['order_product'] . ' as OP', 'O.OrderIdx = OP.OrderIdx', 'OP.OrderProdIdx', [
                    'EQ' => [
                        'O.OrderIdx' => $order_idx,
                        'O.MemIdx' => element('MemIdx', $input),
                        'O.BtobIdx' => $btob_idx,
                        'O.BtobCaIdx' => $apply_idx
                    ]
                ]
            );
            if (empty($order_prod_rows) === true) {
                throw new \Exception('주문상품 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 환불요청 주문상품 파라미터 가공
            $params = [];
            foreach ($order_prod_rows as $row) {
                $params[$row['OrderProdIdx']] = [
                    'card_refund_price' => 0,
                    'cash_refund_price' => 0,
                    'sub_refund_price' => '',
                    'is_coupon_refund' => 'N',
                    'is_point_refund' => 'N'
                ];
            }
            $order_prod_param = base64_encode(json_encode($params));

            // 환불 데이터
            $refund_data = [
                'order_idx' => $order_idx,
                'params' => $order_prod_param,
                'refund_reason' => '제휴사 인증 승인취소 (' . $sess_btob_name . ')',
                'refund_admin_idx' => $sess_btob_lms_admin_idx
            ];

            // 환불처리
            $is_refund = $this->orderModel->refundOrderProduct($refund_data);
            if ($is_refund !== true) {
                throw new \Exception($is_refund);
            }
        } catch (\Exception $e) {
            return ['ret_cd' => false, 'ret_msg' => $e->getMessage()];
        }

        return ['ret_cd' => true, 'ret_msg' => ''];
    }

    /**
     * 제휴사 회원 등록/삭제
     * @param int $btob_idx
     * @param int $mem_idx
     * @param string $approval_status
     * @return bool|string
     */
    private function _replaceBtobMember($btob_idx, $mem_idx, $approval_status)
    {
        try {
            $sess_btob_lms_admin_idx = $this->session->userdata('btob.lms_admin_idx');  // LMS 운영자식별자

            if ($approval_status == 'Y') {
                // 기존 제휴사 회원이라면 신규 등록안함
                $prev_row = $this->_conn->getListResult($this->_table['btob_member'], 'BmIdx', [
                    'EQ' => ['BtobIdx' => $btob_idx, 'MemIdx' => $mem_idx, 'IsStatus' => 'Y']
                ]);
                if (empty($prev_row) === false) {
                    return true;
                }

                // 제휴사 회원 등록
                $data = ['BtobIdx' => $btob_idx, 'MemIdx' => $mem_idx, 'RegAdminIdx' => $sess_btob_lms_admin_idx];
                $is_insert = $this->_conn->set($data)->insert($this->_table['btob_member']);
                if ($is_insert === false) {
                    throw new \Exception('제휴사 회원 등록에 실패했습니다.');
                }
            } elseif ($approval_status == 'C') {
                $data = ['IsStatus' => 'N', 'UpdAdminIdx' => $sess_btob_lms_admin_idx];
                $is_update = $this->_conn->set($data)->where('BtobIdx', $btob_idx)->where('MemIdx', $mem_idx)->update($this->_table['btob_member']);
                if ($is_update === false) {
                    throw new \Exception('제휴사 회원 삭제에 실패했습니다.');
                }
            } else {
                return true;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 제휴사 인증신청 정보 수정
     * @param int $btob_idx
     * @param int $apply_idx
     * @param string $approval_status
     * @param array $input
     * @return bool|string
     */
    private function _modifyCertApply($btob_idx, $apply_idx, $approval_status, $input = [])
    {
        try {
            $sess_btob_admin_idx = $this->session->userdata('btob.admin_idx');  // 제휴사관리자식별자
            $data = ['ApprovalStatus' => $approval_status]; // 진행상태

            if ($approval_status == 'R' || $approval_status == 'C') {
                // 승인반려, 승인취소
                $date_column = 'StatusUpdDatm';
                $data = array_merge($data, ['StatusUpdAdminIdx' => $sess_btob_admin_idx]);
            } elseif ($approval_status == 'Y') {
                // 승인완료
                $date_column = 'ApprovalDatm';
                $data = array_merge($data, [
                    'ApprovalAdminIdx' => $sess_btob_admin_idx,
                    'ApprovalExpireDatm' => element('lec_end_date', $input) . ' 23:59:59',
                    'OrderIdx' => element('order_idx', $input),
                    'LecStartDate' => element('lec_start_date', $input),
                    'LecEndDate' => element('lec_end_date', $input)
                ]);
            } else {
                throw new \Exception('승인반려/완료/취소만 처리 가능합니다.', _HTTP_BAD_REQUEST);
            }

            $is_update = $this->_conn->set($data)->set($date_column, 'NOW()', false)
                ->where('ApplyIdx', $apply_idx)->where('BtobIdx', $btob_idx)
                ->update($this->_table['btob_cert_apply']);
            if ($is_update === false || $this->_conn->affected_rows() < 1) {
                throw new \Exception('인증신청 정보 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
