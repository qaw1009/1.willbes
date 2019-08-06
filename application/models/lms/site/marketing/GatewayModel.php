<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GatewayModel extends WB_Model
{
    private $_table = [
        'contact' => 'lms_gateway_contract',
        'gateway' => 'lms_gateway'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 광고 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listGateway($is_count,$arr_condition=[],$limit=null,$offset=null,$order_by=[])
    {

        if($is_count) {
            $column = 'count(*) as numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'g.*,gc.ContName,sc.CcdName as GwTypeCcd_Name
                        ,sa.wAdminId,sa.wAdminName as RegAdminName,sa2.wAdminName as UpdAdminName
                        ,s.SiteName,s.SiteUrl
                        ,(
                            select count(gal.GwalIdx) 
                            from
                                lms_gateway_access_log gal
                            where gal.GwIdx = g.GwIdx
                        ) as ClickCnt
                        ,(
                            select count(m.MemIdx)
                            from 
                                lms_member_otherinfo mo
                                join lms_member m on mo.MemIdx = m.MemIdx
                            where mo.GwIdx = g.GwIdx and m.IsStatus != \'N\'
                                and m.JoinDate > \'2019-07-01\'  
                        ) as MemCnt
                        ,(
                            select count(c.CartIdx)
                            from 
                                lms_cart c
                            where c.GwIdx = g.GwIdx and c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW()
                        ) as CartCnt
                        ,(
                            select 
                                count(distinct(op.OrderIdx)) #결제건 기준
                            from
                                lms_order o
                                join lms_order_product op on o.OrderIdx = op.OrderIdx
                            where o.GwIdx = g.GwIdx 
                                and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\') 
                                and op.PayStatusCcd=\'676001\'
                                and o.CompleteDatm > \'2019-07-01\'
                        ) as OrderCnt
                        ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit,$offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        '.$this->_table['gateway'].' g
                        join '.$this->_table['contact'].'  gc on g.ContIdx = gc.ContIdx
                        join lms_sys_code sc on g.GwTypeCcd = sc.Ccd and sc.IsStatus=\'Y\'
                        left outer join wbs_sys_admin sa on g.RegAdminIdx = sa.wAdminIdx
                        left outer join wbs_sys_admin sa2 on g.UpdAdminIdx = sa2.wAdminIdx
                        left outer join lms_site s on g.SiteCode = s.SiteCode
                    where g.IsStatus=\'Y\' and gc.IsStatus=\'Y\' and sa.wIsStatus=\'Y\'
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column . $from . $where .$order_by_offset_limit);
        //echo $this->_conn->last_query();
        return $is_count ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 광고 등록
     * @param array $input
     * @return array|bool
     */
    public function addGateway($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $input_data = $this->_inputCommon($input);

            $input_data = array_merge($input_data,[
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            if($this->_conn->set($input_data)->insert($this->_table['gateway']) === false) {
                throw new \Exception('광고 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 광고 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyGateway($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $GwIdx = element('GwIdx', $input);
            $input_data = $this->_inputCommon($input);

            $input_data = array_merge($input_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if($this->_conn->set($input_data)->where('GwIdx', $GwIdx)->update($this->_table['gateway']) === false) {
                throw new \Exception('광고 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 인풋데이터 공통처리
     * @param array $input
     * @return array
     */
    protected function _inputCommon($input=[])
    {
        $input_data = [
            'ContIdx' => element('ContIdx',$input)
            ,'SiteCode'  => element('SiteCode',$input)
            ,'GwName'  => element('GwName',$input)
            ,'GwTypeCcd'  => element('GwTypeCcd',$input)
            ,'ExecutePrice'  => element('ExecutePrice',$input,0)
            ,'MoveUrl'  => element('MoveUrl',$input)
            ,'TargetLocation'  => element('TargetLocation',$input)
            ,'Content'  => element('Content',$input)
        ];

        return $input_data;
    }
}