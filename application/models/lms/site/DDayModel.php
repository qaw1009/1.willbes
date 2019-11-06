<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DDayModel extends WB_Model
{
    private $_table = [
        'dday' => 'lms_dday',
        'dday_r_category' => 'lms_dday_r_category',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * D-Day 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param array $arr_condition_category
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllDDay($is_count, $arr_condition = [], $arr_condition_category = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.DIdx, A.SiteCode, G.SiteName, A.DayTitle, A.DayDatm, A.DayMemo,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where_category = $this->_conn->makeWhere($arr_condition_category);
        $where_category = $where_category->getMakeWhere(false);

        $from = "
            FROM {$this->_table['dday']} AS A
            INNER JOIN (
                SELECT B.DIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['dday_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                {$where_category}
                GROUP BY B.DIdx
            ) AS D ON A.DIdx = D.DIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 기본 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findDDay($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['dday'], $column, $arr_condition);
    }

    /**
     * 수정 폼 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findDDayForModify($arr_condition)
    {
        $column = '
            A.DIdx, A.SiteCode, G.SiteName, A.DayTitle, A.DayMainTitle, A.DayDatm, A.DayMemo,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

        $from = "
            FROM {$this->_table['dday']} AS A
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    public function listDDayCategory($d_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['dday_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.DIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.DIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$d_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 등록
     * @param array $input
     * @return array|bool
     */
    public function addDDay($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => element('site_code', $input),
                'DayTitle' => element('day_title', $input),
                'DayMainTitle' => element('day_main_title', $input),
                'DayDatm' => element('day_datm', $input),
                'DayMemo' => element('day_memo', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['dday']) === false) {
                throw new \Exception('배너 등록에 실패했습니다.');
            }
            $d_idx = $this->_conn->insert_id();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['DIdx'] = $d_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addDDayCategory($category_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
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
     * @param array $input
     * @return array|bool
     */
    public function modifyDDay($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $d_idx = element('d_idx', $input);

            // 기존 기본정보 조회
            $row = $this->findDDay('DIdx', ['EQ' => ['DIdx' => $d_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'DayTitle' => element('day_title', $input),
                'DayMainTitle' => element('day_main_title', $input),
                'DayDatm' => element('day_datm', $input),
                'DayMemo' => element('day_memo', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('DIdx', $d_idx)->update($this->_table['dday']) === false) {
                throw new \Exception('배너 수정에 실패했습니다.');
            }

            $category_code = element('cate_code', $input);
            $is_category = $this->_modifyDDayCategory($d_idx, $category_code);
            if ($is_category !== true) {
                throw new \Exception($is_category);
            }

            /*if ($this->_conn->set(['IsStatus' => 'N', 'UpdAdminIdx' => $admin_idx])->where('DIdx', $d_idx)->update($this->_table['dday_r_category']) === false) {
                throw new \Exception('카테고리 수정에 실패했습니다.');
            }

            //카테고리수정
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['DIdx'] = $d_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addDDayCategory($category_data) === false) {
                    throw new \Exception('카테고리 수정에 실패했습니다.');
                }
            }*/

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 게시물 복사
     * @param $d_idx
     * @return array|bool
     */
    public function DDCopy($d_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $arr_dday_category = $this->_getDDayCategoryArray($d_idx);
            if (count($arr_dday_category) <= 0) {
                throw new \Exception('복사할 카테고리가 없습니다. 관리자에게 문의해 주세요.');
            }

            $insert_column = '
                SiteCode, DayTitle, DayDatm, DayMemo, IsUse, IsStatus, RegAdminIdx, RegIp
            ';
            $select_column = '
                SiteCode,
                CONCAT("복사본-", IF(LEFT(DayTitle,4)="복사본-", REPLACE(DayTitle, LEFT(DayTitle,4), ""), DayTitle)) AS DayTitle,
                DayDatm, DayMemo,
                CASE IsUse WHEN "Y" THEN "N" ELSE "N" END AS IsUse,
                IsStatus,
                REPLACE(RegAdminIdx, RegAdminIdx, "'.$admin_idx.'") AS RegAdminIdx,
                REPLACE(RegIp, RegIp, "'.$reg_ip.'") AS RegIp
            ';
            $query = "insert into {$this->_table['dday']} ({$insert_column})
                select {$select_column} from {$this->_table['dday']}
                where DIdx = {$d_idx}";
            $result = $this->_conn->query($query);
            $new_d_idx = $this->_conn->insert_id();

            if ($result === true) {
                foreach ($arr_dday_category as $key => $val) {
                    $set_dday_category_data['DIdx'] = $new_d_idx;
                    $set_dday_category_data['CateCode'] = $val;
                    $set_dday_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_dday_category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addDDayCategory($set_dday_category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
                    }
                }
            } else {
                throw new \Exception('D-Day 복사에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 카테고리 조회
     * @param $d_idx
     * @return array|int
     */
    private function _getDDayCategoryArray($d_idx)
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'DIdx' => $d_idx]];
        $data = $this->_conn->getListResult($this->_table['dday_r_category'], 'CcIdx, CateCode', $arr_condition, null, null, [
            'CcIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'CateCode', 'CcIdx');
        return $data;
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addDDayCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['dday_r_category']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 업데이트
     * @param $whereData
     * @return bool
     */
    private function _updateDDayCategory($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['dday_r_category']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 수정
     * @param $d_idx
     * @param $category_code
     * @return bool|string
     */
    private function _modifyDDayCategory($d_idx, $category_code)
    {
        try {
            // 기존 카테고리 조회
            $arr_category = array_values($this->_getDDayCategoryArray($d_idx));
            $up_arr_category_data = array_diff($arr_category, $category_code);     //N 업데이트
            $ins_arr_category_data = array_diff($category_code, $arr_category);    //insert

            $up_cate_data = [];
            foreach ($up_arr_category_data as $key => $val) {
                $up_cate_data['DIdx'] = $d_idx;
                $up_cate_data['CateCode'] = $val;
                if ($this->_updateDDayCategory($up_cate_data) === false) {
                    throw new \Exception('카테고리 수정에 실패했습니다.');
                }
            }

            $ins_cate_data = [];
            foreach ($ins_arr_category_data as $key => $val) {
                $ins_cate_data['DIdx'] = $d_idx;
                $ins_cate_data['CateCode'] = $val;
                $ins_cate_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $ins_cate_data['RegIp'] = $this->input->ip_address();
                if ($this->_addDDayCategory($ins_cate_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

}