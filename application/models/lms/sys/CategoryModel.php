<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends WB_Model
{
    private $_table = 'lms_sys_category';

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
        $colum = 'CateCode, SiteCode, CateName, ParentCateCode, GroupCateCode, CateDepth, OrderNum, IsUse';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table, $colum, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 카테고리 관리 목록 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCategory($arr_condition = [])
    {
        $colum = 'U.*, A.wAdminName as LastRegAdminName';
        $from = '
            from (
                select SiteCode, SiteName 
                    , BCateCode, BCateName, BCateDepth, BOrderNum, if(BCateDepth < LastCateDepth, BIsUse, "") as BIsUse
                    , MCateCode, MCateName, MCateDepth, MOrderNum, if(MCateDepth < LastCateDepth, MIsUse, "") as MIsUse
                    , if(LastCateDepth = 1, BIsUse, MIsUse) as LastIsUse
                    , if(LastCateDepth = 1, BRegAdminIdx, MRegAdminIdx) as LastRegAdminIdx
                    , if(LastCateDepth = 1, BRegDatm, MRegDatm) as LastRegDatm
                from (
                    select S.SiteCode, S.SiteName
                        , BC.CateCode as BCateCode, BC.CateName as BCateName, BC.CateDepth as BCateDepth, BC.OrderNum as BOrderNum
                        , BC.IsUse as BIsUse, BC.RegAdminIdx as BRegAdminIdx, BC.RegDatm as BRegDatm
                        , MC.CateCode as MCateCode, MC.CateName as MCateName, MC.CateDepth as MCateDepth, MC.OrderNum as MOrderNum
                        , MC.IsUse as MIsUse, MC.RegAdminIdx as MRegAdminIdx, MC.RegDatm as MRegDatm
                        , greatest(BC.CateDepth, ifnull(MC.CateDepth, 0)) as LastCateDepth
                    from lms_site as S
                        inner join ' . $this->_table . ' as BC
                            on S.SiteCode = BC.SiteCode
                        left join ' . $this->_table . ' as MC
                            on MC.GroupCateCode = BC.CateCode and MC.CateDepth = 2 and MC.IsStatus = "Y"
                    where BC.CateDepth = 1 and BC.IsStatus = "Y"
                ) as I
            ) as U inner join wbs_sys_admin as A
                on U.LastRegAdminIdx = A.wAdminIdx 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['SiteCode' => 'asc', 'BOrderNum' => 'asc', 'MOrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 동일한 레벨의 카테고리 목록 조회
     * @param string $cate_code [카테고리 코드]
     * @return array
     */
    public function listSameDepthCategory($cate_code)
    {
        $colum = 'PC.CateCode, PC.CateName, PC.CateDepth';
        $from = '
            from ' . $this->_table . ' as C
                inner join ' . $this->_table . ' as PC
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
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 부모 카테고리 코드가 동일한 카테고리 코드 목록 조회
     * @param $site_code
     * @param $parent_cate_code
     * @return array
     */
    public function getCategoryArray($site_code, $parent_cate_code)
    {
        $data = $this->_conn->getListResult($this->_table, 'CateCode, CateName', [
            'EQ' => ['SiteCode' => $site_code, 'ParentCateCode' => $parent_cate_code, 'IsUse' => 'Y', 'IsStatus' => 'Y']
        ], null, null, [
            'CateCode' => 'asc'
        ]);

        return array_pluck($data, 'CateName', 'CateCode');
    }

    /**
     * 카테고리 조회
     * @param $cate_code
     * @return array
     */
    public function findCategoryByCateCode($cate_code)
    {
        return $this->_conn->getFindResult($this->_table, 'CateCode, SiteCode, CateName, ParentCateCode, GroupCateCode, CateDepth', [
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
        $colum = 'C.CateCode, C.SiteCode, C.CateName, C.ParentCateCode, C.GroupCateCode, C.CateDepth, C.OrderNum, C.IsUse, C.RegDatm, C.UpdDatm';
        $colum .= '    , (select wAdminName from wbs_sys_admin where wAdminIdx = C.RegAdminIdx) as RegAdminName';
        $colum .= '    , if(C.UpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = C.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as C', $colum, [
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
        return $this->_conn->getFindResult($this->_table, 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
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
                $row = $this->_conn->getFindResult($this->_table, 'ifnull(max(CateCode) + 1, 3001) as CateCode', ['EQ' => ['CateDepth' => 1]]);
                $_cate_code = $row['CateCode'];
                $_group_cate_code = $_cate_code;
                $_cate_depth = 1;
            } else {
                // 하위분류
                $row = $this->_conn->getFindResult($this->_table, 'ifnull(max(CateCode) + 1, ' . intval($parent_cate_code . '01') . ') as CateCode', ['EQ' => ['ParentCateCode' => $parent_cate_code]]);
                $_cate_code = $row['CateCode'];

                $row = $this->findCategoryByCateCode($parent_cate_code);
                if (count($row) < 1) {
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
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table) === false) {
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
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 데이터 수정
            $data = [
                'CateName' => element('cate_name', $input),
                'OrderNum' => (empty(element('order_num', $input)) === true) ? $this->getCategoryOrderNum($row['SiteCode'], $row['ParentCateCode']) : element('order_num', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($data)->where('CateCode', $cate_code);

            if ($this->_conn->update($this->_table) === false) {
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
    public function modifyCategoryReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $cate_code => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->where('CateCode', $cate_code);

                if ($this->_conn->update($this->_table) === false) {
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
