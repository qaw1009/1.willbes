<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpModel extends WB_Model
{
    private $_table = 'wbs_sys_cp';
    private $_vw_table = 'vw_role_cp_list';
    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * CP사 코드 목록 조회
     * @return array
     */
    public function getCpArray()
    {
        $data = $this->_conn->getListResult($this->_table, 'wCpIdx, wCpName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wCpIdx' => 'asc'
        ]);

        return array_pluck($data, 'wCpName', 'wCpIdx');
    }

    /**
    * 관리자 권한별 CP사 코드목록 조회 
    * @return array
    */
    public function getRoleCpArray()
    {
        return $this->_conn->getListResult($this->_vw_table, 'wCpIdx,wCpName', [
            'EQ' => ['wAdminIdx' =>$this->session->userdata('admin_idx')]
        ], null, null, [
            'wCpName' => 'asc'
        ]);
    }


    public function listAllCp($arr_condition = [])
    {
        $column = 'A.wCpIdx,A.wCpName,A.wCpManagerName,A.wCpTel1,A.wCpTel2,A.wCpTel3,A.wCpPhone1,A.wCpPhone2,A.wCpPhone3,A.wIsUse,A.wRegDatm,A.wRegAdminIdx
                        ,case A.wIsUse when "Y" then "사용"  when "N" then "미사용"else "" end as wIsUseView
                        ,B.wAdminName';
        $from = '
                    From '.$this->_table.' A
	                    LEFT OUTER JOIN wbs_sys_admin B ON A.wRegAdminIdx = B.wAdminIdx and B.wIsStatus="Y" ';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.wIsStatus'=>'Y']
        ])->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['A.wCpIdx'=>'Desc'])->getMakeOrderBy();

        return $this->_conn->query('Select '.$column .$from .$where .$order_by)->result_array();
    }

    /**
     * CP정보 저장
     * @param array $input
     * @return array|bool
     */
    public function addCp($input=[])
    {
        $this->_conn->trans_begin();

        try{

            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'wRegAdminIdx'=> $this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->insert($this->_table,$data) === false) {
                throw new \Exception('CP 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
            //echo $this->_conn->last_query();
            //exit;
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * CP정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCp($input=[])
    {

        $this->_conn->trans_begin();

        try {

            $cpidx = element('cpidx',$input);

            // 백업 데이터 등록
            $this->addBakData($this->_table, ['wCpIdx' => $cpidx]);


            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'wUpdAdminIdx'=> $this->session->userdata('admin_idx')
            ]);
            $this->_conn->set($data)->where('wCpIdx', $cpidx);

            if($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
            //echo $this->_conn->last_query();
            //exit;

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * DB입력을 위한 INPUT 값 처리
     * @param array $input
     * @return array
     */
    public function inputCommon($input=[]) 
    {
        $cpname = element('cpname', $input);
        $cpmanagername = element('cpmanagername', $input);
        $cptel1 = element('cptel1', $input);
        $cptel2 = element('cptel2', $input);
        $cptel3 = element('cptel3', $input);
        $cpphone1 = element('cpphone1', $input);
        $cpphone2 = element('cpphone2', $input);
        $cpphone3 = element('cpphone3', $input);
        $cpmail = element('cpmail', $input);
        $is_use = element('is_use', $input);

        $input_data = [
            'wCpName' => $cpname
            ,'wCpManagerName' => $cpmanagername
            ,'wCpTel1' => $cptel1
            ,'wCpTel2' => $cptel2
            ,'wCpTel3' => $cptel3
            ,'wCpPhone1' => $cpphone1
            ,'wCpPhone2' => $cpphone2
            ,'wCpPhone3' => $cpphone3
            ,'wCpMail' => $cpmail
            ,'wIsUse' => $is_use
        ];

        return $input_data;
    }

    /**
     * CP 수정을 정보 추출
     * @param $cpidx
     * @return mixed
     */
    public function findCpForModify($cpidx)
    {
        $column = 'A.*, B.wAdminName, C.wAdminName As wUpdAdminName ';

        $from = 'From '.$this->_table.' A
                LEFT OUTER JOIN wbs_sys_admin B ON A.wRegAdminIdx = B.wadminIdx And B.wIsStatus="Y"
                LEFT OUTER JOIN wbs_sys_admin C ON A.wUpdAdminIdx = C.wadminIdx And C.wIsStatus="Y"';

        $where = $this->_conn->makeWhere([
            'EQ'=>['A.wCpIdx'=>$cpidx, 'A.wIsStatus'=>'Y']
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }
}