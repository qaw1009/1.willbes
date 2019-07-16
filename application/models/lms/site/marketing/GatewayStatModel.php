<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GatewayStatModel extends WB_Model
{
    private $_table = [
        'contact' => 'lms_gateway_contract',
        'gateway' => 'lms_gateway',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listContractStat($arr_condition=[],$order_by=[])
    {
        $column = '
                gc.ContIdx, gc.ContName, gc.StartDate, gc.EndDate, gc.ExecutePrice
                ,(
                    select count(gal.GwalIdx)
                    from
                        '.$this->_table['gateway'].' gw1 
                        join lms_gateway_access_log gal on gw1.GwIdx = gal.GwIdx
                    where gw1.ContIdx=gc.ContIdx and gw1.IsStatus=\'Y\' and gal.GwIdx = gw1.GwIdx
                ) as ClickCnt
                ,(
                    select count(m.MemIdx)
                    from 
                        '.$this->_table['gateway'].' gw2
                        join lms_member_otherinfo mo on gw2.GwIdx = mo.GwIdx
                        join lms_member m on mo.MemIdx = m.MemIdx
                    where gw2.ContIdx = gc.ContIdx and gw2.IsStatus=\'Y\' and mo.GwIdx = gw2.GwIdx and m.IsStatus != \'N\'
                        and m.JoinDate > \'2019-07-01\' 
                ) as MemCnt
                ,(
                    select count(c.CartIdx)
                    from 
                        '.$this->_table['gateway'].' gw3
                        join lms_cart c on c.GwIdx = gw3.GwIdx
                    where gw3.ContIdx = gc.ContIdx and gw3.IsStatus=\'Y\' and c.GwIdx = gw3.GwIdx and c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' 
                        AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW()
                ) as CartCnt
                ,(
                    select 
                        count(distinct(op.OrderIdx)) #결제건 기준
                    from
                        '.$this->_table['gateway'].' gw4
                        join lms_order o on o.GwIdx = gw4.GwIdx
                        join lms_order_product op on o.OrderIdx = op.OrderIdx
                    where gw4.ContIdx = gc.ContIdx
                        and gw4.IsStatus=\'Y\'
                        and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\')
                        and op.PayStatusCcd=\'676001\'
                        and o.CompleteDatm > \'2019-07-01\'
                ) as OrderCnt
                ';
        $from = '        
                from
                    '.$this->_table['contact'].' gc
                where gc.IsStatus=\'Y\'
                ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by);
        return $query->result_array();
    }


    public function listGatewayStat($arr_condition=[],$order_by=[])
    {

        $column = '
                gc.ContIdx, gc.ContName, gc.StartDate, gc.EndDate, gc.ExecutePrice
                ,gw.GwIdx,gw.GwName,gw.GwTypeCcd,gw.ExecutePrice as gwPrice
                ,sc.CcdName as GwTypeCcd_Name
                ,(
                    select count(gal.GwalIdx)
                    from
                        lms_gateway_access_log gal
                    where gal.GwIdx = gw.GwIdx
                ) as ClickCnt
                ,(
                    select count(m.MemIdx)
                    from 
                        lms_member_otherinfo mo
                        join lms_member m on mo.MemIdx = m.MemIdx
                    where mo.GwIdx = gw.GwIdx and m.IsStatus != \'N\' 
                ) as MemCnt
                ,(
                    select count(c.CartIdx)
                    from 
                        lms_cart c
                    where c.GwIdx = gw.GwIdx and c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW()
                ) as CartCnt
                ,(
                    select 
                        count(distinct(op.OrderIdx)) #결제건 기준
                    from
                        lms_order o
                        join lms_order_product op on o.OrderIdx = op.OrderIdx
                    where  
                        o.GwIdx = gw.GwIdx
                        and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\')
                    and op.PayStatusCcd=\'676001\'
                    and o.CompleteDatm > \'2019-07-01\'
                ) as OrderCnt
                ,(
                    select 
                        Ifnull(sum(op.RealPayPrice),0)
                    from
                        lms_order o
                        join lms_order_product op on o.OrderIdx = op.OrderIdx
                    where  
                        o.GwIdx = gw.GwIdx
                        and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\')
                    and op.PayStatusCcd=\'676001\'
                    and o.CompleteDatm > \'2019-07-01\'
                ) as OrderPrice';

        $from = '   
                from
                    '.$this->_table['contact'].' gc
                    join '.$this->_table['gateway'].' gw on gc.ContIdx = gw.ContIdx
                    join lms_sys_code sc on gw.GwTypeCcd = sc.Ccd
                where gc.IsStatus=\'Y\' and gw.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by);
        return $query->result_array();
    }
}
