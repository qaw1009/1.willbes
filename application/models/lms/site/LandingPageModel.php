<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPageModel extends WB_Model
{
    private $_table = [
        'landing' => 'lms_landing',
        'landing_r_category' => 'lms_landing_r_category',
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
     * 랜딩페이지 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllLandingPage($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.LIdx, A.LCode, A.SiteCode, G.SiteName, A.Title, A.DispStartDatm, A.DispEndDatm, A.DispRoute,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ,substring_index(G.SiteUrl,\'.\',1) As SiteHost
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['landing']} AS A
            LEFT JOIN (
                SELECT B.LIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['landing_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.LIdx
            ) AS D ON A.LIdx = D.LIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 랜딩페이지 등록
     * @param array $input
     * @return array|bool
     */
    public function addLandingPage($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $data = array_merge($this->inputCommon($input),[
                'SiteCode'=>element('site_code',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            $check_lcode = $this->landingPageModel->findLCode('find', element('l_code',$input));
            if(empty($check_lcode) === false) {
                throw new \Exception('이미 존재하는 랜딩코드입니다.');
            }

            //등록
            if ($this->_conn->set($data)->insert($this->_table['landing']) === false) {
                throw new \Exception('랜딩페이지 등록에 실패했습니다.');
            }
            $l_idx = $this->_conn->insert_id();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            if(empty($category_code) === false) {
                foreach ($category_code as $key => $val) {
                    $category_data['LIdx'] = $l_idx;
                    $category_data['CateCode'] = $val;
                    $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addLandingPageCategory($category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
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
    
    public function modifyLandingPage($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $l_idx = element('l_idx', $input);

            $data = array_merge($this->inputCommon($input),[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ]);

            if ($this->_conn->set($data)->where('Lidx', $l_idx)->update($this->_table['landing']) === false) {
                throw new \Exception('랜딩페이지 수정에 실패했습니다.');
            }

            //기존 카테고리 삭제
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($del_data)->where('LIdx', $l_idx)->where('IsStatus', 'Y')->update($this->_table['landing_r_category']);
            
            //카테고리 저장
            $category_code = element('cate_code', $input);
            if(empty($category_code) === false) {
                foreach ($category_code as $key => $val) {
                    $category_data['LIdx'] = $l_idx;
                    $category_data['CateCode'] = $val;
                    $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addLandingPageCategory($category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
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

    public function inputCommon($input=[])
    {
        if (empty(element('disp_start_datm', $input)) === true) {
            $disp_start_datm = date('Y-m-d') . ' ' . '00:00:00';
        } else {
            $disp_start_datm = element('disp_start_datm', $input) . ' ' . element('disp_start_time', $input) . ':00:00';
        }

        if (empty(element('disp_end_datm', $input)) === true) {
            $disp_end_datm = '2030-12-31' . ' ' . '23:59:59';
        } else {
            $disp_end_datm = element('disp_end_datm', $input) . ' ' . element('disp_end_time', $input) . ':00:00';
        }
        $input_data =  [
            'LCode' => element('l_code', $input),
            'Title' => element('title', $input),
            'DispStartDatm' => $disp_start_datm,
            'DispEndDatm' => $disp_end_datm,
            'DispRoute' => element('disp_route', $input),
            'GuidanceNote' => element('guidance_note', $input),
            //'Content' => str_replace(array("\r\n","\r","\n"),'',element('content', $input)),
            'Content' => element('content', $input),
            'Desc' => element('desc', $input),
            'IsUse' => element('IsUse', $input),
        ];

        return $input_data;
    }

    /**
     * @param $arr_condition
     * @return mixed
     */
    public function findLandingPageForModify($arr_condition)
    {
        $column = "
            A.LIdx, A.LCode, A.SiteCode, G.SiteName, A.Title,
            A.DispStartDatm, A.DispEndDatm,
            DATE_FORMAT(A.DispStartDatm, '%Y-%m-%d') AS DispStartDay, DATE_FORMAT(A.DispStartDatm, '%H') AS DispStartHour,
            DATE_FORMAT(A.DispEndDatm, '%Y-%m-%d') AS DispEndDay, DATE_FORMAT(A.DispEndDatm, '%H') AS DispEndHour,
            A.DispRoute, A.GuidanceNote, A.Desc, A.Content, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ,substring_index(G.SiteUrl,'.',1) As SiteHost
            ";

        $from = "
            FROM {$this->_table['landing']} AS A
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 카테고리 연결 데이터 조회
     * @param $board_idx
     * @return array
     */
    public function listLandingPageCategory($board_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['landing_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.LIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.LIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$board_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addLandingPageCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['landing_r_category']) === false) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function findLCode($type='max', $lcode='')
    {
        if($type==='max') {
            $data = $this->_conn->query('select ifnull(Max(LCode),0)+1 as LCode from '.$this->_table['landing'])->row_array(0);
        } elseif($type==='find') {
            $data = $this->_conn->query('select LCode from '.$this->_table['landing'].' where LCode='.$lcode)->result_array(0);
        }
        return $data;
    }
}