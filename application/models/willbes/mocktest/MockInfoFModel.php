<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockInfoFModel extends WB_Model
{
    protected $_table = [
        'mock_product' => 'vw_product_mocktest as pm'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 모의고사 목록
     */
    public function listMockTest($is_count, $arr_condition=[], $add_column = null, $limit = null, $offset = null, $order_by = [])
    {

            if($is_count===true) {
                $column = true;
            } else {

                $column = '';
                if(empty($add_column) == false) {
                    $column = $add_column . ',';
                }
                $column .= '    pm.*
                            , (
                                select
                                    count(*)
                                from
                                    lms_order_product op 
                                    join lms_order o on op.OrderIdx = o.OrderIdx
                                where op.PayStatusCcd=\'676001\' and ProdCode = pm.ProdCode 
                            ) as AllPayCnt
                ';
                //본인 결제한 내역 추출
                if(empty($this->session->userdata('mem_idx'))) {
                    $column .= ', \'0\' as PayCnt ';
                } else {
                    $column .= ', (
                                select
                                    count(*)
                                from
                                    lms_order_product op 
                                    join lms_order o on op.OrderIdx = o.OrderIdx
                                where op.PayStatusCcd=\'676001\' and ProdCode = pm.ProdCode and op.MemIdx = \''.$this->session->userdata('mem_idx').'\'
                            ) as PayCnt' ;
                }

            }
        $result = $this->_conn->getListResult($this->_table['mock_product'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();
        return $result;
    }


    /**
     * 모의고사 주문내역 조회
     * @param $prod_code
     * @return bool
     */
    public function findApplyMockTestByProdCode($prod_code)
    {
        
        return false;
    }


    /**
     * 모의고사 상품 필수과목, 선택과목 추출
     * @param $prod_code
     * @param $mock_type
     * @return mixed
     */
    public function listMockTestSubject($prod_code, $mock_type)
    {

        $select = 'Select b.MpIdx,b.MockType,mp.PapaerName,sj.SubjectIdx,sj.SubjectName';

        $from ='
                    from
                        vw_product_mocktest A
                        join lms_product_mock_r_paper b on A.ProdCode = b.ProdCode and b.IsStatus=\'Y\'
                        join lms_mock_paper mp on b.MpIdx = mp.MpIdx and mp.IsStatus=\'Y\' and mp.IsUse=\'Y\'
                        join lms_mock_r_category mrc on mp.MrcIdx = mrc.MrcIdx and mrc.IsStatus=\'Y\'
                        join lms_mock_r_subject mrs on mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus=\'Y\'
                        JOIN lms_product_subject AS SJ ON mrs.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = \'Y\'
                        ';
        $where = ' where A.IsUse =\'Y\' ';
        //$where .= $this->_conn->makeWhere(['A.ProdCode' => $prod_code, 'b.MockType'=>$mock_type])->getMakeWhere(true);
        $where .= $this->_conn->makeWhere(['EQ' => ['A.ProdCode'=>$prod_code, 'b.MockType' => $mock_type]])->getMakeWhere(true);
        $result = $this->_conn->query($select. $from. $where)->result_array();
        //echo $this->_conn->last_query();exit;
        return $result;
    }


    /**
     * 응시직렬 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestMockPart($prod_code)
    {
        $select = 'Select straight_join b.Ccd,b.CcdName ';

        $from = '
                    from 
                        vw_product_mocktest a 
                        join lms_sys_code b on find_in_set(b.Ccd, a.MockPart)';
        $where = ' where b.IsUse=\'Y\' ';
        
        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);
        
        $order_by = 'order by b.OrderNum';

        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 응시지역 추출 (응시지역 1 + 응시지역 2)
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestArea($prod_code)
    {

        $select = 'Select * ';

        $from = 'from 
                    (
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            vw_product_mocktest a 
                            join lms_sys_code b on find_in_set(b.Ccd, a.TakeAreas1CCds)
                        where a.ProdCode =\''.$prod_code.'\' 
                        
                        union all
                        
                        select 
                        straight_join
                            b.Ccd,b.CcdName
                        from 
                            vw_product_mocktest a 
                            join lms_sys_code b on find_in_set(b.Ccd, a.TakeAreas2CCds)
                        where a.ProdCode =\''.$prod_code.'\' 
                    ) mm ';

        $result = $this->_conn->query($select. $from)->result_array();
        return $result;
    }


    /**
     * 가산점 항목 추출
     * @param $prod_code
     * @return mixed
     */
    public function listMockTestAddPoint($prod_code)
    {
        $select = 'Select straight_join b.Ccd,b.CcdName,b.CcdValue ';

        $from = '
                    from 
                        vw_product_mocktest a 
                        join lms_sys_code b on find_in_set(b.Ccd, a.AddPointCcds)';
        $where = ' where b.IsUse=\'Y\' ';

        $where .= $this->_conn->makeWhere(['EQ'=>['A.ProdCode' => $prod_code]])->getMakeWhere(true);

        $order_by = 'order by b.OrderNum';
 
        $result = $this->_conn->query($select. $from. $where. $order_by)->result_array();

        //echo $this->_conn->last_query();
        return $result;
    }



}