<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractModel extends WB_Model
{
    private $_table = [
        'contact' => 'lms_gateway_contract'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**계약관리 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listContract($is_count, $arr_condition=[], $limit=null, $offset=null,$order_by=[])
    {

        if($is_count) {
            $column = 'count(*) AS numrows ';
            $order_by_offset_limit = '';
        } else {
            $column = 'gc.*,fn_dec(gc.CompTelEnc) as CompTel,sa.wAdminId,sa.wAdminName as RegAdminName,sa2.wAdminName as UpdAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        lms_gateway_contract gc 
                        left outer join wbs_sys_admin sa on gc.RegAdminIdx = sa.wAdminIdx 
                        left outer join wbs_sys_admin sa2 on gc.UpdAdminIdx = sa2.wAdminIdx 
                    where gc.IsStatus=\'Y\' and sa.wIsStatus=\'Y\' 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select ' .$column .$from .$where . $order_by_offset_limit);
        //echo $this->_conn->last_query();
        return ($is_count) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 계약 등록
     * @param array $input
     * @return bool
     */
    public function addContract($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $input_data = $this->_inputCommon($input);

            $input_data = array_merge($input_data,[
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            $this->_conn->set($input_data)->set('CompTelEnc', 'fn_enc("'. element('CompTel', $input).'")',false);

            if($this->_conn->insert($this->_table['contact']) === false) {
                throw new \Exception('계약관리 등록에 실패했습니다.');
            }

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
    public function modifyContract($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $ContIdx = element('ContIdx', $input);

            $input_data = $this->_inputCommon($input);

            $input_data = array_merge($input_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            $this->_conn->set($input_data)->set('CompTelEnc', 'fn_enc("'. element('CompTel', $input).'")',false);

            if($this->_conn->set($input_data)->where('ContIdx',$ContIdx)->update($this->_table['contact']) === false) {
                throw new \Exception('계약관리 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    protected  function _inputCommon($input=[])
    {
        $input_data = [
            'ContName' => element('ContName', $input)
            ,'ReprDomain' => element('ReprDomain', $input)
            ,'StartDate' => element('StartDate', $input)
            ,'EndDate' => element('EndDate', $input)
            ,'CompInfo' => element('CompInfo', $input)
            ,'CompPerson' => element('CompPerson', $input)
            //,'ComTelEnc' => empty(element('ComTelEnc', $input)) ? '' : $this->getEncString(element('ComTelEnc', $input))
            ,'ExecutePrice' => element('ExecutePrice', $input,0)
            ,'Content' => element('Content', $input)
        ];
        return $input_data;
    }
}