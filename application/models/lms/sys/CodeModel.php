<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeModel extends WB_Model
{
    private $_table = 'lms_sys_code';

    // 캠퍼스코드 '전체코드' 셋팅 (캠퍼스코드 전체 값으로 저장될 경우 사용)
    public $campusAllCcd = '605999';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 그룹공통코드에 해당하는 공통코드 조회
     * @param $group_ccd
     * @param string $add_column
     * @param array $add_condition
     * @return array
     */
    public function getCcd($group_ccd, $add_column = '', $add_condition = [])
    {
        $column = 'if(IsValueUse = "N", Ccd, CcdValue) as Ccd, ';
        $column .= (empty($add_column) === false) ? 'concat(CcdName, ":", ' . $add_column . ') as CcdName' : 'CcdName';

        $arr_condition = ['EQ' => ['GroupCcd' => $group_ccd, 'IsUse' => 'Y', 'IsStatus' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getListResult($this->_table, $column, $arr_condition, null, null, ['OrderNum' => 'asc']);

        return array_pluck($data, 'CcdName', 'Ccd');
    }

    /**
     * 그룹공통코드 배열에 해당하는 공통코드 조회
     * @param array $group_ccds
     * @param string $add_column
     * @param array $add_condition
     * @return array
     */
    public function getCcdInArray($group_ccds = [], $add_column = '', $add_condition = [])
    {
        $column = 'GroupCcd, if(IsValueUse = "N", Ccd, CcdValue) as Ccd, ';
        $column .= (empty($add_column) === false) ? 'concat(CcdName, ":", ' . $add_column . ') as CcdName' : 'CcdName';

        $arr_condition = ['IN' => ['GroupCcd' => $group_ccds], 'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getListResult($this->_table, $column, $arr_condition, null, null, ['GroupCcd' => 'asc', 'OrderNum' => 'asc']);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['GroupCcd']][(string) $rows['Ccd']] = $rows['CcdName'];
        }

        return $codes;
    }

    /**
     * 그룹공통코드 조회
     * @param array $group_ccds
     * @return array
     */
    public function getGroupCcdInArray($group_ccds = [])
    {
        $data = $this->_conn->getListResult($this->_table, 'if(IsValueUse = "N", Ccd, CcdValue) as Ccd, CcdName', [
            'IN' => ['Ccd' => $group_ccds],
            'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y', 'GroupCcd' => 0]
        ], null, null, [
            'OrderNum' => 'asc'
        ]);

        return array_pluck($data, 'CcdName', 'Ccd');
    }

    /**
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCode($arr_condition = [])
    {
        $column = ' S.*,A.*,case A.IsUse when "Y" then "사용"  when "N" then "미사용"else "" end as IsUseView,B.wAdminName ';
        $from = '
                    From 
                        (Select Ccd As ParentCcd, CcdName As ParentName, OrderNum As ParentOrder 
                                From '.$this->_table.' Where IsStatus="Y" And GroupCcd="0") S 
                            LEFT OUTER JOIN '.$this->_table.' A ON A.GroupCcd = S.ParentCcd and A.IsStatus="Y" 
                            LEFT OUTER JOIN wbs_sys_admin B ON A.RegAdminIdx = B.wAdminIdx and B.wIsStatus="Y" 
                    ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['S.ParentOrder'=>'Desc','A.OrderNum'=>'Asc'])->getMakeOrderBy();

        return $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
    }

    /**
     * 그룹유형코드 정보 및 세부코드 노출순서 추출 (하위코드 등록을 윈한 정보 조회)
     * @param $group_ccd
     * @return array
     */
    public function findParentCcd($group_ccd)
    {
        $column = 'CcdName, (Select ifNull(Max(OrderNum),0)+1 From '.$this->_table.' Where GroupCcd='.$group_ccd.' and OrderNum < 999 and IsStatus="Y" ) As NextOrderNum';
        return  $this->_conn->getFindResult($this->_table, $column, [
            'EQ'=>['Ccd'=>$group_ccd, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 세부항목코드 노출순서 추출
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
     * 코드수정을 위한 정보 추출
     * @param $ccd
     * @return mixed
     */
    public function findCcdForModify($ccd)
    {
        $column = ' ifNull(ParentCode,"") as ParentCode, ifNull(ParentName,"") as ParentName, ifNull(ParentOrder,0) as ParentOrder ';
        $column .= ' ,A.*, C.wAdminName, D.wAdminName As wUpdAdminName ';
        $from = 'From '.$this->_table.' A
                    LEFT OUTER JOIN (Select Ccd As ParentCode, CcdName As ParentName, OrderNum As ParentOrder From '.$this->_table.' Where IsStatus="Y") B ON A.GroupCcd = B.ParentCode
                    LEFT OUTER JOIN wbs_sys_admin C ON A.RegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    LEFT OUTER JOIN wbs_sys_admin D ON A.UpdAdminIdx = D.wAdminIdx And D.wIsStatus="Y"';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.Ccd'=>$ccd,'A.IsStatus'=>'Y']
        ]);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 코드정보 저장
     * @param array $input
     * @return array|bool
     */
    public function addCcd($input=[])
    {
        $this->_conn->trans_begin();

        $query = 'insert into lms_sys_code (Ccd,GroupCcd,CcdName,CcdValue,OrderNum,IsValueUse,IsUse,CcdDesc,CcdEtc,RegAdminIdx) ';
        $query .= 'select ifNull(max(Ccd)+1,?) ,? ,? ,ifNull(?,"0") ,ifNull(?,Max(OrderNum)+1) ,ifNull(?,"N"), ifNull(?,"Y") ,? ,? ,? From lms_sys_code Where IsStatus="Y" ';

        $ccd = "601";  //그룹코드생성 기본값

        try {
            if (element('makeType',$input) === "group") {
                $query .= ' And GroupCcd = "0" ';
                $ordernum = NULL;
            } else if (element('makeType', $input) === "sub") {
                $query .= ' And GroupCcd = "'.element('groupCcd', $input).'" And Ccd not like "%999"';
                $ccd = element('groupCcd', $input)."001";
                $ordernum = empty(element("OrderNum", $input) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            }
              
            $result = $this->_conn->query($query, [
                $ccd
                ,element('groupCcd', $input)
                ,element('CcdName', $input)
                ,element('CcdValue', $input)
                ,$ordernum
                ,element('is_value_use', $input)
                ,element('is_use', $input)
                ,element('CcdDesc', $input)
                ,element('CcdEtc', $input)
                ,$this->session->userdata('admin_idx')
            ]);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 코드정보수정
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
            $ordernum = (empty(element("OrderNum", $input)) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            $is_value_use = element('is_value_use', $input);
            $is_use = element('is_use', $input);
            $ccdesc = element('CcdDesc', $input);
            $ccdetc = element('CcdEtc', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'CcdName'=>$ccdname
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
