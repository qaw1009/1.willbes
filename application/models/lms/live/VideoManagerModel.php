<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoManagerModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'live_video' => 'lms_live_video',
        'class_room' => 'lms_classroom',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listLiveVideo($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $column = 'lms_live_video.LecLiveVideoIdx, lms_live_video.SiteCode,
                    lms_live_video.CampusCcd, lms_live_video.CIdx, lms_live_video.LiveVideoRoute,
                    lms_live_video.OrderNum, lms_live_video.IsUse, lms_live_video.RegDatm, lms_live_video.RegAdminIdx, lms_site.SiteName, lms_sys_code.CcdName as CampusName, lms_class_room.ClassRoomName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_live_video.RegAdminIdx and wIsStatus = "Y") as RegAdminName';

        $from = "
            FROM {$this->_table['live_video']} AS lms_live_video
            INNER JOIN {$this->_table['class_room']} as lms_class_room ON lms_live_video.CIdx = lms_class_room.CIdx
            INNER JOIN {$this->_table['site']} as lms_site ON lms_live_video.SiteCode = lms_site.SiteCode
            LEFT JOIN {$this->_table['sys_code']} as lms_sys_code ON lms_live_video.CampusCcd = lms_sys_code.Ccd
        ";

        $arr_condition['EQ']['lms_site.IsStatus'] = 'Y';
        $arr_condition['EQ']['lms_live_video.IsStatus'] = 'Y';
        $arr_condition['IN']['lms_live_video.SiteCode'] = get_auth_site_codes();

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
//        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
//        $where_campus = $this->_conn->group_start();
//        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
//            $where_campus->or_group_start();
//            $where_campus->or_where('lms_live_video.SiteCode',$set_site_ccd);
//            $where_campus->group_start();
//            $where_campus->where('lms_live_video.CampusCcd', $this->codeModel->campusAllCcd);
//            $where_campus->or_where_in('lms_live_video.CampusCcd', $set_campus_ccd);
//            $where_campus->group_end();
//            $where_campus->group_end();
//        }
//        $where_campus->or_where('lms_live_video.CampusCcd', "''", false);
//        $where_campus->or_where('lms_live_video.CampusCcd IS NULL');
//        $where_campus->group_end();
//        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp;
//        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 라이브 송출관리 데이터 조회
     * @param array $arr_condition
     * @param $column
     * @return array
     */
    public function findLiveVideo($arr_condition = [], $column)
    {
        return $this->_conn->getFindResult($this->_table['live_video'], $column, $arr_condition);
    }

    /**
     * 수정 폼을 위한 데이터 조회
     * @param $idx
     * @return array
     */
    public function findLiveVideoForModify($idx)
    {
        $column = 'lms_live_video.LecLiveVideoIdx, lms_live_video.SiteCode,
                    lms_live_video.CampusCcd, lms_live_video.CIdx, lms_live_video.LiveVideoRoute,
                    lms_live_video.OrderNum, lms_live_video.IsUse, lms_live_video.RegDatm, lms_live_video.RegAdminIdx, lms_live_video.UpdDatm, lms_live_video.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_live_video.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= ' , if(lms_live_video.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_live_video.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['live_video'] . ' as lms_live_video', $column, [
            'EQ' => ['lms_live_video.LecLiveVideoIdx' => $idx]
        ]);
    }

    /**
     * 강의 라이브동영상 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addLiveVideo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->_getVideoOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            //중복데이터 체크
            $arr_condition = [
                'EQ' => [
                    'SiteCode' => $site_code,
                    'CampusCcd' => element('campus_ccd', $input),
                    'CIdx' => element('class_room_idx', $input),
                    'IsUse' => 'Y',
                    'IsStatus' => 'Y'
                ]
            ];
            $liveVideoData = $this->findLiveVideo($arr_condition, 'LecLiveVideoIdx');
            if (empty($liveVideoData) === false) {
                throw new \Exception('중복된 라이브송출 데이터가 존재합니다.');
            }

            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => element('campus_ccd', $input),
                'CIdx' => element('class_room_idx', $input),
                'LiveVideoRoute' => element('live_video_route', $input),
                'OrderNum' => $order_num,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 등록
            if ($this->_conn->set($data)->insert($this->_table['live_video']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    public function modifyLiveVideo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $idx = element('idx', $input);

            // 기존 정보 조회
            $row = $this->findLiveVideoForModify($idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->_getVideoOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            //사용중으로 수정 시 중복데이터 체크
            if ($row['IsUse'] == 'N' && element('is_use', $input) == 'Y') {
                $arr_condition = [
                    'EQ' => [
                        'SiteCode' => $site_code,
                        'CampusCcd' => element('campus_ccd', $input),
                        'CIdx' => element('class_room_idx', $input),
                        'IsUse' => 'Y',
                        'IsStatus' => 'Y'
                    ]
                ];
                $liveVideoData = $this->findLiveVideo($arr_condition, 'LecLiveVideoIdx');
                if (empty($liveVideoData) === false) {
                    throw new \Exception('중복된 라이브송출 데이터가 존재합니다.');
                }
            }

            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => element('campus_ccd', $input),
                'CIdx' => element('class_room_idx', $input),
                'LiveVideoRoute' => element('live_video_route', $input),
                'OrderNum' => $order_num,
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            // 수정
            if ($this->_conn->set($data)->where('LecLiveVideoIdx', $idx)->update($this->_table['live_video']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyLiveVideoReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $lec_live_video_Idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('LecLiveVideoIdx', $lec_live_video_Idx);

                if ($this->_conn->update($this->_table['live_video']) === false) {
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
     * 사이트 코드별 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    private function _getVideoOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table['live_video'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }
}