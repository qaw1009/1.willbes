<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateLectureInfoFModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listUpdateInfo($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $add_column = '')
    {

        if($is_count) {
            $count_column = 'count(*) as numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $column = 'p.SiteCode
                        ,p.ProdCode,p.ProdName
                        ,pl.wLecIdx
                        ,ps.SubjectName
                        ,prc.CateCode
                        ,pc.CateName
                        ,pf.ProfNickName, pf.ProfIdx
                        ,date_format(lu.wRegDatm, \'%Y-%m-%d\') as unit_regdate
                        ,count(lu.wUnitIdx) as unit_cnt ';
        $column .= $add_column;

        $from = ' from 
                        lms_product p
                        join lms_product_lecture pl on p.ProdCode = pl.ProdCode
                        join lms_product_subject ps on pl.SubjectIdx = ps.SubjectIdx and ps.IsStatus=\'Y\' and ps.IsUse=\'Y\'
                        join lms_product_r_category prc on p.ProdCode = prc.ProdCode and prc.IsStatus=\'Y\'
                        join lms_sys_category pc on pc.CateCode = prc.CateCode and pc.IsStatus=\'Y\' and pc.IsFrontUse=\'Y\' and pc.IsUse=\'Y\'
                        join wbs_cms_lecture wcl on pl.wLecIdx = wcl.wLecIdx and wcl.wIsStatus=\'Y\' and wcl.wIsUse=\'Y\'
                        join lms_product_division pd on p.ProdCode = pd.ProdCode and pd.IsReprProf=\'Y\' and pd.IsStatus=\'Y\'
                        join lms_professor pf on pd.ProfIdx = pf.ProfIdx and pf.IsStatus=\'Y\'
                        join wbs_cms_lecture_unit lu on lu.wLecIdx = pl.wLecIdx and lu.wIsStatus=\'Y\' and lu.wIsUse=\'Y\'
                    where 
                        p.IsStatus=\'Y\' 
	                    and p.IsUse=\'Y\'
	                    and p.SaleStatusCcd != \'618003\'
        ';

        $group_by = ' group by 
                            p.SiteCode
                            ,p.ProdCode,p.ProdName
                            ,pl.wLecIdx
                            ,ps.SubjectName
                            ,prc.CateCode
                            ,pc.CateName
                            ,pf.ProfNickName
                            ,pf.ProfIdx
                            ,unit_regdate';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        if($is_count) {
            $query = $this->_conn->query('select ' . $count_column . ' from (select ' . $column . $from . $where . $group_by . $order_by_offset_limit.') mm')->row(0)->numrows;
        } else {
            $query = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by_offset_limit)->result_array();
        }

        return $query;
    }

}