<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCodeModel extends WB_Model
{
    private $_table = 'lms_btob_code';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 그룹공통코드에 해당하는 공통코드 조회
     * @param int $btob_idx
     * @param string $group_ccd
     * @param string $add_column
     * @param array $add_condition
     * @return array
     */
    public function getCcd($btob_idx, $group_ccd, $add_column = '', $add_condition = [])
    {
        $column = 'if(IsValueUse = "N", Ccd, CcdValue) as Ccd';
        $column .= (empty($add_column) === false) ? ', concat(CcdName, ":", ' . $add_column . ') as CcdName' : ', CcdName';

        $arr_condition = ['EQ' => ['GroupCcd' => $group_ccd, 'BtobIdx' => $btob_idx, 'IsUse' => 'Y', 'IsStatus' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getListResult($this->_table, $column, $arr_condition, null, null, ['OrderNum' => 'asc']);

        return array_pluck($data, 'CcdName', 'Ccd');
    }

    /**
     * 제휴사 그룹공통코드 배열에 해당하는 공통코드 조회
     * @param int $btob_idx
     * @param array $group_ccds
     * @param string $add_column
     * @param array $add_condition
     * @return array
     */
    public function getCcdInArray($btob_idx, $group_ccds, $add_column = '', $add_condition = [])
    {
        $column = 'GroupCcd, if(IsValueUse = "N", Ccd, CcdValue) as Ccd';
        $column .= (empty($add_column) === false) ? ', concat(CcdName, ":", ' . $add_column . ') as CcdName' : ', CcdName';

        $arr_condition = ['IN' => ['GroupCcd' => $group_ccds], 'EQ' => ['BtobIdx' => $btob_idx, 'IsUse' => 'Y', 'IsStatus' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getListResult($this->_table, $column, $arr_condition, null, null, ['GroupCcd' => 'asc', 'OrderNum' => 'asc']);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['GroupCcd']][(string) $rows['Ccd']] = $rows['CcdName'];
        }

        return $codes;
    }

    /**
     * 제휴사별 그룹연결코드값 배열에 해당하는 공통코드 조회
     * @param int $btob_idx
     * @param array $conn_values
     * @param string $add_column
     * @param array $add_condition
     * @return array
     */
    public function getCcdInArrayByConnValue($btob_idx, $conn_values, $add_column = '', $add_condition = [])
    {
        $column = 'PC.ConnValue, if(C.IsValueUse = "N", C.Ccd, C.CcdValue) as Ccd';
        $column .= (empty($add_column) === false) ? ', concat(C.CcdName, ":", C.' . $add_column . ') as CcdName' : ', C.CcdName';

        $arr_condition = ['IN' => ['PC.ConnValue' => $conn_values], 'EQ' => ['PC.BtobIdx' => $btob_idx, 'PC.GroupCcd' => '0', 'PC.IsUse' => 'Y', 'PC.IsStatus' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getJoinListResult($this->_table . ' as PC', 'inner', $this->_table . ' as C'
            , 'PC.Ccd = C.GroupCcd and C.IsUse = "Y" and C.IsStatus = "Y"'
            , $column, $arr_condition, null, null, ['PC.ConnValue' => 'asc', 'C.OrderNum' => 'asc']);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['ConnValue']][(string) $rows['Ccd']] = $rows['CcdName'];
        }

        return $codes;
    }

    /**
     * 제휴사별 지역/지점 공통코드 목록 조회
     * @param int $btob_idx
     * @return mixed
     */
    public function getAreaBranchCcd($btob_idx)
    {
        $column = 'ACC.Ccd as AreaCcd, ACC.CcdName as AreaCcdName, BCC.Ccd as BranchCcd, BCC.CcdName as BranchCcdName';
        $from = '
            from ' . $this->_table . ' as AC
                inner join ' . $this->_table . ' as ACC
                    on AC.Ccd = ACC.GroupCcd and ACC.IsUse = "Y" and ACC.IsStatus = "Y"
                inner join ' . $this->_table . ' as BC
                    on BC.ConnValue = ACC.Ccd and BC.GroupCcd = 0 and BC.IsUse = "Y" and BC.IsStatus = "Y"
                inner join ' . $this->_table . ' as BCC
                    on BC.Ccd = BCC.GroupCcd and BCC.IsUse = "Y" and BCC.IsStatus = "Y"
            where AC.BtobIdx = ? and AC.ConnValue = "branch"
                and AC.GroupCcd = 0 and AC.IsUse = "Y" and AC.IsStatus = "Y"
            order by ACC.OrderNum asc, BCC.OrderNum asc                                    
        ';

        return $this->_conn->query('select ' . $column . $from, [$btob_idx])->result_array();
    }

    /**
     * 제휴사 공통코드 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCode($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'S.*, A.*, (case A.IsUse when "Y" then "사용" when "N" then "미사용" else "" end) as IsUseView, B.BtobName, C.wAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            From 
                (Select Ccd As ParentCcd, CcdName As ParentName, OrderNum As ParentOrder, BtobIdx as ParentBtobIdx 
                    From ' . $this->_table . ' Where IsStatus="Y" And GroupCcd="0") S 
                LEFT OUTER JOIN ' . $this->_table . ' A ON A.GroupCcd = S.ParentCcd and A.IsStatus = "Y"
                LEFT OUTER JOIN lms_btob B ON S.ParentBtobIdx = B.BtobIdx and B.IsStatus = "Y"
                LEFT OUTER JOIN wbs_sys_admin C ON A.RegAdminIdx = C.wAdminIdx and C.wIsStatus = "Y" 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 제휴사 그룹유형코드 정보 및 세부코드 노출순서 추출 (하위코드 등록을 윈한 정보 조회)
     * @param $group_ccd
     * @return array
     */
    public function findParentCcd($group_ccd)
    {
        $column = 'CcdName, (Select ifNull(Max(OrderNum),0)+1 From '.$this->_table.' Where GroupCcd='.$group_ccd.' and OrderNum < 999 and IsStatus="Y") As NextOrderNum, BtobIdx';
        return  $this->_conn->getFindResult($this->_table, $column, [
            'EQ'=>['Ccd'=>$group_ccd, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 제휴사 세부항목코드 노출순서 추출
     * @param $groupCcd
     * @return mixed
     */
    public function getCcdOrderNum($groupCcd)
    {
        return $this->_conn->getFindResult($this->_table,'ifNull(Max(OrderNum),0)+1 as NextOrderNum',[
            'EQ' => ['GroupCcd' => $groupCcd],
            'LT' => ['OrderNum' => '999']
        ])['NextOrderNum'];
    }

    /**
     * 제휴사 공통코드 수정을 위한 정보 추출
     * @param $ccd
     * @return mixed
     */
    public function findCcdForModify($ccd)
    {
        $column = 'ifNull(ParentCode,"") as ParentCode, ifNull(ParentName,"") as ParentName, ifNull(ParentOrder,0) as ParentOrder, ParentBtobIdx';
        $column .= ', A.*, C.BtobName, D.wAdminName, E.wAdminName As wUpdAdminName';
        $from = ' 
            From '.$this->_table.' A
                LEFT OUTER JOIN (
                    Select Ccd As ParentCode, CcdName As ParentName, OrderNum As ParentOrder, BtobIdx as ParentBtobIdx 
                    From '.$this->_table.' Where IsStatus="Y" And GroupCcd="0"
                ) B 
                    ON A.GroupCcd = B.ParentCode
                LEFT OUTER JOIN lms_btob C ON B.ParentBtobIdx = C.BtobIdx and C.IsStatus = "Y"                                            
                LEFT OUTER JOIN wbs_sys_admin D ON A.RegAdminIdx = D.wAdminIdx And D.wIsStatus="Y"
                LEFT OUTER JOIN wbs_sys_admin E ON A.UpdAdminIdx = E.wAdminIdx And E.wIsStatus="Y"
        ';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.Ccd' => $ccd, 'A.IsStatus' => 'Y']
        ]);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 제휴사 공통코드 등록
     * @param array $input
     * @return array|bool
     */
    public function addCcd($input=[])
    {
        $this->_conn->trans_begin();

        $query = /** @lang text */ '
            insert into '.$this->_table.' (Ccd,BtobIdx,GroupCcd,CcdName,CcdValue,ConnValue,OrderNum,IsValueUse,IsUse,CcdDesc,CcdEtc,RegAdminIdx)
            select ifNull(max(Ccd)+1,?), ?, ?, ?, ?, ifNull(?,"0"), ifNull(?,Max(OrderNum)+1), ifNull(?,"N"), ifNull(?,"Y"), ?, ?, ? From '.$this->_table.' Where IsStatus = "Y"
        ';

        $ccd = "101";  //그룹코드생성 기본값

        try {
            $ordernum = null;

            if (element('makeType',$input) === "group") {
                $query .= ' And GroupCcd = "0"';
            } else if (element('makeType', $input) === "sub") {
                $query .= ' And GroupCcd = "'.element('groupCcd', $input).'" And Ccd not like "%999"';
                $ccd = element('groupCcd', $input)."001";
                $ordernum = empty(element("OrderNum", $input) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            }
              
            $result = $this->_conn->query($query, [
                $ccd
                ,element('btob_idx', $input)
                ,element('groupCcd', $input)
                ,element('CcdName', $input)
                ,element('CcdValue', $input)
                ,element('ConnValue', $input)
                ,$ordernum
                ,element('is_value_use', $input)
                ,element('is_use', $input)
                ,element('CcdDesc', $input)
                ,element('CcdEtc', $input)
                ,$this->session->userdata('admin_idx')
            ]);

            if ($result === false) {
                throw new \Exception('데이터 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 제휴사 공통코드 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCcd($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $maketype = element('makeType',$input);
            $ccd = element('Ccd', $input);
            $ccdname = element('CcdName', $input);
            $ccdvalue = element('CcdValue', $input);
            $connvalue = element('ConnValue', $input);
            $ordernum = (empty(element("OrderNum", $input)) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            $is_value_use = element('is_value_use', $input);
            $is_use = element('is_use', $input);
            $ccdesc = element('CcdDesc', $input);
            $ccdetc = element('CcdEtc', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'CcdName'=>$ccdname
                ,'ConnValue' => $connvalue
                ,'CcdDesc' => $ccdesc
                ,'CcdEtc' => $ccdetc
                ,'UpdAdminIdx'=>$admin_idx
            ];

            if($maketype == "sub") {
                $data = array_merge($data,[
                    'CcdValue' => $ccdvalue
                    ,'OrderNum' => $ordernum
                    ,'IsValueUse' => $is_value_use
                    ,'IsUse' => $is_use
                    ,'CcdDesc' => $ccdesc
                    ,'CcdEtc' => $ccdetc
                ]);
            }

            $this->_conn->set($data)->where('Ccd',$ccd);
            if($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
