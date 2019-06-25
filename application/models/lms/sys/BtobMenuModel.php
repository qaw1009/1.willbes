<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobMenuModel extends WB_Model
{
    private $_table = [
        'btob' => 'lms_btob',
        'menu' => 'lms_btob_admin_menu',
        'admin' => 'wbs_sys_admin',
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
        $column = 'MenuIdx, BtobIdx, MenuType, MenuName, ParentMenuIdx, GroupMenuIdx, MenuDepth, MenuUrl, IconClassName, OrderNum, IsUse';
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
        $column = 'U.*, B.BtobName, A.wAdminName as LastRegAdminName';
        $from = '
            from (
                select BtobIdx, MenuType
                    , BMenuIdx, BMenuName, BMenuDepth, BOrderNum, if(BMenuDepth < LastMenuDepth, BIsUse, "") as BIsUse
                    , MMenuIdx, MMenuName, MMenuDepth, MOrderNum, if(MMenuDepth < LastMenuDepth, MIsUse, "") as MIsUse
                    , SMenuIdx, SMenuName, SMenuDepth, SOrderNum
                    , if(LastMenuDepth = 1, BMenuUrl, if(LastMenuDepth = 2, MMenuUrl, SMenuUrl)) as LastMenuUrl
                    , if(LastMenuDepth = 1, BIsUse, if(LastMenuDepth = 2, MIsUse, SIsUse)) as LastIsUse
                    , if(LastMenuDepth = 1, BRegAdminIdx, if(LastMenuDepth = 2, MRegAdminIdx, SRegAdminIdx)) as LastRegAdminIdx
                    , if(LastMenuDepth = 1, BRegDatm, if(LastMenuDepth = 2, MRegDatm, SRegDatm)) as LastRegDatm
                from (
                    select BM.BtobIdx, BM.MenuType
                        , BM.MenuIdx as BMenuIdx, BM.MenuName as BMenuName, BM.MenuDepth as BMenuDepth, BM.OrderNum as BOrderNum
                        , BM.IsUse as BIsUse, BM.MenuUrl as BMenuUrl, BM.RegAdminIdx as BRegAdminIdx, BM.RegDatm as BRegDatm
                        , MM.MenuIdx as MMenuIdx, MM.MenuName as MMenuName, MM.MenuDepth as MMenuDepth, MM.OrderNum as MOrderNum
                        , MM.IsUse as MIsUse, MM.MenuUrl as MMenuUrl, MM.RegAdminIdx as MRegAdminIdx, MM.RegDatm as MRegDatm
                        , SM.MenuIdx as SMenuIdx, SM.MenuName as SMenuName, SM.MenuDepth as SMenuDepth, SM.OrderNum as SOrderNum
                        , SM.IsUse as SIsUse, SM.MenuUrl as SMenuUrl, SM.RegAdminIdx as SRegAdminIdx, SM.RegDatm as SRegDatm
                        , greatest(BM.MenuDepth, ifnull(MM.MenuDepth, 0), ifnull(SM.MenuDepth, 0)) as LastMenuDepth		
                    from ' . $this->_table['menu'] . ' as BM
                        left join ' . $this->_table['menu'] . ' as MM
                            on MM.GroupMenuIdx = BM.MenuIdx and MM.MenuDepth = 2 and MM.IsStatus = "Y"
                        left join ' . $this->_table['menu'] . ' as SM
                            on SM.ParentMenuIdx = MM.MenuIdx and SM.MenuDepth = 3 and SM.IsStatus = "Y"
                    where BM.MenuDepth = 1 and BM.IsStatus = "Y"
                ) as I
            ) as U 
                inner join ' . $this->_table['btob'] . ' as B
                    on U.BtobIdx = B.BtobIdx                
                left join ' . $this->_table['admin'] . ' as A
                    on U.LastRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where B.IsStatus = "Y"                     
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);
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
        return $this->_conn->getFindResult($this->_table['menu'], 'MenuIdx, BtobIdx, MenuType, ParentMenuIdx, GroupMenuIdx, MenuDepth', [
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
        $column = 'M.MenuIdx, M.BtobIdx, M.MenuType, M.MenuName, M.ParentMenuIdx, M.GroupMenuIdx, M.MenuDepth, M.MenuUrl, M.IconClassName, M.OrderNum, M.IsUse, M.RegDatm, M.UpdDatm';
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
                'MenuType' => element('menu_type', $input, 'B'),
                'RegAdminIdx' => $admin_idx
            ];

            if ($group_menu_idx == 0) {
                // GNB, MenuDepth=1
                $data = array_merge($data, [
                    'BtobIdx' => element('btob_idx', $input),
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
                    'BtobIdx' => $row['BtobIdx'],
                    'ParentMenuIdx' => $parent_menu_idx,
                    'GroupMenuIdx' => $row['GroupMenuIdx'],
                    'MenuDepth' => intval($row['MenuDepth']) + 1,
                    'MenuUrl' => element('menu_url', $input),
                    'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getMenuOrderNum($parent_menu_idx) : element('order_num', $input),
                    'IsUse' => element('is_use', $input),
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
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'MenuName' => element('menu_name', $input),
                'MenuType' => element('menu_type', $input, 'B'),
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
                    'IsUse' => element('is_use', $input),
                ]);

                if ($row['MenuDepth'] == 1) {
                    $data['IconClassName'] = get_var(element('icon_class_name', $input), 'fa-file-text');
                }
            }

            $this->_conn->set($data)->where('MenuIdx', $menu_idx);
            if ($this->_conn->update($this->_table['menu']) === false) {
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
}