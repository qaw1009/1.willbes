<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends WB_Model
{
    private $_table = [
        'menu' => 'lms_sys_menu',
        'admin' => 'wbs_sys_admin',
        'authority' => 'lms_sys_admin_authority',
        'wbs_code' => 'wbs_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메뉴 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array
     */
    public function listMenu($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'MenuIdx, MenuName, ParentMenuIdx, GroupMenuIdx, MenuDepth, MenuUrl, IconClassName, OrderNum, IsUse';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['menu'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 메뉴관리 목록 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllMenu($arr_condition = [])
    {
        $column = 'U.*, A.wAdminName as LastRegAdminName';
        $from = '
            from (
                select BMenuIdx, BMenuName, BMenuDepth, BOrderNum, if(BMenuDepth < LastMenuDepth, BIsUse, "") as BIsUse, BIsTzone
                    , MMenuIdx, MMenuName, MMenuDepth, MOrderNum, if(MMenuDepth < LastMenuDepth, MIsUse, "") as MIsUse, MIsTzone
                    , SMenuIdx, SMenuName, SMenuDepth, SOrderNum, IsTzone
                    , if(LastMenuDepth = 1, BMenuUrl, if(LastMenuDepth = 2, MMenuUrl, SMenuUrl)) as LastMenuUrl
                    , if(LastMenuDepth = 1, BIsUse, if(LastMenuDepth = 2, MIsUse, SIsUse)) as LastIsUse
                    , if(LastMenuDepth = 1, BRegAdminIdx, if(LastMenuDepth = 2, MRegAdminIdx, SRegAdminIdx)) as LastRegAdminIdx
                    , if(LastMenuDepth = 1, BRegDatm, if(LastMenuDepth = 2, MRegDatm, SRegDatm)) as LastRegDatm
                from (
                    select BM.MenuIdx as BMenuIdx, BM.MenuName as BMenuName, BM.MenuDepth as BMenuDepth, BM.OrderNum as BOrderNum
                        , BM.IsUse as BIsUse, BM.MenuUrl as BMenuUrl, BM.RegAdminIdx as BRegAdminIdx, BM.RegDatm as BRegDatm, BM.IsTzone	as BIsTzone
                        , MM.MenuIdx as MMenuIdx, MM.MenuName as MMenuName, MM.MenuDepth as MMenuDepth, MM.OrderNum as MOrderNum
                        , MM.IsUse as MIsUse, MM.MenuUrl as MMenuUrl, MM.RegAdminIdx as MRegAdminIdx, MM.RegDatm as MRegDatm ,MM.IsTzone as MIsTzone
                        , SM.MenuIdx as SMenuIdx, SM.MenuName as SMenuName, SM.MenuDepth as SMenuDepth, SM.OrderNum as SOrderNum
                        , SM.IsUse as SIsUse, SM.MenuUrl as SMenuUrl, SM.RegAdminIdx as SRegAdminIdx, SM.RegDatm as SRegDatm, SM.IsTzone as IsTzone
                        , greatest(BM.MenuDepth, ifnull(MM.MenuDepth, 0), ifnull(SM.MenuDepth, 0)) as LastMenuDepth		
                    from ' . $this->_table['menu'] . ' as BM
                        left join ' . $this->_table['menu'] . ' as MM
                            on MM.GroupMenuIdx = BM.MenuIdx and MM.MenuDepth = 2 and MM.IsStatus = "Y"
                        left join ' . $this->_table['menu'] . ' as SM
                            on SM.ParentMenuIdx = MM.MenuIdx and SM.MenuDepth = 3 and SM.IsStatus = "Y"
                    where BM.MenuDepth = 1 and BM.IsStatus = "Y"
                ) as I
            ) as U 
                left join ' . $this->_table['admin'] . ' as A
                    on U.LastRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y" 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['BOrderNum' => 'asc', 'MOrderNum' => 'asc', 'SOrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 동일한 레벨의 메뉴 목록 조회
     * @param $menu_idx
     * @return array
     */
    public function listSameDepthMenu($menu_idx)
    {
        $column = 'PM.MenuIdx, PM.MenuName, PM.MenuDepth';
        $from = '
            from ' . $this->_table['menu'] . ' as M
                inner join ' . $this->_table['menu'] . ' as PM
                    on M.ParentMenuIdx = PM.ParentMenuIdx            
        ';
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'M.MenuIdx' => $menu_idx, 'M.IsStatus' => 'Y', 'PM.IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['PM.OrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 메뉴 조회
     * @param $menu_idx
     * @return array
     */
    public function findMenuByMenuIdx($menu_idx)
    {
        return $this->_conn->getFindResult($this->_table['menu'], 'MenuIdx, ParentMenuIdx, GroupMenuIdx, MenuDepth', [
            'EQ' => ['MenuIdx' => $menu_idx, 'IsStatus' => 'Y']
        ]);
    }

    /**
     * 메뉴 수정폼에 필요한 데이터 조회
     * @param $menu_idx
     * @return array
     */
    public function findMenuForModify($menu_idx)
    {
        $column = 'M.MenuIdx, M.MenuName, M.ParentMenuIdx, M.GroupMenuIdx, M.MenuDepth, M.MenuUrl, M.IconClassName, M.OrderNum, M.IsUse, M.RegDatm, M.UpdDatm ,M.IsTzone, M.IsOpen';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.UpdAdminIdx and wIsStatus = "Y") as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['menu'] . ' as M', $column, [
            'EQ' => ['M.MenuIdx' => $menu_idx, 'M.IsStatus' => 'Y']
        ]);
    }

    /**
     * 다음 메뉴 정렬순서값 조회
     * @param $parent_menu_idx
     * @return int
     */
    public function getMenuOrderNum($parent_menu_idx)
    {
        return $this->_conn->getFindResult($this->_table['menu'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['ParentMenuIdx' => $parent_menu_idx]
        ])['NextOrderNum'];
    }

    /**
     * 부모 메뉴식별자의 자식 메뉴식별자 조회
     * @param int $parent_menu_idx [부모카테고리코드]
     * @return array
     */
    public function getChildMenuIdxs($parent_menu_idx)
    {
        $query = /** @lang text */ '
            select MenuIdx, @r := concat(@r, ",", MenuIdx) as TreeMenuIdxs
            from (
                select MenuIdx, ParentMenuIdx
                from ' . $this->_table['menu'] . '
                order by ParentMenuIdx, MenuIdx
            ) as C, (select @r := ?) as vars
            where find_in_set(ParentMenuIdx, @r) > 0
            order by 2 desc
            limit 1       
        ';

        $row = $this->_conn->query($query, [$parent_menu_idx])->row_array();

        return array_slice(explode(',', $row['TreeMenuIdxs']), 1);
    }

    /**
     * 메뉴 등록
     * @param array $input
     * @return array|bool
     */
    public function addMenu($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $group_menu_idx = element('group_menu_idx', $input, 0);
            $parent_menu_idx = get_var(element('parent_menu_idx', $input), $group_menu_idx);
            $admin_idx = $this->session->userdata('admin_idx');
            $data = [
                'MenuName' => element('menu_name', $input),
                'IsTzone' => element('is_tzone', $input,'N'),
                'IsUse' => element('is_use', $input,'Y'),
                'IsOpen' => element('is_open', $input,'Y'),
                'RegAdminIdx' => $admin_idx
            ];

            if ($group_menu_idx == 0) {
                // GNB, MenuDepth=1
                $data = array_merge($data, [
                    'MenuDepth' => 1,
                    'OrderNum' => $this->getMenuOrderNum($parent_menu_idx),
                ]);
            } else {
                // LNB, MenuDepth > 1
                $row = $this->findMenuByMenuIdx($parent_menu_idx);
                if (empty($row) === true) {
                    throw new \Exception('부모메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $data = array_merge($data, [
                    'ParentMenuIdx' => $parent_menu_idx,
                    'GroupMenuIdx' => $row['GroupMenuIdx'],
                    'MenuDepth' => intval($row['MenuDepth']) + 1,
                    'MenuUrl' => element('menu_url', $input),
                    'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getMenuOrderNum($parent_menu_idx) : element('order_num', $input),
                ]);

                if ($row['MenuDepth'] == 1) {
                    $data['IconClassName'] = get_var(element('icon_class_name', $input), 'fa-file-text');
                }
            }

            // 메뉴 등록
            if ($this->_conn->set($data)->insert($this->_table['menu']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // GNB 메뉴일 경우 GroupMenuIdx 값을 등록된 MenuIdx 값으로 업데이트
            if ($group_menu_idx == 0) {
                $inserted_menu_idx = $this->_conn->insert_id();
                $is_update = $this->_conn->set(['GroupMenuIdx' => $inserted_menu_idx, 'UpdAdminIdx' => $admin_idx])->where('MenuIdx', $inserted_menu_idx)->update($this->_table['menu']);
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
     * 메뉴 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyMenu($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $menu_idx = element('idx', $input);
            $group_menu_idx = element('group_menu_idx', $input, 0);
            $parent_menu_idx = get_var(element('parent_menu_idx', $input), $group_menu_idx);
            $is_use = element('is_use', $input,'Y');
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'MenuName' => element('menu_name', $input),
                'IsTzone' => element('is_tzone', $input,'N'),
                'IsUse' => $is_use,
                'IsOpen' => element('is_open', $input,'Y'),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($group_menu_idx > 0) {
                // MenuDepth > 1
                $row = $this->findMenuByMenuIdx($parent_menu_idx);
                if (empty($row) === true) {
                    throw new \Exception('부모메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $data = array_merge($data, [
                    'ParentMenuIdx' => $parent_menu_idx,
                    'GroupMenuIdx' => $row['GroupMenuIdx'],
                    'MenuUrl' => element('menu_url', $input),
                    'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getMenuOrderNum($parent_menu_idx) : element('order_num', $input),
                ]);

                if ($row['MenuDepth'] == 1) {
                    $data['IconClassName'] = get_var(element('icon_class_name', $input), 'fa-file-text');
                }
            }

            $this->_conn->set($data)->where('MenuIdx', $menu_idx);
            if ($this->_conn->update($this->_table['menu']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            if ($is_use == 'N') {
                // 자식 메뉴가 있다면 동일하게 미사용 처리
                $child_menu_idxs = $this->getChildMenuIdxs($menu_idx);
                if (empty($child_menu_idxs) === false) {
                    $this->_conn->set('IsUse', 'N')->set('UpdAdminIdx', $admin_idx)->where_in('MenuIdx', $child_menu_idxs);
                    if ($this->_conn->update($this->_table['menu']) === false) {
                        throw new \Exception('자식메뉴 미사용 처리에 실패했습니다.');
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
     * 메뉴 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyMenusReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $menu_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('MenuIdx', $menu_idx);

                if ($this->_conn->update($this->_table['menu']) === false) {
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
     * 메뉴별 관리자 권한 목록
     * @param array $arr_condition
     * @return mixed
     */
    public function listMenuAdminAuthority($arr_condition = [])
    {
        $column = " straight_join
                        a.MenuIdx, a.MenuName, a.MenuDepth
                        ,c.RoleIdx, c.RoleName 
                        ,e.wAdminIdx, e.wAdminId, e.wAdminName, e.wIsUse, e.wRegDatm 
                        ,e.wAdminDeptCcd,e.wAdminPositionCcd
                        ,f.wCcdName as DeptName
                        ,g.wCcdName as PositionName
                        ,ifnull(h.IsWrite, 'N') as IsWrite
                        ,ifnull(h.IsExcel, 'N') as IsExcel
                        ,ifnull(h.IsMasking, 'N') as IsMasking
                        ,h.SaaIdx
                        ";
        $from = " 
                    from
                        ". $this->_table['menu'] ." a
                        join lms_sys_admin_role_r_menu b on a.MenuIdx = b.MenuIdx and b.IsStatus ='Y' 
                        join lms_sys_admin_role c on b.RoleIdx = c.RoleIdx and c.IsStatus = 'Y' and c.IsUse = 'Y'
                        join lms_sys_admin_r_admin_role d on c.RoleIdx = d.RoleIdx and d.IsStatus ='Y'
                        join ". $this->_table['admin'] ." e on d.wAdminIdx = e.wAdminIdx and e.wIsStatus = 'Y' and e.wIsApproval ='Y'
                        join ". $this->_table['wbs_code'] ." f on e.wAdminDeptCcd = f.wCcd and f.wIsStatus = 'Y'
                        join ". $this->_table['wbs_code'] ." g on e.wAdminPositionCcd = g.wCcd and g.wIsStatus = 'Y'
                        left join ". $this->_table['authority'] ." h on e.wAdminIdx = h.wAdminIdx and d.RoleIdx = h.RoleIdx and a.MenuIdx = h.MenuIdx and h.IsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere();
        $order_by = $this->_conn->makeOrderBy(['c.RoleIdx' => 'asc', 'e.wAdminName' => 'asc', 'e.wAdminIdx' => 'desc'])->getMakeOrderBy();
        
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 메뉴별 권한 처리
     * @param array $params
     * @return array|bool
     */
    public function addMenuAdminAuthority($params=[])
    {
        $this->_conn->trans_begin();

        try {

            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $menu_idx = $params['menu_idx'];
            $admin_idx = $this->session->userdata('admin_idx');

            $saa_idx = $params['saa_idx'];  // 삭제할 SsaIdx 값

            if(count($saa_idx) > 0) {
                /* 기존 데이터 상태값 변경*/
                $this->_conn->set(['IsStatus' => 'N', 'UpdAdminIdx' => $admin_idx])->where( 'IsStatus', 'Y')->where('MenuIdx', $menu_idx)
                    ->where_in('SaaIdx',array_unique($saa_idx));

                if($this->_conn->update($this->_table['authority']) === false) {
                    throw new \Exception('기존 데이터 수정에 실패했습니다.');
                }
            }

            $default_data = [
                'MenuIdx' => $menu_idx,
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address(),
            ];

            /* 신규 데이터 삽입*/
            foreach ($params['authority'] as $admin => $column) {

                $admin_idx = str_first_pos_before($admin, '|');
                $role_idx = str_first_pos_after($admin, '|');

                $insert_data = ['wAdminIdx' => $admin_idx, 'RoleIdx' => $role_idx];
                $insert_data = array_merge($insert_data, $column, ['JsonData' => json_encode($column)], $default_data);

                if($this->_conn->set($insert_data)->insert($this->_table['authority']) === false) {
                    throw new \Exception('권한 등록에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

}