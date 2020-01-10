<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryFModel extends WB_Model
{
    private $_table = [
        'category' => 'lms_sys_category',
        'site' => 'lms_site'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 카테고리 조회 (기본값으로 대분류만 조회)
     * @param int $site_code
     * @param int $cate_depth
     * @return array
     */
    public function listSiteCategory($site_code, $cate_depth = 1)
    {
        $arr_condition = [
            'EQ' => ['SiteCode' => $site_code, 'IsUse' => 'Y', 'IsStatus' => 'Y', 'IsFrontUse' => 'Y'],
            'LTE' => ['CateDepth' => $cate_depth]
        ];

        return $this->_conn->getListResult($this->_table['category'], 'SiteCode, CateCode, CateName, ParentCateCode, GroupCateCode, CateDepth, IsDefault',
            $arr_condition, null, null, ['CateDepth' => 'asc', 'OrderNum' => 'asc']);
    }

    /**
     * 사이트 카테고리 조회 계층형태 (기술자격증 > 전기(산업)기사)
     * @param int $site_code
     * @param string $is_lowest
     * @return array
     */
    public function listSiteCategoryRoute($site_code, $is_lowest = '')
    {
        $column = '
            S.SiteCode, S.SiteName, C.CateCode, C.CateName, C.GroupCateCode
			, IFNULL(PC.CateCode, \'\') AS ParentCateCode, IFNULL(PC.CateName, \'\') AS ParentCateName
			, CONCAT( IF(PC.CateCode IS NULL, \'\', CONCAT(PC.CateName,\' > \')),  C.CateName) AS CateNameRoute
			, C.OrderNum, ifnull(PC.OrderNum,0) as Parent_OrderNum
			, (if( ifnull(PC.OrderNum,0) = 0, concat(C.OrderNum,\'0\'), concat(PC.OrderNum,C.OrderNum))) as Seq
			,(select Count(*) from lms_sys_category A where A.CateCode != C.CateCode and A.CateCode like concat(C.CateCode,\'%\') 
				and A.IsStatus = \'Y\' and A.IsUse = \'Y\' and A.IsFrontUse = \'Y\'   
			) as ChildCnt
        ';

        $from = '
            FROM 
                '.$this->_table['site'].' S
				join '.$this->_table['category'].' C on S.SiteCode = C.SiteCode
				left join '.$this->_table['category'].' PC on C.ParentCateCode = PC.CateCode and PC.IsUse = \'Y\' and PC.IsStatus = \'Y\' and PC.IsFrontUse=\'Y\'
        ';

        $arr_condition = [
            'EQ' => [
                'S.SiteCode' => $site_code
                , 'S.IsUse' => 'Y'
                , 'S.IsStatus' => 'Y'
                , 'C.IsUse' => 'Y'
                , 'C.IsStatus' => 'Y'
                , 'C.IsFrontUse' => 'Y'
            ],
        ];

        $arr_condition_route = [1 => 1];
        if($is_lowest === 'Y') {
            $arr_condition_route = array_merge($arr_condition_route,[
                'EQ' => ['ChildCnt' => '0']
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition) ->getMakeWhere(false);
        $where_route = $this->_conn->makeWhere($arr_condition_route) ->getMakeWhere(false);
        $order_by= $this->_conn->makeOrderBy(['cast(Seq as unsigned)' => 'ASC'])->getMakeOrderBy();

        $data =  $this->_conn->query('select * From (select '.$column .$from .$where.') mm ' .$where_route .$order_by)->result_array();
        return $data;
    }
}
