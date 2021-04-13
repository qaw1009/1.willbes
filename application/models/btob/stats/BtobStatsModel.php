<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobStatsModel extends WB_Model
{
    private $_table = [
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'btob_code' => 'lms_btob_code',
        'btob_branch_approval_policy' => 'lms_btob_branch_approval_policy',
        'my_lecture' => 'lms_my_lecture',
        'member' => 'lms_member'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원연계통계
     * @param string $stats_type [통계구분 (branch: 누적, month: 월별)]
     * @param array $arr_condition
     * @return mixed
     */
    public function listCertStats($stats_type, $arr_condition = [])
    {
        if ($stats_type == 'branch') {
            $column = 'TA.AreaCcd, TA.BranchCcd, max(TA.AreaCcdName) as AreaCcdName, max(TA.BranchCcdName) as BranchCcdName';
            $group_by = 'TA.AreaCcd, TA.BranchCcd';
            $order_by = ['TA.AreaCcd' => 'asc', 'TA.BranchCcd' => 'asc'];
        } else {
            $column = 'TA.RegYm';
            $group_by = 'TA.RegYm';
            $order_by = ['TA.RegYm' => 'desc'];
        }

        $column .= '
            , count(0) as ApprovalApplyCnt
            , sum(if(TA.ApprovalStatus = "Y", 1, 0)) as ApprovalCompleteCnt
            , sum(if(TA.ApprovalStatus = "R", 1, 0)) as ApprovalRejectCnt
            , sum(if(TA.ApprovalStatus = "E", 1, 0)) as ApprovalExpireCnt            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $from = '
            from (
                select if(CA.ApprovalStatus = "Y" and CA.ApprovalExpireDatm < NOW(), "E", CA.ApprovalStatus) as ApprovalStatus
                    , CA.AreaCcd, CA.BranchCcd
                    , left(CA.RegDatm, 7) as RegYm                    
                    , M.BirthDay, M.Sex
                    , BCA.CcdName as AreaCcdName
                    , BCB.CcdName as BranchCcdName
                from ' . $this->_table['btob_cert_apply'] . ' as CA
                    inner join ' . $this->_table['member'] . ' as M
                        on CA.MemIdx = M.MemIdx
                    left join ' . $this->_table['btob_code'] . ' as BCA
                        on CA.AreaCcd = BCA.Ccd and BCA.IsStatus = "Y"
                    left join ' . $this->_table['btob_code'] . ' as BCB
                        on CA.BranchCcd = BCB.Ccd and BCB.IsStatus = "Y"			
                where CA.ApprovalStatus in ("Y", "R")
                    and CA.IsStatus = "Y"
                    ' . $where . '
            ) as TA   
            group by ' . $group_by . '
        ';

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 회원수강통계
     * @param string $stats_type [통계구분 (branch: 누적, month: 월별)]
     * @param array $arr_condition
     * @return mixed
     */
    public function listStudyStats($stats_type, $arr_condition = [])
    {
        if ($stats_type == 'branch') {
            $column = 'TA.AreaCcd, TA.BranchCcd, max(TA.AreaCcdName) as AreaCcdName, max(TA.BranchCcdName) as BranchCcdName';
            $group_by = 'TA.AreaCcd, TA.BranchCcd';
            $order_by = ['TA.AreaCcd' => 'asc', 'TA.BranchCcd' => 'asc'];
        } else {
            $column = 'TA.RegYm';
            $group_by = 'TA.RegYm';
            $order_by = ['TA.RegYm' => 'desc'];
        }

        $column .= '
            , round(sum(TA.StudyRate) / count(0), 2) as AvgStudyRate
            , sum(TA.StudyRate) as StudyRate
            , count(0) as StudyCnt
            , sum(if(TA.StudyRate >= 1, 1, 0)) as RealStudyCnt         
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $from = '
            from (
                select CA.AreaCcd, CA.BranchCcd
                    , left(CA.RegDatm, 7) as RegYm
                    , M.BirthDay, M.Sex
                    , ML.StudyRate                    
                    , BCA.CcdName as AreaCcdName
                    , BCB.CcdName as BranchCcdName	
                from ' . $this->_table['btob_cert_apply'] . ' as CA
                    inner join ' . $this->_table['member'] . ' as M
                        on CA.MemIdx = M.MemIdx
                    inner join ' . $this->_table['my_lecture'] . ' as ML
                        on CA.OrderIdx = ML.OrderIdx and ML.ProdCode != ML.ProdCodeSub
                    left join ' . $this->_table['btob_code'] . ' as BCA
                        on CA.AreaCcd = BCA.Ccd and BCA.IsStatus = "Y"
                    left join ' . $this->_table['btob_code'] . ' as BCB
                        on CA.BranchCcd = BCB.Ccd and BCB.IsStatus = "Y"			
                where CA.ApprovalStatus = "Y"
                    and CA.IsStatus = "Y"
                    ' . $where . '
            ) as TA	   
            group by ' . $group_by . '             
        ';

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 수강부여현황 통계
     * @param string $search_date [검색월 1일]
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listApprovalStats($search_date, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $approval_start_datm = $search_date . ' 00:00:00';  // 승인완료 시작일
        $approval_end_datm = date('Y-m-t', strtotime($search_date)) . ' 23:59:59';    // 승인완료 종료일

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if (is_bool($is_count) === true) {
                $column = 'ACC.Ccd as AreaCcd, ACC.CcdName as AreaCcdName, BCC.Ccd as BranchCcd, BCC.CcdName as BranchCcdName, BCC.IsUse
                    , AP.LimitCnt, if(AP.PolicyIdx is null, null, if(AP.LimitCnt < 0, "N", "Y")) as IsLimit
                    , ifnull(CA.CompleteCnt, 0) as CompleteCnt
                    , if(AP.PolicyIdx is null or AP.LimitCnt < 0, null, AP.LimitCnt - ifnull(CA.CompleteCnt, 0)) as RemainCnt';
            } else {
                if ($is_count === 'excel') {
                    $column = 'ACC.CcdName as AreaCcdName, BCC.CcdName as BranchCcdName
                        , if(AP.PolicyIdx is null, null, if(AP.LimitCnt < 0, "제한없음", AP.LimitCnt)) as LimitCnt
                        , ifnull(CA.CompleteCnt, 0) as CompleteCnt
                        , if(AP.PolicyIdx is null or AP.LimitCnt < 0, null, AP.LimitCnt - ifnull(CA.CompleteCnt, 0)) as RemainCnt';
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
                        and ? between AP.ApplyStartDate and AP.ApplyEndDate
                left join (
                    select BtobIdx, BranchCcd, count(0) as CompleteCnt
                    from ' . $this->_table['btob_cert_apply'] . '
                    where ApprovalStatus = "Y"
                        and ApprovalDatm between ? and ?
                    group by BtobIdx, BranchCcd
                ) as CA
                    on AC.BtobIdx = CA.BtobIdx and BCC.Ccd = CA.BranchCcd
            where AC.ConnValue = "branch"
                and AC.GroupCcd = "0"
                and AC.IsUse = "Y"
                and AC.IsStatus = "Y"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$search_date, $approval_start_datm, $approval_end_datm]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
