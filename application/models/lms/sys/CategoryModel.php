<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends WB_Model
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
     * 카테고리 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listCategory($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'CateCode, SiteCode, CateName, ParentCateCode, GroupCateCode, CateDepth, OrderNum, IsUse, IsFrontUse';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['category'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 카테고리 관리 목록 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCategory($arr_condition = [])
    {
        $column = 'U.*, A.wAdminName as LastRegAdminName';
        $from = '
            from (
                select SiteCode, SiteName 
                    , BCateCode, BCateName, BCateDepth, BOrderNum, if(BCateDepth < LastCateDepth, BIsUse, "") as BIsUse, BIsDefault
                    , MCateCode, MCateName, MCateDepth, MOrderNum, if(MCateDepth < LastCateDepth, MIsUse, "") as MIsUse, MIsDefault
                    , if(LastCateDepth = 1, BIsUse, MIsUse) as LastIsUse
                    , if(LastCateDepth = 1, BRegAdminIdx, MRegAdminIdx) as LastRegAdminIdx
                    , if(LastCateDepth = 1, BRegDatm, MRegDatm) as LastRegDatm
                from (
                    select S.SiteCode, S.SiteName
                        , BC.CateCode as BCateCode, BC.CateName as BCateName, BC.CateDepth as BCateDepth, BC.OrderNum as BOrderNum
                        , BC.IsDefault as BIsDefault, BC.IsUse as BIsUse, BC.RegAdminIdx as BRegAdminIdx, BC.RegDatm as BRegDatm
                        , MC.CateCode as MCateCode, MC.CateName as MCateName, MC.CateDepth as MCateDepth, MC.OrderNum as MOrderNum
                        , MC.IsDefault as MIsDefault, MC.IsUse as MIsUse, MC.RegAdminIdx as MRegAdminIdx, MC.RegDatm as MRegDatm
                        , greatest(BC.CateDepth, ifnull(MC.CateDepth, 0)) as LastCateDepth
                    from ' . $this->_table['site'] . ' as S
                        inner join ' . $this->_table['category'] . ' as BC
                            on S.SiteCode = BC.SiteCode
                        left join ' . $this->_table['category'] . ' as MC
                            on MC.GroupCateCode = BC.CateCode and MC.CateDepth = 2 and MC.IsStatus = "Y"
                    where S.IsStatus = "Y" and BC.CateDepth = 1 and BC.IsStatus = "Y"
                ) as I
            ) as U 
                left join ' . $this->_table['admin'] . ' as A
                    on U.LastRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y" 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['SiteCode' => 'asc', 'BOrderNum' => 'asc', 'MOrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
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
                    , C.IsUse, C.RegDatm, C.RegAdminIdx, C.IsFrontUse, A.wAdminName as RegAdminName	                
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
                and C.IsStatus = "Y" and C.IsUse = "Y"              
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 동일한 레벨의 카테고리 목록 조회
     * @param string $cate_code [카테고리 코드]
     * @return array
     */
    public function listSameDepthCategory($cate_code)
    {
        $column = 'PC.CateCode, PC.CateName, PC.CateDepth';
        $from = '
            from ' . $this->_table['category'] . ' as C
                inner join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.ParentCateCode            
        ';
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'C.CateCode' => $cate_code, 'C.IsStatus' => 'Y', 'PC.IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['PC.OrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 카테고리 코드 목록 조회
     * @param string $site_code
     * @param string $parent_cate_code
     * @param string $group_cate_code
     * @param string $cate_depth
     * @return array
     */
    public function getCategoryArray($site_code = '', $parent_cate_code = '', $group_cate_code = '', $cate_depth = '')
    {
        $arr_condition = ['EQ' => [
            'ParentCateCode' => $parent_cate_code, 'GroupCateCode' => $group_cate_code, 'CateDepth' => $cate_depth, 'IsUse' => 'Y', 'IsStatus' => 'Y'
        ]];

        if (empty($site_code) === false) {
            $arr_condition['EQ']['SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getListResult($this->_table['category'], 'SiteCode, CateCode, CateName, ParentCateCode, GroupCateCode, CateDepth',
            $arr_condition, null, null, [
            'SiteCode' => 'asc', 'OrderNum' => 'asc'
        ]);

        return (empty($site_code) === false) ? array_pluck($data, 'CateName', 'CateCode') : $data;
    }

    /**
     * 카테고리 코드 목록 조회 (카테고리 경로명 포함)
     * @param string $site_code
     * @param string $parent_cate_code
     * @param string $group_cate_code
     * @param string $cate_depth
     * @return mixed
     */
    public function getCategoryRouteArray($site_code = '', $parent_cate_code = '', $group_cate_code = '', $cate_depth = '')
    {
        $arr_condition = ['EQ' => [
            'C.ParentCateCode' => $parent_cate_code, 'C.GroupCateCode' => $group_cate_code, 'C.CateDepth' => $cate_depth
        ]];

        if (empty($site_code) === false) {
            $arr_condition['EQ']['S.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['S.SiteCode'] = get_auth_site_codes();
        }

        $column = 'S.SiteCode, S.SiteName, C.CateCode, C.CateName, C.ParentCateCode, PC.CateName as ParentCateName, C.GroupCateCode, C.CateDepth';
        $column .= ', concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
            where S.IsUse = "Y" and S.IsStatus = "Y"
                and C.IsStatus = "Y" and C.IsUse = "Y"             
        ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['S.SiteCode' => 'asc', 'PC.OrderNum' => 'asc', 'C.OrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 카테고리 경로 리턴
     * @param $site_code
     * @param $cate_code
     * @return mixed
     */
    public function getCategoryRouteName($site_code, $cate_code)
    {
        $column = 'S.SiteName, C.CateName, PC.CateName as ParentCateName';
        $column .= ' , (case C.CateDepth when 1 then concat(S.SiteName, ">", C.CateName) when 2 then concat(S.SiteName, ">", PC.CateName, ">", C.CateName) end) as CateRouteName';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                left join ' . $this->_table['category'] . ' as PC
                    on S.SiteCode = PC.SiteCode and C.ParentCateCode = PC.CateCode and PC.IsStatus = "Y"   
        ';
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'S.SiteCode' => $site_code, 'C.CateCode' => $cate_code, 'S.IsStatus' => 'Y', 'C.IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);

        return element('CateRouteName', $query->row_array());
    }

    /**
     * 카테고리 조회
     * @param $cate_code
     * @return array
     */
    public function findCategoryByCateCode($cate_code)
    {
        return $this->_conn->getFindResult($this->_table['category'], 'CateCode, SiteCode, CateName, ParentCateCode, GroupCateCode, CateDepth', [
            'EQ' => ['CateCode' => $cate_code, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 카테고리 수정폼에 필요한 데이터 조회
     * @param $cate_code
     * @return array
     */
    public function findCategoryForModify($cate_code)
    {
        $column = 'C.CateCode, C.SiteCode, C.CateName, C.ParentCateCode, C.GroupCateCode, C.CateDepth, C.OrderNum, C.IsDefault, C.IsUse,C.IsFrontUse, C.RegDatm, C.UpdDatm';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = C.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= '    , if(C.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = C.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['category'] . ' as C', $column, [
            'EQ' => ['C.CateCode' => $cate_code, 'C.IsStatus' => 'Y']
        ]);
    }

    /**
     * 다음 카테고리 정렬순서값 조회
     * @param $site_code
     * @param $parent_cate_code
     * @return int
     */
    public function getCategoryOrderNum($site_code, $parent_cate_code)
    {
        return $this->_conn->getFindResult($this->_table['category'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code, 'ParentCateCode' => $parent_cate_code]
        ])['NextOrderNum'];
    }

    /**
     * 카테고리 등록
     * @param array $input
     * @return array|bool
     */
    public function addCategory($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $group_cate_code = element('group_cate_code', $input, 0);
            $parent_cate_code = get_var(element('parent_cate_code', $input), $group_cate_code);

            if ($group_cate_code == 0) {
                // 대분류
                $row = $this->_conn->getFindResult($this->_table['category'], 'ifnull(max(CateCode) + 1, 3001) as CateCode', ['EQ' => ['CateDepth' => 1]]);
                $_cate_code = $row['CateCode'];
                $_group_cate_code = $_cate_code;
                $_cate_depth = 1;
            } else {
                // 하위분류
                $row = $this->_conn->getFindResult($this->_table['category'], 'ifnull(max(CateCode) + 1, ' . intval($parent_cate_code . '01') . ') as CateCode', ['EQ' => ['ParentCateCode' => $parent_cate_code]]);
                $_cate_code = $row['CateCode'];

                $row = $this->findCategoryByCateCode($parent_cate_code);
                if (empty($row) === true) {
                    throw new \Exception('부모 카테고리 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }
                $_group_cate_code = $row['GroupCateCode'];
                $_cate_depth = $row['CateDepth'] + 1;
            }

            // 데이터 저장
            $data = [
                'CateCode' => $_cate_code,
                'SiteCode' => element('site_code', $input),
                'CateName' => element('cate_name', $input),
                'ParentCateCode' => $parent_cate_code,
                'GroupCateCode' => $_group_cate_code,
                'CateDepth' => $_cate_depth,
                'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getCategoryOrderNum(element('site_code', $input), $parent_cate_code) : element('order_num', $input),
                'IsDefault' => element('is_default', $input),
                'IsUse' => element('is_use', $input),
                'IsFrontUse' => element('is_front_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['category']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 카테고리 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCategory($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 카테고리 코드
            $cate_code = element('idx', $input);

            // 카테고리 정보 조회
            $row = $this->findCategoryByCateCode($cate_code);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 데이터 수정
            $data = [
                'CateName' => element('cate_name', $input),
                'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getCategoryOrderNum($row['SiteCode'], $row['ParentCateCode']) : element('order_num', $input),
                'IsDefault' => element('is_default', $input),
                'IsUse' => element('is_use', $input),
                'IsFrontUse' => element('is_front_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($data)->where('CateCode', $cate_code);

            if ($this->_conn->update($this->_table['category']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 카테고리 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyCategoriesReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $cate_code => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('CateCode', $cate_code);

                if ($this->_conn->update($this->_table['category']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
