<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobApprovalPolicyModel extends WB_Model
{
    private $_table = [
        'btob_code' => 'lms_btob_code',
        'btob_branch_approval_policy' => 'lms_btob_branch_approval_policy'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 수강부여제한정책 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listApprovalPolicy($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if (is_bool($is_count) === true) {
                $column = 'ACC.Ccd as AreaCcd, ACC.CcdName as AreaCcdName, BCC.Ccd as BranchCcd, BCC.CcdName as BranchCcdName, BCC.IsUse
                    , AP.ApplyStartDate, DATE_FORMAT(AP.ApplyStartDate, "%Y년 %c월") as ApplyStartYm
                    , DATE_FORMAT(AP.ApplyStartDate, "%Y") as ApplyStartYear, DATE_FORMAT(AP.ApplyStartDate, "%c") as ApplyStartMonth, AP.ApplyEndDate
                    , AP.LimitCnt, if(AP.PolicyIdx is null, null, if(AP.LimitCnt < 0, "N", "Y")) as IsLimit
                    , if(AP.PolicyIdx is null, "N", "Y") as IsRegist';
            } else {
                if ($is_count === 'excel') {
                    $column = 'ACC.CcdName as AreaCcdName, BCC.CcdName as BranchCcdName, DATE_FORMAT(AP.ApplyStartDate, "%Y년 %m월") as ApplyStartYm
                        , if(AP.PolicyIdx is null, "", if(AP.LimitCnt < 0, "제한없음", "제한있음")) as IsLimit, AP.LimitCnt';
                } else {
                    $column = $is_count;
                }
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['btob_code'] . ' as AC
                inner join ' . $this->_table['btob_code'] . ' as ACC
                    on AC.Ccd = ACC.GroupCcd and ACC.IsUse = "Y" and ACC.IsStatus = "Y"
                inner join ' . $this->_table['btob_code'] . ' as BC
                    on BC.ConnValue = ACC.Ccd and BC.GroupCcd = "0" and BC.IsUse = "Y" and BC.IsStatus = "Y"
                inner join ' . $this->_table['btob_code'] . ' as BCC
                    on BC.Ccd = BCC.GroupCcd and BCC.IsStatus = "Y"
                left join ' . $this->_table['btob_branch_approval_policy'] . ' as AP
                    on AC.BtobIdx = AP.BtobIdx and BCC.Ccd = AP.BranchCcd and AP.IsStatus = "Y"
            where AC.ConnValue = "branch"
                and AC.GroupCcd = "0"
                and AC.IsUse = "Y" 
                and AC.IsStatus = "Y"        
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 제휴사 지점별 수강부여제한정책 조회
     * @param int $btob_idx [제휴사식별자]
     * @param string $branch_ccd [지점공통코드]
     * @param string $select_type [조회구분 (A:해당월, P:직전월, N:직후월)]
     * @param null|string $start_date [적용시작일자]
     * @return array|mixed
     */
    public function getApprovalPolicy($btob_idx, $branch_ccd, $select_type = 'A', $start_date = null)
    {
        $column = 'PolicyIdx, BtobIdx, BranchCcd, ApplyStartDate, ApplyEndDate, LimitCnt';
        $arr_condition = ['EQ' => ['BtobIdx' => $btob_idx, 'BranchCcd' => $branch_ccd, 'IsStatus' => 'Y']];

        if ($select_type == 'P') {
            // 직전월
            $arr_condition['LT']['ApplyStartDate'] = $start_date;
            $arr_order_by = ['ApplyStartDate' => 'desc'];
        } elseif ($select_type == 'N') {
            // 직후월
            $arr_condition['GT']['ApplyStartDate'] = $start_date;
            $arr_order_by = ['ApplyStartDate' => 'asc'];
        } else {
            // 해당월
            $arr_condition['EQ']['ApplyStartDate'] = $start_date;
            $arr_order_by = ['PolicyIdx' => 'desc'];
        }

        return array_get($this->_conn->getListResult($this->_table['btob_branch_approval_policy'], $column, $arr_condition, 1, 0, $arr_order_by), '0');
    }

    /**
     * 제휴사 지점별 수강부여 제한건수 리턴
     * @param int $btob_idx [제휴사식별자]
     * @param string $branch_ccd [지점공통코드]
     * @return array|mixed
     */
    public function getCurrentApprovalLimitCnt($btob_idx, $branch_ccd)
    {
        // 해당 지점 당월 승인완료 제한건수 조회
        $arr_condition = [
            'EQ' => ['BtobIdx' => $btob_idx, 'BranchCcd' => $branch_ccd, 'IsStatus' => 'Y'],
            'RAW' => ['current_date() between' => ' ApplyStartDate and ApplyEndDate']
        ];

        return array_get($this->_conn->getListResult($this->_table['btob_branch_approval_policy'], 'LimitCnt', $arr_condition, 1, 0, ['PolicyIdx' => 'desc'])
            , '0.LimitCnt', -1);
    }

    /**
     * 제휴사 수강부여제한정책 등록
     * @param $input
     * @return array|bool
     */
    public function addApprovalPolicy($input)
    {
        $this->_conn->trans_begin();

        try {
            $sess_btob_idx = $this->session->userdata('btob.btob_idx');  // 제휴사식별자
            $sess_btob_admin_idx = $this->session->userdata('btob.admin_idx');  // 제휴사운영자식별자
            $branch_ccd = element('branch_ccd', $input);
            $start_date = element('start_year', $input) . '-' . str_pad(element('start_month', $input), 2, '0', STR_PAD_LEFT) . '-01';
            $end_date = '2100-12-31';
            $limit_cnt = element('is_limit', $input) === 'N' ? -1 : intval(element('limit_cnt', $input));
            $now_date = date('Y-m-01');     // 당월
            
            // 지점별 정책등록여부 확인
            $chk_row = $this->getApprovalPolicy($sess_btob_idx, $branch_ccd);
            if (empty($chk_row) === false) {
                if ($start_date <= $now_date) {
                    // 당월 포함 이전정보 등록 불가
                    throw new \Exception('당월 이후의 수강부여제한정보만 등록 가능합니다.', _HTTP_BAD_REQUEST);
                }

                // 해당월 정책등록여부 확인
                $eq_row = $this->getApprovalPolicy($sess_btob_idx, $branch_ccd, 'A', $start_date);
                if (empty($eq_row) === false) {
                    throw new \Exception('해당 월의 수강부여제한정보가 존재합니다.', _HTTP_BAD_REQUEST);
                }
                
                // 직전월 정책등록여부 확인
                $prev_row = $this->getApprovalPolicy($sess_btob_idx, $branch_ccd, 'P', $start_date);
                if (empty($prev_row) === false) {
                    // 직전월 정책이 있다면 직전월 종료일자 수정 (해당월 -1일)
                    $prev_end_date = date_compute($start_date, '-1 day', 'Y-m-d');
                    $is_prev_update = $this->_conn->set('ApplyEndDate', $prev_end_date)->set('UpdAdminIdx', $sess_btob_admin_idx)
                        ->where('PolicyIdx', $prev_row['PolicyIdx'])->where('BtobIdx', $sess_btob_idx)->where('BranchCcd', $branch_ccd)
                        ->where('ApplyStartDate', $prev_row['ApplyStartDate'])->where('IsStatus', 'Y')
                        ->update($this->_table['btob_branch_approval_policy']);
                    if ($is_prev_update === false) {
                        throw new \Exception('직전월 적용종료일 수정에 실패했습니다.', _HTTP_BAD_REQUEST);
                    }
                }
                
                // 직후월 정책등록여부 확인
                $next_row = $this->getApprovalPolicy($sess_btob_idx, $branch_ccd, 'N', $start_date);
                if (empty($next_row) === false) {
                    // 직후월 정책이 있다면 해당월 종료일자 변경 (직후월 -1일)
                    $end_date = date_compute($next_row['ApplyStartDate'], '-1 day', 'Y-m-d');
                }
            }

            // 신규 등록
            $data = [
                'BtobIdx' => $sess_btob_idx,
                'BranchCcd' => $branch_ccd,
                'ApplyStartDate' => $start_date,
                'ApplyEndDate' => $end_date,
                'LimitCnt' => $limit_cnt,
                'RegAdminIdx' => $sess_btob_admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['btob_branch_approval_policy']) === false) {
                throw new \Exception('수강부여제한정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 제휴사 수강부여제한정책 수정
     * @param $input
     * @return array|bool
     */
    public function modifyApprovalPolicy($input)
    {
        $this->_conn->trans_begin();

        try {
            $sess_btob_idx = $this->session->userdata('btob.btob_idx');  // 제휴사식별자
            $sess_btob_admin_idx = $this->session->userdata('btob.admin_idx');  // 제휴사운영자식별자
            $branch_ccd = element('branch_ccd', $input);
            $start_date = element('start_year', $input) . '-' . str_pad(element('start_month', $input), 2, '0', STR_PAD_LEFT) . '-01';
            $limit_cnt = element('is_limit', $input) === 'N' ? -1 : intval(element('limit_cnt', $input));
            $now_date = date('Y-m-01');     // 당월

            // 등록여부 확인
            $chk_row = $this->getApprovalPolicy($sess_btob_idx, $branch_ccd, 'A', $start_date);
            if (empty($chk_row) === true) {
                throw new \Exception('등록된 수강부여제한정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            if ($start_date < $now_date) {
                // 당월 이전정보 수정 불가
                throw new \Exception('당월 이후의 수강부여제한정보만 수정 가능합니다.', _HTTP_BAD_REQUEST);
            } elseif ($start_date == $now_date) {
                if ($chk_row['LimitCnt'] == -1 || ($limit_cnt > -1 && $limit_cnt <= $chk_row['LimitCnt'])) {
                    // 당월은 제한없음은 수정 불가, 제한있음일 경우 수량 증가만 가능
                    throw new \Exception('당월의 수강부여제한정보는 제한있음 정책의 부여건수 증가만 가능합니다.', _HTTP_BAD_REQUEST);
                }
            } else {
                if ($limit_cnt == $chk_row['LimitCnt']) {
                    // 당월 이후 변경된 정보가 없을 경우 수정 불가
                    throw new \Exception('변경된 수강부여제한정보가 없습니다.', _HTTP_BAD_REQUEST);
                }
            }

            // 이전정보 삭제처리
            $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_btob_admin_idx)
                ->where('PolicyIdx', $chk_row['PolicyIdx'])->where('BtobIdx', $sess_btob_idx)->where('BranchCcd', $branch_ccd)
                ->where('ApplyStartDate', $start_date)->where('IsStatus', 'Y')
                ->update($this->_table['btob_branch_approval_policy']);
            if ($is_update === false) {
                throw new \Exception('수강부여제한정보 수정에 실패했습니다.', _HTTP_BAD_REQUEST);
            }
            
            // 신규 등록
            $data = [
                'BtobIdx' => $sess_btob_idx,
                'BranchCcd' => $branch_ccd,
                'ApplyStartDate' => $start_date,
                'ApplyEndDate' => $chk_row['ApplyEndDate'],
                'LimitCnt' => $limit_cnt,
                'RegAdminIdx' => $sess_btob_admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['btob_branch_approval_policy']) === false) {
                throw new \Exception('수강부여제한정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
