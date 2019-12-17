<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMenuModel extends WB_Model
{
    private $_table = [
        'site_menu' => 'lms_site_menu',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 메뉴 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array
     */
    public function listSiteMenu($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'MenuIdx, SiteCode, MenuName, ParentMenuIdx, GroupMenuIdx, MenuDepth, MenuUrl, UrlType, UrlTarget, MenuEtc, GroupOrderNum, OrderNum, IsUse';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['site_menu'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사이트 메뉴관리 목록 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllSiteMenu($arr_condition = [])
    {
        $column = '
            M.MenuIdx, M.SiteCode, M.MenuType, M.MenuName, M.ParentMenuIdx, M.GroupMenuIdx, M.MenuDepth, M.MenuUrl, M.MenuEtc, M.GroupOrderNum, M.OrderNum, M.IsUse, M.RegDatm, M.RegAdminIdx
                , fn_site_menu_connect_by_type(M.MenuIdx, "name") as MenuRouteName, S.SiteName, A.wAdminName as RegAdminName, left(MenuType, 1) as MenuTypeOrder
        ';
        $from = '
            from ' . $this->_table['site_menu'] . ' as M 
                inner join ' . $this->_table['site'] . ' as S
                    on M.SiteCode = S.SiteCode
                left join ' . $this->_table['admin'] . ' as A
                    on M.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where S.IsStatus = "Y"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['S.OrderNum' => 'asc', 'MenuTypeOrder' => 'asc', 'M.GroupOrderNum' => 'asc', 'M.OrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 사이트 메뉴 조회
     * @param $menu_idx
     * @return array
     */
    public function findSiteMenuByMenuIdx($menu_idx)
    {
        return $this->_conn->getFindResult($this->_table['site_menu'], 'MenuIdx, SiteCode, MenuName, ParentMenuIdx, GroupMenuIdx, MenuDepth, GroupOrderNum, OrderNum', [
            'EQ' => ['MenuIdx' => $menu_idx, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 사이트 메뉴 조회 with 메뉴경로
     * @param $menu_idx
     * @return array
     */
    public function findSiteMenuWithRouteName($menu_idx)
    {
        return $this->_conn->getFindResult($this->_table['site_menu'], 'MenuIdx, SiteCode, MenuName, ParentMenuIdx, GroupMenuIdx, MenuDepth, GroupOrderNum, OrderNum, fn_site_menu_connect_by_type(MenuIdx, "name") as MenuRouteName', [
            'EQ' => ['MenuIdx' => $menu_idx, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 사이트 메뉴 수정폼에 필요한 데이터 조회
     * @param $menu_idx
     * @return array
     */
    public function findSiteMenuForModify($menu_idx)
    {
        $column = 'M.MenuIdx, M.SiteCode, M.MenuType, M.MenuName, M.ParentMenuIdx, M.GroupMenuIdx, M.MenuDepth, M.MenuUrl, M.UrlType, M.UrlTarget, M.MenuIcon, M.MenuEtc';
        $column .= '    , M.GroupOrderNum, M.OrderNum, M.IsUse, M.RegDatm, M.UpdDatm, fn_site_menu_connect_by_type(M.MenuIdx, "name") as MenuRouteName';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.UpdAdminIdx and wIsStatus = "Y") as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['site_menu'] . ' as M', $column, [
            'EQ' => ['M.MenuIdx' => $menu_idx, 'M.IsStatus' => 'Y']
        ]);
    }

    /**
     * 다음 사이트 메뉴 그룹 정렬순서값 조회
     * @param $site_code
     * @return int
     */
    public function getSiteMenuGroupOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table['site_menu'], 'ifnull(max(GroupOrderNum), 0) + 1 as NextGroupOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextGroupOrderNum'];
    }

    /**
     * 다음 사이트 메뉴 정렬순서값 조회 및 조정
     * @param $site_code
     * @param $parent_menu_idx
     * @param $group_menu_idx
     * @param $menu_depth
     * @return int|string
     */
    public function getSiteMenuOrderNum($site_code, $parent_menu_idx, $group_menu_idx, $menu_depth)
    {
        $next_order_num = 1;

        try {
            if ($parent_menu_idx == 0) {
                return $next_order_num;
            }

            // 다음 순번 조회 (같은 부모를 가진 자식 중 가장 큰 OrderNum 조회)
            $next_row = element('0', $this->_conn->getListResult($this->_table['site_menu'], 'MenuIdx, OrderNum', [
                'EQ' => ['SiteCode' => $site_code, 'ParentMenuIdx' => $parent_menu_idx]
            ], 1, 0, ['OrderNum' => 'desc']));

            if (empty($next_row) === true) {
                // 자식이 없다면 부모 OrderNum 조회
                $next_row = $this->_conn->getFindResult($this->_table['site_menu'], 'MenuIdx, OrderNum', [
                    'EQ' => ['MenuIdx' => $parent_menu_idx]
                ]);
            }

            // OrderNum + 1
            $next_order_num = $next_row['OrderNum'] + 1;

            // 다음 순번의 MenuIdx에 자식이 있다면 자식수만큼 OrderNum 더함
            $next_child_query = /** @lang text */ '
                select count(@pv := concat(@pv, ",", MenuIdx)) as NextChildCnt
                from (
                	select MenuIdx, ParentMenuIdx
	                from ' . $this->_table['site_menu'] . '
	                where SiteCode = ? and GroupMenuIdx = ? and MenuDepth > ? and OrderNum >= ?
                    order by ParentMenuIdx, MenuIdx                                            	                    
                ) as A, (select @pv := ?) as B
                where find_in_set(ParentMenuIdx, @pv) > 0';
            $next_child_cnt = $this->_conn->query($next_child_query, [$site_code, $group_menu_idx, $menu_depth, $next_order_num, $next_row['MenuIdx']])->row(0)->NextChildCnt;

            if ($next_child_cnt > 0) {
                $next_order_num += $next_child_cnt;
            }

            // 다음 순번보다 크거나 같은 순번 +1 업데이트
            $this->_conn->set('OrderNum', 'OrderNum + 1', false)->where('GroupMenuIdx', $group_menu_idx)->where('OrderNum >= ', $next_order_num);
            if ($this->_conn->update($this->_table['site_menu']) === false) {
                throw new \Exception('사이트 메뉴 정렬순서 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $next_order_num;
    }

    /**
     * 부모 사이트 메뉴 식별자의 자식 사이트 메뉴 식별자 조회
     * @param $parent_menu_idx
     * @return array
     */
    public function getChildSiteMenusIdx($parent_menu_idx)
    {
        $query = /** @lang text */ '
            select MenuIdx, @r := concat(@r, ",", MenuIdx) as TreeMenusIdx
            from (
                select MenuIdx, ParentMenuIdx
                from ' . $this->_table['site_menu'] . '
                order by ParentMenuIdx, MenuIdx
            ) as SM, (select @r := ?) as vars
            where find_in_set(ParentMenuIdx, @r) > 0
            order by 2 desc
            limit 1        
        ';

        $row = $this->_conn->query($query, [$parent_menu_idx])->row_array();

        return array_slice(explode(',', $row['TreeMenusIdx']), 1);
    }

    /**
     * 사이트 메뉴 등록
     * @param array $input
     * @return array|bool
     */
    public function addSiteMenu($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $parent_menu_idx = element('parent_menu_idx', $input, 0);
            $admin_idx = $this->session->userdata('admin_idx');
            $data = [
                'MenuType' => element('menu_type', $input),
                'MenuName' => element('menu_name', $input),
                'ParentMenuIdx' => $parent_menu_idx,
                'MenuUrl' => element('menu_url', $input),
                'UrlType' => element('url_type', $input),
                'UrlTarget' => element('url_target', $input),
                'MenuIcon' => element('menu_icon', $input),
                'MenuEtc' => element('menu_etc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx
            ];

            if ($parent_menu_idx == 0) {
                // 사이트별 최상위 메뉴, MenuDepth=1
                $data = array_merge($data, [
                    'SiteCode' => element('site_code', $input),
                    'MenuDepth' => 1,
                    'GroupOrderNum' => $this->getSiteMenuGroupOrderNum(element('site_code', $input)),
                    'OrderNum' => 1,
                ]);
            } else {
                // 사이트별 하위 메뉴, MenuDepth > 1
                $row = $this->findSiteMenuByMenuIdx($parent_menu_idx);
                if (empty($row) === true) {
                    throw new \Exception('부모메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $next_menu_depth = intval($row['MenuDepth']) + 1;
                $next_order_num = $this->getSiteMenuOrderNum($row['SiteCode'], $parent_menu_idx, $row['GroupMenuIdx'], $next_menu_depth);
                if (is_numeric($next_order_num) === false) {
                    throw new \Exception($next_order_num);
                }

                $data = array_merge($data, [
                    'SiteCode' => $row['SiteCode'],
                    'GroupMenuIdx' => $row['GroupMenuIdx'],
                    'MenuDepth' => $next_menu_depth,
                    'GroupOrderNum' => $row['GroupOrderNum'],
                    'OrderNum' => $next_order_num,
                ]);
            }

            // 메뉴 등록
            if ($this->_conn->set($data)->insert($this->_table['site_menu']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // 사이트별 최상위 메뉴일 경우 GroupMenuIdx 값을 등록된 MenuIdx 값으로 업데이트
            if ($parent_menu_idx == 0) {
                $inserted_menu_idx = $this->_conn->insert_id();
                $is_update = $this->_conn->set(['GroupMenuIdx' => $inserted_menu_idx, 'UpdAdminIdx' => $admin_idx])->where('MenuIdx', $inserted_menu_idx)->update($this->_table['site_menu']);
                if ($is_update === false) {
                    throw new \Exception('그룹메뉴식별자 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사이트 메뉴 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySiteMenu($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $menu_idx = element('idx', $input);
            $is_use = element('is_use', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'MenuType' => element('menu_type', $input),
                'MenuName' => element('menu_name', $input),
                'MenuUrl' => element('menu_url', $input),
                'UrlType' => element('url_type', $input),
                'UrlTarget' => element('url_target', $input),
                'MenuIcon' => element('menu_icon', $input),
                'MenuEtc' => element('menu_etc', $input),
                'IsUse' => $is_use,
                'UpdAdminIdx' => $admin_idx
            ];

            $this->_conn->set($data)->where('MenuIdx', $menu_idx);
            if ($this->_conn->update($this->_table['site_menu']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            if ($is_use == 'N') {
                // 자식 메뉴가 있다면 동일하게 사용 안함 처리
                $child_menus_id = $this->getChildSiteMenusIdx($menu_idx);
                if (empty($child_menus_id) === false) {
                    $this->_conn->set('IsUse', 'N')->where_in('MenuIdx', $child_menus_id);
                    if ($this->_conn->update($this->_table['site_menu']) === false) {
                        throw new \Exception('자식메뉴 사용안함 처리에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사이트 메뉴 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifySiteMenusReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $menu_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('MenuIdx', $menu_idx);

                if ($this->_conn->update($this->_table['site_menu']) === false) {
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

    /**
     * 사이트 그룹메뉴 정렬변경 수정
     * @param array $params
     * @param $site_code
     * @return array|bool
     */
    public function modifySiteGroupMenusReorder($params, $site_code)
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $group_menu_idx => $group_order_num) {
                $is_update = $this->_conn->set('GroupOrderNum', $group_order_num)->set('UpdAdminIdx', $admin_idx)
                    ->where('GroupMenuIdx', $group_menu_idx)->where('SiteCode', $site_code)
                    ->update($this->_table['site_menu']);

                if ($is_update === false) {
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
