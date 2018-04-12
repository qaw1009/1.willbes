<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchCategoryModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin'
    ];
    
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 카테고리 검색 (상품관리 > 카테고리 검색)
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSearchCategory($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                S.SiteCode, S.SiteName
                    , C.CateCode, C.CateName, ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                    , concat(S.SiteName, if(PC.CateCode is null, "", concat(" > ", PC.CateName)), " > ", C.CateName) as CateRouteName
                    , C.IsUse, C.RegDatm, C.RegAdminIdx, A.wAdminName as RegAdminName	                
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on C.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where S.IsUse = "Y" and S.IsStatus = "Y"
                and C.IsStatus = "Y"             
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
