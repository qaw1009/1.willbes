<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends WB_Model
{
    private $_table = [
        'menu' => 'wbs_sys_menu',
        'admin' => 'wbs_sys_admin',
    ];    

    public function __construct()
    {
        parent::__construct('wbs');
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
        $column = 'wMenuIdx, wMenuName, wParentMenuIdx, wGroupMenuIdx, wMenuDepth, wMenuUrl, wIconClassName, wOrderNum, wIsUse';
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['menu'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 메뉴관리 목록 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllMenu($arr_condition = [])
    {
        $column = 'U.*, A.wAdminName as wLastRegAdminName';
        $from = '
            from (
                select wBMenuIdx, wBMenuName, wBMenuDepth, wBOrderNum, if(wBMenuDepth < wLastMenuDepth, wBIsUse, "") as wBIsUse
                    , wMMenuIdx, wMMenuName, wMMenuDepth, wMOrderNum, if(wMMenuDepth < wLastMenuDepth, wMIsUse, "") as wMIsUse
                    , wSMenuIdx, wSMenuName, wSMenuDepth, wSOrderNum
                    , if(wLastMenuDepth = 1, wBMenuUrl, if(wLastMenuDepth = 2, wMMenuUrl, wSMenuUrl)) as wLastMenuUrl
                    , if(wLastMenuDepth = 1, wBIsUse, if(wLastMenuDepth = 2, wMIsUse, wSIsUse)) as wLastIsUse
                    , if(wLastMenuDepth = 1, wBRegAdminIdx, if(wLastMenuDepth = 2, wMRegAdminIdx, wSRegAdminIdx)) as wLastRegAdminIdx
                    , if(wLastMenuDepth = 1, wBRegDatm, if(wLastMenuDepth = 2, wMRegDatm, wSRegDatm)) as wLastRegDatm
                from (
                    select BM.wMenuIdx as wBMenuIdx, BM.wMenuName as wBMenuName, BM.wMenuDepth as wBMenuDepth, BM.wOrderNum as wBOrderNum
                        , BM.wIsUse as wBIsUse, BM.wMenuUrl as wBMenuUrl, BM.wRegAdminIdx as wBRegAdminIdx, BM.wRegDatm as wBRegDatm	
                        , MM.wMenuIdx as wMMenuIdx, MM.wMenuName as wMMenuName, MM.wMenuDepth as wMMenuDepth, MM.wOrderNum as wMOrderNum
                        , MM.wIsUse as wMIsUse, MM.wMenuUrl as wMMenuUrl, MM.wRegAdminIdx as wMRegAdminIdx, MM.wRegDatm as wMRegDatm
                        , SM.wMenuIdx as wSMenuIdx, SM.wMenuName as wSMenuName, SM.wMenuDepth as wSMenuDepth, SM.wOrderNum as wSOrderNum
                        , SM.wIsUse as wSIsUse, SM.wMenuUrl as wSMenuUrl, SM.wRegAdminIdx as wSRegAdminIdx, SM.wRegDatm as wSRegDatm
                        , greatest(BM.wMenuDepth, ifnull(MM.wMenuDepth, 0), ifnull(SM.wMenuDepth, 0)) as wLastMenuDepth		
                    from ' . $this->_table['menu'] . ' as BM
                        left join ' . $this->_table['menu'] . ' as MM
                            on MM.wGroupMenuIdx = BM.wMenuIdx and MM.wMenuDepth = 2 and MM.wIsStatus = "Y"
                        left join ' . $this->_table['menu'] . ' as SM
                            on SM.wParentMenuIdx = MM.wMenuIdx and SM.wMenuDepth = 3 and SM.wIsStatus = "Y"
                    where BM.wMenuDepth = 1 and BM.wIsStatus = "Y"
                ) as I
            ) as U 
                left join ' . $this->_table['admin'] . ' as A
                    on U.wLastRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y" 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['wBOrderNum' => 'asc', 'wMOrderNum' => 'asc', 'wSOrderNum' => 'asc'])->getMakeOrderBy();

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
        $column = 'PM.wMenuIdx, PM.wMenuName, PM.wMenuDepth';
        $from = '
            from ' . $this->_table['menu'] . ' as M
                inner join ' . $this->_table['menu'] . ' as PM
                    on M.wParentMenuIdx = PM.wParentMenuIdx            
        ';
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'M.wMenuIdx' => $menu_idx, 'M.wIsStatus' => 'Y', 'PM.wIsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['PM.wOrderNum' => 'asc'])->getMakeOrderBy();

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
        return $this->_conn->getFindResult($this->_table['menu'], 'wMenuIdx, wParentMenuIdx, wGroupMenuIdx, wMenuDepth', [
            'EQ' => ['wMenuIdx' => $menu_idx, 'wIsStatus' => 'Y']
        ]);
    }

    /**
     * 메뉴 수정폼에 필요한 데이터 조회
     * @param $menu_idx
     * @return array
     */
    public function findMenuForModify($menu_idx)
    {
        $column = 'M.wMenuIdx, M.wMenuName, M.wParentMenuIdx, M.wGroupMenuIdx, M.wMenuDepth, M.wMenuUrl, M.wIconClassName, M.wOrderNum, M.wIsUse, M.wRegDatm, M.wUpdDatm';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= '    , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = M.wUpdAdminIdx and wIsStatus = "Y") as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table['menu'] . ' as M', $column, [
            'EQ' => ['M.wMenuIdx' => $menu_idx, 'M.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 다음 메뉴 정렬순서값 조회
     * @param $parent_menu_idx
     * @return int
     */
    public function getMenuOrderNum($parent_menu_idx)
    {
        return $this->_conn->getFindResult($this->_table['menu'], 'ifnull(max(wOrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['wParentMenuIdx' => $parent_menu_idx]
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
                'wMenuName' => element('menu_name', $input),
                'wRegAdminIdx' => $admin_idx
            ];

            if ($group_menu_idx == 0) {
                // GNB, MenuDepth=1
                $data = array_merge($data, [
                    'wMenuDepth' => 1,
                    'wOrderNum' => $this->getMenuOrderNum($parent_menu_idx),
                ]);
            } else {
                // LNB, MenuDepth > 1
                $row = $this->findMenuByMenuIdx($parent_menu_idx);
                if (empty($row) === true) {
                    throw new \Exception('부모메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $data = array_merge($data, [
                    'wParentMenuIdx' => $parent_menu_idx,
                    'wGroupMenuIdx' => $row['wGroupMenuIdx'],
                    'wMenuDepth' => intval($row['wMenuDepth']) + 1,
                    'wMenuUrl' => element('menu_url', $input),
                    'wOrderNum' => (empty(element('order_num', $input)) === true) ? $this->getMenuOrderNum($parent_menu_idx) : element('order_num', $input),
                    'wIsUse' => element('is_use', $input),
                ]);

                if ($row['wMenuDepth'] == 1) {
                    $data['wIconClassName'] = get_var(element('icon_class_name', $input), 'fa-file-text');
                }
            }
            
            // 메뉴 등록
            if ($this->_conn->set($data)->insert($this->_table['menu']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // GNB 메뉴일 경우 GroupMenuIdx 값을 등록된 MenuIdx 값으로 업데이트
            if ($group_menu_idx == 0) {
                $inserted_menu_idx = $this->_conn->insert_id();
                $is_update = $this->_conn->set(['wGroupMenuIdx' => $inserted_menu_idx, 'wUpdAdminIdx' => $admin_idx])->where('wMenuIdx', $inserted_menu_idx)->update($this->_table['menu']);
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
                'wMenuName' => element('menu_name', $input),
                'wUpdAdminIdx' => $admin_idx
            ];

            if ($group_menu_idx > 0) {
                // MenuDepth > 1
                $row = $this->findMenuByMenuIdx($parent_menu_idx);
                if (empty($row) === true) {
                    throw new \Exception('부모메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $data = array_merge($data, [
                    'wParentMenuIdx' => $parent_menu_idx,
                    'wGroupMenuIdx' => $row['wGroupMenuIdx'],
                    'wMenuUrl' => element('menu_url', $input),
                    'wOrderNum' => (empty(element('order_num', $input)) === true) ? $this->getMenuOrderNum($parent_menu_idx) : element('order_num', $input),
                    'wIsUse' => element('is_use', $input),
                ]);

                if ($row['wMenuDepth'] == 1) {
                    $data['wIconClassName'] = get_var(element('icon_class_name', $input), 'fa-file-text');
                }
            }

            $this->_conn->set($data)->where('wMenuIdx', $menu_idx);
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
                $this->_conn->set('wOrderNum', $order_num)->set('wUpdAdminIdx', $admin_idx)->where('wMenuIdx', $menu_idx);

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