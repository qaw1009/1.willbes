<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointStatModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상품코드별 적립/사용 월별 통계
     * @param array $arr_prod_code
     * @param string $search_start_date
     * @param string $search_end_date
     * @param array $arr_condition
     * @return mixed
     */
    public function listStatSaveUsePointByProdCode($arr_prod_code, $search_start_date, $search_end_date, $arr_condition = [])
    {
        $arr_prod_code = (array) $arr_prod_code;
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';

        $column = 'TA.ProdCode, P.ProdName, TA.RegYm
            , sum(TA.SavePoint) as SumSavePoint, sum(TA.SaveCnt) as SumSaveCnt, sum(TA.UsePoint) as SumUsePoint, sum(TA.UseCnt) as SumUseCnt';

        $from = '
            from (
                select PS.PointIdx, OP.ProdCode, PS.SavePoint, 0 as UsePoint, 1 as SaveCnt, 0 as UseCnt, left(PS.SaveDatm, 7) as RegYm
                from ' . $this->_table['point_save'] . ' as PS
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = PS.OrderProdIdx		
                where PS.SaveDatm between ? and ?
                    and OP.ProdCode in ?
                union all
                select PS.PointIdx, OP.ProdCode, 0 as SavePoint, PU.UsePoint, 0 as SaveCnt, 1 as UseCnt, left(PU.UseDatm, 7) as RegYm
                from ' . $this->_table['point_save'] . ' as PS
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on PS.OrderIdx = OP.OrderIdx and PS.OrderProdIdx = PS.OrderProdIdx
                    inner join ' . $this->_table['point_use'] . ' as PU
                        on PS.PointIdx = PU.PointIdx	
                where PS.SaveDatm between ? and ?
                    and OP.ProdCode in ?
                    and PU.UseDatm between ? and ?
            ) as TA
                inner join ' . $this->_table['product'] . ' as P
                    on TA.ProdCode = P.ProdCode            
        ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(false) . '
            group by TA.ProdCode, TA.RegYm
            order by TA.ProdCode, TA.RegYm               
        ';

        $binds = [$search_start_date, $search_end_date, $arr_prod_code
            , $search_start_date, $search_end_date, $arr_prod_code, $search_start_date, $search_end_date
        ];

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, $binds);

        return $query->result_array();
    }
}
