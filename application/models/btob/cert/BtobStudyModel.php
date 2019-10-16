<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobStudyModel extends WB_Model
{
    private $_table = [
        'btob_cert_apply' => 'lms_btob_cert_apply',
        'btob_code' => 'lms_btob_code',
        'on_mylecture' => 'vw_on_mylecture',
        'unit_mylecture' => 'vw_unit_mylecture',
        'product' => 'lms_product',
        'member' => 'lms_member'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 수강회원 목록
     * @param $btob_idx
     * @param $branch_ccd
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listStudyMember($btob_idx, $branch_ccd, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'TA.MemIdx, TA.ApprovalCompleteCnt, TA.LastApplyIdx
                , M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone, M.BirthDay, M.Sex, if(M.Sex = "M", "남", "여") as SexKr';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        
        // 지점 조건 추가
        $ta_where = '';
        if (is_bool($branch_ccd) === false && empty($branch_ccd) === false) {
            $ta_where .= ' and BranchCcd = ' . $this->_conn->escape($branch_ccd);
        }

        $from = '
            from (
                select MemIdx, count(0) as ApprovalCompleteCnt, max(ApplyIdx) as LastApplyIdx
                from ' . $this->_table['btob_cert_apply'] . '
                where BtobIdx = ?
                    ' . $ta_where . '
                    and ApprovalStatus = "Y"
                    and IsStatus = "Y"
                group by MemIdx
            ) as TA	
                inner join ' . $this->_table['member'] . ' as M
                    on TA.MemIdx = M.MemIdx            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        if ($is_count === 'excel') {
            $excel_column = 'MemName, MemId, SexKr, BirthDay, MemPhone';
            $query = 'select ' . $excel_column . ' from (select ' . $column . $from . $where . ') as ED' . $order_by_offset_limit;
        } else {
            $query = 'select ' . $column . $from . $where . $order_by_offset_limit;
        }

        // 쿼리 실행
        $query = $this->_conn->query($query, [$btob_idx]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();        
    }

    /**
     * 제휴사 수강회원 조회
     * @param $btob_idx
     * @param $branch_ccd
     * @param $apply_idx
     * @return mixed
     */
    public function findStudyMember($btob_idx, $branch_ccd, $apply_idx)
    {
        $column = 'CA.MemIdx, M.MemId, M.MemName, fn_dec(M.PhoneEnc) as MemPhone, M.BirthDay, M.Sex, if(M.Sex = "M", "남", "여") as SexKr';
        $arr_condition = ['EQ' => ['CA.BtobIdx' => $btob_idx, 'CA.ApplyIdx' => get_var($apply_idx, '-1'), 'CA.ApprovalStatus' => 'Y', 'CA.IsStatus' => 'Y']];

        // 지점 조건 추가
        if (is_bool($branch_ccd) === false && empty($branch_ccd) === false) {
            $arr_condition['EQ']['CA.BranchCcd'] = $branch_ccd;
        }

        return $this->_conn->getJoinFindResult($this->_table['btob_cert_apply'] . ' as CA', 'inner', $this->_table['member'] . ' as M'
            , 'CA.MemIdx = M.MemIdx', $column, $arr_condition
        );
    }

    /**
     * 제휴사 회원별 상품 목록 (기간제패키지)
     * @param $btob_idx
     * @param $mem_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function listStudyMemberProduct($btob_idx, $mem_idx, $arr_condition = [])
    {
        $column = 'CA.ApplyIdx, CA.ApplySeq, CA.OrderIdx, CA.ProdCode, CA.AreaCcd, CA.BranchCcd, CA.TakeKindCcd, CA.LecStartDate, CA.LecEndDate, CA.RegDatm
            , if(CA.ApprovalStatus = "Y" and CA.ApprovalExpireDatm < NOW(), "E", CA.ApprovalStatus) as ApprovalStatus
            , (datediff(CA.LecEndDate, CA.LecStartDate) + 1) as LecExpireDay
            , P.ProdName
            , BCA.CcdName as AreaCcdName
            , BCB.CcdName as BranchCcdName
            , BCT.CcdName as TakeKindCcdName';

        $from = '
            from ' . $this->_table['btob_cert_apply'] . ' as CA 
                left join ' . $this->_table['product'] . ' as P
                    on CA.ProdCode = P.ProdCode
                left join ' . $this->_table['btob_code'] . ' as BCA
                    on CA.AreaCcd = BCA.Ccd and BCA.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as BCB
                    on CA.BranchCcd = BCB.Ccd and BCB.IsStatus = "Y"
                left join ' . $this->_table['btob_code'] . ' as BCT
                    on CA.TakeKindCcd = BCT.Ccd and BCT.IsStatus = "Y"		
            where CA.BtobIdx = ?
                and CA.MemIdx = ?
                and CA.ApprovalStatus = "Y"
                and CA.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by = ['CA.ApplyIdx' => 'desc'];
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$btob_idx, $mem_idx]);

        return $query->result_array();
    }

    /**
     * 제휴사 회원별 서브상품 목록 (기간제패키지에 추가한 강좌정보)
     * @param $btob_idx
     * @param $mem_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function listStudyMemberSubProduct($btob_idx, $mem_idx, $arr_condition = [])
    {
        $column = 'CA.ApplyIdx, CA.ApplySeq, CA.OrderIdx, CA.ProdCode
	        , ML.ProdName, ML.ProdCodeSub, ML.subProdName as ProdNameSub, ML.CateName, ML.SchoolYear, ML.CourseName, ML.SubjectName, ML.wProfName
	        , ML.StudyRate, ML.LecStartDate, ML.RealLecEndDate, ML.RealLecExpireDay
	        , ML.wLecIdx, ML.MultipleApply, ML.MultipleTypeCcd, ML.lastPauseEndDate as LastPauseEndDate
	        , ifnull(ML.StudyTimeSum, 0) as StudyTimeSum, ML.RealLecExpireTime
            , (select case 
                when ML.RealLecEndDate < current_date() then "수강종료"
                when ML.LecStartDate > current_date() then datediff(ML.RealLecEndDate, ML.LecStartDate) + 1
                when ifnull(ML.lastPauseEndDate, "") = "" then datediff(ML.RealLecEndDate, current_date()) + 1
                when ML.lastPauseEndDate >= current_date() then datediff(ML.RealLecEndDate, ML.lastPauseEndDate)
                else datediff(ML.RealLecEndDate, current_date()) + 1 
              end) as RemainStudyTime';

        $from = '
            from ' . $this->_table['btob_cert_apply'] . ' as CA
                inner join ' . $this->_table['on_mylecture'] . ' as ML
                    on CA.OrderIdx = ML.OrderIdx and CA.ProdCode = ML.ProdCode
            where CA.BtobIdx = ?
                and CA.MemIdx = ?
                and CA.ApprovalStatus = "Y"
                and CA.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by = ['CA.ApplyIdx' => 'desc'];
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$btob_idx, $mem_idx]);

        return $query->result_array();
    }

    /**
     * 제휴사 회원별 서브상품 수강이력
     * @param $btob_idx
     * @param $mem_idx
     * @param $apply_idx
     * @param $prod_code_sub
     * @return mixed
     */
    public function listStudyMemberUnitLecture($btob_idx, $mem_idx, $apply_idx, $prod_code_sub)
    {
        $column = 'ML.wLecIdx, ML.wLecName, ML.wUnitIdx, ML.wUnitNum, ML.wUnitLectureNum, ML.wUnitName
            , ML.wRuntime, ML.StudyTime, ML.RealStudyTime, ML.RealExpireTime, ML.FirstStudyDate, ML.LastStudyDate';

        $from = '
            from ' . $this->_table['unit_mylecture'] . ' as ML
                inner join ' . $this->_table['btob_cert_apply'] . ' as CA
                    on ML.OrderIdx = CA.OrderIdx and ML.ProdCode = CA.ProdCode
            where CA.BtobIdx = ?
                and CA.MemIdx = ?
                and CA.ApplyIdx = ?  
                and ML.ProdCodeSub = ?               
                and CA.ApprovalStatus = "Y"
                and CA.IsStatus = "Y"                                            
        ';

        $order_by = ['ML.wOrderNum' => 'asc'];
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit, [$btob_idx, $mem_idx, $apply_idx, $prod_code_sub]);

        return $query->result_array();
    }
}
