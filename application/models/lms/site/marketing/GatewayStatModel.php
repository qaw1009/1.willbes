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

    public function detailListGatewayStat($arr_condition=[],$order_by=[])
    {

        $column = '
            gc.ContIdx, gc.ContName, gc.StartDate, gc.EndDate, gc.ExecutePrice
            ,gw.GwIdx,gw.GwName,gw.GwTypeCcd,gw.ExecutePrice as gwPrice
            ,sc.CcdName as GwTypeCcd_Name
            ,default_tbl.SiteCode as default_SiteCode
            ,s.SiteName
            ,default_tbl.SiteCode as default_SiteCode
            ,s.SiteName
            ,ifnull(click_tbl.ClickCnt,0) as ClickCnt,click_tbl.SiteCode as click_SiteCode
            ,ifnull(mem_tbl.MemCnt,0) as MemCnt ,mem_tbl.SiteCode as member_SiteCode
            ,ifnull(cart_tbl.CartCnt,0) as CartCnt ,cart_tbl.SiteCode as cart_SiteCode
            ,ifnull(order_tbl.OrderCnt,0) as OrderCnt, ifnull(order_tbl.OrderPrice,0) as OrderPrice,order_tbl.SiteCode as order_SiteCode';

        $from = '   
                from
                 '.$this->_table['contact'].' gc
                join '.$this->_table['gateway'].' gw on gc.ContIdx = gw.ContIdx
                join lms_sys_code sc on gw.GwTypeCcd = sc.Ccd
                join
                (
                    select GwIdx,SiteCode
                    from
                        lms_gateway_access_log gal
                    group by GwIdx,SiteCode
                ) as default_tbl on gw.GwIdx = default_tbl.GwIdx
            
                join lms_site s on default_tbl.SiteCode = s.SiteCode
                
                left outer join
                (
                    select GwIdx,SiteCode,count(*) as ClickCnt
                        from
                            lms_gateway_access_log gal
                        where GwIdx is not null
                        group by GwIdx,SiteCode
                    ) as click_tbl on default_tbl.GwIdx = click_tbl.GwIdx and click_tbl.SiteCode = default_tbl.SiteCode
            
                left outer join
                (
                    select  mo.GwIdx, m.SiteCode, count(m.MemIdx) as MemCnt
                        from 
                            lms_member_otherinfo mo
                            join lms_member m on mo.MemIdx = m.MemIdx
                        where m.IsStatus != \'N\' and m.JoinDate > \'2019-07-01\' and mo.GwIdx is not null
                        group by mo.GwIdx, m.SiteCode
                    ) as mem_tbl on default_tbl.GwIdx = mem_tbl.GwIdx and mem_tbl.SiteCode = default_tbl.SiteCode
                    
                left outer join
                (
                    select c.GwIdx, c.SiteCode, count(c.CartIdx) as CartCnt
                        from 
                            lms_cart c 
                        where c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW() and c.GwIdx is not null
                        group by c.GwIdx, c.SiteCode
                    ) as cart_tbl on default_tbl.GwIdx = cart_tbl.GwIdx and default_tbl.SiteCode = cart_tbl.SiteCode
                
                left outer join
                (
                    select 
                            o.GwIdx, o.SiteCode, count(distinct(op.OrderIdx)) as OrderCnt,sum(op.RealPayPrice) as OrderPrice
                        from
                            lms_order o
                            join lms_order_product op on o.OrderIdx = op.OrderIdx
                        where  
                            o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\')
                            and op.PayStatusCcd=\'676001\'
                            and o.CompleteDatm > \'2019-07-01\'
                            and o.GwIdx is not null
                        group by o.GwIdx,o.SiteCode
                    ) as order_tbl on default_tbl.GwIdx = order_tbl.GwIdx and default_tbl.SiteCode = order_tbl.SiteCode

                where gc.IsStatus=\'Y\' and gw.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        //echo 'select ' . $column . $from . $where .$order_by;
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by);
        return $query->result_array();

    }

}
