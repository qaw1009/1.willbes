<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobStatsModel extends WB_Model
{
    private $_table = [
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'btob_code' => 'lms_btob_code',
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
}
