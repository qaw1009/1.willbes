<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassRoomModel extends WB_Model
{
    private $_table = [
        'class_room' => 'lms_classroom',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강의실 리스트
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listClassRoom($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $column = 'A.CIdx, A.SiteCode, A.CampusCcd, A.ClassRoomName,
                    A.IsUse, A.RegDatm, A.RegAdminIdx, B.SiteName, C.CcdName as CampusName, D.wAdminName as RegAdminName';

        $from = "
            FROM {$this->_table['class_room']} AS A
            INNER JOIN {$this->_table['site']} as B ON A.SiteCode = B.SiteCode AND B.IsStatus = 'Y'
            LEFT JOIN {$this->_table['sys_code']} as C ON A.CampusCcd = C.Ccd
            INNER JOIN {$this->_table['admin']} as D ON A.RegAdminIdx = D.wAdminIdx AND D.wIsStatus = 'Y'
        ";

        $arr_condition['EQ']['A.IsStatus'] = 'Y';
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('A.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('A.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('A.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('A.CampusCcd', "''", false);
        $where_campus->or_where('A.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    public function findClassRoomForModify($idx)
    {
        $column = 'A.CIdx, A.SiteCode, A.CampusCcd, A.ClassRoomName,
                    A.IsUse, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= ' , if(A.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['class_room'] . ' AS A', $column, [
            'EQ' => ['A.CIdx' => $idx]
        ]);
    }

    /**
     * 강의실관리 등록
     * @param array $input
     * @return array|bool
     */
    public function addClassRoom($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);

            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => element('campus_ccd', $input),
                'ClassRoomName' => element('class_room_name', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            // 등록
            if ($this->_conn->set($data)->insert($this->_table['class_room']) === false) {
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
     * 강의실관리 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyClassRoom($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $idx = element('idx', $input);

            // 기존 정보 조회
            $row = $this->findClassRoomForModify($idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = element('site_code', $input);
            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => element('campus_ccd', $input),
                'ClassRoomName' => element('class_room_name', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 수정
            if ($this->_conn->set($data)->where('CIdx', $idx)->update($this->_table['class_room']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}