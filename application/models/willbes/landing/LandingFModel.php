<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingFModel extends WB_Model {
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function findLandingByLCode($l_code,$add_condition=[]) {
        $arr_condition = array_merge_recursive($add_condition, ['EQ' => ['mm.LCode'=>$l_code]]);
        $column = ' * ';
        $from = 'from 
                        (
                        select
                            A.*
                            ,tmp.CateCode_String,CateName_String
                            ,if( (now() between DispStartDatm and DispEndDatm)=0, \'N\', \'Y\') as date_valid
                        from 
                            lms_landing A
                            left outer join 
                                (
                                    select S.LIdx, group_concat(B.CateCode) as CateCode_String, group_concat(C.CateName) as CateName_String
                                        from 
                                            lms_landing S
                                            join lms_landing_r_category B on S.LIdx = B.LIdx and B.IsStatus=\'Y\'
                                            join lms_sys_category C on B.CateCode = C.CateCode
                                    where S.LCode = '.$l_code.' and S.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' 
                                    group by S.LIdx
                                ) tmp on tmp.LIdx = A.LIdx
                            where A.LCode = '.$l_code.' and A.IsStatus=\'Y\'
                        ) mm
                    where mm.IsStatus=\'Y\'
        ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select '. $column . $from . $where) -> row_array();
        return $query;
    }
}
