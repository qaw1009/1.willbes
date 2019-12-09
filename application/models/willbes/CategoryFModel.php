<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryFModel extends WB_Model
{
    private $_table = [
        'category' => 'lms_sys_category'
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

        return $this->_conn->getListResult($this->_table['category'], 'SiteCode, CateCode, CateName, ParentCateCode, GroupCateCode, CateDepth',
            $arr_condition, null, null, ['CateDepth' => 'asc', 'OrderNum' => 'asc']);
    }
}
