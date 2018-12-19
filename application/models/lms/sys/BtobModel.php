<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobModel extends WB_Model
{
    private $_table = 'lms_btob_company';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사(회사) 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCompany($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.CompIdx,A.CompName,A.ManagerName,A.IsUse, A.CalcRate, A.RegDatm, A.`Desc`, D.wAdminName as RegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from '.$this->_table.' A
	                        left outer join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\' 
                    where A.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 정보 추출
     * @param $compidx
     * @return mixed
     */
    public function findCompanyForModify($compidx)
    {

        $column = 'CompIdx, CompName, ManagerName, Phone1, fn_dec(Phone2Enc) as Phone2, Phone3, Tel1, fn_dec(Tel2Enc) as Tel2, Tel3, `Desc`, IsUse, CalcRate, RegDatm, RegIp, UpdDatm
                        ,C.wAdminName as RegAdminName 
                        ,D.wAdminName as UpdAdminName ';
        $from = '
                    from '.$this->_table.' A
                        left outer join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus=\'Y\' 
                        left outer join wbs_sys_admin D on A.UpdAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\'
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere(['EQ'=>['A.CompIdx'=>$compidx]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
        //echo 'select ' .$column .$from .$where;
        return $result;

    }

    /**
     * 입력
     * @param array $input
     * @return array|bool
     */
    public function addCompany($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $input_data = $this->inputCommon($input);

            $input_data = array_merge($input_data,[
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            $this->_conn->set($input_data)
                ->set('Tel2Enc',  'fn_enc("' . element('Tel2', $input) . '")',false)
                ->set('Phone2Enc',  'fn_enc("' . element('Phone2', $input) . '")',false);

            if($this->_conn->insert($this->_table) === false) {
                throw new \Exception('제휴사 등록에 실패했습니다.');
            };

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCompany($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $compidx = element('CompIdx',$input);

            $input_data = $this->inputCommon($input);

            $input_data = array_merge($input_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            $this->_conn->set($input_data)
                ->set('Tel2Enc',  'fn_enc("' . element('Tel2', $input) . '")',false)
                ->set('Phone2Enc',  'fn_enc("' . element('Phone2', $input) . '")',false);

            if ($this->_conn->where('CompIdx', $compidx)->update($this->_table) === false) {
                throw new \Exception('정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
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
        //테이블 입력
        $input_product = [
            'CompName'=>element('CompName',$input)
            ,'ManagerName'=>element('ManagerName',$input)
            ,'Phone1'=>element('Phone1',$input)
            //,'Phone2Enc'=> 'fn_enc("' . element('Phone2', $input) . '")'
            ,'Phone3'=>element('Phone3',$input)
            ,'Tel1'=>element('Tel1',$input)
            //,'Tel2Enc'=>'fn_enc("' . element('Tel2', $input) . '")'
            ,'Tel3'=>element('Tel3',$input)
            ,'CalcRate'=>element('CalcRate',$input)
            ,'Desc' => element('Desc',$input)
            ,'IsUse'=>element('IsUse',$input)
        ];

        return $input_product;
    }

}