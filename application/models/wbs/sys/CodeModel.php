<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeModel extends WB_Model
{
    private $_table = 'wbs_sys_code';

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 그룹공통코드에 해당하는 공통코드 조회
     * @param $group_ccd
     * @return array
     */
    public function getCcd($group_ccd)
    {
        $data = $this->_conn->getListResult($this->_table, 'if(wIsValueUse = "N", wCcd, wCcdValue) as wCcd, wCcdName', [
            'EQ' => ['wGroupCcd' => $group_ccd, 'wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wOrderNum' => 'asc'
        ]);

        return array_pluck($data, 'wCcdName', 'wCcd');
    }

    /**
     * 그룹공통코드 배열에 해당하는 공통코드 조회
     * @param array $group_ccds
     * @return array
     */
    public function getCcdInArray($group_ccds = [])
    {
        $data = $this->_conn->getListResult($this->_table, 'wGroupCcd, if(wIsValueUse = "N", wCcd, wCcdValue) as wCcd, wCcdName', [
            'IN' => ['wGroupCcd' => $group_ccds],
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wGroupCcd' => 'asc', 'wOrderNum' => 'asc'
        ]);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['wGroupCcd']][(string) $rows['wCcd']] = $rows['wCcdName'];
        }

        return $codes;
    }

    /**
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCode($arr_condition = [])
    {
        $column = ' S.*,A.*,case A.wIsUse when "Y" then "사용"  when "N" then "미사용"else "" end as wIsUseView,B.wAdminName ';
        $from = '
                    From 
                        (Select wCcd As ParentCcd, wCcdName As ParentName, wOrderNum As ParentOrder 
                                From '.$this->_table.' Where wIsStatus="Y" And wGroupCcd="0") S 
                            LEFT OUTER JOIN '.$this->_table.' A ON A.wGroupCcd = S.ParentCcd and A.wIsStatus="Y" 
                            LEFT OUTER JOIN wbs_sys_admin B ON A.wRegAdminIdx = B.wAdminIdx and B.wIsStatus="Y" 
                    ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['S.ParentOrder'=>'Desc','A.wOrderNum'=>'Asc'])->getMakeOrderBy();

        return $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
    }

    /**
     * 그룹유형코드 정보 및 세부코드 노출순서 추출 (하위코드 등록을 윈한 정보 조회)
     * @param $group_ccd
     * @return array
     */
    public function findParentCcd($group_ccd)
    {
        $column = 'wCcdName, (Select ifNull(Max(wOrderNum),0)+1 From '.$this->_table.' Where wGroupCcd='.$group_ccd.' and wIsStatus="Y" ) As NextOrderNum';
        return  $this->_conn->getFindResult($this->_table, $column, [
            'EQ'=>['wCcd'=>$group_ccd, 'wIsStatus' => 'Y']
        ]);
    }

    /**
     * 세부항목코드 노출순서 추출
     * @param $groupCcd
     * @return mixed
     */
    public function getCcdOrderNum($groupCcd)
    {
        return $this->_conn->getFindResult($this->_table,'ifNull(Max(wOrderNum),0)+1 as NextOrderNum',[
            'EQ' => ['wGroupCcd' => $groupCcd]
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
                    LEFT OUTER JOIN (Select wCcd As ParentCode, wCcdName As ParentName, wOrderNum As ParentOrder From '.$this->_table.' Where wIsStatus="Y") B ON A.wGroupCcd = B.ParentCode 
                    LEFT OUTER JOIN wbs_sys_admin C ON A.wRegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    LEFT OUTER JOIN wbs_sys_admin D ON A.wUpdAdminIdx = D.wAdminIdx And D.wIsStatus="Y"';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.wCcd'=>$ccd,'A.wIsStatus'=>'Y']
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

        $query = 'insert into wbs_sys_code (wCcd,wGroupCcd,wCcdName,wCcdValue,wOrderNum,wIsUse,wCcdDesc,wCcdEtc,wRegAdminIdx) ';
        $query .= 'select ifNull(max(wCcd)+1,?) ,? ,? ,ifNull(?,"0") ,ifNull(?,Max(wOrderNum)+1) ,ifNull(?,"Y") ,? ,? ,? From wbs_sys_code Where wIsStatus="Y" ';

        $ccd = "101";  //그룹코드생성 기본값

          try {
              if (element('makeType',$input) === "group") {
                  $query .= ' And wGroupCcd = "0" ';
                  $ordernum = NULL;
              } else if (element('makeType', $input) === "sub") {
                  $query .= ' And wGroupCcd = "'.element('groupCcd', $input).'" ';
                  $ccd = element('groupCcd', $input)."001";
                  $ordernum = empty(element("OrderNum", $input) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
              }
              
              $result = $this->_conn->query($query, [
                    $ccd
                    ,element('groupCcd', $input)
                    ,element('CcdName', $input)
                    ,element('CcdValue', $input)
                    ,$ordernum
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
            $is_use = element('is_use', $input);
            $ccdesc = element('CcdDesc', $input);
            $ccdetc = element('CcdEtc', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            // 백업 데이터 등록
            $this->addBakData($this->_table, ['wCcd' => $ccd]);

            $data = [
                'wCcdName'=>$ccdname
                ,'wUpdAdminIdx'=>$admin_idx
            ];

            if($maketype == "sub") {
                $data = array_merge($data,[
                    'wCcdValue' => $ccdvalue
                    ,'wOrderNum' => $ordernum
                    ,'wIsUse' => $is_use
                    ,'wCcdDesc' => $ccdesc
                    ,'wCcdEtc' => $ccdetc
                ]);
            }

            $this->_conn->set($data)->where('wCcd',$ccd);
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
