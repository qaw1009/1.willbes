<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GatewayModel extends WB_Model
{
    private $_table = [
        'contact' => 'lms_gateway_contract',
        'gateway' => 'lms_gateway',
        'gateway_log' => 'lms_gateway_access_log',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
        'site' => 'lms_site',
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_refund' => 'lms_order_product_refund',
        'member' => 'lms_member',
        'member_other' => 'lms_member_otherinfo',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 광고 목록 : 통계에서도 같이 사용
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
            $column = ' straight_join
                            g.*, g.ExecutePrice as gwPrice
                            ,gc.ContIdx, gc.ContName, gc.StartDate, gc.EndDate, gc.ExecutePrice as contExecutePrice
                            ,sc.CcdName as GwTypeCcd_Name
                            ,sa.wAdminId,sa.wAdminName as RegAdminName,sa2.wAdminName as UpdAdminName
                            ,s.SiteName,s.SiteUrl
                            ,ifnull(ClickCnt,0) as ClickCnt
                            ,ifnull(MemCnt,0) as MemCnt
                            ,ifnull(CartCnt,0) as CartCnt
                            ,ifnull(OrderCnt,0) as OrderCnt
                            ,ifnull(OrderPrice,0) as OrderPrice
                            ,(ifnull(RefundCnt,0)*-1) as RefundCnt
                            ,(ifnull(RefundPrice,0)*-1) as RefundPrice
	                        ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit,$offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        '.$this->_table['gateway'].' g
                        join '.$this->_table['contact'].'  gc on g.ContIdx = gc.ContIdx
                        join '.$this->_table['code'].'  sc on g.GwTypeCcd = sc.Ccd and sc.IsStatus=\'Y\'
                        left outer join '.$this->_table['admin'].'  sa on g.RegAdminIdx = sa.wAdminIdx
                        left outer join '.$this->_table['admin'].'  sa2 on g.UpdAdminIdx = sa2.wAdminIdx
                        left outer join '.$this->_table['site'].'  s on g.SiteCode = s.SiteCode
                        left outer join
                            (
                                select gal.GwIdx, count(gal.GwalIdx) as ClickCnt
                                from
                                    '.$this->_table['gateway_log'].'  gal
                                group by gal.GwIdx
                             ) a on a.GwIdx = g.GwIdx
                        
                        left outer join
                            (
                                select mo.GwIdx, count(m.MemIdx) as MemCnt
                                from 
                                    '.$this->_table['member_other'].'  mo
                                    join '.$this->_table['member'].'  m on mo.MemIdx = m.MemIdx
                                where mo.GwIdx is not null and m.IsStatus != \'N\'
                                group by mo.GwIdx
                            ) b on b.GwIdx = g.GwIdx
                    
                        left outer join
                            (
                                select c.GwIdx, count(c.CartIdx) as CartCnt
                                from 
                                    '.$this->_table['cart'].'  c
                                where c.GwIdx is not null and c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW()
                                group by c.GwIdx
                            ) c on c.GwIdx = g.GwIdx
                    
                        left outer join
                            (
                                select
                                    o.GwIdx, count(*) as OrderCnt, sum(op.RealPayPrice) as OrderPrice
                                from
                                    '.$this->_table['order'].'  o
                                    join '.$this->_table['order_product'].'  op on o.OrderIdx = op.OrderIdx
                                where 
                                    o.GwIdx is not null
                                    and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\') 
                                    and op.SalePatternCcd in (\'694001\', \'694003\', \'694002\')
                                    and op.PayStatusCcd in (\'676001\',\'676006\')
                                group by o.GwIdx
                            ) d on d.GwIdx = g.GwIdx
                        
                        left outer join
                            (
                                select
                                    o.GwIdx, count(*) as RefundCnt, sum(opr.RefundPrice) as RefundPrice
                                from
                                    '.$this->_table['order'].'  o
                                    join '.$this->_table['order_product'].'  op on o.OrderIdx = op.OrderIdx
                                    join '.$this->_table['order_refund'].'  opr on o.OrderIdx = opr.OrderIdx
                                where 
                                    o.GwIdx is not null
                                    and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\') 
                                    and op.SalePatternCcd in (\'694001\', \'694003\', \'694002\')
                                    and op.PayStatusCcd=\'676006\'
                                group by o.GwIdx
                            ) e on e.GwIdx = g.GwIdx
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

    /**
     * 계약건 통계
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listContractStat($arr_condition=[],$order_by=[])
    {
        $column = '
                straight_join
                gc.ContIdx, gc.ContName, gc.StartDate, gc.EndDate, gc.ExecutePrice
                ,ifnull(ClickCnt,0) as ClickCnt
                ,ifnull(MemCnt,0) as MemCnt
                ,ifnull(CartCnt,0) as CartCnt
                ,ifnull(OrderCnt,0) as OrderCnt
                ,(ifnull(RefundCnt,0)*-1) as RefundCnt
                ';
        $from = '        
                from
                    '.$this->_table['contact'].' gc
                    left outer join
                        (
                            select gw.ContIdx, count(gal.GwalIdx) as ClickCnt
                            from
                                '.$this->_table['gateway_log'].' gal
                                join '.$this->_table['gateway'].' gw on gal.GwIdx = gw.GwIdx and gw.IsStatus=\'Y\'
                            group by gw.ContIdx
                        ) a on a.ContIdx = gc.ContIdx
                
                    left outer join
                        (
                            select gw.ContIdx, count(m.MemIdx) as MemCnt
                            from 
                                '.$this->_table['member_other'].' mo
                                join '.$this->_table['member'].' m on mo.MemIdx = m.MemIdx
                                join '.$this->_table['gateway'].' gw on mo.GwIdx = gw.GwIdx and gw.IsStatus=\'Y\'
                            where mo.GwIdx is not null and m.IsStatus != \'N\' 
                            group by gw.ContIdx
                        ) b on b.ContIdx = gc.ContIdx
                
                    left outer join
                        (
                            select gw.ContIdx, count(c.CartIdx) as CartCnt
                            from 
                                '.$this->_table['cart'].' c
                                join '.$this->_table['gateway'].' gw on c.GwIdx = gw.GwIdx and gw.IsStatus=\'Y\'
                            where c.GwIdx is not null and c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW()
                            group by gw.ContIdx
                         ) c on c.ContIdx = gc.ContIdx
                
                    left outer join
                        (
                            select
                                gw.ContIdx, count(*) as OrderCnt
                            from
                                '.$this->_table['order'].' o
                                join '.$this->_table['order_product'].' op on o.OrderIdx = op.OrderIdx
                                join '.$this->_table['gateway'].' gw on o.GwIdx = gw.GwIdx and gw.IsStatus=\'Y\'            
                            where 
                                o.GwIdx is not null
                                and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\') 
                                and op.PayStatusCcd in (\'676001\',\'676006\')
                                and op.SalePatternCcd in (\'694001\', \'694003\', \'694002\')
                            group by gw.ContIdx
                        ) d on d.ContIdx = gc.ContIdx
                
                    left outer join
                        (
                            select
                                gw.ContIdx, count(*) as RefundCnt
                            from
                                '.$this->_table['order'].' o
                                join '.$this->_table['order_product'].' op on o.OrderIdx = op.OrderIdx
                                join '.$this->_table['order_refund'].' opr on o.OrderIdx = opr.OrderIdx
                                join '.$this->_table['gateway'].' gw on o.GwIdx = gw.GwIdx and gw.IsStatus=\'Y\'    
                            where 
                                o.GwIdx is not null
                                and o.PayRouteCcd in (\'670001\',\'670002\',\'670006\',\'670007\') 
                                and op.PayStatusCcd=\'676006\'
                                and op.SalePatternCcd in (\'694001\', \'694003\', \'694002\')
                            group by gw.ContIdx
                        ) e on e.ContIdx = gc.ContIdx
                where gc.IsStatus=\'Y\'
                ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by);
        return $query->result_array();
    }

    /*
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
                    ) as click_tbl on default_tbl.GwIdx = click_tbl.GwIdx #and click_tbl.SiteCode = default_tbl.SiteCode
            
                left outer join
                (
                    select  mo.GwIdx, m.SiteCode, count(m.MemIdx) as MemCnt
                        from 
                            lms_member_otherinfo mo
                            join lms_member m on mo.MemIdx = m.MemIdx
                        where m.IsStatus != \'N\' and m.JoinDate > \'2019-07-01\' and mo.GwIdx is not null
                        group by mo.GwIdx, m.SiteCode
                    ) as mem_tbl on default_tbl.GwIdx = mem_tbl.GwIdx #and mem_tbl.SiteCode = default_tbl.SiteCode
                    
                left outer join
                (
                    select c.GwIdx, c.SiteCode, count(c.CartIdx) as CartCnt
                        from 
                            lms_cart c 
                        where c.IsStatus=\'Y\' and c.IsDirectPay=\'N\' AND c.ConnOrderIdx IS NULL AND c.ExpireDatm >=  NOW() and c.GwIdx is not null
                        group by c.GwIdx, c.SiteCode
                    ) as cart_tbl on default_tbl.GwIdx = cart_tbl.GwIdx #and default_tbl.SiteCode = cart_tbl.SiteCode
                
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
                    ) as order_tbl on default_tbl.GwIdx = order_tbl.GwIdx #and default_tbl.SiteCode = order_tbl.SiteCode

                where gc.IsStatus=\'Y\' and gw.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        //echo 'select ' . $column . $from . $where .$order_by;
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by);
        return $query->result_array();

    }
    */

}